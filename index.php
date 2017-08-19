<?php
	ob_start();
	session_start();
	if(isset($_SESSION['msg'])){
		$msg=$_SESSION['msg'];
		unset($_SESSION['msg']);
	}
	if(isset($_SESSION['eid']))
	{
		if($_SESSION['eid'] == 'r00t')
		{
			header("Location:administrator.php");
		}
		else
		{
			header("Location: loggedin.php");
		}
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
	
    <!-- Custom styles for this site -->
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
            <li class="active"><a href="#">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	<section class="section-default section-showcase">
		<div class="container">
			<h1 style="padding-top:0;text-align:center;">Employee Activity Register</h1>
			<div class="row">
				<div class="col-md-8">
					<h2>New user? Register here</h2>
					<form id="myFormLeft" class="form-horizontal" method="POST" autocomplete="off" style="padding-top:20px;" action="register_check.php">
						<div class="form-group">
							<label class="col-sm-3 control-label">Name</label>
							<div class="col-sm-7">
							  <input type="text" name="username_left" class="form-control" placeholder="Username" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Password</label>
							<div class="col-sm-7">
							  <input type="password" name="password_left" class="form-control" placeholder="Password" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Department</label>
							<div class="col-sm-7">
								<select name="department" class="form-control" required>
									<option value="" disabled selected>None</option>
									<option>Mechanics Department</option>
									<option>Department of Electrical and Electronics Engineering</option>
									<option>Department of Electronics and Instrumentation Engineering</option>
									<option>Department of Computer Science and Engineering</option>
									<option>Department of Mathematics</option>
									<option>Chemistry Department</option>
									<option>Department of Management Studies</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Employee Type</label>
							<div class="col-sm-7">
								<select name="empType" class="form-control" required>
									<option value="" disabled selected>None</option>
									<option>Faculty</option>
									<option>TA</option>
									<option>Staff</option>
									<option>Head of the Department</option>
									<option>Administration</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Employee ID</label>
							<div class="col-sm-5">
							  <input type="text" name="empId" class="form-control" id="inputEmail3" placeholder="Enter your Employee ID here" required>
							</div>
							
						</div>
						<div id="empid_error">
							<?php
								if(isset($msg)){
									if($msg=="empid_exists"){
										echo '<p class="newpara" style="color:#F00;padding-top:8px;">Employee already exists.</p>';
									}
								}
							?>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-1 col-md-offset-5">
								  <input type="reset" class="btn btn-default" name="btn_clear" value="Clear"></input>
								</div>
								<div class="col-md-1">
								  <input type="submit" class="btn btn-default" name="btn_register" value="Register"></input>
								</div>
							</div>
						</div>
					</form>
				</div>
				
				
				<div class="col-md-4">
					<h2>Existing user? Login here</h2>
					<form class="form-horizontal" style="padding-top:20px;" method="POST" autocomplete="off" action="login_check.php">

						<div id="message">
							<?php
								if(isset($msg))
								{
									if($msg=="wrong combo")
									{
										echo '<p class="newpara" style="color:#F00;">Wrong EID Password Combination.</p>';
									}
									else if($msg=="wrong eid")
									{
										echo '<p class="newpara" style="color:#F00;">No such EID exists.</p>';
									}
									else if($msg == 'triedHacking')
									{
										echo '<p class="newpara" style="color:#F00;">Incorrect Admin Password. Try hacking elsewhere!</p>';
										unset($_SESSION['msg']);
									}
								}
							?>
						</div>
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label"><i class="fa fa-user"></i></label>
						<div class="col-sm-8">
						  <input type="text" name="empid" class="form-control" id="inputEmail3" placeholder="Employee ID" required>
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label"><i class="fa fa-key"></i></label>
						<div class="col-sm-8">
						  <input type="password" name="password_right" class="form-control" id="inputPassword3" placeholder="Password" required>
						</div>
					  </div>
					  
					  <div class="form-group">
						<div class="col-sm-offset-3 col-sm-10">
						  <input type="submit" class="btn btn-default" name="btn_login" value="Sign in"></input>
						</div>
					  </div>
					</form>
				</div>
			</div>
		</div>
	</section>
	
	<footer class="section-primary">
		<div  class="container">
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
				$("#empid_error").fadeOut(1500);
			},3000);
		});
	</script>
	
  </body>
</html>
