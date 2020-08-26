<?php
$page_name = "Attendance Master";
include 'Header.php';
require_once "../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

$user_id = base64_decode($_GET['user_id']);
$check = "SELECT prefix, first_name, middle_name, last_name, date_of_birth, employee_id, profile_pic, permanent_address, email_id, contact_number, date_of_join, alternate_contact, adhar_number, pan_number, passport_number, bank_name, account_number, ifsc_code, role_id FROM user_master WHERE user_id = '$user_id' ";
$resul = mysqli_query($db,$check); 
if($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
{
  $prefix = $row['prefix'];
  $first_name = $row['first_name'];
  $middle_name = $row['middle_name'];
  $last_name = $row['last_name'];
  $date_of_birth = $row['date_of_birth'];
  $employee_id = $row['employee_id'];
  $profile_pic = $row['profile_pic'];
  $permanent_address = $row['permanent_address'];
  $email_id = $row['email_id'];
  $contact_number = $row['contact_number'];
  $date_of_join = $row['date_of_join'];
  $alternate_contact = $row['alternate_contact'];
  $adhar_number = $row['adhar_number'];
  $pan_number = $row['pan_number'];
  $passport_number = $row['passport_number'];
  $bank_name = $row['bank_name'];
  $account_number = $row['account_number'];
  $ifsc_code = $row['ifsc_code'];

  if($profile_pic != ''){ $profile_pic = "src='assets/uploads/".$profile_pic."'"; } else { $profile_pic = "src='../assets/uploads/upload.jpg'"; }
  if($row["role_id"] == 1){ $role = "OF"; }
  if($row["role_id"] == 2){ $role = "QC"; }
  if($row["role_id"] == 3){ $role = "Verifier"; }

}

?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
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
            </div>
            <br>
            <div id="load_calendar_panel"></div>
          </div>
        </div>
      </div>
      <div class="col-md-4" style="margin-top: 4%;">
        <div class="card card-profile">
          <div class="card-avatar">
            <a href="#pablo">
              <img class="img" <?php echo @$profile_pic; ?> />
            </a>
          </div>
          <div class="card-body">
            <h4 class="card-title optColor"><?php echo @$first_name. ' '. @$last_name; ?></h4>
            <h6 class="card-category"><?php echo $role; ?></h6>
            <h5><i class="fa fa-mobile"></i> <?php echo $contact_number; ?> | <i class="fa fa-envelope"></i> <?php echo $email_id; ?></h5>
            <h5 class="form_left"><i class="fa fa-gift"></i> DOB - <?php echo $date_of_birth; ?></h5>
            <h5 class="form_left"><i class="fa fa-calendar"></i> DOJ - <?php echo $date_of_join; ?></h5>
          </div>
        </div>
        <div class="row card">
          <div class="col-md-12 ">
            <br>
            <div class="color_div">
              <div class="color_panel col-md-2 today_color"></div>
              <div class="color_text col-md-10"> Today</div>
            </div>
            <div class="color_div">
              <div class="color_panel col-md-2 present_color"></div>
              <div class="color_text col-md-10"> Present</div>
            </div>
            <div class="color_div">
              <div class="color_panel col-md-2 absent_color"></div>
              <div class="color_text col-md-10"> Absent</div>
            </div>
            <div class="color_div">
              <div class="color_panel col-md-2 sick_leave_color"></div>
              <div class="color_text col-md-10"> Sick Leave</div>
            </div>
            <div class="color_div">
              <div class="color_panel col-md-2 casual_leave_color"></div>
              <div class="color_text col-md-10"> Casual Leave</div>
            </div>
            <div class="color_div">
              <div class="color_panel col-md-2 not_present_color"></div>
              <div class="color_text col-md-10"> Not Present</div>
            </div>
            <div class="color_div">
              <div class="color_panel col-md-2 half_attendance"></div>
              <div class="color_text col-md-10"> Half Days</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
  include 'Attendance-Functions.php';
?>
<script>
  load_calendar_panel('<?php echo date("m");?>', '<?php echo date("Y");?>', '<?php echo $user_id;?>')

  let darkmode = localStorage.getItem("darkmode");
  const darkmodetoggle = document.querySelector('input[name=theme]');

  const enabledarkmode = () => {
    document.documentElement.setAttribute('data-theme', 'dark')
    localStorage.setItem("darkmode", "enabled");
  }

  const disabledarkmode = () => {
    document.documentElement.setAttribute('data-theme', 'light')
    localStorage.setItem("darkmode", null);
  }


  if (darkmode === "enabled") {
    enabledarkmode();
  }


  darkmodetoggle.addEventListener("change", () => {
    darkmode = localStorage.getItem("darkmode");
    if (darkmode !== "enabled") {
      trans()
      enabledarkmode();
    } else {
      trans()
      disabledarkmode();
    }
  })

  let trans = () => {
    document.documentElement.classList.add('transition');
    window.setTimeout(() => {
      document.documentElement.classList.remove('transition');
    }, 1000)
  }
</script>

<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap-material-design.min.js"></script>
<script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Chartist JS -->
<script src="assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="assets/js/material-dashboard.js?v=2.1.0"></script>

</body>
</html>