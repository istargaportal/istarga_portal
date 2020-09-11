<?php

$print_var = "
<div style='background:#eee; width:90%; padding:2% 5%; float:left'>
<div style='background:#fff; width:96%; padding:1% 2%; float:left'>
<p>
Dear ".@$first_name.",
<br><br>
We have been authorized by Applicant to perform Pre-Employment Background Verifications as required by the organization.                                                                             
<br>
We request that you log in to the portal <b style='color:blue'>(".@$applicant_login_url.")</b> with the login credentials mentioned below and complete all requested information.                                           
<br>

Kindly sign the release document included in the email and submit it along with other necessary documents as required for verification. You can choose to either upload the signed release in our portal (while entering the details) or if you have technical challenges with uploading the documentation, you can reach us on <a target='_blank' href='tel:".@$service_contact_no."'><b style='color:blue'>".@$service_contact_no."</b></a> or write us at :- <a target='_blank' href='mailto:".@$service_contact_no."'><b style='color:blue'>".@$service_email_id."</b></a> for assistance.
<br>
As the information is being collected for Background Verification, we request you to be cautious while filling the details.
<br>
In addition to details provided for the check, kindly include below mentioned information as well.
<br>
<br><br>
<b>* ".@$insufficiency_comment."</b>
<br><br>
<b>Your Login Credentials:</b><br>
<b>Login Name:</b> ".@$username."<br>
<b>Password:</b> ".@$password."<br><br>
Have a great day!
<br><br>
Regards<br>
".@$company_name." <br>Services Team | <a target='_blank' href='https://".@$web_url."'><b style='color:blue;font-size:11pt;'>".@$web_url."</b></a> | <a target='_blank' href='tel:".@$service_contact_no."'><b style='color:blue;font-size:11pt;'>".@$service_contact_no."</b></a> | <a target='_blank' href='mailto:".@$service_email_id."'><b style='color:blue;font-size:11pt;'>".@$service_email_id."</b></a>
</p>
</div>
</div>
";

?>