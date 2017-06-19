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

    // get all artiles as Sessio lang
    public function getArticleById($id){
        return $this->db->table('articles')
            ->at('inner join sections on sections.sec_id = articles.acl_section where acl_id = ' . $id)
            ->select('articles.acl_id,articles.acl_views, articles.acl_section, articles.acl_title, articles.acl_img, articles.acl_content,articles.acl_date,articles.acl_user, sections.sec_id,sections.sec_name');
    }

    // update article views
    public function updateArtViews($id, $v){
        $this->db->table('articles')
            ->at('WHERE acl_id = ' . $id)
            ->update('acl_views = :v', [ 'v' => $v + 1]);
    }

    // get Section By Id
    public function getSectionById($id){
        $section = $this->db->table('sections')
                 ->at('WHERE sec_id = ' . $id)
                 ->select("sec_id,sec_name,sec_logo");

        return $section;
    }

    // get all artiles as Sessio lang
    public function getArticlesForPage($id, $l_from , $l_to){
        return $this->db->table('articles')
            ->at('WHERE acl_section = ' . $id . ' AND acl_lang = "' . $_SESSION["dlang"] . '" LIMIT ' . $l_from . ', ' . $l_to)
            ->select('acl_id, acl_section, acl_title, acl_img, acl_content,acl_date,acl_user');
    }
}

?>
