<?php  
session_start();

include('includes/server.php');

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
	<link href="css/main-style.css" rel="stylesheet">
		<link href="css/main-style1.css" rel="stylesheet">

<link rel="icon" href="img/c88daee2-b70a-491c-8d0e-b79645fa4f6c_200x200.png" type= "image/x-icon" sizes="228x228">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>
<body>
	<?php include_once('includes/header.php');?>
	<?php include_once('includes/sidebar.php');?>

		
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="dashboard.php">
				<em class="fa fa-home" style="font-size: 20px;"></em>
				</a></li>
			<li class="active"><b>Manage Expense</b></li>
		</ol>
	</div><!--/.row-->
		
<div class="row" style="margin-top: 20px;">
  <div class="col-lg-12">
    <div class="panel panel-default">
	  <div class="panel-heading" style="color:black;"><b>Manage Expense</b></div>
        <div class="panel-body">
          <div class="col-md-12">
			<div class="table-responsive">
		      <table  id="example" class="table table-bordered mg-b-0" style="
                /*margin: 4px, 4px;  
                padding: 4px;  */
                /*background-color: #08c708; */ 
                /*width: 300px;  */
                overflow: auto;  
                white-space: nowrap;  
            ">
			     <thead>
				   <tr style="background-color: #98A3A3;color: white;">
				    <th>SR.NO</th>
				    <th>username</th>
				    <th>email</th>
				    <th>password</th>
				    <!-- <th>Edit</th> -->
<!-- 				    <th>View User Wise Expense Details </th>
 -->				   </tr>
				  </thead>
				    <?php
					
					


				

					$id=$_SESSION['a_id'];
                    $ret=mysqli_query($db,"SELECT * FROM `user_tbl`  where `id`");
                 

					$cnt=1;
					while ($row=mysqli_fetch_array($ret)) {


				  ?>
              	  <tbody>
				  <tr>
					  <td><b><?php echo $cnt;?></b></td>
					  <td><b><?php  echo $row['username'];?></b></td>
					  <td><b><?php  echo $row['email'];?></b></td>
					    
					  <td><b><?php  echo $row['password'];?></b></td>
					    <?php 
						$cnt=$cnt+1;

				
					}
				
					?>
					<!--   <?php 
						$id=$_SESSION['u_id'];
                    $ret=mysqli_query($db,"SELECT * FROM `Expense_tbl`  where `UserId`='$id'");
                 

								# code...
								while ($row=mysqli_fetch_array($ret)) {
									?>
					  <td><?php echo "<a href='view-user-wise-expenses-details.php'>". "Click Here"  ?>  </td>
					  <?php } ?>
					  -->
					
					
					
                	</tr>
                   
                 </tbody>
                </table>
                <br />
			 
             	  </div>
				</div>
			</div>
		</div><!-- /.panel-->
	</div><!-- /.col-->

  </div><!-- /.row -->

	<?php include_once('includes/footer.php');?>

</div>

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script type="text/javascript"></script>
	

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
    <script type="text/javascript">
    	$(document).ready(function() {
    $('#example').DataTable( {
        "scrollY":        "200px",
        "scrollCollapse": true,
        "paging":         false
    } );
} );
    </script>     
</body>
</html>

