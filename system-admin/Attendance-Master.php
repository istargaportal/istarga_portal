<?php
$page_name = "Attendance Master";
include 'Header.php';
?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 id='process_title' class="card-title"><i class="fa fa-calendar"></i> <?php echo date('d, M Y'); ?></h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <div id='data_table'></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function load_users()
  {
    var action = "display";
    $.ajax({
      type:'POST',
      data:{action},
      url:'./API/Action-Attendance-Master.php',
      success:function(html){
        $('#data_table').html(html);
        load_datatable();
      }
    });
  }
  load_users();

</script>
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
  include 'Attendance-Functions.php';
?>

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