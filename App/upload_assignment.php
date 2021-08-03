<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include_once './Classes/class_assignment.php';
include_once './Classes/class_student.php';
include_once './Classes/class_assignment.php';
include_once './Classes/class_teacher.php';

if((isset( $_SESSION['username'])&&isset( $_SESSION['password'])&&isset( $_SESSION['type']))&&$_SESSION['type']==3){
    if(isset($_POST['sub'])){

                        $filename=$_FILES['upfile']['tmp_name'];
                        $actualfile_name=$_FILES['upfile']['name'];
                        $size=$_FILES['upfile']['size'];
                        $type=$_FILES['upfile']['type'];
                        $error=$_FILES['upfile']['error'];
                        $course_id=$_POST['course'];
                        $title=$_POST['title'];
    if(empty($filename)){
        echo 'please choose file';
        
    }
    else if($course_id==-1){
                echo 'please select a valid course';

    }
   else  if($error>0){
        echo"uploading operation failed code id".$error;
    }
    else{
        if($size>1000000){
            echo "the file size must be less than 1000000";
          }
//          if($type=='image/jpeg'){
//              echo"this type is not allowed";
//              die("sorry");
//          }
          
              else{
                      
                  $path="uploads/".$actualfile_name;
                  while(file_exists($path)){
                       $actualfile_name=$actualfile_name."_1";
                       $path="uploads/".$actualfile_name;
                  }
                     
                  move_uploaded_file($filename, $path);
                  $ass_object=new class_assignment("");
                  $ass_object->title=$title;
                  $ass_object->path=$path;
                  $ass_object->subject_id=$course_id;
                  $teacher_object=new class_teacher("");
                  $value=$teacher_object->upload_assignment($ass_object);
                  if($value){
                   echo"<br>file uploaded successfully click<a href='upload_assignment.php'> here </a> to upload another file ";
                   exit();
                  }
              }
              }
    
   
}
    
    
    
    $couse_object=new class_course();
    $all_courses=$couse_object->show_All_courses();
    //echo count($all_courses);
    echo '<form action="upload_assignment.php" method="post" enctype="multipart/form-data" >
           <table><tr><td>Title</td><td><input type="text" name="title" Required></td></tr><tr><td>please upload your file</td>
            <td> <input type="file" name="upfile" Required></td></tr>
            <tr><td>Select Courses</td><td>
            <select name="course">
       <option value="-1">Select course</option>';
    
for($row=0;$row<count($all_courses);$row++){
                 $course=$all_courses[$row];
                 echo  '<option value="'.$course->get_id().'">'.$course ->arabic_name.'</option>';
                 
}
    echo '      </select>
            </td></tr>
            <tr><td colspan="2"><input type="submit" name="sub" value="upload"></td></tr>
            </table>
        </form>';
}
 else {
    header("Location: login.php");
     
}
?>
