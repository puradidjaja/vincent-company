<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of account
 *
 * @author satriaprayoga
 */
class Account extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('account_model');
        $this->load->model('user_model');
    }

    public function index() {
        $uri = $this->uri->segment(3);
        $offset = (!empty($uri) && is_numeric($uri)) ? $uri : 0;
        $item = 10;
        $account = $this->account_model->page($item, $offset);
        $total_account = count($this->account_model->find_all());

        $data = array();
        $accounts = array();
        foreach ($account as $key => $m) {
            $accounts[] = array(
                'id' => $m['id'],
                'name' => $m['name'],
                'email' => $this->user_model->find_by_id($m['user_id'])->email,
                'last_login' => $this->user_model->find_by_id($m['user_id'])->last_logged_in,
                'last_ip' => $this->user_model->find_by_id($m['user_id'])->last_ip
            );
        }
        $data['accounts'] = $accounts;
        $this->load->library('pagination');

        $config = array();
        $config['base_url'] = site_url('admin/account/index');
        $config['total_rows'] = $total_account;
        $config['per_page'] = $item;
        $config['full_tag_open'] = '<div class="pagination"><ul>';
        $config['full_tag_close'] = '</ul></div>';
        $config['first_link'] = '&larr; First';
        $config['last_link'] = 'Last &rarr;';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Previous';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['num_links'] = 4;
        $config['use_page_numbers'] = TRUE;

        $this->pagination->initialize($config);
        $this->view('account/index', $data);
    }

    public function create() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-error"><strong>Error: </strong>', '</div>');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|xss_clean|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
        $data['action'] = 'admin/account/create';
        if ($this->form_validation->run() === FALSE) {
            $account_data = array(
                'email' => $this->input->post('email'),
                'password' => '',
                'role' => '',
                'name' => $this->input->post('name')
            );
            $data['account_data'] = $account_data;
            $this->view('account/form', $data);
        } else {
            $user_data = array(
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'role' => $this->input->post('role')
            );
            $user_id = $this->user_model->create($user_data);
            $account_data = array(
                'user_id' => $user_id,
                'name' => $this->input->post('name'),
                'avatar_url' => base_url() . 'uploads/images/blank.jpg',
                'link'=>  $this->_strip($this->input->post('name')).'-'.date('Y-m-d')
            );
            $account_id = $this->account_model->create($account_data);
            redirect(site_url('admin/account/detail/' . $account_id));
        }
    }

    public function detail($id) {
        $account = $this->account_model->find_by_id($id);
        $user = $this->user_model->find_by_id($account->user_id);
        $data = array('account' => $account, 'user' => $user);
        $this->view('account/detail', $data);
    }
    
     public function edit($id) {
        $account = $this->account_model->find_by_id($id);
        $user = $this->user_model->find_by_id($account->user_id);
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-error"><strong>Error: </strong>', '</div>');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
        
        $data['action'] = 'admin/account/edit/'.$id;
        if ($this->form_validation->run() === FALSE) {
            $account_data = array(
                'email' => $user->email,
                'password' => '',
                'role' => $user->role,
                'name' => $account->name
            );
            $data['account_data'] = $account_data;
            $this->view('account/form', $data);
        } else {
            $user_data = array(
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'role' => $this->input->post('role')
            );
            $this->user_model->update($user->id,$user_data);
            $account_data = array(
                'user_id' => $user->id,
                'name' => $this->input->post('name'),
            );
            $this->account_model->update($account->id,$account_data);
            redirect(site_url('admin/account/detail/' . $id));
        }
    }
    
    public function delete($id){
       $account= $this->account_model->find_by_id($id);
       $user=  $this->user_model->find_by_id($account->user_id);
       $this->user_model->delete($user->id);
       $this->account_model->delete($id);
      
       redirect(site_url('admin/account'));
    }

}
