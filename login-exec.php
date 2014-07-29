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
	$password = isset($_POST['password']) ? $_POST['password'] : "";
	
	$password_final = md5($_POST['password']);
	//Create query
	$query= "SELECT * FROM user WHERE username = '$username' AND password = '$password_final'";
	$result=mysql_query($query);
	
	//Check whether the query was successful or not
	$row = mysql_fetch_array($result);	
		if(($row["password"] == $password_final)  &&  ($row["username"] == $username) )
		{
			if($username != "admin")
			{
			$query= "SELECT * FROM client WHERE username = '$username'";
			$result=mysql_query($query);
			session_regenerate_id();
			//$member = mysql_fetch_assoc($result);
			$_SESSION['SESS_username'] = $row["username"];
			$_SESSION['SESS_FIRST_NAME'] = $row["first_name"];
			$_SESSION['SESS_LAST_NAME'] = $row["last_name"];
			session_write_close();
			header("location:member-index.php");
			}
			
			else
			{
			
				session_regenerate_id();
			//$member = mysql_fetch_assoc($result);
			$_SESSION['SESS_username'] = "admin";
			$_SESSION['SESS_FIRST_NAME'] = "admin";
			$_SESSION['SESS_LAST_NAME'] = "admin";
			session_write_close();
			header("location:manager-index.php");
			}
		}
		else
		{
			header("location:login-failed.php");
		}
?>