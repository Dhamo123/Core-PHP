<?php 
include ('core/int.php');

$userid = $user_data['user_id'];
$years = date('Y');
$months = date('M');
$date = date('Y-m-d');
$session_year = $_SESSION['year_end'];
mysqli_query($con, "insert into user_logs(User_ID, Year, Months, Date, Time, Session_Year, Log_Type) VALUES ('$userid', '$years', '$months', '$date', NOW(), '$session_year', 'Logout')");
session_start();
session_destroy();
header('Location: index.php');
?>
