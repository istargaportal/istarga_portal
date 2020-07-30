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

        $query1 = 'SELECT * FROM employee_qc ORDER BY id DESC';
        $query2 =  'SELECT * FROM employee_of ORDER BY id DESC';
        $query3 =  'SELECT * FROM employee_vendor ORDER BY id DESC';
        $res1 = $this->conn->query($query1);
        $res2 = $this->conn->query($query2);
        $res3 = $this->conn->query($query3);
        $i = 0;
        while ($row1 = $res1->fetch_assoc()) {
            $states[$i]['first_name'] = $row1['first_name'];
            $states[$i]['last_name'] = $row1['last_name'];
            $states[$i]['email'] = $row1['email_id'];
            $states[$i]['group'] = "QC";
            $states[$i]['id'] = $row1['id'];
            $i++;
        }
        while ($row2 = $res2->fetch_assoc()) {
            $states[$i]['first_name'] = $row2['first_name'];
            $states[$i]['last_name'] = $row2['last_name'];
            $states[$i]['email'] = $row2['email_id'];
            $states[$i]['group'] = "OF";
            $states[$i]['id'] = $row2['id'];
            $i++;
        }
        while ($row3 = $res3->fetch_assoc()) {
            $states[$i]['first_name'] = $row3['first_name'];
            $states[$i]['last_name'] = $row3['last_name'];
            $states[$i]['email'] = $row3['email_id'];
            $states[$i]['group'] = "Vendor";
            $states[$i]['id'] = $row3['id'];
            $i++;
        }

        echo json_encode($states);
    }
}

$basic_details = new service($db);
$basic_details->add_Service();

?>
