<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of store_model
 *
 * @author satriaprayoga
 */
class Store_model extends MY_Model{
    
    public function __construct() {
        parent::__construct();
        $this->table_name='branch';
    }
    
    public function find_by_area_id($id){
        return $this->query_object_list(array('area_id'=>$id));
    }
}