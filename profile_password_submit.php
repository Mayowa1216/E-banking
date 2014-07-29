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
	
	$existing_password = isset($_POST['existing_password']) ? $_POST['existing_password'] : "";
	$new_password = isset($_POST['new_password']) ? $_POST['new_password'] : "";
	$confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : "";
	$username = $_SESSION['SESS_username'];
	
	
	
	if($new_password == $confirm_password)
	{
		$query = "select * from client where username= '$username' ";
		$result = mysql_query($query,$link) or die ("Error in query: $query. " . mysql_error());
		$row = mysql_fetch_array($result);
		
		if($row["password"] == md5($existing_password) )
		{
			$password = md5($confirm_password);
			$query = "UPDATE client SET password = '$password' WHERE username = '$username'  ";
			$result = mysql_query($query,$link);
			$query = "UPDATE user SET password = '$password' WHERE username = '$username'  ";
			$result = mysql_query($query,$link);
			
			
			header("location:passwordchanged.php");
		}
		else
		{
			echo "Invalid existing password ";
			// redirect to previous page saying existing password entered is incorrect
		}
	}
	else
	{
		echo "New passwords do not match ";
		// redirect to previous page saying new passwords dont match
	}
	
	mysql_close($link);
?>
</body>
</html>