<?php
	ob_start();
	session_start();
	include('test_input.php');
	include('config.php');
	
	if(isset($_SESSION['eid']))
	{
		$eid=$_SESSION['eid'];
		if($eid == 'r00t')
		{
			header("Location:administrator.php");
		}
	}
	else
	{
		header("Location: index.php");
	}
	
	$title=test_input($_POST["c1_title"]);
	$type=test_input($_POST["c1_type"]);
	if(isset($_POST["c1_journalno"]))
	{
		$journalno=test_input($_POST["c1_journalno"]);
	}
	else
	{
		$journalno="NA";
	}
	$locale=test_input($_POST["c1_locale"]);
	$isbn=test_input($_POST["c1_isbn"]);
	$year=test_input($_POST["c1_year"]);
	
	$q = "select * from ppr_bkchp where isbn='".$isbn."'";
	$res=mysql_query($q);
	
	if(mysql_num_rows($res)>0)
	{
		$_SESSION['msg'] = "isbn_exists";
		header("Location:loggedin.php");
	}
	//if there exists no such entry previously, then enter values into table
	else
	{
		$q="insert into ppr_bkchp values ('$title','$type','$journalno','$locale','$isbn','$year','$eid')";
		$rs=mysql_query($q);
		if($rs)
		{
			$_SESSION['msg'] = "success";
			header("Location:loggedin.php");
		}
	}
?>