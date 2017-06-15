<?php

class Index_Model extends Model{
    
    public function __construct(){
        parent::__construct();
    }

    // get all section
    public function getSections(){
        return $this->db->table('sections')->select('sec_id,sec_logo,sec_name,sec_id');
    }

    // get all artiles as Sessio lang
    public function getArticles($id){
        return $this->db->table('articles')
            ->at('where acl_section = ' . $id . ' and acl_lang = "' . $_SESSION["dlang"] . '"')
            ->select('acl_id, acl_section, acl_title, acl_img, acl_content,acl_date,acl_user');
    }
}

?>
