<?php

session_start();
$client_id = $_SESSION['uid'];

require_once "../../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

extract($_POST);

if($report_type == 'order_level')
{
echo '
<thead>
	<tr>
		<th>ApplicantId</th>
		<th>ApplicantName</th>
		<th>CaseRefNo</th>
		<th>Verification Start Date</th>
		<th>Original Order Creation Date</th>
		<th>LOBName</th>
		<th>DOJ</th>
		<th>EmailId</th>
		<th>POC</th>
		<th>DataEntrycompleted</th>
		<th>Applicant Joining Location</th>
		<th>TAT DATE</th>
		<th>SLA</th>
		<th>Closed Date</th>
		<th>OrderStatus</th>
		<th>Report Status</th>
		<th>Color Status</th>
		<th>Order Completed Date</th>
		<th>Is Rush Order</th>
		<th>Additional Comments</th>
		<th>Last updated Public comment</th>
	</tr>
</thead>
';
	$sq="SELECT o.*, os.color_code, c.Client_SPOC, c.Client_Name, s.service_name, os.order_creation_date, os.order_completion_date, os.category, os.of_closure_date, sa.sla, os.order_status, os.of_qc_order_status, os.of_assigned_date, os.of_user_id, os.order_creation_date_cleared, os.order_service_details_id, o.additional_comments FROM `order_master` o INNER JOIN client c ON c.id = o.client_id INNER JOIN order_service_details os ON os.order_id = o.order_id INNER JOIN service_list s ON s.id = os.service_id INNER JOIN assigned_service sa ON sa.service_id = os.service_id WHERE o.client_id = '$client_id' GROUP BY os.order_service_details_id ";
	$result = mysqli_query($db,$sq); 
	while($row = $result->fetch_assoc())
	{
		$sla = $row['sla'];
    	$sla_final_date = date('Y-m-d', strtotime(' + '.$sla.' days'.$row['order_creation_date']));
    	$lob_name = "";
    	$of_user_id = $row['of_user_id'];
		$cmd_1="SELECT lm.lob_master_client_id FROM lob_master lm WHERE lm.lob_id IN(SELECT lob_id FROM lob_details WHERE client_id = '$client_id') ";
		$result_1 = mysqli_query($db,$cmd_1); 
		if($row_1 = $result_1->fetch_assoc())
		{
			$lob_master_client_id = $row_1['lob_master_client_id'];
		}
		else
		{
			$cmd_1="SELECT lm.lob_master_client_id FROM lob_master lm WHERE lm.lob_master_client_id = '$client_id' ";
			$result_1 = mysqli_query($db,$cmd_1); 
			if($row_1 = $result_1->fetch_assoc())
			{
				$lob_master_client_id = $row_1['lob_master_client_id'];
			}
		}
		$cmd_1="SELECT Client_Name FROM client WHERE id = '$lob_master_client_id' ";
		$result_1 = mysqli_query($db,$cmd_1); 
		if($row_1 = $result_1->fetch_assoc())
		{
			$lob_name = $row_1['Client_Name'];
		}

		$eta_date = "";
		$cmd_1="SELECT note_date FROM order_notes_master WHERE note_type = 'eta' AND order_service_details_id = '".$row['order_service_details_id']."' ORDER BY order_notes_id DESC LIMIT 1 ";
		$result_1 = mysqli_query($db,$cmd_1); 
		if($row_1 = $result_1->fetch_assoc())
		{
			$eta_date = $row_1['note_date'];
		}

		$last_updated_public_comment = "";
		$cmd_1="SELECT added_date_time, note_description FROM order_notes_master WHERE note_type = 'public' AND order_service_details_id = '".$row['order_service_details_id']."' ORDER BY order_notes_id DESC LIMIT 1 ";
		$result_1 = mysqli_query($db,$cmd_1); 
		if($row_1 = $result_1->fetch_assoc())
		{
			$last_updated_public_comment = $row_1['added_date_time'].' - '.$row_1['note_description'];
		}

		if(strtotime($sla_final_date) < strtotime(date('Y-m-d')))
		{
			$sla_print = "Out of SLA";
		}
		else
		{
			$sla_print = "With in SLA";
		}
	    if($row['is_rush'] == "1") { $row['is_rush'] = "Yes"; } else { $row['is_rush'] = "No"; }
	    $color_code = $row['color_code'];

		if($color_code == "#eb1e2f"){ $color_code = "Red"; }
		if($color_code == "#25ce60"){ $color_code = "Green"; }
		if($color_code == "#ffbf00"){ $color_code = "Amber"; }
		if($color_code == "#ccc"){ $color_code = "Gray"; }

		if($row['of_closure_date'] == "0000-00-00") { $row['of_closure_date'] = ""; }
		echo '
		<tr>
			<td>'.$row["internal_reference_id"].'</td>
			<td>'.$row["first_name"].' '.$row["last_name"].'</td>
			<td>'.$row["case_reference_no"].'</td>
			<td>'.$row["of_assigned_date"].'</td>
			<td>'.$row["order_creation_date"].'</td>
			<td>'.$lob_name.'</td>
			<td>'.$row["joining_date"].'</td>
			<td>'.$row["email_id"].'</td>
			<td>'.$row["Client_SPOC"].'</td>
			<td>'.$row["order_creation_date_cleared"].'</td>
			<td>'.$row["joining_location"].'</td>
			<td>'.$eta_date.'</td>
			<td>'.$sla_print.'</td>
			<td>'.$row["of_closure_date"].'</td>
			<td>'.$row["order_status"].'</td>
			<td>'.$row["of_qc_order_status"].'</td>
			<td>'.$color_code.'</td>
			<td>'.$row["order_completion_date"].'</td>
			<td>'.$row["is_rush"].'</td>
			<td>'.$row["additional_comments"].'</td>
			<td>'.$last_updated_public_comment.'</td>
		</tr>
		';
	}

}

?>