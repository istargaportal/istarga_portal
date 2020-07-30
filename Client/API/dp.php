<?php
session_start();
require_once "../../config/config.php";
 // $con = mysqli_connect("localhost","root","","bgv");
  
   $get_connection=new connectdb;
   $db=$get_connection->connect();

   if (mysqli_connect_errno($db)){
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }
   $userid=$_SESSION['uname'];
  // $userid="1";
   $sql = "SELECT * FROM `user_details` WHERE email_id='$userid'";
   $result = mysqli_query($db,$sql);
   while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	  
   //echo $row['Profile'];
   echo '<div class="card-avatar">
                  <a href="#pablo" >';
         echo "<img class='img' src='".$row['Profile']."'/>";
                echo '</a>
                </div>
                <div class="card-body">';
            //echo '<h6 class="card-category">'.$row['designation'].'</h6>';
            echo '<h4 class="card-title">'.$row['Company'].'</h4>      
                </div>';
   }
                   
?>


