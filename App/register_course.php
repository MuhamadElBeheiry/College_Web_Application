<?php
session_start();
require_once './Classes/class_course.php';
require_once './Classes/class_student.php';

if((isset( $_SESSION['username'])&&isset( $_SESSION['password'])&&isset( $_SESSION['type']))&&$_SESSION['type']==2){
echo '<meta charset="utf-8">';

$couse_object=new class_course("");
$all_courses=$couse_object->show_All_courses();

echo '<table border="1">';
echo '<form action="register_course.php" method="post"';
echo'<tr><td>Select</td><td>Course Arabic Name</td><td>Course English Name</td><td>Credit Hours</td></tr>';
for($row=0;$row<count($all_courses);$row++){
    $course=$all_courses[$row];
    echo '<tr><td><input type="checkbox" name="id[]" value="'.$course->get_id().'" ';
              if(isset ($_POST['id'])){
                              if($_POST['id'][$row]==$course->get_id()) echo"checked";

              }
            echo '></td>';
    echo '<td>'.$course ->arabic_name.'</td><td>'.$course ->english_name.'</td><td>'.$course ->num_credit_hours.'</td></tr>';
}
    echo '<tr><td colspan="2"><input type="submit" name="sub" value="Register"></td>';
    echo '<td colspan="2"><input type="submit" name="sub_pdf" value="get pdf"></td></tr>';


echo '</form></table>';
if(isset($_POST['sub'])){
    $id_data=$_POST['id'];
    $courses=array();
    for($row=0;$row<count($id_data);$row++){
    $courses[]=new class_course($id_data[$row]);
}
    $student=new class_student($_SESSION['id']);
    $count=$student->register_course($courses, 2, 2);
    if($count==count($id_data)){
        echo 'OK';
        $student->recieve_confirmation_email_for_register_subjects();
        exit();
    }
}
if(isset($_POST['sub_pdf'])){
    header("location: report.php");
}
}
else{
    header("location: login.php");
}
?>
