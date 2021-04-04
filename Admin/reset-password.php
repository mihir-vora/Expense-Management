<?php include('Server.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>Reset-Password</title>
	 <link rel="stylesheet" type="text/css" href="css/style.css">
     <link href="css/font-awesome.min.css" rel="stylesheet">

<link rel="icon" href="img/c88daee2-b70a-491c-8d0e-b79645fa4f6c_200x200.png" type= "image/x-icon" sizes="228x228">    <!--Custom Font-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>
<body>
      <div class="header">
    <h2>Reset Your Password</h2>
  </div> 

<form method="post" action="register.php">
    <?php include('errors.php'); ?>
     <div class="input-group">
      <label><em class="fa fa-user" style="font-size: 20px;"></em> Username</label>
    <input type="text" name="email">
  </div>
  <div class="input-group">
      <button type="submit" class="btn" name="reg_user"><em class="fa fa-arrow-right" style="font-size: 20px;"></em> Reset Password</button>
    </div>
    <p>
      Back To Login? <a href="admin-login.php" style="text-decoration: none;">Login</a>
    </p>
</form>


</body>
</html>