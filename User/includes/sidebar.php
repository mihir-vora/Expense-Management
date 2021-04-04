<?php
include('includes/server.php');
/*if (isset($_SESSION['username'])){
 $username = $_SESSION['username'];
  $query=mysqli_query($db, "SELECT * FROM `User_tbl`  where username='$username'");
}*/
if(!isset($_SESSION['u_id']))
{
    header('location:./login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sidebar || Expense Management</title>
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
	<style type="text/css">
		/*body{
  width: 100%;
}*/
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 10%; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
 /* overflow: auto;*/ /* Enable scroll if needed */
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
.fdclose {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.fdclose:hover,
.fdclose:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
.feedback-button{
/*  margin-left: 70%;*/
  padding: 10px;
/*  background-color: #30a5ff;*/
/*  color: white;*/
  /*border-color: white;*/
}
	</style>
</head>
<body>
<div class="form-group has-success">


 

<!-- The Modal -->
<div id="fdModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="fdclose">&times;</span>
       <?php
include('server.php');
if (isset($_POST['feedback-submit'])) {
   $name =  $_POST['name'];
   $email =  $_POST['email'];
   $sub =  $_POST['subject'];
   $mes =  $_POST['message'];

$query="INSERT INTO `Feedback_tbl`(`name`, `email`, `subject`, `message`) VALUES ('$name','$email','$sub','$mes')";
// echo $query; exit;

  $result = mysqli_query($db, $query);
}
?>




         

    <!--/.row-->
<div class="row">
<!--  <div class="col-lg-12">
 -->  <div class="panel panel-default">
   <div class="panel-heading" style="color:blue"><b>Feedback</b></div>

   <div class="panel-body">
     <div class="col-md-12">
<form method="post" action="">
    <?php
        $Userid=$_SESSION['u_id'];
        $qur="SELECT * from `user_tbl`where `id`='$Userid'";
        $ret=mysqli_query($db,$qur);
        $cnt=1;
        while ($row=mysqli_fetch_array($ret)) {

      ?>
    <div class="form-group">
      <label><em class="fa fa-user" style="font-size: 20px;"></em> Name</label>
           <input type="text" class="form-control" id="name" name="name" value="<?php  echo $row['username'];?>
" required="true">
    </div>
    <div class="form-group">
      <label><em class="fa fa-envelope" style="font-size: 20px;"></em> Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php  echo $row['email'];?>
" required="true">
       </div>
    <?php  } ?>
    <div class="form-group">
      <label><em class="fa fa-book" style="font-size: 20px;"></em> Subject</label>
            <input type="text" class="form-control" id="sub" name="subject"  required="true">
     </div>
      <div class="form-group">
      <label><em class="fa fa-comments" style="font-size: 20px;"></em> Message</label>
        <input type="text" class="form-control" id="mes" name="message"   required="true">
       </div>
                        
         <div class="form-group">
            <button type="submit" class="btn btn-primary" name="feedback-submit" style="background-color: blue;padding: 10px;" ><em class="fa fa-arrow-right" style="font-size: 20px;"><b> Send</b></em></button>
          </div>
                             </div>
                        </div>
                    </form>
                
    

   </div>
  </div>
</div>
</div>
</div>
</div>
</div>

	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		
		
		<ul class="nav menu" style="margin-top: 0.2px;">
			<li class="active"><a href="dashboard.php"><b><em class="fa fa-dashboard">&nbsp;</em> Dashboard</b></a></li>

			<li><a href="add-expense.php"><b><em class="fa fa-plus">&nbsp;</em> Add Expenses</b></a></li>

			<li><a href="manage-expense.php"><b><em class="fa fa-arrow-right">&nbsp;</em> Manage Expenses</b></a></li>


			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<b><em class="fa fa-navicon">&nbsp;</em> Expense Report </b><span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="" href="expense-datewise-reports.php">
						<b><span class="fa fa-arrow-right">&nbsp;</span> Daywise</b>
					</a></li>
					<li><a class="" href="expense-monthwise-reports.php">
						<b><span class="fa fa-arrow-right">&nbsp;</span> Monthwise</b>
					</a></li>
					<li><a class="" href="expense-yearwise-reports.php">
						<b><span class="fa fa-arrow-right">&nbsp;</span> Yearwise</b>
					</a></li>
				</ul>
			</li>
			
			<li><a href="charts.php"><b><em class="fa fa-bar-chart">&nbsp;</em> Charts</b></a></li>
			
			<li id="feedbackId" type="submit" name="export" class=" " value="" ><a href="#"><b><em class="fa fa-comments" style="font-size: 18px;"></em> Feedback</b></a></li>
	
	</div><!--/.sidebar-->
	<script>
// Get the modal
var fdmodal = document.getElementById("fdModal");

// Get the button that opens the modal
var btn = document.getElementById("feedbackId");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("fdclose")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  fdmodal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  fdmodal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == fdmodal) {
    fdmodal.style.display = "none";
  }
}
</script>
</body>