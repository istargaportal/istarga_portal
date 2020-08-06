<?php

require_once "../../config/config.php";

$get_connection = new connectdb;
$db = $get_connection->connect();

class States
{
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function get_document()
    {
        $getdata = file_get_contents("php://input");
        $data = json_decode($getdata, true);

        switch ($data['action']) {

            case "delete":
            $query = "DELETE FROM service_type WHERE id='" . $data['id'] . "'";
            $result = $this->conn->query($query);
            if ($result) {
                echo "deleted";
            } else {
                echo "error";
            }
            break;
            case "edit":
            $value = $data['value'];
            $check='SELECT name FROM service_type WHERE name = "'.$value.'" AND id != "' . $data['id'] . '" ';
            $result=$this->conn->query($check);
            if($result->num_rows>0)
            {
                if($row = $result->fetch_assoc())
                {
                    echo "already";
                }
            }
            else
            {
                $query = "UPDATE service_type SET name='" . $value . "' WHERE id='" . $data['id'] . "'";
                $result = $this->conn->query($query);
                if ($result) {
                    echo "updated";
                } else {
                    echo "error";
                }
            }
            break;
        }
    }
}
$basic_details = new States($db);
$basic_details->get_document();