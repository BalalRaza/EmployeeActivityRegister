<?php
	ob_start();
	session_start();
	include('test_input.php');
	include('config.php');
	
	$admnid="r00t";
	$eid=test_input($_POST["empid"]);
	$pwd=md5(test_input($_POST["password_right"]));
	
	$q="SELECT eid, pass FROM emp WHERE eid='".$eid."'";
	$res=mysql_query($q);
	
	if(mysql_num_rows($res)>0)
	{
		$row=mysql_fetch_array($res);
		$pwd2=$row['pass'];
		if($pwd2==$pwd)
		{	
			$_SESSION['eid']=$row['eid'];
			if($row['eid'] == $admnid)
			{
				header("Location:administrator.php");
				$ip = $_SERVER['REMOTE_ADDR'];
				mysql_query("DELETE FROM history");
				$q1 = "INSERT INTO history(ip) VALUES('".$ip."')";
				mysql_query($q1);
			}
			else
			{
				header("Location:loggedin.php");
			}
		}
		else
		{
			$_SESSION['msg']="wrong combo";
			header("Location:index.php");
		}
	}
	else
	{
		$_SESSION['msg']="wrong eid";
		header("Location:index.php");
	}	
?>