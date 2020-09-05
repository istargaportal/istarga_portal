<?php
$page_name = "View Order";
include 'Header.php';
?>
<div class="content">
  <div class="container-fluid">

    <div class="col-md-12 no_padding">
      <div class="card card-plain">
        <div class="card-header card-header-primary">
          <h4 class="card-title mt-0"> Search</h4>
        </div>
        <div class="row col-md-12">
          <div class="col-md-12"><br></div>
          <div class="col-md-4">
            <label>Name</label>
            <input type="text" class="form-control" placeholder="Enter First Name" id="first_name">
          </div>
          <div class="col-md-4">
            <label>&nbsp;</label>
            <input type="text" class="form-control" placeholder="Enter Last Name" id="last_name">
          </div>
          <div class="col-md-4">
            <label>Order Status</label>
            <select id="order_status" class="form-control">
              <option value="">ALL</option>
              <option>Fresh</option>
              <option>In Progress</option>
              <option>Insuffiency</option>
              <option>Completed</option>
            </select>
          </div>
          <div class="col-md-4">
            <label>Internal Reference ID</label>
            <input type="text" class="form-control" placeholder="Enter Internal Reference ID" id="internal_reference_id">
          </div>
          <div class="col-md-4">
            <label>Joining Location</label>
            <input type="text" class="form-control" placeholder="Enter Joining Location" id="joining_location">
          </div>
          <div class="col-md-4">
            <br>
          </div>
          <div class="col-md-4">
            <label>Case Ref. No.</label>
            <input type="text" class="form-control" placeholder="Enter Case Ref. No." id="case_reference_no">
          </div>

          <div class="col-md-4">
            <label>Order Creation Date</label>
            <input type="text" class="form-control" id="order_creation_date_time" placeholder="DD-MM-YYYY" onfocus='(this.type="date")' onblur='(this.type="text")' />
          </div>
          <div class="col-md-4">
            <br>
          </div>
          <div class="col-md-4">
            <label>Order Complete Date</label>
            <input type="text" class="form-control" id="order_completion_date" placeholder="DD-MM-YYYY" onfocus='(this.type="date")' onblur='(this.type="text")' >
          </div>

          <div class="col-md-4">
            <label>Email ID</label>
            <input type="email" class="form-control" placeholder="Enter Email ID" id="email_id">
          </div>

          <div class="col-md-4 form_center">
            <br>
            <a href="javascript:getAllClientData()" class="btn btn-success btn-sm"><i class="fa fa-search"></i> Search</a>
            <a href="" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i> Reset</a>
          </div>
          <div class="col-md-12"><br><br></div>
        </div>

        <div class="card-header card-header-primary">
          <h4 class="card-title mt-0"> Order Status Details</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive" style="overflow-y: hidden;">
            <div id='data_table'></div>
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
<!--   Core JS Files   -->
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
<!-- Latest compiled and minified JavaScript -->
<?php
include '../datatable/_datatable.php';
?>
<script src="ClientViewOrder.js"></script>
<?php
if(isset($_GET['view_id']))
{
  echo '
  <script>
    view_order_details('.base64_decode($_GET['view_id']).')
  </script>';
}
?>
</body>
</html>