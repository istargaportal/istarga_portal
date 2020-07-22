<?php

require_once "../config/config.php";

#---------------------<---Code Written and Designed By Priyanshu Raghuvanshi--->-----------------------#

$get_connection=new connectdb;
$db=$get_connection->connect();

class assignService
{
    public function __construct($db)
    {
        $this->conn=$db;
    }

    public function assign_service()
    {
     $json=file_get_contents("php://input");
     $data=json_decode($json,true);

     $check='INSERT INTO assigned_service SET
     `client_id`="'.$data['ClientName'].'",
     `country_id`="'.$data["locality-dropdown"].'",
     `service_type_id`="'.$data['select_service_type'].'",
     `service_id`="'.$data['select_service_name'].'",
     `price`="'.$data['Price'].'",
     `SLA`="'.$data['SLA'].'"';
     $result=$this->conn->query($check);
     if($result)
     {
        echo "success";
    }
    else
    {
        echo "error";
    }
    }
}
$basic_details=new assignService($db);
$basic_details->assign_service();

?>

