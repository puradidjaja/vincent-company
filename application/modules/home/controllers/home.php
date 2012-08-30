<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends Home_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('product_model');
        $this->load->model('article_model');
        $this->load->helper(array('fb','twitter','youtube'));
        
    }

    public function index() {
       $data['products']=  $this->product_model->find_product(1);
       $data['rss']=  $this->article_model->find_publish_article();
       $this->view('home',$data);
    }

}
