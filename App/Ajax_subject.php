<?php
session_start();
require_once './Classes/class_course.php';
require_once './Classes/class_student.php';
require_once './Classes/class_assignment.php';
require_once './Classes/class_teacher.php';
if((isset( $_SESSION['username'])&&isset( $_SESSION['password'])&&isset( $_SESSION['type']))&&$_SESSION['type']==2){
   
if(isset($_POST['subject'])){
$subject_id=$_POST['subject'];
   // echo  $subject_id;
    $course=new class_course($subject_id);
   echo '<table border="1"><tr bgcolor="cyan"><td>Assignmet_title</td><td>Download</td></tr>';

    for($row=0;$row<count($course->assignments);$row++){
        echo '<tr><td>'.$course->assignments[$row]->title.'</td><td><a href="'.$course->assignments[$row]->path.'">Download</a></td></tr>';
    }
    echo '</table>';
  //  echo count($course->assignments);
}
}
else {
    header("Location: login.php");
     
}