<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Base_Controller
 *
 * @author satriaprayoga
 */
class Home_Controller extends MY_Controller {

    var $data;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('profile_model');
        $profile = $this->profile_model->find_profile();
        $this->data['profile'] = $profile;
    }

    public function get_client_ip() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {   //check ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {   //to check ip is pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    public function view($viewName, $data = array()) {
        $data['profile'] = $this->data['profile'];
        $this->load->view($viewName, $data);
    }

}

