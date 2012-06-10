<?php
require('../adminautoload.php');
// Get list of users
$sql = "SELECT * FROM members";
$result = mysql_query($sql);
$users = array();
while($row = mysql_fetch_assoc($result)) {
	$users[] = $row;
}
?>
<html>
<head>
<title>User List</title>
</head>
<body>
<?php include(LG_ROOT . DS . 'templates' . DS . 'header.php'); ?>
<h1>User List</h1>
<p>		
		<?php 
		if (isset($_SESSION['flash'])) {
			echo $_SESSION['flash']; unset($_SESSION['adminuser-flash']);
		}
		?>
</p>
<a href="create.php">Create New User</a>
<table>
	<thead>
		<tr>
			<td>Id</td>
			<td>Username</td>
			<td>Password</td>
			<td>Role</td>
			<td>Banned?</td>
			<td>Edit</td>
			<td>Delete</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach($users as $user): ?>
			<tr>
				<td><?php echo $user['id']; ?></td>
				<td><?php echo $user['username']; ?></td>
				<td><?php echo $user['password']; ?></td>
				<td><?php echo $user['role']; ?></td>
				<td><?php echo $user['banned']; ?></td>
				<td><a href="edit.php?id=<?php echo $user['id'];?>">Edit</a>
				<td><a href="delete.php?id=<?php echo $user['id'];?>">Delete</a></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<?php include(LG_ROOT . DS . 'templates' . DS . 'footer.php'); ?>
</body>
</html>