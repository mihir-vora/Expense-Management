<?php 
	session_start(); 
	// print_r($_SESSION['username']) ;
	// print_r($_SESSION['u_id']);
	// exit;
	// include_once('includes/server.php');
	if(!isset($_SESSION['u_id']))
	{
	  header('location:./login.php');
	}
	//  include('server.php'); 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="img/c88daee2-b70a-491c-8d0e-b79645fa4f6c_200x200.png" type= "image/x-icon" sizes="228x228">
	<title>Dashboard - Expense Management</title>
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
	<!-- <style type="text/css">
		body{
			width: 100%;
		}

	</style> -->
	<style type="text/css">
	body{
		width: 100%;
	}	

/*SOCİAL İCONS*/

/* footer social icons */

ul.social-network {
  list-style: none;
  display: inline;
  margin-left: 0 !important;
  padding: 0;
}

ul.social-network li {
  display: inline;
  margin: 0 5px;
}


/* footer social icons */

.social-network a.icoFacebook:hover {
  background-color: #3B5998;
}

.social-network a.icoLinkedin:hover {
  background-color: #007bb7;
}

.social-network a.icoFacebook:hover i,
.social-network a.icoLinkedin:hover i {
  color: #fff;
}

.social-network a.socialIcon:hover,
.socialHoverClass {
  color: #44BCDD;
}

.social-circle li a {
  display: inline-block;
  position: relative;
  margin: 0 auto 0 auto;
  -moz-border-radius: 50%;
  -webkit-border-radius: 50%;
  border-radius: 50%;
  text-align: center;
  width: 30px;
  height: 30px;
  font-size: 15px;
}

.social-circle li i {
  margin: 0;
  line-height: 30px;
  text-align: center;
}

.social-circle li a:hover i,
.triggeredHover {
  -moz-transform: rotate(360deg);
  -webkit-transform: rotate(360deg);
  -ms--transform: rotate(360deg);
  transform: rotate(360deg);
  -webkit-transition: all 0.2s;
  -moz-transition: all 0.2s;
  -o-transition: all 0.2s;
  -ms-transition: all 0.2s;
  transition: all 0.2s;
}

.social-circle i {
  color: #595959;
  -webkit-transition: all 0.8s;
  -moz-transition: all 0.8s;
  -o-transition: all 0.8s;
  -ms-transition: all 0.8s;
  transition: all 0.8s;
}

.social-network a {
  background-color: #F9F9F9;
}

	</style>

</head>
<body>
	
<?php include_once('includes/sidebar.php') ?>

	<?php include_once('includes/header.php') ?>

		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row" style="margin-top: 0px;">
			<ol class="breadcrumb">
				<li><a href="dashboard.php">
					<em class="fa fa-home" style="font-size: 20px;"></em>
				</a></li>
				<li class="active" ><b>Dashboard</b></li>
			</ol>
		</div><!--/.row-->
<!--
	<?php
		//Today Expense
	        // $tdate=date('Y-m-d');
	     
	        $userid= $_SESSION['u_id'];
	        $query=mysqli_query($db," SELECT sum(`ExpenseCost`) as expense FROM `expense` where `UserId`='$userid'");
						
		  	$result=mysqli_fetch_array($query);
		    $expense=$result['expense'];
	?>
<button type="button" class="btn btn-primary"><?php if($expense==""){
			echo "0";
			} else {
				    	 echo $expense;
				    }
		?></button>
-->


	

<div class="row" style="margin-top: 20px;">
	<div class="col-xs-6 col-md-3">
		<div class="panel panel-default">
			<div class="panel-body easypiechart-panel">
				<h4>
					<b><a href="today-all-expense.php" style="color:blue;text-decoration: none;">Today's Expense <em 		class="fa fa-arrow-right"></em></a></b>
				</h4>
				<hr>
<div class="easypiechart" id="easypiechart-blue" data-percent="100">
	<?php
		//Today Expense
	        $tdate=date('Y-m-d');
	     
	        $userid= $_SESSION['u_id'];
	        $query=mysqli_query($db," SELECT sum(`ExpenseCost`) as todaysexpense FROM `Expense_tbl` where `ExpenseDate`='$tdate' and `UserId`='$userid'");
						
		  	$result=mysqli_fetch_array($query);
		    $sum_today_expense=$result['todaysexpense'];
	?>
	<span class="percent">
		<?php if($sum_today_expense==""){
			echo "0";
			} else {
				    	 echo $sum_today_expense;
				    }
		?>
	</span></div>
	</div>
  </div>
 </div>



			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4> <h4><b><a href="yesterday-all-expense.php" style="color:blue;text-decoration: none;"> Yesterday's Expense <em class="fa fa-arrow-right"></em></a></b></h4></h4>
						<hr>
						<div class="easypiechart" id="easypiechart-orange" data-percent="100" >

  <?php
     $ydate=date('Y-m-d',strtotime("-1 days"));
	 $userid= $_SESSION['u_id'];
	 $query1=mysqli_query($db,"SELECT SUM(ExpenseCost)  as yesterdayexpense from `Expense_tbl` where ExpenseDate='$ydate' and `UserId`='$userid';");

	 $result1=mysqli_fetch_array($query1);
	 $sum_yesterday_expense=$result1['yesterdayexpense'];
	 ?> 

							<span class="percent">
								



	 <?php if($sum_yesterday_expense==""){
				echo "0";
				} else {
				echo $sum_yesterday_expense;
				}

				?>
							</span></div>
					</div>
				</div>
			</div>




			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4> <h4><b><a href="weekly-all-expense.php"  style="color:blue;text-decoration: none"> Last 7day's Expense <em class="fa fa-arrow-right"></em></a></b></h4></h4>
													<hr>

						<div class="easypiechart" id="easypiechart-teal" data-percent="100" >
	<?php

		    $pastdate=  date("Y-m-d", strtotime("-1 week"));
		    $userid= $_SESSION['u_id'];
			 
			$crrntdte=date("Y-m-d");
			$query2=mysqli_query($db,"SELECT  SUM(ExpenseCost)  as weeklyexpense from `Expense_tbl` where ((ExpenseDate) between '$pastdate' and '$crrntdte') && (`UserId`='$userid');");
			 
			$result2=mysqli_fetch_array($query2);
			$sum_weekly_expense=$result2['weeklyexpense'];
			?>

			<span class="percent">
				
				<?php if($sum_weekly_expense=="")
				        {
						echo "0";
						} else {
						echo $sum_weekly_expense;
						}
					?>
			</span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4  style="color:blue"><b><a href="monthly-all-expense.php" style="color:blue;text-decoration: none;">Last 30day's Expenses <em class="fa fa-arrow-right"></em></b></a></h4>
						<hr>
						<div class="easypiechart" id="easypiechart-red" data-percent="100" >
							<?php
			//Monthly Expense
			$userid= $_SESSION['u_id']; 

			$monthdate=  date("Y-m-d", strtotime("-1 month"));
			$crrntdte=date("Y-m-d");
			$query3=mysqli_query($db,"SELECT  SUM(ExpenseCost)  as monthlyexpense  from `Expense_tbl` where `ExpenseDate`>='$monthdate' and `ExpenseDate`<='$crrntdte' and `UserId`='$userid';");
			$result3=mysqli_fetch_array($query3);
			$sum_monthly_expense=$result3['monthlyexpense'];

			 ?>
			 <span class="percent">
			 	
			 	<?php if($sum_monthly_expense==""){
			echo "0";
			} else {
			echo $sum_monthly_expense;
			}

	?>


			 </span></div>
					</div>
				</div>
			</div>



			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4><h4  style="color:blue"><b><a href="yearly-all-expense.php" style="text-decoration: none;color:blue;"> Current Year Expenses <em class="fa fa-arrow-right"></em></a></b></h4></h4>
						<hr>
						<div class="easypiechart" id="easypiechart-black" data-percent="100" >

<?php
			//Yearly Expense
			$userid= $_SESSION['u_id']; 
			$cyear= date("Y");
			$query4=mysqli_query($db,"SELECT SUM(ExpenseCost) AS yearlyexpense FROM `Expense_tbl` where (year(ExpenseDate)='$cyear' AND `UserId`=$userid)  ;");
			$result4=mysqli_fetch_array($query4);
			$sum_yearly_expense=$result4['yearlyexpense'];
			 ?>

							<span class="percent">
								<?php if($sum_yearly_expense==""){
								echo "0";
								} else {
								echo $sum_yearly_expense;
								}

	    ?>
							</span></div>
					</div>
				</div>
			</div>


			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4><h4  style="color:blue; "><b><a href="manage-expense.php" style="text-decoration: none;color:blue;"> Total Expenses <em class="fa fa-arrow-right"></em></a></b></h4></h4>

						<hr>
						<div class="easypiechart" id="easypiechart-green" data-percent="100" >
				<?php
			//Totals Expense
			$userid= $_SESSION['u_id']; 

			$query5=mysqli_query($db,"SELECT SUM(ExpenseCost)  as totalexpense FROM  `Expense_tbl` WHERE `UserId`='$userid';");
			$result5=mysqli_fetch_array($query5);
			$sum_total_expense=$result5['totalexpense'];
			 ?>
			 <span class="percent">
			 	
		<?php if($sum_total_expense=="")
							    {
								echo "0";
								} else {
								echo $sum_total_expense;
								}
	    ?>


			 </span></div>
					</div>
				</div>
			</div>


		</div><!--/.row-->


		
		
			<?php include_once('includes/footer.php'); ?>
		</div><!--/.row-->
	</div>	<!--/.main-->
	
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