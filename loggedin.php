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
			echo "<script type='text/javascript'>alert('Entry successful!');</script>";
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
            <li class="active"><a href="#">Home</a></li>
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
				<div class="col-md-3" >
					<h4>Paper/Book Chapter</h4>
					<form class="form-horizontal" method="POST" style="padding-top:20px;" autocomplete="off" action="c1check.php">
						<div class="form-group">
							<label class="col-sm-4 control-label">Title</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" name="c1_title" id="inputEmail3" placeholder="Title" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Type</label>
							<div class="col-sm-8">
								<select name="c1_type" id="ddl_journal" class="form-control" onchange="show(this.value)" required>
									<option value="" disabled selected>None</option>
									<option value="1">Journal</option>
									<option value="2">Book Chapter</option>
								</select>
							</div>
						</div>
						<div id="number">
							<!-- Content dynamically added!-->
						</div>
						
						<div class="form-group">
							<div class="col-sm-2">
							</div>
							<div class="col-sm-2">
								<input type="radio" class="form-control" name="c1_locale" value="domestic" style="margin-bottom:-10px;" required>
							</div>
							<div class="col-sm-8">
								<label class="control-label">Domestic</label>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-2">
							</div>
							<div class="col-sm-2">
								<input type="radio" class="form-control" name="c1_locale" value="international" style="margin-bottom:-10px;" required>
							</div>
							<div class="col-sm-8">
								<label class="control-label">International</label>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-4 control-label">ISBN</label>
							<div class="col-sm-8">
							  <input type="text" name="c1_isbn" class="form-control" id="inputEmail3" placeholder="ISBN" required>
							</div>
						</div>
						
						<div class="form-group">
							<?php
								if(isset($msg))
								{
									if($msg == 'isbn_exists')
										echo '<label class="col-sm-10 col-sm-offset-2" style="color:red;">ISBN already exists!</label>';
								}
							?>
						</div>
						
						<div class="form-group">
							<label class="col-sm-4 control-label">Year</label>
							<div class="col-sm-8">
							  <input type="number" name="c1_year" class="form-control" id="inputEmail3" min="2000" max="<?php echo date("Y"); ?>" placeholder="Year" required>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-3 col-md-offset-4">
								  <input type="reset" name="clr_col1" class="btn btn-default" value="Clear" onclick="show('')"></input>
								</div>
								<div class="col-md-1">
								  <input type="submit" name="sbmt_col1" class="btn btn-default" value="Submit"></input>
								</div>
							</div>
						</div>
					</form>
				</div>
				
				<div class="col-md-3" style="border-left:2px solid #406c96;border-right:2px solid #406c96;">
					<h4>Workshop/Conference</h4>
					<form class="form-horizontal" method="POST" style="padding-top:20px;" autocomplete="off" action="c2check.php">
						<div class="form-group">
							<label class="col-sm-4 control-label">Title</label>
							<div class="col-sm-8">
							  <input type="text" name="c2_title" class="form-control" id="inputEmail3" placeholder="Title" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Venue</label>
							<div class="col-sm-8">
							  <input type="text" name="c2_place" class="form-control" id="inputEmail3" placeholder="Place" required>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-2">
							</div>
							<div class="col-sm-2">
								<input type="radio" class="form-control" name="c2_locale" value="domestic" style="margin-bottom:-10px;" required>
							</div>
							<div class="col-sm-8">
								<label class="control-label">Domestic</label>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-2">
							</div>
							<div class="col-sm-2">
								<input type="radio" class="form-control" name="c2_locale" value="international" style="margin-bottom:-10px;" required>
							</div>
							<div class="col-sm-8">
								<label class="control-label">International</label>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-4 control-label">From</label>
							<div class="col-sm-8">
							  <input type="date" name="c2_from" class="form-control" id="c2_from" onchange="findDuration1()" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">To</label>
							<div class="col-sm-8">
							  <input type="date" name="c2_to" class="form-control" id="c2_to" onchange="findDuration1()" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Duration</label>
							<div class="col-sm-8">
							  <input type="text" name="c2_duration" class="form-control" id="c2_duration" placeholder="in days" required>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-3 col-md-offset-4">
								  <input type="reset" name="clr_col2" class="btn btn-default" value="Clear" onclick="show('')"></input>
								</div>
								<div class="col-md-1">
								  <input type="submit" name="sbmt_col2"class="btn btn-default" value="Submit"></input>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="col-md-3" style="border-right:2px solid #406c96;">
					<h4>Lecture</h4>
					<form class="form-horizontal" method="POST" autocomplete="off" style="padding-top:20px;" action="c3check.php">
						<div class="form-group">
							<label class="col-sm-4 control-label">Banner</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="c3_banner" name="c3_banner" placeholder="Topic" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Venue</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="c3_place" name="c3_place" placeholder="Place" required>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-2">
							</div>
							<div class="col-sm-2">
								<input type="radio" class="form-control" name="c3_locale" value="domestic" style="margin-bottom:-10px;" required>
							</div>
							<div class="col-sm-8">
								<label class="control-label">Domestic</label>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-2">
							</div>
							<div class="col-sm-2">
								<input type="radio" class="form-control" name="c3_locale" value="international" style="margin-bottom:-10px;" required>
							</div>
							<div class="col-sm-8">
								<label class="control-label">International</label>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-4 control-label">From</label>
							<div class="col-sm-8">
							  <input type="date" class="form-control" name="c3_from" id="c3_from" onchange="findDuration2()" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">To</label>
							<div class="col-sm-8">
							  <input type="date" class="form-control" name="c3_to" id="c3_to" onchange="findDuration2()" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Duration</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" name="c3_duration" id="c3_duration" placeholder="in days" required>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-3 col-md-offset-4">
								  <input type="reset" name="clr_col3" class="btn btn-default" value="Clear" onclick="show('')" ></input> 
								</div>
								<div class="col-md-1">
								  <input type="submit" name="sbmt_col1" class="btn btn-default" value="Submit"></input>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="col-md-3">
					<h4>Manage Profile</h4>
					<div class="col-md-12" style="padding-top:20px;">
						<a href="edit.php"><button class="btn btn-default" name="editProfile" title="Change password here" style="width:100%;"><i class="fa fa-pencil fa-pad"></i>Edit Profile</button></a>
					</div>
					<div class="col-md-12" style="padding-top:15px;">
						<a href="manage.php"><button class="btn btn-default" name="manageEntries" style="width:100%;"><i class="fa fa-exchange fa-pad"></i>Manage Entries</button></a>
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
	
	<footer class="section-primary" style="margin-top:41px;">
		<div class="container" >
			<h4>Made by <span data-toggle="tooltip" data-placement="top" id="name" title="Software and Web Developer">Md Balal Raza</span>, Department of Computer Science and Engineering, 2nd Year as in June, 2015.</h4>
		</div>
	</footer>
	
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.js"></script>
	
	<!-- Custom scripts for calculating time duration-->
	<script src="js/moment.js"></script>
	<script>
		moment().format();
	</script>
	
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
									<label class="col-sm-4 control-label" style="padding-left:5px;">Journal No.</label>\
									<div class="col-sm-8">\
										<input type="text" name="c1_journalno" class="form-control" id="inputEmail3" placeholder="Journal No." required>\
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
	
	<script>
		function findDuration1()
		{
			var date1 = document.getElementById("c2_from").value;
			var date2 = document.getElementById("c2_to").value;
			var d1 = moment(date1);
			var d2 = moment(date2);
			if(d2.diff(d1)<0)
			{
				alert('Start date cannot come later than end date');
				document.getElementById("c2_from").value = date2;
			}
			else
			{
				document.getElementById("c2_duration").value = (d2.diff(d1, 'days'))+1;
			}
		}
		function findDuration2()
		{
			var date1 = document.getElementById("c3_from").value;
			var date2 = document.getElementById("c3_to").value;
			var d1 = moment(date1);
			var d2 = moment(date2);
			if(d2.diff(d1)<0)
			{
				alert('Start date cannot come later than end date');
				document.getElementById("c3_from").value = date2;
			}
			else
			{
				document.getElementById("c3_duration").value = (d2.diff(d1, 'days'))+1;
			}
		}
	</script>
  </body>
</html>
