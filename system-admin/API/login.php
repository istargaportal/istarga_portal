<?php

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
    if( !empty($json_data))
    {
      $data = json_decode($json_data, true);
      $email=$data['email'];
      $password=$data['password'];

      if(@$data['user-type']!="")
      {
        if ($email == "")
        {
          echo "Please enter Email Address";
        }
        else if ($password == "")
        {
          echo "Please enter Password";
        }
        else
        {
          if($data['user-type']=="Admin")
          {
            if ($email != "" && $password != "")
            {
              $check='SELECT * FROM admin  WHERE email_id="'.$email.'" and password="'.$password.'"';

              $result=$this->conn->query($check);

              if($result->num_rows==1)
              {
                $row = $result->fetch_assoc();
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['password']=$password;
                $_SESSION['uid']=$row['id'];

                echo "admin_login";

              }
              else
              {
                echo "Wrong admin Credentials";
              }
            }
          } 
          else if($data['user-type']=='Employee')
          {
            $check='SELECT user_id, username, first_name, last_name, password, role_id FROM user_master WHERE username="'.$email.'" AND password="'.$password.'" AND status = 1 ';
            $result=$this->conn->query($check);
            if($result->num_rows==1)
            {
              $row = $result->fetch_assoc();
              session_start();
              $_SESSION['user_id'] = $row['user_id'];
              $_SESSION['username'] = $email;
              $_SESSION['password'] = $password;
              $_SESSION['role_id'] = $row['role_id'];
              $_SESSION['first_name'] = $row['first_name'];
              $_SESSION['last_name'] = $row['last_name'];
              if($row['role_id'] == 1) { echo "qf_login"; }
              if($row['role_id'] == 2) { echo "qc_login"; }
              if($row['role_id'] == 3) { echo "verifier_login"; }
            }
            else
            {
              echo "Wrong User Credentials";
            }
          }
        }
      }
      else
      {
        echo "Please Select User-type";
      }
      
    }
    else 
    {
      echo "Connection Denied From Server";
    }

  }

}

$basic_details=new login($db);
$basic_details->update_details();