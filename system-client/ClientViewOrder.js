const getAllClientData = () => {
  var load_condition = "load_all_clients";
  var first_name = $('#first_name').val();
  var last_name = $('#last_name').val();
  var order_status = $('#order_status').val();
  var internal_reference_id = $('#internal_reference_id').val();
  var joining_location = $('#joining_location').val();
  var case_reference_no = $('#case_reference_no').val();
  var order_creation_date_time = $('#order_creation_date_time').val();
  var order_completion_date = $('#order_completion_date').val();
  var email_id = $('#email_id').val();

  $.ajax({
    type:'POST',
    url:'./API/viewclienttable.php',
    data:{load_condition, first_name, last_name, order_status, internal_reference_id, joining_location, case_reference_no, order_creation_date_time, order_completion_date, email_id},
    success:function(html){
      $('#data_table').html(html);
      load_datatable();
    }
  });
}
getAllClientData();

function delete_order(id)
{
  var r = confirm('Are you sure to delete this order!')
  if(r == true)
  {
    $.ajax({
      type:'POST',
      url:'./API/delete_order.php',
      data:{id},
      success:function(html){
        if(html == "success")
        {
          getAllClientData();
        }
        else
        {
          alert('Error occurred!');
        }
      }
    });
  }
}

function view_order_details(order_id)
{
  $.ajax({
    type:'POST',
    url:'../API/View-Client-Order.php',
    data:{order_id},
    success:function(html){
      $('#print_result').html(html);
    }
  });
}

function close_preview_order()
{
  // window.history.replaceState({}, document.title, "/" + "BGVHWD-master/system-client/ClientViewOrder.php");
  $('#print_result').html('');
}