<?php 
	session_start(); 
	// print_r($_SESSION['username']) ;
	// print_r($_SESSION['u_id']);
	// exit;
	// include_once('includes/server.php');
	if(!isset($_SESSION['a_id']))
	{
	  header('location:./admin-login.php');
	}
	//  include('server.php'); 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Expense Management - Dashboard</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link rel="icon" href="img/c88daee2-b70a-491c-8d0e-b79645fa4f6c_200x200.png" type= "image/x-icon" sizes="228x228">
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
	<div class="row" >
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home" style="font-size: 20px;"></em>
				</a></li>
				<li class="active" ><b>Dashboard</b></li>
			</ol>
		</div><!--/.row-->

<div class="row" style="margin-top: 20px;">
	<div class="col-xs-6 col-md-3">
		<div class="panel panel-default">
			<div class="panel-body easypiechart-panel">
				<h4>
					<b><a href="view-user-details.php" style="color:blue;text-decoration: none;">View User Details <em 		class="fa fa-arrow-right"></em></a></b>
				</h4>
				<hr>
<div class="easypiechart" id="easypiechart-blue" data-percent="100">

	<?php 
  
     // $id= $_SESSION['u_id'];
	 $query2=mysqli_query($db,"SELECT count(id) as id from `user_tbl`");
    // $result=mysqli_fetch_array($query);

$result=mysqli_fetch_array($query2);
		    $ID_detail=$result['id'];

?>
								


<span class="percent">   <?php if($ID_detail==""){
					    		echo "0";
					    	} else {
					            echo $ID_detail;
					    	}
						?>
					
			</span></div>
	</div>
  </div>
 </div>



			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4> <h4><b><a href="view-expenses.php" style="color:blue;text-decoration: none;">View All Expenses <em class="fa fa-arrow-right"></em></a></b></h4></h4>
						<hr>
						<div class="easypiechart" id="easypiechart-orange" data-percent="100" >

	
	<?php 
  
     // $id= $_SESSION['u_id'];
	 $query3=mysqli_query($db,"SELECT count(ID) as expense_id from `Expense_tbl`");
    // $result=mysqli_fetch_array($query);

$result=mysqli_fetch_array($query3);
		    $expense_id=$result['expense_id'];

?>
								


<span class="percent">   <?php if($expense_id==""){
					    		echo "0";
					    	} else {
					            echo $expense_id;
					    	}
						?>
					
			</span></div>
					</div>
				</div>
			</div>




			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4> <h4><b><a href="view-feedbacks.php"  style="color:blue;text-decoration: none"> View All Feedback <em class="fa fa-arrow-right"></em></a></b></h4></h4>
													<hr>

						<div class="easypiechart" id="easypiechart-teal" data-percent="100" >
	<?php

		
			 
			$query2=mysqli_query($db,"SELECT  count(id)  as feedback_id from `Feedback_tbl`");
			 
			$result2=mysqli_fetch_array($query2);
			$feedback_id=$result2['feedback_id'];
			?>

			<span class="percent">
				
				<?php if($feedback_id=="")
				        {
						echo "0";
						} else {
						echo $feedback_id;
						}
					?>
			</span></div>
					</div>
				</div>
			</div>
			
</div>
		
		
			<?php include_once('includes/footer.php'); ?>
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