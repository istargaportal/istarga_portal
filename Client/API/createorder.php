<?php
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
    $sq="SELECT Currency, country FROM client WHERE id = '$client_id' ";
    $resul = mysqli_query($db,$sq); 
    if($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
    {
        $currency_id = $row['Currency'];
        $country_id = $row['country'];
    }

    echo '<select style="margin-top: 2%;" class="browser-default chosen-select custom-select" id="package_id"><option value="">Select</option>';
    $check="SELECT p.id, p.package_name FROM package_list p WHERE p.id IN(SELECT package_id FROM assigned_service_details WHERE assigned_service_id IN (SELECT id FROM assigned_service WHERE client_id = '$client_id')) AND p.id NOT IN($all_package_id) ";
    $resul = mysqli_query($db,$check); 
    while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
    {
      echo '<option value="'.$row['id'].'">'.$row['package_name'].'<option>';
    }
    echo '</select>';
}

if($_POST['action']=='load_services')
{
    $sq="SELECT Currency, country FROM client WHERE id = '$client_id' ";
    $resul = mysqli_query($db,$sq); 
    if($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
    {
        $currency_id = $row['Currency'];
        $country_id = $row['country'];
    }
    echo '<select style="margin-top: 2%;" class="browser-default chosen-select custom-select" id="service_id"><option value="">Select</option>';
    $check="SELECT s.id, s.service_name FROM service_list s WHERE s.id IN(SELECT service_id FROM assigned_service_details WHERE assigned_service_id IN (SELECT id FROM assigned_service WHERE client_id = '$client_id')) AND s.id NOT IN($all_service_id) ";
    $resul = mysqli_query($db,$check); 
    while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
    {
      echo '<option value="'.$row['id'].'">'.$row['service_name'].'<option>';
    }
    echo '</select>';
}

if($_POST['action']=='select_package')
{
    $sq="SELECT a.package_id, p.package_name FROM assigned_service a INNER JOIN package_list p ON p.id = a.package_id WHERE a.client_id = '$client_id' ";
    $resul = mysqli_query($db,$sq); 
    if($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
    {
        $package_id = $row['package_id'];
        $package_name = $row['package_name'];
    }
    echo '<div id="package_id_panel_'.$package_id.'"><br><div class="col-md-12" style="border:solid 2px #aa50ab; border-radius:10px; width:97%;position:relative;"><h4 class="btn btn-primary btn-sm btn-round" style="position:absolute;top:-20px; left:15px;">'.@$package_name.'</h4> <input type="hidden" name="package_id[]" class="package_id" value="'.$package_id.'" /><br>';
    $sq="SELECT ps.service_id, s.service_name, s.price, c.name AS country_name, cs.currency AS currency_name FROM package_list_service ps INNER JOIN service_list s ON s.id = ps.service_id INNER JOIN countries c ON c.id = s.country_id INNER JOIN countries cs ON cs.id = s.currency_id WHERE ps.package_id = '$package_id' ";
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
                <div class="col-md-5">
                    <input type="hidden" class="service_id_doc" value="'.$row['service_id'].'" />
                    <div class="form-check">
                        <label class="form-check-label"> <h4 class="selection" style="margin-top:-2px;">'.$service_name.'</h4> 
                            <input class="form-check-input" name="service_id[]" value="'.$row['service_id'].'" type="checkbox" checked >
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                        </label>
                    </div>
                       
                </div>
                <div class="col-md-1">
                    <h4 class="selection" style="margin:6px 0;">'.$country_name.'</h4>
                </div>
                <div class="col-md-2">
                    <h4 class="selection" style="margin:6px 0;">'.$price.'.'.$currency_name.'</h4>
                </div>
                <div class="col-md-4">
                    '.@$all_documents.'
                </div>
                <hr class="col12" style="margin:8px 0">
            </div>';        
    }
    // <a onclick="remove_selected_package('.$package_id.')" class="btn btn-danger btn-xs btn-round"><i class="fa fa-remove"></i> Remove</a>
    echo '
    </div></div>';
}

if($_POST['action']=='select_service')
{
    echo '<div id="service_id_panel_'.$service_id.'"><br><div class="col-md-12" style="border:solid 2px #aa50ab; border-radius:10px; width:97%;posiion:relative;"><input type="hidden" name="service_id[]" class="service_id service_id_doc" value="'.$service_id.'" />';
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
                <div class="col-md-5">
                    <h4 class="selection" style="margin:6px 0;">'.@$service_name.'</h4>
                </div>
                <div class="col-md-1">
                    <h4 class="selection" style="margin:6px 0;">'.$country_name.'</h4>
                </div>
                <div class="col-md-2">
                    <h4 class="selection" style="margin:6px 0;">'.$price.'.'.$currency_name.'</h4>
                </div>
                <div class="col-md-3">
                    '.@$all_documents.'
                </div>
                <div class="col-md-1">
                    <a onclick="remove_selected_service('.$service_id.')" class="btn btn-danger btn-xs btn-round"><i class="fa fa-remove"></i> Remove</a>
                </div>
            </div>';        
    }
    echo '
    </div></div>';
}

if($_POST['action']=='load_document')
{
    $check_1='SELECT d.document_name FROM service_list_documents ad INNER JOIN documentlist d ON d.id= ad.documentlist_id WHERE ad.service_id IN ('.$all_service_id_doc.') GROUP BY d.id ';
    $resul_1 = mysqli_query($db,$check_1);
    while ($row_1 = mysqli_fetch_array($resul_1, MYSQLI_ASSOC))
    {
        echo '
        <div class="row">
            <div class="col-md-5">
                <h4 class="selection" style="margin:6px 0;">'.$row_1["document_name"].'</h4>
            </div>
            <div class="col-md-5">
                <input type="file" name="document_file" class="form-control" />
            </div>
            <hr class="col12" style="margin:8px 0">
        </div>
        ';
    }
}

?>