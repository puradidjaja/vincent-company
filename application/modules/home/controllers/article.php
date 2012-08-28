<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of article
 *
 * @author satriaprayoga
 */
class Article extends Home_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('article_model');
    }
    
    public function index(){
        $uri = $this->uri->segment(3);
        $offset = (!empty($uri) && is_numeric($uri)) ? $uri : 0;
        $per_page = 6;
        $article_data = $this->article_model->page($per_page, $offset);
        $total = count($this->article_model->find_all());
        $this->load->library('pagination');
        $data['articles'] = $article_data;
        $config = array();
        $config['base_url'] = site_url('article/index');
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
        $this->view('article/index', $data);
    }
    
    public function show($link){
        $data['article']=  $this->article_model->find_by_link($link);
        $this->view('article/view',$data);
    }
}

