<?php
include('../adminautoload.php');
// Get list of products
$sql = "SELECT * FROM products";
$result = mysql_query($sql);
$products = array();
while($row = mysql_fetch_assoc($result)) {
	$products[] = $row;
}
?>
<html>
<head>
<title>User List</title>
</head>
<body>
<h1>User List</h1>
<table>
	<thead>
		<tr>
			<td>Id</td>
			<td>Name</td>
			<td>Type</td>
			<td>Weight</td>
			<td>Price</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach($products as $product): ?>
			<tr>
				<td><?php echo $product['id']; ?></td>
				<td><?php echo $product['name']; ?></td>
				<td><?php echo $product['type']; ?></td>
				<td><?php echo $product['weight']; ?></td>
				<td><?php echo $product['price']; ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
</body>
</html>