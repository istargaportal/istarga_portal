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
    extract($_POST);
    global $service_email_id;
    global $service_contact_no;
    global $company_name;
    global $web_url;
    global $client_login_url;
    global $applicant_login_url;
    
      $Client_Name=$_POST['Client_Name'];	
      $Client_Code=$_POST['Client_Code'];	 
      $Client_SPOC=$_POST['Client_SPOC'];
      $Zip_Code=$_POST['Zip_Code'];
      $Contact_Number=$_POST['Contact_Number'];
      $App_Response_Time=$_POST['Applicant_Response_Time'];
      $Inv_Address=$_POST['Invoice_Address_Details'];
      $Inv_Bank=$_POST['Invoice_Bank_Detail']; 
      $Inv_Due_Days=$_POST['Invoice_Payment_Due_Days'];
      $Inv_Code=$_POST['Invoice_Code'];
      $Is_GSTIN=$_POST['Is_GSTIN'];
      $Email=$_POST['Email_ID'];
      $dob=$_POST['dateofbirth'];
      $Is_Package=@$_POST['Is Package'];
      $Email_radio=@$_POST['Email_ID_radio']; 
      $Is_LOB_Mapping=@$_POST['Is_LOB_Mapping'];	 
      $Country=$_POST['locality-dropdown'];
      $State=$_POST['select_state'];
      $City=$_POST['select_city'];
      $currency=$_POST['currency'];
      $password = $_POST['Password'];
      $lob_master = @$_POST['lob_master'];
      $reference_name= $_POST['Client_Name'];
      $reference_number=$_POST['dateofbirth'];
      $reference_number2=rand(10060,99999);
      $randorm=rand(1000,9999);
      $reference_name=strtoupper(substr($reference_name,0,3));
      $reference_number=str_replace('-','',$reference_number);
      $reference_number=substr($reference_number,4);
      $random_string=$reference_name.$reference_number.$reference_number2.$randorm;

      if($Client_Name != "")
      {
        if($_POST['edit_id'] == "") { $check = "INSERT INTO `client`"; }
        if($_POST['edit_id'] != "") { $check = "UPDATE `client`"; }

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
        `lob_master`='".$lob_master."',
        `Currency`='".$currency."',
        `password`='".$password."' ";
        if($_POST['edit_id'] != "") { $check.= " WHERE id = ".$_POST['edit_id']; } 
        $result=$this->conn->query($check);
        if($result)
        {
          if($_POST['edit_id'] != "")
          {
            echo "updated";
          }
          if($_POST['edit_id'] == "")
          {
            echo "inserted";
            include '../../API/SMTP/sendMail.php';
            include '../../API/SMTP/CLIENT-LOGIN-EMAIL.php';
            $subject = "LOGIN CREDENTILAS FOR - Employment Background Screening";
            smtpmailer($Email, $from, $name, $subject, @$print_var);
          }
        }
        else
        {
          echo "error";
        }
      }
    
  }
}

$basic_details=new login($db);
$basic_details->update_details();

?>