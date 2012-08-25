<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dashboard
 *
 * @author satriaprayoga
 */
class Dashboard extends MY_Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        echo 'admin dashboard';
    }
    
}
