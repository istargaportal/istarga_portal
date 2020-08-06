<?php
$page_name = "Modify User";
$action = "add";
include 'Header.php';
?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
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
      url:'./API/Action-User.php',
      success:function(html){
        $('#data_table').html(html);
        load_datatable();
      }
    });
  }
  load_users();

  function delete_user(user_id)
  {
    var r = confirm('Are you sure to delete this user?')
    if(r == true)
    {
      var action = 'delete';
      var delete_user_id = user_id;
      $.ajax({
        type:'POST',
        data:{action, delete_user_id},
        url:'./API/Action-User.php',
        success:function(html){
          load_users();
        }
      }); 
    }
  }

  function activate_deactivate_user(condition, user_id)
  {
    if(condition == 1){ var message = "Activate"; }
    if(condition == 0){ var message = "Deactivate"; }
    var r = confirm('Are you sure to '+ message + ' this user?')
    if(r == true)
    {
      var action = 'act_dec';
      var ac_dc_user_id = user_id;
      $.ajax({
        type:'POST',
        data:{action, condition, ac_dc_user_id},
        url:'./API/Action-User.php',
        success:function(html){
          if(html == "1")
          {
            alert("User is activated");
          }
          else
          {
            alert("User is deactivated")
          }
          load_users();
        }
      }); 
    }
  }
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
<?php
  include '../datatable/_datatable.php';
?>
<script type="text/javascript">
    load_datatable();
</script>
</body>
</html>