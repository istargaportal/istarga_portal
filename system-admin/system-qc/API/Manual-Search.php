<?php
require_once "../../../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

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
	$sq="SELECT o.*, c.Client_Name, s.service_name, os.order_creation_date, os.order_completion_date, os.category, os.of_closure_date, sa.sla, os.order_status FROM `order_master` o INNER JOIN client c ON c.id = o.client_id INNER JOIN order_service_details os ON os.order_id = o.order_id INNER JOIN service_list s ON s.id = os.service_id INNER JOIN assigned_service sa ON sa.service_id = os.service_id WHERE 1 = 1 ";
	if($select_criteria == "first_last_name"){ $sq.= " AND (o.first_name LIKE '$search_field%' OR o.last_name LIKE '$search_field%') "; }
	if($select_criteria == "internal_reference_id"){ $sq.= " AND o.internal_reference_id LIKE '$search_field%' "; }
	if($select_criteria == "joining_location"){ $sq.= " AND o.joining_location LIKE '$search_field%' "; }
	if($select_criteria == "email_id"){ $sq.= " AND o.email_id LIKE '$search_field%' "; }
	if($select_criteria == "order_creation_date"){ $sq.= " AND o.order_creation_date LIKE '$search_field%' "; }
	if($select_criteria == "order_completion_date"){ $sq.= " AND o.order_completion_date LIKE '$search_field%' "; }
	if($select_criteria == "order_status"){ $sq.= " AND os.order_status LIKE '$search_field%' "; }
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
	        <td class="tablehead1">'.$row["internal_reference_id"].'</td>
	        <td class="tablehead1">'.$row['is_rush'].'</td>
	        <td class="tablehead1 form_left">'.$row["first_name"].' '.$row["last_name"].' </td>
	        <td class="tablehead1">'.$row["order_creation_date"].'</td>
	        <td class="tablehead1">'.$expected_course_date.'</td>
	        <td class="tablehead1">'.$row["service_name"].'</td>
	        <td class="tablehead1">'.$order_status.'</td>
	        <td class="tablehead1">'.$row["category"].'</td>
	        <td class="tablehead1">'.$row["of_closure_date"].'</td>
        </tr>
        ';
    }
	echo '</table>';
}

?>