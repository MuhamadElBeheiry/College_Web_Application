<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserQueries
 *
 * @author Admin
 */
include_once 'DbConnection.php';
class UserQueries {
    private $db;
    function __construct() {
        $this->db=new DbConnection();
    }
    public  function get_user_by_id($id){
        $query="SELECT * FROM `users` where id=$id";
        $data=$this->db->get_row($query);
        return $data;
    }
    public function get_user_by_username_Password($username,$password){
        $query="SELECT * FROM `users` where username='$username' and password='$password'";
       $data=$this->db->get_row($query);
       return $data;
        
    }  
    public function   get_permission($user_type){
        $query="SELECT `urls_data`.`path`,`urls_data`.`title` FROM `urls_data` , users_types_urls where urls_data.id= users_types_urls.url_tpe and users_types_urls.user_type_id=$user_type";
        $result=$this->db->database_query($query);
        $data=$this->db->database_all_assoc($result);
        return $data;
    }
}

