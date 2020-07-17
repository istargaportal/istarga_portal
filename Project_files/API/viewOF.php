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
    
        $checbk='SELECT * FROM employee_of ORDER BY Id DESC';
            $result1=$this->conn->query($checbk);
            if($result1->num_rows>0)
            {
                $i=0;
               while($reed=$result1->fetch_assoc())
               {
                $country[$i]['Id']=$reed['id'];
                $country[$i]['Company']=$reed['Company'];
                $country[$i]['first_name']=$reed['first_name'];
                $country[$i]['middle_name']=$reed['middle_name'];
                $country[$i]['last_name']=$reed['last_name'];
                $country[$i]['fullname']=$reed['fullname'];
                $country[$i]['email_id']=$reed['email_id'];
                $country[$i]['Address']=$reed['Address'];
                $country[$i]['city']=$reed['city'];
                $country[$i]['country']=$reed['country'];
                $country[$i]['postal_code']=$reed['postal_code'];
                $country[$i]['mobile_number']=$reed['mobile_number'];
                $country[$i]['password']=$reed['password'];
                $country[$i]['otp']=$reed['otp'];
                $country[$i]['user_status']=$reed['user_status'];
                $country[$i]['about_me']=$reed['about_me'];
                $i++;
               }    
              
            }
            else
            {
                $country['Status']="0";
                $country['Message']="No Data Found";
            }

            echo json_encode($country);
 
    }
}
            $basic_details=new country($db);
            $basic_details->update_details();