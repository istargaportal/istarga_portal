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
    echo '
    <table class="bordered_table" style="width:100%">
        <tr>
            <th>File</th>
            <th class="form_center">Download / Upload</th>
            <th class="form_center">Action</th>
        </tr>
    ';
    $check_1='SELECT d.document_name, ad.document_file, ad.order_master_document_id FROM order_master_documents ad INNER JOIN documentlist d ON d.id= ad.documentlist_id WHERE ad.order_id = '.$_POST['order_id'].' ';
    $resul_1 = mysqli_query($db,$check_1);
    while ($row_1 = mysqli_fetch_array($resul_1, MYSQLI_ASSOC))
    {
        if($row_1['document_file'] != "")
        {
            $document_file = "<a target='_blank' href='../../system-client/assets/order_master_documents/".$row_1['document_file']."' class='btn btn-primary btn-xs'><i class='fa fa-download'></i> Download</a>";
            $document_select = ' ';
        }
        else
        {
            $document_select = "<a id='btn_upload_".$row_1["order_master_document_id"]."' onclick='upload_document_file(".$row_1["order_master_document_id"].")' class='btn btn-success btn-xs'><i class='fa fa-upload'></i> Upload</a>";
            $document_file = "<input type='file' id='document_file_".$row_1["order_master_document_id"]."' class='form-control' />";
        }
        echo '
        <tr>
            <td class="form_left">
                <b class="selection ">'.$row_1['document_name'].'</b>
            </td>
            <td>
                '.@$document_file.'
            </td>
            <td>
                '.$document_select.'
            </td>
        </tr>';
    }
    echo '</table>';
}

if($_POST['action'] == 'update_applicant_details')
{
    $address = addslashes($address);
    $cmd = "UPDATE order_master SET first_name = '$first_name', middle_name = '$middle_name', last_name = '$last_name', alias_first_name = '$alias_first_name', alias_middle_name = '$alias_middle_name', alias_last_name = '$alias_last_name', date_of_birth = '$date_of_birth', father_name = '$father_name', mother_maiden_name = '$mother_maiden_name', stay_duration_from = '$stay_duration_from', stay_duration_to = '$stay_duration_to', address = '$address', country_id = '$country_id', state_id = '$state_id', city_id = '$city_id', zipcode = '$zipcode' WHERE order_id = '$order_id' ";
    $result = mysqli_query($db,$cmd);
    if($result > 0)
    {
        $check = "UPDATE order_service_details SET insufficiency_status = 0, order_status = 0 WHERE order_id  = '$order_id ' ";
        $result = mysqli_query($db,$check);

        $check = "UPDATE order_master SET order_status = 0 WHERE order_id  = '$order_id ' ";
        $result = mysqli_query($db,$check);
        echo 'updated';
    }
    else
    {
        echo 'error';
    }
}

?>