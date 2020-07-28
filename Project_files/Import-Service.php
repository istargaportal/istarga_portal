<?php
error_reporting(0);
require_once "config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

$count = 0;
set_include_path(get_include_path() . PATH_SEPARATOR . '../Classes/');
include 'PHPExcel/IOFactory.php';
extract($_POST);

$file_name = $_FILES['upload_file']['name'];
$file_size =$_FILES['upload_file']['size'];
$file_tmp =$_FILES['upload_file']['tmp_name'];
$file_type=$_FILES['upload_file']['type'];
$file_ext=end((explode('.', $file_name)));
$inputFileName = "import_services.".$file_ext;

if(empty($errors)==true)
{
	if(move_uploaded_file($file_tmp,"".$inputFileName))
	{
	}
}
	
$inputFileName = 'import_services.xlsx'; 

try {
	$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
} catch(Exception $e) {
	die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
}

$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
$arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet

for($i=5;$i<=$arrayCount;$i++)
{
	$service_name = addslashes($allDataInSheet[$i]["A"]);
	$service_type_name = addslashes($allDataInSheet[$i]["B"]);
	$country = addslashes($allDataInSheet[$i]["C"]);
	$price = addslashes($allDataInSheet[$i]["D"]);
	$currency = addslashes($allDataInSheet[$i]["E"]);
	$document_name = addslashes($allDataInSheet[$i]["F"]);
	
	if($service_name != "" )
	{
		$service_type_id = $country_id = $currency_id = $document_id = 0;
		$sq="SELECT id FROM service_type WHERE name = '$service_type_name' ";
		$resul = mysqli_query($db,$sq); 
		if ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
		{ $service_type_id = $row['id']; } else { $service_type_id = 0; }
		
		$sq="SELECT id FROM countries WHERE name = '$country' ";
		$resul = mysqli_query($db,$sq); 
		if ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
		{ $country_id = $row['id']; } else { $country_id = 0; }
		
		$sq="SELECT id FROM countries WHERE currency = '$currency' ";
		$resul = mysqli_query($db,$sq); 
		if ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
		{ $currency_id = $row['id']; } else { $currency_id = 0; }

		if($service_type_id != 0 && $country_id != 0 && $price >= 0 )
		{
			$sql = "INSERT INTO service_list(service_name, service_type_id, country_id, price, currency_id) VALUES ('$service_name','$service_type_id','$country_id', '$price', '$currency_id')";
			$result = mysqli_query($db,$sql);
			$service_id = $db->insert_id;
			
			$document_name = explode(',', $document_name);
			foreach ($document_name as $document_name_s)
			{
				$document_name_s = trim($document_name_s);
				if($document_name_s != "")
				{
					$sq="SELECT id FROM documentlist WHERE document_name = '$document_name_s' ";
					$resul = mysqli_query($db,$sq); 
					if ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
					{ $document_id = $row['id']; } else { $document_id = 0; }

					if($document_id != 0)
					{
						$check="INSERT INTO service_list_documents (service_id, documentlist_id) VALUES('$service_id', '$document_id') ";
						$result = mysqli_query($db,$check);
					}
				}
			}
			$count=$count+1;
		}
	}
}

echo "<script>alert('Service List is Imported. ".$count." services imported.'); </script>";

?>