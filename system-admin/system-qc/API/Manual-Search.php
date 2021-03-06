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
	 <th>Is Rush Order</th>
	 <th>Applicant Name</th>
	 <th>Order Creation Date</th>
	 <th>Expected Course Date</th>
	 <th>Service</th>
	 <th>Status</th>
	 <th>Category</th>
	 <th>OF Closure Date</th>
 </thead>
 ';
	$sr = 0;
	$sq="SELECT o.*, os.order_service_details_id, c.Client_Name, s.service_name, os.order_creation_date, os.order_completion_date, os.category, os.of_closure_date, sa.sla, os.order_status, os.of_qc_order_status FROM `order_master` o INNER JOIN client c ON c.id = o.client_id INNER JOIN order_service_details os ON os.order_id = o.order_id INNER JOIN service_list s ON s.id = os.service_id INNER JOIN assigned_service sa ON sa.service_id = os.service_id WHERE 1 = 1 ";
	if($applicant_name != ""){ $sq.= " AND (o.first_name LIKE '$applicant_name%' OR o.last_name LIKE '$applicant_name%') "; }
	if($case_reference_no != ""){ $sq.= " AND o.case_reference_no LIKE '$case_reference_no%' "; }
	if($order_creation_date != ""){ $sq.= " AND os.order_creation_date LIKE '$order_creation_date%' "; }
	if($order_status != ""){ $sq.= " AND os.order_status = '$order_status' "; }
	if($of_qc_order_status != ""){ $sq.= " AND os.of_qc_order_status = '$of_qc_order_status' "; }
	if($service_id != ""){ $sq.= " AND os.service_id = '$service_id' "; }
    $sq.=" AND (os.qc_user_id = 0 OR os.qc_user_id = '$user_id') GROUP BY os.order_service_details_id";
	$result = mysqli_query($db,$sq); 
	while($row = $result->fetch_assoc())
    {
    	$sla = $row['sla'];
    	$sr++;
        if($row['is_rush'] == "1") { $row['is_rush'] = "Yes"; } else { $row['is_rush'] = "No"; }
        $order_status = $row['order_status'];
        if($row["assign_to"] == 0) { $row["assign_to"] = "-"; }
        if($row["of_closure_date"] != "0000-00-00 00:00:00") { $row["of_closure_date"] = date('d-m-Y', strtotime($row["of_closure_date"])); }
        else { $row["of_closure_date"] = ""; }

        $expected_course_date = date('d-m-Y', strtotime('+ '.$sla.' days '.$row["order_creation_date"]));
        $row["order_creation_date"] = date('d-m-Y', strtotime($row["order_creation_date"]));

        if($row["lock_status"] == 0)
        {
            $lock_status = "<a title='Unlocked' class='btn btn-default btn-sm'><i class='fa fa-unlock' style='color:#54b058 !important;'></i></a>";
        }
        else
        {
            $lock_status = "<a title='Unlock' class='btn btn-default btn-sm'><i class='fa fa-lock' style='color:#eb1e2f !important;'></i></a>";
        }
        echo '
        <tr>
	        <td class="tablehead1">'.$sr.'</td>
	        <td class="tablehead1"><a onclick="load_service_order('.$row["order_service_details_id"].')"  class="btn_link">'.$row["case_reference_no"].'</a></td>
	        <td class="tablehead1">'.$row['is_rush'].'</td>
	        <td class="tablehead1 form_left">'.$row["first_name"].' '.$row["last_name"].' </td>
	        <td class="tablehead1">'.$row["order_creation_date"].'</td>
	        <td class="tablehead1">'.$expected_course_date.'</td>
	        <td class="tablehead1">'.$row["service_name"].'</td>
	        <td class="tablehead1">'.$row["of_qc_order_status"].'</td>
	        <td class="tablehead1">'.$order_status.'</td>
	        <td class="tablehead1">'.$row["of_closure_date"].'</td>
        </tr>
        ';
    }
	echo '</table>';
}

?>