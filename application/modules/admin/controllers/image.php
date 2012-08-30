<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of image
 *
 * @author satriaprayoga
 */
class Image extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('image_model');
    }

    public function index() {
        $uri = $this->uri->segment(4);
        $offset = (!empty($uri) && is_numeric($uri)) ? $uri : 0;
        $per_page = 10;
        $image_data = $this->image_model->page($per_page, $offset);
        $total = count($this->image_model->find_all());
        $this->load->library('pagination');
        $data['images'] = $image_data;
        $config = array();
        $config['uri_segment'] = '4';
        $config['base_url'] = site_url('admin/image/index');
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
        $this->view('image/index', $data);
    }

    public function upload_form($is_gallery, $wysiwyg) {
        $data['is_gallery'] = $is_gallery;
        $data['wysiwyg'] = $wysiwyg;
        $this->view('image/dialog/base', $data);
    }

    public function upload($wysiwyg) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('userfile', 'Upload');
         $result['wysiwyg'] = $wysiwyg;
        if ($this->form_validation->run() === TRUE) {
            $result = $this->image_model->upload();
            $result['wysiwyg'] = $wysiwyg;
            if (isset($result['error'])) {
                $this->view('image/dialog/upload', $result);
            } else {
                $result['success_upload'] = 'image/dialog/upload_success';
                $this->view('image/dialog/upload', $result);
            }
        }else{
             $this->view('image/dialog/upload',$result);
        }
    }

    public function image_gallery($wysiwyg) {
        $data['wysiwyg'] = $wysiwyg;
        $data['images'] = $this->image_model->find_all();
        $this->view('image/dialog/gallery', $data);
    }

    public function edit() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('img_id', 'img_id', 'required');
        if ($this->form_validation->run() == TRUE) {

            $update = array(
                'caption' => $this->input->post('caption'),
                'description' => $this->input->post('description'),
            );
            $id = $this->input->post('img_id');
            $this->image_model->update($id, $update);
            $updated = $this->image_model->find_by_id($id);
            $arr = array(
                'image_url' => base_url() . 'uploads/images/' . $updated->file,
                'thumb_url' => $updated->thumb_url
            );
            echo json_encode($arr);
        } else {
            $arr = array('error' => 'failed to process upload');
            echo json_encode($arr);
        }
    }

    public function delete($id) {
        $this->image_model->delete_image($id);
        redirect(site_url('admin/image'));
    }

}