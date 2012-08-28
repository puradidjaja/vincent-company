<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user_model
 *
 * @author satriaprayoga
 */
class User_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->table_name = 'user';
    }

    public function create(array $data) {
        $user_id = parent::create(array(
                    'email' => $data['email'],
                    'password' => sha1($data['password']),
                    'role' => $data['role']
                ));
        return $user_id;
    }

    public function find_by_email($email) {
        return $this->query(array('email' => $email));
    }

    public function update_last_ip($user_id) {
        $this->db->update($this->table_name, array('last_ip' => $this->input->ip_address()), array('id' => $user_id));

        return $user_id;
    }

    public function update_last_logged_in($user_id) {
        $now = date('Y-m-d H:i:s');
        $this->db->update($this->table_name, array('last_logged_in' => $now), array('id' => $user_id));

        return $user_id;
    }

    public function update_password($password, $user_id) {
        $this->db->update($this->table_name, array('password' => $password), array('id' => $user_id));

        return $user_id;
    }

    public function update_email($email, $user_id) {
        $this->db->update($this->table_name, array('email' => $email), array('id' => $user_id));

        return $user_id;
    }

    public function login($data = array()) {
        $query = $this->db->get_where($this->table_name, array('email' => $data['email'],
            'password' => sha1($data['password'])));
        $user_id = 0;
        $is_valid = ($query->num_rows() > 0);
        if ($is_valid == TRUE) {
            $user_id = $query->row()->id;
            $this->update_last_logged_in($user_id);
            $this->update_last_ip($user_id);
        }

        return $user_id;
    }

}

