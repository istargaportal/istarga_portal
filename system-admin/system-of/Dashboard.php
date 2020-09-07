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
          <input type="hidden" id="order_service_details_id_array" />
          <input type="hidden" id="actual_array_count" value="0" />
          <input type="hidden" id="total_array" value="0" />
          <div class="card-header card-header-primary">
            <h4 id='process_title' class="card-title"><i class="fa fa-search"></i> Manual Search</h4>
            <input type="text" style="display: none;" id="focus_input" />
          </div>
          <!-- <a href="javascript:start_processing()" class="btn btn-primary btn-sm"><i class="fa fa-play"></i> Start Processing</a>           -->
          <div id="process_order">
            <div class="card-body">
              <div class="row justify-content-start">
                <div class="col-md-5">
                  <label>Applicant Name</label>
                  <input type="text" class="form-control" id="applicant_name" />
                </div>
                <div class="col-md-4">
                  <label>Case Ref. No.</label>
                  <input type="text" class="form-control" id="case_reference_no" />
                </div>
                <div class="col-md-3">
                  <label>Initiation Date</label>
                  <input type="text" class="form-control form_center" id="initiation_date" onfocus='(this.type="date")' onblur='(this.type="text")' placeholder="DD-MM-YYYY" />
                </div>
                <div class="col-md-2">
                  <label>Status</label>
                  <select class="form-control chosen-select" id="order_status">
                    <option value="">ALL</option>
                    <option>Fresh</option>
                    <option>Canceled</option>
                    <option>Discrepancy</option>
                    <option>UTV</option>
                    <option>Inconclusive</option>
                    <option>Insufficiency</option>
                    <option>Insufficiency Cleared</option>
                    <option>Insufficiency Verifier</option>
                    <option>Minor Discrepancy</option>
                    <option>Park</option>
                    <option>Pending</option>
                    <option>Re-assigned</option>
                    <option>Verifier Initiated</option>
                    <option>Verifier Completed</option>
                    <option>Verified Clear</option>
                  </select>
                </div>
                <div class="col-md-3">
                  <label>Service Name</label>
                  <select class="form-control chosen-select" id="service_id">
                    <option value="">ALL</option>
                    <?php
                      $check='SELECT id, service_name FROM service_list ';
                      $resul = mysqli_query($db,$check); 
                      while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
                      {
                        echo '<option value="'.$row['id'].'">'.$row['service_name'].'</option>';
                      }
                    ?>
                  </select>
                </div>
                
                <div class="col-md-7 form_right" style="margin-top: 4px;">
                  <br>
                  <a href="javascript:load_manual_search()" class="btn btn-success btn-sm"><i class="fa fa-search"></i> Search</a> &nbsp;
                  <a href="" class="btn btn-default btn-sm"><i class="fa fa-close"></i> Reset</a>
                </div>

                <div id="data_table" class="table-responsive">
                  <br>
                  <table id="datatable_tbl" class="table table-hover" style="margin-top: 4%;">
                   <thead class="text-primary" style="background-color: rgba(15, 13, 13, 0.856) !important;">
                     <th width="10">SR.NO.</th>
                     <th>Case / Ref.NO. </th>
                     <th>Is Rush Order</th>
                     <th>Applicant Name</th>
                     <th>Order Creation Date</th>
                     <th>Expected Closure Date</th>
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
                <div class="col-md-2">
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
                <div class="col-md-2">
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
                <div class="col-md-2">
                  <label>Select Status</label>
                  <select class="form-control chosen-select" id="order_status_select">
                    <option value="">Select</option>
                    <option>Fresh</option>
                    <option>Canceled</option>
                    <option>Discrepancy</option>
                    <option>UTV</option>
                    <option>Inconclusive</option>
                    <option>Insufficiency</option>
                    <option>Insufficiency Cleared</option>
                    <option>Insufficiency Verifier</option>
                    <option>Minor Discrepancy</option>
                    <option>Park</option>
                    <option>Pending</option>
                    <option>Re-assigned</option>
                    <option>Verifier Initiated</option>
                    <option>Verifier Completed</option>
                    <option>Verified Clear</option>
                  </select>
                </div>
                <div class="col-md-3">
                  <br>
                  <a style="margin-top: 5px !important;" href="javascript:start_processing()" class="btn btn-primary btn-sm"><i class="fa fa-play"></i> Start Processing</a>
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
    var applicant_name = $('#applicant_name').val();
    var case_reference_no = $('#case_reference_no').val();
    var order_creation_date = $('#initiation_date').val();
    var order_status = $('#order_status').val();
    var service_id = $('#service_id').val();

    if(applicant_name == "" && case_reference_no == "" && order_creation_date == "" && order_status == "" && service_id == "")
    {
      $('#applicant_name').focus();
      alert('Please provide data');
    }
    else
    {
      var action = 'load_manual_search';
      $.ajax({
        type:'POST',
        data:{action, applicant_name, case_reference_no, order_creation_date, order_status, service_id},
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

  function load_attached_documents(order_id, order_service_details_id)
  {
    var service_id = $('#service_id').val();
    var action = 'load_attached_documents';
    $.ajax({
      type:'POST',
      url:'./API/Action-Dashboard.php',
      data:{order_id, order_service_details_id, service_id, action},
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
    var service_id = $('#assign_service_id').val();
    var order_status_select = $('#order_status_select').val();
    
    if(lod_country_id == "")
    {
      alert("Please select Country!");
    }
    else if(service_type_id == "")
    {
      alert("Please select Service Type!");
    }
    else if(service_id == "")
    {
      alert("Please select Service!");
    }
    else if(order_status_select == "")
    {
      alert("Please select Order Status!");
    }
    else
    {
      var action = "load_start_processing";
      $.ajax({
        type:'POST',
        url:'./API/Action-Dashboard.php',
        data:{action, lod_country_id, service_type_id, service_id, order_status_select},
        success:function(html) {
          $('#print_result').html(html);
         }
      });
    }
  }

  function next_array_num(condition)
  {
    let actual_array_count = parseFloat($('#actual_array_count').val());
    let order_service_details_id_array = $('#order_service_details_id_array').val();
    let total_array = $('#total_array').val();
    let action = "next_prev_array_num";
    $.ajax({
      type:'POST',
      url:'./API/Action-Dashboard.php',
      data:{action, order_service_details_id_array, actual_array_count},
      success:function(html) {
        $('#print_result').html(html);
       }
    });
    if(total_array - 1 != actual_array_count && condition != 'stop')
    {
      actual_array_count++;
    }
    $('#actual_array_count').val(actual_array_count);
  }

  // function prev_array_num()
  // {
  //   let actual_array_count = parseFloat($('#actual_array_count').val());
  //   let order_service_details_id_array = $('#order_service_details_id_array').val();
  //   actual_array_count--;
  //   let action = "next_prev_array_num";
  //   $.ajax({
  //     type:'POST',
  //     url:'./API/Action-Dashboard.php',
  //     data:{action, order_service_details_id_array, actual_array_count},
  //     success:function(html) {
  //       $('#print_result').html(html);
  //      }
  //   });
  //   $('#actual_array_count').val(actual_array_count);
  // }

  function load_service_order(order_service_details_id)
  {
    $('#modal_loading').css('display', 'block');
    var lod_country_id = $('#lod_country_id').val();
    var service_type_id = $('#service_type_id').val();
    var service_id = $('#assign_service_id').val();
    let actual_array_count = parseFloat($('#actual_array_count').val());
    let order_service_details_id_array = $('#order_service_details_id_array').val();
    let total_array = $('#total_array').val();
    var action = "load_service_order";
    $.ajax({
      type:'POST',
      url:'./API/Action-Dashboard.php',
      data:{action, lod_country_id, service_type_id, service_id, order_service_details_id, actual_array_count, order_service_details_id_array, total_array},
      success:function(html) {
        $('#focus_input').show();
        $('#focus_input').focus();
        $('#process_order').html(html);
        $('#focus_input').hide();
        $('#modal_loading').css('display', 'none');
       }
    });   
  }
  
</script>
<?php
include 'Footer.php';
?>