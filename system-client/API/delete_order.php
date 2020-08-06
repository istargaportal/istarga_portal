<?php

require_once "../../config/config.php";
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
        $query="DELETE FROM `order` WHERE id='".$_POST['id']."'";
        $result=$this->conn->query($query);
        if ($result === TRUE)
        {
            echo 'success';
        }
        else
        {
            echo 'error';
        }
    }
}
$basic_details=new States($db);
$basic_details->get_package();
