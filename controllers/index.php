<?php

class Index extends Controller{
    
    public function __construct(){
        parent::__construct();
        $this->view->dlang = $this->dlang;
    }


    // Index Method
    public function index(){

        // this to get all sections from db
        $sections = $this->model->getSections();
        if($sections !== false && is_array($sections))  // if sections > 0
            $this->view->sections = $sections;
        else  // if sections == 0
            $this->view->sections = [false];

        // Articel of section
        $this->view->a_o_s = function($section_id){
            // all artiles
            // acls == articles
            $acls = $this->model->getArticles($section_id);
            if($acls !== false && is_array($acls))  // if acls > 0
                $acls = $acls;
            else  // if acls == 0
                $acls = [];
            return $acls;
        };
        
        $this->view->view("index");
    }
    
}
?>