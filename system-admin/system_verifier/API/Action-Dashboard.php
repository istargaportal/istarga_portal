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

if($_POST['action'] == 'load_service_order')
{
    require_once '../../../config/comman_js.php';

    $check = "SELECT o.case_reference_no, os.order_service_details_id, os.service_id, o.order_id, o.internal_reference_id, o.first_name, o.middle_name, o.last_name, c.Client_Name, s.service_name, st.name, os.order_creation_date, os.assign_service_id, os.order_status, s.service_type_id, o.is_rush, o.email_id FROM order_master o INNER JOIN order_service_details os ON os.order_id = o.order_id INNER JOIN client c ON c.id = o.client_id INNER JOIN service_list s ON s.id = os.service_id INNER JOIN service_type st ON st.id = s.service_type_id WHERE os.order_service_details_id = '$order_service_details_id' ";
    $resul = mysqli_query($db,$check); 
    if($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
    {
        $case_reference_no = $row['case_reference_no'];
        $first_name = $row['first_name'];
        $middle_name = $row['middle_name'];
        $last_name = $row['last_name'];
        $service_type_id = $row['service_type_id'];
        $order_service_details_id = $row['order_service_details_id'];
        $order_id = $row['order_id'];
        $service_id = $row['service_id'];
        $assign_service_id = $row['assign_service_id'];
        if($assign_service_id != 0)
        {
            $check_1 = "SELECT sla FROM assigned_service WHERE id = '$assign_service_id'  ";
            $resul_1 = mysqli_query($db,$check_1); 
            if($row_1 = mysqli_fetch_array($resul_1, MYSQLI_ASSOC))
            {
                $sla = $row_1['sla'];
            }
        }
        
        $expected_course_date = date('d-m-Y', strtotime('+ '.$sla.' days '.$row["order_creation_date"]));
        $order_creation_date = date('d-m-Y', strtotime($row['order_creation_date']));
        $applicant_name = $row['first_name'].' '.$row['middle_name'].' '.$row['last_name'];
        $maiden_name = $row['middle_name'].' '.$row['last_name'];
        $client_name = $row['Client_Name'];
        $service_name = $row['service_name'];
        $service_type_name = $row['name'];
        $internal_reference_id = $row['internal_reference_id'];
        $is_rush = $row['is_rush'];
        $email_id = $row['email_id'];
        $order_status = $row['order_status'];
    }

    if($is_rush == 1) { $is_rush = "YES"; } else { $is_rush = "NO"; }

    $check = "SELECT status, verifier_details, verifier_comments FROM order_verifier_details WHERE order_verify_id = '$order_verify_id' ";
    $resul = mysqli_query($db,$check); 
    if($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
    {
        $status = $row['status'];
        $verifier_details = $row['verifier_details'];
        $verifier_comments = $row['verifier_comments'];
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
    <br>

    <div class="row justify-content-start col-md-12">
        <form id="verifier_form" class="row">
            <input type="hidden" name="action" value="update_applicant_details" />
            <input type="hidden" name="order_id" id="order_id" value="<?php echo @$order_id; ?>" />
            <input type="hidden" id="service_type_id" value="<?php echo @$service_type_id; ?>" />
            <input type="hidden" id="assign_service_id" value="<?php echo @$service_id; ?>" />
            <input type="hidden" name="service_id" value="<?php echo @$service_id; ?>" />
            <input type="hidden" id="order_service_details_id" name="order_service_details_id" value="<?php echo @$order_service_details_id ; ?>" />
            <input type="hidden" id="service_id" name="service_id" value="<?php echo @$service_id; ?>" />
            <input type="hidden" id="order_verify_id" name="order_verify_id" value="<?php echo @$order_verify_id; ?>" />
            
            <div class="col-md-3">
                <label><b>Case Reference No. :</b> <?php echo $case_reference_no ?></label>
            </div>
            <div class="col-md-3">
                <label><b>Applicant First Name :</b> <?php echo $first_name; ?></label>
            </div>
            <div class="col-md-3">
                <label><b>Applicant Middle Name :</b><?php echo $middle_name; ?></label>
            </div>
            <div class="col-md-3">
                <label><b>Applicant Last Name :</b><?php echo $last_name; ?></label>
            </div>
            
            <div class="col-md-3">
                <label><b>Client Order ID/Applicant ID :</b><?php echo $order_id ?></label>
            </div>
            <div class="col-md-3">
                <label><b>Is Rush Order :</b><?php echo $is_rush; ?> </label>
            </div>
            <div class="col-md-3">
                <label><b>Order Creation Date :</b><?php echo $order_creation_date; ?> </label>
            </div>
            <div class="col-md-3">
                <label><b>Expected Closure :</b><?php echo $expected_course_date; ?> </label>
            </div>
            <div class="col-md-3">
                <label><b>Client Name :</b><?php echo $client_name; ?> </label>
            </div>
            <div class="col-md-3">
                <label><b>Service Type :</b><?php echo $service_type_name; ?> </label>
            </div>
            <div class="col-md-3">
                <label><b>Service :</b><?php echo $service_name; ?> </label>
            </div>
            <div class="col-md-3">
                <label><b>Email ID. :</b><?php echo $email_id; ?> </label>
            </div>

            <div class="col-md-12">
                <br>
                <br>
                <div class="card-header card-header-primary">
                    <h4 id="process_title" class="card-title"><i class="fa fa-arrow-right"></i> <?php echo @$service_type_name; ?> / <?php echo @$service_name; ?></h4>
                </div>
                <br>
            </div>
            <div style="width:35%; float: left;" class="form_center">
                <label><h5 style="font-weight:bold;">VERIFIED</h5></label>
            </div>
            <div style="width:25%; float: left;" class="form_center">
                <a onclick="provided_to_verifed()" class="btn btn-success btn-round btn-sm"><i class="fa fa-arrow-left"></i></a>
            </div>
            <div style="width:40%; float: left;" class="form_center">
                <label><h5 style="font-weight:bold;">PROVIDED</h5></label>
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
                            // onfocus=(this.type="date") onblur=(this.type="text") 
                            $field_print = '<input type="text" placeholder="DD-MM-YYYY" class="form-control form_center" id="'.$row_1["service_field"].'_'.$row_1['order_details_id'].'" name="'.$row_1["service_field"].'_'.$row_1['order_details_id'].'" value="'.$row_1["service_field_value_verified"].'" '.@$is_required.' />';
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
                            $field_print = '<textarea type="text" class="custom-select" id="'.$row_1["service_field"].'_'.$row_1['order_details_id'].'" name="'.$row_1["service_field"].'_'.$row_1['order_details_id'].'" '.@$is_required.' >'.$row_1["service_field_value_verified"].'</textarea>';
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
            <th style="width:35%" class="form_left"><label>Verifier Details</label></th>
            <td style="width:25%"><input type="text" class="form-control" id="verifier_details" name="verifier_details" value="<?php echo $verifier_details; ?>" /></td>
            <td style="width: 40%">&nbsp;</td>
        </tr>
        <tr>
            <th class="form_left"><label>Verifier Comments</label></th>
            <td><textarea class="custom-select" id="verifier_comments" name="verifier_comments"><?php echo $verifier_comments; ?></textarea></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <th class="form_left"><label>Status</label></th>
            <?php
                $disabled_status = ""; 
                if($status == "Re-assigned")
                {
                    $disabled_status = "disabled_btn disabled";
                }
            ?>
            <td class="<?php echo $disabled_status; ?>">
                <select class="browser-default chosen-select form_left custom-select" id="status" name="status" >
                    <option><?php echo $status; ?></option>
                    <option>Verifier Completed</option>
                </select>
            </td>
            <td>&nbsp;</td>     
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><a onclick="update_verifier_details()" class="btn btn-warning pull-left btn-sm"><i class="fa fa-edit"></i> Update</a></td>
        </tr>
    </table>
</div>
<div class="col-md-12">
    <br>
    <div class="card-header card-header-primary">
        <h4 id="process_title" class="card-title"><i class="fa fa-comments"></i> Additional Comments BY OF</h4>
    </div>
    <div class="row">
        <div class="col-md-12">
    <?php
        $check = "SELECT n.note_type, n.note_description, n.note_date, n.added_date_time, u.first_name, u.last_name FROM order_notes_master n INNER JOIN user_master u ON u.user_id = n.user_id WHERE n.order_service_details_id = '$order_service_details_id' AND n.note_type = 'of_comments' ORDER BY n.order_notes_id DESC ";
        $resul = mysqli_query($db,$check);
        $rowcount=mysqli_num_rows($resul);
        if($rowcount > 0)
        {
            while($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
            {
                $note_description = $row['note_description'];
                $added_date_time = date('d-m-Y H:i', strtotime($row['added_date_time']));
                echo '
                <div style="box-shadow:0 0 10px #aaa; border:solid 1px #ccc; border-radius:4px; width:96%;float:left; padding:8px; margin:1% 2%;" >
                <div>'.$note_description.'</div>
                <hr style="margin:3px 0;">
                <b>'.$row["first_name"].' '.$row["last_name"].'</b>
                <a style="margin:0;" class="pull-right btn btn-round btn_link btn-xs"><i class="fa fa-calendar"></i> '.$added_date_time.'</a>
                </div>
                ';
            }
        }
        else
        {
            echo '<div style="margin:15px;" ><h4><i class="fa fa-ban"></i> No Comments!</h4></div>';
        }
    ?>
        </div>
    </div>
</div>
<div class="col-md-12">
    <br>
    <div class="card-header card-header-primary">
        <h4 id="process_title" class="card-title"><i class="fa fa-comments"></i> Public Notes & Private Notes</h4>
    </div>
    <br>
</div>
<div class="col-md-6">
    <label><b>Public Notes</b></label><br>
    <textarea class="custom-select" rows="3" id="public_notes"></textarea>
    <a href="javascript:select_macros()" class="btn btn_link btn-xs">Select Macros</a>
    <a onclick="clear_public_notes()" class="btn btn_danger btn-xs">Clear</a>
    <a href="javascript:add_public_note();" class="btn btn-success btn-xs pull-right"><i class="fa fa-plus"></i> Add</a>
    <br>
    <label><b>Notes History</b></label>
    <h5 class="btn btn-primary col-md-12 form_left btn-xs"><i class="fa fa-comments"></i> Comments</h5>
    <div style="height: 200px; overflow-y: scroll;" id="public_notes_panel">
        <br>
    </div>
</div>
<div class="col-md-6">
    <label><b>Private Notes</b></label><br>
    <textarea class="custom-select" rows="3" id="private_notes"></textarea>
    <a onclick="clear_private_notes()" class="btn btn_danger btn-xs">Clear</a>
    <a href="javascript:add_private_note();" class="btn btn-success btn-xs pull-right"><i class="fa fa-plus"></i> Add</a>
    <br>
    <label><b>Notes History</b></label>
    <h5 class="btn btn-primary col-md-12 form_left btn-xs"><i class="fa fa-comments"></i> Comments</h5>
    <div style="height: 200px; overflow-y: scroll;" id="private_notes_panel">
        <br>
    </div>
</div>

</form>
<div class="col-md-12">
    <br><br>
    <div class="card-header card-header-primary">
        <h4 id="process_title" class="card-title"><i class="fa fa-files-o"></i> Attached Documents</h4>
    </div>
    <br>
</div>
<div class="col-md-12">
    <div id="documents_panel"></div>
</div>
    <div class="col-md-12">
        <br><br>
        <div class="card-header card-header-primary">
            <h4 id="process_title" class="card-title"><i class="fa fa-pencil"></i> ETA Notes</h4>
        </div>
        <br>
    </div>
    <div class="col-md-6">
        <label><b>Notes</b></label><br>
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
        <a onclick="save_verifier_details()" id="btn_ok" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Save</a>
        <a href="" class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
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


    var order_id = $('#order_id').val();
    var order_service_details_id = $('#order_service_details_id').val();
    var order_verify_id = $('#order_verify_id').val();
    function update_verifier_details()
    {
        let verifier_details = $('#verifier_details').val().trim();
        let verifier_comments = $('#verifier_comments').val().trim();
        let status = $('#status').val();
        var action = 'update_verfier_details';
        if(verifier_details == "")
        {
            alert('Please enter verifier details!');
            $('#verifier_details').focus();
        }
        else if(verifier_comments == "")
        {
            alert('Please enter verifier comments!');
            $('#verifier_comments').focus();
        }
        else
        {
            $.ajax({
                type:'POST',
                url:'./API/Verifier-Actions.php',
                data:{action, verifier_details, verifier_comments, status, order_service_details_id, order_verify_id, order_id, },
                success:function(html){
                    if(html == "updated")
                    {
                        alert('Verifier Details Updated!');
                    }
                    else
                    {
                        alert("Error occurred!");
                    }
                }
            });
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
                if($('#country_id_'+service_id).val() != "0" && parseFloat($('#state_id_'+service_id).val() || 0) == "0")
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

                if($('#state_id_'+service_id).val() != "0" && parseFloat($('#city_id_'+service_id).val() || 0) == "0")
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

    $('.chosen-select').chosen();
    
    load_attached_documents(<?php echo @$order_id; ?>, <?php echo @$order_service_details_id; ?>);

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
            $('#btn_upload').addClass('disabled_btn');
            $('#modal_loading').css('display', 'block');

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
                        load_attached_documents(<?php echo @$order_id; ?>, <?php echo @$order_service_details_id; ?>);
                        alert('File Uploaded successfully!');
                        $('#document_file').val('');
                        $('#btn_upload').removeClass('disabled_btn');
                        $('#selectedFiles').html('');
                        $('#modal_loading').css('display', 'none');
                    }
                    else
                    {
                        alert('Error occurred');
                        $('#btn_upload').removeClass('disabled_btn');
                    }
                }
            });
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

function download_all_files()
{
    var verifier_user_id = <?php echo $user_id; ?>;
    var action = 'download_all_files';
    $.ajax({
      type:'POST',
      url:'../../system-client/assets/order_master_documents/Download-Files-Zip.php',
      data:{action, order_id, verifier_user_id},
      success:function(html){
        $('#print_result').html(html);
      }
    });
}

function download_all_annexure(order_id, order_service_details_id)
{
    var action = 'download_all_files';
    $.ajax({
      type:'POST',
      url:'../order_master_annexure/Download-Files-Zip.php',
      data:{action, order_id, order_service_details_id},
      success:function(html){
        $('#print_result').html(html);
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

function save_verifier_details()
{
    let verifier_details = $('#verifier_details').val();
    let verifier_comments = $('#verifier_comments').val();
    let status = $('#status').val();
    let closed_date = $('#closed_date').val();
    if(verifier_details == "")
    {
        alert("Please enter verified details!");
        $('#verifier_details').focus();
    }
    else if(verifier_comments == "")
    {
        alert("Please enter verified Comments!");
        $('#verifier_comments').focus();
    }
    else if(status == "")
    {
        alert("Please select status!");
        $('#status').focus();
    }
    else if(closed_date == "")
    {
        alert("Please select closed date!");
        $('#closed_date').focus();
    }
    else
    {
        let r = confirm("Are you sure to Submit your Application to OF?")
        if(r == true)
        {
            $('#btn_ok').addClass('disabled_btn');
            var myform = document.getElementById("verifier_form");
            var fd = new FormData(myform );
            $.ajax({
                url: "./API/Verifier-Actions.php",
                data: fd,
                cache: false,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (html) {
                if(html == "updated")
                {
                    alert('Application updated successfully!');
                    window.location.href = "Dashboard.php";
                }
                else
                {
                    alert('Error occurred');
                    $('#btn_ok').removeClass('disabled_btn');
                }
              }
            });
            }
        }
    }

    function delete_note(order_notes_id)
    {
        var r = confirm("Are you sure to delete this Note?");
        if(r == true)
        {
            var action = 'delete_note';
            $.ajax({
              type:'POST',
              url: "./API/Verifier-Actions.php",
              data:{action, order_notes_id},
              success:function(html){
                $('#print_result').html(html);
                load_notes_con('public');
                load_notes_con('private');
                load_notes_con('eta');
              }
            });
        }
    }

    function delete_annexure_document(order_annexure_document_id)
    {
        var r = confirm("Are you sure to delete this File?");
        if(r == true)
        {
            var action = 'delete_annexure_document';
            $.ajax({
              type:'POST',
              url: "./API/Verifier-Actions.php",
              data:{action, order_annexure_document_id},
              success:function(html){
                $('#print_result').html(html);
                load_attached_documents(<?php echo @$order_id; ?>, <?php echo @$order_service_details_id; ?>);
              }
            });
        }
    }

    function delete_client_document(order_master_uploaded_document_id)
    {
        var r = confirm("Are you sure to delete this File?");
        if(r == true)
        {
            var action = 'delete_client_document';
            $.ajax({
              type:'POST',
              url: "./API/Verifier-Actions.php",
              data:{action, order_master_uploaded_document_id},
              success:function(html){
                $('#print_result').html(html);
                load_attached_documents(<?php echo @$order_id; ?>, <?php echo @$order_service_details_id; ?>);
              }
            });
        }
    }

    function view_all_annexure(order_id, order_service_details_id)
    {
        var action = 'view_all_annexure';
        $.ajax({
          type:'POST',
          url: "./API/Verifier-Actions.php",
          data:{action, order_id, order_service_details_id},
          success:function(html){
            $('#print_result').html(html);
          }
        });
    }

    function upload_document_annexure_file()
    {
        var document_file_annexure = $('#document_file_annexure').prop('files')[0] || 0;
        if(document_file_annexure == "0")
        {
            alert('Please select file!')
            $('#document_file_annexure').focus();
        }
        else
        {
            $('#btn_upload_annexure').addClass('disabled_btn');
            $('#modal_loading').css('display', 'block');

            var myform = document.getElementById("upload_document_annexure_form");
            var fd = new FormData(myform );
            $.ajax({
                url: "./API/Upload-Annexure-Document.php",
                data: fd,
                cache: false,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (html) {
                    if(html == "inserted")
                    {
                        load_attached_documents(<?php echo @$order_id; ?>, <?php echo @$order_service_details_id; ?>);
                        alert('File Uploaded successfully!');
                        $('#document_file_annexure').val('');
                        $('#btn_upload_annexure').removeClass('disabled_btn');
                        $('#selectedFiles_annexure').html('');
                        $('#modal_loading').css('display', 'none');
                    }
                    else
                    {
                        alert('Error occurred');
                        $('#btn_upload_annexure').removeClass('disabled_btn');
                    }
                }
            });
        }
    }
</script>
<?php
}

if($_POST['action'] == 'load_attached_documents')
{
    echo '
    <div class="row">
    <div class="col-md-6">
    <label><h5 style="border-bottom:dotted 2px #ccc;">Client Uploaded Files</h5></label><br>
    <h6 class="selection ">Multiple File Upload (.png, .jpg, .jpeg)</h6>
    <form id="upload_document_form">
        <input type="hidden" name="order_id" value="'.$order_id.'" />
        <input type="hidden" name="order_service_details_id" value="'.$order_service_details_id.'" />
        <div class="row">
        <div class="col-md-8">
        <input type="file" onchange="file_selected_list()" multiple id="document_file" name="document_file[]" accept="image/*" class="form-control" />
        </div>
        <div class="col-md-4">
        <a class="btn btn-success btn-sm" onclick="upload_document_file()" id="btn_upload"><i class="fa fa-upload"></i> Upload Files</a>
        </div>
        </div>
    </form>
    <div class="col-md-12" id="selectedFiles"></div>
    <br>
    <table class="bordered_table" style="width:100%">
        <tr>
            <th><label>File Name</label></th>
            <th style="width:10%;">&nbsp;</th>
            <th style="width:5%;">&nbsp;</th>
        </tr>
    ';
    $check_1='SELECT ad.file_name, ad.document_file, ad.order_master_uploaded_document_id, ad.verifier_user_id, ad.user_id, ad.order_master_uploaded_document_id FROM order_master_uploded_documents ad WHERE ad.order_id = '.$order_id.' AND ad.verifier_user_id = '.$user_id;
    $resul_1 = mysqli_query($db,$check_1);
    while ($row_1 = mysqli_fetch_array($resul_1, MYSQLI_ASSOC))
    {
        if($user_id == $row_1['user_id'])
        {
            $delete_client_documents = '<a onclick="delete_client_document('.$row_1['order_master_uploaded_document_id'].');" style="margin:0;" class="btn btn-danger btn-xs pull-right"><i class="fa fa-trash"></i></a>';
        }
        else
        {
            $delete_client_documents = '';
        }
        echo "<tr><td class='form_left'><label>".$row_1['file_name']."</label></td>";
        echo "<td><a target='_blank' download href='../../system-client/assets/order_master_documents/".$row_1['document_file']."' class='btn btn-primary btn-xs'><i class='fa fa-download'></i> Download</a></td>
        <td>".@$delete_client_documents."</td>
        ";
        echo '<tr>';
    }
    echo '</table>
        <div class="form_left">
            <br>
            <a onclick="download_all_files()" class="btn btn-primary btn-sm"><i class="fa fa-file-archive-o"></i> Download Files Zip</a>
            <br>
        </div>
    </div>
    
    <div style="border-left:dotted 1px #aaa;" class="col-md-6">
        <label><h5 style="border-bottom:dotted 2px #ccc;">Annexure</h5></label><br>
        <h6 class="selection ">Multiple File Upload (.png, .jpg, .jpeg)</h6>
        <form id="upload_document_annexure_form">
            <input type="hidden" name="order_id" value="'.$order_id.'" />
            <input type="hidden" name="order_service_details_id" value="'.$order_service_details_id.'" />
            <div class="row">
            <div class="col-md-8">
            <input type="file" onchange="file_selected_list_annexure()" multiple id="document_file_annexure" name="document_file_annexure[]" accept="image/*" class="form-control" />
            </div>
            <div class="col-md-4">
            <a class="btn btn-success btn-sm" onclick="upload_document_annexure_file()" id="btn_upload_annexure"><i class="fa fa-upload"></i> Upload Files</a>
            </div>
            </div>
        </form>
        <div class="col-md-12" id="selectedFiles_annexure"></div>
        ';
        // <div class"col-md-12 row" style="border:dotted 2px #ccc; padding:10px;">
        $check_1="SELECT d.document_name FROM order_master_documents ad INNER JOIN documentlist d ON d.id= ad.documentlist_id WHERE ad.order_id = '$order_id' AND ad.documentlist_id IN (SELECT documentlist_id FROM service_list_documents WHERE service_id = '$service_id') ";
        $resul_1 = mysqli_query($db,$check_1);
        while ($row_1 = mysqli_fetch_array($resul_1, MYSQLI_ASSOC))
        {
            // echo '<h4 class="btn btn-default btn-xs btn-round" ><i class="fa fa-file"></i> '.$row_1['document_name'].'</h4>';
        }
        // <h5 style="border-bottom:dotted 2px #ccc;">&nbsp;</h5>
        echo '
        <br>    
        <table class="bordered_table" style="width:100%">
        <tr>
            <th><label>File Name</label></th>
            <th style="width:10%;">&nbsp;</th>
            <th style="width:5%;">&nbsp;</th>
        </tr>
        ';
        $check_1="SELECT ad.order_annexure_document_id, ad.file_name, ad.document_file, ad.user_id FROM order_annexure_documents ad WHERE ad.order_id = '$order_id' AND ad.order_service_details_id = '$order_service_details_id' ";
        $resul_1 = mysqli_query($db,$check_1);
        while ($row_1 = mysqli_fetch_array($resul_1, MYSQLI_ASSOC))
        {
            if($user_id == $row_1['user_id'])
            {
                $delete_annexure_documents = '<a onclick="delete_annexure_document('.$row_1['order_annexure_document_id'].');" style="margin:0;" class="btn btn-danger btn-xs pull-right"><i class="fa fa-trash"></i></a>';
            }
            else
            {
                $delete_annexure_documents = '';
            }
            echo "<tr><td class='form_left'><label>".$row_1['file_name']."</label></td>";
            echo "<td><a target='_blank' download href='../order_master_annexure/".$row_1['document_file']."' class='btn btn-primary btn-xs'><i class='fa fa-download'></i> Download</a></td>
            <td>".$delete_annexure_documents."</td>
            ";
            echo '<tr>';
        }
        echo '</table>
            <div class="form_left">
                <br>
                <a onclick="download_all_annexure('.$order_id.', '.$order_service_details_id.')" class="btn btn-primary btn-sm"><i class="fa fa-file-archive-o"></i> Download Files Zip</a>
                <a onclick="view_all_annexure('.$order_id.', '.$order_service_details_id.')" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> View All</a>
                <br>
            </div>
    </div></div>';
}

if($_POST['action'] == 'add_public_notes')
{
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
    $check = "SELECT n.order_notes_id, n.note_type, n.note_description, n.note_date, n.added_date_time, u.first_name, u.last_name, u.user_id FROM order_notes_master n INNER JOIN user_master u ON u.user_id = n.user_id WHERE n.order_service_details_id = '$order_service_details_id' AND n.note_type = '$condition' ORDER BY n.order_notes_id DESC ";
    $resul = mysqli_query($db,$check);
    while($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
    {
        $note_type = $row['note_type'];
        $note_description = $row['note_description'];
        $note_date = date('d-m-Y', strtotime($row['note_date']));
        $added_date_time = date('d-m-Y H:i', strtotime($row['added_date_time']));
        $eta_text = "";
        if($note_type == "eta") { $eta_text = "ETA Date - ".$note_date.' '; }
        $user_name = $row["first_name"].' '.$row["last_name"];
        if($user_id == $row['user_id'])
        {
            $delete_note_button = '<a onclick="delete_note('.$row['order_notes_id'].');" style="margin:0;" class="btn btn-danger btn-xs pull-right"><i class="fa fa-trash"></i></a>';
        }
        else
        {
            $delete_note_button = '';
        }
        echo '
        <div style="box-shadow:0 0 10px #aaa; border:solid 1px #ccc; border-radius:4px; width:100%;float:left; padding:8px;" >
        <div><b>'.$eta_text.'</b>'.$note_description.' 
        '.$delete_note_button.'
        </div>
        <hr style="margin:3px 0;">
        <b>- '.$user_name.'</b>
        <a style="margin:0;" class="pull-right btn btn-round btn_link btn-xs"><i class="fa fa-calendar"></i> '.$added_date_time.'</a>
        
        </div>
        ';
    }
}

?>