
<?php
include_once ("databaseConnection.php");
$message='';
?>

<br/>
<br/>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script LANGUAGE="JavaScript">
function onselectlink(){
        //alert('welcome');
var link = $("#link").val();

if (link == 'Selected') {

alert("Please Select Valid category....!!");
  
} else {
 $.post('Ajax_category.php', {
    link1  : link
   
}, function(html) {

//console.log(html);
$("#category").empty();
$("#sub").empty();

	$('#sub').append(html);
});
       
}
}
function validate(){
 var link = $("#link").val();
 var name= $("#ltype_input").val();
if (link == 'Selected') {

alert("Please Select Valid category....!!");
  
 }
}
//alert('تم اضافة النوع بنجاح');
//var link = $("#link").val();
//  alert(link);
//if (link == 'Selected') {
//
//alert("Please Select Valid Link....!!");
//  
//} else {
//    alert('dddddd');
// $.post('Ajax_category.php', {
//    link1  : link
//   
//}, function(html) {
//
//$("#sub").empty();
//
//	$('#sub').append(html);
//});
//       
//}
//}

</script>
	<div id="sub"  dir="rtl" >
            <form method="post" name="enableForm"  onsubmit="validate();">
    <table class="gridtable3" align="right"  dir="rtl" >
		<tr>
                        		<th width=82 >
				<label >أختر النوع</label>
			</th>
			<td id="category">
                            <select name="links" id="link" onchange="onselectlink()"  >
                                <option value="Selected">أختر النوع</option>
                                 <option value="1">الانواع الرئيسيه</option>
                            </select>
			</td>
                        	
		</tr>
                <tr>
                 <th>
				<label> اضافة  نوع جديد<label>
			</th>
			<td >
                            <input type="text" width="40" id="type_input"  name="type_name" required>
			</td>
                       
		</tr>
		<tr >
                <td colspan=2 align="center" width="195">
                <input type="submit" name="Submit" value="أضافه" />
                </td>
                </tr>
		
    </table>
	</form>
    </div>
<div id="sub1"></div>
<br>
<br>
<br>
<br>
<?php

if(isset($_POST['Submit']) ){
    
    $parent_id=$_POST['links'];
    $name=$_POST['type_name'];
    if($parent_id=='selected'){
        echo '<script>alert("من فضلك اختر نوع مناسب")</script>';
    }
    else{
mysql_query("SET NAMES 'utf8'");
$insert_query="insert into ` category` (`name`, `parent_id`) values ('".$name."','".$parent_id."')";
$result=  mysql_query($insert_query);

if($result){
    echo'<div id="sub" align="center" dir="rtl" ><font color="red"><i><h3>تم أضافة النوع بنجاح</h3></i></font></div>';
}
}
}

?>


