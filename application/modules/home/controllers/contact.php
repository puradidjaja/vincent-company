<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of contact
 *
 * @author satriaprayoga
 */
class Contact extends Home_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('area_model');
        $this->load->model('store_model');
        $this->load->helper(array('fb','twitter','youtube'));
    }

    public function index() {

        $data['area'] = $this->area_model->find_all();
        $this->view('contact/index', $data);
    }

    public function area($name, $id) {
        $area = $this->area_model->query(array('name' => $name, 'id' => $id));
        $data['area'] = $area;
        $this->view('contact/area', $data);
    }

    public function detail_json($id) {
        $stores = $this->store_model->find_by_area_id($id);
        echo json_encode($stores);
    }

}
