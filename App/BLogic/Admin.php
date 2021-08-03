<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author Admin
 */
include 'User.php';
include_once '../DBLayer/AdminQueries.php';
class Admin  extends User{
    private  $adminQueries;
    public function __construct($id="") {
        
       parent::__construct($id);
       $this->adminQueries= new AdminQueries();
    }
    public function get_all_types(){
        $data= $this->adminQueries->get_all_types();
        return $data;
        
    }
}

