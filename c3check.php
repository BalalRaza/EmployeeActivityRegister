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
	
	$banner=test_input($_POST['c3_banner']);
	$place=test_input($_POST['c3_place']);
	$locale=test_input($_POST["c3_locale"]);
	$from=test_input($_POST['c3_from']);
	$from=date('Y-m-d', strtotime($from));
	$to=test_input($_POST['c3_to']);
	$to=date('Y-m-d', strtotime($to));
	$duration=$_POST["c3_duration"];
	
	$q = "insert into lecture values ('$banner','$place','$locale','$from','$to','$duration','$eid')";
	$res=mysql_query($q);
	
	if($res)
	{
		$_SESSION['msg'] = "success";
		header("Location:loggedin.php");
	}
?>