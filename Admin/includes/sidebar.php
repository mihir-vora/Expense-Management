<?php
include('includes/server.php');
/*if (isset($_SESSION['username'])){
 $username = $_SESSION['username'];
  $query=mysqli_query($db, "SELECT * FROM `User_tbl`  where username='$username'");
}*/
if(!isset($_SESSION['a_id']))
{
    header('location:./login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Dashboard</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		
		
		<ul class="nav menu" style="margin-top: 0.2px;">
			<li class="active"><a href="dashboard.php"><b><em class="fa fa-dashboard">&nbsp;</em> Dashboard</b></a></li>

		
			<li><a href="feedback_user_replay.php"><b><em class="fa fa-arrow-right">&nbsp;</em> Manage FeedBack</b></a></li>


			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<b><em class="fa fa-navicon">&nbsp;</em> Expense Report </b><span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="" href="expense-datewise-reports_of_user.php">
						<b><span class="fa fa-arrow-right">&nbsp;</span> Daywise</b>
					</a></li>
					<li><a class="" href="expense-monthwise-reports-of-user.php">
						<b><span class="fa fa-arrow-right">&nbsp;</span> Monthwise</b>
					</a></li>
					<li><a class="" href="expense-yearwise-reports-of-user.php">
						<b><span class="fa fa-arrow-right">&nbsp;</span> Yearwise</b>
					</a></li>
				</ul>
			</li>
			
			<li><a href="charts.php"><b><em class="fa fa-bar-chart">&nbsp;</em> Charts</b></a></li>
			


		</ul>
			
	</div><!--/.sidebar-->
</body>