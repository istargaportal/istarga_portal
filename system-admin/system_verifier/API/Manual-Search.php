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

if($_POST['action'] == 'load_manual_search')
{
 echo '<table id="datatable_tbl" class="table table-hover" style="margin-top: 4%;">
 <thead class="text-primary" style="background-color: rgba(15, 13, 13, 0.856) !important;">
	 <th width="10">SR.NO.</th>
     <th>Case / Ref.NO. </th>
     <th>Applicant Name</th>
     <th>Verifier Initiation Date</th>
     <th>Expected Closure Date</th>
     <th>Service</th>
     <th>Status</th>
 </thead>
 ';
	$sr = 0;
	$sq="SELECT o.*, c.Client_Name, s.service_name, os.order_creation_date, os.order_completion_date, os.category, os.of_closure_date, sa.sla, ov.status, ov.assigned_date_time, os.order_service_details_id, ov.order_verify_id FROM `order_master` o INNER JOIN client c ON c.id = o.client_id INNER JOIN order_service_details os ON os.order_id = o.order_id INNER JOIN service_list s ON s.id = os.service_id INNER JOIN assigned_service sa ON sa.service_id = os.service_id INNER JOIN order_verifier_details ov ON ov.order_service_details_id = os.order_service_details_id WHERE ov.verifier_id = '$user_id' ";
	if($applicant_name != ""){ $sq.= " AND (o.first_name LIKE '$applicant_name%' OR o.last_name LIKE '$applicant_name%') "; }
	if($case_reference_no != ""){ $sq.= " AND o.case_reference_no LIKE '$case_reference_no%' "; }
	if($initiation_date != ""){ $sq.= " AND ov.assigned_date_time LIKE '$initiation_date%' "; }
	if($status != ""){ $sq.= " AND ov.status = '$status' "; }
    else
        { $sq.= " AND ov.status IN ('Verifier Initiated', 'Insufficiency Verifier', 'Re-assigned') "; }
    if($service_id != ""){ $sq.= " AND os.service_id = '$service_id%' "; }
	$sq.="GROUP BY os.order_service_details_id";
    $result = mysqli_query($db,$sq); 
	while($row = $result->fetch_assoc())
    {
    	$sla = $row['sla'];
    	$sr++;
        if($row["of_closure_date"] != "0000-00-00 00:00:00") { $row["of_closure_date"] = date('d-m-Y', strtotime($row["of_closure_date"])); }
        else { $row["of_closure_date"] = ""; }

        $expected_closure_date = date('d-m-Y', strtotime('+ '.$sla.' days '.$row["order_creation_date"]));
        $row["assigned_date_time"] = date('d-m-Y', strtotime($row["assigned_date_time"]));

        echo '
        <tr>
	        <td class="tablehead1">'.$sr.'</td>
	        <td class="tablehead1"><a class="link_btn" onclick="load_service_order('.$row["order_service_details_id"].', '.$row["order_verify_id"].')" >'.$row["case_reference_no"].'</a></td>
	        <td class="tablehead1 form_left"><a class="link_btn" onclick="load_service_order('.$row["order_service_details_id"].', '.$row["order_verify_id"].')" >'.$row["first_name"].' '.$row["last_name"].' </td></a>
	        <td class="tablehead1">'.$row["assigned_date_time"].'</td>
	        <td class="tablehead1">'.$expected_closure_date.'</td>
	        <td class="tablehead1">'.$row["service_name"].'</td>
	        <td class="tablehead1">'.$row["status"].'</td>
        </tr>
        ';
    }
	echo '</table>';
}

?>