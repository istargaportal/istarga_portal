<?php

$json_data = file_get_contents("php://input");

$data = json_decode($json_data, true);





require_once "../config/config.php";

#---------------------<---Code Written and Designed By Priyanshu Raghuvanshi--->-----------------------#

$get_connection=new connectdb;
$db=$get_connection->connect();

class createorder
{
    
    public function __construct($db)
    {
    $this->conn=$db;
    }

   public function order_create()
   {
    //   var_dump($_POST);
     //  var_dump($_FILES);
if(isset($_POST))
{
        // code to generate a reference ID

$reference_name= $_POST['First_Name'];
$reference_number=$_POST['dateofbirth'];
$reference_number2=$_POST['user_id'];
$randorm=rand(1000,9999);
$reference_name=strtoupper(substr($reference_name,0,3));
$reference_number=str_replace('-','',$reference_number);
$reference_number=substr($reference_number,4);
$random_string=$reference_name.$reference_number.$reference_number2.$randorm;

if(isset($_POST['rushorder']))
{
    $rushorder=$_POST['rushorder'];    
}
else
{
    $rushorder="0";
}
if(isset($_POST['Contactable']))
{
    $contactable=$_POST['Contactable'];    
}
else
{
    $contactable="-1";
}



    $query="INSERT INTO `order` SET      
    `first_Name`='".$_POST['First_Name']."',
    `middle_Name`='".$_POST['Middle_Name']."',
    `last_Name`='".$_POST['Last_Name']."',
    `alias_first_name`='".$_POST['Alias_Name']."',
    `alias_middle_name`='".$_POST['Alias_Middle_Name']."',
    `alias_last_name`='".$_POST['Alias_Last_Name']."',
    `email_id`='".$_POST['Enter_Email_ID']."',
    `internal_reference_id`='".$_POST['Internal_Reference_ID']."',
    `joining_location`='".$_POST['Joining_Location']."',
    `Joining_date`='".$_POST['dateofbirth']."',
    `LOB`='".$_POST['lob_type']."',
    `Additional_Comment`='".$_POST['Additional_Comments']."',
    `package_country_id`='".$_POST['locality-dropdown']."',
    `Package_id`='".$_POST['package-dropdown']."',
    `service_country_id`='".$_POST['select-country-service']."',
    `Service_type_id`='".$_POST['select_service_type']."',
    `service_id`='".$_POST['select_service_name']."',
    `Order_Status`='0',
    `Source_name`='".$_POST['Source_Name']."',
    `no_of_documents_uploaded`='1',
    `is_rush`='".$rushorder."',
    `generated_reference_id`='".$random_string."',
    `contactable_person`='".$contactable."',
    `client_id`='".$_POST['user_id']."'";

    $result=$this->conn->query($query);
    
    if ($result === TRUE) {
        $last_id = $this->conn->insert_id;
        if(isset($_FILES["myfiles"]))
        {
            foreach($_FILES["myfiles"]["tmp_name"] as $key=>$value){
                $targetpath="../uploads/" . basename($_FILES["myfiles"]["name"][$key]);
                move_uploaded_file($value,$targetpath);
            }

            $arr=$_FILES["myfiles"]["name"];
            for($i=0;$i<=count($arr)-1;$i++)
            {
                $qwe="INSERT INTO `document_list` SET
                `document_name`='".$arr[$i]."',
                `client_id`='".$_POST['user_id']."',
                `order_id`='".$last_id."'";
                
                $this->conn->query($qwe);
            }

        }

        
        echo "1";
       
      } else {
        echo "Error: " . $query . "<br>" . $this->conn->error;

        echo "0";
      }
     

}
       
           
          
           
   }

}

            $basic_details=new createorder($db);
            $basic_details->order_create();