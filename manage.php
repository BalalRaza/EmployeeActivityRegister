<?php
	ob_start();
	session_start();
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
	
	include('config.php');
	
	
	$q="SELECT * FROM emp WHERE eid='".$eid."'";
	$res=mysql_query($q);
	if(mysql_num_rows($res)>0)
	{
		$row=mysql_fetch_array($res);
		$name=$row["uname"];
	}
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
	
	<!-- Custom javascript for AJAX calls -->
	<script src="js/ajax.js"></script>
	
	<script>
		var $_SESSION = <?php echo json_encode($_SESSION); ?>;
	</script>
	
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
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	
	<section class="section-default section-showcase">
		<div class="container">
			<h2 style="padding-top:0;text-align:right;margin-bottom:20px;">Welcome, <?php echo $name;?></h2>
			<h4>Your Entries</h4>
			<div>
				<h3>Paper/Book Chapter</h3>
				<table>
					<tr>
						<th>Title</th>		
						<th>Type</th>		
						<th>Journal No.</th>		
						<th>Locale</th>
						<th>ISBN</th>
						<th>Year</th>
						<th>Options</th>
					</tr>
					<?php
						$q="SELECT * FROM ppr_bkchp WHERE eid='".$eid."'";
						$res=mysql_query($q);
						$i=1;
						while($row=mysql_fetch_assoc($res))
						{
					?>	
					<tr>
						<td><?php echo $row['title']; ?></td>
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
						<td><?php echo $row['journal_no']; ?></td>
						<td><?php echo $row['locale']; ?></td>
						<td><?php echo $row['isbn']; ?></td>
						<td><?php echo $row['year']; ?></td>
						<td width="10%">
							<a href="delete_entry.php?col=1&key=<?php echo $row['isbn']; ?>&id=<?php echo $eid; ?>">
								<button class="btn-default" name="c1_btn<?php echo $i;?>" style="width:100%;">Delete</button>
							</a>
						</td>
					</tr>
					<?php
						}
					?>
				</table>
				
				<h3>Workshop/Conference</h3>
				<table>
					<tr>
						<th>Title</th>		
						<th>Venue</th>		
						<th>Locale</th>		
						<th>From</th>
						<th>To</th>
						<th>Duration(in days)</th>
						<th>Options</th>
					</tr>
					<?php
						$q="SELECT * FROM wrkshp_conf WHERE eid='".$eid."'";
						$res=mysql_query($q);
						$j=1;
						while($row=mysql_fetch_assoc($res))
						{
					?>	
					<tr>
						<td><?php echo $row['title']; ?></td>
						<td><?php echo $row['venue']; ?></td>
						<td><?php echo $row['locale']; ?></td>
						<td><?php echo $row['from_date']; ?></td>
						<td><?php echo $row['to_date']; ?></td>
						<td><?php echo $row['duration']; ?></td>
						<td width="10%">
							<a href="delete_entry.php?col=2&key=<?php echo $row['title']; ?>&id=<?php echo $eid; ?>">
								<button class="btn-default" name="c2_btn<?php echo $j;?>" style="width:100%;">Delete</button>
							</a>
						</td>
					</tr>
					<?php
						}
					?>
				</table>
				
				<h3>Lecture</h3>
				<table>
					<tr>
						<th>Banner</th>		
						<th>Venue</th>		
						<th>Locale</th>		
						<th>From</th>
						<th>To</th>
						<th>Duration(in days)</th>
						<th>Options</th>
					</tr>
					<?php
						$q="SELECT * FROM lecture WHERE eid='".$eid."'";
						$res=mysql_query($q);
						$k=1;
						while($row=mysql_fetch_assoc($res))
						{
					?>	
					<tr>
						<td><?php echo $row['banner']; ?></td>
						<td><?php echo $row['venue']; ?></td>
						<td><?php echo $row['locale']; ?></td>
						<td><?php echo $row['from_date']; ?></td>
						<td><?php echo $row['to_date']; ?></td>
						<td><?php echo $row['duration']; ?></td>
						<td width="10%">
							<a href="delete_entry.php?col=3&key=<?php echo $row['banner']; ?>&id=<?php echo $eid;?>">
								<button type="button" class="btn-default" name="c3_btn<?php echo $k;?>" style="width:100%;">Delete</button>
							</a>
						</td>
					</tr>
					<?php
						}
					?>
				</table>
				
			</div>
			<div style="text-align:center; margin-top:30px;">
				<a href="index.php"><button type="button" class="btn btn-default">Back</button></a>
			</div>
		</div>
	</section>
	
	<footer class="section-primary" style="margin-top:10px;">
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