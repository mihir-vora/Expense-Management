<?php
session_start();
include('includes/server.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Your account - Expense Management</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/main-style.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
<link rel="icon" href="img/c88daee2-b70a-491c-8d0e-b79645fa4f6c_200x200.png" type= "image/x-icon" sizes="228x228"> <style type="text/css">
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 40%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
</head>
<body>
	<?php include_once('includes/header.php');?>
	<?php include_once('includes/sidebar.php');?>
		
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row" style="margin-top: 0px;">
		<ol class="breadcrumb">
			<li><a href="dashboard.php">
			  <em class="fa fa-home" style="font-size: 20px;"></em></a></li>
			<li class="active"><b>Account</b></li>
		</ol>
	</div><!--/.row-->
		
<div class="row" style="margin-top:20px;">
   <div class="col-lg-12">
      <div class="panel panel-default">
		<div class="panel-heading" style="color:blue"><b>Your Account</b>
		</div>
		  <div class="panel-body">
			<div class="col-md-12">
			<?php
				$id=$_SESSION['u_id'];
				$qur="SELECT * from `user_tbl`where `id`='$id'";
				$ret=mysqli_query($db,$qur);
				$cnt=1;
				while ($row=mysqli_fetch_array($ret)) {

			?>
		    <form role="form" method="post" action="">

			<div class="form-group">
				<label><em class="fa fa-user" style="font-size: 20px;"></em> Your Name</label>
				<div  class="form-control" style="padding: 10px;">
				<?php  echo $row['username'];?>
			</div>
		</div>
								
			<div class="form-group">
				<label><em class="fa fa-envelope" style="font-size: 20px;"></em> Email</label>
				<div  class="form-control" style="padding: 10px;">
                <?php  echo $row['email'];?>
            </div>
            </div>
								
		    <div class="form-group">
				<label><em class="fa fa-lock" style="font-size: 20px;"></em> Password</label>
				<div  class="form-control" style="padding: 10px;">
				<?php  echo $row['password'];?>
			</div>
			</div>
		</form>
			<?php } ?>					
			<div class="form-group has-success">
				<button  class="btn btn-primary" id="userId" style="background-color: blue;padding: 10px;" ><em class="fa fa-edit" style="font-size: 20px;"> Edit Account</em></button>

<!-- The Modal -->
<div id="userModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
<?php
// session_start();
include('includes/server.php');
    if(isset($_POST['submit']))
  {
    $id=$_SESSION['u_id'];
    $username=$_POST['username'];
  $email=$_POST['email'];
  $password=md5($_POST['password']);

     $query=mysqli_query($db, "UPDATE `user_tbl` set username ='$username', email ='$email', password='$password' where `id`='$id'");
     if($query){
// echo "<script>alert('User profile has been updated.');</script>";
echo "<script>window.location.href='dashboard.php'</script>";
} else {
echo "<script>alert('Something went wrong. Please try again');</script>";

}
 
  }
  ?>
<!-- <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
 -->	
 <!-- <div class="row">
		<ol class="breadcrumb">
			<li><a href="dashboard.php">
			  <em class="fa fa-home" style="font-size: 20px;"></em></a></li>
			<li class="active"><b>Account</b></li>
		</ol>
	</div> -->
	<!--/.row-->
		
<div class="row">
   <div class="col-lg-12">
      <div class="panel panel-default">
		<div class="panel-heading" style="color:blue"><b>Your Account</b>
		</div>
		  <div class="panel-body">
			<div class="col-md-12">
			<?php
				$id=$_SESSION['u_id'];
				$qur="SELECT * from `user_tbl`where `id`='$id'";
				$ret=mysqli_query($db,$qur);
				$cnt=1;
				while ($row=mysqli_fetch_array($ret)) {

			?>
		    <form role="form" method="post" action="">

			<div class="form-group">
				<label><em class="fa fa-user" style="font-size: 20px;"></em> Your Name</label>
				<input class="form-control" type="text" value="<?php  echo $row['username'];?>" name="username" required="true">
			</div>
								
			<div class="form-group">
				<label><em class="fa fa-envelope" style="font-size: 20px;"></em> Email</label>
                <input type="email" class="form-control" name="email" value="<?php  echo $row['email'];?>" required="true">
			</div>
								
		    <div class="form-group">
				<label><em class="fa fa-lock" style="font-size: 20px;"></em> Password</label>
				<input class="form-control" type="password" value="<?php  echo $row['password'];?>" required="true" name="password" maxlength="10">
			</div>
								
			<div class="form-group has-success">
				<button type="submit" class="btn btn-primary" name="submit" onClick="javascript: return confirm('Confirm User profile has been updated.');"><em class="fa fa-arrow-right" style="font-size: 20px;"> Update Account</em></button>
			</div>
		  </div>
		  <?php } ?>
		</form>
	  </div>
	 </div>
    </div><!-- /.panel-->
   </div><!-- /.col-->
  </div><!-- /.row -->
</div><!--/.main-->


  </div>

</div>
			</div>
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
	
<script>
// Get the modal
var usermodal = document.getElementById("userModal");

// Get the button that opens the modal
var btn = document.getElementById("userId");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  usermodal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  usermodal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == usermodal) {
    usermodal.style.display = "none";
  }
}
</script>
</body>
</html>
