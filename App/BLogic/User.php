<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Admin
 */
include_once '../DBLayer/UserQueries.php';
class User {
    private $id;
    private $username;
    private $password;
    public  $first_name;
    public  $last_name;
    private $user_type_id;
    public $email;
    private $userQueries;
        public function get_id(){
        return $this->id;
    }
    public function set_id($id){
        $this->id=$id;
    }
      public function get_username(){
        return $this->username;
    }
    public function set_username($username){
        $this->username=$username;
    }
    public function set_password($password){
        $this->password=$password;
    }
       public function get_password(){
        return $this->password;
    }
    public function set_user_type($type){
        $this->id=$type;
    }
       public function get_user_type(){
        return $this->user_type_id;
    }
    function __construct($id="") {
        $this->userQueries=new UserQueries();
        if($id !=""){
            $data = $this->userQueries->get_user_by_id($id);
                    $this->id=$data['id'];
                    $this->username=$data['username'];
                    $this->password=$data['password'];
                    $this->first_name=$data['fname'];
                    $this->last_name=$data['lname'];
                    $this->email=$data['email'];
                    $this->user_type_id=$data['user_type_id'];
            
        }
        
    }
    public function login(){
        $data= $this->userQueries->get_user_by_username_Password($this->username, $this->password);
        if(count($data) !=0){
                    $this->id=$data['id'];
                    $this->username=$data['username'];
                    $this->password=$data['password'];
                    $this->first_name=$data['fname'];
                    $this->last_name=$data['lname'];
                    $this->email=$data['email'];
                    $this->user_type_id=$data['user_type_id'];
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    public function get_permissions(){
        $data=$this->userQueries->get_permission($this->user_type_id);
        return $data;
    }
  
}

//$user= new User();
//$user->set_password('789');
//$user->set_username('ahmed');
//$user->login();
//var_dump($user);