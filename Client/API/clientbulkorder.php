<?php
$getdata=file_get_contents("php://input");
$data=json_decode($getdata,true);
var_dump($data);
var_dump($_POST);
var_dump($_FILES);
?>