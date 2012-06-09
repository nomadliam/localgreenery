<?php
include('adminautoload.php');
// Get status first
$sql = "SELECT * FROM options WHERE `option` = 'status'";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);

if ($row['value'] == "Available") {
	$sql = "UPDATE options SET `value` = 'Unavailable' WHERE `option` = 'status'";
	$result = mysql_query($sql) or die(mysql_error());
	header('location:index.php');
} else {
	$sql = "UPDATE options SET `value` = 'Available' WHERE `option` = 'status'";
	$result = mysql_query($sql);
	header('location:index.php');
}
?>
Hi