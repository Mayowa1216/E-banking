<?php
	//Start session
	session_start();
	
	//Check whether the session variable SESS_username is present or not
	if(!isset($_SESSION['SESS_username']) || (trim($_SESSION['SESS_username']) == '')) {
		header("location: access-denied.php");
		exit();
	}
?>