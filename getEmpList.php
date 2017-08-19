<?php
	include('config.php');
	
	$q = "SELECT uname FROM emp";
	$res = mysql_query($q);
	$msg = '<option value="" disabled selected>None</option>';
	while($row=mysql_fetch_assoc($res))
	{
		if($row['uname'] != 'Admin')
		{
			$msg .= '<option>'.$row['uname'].'</option>';
		}	
		
	}
	echo $msg;
?>