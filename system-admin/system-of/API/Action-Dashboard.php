<?php
require_once "../../../config/config.php";
require_once '../../../config/comman_js.php';

$get_connection=new connectdb;
$db=$get_connection->connect();

if (mysqli_connect_errno($db)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

extract($_POST);

if($_POST['action'] == 'load_service_list')
{
	echo '<select style="margin-top: 2% !important;" id="assign_service_id" class="browser-default custom-select chosen-select">
    <option value="">Select</option>';
    $check = "SELECT sa.service_id, s.service_name FROM service_list s INNER JOIN assigned_service sa ON sa.service_id = s.id WHERE s.service_type_id = '$service_type_id' AND sa.country_id = '$lod_country_id' ";
    $resul = mysqli_query($db,$check); 
    while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
    {
    	echo '<option value="'.$row['service_id'].'">'.$row['service_name'].'</option>';
    }
    echo '</select>';
}

if($_POST['action'] == 'load_start_processing')
{
    $check = "SELECT os.order_service_details_id, os.service_id, o.order_id, o.internal_reference_id, o.first_name, o.middle_name, o.last_name, c.Client_Name, s.service_name, st.name, os.order_creation_date, sa.sla, os.order_status FROM order_master o INNER JOIN order_service_details os ON os.order_id = o.order_id INNER JOIN client c ON c.id = o.client_id INNER JOIN service_list s ON s.id = os.service_id INNER JOIN assigned_service sa ON sa.id = os.assign_service_id INNER JOIN service_type st ON st.id = s.service_type_id WHERE os.service_id = '$service_id' ";
    $resul = mysqli_query($db,$check); 
    if($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
    {
        $order_service_details_id = $row['order_service_details_id'];
        $order_id = $row['order_id'];
        $service_id = $row['service_id'];
        $sla = $row['sla'];
        $expected_course_date = date('d-m-Y', strtotime('+ '.$sla.' days '.$row["order_creation_date"]));
        $order_creation_date = date('d-m-Y', strtotime($row['order_creation_date']));
        $applicant_name = $row['first_name'].' '.$row['middle_name'].' '.$row['last_name'];
        $maiden_name = $row['middle_name'].' '.$row['last_name'];
        $client_name = $row['Client_Name'];
        $service_name = $row['service_name'];
        $service_type_name = $row['name'];
        $order_status = "";
        if($row["order_status"] == 0) { $order_status = "Pending"; }
        if($row["order_status"] == 1) { $order_status = "Started"; }
        if($row["order_status"] == 2) { $order_status = "Completed"; }
        if($row["order_status"] == 3) { $order_status = "Insufficiency"; }
        $internal_reference_id = $row['internal_reference_id'];
    }

    ?>
    <style>
        .card .table tr td, .dark-edition .table>thead>tr>td, .dark-edition .table>tbody>tr>td, .dark-edition .table>tfoot>tr>td, td, table, tbody, tr, #datatable_tbl, .dataTables_wrapper .dataTables_filter input, tbody tr td, table, tbody, thead, tr, td, th, tr th, tr, td, th, thead, tbody, table{
            padding: 4px !important;
            border:none !important;
            border:solid transparent 2px !important;
            vertical-align:top !important;
        }
        .bordered_table table, .bordered_table th, .bordered_table tr, .bordered_table td, .bordered_table tr{
            vertical-align:middle !important;
            border:solid 1px #000 !important;
        }

        tr{
            margin-bottom:100px !important;
        }
        .custom-select{
            background:transparent;
        }
        .insufficiency_panel{
            display: none;
        }
        .material_checkbox{
            display: inline;
            float: none;
        }
        .provided_val{
            /*text-align: center;*/
            font-size: 13pt !important;
            text-decoration: underline;
            background: #eee;
            padding-left: 15px !important;
        }
        .chosen-container .chosen-results li.active-result{
            text-align: left !important;
        }
    </style>
    <div class="row justify-content-start col-md-12">
        <input type="hidden" name="order_id" id="order_id" value="<?php echo @$order_id; ?>" />
        <input type="hidden" id="service_type_id" value="<?php echo @$service_type_id; ?>" />
        <input type="hidden" id="assign_service_id" value="<?php echo @$service_id; ?>" />
        <input type="hidden" id="order_service_details_id" value="<?php echo @$order_service_details_id ; ?>" />

        <input type="hidden" id="service_id" value="<?php echo @$service_id; ?>" />
        <div class="col-md-2">
            <h6>Applicant Name</h6>
            <h6>Service Type</h6>
            <h6>Service Name</h6>
            <h6>Maiden Name</h6>
            <h6>Client Name</h6>
            <h6>Status</h6>
        </div>
        <div class="col-md-3">
            <h6 style="color:#888;"><?php echo $applicant_name; ?></h6>
            <h6 style="color:#888;"><?php echo $service_type_name; ?></h6>
            <h6 style="color:#888;"><?php echo $service_name; ?></h6>
            <h6 style="color:#888;"><?php echo $maiden_name; ?></h6>
            <h6 style="color:#888;"><?php echo $client_name; ?></h6>
            <h6 style="color:#888;"><?php echo $order_status; ?></h6>
        </div>
        <div class="col-md-2">
            <br>
        </div>
        <div class="col-md-2">
            <h6>Case Reference ID</h6>
            <h6>Original Order Date</h6>
            <h6>Order Creation Date</h6>
            <h6>Initiation Date</h6>
            <h6>Closure Date</h6>
        </div>
        <div class="col-md-3">
            <h6 style="color:#888;"><?php echo $internal_reference_id; ?></h6>
            <h6 style="color:#888;"><?php echo $order_creation_date; ?></h6>
            <h6 style="color:#888;"><?php echo $order_creation_date; ?></h6>
            <h6 style="color:#888;"><?php date('d-m-Y'); ?></h6>
            <h6 style="color:#888;"><?php echo $expected_course_date; ?></h6>
        </div>
        <div class="col-md-12">
            <br>
            <div class="card-header card-header-primary">
                <h4 id="process_title" class="card-title"><i class="fa fa-arrow-right"></i> <?php echo @$service_type_name; ?> / <?php echo @$service_name; ?></h4>
            </div>
            <br>
        </div>
        <div style="width:35%; float: left;" class="form_center">
            <h5 style="font-weight:bold;">VERIFIED</h5>
        </div>
        <div style="width:25%; float: left;" class="form_center">
            <a onclick="provided_to_verifed()" class="btn btn-success btn-round btn-sm"><i class="fa fa-arrow-left"></i></a>
        </div>
        <div style="width:40%; float: left;" class="form_center">
            <h5 style="font-weight:bold;">PROVIDED</h5>
        </div>
        <div class="col-md-12 ">
            <table style="width:100%;">

                <?php
                $check="SELECT os.service_id, s.service_name, os.assign_package_id, os.assign_service_id FROM order_service_details os INNER JOIN service_list s ON s.id = os.service_id WHERE os.order_id  ='".$order_id."' AND os.service_id = '".$service_id."'";
                $resul = mysqli_query($db,$check); 
                while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
                {
                    $print_verify_js = "";
                    $country_id = $state_id = 0;
                    $check_1 = "SELECT od.order_details_id, sm.service_field, sm.service_field_text, sm.data_type, sm.is_required, od.service_field_value, od.service_field_value_verified, od.service_id FROM order_master_details od INNER JOIN service_field_master sm ON sm.service_field_id = od.service_field_id WHERE od.order_id = '".$order_id."' AND od.service_id = '".$service_id."' ";
                    $resul_1 = mysqli_query($db,$check_1); 
                    while ($row_1 = mysqli_fetch_array($resul_1, MYSQLI_ASSOC))
                    {
                      $is_required = ""; $is_required_star = "";
                      if($row_1['is_required'] == 1) { $is_required = "0required"; $is_required_star = "<i class='fa fa-star'></i>"; }

                      echo '<input type="hidden" name="order_details_id[]" value="'.$row_1["order_details_id"].'" />';
                      if($row_1['data_type'] == "date")
                      {
                        $field_print = '<input type="date" class="form-control" id="'.$row_1["service_field"].'_'.$row_1['order_details_id'].'" name="'.$row_1["service_field"].'_'.$row_1['order_details_id'].'" value="'.$row_1["service_field_value_verified"].'" '.@$is_required.' />';
                    }
                    if($row_1['data_type'] == "short_text")
                    {
                        $field_print = '<input type="text" class="form-control" id="'.$row_1["service_field"].'_'.$row_1['order_details_id'].'" name="'.$row_1["service_field"].'_'.$row_1['order_details_id'].'" value="'.$row_1["service_field_value_verified"].'" '.@$is_required.' />';
                    }
                    if($row_1['data_type'] == "number")
                    {
                        $field_print = '<input type="number" class="form-control" id="'.$row_1["service_field"].'_'.$row_1['order_details_id'].'" name="'.$row_1["service_field"].'_'.$row_1['order_details_id'].'" value="'.$row_1["service_field_value_verified"].'" '.@$is_required.' />';
                    }
                    if($row_1['data_type'] == "long_text")
                    {
                        $field_print = '<textarea type="text" class="custom-select" id="'.$row_1["service_field"].'_'.$row_1['order_details_id'].'" name="'.$row_1["service_field"].'_'.$row_1['order_details_id'].'" value="'.$row_1["service_field_value_verified"].'" '.@$is_required.' ></textarea>';
                    }
                    $service_field_value = "";
                    if($row_1['data_type'] == "select")
                    {
                        $onchange_evt = "";
                        if($row_1['service_field'] == "country_id") { $onchange_evt = 'onchange="load_state('.$row_1["service_id"].','.$row_1['order_details_id'].')"'; }
                        if($row_1['service_field'] == "state_id") { $onchange_evt = 'onchange="load_city('.$row_1["service_id"].','.$row_1['order_details_id'].')"'; }
                        $field_print = '
                        <div id="'.strtolower($row_1["service_field"]).'_'.$row_1["service_id"].'_div">
                        <select '.$onchange_evt.' class="chosen-select" id="'.$row_1["service_field"].'_'.$row_1['service_id'].'" id="'.$row_1["service_field"].'_'.$row_1['order_details_id'].'" name="'.$row_1["service_field"].'_'.$row_1['order_details_id'].'" '.@$is_required.' >';
                        if($row_1["service_field"] == "country_id")
                        {
                          $field_print.='<option value="">Select</option>';
                          $check_2 = "SELECT id, name FROM countries ";
                          $resul_2 = mysqli_query($db,$check_2); 
                          while ($row_2 = mysqli_fetch_array($resul_2, MYSQLI_ASSOC))
                          {
                            $selected_option = '';
                            if($row_1['service_field_value_verified'] == $row_2['id'])
                            {
                              $country_id = $row_2['id'];
                              $selected_option = 'selected';
                          }
                          $field_print.='<option '.@$selected_option.' value="'.$row_2['id'].'">'.$row_2['name'].'</option>';    
                      }
                      $check_2 = "SELECT id, name FROM countries WHERE id = '".$row_1['service_field_value']."' ";
                      $resul_2 = mysqli_query($db,$check_2); 
                      if ($row_2 = mysqli_fetch_array($resul_2, MYSQLI_ASSOC))
                      {
                        $service_field_value = $row_2['name'];
                    }

                    $print_verify_js.='
                    if(parseFloat($("#lbl_print_'.$row_1["service_field"].'_'.$row_1['order_details_id'].'").val()) > 0)
                    {
                        load_country('.$row_1["service_id"].','.$row_1['order_details_id'].', '.$row_1['service_field_value'].');
                        $("#'.$row_1["service_field"].'_'.$row_1['order_details_id'].'").val($("#lbl_print_'.$row_1["service_field"].'_'.$row_1['order_details_id'].'").val());
                    }
                    ';
                }

                if($row_1["service_field"] == "state_id" && @$country_id > 0)
                {
                  $field_print.='<option value="">Select</option>';
                  $check_2 = "SELECT id, name FROM states WHERE country_id = '$country_id' ";
                  $resul_2 = mysqli_query($db,$check_2); 
                  while ($row_2 = mysqli_fetch_array($resul_2, MYSQLI_ASSOC))
                  {
                    $selected_option = '';
                    if($row_1['service_field_value_verified'] == $row_2['id'])
                    {
                      $state_id = $row_2['id'];
                      $selected_option = 'selected';
                  }
                  $field_print.='<option '.@$selected_option.' value="'.$row_2['id'].'">'.$row_2['name'].'</option>';    
              }
              $check_2 = "SELECT id, name FROM states WHERE id = '".$row_1['service_field_value']."' ";
              $resul_2 = mysqli_query($db,$check_2); 
              if ($row_2 = mysqli_fetch_array($resul_2, MYSQLI_ASSOC))
              {
                $service_field_value = $row_2['name'];
            }
            $print_verify_js.='
            if(parseFloat($("#lbl_print_'.$row_1["service_field"].'_'.$row_1['order_details_id'].'").val()) > 0)
            {
                load_state('.$row_1["service_id"].','.$row_1['order_details_id'].', '.$row_1["service_field_value"].');
                $("#'.$row_1["service_field"].'_'.$row_1['order_details_id'].'").val($("#lbl_print_'.$row_1["service_field"].'_'.$row_1['order_details_id'].'").val());
            }
            ';
        }

        if($row_1["service_field"] == "city_id" && @$state_id > 0)
        {
          $field_print.='<option value="">Select</option>';
          $check_2 = "SELECT id, name FROM cities WHERE state_id = '$state_id' ";
          $resul_2 = mysqli_query($db,$check_2); 
          while ($row_2 = mysqli_fetch_array($resul_2, MYSQLI_ASSOC))
          {
            $selected_option = '';
            if($row_1['service_field_value_verified'] == $row_2['id'])
            {
              $selected_option = 'selected';
          }
          $field_print.='<option '.@$selected_option.' value="'.$row_2['id'].'">'.$row_2['name'].'</option>';    
      }
      $check_2 = "SELECT id, name FROM cities WHERE id = '".$row_1['service_field_value']."' ";
      $resul_2 = mysqli_query($db,$check_2); 
      if ($row_2 = mysqli_fetch_array($resul_2, MYSQLI_ASSOC))
      {
        $service_field_value = $row_2['name'];
    }
    $print_verify_js.='
    if(parseFloat($("#lbl_print_'.$row_1["service_field"].'_'.$row_1['order_details_id'].'").val()) > 0)
    {
        load_city('.$row_1["service_id"].','.$row_1['order_details_id'].', '.$row_1["service_field_value"].');
        $("#'.$row_1["service_field"].'_'.$row_1['order_details_id'].'").val($("#lbl_print_'.$row_1["service_field"].'_'.$row_1['order_details_id'].'").val());
    }
    ';
}

$field_print.='</select></div>';
}
else
{
    $service_field_value = $row_1['service_field_value'];
    $print_verify_js.='$("#'.$row_1["service_field"].'_'.$row_1['order_details_id'].'").val($("#lbl_print_'.$row_1["service_field"].'_'.$row_1['order_details_id'].'").val());';
}
echo '
<tr>
<td style="width:35%" class="form_left">
<label style="margin:10px 0;">'.$row_1["service_field_text"].' '.@$is_required_star.'</label>
</td>
<td style="width:25%" class="form_left">
'.$field_print.'
</td>
<td style="width:40%" class="form_left">
<h4 class="provided_val">'.$service_field_value.'</h4>
<input type="hidden" id="lbl_print_'.$row_1["service_field"].'_'.$row_1['order_details_id'].'" value="'.$row_1["service_field_value"].'" />
</td>
</tr>
';
}
}
?>
</table>
</div>
<div class="col-md-12">
    <br>
    <div class="card-header card-header-primary">
        <h4 id="process_title" class="card-title"><i class="fa fa-pencil"></i> Verifier Details</h4>
    </div>
    <br>
</div>
<div class="col-md-12">
    <table style="width:100%;">
        <tr>
            <th style="width:35%" class="form_left">Verifier Details</th>
            <td style="width:25%"><input type="text" class="form-control" id="verifier_details" /></td>
            <td style="width: 40%">&nbsp;</td>
        </tr>
        <tr>
            <th class="form_left">Verifier Comments</th>
            <td><textarea class="custom-select" id="verifier_comments"></textarea></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <th class="form_left">Currency</th>
            <td>
                <select class="browser-default chosen-select custom-select" id="currency_id">
                    <option value="">Select</option>
                    <?php
                    $check='SELECT id, currency FROM countries ';
                    $resul = mysqli_query($db,$check); 
                    while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
                    {
                        echo '<option value="'.$row['id'].'">'.$row['currency'].'</option>';
                    }
                    ?>
                </select></td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <th class="form_left">Additional Fees</th>
                <td><input type="text" class="form-control" id="additional_fees" /></td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <th class="form_left">Status</th>
                <td>
                    <select onchange="insufficiency_change()" class="browser-default chosen-select custom-select" id="order_status">
                        <option>Pending</option>
                        <option>Insufficiency</option>
                    </select>
                </td>
                <td>
                    <div class="insufficiency_panel" style="background: #ccc; padding: 10px;" >
                        <label class="pull-left">Comments</label>
                        <textarea class="custom-select" id="insufficiency_comment" placeholder="Enter Comments" style="border:solid !important;"></textarea>
                    </div>
                </td>
            </tr>
            <tr>
                <th class="form_left">Queue</th>
                <td><select class="browser-default chosen-select custom-select" id="queue"></select></td>
                <td>
                    <div class="insufficiency_panel">
                        <a href="javascript:raise_insufficiency()" id="insufficiency_btn" class="btn btn-danger pull-right btn-sm"><i class="fa fa-hand-o-up"></i> Raise Insufficiency </a>
                    </div>
                </td>
            </tr>
            <tr>
                <th class="form_left">Closed Date</th>
                <td><input type="date" class="form-control" id="closed_date" /></td>
                <td>&nbsp;</td>
            </tr>
        </table>
    </div>
    <div class="col-md-12">
        <br>
        <div class="card-header card-header-primary">
            <h4 id="process_title" class="card-title"><i class="fa fa-comments"></i> Public Notes & Private Notes</h4>
        </div>
        <br>
    </div>
    <div class="col-md-6">
        <b>Public Notes</b><br>
        <textarea class="custom-select" rows="3" id="public_notes"></textarea>
        <a href="javascript:select_macros()" class="btn btn_link btn-xs">Select Macros</a>
        <a onclick="clear_public_notes()" class="btn btn_danger btn-xs">Clear</a>
        <a href="javascript:add_public_note();" class="btn btn-success btn-xs pull-right"><i class="fa fa-plus"></i> Add</a>
        <br>
        <b>Notes History</b>
        <h5 class="btn btn-primary col-md-12 form_left btn-xs"><i class="fa fa-comments"></i> Comments</h5>
        <div style="height: 200px; overflow-y: scroll;" id="public_notes_panel">
            <br>
        </div>
    </div>
    <div class="col-md-6">
        <b>Private Notes</b><br>
        <textarea class="custom-select" rows="3" id="private_notes"></textarea>
        <a onclick="clear_private_notes()" class="btn btn_danger btn-xs">Clear</a>
        <a href="javascript:add_private_note();" class="btn btn-success btn-xs pull-right"><i class="fa fa-plus"></i> Add</a>
        <br>
        <b>Notes History</b>
        <h5 class="btn btn-primary col-md-12 form_left btn-xs"><i class="fa fa-comments"></i> Comments</h5>
        <div style="height: 200px; overflow-y: scroll;" id="private_notes_panel">
            <br>
        </div>
    </div>
    <div class="col-md-12">
        <b>Additional Comments</b>
        <textarea class="custom-select" rows="3" id="additional_comments"></textarea>
    </div>

    <div class="col-md-12">
        <br><br>
        <div class="card-header card-header-primary">
            <h4 id="process_title" class="card-title"><i class="fa fa-files-o"></i> Attached Documents</h4>
        </div>
        <br>
    </div>
    <div class="col-md-8">
        <div id="documents_panel"></div>
        <br>
        <b>Vendor</b>
        <div class="row">
            <div class="col-md-5">
                <select class="custom-select">
                    <option value="">Select Vendor</option>
                    <?php
                    $check='SELECT user_id, first_name, last_name FROM user_master WHERE role_id = 3 ';
                    $resul = mysqli_query($db,$check); 
                    while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
                    {
                        echo '<option value="'.$row['user_id'].'">'.$row['first_name'].' '.$row['last_name'].'</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-7">
                <a style="margin: 0;" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Assign To Vendor</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <h5 class="selection">File Formats</h5>
        <div class="row selection" style="margin-left:1%;margin-top:2%;">
            <i class="fa fa-file-image-o" style="font-size:40px !important;margin-left:2%;color: green;"></i>
            <i class="fa fa-file-word-o" style="font-size:40px !important;margin-left:2%;color: blue;"></i>
            <i class="fa fa-file-excel-o " style="font-size:40px !important;margin-left:3%;color: green"></i>
            <i class="fa fa-file-powerpoint-o " style="font-size:40px !important;margin-left:3%;color: orange"></i>
            <i class="fa fa-file-pdf-o selection" style="color: red !important; margin-left:3%; font-size:40px !important;"></i>
        </div>
    </div>
    <div class="col-md-12">
        <br><br>
        <div class="card-header card-header-primary">
            <h4 id="process_title" class="card-title"><i class="fa fa-pencil"></i> ETA Notes</h4>
        </div>
        <br>
    </div>
    <div class="col-md-6">
        <b>Notes</b><br>
        <div class="row">
            <div class="col-md-8">
                <textarea class="custom-select" rows="3" id="eta_notes"></textarea>
                <a href="javascript:select_eta()" class="btn btn_link btn-xs">Select ETA</a>
                <a onclick="clear_eta_notes()" class="btn btn_danger btn-xs">Clear</a>
            </div>
            <div class="col-md-4">
                <input type="date" id="eta_date" class="form-control" />
                <a href="javascript:add_eta_note();" class="btn btn-success btn-xs pull-right"><i class="fa fa-plus"></i> Add</a>
            </div>
        </div>
        <br>
    </div>
    <div class="col-md-6">
        <h5 class="btn btn-primary col-md-12 form_left btn-xs"><i class="fa fa-comments"></i> ETA Notes History</h5>
        <div style="height: 150px; overflow-y: scroll;" id="eta_notes_panel">
            <br>
        </div>
    </div>
    <div class="col-md-12 form_center">
        <a class="btn btn-success btn-sm"><i class="fa fa-save"></i> Save</a>
        <a class="btn btn-danger btn-sm"><i class="fa fa-stop"></i> Break</a>
        <a class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
    <div class="col-md-12"><br></div>
</div>

<div class="modal" id="standard_macro_modal">
    <div class="row">
        <div class="col-md-4">
            <br>
        </div>
        <div class="col-md-4">
            <div class="modal-content">
                <h5 style="border-bottom: solid 1px #000;"><b><i class="fa fa-check"></i> Select Macros</b>
                    <a onclick="close_select_macros()" class="btn btn-danger btn-sm pull-right"><i class="fa fa-remove"></i> Close</a>
                </h5>
                <?php
                $check='SELECT id, comment, scenario FROM standard_macro WHERE service_type_id = '.$service_type_id;
                $resul = mysqli_query($db,$check); 
                while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
                {
                    echo '
                    <div style="padding:10px;width:100%;float:left;box-shadow:0 0 10px #aaa;border:dotted 2px #ab60b7; border-radius:10px; ">
                    <b>'.$row["scenario"].'</b>
                    <hr style="margin:3px 0;">
                    <span id="macros_comment_'.$row['id'].'">'.$row['comment'].'</span>
                    <br>
                    <a onclick="select_macros_text('.$row['id'].')" class="btn btn-success pull-right btn-xs"><i class="fa fa-check"></i> Select</a>
                    </div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="eta_macro_master_modal">
    <div class="row">
        <div class="col-md-4">
            <br>
        </div>
        <div class="col-md-4">
            <div class="modal-content">
                <h5 style="border-bottom: solid 1px #000;"><b><i class="fa fa-check"></i> Select ETA</b>
                    <a onclick="close_select_eta()" class="btn btn-danger btn-sm pull-right"><i class="fa fa-remove"></i> Close</a>
                </h5>
                <?php
                $check='SELECT eta_macro_id, comment FROM eta_macro_master ';
                $resul = mysqli_query($db,$check); 
                while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
                {
                    echo '
                    <div style="padding:10px;width:100%;float:left;box-shadow:0 0 10px #aaa;border:dotted 2px #ab60b7; border-radius:10px; ">
                    <span id="macros_comment_'.$row['eta_macro_id'].'">'.$row['comment'].'</span>
                    <br>
                    <a onclick="select_eta_text('.$row['eta_macro_id'].')" class="btn btn-success pull-right btn-xs"><i class="fa fa-check"></i> Select</a>
                    </div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<script>

    function raise_insufficiency()
    {
        let order_service_details_id = $('#order_service_details_id').val();
        let order_id = $('#order_id').val();
        let order_status = $('#order_status').val();
        let insufficiency_comment = $('#insufficiency_comment').val().trim();
        if(order_status == "Insufficiency")
        {
            if(insufficiency_comment == "")
            {
                alert('Please enter the insufficiency comment!');
                $('#insufficiency_comment').focus();
            }
            else
            {
                $('#insufficiency_btn').addClass('disabled');
                var action = 'raise_insufficiency';
                $.ajax({
                    type:'POST',
                    url:'./API/Action-Dashboard.php',
                    data:{insufficiency_comment, order_service_details_id, order_id, action},
                    success:function(html){
                        if(html == "success")
                        {
                            alert('Insufficiency raised!');
                        }
                    }
                });
            }
        }
        else
        {
            alert("Please select status!");
        }
    }

    function load_country(service_id, order_details_id, country_id)
    {
        var load_data = 'load_country';
        $.ajax({
            type:'POST',
            url:'./API/Address-Functions.php',
            data:{load_data, service_id, order_details_id, country_id},
            success:function(html){
                let is_require = "";
                if($('#country_id_'+service_id).prop('required') == true)
                {
                    is_require = 'true';
                }
                let new_name = $('#country_id_'+service_id).attr("name")
                $('#country_id_'+service_id+'_div').html(html);
                $('#country_id_'+service_id).chosen();
                $('#country_id_'+service_id).prop('required', is_require);
                $('#country_id_'+service_id).attr('name', new_name);
                if($('#country_id_'+service_id).val() != "0")
                {
                    load_state(service_id, order_details_id, 0)
                }
            }
        });
    }

    function load_state(service_id, order_details_id, state_id)
    {
        var country_id = $('#country_id_'+service_id).val();
        var load_data = 'load_state';
        $.ajax({
            type:'POST',
            url:'./API/Address-Functions.php',
            data:{country_id, load_data, service_id, order_details_id, state_id},
            success:function(html){
                let is_require = "";
                if($('#state_id_'+service_id).prop('required') == true)
                {
                    is_require = 'true';
                }
                let new_name = $('#state_id_'+service_id).attr("name")
                $('#state_id_'+service_id+'_div').html(html);
                $('#state_id_'+service_id).chosen();
                $('#state_id_'+service_id).prop('required', is_require);
                $('#state_id_'+service_id).attr('name', new_name);

                if($('#state_id_'+service_id).val() != "0")
                {
                    load_city(service_id, order_details_id, 0)
                }
            }
        });
    }

    function load_city(service_id, order_details_id, city_id)
    {
        var state_id = $('#state_id_'+service_id).val();
        var load_data = 'load_city';
        $.ajax({
            type:'POST',
            url:'./API/Address-Functions.php',
            data:{state_id, load_data, service_id, order_details_id, city_id},
            success:function(html){
                let is_require = "";
                if($('#city_id_'+service_id).prop('required') == true)
                {
                    is_require = 'true';
                }
                let new_name = $('#city_id_'+service_id).attr("name")
                $('#city_id_'+service_id+'_div').html(html);
                $('#city_id_'+service_id).chosen();
                $('#city_id_'+service_id).prop('required', is_require);
                $('#city_id_'+service_id).attr('name', new_name);
            }
        });
    }

    var order_id = $('#order_id').val();
    var order_service_details_id = $('#order_service_details_id').val();

    $('.chosen-select').chosen();
    function insufficiency_change()
    {
        var order_status = $('#order_status').val();
        if(order_status == "Insufficiency")
        {
            $('.insufficiency_panel').css('display', 'block');
            $('#insufficiency_comment').focus();
        }
        else
        {
            $('#insufficiency_comment').val('');
            $('.insufficiency_panel').css('display', 'none');
        }
    }
    load_attached_documents(<?php echo @$order_id; ?>);

    function upload_document_file()
    {
        var document_file = $('#document_file').prop('files')[0] || 0;
        if(document_file == "0")
        {
          alert('Please select file!')
          $('#document_file').focus();
      }
      else
      {
          $('#btn_upload').addClass('disabled');

          var myform = document.getElementById("upload_document_form");
          var fd = new FormData(myform );
          $.ajax({
            url: "./API/Upload-Document.php",
            data: fd,
            cache: false,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (html) {
              if(html == "inserted")
              {
                load_attached_documents(<?php echo @$order_id; ?>);
                alert('File Uploaded successfully!');
                $('#document_file').val('');
                $('#btn_upload').removeClass('disabled');
                $('#selectedFiles').html('');
            }
            else
            {
                alert('Error occurred');
                $('#btn_upload').removeClass('disabled');
            }
        }
    });
      }
  }


  function check_all_documents()
  {
    if($('#select_all_documents').prop('checked') == true)
    {
        $(".order_master_document_id").each(function () {
            $(this).prop('checked', true);
        })
    }
    else
    {
        $('.order_master_document_id').prop('checked', false);    
    }
}

function clear_public_notes()
{
    $('#public_notes').val('');
    $('#public_notes').focus();
}

function clear_private_notes()
{
    $('#private_notes').val('');
    $('#private_notes').focus();
}

function clear_eta_notes()
{
    $('#eta_notes').val('');
    $('#eta_date').val('');
    $('#eta_notes').focus();    
}

function select_macros()
{
    $('#standard_macro_modal').css('display', 'block');
}

function select_macros_text(macro_id)
{
    close_select_macros();
    $('#public_notes').val($('#macros_comment_'+macro_id).html());
    $('#public_notes').focus();
}

function close_select_macros()
{
    $('#standard_macro_modal').css('display', 'none');
}

function select_eta()
{
    $('#eta_macro_master_modal').css('display', 'block');
}

function select_eta_text(macro_id)
{
    close_select_eta();
    $('#eta_notes').val($('#macros_comment_'+macro_id).html());
    $('#eta_notes').focus();
}

function close_select_eta()
{
    $('#eta_macro_master_modal').css('display', 'none');
}

function add_public_note()
{
    var public_notes = $('#public_notes').val().trim();
    if(public_notes == "")
    {
        alert('Please enter Public Notes!');
        $('#public_notes').focus();
    }
    else
    {
        var action = 'add_public_notes';
        $.ajax({
          type:'POST',
          url:'./API/Action-Dashboard.php',
          data:{order_id, order_service_details_id, public_notes, action},
          success:function(html){
            if(html == 'success')
            {
                load_notes_con('public');
                clear_public_notes();
                alert('Public Note added!');
            }
            else
            {
                alert('Error occurred!')
            }
        }
    });
    }
}

function add_private_note()
{
    var private_notes = $('#private_notes').val().trim();
    if(private_notes == "")
    {
        alert('Please enter Private Notes!');
        $('#private_notes').focus();
    }
    else
    {
        var action = 'add_private_notes';
        $.ajax({
          type:'POST',
          url:'./API/Action-Dashboard.php',
          data:{order_id, order_service_details_id, private_notes, action},
          success:function(html){
            if(html == 'success')
            {
                load_notes_con('private');
                clear_private_notes();
                alert('Private Note added!');
            }
            else
            {
                alert('Error occurred!')
            }
        }
    });
    }
}

function add_eta_note()
{
    var eta_notes = $('#eta_notes').val().trim();
    var eta_date = $('#eta_date').val();
    if(eta_notes == "")
    {
        alert('Please enter ETA Notes!');
        $('#eta_notes').focus();
    }
    else if(eta_date == "")
    {
        alert('Please enter ETA date!');
        $('#eta_date').focus();
    }
    else
    {
        var action = 'add_eta_notes';
        $.ajax({
          type:'POST',
          url:'./API/Action-Dashboard.php',
          data:{order_id, order_service_details_id, eta_notes, eta_date, action},
          success:function(html){
            if(html == 'success')
            {
                load_notes_con('eta');
                clear_eta_notes();
                alert('ETA Note added!');
            }
            else
            {
                alert('Error occurred!')
            }
        }
    });
    }
}

function load_notes_con(condition)
{
    var condition = condition;
    var order_service_details_id = $('#order_service_details_id').val();
    var action = 'load_notes_con';
    $.ajax({
      type:'POST',
      url:'./API/Action-Dashboard.php',
      data:{order_service_details_id, action, condition},
      success:function(html){
        $('#'+condition+'_notes_panel').html(html);
    }
});
}
load_notes_con('public');
load_notes_con('private');
load_notes_con('eta');

function provided_to_verifed()
{
    let r = confirm('Are you sure to take provided details to verified?')
    if(r == true)
    {
        <?php
        echo @$print_verify_js;
        ?>              
    }
}
</script>
<?php
}

// if($_POST['action'] == 'load_attached_documents')
// {
//     echo '
//     <table class="bordered_table" style="width:100%">
//     <tr>
//     <th>File</th>
//     <th class="form_center">Download / Upload</th>
//     <th class="form_center">
//     View to Vendor<br>
//     <label onclick="check_all_documents()" style="padding-left:35px !important;" class="material_checkbox btn-sm">Select All
//     <input type="checkbox" id="select_all_documents" type="checkbox" >
//     <span class="checkmark" style="top:1px;left:4px;"></span>
//     </label>
//     </th>
//     </tr>
//     ';
//     $check_1='SELECT d.document_name, ad.document_file, ad.order_master_document_id FROM order_master_documents ad INNER JOIN documentlist d ON d.id= ad.documentlist_id WHERE ad.order_id = '.$_POST['order_id'].' AND ad.documentlist_id IN(SELECT documentlist_id FROM service_list_documents WHERE service_id = '.$service_id.')  ';
//     $resul_1 = mysqli_query($db,$check_1);
//     while ($row_1 = mysqli_fetch_array($resul_1, MYSQLI_ASSOC))
//     {
//         if($row_1['document_file'] != "")
//         {
//             $document_file = "<a target='_blank' href='../../system-client/assets/order_master_documents/".$row_1['document_file']."' class='btn btn-primary btn-xs'><i class='fa fa-download'></i> Download</a>";
//             $document_select = '<label style="padding-left:35px !important;" class="material_checkbox btn-sm">Select
//             <input type="checkbox" class="order_master_document_id" name="order_master_document_id[] " value="'.$row_1["order_master_document_id"].'"  type="checkbox" >
//             <span class="checkmark" style="top:1px;left:4px;"></span>
//             </label>';
//         }
//         else
//         {
//             $document_select = "<a id='btn_upload_".$row_1["order_master_document_id"]."' onclick='upload_document_file(".$row_1["order_master_document_id"].")' class='btn btn-success btn-xs'><i class='fa fa-upload'></i> Upload</a>";
//             $document_file = "<input type='file' id='document_file_".$row_1["order_master_document_id"]."' class='form-control' />";
//         }
//         echo '
//         <tr>
//         <td>
//         <h6 class="selection form_left">'.$row_1['document_name'].'</h6>
//         </td>
//         <td>
//         '.@$document_file.'
//         </td>
//         <td>
//         '.$document_select.'
//         </td>
//         </tr>';
//     }
//     echo '</table>';
// }

if($_POST['action'] == 'load_attached_documents')
{
    echo '
    <h6 class="selection col-md-12">Upload Multiple Documents Here</h6>
    <form id="upload_document_form">
    <input type="hidden" name="order_id" value="'.$order_id.'" />
    <div class="row">                                  
    <div class="col-md-4">
    <input type="file" onchange="file_selected_list()" multiple id="document_file" name="document_file[]" class="form-control" />
    </div>
    <div class="col-md-4">
    <a class="btn btn-success btn-sm" onclick="upload_document_file()" id="btn_upload"><i class="fa fa-upload"></i> Upload Files</a>
    </div>
    </div>
    </div>
    <div class="col-md-12" id="selectedFiles"></div>
    <table class="bordered_table" style="width:100%">
    <tr>
    <th>File</th>
    <th class="form_center">
    View to Vendor<br>
    <label onclick="check_all_documents()" style="padding-left:35px !important;" class="material_checkbox btn-sm">Select All
    <input type="checkbox" id="select_all_documents" type="checkbox" >
    <span class="checkmark" style="top:1px;left:4px;"></span>
    </label>
    </th>
    </tr>
    ';
    $document_print = '';
    $check_1='SELECT d.document_name FROM order_master_documents ad INNER JOIN documentlist d ON d.id= ad.documentlist_id WHERE ad.order_id = '.$order_id.'  ';
    $resul_1 = mysqli_query($db,$check_1);
    while ($row_1 = mysqli_fetch_array($resul_1, MYSQLI_ASSOC))
    {
        $document_print.='<h4 class="selection" style="margin:6px 0;">'.$row_1['document_name'].'</h4><hr class="col12" style="margin:4px 0">';
    }
    $check_1='SELECT ad.file_name, ad.document_file, ad.order_master_uploaded_document_id FROM order_master_uploded_documents ad WHERE ad.order_id = '.$order_id.'  ';
    $resul_1 = mysqli_query($db,$check_1);
    while ($row_1 = mysqli_fetch_array($resul_1, MYSQLI_ASSOC))
    {
        echo "<tr><td><a target='_blank' href='../../system-client/assets/order_master_documents/".$row_1['document_file']."' class='btn btn-primary pull-left btn-xs'><i class='fa fa-download'></i> ".$row_1['file_name']."</a></td>";
        echo '<td><label style="padding-left:35px !important;" class="material_checkbox btn-sm">Select
        <input type="checkbox" class="order_master_document_id" name="order_master_uploaded_document_id[]" value="'.$row_1["order_master_uploaded_document_id"].'" type="checkbox" >
        <span class="checkmark" style="top:1px;left:4px;"></span>
        </label></td><tr>';
    }
    echo '</table>';
}

if($_POST['action'] == 'add_public_notes')
{
    session_start();
    $user_id = $_SESSION['user_id'];
    $public_notes = addslashes($public_notes);
    $note_type = 'public';
    $check = "INSERT INTO order_notes_master (order_service_details_id, order_id, note_type, note_description, user_id) VALUES('$order_service_details_id', '$order_id', '$note_type', '$public_notes', '$user_id') ";
    $result = mysqli_query($db,$check);
    if($result > 0)
    {
        echo "success";
    }
    else
    {
        echo "error";
    }
}

if($_POST['action'] == 'add_private_notes')
{
    session_start();
    $user_id = $_SESSION['user_id'];
    $private_notes = addslashes($private_notes);
    $note_type = 'private';
    $check = "INSERT INTO order_notes_master (order_service_details_id, order_id, note_type, note_description, user_id) VALUES('$order_service_details_id', '$order_id', '$note_type', '$private_notes', '$user_id') ";
    $result = mysqli_query($db,$check);
    if($result > 0)
    {
        echo "success";
    }
    else
    {
        echo "error";
    }
}

if($_POST['action'] == 'add_eta_notes')
{
    session_start();
    $user_id = $_SESSION['user_id'];
    $eta_notes = addslashes($eta_notes);
    $note_type = 'eta';
    $check = "INSERT INTO order_notes_master (order_service_details_id, order_id, note_type, note_description, user_id, note_date) VALUES('$order_service_details_id', '$order_id', '$note_type', '$eta_notes', '$user_id', '$eta_date') ";
    $result = mysqli_query($db,$check);
    if($result > 0)
    {
        echo "success";
    }
    else
    {
        echo "error";
    }
}

if($_POST['action'] == 'load_notes_con')
{
    $check = "SELECT n.note_type, n.note_description, n.note_date, n.added_date_time, u.first_name, u.last_name FROM order_notes_master n INNER JOIN user_master u ON u.user_id = n.user_id WHERE n.order_service_details_id = '$order_service_details_id' AND n.note_type = '$condition' ORDER BY n.order_notes_id DESC ";
    $resul = mysqli_query($db,$check);
    while($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
    {
        $note_type = $row['note_type'];
        $note_description = $row['note_description'];
        $note_date = date('d-m-Y', strtotime($row['note_date']));
        $added_date_time = date('d-m-Y H:i', strtotime($row['added_date_time']));
        $eta_text = "";
        if($note_type == "eta") { $eta_text = "ETA Date - ".$note_date.' '; }
        echo '
        <div style="box-shadow:0 0 10px #aaa; border:solid 1px #ccc; border-radius:4px; width:100%;float:left; padding:8px;" >
        <div><b>'.$eta_text.'</b>'.$note_description.'</div>
        <hr style="margin:3px 0;">
        <b>'.$row["first_name"].' '.$row["last_name"].'</b>
        <a style="margin:0;" class="pull-right btn btn-round btn_link btn-xs"><i class="fa fa-calendar"></i> '.$added_date_time.'</a>
        </div>
        ';
    }
}

if($_POST['action'] == 'raise_insufficiency')
{
    session_start();
    $user_id = $_SESSION['user_id'];
    
    $insufficiency_comment = addslashes($insufficiency_comment);
    $check = "INSERT INTO order_insufficiency_details (order_service_details_id, order_id, insufficiency_comment, user_id) VALUES('$order_service_details_id', '$order_id', '$insufficiency_comment', '$user_id') ";
    $result = mysqli_query($db,$check);

    $check = "UPDATE order_service_details SET insufficiency_status = 1, order_status = 3 WHERE order_service_details_id  = '$order_service_details_id ' ";
    $result = mysqli_query($db,$check);

    $check = "UPDATE order_master SET order_status = 3 WHERE order_id  = '$order_id ' ";
    $result = mysqli_query($db,$check);

    $check = "SELECT first_name, username, password, email_id, insufficiency_contact, client_id FROM order_master WHERE order_id = '$order_id' ";
    $resul = mysqli_query($db,$check);
    if($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
    {
        $first_name = $row['first_name'];
        $username = $row['username'];
        $password = $row['password'];
        $email_id = $row['email_id'];
        $insufficiency_contact = $row['insufficiency_contact'];
        $client_id = $row['client_id'];
    }
    if($insufficiency_contact == "Client")
    {
        $check = "SELECT email FROM client WHERE client_id = '$client_id' ";
        $resul = mysqli_query($db,$check);
        if($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
        {
            $email = $row['email'];
        }
    }
    include '../../../API/SMTP/sendMail.php';
    include '../../../API/SMTP/RAISE-INSUFFICIENCY.php';
    $subject = "PRE-EMPLOYMENT BACKGROUND SCREENING - INSUFFICIENCY";
    smtpmailer($email_id, $from, $name, $subject, @$print_var);
    smtpmailer($email, $from, $name, $subject, @$print_var);
    echo 'success';
}

?>