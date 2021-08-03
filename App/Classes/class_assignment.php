<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of class_assignment
 *
 * @author Wael
 */
include_once 'DbConnection.php';
class class_assignment {
    //put your code here
    private  $id;
    public $title;
    public $path;
    public $subject_id;
    function __construct($id) {
        if($id!=''){
            $db=new DbConnection();
            $sql="SELECT * FROM `assignment` WHERE `id`=$id";
            $data=$db->get_row($sql);
            $this->id=$data['id'];
            $this->title=$data['title'];
            $this->path=$data['path'];
            $this->subject_id=$data['subject_id'];
        }
    }
  
}
