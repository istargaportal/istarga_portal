<?php
session_start();
require_once "../../config/config.php";

$order_id = $_SESSION['order_id'];
$get_connection=new connectdb;
$db=$get_connection->connect();

if (mysqli_connect_errno($db)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$check = "UPDATE order_master SET disclaimer_status = 1 WHERE order_id = '$order_id' ";
$result = mysqli_query($db,$check); 
if($result > 0)
{
	echo 'success';
}
else
{
	echo 'error';
}

?>