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
        extract($_POST);

        if($edit_id > 0)
        {
            $check = 'UPDATE assigned_service '; 
        }
        else
        {
            $check = 'INSERT INTO assigned_service '; 
        }
        $check.= 'SET
        `client_id`="'.$_POST['ClientName'].'",
        `country_id`="'.$_POST["locality-dropdown"].'",
        `service_type_id`="'.$_POST['select_service_type'].'",
        `service_id`="'.$_POST['select_service_name'].'",
        `price`="'.$_POST['Price'].'",
        `currency`="'.$_POST['currency'].'",
        `SLA`="'.$_POST['SLA'].'"';
        if($edit_id > 0)
        {
            $check.= " WHERE id = '$edit_id' "; 
        }
        $result=$this->conn->query($check);

        if($result)
        {
            if($edit_id > 0)
            {
                $assigned_service_id = $edit_id;
                $check="DELETE FROM assigned_service_documents WHERE assigned_service_id = '$assigned_service_id' ";
                $result=$this->conn->query($check);
            }
            else
            {
                $assigned_service_id = $this->conn->insert_id;
            }
            if(isset($document_id))
            {
                foreach ($document_id as $document_id_s)
                {
                    if($document_id_s != "")
                    {
                        $check="INSERT INTO assigned_service_documents (assigned_service_id, documentlist_id) VALUES('$assigned_service_id', '$document_id_s') ";
                        $result=$this->conn->query($check);
                    }
                }
            }
            echo "inserted";
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

