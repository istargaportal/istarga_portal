<?php
require_once "../../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

if (mysqli_connect_errno($db)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

extract($_POST);

$sq = "UPDATE order_service_details SET of_user_id = 0, qc_user_id = 0, color_code = NULL, lock_status = 0 WHERE order_service_details_id  = '$order_service_details_id ' ";
$resul = mysqli_query($db,$sq); 
echo 'updated';	

?>