<?php
$servername="localhost";  
$username="root";  
$password="";   
$dbname="Expense_Management"; 

$conn = mysqli_connect('localhost', 'root', '', 'Expense_Management');

if($conn){
	// echo "Done";
}else{
    echo "Connection Failed";
}
?> 