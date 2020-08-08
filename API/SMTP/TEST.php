<?php
include 'sendMail.php';

extract($_POST);
$contact_date = date("Y-m-d");
$to = 'maheshmthorat@gmail.com';
$subject = 'NEW CONTACT ENQUIRY';
$print_var = "Contact";
$body = $print_var;
echo smtpmailer($to, $from, $name ,$subject, $body);

?>