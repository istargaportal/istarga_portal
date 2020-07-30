<?php
$page_name = "Add User";
$action = "add";
include 'Header.php';
?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title"><?php echo @$page_name; ?></h4>
          </div>
          <div class="card-body">
            <form id="add_user_form" enctype="multipart/form-data">
              <input type="hidden" name="action" value="<?php echo @$action; ?>" />
              <div class="row" style="margin-top: 1%;">
                <div class="col-md-3">
                  <div class="form-group">
                    <label style="font-size: 13px;" class="bmd-label-floating">Title <i class="fa fa-star"></i></label>
                    <select style="margin-top: 2%;" name="prefix" id="Title" class="browser-default custom-select" required>
                      <option selected="selected" hidden value="">Choose..</option>
                      <option value="Mr.">Mr.</option>
                      <option value="Mrs.">Mrs.</option>
                      <option value="Ms.">Ms.</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">First Name <i class="fa fa-star"></i></label>
                    <input name="first_name" type="text" class="form-control no_space" required="" />
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Middle Name </label>
                    <input name="middle_name" type="text" class="form-control no_space" />
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Last Name <i class="fa fa-star"></i></label>
                    <input name="last_name" type="text" class="form-control no_space" required="" />
                  </div>
                </div>
              </div>
              <!--Second row-->
              <div class="row">
                <div class="col-md-2">
                  <label>Date of Birth</label>
                  <input type="date" name="date_of_birth" id="dateofbirth" class="form-control" />
                </div>
                <div class="col-md-2">
                  <label>Employee ID</label>
                  <input type="text" name="employee_id" class="form-control" />
                </div>
                <div class="col-md-5">
                  <br>
                </div>
                <div class="col-md-1" style="padding: 0;">
                  <div class="form-group">
                    <input type="file" accept="image/*" id="customFile4" name="profile_pic">
                    <label style="border: 1px solid grey; margin-top: 3%; padding: 4px; cursor: pointer; letter-spacing: .5px;" for="customFile4">Browse</label>
                  </div>
                </div>
                <div class="col-md-1">
                  <img style="border:solid" id="myImg4" height="90" width="80" >
                </div>
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Permanent Address <i class="fa fa-star"></i></label>
                    <textarea name="permanent_address" rows="3" required="" class="form-control"></textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Temporary Address</label>
                    <textarea name="temporary_address" rows="3" class="form-control"></textarea>
                  </div>
                </div>
                
              </div>
              <div class="row justify-content-between" style="margin-top: 1%;">
                <input type="hidden" id="edit_country" value="<?php echo @$country; ?>">
                <input type="hidden" id="edit_state" value="<?php echo @$State; ?>">
                <input type="hidden" id="edit_city" value="<?php echo @$city; ?>">
                <input type="hidden" name="edit_id" value="<?php echo @$id; ?>">

                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating" style="font-size: 13px;">Country <i class="fa fa-star"></i></label>
                    <select class="browser-default custom-select" type="select" id="locality-dropdown" name="country_id" onchange="getservice(this.value)" style="color:#202940;" required>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating"style="font-size: 13px;">State <i class="fa fa-star"></i></label>
                    <select class="browser-default custom-select" type="select" id="select_state" name="state_id" onchange="getservicename(this.value)" style="color:#202940;">
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating" style="font-size: 13px;">City <i class="fa fa-star"></i></label>
                    <select class="browser-default custom-select" type="select" id="select_city" name="city_id" onchange="getdocumentlist(this.value)" style="color:#202940;">
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Pincode <i class="fa fa-star"></i></label>
                    <input name="pincode" type="text" class="form-control" />
                  </div>
                </div>
              </div>
              <div class="row justify-content-between" style="margin-top: 1%;">
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Email ID <i class="fa fa-star"></i></label>
                    <input name="email_id" type="email" class="form-control" required="" />
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Contact Number <i class="fa fa-star"></i></label>
                    <input name="contact_number" type="number" class="form-control" required="" />
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Alternate Contact Number</label>
                    <input name="alternate_contact" type="number" class="form-control" />
                  </div>
                </div>
              </div>                       
              <div class="row justify-content-start" style="margin-top: 1%;">
                <div class="col-md-3" style="padding-right: 0;">
                  <div class="form-group">
                    <label class="bmd-label-floating">Adhar Number</label>
                    <input name="adhar_number" type="text" class="form-control" />
                  </div>
                </div>  
                <div class="col-md-1" style="padding: 0;">
                  <div class="form-group">
                    <input type="file" accept="image/*" id="customFile1" name="adhar_file">
                    <label style="border: 1px solid grey; margin-top: 3%; padding: 4px; cursor: pointer; letter-spacing: .5px;" for="customFile1">Browse</label>
                  </div>
                </div>

                <div class="col-md-3" style="padding-right: 0;">
                  <div class="form-group">
                    <label class="bmd-label-floating">PAN Number</label>
                    <input name="pan_number" type="text" class="form-control" />
                  </div>
                </div>  
                <div class="col-md-1" style="padding: 0;">
                  <div class="form-group">
                    <input type="file" accept="image/*" id="customFile2" name="pan_file">
                    <label style="border: 1px solid grey; margin-top: 3%; padding: 4px; cursor: pointer; letter-spacing: .5px;" for="customFile2">Browse</label>
                  </div>
                </div>

                <div class="col-md-3" style="padding-right: 0;">
                  <div class="form-group">
                    <label class="bmd-label-floating">Passport</label>
                    <input name="passport_number" type="text" class="form-control" />
                  </div>
                </div>  
                <div class="col-md-1" style="padding: 0;">
                  <div class="form-group">
                    <input type="file" accept="image/*" id="customFile3" name="passport_file">
                    <label style="border: 1px solid grey; margin-top: 3%; padding: 4px; cursor: pointer; letter-spacing: .5px;" for="customFile3">Browse</label>
                  </div>
                </div>           
              </div>

              <div class="row">
                <div class="col-md-4">
                  <div class="col-md-4">
                    <img style="border:solid" id="myImg1" height="90" width="80" >
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="col-md-4">
                    <img style="border:solid" id="myImg2" height="90" width="80" >
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="col-md-4">
                    <img style="border:solid" id="myImg3" height="90" width="80" >
                  </div>
                </div>
              </div>

              <div class="row" style="margin-top: 2%;">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header card-header-primary">
                      <h4 style="color: white !important;" class="card-title">Credentials Settings</h4>
                    </div>
                    <div class="card-body row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Username <i class="fa fa-star"></i></label>
                          <input name="username" type="text" class="form-control" required="" />
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Password <i class="fa fa-star"></i></label>
                          <input name="password" type="password" class="form-control" required="" />
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Password Mail To <i class="fa fa-star"></i></label>
                          <input id="passwordMailTo" name="password_mail_to" type="email" class="form-control" required />
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
                      <h4 style="color: white !important;" class="card-title">Bank Details</h4>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label  class="bmd-label-floating">Bank Name</label>
                            <input name="bank_name" type="text" class="form-control" />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">Account Number</label>
                            <input name="account_number" type="text" class="form-control" />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">IFSC Code</label>
                            <input name="ifsc_code" type="text" class="form-control" />
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
                          <h4 style="color: white !important;" class="card-title">Position</h4>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label style="font-size: 13px;" class="bmd-label-floating">Groups <i class="fa fa-star"></i></label>
                                <select style="margin-top: 2%;" name="role_id" class="browser-default custom-select" required>
                                  <option selected="selected" hidden value="">Choose..</option>
                                  <option value=1>OF</option>
                                  <option value=2>QC</option>
                                  <option value=3>Vendor</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label style="font-size: 13px;" class="bmd-label-floating">Status <i class="fa fa-star"></i></label>
                                <select style="margin-top: 2%;" name="status" class="browser-default custom-select">
                                  <option selected="selected" hidden value="">Choose..</option>
                                  <option value=1>Active</option>
                                  <option value=0>Inactive</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Date of Joining</label>
                                <input type="date" name="date_of_join" class="form-control" />
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12 form_center" > 
                            <br>
                            <a href="javascript:save_user()" class="btn btn-success btn-sm" ><i class="fa fa-save"></i> Save</a>
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

    if(error == 0)
    {
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
          if(html == "inserted")
          {
            alert('User added successfully!');
            // location.reload();
          }
          else if(html == "updated")
          {
            alert('User updated successfully!');
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