<?php
include_once '../BLogic/Admin.php';
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(isset($_SESSION['type']) && $_SESSION['type']==1){
$Admin = new Admin($_SESSION['type']);
$data=$Admin->get_all_types();
?>

<form  action="registerUser.php" method="post">
    <select name="type" >
        <option value="0">Select Type</option>
        <?php 
          foreach($data as $row){
              echo '<option value="'.$row['type_id'].'">'.$row['type'].'</option>';
          }
        ?>
     
    </select>


</form>

<?php
}
 else {
    header("location: ../login.php");
}

?>
