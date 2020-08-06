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
	$sq="DELETE FROM assigned_package WHERE id = '$del_assigned_id' ";
	$resul = mysqli_query($db,$sq); 
	echo 'deleted';	
}

if($_POST['action']=='add')
{
	$sq="INSERT INTO assigned_package (client_id, country_id, package_id, price) VALUES('$client_id', '$country_id', '$package_id', '$price') ";
	$resul = mysqli_query($db,$sq); 
	echo "inserted";
}

if($_POST['action']=='edit')
{
    $assigned_package_id = $edit_id;
    $sq="UPDATE assigned_package SET price = '$price' WHERE id = '$assigned_package_id' ";
	$resul = mysqli_query($db,$sq);
	echo "updated";
}

if($_POST['action']=='load_package_list')
{
	echo '<select style="margin-top: 2% !important;" id="package_id" name="package_id" class="browser-default custom-select chosen-select" required>
        <option value="">Select</option>';
	$check = "SELECT s.id, s.package_name FROM package_list s WHERE s.id NOT IN(SELECT package_id FROM assigned_package WHERE client_id = '$client_id' AND country_id = '$country_id' )  ";
    $resul = mysqli_query($db,$check); 
    while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
    {
    	echo '<option value="'.$row['id'].'">'.$row['package_name'].'</option>';
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
	 <th>Package Name</th>
	 <th>Price</th>
	 <th style="width:100px;">Action</th>
 </thead>
 ';
	$sr = 0;
	$sq="SELECT c.Client_Name, a.id, cc.name AS country_name, sl.package_name, a.price FROM assigned_package a INNER JOIN client c ON c.id = a.client_id INNER JOIN countries cc ON cc.id = a.country_id INNER JOIN package_list sl ON sl.id = a.package_id ORDER BY a.id  ";
	$resul = mysqli_query($db,$sq); 
	while($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
	{
		$sr++;
		echo '
		<tr>
			<td class="tablehead1">'.$sr.'</td>
			<td class="tablehead1 form_left">'.$row["Client_Name"].'</td>
			<td class="tablehead1">'.$row["country_name"].'</td>
			<td class="tablehead1">'.$row["package_name"].'</td>
			<td class="tablehead1">'.$row["price"].'</td>
			<td>
				<a href="Assign-Package.php?edit_id='.base64_encode($row["id"]).'" class="btn btn-warning btn-xs btn-round"><i class="material-icons icon">create</i></a>
				<a onclick="delete_assigned_package('.$row["id"].')" class="btn btn-danger btn-xs btn-round"><i class="material-icons icon">delete</i></a>
			</td>
		</tr>
		';
	}
	echo '</table>';
}

?>