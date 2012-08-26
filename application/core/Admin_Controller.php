<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin_Controller
 *
 * @author satriaprayoga
 */
class Admin_Controller extends MY_Controller {

    var $data = array();

    public function __construct() {
        parent::__construct();

        $this->load->model('profile_model');
       
        $profile = $this->profile_model->find_profile();
        
        $this->data['profile'] = $profile;
    }

   
    
    public function view($viewName,$data=array()){
        $data['profile']=  $this->data['profile'];
        $this->load->view($viewName,$data);
    }
    
    protected function _strip($source=''){
        $stripped=  str_replace(" ", "-", $source);
        return strtolower(preg_replace("/[^a-zA-Z0-9-]/", "", $stripped));
    }

}