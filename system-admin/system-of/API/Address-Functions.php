<?php
require_once "../../../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

if (mysqli_connect_errno($db)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

extract($_POST);
if($_POST['load_data'] == 'load_country')
{
	echo '<select onchange="load_state('.$service_id.', '.$order_details_id .')" class="browser-default chosen-select custom-select" id="country_id_'.$service_id.'" name="country_id_'.$order_details_id.'">';
	$check = "SELECT id, name FROM countries WHERE id = '$country_id' ";
	$resul = mysqli_query($db,$check); 
	while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
	{
		echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
	}
	echo '</select>';
}

if($_POST['load_data'] == 'load_state')
{
	echo '<select onchange="load_city('.$service_id.', '.$order_details_id .')" class="browser-default chosen-select custom-select" id="state_id_'.$service_id.'" name="state_id_'.$order_details_id.'">';
	$check = "SELECT id, name FROM states ";
	if(@$state_id > 0) { $check.=" WHERE id = '$state_id' "; }
	else { $check.=" WHERE country_id = '$country_id' "; echo '<option value="">Select<option>'; }
	$resul = mysqli_query($db,$check); 
	while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
	{
		echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
	}
	echo '</select>';
}

if($_POST['load_data'] == 'load_city')
{
	echo '<select class="browser-default chosen-select custom-select" id="city_id_'.$service_id.'" name="city_id_'.$order_details_id.'">';
	$check = "SELECT id, name FROM cities ";
	if(@$city_id > 0) { $check.=" WHERE id = '$city_id' "; }
	else { $check.=" WHERE state_id = '$state_id' "; echo '<option value="">Select<option>'; }
	$resul = mysqli_query($db,$check); 
	while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
	{
		echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
	}
	echo '</select>';
}

?>