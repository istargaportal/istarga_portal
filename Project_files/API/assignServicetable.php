<?php
error_reporting(0);

  require_once "../config/config.php";
//$con = mysqli_connect("localhost","pesrsxttfd","Demo@123","pesrsxttfd");
  
   $get_connection=new connectdb;
   $db=$get_connection->connect();

   if (mysqli_connect_errno($db)){
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }
  
     
   $Client=$_POST["Client"];
   $Country=$_POST["Country"];
   $SerT=$_POST["ServiceT"];
   $Price=$_POST["Price"];
   $SLA=$_POST["SLA"];
   $ServiceN=$_POST["ServiceN"];
   $Sr=0;
   $sql1 = "SELECT * from `client` WHERE `Client_Name`='$Client'";                           
   $result1 = mysqli_query($db,$sql1);
 
 
 
 if($_POST["action"]=='delete'){
    $sql = "DELETE FROM `client` WHERE `id`='$Client'";  
    $result = mysqli_query($db,$sql);
    //echo $sql;
    if($result){echo  "deleted-".$Client;}else{echo 'error at'.$Client;}
}

else{
                   
     while ($row = mysqli_fetch_array($result1, MYSQLI_ASSOC)){
        $Sr++;
        echo"<tr id='tr$Sr' scope='row'>";
            echo "<td>" . $Sr. "</td>";
            echo "<td id='cn'>" . $row['Client_Name'] . "</td>";
            echo "<td id='co'>" . $row['country'] . "</td>";
            echo "<td id='st'>" . $row['Service_Type'] . "</td>";
            echo "<td id='sn'>" . $row['Service_Name'] . "</td>";
            echo "<td id='sla'>" . $row['SLA']. "</td>"; 
            echo "<td class='text-primary'> <button id='$Sr' type='button' class='btn btn-primary btn-sm' onclick='editRow(".$Sr.",".$row['id'].");";
            echo "'> Edit </button></td>";  
            echo "<td class='text-primary'> <button type='button' class='btn btn-primary btn-sm' onclick='deleteRow(".$row['id'].");'> Delete </button></td>";    
            echo "</tr>";}                          
}   
?>
   
  