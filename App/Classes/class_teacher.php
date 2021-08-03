<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of class_teacher
 *
 * @author Wael
 */
include_once 'Class_user.php';
include_once 'class_assignment.php';
include_once 'DbConnection.php';
class class_teacher extends Class_user {
    
    public  function __construct($user_id) {
        if($user_id!=""){
                    parent::__construct($user_id);
        }
        
}
function  upload_assignment($assignment_object){
    $db= new DbConnection();
    $data_array=array("title"=>$assignment_object->title,"path"=>$assignment_object->path,"subject_id"=>$assignment_object->subject_id);
    $table="assignment";
    $return_value=$db->insert($table, $data_array);
    if($return_value){
        return true;
    }
 else {
        return false;  
    }
}
}
