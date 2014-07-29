<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Login Form</title>
	<link href="loginmodule.css" rel="stylesheet" type="text/css" />	
	</head>
	<body>
		<form method="post" align="center" action="login-exec.php">
			<table width="300" border="0" align="center" cellpadding="2" cellspacing="0">
				<tr>
					<td width="112"><b>Username</b></td>
					<td width="188"><input name="username" type="text" class="textfield" id="username" required /></td>
				</tr>
				<tr>
					<td><b>Password</b></td>
					<td><input name="password" type="password" class="textfield" id="password" required /></td>
				</tr>
			</table>
			<input type="submit" name="Submit" value="Login" />
		</form>
	</body>
</html>
