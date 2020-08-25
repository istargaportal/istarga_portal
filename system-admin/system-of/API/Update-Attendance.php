<?php
error_reporting(0);
require_once "../../../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

if (mysqli_connect_errno($db)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
session_start();
$user_id = $_SESSION['user_id'];
              
extract($_POST);
if($_POST['action'] == "absent_mark" || $_POST['action'] == "sick_leave" || $_POST['action'] == "casual_leave")
{
  if($_POST['action'] == "absent_mark") { $attendance_status = "2"; }
  if($_POST['action'] == "sick_leave") { $attendance_status = "3"; }
  if($_POST['action'] == "casual_leave") { $attendance_status = "4"; }
  $sql = "INSERT INTO attendance_master(attendancce_date, user_id, attendance_status) VALUES('$selected_date_input', '$user_id', '$attendance_status') ";
  $result = mysqli_query($db,$sql);
  echo '
  <script>
      alert("Attendance Updated!");
      load_calendar_panel();
  </script>
  ';
}

if($_POST['action'] == "update_log_in_time")
{
    $sql = "INSERT INTO attendance_master(attendancce_date, from_time, user_id, attendance_status) VALUES('$selected_date_input', '$from_time', '$user_id', '0') ";
    $result = mysqli_query($db,$sql);
    echo '
    <script>
        alert("Attendance Updated!");
        load_calendar_panel();
    </script>
    ';
}

if($_POST['action'] == "update_log_out_time")
{
    $sql = "UPDATE attendance_master SET to_time = '$to_time', attendance_status = 1 WHERE attendancce_date = '$selected_date_input' AND user_id = '$user_id' ";
    $result = mysqli_query($db,$sql);
    echo '
    <script>
        alert("Attendance Updated!");
        load_calendar_panel();
    </script>
    ';
}

if($_POST['action'] == "mark_attendance")
{
    $note = '<br><small style="color:red;">NOTE : If you want to make any change in the Attendance.<br><b>Please contact to Admin!</small>';
    $attendance_condition = 0;

    $print_from_to_time ='
      <div class="card-header card-header-primary" style="position: relative;">
        <h4 id="process_title" class="card-title"><i class="fa fa-clock-o" aria-hidden="true"></i> Log In Time <a onclick="close_present_mark()" style="position: absolute; top: 8px; right: 10px;" class="btn btn-danger btn-xs"><i class="fa fa-close"></i></a></h4>
      </div>
      <div class="row">
        <div class="col-md-7">
          <br>
          <h5>TIME -  '.date('H:i:s A').'</h5>
          <input type="hidden" id="from_time" value="'.date('H:i:s').'" />
        </div>
        <div class="col-md-5">
          <br>
          <a onclick="update_log_in_time()" class="btn btn-success btn-sm" style="margin: 0;"><i class="fa fa-edit"></i> Update Time</a>
        </div>
      </div>
    ';
    $check = "SELECT attendance_status, from_time, to_time FROM attendance_master WHERE attendancce_date = '$selected_date' AND user_id ='$user_id'  ";
    $resul = mysqli_query($db,$check);
    if ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
    {
        $from_time = $row['from_time'];
        $to_time = $row['to_time'];
        $attendance_condition = 1;
        if($row['attendance_status'] == "1")
        {
          $print_attendance = '<div class="color_div">
                <div class="color_panel col-md-1 present_color"></div>
                <div class="color_text col-md-11"> Present</div>
              </div>
              <br>
              <h5 style="color:#000; font-weight:bold;" class="form_center">IN - '.$from_time.' & OUT - '.$to_time.'</h5>
              ';
        }

        if($to_time == "00:00:00"){ $to_time = ""; }

        if($to_time == "")
        {
          $print_attendance = '
              <div class="color_div">
                <div class="color_panel col-md-1 not_present_color"></div>
                <div class="color_text col-md-11"> Not Present</div>
              </div>
              <br>
              <h5 style="color:#000; font-weight:bold;" class="form_center">IN - '.$from_time.' & OUT - Pending</h5>
              ';

          if(strtotime($selected_date) == strtotime(date('Y-m-d')) && $row['attendance_condition'] == 0)
          {
            $print_attendance.= $print_from_to_time = '
            <div id="mark_attendance_panel" class="row card col-md-12" style="box-shadow: 0 0 10px #ccc;padding: 4px; margin: 10px 0 !important;">
              <div class="card-header card-header-primary" style="position: relative; ">
                <h4 id="process_title" class="card-title"><i class="fa fa-clock-o" aria-hidden="true"></i> Log Out Time </h4>
              </div>
              <div class="row">
                <div class="col-md-7">
                  <br>
                  <h5>TIME -  '.date('H:i:s A').'</h5>
                  <input type="hidden" id="to_time" value="'.date('H:i:s').'" />
                </div>
                <div class="col-md-5">
                  <br>
                  <a onclick="update_log_out_time()" class="btn btn-success btn-sm" style="margin: 0;"><i class="fa fa-edit"></i> Update Time</a>
                </div>
              </div>
            </div>
            ';
          }
        }
        else if($from_time == "" && $to_time == "")
        {
          $print_from_to_time = "";
        }

        if($row['attendance_status'] == "2")
        {
          $print_attendance = '<div class="color_div">
                <div class="color_panel col-md-1 absent_color"></div>
                <div class="color_text col-md-11"> Absent</div>
              </div>';
        }
        if($row['attendance_status'] == "3")
        {
          $print_attendance = '<div class="color_div">
                <div class="color_panel col-md-1 sick_leave_color"></div>
                <div class="color_text col-md-11"> Sick Leave</div>
              </div>';
        }
        if($row['attendance_status'] == "4")
        {
          $print_attendance = '<div class="color_div">
                <div class="color_panel col-md-1 casual_lea
                ve_color"></div>
                <div class="color_text col-md-11"> Casual Leave</div>
              </div>';
        }
    }
    else
    {
      $print_attendance = '<div class="color_div row">
              <div class="color_panel col-md-1 not_present_color"></div>
              <div class="color_text col-md-11"> Not Present</div>
              </div>
            ';
    }

    if(strtotime($selected_date) == strtotime(date('Y-m-d')) && $attendance_condition == 0)
    {
      $print_attendance = '
        <a id="mark_present" href="javascript:present_mark()">
          <div class="color_div row" style="margin:6px 0 !important;">
            <div class="color_panel col-md-1 form_center present_color"><i class="fa fa-check"></i></div>
            <div class="color_text col-md-11" style="text-align: left !important;"> Mark Present <i class="fa fa-arrow-circle-right pull-right"></i></div>
          </div>
        </a>
        <div id="mark_attendance_panel" class="row card col-md-12" style="box-shadow: 0 0 10px #ccc;padding: 4px; margin: 10px 0 !important; display:none" >
          '.$print_from_to_time.'
        </div>
        <a id="mark_absent" href="javascript:mark_absent()">
          <div class="color_div row" style="margin:6px 0 !important;">
            <div class="color_panel col-md-1 form_center absent_color"><i class="fa fa-check"></i></div>
            <div class="color_text col-md-11" style="text-align: left !important;"> Mark Absent <i class="fa fa-arrow-circle-right pull-right"></i></div>
          </div>
        </a>
        <a id="mark_sick_leave" href="javascript:mark_sick_leave()">
          <div class="color_div row" style="margin:6px 0 !important;">
            <div class="color_panel col-md-1 form_center sick_leave_color"><i class="fa fa-check"></i></div>
            <div class="color_text col-md-11" style="text-align: left !important;"> Mark Sick Leave <i class="fa fa-arrow-circle-right pull-right"></i></div>
          </div>
        </a>
        <a id="mark_casual_leave" href="javascript:mark_casual_leave()">
          <div class="color_div row" style="margin:6px 0 !important;">
            <div class="color_panel col-md-1 form_center casual_leave_color"><i class="fa fa-check"></i></div>
            <div class="color_text col-md-11" style="text-align: left !important;"> Mark Casual Leave <i class="fa fa-arrow-circle-right pull-right"></i></div>
          </div>
        </a>
      ';
    }

?>
<div class="modal" id="mark_attendance" style="display: block;" >
  <div class="row">
    <div class="col-md-4"><p></p></div>
    <div class="col-md-4">
      <br>
      <div class="modal-content row">
        <h4 style="margin: 4px;border-bottom: solid 1px #aaa;"><i class="fa fa-calendar"></i> <span id="selected_date"><?php echo date('d-m-Y', strtotime($selected_date)); ?></span>
          <a onclick="close_mark_attendance()" class="btn btn-danger pull-right btn-xs"><i class="fa fa-remove"></i> </a>
        </h4>
        <br>
        <input type="hidden" id="selected_date_input" value="<?php echo $selected_date; ?>" />
        <?php
            echo @$print_attendance.$note;
        ?>
      </div>
    </div>
  </div>
</div>
<?php
}

?>