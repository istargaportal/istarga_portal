<?php

require_once "../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

$page_name = "Bulk Order";
include 'Header.php';
?>
<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-3">
            <label>Service</label>
            <select id="service_id" class="browser-default custom-select chosen-select">
              <option value="">Select Service</option>
              <?php
                $check='SELECT id, service_name FROM service_list WHERE default_id = 1 AND id IN (2, 9) ';
                $resul = mysqli_query($db,$check); 
                while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
                {
                  echo '<option value="'.$row["id"].'">'.$row["service_name"].'</option>';
                }
              ?>
            </select>
          </div>
          <div class="col-md-2">
            <br>
            <a href="javascript:download_service()" class="btn btn-primary btn-sm"><i class="fa fa-download"></i> Download Format</a>
          </div>
          <div class="col-md-7">
            <div class="form-check" onclick="upload_bulk_div()" style="margin-top:7%">
              <label class="form-check-label">Click here to Upload Bulk Order
                <input class="form-check-input" id="upload_bulk_check" type="checkbox" />
                <span class="form-check-sign">
                  <span class="check"></span>
                </span>
              </label>
            </div>
          </div>
          <div id="upload_file_div" style="display: none;" class="row col-md-12">
            <div class="col-md-4">
              <br>
              <label style="margin-top: 4px;">Select File</label>
              <input type="file" class="form-control" id="fileupload" />
            </div>
            <!-- <div class="col-md-2">
              <br>
              <label style="margin-top: 4px;">From Date</label>
              <input type="date" class="form-control" id="from_date">
            </div>
            <div class="col-md-2">
              <br>
              <label style="margin-top: 4px;">Time</label>
              <input type="time" class="form-control" id="from_time">
            </div>
            <div class="col-md-2">
              <br>
              <label style="margin-top: 4px;">To Date</label>
              <input type="date" class="form-control" id="to_date">
            </div>
            <div class="col-md-2">
              <br>
              <label style="margin-top: 4px;">Time</label>
              <input type="time" class="form-control" id="to_time">
            </div> -->
            <div class="col-md-4">
              <br>
              <br>
              <button id="submit_btn" onclick="upload_bulk_order()" class="btn btn-success btn-sm"><i class="fa fa-upload"></i> Upload</button>
              <a href="" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i> Reset</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title"><i class="fa fa-edit"></i> LOG REPORTS</h4>
      </div>
      <br>
      <div class="table-responsive row col-md-12">
        <div class="col-md-12" id="data_table"></div>
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
<?php
include '../datatable/_datatable.php';
?>

<script>

  function upload_bulk_div()
  {
    if($('#upload_bulk_check').prop('checked') == true)
    {
      $('#upload_file_div').css('display', '');
    }
    else
    {
      $('#upload_file_div').css('display', 'none');
    }
  }

  function load_bulk_order()
  {
    var load_condition = "load_bulk_order";
    $.ajax({
      type:'POST',
      url:'./API/Action-Bulk-Order.php',
      data:{load_condition},
      success:function(html){
        $('#data_table').html(html);
        load_datatable();
      }
    });
  }
  load_bulk_order();

  function view_all_orders(bulk_order_id, condition)
  {
    var load_condition = "load_orders";
    $.ajax({
      type:'POST',
      url:'./API/Action-Bulk-Order.php',
      data:{load_condition, bulk_order_id, condition},
      success:function(html){
        $('#print_result').html(html);
      }
    });
  }

  function close_modal()
  {
    $('#print_result').html('');
  }

  function download_service()
  {
    let service_id = $('#service_id').val();
    if(service_id == "")
    {
      alert("Please select service!");
      $('#service_id').focus();
    }
    else
    {
      if(service_id == "2") { window.open('../docs/Education-Sample-Template.xlsx'); }
      if(service_id == "9") { window.open('../docs/Criminal-Court-Sample-Template.xlsx'); }
      // if(service_id == "9") { window.open('../docs/Online-Criminal-Sample-Template.xlsx'); }
    }
  }

  function upload_bulk_order()
  {
    let service_id = $('#service_id').val();
    let fileupload = $('#fileupload').prop('files')[0] || 0;
    // let from_date = $('#from_date').val();
    // let from_time = $('#from_time').val();
    // let to_date = $('#to_date').val();
    // let to_time = $('#to_time').val();
    
    if(service_id == "")
    {
      alert("Please select service!");
      $('#service_id').focus();
    }
    else if(fileupload == "0")
    {
      alert('Please select File!!!');
      $('#fileupload').focus();
    }
    // else if(from_date == "")
    // {
    //   alert('Please select from date!!!');
    //   $('#from_date').focus();
    // }
    // else if(from_time == "")
    // {
    //   alert('Please select from time!!!');
    //   $('#from_time').focus();
    // }
    // else if(to_date == "")
    // {
    //   alert('Please select to date!!!');
    //   $('#to_date').focus();
    // }
    // else if(to_time == "")
    // {
    //   alert('Please select to time!!!');
    //   $('#to_time').focus();
    // }
    else
    {
      $('#modal_loading').css('display', 'block');
      $('#submit_btn').prop('disabled', true);
      let form_data = new FormData();
      let load_condition = 'import_bulk_order';
      form_data.append('fileupload', fileupload);
      form_data.append('service_id', service_id);
      // form_data.append('from_date', from_date);
      // form_data.append('from_time', from_time);
      // form_data.append('to_date', to_date);
      // form_data.append('to_time', to_time);
      form_data.append('load_condition', load_condition);

      $.ajax({
        url:'./API/Action-Bulk-Order.php',
        dataType: 'text',  
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'POST',
        success: function(html){
          $('#modal_loading').css('display', 'none');
          $('#print_result').html(html);
          $('#fileupload').val('');
          load_bulk_order();
          $('#submit_btn').prop('disabled', false);
        }
      });
    }
  }
</script>
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

</body>
</html>