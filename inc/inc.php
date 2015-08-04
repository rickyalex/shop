<?php
	mysql_connect("localhost", "root", "") or die(mysql_error()); 
	mysql_select_db("shop") or die(mysql_error()); 

	//Adds one to the counter 
	mysql_query("UPDATE counter SET counter = counter + 1");
?>
