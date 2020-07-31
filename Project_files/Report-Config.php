<?php
require_once "../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

$page_name = "Report Configuration";
include 'Header.php';
?>
<style type="text/css">
  .custom-select{
    background: transparent;
  }
</style>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title"><?php echo @$page_name; ?></h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-3">
                <label>Client</label>
                <select class="chosen-select" id="client_id">
                  <option value="">Select</option>
                  <?php
                    $sq="SELECT id, Client_Name FROM client ORDER BY id DESC ";
                    $resul = mysqli_query($db,$sq); 
                    while($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
                    {
                      echo '<option value="'.$row['id'].'">'.$row['Client_Name'].'</option>';
                    }
                  ?>
                </select>
              </div>
              <div class="col-md-3">
                <label>Process</label>
                <select class="chosen-select" id="standard_macro_id">
                  <option value="">Select</option>
                  <?php
                    $sq="SELECT id, scenario FROM standard_macro ORDER BY id DESC ";
                    $resul = mysqli_query($db,$sq); 
                    while($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
                    {
                      echo '<option value="'.$row['id'].'">'.$row['scenario'].'</option>';
                    }
                  ?>
                </select>
              </div>
              <div class="col-md-3">
                <label>Template</label>
                <select class="chosen-select" id="standard_macro_id">
                  <option value="">Select</option>
                  
                </select>
              </div>
              <div class="col-md-3">
                <br>
                <a href="javascript:save_email_triggers()" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Save</a>
                <a href="" class="btn btn-primary btn-sm"><i class="fa fa-history"></i> Reset</a>
                <a href="Report-Config" class="btn btn-default btn-sm"><i class="fa fa-remove"></i> Cancel</a>
              </div>
              <div class="table-responsive">
                <div id="data_table"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function save_email_triggers()
  {
    var email_body = $('#email_body').val().trim();
    var standard_macro_id = $('#standard_macro_id').val();
    if(standard_macro_id == "")
    {
      alert('Please select scenario!');
      $('#standard_macro_id').focus();
    }
    else if(email_body == "")
    {
      alert('Please enter email body!');
      $('#email_body').focus();
    }
    else
    {
      var action = 'save';
      $.ajax({
        type:'POST',
        data:{action, email_body, standard_macro_id},
        url:'./API/Action-Report-Config.php',
        success:function(html){
          alert("Report Configuration added successfully!");
          $('#email_body').val('');
          load_email_triggers();
        }
      });
    }
  }

  function delete_eta_macro(email_trigger_id )
  {
    var delete_email_trigger_id  = email_trigger_id ;
    var r = confirm("Are you sure to delete this Report Configuration?");
    if(r == true)
    {
      var action = 'delete';
      $.ajax({
        type:'POST',
        data:{action, delete_email_trigger_id },
        url:'./API/Action-Report-Config.php',
        success:function(html){
          load_email_triggers();
          alert("Report Configuration deleted successfully!");
        }
      });
    }
  }

  function edit_eta_macro(email_trigger_id )
  {
    $('#email_body_lbl_'+email_trigger_id ).css('display', 'none');
    $('#email_body_txt_'+email_trigger_id ).css('display', 'block');
    $('#email_body_txt_'+email_trigger_id ).focus();

    $('#update_btn_'+email_trigger_id ).css('display', 'inline-block');
    $('#edit_btn_'+email_trigger_id ).css('display', 'none');
  }

  function update_eta_macro(email_trigger_id )
  {
    var email_body = $('#email_body_txt_'+email_trigger_id ).val().trim();

    if(email_body == "")
    {
      alert('Please enter email body!')
    }
    else
    {
      var action = 'update';
      $.ajax({
        type:'POST',
        data:{action, email_body, email_trigger_id},
        url:'./API/Action-Report-Config.php',
        success:function(html){
          alert("Report Configuration updated successfully!");
          $('#email_body_txt_'+email_trigger_id ).val('');
          load_email_triggers();
        }
      });
    }
  }

  function load_email_triggers()
  {
    var action = 'display';
    $.ajax({
      type:'POST',
      data:{action},
      url:'./API/Action-Report-Config.php',
      success:function(html){
        $('#data_table').html(html);
        load_datatable();
      }
    });
  }
  load_email_triggers();
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
<script type="text/javascript">
  $('.chosen-select').chosen();
</script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap-material-design.min.js"></script>
<script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="assets/js/plugins/chartist.min.js"></script>
<script src="assets/js/material-dashboard.js?v=2.1.0"></script>
<?php
include '../datatable/_datatable.php';
?>
<script type="text/javascript">
  load_datatable();
</script>

</body>
</html>