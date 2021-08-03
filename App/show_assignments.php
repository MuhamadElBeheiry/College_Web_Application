<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
require_once './Classes/class_course.php';
require_once './Classes/class_student.php';
require_once './Classes/class_assignment.php';
require_once './Classes/class_teacher.php';

if((isset( $_SESSION['username'])&&isset( $_SESSION['password'])&&isset( $_SESSION['type']))&&$_SESSION['type']==2){
  $couse_object=new class_course();
  $all_courses=$couse_object->show_All_courses();
    echo '<select name="course" id="subject" onchange="onselectSubject()" >
       <option value="selected">Select course</option>';
    
for($row=0;$row<count($all_courses);$row++){
                 $course=$all_courses[$row];
                 echo  '<option value="'.$course->get_id().'">'.$course ->arabic_name.'</option>';
                 
}
    echo '      </select>';
    
    ?>
<div id="sub">wwwww</div>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script LANGUAGE="JavaScript">
function onselectSubject(){
     //   alert('welcome');
var subject = $("#subject").val();

if ( subject==='selected') {

alert("Please Select Valid Subject....!!");
  
} else {
 $.post('Ajax_subject.php', {
    subject  : subject
}, function(html) {

//alert(html);
$("#sub").empty();
$('#sub').append(html);
});
       
}
}

</script>
<?php
}
else {
    header("Location: login.php");
     
}
?>