<?php
$page_name = "Reports";
include 'Header.php';
include '../config/config.php';
$get_connection=new connectdb;
$db=$get_connection->connect();

if (mysqli_connect_errno($db)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>
<div class="content">
  <div class="container-fluid">

    <div class="col-md-12">
      <br><br>
      <div class="card card-plain">
        <div class="card-header card-header-primary">
          <h4 class="card-title mt-0"> Search</h4>
        </div>
        <div class="card-body">
          <div class="row col-md-12">
            <div class="col-md-3">
              <label>Order Creation Date From</label>
              <input type="text" class="form-control form_center" id="order_creation_date_from" onfocus="(this.type=&quot;date&quot;)" onblur="(this.type=&quot;text&quot;)" placeholder="DD-MM-YYYY">
            </div>
            <div class="col-md-3">
              <label>Order Creation Date To</label>
              <input type="text" class="form-control form_center" id="order_creation_date_to" onfocus="(this.type=&quot;date&quot;)" onblur="(this.type=&quot;text&quot;)" placeholder="DD-MM-YYYY">
            </div>
            <div class="col-md-6">
              <label>Report Level</label><br>
              <label class="container_checkbox" >
                <input style=" cursor: pointer;" class="form-check-input" type="radio" value="order_level" checked name="report_level" id="order_report_level">
                Order Level
                <span class="checkmark"></span>
              </label>
            </div>
            <div class="col-md-3">
              <label>Order Completion Date From</label>
              <input type="text" class="form-control form_center" id="order_completion_date_from" onfocus="(this.type=&quot;date&quot;)" onblur="(this.type=&quot;text&quot;)" placeholder="DD-MM-YYYY">
            </div>
            <div class="col-md-3">
              <label>Order Completion Date To</label>
              <input type="text" class="form-control form_center" id="order_completion_date_to" onfocus="(this.type=&quot;date&quot;)" onblur="(this.type=&quot;text&quot;)" placeholder="DD-MM-YYYY">
            </div>
            <div class="col-md-3">
              <label>LOB</label>
              <select class="form-control" id="lob_id">
                <option>Select</option>
              </select>
            </div>
            <div class="col-md-4"><br></div>
            <div class="col-md-4 form_center">
              <br>
              <a href="javascript:download_report_in_excel()" class="btn btn-primary btn-success"><i class="fa fa-download"></i> DOWNLOAD</a>
              <a href="" class="btn btn-default"><i class="fa fa-refresh"></i> Reset</a>
            </div>
          </div>         
        </div>
      </div>
    </div>
  </div>
</div>

<script>

  function download_report_in_excel()
  {
    let report_type = "";
    if($('#order_report_level').prop('checked') == true)
    {
      report_type = 'order_level';
    }
    if($('#check_report_level').prop('checked') == true)
    {
      report_type = 'check_level';
    }
    if($('#both_report_level').prop('checked') == true)
    {
      report_type = 'both';
    }
    let order_creation_date_from = $('#order_creation_date_from').val();
    let order_creation_date_to = $('#order_creation_date_to').val();

    let order_completion_date_from = $('#order_completion_date_from').val();
    let order_completion_date_to = $('#order_completion_date_to').val();

    let condition = 'download';
    $.ajax({
      type:'POST',
      url:'./API/Download-Report.php',
      data:{condition, report_type},
      success:function(html) {
        var tbl_data = "<style> td, tr, th, table{ vertical-align:middle;} table {border: 1px solid gray;}th {border: 1px solid gray;padding: 5px;background-color:grey;color: white;}td {border: 1px solid gray;padding: 5px;}</style><table>"+html+"</table>";
        window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tbl_data));
        location.reload();
        return false
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
<!--   Core JS Files   -->
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

</body>
</html>