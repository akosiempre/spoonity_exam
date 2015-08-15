<?php
	session_start();	
	
	/* Unset the variables stored in session */
	unset($_SESSION['EMAIL']);
	unset($_SESSION['FNAME']);
	unset($_SESSION['LNAME']);
	unset($_SESSION['USEREMAIL']);
	unset($_SESSION['USERFNAME']);
	unset($_SESSION['LOGGEDIN']);
	session_unset();	
	session_destroy();
	if (!headers_sent()) { 
		header("location:../index.php"); 
	}	
?>
