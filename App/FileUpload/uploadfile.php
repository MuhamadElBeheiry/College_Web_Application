<?php

if(isset($_POST['sub'])){

                        $filename=$_FILES['upfile']['tmp_name'];
                        $actualfile_name=$_FILES['upfile']['name'];
                        $size=$_FILES['upfile']['size'];
                        $type=$_FILES['upfile']['type'];
                        $error=$_FILES['upfile']['error'];
                        
    if(empty($filename)){
        echo 'please choose file';
        
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
                      
                        echo $filename."<br>";
                        echo $error."<br>";
                        echo $actualfile_name."<br>";
                        echo $size."<br>";
                        echo $type."<br>";
                  $path="uploads/".$actualfile_name;
                  while(file_exists($path)){
                       $actualfile_name=$actualfile_name."_1";
                       $path="uploads/".$actualfile_name;
                  }
                     
                  move_uploaded_file($filename, $path);
                   echo"You can download a file frome  <a href='".$path."'> here </a> ";
                   echo"file uploaded successfully click<a href='uploadfile.php'> here </a> to upload another file ";
                   exit();
                  }
              }
    
   
}
    

?>

<html>
    <body>
        <form action="uploadfile.php" method="post" enctype="multipart/form-data" >
            please upload your file <input type="file" name="upfile">
            <input type="submit" name="sub" value="upload">
        </form>
    </body>
</html>