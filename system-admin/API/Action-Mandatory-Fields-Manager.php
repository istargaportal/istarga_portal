<?php
require_once "../../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

if (mysqli_connect_errno($db)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

extract($_POST);

if($_POST['load_condition'] == "load_mandatory_fields")
{
	echo '<form class="row" id="mandatory_fields_form">
	<input type="hidden" name="load_condition" value="update_mandatory_fields" />
	<input type="hidden" name="service_id_sel" value="'.$service_id.'" />
	';
	$i = 0;
	
	$check = "SELECT s.service_name, sm.service_field_id, sm.service_field, sm.service_field_text, sm.is_required, sm.default_field, sm.data_type FROM service_list s INNER JOIN service_field_master sm ON sm.service_id = s.id WHERE sm.service_id = '$service_id' ";
	$resul = mysqli_query($db,$check); 
	while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
	{
		if($i == 0)
		{
			echo '<h4 style="font-weight: bold;" class="col-md-12 icon">'.@$row['service_name'].'
			</h4>';
			// <a onclick="update_mandatory_fields()" class="btn btn-warning pull-right btn-sm"><i class="fa fa-edit"></i> Update</a>

			echo '
			<div class="row col-md-12">
				<div class="col-md-6 row">
					<div class="col-md-2 no_padding">
						<b>Is Required</b>
					</div>
					<div class="col-md-10 row">
						<div class="col-md-7">
							<b><i class="fa fa-pencil"></i> Field Name</b>
						</div>
						<div class="col-md-5">
							<b><i class="fa fa-edit"></i> Type</b>
						</div>
					</div>
				</div>

				<div class="col-md-6 row">
					<div class="col-md-1"><p></p></div>
					<div class="col-md-3 no_padding">
						<b>Is Required</b>
					</div>
					<div class="col-md-8 no_padding row">
						<div class="col-md-7 no_padding">
							<b><i class="fa fa-pencil"></i> Field Name</b>
						</div>
						<div class="col-md-5">
							<b><i class="fa fa-edit"></i> Type</b>
						</div>
					</div>
				</div>
				
			</div>
			';
		}

		$required_checked = "";
		if($row['is_required'] == 1)
		{
			$required_checked = "checked";
		}
		$data_type = $row['data_type'];
		$short_text_selected = ""; $date_selected = ""; $email_selected = ""; $long_text_selected = ""; $number_selected = ""; $select_selected_disabled = ""; $select_selected = "";
		if($data_type == "short_text"){ $short_text_selected = "selected"; }
		if($data_type == "date"){ $date_selected = "selected"; }
		if($data_type == "email"){ $email_selected = "selected"; }
		if($data_type == "long_text"){ $long_text_selected = "selected"; }
		if($data_type == "number"){ $number_selected = "selected"; }
		if($data_type == "select"){ $select_selected = "selected"; $select_selected_disabled = 'disabled disabled_box'; }

		echo '<div class="col-md-6">
				<input type="hidden" name="service_field_id[]" value="'.$row["service_field_id"].'" />
                  <div class="row " style="padding:5px 0">
                    <div class="col-md-2 form_center">
                      <div class="form-check">
                        <label class="form-check-label" style="margin-bottom:14px !important;">
                          <input class="form-check-input" id="check_service_field_'.$row["service_field_id"].'" type="checkbox" value="1" '.$required_checked.' />
                          <span class="form-check-sign">
                            <span class="check"></span>
                          </span>
                        </label>
                      </div>
                    </div>
                    <div class="col-md-10 row">
                    	<div class="col-md-6">
	                    	<input class="form-control" id="service_field_'.$row["service_field_id"].'" value="'.$row["service_field_text"].'" />
                    	</div>
                    	<div class="col-md-4 '.@$select_selected_disabled.'">
	                    	<select class="browser-default chosen-select custom-select" id="data_type_'.$row["service_field_id"].'">
				                <option '.@$select_selected.' value="select">Select Box</option>
				                <option '.@$short_text_selected.' value="short_text">Short Text</option>
				                <option '.@$date_selected.' value="date">Date</option>
				                <option '.@$email_selected.' value="email">Email</option>
				                <option '.@$long_text_selected.' value="long_text">Long Text</option>
				                <option '.@$number_selected.' value="number">Number</option>
				            </select>
	                    </div>

	                    <div class="col-md-2 form_center">
			                <div class="btn-group" style="margin:0;">
			                	<a href="javascript:update_mandatory_fields('.$row["service_field_id"].', '.$service_id.')" class="btn btn-warning btn-xs" style="margin-right:4px;"><i class="fa fa-pencil"></i></a>
			                	<a href="javascript:delete_mandatory_field('.$row["service_field_id"].')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
		                	</div>
		                </div>
                    </div>
                  </div>
                </div>';
		$i++;	
	}
	echo '</form>';
}

if($_POST['load_condition'] == "update_mandatory_fields")
{
	// foreach ($service_field_id as $service_field_id_s)
	// {
	// 	$check = "SELECT s.service_name, sm.service_field_id, sm.service_field, sm.service_field_text, sm.is_required FROM service_list s INNER JOIN service_field_master sm ON sm.service_id = s.id WHERE sm.service_id = '$service_id_sel' AND sm.service_field_id = '$service_field_id_s' ";
	// 	$resul = mysqli_query($db,$check); 
	// 	while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
	// 	{
	// 		$service_field = $row["service_field"];
	// 		if(isset($$service_field))
	// 		{
	// 			$is_required = $$service_field;
	// 		}
	// 		else
	// 		{
	// 			$is_required = 0;
	// 		}
	// 		$sql = "UPDATE service_field_master SET is_required = '".$is_required."' WHERE service_field_id = '$service_field_id_s' AND service_field = '$service_field' ";
	// 		$result = mysqli_query($db,$sql); 
	// 	}
	// }
	// echo "updated";

	$service_field = preg_replace('/[^a-zA-Z0-9_ -]/s',' ',$service_field_text); 
	$service_field = strtolower(str_replace(" ","_",$service_field));

	$check = "SELECT service_field FROM service_field_master WHERE service_id = '$service_id' AND service_field = '$service_field' AND service_field_id != '$service_field_id' ";
	$resul = mysqli_query($db,$check); 
	if ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
	{
		echo '
		<script>
          alert("This field is already in this service you cannot update!");
	      load_mandatory_fields();
        </script>
		';
	}
	else
	{
		$sql = "UPDATE service_field_master SET service_field = '$service_field', data_type = '$data_type', service_field_text = '$service_field_text', is_required = '$check_service_field' WHERE service_field_id = '$service_field_id' ";
		$result = mysqli_query($db,$sql);
		echo '
		<script>
          load_mandatory_fields();
		</script>
		';
	}
}

if($_POST['load_condition'] == "delete_mandatory_field")
{
	$sql = "DELETE FROM service_field_master WHERE service_field_id = '$service_field_id' ";
	$result = mysqli_query($db,$sql);
}

if($_POST['load_condition'] == "save_mandatory_field")
{
	$service_field = preg_replace('/[^a-zA-Z0-9_ -]/s',' ',$service_field_text); 
	$service_field = strtolower(str_replace(" ","_",$service_field));

	$sql = "INSERT INTO service_field_master (service_field, data_type, service_field_text, service_id) VALUES('$service_field', '$data_type', '$service_field_text', '$service_id') ";
	$result = mysqli_query($db,$sql);
}

?>