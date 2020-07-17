<?php
  $con = mysqli_connect("localhost","root","","bgv");
   
   if (mysqli_connect_errno($con)){
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }
   
   $Ser=$_GET["Service"];
   echo $Ser;
   $sql = "SELECT * FROM bulk_order where Service='$Ser'";
   $Sr=0;
   //date_default_timezone_set("Asia/Kolkata"); 
   $Date=date('Y-m-d');
   $Time=date('H:i');
   $result = mysqli_query($con,$sql);
   echo ' <table class="table table-bordered table-dark"style="background-color:#1A2035;margin-bottom:9%;">';
   echo"<thead><tr style='color:white;'>";
          echo"<th scope='col' style='color:white;'>Sr.no</th>
               <th scope='col' style='color:white;'>Id</th>
              <th scope='col' style='color:white;'>Date</th>
              <th scope='col' style='color:white;'>Time</th>
              <th scope='col' style='color:white;'>File Name</th>
              <th scope='col' style='color:white;'>From Date/Time</th>
              <th scope='col' style='color:white;'>To Date/Time</th>
              <th scope='col' style='color:white;'>No of Records/Time</th>
              <th scope='col' style='color:white;'>Services</th> </tr></thead>";
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
  echo "<tbody>";
        echo"<tr scope='row'>";
        $Sr++;
            echo "<td>" . $Sr. "</td>";
            echo "<td>" . $row['Id'] . "</td>";
            echo "<td>" . $Date . "</td>";
            echo "<td>" . $Time . "</td>";
            echo "<td>" . $row['File'] . "</td>";
            echo "<td>" . $row['From_Date'] ." ". $row['From_Time'] . "</td>";
            echo "<td>" . $row['To_Date'] ." ". $row['To_Time'] . "</td>";
            echo "<td>" . $row['No_Records'] . "</td>";
             echo "<td>" . $row['Service'] . "</td>";
       
            echo "</tr>";
            echo "</tbody>";

}
   echo '</table>';
   

?>
