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
		<th>SLA</th>
		<th>Closed Date</th>
		<th>OrderStatus</th>
		<th>Report Status</th>
		<th>Color Status</th>
		<th>Order Completed Date</th>
		<th>ApplicantSubmitDate</th>
		<th>ClientSubmitDate</th>
		<th>IsRushOrder</th>
		<th>AdditionalComments</th>
	</tr>
</thead>
';
	$sq="SELECT o.*, c.Client_Name, s.service_name, os.order_creation_date, os.order_completion_date, os.category, os.of_closure_date, sa.sla, os.order_status, os.of_qc_order_status, os.of_assigned_date, os.of_user_id, os.order_creation_date_cleared FROM `order_master` o INNER JOIN client c ON c.id = o.client_id INNER JOIN order_service_details os ON os.order_id = o.order_id INNER JOIN service_list s ON s.id = os.service_id INNER JOIN assigned_service sa ON sa.service_id = os.service_id WHERE o.client_id = '$client_id' ";
	$result = mysqli_query($db,$sq); 
	while($row = $result->fetch_assoc())
	{
		$sla = $row['sla'];
    	$sla_final_date = date('Y-m-d', strtotime(' + '.$sla.' days'.$row['order_creation_date']));
    	$user_name = "";
    	$of_user_id = $row['of_user_id'];
		$cmd_1="SELECT first_name, last_name FROM user_master WHERE user_id = '$of_user_id' ";
		$result_1 = mysqli_query($db,$cmd_1); 
		if($row_1 = $result_1->fetch_assoc())
		{
			$user_name = $row_1['first_name'].' '.$row_1['last_name'];
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
		echo '
		<tr>
			<td>'.$row["order_id"].'</td>
			<td>'.$row["first_name"].' '.$row["last_name"].'</td>
			<td>'.$row["case_reference_no"].'</td>
			<td>'.$row["of_assigned_date"].'</td>
			<td>'.$row["order_creation_date"].'</td>
			<td>LOB NAME</td>
			<td>'.$row["joining_date"].'</td>
			<td>'.$row["email_id"].'</td>
			<td>'.$user_name.'</td>
			<td>'.$row["order_creation_date_cleared"].'</td>
			<td>'.$row["joining_location"].'</td>
			<td>'.$sla_print.'</td>
			<td>'.$row["order_completion_date"].'</td>
			<td>'.$row["order_status"].'</td>
			<td>'.$row["of_qc_order_status"].'</td>
			<td>'.$row["order_completion_date"].'</td>
			<td>'.$row["order_creation_date_time"].'</td>
			<td>'.$row["is_rush"].'</td>
			<td>'.$row["additional_comments"].'</td>			
		</tr>
		';
	}

}

?>