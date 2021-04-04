<?php include('Server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Sign up</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <link href="img/IMG-20200127-WA0008.png" rel="icon">
  <link href="css/home-style.css" rel="stylesheet">
<!--Custom Font-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>
<body>
 <div class="header">
    <h1><b>Sign up</b></h1>
  </div>
  
  <form method="post" action="Register.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
      <label><em class="fa fa-user"></em> Hi there! My name is</label>
      <input type="text" name="adminname" value="">
    </div>
    <div class="input-group">
      <label><i class="fa fa-envelope"> Here’s my email address: </i></label>
      <input type="email" name="email" value="">
    </div>
    <div class="input-group">
      <label><i class="fa fa-lock"> And here’s my password: </i></label>
      <input type="password" name="password_1">
    </div>
    <div class="input-group">
      <label><i class="fa fa-lock"> My confirm password</i></label>
      <input type="password" name="password_2">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="reg_adm"><i class="fa fa-arrow-right"> Register</i></button>
    </div>
    <p>
      Already a member? <a href="login.php" style="text-decoration: none">Click here</a>
    </p>
  </form>
</body>
</html>