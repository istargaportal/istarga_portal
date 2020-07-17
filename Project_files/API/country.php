<?php

require_once "../config/config.php";

#---------------------<---Code Written and Designed By Priyanshu Raghuvanshi--->-----------------------#

$get_connection=new connectdb;
$db=$get_connection->connect();

class country
{

    public function __construct($db)
    {
        $this->conn=$db;
    }

    public function update_details()
    {
        $getdata=file_get_contents("php://input");
        $data=json_decode($getdata,true);
        
        $check='SELECT * FROM countries ORDER BY name ASC';
        $this->conn->query("SET CHARACTER SET utf8"); 
        $result=$this->conn->query($check);
        if($result->num_rows>0)
        {
            $i=0;
            while($row = $result->fetch_assoc())
            {
                $country[$i]['id']=$row['id'];
                $country[$i]['country_name']=$row['name'];
                $country[$i]['country_code']=$row['iso3'];
                $country[$i]['phonecode']=$row['phonecode'];
                $country[$i]['capital']=$row['capital'];
                $country[$i]['currency']=$row['currency'];
                $i++;
            }
            echo json_encode($country);
        }
        else {
            echo "0 results";
        }
    
    }
}
$basic_details=new country($db);
$basic_details->update_details();