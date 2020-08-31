<?php

$print_var = "
<div style='background:#eee; width:90%; padding:2% 5%; float:left'>
<div style='background:#fff; width:96%; padding:1% 2%; float:left'>
<h3>BULK ORDER - Employment Background Screening</h3>
<table style='border:solid 1px #000; border-collapse:collapse;'>
<tr>
	<td style='border:solid 1px #000; border-collapse:collapse;'>Reference ID</td>
	<td style='border:solid 1px #000; border-collapse:collapse;'>Applicant Name</td>
</tr>
".$order_list."
</table>
If you have any questions please feel free to reach out to us and we will be glad to assist you.
<br><br>
Have a great day!
<br><br>
Regards<br>
".$company_name."<br>
Services Team | <a target='_blank' href='https://".@$web_url."'><b style='color:blue'>".@$web_url."</b></a> <a target='_blank' href='tel:".@$service_contact_no."'><b style='color:blue'>".@$service_contact_no."</b></a> | <a target='_blank' href='mailto:".@$service_email_id."'><b style='color:blue'>".@$service_email_id."</b></a>
</p>
</div>
</div>
";

?>