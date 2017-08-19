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
            <li class="active"><a href="#">Home</a></li>
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
				<div class="col-md-6 col-md-offset-2" >
					<h4>View Activities</h4>
					<form class="form-horizontal" style="padding-top:20px;" method="POST" action="view_entries.php">
						
						<div id="message">
							<?php
								if(isset($_SESSION['msg']))
								{
									$msg = $_SESSION['msg'];
									if($msg == 'same')
									{
										echo '<p class="newpara" style="color:#F00;">You cannnot select All and No Filter at once.</p>';
										unset($_SESSION['msg']);
									}
									else if($msg == 'success')
									{
										echo '<p class="newpara" style="color:#0F0;">Password updated successfully!</p>';
										unset($_SESSION['msg']);
									}
									else if($msg == 'error')
									{
										echo '<p class="newpara" style="color:#F00;">Oops! Some unexpected error occurred.</p>';
										unset($_SESSION['msg']);
									}
								}
							?>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label">Category</label>
							<div class="col-sm-8">
								<select name="type" id="ddl_category" class="form-control" required>
									<option value="" disabled selected>None</option>
									<option value="1">Paper/Book Chapter</option>
									<option value="2">Workshop/Conference</option>
									<option value="3">Lecture</option>
									<option value="4">All</option>
								</select>
							</div>
							<div class="col-sm-1 tip">
								<span data-toggle="tooltip" data-placement="right" title="Select All to see entire list"><i class="fa fa-question-circle"></i></span>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label">Filter</label>
							<div class="col-sm-8">
								<select name="filter" id="ddl_filter" class="form-control" onchange="show(this.value)" required>
									<option value="" disabled selected>None</option>
									<option value="1">By Department</option>
									<option value="2">By Year</option>
									<option value="3">By Employee</option>
									<option value="4">No Filter</option>
								</select>
							</div>
							<div class="col-sm-1 tip">
								<span data-toggle="tooltip" data-placement="right" title="Select No Filter to see entire list"><i class="fa fa-question-circle"></i></span>
							</div>
						</div>
						
						<div id="number">
							<!-- Content dynamically added!-->
						</div>
						
						
						
						<div class="form-group">
							<div class="row">
								<div class="col-md-2 col-md-offset-4">
								  <input type="reset" name="clear" class="btn btn-default" value="Clear" onclick="show('')"></input>
								</div>
								<div class="col-md-1">
								  <input type="submit" name="submit" class="btn btn-default" value="View Results"></input>
								</div>
							</div>
						</div>
						
					</form>
				</div>
				
				<div class="col-md-3 col-md-offset-1">
					<h4>Manage Profile</h4>
					
					<div class="col-md-12" style="padding-top:15px;">
						<a href="changePwd.php">
							<span data-toggle="tooltip" data-placement="left" title="Kindly change default password"><button class="btn btn-default" name="changePassword" style="width:100%;"><i class="fa fa-key fa-pad"></i>Change Password</button></span>
						</a>
					</div>
					
					<div class="col-md-12" style="padding-top:15px;">
						<a href="deleteEmp.php">
							<span data-toggle="tooltip" data-placement="left" title="Erase Employee Account"><button class="btn btn-default" name="deleteProfile" style="width:100%;"><i class="fa fa-user-times fa-pad"></i>Delete Profile</button></span>
						</a>
					</div>
					
					<div class="col-md-12" style="padding-top:15px;">
						<form action="logout.php">
							<button class="btn btn-default" name="logout" style="width:100%;"><i class="fa fa-sign-out fa-pad"></i>Logout</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<div style="margin-top:160px;">
		<div style="float:right;">
			<h6>Last logged in from 
			<?php
				$res = mysql_query("SELECT * FROM history");
				if(mysql_num_rows($res)>0)
				{
					$row=mysql_fetch_array($res);
					echo $row['ip']." at ".$row['date'];
				}
			?>
			</h6>
		</div>
	</div>
	<footer class="section-primary navbar-fixed-bottom" style="margin-top:140px;" >
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
	
	<script>
		function show(val)
		{
			var div=document.getElementById("number");
			if(val == 1)
			{
				div.innerHTML = '<div class="form-group">\
									<label class="col-sm-3 control-label" style="padding-left:5px;">Department</label>\
									<div class="col-sm-8">\
										<select name="c1filterByDept" id="ddl_c1dept" class="form-control" required>\
											<option value="" disabled selected>None</option>\
											<option>Mechanics Department</option>\
											<option>Department of Electrical and Electronics Engineering</option>\
											<option>Department of Electronics and Instrumentation Engineering</option>\
											<option>Department of Computer Science and Engineering</option>\
											<option>Department of Mathematics</option>\
											<option>Chemistry Department</option>\
											<option>Department of Management Studies</option>\
										</select>\
									</div>\
								</div>';
			}
			else if(val == 2)
			{
				div.innerHTML = '<div class="form-group">\
									<label class="col-sm-3 control-label" style="padding-left:5px;">Year</label>\
									<div class="col-sm-8">\
										<select name="c1filterByYear" id="ddl_c1year" class="form-control" required>\
											<option value="" disabled selected>None</option>\
										</select>\
									</div>\
								</div>';
				var $select = $('#ddl_c1year');
				var d=new Date();
				var currYear = d.getFullYear();
				for (i=2000;i<=currYear;i++){
					$select.append($('<option></option>').val(i).html(i))
				}
			}
			else if(val == 3)
			{
				var msg = '\<div class="form-group">\
						<label class="col-sm-3 control-label" style="padding-left:5px;">Name</label>\
						<div class="col-sm-8">\
						<select class="form-control" name="c1filterByName" required>';
				
				$.post('getEmpList.php', function(data){
					msg	+= data +'</select></div>';
					div.innerHTML = msg;
				});
				
			}
			else
			{
				
				div.innerHTML = '';
			}
			//document.getElementById('number').appendChild(div);
		}
		$(document).ready(function(){
			setTimeout(function(){
				$("#message").fadeOut(1500);
			},5000);
		});
	</script>
  </body>
</html>
