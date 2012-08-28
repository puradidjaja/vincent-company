<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends Home_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('article_model');
        $this->load->helper(array('fb','twitter'));
        
    }

    public function index() {
        
        $data['articles']=  $this->article_model->find_publish_article();
        $data['rss']=  $this->article_model->find_publish_limited(4);
        $this->view('home',$data);
    }

}
