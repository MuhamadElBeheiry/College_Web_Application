<?php
header('content-type:text/html; charset=utf-8'); 
$connect= mysql_connect('localhost','root','')or die("Could not connect");
$select_db=  mysql_select_db('products') or die("No Database selected");
	mysql_query("SET NAMES 'utf8'"); 
	mysql_query('SET CHARACTER SET utf8'); 
	mysql_query("SET SQL_BIG_SELECTS=1");


?>
