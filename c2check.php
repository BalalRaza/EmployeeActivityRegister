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
	
	$title=test_input($_POST['c2_title']);
	$place=test_input($_POST['c2_place']);
	$locale=test_input($_POST["c2_locale"]);
	$from=test_input($_POST['c2_from']);
	$from=date('Y-m-d', strtotime($from));
	$to=test_input($_POST['c2_to']);
	$to=date('Y-m-d', strtotime($to));
	$duration=$_POST["c2_duration"];
	
	$q = "insert into wrkshp_conf values ('$title','$place','$locale','$from','$to','$duration','$eid')";
	$res=mysql_query($q);
	
	if($res)
	{
		$_SESSION['msg'] = "success";
		header("Location:loggedin.php");
	}
	
?>