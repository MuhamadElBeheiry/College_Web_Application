<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
require_once './Classes/class_student.php';
if((isset( $_SESSION['username'])&&isset( $_SESSION['password'])&&isset( $_SESSION['type']))&&$_SESSION['type']==2){
   // each($_SESSION['id']);
 $student=new class_student($_SESSION['id']);
 $student->get_registered_courses_report();
}
else{
    header("location: login.php");
}
?>
