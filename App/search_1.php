<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<script>
    function onclick_1(){
    var name=$("#search2").val();
    if(name==""){
        alert("please enter name");
    }
    else{
         $.post('ajax_search.php', {
    name  : name
}, function(html) {

//alert(html);
$("#dis").empty();
$('#dis').append(html);
});
    }
    }
</script>
<input type="text" name="search" id="search2" onkeyup="onclick_1()">
<div id="dis">welcome</div>