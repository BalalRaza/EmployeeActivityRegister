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
	
	$admnid="r00t";
	if(isset($_POST["btn_submit"]))
	{
		$oldPwd = md5(test_input($_POST["oldPwd"]));
		$q="SELECT uname, pass FROM emp WHERE eid='".$admnid."'";
		$res=mysql_query($q);
		if(mysql_num_rows($res)>0)
		{
			$row=mysql_fetch_array($res);
			$pwd=$row['pass'];
			if($pwd==$oldPwd)
			{
				//Admin confirmed. Allow Password Change.
				$newPwd = md5(test_input($_POST["newPwd"]));
				$q1 = "UPDATE emp SET pass='".$newPwd."' WHERE eid='".$admnid."' ";
				$ar = mysql_query($q1);
				if(mysql_affected_rows() > 0)
					$_SESSION['msg'] = "success";
				else
					$_SESSION['msg'] = "error";
				header("Location: administrator.php");
			}
			else
			{
				//Attempt to compromise application.
				unset($_SESSION['eid']);
				$_SESSION["msg"] = "triedHacking";
				header("Location: index.php");
			}
		}
		else
		{
			$_SESSION['msg'] = "error";
			header("Location: administrator.php");
		}
	}
?>