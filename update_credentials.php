<?php
	ob_start();
	session_start();
	include('test_input.php');
	include('config.php');
	
	if(isset($_SESSION['eid']))
	{
		$eid=$_SESSION['eid'];
	}
	else
	{
		header("Location:index.php");
	}
	if(isset($_SESSION['msg']))
	{
		echo '<script>alert("Update successful!")</script>';
	}
	
	$parameter = $_POST['parameter'];
	switch($parameter)
	{
		case 1:
			$name = test_input($_POST['txt_name']);
			$q="UPDATE emp SET uname='".$name."' WHERE eid='".$eid."'";
			$res=mysql_query($q);
			if($res)
			{
				$_SESSION['msg'] = "success";
				header("Location:edit.php");
			}
			break;
		case 2:
			$oldpwd = md5(test_input($_POST["curr_pwd"]));
			$q="SELECT pass FROM emp WHERE eid='".$eid."'";
			$res=mysql_query($q);
			if(mysql_num_rows($res)>0)
			{
				$row=mysql_fetch_array($res);
				$pwdindb=$row['pass'];
				if($pwdindb == $oldpwd)
				{
					$newpwd = md5(test_input($_POST['new_pwd']));
					$q="UPDATE emp SET pass='".$newpwd."' WHERE eid='".$eid."'";
					$res=mysql_query($q);
					if($res)
					{
						$_SESSION['msg'] = "success";
						header("Location:edit.php");
					}
					else
					{
						$_SESSION['msg']="failure";
					}
				}
				else
				{
					$_SESSION['msg'] = "wrong";
					header("Location:edit.php");
				}
			}
			break;
		case 3:
			$newdept = test_input($_POST['new_dept']);
			$q="UPDATE emp SET dept='".$newdept."' WHERE eid='".$eid."'";
			$res=mysql_query($q);
			if($res)
			{
				$_SESSION['msg'] = "success";
				header("Location:edit.php");
			}
			break;
		case 4:
			$newemptype = test_input($_POST['new_emptype']);
			$q="UPDATE emp SET emptype='".$newemptype."' WHERE eid='".$eid."'";
			$res=mysql_query($q);
			if($res)
			{
				$_SESSION['msg'] = "success";
				header("Location:edit.php");
			}
			break;
		case 5:
			$newempid = test_input($_POST['new_empid']);
			$q="UPDATE emp SET eid='".$newempid."' WHERE eid='".$eid."'";
			$res=mysql_query($q);
			if($res)
			{
				$_SESSION['eid']= $newempid;
				$_SESSION['msg'] = "success";
				header("Location:edit.php");
			}
			break;
		default:
			$_SESSION['msg']="failure";
			header("Location:edit.php");
			break;
	} //switch ends here
?>