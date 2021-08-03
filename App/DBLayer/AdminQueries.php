<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminQueries
 *
 * @author Admin
 */
include_once 'DbConnection.php';
class AdminQueries {
    //put your code here
    private $db;
    
    public function __construct() {
        $this->db=new DbConnection();
    }
    function get_all_types(){
        $query="SELECT * FROM `user_tpe`";
        $result= $this->db->database_query($query);
        $data= $this->db->database_all_assoc($result);
        return $data;
    }
}
