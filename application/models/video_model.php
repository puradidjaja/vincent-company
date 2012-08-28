<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of video_model
 *
 * @author satriaprayoga
 */
class Video_model extends MY_Model{
    
    public function __construct() {
        parent::__construct();
        $this->table_name='video';
    }
}
