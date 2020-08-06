<?php

require_once "../../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

class login
{
  public function __construct($db)
  {
    $this->conn=$db;
  }

  public function update_details()
  {
    $json_data = file_get_contents("php://input");

    if( !empty($json_data) )
    {
      $data = json_decode($json_data, true);

      if($data["bank_name"] != "" && $data["account-no"] != "" && $data["address-line-1"] != "")
      {
        $query="UPDATE bank_details SET 
        `bank_name`='".$data["bank_name"]."',
        `account_number`='".$data["account-no"]."',
        `ifsc_code`='".$data["ifsc-code"]."',
        `address_line_1`='".$data["address-line-1"]."',
        `address_line_2`='".$data["address-line-2"]."',
        `favour_of`='".$data["favour-of"]."',
        `swift_code`='".$data["swift-code"]."',
        `routing_code`= '".$data["routing-code"]."' 
        WHERE id = '".$data["id"]."'  ";

        $result=$this->conn->query($query);
        if($result)
        {
          echo "Bank Details updated Successfully";
        }
        else
        {
          echo "Error Occured While updating Details";
        }
      }
      else
      {
        echo "Please fill all required fields!";
      }
    }
    else 
    {
      echo "Empty JSON object, something's wrong!";
    }
  }
}

$basic_details=new login($db);
$basic_details->update_details();

?>