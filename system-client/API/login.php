<?php

$json_data = file_get_contents("php://input");

$data = json_decode($json_data, true);





require_once "../../config/config.php";

#---------------------<---Code Written and Designed By Priyanshu Raghuvanshi--->-----------------------#

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

// Checks if it's empty or not
    if( !empty($json_data) )
    {

  // Decodes the JSON object to an Array
      $data = json_decode($json_data, true);

      $uname=$data['name'];
      $password=$data['pwd'];

      if ($uname != "" && $password != "")
      {
        $check="SELECT * FROM client  WHERE email='".$uname."' and password='".$password."' ";
        $result=$this->conn->query($check);
        if($result->num_rows > 0)
        {
          $row = $result->fetch_assoc();
          session_start();
          $_SESSION['uname'] = $uname;
          $_SESSION['password']=$password;
          $_SESSION['uid']=$row['id'];

          echo 1;

        }
        else
        {
          echo 0;
        }
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

