<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include_once '../BLogic/User.php';
if(isset($_SESSION['username']) && isset($_SESSION['password'])){
    $user= new User($_SESSION['id']);
    $data= $user->get_permissions();
    echo '<ul>';
    foreach ($data as $row){
        echo '<li><a href="'.$row['path'].'">'.$row['title'].'</a></li>';
    }
    echo '</ul>';
}
else{
    header("location: ../login.php");
}
?>