<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of about
 *
 * @author satriaprayoga
 */
class About extends Home_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('account_model');
        $this->load->model('user_model');
        $this->load->helper(array('fb', 'twitter', 'youtube'));
    }

    public function index() {
        $mnt = $this->user_model->find_member();
        $menteri = array();
        foreach ($mnt as $m) {
            $acc = $this->account_model->find_by_user_id($m->id);
            $menteri[] = array(
                'name' => $acc->name,
                'id' => $acc->id,
                'avatar_url' => $acc->avatar_url,
             
                'link'=>$acc->link
            );
        }

        $data['menteries'] = $menteri;
        $this->view('about/index', $data);
    }

    public function profile($link) {
        $menteri = $this->account_model->find_by_link($link);
        $user = $this->user_model->find_by_id($menteri->user_id);
        $data['id'] = $menteri->id;
        $data['name'] = $menteri->name;
        $data['link']=$menteri->link;
        $data['avatar_url'] = $menteri->avatar_url;
        $data['_profile'] = $menteri->profile;
        $data['email'] = $user->email;
        $this->view('about/profile', $data);
    }

}
