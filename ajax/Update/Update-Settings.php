<?php include '../../core/int.php';
$app_name = $_POST['app_name'];
mysqli_query($con, "update settings set App_Name = '$app_name' where S_ID = '1'");
?>