<?php session_start();?>
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
	text-align: center;
}
</style>
<img src="img/Black_Widow.png" alt="AC" width="328" height="249" align="middle" />
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
	<tr>
		<form name="form1" method="post" action="checklogin.php">
			<td>
				<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
					<tr>
						<td colspan="3"><strong>Member Login </strong></td>
					</tr>
					<?php if (isset($_SESSION['login-flash'])): ?>
					<tr>
						<td colspan="3"><?php echo $_SESSION['login-flash']; unset($_SESSION['login-flash']); ?></td>
					</tr>
					<?php endif; ?>
					<tr>
						<td width="78">Username</td>
						<td width="6">:</td>
						<td width="294"><input name="myusername" type="text" id="myusername"></td>
					</tr>
					<tr>
						<td>Password</td>
						<td>:</td>
						<td><input name="mypassword" type="password" id="mypassword"></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><input type="submit" name="Submit" value="Login"></td>
					</tr>
				</table>
			</td>
		</form>
  </tr>
</table>
