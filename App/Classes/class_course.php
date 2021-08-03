<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of class_course
 *
 * @author Wael
 */
include_once 'DbConnection.php';
include_once 'class_assignment.php';
class class_course {
    //put your code here
    private $id;
    public $arabic_name;
    public  $english_name;
    public  $num_credit_hours;
    public  $arabic_code;
    public $englis_code;
    public $assignments=array();
    public function __construct($id="") {
        if($id!=''){
                    $db=new DbConnection();
                    $select_course_sql="SELECT * FROM `course` where id=$id ";
                    $couse_data=$db->get_row($select_course_sql);
                    $this->id=$couse_data['id'];
                    $this->arabic_name=$couse_data['arabic_name'];
                    $this->english_name=$couse_data['english_name'];
                    $this->arabic_code=$couse_data['arabic_code'];
                    $this->englis_code=$couse_data['english_code'];
                    $this->num_credit_hours=$couse_data['credit_hours'];
                    $assignments=$this->get_assignments_in_subject();
                    for($row=0;$row<count($assignments);$row++){
                        $data=$assignments[$row];
                        $this->assignments[]=new class_assignment($data[0]);
                    }
                    
        }
    }
    public function  get_id(){
        return $this->id;
        
    }
    public function show_All_courses(){
        $db=new DbConnection();
        $select_course_sql="SELECT * FROM `course` ";
        $result=$db->database_query($select_course_sql);
        $all_courses=$db->database_all_array($result);
        $all_courses_objects=array();
        for($rows=0;$rows<count($all_courses);$rows++){
            $row=$all_courses[$rows];
            $id=$row[0];
            $all_courses_objects[]=new class_course($id);
        }
        return $all_courses_objects;
    }
      function get_assignments_in_subject(){
        $db=new DbConnection();
        $sql="SELECT * FROM `assignment`  where subject_id=$this->id";
        $result=$db->database_query($sql);
        $all_data=$db->database_all_array($result);
        return $all_data;
    }
}
