<?php
require('../adminautoload.php');

// Check if form was sent
if (isset($_POST['createuser']) && ($_POST['createuser'] == 'Create User')) {
	$username = mysql_real_escape_string($_POST['username']);
	$password = md5(mysql_real_escape_string($_POST['password']));
	$role = mysql_real_escape_string($_POST['role']);
	$banned = mysql_real_escape_string($_POST['banned']);

	// See if there is a conflicting username
	$sql = "SELECT * FROM members WHERE username = '$username'";
	$result = mysql_query($sql);
	if (mysql_num_rows($result) == 0) {
		$sql = "INSERT INTO members VALUES ('', '$username', '$password', '$role', '$banned')";
		$result = mysql_query($sql);
		if (mysql_affected_rows() > 0) {
			$_SESSION['flash'] = 'User Added';
			header('location:index.php');
		} else {
			$_SESSION['flash'] = 'User not added for some reason.';
		}
	} else {
		$_SESSION['flash'] = 'Username in use';
	}
	
	
} else {
	$_SESSION['flash'] = 'Form not submitted properly';
}
?>
<html>
	<head>
		<title>Create New User - LocalGreenery</title>
	</head>
	<body>
		<h1>Create new user</h1>
		<strong>WARNING: THIS FORM IS NOT VALIDATED. ANYTHING YOU INPUT WILL BE SENT!</strong>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<fieldset>
				<table>
					<?php if (isset($_SESSION['flash'])): ?>
					<tr>
						<td colspan="2"><?php echo $_SESSION['flash']; ?></td>
					</tr>
					<?php endif; ?>
					<tr>
						<td><label for="username">Username: </label></td>
						<td><input type="text" name="username" /></td>
					</tr>
					<tr>
						<td><label for="password">Password: </label></td>
						<td><input type="text" name="password" /></td>
					</tr>
					<tr>
						<td>Role: </td>
						<td>
							<input type="radio" name="role" value="user" checked="checked" /> User<br />
							<input type="radio" name="role" value="admin" /> Admin
						</td>
					</tr>
					<tr>
						<td><label for="active">Banned: </label></td>
						<td>
							<input type="radio" name="banned" value="Y" /> Y<br />
							<input type="radio" name="banned" value="N" checked="checked" /> N
						</td>
					</tr>
				</table>
			</fieldset>
			<input type="submit" name="createuser" value="Create User" />
		</form>
	</body>
</html>