<?php

session_start();
$back_link = "";
if(isset($_SESSION['username']))
{
	$back_link = '../';
}
if(isset($_SESSION['email']))
{
	$back_link = "";
}
require_once "../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

$check="SELECT order_completion_date, case_reference_no, order_id, first_name, middle_name, last_name, alias_first_name, alias_middle_name, alias_last_name, email_id, internal_reference_id, joining_location, joining_date, additional_comments, client_id, is_rush, insufficiency_contact, username, password, order_status, order_creation_date_time FROM order_master WHERE order_id   ='".$_POST['order_id']."'";
$resul = mysqli_query($db,$check); 
if ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
{
	$order_id = $row['order_id'];
	$first_name = $row['first_name'];
	$middle_name = $row['middle_name'];
	$last_name = $row['last_name'];
	$case_reference_no = $row['case_reference_no'];
	$applicant_name = $first_name.' '.$middle_name.' '.$last_name;
	$alias_first_name = $row['alias_first_name'];
	$alias_middle_name = $row['alias_middle_name'];
	$alias_last_name = $row['alias_last_name'];
	$email_id = $row['email_id'];
	$internal_reference_id = $row['internal_reference_id'];
	$joining_location = $row['joining_location'];
	$joining_date = $row['joining_date'];
	$additional_comments = $row['additional_comments'];
	$client_id = $row['client_id'];
	$is_rush = $row['is_rush'];
	$insufficiency_contact = $row['insufficiency_contact'];
	$username = $row['username'];
	$password = $row['password'];
	$order_status = $row['order_status'];
	$order_creation_date_time = date('d-m-Y', strtotime($row['order_creation_date_time']));
	$order_completion_date = "";
	if($row["order_completion_date"] != "")
	{
	    $order_completion_date = date('d-m-Y', strtotime($row["order_completion_date"]));
	}
}

$print_button = "<a target='_blank' href='../".@$back_link."API/Print-Background-Verification-Report.php?order_id=".$order_id."' class='btn btn-primary'> <i class='fa fa-print'></i> Print Report</a>";
if($is_rush == "1") { $is_rush_checked = "checked"; }
$print_form = "'print_form'";
	echo '
	<div class="modal" id="preview_order" style="display:block">
		<div class="row">
			<div class="col-md-2">
				<br>
			</div>
			<div class="col-md-8">
				<div class="modal-content">
					<h5 style="border-bottom: solid 1px #000;"><b><i class="fa fa-edit"></i> View Order</b>
						<a onclick="close_preview_order()" class="btn btn-danger btn-sm pull-right"><i class="fa fa-remove"></i> Close</a>
						<a style="display:none" onclick="print_form_panel('.$print_form.')" class="btn btn-success btn-sm pull-right"><i class="fa fa-print"></i> Print</a>
					</h5>';
	$package_head = '<div class="card-header card-header-primary" style="padding: 4px 8px; margin-top: 10px;"><h4 style="color: #fff;margin: 0;" class="card-title"><i class="fa fa-list"></i> Selected Packages</h4></div>';
	$service_head = '<div class="card-header card-header-primary" style="padding: 4px 8px; margin-top: 10px;"><h4 style="color: #fff;margin: 0;" class="card-title"><i class="fa fa-arrow-circle-right"></i> Selected Services</h4></div>';
	$document_head = '<div class="card-header card-header-primary" style="padding: 4px 8px; margin-bottom: 15px; margin-top: 10px;"><h4 style="color: #fff;margin: 0;" class="card-title"><i class="fa fa-files-o"></i> Documents</h4></div>';
	$package_print = $service_print = $document_print = "";
	$pacakge_count = $service_count = $all_package_id = 0;
	$service_print.= '
		<div class="row">
            <div class="col-md-5">
                <b>Service Name</b>
            </div>
            <div class="col-md-2">
                <b>Country</b>
            </div>
            <div class="col-md-4 no_padding">
                <b>Mandatory Documents</b>
            </div>
            <div class="col-md-1">
                <b>SLA</b>
            </div>
            <hr class="col12" style="margin:4px 0">
        </div>
	';
	$check_2="SELECT od.assign_package_id, od.assign_service_id, od.package_id, od.service_id, od.order_creation_date_cleared, od.color_code FROM order_service_details od WHERE od.order_id ='".$_POST['order_id']."' ";
	$resul_2 = mysqli_query($db,$check_2); 
	while ($row_2 = mysqli_fetch_array($resul_2, MYSQLI_ASSOC))
	{
		if($row_2['color_code'] != "")
		{
			$download_button = "<a target='_blank' href='../".@$back_link."API/Print-Background-Verification-Report.php?order_id=".$order_id."&download=true' class='btn btn-success'> <i class='fa fa-download'></i> Download</a>";
		}
		else
		{
			$download_button = "<a class='btn btn-default disabled_btn'> <i class='fa fa-download'></i> Download</a>";
		}
		$package_id_compare = $row_2['assign_package_id'];
		$package_id = $row_2['package_id'];
		$service_id_compare = $row_2['assign_service_id'];
		$service_id = $row_2['service_id'];
		if($package_id_compare != "0")
		{
			$pacakge_count++;
			$check="SELECT p.package_name, c.name AS country_name, c.currency AS currency_name, a.price FROM assigned_package a INNER JOIN package_list p ON p.id = a.package_id INNER JOIN countries c ON c.id = a.country_id WHERE p.id = '$package_id' AND p.id NOT IN($all_package_id) ";
			$resul = mysqli_query($db,$check); 
			if ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
			{
				$package_name = $row['package_name'];
				$price = $row['price'];
		        $country_name = $row['country_name'];
		        $currency_name = $row['currency_name'];
			
				$package_print.= '<div><br><div class="col-md-12" style="border:solid 2px #aa50ab; border-radius:10px; width:100%;position:relative;"><h4 class="btn btn-primary btn-sm btn-round" style="position:absolute;top:-20px; left:15px;">'.@$package_name.' </h4><h4 class="btn btn-primary btn-sm btn-round" style="position:absolute;top:-20px; right:15px;">'.$price.'.'.$currency_name.'</h4> <br>';
			    $package_print.= '
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
			        
			        $all_documents = "";
			        $check_1='SELECT d.document_name FROM service_list_documents ad INNER JOIN documentlist d ON d.id= ad.documentlist_id WHERE ad.service_id = '.$row['service_id'].'  ';
			        $resul_1 = mysqli_query($db,$check_1);
			        while ($row_1 = mysqli_fetch_array($resul_1, MYSQLI_ASSOC))
			        {
			          $all_documents.="<a class='btn btn-default btn-small'>".$row_1['document_name']."</a>";
			        }
			        $package_print.= '
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
		        $package_print.= '</div></div>';
			}
			$all_package_id.= $package_id.','.$all_package_id;
	    }
	    
	    if($service_id_compare != "0")
		{
			$service_count++;
			$service_print.= '<div><div class="col-md-12" style=" width:100%;posiion:relative;">';
		    $sq="SELECT s.id AS service_id, s.service_name, c.name AS country_name, c.currency AS currency_name, a.price, a.sla FROM service_list s INNER JOIN assigned_service a ON a.service_id = s.id INNER JOIN countries c ON c.id = a.country_id WHERE a.id = '$service_id_compare' ";
		    $resul = mysqli_query($db,$sq); 
		    while($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
		    {
		        $service_name = $row['service_name'];
		        $price = $row['price'];
		        $country_name = @$row['country_name'];
		        $currency_name = @$row['currency_name'];

		        $sla = $row['sla'];
		        $all_documents = "";
		        $check_1='SELECT d.document_name FROM service_list_documents ad INNER JOIN documentlist d ON d.id= ad.documentlist_id WHERE ad.service_id = '.$row['service_id'].'  ';
		        $resul_1 = mysqli_query($db,$check_1);
		        while ($row_1 = mysqli_fetch_array($resul_1, MYSQLI_ASSOC))
		        {
		          $all_documents.="<a class='btn btn-default btn-small'>".$row_1['document_name']."</a>";
		        }
		        $service_print.= '
		            <div class="row" style="border-bottom:solid 1px #ccc;">
		                <div class="col-md-5 no_padding">
		                    <h4 class="selection" style="margin:6px 0;">'.@$service_name.'</h4>
		                </div>
		                <div class="col-md-2">
		                    <h4 class="selection" style="margin:6px 0;">'.$country_name.'</h4>
		                </div>
		                <div class="col-md-4">
		                    '.@$all_documents.'
		                </div>
		                <div class="col-md-1">
		                    <h4 class="selection form_center" style="margin:6px 0;">'.$sla.'</h4>
		                </div>
		                ';
		        $service_print.= '</div>';        
		    }
		    $service_print.= '</div></div>';
		}
	}

	
	if($pacakge_count == 0)
	{
		$package_print.= '<h6>NO PACKAGE SELECTED</h6>';
	}
	if($service_count == "")
	{
		$service_print.= '<h6>NO SERVICE SELECTED</h6>';
	}
	
	
	echo '
	<div id="print_form">
		<div class="row">
			<div class="col-md-6 no_padding">
		        <label><b>Applicant Name:</b> '.$applicant_name.'</label>
		    </div>
		    <div class="col-md-6 no_padding">
		        <label><b>Case Ref No:</b> '.$case_reference_no.'</label>
		    </div>
		    <div class="col-md-6 no_padding">
		        <label><b>Internal Reference ID:</b> '.$internal_reference_id.'</label>
		    </div>
		    <div class="col-md-6 no_padding">
		        <label><b>Joining Date:</b> '.$joining_date.'</label>
		    </div>
		    <div class="col-md-6 no_padding">
		        <label><b>Joining Location:</b> '.$joining_location.'</label>
		    </div>
		    <div class="col-md-6 no_padding">
		        <label><b>Original Order Creation Date:</b> '.$order_creation_date_time.'</label>
		    </div>
		    <div class="col-md-6 no_padding">
		        <label><b>Completion Date:</b> '.$order_completion_date.'</label>
		    </div>
		    <div class="col-md-6 no_padding">
		        <label><b>Completion Status:</b> '.$order_status.'</label>
		    </div>
		    <div class="col-md-6 no_padding">
		        <label><b>Email ID:</b> '.$email_id.'</label>
		    </div>
	    </div>
	';
	echo $package_head.$package_print;
	echo $service_head.$service_print;
?>
	<?php
      $check="SELECT os.order_service_details_id, os.service_id, s.service_name, os.assign_package_id, os.assign_service_id, os.order_creation_date_cleared FROM order_service_details os INNER JOIN service_list s ON s.id = os.service_id WHERE os.order_id   ='".$order_id."'";
      $resul = mysqli_query($db,$check); 
      while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
      {
      	if($row["order_creation_date_cleared"] != "")
      	{
      		$row["order_creation_date_cleared"] = date('d-m-Y', strtotime($row["order_creation_date_cleared"]));
      	}

        $order_service_details_id = $row['order_service_details_id'];
        echo '
        <div class="container-fluid no_padding">
        <div class="row">
        <div class="col-md-12 no_padding">
        <div class="card">
        <div class="card-header card-header-primary" id="panel_msg_'.$row["service_id"].'">
        <h4 style=" color: white;" class="card-title"><i class="fa fa-edit"></i> '.$row["service_name"].' <a class="pull-right">Order Creation Date : <b>'.$row["order_creation_date_cleared"].'</b></a></h4>
        </div>
        <div id="toggle_div_'.$row["service_id"].'" class="row" style="margin-top: 1%;">
        <br><br>
        <table class="input_data_table" style="width:100%;">
		<tr>
			<th style="width:36%">'.$row["service_name"].' Details</th>
			<th style="width:32%">Provided Information</th>
			<th style="width:32%">Verified Information</th>
		</tr>
		';
		$count_fields = 0;
		$check_1 = "SELECT od.order_details_id, sm.service_field, sm.service_field_text, sm.data_type, sm.is_required, od.service_field_value, od.service_field_value_verified, od.service_id FROM order_master_details od INNER JOIN service_field_master sm ON sm.service_field_id = od.service_field_id WHERE od.order_id = '".$order_id."' AND od.service_id = '".$row['service_id']."' ";
	    $resul_1 = mysqli_query($db,$check_1); 
	    while ($row_1 = mysqli_fetch_array($resul_1, MYSQLI_ASSOC))
	    {
	    	if($count_fields == 20)
	    	{
	    		echo '</table>'.@$footer.@$header.'<table class="input_data_table">';
	    		$count_fields = 0;
	    	}
	    	if($row_1["service_field"] == "city_id")
	        {
	        	$check_2 = "SELECT name FROM cities WHERE id = '".$row_1["service_field_value"]."' ";
		        $resul_2 = mysqli_query($db,$check_2); 
		        if ($row_2 = mysqli_fetch_array($resul_2, MYSQLI_ASSOC))
		        { $row_1["service_field_value"] = $row_2['name']; }
	        
	        	$check_2 = "SELECT name FROM cities WHERE id = '".$row_1["service_field_value_verified"]."' ";
		        $resul_2 = mysqli_query($db,$check_2); 
		        if ($row_2 = mysqli_fetch_array($resul_2, MYSQLI_ASSOC))
		        { $row_1["service_field_value_verified"] = $row_2['name']; }
	        }
	        if($row_1["service_field"] == "state_id")
	        {
	        	$check_2 = "SELECT name FROM states WHERE id = '".$row_1["service_field_value"]."' ";
		        $resul_2 = mysqli_query($db,$check_2); 
		        if ($row_2 = mysqli_fetch_array($resul_2, MYSQLI_ASSOC))
		        { $row_1["service_field_value"] = $row_2['name']; }
	        
	        	$check_2 = "SELECT name FROM states WHERE id = '".$row_1["service_field_value_verified"]."' ";
		        $resul_2 = mysqli_query($db,$check_2); 
		        if ($row_2 = mysqli_fetch_array($resul_2, MYSQLI_ASSOC))
		        { $row_1["service_field_value_verified"] = $row_2['name']; }
	        }
	        if($row_1["service_field"] == "country_id")
	        {
	        	$check_2 = "SELECT name FROM countries WHERE id = '".$row_1["service_field_value"]."' ";
		        $resul_2 = mysqli_query($db,$check_2); 
		        if ($row_2 = mysqli_fetch_array($resul_2, MYSQLI_ASSOC))
		        { $row_1["service_field_value"] = $row_2['name']; }
	        
	        	$check_2 = "SELECT name FROM countries WHERE id = '".$row_1["service_field_value_verified"]."' ";
		        $resul_2 = mysqli_query($db,$check_2); 
		        if ($row_2 = mysqli_fetch_array($resul_2, MYSQLI_ASSOC))
		        { $row_1["service_field_value_verified"] = $row_2['name']; }
	        }
	    	echo '
	    	<tr>
	    		<td class="form_left">'.$row_1["service_field_text"].'</td>
	    		<td style="text-align:center" >'.$row_1["service_field_value"].'</td>
	    		<td style="text-align:center" >'.$row_1["service_field_value_verified"].'</td>
	    	</tr>
	    	';
	    	$count_fields++;
	    }
		echo '
		</table>
		<div class="col-md-12" style="border:solid 2px #aa50ab; border-radius:10px; width:100%;posiion:relative;">
		<h4 class="btn btn-primary btn-xs">PUBLIC NOTES</h4>
		';
	 	$check_2 = "SELECT n.note_type, n.note_description, n.note_date, n.added_date_time, u.first_name, u.last_name FROM order_notes_master n INNER JOIN user_master u ON u.user_id = n.user_id WHERE n.order_service_details_id = '$order_service_details_id' AND n.note_type = 'public' ORDER BY n.order_notes_id DESC ";
	    $resul_2 = mysqli_query($db,$check_2);
	    while($row_2 = mysqli_fetch_array($resul_2, MYSQLI_ASSOC))
	    {
	    	$note_description = $row_2['note_description'];
	        $added_date_time = date('d-m-Y H:i', strtotime($row_2['added_date_time']));
	        echo '
	        <div class="col-md-12">
	            <b>'.$added_date_time.'</b> - '.$note_description.'
	        </div>
	        ';
	    }
		echo '
		</div>
        </div>
        </div>
        </div>
        </div>
        </div>
        ';
      }
    	echo $download_button.' '.$print_button;
      ?>
<?php
	echo '	</div>
			</div>
		</div>
	</div>
	';
?>
<style type="text/css">
	.input_data_table {
  border-collapse: collapse;
  width: 100%;
}

.input_data_table th, .input_data_table td {
  text-align: left;
  padding: 4px 6px;
  font-size:11pt;
	color: #222;
}

.input_data_table th{
	padding:8px 6px;
}

.input_data_table th, .input_data_table tr, .input_data_table td, .input_data_table
{
	border-top:solid 1px #ccc;
	border-bottom:solid 1px #ccc;
	border-collapse:collapse;
}
// .input_data_table tr:nth-child(odd){background-color: #b1d9f0}

.input_data_table th {
  background-color: #eee;
  color: #000;
  font-weight:bold;
}
</style>
<script type="text/javascript">
	function print_form_panel(print_panel)
	{
		var printContents = document.getElementById(print_panel).innerHTML;
		var originalContents = document.body.innerHTML;
		document.body.innerHTML = printContents;
		$('#datatable_tbl_filter').css('display', 'none');
		$('#datatable_tbl_length').css('display', 'none');
		$('#datatable_tbl_paginate').css('display', 'none');
		window.print();
		location.reload();
		// window.location.href = 'ClientViewOrder.php?view_id=<?php echo base64_encode(@$order_id); ?>';
	}

	function close_preview_order()
	{
	  // window.history.replaceState({}, document.title, "/" + "BGVHWD-master/system-client/vieworder.php");
	  $('#print_result').html('');
	}
</script>