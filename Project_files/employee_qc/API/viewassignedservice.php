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
 
            $check='SELECT * FROM `assigned_service` ORDER BY Id DESC';
            $result=$this->conn->query($check);
            if($result->num_rows>0)
            {
                $i=0;
                while($row = $result->fetch_assoc())
                {
                    $country[$i]['id']=$row['id'];
                    $country[$i]['client_id']=$row['client_id'];
                    $dfa='SELECT * FROM client WHERE id="'.$row['client_id'].'"';
                    $dfsa=$this->conn->query($dfa);
                    $eeewa=$dfsa->fetch_assoc();
                    $country[$i]['country_id']=$row['country_id'];
                    $dfb='SELECT * FROM countries WHERE id="'.$row['country_id'].'"';
                    $dfsb=$this->conn->query($dfb);
                    $eeewb=$dfsb->fetch_assoc();
                    $country[$i]['Service_type_id']=$row['service_type_id'];
                    $dfc='SELECT * FROM service_type WHERE id="'.$row['service_type_id'].'"';
                    $dfsc=$this->conn->query($dfc);
                    $eeewc=$dfsc->fetch_assoc();
                    $country[$i]['service_id']=$row['service_id'];
                    $dfd='SELECT * FROM `service_list` WHERE id="'.$row['service_id'].'"';
                    $dfsd=$this->conn->query($dfd);
                    $eeewd=$dfsd->fetch_assoc();
                    $country[$i]['Service_type_name']=$eeewc['name'];
                    $country[$i]['service_name']=$eeewd['name'];
                    $country[$i]['client_name']=$eeewa['Client_Name'];
                    $country[$i]['country_name']=$eeewb['name'];
                    $country[$i]['price']=$row['price'];
                    $country[$i]['SLA']=$row['SLA'];  
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