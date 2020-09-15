<?php
session_start();
require_once "../config/config.php";

if(!isset($_SESSION['order_id']))
{
	echo '
	<script>
	window.location.href = "index.php";
	</script>
	';
}
$order_id = $_SESSION['order_id'];
$get_connection=new connectdb;
$db=$get_connection->connect();

if (mysqli_connect_errno($db)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$check = "SELECT disclaimer_status FROM order_master WHERE order_id = '$order_id' ";
$resul = mysqli_query($db,$check); 
if ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
{
	$disclaimer_status = $row['disclaimer_status'];
}
if($disclaimer_status == 0)
{
	echo '
	<script>
		window.location.href = "Disclaimer.php";
	</script>
	';
}
else
{
	echo '
	<script>
		window.location.href = "My-Application.php";
	</script>
	';
}

?>