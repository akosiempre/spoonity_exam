<?php
	session_start();
	require_once('../global/db_connect.php');	
	
	/* get current userid value	*/
	$userdata_qry 		= "select coalesce(max(userid),0) + 1 as newid from userdata";
	$result			= mysql_query($userdata_qry);
	$return		 	= mysql_fetch_assoc($result);
	$user_id		= $return["newid"];	

	/* get all post data	 */
	$UserEmail = $_POST['emailaddress'];
	$UserFullName = $_POST['fullname'];	
	$UserPassword = $_POST['password'];
	$UserPasswordRepeat = $_POST['password_repeat'];
	
	/* validate password if the same with repeat password */
	if ($UserPassword != $UserPasswordRepeat) {
		header("location:../pages/register.php?failed=password");
		exit();
	}	
	
	/* validate Email based on regex */
	$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/'; 
	if (!preg_match($regex, $UserEmail)) {
		header("location:../pages/register.php?failed=email");
		exit();
	}	

	/* run query	inserting the values to database */
	$register_qry  = "INSERT INTO `userdata`(`userid`, `user_email`, `user_name`, `user_pword`) VALUES ";
	$register_qry .= "(".$user_id.",'".$UserEmail."','".$UserFullName."','".md5($UserPassword)."')";
	$register_result=mysql_query($register_qry);
	$registerid = mysql_insert_id();
	if (!$register_result) {
		header("location:../pages/register.php?failed=database");
		exit();		
	}

	header("location:../pages/register.php?success=true");	

?>