<?php
require_once "../../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

if (mysqli_connect_errno($db)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

extract($_POST);

if($action == "forgot_password")
{
	$email_id = $_POST['email_id'];
	if($forgot_type == "admin_forgot")
	{
		$sql = "SELECT email_id, first_name AS usr_name, user_id AS usr_id FROM user_master WHERE email_id = '$email_id' ";
	}
	if($forgot_type == "client_forgot")
	{
		$sql = "SELECT email, Client_Name AS usr_name, id AS usr_id FROM client WHERE email = '$email_id' ";
	}
	if($forgot_type == "applicant_forgot")
	{
		$sql = "SELECT email_id, first_name AS usr_name, order_id AS usr_id FROM order_master WHERE email_id = '$email_id' ";
	}
	
	$result = $db->query($sql);
	if($result->num_rows > 0)
	{
		if($row = $result->fetch_assoc())
		{
			$user_id = $row['usr_id'];
			$first_name = $row['usr_name'];
			if($forgot_type == "admin_forgot")
			{
				$sql = "UPDATE user_master SET forgot_password = 1 WHERE user_id = '$user_id' ";  
			}
			if($forgot_type == "client_forgot")
			{
				$sql = "UPDATE client SET forgot_password = 1 WHERE id = '$user_id' ";  
			}
			if($forgot_type == "applicant_forgot")
			{
				$sql = "UPDATE order_master SET forgot_password = 1 WHERE order_id = '$user_id' ";  
			}
			$result = mysqli_query($db,$sql);

		    include '../../API/SMTP/sendMail.php';
			$auth_key = base64_encode($row['usr_id']);
            $email_id_encrypted = base64_encode($email_id);
            include '../../API/SMTP/FORGOT-PASSWORD.php';
            $subject = "FORGET PASSWORD - ";
            smtpmailer($email_id, $from, $name, $subject, @$print_var);
			echo '<b style="color:green;">Please check Email Sent successfully! <i class="fa fa-envelope"></i></b>';
			echo '
			<script>
				$("#email_id").prop("disabled", true);
			    $("#continue_btn").prop("disabled", true);  
			</script>
			';
		}
	}
	else
	{
		echo '
		<b style="color:red;">Your Email ID is not found in our database!</b>
		<script>$("#email_id").css("border-color", "red");$("#email_id").focus();</script>
		';
	}
}

?>