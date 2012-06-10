<?php
include('adminautoload.php');
// Get the seller status
$sql = "SELECT `value` FROM options WHERE `option` = 'status'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
$sellerStatus = $row[0];
?>
<html>
<head>
<title>Admin Menu - LocalGreenery</title>
</head>
<body>
<?php include(LG_ROOT . DS . 'templates' . DS . 'header.php'); ?>
<h1>LocalGreenery - Admin Menu</h1>
<ul>
	<li>Current Status: <a href="changestatus.php"><?php echo $sellerStatus; ?></a></li>
	<li><a href="users/">Users</a></li>
	<li><a href="products/">Products</a></li>
</ul>
<?php include(LG_ROOT . DS . 'templates' . DS . 'footer.php'); ?>
</body>
</html>