<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if (!function_exists('year_dropdown')) {

    function year_dropdown($name = '', $value = '') {
        $years = date('y');
        while ($years <= '31' + date('y')) {
            $year['20' . $years] = '20' . $years;
            $years++;
        }
        return form_dropdown($name, $year, $value);
    }

}
