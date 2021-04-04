<?php

// initializing variables
$adminname = "";
$adminpassword    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'Expense_Management');

// ... 

// LOGIN USER


if (isset($_POST['login_adm'])) {
  $adminname = mysqli_real_escape_string($db, $_POST['adminname']);
  $adminpassword = mysqli_real_escape_string($db, $_POST['adminpassword']);

  if (empty($adminname)) {
    array_push($errors, "adminname is required");
  }
  if (empty($adminpassword)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $adminpassword = md5($adminpassword);
    $query = "SELECT id,adminname FROM `Admin_tbl` WHERE adminname='$adminname' AND adminpassword='$adminpassword'"; 
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      
 
      $row=mysqli_fetch_array($results);
      $id=$row['id'];
      $adm_name=$row['adminname'];
      

session_unset();
session_start();

      $_SESSION['adminname'] = $adm_name;


      

      $_SESSION['a_id']=$id;

     
      
      header('location:./dashboard.php');
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}

?>