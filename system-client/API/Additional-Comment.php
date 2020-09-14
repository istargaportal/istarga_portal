<?php

session_start();
$client_id = $_SESSION['uid'];

require_once "../../config/config.php";

$get_connection=new connectdb;
$db=$get_connection->connect();

extract($_POST);

$additional_comments = addslashes($additional_comments);
$check = "INSERT INTO order_notes_master (order_service_details_id, order_id, note_type, note_description, user_id) VALUES('$order_service_details_id', '$order_id', 'client_comments', '$additional_comments', '$client_id') ";
$result = mysqli_query($db,$check);

?>