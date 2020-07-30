<?php

require_once "../../config/config.php";


$get_connection = new connectdb;
$db = $get_connection->connect();

class login
{

  public function __construct($db)
  {
    $this->conn = $db;
  }

  public function update_details()
  {


    $json_data = file_get_contents("php://input");

    // Checks if it's empty or not
    if (!empty($json_data)) {

      // Decodes the JSON object to an Array
      $data = json_decode($json_data, true);
      $contact=$data['Contact No.'];
      $title=$data['Title'];
      $first_name=$data['First Name'];
      $last_name = $data['Last Name'];
      $middle_name = $data['Middle Name'];
      $full_name  = $title." ".$first_name." ".$middle_name." ".$last_name;
      $password=$data['Password'];
      $email=$data['Password Mail To'];
      $status=$data['Status'];
      switch ($data['Groups']) {

        case 0:
          $query = "INSERT into employee_of SET
          first_name='" . $first_name . "',
          last_name='" . $last_name. "',
          middle_name='" . $middle_name. "',
          fullname='" . $full_name. "',
          email_id='" . $email. "',
          mobile_number='" . $contact. "',
          user_status='" . $status. "',
          password='" . $password. "'";
          $result = $this->conn->query($query);
          if ($result) {
            echo "Added OF Successfully";
          } else {
            echo "Not able to add to of";
          }
          break;
        case 1:
          $query = "INSERT into employee_qc SET
           first_name='" . $first_name . "',
           last_name='" . $last_name. "',
           middle_name='" . $middle_name. "',
           fullname='" . $full_name. "',
           email_id='" . $email. "',
           mobile_number='" . $contact. "',
           user_status='" . $status. "',
           password='" . $password. "'";
          $result = $this->conn->query($query);
          if ($result) {
            echo "Added QC Successfully";
          } else {
            echo "Not able to add qc";
          }
          break;
        case 2:
          $query = "INSERT into employee_vendor SET
          first_name='" . $first_name . "',
          last_name='" . $last_name. "',
          middle_name='" . $middle_name. "',
          fullname='" . $full_name. "',
          email_id='" . $email. "',
          mobile_number='" . $contact. "',
          user_status='" . $status. "',
          password='" . $password. "'";
          $result = $this->conn->query($query);
          if ($result) {
            echo "Added Vendor Successfully";
          } else {
            echo "Not able to add vendor";
          }
          break;
      }
      //var_dump($data);

    } else {
      echo "Empty JSON object, something's wrong!";
    }
  }
}

$basic_details = new login($db);
$basic_details->update_details();

?>
