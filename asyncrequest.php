<?php
	ob_start();
	session_start();
	include('config.php');
	include('test_input.php');
	
	$eid = $_POST['eid'];
	if(isset($_POST['isbn']))
	{
		$nmbr = $_POST['isbn'];
		$q = "SELECT * FROM ppr_bkchp WHERE eid='".$eid."'";
		$res = mysql_query($q);
		$i=1;
		while($row=mysql_fetch_assoc($res))
		{
			if($nmbr == $i)
			{
				$isbn = $row['isbn'];
				break;
			}
		}

		if(isset($_POST['title']))
		{
			$para = test_input($_POST['title']);
			
			$q = "UPDATE ppr_bkchp SET title='".$para."' WHERE isbn='".$isbn."'"; 
			$update=mysql_query($q);
			if($update === true)
			{
				echo 'Update Successful';
			}
			elseif ($update === false)
			{
				echo 'Error updating';
			}
		}
	}
	else
	{
		echo 'Click on Change';
	}
	
?>