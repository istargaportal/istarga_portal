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



    $check='SELECT * FROM documentlist';
   // echo 'SELECT * FROM service_list where service_type_id="'.$data['service_type_id'].'" ';
    $result=$this->conn->query($check);
    if($result->num_rows>0)
    {
        $i=0;
        while($row = $result->fetch_assoc())
        {
            $states[$i]['id']=$row['id'];
            $states[$i]['document_name']=$row['document_name'];
            
           
            $i++;
        }
        echo json_encode($states);
    
    
}
else
{
  
    $states['status']=0;
    $states['message']="no result found";
    
}
           
            

    }
}
            $basic_details=new States($db);
            $basic_details->get_document();