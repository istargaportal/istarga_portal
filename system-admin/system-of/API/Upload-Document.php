<?php
error_reporting(0);
require_once "../../../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

if (mysqli_connect_errno($db)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

extract($_POST);

if(isset($_FILES['document_file']))
{
    $file_name = $_FILES['document_file']['name'];
    $file_size = $_FILES['document_file']['size'];
    $file_tmp = $_FILES['document_file']['tmp_name'];
    $file_type = $_FILES['document_file']['type'];
    $file_ext = end((explode('.', $file_name)));
    $file_name = "document_file_".$order_id."_".$order_master_document_id.".".$file_ext;

    if(empty($errors)==true)
    {
        if(move_uploaded_file($file_tmp,"../../../system-client/assets/order_master_documents/".$file_name))
        {
            $sql = "UPDATE order_master_documents SET document_file = '$file_name' WHERE order_master_document_id  = '$order_master_document_id ' ";
            $result = mysqli_query($db,$sql);
        	echo "inserted";
        }
    }
}

?>