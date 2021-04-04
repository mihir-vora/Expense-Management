<?php 
	session_start(); 
	// print_r($_SESSION['username']) ;
	// print_r($_SESSION['u_id']);
	// exit;
		 include('Server.php'); 

	if(!isset($_SESSION['a_id']))
	{
	  header('location:./admin-login.php');
	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Expense Management || Manage Expense</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	  <link href="img/IMG-20200127-WA0008.png" rel="icon">
	<link href="css/main-style.css" rel="stylesheet">
	<!--Custom Font-->
	<link rel="icon" href="img/c88daee2-b70a-491c-8d0e-b79645fa4f6c_200x200.png" type= "image/x-icon" sizes="228x228">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<?php include_once('includes/header.php');?>
	<?php include_once('includes/sidebar.php');?>

		
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active"><b>Manage Expense</b></li>
			</ol>
		</div><!--/.row-->
		
		
				
		
		<div class="row">
			<div class="col-lg-12">
			
				
				
				<div class="panel panel-default">
					<div class="panel-heading" style="color:blue"><b>Manage Expense</b>
						

				</div>
                  
                <div>
           

					<div class="panel-body">
						
						<div class="col-md-12">
							
							<div class="table-responsive">
            <table class="table table-bordered mg-b-0">
              <thead>
                <tr style="background-color: #B99C9C">
                  <th>SR.NO</th>
                  <th>ExpenseItem </th>
                  <th>ExpenseCost</th>
                  <th>ExpenseDate</th>
                  <th>NoteDate</th>
<!--                   <th>All Expense Details</th>
 -->
                </tr>
              </thead>
              <?php
            $userid=$_SESSION['u_id'];

$ret=mysqli_query($db,"SELECT * FROM `Expense_tbl` where userid ='$userid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              <tbody>
                <tr>
                  <td><?php echo $cnt;?></td>
              
                  <td><?php  echo $row['ExpenseItem'];?></td>
                  <td><?php  echo $row['ExpenseCost'];?></td>
                  <td><?php  echo $row['ExpenseDate'];?></td>
                  <td><?php echo $row['NoteDate'];?></td>

<!--                   <td><a href="all-expense-details.php">Click</a></td>
 -->                 </tr>
                <?php 
$cnt=$cnt+1;
}?>
               
              </tbody>
            </table>
             
    </form>
          </div>
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

