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
      <div class="card card-plain">
          <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <br>
                </div>
                <div class="col-md-4">
                    <select id="default_report_color_id" class="form-control">
                        <option value="">Select Log</option>
                        <?php
                            $check='SELECT default_report_color_id, order_status FROM default_report_color ';
                            $resul = mysqli_query($db,$check); 
                            while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
                            {
                                echo '<option value="'.$row['default_report_color_id'].'">'.$row['order_status'].'</option>';
                            }
                        ?>
                    </select>
                </div>
            </div>
          <div class="table-responsive" style="overflow-y: hidden;">
            <div id='data_table'>
                <?php
                echo '<table id="datatable_tbl" class="table table-hover" >
                    <thead class="text-primary" style="background-color: rgba(15, 13, 13, 0.822) !important;">
                      <th>SR.NO.</th>
                      <th>Applicant Name</th>
                      <th>Internal Reference ID</th>
                      <th>Email ID</th>
                      <th>Order Creation</th>
                      <th>Order Completion Date</th>
                      <th>Order status</th>
                      <th class="noExport">Actions</th>
                    </thead>';
            $query="SELECT * FROM `order_master` WHERE client_id = '$client_id' ORDER BY order_id DESC ";
            $resul = mysqli_query($db,$query); 
            $i=0;
            while($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
            {
                $i++;
                    $order_status = $row['order_status'];
                    echo '
                    <tr>
                        <td class="tablehead1">
                          '.$i.'
                        </td>
                        <td class="tablehead1">
                          '.$row["first_name"].' '.$row["last_name"].' 
                        </td>
                        <td class="tablehead1">
                          '.$row["internal_reference_id"].'
                        </td>
                        <td class="tablehead1">
                          '.$row["email_id"].'
                        </td>
                        <td class="tablehead1">
                          '.$row["order_creation_date_time"].'
                        </td>
                        <td class="tablehead1">
                          '.$row["order_completion_date"].'
                        </td>
                        <td class="tablehead1">
                          '.$order_status.'
                        </td>
                        <td class="noExport">
                          <a onclick="generate_report('.$row["order_id"].')" class="btn btn-warning btn-sm"><i class="fa fa-print"></i> Generate Report</a>
                        </td>
                      </tr>
                    ';
                }
             
            echo '</table>';
                ?>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<script>

    function generate_report(order_id)
    {
        var default_report_color_id = $('#default_report_color_id').val();
        if(default_report_color_id == "")
        {
            alert('Please select Default Report Color!');
        }
        else
        {
            window.open('../API/Print-Background-Verification-Report.php?order_id='+order_id+'&default_report_color_id='+default_report_color_id)
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
<script type="text/javascript">
    load_datatable();
</script>

</body>
</html>