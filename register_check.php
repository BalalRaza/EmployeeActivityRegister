<?php
	ob_start();
	session_start();
	include('test_input.php');
	include('config.php');
	
	$uname=test_input($_POST["username_left"]);
	$pwd=md5(test_input($_POST["password_left"]));
	$dep=test_input($_POST["department"]);
	$type=test_input($_POST["empType"]);
	$eid=test_input($_POST["empId"]);
	$q="select * from emp where eid='".$eid."'";
	$res=mysql_query($q);
	
	if(mysql_num_rows($res)>0)
	{
		$_SESSION['msg']="empid_exists";
		header("Location:index.php");
	}
	
	//insert values otherwise
	else
	{
		$q="insert into emp values ('$uname','$pwd','$dep','$type','$eid')";
		$rs=mysql_query($q);
		if($rs)
		{
			$_SESSION['eid']=$eid;
		}
		header("Location:loggedin.php");
	}	
?>