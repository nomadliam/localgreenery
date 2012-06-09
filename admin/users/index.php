<?php
include('../adminautoload.php');
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
<h1>User List</h1>
<table>
	<thead>
		<tr>
			<td>Id</td>
			<td>Username</td>
			<td>Password</td>
			<td>Role</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach($users as $user): ?>
			<tr>
				<td><?php echo $user['id']; ?></td>
				<td><?php echo $user['username']; ?></td>
				<td><?php echo $user['password']; ?></td>
				<td><?php echo $user['role']; ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
</body>
</html>