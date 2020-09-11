<?php

include '../../config/config.php';
include 'sendMail.php';

$file = "../Adhar.PNG"; 

// include "../Print-Background-Verification-Report.php?order_id=1&attachement=true";
$url = "../Print-Background-Verification-Report.php?order_id=1&attachement=true";
$ch = curl_init();	
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
echo $output = curl_exec($ch);
$info = curl_getinfo($ch);
curl_close($ch);

// echo smtpmailer("maheshmthorat@gmail.com", "verify@istarga.com", 'NAME', 'Mahesh', "Mahesh");

?>