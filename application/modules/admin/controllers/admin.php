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
       $this->load->model('statistic_model');
       $this->load->model('video_model');
    }

    public function index() {
        
        $data['daily'] = $this->statistic_model->find_daily_log();
        $data['monthly'] = $this->statistic_model->find_monthly_log();
        $data['yearly'] = $this->statistic_model->find_yearly_log();
        $data['total'] = $this->statistic_model->find_all();
        $data['videos']=  $this->video_model->find_all();
        $this->view('dashboard/index',$data);
    }

    public function update_profile($id) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'valid_email');
        $data['videos']=  $this->video_model->find_all();
        $this->form_validation->set_error_delimiters('<div class="alert alert-error"><strong>Error: </strong>', '</div>');
        if ($this->form_validation->run() === FALSE) {
            $data['daily'] = $this->logger_model->find_daily_log();
            $data['monthly'] = $this->logger_model->find_monthly_log();
            $data['yearly'] = $this->logger_model->find_yearly_log();
            $data['total'] = $this->logger_model->find_all();
            $data['profile'] = $this->profile_model->find_by_id($id);
            $data['videos']=  $this->video_model->find_all();
            $this->view('dashboard/index', $data);
        } else {
            $profile_data = array(
                'website_name'=>  $this->input->post('website_name'),
                'addr_x' => $this->input->post('latlng'),
                'addr_y' => $this->input->post('latlngy'),
                'address' => $this->input->post('address'),
                'email' => $this->input->post('email'),
                'contact' => $this->input->post('contact'),
                'about' => $this->input->post('content'),
                'logo' => $this->input->post('logo'),
                'logo_thumb'=>  $this->input->post('thumb'),
                'home_video'=> $this->input->post('home_video')
            );
            $this->profile_model->update($id, $profile_data);
            redirect(site_url('admin/index'));
        }
    }

    

}
