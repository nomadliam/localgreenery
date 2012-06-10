<?php
	require("../lib/autoload.php");
	if ($_SESSION['user']['role'] != "ADMIN") {
		header('location:http://arachnias.co.cc/lg/');
	}
?>