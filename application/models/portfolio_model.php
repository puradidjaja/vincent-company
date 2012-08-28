<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of portfolio_model
 *
 * @author satriaprayoga
 */
class Portfolio_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->table_name = 'portfolio';
    }

    public function year_template() {
        $start[0] = 1980;
        $end = date('Y');
        for ($i = 0; $i < $end; $i++) {
            $start[$i]+=$i;
        }
        return $start;
    }

    

}

