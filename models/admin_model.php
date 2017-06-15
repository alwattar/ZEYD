<?php

class Admin_Model extends Model{
    
    public function __construct(){
        parent::__construct();
    }


    // get all section
    public function getSections(){
        return $this->db->table('sections')->select('sec_id,sec_logo,sec_name,sec_id');
    }


    public function newArticle($a){
        $new_acl = $this->db->table('articles')
                 ->insert('(acl_section,acl_title,acl_lang,acl_date,acl_img,acl_content,acl_user) VALUES(:acl_section,:acl_title,:acl_lang,:acl_date,:acl_img,:acl_content,:acl_user)', $a);

        return $new_acl;
    }

    public function loginToAdmin($ld){
        $u_cond = 'WHERE u_nick = "'. $ld['user_name'] .'" ';
        $u_cond .= 'AND u_pass = "'. $ld['user_pass'] .'" ';
        $login = $this->db->table('users')
               ->at($u_cond)
               ->select("*");

        return $login;
    }
}
?>
