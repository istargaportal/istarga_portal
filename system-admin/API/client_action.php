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
    extract($_POST);
    if($load_condition != "")
    {
      $check = "UPDATE client SET is_block = '$condition' WHERE id = '$client_id' ";
      $result=$this->conn->query($check);
      if($result)
      {
        if($condition == 1)
        {
          echo "<script>alert('Client Blocked!');</script>"; 
        }
        else
        {
          echo "<script>alert('Client Unblocked!');</script>"; 
        }
      }
      else
      {
        echo "<script>alert('Error occurred!');</script>"; 
      }
    }
  }
}

$basic_details=new login($db);
$basic_details->update_details();

?>