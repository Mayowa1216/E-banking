<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Add New Client</title>
		<link href="loginmodule.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<h1>Welcome <?php echo $_SESSION['SESS_FIRST_NAME'];?></h1>
		<a href="manager-index.php">Home</a> | <a href="add_client.php">Add Client</a> | <a href="delete_client.php">Delete Client</a> | <a href="feedback_check.php">Feedback</a> | <a href="logout.php">Logout</a>
		
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
			
			$query = "SELECT max(username) from client";
			$result = mysql_query($query,$link) or die ("Error in query: $query. " . mysql_error());
			$row=mysql_fetch_array($result);
			$username=$row["max(username)"];
			$num = floatval($username);
			$num= $num+1;
		?>
		
		<form method="post" align="center" action="add_submit.php">
			<table width="500" border="0" align="center" cellpadding="2" cellspacing="0">
				<tr>
					<td width="300"><b>Username</b></td>
					<td width="200"><input name="username" type="text" class="textfield" id="username" value ="<?php echo $num;?>" /></td>
				</tr>
				<tr>
					<td width="300"><b>First name</b></td>
					<td width="200"><input name="first_name" type="text" class="textfield" id="first_name" required /></td>
				</tr>
				<tr>
					<td width="300"><b>Last name</b></td>
					<td width="200"><input name="last_name" type="text" class="textfield" id="last_name" required /></td>
				</tr>
				<tr>
					<td width="300"><b>Gender</b></td>
					<td width="200"><input name="gender" type="radio"  id="male" value="male" > Male 
					<input name="gender" type="radio" id="female" value="female" />Female</td>
				</tr>
				<tr>
					<td width="300"><b>Address</b></td>
					<td width="200"><input name="address" type="text" class="textfield" id="address" required /></td>
				</tr>
				<tr>
					<td width="300"><b>DOB</b></td>
					<td width="200"><input name="dob" type="text" class="textfield" id="dob" required /></td>
				</tr>
				<tr>
					<td width="300"><b>Contact Number</b></td>
					<td width="200"><input name="contact_number" type="text" class="textfield" id="contact_number" required /></td>
				</tr>
				<tr>
					<td width="300"><b>Mail_ID</b></td>
					<td width="200"><input name="mail_id" type="text" class="textfield" id="mail_id" required /></td>
				</tr>
				<tr>
					<td width="300"><b>Cell Number</b></td>
					<td width="200"><input name="cell_number" type="text" class="textfield" id="cell_number" required /></td>
				</tr>
				<tr>
					<td width="300"><b>Initial Balance Amount</b></td>
					<td width="200"><input name="balance" type="text" class="textfield" id="balance" required /></td>
				</tr>
			</table>
			<input type="submit" value="Add"/>
		</form>
		
	</body>
</html>