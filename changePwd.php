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
				<div class="col-md-6 col-md-offset-3">
					<h4>Change Password</h4>
					<form class="form-horizontal" method="POST" autocomplete="off" style="padding-top:20px;" action="updateAdminPass.php">
						<div class="form-group">
							<label class="col-sm-4 control-label">Old Password</label>
							<input class="col-sm-7" type="password" name="oldPwd" placeholder="Enter current password" required/>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">New Password</label>
							<input class="col-sm-7" type="password" name="newPwd" id="newPwd" placeholder="Enter new password" required/>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Confirm Password</label>
							<input class="col-sm-7" type="password" name="confirmPwd" id="confirmPwd" placeholder="Re-enter new password" required />
						</div>
						<div class="form-group" style="margin-top:20px;">
							<div class="row">
								<div class="col-md-3 col-md-offset-3">
								  <input type="reset" class="btn btn-default btn-block" name="btn_clear" value="Clear" />
								</div>
								<div class="col-md-3">
								  <input type="submit" class="btn btn-default btn-block" name="btn_submit" value="Change" onclick="return Validate()" />
								</div>
							</div>
						</div>
					</form>
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
	</script>
	
	<script type="text/javascript">
		function Validate() 
		{
			var password = document.getElementById("newPwd").value;
			var confirmPassword = document.getElementById("confirmPwd").value;
			if (password != confirmPassword) 
			{
				alert("New Password and Confirm Password fields do not match! Press Clear button and enter again.");
				return false;
			}
			return true;
		}
	</script>
	
  </body>
</html>