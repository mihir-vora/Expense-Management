<?php
session_start();
unset($_SESSION["id"]);
// unset($_SESSION["adminpassword"]);
// unset($_SESSION["adminemail"]);
unset($_SESSION["adminname"]);
session_destroy();

header("location:./admin-login.php");
?>
