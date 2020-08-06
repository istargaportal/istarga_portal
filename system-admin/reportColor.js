function load_all_clients()
{
	var client_select = 1;
	var load_condition = "all_client_list";
	$.ajax({
		type:'POST',
		url:'./API/viewclienttable.php',
		data:{load_condition, client_select},
		success:function(html){
			$('#client_id_div').html(html);
			$(".chosen-select").chosen();
		}
	});
}
load_all_clients();

function load_report_color(condition)
{
	var condition = condition;
	var client_id = $('#client_id').val() || 0;
	$.ajax({
		type:'POST',
		url:'./API/client_report_color.php',
		data:{client_id, condition},
		success:function(html){
			$('#report_table').html(html);
			$('#submit_btn').removeClass('disabled');
			$(".custom-select option").each(function() {
			  var color_code = $(this).val();
			  if(color_code == "Red"){ color_code = "#eb1e2f"; }
			  if(color_code == "Green"){ color_code = "#25ce60"; }
			  if(color_code == "Amber"){ color_code = "#ffbf00"; }
			  $(this).css("background-color", color_code);
			})
		}
	});
}
load_report_color();

function change_color_selection(default_report_color_id)
{
	var color_code = $('#color_code_'+default_report_color_id).val();
	if(color_code == "Red"){ color_code = "#eb1e2f"; }
	if(color_code == "Green"){ color_code = "#25ce60"; }
	if(color_code == "Amber"){ color_code = "#ffbf00"; }
	$('#bg_color_div_'+default_report_color_id).css('background', color_code);
}

function save_report_color()
{
	var client_id = $('#client_id').val() || 0;
	var error = 0;
	var r = confirm('Are you sure to change the report colors?')
	if(r == true)
	{
		if(client_id == 0)
		{
			error = 1;
			r = confirm('Do you really want to change default Report colors?')
		}
		if(r == true || error == 0)
		{
			$('#submit_btn').addClass('disabled');
			var myform = document.getElementById("report_color_form");
			var fd = new FormData(myform );
			$.ajax({
				url: "./API/report_color_operation.php",
				data: fd,
				cache: false,
				processData: false,
				contentType: false,
				type: 'POST',
				success: function (html) {
					alert("Report Color updated!");
				}
			});
		}		
	}
}

function select_default_report_color()
{
	if($('#default_report_color').prop('checked') == true)
	{
		var r = confirm("Do you want to set Report colors to Default?")
		{
			load_report_color(1);
		}
	}
	else
	{
		$('#color_table').removeClass('disabled');
	}
}

function reset_form()
{
	var r = confirm('Do you want to Reload this page?')
	if(r == true)
	{
		location.reload();
	}
}