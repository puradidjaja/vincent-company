<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of logger_model
 *
 * @author satriaprayoga
 */
class Logger_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->table_name = 'logger';
    }

    public function find_by_ip($ip) {
        return $this->query_object_list(array('last_ip' => $ip));
    }

    public function find_monthly_log() {
        $data = array();
        $this->db->select('link,ip,date_time')
                ->from($this->table_name)
                ->where('MONTH(date_time)', date('m'))
                ->where('YEAR(date_time)', date('Y'));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }
    
    public function find_yearly_log(){
        $data = array();
        $this->db->select('link,ip,date_time')
                ->from($this->table_name)
                ->where('YEAR(date_time)', date('Y'));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function find_daily_log() {
        $data = array();
        $today = date('Y-m-d');
        $this->db->select('link,ip,date_time')
                ->from($this->table_name)
                ->where('DATE(date_time)', $today);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function find_by_day($ip) {
        $data = array();
        $this->db->select('DAY(date_time) as day');
        $this->db->from($this->table_name);
        $this->db->where('ip', $ip);
        $this->db->order_by('DAY(date_time)', 'desc');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function find_by_day_and_link($ip, $link) {
        $data = array();
        $this->db->select('DATE(date_time) as day')
                ->from($this->table_name)
                ->where(array('ip' => $ip, 'link' => $link,'DATE(date_time)'=>date('Y-m-d')));
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }

}

