<?php
require_once "../../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

if (mysqli_connect_errno($db)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

extract($_POST);

if($action == "change_password")
{
	$user_id = $_POST['user_id'];

	if($forgot_type == "client_forgot")
	{
		$sql = "UPDATE client SET forgot_password = 0, password = '$new_password' WHERE id = '$user_id' ";
	}
	if($forgot_type == "admin_forgot")
	{
		$sql = "UPDATE user_master SET forgot_password = 0, password = '$new_password' WHERE user_id = '$user_id' ";
	}
	if($forgot_type == "applicant_forgot")
	{
		$sql = "UPDATE order_master SET forgot_password = 0, password = '$new_password' WHERE order_id = '$user_id' ";
	}
	$result = mysqli_query($db,$sql);

	if($forgot_type == "client_forgot")
	{
		$cancel_link = '../system-client/Index.php';
	}
	if($forgot_type == "admin_forgot")
	{
		$cancel_link = 'Index.php';
	}
	if($forgot_type == "applicant_forgot")
	{
		$cancel_link = '../system-applicant/Index.php';
	}
    echo '<b style="color:green;"><i class="fa fa-check"></i> Password changed successfully!</b>';
	echo '
	<script>
		alert("Password changed successfully!");
		$("#new_password").prop("disabled", true);
	    $("#continue_btn").prop("disabled", true);  
	    window.location.href="'.@$cancel_link.'";
	</script>
	';

}

?>