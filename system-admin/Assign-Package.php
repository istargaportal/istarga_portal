<?php

require_once "../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

if(isset($_GET['edit_id']))
{
  $page_name = "Assign Package";
  $id = base64_decode($_GET['edit_id']);

  if(isset($id))
  {
    $check='SELECT client_id, country_id, package_id, price FROM assigned_package WHERE id = '.$id.' ';
    $resul = mysqli_query($db,$check);
    if ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
    {
      $client_id = $row['client_id'];
      $country_id = $row['country_id'];
      $package_id = $row['package_id'];
      $price = $row['price'];
    }
  }
  $page_template = "warning";
  $action = "edit";
}
else
{
  $page_name = "Assign Package";
  $page_template = "primary";
  $action = "add";
}

include 'Header.php';
include 'API/dropdown.css';

?>
<div class="content" id="wapud">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-<?php echo @$page_template; ?>">
            <h4 class="card-title"><i class="fa fa-edit"></i> <?php echo $page_name; ?></h4>
          </div>
          <div class="card-body">
            <form id="assign_service">
              <input type="hidden" name="action" value="<?php echo @$action; ?>">
              <input type="hidden" id="edit_client_id" value="<?php echo @$client_id; ?>">
              <input type="hidden" id="edit_country" value="<?php echo @$country; ?>">
              <input type="hidden" id="edit_service_type_id" value="<?php echo @$service_type_id; ?>">
              <input type="hidden" id="edit_package_id" value="<?php echo @$package_id; ?>">
              <input type="hidden" id="edit_currency" value="<?php echo @$currency; ?>">
              <input type="hidden" name="edit_id" value="<?php echo @$id; ?>">
              
              <input type="hidden" id="package_id_all" value="<?php echo @$package_id_all; ?>">
              <input type="hidden" id="package_id_all" value="<?php echo @$package_id_all; ?>">

              <div class="row justify-content-between">
                <div class="col-md-3">
                  <label for="Client Name">Client Name</label>
                  <div id="client_id_div">
                    <select class="browser-default custom-select chosen-select" onchange="load_package_list()" onchange0="load_package_service(0)" name="client_id" id="client_id">
                      <?php
                      if(@$client_id != "")
                      {
                        $edit_query = " AND id = '$client_id' ";
                      }
                      else
                      {
                        echo '<option value="">Select</option>';
                      }
                      $check='SELECT id, Client_Name FROM client WHERE is_block = 0 '.@$edit_query.' ORDER BY Client_Name ';
                      $resul = mysqli_query($db,$check); 
                      while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
                      {
                        $selected = "";
                        if($row["id"] == @$client_id)
                        {
                          $selected = "selected";
                        }
                        echo '<option '.@$selected.' value="'.$row['id'].'">'.$row['Client_Name'].'</option>';
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <label>Country</label>
                  <select style="margin-top: 2% !important;" id="country_id" name="country_id" onchange="load_package_list()" class="browser-default custom-select chosen-select" >
                    <?php
                    if(@$country_id != "")
                    {
                      $edit_query = " WHERE id = '$country_id' ";
                    }
                    else
                    {
                      echo '<option value="">Select Country</option>';
                    }
                    $check='SELECT * FROM countries '.@$edit_query;
                    $resul = mysqli_query($db,$check); 
                    while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
                    {
                      $selected = "";
                      if($row["id"] == @$country_id)
                      {
                        $selected = "selected";
                      }
                      echo '<option '.@$selected.' value="'.$row['id'].'">'.$row['name'].'</option>';
                    }
                    ?>
                  </select>
                </div>

                <div class="col-md-3">
                  <label>Package Name</label>
                  <div id="package_id_div">
                    <select style="margin-top: 2% !important;" id="package_id" name="package_id" class="browser-default custom-select chosen-select" required>
                      <?php
                      if(isset($_GET['edit_id']))
                      {
                        $check='SELECT id, package_name FROM package_list WHERE id = '.@$package_id.' ';
                        $resul = mysqli_query($db,$check); 
                        if ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
                        {
                          echo '<option value="'.$row['id'].'">'.$row['package_name'].'</option>';
                        }
                      }
                      else
                      {
                        echo '<option value="">Select Service</option>';
                      }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="col-md-3">
                  <label>Price</label>
                  <input type="text" class="form-control Number" name="price" value="<?php echo @$price; ?>" />
                </div>

                <div class="form-group col-md-12 form_right">
                  <?php
                  if(isset($_GET['edit_id']))
                  {
                    echo '<a href="javascript:save_assign_package(2)" name="update_btn" type="submit" id="assignSubmit" class="btn btn-warning btn-sm"><i class="material-icons icon">edit</i> Update</a>';
                  }
                  else
                  {
                    echo '<a href="javascript:save_assign_package(1)" name="add_btn" type="submit" id="assignSubmit" class="btn btn-success btn-sm"><i class="material-icons icon">note_add</i> Assign</a>';
                  }
                  ?>
                  <a href="" class="btn btn-primary btn-sm"><i class="material-icons icon">refresh</i> Reset</a>
                  <a href="Assign-Package.php" class="btn btn-default btn-sm"><i class="material-icons icon">close</i> Cancel</a>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div id="data_table"></div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal -->
        <div class="add-service-modal">
          <button style="opacity: 0; pointer-events: none; display: none;" type="button" class="btn btn-primary launch" data-toggle="modal" data-target="#exampleModal">
            Launch demo modal
          </button>

          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Service Assigned Successfully</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-footer">
                  <button type="button" id="modal-ok-btn" data-dismiss="modal" class="btn btn-primary">OK</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="delete-modal">
          <button style="opacity: 0; pointer-events: none; display: none;" type="button" class="btn btn-primary launch" data-toggle="modal" data-target="#deleteModal">
            Launch demo modal
          </button>

          <!-- Modal -->
          <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete?</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" id="modal-ok-btn">Yes</button>
                </div>
              </div>
            </div>
          </div>
        </div> 

        <script>
          window.onload = T2;
        </script>

        <script>
          const x = new Date().getFullYear();
          let date = document.getElementById("date");
          date.innerHTML = "&copy; " + x + date.innerHTML;
        </script>
      </div>
    </div>
    <!--   Core JS Files   -->
    <!--mode changing-->
    
    <!--mode change end-->
    <script type="text/javascript">
      $('.chosen-select').chosen();
    </script>
    <!-- <script src="assets/js/core/jquery.min.js"></script> -->
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap-material-design.min.js"></script>
    <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!--  Notifications Plugin    -->
    <script src="assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="assets/js/material-dashboard.js?v=2.1.0"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <!-- <script src="assignService.js"></script> -->

    <?php
    include '../datatable/_datatable.php';
    ?>
    <script>

      function package_select()
      {
        var package_check = 0; var package_id_all = 0;
        $(".package_check").each(function () {
          if($(this).prop('checked') == true)
          {
            package_check++;
            package_id_all = package_id_all+","+$(this).val();
          }
        })
        load_package_service(1);
        if(package_check > 0)
        {
          $('#package_btn').html(package_check+" packages selected");
        }
        else
        {
          $('#package_btn').html("Select Package");
        }
      }

      function service_select()
      {
        var service_check = 0;
        $(".service_check").each(function () {
          if($(this).prop('checked') == true)
          {
            service_check++;
          }
        })
        if(service_check > 0)
        {
          $('#service_btn').html(service_check+" services selected");
        }
        else
        {
          $('#service_btn').html("Select service");
        }
      }

      function delete_assigned_package(del_assigned_id)
      {
        var r = confirm("Are you sure to delete this Assigned Services?")
        if(r == true)
        {
          var action = 'delete';
          $.ajax({
            type:'POST',
            url:'./API/Action-Assign-Package.php',
            data:{action, del_assigned_id},
            success:function(html) {
              if(html == 'deleted')
              {
                load_assign_package();
                alert('Assign Package deleted successfully!');
              }
              else
              {
                alert('Error occurred');
              }
            }
          });
        }
      }

      function load_package_service(condtion)
      {
        var client_id = $('#client_id').val();
        var package_id_all = $('#package_id_all').val();

        var package_id_all_sel = 0;
        $(".package_check").each(function () {
          if($(this).prop('checked') == true)
          {
            package_id_all_sel = package_id_all_sel+","+$(this).val();
          }
        })
        var package_id = $('#package_id').val();
        if(condtion == "0")
        {
          var action = "load_package";
          $.ajax({
            type:'POST',
            url:'./API/Action-Assign-Package.php',
            data:{action, client_id, package_id},
            success:function(html) {
              $('#package_list_id').html(html);
              package_select();
              $('.chosen-select').chosen();
            }
          });
        }

        var package_id_all = $('#package_id_all').val();
        var action = "load_services";
        $.ajax({
          type:'POST',
          url:'./API/Action-Assign-Package.php',
          data:{action, client_id, package_id_all, package_id_all_sel},
          success:function(html) {
            $('#service_list').html(html);
            service_select();
            <?php if(isset($_GET['edit_id'])) { echo 'service_select();'; } ?>
          }
        });
      }

      function load_package_list()
      {
        var client_id = $('#client_id').val();
        var country_id = $('#country_id').val();
        if(client_id == "")
        {
          // alert("Please select client!");
        }
        else if(country_id == "")
        {
          // alert("Please select country!");
        }
        else
        {
          var action = "load_package_list";
          $.ajax({
            type:'POST',
            url:'./API/Action-Assign-Package.php',
            data:{action, client_id, country_id},
            success:function(html) {
              $('#package_id_div').html(html);
              $('.chosen-select').chosen();
            }
          });
        }
      }

      function load_assign_package()
      {
        var action = "display";
        $.ajax({
          type:'POST',
          url:'./API/Action-Assign-Package.php',
          data:{action},
          success:function(html) {
            $('#data_table').html(html);
            load_datatable();
          }
        });
      }

      load_assign_package();

      function open_package_box() {
        document.getElementById("package_list_id").classList.toggle("show");
      }

      function open_service_box() {
        document.getElementById("service_list_id").classList.toggle("show");
      }

      function save_assign_package()
      {
        var client_id = $('#client_id').val();
        var country_id = $('#country_id').val();
        var package_id = $('#package_id').val();
        var price = $('#price').val();
        if(client_id == "")
        {
          alert('Please select client!');
        }
        else if(country_id == "")
        {
          alert('Please select country!');
        }
        else if(package_id == "")
        {
          alert('Please select package!');
        }
        else if(price == "")
        {
          alert('Please enter price!');
        }
        else
        {
          var myform = document.getElementById("assign_service");
          var fd = new FormData(myform );
          $.ajax({
            url: "./API/Action-Assign-Package.php",
            data: fd,
            cache: false,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (html) {
              if(html == "inserted")
              {
                alert('Service assigned successfully!');
                window.location.href = "Assign-Package.php";
              }
              else if(html == "updated")
              {
                alert('Service assigned update successfully!');
                load_assign_package();
              }
              else
              {
                alert('Error occurred');
              }
            }
          });
        }
      }

      function filter_package_function()
      {
        var input, filter, ul, li, a, i;
        input = document.getElementById("packageInput");
        filter = input.value.toUpperCase();
        div = document.getElementById("package_list_id");
        a = div.getElementsByTagName("li");
        for (i = 0; i < a.length; i++) {
          txtValue = a[i].textContent || a[i].innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            a[i].style.display = "";
          } else {
            a[i].style.display = "none";
          }
        }
      }

      function filter_service_function() {
        var input, filter, ul, li, a, i;
        input = document.getElementById("serviceInput");
        filter = input.value.toUpperCase();
        div = document.getElementById("service_list_id");
        a = div.getElementsByTagName("li");
        for (i = 0; i < a.length; i++) {
          txtValue = a[i].textContent || a[i].innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            a[i].style.display = "";
          } else {
            a[i].style.display = "none";
          }
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
      <?php if(isset($_GET['edit_id'])) { echo 'load_package_service(0);'; } ?>
    </script>
    <script>
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

            var simulateWindowResize = setInterval(function() {
              window.dispatchEvent(new Event("resize"));
            }, 180);

            setTimeout(function() {
              clearInterval(simulateWindowResize);
            }, 1000);
          });
        });
});

</script>
</body>

</html>