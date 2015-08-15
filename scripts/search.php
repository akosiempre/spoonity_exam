<?php
	require_once('../global/db_connect.php');	
	
	$search_string = $_GET['search'];

/* get record count first for the pagination */
	$search_qry="select count(*) as searchcount from userdata ";
	$search_qry .= "where userdata.user_email like '%$search_string%'";
	$search_qry .= " or userdata.user_name like '%$search_string%'";
	$result=mysql_query($search_qry);	
	if($result) {
		$userdata = mysql_fetch_assoc($result);
		$_SESSION['SEARCH_ROWS'] = $userdata['searchcount'];	
		$records = $_SESSION['SEARCH_ROWS'];
		$perpage = 5;
		$quotient = explode('.',($records / $perpage));
		$pages=$quotient[0];
		if ($records % $perpage !== 0) {
			$pages = $pages + 1;
		}	
		$_SESSION['SEARCH_PAGES'] = $pages;	
	}

/* Setting page number for the pagination */
	if (isset($_GET['page'])) {
		$pagenum   = $_GET['page'];
		$queryfrom = ($pagenum - 1);
		if ($pagenum == "prev") {
			$pagenum = $_SESSION['SRCH_CURPAGE'] - 1;
		} else 
		if ($pagenum == "next") {
			$pagenum = $_SESSION['SRCH_CURPAGE'] + 1;
		}
	} else {
		$pagenum = 1;
	}

/* Setting the start of query based on current page */
	$_SESSION['SRCH_CURPAGE'] = $pagenum;
	$queryfrom = ($pagenum - 1) * $perpage;
	if ($queryfrom <= 0) {
		$queryfrom = 0;
		$_SESSION['SRCH_CURPAGE'] = 1;
	} else 
	if ($queryfrom > $records) {
		$queryfrom = $queryfrom - $perpage;
		$_SESSION['SRCH_CURPAGE'] = $pages;
	}

/* Running the query based on values from above	 */
	$search_qry  = "SELECT  userdata.userid, userdata.user_email, userdata.user_name from userdata ";
	$search_qry .= " where userdata.user_email like '%$search_string%'";
	$search_qry .= " or userdata.user_name like '%$search_string%'";
	$search_qry .= " order by  userdata.userid limit $queryfrom, 5";

	$result=mysql_query($search_qry);
	if($result) {
		$_SESSION['SEARCH_ROWS'] = mysql_num_rows($result);
	}	
	
?>