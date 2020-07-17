
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

        // Checks if it's empty or not
        if (!empty($json_data)) {

            // Decodes the JSON object to an Array
            $data = json_decode($json_data, true);
            $name1 = $data['document_name'];
            $name = mysqli_real_escape_string($this->conn, $name1);
            if ($name != "") {
                $check = "INSERT INTO documentlist(document_name) values('$name')";


                $result = $this->conn->query($check);
                if ($result) {
                    echo "sucess";
                } else {
                    echo "  error";
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
