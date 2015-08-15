<?php
	session_start();
	require_once('../global/db_connect.php');	

	$myusername = $_POST['Username'];
	$mypassword = $_POST['Userpwd'];

	/* clean post values from sql injection	*/
	$invalid_characters = array("$", "%", "#", "<", ">", "|", "'");
	$myusername = str_replace($invalid_characters, "", $myusername);
	$myusername = preg_replace('/\s+/', "", $myusername);

	/* login query */
	$login_qry="SELECT * FROM userdata WHERE user_email='$myusername' and user_pword='".md5($mypassword)."'";
	$result=mysql_query($login_qry);
	if($result) {
		if(mysql_num_rows($result) == 1) {
			$userdata = mysql_fetch_assoc($result);
			$_SESSION['USERID']   = $userdata['userid'];			
			$_SESSION['USEREMAIL'] = $userdata['user_email'];			
			$_SESSION['USERFNAME']  = $userdata['user_name'];
			$_SESSION['LOGGEDIN']  = "Y";	
			header("location:../pages/login.php?success=true");	
			exit();
	} else {
		header("location:../pages/login.php?success=false");	
		exit();
		}
	}
?>