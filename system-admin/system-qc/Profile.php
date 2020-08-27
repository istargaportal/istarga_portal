<?php
$page_name = "Profile";
include 'Header.php';

require_once "../../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

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

  if($profile_pic != ''){ $profile_pic = "src='../assets/uploads/".$profile_pic."'"; } else { $profile_pic = "src='../assets/uploads/upload.jpg'"; }
  if($row["role_id"] == 1){ $role = "OF"; }
  if($row["role_id"] == 2){ $role = "QC"; }
  if($row["role_id"] == 3){ $role = "Verifier"; }

}

?>
<div class="content">
  <br><br>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 id='process_title' class="card-title"><i class="fa fa-edit"></i> My Profile</h4>
          </div>
          <br>
          <div class="row col-md-12">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-2">
                  <label>Prefix</label>
                  <input type="text" readonly="" class="form-control form_center" value="<?php echo $prefix; ?>" />
                </div>
                <div class="col-md-4">
                  <label>First Name</label>
                  <input type="text" readonly="" class="form-control" value="<?php echo $first_name; ?>" />
                </div>
                <div class="col-md-3">
                  <label>Middle Name</label>
                  <input type="text" readonly="" class="form-control" value="<?php echo $middle_name; ?>" />
                </div>
                <div class="col-md-3">
                  <label>Last Name</label>
                  <input type="text" readonly="" class="form-control" value="<?php echo $last_name; ?>" />
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <label>Employee ID</label>
                  <input type="text" readonly="" class="form-control" value="<?php echo $employee_id; ?>" />
                </div>
                <div class="col-md-9">
                  <label>Permanent Address</label>
                  <input type="text" readonly="" class="form-control" value="<?php echo $permanent_address; ?>" />
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <label>Contact Number</label>
                  <input type="text" readonly="" class="form-control" value="<?php echo $contact_number; ?>" />
                </div>
                <div class="col-md-3">
                  <label>Alternate Contact</label>
                  <input type="text" readonly="" class="form-control" value="<?php echo $alternate_contact; ?>" />
                </div>
                <div class="col-md-6">
                  <label>Email ID</label>
                  <input type="text" readonly="" class="form-control" value="<?php echo $email_id; ?>" />
                </div>
                <div class="col-md-4">
                  <label>Adhar Number</label>
                  <input type="text" readonly="" class="form-control" value="<?php echo $adhar_number; ?>" />
                </div>
                <div class="col-md-4">
                  <label>PAN Number</label>
                  <input type="text" readonly="" class="form-control" value="<?php echo $pan_number; ?>" />
                </div>
                <div class="col-md-4">
                  <label>Passport Number</label>
                  <input type="text" readonly="" class="form-control" value="<?php echo $passport_number; ?>" />
                </div>
                <div class="col-md-4">
                  <label>Bank Name</label>
                  <input type="text" readonly="" class="form-control" value="<?php echo $bank_name; ?>" />
                </div>
                <div class="col-md-4">
                  <label>Account Number</label>
                  <input type="text" readonly="" class="form-control" value="<?php echo $account_number; ?>" />
                </div>
                <div class="col-md-4">
                  <label>IFSC Code</label>
                  <input type="text" readonly="" class="form-control" value="<?php echo $ifsc_code; ?>" />
                </div>
              </div>

            </div>
            <div class="col-md-12"><br></div>
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
              </div>
          </div>
      </div>
    </div>
  </div>
  <br><br>
</div>
<?php
  include 'Footer.php';
?>