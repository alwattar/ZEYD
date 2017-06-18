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
        return $this->db->table('sections')->select('sec_id,sec_logo,sec_name,sec_id');
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
                 ->insert("(sec_name, sec_logo, sec_user) VALUES(:sec_name,:sec_logo, :sec_user)", $section_data);

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
             ->at("inner join sections on sections.sec_id = articles.acl_section WHERE articles.acl_id = '". $id ."'")->select("articles.*,sections.sec_id, sections.sec_name");
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

    // delete user
    public function deleteUserById($id){
        $del = $this->db->table('users')->at('WHERE u_id = '. intval($id))->delete();
        return $del;
    }
}
?>
