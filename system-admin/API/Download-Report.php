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
		<th>Client Code</th>
		<th>Client Name</th>
		<th>Is Rush Order</th>
		<th>Case Ref No</th>
		<th>Applicant Name</th>
		<th>Applicant Id</th>
		<th>POC</th>
		<th>Package</th>
		<th>Service Type Name</th>
		<th>Service Name</th>
		<th>DOJ</th>
		<th>Insufficiency Raised Date</th>
		<th>Insufficiency Cleared Date</th>
		<th>Verifier Name</th>
		<th>Verifier Initiation Date</th>
		<th>Verifier Closed Date</th>
		<th>Additional Comments</th>
		<th>Additional Fees</th>
		<th>LOB Name</th>
		<th>Queue Name</th>
		<th>Order Status</th>
		<th>Original Order Creation Date</th>
		<th>Expected Closure Date</th>
		<th>Original SLA</th>
		<th>SLA</th>
		<th>Order Completed Date</th>
		<th>Report Sent</th>
		<th>Last Public notes Updated By</th>
		<th>DateTime of Last updated Public Notes</th>
		<th>Last Private notes Updated By</th>
		<th>DateTime of Last updated Private Notes</th>
		<th>Reassign Date</th>
		<th>OF-Final QC closed date and time</th
	</tr>
</thead>
';
	$sq="SELECT o.order_completion_date, os.additional_fees, o.*, st.name AS service_type_name, c.Client_Code, c.Client_Name, os.color_code, c.Client_SPOC, c.Client_Name, s.service_name, os.order_creation_date, os.order_completion_date AS order_completion_date_of_qc, os.category, os.of_closure_date, sa.sla, os.order_status, os.of_qc_order_status, os.of_assigned_date, os.of_user_id, os.order_creation_date_cleared, os.order_service_details_id, o.additional_comments FROM `order_master` o INNER JOIN client c ON c.id = o.client_id INNER JOIN order_service_details os ON os.order_id = o.order_id INNER JOIN service_list s ON s.id = os.service_id INNER JOIN assigned_service sa ON sa.service_id = os.service_id INNER JOIN service_type st ON st.id = s.service_type_id GROUP BY os.order_service_details_id ";
	$result = mysqli_query($db,$sq); 
	while($row = $result->fetch_assoc())
	{
		$sla = $row['sla'];
    	$expected_closed_date = date('Y-m-d', strtotime(' + '.$sla.' days'.$row['order_creation_date']));
    	$lob_name = "";
    	$of_user_id = $row['of_user_id'];
		$selected_packages = "";
		$query_1="SELECT p.package_name FROM order_service_details os INNER JOIN package_list p ON p.id = os.package_id WHERE os.order_service_details_id = '".$row['order_service_details_id']."' GROUP BY os.package_id ";
		$result_1 = mysqli_query($db,$query_1); 
		if($result_1->num_rows>0)
		{
			if($row_1 = $result_1->fetch_assoc())
			{
				$selected_packages.= $row_1['package_name']."<br>"; 
			}
		}

		$insufficiency_raised_date = "";
		$query_1="SELECT added_date_time FROM order_insufficiency_details WHERE order_service_details_id = '".$row['order_service_details_id']."' ";
		$result_1 = mysqli_query($db,$query_1); 
		if($result_1->num_rows>0)
		{
			if($row_1 = $result_1->fetch_assoc())
			{
				$insufficiency_raised_date = $row_1['added_date_time']; 
			}
		}

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

		$last_public_note_added_date_time = ""; $last_public_note_added_by = "";
		$cmd_1="SELECT om.added_date_time, om.note_description, u.first_name, u.last_name FROM order_notes_master om INNER JOIN user_master u ON u.user_id = om.user_id WHERE om.note_type = 'public' AND om.order_service_details_id = '".$row['order_service_details_id']."' ORDER BY om.order_notes_id DESC LIMIT 1 ";
		$result_1 = mysqli_query($db,$cmd_1); 
		if($row_1 = $result_1->fetch_assoc())
		{
			$last_public_note_added_date_time = $row_1['added_date_time'];
			$last_public_note_added_by = $row_1['first_name'].' '.$row_1['last_name'];
		}

		$last_private_note_added_date_time = ""; $last_private_note_added_by = "";
		$cmd_1="SELECT om.added_date_time, om.note_description, u.first_name, u.last_name FROM order_notes_master om INNER JOIN user_master u ON u.user_id = om.user_id WHERE om.note_type = 'private' AND om.order_service_details_id = '".$row['order_service_details_id']."' ORDER BY om.order_notes_id DESC LIMIT 1 ";
		$result_1 = mysqli_query($db,$cmd_1); 
		if($row_1 = $result_1->fetch_assoc())
		{
			$last_private_note_added_date_time = $row_1['added_date_time'];
			$last_private_note_added_by = $row_1['first_name'].' '.$row_1['last_name'];
		}

		if(strtotime($expected_closed_date) < strtotime($row["order_completion_date"]))
		{
			$sla_print = "Out of SLA";
		}
		else
		{
			$sla_print = "With in SLA";
		}
		if($row["order_completion_date"] == "")
		{
			$sla_print = "-";
		}
	    if($row['is_rush'] == "1") { $row['is_rush'] = "Yes"; } else { $row['is_rush'] = "No"; }
	    $color_code = $row['color_code'];

		if($color_code == "#eb1e2f"){ $color_code = "Red"; }
		if($color_code == "#25ce60"){ $color_code = "Green"; }
		if($color_code == "#ffbf00"){ $color_code = "Amber"; }
		if($color_code == "#ccc"){ $color_code = "Gray"; }

		if($row['of_closure_date'] == "0000-00-00") { $row['of_closure_date'] = ""; }

		$verfifier_closed_date = ""; $verfifier_initialize_date = ""; $verfier_name = "";
		$cmd_1="SELECT ov.closed_date, ov.assigned_date_time, u.first_name, u.last_name FROM order_verifier_details ov INNER JOIN user_master u ON u.user_id = ov.verifier_id WHERE ov.order_service_details_id = '".$row['order_service_details_id']."' ";
		$result_1 = mysqli_query($db,$cmd_1); 
		if($row_1 = $result_1->fetch_assoc())
		{
			$verfifier_closed_date = $row_1['closed_date'];
			$verfifier_initialize_date = $row_1['assigned_date_time'];
			$verfier_name = $row_1['first_name'].' '.$row_1['last_name'];
		}
		
		$report_sent = 'No';
		if($row['default_report_color_id'] != '0')
		{
			$report_sent = 'Yes';
		}

		$reassigned_added_datetime = "";
		$cmd_1="SELECT added_datetime FROM order_reassigned_log WHERE order_service_details_id = '".$row['order_service_details_id']."' ORDER BY order_reassigned_log_id  DESC LIMIT 1 ";
		$result_1 = mysqli_query($db,$cmd_1); 
		if($row_1 = $result_1->fetch_assoc())
		{
			$reassigned_added_datetime = $row_1['added_datetime'];
		}

		echo '
		<tr>
			<td>'.$row["Client_Code"].'</td>
			<td>'.$row["Client_Name"].'</td>
			<td>'.$row["is_rush"].'</td>
			<td>'.$row["case_reference_no"].'</td>
			<td>'.$row["first_name"].' '.$row["last_name"].'</td>
			<td>'.$row["internal_reference_id"].'</td>
			<td>'.$row["Client_SPOC"].'</td>
			<td>'.$selected_packages.'</td>
			<td>'.$row["service_type_name"].'</td>
			<td>'.$row["service_name"].'</td>
			<td>'.$row["joining_date"].'</td>
			<td>'.$insufficiency_raised_date.'</td>
			<td>'.$row["order_creation_date_cleared"].'</td>
			<td>'.$verfier_name.'</td>
			<td>'.$verfifier_initialize_date.'</td>
			<td>'.$verfifier_closed_date.'</td>
			<td>'.$row["additional_comments"].'</td>
			<td>'.$row["additional_fees"].'</td>
			<td>'.$lob_name.'</td>
			<td>'.$row["of_qc_order_status"].'</td>
			<td>'.$row["order_status"].'</td>
			<td>'.$row["order_creation_date"].'</td>
			<td>'.$expected_closed_date.'</td>
			<td>'.$sla.'</td>
			<td>'.$sla_print.'</td>
			<td>'.$row["order_completion_date"].'</td>
			<td>'.$report_sent.'</td>
			<td>'.$last_public_note_added_by.'</td>
			<td>'.$last_public_note_added_date_time.'</td>
			<td>'.$last_private_note_added_by.'</td>
			<td>'.$last_private_note_added_date_time.'</td>
			<td>'.$reassigned_added_datetime.'</td>
			<td>'.$row["order_completion_date_of_qc"].'</td>
		</tr>
		';
	}

}

?>