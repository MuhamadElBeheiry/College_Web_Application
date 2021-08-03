<?php
include_once ("databaseConnection.php");
if($_POST['link1']){
  $link_id=$_POST['link1'];
  $sql_get_category="SELECT * FROM ` category` WHERE `id`=$link_id";
  $sql_get_category_result=  mysql_query($sql_get_category);
  $category_as_array=  mysql_fetch_assoc(  $sql_get_category_result);
  $current_category_name=$category_as_array['name'];
  $current_category_id=$category_as_array['id'];
    

  echo $link_id;
ob_end_clean();	
$sql_get_state="SELECT * FROM ` category` WHERE `parent_id`=$link_id";
$get_state_result=  mysql_query($sql_get_state);
echo '<form method="post" name="enableForm" onsubmit="validate();">';

 echo ' <table class="gridtable3" cellspacing="6" dir="rtl" align="right"  >
		<tr>
<th width=82 >
				<label >أختر النوع     </label>
			</th>
		<td>';
 if($link_id==1){
     
 
                     echo'    <select name="links" id="link" align="right" dir="rtl" onchange="onselectlink()">
                                <option value="'.$current_category_id.'">'.$current_category_name.'</option>';
			
 }
 else{
     echo '<select name="links" id="link" dir="rtl" onchange="onselectlink()">
                                <option value="'.$current_category_id.'">'.$current_category_name.'</option>
                                <option value="1">الانواع الرئيسيه</option>';
 }

while($row=mysql_fetch_assoc($get_state_result)){
    echo " <option value=".$row['id'].">".$row['name']."</option>   ";
}
echo '</select></td></tr>';


		
echo '
		<tr>
                 <th>
				<label> اضافة  نوع جديد<label>
			</th>
			<td >
                            <input type="text" width="40" id="type_input"  name="type_name" dir="rtl" required>
			</td>
                       
		</tr>
		<tr >
                <td colspan=2 align="center" width="195">
                <input type="submit" name="Submit" value="أضافه" />
                </td>
                </tr>
              
	</table></form>';
}
if(isset($_POST['type1'])){
    echo 'welcommmmm';
}	
?>
<script>
$( "#accordion" ).accordion({});
</script>
