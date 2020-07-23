function load_all_clients()
{
	var client_select = 1;
	var load_condition = "all_client_list";
	$.ajax({
		type:'POST',
		url:'./API/viewclienttable.php',
		data:{load_condition, client_select},
		success:function(html){
			$('#client_id').html(html);
		}
	});
}
load_all_clients();

function load_report_color()
{
	var client_id = $('#client_id').val() || 0;
	if(client_id != 0)
	{
		$('#submit_btn').removeClass('disabled');
	}
	else
	{
		$('#submit_btn').addClass('disabled');
	}
	$.ajax({
		type:'POST',
		url:'./API/client_report_color.php',
		data:{client_id},
		success:function(html){
			$('#report_table').html(html);
		}
	});
}
load_report_color();