<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of product
 *
 * @author satriaprayoga
 */
class Product extends Admin_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('product_model');
    }
    
    public function index() {
        $uri = $this->uri->segment(4);
        $offset = (!empty($uri) && is_numeric($uri)) ? $uri : 0;
        $per_page = 10;
        $product_data = $this->product_model->page($per_page, $offset);
        $total = count($this->product_model->find_all());
        $this->load->library('pagination');
        $data['products'] = $product_data;
        $config = array();
        $config['uri_segment'] = '4';
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
    
    public function create(){
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-error"><strong>Error: </strong>', '</div>');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('tags', 'Tags', 'trim|xss_clean');
        $this->form_validation->set_rules('description', 'Description', 'trim|xss_clean');
        $data['action'] = 'admin/product/create';
        if($this->form_validation->run()==FALSE){
            $product_data=array(
                'name'=>  $this->input->post('name'),
                'description'=>  $this->input->post('description'),
                'image_url' => $this->input->post('image_url'),
                'thumb'=> $this->input->post('thumb'),
                'tags'=>  $this->input->post('tags'),
                'type'=> $this->input->post('type')
            );
            $data['product_data']=$product_data;
            $this->view('product/form',$data);
        }else{
            $product_data=array(
                'name'=>  $this->input->post('name'),
                'description'=>  $this->input->post('description'),
                'image_url' => $this->input->post('image_url'),
                'tags'=>  $this->input->post('tags'),
                'thumb'=> $this->input->post('thumb'),
                'is_gallery'=>$this->input->post('is_gallery'),
                'type'=> $this->input->post('type'),
                'link'=>  $this->_strip($this->input->post('name')).date('Y-m-d')
            );
            $product_id=$this->product_model->create($product_data);
            redirect(site_url('admin/product/detail/'.$product_id));
        }
    }
    
    public function detail($id){
        $product = $this->product_model->find_by_id($id);
        $data['product']=$product;
        $this->view('product/detail', $data);
    }
    
    public function edit($id){
        $this->load->library('form_validation');
        $product=  $this->product_model->find_by_id($id);
        $this->form_validation->set_error_delimiters('<div class="alert alert-error"><strong>Error: </strong>', '</div>');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('tags', 'Tags', 'trim|xss_clean');
        $this->form_validation->set_rules('description', 'Description', 'trim|xss_clean');
        $data['action'] = 'admin/product/edit/'.$id;
        if($this->form_validation->run()==FALSE){
            $product_data=array(
                'name'=>  $product->name,
                'description'=>  $product->description,
                'image_url' => $product->image_url,
                'thumb' => $product->thumb,
                'tags'=>  $product->tags,
                'type'=> $this->input->post('type')
            );
            $data['product_data']=$product_data;
            $this->view('product/form',$data);
        }else{
            $product_data=array(
                'name'=>  $this->input->post('name'),
                'description'=>  $this->input->post('description'),
                'image_url' => $this->input->post('image_url'),
                'tags'=>  $this->input->post('tags'),
                'thumb'=> $this->input->post('thumb'),
                'is_gallery'=>$this->input->post('is_gallery'),
                'type'=> $this->input->post('type')
               
            );
            $this->product_model->update($product->id,$product_data);
            redirect(site_url('admin/product/detail/'.$id));
        }
    }
    
    public function delete($id){
        $this->product_model->delete($id);
        redirect('admin/product');
    }

    

}
