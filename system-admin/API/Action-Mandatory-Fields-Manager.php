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
	$check = "SELECT s.service_name, sm.service_field_id, sm.service_field, sm.service_field_text, sm.is_required FROM service_list s INNER JOIN service_field_master sm ON sm.service_id = s.id WHERE sm.service_id = '$service_id' ";
	$resul = mysqli_query($db,$check); 
	while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
	{
		if($i == 0)
		{
			echo '<h4 style="font-weight: bold;" class="col-md-12 icon">'.@$row['service_name'].'
			<a onclick="update_mandatory_fields()" class="btn btn-warning pull-right btn-sm"><i class="fa fa-edit"></i> Update</a>
			</h4>';
		}

		$required_checked = "";
		if($row['is_required'] == 1)
		{
			$required_checked = "checked";
		}
		echo '<div class="col-md-6">
				<input type="hidden" name="service_field_id[]" value="'.$row["service_field_id"].'" />
                  <div class="row ">
                    <div class="col-md-1">
                      <div class="form-check">
                        <label class="form-check-label" style="margin-bottom:14px !important;">
                          <input class="form-check-input" name="'.$row["service_field"].'" type="checkbox" value="1" '.$required_checked.' />
                          <span class="form-check-sign">
                            <span class="check"></span>
                          </span>
                        </label>
                      </div>
                    </div>
                    <div class="col-md-11">
                    	<p style="color: black;">'.$row["service_field_text"].'</p>
                    </div>
                  </div>
                </div>';
		$i++;	
	}
	echo '</form>';
}

if($_POST['load_condition'] == "update_mandatory_fields")
{
	foreach ($service_field_id as $service_field_id_s)
	{
		$check = "SELECT s.service_name, sm.service_field_id, sm.service_field, sm.service_field_text, sm.is_required FROM service_list s INNER JOIN service_field_master sm ON sm.service_id = s.id WHERE sm.service_id = '$service_id_sel' AND sm.service_field_id = '$service_field_id_s' ";
		$resul = mysqli_query($db,$check); 
		while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
		{
			$service_field = $row["service_field"];
			if(isset($$service_field))
			{
				$is_required = $$service_field;
			}
			else
			{
				$is_required = 0;
			}
			$sql = "UPDATE service_field_master SET is_required = '".$is_required."' WHERE service_field_id = '$service_field_id_s' AND service_field = '$service_field' ";
			$result = mysqli_query($db,$sql); 
		}
	}
	echo "updated";
}

?>