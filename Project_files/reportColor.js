
function load_all_clients()
{
  var default_client_id = $('#default_client_id').val() || 0;
  var load_condition = "all_client_list";
  $.ajax({
    type:'POST',
    url:'./API/viewclienttable.php',
    data:{load_condition, default_client_id},
    success:function(html){
      $('#client_id').html(html);
    }
  });
}
load_all_clients();