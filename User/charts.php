  <?php 
  session_start(); 
  // print_r($_SESSION['username']) ;
  // print_r($_SESSION['u_id']);
  // exit;
  include_once('includes/server.php');
  if(!isset($_SESSION['u_id']))
  {
    header('location:./login.php');
  }
  //  include('server.php'); 
?>
<?php
  $con = mysqli_connect("localhost","root","","Expense_Management");

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Charts - Expense Management</title>
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
</head>
<body>
  <?php include_once('includes/sidebar.php') ?>

  <?php include_once('includes/header.php') ?>

   <section id="container">
    <!--main content start-->
<!--     <section id="main-content">
 -->      
 <section class="wrapper" >
  
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row" style="margin-top: 0px;">
    <ol class="breadcrumb">
      <li><a href="dashboard.php">
        <em class="fa fa-home" style="font-size: 20px;"></em>
        </a></li>
        <li class="active"><b>Chart</b></li>
    </ol>
  </div>
   
    <div class="row" style="margin-top: 20px;" >
      <div class="col-md-6"  style="width: 100%; height: 10%;">
        <div class="panel panel-default">
          <div class="panel-heading">
            <b>Pie Chart</b>
            
              

<!--                <div class="row" style="margin-top:10px;"> 
 --> 
  
  
                
                  </a>

              </li>
            </ul>
            <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span ></div>
          <div class="panel-body">
            <div class="canvas-wrapper" >
    <center><div id="piechart" class="chart" style="width: 350px; height: 300px;"></div></center>
            </div>
          </div>
        </div>
      </div>

</div>
</div>
</section>
</section>

      <?php include_once('includes/footer.php') ?>


  <script src="js/jquery-1.11.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/chart.min.js"></script>
  <script src="js/chart-data.js"></script>
  <script src="js/easypiechart.js"></script>
  <script src="js/easypiechart-data.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/custom.js"></script>
  <script>
  window.onload = function () {
  var chart1 = document.getElementById("line-chart").getContext("2d");
  window.myLine = new Chart(chart1).Line(lineChartData, {
  responsive: true,
  scaleLineColor: "rgba(0,0,0,.2)",
  scaleGridLineColor: "rgba(0,0,0,.05)",
  scaleFontColor: "#c5c7cc"
  });
  var chart2 = document.getElementById("bar-chart").getContext("2d");
  window.myBar = new Chart(chart2).Bar(barChartData, {
  responsive: true,
  scaleLineColor: "rgba(0,0,0,.2)",
  scaleGridLineColor: "rgba(0,0,0,.05)",
  scaleFontColor: "#c5c7cc"
  });
  var chart3 = document.getElementById("doughnut-chart").getContext("2d");
  window.myDoughnut = new Chart(chart3).Doughnut(doughnutData, {
  responsive: true,
  segmentShowStroke: false
  });
  var chart4 = document.getElementById("pie-chart").getContext("2d");
  window.myPie = new Chart(chart4).Pie(pieData, {
  responsive: true,
  segmentShowStroke: false
  });
  var chart5 = document.getElementById("radar-chart").getContext("2d");
  window.myRadarChart = new Chart(chart5).Radar(radarData, {
  responsive: true,
  scaleLineColor: "rgba(0,0,0,.05)",
  angleLineColor: "rgba(0,0,0,.2)"
  });
  var chart6 = document.getElementById("polar-area-chart").getContext("2d");
  window.myPolarAreaChart = new Chart(chart6).PolarArea(polarData, {
  responsive: true,
  scaleLineColor: "rgba(0,0,0,.2)",
  segmentShowStroke: false
  });
};
  </script> 


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['ExpenseItem', 'ExpenseCost'],
         <?php
         $userid= $_SESSION['u_id'];

         $sql = "SELECT * FROM Expense_tbl where `UserId`='$userid'";
         $fire = mysqli_query($con,$sql);
          while ($result = mysqli_fetch_assoc($fire)) {
            echo"['".$result['ExpenseItem']."',".$result['ExpenseCost']."],";
          }

         ?>
        ]);

        var options = {
          title: 'Expense Manage Charts'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
</body>
</html>
