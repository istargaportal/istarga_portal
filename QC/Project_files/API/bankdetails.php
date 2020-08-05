
<?php

require_once "../config/config.php";


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
//var_dump($data);

  $qwew="SELECT * FROM client WHERE id='".$data["id"]."'";
  $were=$this->conn->query($qwew);
  $dfs=$were->fetch_assoc();
    
 if($data["internal_reference_id"]==$dfs["Internal_Reference_ID"])
  {
    $query="INSERT INTO bank_details SET 
    `account_holder_name`='".$data["Name"]."',
    `account_number`='".$data["Account No"]."',
    `ifsc_code`='".$data["IFSC Code"]."',
    `address_line_1`='".$data["Address Line 1"]."',
    `address_line_2`='".$data["Address Line 2"]."',
    `favour_of`='".$data["Favour"]."',
    `swift_code`='".$data["Swift Code"]."',
    `routing_code`='".$data["Routing Code"]."',
    `client_id`='".$data["id"]."',
    `client_internal_reference_id`='".$data["internal_reference_id"]."'";
       
       $result=$this->conn->query($query);
       if($result)
       {
           echo "Bank Details Added Successfully";
       }
       else
       {
           echo "Error Occured While Adding Details";
       }
  }
  else
  {
      echo "Please Check your internal reference ID";
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

?>
