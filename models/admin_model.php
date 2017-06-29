<?php

class Admin_Model extends Model{
    
    public function __construct(){
        parent::__construct();
    }
    
    // login querys
    public function loginToAdmin($ld){
        $u_cond = 'WHERE u_nick = "'. $ld['user_name'] .'" ';
        $u_cond .= 'AND u_pass = "'. $ld['user_pass'] .'" ';
        $login = $this->db->table('users')
               ->at($u_cond)
               ->select("*");

        $this->db->table('users')
            ->at($u_cond)
            ->update('u_lastlogin = NOW()');
        return $login;
    }

    // get all section
    public function getSections(){
        return $this->db->table('sections')->select('sec_id,sec_logo,sec_name_ar,sec_name_en,sec_name_tr,sec_id');
    }

    // insert new article
    public function newArticle($art_data){
        $new_acl = $this->db->table('articles')
                 ->insert('(acl_section,acl_title,acl_lang,acl_date,acl_img,acl_content,acl_user) VALUES(:acl_section,:acl_title,:acl_lang,:acl_date,:acl_img,:acl_content,:acl_user)', $art_data);

        return $new_acl;
    }

    // update new article
    public function updateArticle($art_data){
        $new_acl = $this->db->table('articles')
                 ->at("WHERE acl_id = :acl_id")
                 ->update('acl_section = :acl_section, acl_title = :acl_title, acl_lang = :acl_lang, acl_img = :acl_img, acl_content = :acl_content', $art_data);
        echo var_dump($this->db);
        return $new_acl;
    }

    // insert new section
    public function createSection($section_data){
        $new_sec = $this->db->table('sections')
                 ->insert("(sec_name_ar, sec_logo, sec_user) VALUES(:sec_name_ar,:sec_logo, :sec_user)", $section_data);

        return $new_sec;
    }

    // get all articles
    public function getAllArticles(){
        $all_art = $this->db->table('articles')->at("inner join users on users.u_id = articles.acl_user")->select("articles.*,users.u_id, users.u_name");
        return $all_art;
    }

    
    // get all articles
    public function getArticleById($id){
        $art = $this->db->table('articles')
             ->at("inner join sections on sections.sec_id = articles.acl_section WHERE articles.acl_id = '". $id ."'")->select("articles.*,sections.sec_id, sections.sec_name_ar,sections.sec_name_en,sections.sec_name_tr");
        return $art;
    }

    // delete article
    public function deleteArtById($id){
        $del = $this->db->table('articles')->at('WHERE acl_id = '. intval($id))->delete();
        return $del;
    }

    // Create new user
    public function newUser($user_data){
        $c_new_user = $this->db
                    ->table('users')
                    ->insert('(u_name, u_nick, u_email, u_pass, u_type, u_lastlogin) VALUES(:u_name, :u_nick, :u_email, :u_pass, :u_type, :u_lastlogin)', $user_data);

        return $c_new_user;
    }

    // get all users
    public function getAllUsers(){
        $users = $this->db->table('users')->select("*");

        return $users;
    }

    // get user by id
    public function getUserById($id){
        $art = $this->db->table('users')
             ->at("WHERE u_id = '". $id ."'")->select("*");
        return $art;
    }
    
    // delete user
    public function deleteUserById($id){
        $del = $this->db->table('users')->at('WHERE u_id = '. intval($id))->delete();
        return $del;
    }

    // edit User
    public function editUser($user_data){
        if(count($user_data) == 5){
            $edit_user = $this->db->table('users')
                       ->at("WHERE u_id = :u_id")
                       ->update('u_name = :u_name, u_nick = :u_nick, u_email = :u_email, u_type = :u_type', $user_data);
        }elseif(count($user_data) == 6){
            $edit_user = $this->db->table('users')
                       ->at("WHERE u_id = :u_id")
                       ->update('u_name = :u_name, u_nick = :u_nick, u_email = :u_email, u_type = :u_type, u_pass = :u_pass', $user_data);
        }
        return $edit_user;
    }

    // update statics
    public function updateStatics($sta){
        $bool_results = [];
        foreach($sta as $st){
            $update = $this->db->table('statics')
                    ->at('WHERE st_id = :id')
                    ->update("st_ar_text = :ar, st_en_text = :en, st_tr_text = :tr, st_number = :num", $st);
            $bool_results[] = $update;
        }

        if(in_array(false, $bool_results)){
            return false;
        }else{
            return true;
        }
    }

    // get index statics
    public function getIndexStatics(){
        $statics = $this->db->table('statics')->select('*');
        return $statics;
    }

    // get sliders
    public function getSliders(){
        $sliders = $this->db->table('slider')
                 ->at(' inner join users on slider.sl_user = users.u_id')
                 ->select('users.u_name, slider.*');
        return $sliders;
    }

    public function updateSlider($sl){
        $sl_update = $this->db->table('slider')
                   ->at('where sl_id = :id')
                   ->update('sl_url = :url, sl_content = :content, sl_img = :img', $sl);
        return $sl_update;
    }

    // delete slider
    public function deleteSliderById($id){
        $del = $this->db->table('slider')->at('WHERE sl_id = '. intval($id))->delete();
        return $del;
    }

    // insert new section
    public function newSlider($sl){
        $new_slider = $this->db->table('slider')
                 ->insert("(sl_img, sl_content, sl_url,sl_user) VALUES(:img, :content, :url, :user)", $sl);

        return $new_slider;
        
    }

    // get about content
    public function getAbout(){
        $about = $this->db->table('about')->select("*");
        return $about;
    }

    // update about content
    public function updateAbout($content , $lang){
        $uabout = $this->db->table('about')
               ->update("ab_" . $lang . "_content = '" . $content . "'");
        return $uabout;
    }

    public function updateStitle($st){
        $st = $this->db
            ->table('stitle')
            ->at('where stitle_id = 1')
            ->update('stitle_ar = :ar, stitle_en = :en, stitle_tr = :tr', $st);
        return $st;
    }

    public function getStitle(){
        $sti = $this->db->table('stitle')->select("*");
        return $sti;
    }
}
?>
