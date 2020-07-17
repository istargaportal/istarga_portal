<?php

$json_data = file_get_contents("php://input");

// Checks if it's empty or not
if( !empty($json_data) ){
  
  // Decodes the JSON object to an Array
  $data = json_decode($json_data, true);
  
  // Now you can access to your single datas as a normal array. 
  // For example: if in your form you had a field with name="city" you can print it like so:
  echo $data["username"];
  echo $data['pwd'];

} else {
  echo "Empty JSON object, something's wrong!";
}