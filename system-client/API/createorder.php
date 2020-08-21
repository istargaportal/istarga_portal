<?php
error_reporting(0);
require_once "../../config/config.php";

session_start();
$client_id = $_SESSION['uid'];

$get_connection=new connectdb;
$db=$get_connection->connect();

if (mysqli_connect_errno($db)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

extract($_POST);
if($_POST['action']=='load_packages')
{
    echo '<select style="margin-top: 2%;" class="browser-default chosen-select custom-select" id="assign_package_id"><option value="">Select</option>';
    $check="SELECT ap.id, p.package_name FROM package_list p INNER JOIN assigned_package ap ON ap.package_id = p.id WHERE ap.country_id = '$country_id_package' AND ap.client_id = '$client_id' AND ap.id NOT IN($all_package_id) ";
    $resul = mysqli_query($db,$check); 
    while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
    {
      echo '<option value="'.$row['id'].'">'.$row['package_name'].'<option>';
    }
    echo '</select>';
}

if($_POST['action']=='load_services')
{
    echo '<select style="margin-top: 2%;" class="browser-default chosen-select custom-select" id="assign_service_id"><option value="">Select</option>';
    $check="SELECT sa.id, s.service_name FROM service_list s INNER JOIN assigned_service sa ON sa.service_id = s.id WHERE s.service_type_id = '$service_type_id' AND sa.client_id = '$client_id' AND sa.country_id = '$country_id_service' AND sa.id NOT IN($all_assign_service_id) AND s.id NOT IN($all_service_id) ";
    $resul = mysqli_query($db,$check); 
    while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
    {
      echo '<option value="'.$row['id'].'">'.$row['service_name'].'<option>';
    }
    echo '</select>';
}

if($_POST['action']=='select_package')
{
    $sq="SELECT a.id, a.package_id, p.package_name, c.name AS country_name, c.currency AS currency_name, a.price FROM assigned_package a INNER JOIN package_list p ON p.id = a.package_id INNER JOIN countries c ON c.id = p.country_id WHERE a.client_id = '$client_id' AND a.id = '$package_id' AND a.country_id = '$country_id_package' ";
    $resul = mysqli_query($db,$sq); 
    if($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
    {
        $assign_package_id = $row['id'];
        $package_id = $row['package_id'];
        $package_name = $row['package_name'];
        $price = $row['price'];
        $country_name = $row['country_name'];
        $currency_name = $row['currency_name'];
    }
    if(@$sub_action == "preview_package")
    {
        $package_panel_id = "preview_package_id_panel_";
        $package_width = "100%";
    }
    else
    {
        $package_panel_id = "package_id_panel_";
        $package_width = "97%";
    }
    echo '<div id="'.$package_panel_id.$package_id.'"><br><div class="col-md-12" style="border:solid 2px #aa50ab; border-radius:10px; width:'.@$package_width.';position:relative;"><h4 class="btn btn-primary btn-sm btn-round" style="position:absolute;top:-20px; left:15px;">'.@$package_name.'</h4><h4 class="btn btn-primary btn-sm btn-round" style="position:absolute;top:-20px; right:15px;">'.$price.'.'.$currency_name.'</h4> <br>';

    if(@$sub_action != "preview_package")
    {
        echo '<input type="hidden" name="assign_package_id[]" class="assign_package_id" value="'.$assign_package_id.'" />';
        echo '<input type="hidden" name="package_id[]" class="package_id" value="'.$package_id.'" />';
    }

    echo '
    <div class="row">
        <div class="col-md-4">
            <h6 class="selection" style="margin:6px 0;">Service</h6>
        </div>
        <div class="col-md-4">
            <h6 class="selection" style="margin:6px 0;">Country</h6>
        </div>
        <div class="col-md-4">
            <h6 class="selection" style="margin:6px 0;">Documents</h6>
        </div>
        <hr class="col12" style="margin:8px 0">
    </div>
    ';
    $sq="SELECT ps.service_id, s.service_name FROM package_list_service ps INNER JOIN service_list s ON s.id = ps.service_id WHERE ps.package_id = '$package_id' ";
    $resul = mysqli_query($db,$sq); 
    while($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
    {
        $service_name = $row['service_name'];
        
        if(@$sub_action != "preview_package")
        {
            echo '<input type="hidden" class="assign_service_id" value="'.$row['service_id'].'" />';
            echo '<input type="hidden" class="service_id_doc service_id" value="'.$row['service_id'].'" />';
        }
        $all_documents = "";
        $check_1='SELECT d.document_name FROM service_list_documents ad INNER JOIN documentlist d ON d.id= ad.documentlist_id WHERE ad.service_id = '.$row['service_id'].'  ';
        $resul_1 = mysqli_query($db,$check_1);
        while ($row_1 = mysqli_fetch_array($resul_1, MYSQLI_ASSOC))
        {
          $all_documents.="<a class='btn btn-default btn-small'>".$row_1['document_name']."</a>";
        }
        echo '
            <div class="row">
                <div class="col-md-4">
                    <h4 class="selection" style="margin-top:-2px;">'.$service_name.'</h4> 
                </div>
                <div class="col-md-4">
                    <h4 class="selection" style="margin:6px 0;">'.$country_name.'</h4>
                </div>
                <div class="col-md-4">
                    '.@$all_documents.'
                </div>
                <hr class="col12" style="margin:8px 0">
            </div>';        
    }
    if(@$sub_action == "preview_package")
    {
        echo '</div></div>';
    }
    else
    {
        echo '<a onclick="remove_selected_package('.$package_id.')" class="btn btn-danger btn_remove btn-xs btn-round"><i class="fa fa-remove"></i> Remove</a></div></div>';
    }
}

if($_POST['action']=='select_service')
{
    if(@$sub_action == "preview_service")
    {
        $service_panel_id = "service_id_panel_";
        $service_width = "100%";
    }
    else
    {
        $service_panel_id = "preview_service_id_panel_";
        $service_width = "97%";
    }
    echo '<div id="'.$service_panel_id.$assign_service_id.'"><br><div class="col-md-12" style="border:solid 2px #aa50ab; border-radius:10px; width:'.@$service_width.';posiion:relative;">';
    if(@$sub_action != "preview_service")
    {
        echo '<input type="hidden" name="assign_service_id[]" class="assign_service_id" value="'.$assign_service_id.'" />';
    }
    $sq="SELECT s.id AS service_id, s.service_name, sa.price, c.name AS country_name, c.currency AS currency_name FROM assigned_service sa INNER JOIN service_list s ON s.id= sa.service_id INNER JOIN countries c ON c.id = sa.country_id WHERE sa.id = '$assign_service_id' ";
    $resul = mysqli_query($db,$sq); 
    while($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
    {
        if(@$sub_action != "preview_service")
        {
            echo '<input type="hidden" name="service_id[]" class="service_id service_id_doc" value="'.$row['service_id'].'" />';
        }
        $service_name = $row['service_name'];
        $price = $row['price'];
        $country_name = $row['country_name'];
        $currency_name = $row['currency_name'];

        $all_documents = "";
        $check_1='SELECT d.document_name FROM service_list_documents ad INNER JOIN documentlist d ON d.id= ad.documentlist_id WHERE ad.service_id = '.$row['service_id'].'  ';
        $resul_1 = mysqli_query($db,$check_1);
        while ($row_1 = mysqli_fetch_array($resul_1, MYSQLI_ASSOC))
        {
          $all_documents.="<a class='btn btn-default btn-small'>".$row_1['document_name']."</a>";
        }
        echo '
            <div class="row">
                <div class="col-md-3">
                    <h4 class="selection" style="margin:6px 0;">'.@$service_name.'</h4>
                </div>
                <div class="col-md-2">
                    <h4 class="selection" style="margin:6px 0;">'.$country_name.'</h4>
                </div>
                <div class="col-md-2">
                    <h4 class="selection" style="margin:6px 0;">'.$price.'.'.$currency_name.'</h4>
                </div>
                <div class="col-md-3">
                    '.@$all_documents.'
                </div>';
        if(@$sub_action != "preview_service")
        {
            echo '
                <div class="col-md-2">
                    <a onclick="remove_selected_service('.$assign_service_id.')" class="btn btn-danger btn_remove btn-xs btn-round"><i class="fa fa-remove"></i> Remove</a>
                </div>';
        }
        echo '</div>';        
    }
    echo '
    </div></div>';
}

if($_POST['action']=='load_document')
{
    require_once '../../config/comman_js.php';
    echo '<div class="row">
            <div class="col-md-6">
                <h6 class="selection">Mandatory Documents</h6>
            ';
    $check_1='SELECT d.document_name, ad.documentlist_id FROM service_list_documents ad INNER JOIN documentlist d ON d.id= ad.documentlist_id WHERE ad.service_id IN ('.$all_service_id_doc.') GROUP BY d.id ';
    $resul_1 = mysqli_query($db,$check_1);
    while ($row_1 = mysqli_fetch_array($resul_1, MYSQLI_ASSOC))
    {
        if(@$sub_action == "preview_document")
        {
            echo '<a class="btn btn-default btn-xs">'.$row_1["document_name"].'</a>';
        }
        else
        {
            echo '<h4 class="selection" style="margin:6px 0;">'.$row_1["document_name"].'</h4>
                  <input type="hidden" name="documentlist_id[]" value="'.$row_1["documentlist_id"].'" /><hr class="col12" style="margin:4px 0">';
        }
    }

    echo '</div>';
    if(@$sub_action != "preview_document")
    {
        echo '
        <div class="col-md-6">
            <h6 class="selection">Upload Multiple Documents Here</h6>                                    
            <input type="file" onchange="file_selected_list()" name="document_file[]" multiple id="document_file" class="form-control" />
            <div id="selectedFiles"></div>
        </div>
        ';
    }
    echo '</div>';

}

if($_POST['action'] == "save_form")
{
    $username = randomPassword();
    $password = randomPassword().rand(1111,9999);

    $check_2 = "SELECT Inv_Code FROM Client WHERE id = '".$client_id."' ";
    $resul_2 = mysqli_query($db,$check_2); 
    if ($row_2 = mysqli_fetch_array($resul_2, MYSQLI_ASSOC))
    {
        $Inv_Code = $row_2['Inv_Code'];
    }
    $check_2 = "SELECT count(order_id) AS order_id_auto FROM order_master WHERE client_id = '".$client_id."' ";
    $resul_2 = mysqli_query($db,$check_2); 
    if ($row_2 = mysqli_fetch_array($resul_2, MYSQLI_ASSOC))
    {
        $order_id_auto = $row_2['order_id_auto'];
    }
    
    if($order_id_auto <= 9)
    {
        $order_id_auto = '00'.$order_id_auto;
    }
    else if($order_id_auto <= 99)
    {
        $order_id_auto = '0'.$order_id_auto;
    }
    $case_reference_no = $Inv_Code.date('dmY').$order_id_auto;
    
    $sql = "INSERT INTO order_master (case_reference_no, first_name, middle_name, last_name, alias_first_name, alias_middle_name, alias_last_name, email_id, internal_reference_id, joining_location, joining_date, additional_comments, client_id, is_rush, insufficiency_contact, username, password) VALUES('$case_reference_no', '$first_name', '$middle_name', '$last_name', '$alias_first_name', '$alias_middle_name', '$alias_last_name', '$email_id', '$internal_reference_id', '$joining_location', '$joining_date', '$additional_comments', '$client_id', '$is_rush', '$insufficiency_contact', '$username', '$password') ";
    $result = mysqli_query($db,$sql);
    $order_id = $db->insert_id;

    if(isset($package_id))
    {
        $i = 0;
        foreach ($package_id as $package_id_1)
        {
            if($package_id_1 != "")
            {
                $check_2 = "SELECT service_id FROM package_list_service WHERE package_id ='".$package_id_1."' ";
                $resul_2 = mysqli_query($db,$check_2); 
                while ($row_2 = mysqli_fetch_array($resul_2, MYSQLI_ASSOC))
                {
                    $service_id_1 = $row_2['service_id'];
                    $sql = "INSERT INTO order_service_details (order_id, service_id, package_id, assign_service_id, assign_package_id) VALUES('$order_id', '$service_id_1', '$package_id_1', '0', '".$assign_package_id[$i]."') ";
                    $result = mysqli_query($db,$sql);

                    $check_3 = "SELECT service_field_id FROM service_field_master WHERE service_id = '".$row_2['service_id']."' ";
                    $resul_3 = mysqli_query($db,$check_3); 
                    while ($row_3 = mysqli_fetch_array($resul_3, MYSQLI_ASSOC))
                    {
                        $sql_cmd = "INSERT INTO order_master_details (order_id, service_field_id, service_id) VALUES('$order_id', '".$row_3["service_field_id"]."', '".$row_2['service_id']."') ";
                        mysqli_query($db,$sql_cmd);
                    }
                }
            }
            $i++;
        }
    }
    
    if(isset($service_id))
    {
        $i = 0;
        foreach ($service_id as $service_id_1)
        {
            if($service_id_1 != "")
            {
                $check_3 = "SELECT service_field_id FROM service_field_master WHERE service_id = '".$service_id_1."' ";
                $resul_3 = mysqli_query($db,$check_3); 
                while ($row_3 = mysqli_fetch_array($resul_3, MYSQLI_ASSOC))
                {
                    $sql_cmd = "INSERT INTO order_master_details (order_id, service_field_id, service_id) VALUES('$order_id', '".$row_3["service_field_id"]."', '".$service_id_1."') ";
                    mysqli_query($db,$sql_cmd);
                }
                $sql = "INSERT INTO order_service_details (order_id, service_id, package_id, assign_service_id, assign_package_id) VALUES('$order_id', '$service_id_1', '0', '".$assign_service_id[$i]."', '0') ";
                $result = mysqli_query($db,$sql);
            }
            $i++;
        }
    }

    $all_services = "";

    $check_2="SELECT od.package_id, od.service_id FROM order_master_details od WHERE od.order_id   ='".$order_id."' ";
    $resul_2 = mysqli_query($db,$check_2); 
    while ($row_2 = mysqli_fetch_array($resul_2, MYSQLI_ASSOC))
    {
        $package_id = $row_2['package_id'];
        $service_id = $row_2['service_id'];
        if($package_id != "0")
        {
            $sq="SELECT ps.service_id, s.service_name, s.price, c.name AS country_name, cs.currency AS currency_name FROM package_list_service ps INNER JOIN service_list s ON s.id = ps.service_id INNER JOIN countries c ON c.id = s.country_id INNER JOIN countries cs ON cs.id = s.currency_id WHERE ps.package_id = '$package_id' ";
            $resul = mysqli_query($db,$sq); 
            while($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
            {
                $service_name = $row['service_name'];
                $all_services.="<h5 style='margin:4px 0;font-weight:bold;'>".$service_name."</h5>";
            }
        }
        
        if($service_id != "0")
        {
            $sq="SELECT s.id AS service_id, s.service_name, s.price, c.name AS country_name, cs.currency AS currency_name FROM service_list s INNER JOIN countries c ON c.id = s.country_id INNER JOIN countries cs ON cs.id = s.currency_id WHERE s.id = '$service_id' ";
            $resul = mysqli_query($db,$sq); 
            while($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
            {
                $service_name = $row['service_name'];
                $all_services.="<h5 style='margin:4px 0;font-weight:bold;'>".$service_name."</h5>";
            }
        }
    }
    
    if(isset($documentlist_id))
    {
        foreach ($documentlist_id as $documentlist_id_1)
        {
            $sql = "INSERT INTO order_master_documents (order_id, documentlist_id) VALUES('$order_id', '$documentlist_id_1') ";
            $result = mysqli_query($db,$sql);
        }
    }

    if(isset($_FILES['document_file']))
    {
        $i = 0;
        foreach ($_FILES['document_file'] as $document_file_s)
        {
            $file_name = $_FILES['document_file']['name'][$i];
            $file_name_old = $_FILES['document_file']['name'][$i];
            $file_size = $_FILES['document_file']['size'][$i];
            $file_tmp = $_FILES['document_file']['tmp_name'][$i];
            $file_type = $_FILES['document_file']['type'][$i];
            $file_ext = end((explode('.', $file_name)));
            $rand_var = rand(11111,99999);
            $file_name = "document_file_".$order_id."_".$rand_var."_".date('Y_m_d_H_i_s').".".$file_ext;

            if(empty($errors)==true)
            {
                if(move_uploaded_file($file_tmp,"../assets/order_master_documents/".$file_name))
                {
                    $sql = "INSERT INTO order_master_uploded_documents(order_id, file_name, file_size, file_type, file_ext, document_file, uploaded_by, user_id) VALUES('$order_id', '$file_name_old', '$file_size', '$file_type', '$file_ext', '$file_name', 'Client', '$client_id')  ";
                    $result = mysqli_query($db,$sql);
                }
            }
            $i++;
        }
    }

    include '../../API/SMTP/sendMail.php';
    include '../../API/SMTP/LOGIN-EMAIL.php';
    $subject = "LOGIN CREDENTILAS FOR - Employment Background Screening";
    smtpmailer($email_id, $from, $name, $subject, @$print_var);

    echo "inserted";
}

?>