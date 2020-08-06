<?php

require_once "../../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

class login
{
  public function __construct($db)
  {
    $this->conn=$db;
  }
  public function update_details()
  {
    $json_data = file_get_contents("php://input");
    if( !empty($json_data) )
    {
      $data = json_decode($json_data, true);
      $Client_Name=$data['Client Name'];	
      $Client_Code=$data['Client Code'];	 
      $Client_SPOC=$data['Client SPOC'];
      $Zip_Code=$data['Zip Code'];
      $Contact_Number=$data['Contact Number'];
      $App_Response_Time=$data['Applicant Response Time'];
      $Inv_Address=$data['Invoice Address Details'];
      $Inv_Bank=$data['Invoice Bank Detail']; 
      $Inv_Due_Days=$data['Invoice Payment Due Days'];
      $Inv_Code=$data['Invoice Code'];
      $Is_GSTIN=$data['Is GSTIN'];
      $Email=$data['Email ID'];
      $dob=$data['dateofbirth'];
      $Is_Package=@$data['Is Package'];
      $Email_radio=@$data['Email ID radio']; 
      $Is_LOB_Mapping=@$data['Is LOB Mapping'];	 
      $Country=$data['locality-dropdown'];
      $State=$data['select_state'];
      $City=$data['select_city'];
      $currency=$data['currency'];
      $password = $data['Password'];

      $reference_name= $data['Client Name'];
      $reference_number=$data['dateofbirth'];
      $reference_number2=rand(10060,99999);
      $randorm=rand(1000,9999);
      $reference_name=strtoupper(substr($reference_name,0,3));
      $reference_number=str_replace('-','',$reference_number);
      $reference_number=substr($reference_number,4);
      $random_string=$reference_name.$reference_number.$reference_number2.$randorm;

      if($Client_Name != "")
      {
        if($data['edit_id'] == "") { $check = "INSERT INTO `client`"; }
        if($data['edit_id'] != "") { $check = "UPDATE `client`"; }

        $check.= "SET `Client_Name`='".$Client_Name."',
        `Client_Code`='".$Client_Code."',
        `Client_SPOC`='".$Client_SPOC."',
        `Zip_Code`='".$Zip_Code."',
        `user_status`='1',
        `Contact_Number`='".$Contact_Number."',
        `App_Response_Time`='".$App_Response_Time."',
        `Inv_Address`='".$Inv_Address."',
        `Inv_Bank`='".$Inv_Bank."',
        `Inv_Due_Days`='".$Inv_Due_Days."',
        `Inv_Code`='".$Inv_Code."',
        `Is_GSTIN`='".$Is_GSTIN."',
        `email`='".$Email."',
        `DOB`='".$dob."',
        `Is_Package`='".$Is_Package."',
        `Email_ID`='".$Email_radio."',
        `Is_LOB_Mapping`='".$Is_LOB_Mapping."',
        `country`='".$Country."',
        `State`='".$State."',
        `city`='".$City."',
        `internal_reference_id`='".$random_string."',
        `Currency`='".$currency."',
        `password`='".$password."' ";
        if($data['edit_id'] != "") { $check.= " WHERE id = ".$data['edit_id']; } 
        $result=$this->conn->query($check);
        if($result)
        {
          if($data['edit_id'] != "")
          {
            echo "updated";
          }
          if($data['edit_id'] == "")
          {
            echo "inserted";
          }
        }
        else
        {
          echo "  error";
        }
      }
    }
    else 
    {
      echo "Empty JSON object, something's wrong!";
    }
  }
}

$basic_details=new login($db);
$basic_details->update_details();

?>