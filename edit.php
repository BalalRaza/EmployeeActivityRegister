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
	
	if(isset($_SESSION['msg']))
	{
		$msg = $_SESSION['msg'];
		if($msg == 'success')
		{
			echo "<script type='text/javascript'>alert('Update successful!');</script>";
		}
		elseif($msg == 'failure')
		{
			echo "<script type='text/javascript'>alert('Error Encountered. Contact System Admin. Details in the Contacts Page');</script>";
		}
		unset($_SESSION['msg']);
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
			<div class="row">
			
			
				<!--Edit Credentials-->
				
				<div class="col-md-6" >
					<h4>Edit Credentials</h4>
					<form class="form-horizontal" style="padding-top:20px;" method="POST" action="update_credentials.php">
						<div class="form-group">
							<label class="col-sm-4 control-label">Parameter</label>
							<div class="col-sm-7">
								<select name="parameter" id="ddl_parameter" class="form-control" onchange="show(this.value)" required>
									<option value="" disabled selected>None</option>
									<option value="1">Name</option>
									<option value="2">Password</option>
									<option value="3">Department</option>
									<option value="4">Employee Type</option>
									<option value="5">Employee ID</option>
								</select>
							</div>
							<div class="col-sm-1 tip">
								<span data-toggle="tooltip" data-placement="right" title="What do you want to change?"><i class="fa fa-question-circle"></i></span>
							</div>
						</div>
						
						<div id="parameter">
							<!-- Content dynamically added!-->
						</div>
						
						<div class="form-group">
							<div class="row">
								<div class="col-md-3 col-md-offset-4">
								  <input type="reset" name="btn_clear" class="btn btn-default" value="Clear" onclick="show('')" ></input> 
								</div>
								<div class="col-md-1">
								  <input type="submit" name="btn_change" class="btn btn-default" value="Change"></input>
								</div>
							</div>
						</div>
						
					</form>
				</div>
				
				
				<!--Present Credentials-->
				
				<div class="col-md-6" >
					<h4>Present Credentials</h4>
					<form class="form-horizontal" style="padding-top:20px;">
						<div class="form-group">
							<label class="col-sm-4 control-label">User Name</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" value="<?php echo $row['uname']?>" disabled/>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-4 control-label">Department</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" value="<?php echo $row['dept']?>" disabled/>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-4 control-label">Employee Type</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" value="<?php echo $row['emptype']?>" disabled/>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-4 control-label">Employee ID</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" value="<?php echo $row['eid']?>" disabled/>
							</div>
						</div>
					</form>
				</div>
				
			</div>
			
			<div class="row">
				<div class="col-md-2 col-md-offset-11">
					<a href="index.php"><button type="button"class="btn btn-default">Back</button></a>
				</div>
			</div>
		</div>
	</section>
	
	<footer class="section-primary" style="margin-top:41px;">
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
			var div=document.getElementById("parameter");
			if(val == 1)
			{
				div.innerHTML = '<div class="form-group">\
									<label class="col-sm-4 control-label" style="padding-left:5px;">Name</label>\
									<div class="col-sm-7">\
										<input type="text" name="txt_name" class="form-control" placeholder="Enter new username" required/>\
									</div>\
								</div>';
			}
			else if(val == 2)
			{
				div.innerHTML = '<div class="form-group">\
									<label class="col-sm-4 control-label" style="padding-left:5px;">Current Password</label>\
									<div class="col-sm-7">\
										<input type="password" name="curr_pwd" class="form-control" placeholder="Your present password" required/>\
									</div>\
								</div>\
								<div class="form-group">\
									<label class="col-sm-4 control-label" style="padding-left:5px;">New Password</label>\
									<div class="col-sm-7">\
										<input type="password" name="new_pwd" class="form-control" placeholder="Enter new password" required/>\
									</div>\
								</div>';
			}
			else if(val == 3)
			{
				div.innerHTML = '<div class="form-group">\
									<label class="col-sm-4 control-label" style="padding-left:5px;">Department</label>\
									<div class="col-sm-7">\
										<select name="new_dept" id="ddl_dept" class="form-control" required>\
											<option value="" disabled selected>None</option>\
											<option>Mechanics Department</option>\
											<option>Department of Electrical and Electronics Engineering</option>\
											<option>Department of Electronics and Instrumentation Engineering</option>\
											<option>Department of Computer Science and Engineering</option>\
											<option>Department of Mathematics</option>\
											<option>Chemistry Department</option>\
											<option>Department of Management Studies</option>\
										</select>\
									</div>';
			}
			else if(val == 4)
			{
				div.innerHTML = '<div class="form-group">\
									<label class="col-sm-4 control-label" style="padding-left:5px;">Employee Type</label>\
									<div class="col-sm-7">\
										<select name="new_emptype" id="emp_type" class="form-control" required>\
											<option value="" disabled selected>None</option>\
											<option>Faculty</option>\
											<option>TA</option>\
											<option>Staff</option>\
											<option>Head of the Department</option>\
											<option>Administration</option>\
										</select>\
									</div>';
			}
			else if(val == 5)
			{
				div.innerHTML = '<div class="form-group">\
									<label class="col-sm-4 control-label" style="padding-left:5px;">Employee ID</label>\
									<div class="col-sm-7">\
										<input type="text" name="new_empid" class="form-control" placeholder="Enter new Employee ID" required/>\
									</div>\
								</div>';
			}
			else
			{
				
				div.innerHTML = '';
			}
			//document.getElementById('number').appendChild(div);
		}
	</script>
	
  </body>
</html>

<?php
	if(isset($msg))
	{
		if($msg == "wrong")
		{
			echo '<script>alert("Wrong Password")</script>';
		}
	}
?>