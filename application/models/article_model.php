<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of article_model
 *
 * @author satriaprayoga
 */
class Article_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->table_name = 'article';
    }

    public function find_publish_article() {
        $query = $this->db->get_where($this->table_name, array('status' => 2, 'is_linked' => 1));
        return $query->result();
    }
    
    public function find_by_link($link){
        return $this->query(array('link'=>$link));
    }

    public function find_publish_limited($limit = 4,$is_linked=0) {
        $data = array();
        $this->db->select('article.*')->from($this->table_name)
                ->where(array('status' => 2, 'is_linked' => $is_linked))
                ->limit($limit)->order_by('create_date', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }

}
