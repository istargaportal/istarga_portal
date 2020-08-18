<?php

require_once "../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

$page_name = "Mandatory Fields Manager";
include 'Header.php';
?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-12" id="print_mandatory_fields"></div>
            <div class="col-md-12" style="border-bottom: dotted 1px #000;"><br></div>
            <div class="col-md-12"><br></div>
            <div class="col-md-4">
              <label>Service List</label>
              <select id="service_id" onchange="load_mandatory_fields()" class="browser-default chosen-select custom-select" >
                <?php
                  $check = 'SELECT id, service_name FROM service_list ';
                  $resul = mysqli_query($db,$check); 
                  while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
                  {
                    echo '<option value="'.$row['id'].'">'.$row['service_name'].'</option>';
                  }
                ?>
              </select>
            </div>
            <div class="col-md-3">
              <label>Enter Filed Name</label>
              <input type="text" id="" class="form-control" />
            </div>
            <div class="col-md-3">
              <label>Filed Type</label>
              <select class="browser-default chosen-select custom-select" id="">
                <option value="">Select</option>
              </select>
            </div>
            <div class="col-md-2">
              <br>
              <a class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

  $('.chosen-select').chosen();

  function load_mandatory_fields()
  {
    let service_id = $('#service_id').val();
    let load_condition = 'load_mandatory_fields';
    $.ajax({
      type:'POST',
      data:{load_condition, service_id },
      url:'./API/Action-Mandatory-Fields-Manager.php',
      success:function(html){
        $('#print_mandatory_fields').html(html);
      }
    });
  }
  load_mandatory_fields();

  function update_mandatory_fields()
  {
    var myform = document.getElementById("mandatory_fields_form");
    var fd = new FormData(myform );
    $.ajax({
      url: "./API/Action-Mandatory-Fields-Manager.php",
      data: fd,
      cache: false,
      processData: false,
      contentType: false,
      type: 'POST',
      success: function (html) {
        if(html == "updated")
        {
          alert('Mandatory Fields updated successfully!');
          load_mandatory_fields();
        }
        else
        {
          alert('Error occurred');
        }
      }
    });
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

<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap-material-design.min.js"></script>
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

</body>

</html>