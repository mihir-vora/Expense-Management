<?php
session_start();

include('includes/server.php');
$id=$_SESSION['u_id'];
if(isset($_POST['submit']))
  {
    $email=$_POST['email'];
    $message=$_POST['message'];
    $query=mysqli_query($db, "INSERT  INTO `testing`(`email`, `message`, `UserId`) VALUES ('$email','$message', $id)");
    if($query){
    // echo "<script>alert('Expense has been added');</script>";
    echo "<script>window.location.href='feedback_user_replay.php'</script>";
    } else {
    echo "<script>alert('Something went wrong. Please try again');</script>";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Feedback Replay</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
<link rel="icon" href="img/c88daee2-b70a-491c-8d0e-b79645fa4f6c_200x200.png" type= "image/x-icon" sizes="228x228">
  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="css/main-style1.css" rel="stylesheet">
    <link href="css/main-style.css" rel="stylesheet">

  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/chart-master/Chart.js"></script>
  <style type="text/css">
    * {
  box-sizing: border-box;
}

body {
  font: 16px Arial;  
}

.autocomplete {
  /*the container must be positioned relative:*/
  position: relative;
  display: inline-block;
}

input {
  border: 1px solid transparent;
  background-color: #f1f1f1;
  padding: 10px;
  font-size: 16px;
}

input[type=text] {
  background-color: white;
  width: 100%;

}

input[type=submit] {
  background-color: DodgerBlue;
  color: #fff;
  cursor: pointer;
}

.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 55%;
  left: 0;
  right: 0;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
  width: 15%;
}



.autocomplete-active {
  /*when navigating through the items using the arrow keys:*/
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
  </style>
</head>
<body>
  <?php include_once('includes/header.php');?>
  <?php include_once('includes/sidebar.php');?>


   <section id="container">
    <!--main content start-->
<!--     <section id="main-content">
 -->      
 <section class="wrapper" >
  
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="dashboard.php">
        <em class="fa fa-home" style="font-size: 20px;"></em>
        </a></li>
        <li class="active"><b>User Feedback Replay</b></li>
    </ol>
  </div>

         

    <!--/.row-->
<div class="row" style="margin-top: 20px" >
 <div class="col-lg-12">
  <div class="panel panel-default">
   <div class="panel-heading" style="color:black;"><b>User Feedback Replay</b></div>
   <div class="panel-body">
     <div class="col-md-12">
      <!-- <p style="color:red;"><?php echo $_POST['add-expense'];?><?php echo $_POST['add-expense']="";?></p> -->
    <form role="form" method="post" action="">
            

          
      <div class="form-group">
      <label style="color: black;"><b><em class="fa fa-envelope" style="font-size: 18px;"></em> Email</b></label>
      <input type="email"  class="form-control" name="email" value="" required="true" onkeypress="return">
    </div>
                
    <div class="form-group">
      <label style="color: black;"><b><em class="fa fa-comments" style="font-size: 18px;"></em>  Message</b></label>
      <textarea class="form-control" type="text" value="" required="true" name="message" rows="4" cols="50" ></textarea>
    </div>
                                
    <div class="form-group has-success">
      <button type="submit" class="btn btn-primary" name="submit" onClick="javascript: return confirm(' confirm Send Feedback');"><em class="fa fa-arrow-right" style="font-size: 20px;"> Add Expense</em></button>
    </div>      
     </div>
   </form>
  </div>
  </div>
 </div><!-- /.panel-->
</div><!-- /.col-->
<?php include_once('includes/footer.php');?>
</div><!-- /.row -->
</div><!--/.main-->
  </section>
</section>
</section>

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
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
        return true;
}//-->
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

<script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
var foodName = ["asparagus","apples","avacado"
,"alfalfa"
,"acorn squash"  
,"almond"
,"arugala"
,"artichoke"
,"applesauce"
,"asian noodles" 
,"antelope"
,"ahi tuna" 
,"albacore tuna"
,"Apple juice"
,"Avocado roll"
,"Milk"
,"Water"
,"Taxi"
,"Bananas", "Boysenberries", "Blueberries", "Bing Cherry" 
,"Cherries", "Cantaloupe", "Crab apples", "Clementine", "Cucumbers"
,"Damson plum", "Dinosaur Eggs (Pluots)", "Dates", "Dewberries", "Dragon Fruit"
,"Elderberry", "Eggfruit", "Evergreen Huckleberry", "Entawak"
,"Fig", "Farkleberry", "Finger Lime"
, "Grapefruit", "Grapes", "Gooseberries", "Guava"
,"Honeydew melon", "Hackberry", "Honeycrisp Apples"
,"Indian Prune (Plum)", "Indonesian Lime", "Imbe", "Indian Fig"
,"Jackfruit", "Java Apple", "Jambolan"
,"Kiwi", "Kaffir Lime", "Kumquat"
];

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), foodName);
</script>

</body>
</html>
