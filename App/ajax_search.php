<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if($_POST['name']){
   // echo $_POST['name'];
    $name=$_POST['name'];
    $sql='SELECT * FROM `users`  where `fname` like%$name%';
}
?>