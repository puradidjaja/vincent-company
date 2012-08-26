<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Account_model
 *
 * @author satriaprayoga
 */
class Account_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->table_name = 'account';
    }

    public function find_by_user_id($id) {
        $q = $this->db->get_where($this->table_name, array('id' => $id));
        return $q->row();
    }
    
    
}

