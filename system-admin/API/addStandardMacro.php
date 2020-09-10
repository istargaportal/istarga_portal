<?php

require_once "../../config/config.php";


$get_connection = new connectdb;
$db = $get_connection->connect();

class service
{

  public function __construct($db)
  {
    $this->conn = $db;
  }

  public function add_Service()
  {


    $json_data = file_get_contents("php://input");

    // Checks if it's empty or not
    if (!empty($json_data)) {

      // Decodes the JSON object to an Array
      $data = json_decode($json_data, true);
      //echo $data;
      $MacroType=$data['MacroType'];
      $service_type_id=$data['ServiceType'];
      $Scenario=$data['Scenario'];
      $comment = $data['Comment'];



      if ($data != "") {
        $check = "INSERT INTO `standard_macro` SET
    `macro_type`='" . $MacroType . "',
    `service_type_id`='" . $service_type_id . "',
    `scenario`='" . $Scenario . "',
    `comment`='" . $comment . "'";


        $result = $this->conn->query($check) or die('Error in fetching records'.mysqli_error($this->conn));
        if ($result) {
          echo "sucess";
        } else {
          echo 'fail';
        }
      }
    } else {
      echo "Empty JSON object, something's wrong!";
    }
  }
}

$basic_details = new service($db);
$basic_details->add_Service();

?>
