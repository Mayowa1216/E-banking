<?php
require_once('auth.php');
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Profile edited</title>
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
		
		$first_name = isset($_POST['first_name']) ? $_POST['first_name'] : "";
		$last_name = isset($_POST['last_name']) ? $_POST['last_name'] : "";
		$gender = isset($_POST['gender']) ? $_POST['gender'] : "";
		$address = isset($_POST['address']) ? $_POST['address'] : "";
		$dob = isset($_POST['dob']) ? $_POST['dob'] : "";
		$contact_number = isset($_POST['contact_number']) ? $_POST['contact_number'] : "";
		$mail_id = isset($_POST['mail_id']) ? $_POST['mail_id'] : "";
		$cell_number = isset($_POST['cell_number']) ? $_POST['cell_number'] : "";
	
	
	$username = $_SESSION['SESS_username'];
	$query = "UPDATE client SET first_name = '$first_name' , last_name = '$last_name' , gender = '$gender' , address = '$address' , dob = '$dob' , contact_number = $contact_number , mail_id = '$mail_id' , cell_number = $cell_number WHERE username = '$username'";
	$result = mysql_query($query,$link) or die ("Error in query: $query. " . mysql_error());
	
	header("location:profile_changed.php");
	mysql_close($link);
?>
</body>
</html>