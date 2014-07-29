<?php
require_once('auth.php');
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Password Change</title>
		<link href="loginmodule.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
	<h1>Welcome <?php echo $_SESSION['SESS_FIRST_NAME'];?></h1>
		<a href="member-profile.php">My Profile</a> | <a href="transaction_login.php">Deposit</a> | <a href="history_login.php">History</a> | <a href="balance_login.php">Balance</a> | <a href="feedback_submit.php">Feedback</a> | <a href="logout.php">Logout</a>
		<form method="post" align="center" action="profile_password_submit.php">
			<table width="400" border="0" align="center" cellpadding="2" cellspacing="0">
				<tr>
					<td width="200"><b>Existing password</b></td>
					<td width="200"><input name="existing_password" type="password" class="textfield" id="existing_password" required /></td>
				</tr>
				<tr>
					<td width="200"><b>New password</b></td>
					<td width="200"><input name="new_password" type="password" class="textfield" id="new_password" required /></td>
				</tr>
				<tr>
					<td width="200"><b>Confirm password</b></td>
					<td width="200"><input name="confirm_password" type="password" class="textfield" id="confirm_password" required /></td>
				</tr>
			</table>
			<input type="submit" value="Confirm" />
		</form>
	</body>
</html>