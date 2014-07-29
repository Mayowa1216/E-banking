<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Delete Client</title>
		<link href="loginmodule.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<h1>Welcome <?php echo $_SESSION['SESS_FIRST_NAME'];?></h1>
		<a href="manager-index.php">Home</a> | <a href="add_client.php">Add Client</a> | <a href="delete_client.php">Delete Client</a> | <a href="feedback_check.php">Feedback</a> | <a href="logout.php">Logout</a>

		<form method="POST" align="center"  action="delete_submit.php" >
			<table width="400" border="0" align="center" cellpadding="2" cellspacing="0">
			<tr>
				<td> Account Number : </td>
				<td> <input type="text" name="account" required /></td>
			</tr>
			</table>
			<input type="submit" value="confirm" />
		</form>
	</body>
</html>
