<?php

require_once "../config/config.php";

#---------------------<---Code Written and Designed By Priyanshu Raghuvanshi--->-----------------------#

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

    $json_data=file_get_contents("php://input");
    $data=json_decode($json_data,true);
    if(isset($data))
    {
        
    $total="SELECT * FROM `order` WHERE client_id='".$data['client_id']."'";
    $totaltime="SELECT MAX(order_creation_date_time) FROM `order` WHERE client_id='".$data['client_id']."'";
    $rowtime=$this->conn->query($totaltime);
    $timecompleted=$rowtime->fetch_assoc();

    $pending="SELECT * FROM `order` Where (client_id='".$data['client_id']."') AND (Order_Status='0' OR Order_Status='1')";
    $pendingtime="SELECT MAX(order_creation_date_time) FROM `order` Where (client_id='".$data['client_id']."') and (Order_Status='0' or Order_Status='1')";
    $rowpendingtime=$this->conn->query($pendingtime);
    $timepending=$rowpendingtime->fetch_assoc();

    $completed="SELECT * FROM `order` Where Order_Status='2' and client_id='".$data['client_id']."'";
    $completedtime="SELECT MAX(order_creation_date_time) FROM `order` Where  client_id='".$data['client_id']."' and Order_Status='2'";
    $rowcompletedtime=$this->conn->query($completedtime);
    $timecomplete=$rowcompletedtime->fetch_assoc();
    $totalresult=$this->conn->query($total);
    $totalrows=$totalresult->num_rows;
    $pendingresult=$this->conn->query($pending);
    $pendingrows=$pendingresult->num_rows;
    $completedresult=$this->conn->query($completed);
    $completedrows=$completedresult->num_rows;

    $dashboard['totalcases']=$totalrows;
    $dashboard['totalcasestime']="Updated on ".$timecompleted["MAX(order_creation_date_time)"];
    $dashboard['pendingcases']=$pendingrows;
    $dashboard['pendingcasestime']="Updated on ".$timepending["MAX(order_creation_date_time)"];
    $dashboard['completedcases']=$completedrows;
    $dashboard['completedcasestime']="Updated on ".$timecomplete["MAX(order_creation_date_time)"];

  echo json_encode($dashboard);
    }
    else
    {
      echo "Client ID not found";
    }
                  

    }
}
            $basic_details=new States($db);
            $basic_details->get_package();