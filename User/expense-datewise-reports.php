<?php
session_start();
include('includes/server.php');
if(isset($_POST['submit']))
  {
   $id=$_SESSION['u_id'];
    {
	  header('location:./login.php');
	}
    $dateexpense=$_POST['dateexpense'];
     $costitem=$_POST['costitem'];
    $query=mysqli_query($db, "SELECT * FROM  `Expense_tbl` (`ExpenseDate`,  `ExpenseCost`,`userid`) VALUES ('$dateexpense','$item','$costitem',$id)");
}
  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Datewise Expense Report - Expense Management</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/main-style.css" rel="stylesheet">
	  <!-- Favicons -->
<link rel="icon" href="img/c88daee2-b70a-491c-8d0e-b79645fa4f6c_200x200.png" type= "image/x-icon" sizes="228x228">	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	
</head>
<body>
	<!--add Header and sidebar-->
	<?php include_once('includes/header.php');?>
	<?php include_once('includes/sidebar.php');?>
		
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row" style="margin-top: 0px;">
		<ol class="breadcrumb">
			<li><a href="dashboard.php">
				<em class="fa fa-home" style="font-size: 20px;"></em>
				</a></li>
				<li class="active"><b>Datewise Expense Report</b></li>
			</ol>
		</div><!--/.row-->
		

<div class="row" style="margin-top: 20px;">
  <div class="col-lg-12">
    <div class="panel panel-default">
	  <div class="panel-heading" style="color:black;"><b>Datewise Expense Report</b></div>
		 <div class="panel-body">
     		<div class="col-md-12">
			  <form role="form" method="post" action="      expense-datewise-reports-detailed.php" name="bwdatesreport">

				<div class="form-group">
					<label>From Date</label>
				    <input class="form-control" type="date"  id="fromdate" name="fromdate" required="true">
			    </div>
								
				<div class="form-group">
					<label>To Date</label>
					<input class="form-control" type="date"  id="todate" name="todate" required="true">
				</div>
								
				<div class="form-group has-success">
					<button type="submit" class="btn btn-primary" name="submit" style="background-color: blue;padding: 10px;"><em class="fa fa-arrow-right" style="font-size: 20px;">   Submit</em>
					</button>
				</div>
			  </div>
			</form>
		   </div>
		  </div>
		</div><!-- /.panel-->
	   </div><!-- /.col-->
	   <?php include_once('includes/footer.php');?>
	 </div><!-- /.row -->
</div><!--/.main-->
	
<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	
</body>
</html>
<!-- <?php  ?> -->