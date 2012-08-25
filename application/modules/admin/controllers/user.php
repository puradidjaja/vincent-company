<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author satriaprayoga
 */
class User extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        echo 'user list';
    }
    
    public function detail($id){
        echo 'user detail '.$id;
    }
    
    public function edit($id){
        echo 'user edit '.$id;
    }
}

