<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Added Client</title>
		<link href="loginmodule.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<h1>Welcome <?php echo $_SESSION['SESS_FIRST_NAME'];?></h1>
		<a href="manager-index.php">Home</a> | <a href="add_client.php">Add Client</a> | <a href="delete_client.php">Delete Client</a> | <a href="feedback_check.php">Feedback</a> | <a href="logout.php">Logout</a>
		<br><br><br><br><br><br><br><br><br><br>
<?php

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
		
		$username = isset($_POST['username']) ? $_POST['username'] : "";
		$first_name = isset($_POST['first_name']) ? $_POST['first_name'] : "";
		$last_name = isset($_POST['last_name']) ? $_POST['last_name'] : "";
		$gender = isset($_POST['gender']) ? $_POST['gender'] : "";
		$address = isset($_POST['address']) ? $_POST['address'] : "";
		$dob = isset($_POST['dob']) ? $_POST['dob'] : "";
		$contact_number = isset($_POST['contact_number']) ? $_POST['contact_number'] : "";
		$mail_id = isset($_POST['mail_id']) ? $_POST['mail_id'] : "";
		$cell_number = isset($_POST['cell_number']) ? $_POST['cell_number'] : "";
		$balance = isset($_POST['balance']) ? $_POST['balance'] : "";
		
		function randomPassword() 
		{
			$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789_";
			$pass = array(); //remember to declare $pass as an array
			$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
			for ($i = 0; $i < 8; $i++) 
			{
				$n = rand(0, $alphaLength);
				$pass[] = $alphabet[$n];
			}
			return implode($pass); //turn the array into a string
		}
		
		
		$password = randomPassword();
		
		$password_final = md5($password);
		
		$query = "INSERT INTO client VALUES('$username' , '$first_name' , '$last_name' , '$gender' , '$address' , '$dob' , $contact_number , '$mail_id' , $cell_number , '$password_final', $balance )";
		$result = mysql_query($query,$link) or die ("Error in query: $query. " . mysql_error());
		$query = "INSERT INTO user VALUES('$username' , '$password_final')";
		$result = mysql_query($query,$link) or die ("Error in query: $query. " . mysql_error());
		mysql_close($link);
		 
		 echo "Record successfully added <br> <br>  Username : $username <br><br> Password : $password";
		 
		 
		
		
?>
	</body>
</html>