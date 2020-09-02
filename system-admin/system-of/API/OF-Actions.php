<?php
require_once "../../../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

session_start();
$user_id = $_SESSION['user_id'];

if (mysqli_connect_errno($db)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

extract($_POST);

if($_POST['action'] == 'update_applicant_details')
{
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

if($_POST['action'] == 'additional_comments_of')
{
    $check = "UPDATE order_service_details SET additional_comments_verifier = '$additional_comments_of', order_status = '$order_status' WHERE order_service_details_id = '$order_service_details_id' ";
    $result = mysqli_query($db,$check);
    $check = "INSERT INTO order_notes_master (order_service_details_id, order_id, note_type, note_description, user_id) VALUES('$order_service_details_id', '$order_id', 'of_comments', '$additional_comments_of', '$user_id') ";
    $result = mysqli_query($db,$check);
}

if($_POST['action'] == 'delete_note')
{
    $check = "DELETE FROM order_notes_master WHERE order_notes_id = '$order_notes_id' ";
    $result = mysqli_query($db,$check);
    echo '<script>alert("Note Deleted!")</script>';
}

if($_POST['action'] == 'delete_annexure_document')
{
    $check_1 = "SELECT document_file FROM order_annexure_documents WHERE order_annexure_document_id = '$order_annexure_document_id' ";
    $resul_1 = mysqli_query($db,$check_1); 
    if ($row_1 = mysqli_fetch_array($resul_1, MYSQLI_ASSOC))
    {
        unlink('../../order_master_annexure/'.$row_1['document_file']);
    }
    $check = "DELETE FROM order_annexure_documents WHERE order_annexure_document_id = '$order_annexure_document_id' ";
    $result = mysqli_query($db,$check);
    echo '<script>alert("Annexure Deleted!")</script>';
}

if($_POST['action'] == 'delete_client_document')
{
    $check_1 = "SELECT document_file FROM order_master_uploded_documents WHERE order_master_uploaded_document_id = '$order_master_uploaded_document_id' ";
    $resul_1 = mysqli_query($db,$check_1); 
    if ($row_1 = mysqli_fetch_array($resul_1, MYSQLI_ASSOC))
    {
        unlink('../../system-client/assets/order_master_documents/'.$row_1['document_file']);
    }
    $check = "DELETE FROM order_master_uploded_documents WHERE order_master_uploaded_document_id = '$order_master_uploaded_document_id' ";
    $result = mysqli_query($db,$check);
    echo '<script>alert("Client Document Deleted!")</script>';
}

if($_POST['action'] == 'view_all_annexure')
{
    ?>
    <div class="modal" style="display:block">
        <div class="row">
            <div class="col-md-3"><p></p></div>
            <div class="col-md-6">
                <div class="modal-content">
                    <h5 style="border-bottom: solid 1px #000;"><b><i class="fa fa-file"></i> View Annexure</b>
                        <a onclick='$("#print_result").html("")' class="btn btn-danger btn-sm pull-right"><i class="fa fa-remove" aria-hidden="true"></i> Close</a>
                    </h5>
                    <div class="row">
                        <?php
                            $check_1="SELECT ad.file_name, ad.order_annexure_document_id, ad.file_name, ad.document_file, ad.user_id FROM order_annexure_documents ad WHERE ad.order_id = '$order_id' AND ad.order_service_details_id = '$order_service_details_id' ";
                            $resul_1 = mysqli_query($db,$check_1);
                            while ($row_1 = mysqli_fetch_array($resul_1, MYSQLI_ASSOC))
                            {
                                echo '<div class="col-md-3" style="margin:2%;text-align:center;"><a href="../order_master_annexure/'.$row_1['document_file'].'" target="_blank"><img style="width:120px;height:170px;border:solid 1px #000;" src="../order_master_annexure/'.$row_1['document_file'].'"/><br><label style="width:100%; word-wrap: break-word;">'.$row_1['file_name'].'</label> </a></div>'; 
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}

?>