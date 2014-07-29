<?php
require_once('auth.php');
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Deposit</title>
		<link href="loginmodule.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
	<h1>Welcome <?php echo $_SESSION['SESS_FIRST_NAME'];?></h1>
		<a href="member-index.php">Home</a> | <a href="member-profile.php">My Profile</a> | <a href="transaction_login.php">Deposit</a> | <a href="history_login.php">History</a> | <a href="balance_login.php">Balance</a> | <a href="feedback_submit.php">Feedback</a> | <a href="logout.php">Logout</a>
		<form method="post" align="center" action="deposit_submit.php">
			<table width="400" border="0" align="center" cellpadding="2" cellspacing="0">
				<tr>
					<td width="200"><b>Account To:</b></td>
					<td width="200"><input name="account_to" type="text" class="textfield" id="account_to" required /></td>
				</tr>
				<tr>
					<td width="200"><b>Amount:</b></td>
					<td width="200"><input name="amount" type="text" class="textfield" id="amount" required /></td>
				</tr>
				<tr>
					<td width="200"><input name="transaction_submit" type="submit" class="textfield" id="transaction_submit" required /></td>
				</tr>
			</table>
		</form>
	</body>
</html>