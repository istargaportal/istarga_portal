<?php

require_once "../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

if(isset($_GET['id']))
{
  $page_name = "Edit Client";
  $id = $_GET['id'];

  if(isset($id))
  {
    @$readonly = "readonly";
    $checbk='SELECT * FROM client WHERE user_status="1" and id="'.$id.'" ORDER BY Id DESC';
    $resul = mysqli_query($db,$checbk); 
    if ($reed = mysqli_fetch_array($resul, MYSQLI_ASSOC))
    {
      $Company=$reed['Company'];
      $User_name=$reed['User_name'];
      $first_name=$reed['first_name'];
      $Last_name=$reed['Last_name'];
      $Client_Name = $reed['Client_Name'];
      $Address=$reed['Address'];
      $postal_code=$reed['postal_code'];
      $about_me=$reed['about_me'];
      $password=$reed['password'];
      $Client_Code=$reed['Client_Code'];
      $Client_SPOC=$reed['Client_SPOC'];
      $country=$reed['country'];
      $State=$reed['State'];
      $city=$reed['city'];
      $Zip_Code=$reed['Zip_Code'];
      $Contact_Number = $reed['Contact_Number'];
      $email=$reed['email'];
      $App_Response_Time=$reed['App_Response_Time'];
      $Inv_Address=$reed['Inv_Address'];
      $Inv_Bank=$reed['Inv_Bank'];
      $Inv_Due_Days = $reed['Inv_Due_Days'];
      $Inv_Code=$reed['Inv_Code'];
      $Is_GSTIN = $reed['Is_GSTIN'];
      $Contact_Applicant=$reed['Contact_Applicant'];
      $Is_Bulk_Upload=$reed['Is_Bulk_Upload'];
      $DOB=$reed['DOB'];
      if($DOB != "0000-00-00")
      {
        $DOB = date('Y-m-d', strtotime($DOB));
      }
      $Live_DateDate=$reed['Live_DateDate'];
      $Currency=$reed['Currency'];
      $Internal_Reference_ID=$reed['Internal_Reference_ID'];
      $Email_ID=$reed['Email_ID'];
      $user_status=$reed['user_status'];
      $is_block=$reed['is_block'];
      $email = $reed['email'];
      $lob_master = $reed['lob_master'];
      $lob_master_checked = "";
      if($lob_master == "1")
      {
        $lob_master_checked = "checked";
      }
    }
    else
    {
      echo "No client Found";
    }
  }
  $page_template = "warning";
}
else
{
  $page_name = "Add Client";
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
            <h4 class="card-title"><i class="fa fa-edit"></i> <?php echo $page_name; ?></h4>
          </div>
          <div class="card-body">
            <form id="ajax" autocomplete="off">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group1">
                    <label class="bmd-label-floating">Client Name <i class="fa fa-star"></i></label>
                    <input name="Client_Name" type="text" class="form-control" required value="<?php echo @$Client_Name; ?>" />
                  </div>
                </div>
                <div class="col-md-2">
                  <label class="bmd-label-floating">LOB Master</label><br>
                  <label class="material_checkbox" style="padding-top: 6px;padding-bottom: 4px;">
                    <input style=" cursor: pointer;" class="form-check-input" type="checkbox" name="lob_master" id="lob_master" <?php echo @$lob_master_checked; ?> value="1" >
                    Select
                    <span class="checkmark" style="top: 3px;"></span>
                  </label>
                </div>
                <div class="col-md-2">
                  <div class="form-group1">
                    <label class="bmd-label-floating">Client Code <i class="fa fa-star"></i></label>
                    <input name="Client_Code" type="text" class="form-control" required value="<?php echo @$Client_Code; ?>" />
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group1">
                    <label class="bmd-label-floating">Client SPOC</label>
                    <input name="Client_SPOC" type="text" class="form-control" value="<?php echo @$Client_SPOC; ?>" />
                  </div> 
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group1">
                    <input type="hidden" id="edit_country" value="<?php echo @$country; ?>">
                    <input type="hidden" id="edit_state" value="<?php echo @$State; ?>">
                    <input type="hidden" id="edit_city" value="<?php echo @$city; ?>">
                    <input type="hidden" id="edit_currency" value="<?php echo @$Currency; ?>">
                    <input type="hidden" name="edit_id" value="<?php echo @$id; ?>">

                    <label class="bmd-label-floating" style="font-size: 13px;">Country <i class="fa fa-star"></i></label>
                    <div id="country_div">
                      <?php
                        echo '<select onchange="load_state()" class="browser-default chosen-select custom-select" id="locality-dropdown" name="locality-dropdown"><option value="">Select<option>';
                        $check = "SELECT id, name FROM countries ";
                        $resul = mysqli_query($db,$check); 
                        while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
                        {
                          $selected = "";
                          if(@$country == $row['id'])
                          {
                            $selected = "selected";
                          }
                          echo '<option '.@$selected.' value="'.$row['id'].'">'.$row['name'].'</option>';
                        }
                        echo '</select>';
                      ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group1">
                    <label class="bmd-label-floating"style="font-size: 13px;">State</label>
                    <div id="state_div">
                      <select class="browser-default chosen-select custom-select" type="select" id="select_state" name="select_state" style="color:#202940;">
                        <option value=""></option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group1">
                    <label class="bmd-label-floating" style="font-size: 13px;">City</label>
                    <div id="city_div">
                      <select class="browser-default chosen-select custom-select" type="select" id="select_city" name="select_city" style="color:#202940;">
                        <option value=""></option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group1">
                    <label class="bmd-label-floating">Zip Code</label>
                    <input name="Zip_Code" type="text" min="0" class="form-control Number" value="<?php echo @$Zip_Code; ?>" />
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group1">
                    <label class="bmd-label-floating">Contact Number <i class="fa fa-star"></i></label>
                    <input name="Contact_Number" type="text" min="0" required="" class="form-control Number" value="<?php echo @$Contact_Number; ?>" />
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group1">
                    <label class="bmd-label-floating">Applicant Response Time</label>
                    <input name="Applicant_Response_Time" type="text" min="0" class="form-control Number" value="<?php echo @$App_Response_Time; ?>" />
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group1">
                    <label class="bmd-label-floating">Invoice Address Details</label>
                    <input name="Invoice_Address_Details" type="text" class="form-control" value="<?php echo @$Inv_Address; ?>" />
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group1">
                    <label class="bmd-label-floating">Invoice Bank Detail</label>
                    <input name="Invoice_Bank_Detail" type="text" class="form-control" value="<?php echo @$Inv_Bank; ?>" />
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group1">
                    <label class="bmd-label-floating">Invoice Payment Due Days</label>
                    <input name="Invoice_Payment_Due_Days" type="text" min="0" class="form-control Number" value="<?php echo @$Inv_Due_Days; ?>" />
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group1">
                    <label class="bmd-label-floating">Invoice Code <i class="fa fa-star"></i></label>
                    <input name="Invoice_Code" type="text" required="" class="form-control" value="<?php echo @$Inv_Code; ?>" />
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group1">
                    <label class="bmd-label-floating">Is GSTIN</label>
                    <input name="Is_GSTIN" type="text" class="form-control" value="<?php echo @$Is_GSTIN; ?>" />
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group1">
                    <label class="bmd-label-floating">Email ID <i class="fa fa-star"></i></label>
                    <input name="Email_ID" type="email" class="form-control" required="" autocomplete="off" value="<?php echo @$email; ?>" <?php echo @$readonly; ?> />
                  </div>
                </div>
                <!--checkBoxes-->
                      <!-- <div class="container" style="margin-top: 2%;">
                          <div class="row">
                            <div class="col-sm-4">
                              <div
                                class="checkbox checkbox-circle checkbox-red"
                              >
                                <label
                                  class="form-check-label"
                                  for="Is Package"
                                >
                                  Is Package
                                </label>
                                <input
                                  class="form-check-input"
                                  type="checkbox"
                                  name="Is Package"
                                  id="Is Package"
                                  value="Yes"
                                  style="margin-left: 3%;"
                                />
                                <label
                                  class="form-check-label"
                                  for="Is Package"
                                  style="margin-left: 10%;"
                                >
                                  Yes
                                </label>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div
                                class="checkbox checkbox-circle checkbox-red"
                              >
                                <label class="form-check-label" for="Email ID">
                                  Email ID
                                </label>
                                <input
                                  class="form-check-input"
                                  type="checkbox"
                                  name="Email ID radio"
                                  id="Email ID"
                                  value="Yes"checkbox
                                  style="margin-left: 3%;"
                                />
                                <label
                                  class="form-check-label"
                                  for="Email ID"
                                  style="margin-left: 10%;"
                                >
                                  Yes
                                </label>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div
                                class="checkbox checkbox-circle checkbox-red"
                              >
                                <label
                                  class="form-check-label"
                                  for="Is LOB Mapping"
                                >
                                  Is LOB Mapping
                                </label>
                                <input
                                  class="form-check-input"
                                  type="checkbox"
                                  name="Is LOB Mapping"
                                  id="Is LOB Mapping"
                                  value="Yes"
                                  style="margin-left: 3%;"
                                />
                                <label
                                  class="form-check-label"
                                  for="Is LOB Mapping"
                                  style="margin-left: 10%;"
                                >
                                  Yes
                                </label>
                              </div>
                            </div>
                          </div>
                        </div> -->
                        <!--checkBoxes-->
                      </div>
                      <div class="row" style="margin-top: 2%;">
                        <div class="col-md-4">
                          <div class="form-group1">
                            <label style="font-size: 13px;" for="Currency" class="bmd-label-floating" style="margin-left: 4%;">Currency <i class="fa fa-star"></i></label>
                            <select style="margin-top: 2%;" id="currency" name="currency" class="browser-default custom-select chosen-select" >
                              <option value="">Select</option>
                              <?php
                                $check = "SELECT id, currency FROM countries ";
                                $resul = mysqli_query($db,$check); 
                                while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
                                {
                                  $selected = "";
                                  if(@$Currency == $row['id'])
                                  {
                                    $selected = "selected";
                                  }
                                  echo '<option '.@$selected.' value="'.$row['id'].'">'.$row['currency'].'</option>';
                                }
                              ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group1">
                            <label>Date of Registration</label>
                            <input type="date" name="dateofbirth" id="dateofbirth" class="form-control" value="<?php echo @$DOB; ?>" />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group1">
                            <label for="Password" class="bmd-label-floating">Password <i class="fa fa-star"></i></label>
                            <div class="input-group">
                              <input name="Password" id="password" <?php echo @$readonly; ?> type="password" class="form-control" minlength="12" autocomplete="off" required value="<?php echo @$password; ?>" />
                              <div class="input-group-addon eye">
                                <i class="fas fa-eye"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12"><br></div>
                      <div class="row justify-content-end">
                        <?php
                        if(isset($_GET['id']))
                        {
                          echo '<button onclick="save_add_client()" name="update-client" type="submit" class="btn btn-warning btn-sm" style="margin-right: 1% !important;"><i class="material-icons icon">edit</i> Update</button>';
                        }
                        else
                        {
                          echo '<button onclick="save_add_client()" name="add-client" type="submit" class="btn btn-success btn-sm" style="margin-right: 1% !important;"><i class="material-icons icon">note_add</i> Save</button>';
                        }
                        ?>
                        <a href="" class="btn btn-primary btn-sm" style="margin-right: 2%;" onclick="formReset()"><i class="material-icons icon">refresh</i> Reset</a>&nbsp;&nbsp; 
                        <a href="modifyClient.php" class="btn btn-default btn-sm" style="margin-right: 2%;"><i class="material-icons icon">close</i> Cancel</a>
                      </div>
                      <div class="clearfix"></div>
                    </form>
                  </div>
                </div>
              </div> 
            </div>
          </div>
        </div>


        <button style="opacity: 0; pointer-events: none; display: none;" type="button" class="btn btn-primary launch" data-toggle="modal" data-target="#exampleModal">
          Launch demo modal
        </button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Client added successfully</h5>
              </div>
              <div class="modal-footer">
                <button type="button" id="modal-ok-btn" data-dismiss="modal" class="btn btn-primary">OK</button>
              </div>
            </div>
          </div>
        </div>
        <script>
          const x = new Date().getFullYear();
          let date = document.getElementById("date");
          date.innerHTML = "&copy; " + x + date.innerHTML;
        </script>
      </div>
    </div>
    <!--mode changing-->
    <script>

      function load_state(state_id)
      {
        var country_id = $('#locality-dropdown').val();
        var load_data = "load_state";

        $.ajax({
          type:'POST',
          data:{load_data, country_id, state_id},
          url:'./API/Address-Functions.php',
          success:function(html){
            $('#state_div').html(html);
            $('#select_state').chosen();
            <?php
              if(@$State > 0)
              {
                echo 'load_city('.@$city.');';
              }
            ?>
          }
        });
      }

      function load_city(city_id)
      {
        var state_id = $('#select_state').val();
        var load_data = "load_city";
        $.ajax({
          type:'POST',
          data:{load_data, state_id, city_id},
          url:'./API/Address-Functions.php',
          success:function(html){
            $('#city_div').html(html);
            $('#select_city').chosen();
          }
        });
      }

      <?php
        if(@$country > 0)
        {
          echo 'load_state('.@$State.');';
        }
      ?>

      function save_add_client()
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
        var locality_dropdown = $('#locality-dropdown').val();
        var password_length = $("#password").val().trim().length;
        var currency = $('#currency').val();
        if(locality_dropdown == "")
        {
          alert('Please select country!');
        }
        else if(currency == "")
        {
          alert('Please select currency!');
        }
        else if(password_length < 11)
        {
          alert('Please enter minimum 12 digit password!')
        }
        else if(error == 0)
        {
          $('#modal_loading').css('display', 'block');
          var myform = document.getElementById("ajax");
          var fd = new FormData(myform );
          $.ajax({
            url: "./API/addClient.php",
            data: fd,
            cache: false,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (html) {
              $('#modal_loading').css('display', 'none');
              if(html == "inserted")
              {
                alert('Client added successfully!');
                window.location.href = "modifyClient.php";
              }
              else if(html == "updated")
              {
                alert('Client updated successfully!');
                window.location.href = "modifyClient.php";
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
    <!--   Core JS Files   -->
    <!-- <script src="assets/js/core/jquery.min.js"></script> -->
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap-material-design.min.js"></script>
    <!-- <script src="https://unpkg.com/default-passive-events"></script> -->
    <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chartist JS -->
    <script src="assets/js/plugins/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="assets/js/material-dashboard.js?v=2.1.0"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="assets/demo/demo.js"></script>
    <!-- <script src="data.js"></script> -->
      
    <script>
      let eye = document.querySelector(".eye")
      let passwordInput = document.querySelector("[name='Password']")
      eye.onclick = () => {
        if (passwordInput.type == "text") {
          passwordInput.type = "password"
          eye.innerHTML = "<i class='fa fa-eye'></i>"
        } else { 
          passwordInput.type = "text"
          eye.innerHTML = "<i class='fa fa-eye-slash'></i>"
        }
      }

      $('.chosen-select').chosen();
  
      function formReset() {
        document.getElementById("ajax").reset();
      }

      $(document).ready(function() {
        $().ready(function() {
          $sidebar = $(".sidebar");

          $sidebar_img_container = $sidebar.find(".sidebar-background");

          $full_page = $(".full-page");

          $sidebar_responsive = $("body > .navbar-collapse");

          window_width = $(window).width();

          $(".fixed-plugin a").click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass("switch-trigger")) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

          $(".fixed-plugin .active-color span").click(function() {
            $full_page_background = $(".full-page-background");

            $(this).siblings().removeClass("active");
            $(this).addClass("active");

            var new_color = $(this).data("color");

            if ($sidebar.length != 0) {
              $sidebar.attr("data-color", new_color);
            }

            if ($full_page.length != 0) {
              $full_page.attr("filter-color", new_color);
            }

            if ($sidebar_responsive.length != 0) {
              $sidebar_responsive.attr("data-color", new_color);
            }
          });

          $(".fixed-plugin .background-color .badge").click(function() {
            $(this).siblings().removeClass("active");
            $(this).addClass("active");

            var new_color = $(this).data("background-color");

            if ($sidebar.length != 0) {
              $sidebar.attr("data-background-color", new_color);
            }
          });

          $(".fixed-plugin .img-holder").click(function() {
            $full_page_background = $(".full-page-background");

            $(this).parent("li").siblings().removeClass("active");
            $(this).parent("li").addClass("active");

            var new_image = $(this).find("img").attr("src");

            if (
              $sidebar_img_container.length != 0 &&
              $(".switch-sidebar-image input:checked").length != 0
              ) {
              $sidebar_img_container.fadeOut("fast", function() {
                $sidebar_img_container.css(
                  "background-image",
                  'url("' + new_image + '")'
                  );
                $sidebar_img_container.fadeIn("fast");
              });
          }

          if (
            $full_page_background.length != 0 &&
            $(".switch-sidebar-image input:checked").length != 0
            ) {
            var new_image_full_page = $(".fixed-plugin li.active .img-holder")
          .find("img")
          .data("src");

          $full_page_background.fadeOut("fast", function() {
            $full_page_background.css(
              "background-image",
              'url("' + new_image_full_page + '")'
              );
            $full_page_background.fadeIn("fast");
          });
        }

        if ($(".switch-sidebar-image input:checked").length == 0) {
          var new_image = $(".fixed-plugin li.active .img-holder")
          .find("img")
          .attr("src");
          var new_image_full_page = $(".fixed-plugin li.active .img-holder")
          .find("img")
          .data("src");

          $sidebar_img_container.css(
            "background-image",
            'url("' + new_image + '")'
            );
          $full_page_background.css(
            "background-image",
            'url("' + new_image_full_page + '")'
            );
        }

        if ($sidebar_responsive.length != 0) {
          $sidebar_responsive.css(
            "background-image",
            'url("' + new_image + '")'
            );
        }
      });

          $(".switch-sidebar-image input").change(function() {
            $full_page_background = $(".full-page-background");

            $input = $(this);

            if ($input.is(":checked")) {
              if ($sidebar_img_container.length != 0) {
                $sidebar_img_container.fadeIn("fast");
                $sidebar.attr("data-image", "#");
              }

              if ($full_page_background.length != 0) {
                $full_page_background.fadeIn("fast");
                $full_page.attr("data-image", "#");
              }

              background_image = true;
            } else {
              if ($sidebar_img_container.length != 0) {
                $sidebar.removeAttr("data-image");
                $sidebar_img_container.fadeOut("fast");
              }

              if ($full_page_background.length != 0) {
                $full_page.removeAttr("data-image", "#");
                $full_page_background.fadeOut("fast");
              }

              background_image = false;
            }
          });

          $(".switch-sidebar-mini input").change(function() {
            $body = $("body");

            $input = $(this);

            if (md.misc.sidebar_mini_active == true) {
              $("body").removeClass("sidebar-mini");
              md.misc.sidebar_mini_active = false;

              $(".sidebar .sidebar-wrapper, .main-panel").perfectScrollbar();
            } else {
              $(".sidebar .sidebar-wrapper, .main-panel").perfectScrollbar(
                "destroy"
                );

              setTimeout(function() {
                $("body").addClass("sidebar-mini");

                md.misc.sidebar_mini_active = true;
              }, 300);
            }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event("resize"));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);
        });
        });
});

$("form").submit(function(event) {
  var formdata = $("form").serializeArray();
  var data = {};
  $(formdata).each(function(index, obj) {
    data[obj.name] = obj.value;
  });
      //console.log(data);
      event.preventDefault();
    });
$.ajax;
</script>
</body>
</html>