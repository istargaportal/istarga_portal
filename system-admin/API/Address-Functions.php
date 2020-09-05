<?php
require_once "../../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

if (mysqli_connect_errno($db)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

extract($_POST);
if($_POST['load_data'] == 'load_country')
{
	echo '<select onchange="load_state()" class="browser-default chosen-select custom-select" id="locality-dropdown" name="locality-dropdown"><option value="">Select<option>';
	$check = "SELECT id, name FROM countries ORDER BY name ";
	$resul = mysqli_query($db,$check); 
	while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
	{
		$selected = "";
		if(@$country_id == $row['id'])
		{
			$selected = "selected";
		}
		echo '<option '.@$selected.' value="'.$row['id'].'">'.$row['name'].'</option>';
	}
	echo '</select>';
}

if($_POST['load_data'] == 'load_state')
{
	echo '<select onchange="load_city()" class="browser-default chosen-select custom-select" id="select_state" name="select_state"><option value="">Select<option>';
	$check = "SELECT id, name FROM states WHERE country_id = '$country_id' ORDER BY name ";
	$resul = mysqli_query($db,$check); 
	while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
	{
		$selected = "";
		if(@$state_id == $row['id'])
		{
			$selected = "selected";
		}
		echo '<option '.@$selected.' value="'.$row['id'].'">'.$row['name'].'</option>';
	}
	echo '</select>';
}

if($_POST['load_data'] == 'load_city')
{
	echo '<select class="browser-default chosen-select custom-select" id="select_city" name="select_city"><option value="">Select<option>';
	$check = "SELECT id, name FROM cities WHERE state_id = '$state_id' ORDER BY name ";
	$resul = mysqli_query($db,$check); 
	while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
	{
		$selected = "";
		if(@$city_id == $row['id'])
		{
			$selected = "selected";
		}
		echo '<option '.@$selected.' value="'.$row['id'].'">'.$row['name'].'</option>';
	}
	echo '</select>';
}

?>