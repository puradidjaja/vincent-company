<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dashboard
 *
 * @author satriaprayoga
 */
class Admin extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('profile_model');
        $this->load->model('logger_model');
    }

    public function index() {
        $profile = $this->profile_model->find_profile();
        $data['daily'] = $this->logger_model->find_daily_log();
        $data['monthly'] = $this->logger_model->find_monthly_log();
        $data['yearly'] = $this->logger_model->find_yearly_log();
        $data['total'] = $this->logger_model->find_all();
        $data['profile'] = $profile;
        $this->load->view('dashboard/index', $data);
    }

    public function update_profile($id) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'valid_email');
        if ($this->form_validation->run() === FALSE) {
            $data['daily'] = $this->logger_model->find_daily_log();
            $data['monthly'] = $this->logger_model->find_monthly_log();
            $data['yearly'] = $this->logger_model->find_yearly_log();
            $data['total'] = $this->logger_model->find_all();
            $data['profile'] = $this->profile_model->find_by_id($id);
            $this->load->view('admin/index', $data);
        } else {
            $profile_data = array(
                'addr_x' => $this->input->post('latlng'),
                'addr_y' => $this->input->post('latlngy'),
                'address' => $this->input->post('address'),
                'email' => $this->input->post('email'),
                'contact' => $this->input->post('contact'),
                'about' => $this->input->post('content'),
                'logo' => $this->input->post('logo')
            );
            $this->profile_model->update($id, $profile_data);
            redirect(site_url('admin/index'));
        }
    }

    public function logo_form() {
        $this->load->view('dashboard/logo_form');
    }

    public function upload_logo() {
        $result = $this->profile_model->upload_logo();
        if (isset($result['error'])) {
            $this->load->view('dashboard/logo_form', $result);
        } else {
            $result['success_upload'] = 'dashboard/logo_form_success';
            $this->load->view('dashboard/logo_form', $result);
        }
    }

}
