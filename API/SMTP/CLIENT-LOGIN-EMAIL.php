<?php

$print_var = "
<div style='background:#eee; width:90%; padding:2% 5%; float:left'>
<div style='background:#fff; width:96%; padding:1% 2%; float:left'>

<h3>Employment Background Screening</h3>
<p>
Dear ".@$Client_Name.",
<br><br>
We have been authorised by Applicant to perform a background verification as required by the organisation.                                                                               
<br>
We request that you log in to the portal <b style='color:blue'>(".@$client_login_url.")</b> with the login credentials mentioned below and complete all requested information.                                           
<br>
When providing your details, we ask you to take care and double check all information before submitting, as mistakes may cause complications and delays in your background screening.
<br><br>
<b>Your Login Credentials:</b><br>
<b>Login Name:</b> ".@$email."<br>
<b>Password:</b> ".@$password."<br><br>
As part of the background verification process, the below screenings may be conducted depending on your role within the organization.  Only information relevant to your specific screenings will be collected via the online portal; please note that in unique circumstances we may need to follow up with you via email or phone to collect additional information to complete a specific verification.
<br><br>
".@$all_services."
<br>
If you have any questions please feel free to reach out to us and we will be glad to assist you.
<br><br>
Have a great day!
<br><br>
Regards<br>
ABV companyApplicant<br>
Services Team | <a target='_blank' href='tel:".@$service_contact_no."'><b style='color:blue'>".@$service_email_id."</b></a> | <a target='_blank' href='mailto:".@$service_contact_no."'><b style='color:blue'>".@$service_contact_no."</b></a>
</p>
</div>
</div>
";

?>