<?php
require_once "../config/config.php";
//$con = mysqli_connect("localhost","pesrsxttfd","Demo@123","pesrsxttfd");
  
   $get_connection=new connectdb;
   $db=$get_connection->connect();

   if (mysqli_connect_errno($db)){
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }
   session_start();
   $Ser=$_POST["Service"];
   $option=$_POST["option"];
   $dob=$_POST["dob"];
   $opt=$_POST["opt"];
   
// $userid =$_SESSION['uid'];
   //$userid=$_POST["unsa"];
   $userid=$_SESSION['uid'];
   $Sr=0;
   // echo"case:".$Ser;
   switch ($Ser) {
  case "First_Name_Last_Name" :
  //  $sql="SELECT * FROM `order` WHERE first_Name or last_Name LIKE '$option%'";
    $sql = "SELECT * FROM `order` WHERE first_Name LIKE '$option%' or last_Name LIKE '$option%' or CONCAT (first_Name,' ', last_Name) LIKE '$option%' or  CONCAT (first_Name,' ', middle_Name) LIKE '$option%'";
    //$sql = "SELECT * FROM `order` WHERE first_Name='$option' or last_Name='$option' or CONCAT (first_Name,' ', last_Name)='$option' or  CONCAT (first_Name,' ', middle_Name)='$option'";
    break;
  case "Internal_Reference_Id":
    $sql = "SELECT * FROM `order` WHERE internal_reference_id='$option%'";
    break;
  case "Joing_Location":
    $sql = "SELECT * FROM `order` WHERE joining_location LIKE '$option%'";
    break;
  case "Case_Ref_ID" :
    $sql = "SELECT * FROM `order` WHERE generated_reference_id LIKE '$option%'";
    break;
  case "Order_Creation_Date":
    $sql = "SELECT * FROM `order` WHERE order_creation_date_time LIKE'$dob%'";
    break;
  case "Order_Completion_Date":
    $sql = "SELECT * FROM `order` WHERE Order_Completion_Date LIKE '$dob%'";
   // echo $sql;
    break;
     case "Email_ID":
    $sql = "SELECT * FROM `order` WHERE email_id LIKE '$option%'";
    break;
  case "Order_Status":
    $sql = "SELECT * FROM `order` WHERE Order_Status='$opt'";
    break;
  default:
   $sql = "SELECT * FROM `order` WHERE client_id='$userid'";
   
}
//echo $sql;
   
   $result = mysqli_query($db,$sql);
   if($result->num_rows>0)
   {
       $i=0;
       while($row = $result->fetch_assoc())
       {
           $country[$i]['id']=$row['id'];
           $country[$i]['first_Name']=$row['first_Name'];
           $country[$i]['middle_Name']=$row['middle_Name'];
           $country[$i]['last_Name']=$row['last_Name'];
           $country[$i]['alias_first_name']=$row['alias_first_name'];
           $country[$i]['alias_middle_name']=$row['alias_middle_name'];
           $country[$i]['alias_last_name']=$row['alias_last_name'];
           $country[$i]['email_id']=$row['email_id'];
           $country[$i]['internal_reference_id']=$row['internal_reference_id'];
           $country[$i]['joining_location']=$row['joining_location'];
           $country[$i]['Joining_date']=$row['Joining_date'];
           $country[$i]['LOB']=$row['LOB'];
           $country[$i]['Additional_Comment']=$row['Additional_Comment'];
           $country[$i]['package_country_id']=$row['package_country_id'];
           $country[$i]['Package_id']=$row['Package_id'];
           $country[$i]['service_country_id']=$row['service_country_id'];
           $country[$i]['Service_type_id']=$row['Service_type_id'];
           $country[$i]['service_id']=$row['service_id'];
           $country[$i]['Source_name']=$row['Source_name'];
           $country[$i]['no_of_documents_uploaded']=$row['no_of_documents_uploaded'];
           $country[$i]['Order_Completion_Date']=$row['Order_Completion_Date'];
           $country[$i]['Order_Status']=$row['Order_Status'];
           $country[$i]['Reports']=$row['Reports'];
           $country[$i]['generated_reference_id']=$row['generated_reference_id'];
           $country[$i]['is_rush']=$row['is_rush'];
           $country[$i]['contactable_person']=$row['contactable_person'];
           $country[$i]['order_creation_date_time']=$row['order_creation_date_time'];
           $i++;
       }
       echo json_encode($country);
   }
   else {
       $country['Status']="0";
       $country['message']="No result found";
       echo json_encode($country);
   }

// while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
//   echo "<tbody>";
//         echo"<tr scope='row'>";
//         $Sr++;
//             echo "<td>" . $Sr. "</td>";
//             echo "<td>" . $row['generated_reference_id'] . "</td>";
//             echo "<td>" . $row['first_Name'] ." ". $row['last_Name'] . "</td>";
//             echo "<td>" . $row['order_creation_date_time'] . "</td>";
//             echo "<td>" . $row['Order_Status'] . "</td>";
//             echo "<td>" . $row['Order_Completion_Date']. "</td>";    
//             echo "<td>" . $row['Reports']. "</td>";   
//             echo "</tr>";
//             echo "</tbody>";
  
?>
