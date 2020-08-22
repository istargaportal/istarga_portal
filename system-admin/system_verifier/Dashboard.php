<?php
$page_name = "Dashboard";
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
            <h4 id='process_title' class="card-title"><i class="fa fa-search"></i> Order Search</h4>
          </div>
          <!-- <a href="javascript:start_processing()" class="btn btn-primary btn-sm"><i class="fa fa-play"></i> Start Processing</a>           -->
          <div id="process_order">
            <div class="card-body">
              <div class="row justify-content-start">
                
                <div class="col-md-3">
                  <h6>Name</h6>
                  <input type="text" class="form-control" id="applicant_name" />
                </div>

                <div class="col-md-2">
                  <h6>Case Reference No.</h6>
                  <input type="text" class="form-control" id="case_reference_no" />
                </div>

                <div class="col-md-2">
                  <h6>Initiation Date</h6>
                  <input type="date" class="form-control" id="initiation_date" />
                </div>

                <div class="col-md-2">
                  <h6>Status</h6>
                  <select id="status" class="browser-default chosen-select custom-select">
                    <option value="">Select</option>
                    <option>Pending</option>
                    <option>Reassigned Verifier</option>
                    <option>Insufficiency Verifier</option>
                    <option>Verifier Completed</option>
                  </select>
                </div>
                
                <div class="col-md-3">
                  <h6>Service</h6>
                  <select id="service_id" class="browser-default chosen-select custom-select">
                    <option value="">Select</option>
                    <?php
                      $check = "SELECT id, service_name FROM service_list ORDER BY service_name ";
                      $resul = mysqli_query($db,$check); 
                      while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
                      {
                        echo '<option value="'.$row['id'].'">'.$row['service_name'].'</option>';
                      }
                    ?>
                  </select>
                </div>

                <div class="col-md-12 form_right">
                  <a href="javascript:load_manual_search()" class="btn btn-success btn-sm"><i class="fa fa-search"></i> Search</a>
                  <a href="" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i> Reset</a>
                </div>

                <div id="data_table" class="table-responsive">
                  <table id="datatable_tbl" class="table table-hover" style="margin-top: 4%;">
                   <thead class="text-primary" style="background-color: rgba(15, 13, 13, 0.856) !important;">
                     <th width="10">SR.NO.</th>
                     <th>Case / Ref.NO. </th>
                     <th>Applicant Name</th>
                     <th>Verifier Initiation Date</th>
                     <th>Expected Closure Date</th>
                     <th>Service</th>
                     <th>Status</th>
                   </thead>
                 </table>
               </div>
             </div>
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
    var initiation_date = $('#initiation_date').val();
    var status = $('#status').val();
    var service_id = $('#service_id').val();
  
    var action = 'load_manual_search';
    $.ajax({
      type:'POST',
      data:{action, applicant_name, case_reference_no, initiation_date, status, service_id},
      url:'./API/Manual-Search.php',
      success:function(html){
        $('#data_table').html(html);
        load_datatable();
      }
    });
  }
  load_manual_search();

  function load_service_order(order_service_details_id, order_verify_id)
  {
    $('#process_title').html('<i class="fa fa-edit"></i> View Order');
    $('#modal_loading').css('display', 'block');
    var action = "load_service_order";
    $.ajax({
      type:'POST',
      url:'./API/Action-Dashboard.php',
      data:{action, order_service_details_id, order_verify_id},
      success:function(html) {
        $('#process_order').html(html);
        $('#modal_loading').css('display', 'none');
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

</script>
<?php
include 'Footer.php';
?>