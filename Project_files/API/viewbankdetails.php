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

        $check='SELECT * FROM client WHERE id="'.$_GET['id'].'" ';
        // and Internal_Reference_ID="'.$_GET['internal_reference_id'].'"
        $result=$this->conn->query($check);
        $row=$result->fetch_assoc();
        if($result->num_rows==1)
        {
            $chec='SELECT * FROM bank_details WHERE client_id="'.$row['id'].'"';
            $res=$this->conn->query($chec);
            $i=0;
            while($wer=$res->fetch_assoc())
            {
                $bank[$i]['id']=$wer['id'];
                $bank[$i]['bank_name']=$wer['bank_name'];
                $bank[$i]['account_number']=$wer['account_number'];
                $bank[$i]['ifsc_code']=$wer['ifsc_code'];
                $bank[$i]['address_line_1']=$wer['address_line_1'];
                $bank[$i]['address_line_2']=$wer['address_line_2'];
                $bank[$i]['favour_of']=$wer['favour_of'];
                $bank[$i]['swift_code']=$wer['swift_code'];
                $bank[$i]['routing_code']=$wer['routing_code'];
                $bank[$i]['client_id']=$wer['client_id'];
                $i++;
            }
            echo json_encode($bank);
        }
        else {
            echo "0 results";
        }
    }
}
$basic_details=new country($db);
$basic_details->update_details();