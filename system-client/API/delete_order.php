<?php

require_once "../../config/config.php";
$get_connection=new connectdb;
$db=$get_connection->connect();

$query="DELETE FROM `order_master` WHERE order_id   ='".$_POST['id']."'";
$result = mysqli_query($db,$query); 

$query="DELETE FROM `order_master_details` WHERE order_id   ='".$_POST['id']."'";
$result = mysqli_query($db,$query); 

$check="SELECT document_file FROM order_master_documents WHERE order_id   ='".$_POST['id']."'";
$resul = mysqli_query($db,$check); 
while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
{
    if($row['document_file'] != ""){ unlink('../assets/order_master_documents/'.$row['document_file']); }  
}
$query="DELETE FROM `order_master_documents` WHERE order_id ='".$_POST['id']."'";
$result = mysqli_query($db,$query); 

if ($result === TRUE)
{
    echo 'success';
}
else
{
    echo 'error';
}
