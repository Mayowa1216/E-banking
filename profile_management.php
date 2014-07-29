<?php
require_once('auth.php');
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Profile editing</title>
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
			
			$username = $_SESSION['SESS_username'];
			$query = "SELECT * from client WHERE username='$username'";
			$result = mysql_query($query,$link) or die ("Error in query: $query. " . mysql_error());
			$row=mysql_fetch_array($result);
			$first=$row["first_name"];
			$last=$row["last_name"];
			$address=$row["address"];
			$dob=$row["dob"];
			$contact=$row["contact_number"];
			$mail=$row["mail_id"];
			$cell=$row["cell_number"];
			$gender=$row["gender"];
			
		?>
		
		<form method="post" align="center" action="profile_submit.php">
			<table width="400" border="0" align="center" cellpadding="2" cellspacing="0">
				<tr>
					<td width="200"><b>First name</b></td>
					<td width="200"><input name="first_name" type="text" class="textfield" id="first_name" value ="<?php echo $first;?>"/></td>
				</tr>
				<tr>
					<td width="200"><b>Last name</b></td>
					<td width="200"><input name="last_name" type="text" class="textfield" id="last_name" value ="<?php echo $last;?>"/></td>
				</tr>
				<tr>
					<td width="200"><b>Gender</b></td>
					<td width="200"><input name="gender" type="radio"  id="male" value="male" <?php  echo ($gender=='male')?'checked':'' ?> /> Male 
					<input name="gender" type="radio" id="female" value="female" <?php echo ($gender=='female')?'checked':'' ?> />Female</td>
				</tr>
				<tr>
					<td width="200"><b>Address</b></td>
					<td width="200"><input name="address" type="text" class="textfield" id="address" value ="<?php echo $address;?>"/></td>
				</tr>
				<tr>
					<td width="200"><b>DOB</b></td>
					<td width="200"><input name="dob" type="text" class="textfield" id="dob" value ="<?php echo $dob;?>"/></td>
				</tr>
				<tr>
					<td width="200"><b>Contact Number</b></td>
					<td width="200"><input name="contact_number" type="text" class="textfield" id="contact_number" value ="<?php echo $contact;?>" /></td>
				</tr>
				<tr>
					<td width="200"><b>Mail_ID</b></td>
					<td width="200"><input name="mail_id" type="text" class="textfield" id="mail_id" value ="<?php echo $mail;?>" /></td>
				</tr>
				<tr>
					<td width="200"><b>Cell Number</b></td>
					<td width="200"><input name="cell_number" type="text" class="textfield" id="cell_number" value ="<?php echo $cell;?>" /></td>
				</tr>
			</table>
			<input type="submit" value="update" />
		</form>
		
	</body>
</html>