<?php
$page_name = "Mark Attendance";
include 'Header.php';

require_once "../../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();


$check = "SELECT t.value FROM user_master u INNER JOIN timezones t ON t.id = u.timezone_id WHERE u.user_id = '$user_id' ";
$resul = mysqli_query($db,$check); 
if($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
{
  date_default_timezone_set($row['value']);
}
// function generate_timezone_list()
// {
//   require_once "../../config/config.php";

//   $get_connection=new connectdb;
//   $db=$get_connection->connect();

//     static $regions = array(
//         DateTimeZone::AFRICA,
//         DateTimeZone::AMERICA,
//         DateTimeZone::ANTARCTICA,
//         DateTimeZone::ASIA,
//         DateTimeZone::ATLANTIC,
//         DateTimeZone::AUSTRALIA,
//         DateTimeZone::EUROPE,
//         DateTimeZone::INDIAN,
//         DateTimeZone::PACIFIC,
//     );

//     $timezones = array();
//     foreach( $regions as $region )
//     {
//         $timezones = array_merge( $timezones, DateTimeZone::listIdentifiers( $region ) );
//     }

//     $timezone_offsets = array();
//     foreach( $timezones as $timezone )
//     {
//         $tz = new DateTimeZone($timezone);
//         $timezone_offsets[$timezone] = $tz->getOffset(new DateTime);
//     }

//     // sort timezone by offset
//     asort($timezone_offsets);

//     $timezone_list = array();
//     foreach( $timezone_offsets as $timezone => $offset )
//     {
//         $offset_prefix = $offset < 0 ? '-' : '+';
//         $offset_formatted = gmdate( 'H:i', abs($offset) );

//         $pretty_offset = "UTC${offset_prefix}${offset_formatted}";

//         $timezone_list[$timezone] = "(${pretty_offset}) $timezone";
//         $value = '('.$pretty_offset.') '.$timezone;
      
//         // $check = "INSERT INTO timezones(`value`, label) VALUES('$timezone', '$value') ";
//         // $resul = mysqli_query($db,$check); 
//     }
//     // print_r($timezone_list);
// }
// generate_timezone_list();

?>
<div class="content">
  <div class="container-fluid">
    <div class="card">
      <!-- <div class="card-header card-header-primary">
        <h4 id='process_title' class="card-title"><i class="fa fa-calendar"></i> <?php echo date('d M, Y'); ?></h4>
      </div> -->
      <div id="process_order">
        <div class="card-body">
          <div class="row">
            <div class="col-xl-3">
              <div class="count_panel">
                <div class="count_heading">Total Present</div>
                <div class="count_value"><span class="count present_count" id="print_present_count"></span> / month</div>
              </div>
            </div>
            <div class="col-xl-3">
              <div class="count_panel">
                <div class="count_heading">Total Absent</div>
                <div class="count_value"><span class="count absent_count" id="print_absent_count"></span> / month</div>
              </div>
            </div>
            <div class="col-xl-3">
              <div class="count_panel">
                <div class="count_heading">Sick Leave</div>
                <div class="count_value"><span class="count sick_leave" id="print_sick_leave"></span> / month</div>
              </div>
            </div>
            <div class="col-xl-3">
              <div class="count_panel">
                <div class="count_heading">Casual Leaves</div>
                <div class="count_value"><span class="count casual_leave" id="print_casual_leave"></span> / month</div>
              </div>
            </div>
            <div class="col-md-9">
              <br>
              <div id="load_calendar_panel"></div>
              <!-- <iframe style="width: 100%; height: 400px; border:none" src=""></iframe> -->
            </div>
            <div class="col-md-1">
              <br>
            </div>
            <div class="col-md-2">
              <br>
              <div class="color_div">
                <div class="color_panel today_color"></div>
                <div class="color_text"> Today</div>
              </div>
              <div class="color_div">
                <div class="color_panel present_color"></div>
                <div class="color_text"> Present</div>
              </div>
              <div class="color_div">
                <div class="color_panel absent_color"></div>
                <div class="color_text"> Absent</div>
              </div>
              <div class="color_div">
                <div class="color_panel sick_leave_color"></div>
                <div class="color_text"> Sick Leave</div>
              </div>
              <div class="color_div">
                <div class="color_panel casual_leave_color"></div>
                <div class="color_text"> Casual Leave</div>
              </div>
              <div class="color_div">
                <div class="color_panel not_present_color"></div>
                <div class="color_text"> Not Present</div>
              </div>
              <div class="color_div">
                <div class="color_panel half_attendance"></div>
                <div class="color_text"> Half Days</div>
              </div>
            </div>
          </div>
        </div>     
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function load_calendar_panel(month, year)
  {
    let user_id = <?php echo $user_id; ?>;
    $('#modal_loading').css('display', 'block');
    var action = "load_calendar_panel";
    $.ajax({
      type:'GET',
      url:'../../API/Calendar/index.php',
      data:{action, month, year, user_id},
      success:function(html) {
        $('#modal_loading').css('display', 'none');
        $('#load_calendar_panel').html(html);
       }
    });
  }

  load_calendar_panel();
  
  function close_mark_attendance()
  {
    $('#mark_attendance').css('display', 'none');
    $("#selected_date_input").val("");
    close_present_mark();
  }

  function present_mark()
  {
    $('#mark_attendance_panel').css('display', 'block');
    $('#mark_present').addClass('disabled_btn');
    $('#mark_absent').addClass('disabled_btn');
    $('#mark_sick_leave').addClass('disabled_btn');
    $('#mark_casual_leave').addClass('disabled_btn');
  }

  function close_present_mark()
  {
    $('#mark_attendance_panel').css('display', 'none');
    $('#mark_present').removeClass('disabled_btn');
    $('#mark_absent').removeClass('disabled_btn');
    $('#mark_sick_leave').removeClass('disabled_btn');
    $('#mark_casual_leave').removeClass('disabled_btn');
  }

  function mark_attendance(selected_date)
  {  
    let action = "mark_attendance";
    $.ajax({
      type:'POST',
      url:'./API/Update-Attendance.php',
      data:{action, selected_date},
      success:function(html) {
        $('#modal_loading').css('display', 'none');
        $('#print_result').html(html);
       }
    });
  }

  function mark_absent()
  {
    let r = confirm("Are you sure to update "+ $('#selected_date').html() +" date as Absent?")
    if(r == true)
    {
      let action = "absent_mark";
      let selected_date_input = $('#selected_date_input').val();
      $.ajax({
        type:'POST',
        url:'./API/Update-Attendance.php',
        data:{action, selected_date_input},
        success:function(html) {
          $('#modal_loading').css('display', 'none');
          close_mark_attendance();
          $('#print_result').html(html);
         }
      });
    }
  }

  function mark_sick_leave()
  {
    let r = confirm("Are you sure to update "+ $('#selected_date').html() +" date as Sick Leave?")
    if(r == true)
    {
      let action = "sick_leave";
      let selected_date_input = $('#selected_date_input').val();
      $.ajax({
        type:'POST',
        url:'./API/Update-Attendance.php',
        data:{action, selected_date_input},
        success:function(html) {
          $('#modal_loading').css('display', 'none');
          close_mark_attendance();
          $('#print_result').html(html);
         }
      });
    }
  }

  function mark_casual_leave()
  {
    let r = confirm("Are you sure to update "+ $('#selected_date').html() +" date as Casual Leave?")
    if(r == true)
    {
      let action = "sick_leave";
      let selected_date_input = $('#selected_date_input').val();
      $.ajax({
        type:'POST',
        url:'./API/Update-Attendance.php',
        data:{action, selected_date_input},
        success:function(html) {
          $('#modal_loading').css('display', 'none');
          close_mark_attendance();
          $('#print_result').html(html);
         }
      });
    }
  }

  function update_log_in_time()
  {
    let r = confirm("Are you sure to update "+ $('#selected_date').html() +" date & Log In Time - "+ $('#from_time').val() +"?")
    if(r == true)
    {
      let action = "update_log_in_time";
      let selected_date_input = $('#selected_date_input').val();
      let from_time = $('#from_time').val();
      $.ajax({
        type:'POST',
        url:'./API/Update-Attendance.php',
        data:{action, selected_date_input, from_time},
        success:function(html) {
          $('#modal_loading').css('display', 'none');
          close_mark_attendance();
          $('#print_result').html(html);
         }
      });
    }
  }

  function update_log_out_time()
  {
    let r = confirm("Are you sure to update "+ $('#selected_date').html() +" date & Log Out Time - "+ $('#to_time').val() +"?")
    if(r == true)
    {
      let action = "update_log_out_time";
      let selected_date_input = $('#selected_date_input').val();
      let to_time = $('#to_time').val();
      $.ajax({
        type:'POST',
        url:'./API/Update-Attendance.php',
        data:{action, selected_date_input, to_time},
        success:function(html) {
          $('#modal_loading').css('display', 'none');
          close_mark_attendance();
          $('#print_result').html(html);
         }
      });
    }
  }
</script>

<?php
include 'Footer.php';
?>