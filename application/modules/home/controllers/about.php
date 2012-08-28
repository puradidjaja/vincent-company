<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of about
 *
 * @author satriaprayoga
 */
class About extends Home_Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        echo 'about';
    }
}

