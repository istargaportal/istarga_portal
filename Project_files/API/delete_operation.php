<?php

require_once "../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

class assignService
{
    public function __construct($db)
    {
        $this->conn=$db;
    }

    public function delete_operation()
    {
        extract($_POST);
        if($load_condition == "assigned_service")
        {
            $check='DELETE FROM assigned_service WHERE id = '.$assigned_service_id.' ';
            $result=$this->conn->query($check);
            if($result) { echo "success"; } else { echo "error"; }
        }
    }
}
$basic_details=new assignService($db);
$basic_details->delete_operation();

?>