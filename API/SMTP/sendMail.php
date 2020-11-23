<?php
    require_once('PHPMailer_v5.1/class.phpmailer.php'); //library added in download source.
    
    $from = 'verify@istargascreening.com';
    $name = $company_name;
    function smtpmailer($to, $from, $from_name = '', $subject, $body, $is_gmail = true)
    {
        global $company_name;
        global $to_mul;
        global $cc;
        global $bcc;

        $name = $company_name;
        $from_name = $company_name;
        global $error;
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true; 
        if($is_gmail)
        {
            $mail->SMTPSecure = 'ssl';
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 465;
            $mail->Username = 'verify@istargascreening.com';
            $mail->Password = 'gqvihwvucykerahu';
        }
                
        $mail->IsHTML(true);
        $mail->From = "verify@istargascreening.com";
        $mail->FromName = $name;
        $mail->Sender = $from;
        $mail->AddReplyTo($from, $from_name);

        global $send_file;
        if($send_file != "")
        {
            $mail->addAttachment('../../../API/'.$send_file, $send_file);
        }
        
        $mail->Subject = $subject;
        $mail->Body = $body;

        $mail->AddAddress($to);
        if(is_array($to_mul) == '1')
        {
            foreach ($to_mul as $to_email) {
                $mail->AddAddress($to_email);
            }
        }
        else
        {
            $mail->AddAddress($to_mul);
        }
        
        if(is_array($cc) == '1')
        {
            foreach ($cc as $cc_email) {
                $mail->AddCC($cc_email);
            }
        }
        else
        {
            $mail->AddBCC($cc);
        }
        if(is_array($bcc) == '1')
        {
            foreach ($bcc as $bcc_email) {
                $mail->AddBCC($bcc_email);
            }
        }
        else
        {
            $mail->AddBCC($bcc);
        }
        if(!$mail->Send())
        {
            $error = 'Mail error: '.$mail->ErrorInfo;
            return true;
        }
        else
        {
            $error = 'Message sent!';
            return $error;
        }
    }
?>