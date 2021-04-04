<?php  
session_start();

include('includes/server.php');
//code deletion
if(isset($_GET['delete_expense/:id']))
{
	$id=$_GET['delete_expense/:id'];
	$query=mysqli_query($db,"DELETE  FROM `Expense_tbl` WHERE `id`='$id'");
	if($query){
		// echo "<script>alert('Record successfully deleted');</script>";
		echo "<script>window.location.href='manage-expense.php'</script>";
		} else {
		echo "<script>alert('Something went wrong. Please try again');</script>";
        }
}
?>
<?php 


// delete records
if(isset($_POST['chk_id']))
{
    $arr = $_POST['chk_id'];
    foreach ($arr as $d_id) {
        @mysqli_query($db,"DELETE FROM Expense_tbl WHERE ID = " . $d_id);
    }
    $msg = "Deleted Successfully!";
    header("Location: dashboard.php?msg=$msg");
}
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Expense Manage- Expense Management</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/main-style.css" rel="stylesheet">
		<link href="css/main-style1.css" rel="stylesheet">

<link rel="icon" href="img/c88daee2-b70a-491c-8d0e-b79645fa4f6c_200x200.png" type= "image/x-icon" sizes="228x228">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

<style type="text/css">
	.btn-edit{
		background-color: blue;
		padding:6px;
		color:white;
	}
	.btn-edit:hover{
		color:white;

	}
	.btn-denger{
		background-color: red;
		padding:6px;
		color:white;
	}
	.btn-denger:hover{
		color:white;

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
				<div class="search-box">
       
        <div class="result"></div>
    </div>
            <form action="" method="post">
 <?php if (isset($_GET['msg'])) { ?>
            <p class="alert alert-success"><?php echo $_GET['msg']; ?></p>
            <?php } ?>
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
				   	        <th><input id="chk_all" name="chk_all" type="checkbox"  /> Select All</th>
				    <th>SR.NO</th>
				    <th>Expense Category</th>
				    <th>Expense Amount</th>
				    <th>Expense Date</th>
				    <th>Edit</th>
				    <th>Delete </th>
				   </tr>
				  </thead>
				   <b><input id="submit" name="submit" type="submit" class="btn btn-danger" value="Multiple Delete" />
				 </b> 
				
				  <?php
					$id=$_SESSION['u_id'];
                    $ret=mysqli_query($db,"SELECT * FROM `Expense_tbl`  where `UserId`='$id'");
					$cnt=1;

		

					while ($row=mysqli_fetch_array($ret)) {
				  ?>
			
              	  <tbody>
				  <tr>
				  	                    <td><input name="chk_id[]" type="checkbox" class='chkbox' value="<?php echo $row['ID']; ?>"/></td>

					  <td><b><?php echo $cnt;?></b></td>
					  <td><b><?php  echo $row['ExpenseItem'];?></b></td>
					  <td><b><?php  echo $row['ExpenseCost'];?></b></td>
					  <td><b><?php  echo $row['ExpenseDate'];?></b></td>
				   
				      <td>
				      <!--   Update Expense--> 
				      <b><a href="edit.php?edit_expense/:id=<?php echo $row['ID'];?>" class=" btn-edit"  style="text-decoration: none;"><em class="fa fa-edit" >&nbsp;</em> Edit</a></b>
					  </td>
					  
					  <td>
					  <!-- delete expense -->
					  <b><a  onClick="javascript: return confirm('Please confirm deletion');" href="manage-expense.php?delete_expense/:id=<?php echo $row['ID'];?>" class=" btn-denger"  style="text-decoration: none;"><em class="fa fa-trash">&nbsp;</em> Delete</a></b>
                  	  </td>
                	</tr>
                    <?php 
						$cnt=$cnt+1;
					}?>
                 </tbody>
                </table>
                 </form>         
                <br />
			    <form method="post" action="export-expense.php">
			   		 <button type="submit" name="export" class="btn btn-success" value="" ><em class="fa fa-cloud-download" style="font-size: 20px;"></em> Download Expense</button>
                </form>
                <div style="margin-bottom: 20px;"></div>
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
	
<script src="js/jquery-1.10.2.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#chk_all').click(function(){
        if(this.checked)
            $(".chkbox").prop("checked", true);
        else
            $(".chkbox").prop("checked", false);
    });
});

$(document).ready(function(){
    $('#delete_form').submit(function(e){
        if(!confirm("Confirm Delete?")){
            e.preventDefault();
        }
    });
});
</script>
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

