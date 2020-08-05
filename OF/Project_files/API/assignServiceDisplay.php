<?php
require_once "../config/config.php";
//$con = mysqli_connect("localhost","pesrsxttfd","Demo@123","pesrsxttfd");
  
   $get_connection=new connectdb;
   $db=$get_connection->connect();

   if (mysqli_connect_errno($db)){
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }
     
   $Client=$_POST["Client"];
   //$Country=$_POST["Country"];
   //$SerT=$_POST["ServiceT"];
   //$Price=$_POST["Price"];
   //$SLA=$_POST["SLA"];
   //$ServiceN=$_POST["ServiceN"];
   //echo "console.log($Client)"
   
   $sql1 = "SELECT Client_Name from `client`";                           
   $res = mysqli_query($db,$sql1);   
     echo "<option selected class='bg-secondary text-light'>Choose...</option>";
                             while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)){ 
                      echo "<option class='bg-secondary text-light'>". $row['Client_Name'] ."</option>";
                      }

?>
  