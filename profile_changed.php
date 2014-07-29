<?php
require_once('auth.php');
?>
<html>
<head>
<link href="loginmodule.css" rel="stylesheet" type="text/css" />
<title>Profile Edited</title>
</head>
<body>
<h1>Welcome <?php echo $_SESSION['SESS_FIRST_NAME'];?></h1>
		<a href="member-profile.php">My Profile</a> | <a href="transaction_login.php">Deposit</a> | <a href="history_login.php">History</a> | <a href="balance_login.php">Balance</a> | <a href="feedback_submit.php">Feedback</a> | <a href="logout.php">Logout</a>
<p>Profile changed successfully </p>
</body>
</html>