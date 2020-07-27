<?php

require_once "config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

if(isset($_GET['id']))
{
  $id = base64_decode($_GET['id']);
  $page_name = "Edit Service";
  $Action = "edit";

  if(isset($id))
  {
    $checbk='SELECT s.currency_id, s.country_id, s.service_type_id, s.id, s.service_name, st.name AS service_type_name, c.name AS country_name, cc.currency, s.price FROM service_list s INNER JOIN service_type st ON st.id = s.service_type_id INNER JOIN countries c ON c.id = s.country_id INNER JOIN countries cc ON cc.id = s.currency_id WHERE s.id ="'.$id.'" ORDER BY Id DESC';
    $resul = mysqli_query($db,$checbk); 
    if ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
    {
      $service_name = $row['service_name'];
      $country = $row['country_id'];
      $service_type_id = $row['service_type_id'];
      $currency = $row['currency'];
      $currency_id = $row['currency_id'];
      $price = $row['price'];
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
}
else
{
  $page_name = "Add Service";
  $Action = "Add";
}

include 'Header.php';

?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title"><?php echo $page_name; ?></h4>
          </div>
          <div class="row col-md-12">
            <form id="create_service" style="display: block;" class="row col-md-12">
              <input type="hidden" name="Action" value="<?php echo @$Action; ?>" />
              <input type="hidden" id="edit_country" value="<?php echo @$country; ?>">
              <input type="hidden" id="edit_service_type_id" value="<?php echo @$service_type_id; ?>">
              <input type="hidden" id="edit_currency" value="<?php echo @$currency; ?>">
              <input type="hidden" name="edit_id" value="<?php echo @$id; ?>">

              <div class="row justify-content-between">
                <div class=" col-md-4">
                  <label>Service Name</label>
                  <input style="margin-top: 1% !important;" name="service_name" value="<?php echo @$service_name; ?>" type="text" class="form-control" required>
                </div>

                <div class="col-md-4">
                  <label for="Service Type" >Service Type</label>
                  <select style="margin-top: 2% !important;" id="select_service_type" name="service_type_id" class="browser-default custom-select chosen-select" required>
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

                <div class="col-md-4">
                  <label for="Service Name">Country</label>
                  <select style="margin-top: 2% !important;" id="locality-dropdown" name="country" class="browser-default custom-select chosen-select" required>
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
              <div class="col-md-3">
                <label>Price</label>
                <input style="margin-top: 1% !important;" name="Price" type="number" class="form-control" value="<?php echo @$price; ?>" required>  
              </div>   
              <div class="col-md-3">
                <label for="Service Type">Currency</label>
                <select style="margin-top: 2% !important;" id="currency" name="currency"
                class="browser-default custom-select chosen-select" required="">
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
                <select multiple="" name="document_id[]" class="chosen-select">
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
          </div>
          <div class="row justify-content-end">
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
          <div class="form-group col-md-12">
            <div class="row justify-content-around">
              <table id="upload-excel-table" class="sr-only">
                <thead class="text-primary" style="background-color: rgba(15, 13, 13, 0.856) !important;">
                  <th>
                    country_name
                  </th>
                  <th>
                    service
                  </th>
                  <th>
                    service_type
                  </th>
                  <th>
                    price
                  </th>
                  <th>
                    currency
                  </th>
                  <th>
                    add_documents
                  </th>
                </thead>
                <tbody></tbody>
              </table>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-12 form_center">

        <button id="download-format" type="button" class="btn btn-sm btn-primary">
          <i class="material-icons icon">get_app</i> Download Format
        </button>
        <button type="button" class="btn btn-sm btn-primary" id="upload-btn">
          <i class="material-icons icon">backup</i> Upload Excel
          <input type="file" name="" id="input-excel" style="cursor: pointer; display: none;">
        </button>
      </div>
      <br>
      <div id="data_table"></div>
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

<script src="assets/js/core/jquery.min.js"></script>
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

  function save_create_service()
  {
    var error = 0;
    $("input, select").each(function ()
    {
      if($(this).prop('required'))
      {
        if($(this).val() == '')
        {
          alert('Please enter data');
          $(this).focus();
          error++;
          exit();
        }
      }
    })

    if(error == 0)
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
            location.reload();
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