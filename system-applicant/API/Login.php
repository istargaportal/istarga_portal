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
    if(isset($_POST))
    {
      $username=$_POST['username'];
      $password=$_POST['password'];
      if ($username != "" && $password != "")
      {
        $check='SELECT order_id  FROM order_master WHERE username = "'.$username.'" and password = "'.$password.'"';
        $result=$this->conn->query($check);

        if($result->num_rows==1)
        {
          $row = $result->fetch_assoc();
          session_start();
          $_SESSION['username'] = $username;
          $_SESSION['password'] = $password;
          $_SESSION['order_id'] = $row['order_id'];
          echo "success";
        }
        else
        {
          echo "wrong";
        }
      }    
    }
    else 
    {
      echo "error";
    }
  }
}

$basic_details=new login($db);
$basic_details->update_details();