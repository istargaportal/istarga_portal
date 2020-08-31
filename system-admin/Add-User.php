<?php

require_once "../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();
if(isset($_GET['edit_user_id']))
{
  $edit_user_id = base64_decode($_GET['edit_user_id']);
  $page_name = "Edit User";
  $action = "edit";
  $sq="SELECT prefix, first_name, middle_name, last_name, date_of_birth, employee_id,  permanent_address, temporary_address, country_id, state_id, city_id, pincode, timezone_id, email_id, contact_number, alternate_contact, adhar_number, pan_number, passport_number, username, password, password_mail_to, bank_name, account_number, ifsc_code, role_id, status, date_of_join, profile_pic, adhar_file, pan_file, passport_file FROM user_master WHERE user_id = '$edit_user_id'  ";
  $resul = mysqli_query($db,$sq); 
  if($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
  {
    $prefix = $row['prefix'];
    $first_name = $row['first_name'];
    $middle_name = $row['middle_name'];
    $last_name = $row['last_name'];
    $date_of_birth = $row['date_of_birth'];
    $employee_id = $row['employee_id'];
    $permanent_address = $row['permanent_address'];
    $temporary_address = $row['temporary_address'];
    $country_id = $row['country_id'];
    $state_id = $row['state_id'];
    $city_id = $row['city_id'];
    $pincode = $row['pincode'];
    $timezone_id = $row['timezone_id'];
    $email_id = $row['email_id'];
    $contact_number = $row['contact_number'];
    $alternate_contact = $row['alternate_contact'];
    $adhar_number = $row['adhar_number'];
    $pan_number = $row['pan_number'];
    $passport_number = $row['passport_number'];
    $username = $row['username'];
    $password = $row['password'];
    $password_mail_to = $row['password_mail_to'];
    $bank_name = $row['bank_name'];
    $account_number = $row['account_number'];
    $ifsc_code = $row['ifsc_code'];
    $role_id = $row['role_id'];
    $status = $row['status'];
    $date_of_join = $row['date_of_join'];
    $profile_pic = $row['profile_pic'];
    $adhar_file = $row['adhar_file'];
    $pan_file = $row['pan_file'];
    $passport_file = $row['passport_file'];

    $prefix_mr_sel = $prefix_mrs_sel = $prefix_ms_sel = "";
    if($prefix == "Mr.") { $prefix_mr_sel = "selected"; }
    if($prefix == "Mrs.") { $prefix_mrs_sel = "selected"; }
    if($prefix == "Ms.") { $prefix_ms_sel = "selected"; }
    
    if($profile_pic != ''){ $profile_pic = "src='assets/uploads/".$profile_pic."'"; }
    if($adhar_file != ''){ $adhar_file = "src='assets/uploads/".$adhar_file."'"; }
    if($pan_file != ''){ $pan_file = "src='assets/uploads/".$pan_file."'"; }
    if($passport_file != ''){ $passport_file = "src='assets/uploads/".$passport_file."'"; }

    $role_id_1 = $role_id_2 = $role_id_3 = "";
    if($role_id == "1"){ $role_id_1 = "selected"; }
    if($role_id == "2"){ $role_id_2 = "selected"; }
    if($role_id == "3"){ $role_id_3 = "selected"; }

    $status_1 = $status_2 = "";
    if($status == "1"){ $status_1 = "selected"; }
    if($status == "2"){ $status_2 = "selected"; }
    
  }
  $page_template = "warning";
}
else
{
  $page_name = "Add User";
  $action = "add";
  $page_template = "primary";
}
include 'Header.php';
?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-<?php echo @$page_template; ?>">
            <h4 class="card-title"><i class="fa fa-edit"></i> Personal Details</h4>
          </div>
          <div class="card-body">
            <form id="add_user_form" enctype="multipart/form-data">
              <input type="hidden" name="action" value="<?php echo @$action; ?>" />
              <div class="row" style="margin-top: 1%;">
                <div class="col-md-3">
                  <div class="form-group1">
                    <label style="font-size: 13px;" class="bmd-label-floating">Title <i class="fa fa-star"></i></label>
                    <select style="margin-top: 2%;" name="prefix" id="Title" class="browser-default custom-select" required>
                      <option selected="selected" hidden value="">Choose..</option>
                      <option <?php echo @$prefix_mr_sel; ?> >Mr.</option>
                      <option <?php echo @$prefix_mrs_sel; ?> >Mrs.</option>
                      <option <?php echo @$prefix_ms_sel; ?> >Ms.</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group1">
                    <label class="bmd-label-floating">First Name <i class="fa fa-star"></i></label>
                    <input name="first_name" type="text" value="<?php echo @$first_name; ?>" class="form-control no_space" required="" />
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group1">
                    <label class="bmd-label-floating">Middle Name </label>
                    <input name="middle_name" type="text" value="<?php echo @$middle_name; ?>" class="form-control no_space" />
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group1">
                    <label class="bmd-label-floating">Last Name <i class="fa fa-star"></i></label>
                    <input name="last_name" type="text" value="<?php echo @$last_name; ?>" class="form-control no_space" required="" />
                  </div>
                </div>
              </div>
              <!--Second row-->
              <div class="row">
                <div class="col-md-2">
                  <label>Date of Birth</label>
                  <input type="date" name="date_of_birth" id="dateofbirth" class="form-control" value="<?php echo @$date_of_birth; ?>" />
                </div>
                <div class="col-md-2">
                  <label>Employee ID <i class="fa fa-star"></i></label>
                  <input type="text" name="employee_id" required="" class="form-control" value="<?php echo @$employee_id; ?>" />
                </div>
                <div class="col-md-5">
                  <br>
                </div>
                <div class="col-md-1" style="padding: 0;">
                  <div class="form-group">
                    <input type="file" accept="image/*" id="customFile4" name="profile_pic">
                    <label class="btn btn-default btn-sm" for="customFile4">Browse</label>
                  </div>
                </div>
                <div class="col-md-1">
                  <img style="border:solid" id="myImg4" <?php echo @$profile_pic; ?> height="90" width="80" >
                </div>
                
                <div class="col-md-6">
                  <div class="form-group1">
                    <label class="bmd-label-floating">Permanent Address <i class="fa fa-star"></i></label>
                    <input name="permanent_address" rows="3" required="" class="form-control" value="<?php echo @$permanent_address; ?>" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group1">
                    <label class="bmd-label-floating">Temporary Address</label>
                    <input name="temporary_address" rows="3" class="form-control" value="<?php echo @$temporary_address; ?>" />
                  </div>
                </div>
                
              </div>
              <div class="row justify-content-between" style="margin-top: 1%;">
                <input type="hidden" id="edit_country" value="<?php echo @$country_id; ?>">
                <input type="hidden" id="edit_state" value="<?php echo @$state_id; ?>">
                <input type="hidden" id="edit_city" value="<?php echo @$city_id; ?>">
                <input type="hidden" name="edit_user_id" value="<?php echo @$edit_user_id; ?>">

                <div class="col-md-2">
                  <div class="form-group1">
                    <label class="bmd-label-floating" style="font-size: 13px;">Country <i class="fa fa-star"></i></label>
                    <select class="browser-default custom-select" type="select" id="locality-dropdown" name="country_id" onchange="getservice(this.value)" style="color:#202940;" required>
                    </select>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group1">
                    <label class="bmd-label-floating"style="font-size: 13px;">State <i class="fa fa-star"></i></label>
                    <select class="browser-default custom-select" type="select" id="select_state" name="state_id" onchange="getservicename(this.value)" style="color:#202940;">
                    </select>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group1">
                    <label class="bmd-label-floating" style="font-size: 13px;">City <i class="fa fa-star"></i></label>
                    <select class="browser-default custom-select" type="select" id="select_city" name="city_id" onchange="getdocumentlist(this.value)" style="color:#202940;">
                    </select>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group1">
                    <label class="bmd-label-floating">Pincode <i class="fa fa-star"></i></label>
                    <input name="pincode" type="text" class="form-control" value="<?php echo @$pincode; ?>" />
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group1">
                    <label>TimeZone <i class="fa fa-star"></i></label>
                    <select class="browser-default chosen-select custom-select" required="" name="timezone_id" id="timezone_id">
                      <option value="">Select</option>
                      <?php
                        $sq="SELECT id, value, label FROM timezones ";
                        $resul = mysqli_query($db,$sq); 
                        while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
                        {
                          $selected = "";
                          if($timezone_id == $row['id']) { $selected = "selected"; }
                          echo '<option '.$selected.' value="'.$row['id'].'">'.$row['value'].' '.$row['label'].'</option>';
                        }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row justify-content-between" style="margin-top: 1%;">
                <div class="col-md-5">
                  <div class="form-group1">
                    <label class="bmd-label-floating">Email ID <i class="fa fa-star"></i></label>
                    <input name="email_id" type="email" class="form-control" required="" value="<?php echo @$email_id; ?>" />
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group1">
                    <label class="bmd-label-floating">Contact Number <i class="fa fa-star"></i></label>
                    <input name="contact_number" type="number" class="form-control" required="" value="<?php echo @$contact_number; ?>" />
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group1">
                    <label class="bmd-label-floating">Alternate Contact Number</label>
                    <input name="alternate_contact" type="number" class="form-control" value="<?php echo @$alternate_contact; ?>" />
                  </div>
                </div>
              </div>                       
              <div class="row justify-content-start" style="margin-top: 1%;">
                <div class="col-md-3" style="padding-right: 0;">
                  <div class="form-group1">
                    <label class="bmd-label-floating">Adhar Number</label>
                    <input name="adhar_number" type="text" class="form-control" value="<?php echo @$adhar_number; ?>" />
                  </div>
                </div>  
                <div class="col-md-1" style="padding: 0;">
                  <div class="form-group">
                    <br>
                    <input type="file" accept="image/*" id="customFile1" name="adhar_file">
                    <label class="btn btn-default btn-sm" for="customFile1">Browse</label>
                  </div>
                </div>

                <div class="col-md-3" style="padding-right: 0;">
                  <div class="form-group1">
                    <label class="bmd-label-floating">PAN Number</label>
                    <input name="pan_number" type="text" class="form-control" value="<?php echo @$pan_number; ?>" />
                  </div>
                </div>  
                <div class="col-md-1" style="padding: 0;">
                  <div class="form-group">
                    <br>
                    <input type="file" accept="image/*" id="customFile2" name="pan_file">
                    <label class="btn btn-default btn-sm" for="customFile2">Browse</label>
                  </div>
                </div>

                <div class="col-md-3" style="padding-right: 0;">
                  <div class="form-group1">
                    <label class="bmd-label-floating">Passport</label>
                    <input name="passport_number" type="text" class="form-control" value="<?php echo @$passport_number; ?>" />
                  </div>
                </div>  
                <div class="col-md-1" style="padding: 0;">
                  <div class="form-group">
                    <br>
                    <input type="file" accept="image/*" id="customFile3" name="passport_file">
                    <label class="btn btn-default btn-sm" for="customFile3">Browse</label>
                  </div>
                </div>           
              </div>

              <div class="row">
                <div class="col-md-4">
                  <div class="col-md-4">
                    <img style="border:solid" id="myImg1" <?php echo @$adhar_file; ?> height="90" width="80" >
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="col-md-4">
                    <img style="border:solid" id="myImg2" <?php echo @$pan_file; ?> height="90" width="80" >
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="col-md-4">
                    <img style="border:solid" id="myImg3" <?php echo @$passport_file; ?> height="90" width="80" >
                  </div>
                </div>
              </div>

              <div class="row" style="margin-top: 2%;">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header card-header-primary">
                      <h4 style="color: white !important;" class="card-title"><i class="fa fa-lock"></i> Credentials Settings</h4>
                    </div>
                    <div class="card-body row">
                      <div class="col-md-4">
                        <div class="form-group1">
                          <label class="bmd-label-floating">Username <i class="fa fa-star"></i></label>
                          <input name="username" type="text" class="form-control" required="" value="<?php echo @$username; ?>" />
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group1 bmd-form-group1">
                          <label for="password" class="bmd-label-floating">Password <i class="fa fa-star"></i></label>
                          <div class="input-group">
                            <input name="password" type="password" class="form-control" autocomplete="off" required value="<?php echo @$password; ?>" >
                            <div class="input-group-addon eye">
                              <i class="fas fa-eye" aria-hidden="true"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-md-4">
                        <div class="form-group1">
                          <label class="bmd-label-floating">Password Mail To <i class="fa fa-star"></i></label>
                          <input id="passwordMailTo" name="password_mail_to" type="email" class="form-control" required value="<?php echo @$password_mail_to; ?>" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row" >
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header card-header-primary">
                      <h4 style="color: white !important;" class="card-title"><i class="fa fa-building"></i> Bank Details</h4>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group1">
                            <label  class="bmd-label-floating">Bank Name</label>
                            <input name="bank_name" type="text" class="form-control" value="<?php echo @$bank_name; ?>" />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group1">
                            <label class="bmd-label-floating">Account Number</label>
                            <input name="account_number" type="text" class="form-control" value="<?php echo @$account_number; ?>" />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group1">
                            <label class="bmd-label-floating">IFSC Code</label>
                            <input name="ifsc_code" type="text" class="form-control" value="<?php echo @$ifsc_code; ?>" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!--Position Details-->
                <div class="container-fluid" >
                  <div class="row" >
                    <div class="col-md-12">
                      <div class="card">
                        <div class="card-header card-header-primary">
                          <h4 style="color: white !important;" class="card-title"><i class="fa fa-trophy"></i> Position</h4>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group1">
                                <label style="font-size: 13px;" class="bmd-label-floating">Groups <i class="fa fa-star"></i></label>
                                <select style="margin-top: 2%;" name="role_id" class="browser-default custom-select" required>
                                  <option selected="selected" hidden value="">Choose..</option>
                                  <option <?php echo @$role_id_1; ?> value=1>OF</option>
                                  <option <?php echo @$role_id_2; ?> value=2>QC</option>
                                  <option <?php echo @$role_id_3; ?> value=3>Verifier</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group1">
                                <label style="font-size: 13px;" class="bmd-label-floating">Status <i class="fa fa-star"></i></label>
                                <select style="margin-top: 2%;" name="status" class="browser-default custom-select">
                                  <option selected="selected" hidden value="">Choose..</option>
                                  <option <?php echo @$status_1; ?> value=1>Active</option>
                                  <option <?php echo @$status_2; ?> value=0>Inactive</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group1">
                                <label>Date of Joining</label>
                                <input type="date" name="date_of_join" class="form-control" value="<?php echo @$date_of_join; ?>" />
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12 form_center" > 
                            <br>
                            <?php 
                              if(isset($_GET['edit_user_id']))
                              {
                                echo '<a href="javascript:save_user()" class="btn btn-warning btn-sm" ><i class="fa fa-save"></i> Update</a>';
                              }
                              else
                              {
                                echo '<a href="javascript:save_user()" class="btn btn-success btn-sm" ><i class="fa fa-save"></i> Save</a>';
                              }
                            ?>
                            <a href="" class="btn btn-primary btn-sm"><i class="fa fa-remove"></i> Reset</a>
                            <a href="Modify-User.php" class="btn btn-default btn-sm"><i class="fa fa-remove"></i> Cancel</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script>
      window.addEventListener('load', function() {
        let file1, file2, file3, file4;
        file1=document.querySelector('input[id="customFile1"]');
        file2=document.querySelector('input[id="customFile2"]');
        file3=document.querySelector('input[id="customFile3"]');
        file4=document.querySelector('input[id="customFile4"]');

        file1.addEventListener('change', function() {
          if (this.files && this.files[0]) {
            let img=document.querySelector('#myImg1');
            img.style.display="block"
            img.src = URL.createObjectURL(this.files[0]);
            img.onload = imageIsLoaded;
          }
        });
        file2.addEventListener('change', function() {
          if (this.files && this.files[0]) {
            let img = document.querySelector('#myImg2');
            img.style.display="block"
            img.src = URL.createObjectURL(this.files[0]);
            img.onload = imageIsLoaded;
          }
        });
        file3.addEventListener('change', function() {
          if (this.files && this.files[0]) {
            let img = document.querySelector('#myImg3');
            img.style.display="block"
            img.src = URL.createObjectURL(this.files[0]);
            img.onload = imageIsLoaded;
          }
        });
        file4.addEventListener('change', function() {
          if (this.files && this.files[0]) {
            let img = document.querySelector('#myImg4');
            img.style.display="block"
            img.src = URL.createObjectURL(this.files[0]);
            img.onload = imageIsLoaded;
          }
        });
      });

    </script>

  </div>
</div>
<script type="text/javascript">

  let dropdown = document.getElementById('locality-dropdown');
  dropdown.length = 0;

  let defaultOption = document.createElement('option');

  var edit_country = $('#edit_country').val() || 0;
  if(edit_country == 0)
  {
    defaultOption.text = 'Select Country';
    defaultOption.value = '0';
    dropdown.add(defaultOption);
    dropdown.selectedIndex = 0;
  }

  const country = './API/country.php';
  fetch(country).then(
    function (response) {
      if (response.status !== 200) {
        console.warn('Looks like there was a problem. Status Code: ' +
          response.status);
        return;
      }
      response.json().then(function (data) {
        let option;
        var selected_idx = 0;
        for (let i = 0; i < data.length; i++) {
          option = document.createElement('option');
          option.text = data[i].country_name;
          option.value = data[i].id;
          dropdown.add(option);
          if(data[i].id == edit_country)
          {
            selected_idx = i;
          }
        }
        dropdown.selectedIndex = selected_idx;
      });
    }
    )
  .catch(function (err) {
    console.error('Fetch Error -', err);
  });

  let servicetype = document.getElementById('select_state');
  servicetype.length = 0;

  let defaultservicetype = document.createElement('option');
  defaultservicetype.text = 'Select State';
  defaultservicetype.value = "0";

  servicetype.add(defaultservicetype);
  servicetype.selectedIndex = 0;

  function getservice(x) {
    var edit_state = $('#edit_state').val() || 0;
    const id = {
      country_id: x,
    };
    fetch('./API/state.php', {
      method: 'post',
      body: JSON.stringify(id),
      headers: {
        'Content-type': 'application/json'
      }
    }).then(function (response) {
      return response.text();
    }).then(function (text) {

      let stat = JSON.parse(text);
      var wrap = document.getElementById('select_state')
      while (wrap.firstChild) wrap.removeChild(wrap.firstChild)
        let option;
      var selected_idx = 0;

      for (let i = 0; i < stat.length; i++) {
        option = document.createElement('option');
        option.text = stat[i].service_type;
        option.value = stat[i].id;
        servicetype.add(option);
        if(stat[i].id == edit_state)
        {
          selected_idx = i;
        }
      }
      servicetype.selectedIndex = selected_idx;
    }).catch(function (error) {
      console.error(error);
    })

  }

  let servicename = document.getElementById('select_city');
  servicename.length = 0;

  let defaultservicename = document.createElement('option');
  defaultservicename.text = 'Select City';
  defaultservicename.value = '0';

  servicename.add(defaultservicename);
  servicename.selectedIndex = 0;

  function getservicename(x) {
    var edit_city = $('#edit_city').val() || 0;
    const id = {
      service_type_id: x,
    };
    fetch('./API/cities.php', {
      method: 'post',
      body: JSON.stringify(id),
      headers: {
        'Content-type': 'application/json'
      }
    }).then(function (response) {
      return response.text();
    }).then(function (text) {

      let stat = JSON.parse(text);
      var wrap = document.getElementById('select_city')
      while (wrap.firstChild) wrap.removeChild(wrap.firstChild)
        let option;
      var selected_idx = 0;
      for (let i = 0; i < stat.length; i++) {
        option = document.createElement('option');
        option.text = stat[i].service_name;
        option.value = stat[i].id;
        servicename.add(option);
        if(stat[i].id == edit_city)
        {
          selected_idx = i;
        }
      }
      servicename.selectedIndex = selected_idx;

    }).catch(function (error) {
      console.error(error); 
    })
  }

  <?php
    if(isset($_GET['edit_user_id']))
    {
      echo '
        getservice('.@$country_id.');
        getservicename('.@$state_id.');
      ';
    }
  ?>

  function save_user()
  {
    var error = 0;
    $("input, select, textarea").each(function ()
    {
      if($(this).prop('required'))
      {
        if($(this).val() == '')
        {
          alert('Please enter data');
          $(this).focus();
          error++;
          exit();
        }
      }
    })
    var timezone_id = $('#timezone_id').val();
    if(timezone_id == "")
    {
      alert('Please select timezone!');
    }
    else if(error == 0)
    {
      $('#modal_loading').css('display', 'block');
      var myform = document.getElementById("add_user_form");
      var fd = new FormData(myform );
      $.ajax({
        url: "./API/Action-User.php",
        data: fd,
        cache: false,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function (html) {
          $('#modal_loading').css('display', 'none');
          if(html == "inserted")
          {
            alert('User added successfully!');
            location.reload();
          }
          else if(html == "updated")
          {
            alert('User updated successfully!');
            window.location.href = "Modify-User.php";
          }
          else if(html == "already")
          {
            alert('This user account already exists!');
          }
          else
          {
            alert('Error occurred');
          }
        }
      });
    }
  }

  let eye = document.querySelector(".eye")
  let passwordInput = document.querySelector("[name='password']")
  eye.onclick = () => {
    if (passwordInput.type == "text") {
      passwordInput.type = "password"
      eye.innerHTML = "<i class='fas fa-eye'></i>"
    } else { 
      passwordInput.type = "text"
      eye.innerHTML = "<i class='fas fa-eye-slash'></i>"
    }
  }

</script>
<script>
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
<script type="text/javascript">
  $('.chosen-select').chosen();
</script>
<script src="assets/js/core/jquery.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap-material-design.min.js"></script>
<script src="https://unpkg.com/default-passive-events"></script>
<script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Chartist JS -->
<script src="assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="assets/js/material-dashboard.js?v=2.1.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/demo/demo.js"></script>

</body>
</html>