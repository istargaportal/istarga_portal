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

   public function get_document()
   {

    $getdata=file_get_contents("php://input");
    $data=json_decode($getdata,true);
      
    switch($data['action'])
    {
      
      case "delete":
         $query="DELETE FROM `bank_details` WHERE id='".$data['Id']."'";
         $result=$this->conn->query($query);
         if($result)
         {
            echo "Deleted Successfully";
         }
         else
         {
            echo "Could not delete";
         }
      break;
        
    }

      
            

    }
}
            $basic_details=new States($db);
            $basic_details->get_document();