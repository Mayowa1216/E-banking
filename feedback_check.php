<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Delete Client</title>
		<link href="loginmodule.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<h1>Welcome <?php echo $_SESSION['SESS_FIRST_NAME'];?></h1>
		<a href="manager-index.php">Home</a> | <a href="add_client.php">Add Client</a> | <a href="delete_client.php">Delete Client</a> | <a href="feedback_check.php">Feedback</a> | <a href="logout.php">Logout</a>
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
		
		
		$query = "select * from feedback ";
		$result = mysql_query($query,$link) or die ("Error in query: $query. " . mysql_error());
		
		
			echo "<table border='1'>
				<tr>
				<th>Message</th>
				<th>Date</th>
				</tr>";

			while($row = mysql_fetch_array($result))
			{
			echo "<tr>";
			echo "<td>" . $row['message'] . "</td>";
			echo "<td>" . $row['date'] . "</td>";
			echo "</tr>";
			}
			echo "</table>";

		
?>
</body>
</html>