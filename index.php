
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
<body>
<?php include(LG_ROOT . DS . 'templates' . DS . 'header.php'); ?>
<h1>Welcome to Local Greenery</h1>
<p><h2>Products:</h2></p>
<table>
<?php if (mysql_num_rows($result) > 0): ?>
<?php foreach ($products as $product): ?>
	<tr>
		<td>
			<p>
				<h3><?php echo $product['name']?></h3>
				<ul>
					<li>Dominant Type: <?php echo $product['type']?></li>
					<li>Weight: <?php echo $product['weight']?></li>
					<li>Price: <?php echo $product['price']?></li>
				</ul>
			</p>
		</td>
		<td>
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