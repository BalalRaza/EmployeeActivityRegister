<?php
	ob_start();
	session_start();
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
			<div class="row">
				<div class="col-md-offset-3 col-md-6">
					<h4>Employee List</h4>
					<div id="message">
						<?php
							if(isset($_SESSION['msg']))
							{
								$msg = $_SESSION['msg'];
								if($msg == 'success')
								{
									echo '<p class="newpara" style="color:#0F0;">Employee details wiped successfully.</p>';
									unset($_SESSION['msg']);
								}
								else if($msg == 'failure')
								{
									echo '<p class="newpara" style="color:#F00;">Oops! Some unexpected error occured.</p>';
									unset($_SESSION['msg']);
								}
							}
						?>
					</div>
					<table class="table table-bordered table-striped">
						<tr>
							<th>Sl. No.</th>
							<th>Name</th>
							<th>Options</th>
						</tr>

						<?php
							$q1 = "SELECT * FROM emp";
							$rs=mysql_query($q1);
							$i=1;
							if(mysql_num_rows($rs)>0)
							{
								while(($row = mysql_fetch_assoc($rs)) && $row['eid']!='r00t')
								{
						?>
						<tr>
							<td style="text-align:center;"><?php echo $i++; ?></td>
							<td><?php echo $row['uname']; ?></td>
							<td>
								<a href="wipeEmp.php?eid=<?php echo $row['eid'];?>">
									<button class="btn btn-default btn-block">Delete</button>
								</a>
							</td>
						</tr>
						<?php
								}
							}
						?>
						
					</table>
				</div>
			</div>
		</div>
	</section>
	
	
	<footer class="section-primary" style="margin-top:140px;">
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
		
		$(document).ready(function(){
			setTimeout(function(){
				$("#message").fadeOut(1500);
			},2000);
		});
	</script>
	
  </body>
</html>