<?php
	ob_start();
	session_start();
	include('test_input.php');
	include('config.php');
	
	if(isset($_SESSION['eid']))
	{
		$eid=$_SESSION['eid'];
		if($eid != 'r00t')
		{
			header("Location:loggedin.php");
		}
	}
	else
	{
		header("Location: index.php");
	}
	
	$empid = $_GET['eid'];
	$q1 = "DELETE FROM lecture WHERE eid='".$empid."' ";
	$q2 = "DELETE FROM ppr_bkchp WHERE eid='".$empid."' ";
	$q3 = "DELETE FROM wrkshp_conf WHERE eid='".$empid."' ";
	$q4 = "DELETE FROM emp WHERE eid='".$empid."' ";
	mysql_query($q1);
	mysql_query($q2);
	mysql_query($q3);
	$ar = mysql_query($q4);
	if(mysql_affected_rows()>0)
		$_SESSION['msg'] = "success";
	else
		$_SESSION['msg'] = "failure";
	header("Location: deleteEmp.php");
?>