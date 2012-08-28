<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of statistic_model
 *
 * @author satriaprayoga
 */
class Statistic_model extends MY_Model{
    
    public function __construct() {
        parent::__construct();
        $this->table_name='statistic';
    }
    
     public function find_monthly_log() {
       
        $this->db->select('section,date_time')
                ->from($this->table_name)
                ->where('MONTH(date_time)', date('m'))
                ->where('YEAR(date_time)', date('Y'));
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    
    public function find_yearly_log(){
       
        $this->db->select('section,date_time')
                ->from($this->table_name)
                ->where('YEAR(date_time)', date('Y'));
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function find_daily_log() {
       
        $today = date('Y-m-d');
        $this->db->select('statistic.section')
                ->from($this->table_name)
                ->where(array('DAY(statistic.date_time)'=>date('d'),'statistic.section'=>'home'));
        return $this->db->count_all_results();
    }

   
}
