<?php

class Index extends Controller{
    
    public function __construct(){
        parent::__construct();
        $this->view->dlang = $this->dlang;
    }

    public function subscribe(){
        if(isset($_POST['_token'])){
            $subscribe_token = $this->protect($_POST['_token']);
            $real_token = $_SESSION['_token'];
            if($subscribe_token == $real_token){
                $email = $this->protect($_POST['subemail']);
                $true_email = $this->withRule($email, REGEX_EMAIL);
                if($true_email){
                    $subsc = $this->model->subscribe($email);
                    if($subsc === false){
                        $this->view->subscribe_msg = "<br/>This Email exists!";
                    }else{
                        $this->view->subscribe_msg = "Subscribe Done!";
                    }
                }else{
                    $this->view->subscribe_msg = 'Invalid email !!';
                }
            }else{
                $this->view->subscribe_msg = 'Invalid TOKEN !!';
            }
            // generate token
            $this->view->_token = $this->genToken('_token');
        }else{
            // generate token
            $this->view->_token = $this->genToken('_token');
        }
    }
    
    public function getAllSections(){
        $sections = $this->model->getSections();
        if($sections !== false && is_array($sections))  // if sections > 0
            $this->view->sections = $sections;
        else  // if sections == 0
            $this->view->sections = [false];
    }
    public function getStitle(){
        // get sliders
        $stitle = $this->model->getStitle();
        if($stitle != false){
            $this->view->stitle = $stitle[0];
        }else{
            $this->view->stitle = null;
        }
    }
    
    public function allSliders(){
        // get sliders
        $sliders = $this->model->getSliders();
        if($sliders != false){
            $this->view->sliders = $sliders;
        }else{
            $this->view->sliders = null;
        }
    }
    // Index Method
    public function index(){
        $this->subscribe();
        $this->getStitle();
        $this->allSliders();
        // get statics
        $this->view->statics = $this->model->getIndexStatics();
        // this to get all sections from db
        $this->getAllSections();

        // Articel of section
        // $acls = $this->model->getArticles(2);
        // foreach($acls as $k => $v){
        //     $date_vc = strtotime(str_ireplace("/", "-", $v->acl_date));
        //     echo var_dump(date('Y-m-d', $date_vc));
        // }
        // echo var_dump("--------");
        // foreach($acls as $k => $v){
        //     echo var_dump($v->acl_date);
        // }
        $this->view->a_o_s = function($section_id){
            // all artiles
            // acls == articles
            $acls = $this->model->getArticles($section_id);
            if($acls !== false && is_array($acls)){  // if acls > 0
                $acls = $acls;
            }
            else  // if acls == 0
                $acls = [];
            return $acls;
        };
        
        $this->view->view("index");
    }

    // view Section
    public function viewSection(){
        $this->subscribe();
        $this->getAllSections();
        $this->allSliders();
        // if set sec id get parameterss
        if(isset($_GET['sec'])){
            $id = intval($_GET['sec']);
            if($id <= 0) // if not
                $this->redirect(URL . '/index');
            // get section info (name)
            $section = $this->model->getSectionById($id);
            if($section !== false){
                $this->view->sec = $section[0];
                // max-number of articles on each page
                $articles = $this->model->getArticles($id);
                if($articles !== false){
                    // articles count
                    $this->view->arts_count = count($articles);
                    // articles count number of articles in each page of section
                    $this->view->number_of_arts = 16;
                    // pages number of this section
                    $this->view->max_pages = ceil($this->view->arts_count / $this->view->number_of_arts);
                    // page number setted
                    if(isset($_GET["p"])){
                        $this->view->pnum = intval($_GET['p']);
                        if($this->view->pnum <= 0)
                            $this->redirect(URL . '/index');
                        
                    }else
                        $this->view->pnum = 1;
                    if($this->view->pnum == 0){
                        $this->view->pnum = 1;
                    }

                    $this->limit_to = $this->view->pnum * $this->view->number_of_arts; // 3 * 12 = 36
                    $this->limit_from = $this->limit_to - $this->view->number_of_arts; // 36 - 12 = 24
                    $articles = $this->model->getArticlesForPage($id, $this->limit_from, $this->view->number_of_arts);
                    
                    $this->view->arts = $articles;
                }else{
                    $this->view->arts_count = 0;
                    $this->view->max_pages = 0;
                    $this->view->arts = [];
                }
                $this->view->view("section");
            }else{
                // echo "This section not exists<br/>";
                $this->view->view("404"); // you can design page to show results as a nice view
            }
                
        }else{
            $this->redirect(URL . '/index'); // if not            
        }
    }
    // view post
    public function viewPost(){
        $this->subscribe();
        $this->getAllSections();
        // if set id of article
        if(isset($_GET['art'])){
            $id = intval($_GET['art']);
            if($id === 0)
                $this->redirect(URL . '/index'); // if not
            
            $art = $this->model->getArticleById($id);
            if($art !== false){  // if article exists
                $this->view->art = $art[0];
                $this->model->updateArtViews($id,$art[0]->acl_views);  // add 1 view for article
                $this->view->view("post");
            }else{
                // echo "This article not found<br/>";
                $this->view->view("404"); // 404 for article
            }
        }else{
            $this->redirect(URL . '/index');
        }
    }

    // view about page
    public function viewAbout(){
        $this->subscribe();
        $about = $this->model->getAbout();
        $this->view->about = $about[0];
        $this->view->view("about");
    }

    // search
    public function search(){
        $this->subscribe();
        if(isset($_GET['q'])){
            $q = $_GET['q'];
            // safety checking
            $true_query = !$this->withRule($q, REGEX_SPECIAL_CHAR) && !strpos($q, '/');
            if($true_query){
                $q = $this->protect($q);
                $results = $this->model->qSearchResults($q);
                if($results != false){
                    $this->view->results = $results;
                }else{
                    $this->view->results = null;
                }
            }else{
                $this->view->results = null;
            }
        }else{
            $this->view->results = false;
        }
        $this->view->view("search");
    }
    
}
?>