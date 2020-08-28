<?php
include '../config/config.php';
$get_connection=new connectdb;
$db=$get_connection->connect();

if (mysqli_connect_errno($db)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$order_id = base64_decode($_GET['order_id']);
$check="SELECT c.Client_Name, o.order_id, o.first_name, o.middle_name, o.last_name, o.alias_first_name, o.alias_middle_name, o.alias_last_name, o.email_id, o.internal_reference_id, o.joining_location, o.joining_date, o.additional_comments, o.client_id, o.is_rush, o.insufficiency_contact, o.username, o.password, o.order_status, o.order_creation_date_time, o.case_reference_no, o.order_completion_date, o.complete_info_received_date FROM order_master o INNER JOIN client c ON c.id = o.client_id WHERE o.order_id   ='".$order_id."'";
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
  $case_reference_no = $row['case_reference_no'];
  $Client_Name = $row['Client_Name'];
  $order_creation_date_time = date('d-m-Y', strtotime($row['order_creation_date_time']));
  $order_completion_date = date('d-m-Y', strtotime($row['order_completion_date']));
  $complete_info_received_date = date('d-m-Y', strtotime($row['complete_info_received_date']));
}
$applicant_name = $first_name.' '.$middle_name.' '.$last_name;

$all_services_list = '';
$check="SELECT s.service_name FROM order_service_details os INNER JOIN service_list s ON s.id = os.service_id WHERE os.order_id   ='".$order_id."'";
$resul = mysqli_query($db,$check); 
while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
{
	if($all_services_list == "")
	{
		$all_services_list = $row['service_name'];
	}
	else
	{
		$all_services_list = $all_services_list.', '.$row['service_name'];
	}
}
$header = '
<div style="height:1004px;" id="page-border">
	<div class="col-md-5">
		<img src="logo.png" style="width:70%;" />
		<h6>ACTIONABLE INSIGHTS YOU TRUST</h6>
	</div>
	<div class="col-md-6">
		<h2 style="font-size:16pt;">Background Verification Report</h2>
		<h6 style="color:#777;">CONFIDENTIAL INFORMATION!</h6>
	</div>
	<div class="col-md-1">
		<img src="check.png" style="width:100%;" />
	</div>
	<div style="border-bottom:solid 1px #ccc;width:98%; margin:1%;"></div>
	';

$footer = '
	<br>
	<div class="col-md-12 center" style="border-top:solid 1px #ccc;font-size:9pt;padding:4px 0;">
		<i>The Information is Confidential and may be used only by Authorized personnel<br><b>ISTARGA SOLUTIONS LLP<b></i><br>
		<a href="https://www.istarga.com" target="_blank">www.istarga.com/</a> | 
		<a href="mailto:'.@$service_email_id.'" target="_blank">'.@$service_email_id.'</a> | 
		<a href="tel:'.@$service_contact_no.'" target="_blank">'.@$service_contact_no.'</a>
	</div>
</div>';

$html = '
<style>
p{
	font-size:12pt;
	color:#777;
}

@page {
	margin: 40px 50px;
}
#page-border{
 padding: 1em;
 border-top:solid 12px #ccc;
 border-bottom:solid 12px #ccc;
 border-left:solid 1px #ccc;
 border-right:solid 1px #ccc;
 background-color: #FFFFFF ;
}
.underline{
	text-decoration:underline;
}
table{
	width:100%;
	
tr, td, th{
	padding:4px;
	font-size:8pt;
}
th{
}
body, *{
	font-family: Calibri;
}
.col-md-1 {float:left; width: 8.33%;}
.col-md-2 {float:left; width: 16.66%;}
.col-md-3 {float:left; width: 25%;}
.col-md-4 {float:left; width: 33.33%;}
.col-md-5 {float:left; width: 41.66%;}
.col-md-6 {float:left; width: 50%;}
.col-md-7 {float:left; width: 58.33%;}
.col-md-8 {float:left; width: 66.66%;}
.col-md-9 {float:left; width: 75%;}
.col-md-10 {float:left; width: 83.33%;}
.col-md-11 {float:left; width: 91.66%;}
.col-md-12 {float:left; width: 100%;}
.center{ text-align:center; }
.right{ text-align:right; }
.left{ text-align:left; }

.border_left{
	border-left:dotted 2px #000;
}
.border_right{
	border-right:dotted 2px #000;
}
.border_top{
	border-top:dotted 2px #000;
}
.border_bottom{
	border-bottom:dotted 2px #000;
}
h1, h2, h3, h4, h5, h6{
	margin:0;
	padding:0;
}
h6{
	color:#777;
	font-weight:normal;
	margin-bottom:4px;
	font-size:10pt;
}
.border_verify_status
{
	border:solid 2px #ccc;
	text-align:center;
	font-weight:bold;
}
.border_background_color
{
	background-color:#ccc;;
}
.table_services table, .table_services, .table_services tr, .table_services th{
	color:#777;
	border-top:solid #bebdc3;
	border-bottom:solid #bebdc3;
	border-collapse:collapse;
	padding:10px;
}
.table_services th{ font-size:11pt;	}
.table_services td{ font-size:14pt; font-weight:bold; padding:15px; }

.input_data_table {
  border-collapse: collapse;
  width: 100%;
}

.input_data_table th, .input_data_table td {
  text-align: left;
  padding: 4px 6px;
  font-size:11pt;
	color: #555;
}

.input_data_table th, .input_data_table tr, .input_data_table td, .input_data_table
{
	border:solid 1px #ccc;
	border-collapse:collapse;
}
.input_data_table tr:nth-child(odd){background-color: #b1d9f0}

.input_data_table th {
  background-color: #b1d9f0;
  color: #000;
  font-weight:bold;
}
</style>

'.$header.'
<div class="col-md-12">
	<br>
	<div class="col-md-6">
		<h6>Applicant Name : '.$applicant_name.'</h6>
		<h6>Case Ref Number : '.$case_reference_no.'</h6>
		<h6>Client : '.$Client_Name.'</h6>
		<h6>Entity Name : '.$Client_Name.'</h6>
	</div>
	<div class="col-md-6">
		<h6>Order Date : '.$order_creation_date_time.'</h6>
		<h6>Complete Information Received Date : '.$complete_info_received_date.'</h6>
		<h6>Order Completion Date : '.$order_completion_date.'</h6>
	</div>
	<div class="col-md-12"><br></div>
	<div class="col-md-12 border_verify_status">
		<div class="col-md-4">REPORT STATUS</div>
		<div class="col-md-8 border_background_color">'.strtoupper($order_status).'</div>
	</div>
	<h3 style="color:#666; margin:10px 0; border-bottom:solid 1px #aa50ab">Verification Summary </h3>
	<p>For '.@$applicant_name.' (Applicant ID: '.@$order_id.' ), the requested <b>'.@$all_services_list.'</b> services were performed successfully and all the information provided by the Applicant is true and accurate.</p>
	
	<h3 style="color:#666; margin:10px 0;" class="center">Investigation Summary </h3>

	<table class="table_services">
		<tr>
			<th>SERVICE NAME</th>
			<th> ---- Verification Status ----</th>
		</tr>
	';
	$check="SELECT s.service_name, os.order_status, st.name AS service_type_name FROM order_service_details os INNER JOIN service_list s ON s.id = os.service_id INNER JOIN service_type st ON st.id = s.service_type_id WHERE os.order_id   ='".$order_id."'";
	$resul = mysqli_query($db,$check); 
	while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
	{
		$html.='
		<tr>
			<td>
				'.$row['service_name'].'
				<h6>'.$row['service_type_name'].'</h6>
			</td>
			<td class="center">'.$row['order_status'].'</td>
		</tr>
		';
	}
	$html.='
	</table>
	<p style="font-size:8pt;">The information in this report may have been procured from third-party sources who maintain this information. Istarga endeavours to ensure accurate results; however, we do not provide a guarantee of the accuracy and/ or completeness of the information provided by our partners and/or sources. By engaging with <b>ISTARGA SOLUTIONS LLP</b>, you release <b>ISTARGA SOLUTIONS LLP</b> and its Affiliates including officers, agents, and employees from all liability for any negligence associated with providing the enclosed information. The information provided in this report is strictly intended only for the confidential use of the designated client named above. Without prior consent of Istarga, reproducing, photocopying and transmitting any part of the report is strictly prohibited and will be considered unlawful.<br><b>Confidential Information</b>
	</p>
</div>
'.$footer;

$check="SELECT s.service_name, os.order_status, st.name AS service_type_name, os.service_id, os.order_service_details_id FROM order_service_details os INNER JOIN service_list s ON s.id = os.service_id INNER JOIN service_type st ON st.id = s.service_type_id WHERE os.order_id   ='".$order_id."'";
$resul = mysqli_query($db,$check); 
while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
{
	$order_service_details_id = $row['order_service_details_id'];
	$html.=$header;
	$html.='
	<h1>'.$row["service_name"].'</h1>
	<h2 style="font-weight:normal;color:#777;">'.$applicant_name.'</h2>
	<h6>Case Ref Number : '.$case_reference_no.'</h6>
	<h6>Client : '.$Client_Name.'</h6>
	<div class="col-md-12"><br></div>
	<div class="col-md-12 border_verify_status">
		<div class="col-md-4">REPORT STATUS</div>
		<div class="col-md-8 border_background_color">'.strtoupper($row['order_status']).'</div>
	</div>

	<h3 style="color:#666; margin:15px 0; border-bottom:solid 1px #aa50ab">'.$row["service_name"].' Verification Report </h3>
	<table class="input_data_table">
		<tr>
			<th style="width:36%">'.$row["service_name"].' Detail</th>
			<th style="width:32%">Provided Information</th>
			<th style="width:32%">Verified Information</th>
		</tr>
	';
	$check_1 = "SELECT od.order_details_id, sm.service_field, sm.service_field_text, sm.data_type, sm.is_required, od.service_field_value, od.service_field_value_verified, od.service_id FROM order_master_details od INNER JOIN service_field_master sm ON sm.service_field_id = od.service_field_id WHERE od.order_id = '".$order_id."' AND od.service_id = '".$row['service_id']."' ";
    $resul_1 = mysqli_query($db,$check_1); 
    while ($row_1 = mysqli_fetch_array($resul_1, MYSQLI_ASSOC))
    {
    	$html.='
    	<tr>
    		<td>'.$row_1["service_field_text"].'</td>
    		<td>'.$row_1["service_field_value"].'</td>
    		<td>'.$row_1["service_field_value_verified"].'</td>
    	</tr>
    	';
    }
	$html.='
	</table>
	<h4 style="background:#b1d9f0; margin:10px 0; padding:3px;" class="center">VERIFICATION APPROACH DETAILS</h4>
	';
 	$check_2 = "SELECT n.note_type, n.note_description, n.note_date, n.added_date_time, u.first_name, u.last_name FROM order_notes_master n INNER JOIN user_master u ON u.user_id = n.user_id WHERE n.order_service_details_id = '$order_service_details_id' AND n.note_type = 'public' ORDER BY n.order_notes_id DESC ";
    $resul_2 = mysqli_query($db,$check_2);
    while($row_2 = mysqli_fetch_array($resul_2, MYSQLI_ASSOC))
    {
    	$note_description = $row_2['note_description'];
        $added_date_time = date('d-m-Y H:i', strtotime($row_2['added_date_time']));
        $html.='
        <div>
            <b>'.$added_date_time.'</b> - '.$note_description.'
        </div>
        ';
    }
	$html.=$footer;
}

$i = 1;
$check_1='SELECT ad.document_file FROM order_master_uploded_documents ad WHERE ad.order_id = '.$order_id.'  ';
$resul_1 = mysqli_query($db,$check_1);
while ($row_1 = mysqli_fetch_array($resul_1, MYSQLI_ASSOC))
{
	$html.=$header;
	$html.='<h2>Annexure '.$i.'</h2><br>
	<div class="col-md-1"><br></div>
	<div class="col-md-10">
		<img src="../system-client/assets/order_master_documents/'.$row_1["document_file"].'" style="width:100%;" />
	</div>
	<div class="col-md-12"><br></div>
	';
	$html.=$footer;
    $i++;
}

include("mpdf60/mpdf.php");
// $mpdf=new mPDF('c', 'A4-L'); 
$mpdf=new mPDF('c'); 

// $mpdf->SetWatermarkImage('../../images/logo.png');
// $mpdf->showWatermarkImage = true;

$mpdf->mirrorMargins = true;

// $mpdf->SetHTMLHeader("h5>Mahesh</h5>");
// $mpdf->SetHTMLHeader("h5>Mahesh</h5>", 'E');
// $mpdf->SetHTMLFooter("h5>Mahesh</h5>");
// $mpdf->SetHTMLFooter("h5>Mahesh</h5>", 'E');

// $mpdf->SetDisplayMode('fullpage','two');
$mpdf->WriteHTML($html);
$mpdf->Output($case_reference_no.'.pdf', 'I');
// $mpdf->Output("MAHESH.pdf", "D");
// $mpdf->Output("MAHESH.pdf", "F");

$mpdf=new mPDF('','A4');

?>