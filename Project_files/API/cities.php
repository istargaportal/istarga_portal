<?php

require_once "../../config/config.php";

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

        if(isset($data['service_type_id']))
        {
            $check='SELECT * FROM cities where state_id="'.$data['service_type_id'].'" ORDER BY name ASC ';   
            $this->conn->query("SET CHARACTER SET utf8"); 
            $result=$this->conn->query($check);
            if($result->num_rows>0)
            {
                $i=0;
                while($row = $result->fetch_assoc())
                {
                    $states[$i]['id']=$row['id'];
                    $states[$i]['service_name']=$row['name'];
                    $states[$i]['service_type_id']=$row['state_id'];
                    $i++;
                }
                echo json_encode($states);
            }
            else
            {
                $states['status']="0";
                $states['message']="0 result";
                echo json_encode($states);
            }
        }
        else
        {
            echo "State ID Not found";

        }



    }
}
$basic_details=new States($db);
$basic_details->get_package();