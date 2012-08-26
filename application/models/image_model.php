<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Image_model
 *
 * @author satriaprayoga
 */
class Image_model extends MY_Model {

    var $image_path;
    var $thumb_path;

    public function __construct() {
        parent::__construct();
        $this->table_name = 'image';
        $this->image_path = realpath(BASEPATH . '../uploads/images');
        $this->thumb_path = realpath(BASEPATH . '../uploads/thumbs');
    }

    public function upload() {
        $config = array(
            'allowed_types' => 'png|PNG|jpeg|JPEG|jpg|JPG|gif',
            'upload_path' => $this->image_path,
            'max_size' => 8000
        );
        $result = array();
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
            $result = array('error' => $this->upload->display_errors());
        } else {
            $result = array('upload_data' => $this->upload->data());
            $upload = array(
                'file' => $result['upload_data']['file_name'],
                'name' => $result['upload_data']['orig_name'],
                'type' => $result['upload_data']['file_type'],
                'date' => date('Y-m-d')
            );
            $config = array(
                'source_image' => $result['upload_data']['full_path'],
                'new_image' => $this->thumb_path,
                'maintain_ratio' => TRUE,
                'width' => 200,
                'height' => 200
            );
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $upload['thumb_url'] = base_url() . 'uploads/thumbs/' . $result['upload_data']['file_name'];
            $img_id = $this->create($upload);
            $result['img_id'] = $img_id;
        }
        return $result;
    }

    public function delete_image($id) {
        $img = $this->find_by_id($id);
        if (!empty($img)) {
            $file_name = $img->full_path;
            $thumbnail_name = $img->path . '/thumbs/' . $img->name;
            if (file_exists($file_name)) {
                unlink($file_name);
            }
            if (file_exists($thumbnail_name)) {
                unlink($thumbnail_name);
            }
        }
    }

}

