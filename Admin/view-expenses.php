
<?php  
session_start();

include('Server.php');
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Expense Management || View Expense</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
        <link href="img/IMG-20200127-WA0008.png" rel="icon">
      <link href="css/main-style.css" rel="stylesheet">
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
        <li><a href="#">
          <em class="fa fa-home" style="font-size: 20px;"></em>
            </a></li>
              <li class="active"><b>View All Expense</b></li>
        </ol>
    </div><!--/.row-->
        
<div class="row" style="margin-top: 20px;">
    <div class="col-lg-12">
       <div class="panel panel-default">
          <div class="panel-heading" style="color:black;"><b>Manage Expense</b></div>
             <div class="panel-body">
                <div class="col-md-12">
                   <div class="table-responsive">
                      <table class="table table-bordered mg-b-0"
                      style="
                /*margin: 4px, 4px;  
                padding: 4px;  */
                /*background-color: #08c708; */ 
                /*width: 300px;  */
                overflow: auto;  
                white-space: nowrap;  
            ">
                            <thead>
                               <tr style="background-color: #98A3A3;color: white;">
                                    <th>Sr.NO</th>
                                     <th>Expense Item</th>
                                     <th>Expense Cost</th>
                                     <th>Expense Date</th>
                                    <th>NoteDate</th>
                               </tr>
                          </thead>
                          <?php
                              $ret=mysqli_query($db,"SELECT * FROM `Expense_tbl`  ");
                              $cnt=1;
                              while ($row=mysqli_fetch_array($ret)) {
                           ?>
                  <tbody>
                    <tr>
                      <td><b><?php echo $cnt;?></td>
                      <td><b><?php  echo $row['ExpenseItem'];?></b></td>
                      <td><b><?php  echo $row['ExpenseCost'];?></b></td>
                      <td><b><?php  echo $row['ExpenseDate'];?></b></td>
                      <td><b><?php echo $row['NoteDate'];?></b></td>
                    </tr>
                    <?php 
                      $cnt=$cnt+1;
                    }?>
                 </tbody>
               </table>
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

