<?php
require_once('auth.php');
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Feedback Submit</title>
		<link href="loginmodule.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
	<h1>Welcome <?php echo $_SESSION['SESS_FIRST_NAME'];?></h1>
		<a href="member-index.php">Home</a> | <a href="member-profile.php">My Profile</a> | <a href="transaction_login.php">Deposit</a> | <a href="history_login.php">History</a> | <a href="balance_login.php">Balance</a> | <a href="feedback_submit.php">Feedback</a> | <a href="logout.php">Logout</a>
		<form method="post" align="center" action="feedback_submitted.php">
			
			<textarea width="100 px" height="40 px" name="message" type="password" class="textfield" id="message"></textarea>
			<input  type="submit" class="textfield" id="Post feedback" />
		</form>
	</body>
</html>