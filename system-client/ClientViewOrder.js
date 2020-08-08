const getAllClientData = () => {
  var load_condition = "load_all_clients";
  $.ajax({
    type:'POST',
    url:'./API/viewclienttable.php',
    data:{load_condition},
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