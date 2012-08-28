<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of comment_model
 *
 * @author satriaprayoga
 */
class Comment_model extends MY_Model{
    
    public function __construct() {
        parent::__construct();
        $this->table_name='comment';
    }
    
    public function find_by_article_id($article_id){
        return $this->query_object_list(array('article_id'=>$article_id));
    }
}
