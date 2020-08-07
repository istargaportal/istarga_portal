<?php

require_once "../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

$check="SELECT order_id FROM order_master WHERE order_id   ='".$_POST['order_id']."'";
$resul = mysqli_query($db,$check); 
if ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
{
}
	echo '
	<div class="modal" id="preview_order" style="display:block">
		<div class="row">
			<div class="col-md-2">
				<br>
			</div>
			<div class="col-md-8">
				<div class="modal-content">
					<h5 style="border-bottom: solid 1px #000;"><b><i class="fa fa-edit"></i> Preview & Continue</b>
						<a onclick="close_preview_order()" class="btn btn-danger btn-sm pull-right"><i class="fa fa-remove"></i></a>
					</h5>';
	$package_head = '<div class="card-header card-header-primary" style="padding: 4px 8px; margin-top: 10px;"><h4 style="color: #fff;margin: 0;" class="card-title"><i class="fa fa-list"></i> Selected Packages</h4></div>';
	$service_head = '<div class="card-header card-header-primary" style="padding: 4px 8px; margin-top: 10px;"><h4 style="color: #fff;margin: 0;" class="card-title"><i class="fa fa-arrow-circle-right"></i> Selected Services</h4></div>';
	$document_head = '<div class="card-header card-header-primary" style="padding: 4px 8px; margin-bottom: 15px; margin-top: 10px;"><h4 style="color: #fff;margin: 0;" class="card-title"><i class="fa fa-files-o"></i> Documents</h4></div>';
	$package_print = $service_print = $document_print = "";
	$pacakge_count = $service_count = 0;
	$check_2="SELECT od.package_id, od.service_id FROM order_master_details od WHERE od.order_id   ='".$_POST['order_id']."' ";
	$resul_2 = mysqli_query($db,$check_2); 
	while ($row_2 = mysqli_fetch_array($resul_2, MYSQLI_ASSOC))
	{
		$package_id = $row_2['package_id'];
		$service_id = $row_2['service_id'];
		if($package_id != "0")
		{
			$pacakge_count++;
			$check="SELECT p.package_name FROM package_list p WHERE p.id = '$package_id' ";
			$resul = mysqli_query($db,$check); 
			if ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
			{
				$package_name = $row['package_name'];
			}
			$package_print.= '<div><br><div class="col-md-12" style="border:solid 2px #aa50ab; border-radius:10px; width:100%;position:relative;"><h4 class="btn btn-primary btn-sm btn-round" style="position:absolute;top:-20px; left:15px;">'.@$package_name.'</h4><br>';
		    $package_print.= '
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
	        $package_print.= '</div></div>';
	    }
	    
	    if($service_id != "0")
		{
			$service_count++;
			$service_print.= '<div><br><div class="col-md-12" style="border:solid 2px #aa50ab; border-radius:10px; width:100%;posiion:relative;">';
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

	if($pacakge_count == 0)
	{
		$package_print.= '<h6>NO PACKAGE SELECTED</h6>';
	}
	if($service_count == "")
	{
		$service_print.= '<h6>NO SERVICE SELECTED</h6>';
	}
	echo $package_head.$package_print;
	echo $service_head.$service_print;

	echo '	</div>
		</div>
	</div>
	';


?>