<?php

session_start();
$client_id = $_SESSION['uid'];

require_once "../../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

extract($_POST);
if(@$load_condition == "load_bulk_order")
{
	echo '
	<table id="datatable_tbl" class="table table-hover">
	<thead class="text-primary" style="background-color: rgba(15, 13, 13, 0.822) !important;">
	<th>SR.NO.</th>
	<th>Service</th>
	<th>File</th>
	<th>Added Date Time</th>
	<th>From Date Time</th>
	<th>To Date Time</th>
	<th>NO. of Orders</th>
	</thead>
	';
	$i = 0;
	$check = "SELECT b.file_name, b.from_date, b.from_time, b.to_date, b.to_time, b.total_orders, s.service_name, b.added_datetime, b.from_date_time, b.to_date_time FROM bulk_order b INNER JOIN service_list s ON s.id = b.service_id WHERE b.client_id = '$client_id' ";
	$resul = mysqli_query($db,$check); 
	while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
	{
		$i++;
		echo '
		<tr>
		<td>'.$i.'</td>
		<td>'.$row["service_name"].'</td>
		<td>'.$row["file_name"].'</td>
		<td>'.$row["added_datetime"].'</td>
		<td>'.$row["from_date_time"].'</td>
		<td>'.$row["to_date_time"].'</td>
		<td>'.$row["total_orders"].'</td>
		</tr>
		';
	}
	echo '</table>';
}

if(@$load_condition == "import_bulk_order")
{
	error_reporting(0);
	mysqli_autocommit($db,FALSE);

	$count = 0;
	set_include_path(get_include_path() . PATH_SEPARATOR . '../../Classes/');
	include 'PHPExcel/IOFactory.php';
	extract($_POST);

	$file_name = $_FILES['fileupload']['name'];
	$file_size =$_FILES['fileupload']['size'];
	$file_tmp =$_FILES['fileupload']['tmp_name'];
	$file_type=$_FILES['fileupload']['type'];
	$file_ext=end((explode('.', $file_name)));
	$inputFileName = "import_bulk_order.".$file_ext;

	if(empty($errors)==true)
	{
		if(move_uploaded_file($file_tmp,"".$inputFileName))
		{
		}
	}
	
	$inputFileName = 'import_bulk_order.xlsx'; 

	try {
		$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
	} catch(Exception $e) {
		die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
	}

	$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
	$arrayCount = count($allDataInSheet);

	$error_code = 0; $alredy_exists = "";
	$from_date_time = $from_date.' '.$from_time;
	$to_date_time = $to_date.' '.$to_time;

	$sql = "INSERT INTO bulk_order(client_id, file_name, from_date, from_time, from_date_time, to_date, to_time, to_date_time, service_id) VALUES('$client_id', '$file_name', '$from_date', '$from_time', '$from_date_time', '$to_date', '$to_time', '$to_date_time', '$service_id') ";
	$query_res1 = $db->query($sql);
	$bulk_order_id = $db->insert_id;

    if ($query_res1 > 0) 
    {
		for($i=2;$i<=$arrayCount;$i++)
		{
			$internal_reference_id = addslashes($allDataInSheet[$i]["A"]);
			$first_name = addslashes($allDataInSheet[$i]["B"]);
			$middle_name = addslashes($allDataInSheet[$i]["C"]);
			$last_name = addslashes($allDataInSheet[$i]["D"]);
			$date_of_birth = addslashes($allDataInSheet[$i]["E"]);
			$address = addslashes($allDataInSheet[$i]["F"]);
			$father_name = addslashes($allDataInSheet[$i]["G"]);
			$customer_type = addslashes($allDataInSheet[$i]["H"]);
			$additional_comments = addslashes($allDataInSheet[$i]["I"]);
			$country = addslashes($allDataInSheet[$i]["J"]);
			
			if($customer_type == ""){ $customer_type = "Regular"; }
			if($first_name != "" && $country != "" && $internal_reference_id != "")
			{
				$country_id = 0;

				$sq="SELECT id FROM countries WHERE name = '$country' ";
				$resul = mysqli_query($db,$sq); 
				if ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
				{ $country_id = $row['id']; } else { $country_id = 0; }

				if($country_id != "0" )
				{
					$sq="SELECT internal_reference_id, first_name FROM order_master WHERE internal_reference_id = '$internal_reference_id' AND client_id = '$client_id' ";
					$resul = mysqli_query($db,$sq); 
					if ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
					{ $alredy_exists.= '\n'.$row['internal_reference_id'].' '.$row['first_name']; $error_code++; }
					else
					{
						$username = randomPassword();
					    $password = randomPassword().rand(1111,9999);
					    $insufficiency_contact = "Client";
						$sql = "INSERT INTO order_master (internal_reference_id, first_name, middle_name, last_name, date_of_birth, address, father_name, customer_type, additional_comments, country_id, bulk_order_id, order_type, client_id, username, password, insufficiency_contact) VALUES('$internal_reference_id', '$first_name', '$middle_name', '$last_name', '$date_of_birth', '$address', '$father_name', '$customer_type', '$additional_comments', '$country', '$bulk_order_id', 'Bulk', '$client_id', '$username', '$password', '$insufficiency_contact')";
						$query_res2 = $db->query($sql);
						$order_id = $db->insert_id;
					    if ($query_res2 > 0) 
					    {
					    	$error_code++;
					    	$assign_service_id = 0;
					    	$sq="SELECT id FROM assigned_service WHERE client_id = '$client_id' AND country_id = '$country_id' AND service_id = '$service_id' ";
							$resul = mysqli_query($db,$sq); 
							if ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
							{
								$assign_service_id = $row['id'];
							}
					    	if($assign_service_id > 0)
					    	{
						    	$sql = "INSERT INTO order_master_details (order_id, service_id) VALUES('$order_id', '$service_id') ";
				                $query_res3 = $db->query($sql);
								$sql = "INSERT INTO order_service_details (order_id, service_id, package_id, assign_service_id, assign_package_id) VALUES('$order_id', '$service_id', '0', '$assign_service_id', '0') ";
								$query_res4 = $db->query($sql);

								$sq="SELECT documentlist_id FROM service_list_documents WHERE service_id = '$service_id' ";
								$resul = mysqli_query($db,$sq); 
								while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
								{
									$sql = "INSERT INTO order_master_documents (order_id, documentlist_id) VALUES('$order_id', '".$row['documentlist_id']."') ";
		            				$query_res5 = $db->query($sql);
								}
							}
					    }
					    else
					    {
					    	$error_code = 0;
					    }
						$count=$count+1;
					}
				}
				else
				{
					$error_code = 0;
				}		
			}
			else
			{
				$error_code = 0;
			}
		}
		$sql = "UPDATE bulk_order SET total_orders = '$count' WHERE bulk_order_id = '$bulk_order_id' ";
		$query_res6 = $db->query($sql);
		if ($query_res6 > 0) 
    	{
    		$error_code++;
		}
	    else
	    {
	    	$error_code = 0;
	    }
    }
    else
    {
    	$error_code = 0;
    }
	if($alredy_exists != "")
	{
		echo "<script>alert('Bulk Orders already exists - ".$alredy_exists."'); </script>";
	}
    if($error_code > 0 && @$query_res2 > 0 && @$query_res3 > 0 && @$query_res4 > 0 && @$query_res6 > 0)
    {
    	mysqli_commit($db);

    	// include '../../API/SMTP/sendMail.php';
	    // include '../../API/SMTP/LOGIN-EMAIL.php';
	    // $subject = "LOGIN CREDENTILAS FOR - Employment Background Screening";
	    // smtpmailer($email_id, $from, $name, $subject, @$print_var);

		echo "<script>alert('Bulk Order is Imported. ".$count." records imported.'); </script>";
    }
    else
    {
    	echo "<script>alert('Error occurred!'); </script>";
    }
}

?>