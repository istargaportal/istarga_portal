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
        //$query1 = "SELECT name from macro_type where `id`='" . $ . "'";
        $queryew = 'SELECT * FROM standard_macro';
        $rer = $this->conn->query($queryew);
        $i = 0;
        while ($row = $rer->fetch_assoc()) {
            //$states[$i]['Scenario'] = $row['Scenario'];
            //$states[$i]['Comments'] = $row['Comments'];
            // $macro_type_id = $row['macro_id'];
            // $query1 = "SELECT name from macro_type where `id`='" . $macro_type_id . "'";
            // $rer1 = $this->conn->query($query1);
            // while ($row1 = $rer1->fetch_assoc()) {
            // }
            $service_type_id = $row['service_type_id'];
            $query2 = "SELECT name from service_type where `id`='" . $service_type_id . "'";
            $rer2 = $this->conn->query($query2);
            while ($row2 = $rer2->fetch_assoc()) {
                $states[$i]['service_name'] = $row2['name'];
            }
            $states[$i]['Scenario'] = $row['scenario'];
            $states[$i]['Comment'] = $row['comment'];
            $states[$i]['macro_name'] = $row['macro_type'];
            $states[$i]['id'] = $row['id'];
            
            $i++;
        }
        echo json_encode($states);
    }
}

$basic_details = new service($db);
$basic_details->add_Service();

?>
