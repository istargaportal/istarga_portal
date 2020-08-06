<?php
session_start();
 require_once "../../config/config.php";
 // $con = mysqli_connect("localhost","root","","bgv");
  
   $get_connection=new connectdb;
   $db=$get_connection->connect();
   if (mysqli_connect_errno($db)){
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }
   $userid =$_SESSION['uname'];
   //$userid="prajakta@gvm.com";
   
 $Path=$_POST["Fpath"];
 $sql="UPDATE `user_details` SET `Profile`='$Path' WHERE email_id='$userid'";
 $result = mysqli_query($db,$sql);             
?>


