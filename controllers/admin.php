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
            $this->redirect(URL . ADMIN_BASE . '/login');
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
                            $this->redirect(URL . ADMIN_BASE . '/index');
                        }else{
                            $this->view->login_msg = "Not valid";
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
            $this->redirect(URL . ADMIN_BASE . '/index');
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
                            $this->view->new_section_msg = "<br/> Done";
                        }
                    }else{
                        $this->view->new_section_msg = 'Something went wrong';  // logo field is empty or section nme empty
                    }
                }
                $this->view->_token = $this->genToken('_token');
            }else{
                $this->view->_token = $this->genToken('_token');
            }
            // view template
            $this->view->view("admin/new-section");
        }else{
            $this->redirect(URL . ADMIN_BASE . '/index');            
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
            $this->redirect(URL . ADMIN_BASE . '/login');
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
                    if($_SESSION['u_type'] == 0){
                        if($this->checkUserSession() === true){
                            // delete article after check user session
                            $del_resp = $this->model->deleteArtById($del_id);
                            $this->redirect("./manage-art");
                        }
                    }else{
                        $this->view->view('admin/permission-denied');
                        die();
                    }
                }
            }
            
            // view template
            $this->view->view('admin/manage-art');
        }else{
            $this->redirect(URL . ADMIN_BASE . '/login');
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
                                    $this->view->edit_article_msg = "Something went wrong";
                            }else{
                                // something went wrong
                                $this->view->edit_article_msg = "Something went wrong"; // there is info entered not true
                            }
                        }
                        // regenerate token 
                        $this->view->_token = $this->genToken('_token');
                    }else{
                        // generate token 
                        $this->view->_token = $this->genToken('_token');
                    }
                }else{
                    $this->redirect(URL . ADMIN_BASE . '/login');
                }
            }else{
                $this->redirect(URL . ADMIN_BASE . '/login');
            }
            // view template
            $this->view->view('admin/edit-art');
        }else{
            $this->redirect(URL . ADMIN_BASE . '/login');
        }
    }


    public function newUser(){
        if($this->checkUserSession() == true){            
            if($_SESSION['u_type'] == 0){
                if(isset($_POST['_token'])){
                    $new_user_token = $this->protect($_POST['_token']);
                    $real_token = $_SESSION['_token'];
                    // if token true
                    if($new_user_token === $real_token){
                        // init user info and ptrotect it
                        $user_name = $this->protect($_POST['u-name']);
                        $user_nick = $this->protect($_POST['u-nick']);
                        $user_email = $this->protect($_POST['u-email']);
                        $user_pass = sha1($_POST['u-password']);
                        $user_type = $this->protect($_POST['u-type']);
                        // check if data not empty
                        $true_name = strlen($user_name) > 3;
                        $true_nick = strlen($user_nick) > 3;
                        $true_email = strlen($user_email) > 4;
                        $true_type = strlen($user_type) == 1;
                        // if not empty
                        if($true_name &&
                           $true_nick &&
                           $true_email &&
                           $true_type &&
                           $this->checkUserSession() == true &&
                           $_SESSION['u_type'] == 0){

                            // init data array
                            $user_data = [
                                'u_name' => $user_name,
                                'u_nick' => $user_nick,
                                'u_email' => $user_email,
                                'u_pass' => $user_pass,
                                'u_type' => $user_type,
                                'u_lastlogin' => "NOW()"
                            ];

                            // create new user
                            $c_new_user = $this->model->newUser($user_data);
                            if($c_new_user !== false){
                                $this->view->new_user_msg = "Done";
                            }else{
                                $this->view->new_user_msg = "<br/>User name exists<br/>";
                            }
                        }else{
                            // not cond satisf
                            $this->view->new_user_msg = "FILL PLEASE<br/>";
                        }
                    }else{
                        // not _token satisf
                        $this->view->new_user_msg =  "INVALID TOKEN<br/>";
                    }
                    // Regenerate token 
                    $this->view->_token = $this->genToken('_token');
                }else{
                    // Generate token 
                    $this->view->_token = $this->genToken('_token');
                }
            
                // view template
                $this->view->view('admin/new-user');
            }else{
                $this->view->view('admin/permission-denied');
            }
        }else{
            $this->redirect(URL . ADMIN_BASE . '/login');
        }
    }

    public function manageUsers(){
        if($this->checkUserSession() === true){
            if($_SESSION['u_type'] == 0){
                // get users from db
                $users = $this->model->getAllUsers();
                if($users === false)
                    $users = [];


                if(isset($_GET['delete'])){
                    $del_id = intval($_GET['delete']);
                    if($del_id !== 0){
                        if($_SESSION['u_type'] == 0){
                            if($this->checkUserSession() === true){
                                if($_SESSION['u_id'] != $del_id){
                                    // delete article after check user session
                                    $del_resp = $this->model->deleteUserById($del_id);
                                    $this->redirect("./manage-users");
                                }else{
                                    $this->view->view('admin/permission-denied');
                                    die();
                                }
                            }
                        }else{
                            $this->view->view('admin/permission-denied');
                            die();
                        }
                    }
                }
                
                $this->view->userTypeAsText = function($num){
                    $num = '' + $num;
                    if($num === 0){
                        return 'مدير';
                    }elseif($num === 1){
                        return 'مشرف';
                    }else{
                        return 'مراجع';
                    }
                };
                $this->view->users = $users;
                $this->view->view('admin/manage-users');
            }else{
                $this->view->view('admin/permission-denied');
            }
        }else{
            $this->redirect(URL . ADMIN_BASE . '/login');
        }
    }

    // edit user
    public function editUser(){
        if($this->checkUserSession() === true){
            if($_SESSION['u_type'] == 0){

                // Id of article
                if(isset($_GET['id'])){
                    $id = intval($_GET['id']);
                    if($id == 0)  // there is no aricle with 0 id so if 0 we need to set i to default as 1
                        $this->redirect(URL . ADMIN_BASE . '/manage-users');
                    if($this->checkUserSession()){  // check the session
                        // get the article
                        $usr = $this->model->getUserById($id);
                        if($usr === false)
                            $this->redirect(URL . ADMIN_BASE . '/manage-users');
                        else{
                            $this->view->usr = $usr[0];
                            if(isset($_POST['_token'])){
                                $edit_user_token = $this->protect($_POST['_token']);
                                $real_token = $_SESSION['_token'];
                                if($edit_user_token === $real_token){
                                    // init user info and ptrotect it
                                    $user_name = $this->protect($_POST['u-name']);
                                    $user_nick = $this->protect($_POST['u-nick']);
                                    $user_email = $this->protect($_POST['u-email']);
                                    $user_type = $this->protect($_POST['u-type']);
                                    // check if data not empty
                                    $true_name = strlen($user_name) > 3;
                                    $true_nick = strlen($user_nick) > 3;
                                    $true_email = strlen($user_email) > 4;
                                    $true_type = strlen($user_type) == 1;
                                    // if not empty
                                    if($true_name &&
                                       $true_nick &&
                                       $true_email &&
                                       $true_type &&
                                       $this->checkUserSession() == true &&
                                       $_SESSION['u_type'] == 0){
                                        // init data array
                                        $user_data = [
                                            'u_id' => $id,
                                            'u_name' => $user_name,
                                            'u_nick' => $user_nick,
                                            'u_email' => $user_email,
                                            'u_type' => $user_type,
                                        ];
                                        if(strlen(trim($_POST['u-password'])) > 0){
                                            $user_data['u_pass'] = sha1($_POST['u-password']);
                                        }
                                        // create new user
                                        $e_new_user = $this->model->editUser($user_data);
                                        if($e_new_user !== false){
                                            $this->view->edit_user_msg = "Done<br/>";
                                            $this->redirect(URL . ADMIN_BASE . '/manage-users#' . $id);
                                        }else{
                                            $this->view->edit_user_msg = "<br/>User name exists<br/>";
                                        }
                                    }else{
                                        // not cond satisf
                                        $this->view->edit_user_msg = "FILL PLEASE<br/>";
                                    }
                                }else{
                                    // not _token satisf
                                    $this->view->edit_user_msg = "INVALID TOKEN<br/>";
                                }
                                // regenerate token 
                                $this->view->_token = $this->genToken('_token');
                            }else{
                                // generate token 
                                $this->view->_token = $this->genToken('_token');
                            }
                        }
                    }
                }else{
                    $this->redirect(URL . ADMIN_BASE . '/manage-users');
                }
                
                $this->view->view('/admin/edit-user');
            }else{
                $this->view->view('admin/permission-denied');
            }
        }else{
            $this->redirect(URL . ADMIN_BASE . '/login');
        }
    }
    
    // manageStatics
    public function manageStatics(){
        if($this->checkUserSession() === true){
            if($_SESSION['u_type'] == 0){
                $statics = $this->model->getIndexStatics();
                $stitle_content = $this->model->getStitle();
                
                if(isset($_POST['_token'])){
                    $save_statics_token = $this->protect($_POST['_token']);
                    $real_token = $_SESSION['_token'];
                    if($save_statics_token === $real_token){
                        // statics
                        $statics_data = [];
                        for($x = 1; $x <= 5; $x++){
                            $arr = [
                                'id' => $x,
                                'ar' => $_POST['st_' . $x . '_ar'],
                                'en' => $_POST['st_' . $x . '_en'],
                                'tr' => $_POST['st_' . $x . '_tr'],
                                'num' => $_POST['num_' . $x],
                            ];
                            $statics_data[] = $arr;   
                        }
                        $update_statics = $this->model->updateStatics($statics_data);

                        // statics title
                        $stitle = [
                            'ar' => $this->protect($_POST['stitle_ar']),
                            'en' => $this->protect($_POST['stitle_en']),
                            'tr' => $this->protect($_POST['stitle_tr']),
                        ];
                        
                        $update_stitle = $this->model->updateStitle($stitle);
                        
                        if($update_statics != false && $update_stitle != false){
                            $this->view->update_statics_msg = '<span style="color:green">done</span>';
                            echo "<script>setTimeout(function(){location.href = '';}, 2400)</script>";
                            // $this->redirect(URL . ADMIN_BASE . '/manage-statics');
                        }
                    }else{
                        $this->view->update_statics_msg = 'Invalid token';
                    }
                    // regenerate token
                    $this->view->_token = $this->genToken('_token');
                }else{
                    // generate token 
                    $this->view->_token = $this->genToken('_token');
                }

                if($statics !== false)
                    $this->view->statics = $statics;
                else
                    $this->view->statics = [];

                if($stitle_content !== false)
                    $this->view->stitle = $stitle_content[0];
                else
                    $this->view->statics = [];
                
                $this->view->view('/admin/manage-statics');
            }else{
                $this->view->view('/admin/permission-denied');
            }
        }else{
            $this->redirect(URL . ADMIN_BASE . '/login');
        }
    }
    // manage sliders
    public function manageSliders(){
        if($this->checkUserSession() === true){
            $sliders = $this->model->getSliders();
            if($sliders !== false)
                $this->view->sliders = $sliders;
            else
                $this->view->sliders = [];
            // create new slider method
            $this->newSlider();
            // edit slider
            if(isset($_POST['_token'])){
                $save_slider_token = $this->protect($_POST['_token']);
                $real_token = $_SESSION['_token'];
                if($save_slider_token === $real_token){

                    $id = intval($_POST['slider-id']);
                    $img = $this->protect($_POST['slider-img']);
                    // $content = $this->protect($_POST['slider-content']);
                    $url = $this->protect($_POST['slider-url']);

                    $sl = [
                        'id' => $id,
                        'img' => $img,
                        'content' => 'content',
                        'url' => $url,
                    ];

                    $uslider = $this->model->updateSlider($sl);
                    if($uslider !== false){
                        $this->view->update_slider_msg = "Done";
                        echo "<script>setTimeout(function(){location.href = '';}, 2000)</script>";
                    }
                    // echo "<pre>";
                    // echo var_dump($uslider);
                    // echo var_dump($_POST);
                }else{
                    $this->view->update_slider_msg = 'Invalid token';
                }
                // regenerate token 
                $this->view->_token = $this->genToken('_token');
            }else{
                // generate token 
                $this->view->_token = $this->genToken('_token');
            }
            $this->delSlider();
            $this->view->view('/admin/manage-sliders');
        }else{
            $this->redirect(URL . ADMIN_BASE . '/login');
        }
    }


    // delete slider
    public function delSlider(){
        if(isset($_GET['del'])){
            $id = intval($_GET['del']);
            if($id != 0){
                $del_slider = $this->model->deleteSliderById($id);
                // echo var_dump($del_slider);
                if($del_slider != false || $del_slider != null){
                    /// echo "Deleted";
                    // maybe we will add confirmation here
                    $this->redirect(URL . ADMIN_BASE . '/manage-sliders');
                }
            }
        }
    }

    // new slider
    public function newSlider(){
        if($this->checkUserSession() === true){
            if(isset($_POST['_token_new_slider'])){
                $new_slider_token = $this->protect($_POST['_token_new_slider']);
                $real_token = $_SESSION['_token'];
                if($new_slider_token === $real_token){
                    
                    $img = $this->protect($_POST['slider-img']);
                    // $content = $this->protect($_POST['slider-content']);
                    $url = $this->protect($_POST['slider-url']);
                    $user = $_SESSION['u_id'];
                    
                    
                    $sl = [
                        'img' => $img,
                        'content' => 'content',
                        'url' => $url,
                        'user' => $user,
                    ];
                    // echo "<pre>";
                    // print_r($_POST);
                    $nslider = $this->model->newSlider($sl);
                    if($nslider !== false){
                        $this->view->new_slider_msg = "New Slider Created";
                        echo "<script>setTimeout(function(){location.href = '';}, 2000)</script>";
                    }
                    // echo "<pre>";
                    // echo var_dump($uslider);
                    // echo var_dump($_POST);
                }else{
                    $this->view->new_slider_msg = 'Invalid token : New slider';
                }
                // regenerate token 
                $this->view->_token = $this->genToken('_token');
            }
        }else{
            $this->redirect(URL . ADMIN_BASE . '/login');
        }
    }

    // manage about
    public function manageAbout(){
        if($this->checkUserSession() == true){
            if(isset($_POST['_token'])){
                $about_token = $this->protect($_POST['_token']);
                $real_token = $_SESSION['_token'];
                
                if($about_token === $real_token){
                    
                    $content = $this->protect($_POST['about-content']);
                    $the_lang = $this->protect($_POST['the_lang']);

                    $update_ab = $this->model->updateAbout($content,$the_lang);
                    if($update_ab == false){
                        $this->view->update_about_msg = "Unale to update about";
                    }
                }
                // regenerate token 
                $this->view->_token = $this->genToken('_token');
            }else{
                // generate token 
                $this->view->_token = $this->genToken('_token');
            }
            if(isset($_GET['ab_lang'])){
                $ab_lang = $_GET['ab_lang'];
                $ab_lang = strtolower($ab_lang);
                $true_ab = $ab_lang == 'ar' || $ab_lang == 'en' || $ab_lang = 'tr';
                if(!$true_ab)
                    $ab_lang = 'ar';
            }else{
                $ab_lang = 'ar';
            }
            $about = $this->model->getAbout();

            if($about != false){
                $this->view->about = $about[0];
            }else{
                $this->view->about_content = null;
            }
            
            $this->view->ab_lang = $ab_lang;
            $this->view->view('/admin/manage-about');
        }else{
            $this->redirect(URL . ADMIN_BASE . '/login');
        }
    }
    
    // logout
    public function logout(){
        session_destroy();
        $this->redirect(ADMIN_PATH);
    }
    
}
?>