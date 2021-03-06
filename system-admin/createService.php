<?php

require_once "../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

if(isset($_GET['id']))
{
  $id = base64_decode($_GET['id']);
  $page_name = "Service";
  $Action = "edit";

  if(isset($id))
  {
    $checbk='SELECT s.default_id, s.is_webservices, s.currency_id, s.country_id, s.service_type_id, s.id, s.service_name, st.name AS service_type_name, s.price FROM service_list s INNER JOIN service_type st ON st.id = s.service_type_id WHERE s.id ="'.$id.'" ORDER BY Id DESC';
    $resul = mysqli_query($db,$checbk); 
    if ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
    {
      $service_name = $row['service_name'];
      $service_type_id = $row['service_type_id'];
      $price = $row['price'];
      $is_webservices_checked = "";
      if($row['is_webservices'] == "1")
      {
        $is_webservices_checked = "checked";
      }
      $disabled_btn = "";
      if($row['default_id'] == "1")
      {
        $disabled_btn = "disabled_btn";
      }
    }

    $all_document_id = array();
    $check='SELECT documentlist_id FROM service_list_documents WHERE service_id = '.$id.' ';
    $resul = mysqli_query($db,$check); 
    $i = 1;
    while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
    {
      $all_document_id[$i] = $row['documentlist_id'];
      $i++;
    }
  }
  $page_template = "warning";
}
else
{
  $page_name = "Service";
  $Action = "Add";
  $page_template = "primary";
}

include 'Header.php';

?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-<?php echo @$page_template; ?>">
            <h4 class="card-title"><i class="fa fa-edit"></i> <?php echo $Action.' '.$page_name; ?></h4>
          </div>
          <div class="row col-md-12">
            <form id="create_service" style="display: block;" class="col-md-12">
              <input type="hidden" name="Action" value="<?php echo @$Action; ?>" />
              <input type="hidden" id="edit_country" value="<?php echo @$country; ?>">
              <input type="hidden" id="edit_service_type_id" value="<?php echo @$service_type_id; ?>">
              <input type="hidden" id="edit_currency" value="<?php echo @$currency; ?>">
              <input type="hidden" name="edit_id" value="<?php echo @$id; ?>">

              <div class="row justify-content-between">
                <div class="<?php echo @$disabled_btn; ?> col-md-4">
                  <label for="Service Type" >Service Type</label>
                  <select style="margin-top: 2% !important;" id="service_type_id" name="service_type_id" class="browser-default custom-select chosen-select" required>
                    <option value="">Select Service Type</option>
                    <?php
                    $check='SELECT * FROM service_type ';
                    $resul = mysqli_query($db,$check); 
                    while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
                    {
                      $selected = "";
                      if($row["id"] == @$service_type_id)
                      {
                        $selected = "selected";
                      }
                      echo '<option '.@$selected.' value="'.$row['id'].'">'.$row['name'].'</option>';
                    }
                    ?>
                  </select>
                </div>
                <div class="col-md-4 <?php echo @$disabled_btn; ?>">
                  <label>Service Name</label>
                  <input style="margin-top: 1% !important;" name="service_name" id="service_name" value="<?php echo @$service_name; ?>" type="text" class="form-control" required>
                </div>
                <div class="col-md-4">
                  <br>
                </div>
                <div hidden="" class="col-md-4">
                  <br>
                  <div class="form-check" style="margin-top: 20px">
                    <label class="form-check-label"> <h4 class="selection" style="margin-top:-2px;">Is WebService</h4> 
                        <input class="form-check-input" name="is_webservices" value="1" type="checkbox" <?php echo @$is_webservices_checked; ?> >
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                    </label>
                  </div>
                </div>
                <div class="col-md-4" hidden="">
                  <label>Country</label>
                  <select style="margin-top: 2% !important;" id="" name="country" class="browser-default custom-select chosen-select" >
                    <option value="">Select Country</option>
                    <?php
                    $check='SELECT * FROM countries ';
                    $resul = mysqli_query($db,$check); 
                    while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
                    {
                      $selected = "";
                      if($row["id"] == @$country)
                      {
                        $selected = "selected";
                      }
                      echo '<option '.@$selected.' value="'.$row['id'].'">'.$row['name'].'</option>';
                    }
                    ?>
                  </select>
                </div>
                <div class="col-md-3" hidden="">
                  <label>Price</label>
                  <input style="margin-top: 1% !important;" name="Price" type="number" class="form-control" value="<?php echo @$price; ?>">  
                </div>
                <div class="col-md-3" hidden="">
                  <label for="Service Type">Currency</label>
                  <select style="margin-top: 2% !important;" id="currency" name="currency"
                  class="browser-default custom-select chosen-select" >
                  <option value="">Select Currency</option>
                  <?php
                  $check='SELECT * FROM countries ';
                  $resul = mysqli_query($db,$check); 
                  while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
                  {
                    $selected = "";
                    if($row["id"] == @$currency_id)
                    {
                      $selected = "selected";
                    }
                    echo '<option '.@$selected.' value="'.$row['id'].'">'.$row['currency'].'</option>';
                  }
                  ?>
                </select>
              </div>
              <div class="col-md-6">
                <label for="Service Type">Attach Documents</label>
                <div id="document_div">
                  <select multiple="" name="document_id[]" id="document_id" class="chosen-select">
                    <?php
                    $check='SELECT * FROM documentlist';
                    $resul = mysqli_query($db,$check); 
                    while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
                    {
                      $selected = "";
                      $res_ar = array_search($row['id'],@$all_document_id);
                      if($res_ar != '')
                      {
                        $selected = "selected";
                      }
                      echo '<option '.@$selected.' value="'.$row['id'].'">'.$row['document_name'].'</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <br>
                <br>
                <?php
                if(isset($_GET['id']))
                {
                  echo '<a onclick="save_create_service()" class="btn btn-warning btn-sm"><i class="material-icons icon">create</i> Edit</a>';
                }
                else
                {
                  echo '<a onclick="save_create_service()" class="btn btn-success btn-sm"><i class="material-icons icon">note_add</i> Add</a>';
                }
                ?> 
                <a href="" class="btn btn-primary btn-sm"><i class="material-icons icon">refresh</i> Reset</a> 
                <a href="createService.php" class="btn btn-default btn-sm"><i class="material-icons icon">close</i> Cancel</a>
              </div>
            </div>
            
          </form>
          <div class="col-md-12 form_center">
            <a href="../docs/Add-Service.xlsx" id="download-format" class="btn btn-sm btn-primary">
              <i class="material-icons icon">get_app</i> Download Format
            </a>
            <button onclick="import_service_modal()" type="button" class="btn btn-sm btn-primary" id="upload-btn">
              <i class="material-icons icon">backup</i> Upload Excel
            </button>
          </div>
          <br>
          <div class="col-md-12">
            <div id="data_table"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal" id="service_modal" >
  <div class="row">
    <div class="col-md-4">
      <br>
    </div>
    <div class="col-md-4">
      <div class="modal-content">
        <h4 style="border-bottom: solid 1px #000;padding: 5px 0;"><i class="fa fa-file-excel"></i> Upload Excel
          <a class="close" onclick="close_excel_import()"><i class="fa fa-remove"></i></a>
        </h4>
        <label>Select File</label>
        <input type="file" id="upload_file" class="form-control" />
        <br>
        <div class="no_padding col-md-12">
          <button onclick="import_services()" id="import_btn" class="btn btn-success btn-sm"><i class="fa fa-upload"></i> Upload </button>
          <a href="javascript:close_excel_import()" class="btn btn-default btn-sm"><i class="fa fa-remove"></i> Close </a>
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
<script type="text/javascript">
  $('.chosen-select').chosen();
</script>

<!-- <script src="assets/js/core/jquery.min.js"></script> -->
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap-material-design.min.js"></script>
<!-- <script src="https://unpkg.com/default-passive-events"></script> -->
<script src="assets/js/plugins/xlsx.full.min.js"></script>
<script src="assets/js/plugins/FileSaver.min.js"></script>
<script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Chartist JS -->
<script src="assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="assets/js/material-dashboard.js?v=2.1.0"></script>
<!-- <script src="updateservice.js"></script> -->
<script src="createService.js"></script>
<?php
include '../datatable/_datatable.php';
?>
<script>
  function formReset() {
    document.getElementById("ajax").reset();
  }

  function close_excel_import()
  {
    $('#service_modal').css('display', 'none');
    $('#upload_file').val('');
  }

  function import_service_modal()
  {
    $('#service_modal').css('display', 'block');
  }

  function import_services()
  {
    var upload_file = $('#upload_file').prop('files')[0] || 0;
    var form_data = new FormData();   
    form_data.append('upload_file', upload_file);

    if(upload_file == "0")
    {
      alert('Please select File!!!');
      $('#upload_file').focus();
    }
    else
    {
      $('#import_btn').prop('disabled', true);
      $('#modal_loading').css('display', 'block');
      $.ajax({
        url:'Import-Service.php',
        dataType: 'text',  
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'POST',
        success: function(html){
          $('#modal_loading').css('display', 'none');
          $('#print_result').html(html);
          close_excel_import();
          getAllAssignService(`./API/createService.php`);
          $('#import_btn').prop('disabled', false);
        }
      });
    }
  }

  function save_create_service()
  {
    var error = 0;
    var service_type_id = $('#service_type_id').val();
    var service_name = $('#service_name').val();
    var document_id = $('#document_id').val();
    // $("input, select").each(function ()
    // {
    //   if($(this).prop('required'))
    //   {
    //     if($(this).val() == '')
    //     {
    //       alert('Please enter data');
    //       $(this).focus();
    //       error++;
    //       exit();
    //     }
    //   }
    // })
    if(service_type_id == "")
    {
      alert('Please select service type!');
    }
    else if(service_name == "")
    {
      alert("Please enter service name!");
      $('#service_name').focus();
    }
    else if(document_id == "")
    {
      alert("Please select at least one document!");
    }
    else if(error == 0)
    {
      var myform = document.getElementById("create_service");
      var fd = new FormData(myform );
      $.ajax({
        url: "./API/createService.php",
        data: fd,
        cache: false,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function (html) {
          if(html == "inserted")
          {
            alert('Service assigned successfully!');
            location.reload();
          }
          else if(html == "updated")
          {
            alert('Service updated successfully!');
            window.location.href="createService.php";
          }
          else
          {
            alert('Error occurred');
          }
          getAllAssignService(`./API/createService.php`);
        }
      });
    }
  }

  function getAllAssignService(urls)
  {
    var Action = "Display";
    $.ajax({
      type:'POST',
      url:urls,
      data:{Action},
      success:function(html){
        $('#data_table').html(html);
        load_datatable();
      }
    });
  }
  getAllAssignService(`./API/createService.php`);

  function delete_service(service_id)
  {
    var r = confirm('Do you want to delete this service?')
    if(r == true)
    {
      var Action = "delete";
      $.ajax({
        type:'POST',
        url:'./API/createService.php',
        data:{Action, service_id},
        success:function(html) {
          alert('Service deleted successfully!');
          getAllAssignService(`./API/createService.php`);
        }
      });
    }
  }
</script>
<!-- <script src="js/createorder12.js"></script> -->
</body>

</html>