<?php

require_once "../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

$page_name = "Mandatory Fields Manager";
include 'Header.php';
?>
<style type="text/css">
  .disabled_box .chosen-single, .chosen-container, .disabled_box .chosen-container-single{
    background: #ccc !important
  }
</style>
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
              <input type="text" id="service_field_text" class="form-control" />
            </div>
            <div class="col-md-3">
              <label>Filed Type</label>
              <select id='data_type' class="browser-default chosen-select custom-select" id="">
                <option value="">Select</option>
                <option value="short_text">Short Text</option>
                <option value="date">Date</option>
                <option value="email">Email</option>
                <option value="long_text">Long Text</option>
                <option value="number">Number</option>
              </select>
            </div>
            <div class="col-md-2">
              <br>
              <a href="javascript:save_mandatory_field()" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add </a>
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
        $('.chosen-select').chosen();
      }
    });
  }
  load_mandatory_fields();

  function save_mandatory_field()
  {
    let service_id = $('#service_id').val();
    var data_type = $('#data_type').val();
    var service_field_text = $('#service_field_text').val();
    let load_condition = 'save_mandatory_field';
    if(service_field_text == "")
    {
      alert('Please enter field name!');
    }
    else if(data_type == "")
    {
      alert('Please select data type!');
    } 
    else
    {
      $.ajax({
        type:'POST',
        data:{load_condition, service_id, data_type, service_field_text },
        url:'./API/Action-Mandatory-Fields-Manager.php',
        success:function(html){
          load_mandatory_fields();
          $('#service_field_text').val('');
        }
      });
    }
  }

  function delete_mandatory_field(service_field_id)
  {
    var r = confirm('Are you sure to delete this field?');
    if(r == true)
    {
      var load_condition = 'delete_mandatory_field';
      $.ajax({
        type:'POST',
        data:{load_condition, service_field_id },
        url:'./API/Action-Mandatory-Fields-Manager.php',
        success:function(html){
          $('#print_result').html(html);
          load_mandatory_fields();
        }
      });
    }
  }

  function update_mandatory_fields(service_field_id, service_id)
  {
    let load_condition = 'update_mandatory_fields';
    var service_field_text = $('#service_field_'+service_field_id).val().trim();
    var data_type = $('#data_type_'+service_field_id).val().trim();
    var check_service_field = 0;
    if($('#check_service_field_'+service_field_id).prop('checked') == true)
    {
      check_service_field = 1;
    }

    if(service_field_text == "")
    {
      alert('Service Field should have any text');
      $('#service_field_'+service_field_id).focus();
    }
    else
    {
      $.ajax({
        type:'POST',
        data:{load_condition, service_field_text, service_field_id, service_id, data_type, check_service_field },
        url:'./API/Action-Mandatory-Fields-Manager.php',
        success:function(html){
          $('#print_result').html(html);
          // $('.chosen-select').chosen();
        }
      });
    }
    
    // var myform = document.getElementById("mandatory_fields_form");
    // var fd = new FormData(myform );
    // $.ajax({
    //   url: "./API/Action-Mandatory-Fields-Manager.php",
    //   data: fd,
    //   cache: false,
    //   processData: false,
    //   contentType: false,
    //   type: 'POST',
    //   success: function (html) {
    //     if(html == "updated")
    //     {
    //       alert('Mandatory Fields updated successfully!');
    //       load_mandatory_fields();
    //     }
    //     else
    //     {
    //       alert('Error occurred');
    //     }
    //   }
    // });
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
<!-- <script async defer src="https://buttons.github.io/buttons.js"></script> -->
<!--  Google Maps Plugin    -->
<!-- Chartist JS -->
<script src="assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="assets/js/material-dashboard.js?v=2.1.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->

</body>

</html>