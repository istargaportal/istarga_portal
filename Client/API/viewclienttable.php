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
    $jsondata=file_get_contents("php://input");
    $data=json_decode($jsondata,true);
    
    if(isset($data))
    {
        $query="SELECT * FROM `order` WHERE client_id='".$data['client_id']."'";
    $result=$this->conn->query($query);
    if($result->num_rows>0)
    {
       
        $i=0;
        while($row = $result->fetch_assoc())
        {
            $country[$i]['id']=$row['id'];
            $country[$i]['first_Name']=$row['first_Name'];
            $country[$i]['middle_Name']=$row['middle_Name'];
            $country[$i]['last_Name']=$row['last_Name'];
            $country[$i]['alias_first_name']=$row['alias_first_name'];
            $country[$i]['alias_middle_name']=$row['alias_middle_name'];
            $country[$i]['alias_last_name']=$row['alias_last_name'];
            $country[$i]['email_id']=$row['email_id'];
            $country[$i]['internal_reference_id']=$row['internal_reference_id'];
            $country[$i]['joining_location']=$row['joining_location'];
            $country[$i]['Joining_date']=$row['Joining_date'];
            $country[$i]['LOB']=$row['LOB'];
            $country[$i]['Additional_Comment']=$row['Additional_Comment'];
            $country[$i]['package_country_id']=$row['package_country_id'];
            $country[$i]['Package_id']=$row['Package_id'];
            $country[$i]['service_country_id']=$row['service_country_id'];
            $country[$i]['Service_type_id']=$row['Service_type_id'];
            $country[$i]['service_id']=$row['service_id'];
            $country[$i]['Source_name']=$row['Source_name'];
            $country[$i]['no_of_documents_uploaded']=$row['no_of_documents_uploaded'];
            $country[$i]['Order_Completion_Date']=$row['Order_Completion_Date'];
            $country[$i]['Order_Status']=$row['Order_Status'];
            $country[$i]['Reports']=$row['Reports'];
            $country[$i]['generated_reference_id']=$row['generated_reference_id'];
            $country[$i]['client_id']=$row['client_id'];
            $name="SELECT Client_Name FROM client where id='".$row['client_id']."'";
            $getname=$this->conn->query($name);
            $nameresult=$getname->fetch_assoc();
            $country[$i]['client_name']=$nameresult['Client_Name'];
            $country[$i]['is_rush']=$row['is_rush'];
            $country[$i]['contactable_person']=$row['contactable_person'];
            $country[$i]['order_creation_date_time']=$row['order_creation_date_time'];
            $i++;
        }
        echo json_encode($country);
    }
    else {
        $country['Status']="0";
        $country['message']="No result found";
        echo json_encode($country);
    }
    }
    else
    {
        $query="SELECT * FROM `order`";
    $result=$this->conn->query($query);
    if($result->num_rows>0)
    {
       
        $i=0;
        while($row = $result->fetch_assoc())
        {
            $country[$i]['id']=$row['id'];
            $country[$i]['first_Name']=$row['first_Name'];
            $country[$i]['middle_Name']=$row['middle_Name'];
            $country[$i]['last_Name']=$row['last_Name'];
            $country[$i]['alias_first_name']=$row['alias_first_name'];
            $country[$i]['alias_middle_name']=$row['alias_middle_name'];
            $country[$i]['alias_last_name']=$row['alias_last_name'];
            $country[$i]['email_id']=$row['email_id'];
            $country[$i]['internal_reference_id']=$row['internal_reference_id'];
            $country[$i]['joining_location']=$row['joining_location'];
            $country[$i]['Joining_date']=$row['Joining_date'];
            $country[$i]['LOB']=$row['LOB'];
            $country[$i]['Additional_Comment']=$row['Additional_Comment'];
            $country[$i]['package_country_id']=$row['package_country_id'];
            $country[$i]['Package_id']=$row['Package_id'];
            $country[$i]['service_country_id']=$row['service_country_id'];
            $country[$i]['Service_type_id']=$row['Service_type_id'];
            $country[$i]['service_id']=$row['service_id'];
            $country[$i]['Source_name']=$row['Source_name'];
            $country[$i]['no_of_documents_uploaded']=$row['no_of_documents_uploaded'];
            $country[$i]['Order_Completion_Date']=$row['Order_Completion_Date'];
            $country[$i]['Order_Status']=$row['Order_Status'];
            $country[$i]['Reports']=$row['Reports'];
            $country[$i]['generated_reference_id']=$row['generated_reference_id'];
            $country[$i]['client_id']=$row['client_id'];
            $name="SELECT Client_Name FROM client where id='".$row['client_id']."'";
            $getname=$this->conn->query($name);
            $nameresult=$getname->fetch_assoc();
            $country[$i]['client_name']=$nameresult['Client_Name'];
            $country[$i]['is_rush']=$row['is_rush'];
            $country[$i]['contactable_person']=$row['contactable_person'];
            $country[$i]['order_creation_date_time']=$row['order_creation_date_time'];
            $i++;
        }
        echo json_encode($country);
    }
    else {
        $country['Status']="0";
        $country['message']="No result found";
        echo json_encode($country);
    }
    }
    
    



           
            

    }
}
            $basic_details=new States($db);
            $basic_details->get_package();