<?php

class Admin extends Controller{
    
    public function __construct(){
        parent::__construct();
        $this->view->dlang = $this->dlang;
        /*
          $this->checkUserSession() : this method to check user session
        */
    }

    public function index(){
        if($this->checkUserSession() == true){
            // view template
            $this->view->view("admin/index");
        }else{
            $this->redirect(URL . '/admin/login');
        }
    }


    // setup user session
    public function setupUserSession($sessionData){
        $_SESSION['u_id'] = $sessionData->u_id;
        $_SESSION['u_name'] = $sessionData->u_name;
        $_SESSION['u_nick'] = $sessionData->u_nick;
        $_SESSION['u_pass'] = $sessionData->u_pass;
        $_SESSION['u_email'] = $sessionData->u_email;
        $_SESSION['u_type'] = $sessionData->u_type;
        $_SESSION['u_lastlogin'] = $sessionData->u_lastlogin;
    }

    // login
    public function adminLogin(){
        if($this->checkUserSession() == false){
            if(isset($_POST['_token'])){
                // token of login 
                $login_token = $this->protect($_POST['_token']);
                $real_token = $_SESSION['_token'];

                // check if token === generated token
                if($real_token == $login_token){
                    // login data
                    $login_data =[
                        'user_name' => $this->protect($_POST['username']),
                        'user_pass' => $this->protect(sha1($_POST['password']))
                    ];
                    /*
                      username don't have spechial chars like '"<>  \
                      to avoid injection
                    */
                    $true_user = !$this->withRule($login_data['user_name'], REGEX_SPECIAL_CHAR);
                    if($true_user === true){
                        // check if this info exists in db
                        $login = $this->model->loginToAdmin($login_data);
                        if($login !== false){
                            $login = $login[0];
                            // setup session for user
                            $this->setupUserSession($login);
                            // redirect to dashboard
                            $this->redirect(URL . '/admin/index');
                        }else{
                            echo "Not valid";
                        }
                    }
                }
                // regenerate token 
                $this->view->_token = $this->genToken('_token');
            }else{
                // generate token
                $this->view->_token = $this->genToken('_token');
            }
            // view template
            $this->view->view("admin/login");
        }else{
            $this->redirect(URL . '/admin/index');
        }
    }
    // New Section Method
    public function newSection(){
        if($this->checkUserSession() == true){
            if(isset($_POST['_token']) && $this->checkUserSession()){
                $login_token = $this->protect($_POST['_token']);
                $real_token = $_SESSION['_token'];
                if($login_token === $real_token){
                    
                    $section_data = [
                        'sec_name' => $this->protect($_POST['sec-name']),
                        'sec_logo' => $this->protect($_POST['sec-logo']),
                        'sec_user' => $_SESSION['u_id']
                    ];
                    $true_name = strlen($section_data['sec_name']) > 1;
                    $true_logo = strlen($section_data['sec_logo']) > 1;
                    if($true_name && $true_logo){
                        $new_section_resp = $this->model->createSection($section_data);
                        if($new_section_resp !== false){
                            // echo $new_section_resp;
                            echo "<br/> Done";
                        }
                    }else{
                        echo 'Something went wrong';
                    }
                }
                $this->view->_token = $this->genToken('_token');
            }else{
                $this->view->_token = $this->genToken('_token');
            }
            // view template
            $this->view->view("admin/new-section");
        }else{
            $this->redirect(URL . '/admin/index');            
        }
    }
    
    // New article Method
    public function newArticle(){
        if($this->checkUserSession() == true){
            // this to get all sections from db
            $sections = $this->model->getSections();
            if($sections !== false && is_array($sections))  // if sections > 0
                $this->view->sections = $sections;
            else  // if sections == 0
                $this->view->sections = [];

            // if there is a token posted
            if(isset($_POST['_token']) && $this->checkUserSession()){

                // if token is true
                if($_SESSION['_token'] == $_POST['_token']){
                    // article data to insert it into database
                    // $this->protect() to escape injction
                    $acl_section = $this->protect($_POST['acl-section']);
                    $acl_title = $this->protect($_POST['acl-title']);
                    $acl_lang = $this->protect($_POST['acl-lang']);
                    $acl_date = $this->protect($_POST['acl-date']);
                    $acl_img = $this->protect($_POST['acl-image']);
                    $acl_content = $this->protect($_POST['acl-content']);
                
                    // lang must be 2 chars and en chars
                    $true_lang = $this->withRule($acl_lang, REGEX_CHARS_LANG);
                    // if there is content
                    $true_content = strlen($acl_content) >= 1;
                    $true_img = strlen($acl_img) >= 1;
                    $true_date = strlen($acl_date) >= 1;
                    $true_title = strlen($acl_title) >= 1;
                    $true_section = strlen($acl_title) > 0;
                
                    // put data into array if lang is true
                    if($true_lang === true // lang 2 chars
                       && $true_content  // content not null
                       && $true_img  // img not null
                       && $true_date  // date not null
                       && $true_title  // title not null
                       && $true_section){  // section not null
                        $artilce_data = [
                            'acl_section' => $acl_section,
                            'acl_title' => $acl_title,
                            'acl_lang' => $acl_lang,
                            'acl_date' => $acl_date,
                            'acl_img' => $acl_img,
                            'acl_content' => $acl_content,
                            'acl_user' => $_SESSION['u_id'],
                        ];

                        // insert new article
                        $new_acl = $this->model->newArticle($artilce_data);
                        // echo var_dump($new_acl);
                    }else{
                        // something went wrong
                    }
                }
                // regenerate token after post
                $this->view->_token = $this->genToken('_token');
            }else{
                // generate token when visit page
                $this->view->_token = $this->genToken('_token');
            }
        
            // view template
            $this->view->view("admin/new-article");
        }else{
            $this->redirect(URL . '/admin/login');
        }
    }


    // Articles Manager method
    public function manageArt(){
        if($this->checkUserSession() === true){

            $articles = $this->model->getAllArticles();
            if($articles !== false){
                $this->view->articles = $articles;
            }else{
                $this->view->articles = [];
            }

            if(isset($_GET['delete'])){
                $del_id = intval($_GET['delete']);
                if($del_id !== 0){
                    if($this->checkUserSession() === true){
                        // delete article after check user session
                        $del_resp = $this->model->deleteArtById($del_id);
                        $this->redirect("./manage-art");
                    }
                }
            }
            
            // view template
            $this->view->view('admin/manage-art');
        }else{
            $this->redirect(URL . '/admin/login');            
        }
    }


    // Articles Editeor method
    public function editArt(){
        if($this->checkUserSession() === true){
            
            $sections = $this->model->getSections();
            if($sections !== false && is_array($sections))  // if sections > 0
                $this->view->sections = $sections;
            else  // if sections == 0
                $this->view->sections = [];

            // Id of article
            if(isset($_GET['id'])){
                $id = intval($_GET['id']);
                if($id == 0)  // there is no aricle with 0 id so if 0 we need to set i to default as 1
                    $id = 1;
                if($this->checkUserSession()){  // check the session
                    // get the article
                    $art = $this->model->getArticleById($id);
                    if($art !== false){
                        $art = $art[0];
                        $this->view->art = $art;
                    }else{
                        $this->view->art = [];
                    }

                    if(isset($_POST['_token']) && $this->checkUserSession()){
                        // get the article
                        $art = $this->model->getArticleById($id);
                        if($art !== false){
                            $art = $art[0];
                            $this->view->art = $art;
                        }else{
                            $this->view->art = [];
                        }
                        $edit_token = $this->protect($_POST['_token']);
                        $real_token = $_SESSION['_token'];
                        if($real_token === $edit_token){
                            // article data to insert it into database
                            // $this->protect() to escape injction
                            $acl_section = $this->protect($_POST['acl-section']);
                            $acl_title = $this->protect($_POST['acl-title']);
                            $acl_lang = $this->protect($_POST['acl-lang']);
                            $acl_date = $this->protect($_POST['acl-date']);
                            $acl_img = $this->protect($_POST['acl-image']);
                            $acl_content = $this->protect($_POST['acl-content']);
                
                            // lang must be 2 chars and en chars
                            $true_lang = $this->withRule($acl_lang, REGEX_CHARS_LANG);
                            // if there is content
                            $true_content = strlen($acl_content) >= 1;
                            $true_img = strlen($acl_img) >= 1;
                            $true_date = strlen($acl_date) >= 1;
                            $true_title = strlen($acl_title) >= 1;
                            $true_section = strlen($acl_title) > 0;
                
                            // put data into array if lang is true
                            if($true_lang === true // lang 2 chars
                               && $true_content  // content not null
                               && $true_img  // img not null
                               && $true_date  // date not null
                               && $true_title  // title not null
                               && $true_section){  // section not null
                                $artilce_data = [
                                    'acl_id' => $id,
                                    'acl_section' => $acl_section,
                                    'acl_title' => $acl_title,
                                    'acl_lang' => $acl_lang,
                                    'acl_img' => $acl_img,
                                    'acl_content' => $acl_content,
                                ];

                                // insert new article
                                $new_acl = $this->model->updateArticle($artilce_data);
                                if($new_acl !== false){
                                    $this->redirect(ADMIN_PATH . "/manage-art#". $id);
                                }else
                                    echo "Something went wrong";
                            }else{
                                // something went wrong
                            }
                        }
                        // regenerate token 
                        $this->view->_token = $this->genToken('_token');
                    }else{
                        // generate token 
                        $this->view->_token = $this->genToken('_token');
                    }
                }else{
                    $this->redirect(URL . '/admin/login');
                }
            }else{
                $this->redirect(URL . '/admin/login');
            }
            // view template
            $this->view->view('admin/edit-art');
        }else{
            $this->redirect(URL . '/admin/login');
        }
    }
}
?>