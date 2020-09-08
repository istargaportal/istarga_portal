<?php

$print_var = "
<div style='background:#eee; width:90%; padding:2% 5%; float:left'>
<div style='background:#fff; width:96%; padding:1% 2%; float:left'>
<p>
<h3>Dear ".@$first_name.",</h3>
<br>
We’ve received your password change request. This is a really simple process, here’s all the information you need:                                                                            
<br>
Click this link to <a href='".@$forget_password_url_admin."?encrypted_platrom_key_generation=".@$email_id_encrypted."&auth_key=".@$auth_key."&forgot_type=".base64_encode(@$forgot_type)."&valid_link=".base64_encode(date("Y-m-d"))."' target='_blank'>enter your new password.</a>
<br>
<br>
If you have any questions please feel free to reach out to us and we will be glad to assist you.
<br><br>
Have a great day!
<br><br>
Regards<br>
".@$company_name."<br>
Services Team | <a target='_blank' href='https://".@$web_url."'><b style='color:blue'>".@$web_url."</b></a> <a target='_blank' href='tel:".@$service_contact_no."'><b style='color:blue'>".@$service_contact_no."</b></a> | <a target='_blank' href='mailto:".@$service_email_id."'><b style='color:blue'>".@$service_email_id."</b></a>
</p>
</div>
</div>
";

?>