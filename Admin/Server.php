<?php

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'Expense_Management');

// REGISTER USER
if (isset($_POST['reg_adm'])) {
  // receive all input values from the form
  $adminname = mysqli_real_escape_string($db, $_POST['adminname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($adminname)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
  array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM `Admin_tbl` WHERE adminname='$adminame' OR adminemail='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $admin = mysqli_fetch_assoc($result);
  
  if ($admin) { // if user exists
    if ($admin['adminname'] === $adminname) {
      array_push($errors, "Username already exists");
    }

    if ($admin['adminemail'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password_1);//encrypt the password before saving in the database

    $query = "INSERT INTO  `Admin_tbl` (adminname, adminemail, adminpassword) VALUES('$adminname', '$email', '$password')";
    mysqli_query($db, $query);
    $_SESSION['adminname'] = $adminname;
    header('location:./dashboard.php');
  }
}




// LOGIN USER


if (isset($_POST['login_adm'])) {
  $adminname = mysqli_real_escape_string($db, $_POST['adminname']);
  $password = mysqli_real_escape_string($db, $_POST['adminpassword']);

  if (empty($adminname)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT id,adminname FROM `Admin_tbl` WHERE adminname='$adminname' AND adminpassword='$password'"; 
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