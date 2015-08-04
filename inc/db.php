<?php
	$mysqli = new mysqli("localhost", "root", "phpmyadmin777", "shop") or die(mysql_error()); 
	
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	
	//Adds one to the counter 
	$mysqli->query("UPDATE counter SET counter = counter + 1");
?>
