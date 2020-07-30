<?php

require_once "../../config/config.php";

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
      case "soft delete":
         $query="UPDATE client SET user_status='".$data['user_status']."' WHERE id='".$data['Id']."'";
         $result=$this->conn->query($query);
         if($result)
         {
            echo "Status Changed Successfully";
         }
         else
         {
            echo "Could not Change Status";
         }
      break;
      case "delete":
         $query="DELETE FROM client WHERE id='".$data['Id']."'";
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
      case "block":
            $query="UPDATE client SET is_block='".$data['block']."' WHERE id='".$data['Id']."'";
            $result=$this->conn->query($query);
            if($result)
            {
               $que="SELECT is_block FROM client WHERE id='".$data['Id']."'";
               $res=$this->conn->query($que);
               $rowblock = $res->fetch_assoc();
                if($rowblock['is_block']=="1")
                {
                   echo "Blocked Successfully";
                }
                else
                {
                   echo "Unblocked Successfully";
                }
               
            }
            else
            {
               echo "Error Occured While blocking";
            }
      break;         
    }

      
            

    }
}
            $basic_details=new States($db);
            $basic_details->get_document();