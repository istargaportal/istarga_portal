<?php
    require_once('PHPMailer_v5.1/class.phpmailer.php'); //library added in download source.
    
    $from = 'verify@istargascreening.com';
    $name = $company_name;
    function smtpmailer($to, $from, $from_name = '', $subject, $body, $is_gmail = true)
    {
        global $company_name;

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

            $mail->Username = 'maheshmthorat@gmail.com';  
            $mail->Password = 'ccjxizotbjxfidfa';

            // $mail->Username = 'verify@istargascreening.com';
            // $mail->Password = 'gqvihwvucykerahu';

        }
                
        $mail->IsHTML(true);
        $mail->From = "verify@istargascreening.com";
        $mail->FromName = $name;
        $mail->Sender = $from;
        $mail->AddReplyTo($from, $from_name);
      
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($to);
      
        if(!$mail->Send())
        {
            $error = 'Mail error: '.$mail->ErrorInfo;
            return true;
        }
        else
        {
            $error = 'Message sent!';
            return false;
        }
    }
?>