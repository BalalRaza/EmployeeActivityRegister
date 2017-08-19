<?php
	ob_start();
	session_start();
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
	
	
	$q="SELECT * FROM emp WHERE eid='".$eid."'";
	$res=mysql_query($q);
	if(mysql_num_rows($res)>0)
	{
		$row=mysql_fetch_array($res);
		$name=$row["uname"];
	}
	$type = $_POST['type'];
	$filter = $_POST['filter'];
	
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Employee Activity | Narula Institute of Technology</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
	
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
	<link href="css/font-awesome.css" rel="stylesheet">
	
  </head>

  <body>

    <nav class="navbar navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://www.nit.ac.in"><img src="img/logo.png" alt="NiT"/></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse navbar-right">
          <ul class="nav navbar-nav">
            <li><a href="administrator.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	<section class="section-default section-showcase">
		<div class="container">
			<h2 style="padding-top:0;text-align:right;margin-bottom:20px;">Welcome, <?php echo $name; ?></h2>
			<h4></h4>
			<div>
				
					<?php
						
						switch($type)
						{
							//Paper/Book Chapter
							case 1:
					?>
				<table>
					<tr>
						<th>Title</th>		
						<th>Type</th>		
						<th>Journal No.</th>		
						<th>Locale</th>
						<th>ISBN</th>
						<th>Year</th>
						<th>Emp. ID</th>
					</tr>
					
					<?php
								switch($filter)
								{
									//By Department
									case 1:
					?>
					<h3>By Department</h3>
					<?php
										$dept = $_POST['c1filterByDept'];
										$q = "SELECT eid FROM emp WHERE dept='".$dept."'";
										$res = mysql_query($q);
										while($row = mysql_fetch_assoc($res))
										{
											if($row['eid']!='r00t')
											{
												$q2 = "SELECT * FROM ppr_bkchp WHERE eid='".$row['eid']."'";
												$res2 = mysql_query($q2);
												while($row2 = mysql_fetch_assoc($res2))
												{
					?>
					
					<tr>
						<td><?php echo $row2['title']?></td>
						<td>
							<?php
									switch($row2['type'])
									{
										case 1:
											echo 'Journal';
											break;
										case 2:
											echo 'Book Chapter';
											break;
										case 3:
											echo 'Conference';
											break;
										default:
											echo 'Error';
											break;
									}
							?>
						</td>
						<td><?php echo $row2['journal_no']?></td>
						<td><?php echo $row2['locale']?></td>
						<td><?php echo $row2['isbn']?></td>
						<td><?php echo $row2['year']?></td>
						<td><?php echo $row['eid']?></td>
					</tr>
				
					<?php
												}
											}
										}
									break;
									//By Year
									case 2:
					?>
				
					<h3>By Year</h3>
					<?php
										$year = $_POST['c1filterByYear'];
										$q2 = "SELECT * FROM ppr_bkchp WHERE year='".$year."'";
										$res2 = mysql_query($q2);
										while($row2 = mysql_fetch_assoc($res2))
										{
					?>
					<tr>
						<td><?php echo $row2['title']?></td>
						<td>
							<?php
									switch($row2['type'])
									{
										case 1:
											echo 'Journal';
											break;
										case 2:
											echo 'Book Chapter';
											break;
										case 3:
											echo 'Conference';
											break;
										default:
											echo 'Error';
											break;
									}
							?>
						</td>
						<td><?php echo $row2['journal_no']?></td>
						<td><?php echo $row2['locale']?></td>
						<td><?php echo $row2['isbn']?></td>
						<td><?php echo $row2['year']?></td>
						<td><?php echo $row2['eid']?></td>
					</tr>
					<?php
										}
									break;
									//By Employee
									case 3:
					?>
					<h3>By Employee</h3>
					<?php
										$name = $_POST['c1filterByName'];
										$q = "SELECT eid FROM emp WHERE uname='".$name."'";
										$res = mysql_query($q);
										while($row = mysql_fetch_assoc($res))
										{
											$q2 = "SELECT * FROM ppr_bkchp WHERE eid='".$row['eid']."'";
											$res2 = mysql_query($q2);
											while($row2 = mysql_fetch_assoc($res2))
											{
					?>
					<tr>
						<td><?php echo $row2['title']?></td>
						<td>
							<?php
									switch($row2['type'])
									{
										case 1:
											echo 'Journal';
											break;
										case 2:
											echo 'Book Chapter';
											break;
										case 3:
											echo 'Conference';
											break;
										default:
											echo 'Error';
											break;
									}
							?>
						</td>
						<td><?php echo $row2['journal_no']?></td>
						<td><?php echo $row2['locale']?></td>
						<td><?php echo $row2['isbn']?></td>
						<td><?php echo $row2['year']?></td>
						<td><?php echo $row2['eid']?></td>
					</tr>
					<?php
											}
										}
									break;
									//No Filters
									case 4:
					?>
					<h3>All Papers/Book Chapters</h3>
					<?php
										$q = "SELECT * FROM ppr_bkchp";
										$res = mysql_query($q);
										while($row = mysql_fetch_assoc($res))
										{
					?>
					<tr>
						<td><?php echo $row['title']?></td>
						<td>
							<?php
									switch($row['type'])
									{
										case 1:
											echo 'Journal';
											break;
										case 2:
											echo 'Book Chapter';
											break;
										case 3:
											echo 'Conference';
											break;
										default:
											echo 'Error';
											break;
									}
							?>
						</td>
						<td><?php echo $row['journal_no']?></td>
						<td><?php echo $row['locale']?></td>
						<td><?php echo $row['isbn']?></td>
						<td><?php echo $row['year']?></td>
						<td><?php echo $row['eid']?></td>
					</tr>
					<?php
										}
									break;
								}
								break;
					?>	
				</table>
					<?php
							//Workshop/Conference
							case 2:
					?>
				<table>
					<tr>
						<th>Title</th>		
						<th>Venue</th>		
						<th>Locale</th>		
						<th>From (YYYY-MM-DD)</th>
						<th>To (YYYY-MM-DD)</th>
						<th>Duration</th>
						<th>Emp. ID</th>
					</tr>
					<?php
								switch($filter)
								{
									//By Department
									case 1:
					?>
					<h3>By Department</h3>
					
					<?php
										$dept = $_POST['c1filterByDept'];
										$q = "SELECT eid FROM emp WHERE dept='".$dept."'";
										$res = mysql_query($q);
										while($row = mysql_fetch_assoc($res))
										{
											if($row['eid']!='r00t')
											{
												$q2 = "SELECT * FROM wrkshp_conf WHERE eid='".$row['eid']."'";
												$res2 = mysql_query($q2);
												while($row2 = mysql_fetch_assoc($res2))
												{
					?>
					<tr>
						<td><?php echo $row2['title'];?></td>
						<td><?php echo $row2['venue'];?></td>
						<td><?php echo $row2['locale'];?></td>
						<td><?php echo $row2['from_date'];?></td>
						<td><?php echo $row2['to_date'];?></td>
						<td><?php echo $row2['duration'];?></td>
						<td><?php echo $row2['eid'];?></td>
					</tr>
					<?php
												}
											}
										}
									break;
									//By Year
									case 2:
					?>
					<h3>By Year</h3>
					<?php				
										$year = $_POST['c1filterByYear'];
										$q = "SELECT * FROM wrkshp_conf";
										$res = mysql_query($q);
										while($row = mysql_fetch_assoc($res))
										{
											$d = strtotime($row['from_date']);
											$y = date('Y', $d);
											if($y == $year)
											{
												
											
					?>
					<tr>
						<td><?php echo $row['title'];?></td>
						<td><?php echo $row['venue'];?></td>
						<td><?php echo $row['locale'];?></td>
						<td><?php echo $row['from_date'];?></td>
						<td><?php echo $row['to_date'];?></td>
						<td><?php echo $row['duration'];?></td>
						<td><?php echo $row['eid'];?></td>
					</tr>
					<?php
											}
										}
									break;
									//By Employee
									case 3:
					?>
					<h3>By Employee</h3>
					<?php
										$name = $_POST['c1filterByName'];
										$q = "SELECT eid FROM emp WHERE uname='".$name."'";
										$res = mysql_query($q);
										while($row = mysql_fetch_assoc($res))
										{
											$q2 = "SELECT * FROM wrkshp_conf WHERE eid='".$row['eid']."'";
											$res2 = mysql_query($q2);
											while($row2 = mysql_fetch_assoc($res2))
											{
					?>
					<tr>
						<td><?php echo $row2['title'];?></td>
						<td><?php echo $row2['venue'];?></td>
						<td><?php echo $row2['locale'];?></td>
						<td><?php echo $row2['from_date'];?></td>
						<td><?php echo $row2['to_date'];?></td>
						<td><?php echo $row2['duration'];?></td>
						<td><?php echo $row2['eid'];?></td>
					</tr>
					<?php
											}
										}
									break;
									//No Filters
									case 4:
					?>
					<h3>All Workshops/Conferences</h3>
					<?php
										$q = "SELECT * FROM wrkshp_conf";
										$res = mysql_query($q);
										while($row = mysql_fetch_assoc($res))
										{
					?>
					<tr>
						<td><?php echo $row['title'];?></td>
						<td><?php echo $row['venue'];?></td>
						<td><?php echo $row['locale'];?></td>
						<td><?php echo $row['from_date'];?></td>
						<td><?php echo $row['to_date'];?></td>
						<td><?php echo $row['duration'];?></td>
						<td><?php echo $row['eid'];?></td>
					</tr>
				
					<?php
										}
									break;
								}
							break;
					?>
				</table>	
					<?php
							//Lecture
							case 3:
					?>
				<table>
					<tr>
						<th>Banner</th>		
						<th>Venue</th>		
						<th>Locale</th>		
						<th>From (YYYY-MM-DD)</th>
						<th>To (YYYY-MM-DD)</th>
						<th>Duration</th>
						<th>Emp. ID</th>
					</tr>
					<?php
								switch($filter)
								{
									//By Department
									case 1:
					?>
					<h3>By Department</h3>
					
					<?php
										$dept = $_POST['c1filterByDept'];
										$q = "SELECT eid FROM emp WHERE dept='".$dept."'";
										$res = mysql_query($q);
										while($row = mysql_fetch_assoc($res))
										{
											if($row['eid']!='r00t')
											{
												$q2 = "SELECT * FROM lecture WHERE eid='".$row['eid']."'";
												$res2 = mysql_query($q2);
												while($row2 = mysql_fetch_assoc($res2))
												{
					?>
					<tr>
						<td><?php echo $row2['banner'];?></td>
						<td><?php echo $row2['venue'];?></td>
						<td><?php echo $row2['locale'];?></td>
						<td><?php echo $row2['from_date'];?></td>
						<td><?php echo $row2['to_date'];?></td>
						<td><?php echo $row2['duration'];?></td>
						<td><?php echo $row2['eid'];?></td>
					</tr>
					<?php
												}
											}
										}
									break;
									//By Year
									case 2:
					?>
					<h3>By Year</h3>
					<?php				
										$year = $_POST['c1filterByYear'];
										$q = "SELECT * FROM lecture";
										$res = mysql_query($q);
										while($row = mysql_fetch_assoc($res))
										{
											$d = strtotime($row['from_date']);
											$y = date('Y', $d);
											if($y == $year)
											{
												
											
					?>
					<tr>
						<td><?php echo $row['banner'];?></td>
						<td><?php echo $row['venue'];?></td>
						<td><?php echo $row['locale'];?></td>
						<td><?php echo $row['from_date'];?></td>
						<td><?php echo $row['to_date'];?></td>
						<td><?php echo $row['duration'];?></td>
						<td><?php echo $row['eid'];?></td>
					</tr>
					<?php
											}
										}
									break;
									//By Employee
									case 3:
					?>
					<h3>By Employee</h3>
					<?php
										$name = $_POST['c1filterByName'];
										$q = "SELECT eid FROM emp WHERE uname='".$name."'";
										$res = mysql_query($q);
										while($row = mysql_fetch_assoc($res))
										{
											$q2 = "SELECT * FROM lecture WHERE eid='".$row['eid']."'";
											$res2 = mysql_query($q2);
											while($row2 = mysql_fetch_assoc($res2))
											{
					?>
					<tr>
						<td><?php echo $row2['banner'];?></td>
						<td><?php echo $row2['venue'];?></td>
						<td><?php echo $row2['locale'];?></td>
						<td><?php echo $row2['from_date'];?></td>
						<td><?php echo $row2['to_date'];?></td>
						<td><?php echo $row2['duration'];?></td>
						<td><?php echo $row2['eid'];?></td>
					</tr>
					<?php
											}
										}
									break;
									//No Filters
									case 4:
					?>
					<h3>All Lectures</h3>
					<?php
										$q = "SELECT * FROM lecture";
										$res = mysql_query($q);
										while($row = mysql_fetch_assoc($res))
										{
					?>
					<tr>
						<td><?php echo $row['banner'];?></td>
						<td><?php echo $row['venue'];?></td>
						<td><?php echo $row['locale'];?></td>
						<td><?php echo $row['from_date'];?></td>
						<td><?php echo $row['to_date'];?></td>
						<td><?php echo $row['duration'];?></td>
						<td><?php echo $row['eid'];?></td>
					</tr>
					<?php
										}
									break;
								}
							break;
					?>
				</table>
					<?php
							//All
							case 4:
								switch($filter)
								{
									//By Department
									case 1:
										$dept = $_POST['c1filterByDept'];
					?>
				<h3>Papers/Book Chapters</h3>
				<table>
					<tr>
						<th>Title</th>		
						<th>Type</th>		
						<th>Journal No.</th>		
						<th>Locale</th>
						<th>ISBN</th>
						<th>Year</th>
						<th>Emp. ID</th>
					</tr>
					<?php
										$q = "SELECT eid FROM emp WHERE dept='".$dept."'";
										$res = mysql_query($q);
										while($row = mysql_fetch_assoc($res))
										{
											if($row['eid']!='r00t')
											{
												$id = $row['eid'];
												$q2 = "SELECT * FROM ppr_bkchp WHERE eid='".$id."'";
												$res2 = mysql_query($q2);
												while($row2 = mysql_fetch_assoc($res2))
												{
													
					?>
					
					<tr>
						<td><?php echo $row2['title']?></td>
						<td>
							<?php
									switch($row2['type'])
									{
										case 1:
											echo 'Journal';
											break;
										case 2:
											echo 'Book Chapter';
											break;
										case 3:
											echo 'Conference';
											break;
										default:
											echo 'Error';
											break;
									}
							?>
						</td>
						<td><?php echo $row2['journal_no']?></td>
						<td><?php echo $row2['locale']?></td>
						<td><?php echo $row2['isbn']?></td>
						<td><?php echo $row2['year']?></td>
						<td><?php echo $row['eid']?></td>
					</tr>
				
					<?php
					
												}
											}
										}
					?>
				</table>
				<h3>Workshops/Conferences</h3>
				<table>	
					<tr>
						<th>Title</th>		
						<th>Venue</th>		
						<th>Locale</th>		
						<th>From (YYYY-MM-DD)</th>
						<th>To (YYYY-MM-DD)</th>
						<th>Duration</th>
						<th>Emp. ID</th>
					</tr>
					<?php
										
										$q = "SELECT * FROM wrkshp_conf WHERE eid='".$id."'";
										$res = mysql_query($q);
										while($row2 = mysql_fetch_assoc($res))
										{
					?>
					<tr>
						<td><?php echo $row2['title'];?></td>
						<td><?php echo $row2['venue'];?></td>
						<td><?php echo $row2['locale'];?></td>
						<td><?php echo $row2['from_date'];?></td>
						<td><?php echo $row2['to_date'];?></td>
						<td><?php echo $row2['duration'];?></td>
						<td><?php echo $row2['eid'];?></td>
					</tr>
				
					<?php					
										}
					?>
				</table>
				<h3>Lectures</h3>	
				<table>	
					<tr>
						<th>Banner</th>		
						<th>Venue</th>		
						<th>Locale</th>		
						<th>From (YYYY-MM-DD)</th>
						<th>To (YYYY-MM-DD)</th>
						<th>Duration</th>
						<th>Emp. ID</th>
					</tr>
					<?php
										$q = "SELECT * FROM lecture WHERE eid='".$id."'";
										$res = mysql_query($q);
										while($row2 = mysql_fetch_assoc($res))
										{
					?>
					
					<tr>
						<td><?php echo $row2['banner'];?></td>
						<td><?php echo $row2['venue'];?></td>
						<td><?php echo $row2['locale'];?></td>
						<td><?php echo $row2['from_date'];?></td>
						<td><?php echo $row2['to_date'];?></td>
						<td><?php echo $row2['duration'];?></td>
						<td><?php echo $row2['eid'];?></td>
					</tr>
					<?php
										}
					?>
				</table>	
					<?php
									break;
									//By Year
									case 2:
										$year = $_POST['c1filterByYear'];
					?>
				<h3>Papers/Book Chapters</h3>
				<table>
					<tr>
						<th>Title</th>		
						<th>Type</th>		
						<th>Journal No.</th>		
						<th>Locale</th>
						<th>ISBN</th>
						<th>Year</th>
						<th>Emp. ID</th>
					</tr>
					<?php
										$q = "SELECT * FROM ppr_bkchp WHERE year='".$year."'";
										$res = mysql_query($q);
										while($row2 = mysql_fetch_assoc($res))
										{
											$d = strtotime($row2['year']);
											$y = date('Y', $d);
											if($y == $year)
											{
					?>
					
					<tr>
						<td><?php echo $row2['title']?></td>
						<td>
							<?php
									switch($row2['type'])
									{
										case 1:
											echo 'Journal';
											break;
										case 2:
											echo 'Book Chapter';
											break;
										case 3:
											echo 'Conference';
											break;
										default:
											echo 'Error';
											break;
									}
							?>
						</td>
						<td><?php echo $row['journal_no']?></td>
						<td><?php echo $row['locale']?></td>
						<td><?php echo $row['isbn']?></td>
						<td><?php echo $row['year']?></td>
						<td><?php echo $row['eid']?></td>
					</tr>
				
					<?php
											}
										}
					?>
				</table>
				<h3>Workshops/Conferences</h3>
				<table>	
					<tr>
						<th>Title</th>		
						<th>Venue</th>		
						<th>Locale</th>		
						<th>From (YYYY-MM-DD)</th>
						<th>To (YYYY-MM-DD)</th>
						<th>Duration</th>
						<th>Emp. ID</th>
					</tr>
					<?php
										
										$q = "SELECT * FROM wrkshp_conf";
										$res = mysql_query($q);
										while($row = mysql_fetch_assoc($res))
										{
											$d = strtotime($row['from_date']);
											$y = date('Y', $d);
											if($y == $year)
											{
					?>
					<tr>
						<td><?php echo $row['title'];?></td>
						<td><?php echo $row['venue'];?></td>
						<td><?php echo $row['locale'];?></td>
						<td><?php echo $row['from_date'];?></td>
						<td><?php echo $row['to_date'];?></td>
						<td><?php echo $row['duration'];?></td>
						<td><?php echo $row['eid'];?></td>
					</tr>
				
					<?php
											}
										}
					?>
				</table>
				<h3>Lectures</h3>	
				<table>	
					<tr>
						<th>Banner</th>		
						<th>Venue</th>		
						<th>Locale</th>		
						<th>From (YYYY-MM-DD)</th>
						<th>To (YYYY-MM-DD)</th>
						<th>Duration</th>
						<th>Emp. ID</th>
					</tr>
					<?php
									$q = "SELECT * FROM lecture";
									$res = mysql_query($q);										
										while($row = mysql_fetch_assoc($res))
										{
											$d = strtotime($row['from_date']);
											$y = date('Y', $d);
											if($y == $year)
											{
					?>
					
					<tr>
						<td><?php echo $row['banner'];?></td>
						<td><?php echo $row['venue'];?></td>
						<td><?php echo $row['locale'];?></td>
						<td><?php echo $row['from_date'];?></td>
						<td><?php echo $row['to_date'];?></td>
						<td><?php echo $row['duration'];?></td>
						<td><?php echo $row['eid'];?></td>
					</tr>
					<?php
											}
										}
										
					?>
				</table>	
					<?php
									break;
									//By Employee
									case 3:
										$name=$_POST['c1filterByName'];
					?>
				<h3>Papers/Book Chapters</h3>
				<table>
					<tr>
						<th>Title</th>		
						<th>Type</th>		
						<th>Journal No.</th>		
						<th>Locale</th>
						<th>ISBN</th>
						<th>Year</th>
						<th>Emp. ID</th>
					</tr>
					<?php
										$q1 = "SELECT * FROM emp WHERE uname='".$name."'";
										$res1 = mysql_query($q1);
										$row1 = mysql_fetch_assoc($res1);
										$id = $row1['eid'];
										$q = "SELECT * FROM ppr_bkchp WHERE eid='".$id."'";
										$res = mysql_query($q);
										while($row2 = mysql_fetch_assoc($res))
										{
					?>
					<tr>
						<td><?php echo $row2['title']; ?></td>
						<td>
							<?php
									switch($row2['type'])
									{
										case 1:
											echo 'Journal';
											break;
										case 2:
											echo 'Book Chapter';
											break;
										case 3:
											echo 'Conference';
											break;
										default:
											echo 'Error';
											break;
									}
							?>
						</td>
						<td><?php echo $row2['journal_no']; ?></td>
						<td><?php echo $row2['locale']; ?></td>
						<td><?php echo $row2['isbn']; ?></td>
						<td><?php echo $row2['year']; ?></td>
						<td><?php echo $row2['eid']; ?></td>
					</tr>
				
					<?php
										}
					?>
				</table>
				<h3>Workshops/Conferences</h3>
				<table>
					<tr>
						<th>Title</th>		
						<th>Venue</th>		
						<th>Locale</th>		
						<th>From (YYYY-MM-DD)</th>
						<th>To (YYYY-MM-DD)</th>
						<th>Duration</th>
						<th>Emp. ID</th>
					</tr>
					<?php
										
										$q = "SELECT * FROM wrkshp_conf WHERE eid='".$id."'";
										$res = mysql_query($q);
										while($row = mysql_fetch_assoc($res))
										{
					?>
					<tr>
						<td><?php echo $row['title'];?></td>
						<td><?php echo $row['venue'];?></td>
						<td><?php echo $row['locale'];?></td>
						<td><?php echo $row['from_date'];?></td>
						<td><?php echo $row['to_date'];?></td>
						<td><?php echo $row['duration'];?></td>
						<td><?php echo $row['eid'];?></td>
					</tr>
				
				<?php
										}
				?>
				</table>
				<h3>Lectures</h3>	
				<table>	
					<tr>
						<th>Banner</th>		
						<th>Venue</th>		
						<th>Locale</th>		
						<th>From (YYYY-MM-DD)</th>
						<th>To (YYYY-MM-DD)</th>
						<th>Duration</th>
						<th>Emp. ID</th>
					</tr>
					<?php
									$q = "SELECT * FROM lecture WHERE eid='".$id."'";
									$res = mysql_query($q);										
									while($row = mysql_fetch_assoc($res))
									{
					?>
					<tr>
						<td><?php echo $row['banner'];?></td>
						<td><?php echo $row['venue'];?></td>
						<td><?php echo $row['locale'];?></td>
						<td><?php echo $row['from_date'];?></td>
						<td><?php echo $row['to_date'];?></td>
						<td><?php echo $row['duration'];?></td>
						<td><?php echo $row['eid'];?></td>
					</tr>
					<?php
									}
									break;
									case 4:
										$_SESSION['msg'] = 'same';
										header("Location: administrator.php");
									break;
								}
							break;
						}
					?>
				</table>
			</div>
		</div>
	</section>
	
	<footer class="section-primary navbar-fixed-bottom" style="margin-top:10px;">
		<div class="container" >
			<h4>Made by <span data-toggle="tooltip" data-placement="top" id="name" title="Software and Web Developer">Md Balal Raza</span>, Department of Computer Science and Engineering, 2nd Year as in June, 2015.</h4>
		</div>
	</footer>
	
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.js"></script>
	
	<script>
		$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip(); 
		});
	</script>
  </body>
 </html>