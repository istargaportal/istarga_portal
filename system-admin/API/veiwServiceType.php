<?php

require_once "../../config/config.php";

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
        $queryew = 'SELECT * FROM service_type';
        $rer = $this->conn->query($queryew);
        $i = 0;
        while ($row = $rer->fetch_assoc()) {
            $states[$i]['servicetype'] = $row['name'];
            $states[$i]['id'] = $row['id'];
            $states[$i]['default_id'] = $row['default_id'];
            $i++;
        }
        echo json_encode($states);
    }
}

$basic_details = new service($db);
$basic_details->add_Service();

?>