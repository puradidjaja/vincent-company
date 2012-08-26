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

    public function __construct() {
        parent::__construct();
        $this->load->model('logger_model');
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

    public function log_page($link='') {
        $ip = $this->get_client_ip();
        $now = date('Y-m-d h:i:s A');
        
        if(empty($link))
            $link=site_url ();
        $logger = $this->logger_model->find_by_day_and_link($ip,$link);
        if (count($logger) == 0) {
            $this->logger_model->create(array(
                'ip' => $ip,
                'date_time' => $now,
                'link' => $link
            ));
        }
    }

}

