<?php

require_once "../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

$page_name = "Create Order";
include 'Header.php';
?>
<style type="text/css">
	#preview_order .btn_remove{
		display: none;
	}
	#preview_order h5{
		font-weight: bold;
	}
	#preview_order .col-md-12, #preview_order .col-md-2 {
		padding: 0 !important;
	}
</style>
<div class="content">
	<div class="container-fluid">
		<div class="row" style="margin-top: 1%;">
			<div class="col-md-12">
				<form id="create_order_form" enctype="multipart/form-data">
					<input type="hidden" name="action" value="save_form">
					<div class="card">
						<div class="card-header card-header-primary">
							<h4 class="card-title">Personal Information</h4>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-4">
									<div class="">
										<label class="bmd-label-floating">First Name <i class="fa fa-star"></i></label>
										<input type="text" class="form-control no_space" name="first_name" required>
									</div>
								</div>
								<div class="col-md-4">
									<div class="">
										<label class="bmd-label-floating">Middle Name</label>
										<input name="middle_name" type="text" class="form-control no_space">
									</div>
								</div>
								<div class="col-md-4">
									<div class="">
										<label class="bmd-label-floating">Last Name <i class="fa fa-star"></i></label>
										<input name="last_name" type="text" class="form-control no_space" required="">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="">
										<label class="bmd-label-floating">Alias First Name</label>
										<input name="alias_first_name" type="text" class="form-control">
									</div>
								</div>
								<div class="col-md-4">
									<div class="">
										<label class="bmd-label-floating">Alias Middle Name</label>
										<input name="alias_middle_name" type="text" class="form-control">
									</div>
								</div>
								<div class="col-md-4">
									<div class="">
										<label class="bmd-label-floating">Alias Last Name</label>
										<input name="alias_last_name" type="text" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<div class="">
										<label class="bmd-label-floating">Email ID <i class="fa fa-star"></i></label>
										<input name="email_id" type="text" class="form-control" required>
									</div>
								</div>
								<div class="col-md-2">
									<div class="">
										<label class="bmd-label-floating">Internal Ref. ID <i class="fa fa-star"></i></label>
										<input name="internal_reference_id" type="text" class="form-control" maxlength="15" required="">
									</div>
								</div>
								<div class="col-md-2">
									<div class="">
										<label class="bmd-label-floating">Joining Location <i class="fa fa-star"></i></label>
										<input name="joining_location" type="text" class="form-control" required>
									</div>
								</div>
								<div class="col-md-3">
									<div class="">
										<label class="bmd-label-floating">Joining Date <i class="fa fa-star"></i></label>
										<input type="date" name="joining_date" id="dateofbirth" class="form-control" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-8">
									<label class="bmd-label-floating"> Additional Comments</label>
									<input name='additional_comments' id="additional_comments" class="form-control" />
								</div>
							</div>
						</div>
						<div class="card">
							<div id="package_service_panel">
								<div class="card-header card-header-primary">
									<h4 class="card-title" style="color:white;">Package Details</h4>
								</div>
								<div class="row" style="margin-left:1%;margin-top:2%;">
									<div class="col-md-3">
										<label>Country</label>
										<select style="margin-top: 2% !important;" id="country_id_package" onchange="load_packages()" class="browser-default custom-select chosen-select" >
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
										<label style="font-size: 14px;" class="bmd-label-floating">Package</label>
										<div id="assign_package_id_div">
											<select style="margin-top: 2%;" class="browser-default chosen-select custom-select" id="assign_package_id"></select>
										</div>
									</div>
									<div class="col-md-2">
										<br>
										<a href="javascript:select_package()" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add</a>
									</div>
									<div class="col-md-12">
										<div id="selected_packages"></div>
									</div>
								</div>

								<div class="card-header card-header-primary" style="margin-top: 2%;">
									<h4 class="card-title" style="color:white;">Service Details</h4>
								</div>
								<div class="row" style="margin-left:1%;margin-top:2%;">
									<div class="col-md-3">
										<label>Country</label>
										<select style="margin-top: 2% !important;" id="country_id_service" onchange="load_services()" class="browser-default custom-select chosen-select" >
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
										<label>Service Type</label>
										<select style="margin-top: 2% !important;" id="service_type_id" onchange="load_services()" class="browser-default custom-select chosen-select" >
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
										<label style="font-size: 14px;" class="bmd-label-static">Service</label>
										<div id="assign_service_id_div">
											<select style="margin-top: 2%;" class="browser-default chosen-select custom-select" id="service_id"></select>
										</div>
									</div>
									<div class="col-md-2">
										<br>
										<a href="javascript:select_service()" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add</a>
									</div>
									<div class="col-md-12">
										<div id="selected_services"></div>
									</div>
								</div>
							</div>

							<div class="col-md-12 form_center">
								<br> 
								<a href="javascript:check_package_service()" id="check_package_service_btn" class="btn btn-primary btn-md"><i class="fa fa-arrow-right"></i> Continue</a> 
							</div>

							<div id="document_panel" class="disabled">
								<div class="card-header card-header-primary" style="margin-top:3%;">
									<h4 class="card-title" style="color:white;">Upload Documents</h4>
								</div>

								<div class="row" style="margin-left:1%;margin-top:2%;">
									<div class="col-md-9">
										<h6 class="selection">Upload Document Here</h6>
										<div id="upload_document_list">
											<h4 class="btn btn-default btn-sm">Select Service First!</h4>
										</div>
									</div>

									<div class="col-md-3">
										<h5 class="selection">File Formats</h5>
										<div class="row selection" style="margin-left:1%;margin-top:2%;">
											<i class="fa fa-file-image-o" style="font-size:40px !important;margin-left:2%;color: green;"></i>
											<i class="fa fa-file-word-o" style="font-size:40px !important;margin-left:2%;color: blue;"></i>
											<i class="fa fa-file-excel-o " style="font-size:40px !important;margin-left:3%;color: green"></i>
											<i class="fa fa-file-powerpoint-o " style="font-size:40px !important;margin-left:3%;color: orange"></i>
											<i class="fa fa-file-pdf-o selection" style="color: red !important; margin-left:3%; font-size:40px !important;"></i>
										</div>
									</div>
								</div>
							</div>

							<div class="row col-md-12">
								<br>
								<div class="col-md-12"><hr></div>
								<div class="col-md-8 " >
									<div class="">
										<h5 class="pull-left selection">In Case Of Insufficiency Contact? &nbsp; </h5>
										<label class="container_checkbox" >
											<input style=" cursor: pointer;" class="form-check-input" type="radio" name="insufficiency_contact" name="In Case Of Insufficiency Contact?"
											id="exampleRadios1" value="Client" checked>
											Client
											<span class="checkmark"></span>
										</label>

										<label class="container_checkbox" >
											<input style=" cursor: pointer;" class="form-check-input" type="radio" name="insufficiency_contact" name="In Case Of Insufficiency Contact?"
											id="exampleRadios2" value="Employee" >
											Employee
											<span class="checkmark"></span>
										</label>
									</div>
								</div>

								<div class="col-md-4 form_right">
									<div class="form-check">
										<label class="form-check-label">
											<input class="form-check-input" name="is_rush" type="checkbox" value="1">
											Rush Order
											<span class="form-check-sign">
												<span class="check"></span>
											</span>
										</label>
									</div>
								</div>
							</div>
						</div>
						<div class="row form_right" >
							<div class="col-md-12">
								<a id="btn_preview" href="javascript:preview_order()" class="btn btn-success disabled btn-sm"><i class="fa fa-eye"></i> Preview</a>
								<a id="btn_ok" href="javascript:submit_order()" class="btn btn-primary disabled btn-sm" ><i class="fa fa-check"></i> Ok</a>
								<a href="ClientViewOrder.php" class="btn btn-default btn-sm" ><i class="fa fa-remove"></i> Cancel</a>
								<br><br>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>

		<script>
			const x = new Date().getFullYear();
			let date = document.getElementById('date');
			date.innerHTML = '&copy; ' + x + date.innerHTML;
		</script>
	</div>
</div>

<div class="modal" id="preview_order">
	<div class="row">
		<div class="col-md-2">
			<br>
		</div>
		<div class="col-md-8">
			<div class="modal-content">
				<h5 style="border-bottom: solid 1px #000;"><b><i class="fa fa-edit"></i> Preview & Continue</b>
					<a onclick="close_preview_order()" class="btn btn-danger btn-sm pull-right"><i class="fa fa-remove"></i></a>
				</h5>
				<div class="card-header card-header-primary" style="padding: 4px 8px; margin-top: 10px;">
					<h4 style="color: #fff;margin: 0;" class="card-title"><i class="fa fa-list"></i> Selected Packages</h4>
				</div>
				<span id="preview_selected_packages"></span>
				<div class="card-header card-header-primary" style="padding: 4px 8px; margin-top: 10px;">
					<h4 style="color: #fff;margin: 0;" class="card-title"><i class="fa fa-arrow-circle-right"></i> Selected Services</h4>
				</div>
				<span id="preview_selected_services"></span>
				<div class="card-header card-header-primary" style="padding: 4px 8px; margin-bottom: 15px; margin-top: 10px;">
					<h4 style="color: #fff;margin: 0;" class="card-title"><i class="fa fa-files-o"></i> Documents</h4>
				</div>
				<span id="preview_document"></span>
				<div class="card-header card-header-primary" style="padding: 4px 8px; margin-bottom: 15px; margin-top: 10px;">
					<h4 style="color: #fff;margin: 0;" class="card-title"><i class="fa fa-comments"></i> Comments</h4>
				</div>
				<h5><span id="preview_comments"></span></h5>
				
				<div class="col12">
					<a id="btn_place_order" class="btn btn-success btn-sm" onclick="submit_order()"><i class="fa fa-save"></i> Place Order</a>
					<a class="btn btn-default btn-sm" onclick="close_preview_order()"><i class="fa fa-remove"></i> Cancel</a>
					<br><br>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	let darkmode=localStorage.getItem("darkmode");
	const darkmodetoggle=document.querySelector('input[name=theme]');

	const enabledarkmode=()=>{
		document.documentElement.setAttribute('data-theme', 'dark')
		localStorage.setItem("darkmode","enabled");
	}


	const disabledarkmode=()=>{
		document.documentElement.setAttribute('data-theme', 'light')
		localStorage.setItem("darkmode",null);
	}


	if(darkmode==="enabled"){
		enabledarkmode();
	}


	darkmodetoggle.addEventListener("change", ()=>{
		darkmode=localStorage.getItem("darkmode");
		if(darkmode !== "enabled"){
			trans()
			enabledarkmode();
		}else{
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
<script type="text/javascript">
	var client_id = $('#client_id').val();
	function load_packages()
	{
		var country_id_package = $('#country_id_package').val();
		var all_package_id = 0;
		$(".package_id").each(function () {
			all_package_id = all_package_id+","+$(this).val();
		})
		var action = "load_packages";
		$.ajax({
			type:'POST',
			url:'./API/CreateOrder.php',
			data:{action, client_id, country_id_package, all_package_id},
			success:function(html) {
				$('#assign_package_id_div').html(html);
				$('#assign_package_id').chosen();
			}
		});
	}

	function load_services()
	{
		var country_id_service = $("#country_id_service").val();
		var service_type_id = $("#service_type_id").val();

		var all_assign_service_id = 0;
		$(".assign_service_id").each(function () {
			all_assign_service_id = all_assign_service_id+","+$(this).val();
		})
		var all_service_id = 0;
		$(".service_id").each(function () {
			all_service_id = all_service_id+","+$(this).val();
		})
		var action = "load_services";
		$.ajax({
			type:'POST',
			url:'./API/CreateOrder.php',
			data:{action, client_id, all_service_id, all_assign_service_id, country_id_service, service_type_id},
			success:function(html) {
				$('#assign_service_id_div').html(html);
				$('#assign_service_id').chosen();
			}
		});
	}
	
	function select_package()
	{
		var country_id_package = $('#country_id_package').val();
		var client_id = $('#client_id').val();
		var package_id = $('#assign_package_id').val();
		if(country_id_package == "")
		{
			alert('Please select country!');
		}
		else if(package_id == "")
		{
			alert("Please select package!");
		}
		else
		{
			var action = "select_package";
			var sub_action = "";

			$.ajax({
				type:'POST',
				url:'./API/CreateOrder.php',
				data:{action, country_id_package, package_id, client_id, sub_action},
				success:function(html) {
					$('#selected_packages').append(html);
				}
			});
			
			var sub_action = "preview_package";
			$.ajax({
				type:'POST',
				url:'./API/CreateOrder.php',
				data:{action, country_id_package, package_id, client_id, sub_action},
				success:function(html) {
					$('#preview_selected_packages').append(html);
				}
			});
			load_packages();		
		}
	}

	function remove_selected_package(package_id)
	{
		var r = confirm('Are you sure to remove this selected package?')
		if(r == true)
		{
			$('#package_id_panel_'+package_id).remove();
			$('#preview_package_id_panel_'+package_id).remove();
			load_packages();
		}
	}

	function select_service()
	{
		var service_type_id = $('#service_type_id').val();
		var assign_service_id = $('#assign_service_id').val();
		var error = 0;
		var all_service_id = 0;
		$(".assign_service_id").each(function () {
			if(assign_service_id == $(this).val())
			{
				error++;
			}
		})
		if(error > 0)
		{
			alert('This service already exists!')
			return;
		}
		else
		{
			var service_name = $( "#assign_service_id option:selected" ).text();;
			if(service_type_id == "")
			{
				alert('Please select Service Type!');
			}
			else if(assign_service_id == "")
			{
				alert('Please select Service!');
			}
			else
			{
				var action = "select_service";
				var sub_action = "";
				$.ajax({
					type:'POST',
					url:'./API/CreateOrder.php',
					data:{action, assign_service_id, service_name, sub_action},
					success:function(html) {
						$('#selected_services').append(html);
					}
				});
				
				var sub_action = "preview_service";
				$.ajax({
					type:'POST',
					url:'./API/CreateOrder.php',
					data:{action, assign_service_id, service_name, sub_action},
					success:function(html) {
						$('#preview_selected_services').append(html);
					}
				});
				load_services();
			}
		}
	}

	function remove_selected_service(service_id)
	{
		var r = confirm('Are you sure to remove this selected service?')
		if(r == true)
		{
			$('#service_id_panel_'+service_id).remove();
			$('#preview_service_id_panel_'+service_id).remove();
			load_services();
		}
	}

	function check_package_service()
	{
		var selected_packages = $('#selected_packages').html().trim();
		var selected_services = $('#selected_services').html().trim();

		// var all_service_id = "0";
		// $(".service_id").each(function () {
		// 	all_service_id = all_service_id +","+ $(this).val();
		// })
		// var uniq = [all_service_id]
		//   .map((name) => {
		//     return {
		//       count: 1,
		//       name: name
		//     }
		//   })
		//   .reduce((a, b) => {
		//     a[b.name] = (a[b.name] || 0) + b.count
		//     return a
		//   }, {})
		// alert(Object.keys(uniq).filter((a) => uniq[a] > 1));
		// return;
		if(selected_packages == "" && selected_services == "")
		{
			alert("Please select at least one service or package to generate order!");
		}
		else
		{
			var r = confirm("Are you sure to lock this services?");
			if(r == true)
			{
				$('#btn_preview').removeClass('disabled');
				$('#btn_ok').removeClass('disabled');
				$('#check_package_service_btn').addClass('disabled');
				$('#document_panel').removeClass('disabled');
				$('#package_service_panel').addClass('disabled');

				var all_service_id_doc = 0;
				$(".service_id_doc").each(function () {
					all_service_id_doc = all_service_id_doc+","+$(this).val();
				})

				var sub_action = "";
				var action = "load_document";
				$.ajax({
					type:'POST',
					url:'./API/CreateOrder.php',
					data:{action, all_service_id_doc, sub_action},
					success:function(html) {
						$('#upload_document_list').html(html);
					}
				});

				var sub_action = "preview_document";
				$.ajax({
					type:'POST',
					url:'./API/CreateOrder.php',
					data:{action, all_service_id_doc, sub_action},
					success:function(html) {
						$('#preview_document').html(html);
					}
				});
			}
		}
	}

	function preview_order()
	{
		$('#preview_comments').html($('#additional_comments').val());
		$('#preview_order').css('display', 'block');
	}

	function close_preview_order()
	{
		$('#preview_order').css('display', 'none');
	}
	
	function submit_order()
	{
		var error = 0;
		$("input, select, textarea").each(function ()
		{
			if($(this).prop('required'))
			{
				if($(this).val() == '')
				{
					$(this).focus();
					error++;
				}
			}
		})
		if(error == 0)
		{
			var r = confirm("Are you sure to Place this order?")
			if(r == true)
			{
				$('#btn_ok').addClass('disabled');
				$('#btn_place_order').addClass('disabled');
				var myform = document.getElementById("create_order_form");
				var fd = new FormData(myform );
				$.ajax({
					url: "./API/CreateOrder.php",
					data: fd,
					cache: false,
					processData: false,
					contentType: false,
					type: 'POST',
					success: function (html) {
						if(html == "inserted")
						{
							alert('Order placed successfully!');
							window.location.href = "ClientViewOrder.php";
						}
						else
						{
							alert('Error occurred');
							$('#btn_ok').removeClass('disabled');
							$('#btn_place_order').removeClass('disabled');	
						}
					}
				});
			}
		}
		else
		{
			alert('Please enter data');
		}
	}

</script>

<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap-material-design.min.js"></script>
<script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Chartist JS -->
<script src="assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="assets/js/material-dashboard.js?v=2.1.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/demo/demo.js"></script>
</body>
</html>