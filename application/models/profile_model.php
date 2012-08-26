<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of profile_model
 *
 * @author satriaprayoga
 */
class Profile_model extends MY_Model {

    var $upload_path;

    public function __construct() {
        parent::__construct();
        $this->table_name = 'profile';
        $this->upload_path = realpath(BASEPATH . '../uploads');
    }

    public function find_profile() {
        $profile = $this->query(array('name' => 'DEFAULT'));
        if (empty($profile)) {
            $profile_data = array('name' => 'DEFAULT');
            $id = parent::create($profile_data);
            $profile = $this->find_by_id($id);
        }
        return $profile;
    }

    public function upload_logo() {
        $logo_path = realpath(BASEPATH . '../uploads/logo');
        $config = array(
            'allowed_types' => 'png|PNG|jpeg|JPEG|jpg|JPG|gif',
            'upload_path' => $logo_path,
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


            $result['logo_url'] = base_url() . 'uploads/logo/' . $upload['file'];
        }
        return $result;
    }

}
