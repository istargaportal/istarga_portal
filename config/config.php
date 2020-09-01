<?php

class connectdb
{
  private $excel_pass = "bvg-orion";
  private $servername='localhost';
  
  // private $user='pesrsxttfd';
  // private $password='Demo@123';
  
  private $user='root';
  private $password='';
  
  private $dbname='pesrsxttfd';
  private $conn;
  
  public function connect()
  {
    $this->conn=null;
    $this->conn=new mysqli($this->servername,$this->user,$this->password,$this->dbname);
    
    if($this->conn->connect_error)
    {
      die("Connection Failed:" .$this->conn->connect_error);
    }
    else
    {
          //  echo "Connection Successfull";
    }
    return $this->conn;    
  }
}

function randomPassword() {
    $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 6; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

$service_email_id = "customercare@istarga.com";
$service_contact_no = "+918527476969";

$company_name = 'ISTARGA';
$web_url = "https://" . $_SERVER['SERVER_NAME'];
$client_login_url = $web_url."/system-client/";
$applicant_login_url = $web_url."/system-applicant/";

?>