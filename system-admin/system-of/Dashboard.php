<?php
$page_name = "Search Order";
include 'Header.php';

require_once "../../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 id='process_title' class="card-title"><i class="fa fa-search"></i> Manual Search</h4>
          </div>
          <!-- <a href="javascript:start_processing()" class="btn btn-primary btn-sm"><i class="fa fa-play"></i> Start Processing</a>           -->
          <div id="process_order">
            <div class="card-body">
              <div class="row justify-content-start">
                <div class="col-md-2">
                  <h4 for="DocumentName" class="bmd-label-floating">Search Order</h4>
                </div>

                <div class="col-md-3">
                  <select id="select_criteria" class="browser-default custom-select">
                    <option value="">Select Criteria</option>
                    <option value="first_last_name">First Name / Last Name</option>
                    <option value="internal_reference_id">Internal Reference ID</option>
                    <option value="joining_location">Joining Location</option>
                    <option value="email_id">Email ID</option>
                    <option value="order_creation_date">Order Creation Date</option>
                    <option value="order_completion_date">Order Completion Date</option>
                    <option value="order_status">Order Status</option>
                  </select>
                </div>
                <div class="col-md-3">
                  <input type="text" class="form-control" id="search_field">
                </div>
                <div class="col-md-4">
                  <a href="javascript:load_manual_search()" class="btn btn-success btn-sm"><i class="fa fa-search"></i> Search</a>
                </div>

                <div id="data_table" class="table-responsive">
                  <table id="datatable_tbl" class="table table-hover" style="margin-top: 4%;">
                   <thead class="text-primary" style="background-color: rgba(15, 13, 13, 0.856) !important;">
                     <th width="10">SR.NO.</th>
                     <th>Case / Ref.NO. </th>
                     <th>Is Rush Order</th>
                     <th>Applicant Name</th>
                     <th>Order Creation Date</th>
                     <th>Expected Course Date</th>
                     <th>Service</th>
                     <th>Status</th>
                     <th>Category</th>
                     <th>OF Closure Date</th>
                   </thead>
                 </table>
               </div>
             </div>
            </div>
            <div class="col-md-12">
              <br>
              <div class="card-header card-header-primary" style="margin: 0;">
                <h4 class="card-title"><i class="fa fa-cogs"></i> Process Orders</h4>
              </div>
              <br>
              <div class="row">
                <div class="col-md-3">
                  <label>Country</label>
                  <select class="browser-default chosen-select custom-select" type="select" id="lod_country_id" onchange="load_service_list()">
                    <option value="">Select</option>
                    <?php
                    $check='SELECT id, name FROM countries ';
                    $resul = mysqli_query($db,$check); 
                    while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
                    {
                      echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                    }
                    ?>
                  </select>
                </div>
                <div class="col-md-3">
                  <label for="Service Type" >Service Type</label>
                  <select style="margin-top: 2% !important;" id="service_type_id" onchange="load_service_list()" class="browser-default custom-select chosen-select" required>
                    <option value="">Select</option>
                    <?php
                    $check='SELECT id, name FROM service_type ';
                    $resul = mysqli_query($db,$check); 
                    while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
                    {
                      echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                    }
                    ?>
                  </select>
                </div>

                <div class="col-md-3">
                  <label>Service Name</label>
                  <div id="service_id_div">
                    <select style="margin-top: 2% !important;" id="assign_service_id" class="browser-default custom-select chosen-select">
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <br>
                  <a href="javascript:start_processing()" class="btn btn-primary btn-sm"><i class="fa fa-play"></i> Start Processing</a>
                </div>
              </div>
              <br>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
include '../../datatable/_datatable.php';
?>
<script type="text/javascript">
  $('.chosen-select').chosen();
  function load_manual_search()
  {
    var select_criteria = $('#select_criteria').val();
    var search_field = $('#search_field').val();
    if(select_criteria == "")
    {
      alert("Please Select Criteria!");
      $('#select_criteria').focus();
    }
    else if(search_field == "")
    {
      alert("Please Select Criteria!");
      $('#search_field').focus();
    }
    else
    {
      var action = 'load_manual_search';
      $.ajax({
        type:'POST',
        data:{action, select_criteria, search_field},
        url:'./API/Manual-Search.php',
        success:function(html){
          $('#data_table').html(html);
          load_datatable();
        }
      });
    }
  }

  function view_order_details(order_id)
  {
    $.ajax({
      type:'POST',
      url:'../../API/View-Client-Order.php',
      data:{order_id},
      success:function(html){
        $('#print_result').html(html);
      }
    });
  }

  function load_attached_documents(order_id)
  {
    var service_id = $('#service_id').val();
    var action = 'load_attached_documents';
    $.ajax({
      type:'POST',
      url:'./API/Action-Dashboard.php',
      data:{order_id, service_id, action},
      success:function(html){
        $('#documents_panel').html(html);
      }
    });
  }

  load_datatable();

  function load_service_list()
  {
    var service_type_id = $('#service_type_id').val();
    var lod_country_id = $('#lod_country_id').val();
    
    if(service_type_id == "")
    {
      // alert("Please select service type!");
    }
    else if(lod_country_id == "")
    {
      // alert("Please select service type!");
    }
    else
    {
      var action = "load_service_list";
      $.ajax({
        type:'POST',
        url:'./API/Action-Dashboard.php',
        data:{action, service_type_id, lod_country_id},
        success:function(html) {
          $('#service_id_div').html(html);
          $('.chosen-select').chosen();
        }
      });
    }
  }

  function start_processing()
  {
    var lod_country_id = $('#lod_country_id').val();
    var service_type_id = $('#service_type_id').val();
    var assign_service_id = $('#assign_service_id').val();
    
    if(lod_country_id == "")
    {
      alert("Please select Country!");
    }
    else if(service_type_id == "")
    {
      alert("Please select Service Type!");
    }
    else if(assign_service_id == "")
    {
      alert("Please select Service!");
    }
    else
    {
      var action = "load_start_processing";
      $.ajax({
        type:'POST',
        url:'./API/Action-Dashboard.php',
        data:{action, lod_country_id, service_type_id, assign_service_id},
        success:function(html) {
          $('#process_title').html('<i class="fa fa-edit"></i> View Order');
          $('#process_order').html(html);
         }
      });
    }
  }

</script>
<?php
include 'Footer.php';
?>