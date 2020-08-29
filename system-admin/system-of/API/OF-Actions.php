<?php
require_once "../../../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

if (mysqli_connect_errno($db)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

extract($_POST);

if($_POST['action'] == 'update_applicant_details')
{
    session_start();
    $of_user_id = $_SESSION['user_id'];

    $verifier_details = addslashes($verifier_details);
    $verifier_comments = addslashes($verifier_comments);
    $cmd = "UPDATE order_service_details SET verifier_details = '$verifier_details', verifier_comments = '$verifier_comments', currency_id = '$currency_id', additional_fees = '$additional_fees', of_closure_date = '$of_closure_date', additional_comments_of = '$additional_comments_of', of_insufficiency_status = 'Sent To QC', order_status = 'Sent To QC', of_user_id = '$of_user_id' WHERE order_service_details_id = '$order_service_details_id' ";
    $result = mysqli_query($db,$cmd);
    $result = 1;
    if($result > 0)
    {
        $check_1 = "SELECT od.order_details_id, sm.service_field, sm.service_field_text, sm.data_type, sm.is_required, od.service_field_value, od.service_id FROM order_master_details od INNER JOIN service_field_master sm ON sm.service_field_id = od.service_field_id WHERE od.order_id = '".$order_id."' ";
        $resul_1 = mysqli_query($db,$check_1); 
        while ($row_1 = mysqli_fetch_array($resul_1, MYSQLI_ASSOC))
        {
            $update_var = $row_1['service_field'].'_'.$row_1['order_details_id'];
            if(isset($$update_var))
            {
                $service_field_value = $$update_var;
                if($service_field_value != "")
                {
                    $service_field_value = addslashes($service_field_value);
                    if($row_1['data_type'] == "date")
                    {
                        $service_field_value = str_replace('/', '-', $service_field_value);
                    }
                    $check = "UPDATE order_master_details SET service_field_value_verified = '$service_field_value' WHERE order_details_id = ".$row_1['order_details_id']." ";
                    $result = mysqli_query($db,$check);
                }
            }
        }
        
        $check = "UPDATE order_master SET order_status = 'In Progress', complete_info_received_date = '".date("Y-m-d H:i:s")."' WHERE order_id  = '$order_id' ";
        $result = mysqli_query($db,$check);
        echo 'updated';
    }
    else
    {
        echo 'error';
    }
}

?>