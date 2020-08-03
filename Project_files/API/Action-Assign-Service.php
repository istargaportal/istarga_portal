<?php
require_once "../../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

if (mysqli_connect_errno($db)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

extract($_POST);

if($_POST['action'] == "delete")
{
	$sq="DELETE FROM assigned_service WHERE id = '$del_assigned_id' ";
	$resul = mysqli_query($db,$sq); 
	$sq="DELETE FROM assigned_service_details WHERE assigned_service_id = '$del_assigned_id' ";
	$resul = mysqli_query($db,$sq); 
	echo 'deleted';	
}

if($_POST['action']=='save')
{
	$sq="INSERT INTO assigned_service (client_id) VALUES('$client_id') ";
	$resul = mysqli_query($db,$sq); 
    $assigned_service_id = $db->insert_id;
    if(isset($package_id))
    {
		foreach ($package_id as $package_id_s)
		{
			$sq="INSERT INTO assigned_service_details (assigned_service_id, package_id, service_id) VALUES('$assigned_service_id', '$package_id_s', 0) ";
			$resul = mysqli_query($db,$sq); 
		}
	}
	if(isset($service_id))
    {
		foreach ($service_id as $service_id_s)
		{
			$sq="INSERT INTO assigned_service_details (assigned_service_id, service_id, package_id) VALUES('$assigned_service_id', '$service_id_s', 0) ";
			$resul = mysqli_query($db,$sq); 
		}
	}
	echo "inserted";
}

if($_POST['action']=='update')
{
    $assigned_service_id = $edit_id;
	if(isset($package_id))
    {
		$sq="DELETE FROM assigned_service_details WHERE assigned_service_id = '$assigned_service_id' AND package_id != 0 ";
		$resul = mysqli_query($db,$sq); 
		
		foreach ($package_id as $package_id_s)
		{
			$sq="INSERT INTO assigned_service_details (assigned_service_id, package_id, service_id) VALUES('$assigned_service_id', '$package_id_s', 0) ";
			$resul = mysqli_query($db,$sq); 
		}
	}
	if(isset($service_id))
    {
		$sq="DELETE FROM assigned_service_details WHERE assigned_service_id = '$assigned_service_id' AND service_id != 0 ";
		$resul = mysqli_query($db,$sq); 

		foreach ($service_id as $service_id_s)
		{
			$sq="INSERT INTO assigned_service_details (assigned_service_id, service_id, package_id) VALUES('$assigned_service_id', '$service_id_s', 0) ";
			$resul = mysqli_query($db,$sq); 
		}
	}
	echo "updated";
}

if($_POST['action']=='load_package')
{
	$sq="SELECT Currency, country FROM client WHERE id = '$client_id' ";
	$resul = mysqli_query($db,$sq); 
	if($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
	{
		$currency_id = $row['Currency'];
		$country_id = $row['country'];
	}

	if(@$package_id_all != "")
	{
		$package_id_all = explode(',', $package_id_all);
	}

	$check="SELECT id, package_name FROM package_list WHERE id IN (SELECT package_id FROM package_list_service WHERE service_id IN(SELECT id FROM service_list WHERE currency_id = '$currency_id' AND country_id = '$country_id')) ";
    $resul = mysqli_query($db,$check); 
    while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
    {
		$checked = "";
		if(@$package_id_all != "")
		{
			$res_ar = array_search($row['id'],@$package_id_all);
			if($res_ar != '')
			{
				$checked = "checked";
			}
		}
		
      echo '
      <li>
        <div class="form-check" onclick="package_select()">
          <label class="form-check-label" style="margin-bottom:14px !important;">'.$row["package_name"].'
            <input class="form-check-input Checking package_check" '.@$checked.' name="package_id[]" type="checkbox" value="'.$row["id"].'" >
            <span class="form-check-sign"><span class="check"></span></span>
          </label>
        </div>
      </li>
      ';
    }
}

if($_POST['action']=='load_services')
{
	$sq="SELECT Currency, country FROM client WHERE id = '$client_id' ";
	$resul = mysqli_query($db,$sq); 
	if($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
	{
		$currency_id = $row['Currency'];
		$country_id = $row['country'];
	}

	if(@$service_id_all != "")
	{
		$service_id_all = explode(',', $service_id_all);
	}

	$check='SELECT id, service_name FROM service_list ';
    $resul = mysqli_query($db,$check); 
    while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
    {
    	$checked = "";
    	if(@$service_id_all != "")
		{
			$res_ar = array_search($row['id'],@$service_id_all);
			if($res_ar != '')
			{
				$checked = "checked";
			}
		}

      echo '
      <li>
        <div class="form-check" onclick="service_select()" >
          <label class="form-check-label" style="margin-bottom:14px !important;">'.$row["service_name"].'
            <input class="form-check-input Checking service_check" '.@$checked.' name="service_id[]"  type="checkbox" value="'.$row["id"].'" >
            <span class="form-check-sign"><span class="check"></span></span>
          </label>
        </div>
      </li>
      ';
    }
}

if($_POST['action']=='display')
{
 echo '<table id="datatable_tbl" class="table table-hover" style="margin-top: 4%;">
 <thead class="text-primary" style="background-color: rgba(15, 13, 13, 0.856) !important;">
	 <th width="10">SR.NO.</th>
	 <th>Client </th>
	 <th>Package</th>
	 <th>Services</th>
	 <th style="width:100px;">Action</th>
 </thead>
 ';
	$sr = 0;
	$sq="SELECT c.Client_Name, a.id FROM assigned_service a INNER JOIN client c ON c.id = a.client_id ORDER BY a.id  ";
	$resul = mysqli_query($db,$sq); 
	while($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
	{
		$package_name = "";
		$sq_1="SELECT p.package_name FROM assigned_service_details a INNER JOIN package_list p ON p.id = a.package_id WHERE a.assigned_service_id = ".$row['id']."  ";
		$resul_1 = mysqli_query($db,$sq_1); 
		while($row_1 = mysqli_fetch_array($resul_1, MYSQLI_ASSOC))
		{
			$package_name.= "<b>".$row_1['package_name'].'</b><br>';
		}

		$service_name = "";
		$sq_1="SELECT s.service_name FROM assigned_service_details a INNER JOIN service_list s ON s.id = a.service_id WHERE a.assigned_service_id = ".$row['id']."  ";
		$resul_1 = mysqli_query($db,$sq_1); 
		while($row_1 = mysqli_fetch_array($resul_1, MYSQLI_ASSOC))
		{
			$service_name.= "<b>".$row_1['service_name'].'</b><br>';
		}

		$sr++;
		echo '
		<tr>
			<td class="tablehead1">'.$sr.'</td>
			<td class="tablehead1 form_left">'.$row["Client_Name"].'</td>
			<td class="tablehead1 form_left">'.$package_name.'</td>
			<td class="tablehead1 form_left">'.$service_name.'</td>
			<td class="tablehead1">
				<a href="Assign-Service.php?edit_id='.base64_encode($row["id"]).'" class="btn btn-warning btn-xs btn-round"><i class="fa fa-edit"></i> Edit</a>
				<br>
				<a onclick="delete_assigned_service('.$row["id"].')" class="btn btn-danger btn-xs btn-round"><i class="fa fa-remove"></i> Delete</a>
			</td>
		</tr>
		';
	}
	echo '</table>';
}

?>