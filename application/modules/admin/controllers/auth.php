<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of auth
 *
 * @author satriaprayoga
 */
class Auth extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function login() {
        $data = array();
        $data['email'] = '';
        $this->load->view('login', $data);
        if($this->is_logged_in()===TRUE){
            redirect(site_url('admin'));
        }
    }

    public function do_login() {
        $user_data = array(
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password')
        );
        $user_id = $this->user_model->login($user_data);
        if ($user_id > 0) {
            $user = $this->user_model->find_by_id($user_id);
            $this->create_login_session($user);
            $this->session->flashdata('flash_message', 'You are logged in');
            redirect(site_url('admin'));
        } else {
            $data = array();
            $data['login_error'] = 'Incorrect login';
            $data['email'] = $this->input->post('email');
            $this->load->view('login', $data);
        }
    }

    protected function create_login_session($user) {
        $session_data = array(
            'email_address' => $user->email,
            'user_id' => $user->id,
            'logged_in' => TRUE,
            'is_admin' => ($user->role == 1),
            'ip' => $this->input->ip_address()
        );
        $this->session->set_userdata($session_data);
    }

    public function logout() {
        $this->session->set_userdata(array(
            'user_id' => '',
            'email' => '',
            'role' => '',
            'logged_in' => FALSE
        ));
        $this->session->sess_destroy();
        redirect('admin/auth/login');
    }

    protected function is_logged_in() {
        $session_data = $this->session->all_userdata();
        return (isset($session_data['user_id']) && $session_data['user_id'] > 0 && isset($session_data['logged_in']) && $session_data['logged_in'] == TRUE);
    }

}
