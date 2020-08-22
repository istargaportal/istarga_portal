<?php
error_reporting(0);
require_once "../../../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

if (mysqli_connect_errno($db)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
session_start();
$user_id = $_SESSION['user_id'];
              
extract($_POST);
if(isset($_FILES['document_file']))
{
    $i = 0;
    foreach ($_FILES['document_file'] as $document_file_s)
    {
        $file_name = $_FILES['document_file']['name'][$i];
        $file_name_old = $_FILES['document_file']['name'][$i];
        $file_size = $_FILES['document_file']['size'][$i];
        $file_tmp = $_FILES['document_file']['tmp_name'][$i];
        $file_type = $_FILES['document_file']['type'][$i];
        $file_ext = end((explode('.', $file_name)));
        $rand_var = rand(11111,99999);
        $file_name = "document_file_".$order_id."_".$rand_var."_".date('Y_m_d_H_i_s').".".$file_ext;

        if(empty($errors)==true)
        {
            if(move_uploaded_file($file_tmp,"../../../system-client/assets/order_master_documents/".$file_name))
            {
                $sql = "INSERT INTO order_master_uploded_documents(order_id, file_name, file_size, file_type, file_ext, document_file, uploaded_by, user_id, verifier_user_id) VALUES('$order_id', '$file_name_old', '$file_size', '$file_type', '$file_ext', '$file_name', 'Verifier', '$user_id', '$user_id')  ";
                $result = mysqli_query($db,$sql);
            }
        }
        $i++;
    }
    echo 'inserted';
}
?>