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
	// $sq="DELETE FROM assigned_service_details WHERE assigned_service_id = '$del_assigned_id' ";
	// $resul = mysqli_query($db,$sq); 
	echo 'deleted';	
}

if($_POST['action']=='add')
{
	$sq="INSERT INTO assigned_service (client_id, country_id, service_type_id, service_id, price, sla) VALUES('$client_id', '$country_id', '$service_type_id', '$service_id', '$price', '$sla') ";
	$resul = mysqli_query($db,$sq); 
 //    $assigned_service_id = $db->insert_id;
 //    if(isset($package_id))
 //    {
	// 	foreach ($package_id as $package_id_s)
	// 	{
	// 		$sq="INSERT INTO assigned_service_details (assigned_service_id, package_id, service_id) VALUES('$assigned_service_id', '$package_id_s', 0) ";
	// 		$resul = mysqli_query($db,$sq); 
	// 	}
	// }
	// if(isset($service_id))
 //    {
	// 	foreach ($service_id as $service_id_s)
	// 	{
	// 		$sq="INSERT INTO assigned_service_details (assigned_service_id, service_id, package_id) VALUES('$assigned_service_id', '$service_id_s', 0) ";
	// 		$resul = mysqli_query($db,$sq); 
	// 	}
	// }
	echo "inserted";
}

if($_POST['action']=='edit')
{
    $assigned_service_id = $edit_id;
    $sq="UPDATE assigned_service SET price = '$price', sla = '$sla' WHERE id = '$assigned_service_id' ";
	$resul = mysqli_query($db,$sq); 
	// if(isset($package_id))
 //    {
	// 	$sq="DELETE FROM assigned_service_details WHERE assigned_service_id = '$assigned_service_id' AND package_id != 0 ";
	// 	$resul = mysqli_query($db,$sq); 
		
	// 	foreach ($package_id as $package_id_s)
	// 	{
	// 		$sq="INSERT INTO assigned_service_details (assigned_service_id, package_id, service_id) VALUES('$assigned_service_id', '$package_id_s', 0) ";
	// 		$resul = mysqli_query($db,$sq); 
	// 	}
	// }
	// if(isset($service_id))
 //    {
	// 	$sq="DELETE FROM assigned_service_details WHERE assigned_service_id = '$assigned_service_id' AND service_id != 0 ";
	// 	$resul = mysqli_query($db,$sq); 

	// 	foreach ($service_id as $service_id_s)
	// 	{
	// 		$sq="INSERT INTO assigned_service_details (assigned_service_id, service_id, package_id) VALUES('$assigned_service_id', '$service_id_s', 0) ";
	// 		$resul = mysqli_query($db,$sq); 
	// 	}
	// }
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
	echo '<select class="browser-default custom-select chosen-select" name="package_id" id="package_id_sel" onchange="load_service_list()"><option value="">Select</option>';
	$check="SELECT id, package_name FROM package_list WHERE id IN (SELECT package_id FROM package_list_service WHERE service_id IN(SELECT id FROM service_list WHERE currency_id = '$currency_id' AND country_id = '$country_id')) ";
    $resul = mysqli_query($db,$check); 
    while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
    {
		$selected = "";
		if(@$package_id == $row['id'])
		{
			$selected = "selected";
		}
		// if(@$package_id_all != "")
		// {
		// 	$res_ar = array_search($row['id'],@$package_id_all);
		// 	if($res_ar != '')
		// 	{
		// 		$selected = "selected";
		// 	}
		// }
		echo '<option '.@$selected.' value="'.$row['id'].'">'.$row['package_name'].'</option>';
       '
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
    echo '</select>';
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

	$check = 'SELECT id, service_name FROM service_list WHERE id IN (SELECT service_id FROM package_list_service WHERE package_id NOT IN('.@$package_id_all_sel.') )  ';
    $resul = mysqli_query($db,$check); 
    while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
    {
    	$checked = "checked";
		if(@$service_id_all != "")
		{
			$res_ar = array_search($row['id'],@$service_id_all);
			if($res_ar != '')
			{
				$checked = "checked";
			}
			else
			{
				$checked = "";	
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

if($_POST['action']=='load_service_list')
{
	echo '<select style="margin-top: 2% !important;" id="service_id" name="service_id" class="browser-default custom-select chosen-select" required>
        <option value="">Select</option>';
	$check = "SELECT s.id, s.service_name FROM service_list s WHERE s.service_type_id = '$service_type_id' AND s.id NOT IN(SELECT service_id FROM assigned_service WHERE client_id = '$client_id' AND country_id = '$country_id' )  ";
    $resul = mysqli_query($db,$check); 
    while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
    {
    	echo '<option value="'.$row['id'].'">'.$row['service_name'].'</option>';
    }
    echo '</select>';
}

if($_POST['action']=='display')
{
 echo '<table id="datatable_tbl" class="table table-hover" style="margin-top: 4%;">
 <thead class="text-primary" style="background-color: rgba(15, 13, 13, 0.856) !important;">
	 <th width="10">SR.NO.</th>
	 <th>Client </th>
	 <th>Country</th>
	 <th>Service Type</th>
	 <th>Service Name</th>
	 <th>Price</th>
	 <th>SLA</th>
	 <th class="noExport" style="width:100px;">Action</th>
 </thead>
 ';
	$sr = 0;
	$sq="SELECT c.Client_Name, a.id, cc.name AS country_name, st.name AS service_type_name, sl.service_name, a.price, a.sla FROM assigned_service a INNER JOIN client c ON c.id = a.client_id INNER JOIN countries cc ON cc.id = a.country_id INNER JOIN service_type st ON st.id = a.service_type_id INNER JOIN service_list sl ON sl.id = a.service_id ORDER BY a.id  ";
	$resul = mysqli_query($db,$sq); 
	while($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
	{
		// $service_list = "";
		// $check_1 = "SELECT s.service_name FROM package_list_service p INNER JOIN service_list s ON s.id = p.service_id WHERE p.package_id = '".$row['package_id']."' ";
	 //    $resul_1 = mysqli_query($db,$check_1); 
	 //    while ($row_1 = mysqli_fetch_array($resul_1, MYSQLI_ASSOC))
	 //    {
	 //    	$service_list.= '<a style="color:blue">'.$row_1['service_name'].'</a><br>';
	 //    }
		$sr++;
		// <td class="tablehead1">'.$row["currency_name"].'</td>
		// <td class="tablehead1"><b>'.$row["package_name"].'</b><br>'.$service_list.'</td>
		echo '
		<tr>
			<td class="tablehead1">'.$sr.'</td>
			<td class="tablehead1 form_left">'.$row["Client_Name"].'</td>
			<td class="tablehead1">'.$row["country_name"].'</td>
			<td class="tablehead1">'.$row["service_type_name"].'</td>
			<td class="tablehead1">'.$row["service_name"].'</td>
			<td class="tablehead1">'.$row["price"].'</td>
			<td class="tablehead1">'.$row["sla"].'</td>
			<td class="noExport">
				<a href="Assign-Service.php?edit_id='.base64_encode($row["id"]).'" class="btn btn-warning btn-xs btn-round"><i class="material-icons icon">create</i></a>
				<a onclick="delete_assigned_service('.$row["id"].')" class="btn btn-danger btn-xs btn-round"><i class="material-icons icon">delete</i></a>
			</td>
		</tr>
		';
	}
	echo '</table>';
}

?>