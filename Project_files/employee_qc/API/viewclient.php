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
    $json=file_get_contents("php://input");
    $data=json_decode($json,true);

    if(isset($data['id']))
    {
        $checbk='SELECT * FROM client WHERE user_status="1" and Id="'.$data['id'].'" ORDER BY Id DESC';
            $result1=$this->conn->query($checbk);
            if($result1->num_rows>0)
            {
                $reed=$result1->fetch_assoc();
                $country['Id']=$reed['id'];
                    $country['Company']=$reed['Company'];
                    $country['User_name']=$reed['User_name'];
                    $country['first_name']=$reed['first_name'];
                    $country['Last_name']=$reed['Last_name'];
                    $country['Client_Name']=$reed['Client_Name'];
                    $country['Address']=$reed['Address'];
                    $country['postal_code']=$reed['postal_code'];
                    $country['about_me']=$reed['about_me'];
                    $country['password']=$reed['password'];
                    $country['Profile']=$reed['Profile'];
                    $country['Client_Code']=$reed['Client_Code'];
                    $country['Client_SPOC']=$reed['Client_SPOC'];
                    $country['country']=$reed['country'];
                    $country['State']=$reed['State'];
                    $country['city']=$reed['city'];
                    $country['Zip_Code']=$reed['Zip_Code'];
                    $country['email']=$reed['email'];
                    $country['App_Response_Time']=$reed['App_Response_Time'];
                    $country['Inv_Address']=$reed['Inv_Address'];
                    $country['Inv_Bank']=$reed['Inv_Bank'];
                    $country['Inv_Code']=$reed['Inv_Code'];
                    $country['Contact_Applicant']=$reed['Contact_Applicant'];
                    $country['Is_Bulk_Upload']=$reed['Is_Bulk_Upload'];
                    $country['DOB']=$reed['DOB'];
                    $country['Live_DateDate']=$reed['Live_DateDate'];
                    $country['Currency']=$reed['Currency'];
                    $country['Internal_Reference_ID']=$reed['Internal_Reference_ID'];
                    $country['Email_ID']=$reed['Email_ID'];
                    $country['user_status']=$reed['user_status'];
                    $country['is_block']=$reed['is_block'];
                    
            }
            else
            {
                echo "No client Found";
            }
    }
    else
    {
        $check='SELECT * FROM client WHERE user_status="1" ORDER BY Id DESC';
        $result=$this->conn->query($check);
        if($result->num_rows>0)
        {
            $i=0;
            while($row = $result->fetch_assoc())
            {
                $country[$i]['Id']=$row['id'];
                $country[$i]['Company']=$row['Company'];
                $country[$i]['User_name']=$row['User_name'];
                $country[$i]['first_name']=$row['first_name'];
                $country[$i]['Last_name']=$row['Last_name'];
                $country[$i]['Client_Name']=$row['Client_Name'];
                $country[$i]['Address']=$row['Address'];
                $country[$i]['postal_code']=$row['postal_code'];
                $country[$i]['about_me']=$row['about_me'];
                $country[$i]['password']=$row['password'];
                $country[$i]['Profile']=$row['Profile'];
                $country[$i]['Client_Code']=$row['Client_Code'];
                $country[$i]['Client_SPOC']=$row['Client_SPOC'];
                $country[$i]['country']=$row['country'];
                $country[$i]['State']=$row['State'];
                $country[$i]['city']=$row['city'];
                $country[$i]['Zip_Code']=$row['Zip_Code'];
                $country[$i]['email']=$row['email'];
                $country[$i]['App_Response_Time']=$row['App_Response_Time'];
                $country[$i]['Inv_Address']=$row['Inv_Address'];
                $country[$i]['Inv_Bank']=$row['Inv_Bank'];
                $country[$i]['Inv_Code']=$row['Inv_Code'];
                $country[$i]['Contact_Applicant']=$row['Contact_Applicant'];
                $country[$i]['Is_Bulk_Upload']=$row['Is_Bulk_Upload'];
                $country[$i]['DOB']=$row['DOB'];
                $country[$i]['Live_DateDate']=$row['Live_DateDate'];
                $country[$i]['Currency']=$row['Currency'];
                $country[$i]['Internal_Reference_ID']=$row['Internal_Reference_ID'];
                $country[$i]['Email_ID']=$row['Email_ID'];
                $country[$i]['user_status']=$row['user_status'];
                $country[$i]['is_block']=$row['is_block'];
                

                $i++;
            }
            echo json_encode($country);
        }
        else {
            echo "0 results";
        }
        
        
    }
 
            

    }
}
            $basic_details=new country($db);
            $basic_details->update_details();