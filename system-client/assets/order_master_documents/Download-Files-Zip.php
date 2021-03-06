<?php

require_once "../../../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

if (mysqli_connect_errno($db)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

extract($_POST);

function createZipArchive($files = array(), $destination = '', $overwrite = false)
{
 if(file_exists($destination) && !$overwrite) { return false; }

 $validFiles = array();
 if(is_array($files)) {
  foreach($files as $file) {
   if(file_exists($file)) {
    $validFiles[] = $file;
  }
}
}

if(count($validFiles)) {
  $zip = new ZipArchive();
  if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) == true) {
   foreach($validFiles as $file) {
    $zip->addFile($file,$file);
  }
  $zip->close();
  return file_exists($destination);
}else{
  return false;
}
}else{
  return false;
}
}

if($_POST['action'] == 'download_all_files')
{
    $fileName = 'Download-All.zip';    
    unlink($fileName);
   
    $files = array();
    $check_1='SELECT ad.file_name, ad.document_file, ad.order_master_uploaded_document_id FROM order_master_uploded_documents ad WHERE ad.order_id = '.$order_id.'  ';
    if(isset($_POST['verifier_user_id']))
    {
      $check_1.= " AND verifier_user_id = ".$verifier_user_id;
    }
    $resul_1 = mysqli_query($db,$check_1);
    while ($row_1 = mysqli_fetch_array($resul_1, MYSQLI_ASSOC))
    {
      array_push($files, $row_1['document_file']);
    }
    $result = createZipArchive($files, $fileName);
    echo '
    <script>
        window.open("./../../system-client/assets/order_master_documents/'.$fileName.'");
    </script>
    ';
}

?>