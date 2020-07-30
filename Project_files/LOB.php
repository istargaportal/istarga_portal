<?php

require_once "../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

if(isset($_GET['lob_id']))
{
  $page_name = "Edit LOB";
  $lob_id = base64_decode($_GET['lob_id']);
  $action = "edit";

  if(isset($lob_id))
  {
    $checbk='SELECT lob_name FROM lob_master WHERE lob_id = '.$lob_id.' ';
    $resul = mysqli_query($db,$checbk); 
    if ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
    {
      $lob_name = $row['lob_name'];
    }

    $all_client_id = 0;
    $check='SELECT client_id FROM lob_details WHERE lob_id = '.$lob_id.' ';
    $resul = mysqli_query($db,$check); 
    $i = 1;
    while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
    {
      $all_client_id.= $row['client_id'].','.$all_client_id;
      $i++;
    }
  }
  $page_template = "warning";
}
else
{
  $page_name = "Add LOB";
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
            <form id="lob_form">
              <input type="hidden" name="edit_id" value="<?php echo @$lob_id; ?>">
              <input type="hidden" name="action" value="<?php echo @$action; ?>" />
              <div class="row justify-content-between">
                <div class="col-md-4">
                  <label>LOB Name</label>
                  <span class="bmd-form-group"><input name="lob_name" required="" value="<?php echo @$lob_name; ?>" type="text" class="form-control"></span>
                </div>
                <div class="col-md-4">
                  <label>Clients</label>
                  <div id="client_div" >
                    <select multiple="" name="client_id[]" class="chosen-select">
                      <?php    
                        if(isset($_GET['lob_id']))
                        {
                          $check = "SELECT c.id, c.Client_Name FROM client c WHERE c.id IN($all_client_id) ";
                          $resul = mysqli_query($db,$check); 
                          while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
                          {
                            echo '<option selected value="'.$row['id'].'">'.$row['Client_Name'].'</option>';
                          }
                        }
                        $check = "SELECT c.id, c.Client_Name FROM client c WHERE c.is_block = 0 AND c.id NOT IN (SELECT client_id FROM lob_details) ";
                        $resul = mysqli_query($db,$check); 
                        while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
                        {
                          echo '<option value="'.$row['id'].'">'.$row['Client_Name'].'</option>';
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-4 form_center" style="margin-top: 3%">
                  <?php
                  if(isset($_GET['lob_id']))
                  {
                    echo '<a onclick="save_lob()" class="btn btn-warning btn-sm"><i class="material-icons icon">create</i> Edit</a>';
                  }
                  else
                  {
                    echo '<a onclick="save_lob()" class="btn btn-success btn-sm"><i class="material-icons icon">note_add</i> Add</a>';
                  }
                  ?> 
                  <a href="" class="btn btn-primary btn-sm"><i class="material-icons icon">refresh</i> Reset</a> 
                  <a href="LOB.php" class="btn btn-default btn-sm"><i class="material-icons icon">close</i> Cancel</a>
                </div>
              </div>
            </form>
            <br>
            <div id="data_table"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

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
<script type="text/javascript">

  function delete_lob(lob_id)
  {
    var r = confirm("Are you sure to delete this LOB?")
    if(r == true)
    {
      var action = "delete";
      $.ajax({
        type:'POST',
        url: "./API/Action-LOB.php",
        data:{lob_id, action},
        success:function(html){
          if(html == "deleted")
          {
            alert("LOB deleted successfully!");
            load_lob();
          }
          else
          {
            alert("Error occurred!");
          }
        }
      });
    }
  }

  function save_lob()
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
      var myform = document.getElementById("lob_form");
      var fd = new FormData(myform );
      $.ajax({
        url: "./API/Action-LOB.php",
        data: fd,
        cache: false,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function (html) {
          if(html == "inserted")
          {
            alert('LOB assigned successfully!');
            location.reload();
          }
          else if(html == "updated")
          {
            alert('LOB updated successfully!');
            load_lob();
          }
          else
          {
            alert('Error occurred');
          }
        }
      });
    }
  }

  function load_lob()
  {
    var action = "display";
    $.ajax({
      type:'POST',
      url:'./API/Action-LOB.php',
      data:{action},
      success:function(html){
        $('#data_table').html(html);
        load_datatable();
      }
    });
  }
</script>
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

<?php
include '../datatable/_datatable.php';
?>
<script type="text/javascript">
  load_lob();
</script>
</body>
</html>