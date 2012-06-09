<?php
include ('lib/autoload.php');

if (!isset($_GET['id']) OR !is_numeric($_GET['id'])) {
	die('id is not set or not a number!');
}
$productId = $_GET['id'];
$sql = "SELECT * FROM products WHERE id = $productId";
$result = mysql_query($sql);
if (mysql_num_rows($result) < 1) {
	die ("Invalid Product specified");
}
$product = mysql_fetch_assoc($result);
?>
<html>
	<head>
		<title>Enquiry for <?php echo $product['name'] ?></title>
	</head>
	<body>
		<h1>Enquiry for <?php echo $product['name'] ?></h1>
		<form action="sendenquiry.php" method="post">
			<fieldset>
				<label for="enquiry">Message (Optional):</label><br />
				<textarea rows="6" cols="50" name="enquiry" >Enter an optional message to the seller here.</textarea>
			</fieldset>
			<input type="submit" name="enquirysubmit" value="Submit Enquiry" />
		</form>
	</body>
</html>