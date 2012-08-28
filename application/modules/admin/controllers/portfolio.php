<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of portfolio
 *
 * @author satriaprayoga
 */
class Portfolio extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('portfolio_model');
    }

    public function index() {
        $uri = $this->uri->segment(3);
        $offset = (!empty($uri) && is_numeric($uri)) ? $uri : 0;
        $per_page = 6;
        $portfolio_data = $this->portfolio_model->page($per_page, $offset);
        $total = count($this->portfolio_model->find_all());
        $this->load->library('pagination');
        $data['portfolios'] = $portfolio_data;
        $config = array();
        $config['base_url'] = site_url('admin/portfolio/index');
        $config['total_rows'] = $total;
        $config['per_page'] = $per_page;
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
        $this->view('portfolio/index', $data);
    }

    public function create() {
        $this->load->library('form_validation');
        $this->load->helper('year');
        $this->form_validation->set_error_delimiters('<div class="alert alert-error"><strong>Error: </strong>', '</div>');
        $this->form_validation->set_rules('year', 'Year', 'trim|required|xss_clean');
        $this->form_validation->set_rules('project', 'Project', 'trim|required|xss_clean');
        $data['action'] = 'admin/portfolio/create';
        if ($this->form_validation->run() == FALSE) {
            $portfolio_data = array(
                'year' => $this->input->post('year'),
                'project'=>  $this->input->post('project'),
                'experties' => $this->input->post('experties'),
                'client' => $this->input->post('client'),
                'function' => $this->input->post('function'),
            );
            $data['portfolio_data'] = $portfolio_data;
            $this->view('portfolio/form', $data);
        } else {
            $portfolio_data = array(
                'year' => $this->input->post('year'),
                'project'=>  $this->input->post('project'),
                'experties' => $this->input->post('experties'),
                'client' => $this->input->post('client'),
                'function' => $this->input->post('function'),
            );
            $this->portfolio_model->create($portfolio_data);
            redirect(site_url('admin/portfolio/'));
        }
    }
    
    public function edit($id){
        $this->load->library('form_validation');
        $this->load->helper('year');
        $portfolio=  $this->portfolio_model->find_by_id($id);
        $this->form_validation->set_error_delimiters('<div class="alert alert-error"><strong>Error: </strong>', '</div>');
        $this->form_validation->set_rules('year', 'Year', 'trim|required|xss_clean');
        $this->form_validation->set_rules('project', 'Project', 'trim|required|xss_clean');
        $data['action'] = 'admin/portfolio/edit/'.$id;
        if ($this->form_validation->run() == FALSE) {
            $portfolio_data = array(
                'year' => $portfolio->year,
                'project'=>  $portfolio->project,
                'experties' => $portfolio->experties,
                'client' => $portfolio->client,
                'function' => $portfolio->function,
            );
            $data['portfolio_data'] = $portfolio_data;
            $this->view('portfolio/form', $data);
        } else {
            $portfolio_data = array(
                'year' => $this->input->post('year'),
                'project'=>  $this->input->post('project'),
                'experties' => $this->input->post('experties'),
                'client' => $this->input->post('client'),
                'function' => $this->input->post('function'),
            );
            $this->portfolio_model->update($id,$portfolio_data);
            redirect(site_url('admin/portfolio/'));
        }
    }
    
    public function delete($id){
        $this->portfolio_model->delete($id);
        redirect(site_url('admin/portfolio'));
    }

}