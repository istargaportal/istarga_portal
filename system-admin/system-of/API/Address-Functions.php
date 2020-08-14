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
	echo '<select onchange="load_state()" class="browser-default chosen-select custom-select" id="country_id" name="country_id">';
	echo '<option value="">Select<option>';

	$check = "SELECT id, name FROM countries  ";
	$resul = mysqli_query($db,$check); 
	while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
	{
		$selected = "";
		if(@$country_id_provided == $row['id']) { $selected = "selected"; }
		echo '<option '.@$selected.' value="'.$row['id'].'">'.$row['name'].'</option>';
	}
	echo '</select>';
}

if($_POST['load_data'] == 'load_state')
{
	echo '<select onchange="load_city()" class="browser-default chosen-select custom-select" id="state_id" name="state_id">';
	$check = "SELECT id, name FROM states WHERE country_id = '$country_id' ";
	if(@$state_id_provided > 0) { $check.= " AND id = '$state_id_provided' "; }
	else { echo '<option value="">Select<option>'; }
	$resul = mysqli_query($db,$check); 
	while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
	{
		echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
	}
	echo '</select>';
}

if($_POST['load_data'] == 'load_city')
{
	echo '<select class="browser-default chosen-select custom-select" id="city_id" name="city_id">';
	$check = "SELECT id, name FROM cities WHERE state_id = '$state_id' ";
	if(@$city_id_provided > 0) { $check.= " AND id = '$city_id_provided' "; }
	else { echo '<option value="">Select<option>'; }
	$resul = mysqli_query($db,$check); 
	while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
	{
		echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
	}
	echo '</select>';
}

?>