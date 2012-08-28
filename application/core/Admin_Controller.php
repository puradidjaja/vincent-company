<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin_Controller
 *
 * @author satriaprayoga
 */
class Admin_Controller extends MY_Controller {

    var $data = array();

    public function __construct() {
        parent::__construct();
        if ($this->is_logged_in() === FALSE) {
            redirect(base_url('admin/auth/login'));
        } else {
            $this->load->model('profile_model');
            $profile = $this->profile_model->find_profile();
            $this->data['profile'] = $profile;
        }
    }

    public function view($viewName, $data = array()) {
        $data['profile'] = $this->data['profile'];
        $this->load->view($viewName, $data);
    }

    protected function _strip($source = '') {
        $stripped = str_replace(" ", "-", $source);
        return strtolower(preg_replace("/[^a-zA-Z0-9-]/", "", $stripped));
    }

    protected function get_user_data() {
        $user_session = $this->session->all_userdata();
        return $user_session;
    }

    protected function get_user_id() {
        $user_session = $this->session->all_userdata();
        return $user_session['user_id'];
    }

    protected function is_logged_in() {
        $session_data = $this->session->all_userdata();
        return (isset($session_data['user_id']) && $session_data['user_id'] > 0 && isset($session_data['logged_in']) && $session_data['logged_in'] == TRUE);
    }

    protected function is_admin() {
        $session_data = $this->session->all_userdata();
        return (isset($session_data['is_admin']) && $session_data['is_admin'] == 1);
    }

    protected function send_mail($to, $subject, $message) {
        $this->load->library('email');
        $this->email->from($this->config->item('from_email_address'));
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
    }

}