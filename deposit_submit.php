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
		<br><br><br><br><br><br><br><br><br><br>
<?php

		require_once('auth.php');

		define('DB_HOST', 'localhost');
		define('DB_USER', 'root');
		define('DB_PASSWORD', '');
		define('DB_DATABASE', 'ebanking');
		//Start session
		session_start();
	
		//Array to store validation errors
		$errmsg_arr = array();

		//Validation error flag
		$errflag = false;

		//Connect to mysql server
		$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
		if(!$link) 
		{
			die('Failed to connect to server: ' . mysql_error());
		}

		//Select database
		$db = mysql_select_db(DB_DATABASE,$link);
		if(!$db) 
		{
			die("Unable to select database");
		}
		
		$account_to = isset($_POST['account_to']) ? $_POST['account_to'] : "";
		$amount = isset($_POST['amount']) ? $_POST['amount'] : "";
		$username = $_SESSION['SESS_username'];
		$date=date("Y-m-d");
		
		$query ="select * from client where username = $account_to " ;
		$result = mysql_query($query,$link) or die ("Error in query: $query. " . mysql_error());
		
		$numResults = mysql_num_rows($result);
		if ($numResults > 0) 
		{	
			$query ="select * from client where username = '$username'" ;
			$result = mysql_query($query,$link) or die ("Error in query: $query. " . mysql_error());
			$row = mysql_fetch_array($result);
			if($row["balance"] > $amount)
			{
			$query = "UPDATE client SET balance = balance - $amount WHERE username = '$username'";
			$result = mysql_query($query,$link) or die ("Error in query: $query. " . mysql_error());
			$query = "UPDATE client SET balance = balance + $amount WHERE username = $account_to ";
			$result = mysql_query($query,$link) or die ("Error in query: $query. " . mysql_error());
			$query = "INSERT INTO transaction values ( '$username' , $account_to , $amount , '$date')";
			$result = mysql_query($query,$link) or die ("Error in query: $query. " . mysql_error());
			echo "Transaction Completed";
			}
			
			else
			{
				echo " Insufficient balance <br> Press back";
			}
		}
		else
		{
			echo "Invalid account number <br> Press back";
			// redirect to previous page saying existing password entered is incorrect
		}
?>
</body>
</html>