<?php


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
        $json_data = file_get_contents("php://input");
        $data = json_decode($json_data, true);

        if(isset($data))
        {
            $reference_name= $data['First_Name'];
            $reference_number=$data['Joining_date'];
            $reference_number2=$data['user_id'];
            $randorm=rand(1000,9999);
            $reference_name=strtoupper(substr($reference_name,0,3));
            $reference_number=str_replace('-','',$reference_number);
            $reference_number=substr($reference_number,4);
            $random_string=$reference_name.$reference_number.$reference_number2.$randorm;

            if(isset($data['rush-order']))
            {
                $rushorder=$data['rush-order'];    
            }
            else
            {
                $rushorder="0";
            }
            if(isset($data['Contactable']))
            {
                $contactable=$data['Contactable'];    
            }
            else
            {
                $contactable="-1";
            }



            $query="INSERT INTO `order` SET      
            `first_Name`='".$data['First_Name']."',
            `middle_Name`='".$data['Middle_Name']."',
            `last_Name`='".$data['Last_Name']."',
            `alias_first_name`='".$data['Alias_Name']."',
            `alias_middle_name`='".$data['Alias_Middle_Name']."',
            `alias_last_name`='".$data['Alias_Last_Name']."',
            `email_id`='".$data['email_id']."',
            `internal_reference_id`='".$data['Internal_Reference_ID']."',
            `joining_location`='".$data['Joining_Location']."',
            `Joining_date`='".$data['Joining_date']."',
            `LOB`='".$data['lob_type']."',
            `Additional_Comment`='".$data['Additional_Comments']."',
            `package_country_id`='".$data['locality-dropdown']."',
            `Package_id`='".$data['package-dropdown']."',
            `service_country_id`='".$data['select-country-service']."',
            `Service_type_id`='".$data['select_service_type']."',
            `service_id`='".$data['select_service_name']."',
            `Order_Status`='0',
            `Source_name`='".$data['Source_Name']."',
            `no_of_documents_uploaded`='1',
            `is_rush`='".$rushorder."',
            `generated_reference_id`='".$random_string."',
            `contactable_person`='".$contactable."',
            `client_id`='".$data['user_id']."'";

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
                        `client_id`='".$data['user_id']."',
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