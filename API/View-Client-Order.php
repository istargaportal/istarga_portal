<?php

require_once "../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

$check="SELECT order_id, first_name, middle_name, last_name, alias_first_name, alias_middle_name, alias_last_name, email_id, internal_reference_id, joining_location, joining_date, additional_comments, client_id, is_rush, insufficiency_contact, username, password, order_status, order_creation_date_time FROM order_master WHERE order_id   ='".$_POST['order_id']."'";
$resul = mysqli_query($db,$check); 
if ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
{
	$order_id = $row['order_id'];
	$first_name = $row['first_name'];
	$middle_name = $row['middle_name'];
	$last_name = $row['last_name'];
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
	$order_creation_date_time = date('d-m-Y H:i', strtotime($row['order_creation_date_time']));
}
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
					<h5 style="border-bottom: solid 1px #000;"><b><i class="fa fa-edit"></i> Preview & Continue</b>
						<a onclick="close_preview_order()" class="btn btn-danger btn-sm pull-right"><i class="fa fa-remove"></i> Close</a>
						<a onclick="print_form_panel('.$print_form.')" class="btn btn-success btn-sm pull-right"><i class="fa fa-print"></i> Print</a>
					</h5>';
	$package_head = '<div class="card-header card-header-primary" style="padding: 4px 8px; margin-top: 10px;"><h4 style="color: #fff;margin: 0;" class="card-title"><i class="fa fa-list"></i> Selected Packages</h4></div>';
	$service_head = '<div class="card-header card-header-primary" style="padding: 4px 8px; margin-top: 10px;"><h4 style="color: #fff;margin: 0;" class="card-title"><i class="fa fa-arrow-circle-right"></i> Selected Services</h4></div>';
	$document_head = '<div class="card-header card-header-primary" style="padding: 4px 8px; margin-bottom: 15px; margin-top: 10px;"><h4 style="color: #fff;margin: 0;" class="card-title"><i class="fa fa-files-o"></i> Documents</h4></div>';
	$package_print = $service_print = $document_print = "";
	$pacakge_count = $service_count = $all_package_id = 0;
	$check_2="SELECT od.assign_package_id, od.assign_service_id, od.package_id, od.service_id FROM order_service_details od WHERE od.order_id ='".$_POST['order_id']."' ";
	$resul_2 = mysqli_query($db,$check_2); 
	while ($row_2 = mysqli_fetch_array($resul_2, MYSQLI_ASSOC))
	{
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
			$service_print.= '<div><br><div class="col-md-12" style="border:solid 2px #aa50ab; border-radius:10px; width:100%;posiion:relative;">';
		    $sq="SELECT s.id AS service_id, s.service_name, c.name AS country_name, c.currency AS currency_name, a.price FROM service_list s INNER JOIN assigned_service a ON a.service_id = s.id INNER JOIN countries c ON c.id = a.country_id  WHERE a.id = '$service_id' ";
		    $resul = mysqli_query($db,$sq); 
		    while($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
		    {
		        $service_name = $row['service_name'];
		        $price = $row['price'];
		        $country_name = @$row['country_name'];
		        $currency_name = @$row['currency_name'];

		        $all_documents = "";
		        $check_1='SELECT d.document_name FROM service_list_documents ad INNER JOIN documentlist d ON d.id= ad.documentlist_id WHERE ad.service_id = '.$row['service_id'].'  ';
		        $resul_1 = mysqli_query($db,$check_1);
		        while ($row_1 = mysqli_fetch_array($resul_1, MYSQLI_ASSOC))
		        {
		          $all_documents.="<a class='btn btn-default btn-small'>".$row_1['document_name']."</a>";
		        }
		        $service_print.= '
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
		        $service_print.= '</div>';        
		    }
		    $service_print.= '</div></div>';
		}
	}

	$document_print.='<div class="row"><div class="col-md-6"><h6>Documents List</h6>';
    $check_1='SELECT d.document_name FROM order_master_documents ad INNER JOIN documentlist d ON d.id= ad.documentlist_id WHERE ad.order_id = '.$_POST['order_id'].'  ';
    $resul_1 = mysqli_query($db,$check_1);
    while ($row_1 = mysqli_fetch_array($resul_1, MYSQLI_ASSOC))
    {
		$document_print.='<h4 class="selection" style="margin:6px 0;">'.$row_1['document_name'].'</h4><hr class="col12" style="margin:4px 0">';
    }
    $document_print.='</div><div class="col-md-6"><h6>Uploaded Documents</h6>';
    $check_1='SELECT ad.file_name, ad.document_file FROM order_master_uploded_documents ad WHERE ad.order_id = '.$_POST['order_id'].'  ';
    $resul_1 = mysqli_query($db,$check_1);
    while ($row_1 = mysqli_fetch_array($resul_1, MYSQLI_ASSOC))
    {
		$document_print.= "<a target='_blank' href='assets/order_master_documents/".$row_1['document_file']."' class='btn btn-primary btn-xs'><i class='fa fa-download'></i> ".$row_1['file_name']."</a>";
	}

	$document_print.='</div></div>';


	if($pacakge_count == 0)
	{
		$package_print.= '<h6>NO PACKAGE SELECTED</h6>';
	}
	if($service_count == "")
	{
		$service_print.= '<h6>NO SERVICE SELECTED</h6>';
	}
	if($order_status == 0) { $order_status = '<a class="btn pull-right btn-warning btn-xs">Pending</a>'; }
	if($order_status == 1) { $order_status = '<a class="btn pull-right btn-success btn-xs">Started</a>'; }
	if($order_status == 2) { $order_status = '<a class="btn pull-right btn-primary btn-xs">Completed</a>'; }

	echo '
	<div id="print_form">
	<h5 style="margin:0;">Applicant - '.$first_name.' '.$last_name.' - <a style="color:blue">'.$email_id.'</a> 
	'.@$order_status.'
	</h5>
	<h5>Internal Reference ID - '.$internal_reference_id.' | '.$order_creation_date_time.'</h5>
		<div class="form-check">
			<label class="form-check-label">
				<input class="form-check-input" disabled type="checkbox" '.@$is_rush_checked.' >
				Rush Order
				<span class="form-check-sign">
					<span class="check"></span>
				</span>
			</label>
			<label class="form-check-label pull-right">
			In Case Of Insufficiency Contact? - <b>'.@$insufficiency_contact.'</b>
			</label>
		</div>
		

	';
	echo $package_head.$package_print;
	echo $service_head.$service_print;
	echo $document_head.$document_print;

	echo '	</div>
			</div>
		</div>
	</div>
	';


?>
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