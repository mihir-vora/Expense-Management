<?php
//include database configuration file
include ('includes/server.php');
session_start();

//get records from database
$id = $_SESSION['u_id'];

$query = $db->query("SELECT * FROM `Expense_tbl` WHERE `UserId`='$id'");

if($query->num_rows > 0){
    $delimiter = ",";
    $filename = "download_expense" . date('Y-m-d') . ".csv";
    
    //create a file pointer
    $f = fopen('php://memory', 'w');
    
    //set column headers
    $fields = array('ExpenseItem', 'ExpenseCost', 'ExpenseDate');
    fputcsv($f, $fields, $delimiter);

    
    //output each row of the data, format line as csv and write to file pointer
    while($row = $query->fetch_assoc()){

        // $status = ($row['status'] == '1')?'Active':'Inactive';
        $lineData = array($row['ExpenseItem'], $row['ExpenseCost'], $row['ExpenseDate']);
        fputcsv($f, $lineData, $delimiter);
    }
    
    //move back to beginning of file
    fseek($f, 0);
    
    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    
    //output all remaining data on a file pointer
    fpassthru($f);
}
            $userid= $_SESSION['u_id']; 

            $query5=mysqli_query($db,"SELECT SUM(ExpenseCost)  as totalexpense FROM  `Expense_tbl` WHERE `UserId`='$userid';");
            $result5=mysqli_fetch_array($query5);
            $sum_total_expense=$result5['totalexpense'];
            echo "Total Expense = " .  $sum_total_expense;
            // $sum_total_expense->setBgColor('yellow'); 

    

exit;

?>