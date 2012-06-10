
<?php
include ('lib/autoload.php');

// Fetch the products from the database
$sql = "SELECT * FROM products";
$result = mysql_query($sql, $conn);

$products = array();
while ($row = mysql_fetch_assoc($result)) {
	$products[] = $row;
}
?>

<html>
<title>Local Greenery</title>
<style type="text/css">
body,td,th {
	color: #333;
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
}
body {
	background-color: #660;
	margin-left: 30%;
	margin-top: 5%;
	margin-right: 30%;
	margin-bottom: 5%;
}
</style>
<body bgcolor="#666600" text="#333333" link="#003300" vlink="#003300" alink="#003300">
<?php include(LG_ROOT . DS . 'templates' . DS . 'header.php'); ?>
<h1><img src="img/Black_Widow.png" alt="AC" width="250" height="189" align="right"></h1>
<h1>Welcome to Local Greenery</h1>
<p>shhhhhhhhhhhhh...
<h2>Products:</h2></p>
<table width="430">
<?php if (mysql_num_rows($result) > 0): ?>
<?php foreach ($products as $product): ?>
	<tr>
		<td width="195">
			<p>
		  <h3><?php echo $product['name']?></h3>
				<ul>
					<li>Dominant Type: <?php echo $product['type']?></li>
					<li>Weight: <?php echo $product['weight']?></li>
					<li>Price: <?php echo $product['price']?></li>
				</ul>
			</p>
		</td>
		<td width="91">
			<a href="enquire.php?id=<?php echo $product['id']; ?>">Enquire</a>
		</td>
	</tr>
<?php endforeach;?>
</table>
<?php else: ?>
	<p>
<h3>No products available. Please try again later.</h3>
	</p>
<?php endif; ?>

<?php include(LG_ROOT . DS . 'templates' . DS . 'footer.php'); ?>
</body>
</html>