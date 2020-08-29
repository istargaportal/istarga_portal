<?php
require_once "../../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

if (mysqli_connect_errno($db)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

extract($_POST);

if($_POST['action'] == 'load_attached_documents')
{
    $document_print ='<div class="row"><div class="col-md-6"><h6>Documents List</h6>';
    $check_1='SELECT d.document_name FROM order_master_documents ad INNER JOIN documentlist d ON d.id= ad.documentlist_id WHERE ad.order_id = '.$order_id.'  ';
    $resul_1 = mysqli_query($db,$check_1);
    while ($row_1 = mysqli_fetch_array($resul_1, MYSQLI_ASSOC))
    {
    $document_print.='<h4 class="selection" style="margin:6px 0;"><i class="fa fa-file"></i> '.$row_1['document_name'].'</h4><hr class="col12" style="margin:4px 0">';
    }
    $document_print.='</div><div class="col-md-6"><h6>Uploaded Documents</h6>';
    $check_1='SELECT ad.file_name, ad.document_file FROM order_master_uploded_documents ad WHERE ad.order_id = '.$order_id.'  ';
    $resul_1 = mysqli_query($db,$check_1);
    while ($row_1 = mysqli_fetch_array($resul_1, MYSQLI_ASSOC))
    {
    $document_print.= "<a target='_blank' href='../system-client/assets/order_master_documents/".$row_1['document_file']."' class='btn btn-primary btn-xs'><i class='fa fa-download'></i> ".$row_1['file_name']."</a>";
    }
    echo $document_print.='</div></div>';
}

if($_POST['action'] == 'update_applicant_details')
{
    $cmd = "UPDATE order_master SET first_name = '$first_name', middle_name = '$middle_name', last_name = '$last_name', alias_first_name = '$alias_first_name', alias_middle_name = '$alias_middle_name', alias_last_name = '$alias_last_name' WHERE order_id = '$order_id' ";
    $result = mysqli_query($db,$cmd);
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
                    $check = "UPDATE order_master_details SET service_field_value = '$service_field_value' WHERE order_details_id = ".$row_1['order_details_id']." ";
                    $result = mysqli_query($db,$check);
                }
            }
        }

        $check_1 = "SELECT order_status, order_service_details_id FROM order_service_details WHERE order_id = '".$order_id."' ";
        $resul_1 = mysqli_query($db,$check_1); 
        while ($row_1 = mysqli_fetch_array($resul_1, MYSQLI_ASSOC))
        {
            if($row_1['order_status'] == 'Insufficiency')
            {
                $check = "UPDATE order_service_details SET insufficiency_status = 0, order_status = 'Sent To OF' WHERE order_id  = '$order_id' AND order_service_details_id = '".$row_1['order_service_details_id']."' ";
                $result = mysqli_query($db,$check);
            }
        }

        $check = "UPDATE order_master SET order_status = 'In Progress' WHERE order_id  = '$order_id' ";
        $result = mysqli_query($db,$check);
        echo 'updated';
    }
    else
    {
        echo 'error';
    }
}

?>