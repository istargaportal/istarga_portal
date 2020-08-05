<?php
require_once "../../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

if (mysqli_connect_errno($db)){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

extract($_POST);

if($_POST["action"]=='delete')
{
  $package_id=$_POST["package_id"];
  $sql = "DELETE FROM `package_list` WHERE `id`='$package_id'";  
  $result = mysqli_query($db,$sql);
  $sql = "DELETE FROM `package_list_service` WHERE `package_id`='$package_id'";  
  $result = mysqli_query($db,$sql);
  if($result){echo  "deleted";}else{echo 'error at'.$service;}
}

if($_POST["action"]=='add')
{
  $sql = "INSERT INTO package_list(package_name, country_id) VALUES('$package_name', '$country_id') ";
  $result = mysqli_query($db,$sql);
  $package_id = $db->insert_id;
  if(isset($service_id))
  {
    foreach ($service_id as $service_id_s)
    {
      if($service_id_s != "")
      {
        $check="INSERT INTO package_list_service (package_id, service_id) VALUES('$package_id', '$service_id_s') ";
        $result = mysqli_query($db,$check);
      }
    }
  }
  if($result){echo "inserted";}else{echo "error".mysqli_error();}
}

if($_POST["action"]=='edit')
{
  $sql = "UPDATE package_list SET package_name = '$package_name' WHERE `id`='$edit_id' ";
  $result = mysqli_query($db,$sql);
  if(isset($service_id))
  {
    $check="DELETE FROM package_list_service WHERE package_id = '$edit_id' ";
    $result = mysqli_query($db,$check);
    foreach ($service_id as $service_id_s)
    {
      if($service_id_s != "")
      {
        $check="INSERT INTO package_list_service (package_id, service_id) VALUES('$edit_id', '$service_id_s') ";
        $result = mysqli_query($db,$check);
      }
    }
  }
  if($result){ echo "updated";} else { echo 'error at'.$dbid; }
}

if($_POST["action"]=='display')
{
  echo '<table id="datatable_tbl" class="table table-hover" style="margin-top: 4%;">
            <thead class="text-primary" style="background-color: rgba(15, 13, 13, 0.856) !important;">
              <th>SR.NO.</th>
              <th>Package</th>
              <th>Country</th>
              <th>Services</th>
              <th>Action</th>
            </thead>
          ';
  $i = 0;
  $check='SELECT p.id, p.package_name, c.name AS country_name FROM package_list p INNER JOIN countries c ON c.id = p.country_id ORDER BY p.id ';
  $resul = mysqli_query($db,$check); 
  while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
  {
      $all_services = ""; $price = 0; $currency = "";
      $check_1='SELECT s.service_name FROM service_list s INNER JOIN package_list_service p ON p.service_id = s.id WHERE p.package_id = '.$row["id"].' ';
      $resul_1 = mysqli_query($db,$check_1); 
      while ($row_1 = mysqli_fetch_array($resul_1, MYSQLI_ASSOC))
      {
          // $price = $price + $row_1['price'];
          // $currency = $row_1['currency'];
          $all_services.="<a class='btn btn-default btn-small'>".$row_1['service_name']."</a><br>";
      }

      $i++;
      echo '
      <tr>
          <td class="tablehead1">'.$i.'</td>
          <td class="tablehead1 form_left">'.$row["package_name"].'</td>
          <td class="tablehead1">'.$row['country_name'].'</td>
          <td class="tablehead1">'.$all_services.'</td>
          <td class="tablehead1">
              <a href="package.php?id='.base64_encode($row["id"]).'" title="Edit Package" class="btn btn-xs btn-round btn-warning"><i class="material-icons icon">create</i></a>
              <a onclick="delete_package('.$row["id"].')" title="Delete Package" class="btn btn-xs btn-round btn-danger"><i class="material-icons icon">delete</i></a>
          </td>
      </tr>
      ';
  }
  echo '</table>';
}

?>