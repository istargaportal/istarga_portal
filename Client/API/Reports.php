<?php
require_once "../config/config.php";
 // $con = mysqli_connect("localhost","root","","bgv");
  
   $get_connection=new connectdb;
   $db=$get_connection->connect();

   if (mysqli_connect_errno($db)){
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }
  
   $Ser=$_POST["Sta"];
  
   $Sr=0;

  $sql = "SELECT * FROM `order` WHERE Order_Status='$Ser'";
  //$sql = "SELECT * FROM `order`";
$result = mysqli_query($db,$sql);
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
  echo "<tbody>";
        echo"<tr scope='row'>";
        $Sr++;
            echo "<td class='text-center text-light'>" . $Sr. "</td>";
            echo "<td class='text-center text-light'>" . $row['generated_reference_id'] . "</td>";
            echo "<td class='text-center text-light'>" . $row['first_Name'] ." ". $row['last_Name'] . "</td>";
            echo "<td class='text-center text-light'>" . $row['order_creation_date_time'] . "</td>";
            echo "<td class='text-center text-light'
            style='white-space:pre-line;'>" . $row['Order_Status'] . "</td>"; 
            echo "</tr>";
            echo "</tbody>";

}

   

?>