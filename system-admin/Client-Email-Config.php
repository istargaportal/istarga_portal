<?php
$page_name = "Client Email Config";
include 'Header.php';
?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div id='data_table'></div>
          </div>
        </div>
      </div> 
    </div> 
  </div>
</div>
<div class="modal" id="client_email_id_modal">
  <div class="row">
  <div class="col-md-4"><br></div>
  <div class="col-md-4">
    <div class="modal-content">
      <h4 style="margin: 4px 0; border-bottom: solid 1px #000; " id="process_title" class="card-title"><i class="fa fa-cogs" aria-hidden="true"></i> Add Email ID</h4>
      <input type="hidden" id="add_condition">
      <input type="hidden" id="client_id_email">
      <label>Enter Email ID</label>
      <input type="email" class="form-control email" id="client_email_id">
      <div class="col-md-12 no_padding">
        <br>
        <a href="javascript:save_client_email_id()" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Save</a>
        <a href="javascript:close_client_modal()" class="btn btn-default btn-sm"><i class="fa fa-close"></i> Close</a>
        <br>
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

  function load_client_email()
  {
   var load_condition = "load_all_clients";
   $.ajax({
    type:'POST',
    url:'./API/Client-Email-Config.php',
    data:{load_condition},
    success:function(html){
      $('#data_table').html(html);
      load_datatable();
    }
  });
 }
 load_client_email();

 function delete_client_email_id(client_email_id) {
   var r = confirm('Are you sure to delete this email id?')
   if(r == true)
   {
      var load_condition = "delete_client_email_id";
     $.ajax({
      type:'POST',
      url:'./API/Client-Email-Config.php',
      data:{load_condition, client_email_id},
      success:function(html){
        load_client_email();
      }
    });
   }
 }

 function save_client_email_id() {
   let email_id = $('#client_email_id').val().trim();
   let client_id = $('#client_id_email').val();
   if(email_id == "")
   {
    $('#client_email_id').focus();
   }
   else
   {
      var load_condition = "save_client_email_id";
      var add_condition = $('#add_condition').val();
     $.ajax({
      type:'POST',
      url:'./API/Client-Email-Config.php',
      data:{load_condition, email_id, client_id, add_condition},
      success:function(html){
        if(html == "0")
        {
          alert('This email id already exists');
        }
        else
        {
          load_client_email();
          close_client_modal(); 
        }
      }
    });
   }
 }

 function add_more_client_email_id(id, client_id) {
   $('#client_email_id_modal').css('display', 'block');
   $('#add_condition').val(id);
   $('#client_id_email').val(client_id);
 }

  function close_client_modal() {
    $('#client_email_id_modal').css('display', 'none');
    $('#add_condition').val('');
    $('#client_id_email').val('');
    $('#client_email_id').val('');
  }

</script>

<script src="assets/js/core/jquery.min.js"></script>
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