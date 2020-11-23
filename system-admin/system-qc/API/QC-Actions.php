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
    $qc_user_id = $_SESSION['user_id'];

    if($of_qc_order_status == 'Canceled') { $order_status = 'Completed'; }
    if($of_qc_order_status == 'Discrepancy') { $order_status = 'Completed'; }
    if($of_qc_order_status == 'UTV') { $order_status = 'Completed'; }
    if($of_qc_order_status == 'Fresh') { $order_status = 'Fresh'; }
    if($of_qc_order_status == 'Inconclusive') { $order_status = 'Completed'; }
    if($of_qc_order_status == 'Insufficiency') { $order_status = 'Insufficiency'; }
    if($of_qc_order_status == 'Insufficiency Cleared') { $order_status = 'Insufficiency'; }
    if($of_qc_order_status == 'Insufficiency Verifier') { $order_status = 'In Progress'; }
    if($of_qc_order_status == 'Minor Discrepancy') { $order_status = 'Completed'; }
    if($of_qc_order_status == 'Park') { $order_status = 'Park'; }
    if($of_qc_order_status == 'Pending') { $order_status = 'In Progress'; }
    if($of_qc_order_status == 'Re-assigned') { $order_status = 'Re-Assigned'; }
    if($of_qc_order_status == 'Verifier Initiated ') { $order_status = 'In Progress'; }
    if($of_qc_order_status == 'Verifier Completed') { $order_status = 'In Progress'; }
    if($of_qc_order_status == 'Verified Clear') { $order_status = 'Completed'; }

    $verifier_details = addslashes($verifier_details);
    $verifier_comments = addslashes($verifier_comments);

    if($of_qc_order_status == "Discrepancy") { $default_report_color_id = "4"; }
    if($of_qc_order_status == "Minor Discrepancy") { $default_report_color_id = "1"; }
    if($of_qc_order_status == "Canceled") { $default_report_color_id = "6"; }
    if($of_qc_order_status == "Inconclusive") { $default_report_color_id = "8"; }
    if($of_qc_order_status == "UTV") { $default_report_color_id = "5"; }
    if($of_qc_order_status == "Verified Clear") { $default_report_color_id = "2"; }

    $check="SELECT client_id FROM order_master WHERE order_id = '".$order_id."'";
    $resul = mysqli_query($db,$check); 
    if ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
    {
        $client_id = $row['client_id'];
    }

    $check="SELECT default_report_color FROM client WHERE id = '$client_id' ";
    $resul = mysqli_query($db,$check); 
    if ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
    {
        $default_report_color = $row['default_report_color'];
    }

    if($default_report_color == 0)
    {
        $check="SELECT color_code FROM default_report_color WHERE default_report_color_id = '$default_report_color_id' ";
    }
    else
    {
        $check="SELECT color_code FROM client_default_report_color WHERE default_report_color_id = '$default_report_color_id' AND client_id = '$client_id' ";
    }
    $resul = mysqli_query($db,$check); 
    if ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
    {
        $color_code = $row['color_code'];
    }
    if($color_code == "Red"){ $color_code = "#eb1e2f"; }
    if($color_code == "Green"){ $color_code = "#25ce60"; }
    if($color_code == "Amber"){ $color_code = "#ffbf00"; }
    if($color_code == "Gray"){ $color_code = "#ccc"; }

    $cmd = "UPDATE order_service_details SET verifier_details = '$verifier_details', verifier_comments = '$verifier_comments', currency_id = '$currency_id', additional_fees = '$additional_fees', of_closure_date = '$of_closure_date', qc_user_id = '$qc_user_id', order_status = '$order_status', of_qc_order_status = '$of_qc_order_status', order_completion_date = '".date("Y-m-d H:i:s")."', default_report_color_id = '$default_report_color_id', color_code = '$color_code' WHERE order_service_details_id = '$order_service_details_id' ";
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
        
        $not_verified = 0;
        $check_1 = "SELECT order_status FROM order_service_details WHERE order_status != 'Completed' AND order_id = '$order_id' ";
        $resul_1 = mysqli_query($db,$check_1); 
        while ($row_1 = mysqli_fetch_array($resul_1, MYSQLI_ASSOC))
        {
            $not_verified++;
        }
        if($not_verified == 0)
        {
            $check = "UPDATE order_master SET order_status = 'Completed', default_report_color_id = '$default_report_color_id', order_completion_date = '".date("Y-m-d H:i:s")."' WHERE order_id  = '$order_id' ";
            $result = mysqli_query($db,$check);
        }

        $check = "SELECT first_name, username, password, email_id, insufficiency_contact, client_id, case_reference_no FROM order_master WHERE order_id = '$order_id' ";
        $resul = mysqli_query($db,$check);
        if($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
        {
            $first_name = $row['first_name'];
            $username = $row['username'];
            $password = $row['password'];
            $email_id = $row['email_id'];
            $insufficiency_contact = $row['insufficiency_contact'];
            $client_id = $row['client_id'];
            $case_reference_no = $row['case_reference_no'];
        }
        
        $check = "SELECT email FROM client WHERE id = '$client_id' ";
        $resul = mysqli_query($db,$check);
        if($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
        {
            $email_id = $row['email'];
        }
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $web_url."/API/Print-Background-Verification-Report.php?order_id=".$order_id."&attachement=true");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);
        
        include '../../../API/SMTP/sendMail.php';
        include '../../../API/SMTP/ORDER-COMPLETED.php';
        $subject = $company_name." : ORDER COMPLETED";
        $send_file = $case_reference_no.'.pdf'; 

        $to_mul = $cc = $bcc = array();
        $check = "SELECT email_id, email_type FROM client_email_config WHERE client_id = '$client_id' ";
        $resul = mysqli_query($db,$check);
        while($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
        {
            if($row['email_type'] == "TO"){ array_push($to_mul, $row['email_id']); }
            if($row['email_type'] == "CC"){ array_push($cc, $row['email_id']); }
            if($row['email_type'] == "BCC"){ array_push($bcc, $row['email_id']); }
        }
        $error = smtpmailer($email_id, $from, $name, $subject, @$print_var);
        if($error = "Message sent!")
        {
            unlink('../../../API/'.$send_file);
        }
        echo 'updated';
    }
    else
    {
        echo 'error';
    }
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