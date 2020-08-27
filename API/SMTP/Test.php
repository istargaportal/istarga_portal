<?php

include 'sendMail.php';
$subject = "LOGIN CREDENTILAS FOR - Employment Background Screening";
smtpmailer("maheshmthorat@gmail.com", "verify@istarga.com", 'NAME', $subject, "Mahesh");

?>