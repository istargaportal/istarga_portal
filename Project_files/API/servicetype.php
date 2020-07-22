<?php

require_once "../config/config.php";

#---------------------<---Code Written and Designed By Priyanshu Raghuvanshi--->-----------------------#

$get_connection=new connectdb;
$db=$get_connection->connect();

class States
{

    public function __construct($db)
    {
        $this->conn=$db;
    }

    public function get_package()
    {
        $getdata=file_get_contents("php://input");
        $data=json_decode($getdata,true);
        extract($_POST);
        $check='SELECT * FROM service_type';
        $result=$this->conn->query($check);
        if($result->num_rows>0)
        {
            $i=0;
            echo '<option value="">Select Service Type</option>';
            while($row = $result->fetch_assoc())
            {
                $states[$i]['id']=$row['id'];
                $states[$i]['service_type']=$row['name'];
                $i++;
                if($load_condition == "load_service_type")
                {
                    $selected = "";
                    if($edit_service_type_id == $row['id'])
                    {
                        $selected = "selected";
                    }
                    echo '<option '.@$selected.' value='.$row['id'].'>'.$row['name'].'</option>';
                }
            }
            if($load_condition != "load_service_type")
            {
                echo json_encode($states);
            }
        }
        else {

            $states['status']="0";
            $states['message']="0 result";
            if($load_condition != "load_service_type")
            {
                echo json_encode($states);
            }
        }
    }
}
$basic_details=new States($db);
$basic_details->get_package();