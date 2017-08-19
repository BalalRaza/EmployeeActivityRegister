<?php
	ob_start();
	session_start();
?>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Contact | Employee Activity Register</title>
	
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
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li class="active"><a href="#">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	<section class="section-default section-showcase">
		<div class="container">
			<h1 style="padding-top:0;text-align:center;">CONTACT</h1>
			<div class="row">
				<div class="col-md-6">
					<h2 style="border-bottom:2px solid #406c96;">Administrator</h2>
					<div class="form-group">
						<label class="col-sm-1 control-label" ><i class="fa fa-user"></i></label>
						<label class="col-sm-3 control-label">Name</label>
						<label class="col-sm-8 control-label">John Doe</label>
					</div>
					<div class="form-group">
						<label class="col-sm-1 control-label" ><i class="fa fa-mobile"></i></label>
						<label class="col-sm-3 control-label">Mobile</label>
						<label class="col-sm-8 control-label">(+91) - 98 76 543 210</label>
					</div>
					<div class="form-group">
						<label class="col-sm-1 control-label"><i class="fa fa-linkedin-square"></i></label>
						<label class="col-sm-3 control-label">LinkedIN</label>
						<label class="col-sm-8 control-label">in.linkedin.com/in/johndoe</label>
					</div>
					<div class="form-group">
						<label class="col-sm-1 control-label"><i class="fa fa-envelope-o"></i></label>
						<label class="col-sm-3 control-label">Email</label>
						<label class="col-sm-8 control-label">john.doe@example.com</label>
					</div>
				</div>
				<div class="col-md-6">
					<h2 style="border-bottom:2px solid #406c96;">Developer</h2>
					<div class="form-group">
						<label class="col-sm-1 control-label" ><i class="fa fa-user"></i></label>
						<label class="col-sm-3 control-label">Name</label>
						<label class="col-sm-8 control-label">Md Balal Raza</label>
					</div>
					<div class="form-group">
						<label class="col-sm-1 control-label" ><i class="fa fa-mobile"></i></label>
						<label class="col-sm-3 control-label">Mobile</label>
						<label class="col-sm-8 control-label">(+91) - 80 13 971 324</label>
					</div>
					<div class="form-group">
						<label class="col-sm-1 control-label"><i class="fa fa-linkedin-square"></i></label>
						<label class="col-sm-3 control-label">LinkedIN</label>
						<label class="col-sm-8 control-label">in.linkedin.com/in/mdbalalraza</label>
					</div>
					<div class="form-group">
						<label class="col-sm-1 control-label"><i class="fa fa-envelope-o"></i></label>
						<label class="col-sm-3 control-label">Email</label>
						<label class="col-sm-8 control-label">balal.raza@gmail.com</label>
					</div>
				</div>
			</div>
		</div>
	</section>
	<footer class="section-primary" style="margin-top:192px;">
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
	</script>
</body>

</html>