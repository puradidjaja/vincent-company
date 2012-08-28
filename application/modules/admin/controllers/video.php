<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of video
 *
 * @author satriaprayoga
 */
class Video extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('video_model');
    }
    
    public function index(){
        $uri = $this->uri->segment(4);
        $offset = (!empty($uri) && is_numeric($uri)) ? $uri : 0;
        $per_page = 5;
        $video_data = $this->video_model->page($per_page, $offset);
        $total = count($this->video_model->find_all());
        $this->load->library('pagination');
        $data['videos'] = $video_data;
        $config = array();
        $config['uri_segment'] = '4';
        $config['base_url'] = site_url('admin/video/index');
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
       
        $this->pagination->initialize($config);
        $this->view('video/index', $data);
    }
    
    public function create(){
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-error"><strong>Error: </strong>', '</div>');
        $this->form_validation->set_rules('source', 'Source', 'trim|required|xss_clean');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
        $data['action']='admin/video/create';
        if($this->form_validation->run()===FALSE){
              $video_data['source']=  $this->input->post('source');
              $video_data['thumbnail_src']=  $this->input->post('thumbnail_src');
              $video_data['name']=  $this->input->post('name');
              $data['video_data']=$video_data;
              $this->view('video/create',$data);
        }else{
            $video_data=array(
                'name'=>  $this->input->post('name'),
                'src'=>  $this->input->post('source'),
                'thumbnail_src'=>  $this->input->post('thumbnail_src')
            );
            $this->video_model->create($video_data);
            redirect(site_url('admin/video'));
        }
      
    }
    
    public function edit($id){
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-error"><strong>Error: </strong>', '</div>');
        $this->form_validation->set_rules('source', 'Source', 'trim|required|xss_clean');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
        $data['action']='admin/video/edit/'.$id;
        $video=  $this->video_model->find_by_id($id);
        if($this->form_validation->run()===FALSE){
              $video_data['source']=  $video->src;
              $video_data['thumbnail_src']=  $video->thumbnail_src;
              $video_data['name']=  $video->name;
              $data['video_data']=$video_data;
              $this->view('video/create',$data);
        }else{
            $video_data=array(
                'name'=>  $this->input->post('name'),
                'src'=>  $this->input->post('source'),
                'thumbnail_src'=>  $this->input->post('thumbnail_src')
            );
            $this->video_model->update($id,$video_data);
            redirect(site_url('admin/video'));
        }
    }
    
    public function play($id){
        $video=$this->video_model->find_by_id($id);
        $data['video']=$video;
        $this->load->helper('youtube');
        $this->view('video/play',$data);
    }
    
    public function delete($id){
        $this->video_model->delete($id);
        redirect(site_url('admin/video'));
    }

}

