<?php
session_start();
error_reporting(0);
include('includes/server.php');
          
	
  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Monthwise Expense Report - Expense Management</title>
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
			<li class="active"><b>Monthwise Expense Report</b></li>
		</ol>
	</div><!--/.row-->
		
<div class="row" style="margin-top: 20px;">
  <div class="col-lg-12">
	<div class="panel panel-default">
	  <div class="panel-heading" style="color:blue"><b>Monthwise Expense   		Report</b></div>
		<div class="panel-body">
		  <div class="col-md-12">
					
		<?php
		    $fdate=$_POST['fromdate'];
			$tdate=$_POST['todate'];
		?>
		<h5 align="center" style="color:black;"><b>Monthwise Expense Report From <?php echo $fdate?> To <?php echo $tdate?></b></h5>
		<hr />
        
        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
           <thead>
              <tr>
                <tr style="background-color: #98A3A3;color: white;" >
	                <th>SR.NO</th>
	                <th>Month-Year</th>
	                <th>Expense Amount</th>
              	</tr>
              </tr>
           </thead>
		   <?php
		        $id=$_SESSION['u_id'];
				$ret=mysqli_query($db,"SELECT month(ExpenseDate) as rptmonth,year(ExpenseDate) as rptyear,SUM(ExpenseCost) as totalmonth FROM `Expense_tbl`  where (ExpenseDate BETWEEN '$fdate' and '$tdate') && (`UserId`='$id') group by month(ExpenseDate),year(ExpenseDate)");
			   $cnt=1;
  	    	   while ($row=mysqli_fetch_array($ret)) {
  	    	?>
            <tr>
                <td><b><?php echo $cnt;?></b></td>
                <td><b><?php  echo $row['rptmonth']."-".$row['rptyear'];?></b></td>
                <td><b><?php  echo $ttlsl=$row['totalmonth'];?></b></td>
            </tr>
            <?php
                $totalsexp +=$ttlsl; 
				$cnt=$cnt+1;	
			}?>

 			<tr>
 				<th colspan="2" style="text-align:center">Grand Total</th>
 				<td style="background-color: orange"><b><?php echo $totalsexp;?></b></td>
 			</tr>   
 		</table>
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
