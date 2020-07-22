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
        extract($_POST);
        $getdata=file_get_contents("php://input");
        $data=json_decode($getdata,true);

        if(isset($data['select_service_type'])) { $select_service_type = $data['select_service_type']; }
        if(isset($_POST['select_service_type'])) { $select_service_type = $_POST['select_service_type']; }
        if(@$edit_service_type_id > 0){ $select_service_type = $edit_service_type_id; }

        if(isset($data['locality_dropdown'])) { $locality_dropdown = $data['locality_dropdown']; }
        if(isset($_POST['locality_dropdown'])) { $locality_dropdown = $_POST['locality_dropdown']; }
        if(@$edit_country > 0){ $locality_dropdown = $edit_country; }
        
        if(isset($_POST['select_service_type']))
        {
            echo "<option value=''>Select Service Name</option>";
        }
        if(isset($data['service_type_id']) || isset($_POST['select_service_type']))
        {
            $check='SELECT * FROM service_list where service_type_id="'.$select_service_type.'" AND country_id = "'.$locality_dropdown.'" ';
            $result=$this->conn->query($check);
            if($result->num_rows>0)
            {
                $i=0;
                while($row = $result->fetch_assoc())
                {
                    if(isset($_POST['select_service_type']))
                    {
                        $selected = "";
                        if($edit_service_id == $row['id'])
                        {
                            $selected = "selected";
                        }
                        echo '<option '.@$selected.' value="'.$row['id'].'">'.$row['service_name'].'</option>';
                    }
                    $states[$i]['id']=$row['id'];
                    $states[$i]['service_name']=$row['service_name'];
                    $states[$i]['service_type_id']=$row['service_type_id'];
                    $queryew='SELECT name FROM service_type WHERE id="'.$row['service_type_id'].'"';
                    $rer=$this->conn->query($queryew);
                    $rer=$rer->fetch_assoc();
                    $states[$i]['servicetype']=$rer['name'];
                    $states[$i]['country_id']=$row['country_id'];
                    $i++;
                }
                if(isset($data['select_service_type']))
                {
                    echo json_encode($states);
                }
            }
            else
            {
                $states['status']="0";
                $states['message']="0 result";
                if(isset($data['select_service_type']))
                {
                    echo json_encode($states);
                }
            }
        }
        else
        {
           $check='SELECT * FROM service_list';
           $result=$this->conn->query($check);
           if($result->num_rows>0)
           {
            $i=0;
            while($row = $result->fetch_assoc())
            {
                $states[$i]['id']=$row['id'];
                $states[$i]['service_name']=$row['name'];
                $states[$i]['service_type_id']=$row['service_type_id'];
                $queryew='SELECT name FROM service_type WHERE id="'.$row['service_type_id'].'"';
                $rer=$this->conn->query($queryew);
                $rer=$rer->fetch_assoc();
                $states[$i]['servicetype']=$rer['name'];
                $states[$i]['country_id']=$row['country_id'];
                $states[$i]['is_webservice']=$row['is_webservice'];

                $i++;
            }
            echo json_encode($states);
        }
    }



}
}
$basic_details=new States($db);
$basic_details->get_package();