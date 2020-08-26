<?php

extract($_POST);

session_start();
if(@$admin_status != 1)
{
	$user_id = $_SESSION['user_id'];
}
require_once "../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

if(@$action == "change_password")
{
	if(@$admin_status == 1)
	{
		$check = "SELECT password FROM admin  ";
	}
	else
	{
		$check = "SELECT password FROM user_master WHERE user_id = '$user_id' ";
	}
	$resul = mysqli_query($db,$check); 
	if($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
	{
		$old_password = $row['password'];
	}

	if($current_password != $old_password)
	{
		echo '
		<script>
			alert("Please check your current password!");
			$("#current_password").focus();
		</script>
		';
	}
	else
	{
		if(@$admin_status == 1)
		{
			$check = "UPDATE admin SET password = '$new_password' ";
		}
		else
		{
			$check = "UPDATE user_master SET password = '$new_password' WHERE user_id = '$user_id' ";
		}

		$resul = mysqli_query($db,$check);
		echo '
		<script>
			alert("Password changed successfully!");
			cancel_password_modal();
		</script>
		';
	}
}

?>