<?php

require_once "../config/config.php";

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
                $query = "DELETE FROM documentlist WHERE id='" . $data['id'] . "'";
                $result = $this->conn->query($query);
                if ($result) {
                    echo "Deleted Successfully";
                } else {
                    echo "Could not delete";
                }
                break;
            case "edit":
                $value = $data['value'];
                $name = mysqli_real_escape_string($this->conn, $value);
                $query = "UPDATE documentlist SET document_name='" . $name . "' WHERE id='" . $data['id'] . "'";
                $result = $this->conn->query($query);
                if ($result) {
                    echo "Edit Successfully";
                } else {
                    echo "Could not Change Status";
                }
                break;
        }
    }
}
$basic_details = new States($db);
$basic_details->get_document();
