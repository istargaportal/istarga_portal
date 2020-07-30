<?php

require_once "../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

if(isset($_GET['id']))
{
  $page_name = "Edit Package";
  $id = base64_decode($_GET['id']);
  $action = "edit";

  if(isset($id))
  {
    $checbk='SELECT p.id, p.package_name, c.name, p.country_id FROM package_list p INNER JOIN countries c ON c.id = p.country_id WHERE p.id = '.$id.' ORDER BY p.id ';
    $resul = mysqli_query($db,$checbk); 
    if ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
    {
      $package_name = $row['package_name'];
      $country = $row['country_id'];
    }

    $all_service_id = array();
    $check='SELECT service_id FROM package_list_service WHERE package_id = '.$id.' ';
    $resul = mysqli_query($db,$check); 
    $i = 1;
    while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
    {
      $all_service_id[$i] = $row['service_id'];
      $i++;
    }
  }
  $page_template = "warning";
}
else
{
  $page_name = "Add Package";
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
            <h4 class="card-title"><?php echo $page_name; ?></h4>
          </div>
          <div class="card-body">
            <form id="package_form">
              <input type="hidden" name="edit_id" value="<?php echo @$id; ?>" />
              <input type="hidden" name="action" value="<?php echo @$action; ?>" />
              <div class="row justify-content-between">
                <div class="col-md-4">
                  <label>Package Name</label>
                  <input name="package_name" required="" value="<?php echo @$package_name; ?>"  type="text" class="form-control" />
                </div>
                <div class="col-md-2">
                  <label for="Service Name">Country</label>
                  <div>
                    <select id="locality-dropdown" name="country_id" onchange="select_country()" class="browser-default custom-select chosen-select" required>
                      <option value="">Select Country</option>
                      <?php
                      $check='SELECT * FROM countries ';
                      $resul = mysqli_query($db,$check); 
                      while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
                      {
                        $selected = "";
                        if($row["id"] == @$country)
                        {
                          $selected = "selected";
                        }
                        echo '<option '.@$selected.' value="'.$row['id'].'">'.$row['name'].'</option>';
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="Service Type">Services</label>
                  <div id="service_div">
                    <select multiple="" name="service_id[]" class="chosen-select">
                      <?php
                        if(isset($_GET['id']))
                        {
                          $check = "SELECT s.id, s.service_name FROM service_list s INNER JOIN service_type st ON st.id = s.service_type_id INNER JOIN countries c ON c.id = s.country_id INNER JOIN countries cc ON cc.id = s.currency_id WHERE s.country_id = ".@$country." ORDER BY s.id ";
                          $resul = mysqli_query($db,$check); 
                          while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
                          {
                            $selected = "";
                            $res_ar = array_search($row['id'],@$all_service_id);
                            if($res_ar != '')
                            {
                              $selected = "selected";
                            }
                            echo '<option '.@$selected.' value="'.$row['id'].'">'.$row['service_name'].'</option>';
                          }
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-12 form_right">
                  <?php
                  if(isset($_GET['id']))
                  {
                    echo '<a onclick="save_package()" class="btn btn-warning btn-sm"><i class="material-icons icon">create</i> Edit</a>';
                  }
                  else
                  {
                    echo '<a onclick="save_package()" class="btn btn-success btn-sm"><i class="material-icons icon">note_add</i> Add</a>';
                  }
                  ?> 
                  <a href="" class="btn btn-primary btn-sm"><i class="material-icons icon">refresh</i> Reset</a> 
                  <a href="package.php" class="btn btn-default btn-sm"><i class="material-icons icon">close</i> Cancel</a>
                </div>
              </div>
            </form>
          </div>
          <div id="data_table"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $('.chosen-select').chosen();
</script>
<script>

  function select_country()
  {
    var country = $('#locality-dropdown').val();
    $.ajax({
      type:'POST',
      url:'./API/load_services.php',
      data:{country},
      success:function(html){
        $('#service_div').html(html);
        $('.chosen-select').chosen();
      }
    });
  }

  function load_package()
  {
    $.ajax({
      type:'POST',
      url:'./API/viewpackage.php',
      success:function(html){
        $('#data_table').html(html);
        load_datatable();
      }
    });
  }
  load_package();

  function delete_package(package_id)
  {
    var r = confirm("Are you sure to delete this Package?")
    if(r == true)
    {
      var action = "delete";
      $.ajax({
        type:'POST',
        url: "./API/action-package.php",
        data:{package_id, action},
        success:function(html){
          if(html == "deleted")
          {
            alert("Package deleted successfully!");
            load_package();
          }
          else
          {
            alert("Error occurred!");
          }
        }
      });
    }
  }

  function save_package()
  {
    var error = 0;
    $("input, select").each(function ()
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
      var myform = document.getElementById("package_form");
      var fd = new FormData(myform );
      $.ajax({
        url: "./API/action-package.php",
        data: fd,
        cache: false,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function (html) {
          if(html == "inserted")
          {
            alert('Package assigned successfully!');
            location.reload();
          }
          else if(html == "updated")
          {
            alert('Package updated successfully!');
            load_package();
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
<!--mode change end-->

<!-- <script src="assets/js/core/jquery.min.js"></script> -->
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
<?php
include '../datatable/_datatable.php';
?>
</body>
</html>