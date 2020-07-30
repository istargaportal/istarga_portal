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
else if($_POST["action"]=='edit')
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

?>