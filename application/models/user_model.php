<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user_model
 *
 * @author satriaprayoga
 */
class User_model extends CI_Model{
    
    var $name;
    var $email;
    
    public function __construct() {
        parent::__construct();
    }
   
    
    public function get_email(){
        return $this->email;
    }
    
    public function get_name(){
        return $this->name;
    }
}

