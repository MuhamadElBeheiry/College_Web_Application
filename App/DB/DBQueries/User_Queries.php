<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User_Queries
 *
 * @author Admin
 */
require_once 'DbConnection.php';
class User_Queries {
    private $db;
    function __construct() {
        $this->db=new DbConnection();
    }
    public function  get_user($id){
        $query="SELECT * FROM `users` where id=$id ";
        $user_data=$this->db->get_row($query);
        return $user_data;
    }
    public function login($usernam,$password){
        $query="SELECT * FROM `users` where username='$usernam' and password='$password'";
          $user_data=$this->db->get_row($query);
          return $user_data;
    }
}
