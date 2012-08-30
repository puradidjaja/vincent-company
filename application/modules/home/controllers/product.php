<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of product
 *
 * @author satriaprayoga
 */
class Product extends Home_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('product_model');
        $this->load->helper(array('fb','twitter','youtube'));
    }
    
    public function index() {
        $uri = $this->uri->segment(3);
        $offset = (!empty($uri) && is_numeric($uri)) ? $uri : 0;
        $per_page = 5;
        $product_data = $this->product_model->page($per_page, $offset);
        $total = count($this->product_model->find_all());
        $this->load->library('pagination');
        $data['products'] = $product_data;
        $config = array();
        $config['base_url'] = site_url('admin/product/index');
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
        $this->view('product/index', $data);
    }
    
    public function show($link){
        $data['product']=  $this->product_model->find_by_link($link);
        $this->view('product/detail',$data);
    }
}