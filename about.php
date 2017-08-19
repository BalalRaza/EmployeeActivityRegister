<?php
	ob_start();
	session_start();
?>

<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>About | Employee Activity Register</title>
	
	<!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
	
	<!-- Custom styles for this site -->
	<link href="css/style.css" rel="stylesheet">
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
            <li class="active"><a href="#">About</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	<section class="section-default section-showcase">
		<div class="container">
			<h1 style="padding-top:0;text-align:center;">About</h1>
			<div class="row">
				<p>Welcome to Narula Institute of Technology's <strong>Employee Activity Register</strong>. This application lets you to keep record of your college activities
				which include aspects like the Paper or Book Chapter which you have written for any Journal, or any Workshop/Conference that you have attended,
				or be it any Lecture that you have delivered at some seminar somewhere.
				</p>
				<p>You may start filling up your activities here and don't worry if you have made a mistake! You can always come back to review your entries later by logging in,
				and navigating to the <strong>Manage Entries</strong> button to make any changes if required. You can also edit your profile details as well. All options are
				available once you login successfully!
				</p>
				<p>You can register yourself as a faculty, staff, TA, HoD or someone from the Administration. And all you need to remember while logging in, is your Employee ID
				and Password. So register yourself now!
				
				</p>
			</div>
		</div>
	</section>
	<footer class="section-primary" style="margin-top:68px;">
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