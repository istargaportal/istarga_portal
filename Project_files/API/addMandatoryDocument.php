<?php

require_once "../config/config.php";


$get_connection = new connectdb;
$db = $get_connection->connect();

class service
{
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function add_Service()
    {

        $json_data = file_get_contents("php://input");

        if (!empty($json_data))
        {
            $data = json_decode($json_data, true);
            $name1 = $data['document_name'];
            $name = mysqli_real_escape_string($this->conn, $name1);
            if ($name != "")
            {
                $check='SELECT document_name FROM documentlist WHERE document_name = "'.$name.'" ';
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
                    $check = "INSERT INTO documentlist(document_name) values('$name')";
                    $result = $this->conn->query($check);
                    if ($result) {
                        echo "success";
                    } else {
                        echo "error";
                    }
                }
            }
        } else {
            echo "Empty JSON object, something's wrong!";
        }
    }
}

$basic_details = new service($db);
$basic_details->add_Service();

?>