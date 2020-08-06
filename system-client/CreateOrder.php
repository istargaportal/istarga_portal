<?php

require_once "../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

$page_name = "Create Order";
include 'Header.php';
?>
<div class="content">
	<div class="container-fluid">
		<div class="row" style="margin-top: 1%;">
			<div class="col-md-12">
				<form id="ajax" enctype="multipart/form-data">
					<div class="card">
						<div class="card-header card-header-primary">
							<h4 class="card-title">Personal Information</h4>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-4">
									<div class="">
										<label class="bmd-label-floating">First Name</label>
										<input type="text" class="form-control no_space" name="First_Name" required>
									</div>
								</div>
								<div class="col-md-4">
									<div class="">
										<label class="bmd-label-floating">Middle Name</label>
										<input name="Middle_Name" type="text" class="form-control no_space">
									</div>
								</div>
								<div class="col-md-4">
									<div class="">
										<label class="bmd-label-floating">Last Name</label>
										<input name="Last_Name" type="text" class="form-control no_space">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="">
										<label class="bmd-label-floating">Alias Name</label>
										<input name="Alias_Name" type="text" class="form-control">
									</div>
								</div>
								<div class="col-md-4">
									<div class="">
										<label class="bmd-label-floating">Middle Name</label>
										<input name="Alias_Middle_Name" type="text" class="form-control">
									</div>
								</div>
								<div class="col-md-4">
									<div class="">
										<label class="bmd-label-floating">Last Name</label>
										<input name="Alias_Last_Name" type="text" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<div class="">
										<label class="bmd-label-floating">Email ID</label>
										<input name="email_id" type="text" class="form-control" required>
									</div>
								</div>
								<div class="col-md-2">
									<div class="">
										<label class="bmd-label-floating">Internal Reference ID</label>
										<input name="Internal_Reference_ID" type="number" class="form-control">
									</div>
								</div>
								<div class="col-md-2">
									<div class="">
										<label class="bmd-label-floating">Joining Location</label>
										<input name="Joining_Location" type="text" class="form-control" required>
									</div>
								</div>
								<div class="col-md-3">
									<div class="">
										<label class="bmd-label-floating">Joining Date</label>
										<input type="date" name="Joining_date" id="dateofbirth" class="form-control" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-8">
									<label class="bmd-label-floating"> Additional Comments</label>
									<input name='additional_comments' class="form-control" />
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
											$check='SELECT * FROM countries ';
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
										<div id="package_id_div">
											<select style="margin-top: 2%;" class="browser-default chosen-select custom-select" id="package_id"></select>
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
											$check='SELECT * FROM countries ';
											$resul = mysqli_query($db,$check); 
											while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
											{
												echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
											}
											?>
										</select>
									</div>
									<div class="col-md-3">
										<label style="font-size: 14px;" class="bmd-label-static">Service </label>
										<div id="service_id_div">
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
								<a href="javascript:check_package_service()" id="check_package_service_btn" class="btn btn-primary btn-md pull-right"><i class="fa fa-arrow-right"></i> Continue</a> 
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
											<i class="fa fa-file-word-o" style="font-size:40px !important;margin-left:2%;color: tomato;"></i>
											<i class="fa fa-file-excel-o " style="font-size:40px !important;margin-left:3%;color: green"></i>
											<i class="fa fa-file-powerpoint-o " style="font-size:40px !important;margin-left:3%;color: brown"></i>
											<i class="fa fa-file-pdf-o selection" style="color: orange !important; margin-left:3%; font-size:40px !important;"></i>
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
											<input style=" cursor: pointer;" class="form-check-input" type="radio" name="Insufficiency-contact" name="In Case Of Insufficiency Contact?"
											id="exampleRadios1" value="Client" checked>
											Client
											<span class="checkmark"></span>
										</label>

										<label class="container_checkbox" >
											<input style=" cursor: pointer;" class="form-check-input" type="radio" name="Insufficiency-contact" name="In Case Of Insufficiency Contact?"
											id="exampleRadios2" value="Employee" >
											Employee
											<span class="checkmark"></span>
										</label>
									</div>
								</div>

								<div class="col-md-4 form_right">
									<div class="form-check">
										<label class="form-check-label">
											<input class="form-check-input" name="rush-order" type="checkbox" value="">
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
								<button type="button" id="preview" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Preview</button>
								<button id="ok" type="submit" class="btn btn-primary btn-sm" ><i class="fa fa-check"></i> Ok</button>
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
<div class="modal preview-modal">
	<table class="table table-hover" style="margin-top: 4%;">
		<tbody id="table">
		</tbody>
	</table>
	<div class="row justify-content-center preview-btns" style="margin-right:2% ; margin-top:3%; margin-bottom:2%">

		<button type="button" id="place-order" class="btn btn-primary pull-left" style="margin-left:4%;">Place Order</button>
		<div class="clearfix"></div>

		<button type="button" class="btn btn-primary pull-left" style="margin-left:2%;">Cancel</button>
		<div class="clearfix"></div>
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
				$('#package_id_div').html(html);
				$('#package_id').chosen();
			}
		});
	}

	function load_services()
	{
		var country_id_service = $("#country_id_service").val();
		var all_service_id = 0;
		$(".service_id").each(function () {
			all_service_id = all_service_id+","+$(this).val();
		})
		var action = "load_services";
		$.ajax({
			type:'POST',
			url:'./API/CreateOrder.php',
			data:{action, client_id, all_service_id, country_id_service},
			success:function(html) {
				$('#service_id_div').html(html);
				$('#service_id').chosen();
			}
		});
	}
	
	function select_package()
	{
		var country_id_package = $('#country_id_package').val();
		var client_id = $('#client_id').val();
		var package_id = $('#package_id').val();
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
			$.ajax({
				type:'POST',
				url:'./API/CreateOrder.php',
				data:{action, country_id_package, package_id, client_id},
				success:function(html) {
					$('#selected_packages').append(html);
					load_packages();
				}
			});
		}
	}

	function remove_selected_package(package_id)
	{
		var r = confirm('Are you sure to remove this selected package?')
		if(r == true)
		{
			$('#package_id_panel_'+package_id).remove();
			load_packages();
		}
	}

	function select_service()
	{
		var service_id = $('#service_id').val();
		var service_name = $( "#service_id option:selected" ).text();;
		if(service_id == "")
		{
			alert('Please select Service!');
		}
		else
		{
			var action = "select_service";
			$.ajax({
				type:'POST',
				url:'./API/CreateOrder.php',
				data:{action, service_id, service_name},
				success:function(html) {
					$('#selected_services').append(html);
					load_services();
				}
			});
		}
	}

	function remove_selected_service(service_id)
	{
		var r = confirm('Are you sure to remove this selected service?')
		if(r == true)
		{
			$('#service_id_panel_'+service_id).remove();
			load_services();
		}
	}

	function check_package_service()
	{
		var selected_packages = $('#selected_packages').html().trim();
    // var selected_services = $('#selected_services').html().trim();
    if(selected_packages == "")
    {
    	alert("Please select at least one service or package to generate order!");
    }
    else
    {
    	var r = confirm("Are you sure to lock this services?");
    	if(r == true)
    	{
    		$('#check_package_service_btn').addClass('disabled');   
    		$('#document_panel').removeClass('disabled');   
    		$('#package_service_panel').addClass('disabled');

    		var all_service_id_doc = 0;
    		$(".service_id_doc").each(function () {
    			all_service_id_doc = all_service_id_doc+","+$(this).val();
    		})

    		var action = "load_document";
    		$.ajax({
    			type:'POST',
    			url:'./API/CreateOrder.php',
    			data:{action, all_service_id_doc},
    			success:function(html) {
    				$('#upload_document_list').html(html);
    			}
    		});

    	}
    }
}

</script>
<!-- <script src="assets/js/core/jquery.min.js"></script> -->
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap-material-design.min.js"></script>
<script src="https://unpkg.com/default-passive-events"></script>
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
<!-- <script src="js/createorder12.js"></script> -->

</body>
<script>
	updateList = function () {
		var input = document.getElementById('filexzc');
		var output = document.getElementById('fileList');
		var children = "";
		for (var i = 0; i < input.files.length; ++i) {
			children += '<li>' + input.files.item(i).name + '</li>';
		}
		output.innerHTML = '<ul>' + children + '</ul>';
	}
</script>

</html>