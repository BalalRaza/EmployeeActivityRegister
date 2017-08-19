<?php
	ob_start();
	session_start();
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
	$col = $_GET['col'];
	$id = $_GET['id'];
	if($col == 1)
	{
		$isbn = $_GET['key'];
		$q = "DELETE FROM ppr_bkchp WHERE isbn='".$isbn."'";
		mysql_query($q);
	}	
	else if($col == 2)
	{
		$title = $_GET['key'];
		$q = "DELETE FROM wrkshp_conf WHERE title='".$title."' and eid='".$id."'";
		mysql_query($q);
	}	
	else if($col == 3)
	{
		$banner = $_GET['key'];
		$q = "DELETE FROM lecture WHERE banner='".$banner."' and eid='".$id."'";
		mysql_query($q);
	}
	header("Location: manage.php");
?>