<?php

$print_var = "
<div style='background:#eee; width:90%; padding:2% 5%; float:left'>
<div style='background:#fff; width:96%; padding:1% 2%; float:left'>
<p>
Hello Team,
<br><br>
Your order “".$case_reference_no."” has been processed.                                                                               
<br>
Please find the screening report attached along with.
<br><br>
If you have any questions please feel free to reach out to us and we will be glad to assist you.
<br><br>
Have a great day!
<br><br>
Regards<br>
".@$company_name."<br>Services Team | <a target='_blank' href='https://".@$web_url."'><b style='color:blue;font-size:11pt;'>".@$web_url."</b></a> | <a target='_blank' href='tel:".@$service_contact_no."'><b style='color:blue;font-size:11pt;'>".@$service_contact_no."</b></a> | <a target='_blank' href='mailto:".@$service_email_id."'><b style='color:blue;font-size:11pt;'>".@$service_email_id."</b></a>
</p>
</div>
</div>
";

?>