<?php

session_start();
$client_id = $_SESSION['uid'];

require_once "../../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

extract($_POST);
if(@$load_condition == "load_bulk_order")
{
	// <th>From Date Time</th>
	// <th>To Date Time</th>
	
	echo '
	<table id="datatable_tbl" class="table table-hover">
	<thead class="text-primary" style="background-color: rgba(15, 13, 13, 0.822) !important;">
	<th>SR.NO.</th>
	<th>Service</th>
	<th>File</th>
	<th>Added Date Time</th>
	<th>NO. of Orders</th>
	<th>Rejected Orders</th>
	</thead>
	';
	$i = 0;
	$check = "SELECT b.bulk_order_id, b.file_name, b.from_date, b.from_time, b.to_date, b.to_time, b.total_orders, s.service_name, b.added_datetime, b.from_date_time, b.to_date_time, b.rejected_orders FROM bulk_order b INNER JOIN service_list s ON s.id = b.service_id WHERE b.client_id = '$client_id' ";
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
		<td><a onclick="view_all_orders('.$row["bulk_order_id"].', 1)" class="btn_link">'.$row["total_orders"].'</a></td>
		<td><a onclick="view_all_orders('.$row["bulk_order_id"].', 2)" class="btn_link">'.$row["rejected_orders"].'</a></td>
		</tr>
		';
		// <td>'.$row["from_date_time"].'</td>
		// <td>'.$row["to_date_time"].'</td>
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

	$check_2 = "SELECT Client_Code, email FROM client WHERE id = '".$client_id."' ";
    $resul_2 = mysqli_query($db,$check_2); 
    if ($row_2 = mysqli_fetch_array($resul_2, MYSQLI_ASSOC))
    {
        $Client_Code = $row_2['Client_Code'];
        $client_email_id = $row_2['email'];
    }
    
	$sql = "INSERT INTO bulk_order(client_id, file_name, from_date, from_time, from_date_time, to_date, to_time, to_date_time, service_id) VALUES('$client_id', '$file_name', '$from_date', '$from_time', '$from_date_time', '$to_date', '$to_time', '$to_date_time', '$service_id') ";
	$query_res1 = $db->query($sql);
	$bulk_order_id = $db->insert_id;
    if ($query_res1 > 0) 
    {
    	$service_error = "";
    	for($i=2;$i<=$arrayCount;$i++)
		{
			$internal_reference_id = addslashes($allDataInSheet[$i]["A"]);
			$applicant_name = addslashes($allDataInSheet[$i]["B"]);

			$check_2 = "SELECT count(order_id) AS order_id_auto FROM order_master WHERE client_id = '".$client_id."' ";
		    $resul_2 = mysqli_query($db,$check_2); 
		    if ($row_2 = mysqli_fetch_array($resul_2, MYSQLI_ASSOC))
		    {
		        $order_id_auto = $row_2['order_id_auto'];
		    }
		    $order_id_auto++;
		    if($order_id_auto <= 9)
		    {
		        $order_id_auto = '0000'.$order_id_auto;
		    }
		    else if($order_id_auto <= 99)
		    {
		        $order_id_auto = '000'.$order_id_auto;
		    }
		    else if($order_id_auto <= 999)
		    {
		        $order_id_auto = '00'.$order_id_auto;
		    }
		    else if($order_id_auto <= 9999)
		    {
		        $order_id_auto = '0'.$order_id_auto;
		    }
		    $case_reference_no = $Client_Code.'-'.date('my').'-'.$order_id_auto;
		    if (strpos($applicant_name, '.') !== false)
			{
			    $str = $applicant_name;
				$str = explode(".",$str);
				$first_name = $str[0];
				$first_name = array_shift($str);
				$last_name = implode('.', $str);
			}
			else
			{
				$first_name = $applicant_name;
				$last_name = "";
			}
			// $middle_name = addslashes($allDataInSheet[$i]["C"]);
			// $last_name = addslashes($allDataInSheet[$i]["D"]);
			
			if($service_id == 2)
			{
				$college_name  = addslashes($allDataInSheet[$i]["C"]);
				$university = addslashes($allDataInSheet[$i]["D"]);
				$degree = addslashes($allDataInSheet[$i]["E"]);
				$year_of_passing = addslashes($allDataInSheet[$i]["F"]);
				$register_number = addslashes($allDataInSheet[$i]["G"]);
				$researcher_name = addslashes($allDataInSheet[$i]["H"]);
				$employee_id = addslashes($allDataInSheet[$i]["I"]);
				$country = addslashes($allDataInSheet[$i]["J"]);
				$graduated = addslashes($allDataInSheet[$i]["K"]);
				$customer_type = addslashes($allDataInSheet[$i]["L"]);
				$additional_comments = addslashes($allDataInSheet[$i]["M"]);
				$other_details = "College name".$college_name.'<br>'."University".$university.'<br>'."Degree".$degree.'<br>'."Year of passing".$year_of_passing.'<br>'."Register number".$register_number.'<br>'."Researcher name".$researcher_name.'<br>'."Employee id".$employee_id.'<br>'."Country".$country.'<br>'."Graduated".$graduated.'<br>'."Customer type".$customer_type.'<br>'."Additional comments".$additional_comments;
			}
			else
			{
				$date_of_birth = addslashes($allDataInSheet[$i]["C"]);
				$date_of_birth = str_replace('/', '-', $date_of_birth);
				$address = addslashes($allDataInSheet[$i]["D"]);
				$father_name = addslashes($allDataInSheet[$i]["E"]);
				$customer_type = addslashes($allDataInSheet[$i]["F"]);
				$additional_comments = addslashes($allDataInSheet[$i]["G"]);
				$country = addslashes($allDataInSheet[$i]["H"]);
				$other_details = "Date of birth".$date_of_birth.'<br>'."Date of birth".$date_of_birth.'<br>'."Address".$address.'<br>'."Father name".$father_name.'<br>'."Customer type".$customer_type.'<br>'."Additional comments".$additional_comments.'<br>'."Country".$country;
			}

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
					// $sq="SELECT internal_reference_id, first_name FROM order_master WHERE internal_reference_id = '$internal_reference_id' AND client_id = '$client_id' ";
					// $resul = mysqli_query($db,$sq); 
					// if ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
					// { $alredy_exists.= '\n'.$row['internal_reference_id'].' '.$row['first_name']; $error_code++; }
					// else
					// {
						$username = randomPassword();
				        $password = randomPassword().rand(111111,999999);
						$insufficiency_contact = "Client";
					   
					    $assign_service_id = 0;
				    	$sq="SELECT id FROM assigned_service WHERE client_id = '$client_id' AND country_id = '$country_id' AND service_id = '$service_id' ";
						$resul = mysqli_query($db,$sq); 
						if ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
						{
							$assign_service_id = $row['id'];
						}
						else
						{
							$service_error.= '\nService is not assigned to the '.$country.'. Contact Admin!';
							$error_code = 0;
						}

						if($assign_service_id > 0)
						{
							$sql = "INSERT INTO order_master (case_reference_no, internal_reference_id, first_name, last_name, customer_type, additional_comments, bulk_order_id, order_type, client_id, username, password, insufficiency_contact) VALUES('$case_reference_no','$internal_reference_id', '$first_name', '$last_name', '$customer_type', '$additional_comments', '$bulk_order_id', 'Bulk', '$client_id', '$username', '$password', '$insufficiency_contact')";
							$query_res2 = $db->query($sql);
							$order_id = $db->insert_id;
						    if ($query_res2 > 0) 
						    {
						    	$error_code++;					    	
						    	if($assign_service_id > 0)
						    	{
						    		$check_3 = "SELECT service_field_id  FROM service_field_master WHERE service_id = '".$service_id."' ";
				                    $resul_3 = mysqli_query($db,$check_3); 
				                    while ($row_3 = mysqli_fetch_array($resul_3, MYSQLI_ASSOC))
				                    {
				                    	$service_field_value = '';
				                    	if($service_2d == 2)
										{
											// university
											if($row_3['service_field_id'] == "12") { $service_field_value = $university; }		
											// college_name
											if($row_3['service_field_id'] == "13") { $service_field_value = $college_name; }		
											// degree
											if($row_3['service_field_id'] == "14") { $service_field_value = $degree; }	
											// year_of_passing	
											if($row_3['service_field_id'] == "18") { $service_field_value = $year_of_passing; }	
											// register_number	
											if($row_3['service_field_id'] == "16") { $service_field_value = $year_of_passing; }		
											// country
											if($row_3['service_field_id'] == "24") { $service_field_value = $country; }
											// graduated	
											if($row_3['service_field_id'] == "19") { $service_field_value = $graduated; }		
										}
										else
										{
											// date_of_birth
											if($row_3['service_field_id'] == "96") { $service_field_value = $date_of_birth; }
											// father_name		
											if($row_3['service_field_id'] == "97") { $service_field_value = $father_name; }		
											// address
											if($row_3['service_field_id'] == "101") { $service_field_value = $address; }	
											// country
											if($row_3['service_field_id'] == "102") { $service_field_value = $country; }
										}
				                    	$service_field_value = addslashes($service_field_value);

				                        $sql_cmd = "INSERT INTO order_master_details (order_id, service_field_id, service_field_value, service_id) VALUES('$order_id', '".$row_3["service_field_id"]."', '$service_field_value', '".$service_id."') ";
				                        $query_res3 = $db->query($sql_cmd);
				                    }
							    	
							    	$sql = "INSERT INTO order_service_details (order_id, service_id, package_id, assign_service_id, assign_package_id) VALUES('$order_id', '$service_id', '0', '$assign_service_id', '0') ";
									$query_res4 = $db->query($sql);

									$order_service_details_id = $db->insert_id;
				                    if($additional_comments != "")
				                    {
				                        $check = "INSERT INTO order_notes_master (order_service_details_id, order_id, note_type, note_description, user_id) VALUES('$order_service_details_id', '$order_id', 'client_comments', '$additional_comments', '$client_id') ";
				                        $result = mysqli_query($db,$check);
				                    }

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
						
					// }
				}
				else
				{
					$error_code = 0;
				}		
			}
			else
			{
				$error_code = 0;
				$sql = "INSERT INTO rejected_order_master (internal_reference_id, first_name, last_name, country, other_details, bulk_order_id, client_id) VALUES('$internal_reference_id', '$first_name', '$last_name', '$country', '$other_details', '$bulk_order_id', '$client_id')  ";
				$query_res6 = $db->query($sql);
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

	if($service_error != "")
	{
		echo "<script>alert('Service is not assigned to the Client'); </script>";
		exit();
	}

	if($alredy_exists != "")
	{
		echo "<script>alert('Bulk Orders already exists ".$alredy_exists."'); </script>";
	}
	
    if($error_code > 0 && @$query_res2 > 0 && @$query_res3 > 0 && @$query_res4 > 0 && @$query_res6 > 0)
    {
    	mysqli_commit($db);
    	if($count > 0)
    	{
    		if($client_email_id != "")
    		{
		    	include '../../API/SMTP/sendMail.php';
			    include '../../API/SMTP/BULK-ORDER-UPLOAD.php';
			    $subject = "BULK ORDER IMPORTED - Employment Background Screening";
			    smtpmailer($client_email_id, $from, $name, $subject, @$print_var);
			}
		}
		echo "<script>alert('Bulk Order is Imported. ".$count." records imported.'); </script>";
    }
    else
    {
    	echo "<script>alert('Error occurred!'); </script>";
    }
}

if(@$load_condition == "load_orders")
{
	echo '
	<div class="modal" style="display:block">
		<div class="row">
		<div class="col-md-1"><br></div>
		<div class="col-md-10 no_padding card">
			<div class="card-header card-header-primary" style="padding-bottom:0">
	        	<h4 class="card-title"><i class="fa fa-edit"></i> View Orders
	        		<a onclick="close_modal()" style="margin-top:0;" class="btn btn-danger btn-sm pull-right"><i class="fa fa-remove"></i></a>
	        	</h4>
	      	</div>
	      	<div class="col-md-12" id="data_table">
		<table id="datatable_tbl" style="width:100%;" class="table col-md-12 table-hover" >
            <thead class="text-primary" style="background-color: rgba(15, 13, 13, 0.822) !important;">
            <th>Case Reference</th>
            <th>Applicant Name</th>
            <th>Is a Rush Order</th>
            <th>Order Creation</th>
            <th>Order Status</th>
            </thead>';
            $query="SELECT o.*, os.order_service_details_id, c.Client_Name, s.service_name, os.order_status, os.of_user_id, os.lock_status FROM `order_master` o INNER JOIN client c ON c.id = o.client_id INNER JOIN order_service_details os ON os.order_id = o.order_id INNER JOIN service_list s ON s.id = os.service_id INNER JOIN assigned_service sa ON sa.service_id = os.service_id WHERE o.client_id = '$client_id' AND o.bulk_order_id = '$bulk_order_id' ";
            $query.="GROUP BY os.order_service_details_id";
            $result=$db->query($query);
            if($result->num_rows>0)
            {
                while($row = $result->fetch_assoc())
                {
                    if($row['is_rush'] == "1") { $row['is_rush'] = "Yes"; } else { $row['is_rush'] = "No"; }

                    $order_status = $row['order_status'];
                    
                    echo '
                    <tr>
                    <td class="tablehead1"><a>'.$row["case_reference_no"].'</a></td>
                    <td class="tablehead1 form_left">'.$row["first_name"].' '.$row["last_name"].' </td>
                    <td class="tablehead1">'.$row['is_rush'].'</td>
                    <td class="tablehead1">'.$row["order_creation_date_time"].'</td>
                    <td class="tablehead1">'.$order_status.'</td>
                    </tr>
                    ';
                }
            }
    echo '</table></div>
    </div>
    </div>
    </div>
    <script>
	    load_datatable();
    </script>
    ';
}

?>