<?php
require('../adminautoload.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
	$userId = mysql_real_escape_string($_GET['id']);
	$sql = "DELETE FROM members WHERE id = '$userId'";
	$result = mysql_query($sql);
	if (mysql_affected_rows() > 0) {
		$_SESSION['flash'] = 'User Deleted';
		header('location:index.php');
	} else {
		$_SESSION['flash'] = 'User Id not found';
		header('location:index.php');
	}
} else {
	$_SESSION['flash'] = 'Invalid or non-existent user id';
	header('location:index.php');
}