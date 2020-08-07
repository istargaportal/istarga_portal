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
    echo '<select style="margin-top: 2%;" class="browser-default chosen-select custom-select" id="package_id"><option value="">Select</option>';
    $check="SELECT p.id, p.package_name FROM package_list p WHERE p.id IN(SELECT package_id FROM assigned_package WHERE country_id = '$country_id_package' AND client_id = '$client_id') AND p.id NOT IN($all_package_id) ";
    $resul = mysqli_query($db,$check); 
    while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
    {
      echo '<option value="'.$row['id'].'">'.$row['package_name'].'<option>';
    }
    echo '</select>';
}

if($_POST['action']=='load_services')
{
    echo '<select style="margin-top: 2%;" class="browser-default chosen-select custom-select" id="service_id"><option value="">Select</option>';
    $check="SELECT s.id, s.service_name FROM service_list s WHERE s.service_type_id = '$service_type_id' AND s.id IN(SELECT service_id FROM assigned_service WHERE client_id = '$client_id' AND country_id = '$country_id_service') AND s.id NOT IN($all_service_id) ";
    $resul = mysqli_query($db,$check); 
    while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
    {
      echo '<option value="'.$row['id'].'">'.$row['service_name'].'<option>';
    }
    echo '</select>';
}

if($_POST['action']=='select_package')
{
    $sq="SELECT a.package_id, p.package_name FROM assigned_package a INNER JOIN package_list p ON p.id = a.package_id WHERE a.client_id = '$client_id' AND a.package_id = '$package_id' AND a.country_id = '$country_id_package' ";
    $resul = mysqli_query($db,$sq); 
    if($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
    {
        $package_id = $row['package_id'];
        $package_name = $row['package_name'];
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
    echo '<div id="'.$package_panel_id.$package_id.'"><br><div class="col-md-12" style="border:solid 2px #aa50ab; border-radius:10px; width:'.@$package_width.';position:relative;"><h4 class="btn btn-primary btn-sm btn-round" style="position:absolute;top:-20px; left:15px;">'.@$package_name.'</h4><br>';

    if(@$sub_action != "preview_package")
    {
        echo '<input type="hidden" name="package_id[]" class="package_id" value="'.$package_id.'" />';
    }

    echo '
    <div class="row">
        <div class="col-md-4">
            <h6 class="selection" style="margin:6px 0;">Service</h6>
        </div>
        <div class="col-md-2">
            <h6 class="selection" style="margin:6px 0;">Country</h6>
        </div>
        <div class="col-md-2 no_padding">
            <h6 class="selection" style="margin:6px 0;">Price / Currency</h6>
        </div>
        <div class="col-md-4">
            <h6 class="selection" style="margin:6px 0;">Documents</h6>
        </div>
        <hr class="col12" style="margin:8px 0">
    </div>
    ';
    $sq="SELECT ps.service_id, s.service_name, s.price, c.name AS country_name, cs.currency AS currency_name FROM package_list_service ps INNER JOIN service_list s ON s.id = ps.service_id INNER JOIN countries c ON c.id = s.country_id INNER JOIN countries cs ON cs.id = s.currency_id WHERE ps.package_id = '$package_id' ";
    $resul = mysqli_query($db,$sq); 
    while($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
    {
        $service_name = $row['service_name'];
        $price = $row['price'];
        $country_name = $row['country_name'];
        $currency_name = $row['currency_name'];

        if(@$sub_action != "preview_package")
        {
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
                <div class="col-md-2">
                    <h4 class="selection" style="margin:6px 0;">'.$country_name.'</h4>
                </div>
                <div class="col-md-2">
                    <h4 class="selection form_center" style="margin:6px 0;">'.$price.'.'.$currency_name.'</h4>
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
    echo '<div id="'.$service_panel_id.$service_id.'"><br><div class="col-md-12" style="border:solid 2px #aa50ab; border-radius:10px; width:'.@$service_width.';posiion:relative;">';
    if(@$sub_action != "preview_service")
    {
        echo '<input type="hidden" name="service_id[]" class="service_id service_id_doc" value="'.$service_id.'" />';
    }
    $sq="SELECT s.id AS service_id, s.service_name, s.price, c.name AS country_name, cs.currency AS currency_name FROM service_list s INNER JOIN countries c ON c.id = s.country_id INNER JOIN countries cs ON cs.id = s.currency_id WHERE s.id = '$service_id' ";
    $resul = mysqli_query($db,$sq); 
    while($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
    {
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
                <div class="col-md-4">
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
                <div class="col-md-1">
                    <a onclick="remove_selected_service('.$service_id.')" class="btn btn-danger btn_remove btn-xs btn-round"><i class="fa fa-remove"></i> Remove</a>
                </div>';
        }
        echo '</div>';        
    }
    echo '
    </div></div>';
}

if($_POST['action']=='load_document')
{
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
            echo '
            <div class="row">
                <div class="col-md-5">
                    <h4 class="selection" style="margin:6px 0;">'.$row_1["document_name"].'</h4>
                </div>
                <div class="col-md-5">
                    <input type="hidden" name="documentlist_id[]" value="'.$row_1["documentlist_id"].'" />
                    <input type="file" name="document_file[]" class="form-control" />
                </div>
                <hr class="col12" style="margin:8px 0">
            </div>
            ';
        }
    }
}

if($_POST['action'] == "save_form")
{
    $username = randomPassword();
    $password = randomPassword().rand(1111,9999);
    $sql = "INSERT INTO order_master (first_name, middle_name, last_name, alias_first_name, alias_middle_name, alias_last_name, email_id, internal_reference_id, joining_location, joining_date, additional_comments, client_id, is_rush, insufficiency_contact, username, password) VALUES('$first_name', '$middle_name', '$last_name', '$alias_first_name', '$alias_middle_name', '$alias_last_name', '$email_id', '$internal_reference_id', '$joining_location', '$joining_date', '$additional_comments', '$client_id', '$is_rush', '$insufficiency_contact', '$username', '$password') ";
    $result = mysqli_query($db,$sql);
    $order_id = $db->insert_id;

    if(isset($package_id))
    {
        foreach ($package_id as $package_id_1)
        {
            if($package_id_1 != "")
            {
                $sql = "INSERT INTO order_master_details (order_id, package_id) VALUES('$order_id', '$package_id_1') ";
                $result = mysqli_query($db,$sql);
            }
        }
    }
    
    if(isset($service_id))
    {
        foreach ($service_id as $service_id_1)
        {
            if($service_id_1 != "")
            {
                $sql = "INSERT INTO order_master_details (order_id, service_id) VALUES('$order_id', '$service_id_1') ";
                $result = mysqli_query($db,$sql);
            }
        }
    }
    
    if(isset($documentlist_id))
    {
        $i = 0;
        foreach ($documentlist_id as $documentlist_id_1)
        {
            $sql = "INSERT INTO order_master_documents (order_id, documentlist_id) VALUES('$order_id', '$documentlist_id_1') ";
            $result = mysqli_query($db,$sql);
            $order_master_document_id = $db->insert_id;
            if(isset($_FILES['document_file']))
            {
                $file_name = $_FILES['document_file']['name'][$i];
                $file_size = $_FILES['document_file']['size'][$i];
                $file_tmp = $_FILES['document_file']['tmp_name'][$i];
                $file_type = $_FILES['document_file']['type'][$i];
                $file_ext = end((explode('.', $file_name)));
                $file_name = "document_file_".$order_id."_".$order_master_document_id.".".$file_ext;

                if(empty($errors)==true)
                {
                    if(move_uploaded_file($file_tmp,"../assets/order_master_documents/".$file_name))
                    {
                        $sql = "UPDATE order_master_documents SET document_file = '$file_name' WHERE order_master_document_id  = '$order_master_document_id ' ";
                        $result = mysqli_query($db,$sql);
                    }
                }
            }
            $i++;
        }
    }
    echo "inserted";
}

?>