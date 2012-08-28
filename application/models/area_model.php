<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of area_model
 *
 * @author satriaprayoga
 */
class Area_model extends MY_Model{
    
    var $province_list=array(
        'aceh'=>'Aceh','bali'=>'Bali','banten'=>'Banten','bengkulu'=>'Bengkulu','gorontalo'=>'Gorontalo',
        'jakarta'=>'Jakarta','jambi'=>'Jambi','jabar'=>'Jawa Barat','jateng'=>'Jawa Tengah',
        'jatim'=>'Jawa Timur','kalbar'=>'Kalimantan Barat','kalsel'=>'Kalimantan Selatan','kalteng'=>'Kalimantan Tengah',
        'kaltim'=>'Kalimantan Timur','babel'=>'Kep. Bangka Belitung','kepri'=>'Kep. Riau','lampung'=>'Lampung','Maluku'=>'Maluku',
        'malut'=>'Maluku Utara','ntt'=>'Nusa Tenggara Timur','ntb'=>'Nusa Tenggara Barat','papua'=>'Papua','pabar'=>'Papua Barat',
        'riau'=>'Riau','sulbar'=>'Sulawesi Barat','sulsel'=>'Sulawesi Selatan','sulteng'=>'Sulawesi Tengah','sultra'=>'Sulawesi Tenggara',
        'sulut'=>'Sulawesi Utara','sumbar'=>'Sumatera Barat','sumsel'=>'Sumatera Selatan','sumut'=>'Sumatera Utara','yogya'=>'Yogyakarta'
        
    );
    
    public function __construct() {
        parent::__construct();
        $this->table_name='area';
    }
   
    public function get_province_list(){
        return $this->province_list;
    }
    
    public function find_by_province($province){
        return $this->query_object_list(array('province'=>$province));
    }
    
    public function get_province($key){
        return $this->province_list[$key];
    }
}