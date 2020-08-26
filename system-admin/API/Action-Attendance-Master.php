<?php
error_reporting(0);
require_once "../../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

if (mysqli_connect_errno($db)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

extract($_POST);

if($_POST['action']=='display')
{
 echo '<table id="datatable_tbl" class="table table-hover" style="margin-top: 4%;">
 <thead class="text-primary" style="background-color: rgba(15, 13, 13, 0.856) !important;">
 <th width="10">SR.NO.</th>
 <th>Name</th>
 <th>Employee ID</th>
 <th>Employee Type</th>
 <th>Contact Number</th>
 <th>Today Status</th>
 <th>Entry Time</th>
 <th>Action</th>
 </thead>
 ';
 $sr = 0;
 $sq="SELECT user_id, first_name, last_name, employee_id, email_id, role_id, contact_number, status FROM user_master  ";
 $resul = mysqli_query($db,$sq); 
 while($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
 {
  if($row['status'] == 1)
  {
    $active_deactive_btn = "<a onclick='activate_deactivate_user(0,".$row['user_id'].")' class='btn dropdown-item btn-default btn-sm'><i class='fa fa-toggle-off'></i> &nbsp; Deactivate</a>";
  }
  if($row['status'] == 0)
  {
    $active_deactive_btn = "<a onclick='activate_deactivate_user(1,".$row['user_id'].")'  class='btn dropdown-item btn-default btn-sm'><i class='fa fa-toggle-on'></i> &nbsp; Activate</a>"; 
  }
  $sr++;
  if($row["role_id"] == 1){ $row["role_id"] = "OF"; }
  if($row["role_id"] == 2){ $row["role_id"] = "QC"; }
  if($row["role_id"] == 3){ $row["role_id"] = "Verifier"; }
  $check_1 = "SELECT attendance_status, from_time FROM attendance_master WHERE attendancce_date = '".date('Y-m-d')."' AND user_id ='".$row["user_id"]."' ";
  $resul_1 = mysqli_query($db,$check_1);
  $from_time = "";
  if ($row_1 = mysqli_fetch_array($resul_1, MYSQLI_ASSOC))
  {
    $from_time = $row_1['from_time'];
    if($row_1['attendance_status'] == "1" || $from_time != "0000-00-00")
    {
      $today_status = 'Present';
    }
    if($row_1['attendance_status'] == "2")
    {
      $today_status = 'Absent';
    }
    if($row_1['attendance_status'] == "3")
    {
      $today_status = 'Sick Leave';
    }
    if($row_1['attendance_status'] == "4")
    {
      $today_status = 'Casual Leave';
    }
  }
  else
  {
    $today_status = 'Not Present';
  }
  if($from_time == "00:00:00")
  {
    $from_time = "";
  }
  echo '
  <tr>
    <td class="tablehead1">'.$sr.'</td>
    <td class="tablehead1">'.$row["first_name"].' '.$row["last_name"].'</td>
    <td class="tablehead1">'.$row["employee_id"].'</td>
    <td class="tablehead1">'.$row["role_id"].'</td>
    <td class="tablehead1">'.$row["contact_number"].'</td>
    <td class="tablehead1">'.$today_status.'</td>  
    <td class="tablehead1">'.@$from_time.'</td>
    <td class="tablehead1">';
  ?>
    <a onclick="mark_attendance('<?php echo date('Y-m-d'); ?>', <?php echo $row["user_id"]; ?>)" class="btn btn-primary btn-xs"><i class="fa fa-cogs"></i> Action</a>
  <?php
  echo '  <a href="View-Attendance-Master.php?user_id='.base64_encode($row["user_id"]).'" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> View</a>
    </td>  
  </tr>
  ';
}
echo '</table>';
}

?>