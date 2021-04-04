<?php
session_start();
include('includes/server.php');
    if(isset($_POST['submit']))
  {
    $id=$_GET['edit_expense/:id'];
    $date=$_POST['dateexpense'];
  $item=$_POST['item'];
  $cost=$_POST['costitem'];
// $id=$_SESSION['u_id'];
     $query=mysqli_query($db, "UPDATE `Expense_tbl` set `ExpenseDate` ='$date', `ExpenseItem` ='$item', `ExpenseCost`='$cost' where  `ID`='$id'");
     if($query){
// echo "<script>alert('Expense has been updated.');</script>";
echo "<script>window.location.href='manage-expense.php'</script>";
} else {
echo "<script>alert('Something went wrong. Please try again');</script>";

}
 
  }
  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Expense Management || Edit Expense</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/main-style.css" rel="stylesheet">
	<link rel="icon" href="img/c88daee2-b70a-491c-8d0e-b79645fa4f6c_200x200.png" type= "image/x-icon" sizes="228x228">
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
    <link href="img/IMG-20200127-WA0008.png" rel="icon">
   
</head>
<body>
	<?php include_once('includes/header.php');?>
	<?php include_once('includes/sidebar.php');?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<?php
        $id=$_SESSION['u_id'];
      	$eid=$_GET['edit_expense/:id'];

       
      $qur="SELECT * FROM `Expense_tbl` where `UserId`='$id' and `ID`='$eid'";
   

$ret=mysqli_query($db,$qur);

$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
		<div class="row" style="margin-top: 20px;">
			<ol class="breadcrumb">
				<li><a href="dashboard.php">
					<em class="fa fa-home" style="font-size: 20px;"></em>
				</a></li>
				<li class="active"><b>Edit Expense</b></li>
			</ol>
		</div>
		<!--/.row-->
	<div class="row">
	<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading" style="color:blue"><b>Edit Expense</b></div>
			<div class="panel-body">
				<div class="col-md-12">
					<form role="form" method="post" action="">
						
						<div class="form-group">
							<label><em class="fa fa-calendar week" style="font-size: 20px;"></em> Select Date of Expense</label>
							<input class="form-control" type="date" value="<?php  echo $row['ExpenseDate'];?>" name="dateexpense" required="true">
						</div>
					
						<div class="form-group">
							<label><em class="fa fa-info-circle" style="font-size: 20px;"></em> Item Name</label>
							<input type="text" class="form-control" name="item" value="<?php  echo $row['ExpenseItem'];?>" required="true" onkeypress="return onlyAlphabets(event,this);">
						</div>
								
					<div class="form-group">
							<label><em class="fa fa-rupee" style="font-size: 20px;"></em>  Cost of Item</label>
							<input class="form-control" type="text" value="<?php  echo $row['ExpenseCost'];?>" required="true" name="costitem" onkeypress="return isNumberKey(event)">
						</div>
																
						<div class="form-group has-success">
							<button type="submit" class="btn btn-primary" name="submit" onClick="javascript: return confirm('Confirm Update Expense');"><em class="fa fa-plus" style="font-size: 20px;"> Update Expense</em></button>
							


						</div>
								
					</div>
				</form>

				<?php }
				 ?>
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
    
<script>
<!--
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
      //-->


       function onlyAlphabets(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))
                    return true;
                else
                    return false;
            }
            catch (err) {
                alert(err.Description);
            }
        } 
</script>
</body>
</html>