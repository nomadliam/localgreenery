<?php
	// Connect to server and select databse.
	$conn = mysql_connect('localhost', 'root', 'password')or die("cannot connect\n" . mysql_error()); 
	mysql_select_db('localgreenery', $conn)or die("cannot select DB\n" . mysql_error());
?>
