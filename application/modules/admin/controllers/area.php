<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of area
 *
 * @author satriaprayoga
 */
class Area extends Admin_Controller {
   
    public function __construct() {
        parent::__construct();
        $this->load->model('area_model');
        $this->load->model('store_model');
    }
    
    public function index() {
        $data['province'] = $this->area_model->get_province_list();
        $this->view('area/index', $data);
    }

    public function areas() {
        $area_data = $this->area_model->find_all();
        foreach ($area_data as $area) {
            echo "<li><a href=#>" . $area->name . "</a><br>\n";
            echo "<span id=\"" . $area->id . "\" style=\"display:none\">" . $area->province . "</span></li>";
        }
    }

    public function areas_json() {
        $area_data = $this->area_model->find_all();
        echo json_encode($area_data);
    }

    public function detail($id) {
        $area = $this->area_model->find_by_id($id);
        $data['area'] = $area;
        $data['stores'] = $this->store_model->find_by_area_id($id);
        $this->view('area/detail', $data);
    }

    public function detail_json($id) {
        $stores = $this->store_model->find_by_area_id($id);
        echo json_encode($stores);
    }

    public function create() {
        $area_data = array(
            'name' => $this->input->post('name'),
            'province' => $this->area_model->get_province($this->input->post('province')),
            'x' => $this->input->post('x'),
            'y' => $this->input->post('y')
        );
        $area_id = $this->area_model->create($area_data);
        $new_area = $this->area_model->find_by_id($area_id);
        $arr = array(
            'id' => $new_area->id,
            'name' => $new_area->name,
            'x' => $new_area->x,
            'y' => $new_area->y
        );
        echo json_encode($arr);
    }

    public function edit($id) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Location Name', 'required');
        $data['area'] = $this->area_model->find_by_id($id);
        $data['province'] = $this->area_model->get_province_list();
        if ($this->form_validation->run() === TRUE) {
            $stores = $this->store_model->find_by_area_id($id);
            if (count($stores) > 0) {
                foreach ($stores as $value) {
                    $this->store_model->delete($value->id);
                }
            }
            $area_data = array(
                'name' => $this->input->post('name'),
                'province' => $this->area_model->get_province($this->input->post('province')),
                'x' => $this->input->post('latlng'),
                'y' => $this->input->post('latlngy')
            );
            $this->area_model->update($id, $area_data);
            redirect(site_url('admin/area/detail/' . $id));
        } else {
            $this->view('area/edit', $data);
        }
    }

    public function delete_area($id) {
        $stores = $this->store_model->find_by_area_id($id);
        if (count($stores) > 0) {
            foreach ($stores as $value) {
                $this->store_model->delete($value->id);
            }
        }
        $this->area_model->delete($id);
        redirect(site_url('admin/area'));
    }

    public function create_store($id) {
        $store_data = array(
            'area_id' => $id,
            'name' => $this->input->post('name'),
            'address' => $this->input->post('address'),
            'contact' => $this->input->post('contact'),
            'x' => $this->input->post('x'),
            'y' => $this->input->post('y')
        );
        $store_id = $this->store_model->create($store_data);
        $new_store = $this->store_model->find_by_id($store_id);
        $arr = array(
            'id' => $new_store->id,
            'name' => $new_store->name,
            'x' => $new_store->x,
            'y' => $new_store->y,
            'address' => $new_store->address,
            'contact' => $new_store->contact
        );
        echo json_encode($arr);
    }
}
