<?php
require_once('lib/autoload.php');

// Check if form has been submitted
if (isset($_POST['changepassword']) && ($_POST['changepassword']) == 'Change Password') {
	// Process the form
	$currentPass = md5(mysql_real_escape_string($_POST['currentpass']));
	$newPass = md5(mysql_real_escape_string($_POST['newpass']));
	$newPassConfirm = md5(mysql_real_escape_string($_POST['newpassconfirm']));
	if ($currentPass == $_SESSION['user']['password']) {
		if ($newPass == $newPassConfirm) {
			if ($newPass != '') {
				$sql = "UPDATE members SET password='" . $newPass . "' WHERE `id` = '" . $_SESSION['user']['id'] . "'";
				$result = mysql_query($sql);
				if (mysql_affected_rows() > 0) {
					// Now that the password is changed, kill the session and force relogin.
					$_SESSION['login-flash'] = 'Password changed successfully, please relogin.';
					unset($_SESSION['user']);
					header('location:main_login.php');
				} else {
					$_SESSION['changepass-flash'] = 'Unable to find member' . $sql;
					header('location:changepassword.php');
					exit;
				}
			} else {
				$_SESSION['changepass-flash'] = 'New Password cannot be blank';
				header('location:changepassword.php');
				exit;
			}
		} else {
			$_SESSION['changepass-flash'] = 'New Passwords do not match';
			header('location:changepassword.php');
			exit;
		}
	} else {
		$_SESSION['changepass-flash'] = 'Current Password is incorrect';
		header('location:changepassword.php');
		exit;
	}
}
?>
<html>
	<head>
		<title>Change Password</title>
	</head>
	<body>
		<?php include(LG_ROOT . DS . 'templates' . DS . 'header.php'); ?>
		<h1>Change Password</h1>
		<form action=<?php echo $_SERVER['PHP_SELF']; ?> method="post">
			<fieldset>
				<table>
					<?php if (isset($_SESSION['changepass-flash'])): ?>
					<tr>
						<td><?php echo $_SESSION['changepass-flash']; unset($_SESSION['changepass-flash']); ?></td>
					</tr>
					<?php endif; ?>
					<tr>
						<td><label for="currentpass">Current Password:</label></td>
						<td><input type="password" name="currentpass" /></td>
					</tr>
					<tr>
						<td><label for="newpass">New Password:</label></td>
						<td><input type="password" name="newpass" /></td>
					</tr>
					<tr>
						<td><label for="newpassconfirm">Confirm New Password:</label></td>
						<td><input type="password" name="newpassconfirm" /></td>
					</tr>
				</table>
			</fieldset>
			<input type="submit" name="changepassword" value="Change Password" />
		</form>
		<?php include(LG_ROOT . DS . 'templates' . DS . 'footer.php'); ?>
	</body>
</html>