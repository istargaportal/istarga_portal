<?php
    require_once('PHPMailer_v5.1/class.phpmailer.php'); //library added in download source.
    
    $from = 'care@honestwebs.com';
    $name = 'BGV ORION';
    function smtpmailer($to, $from, $from_name = 'BGV ORION', $subject, $body, $is_gmail = true)
    {
        $name = 'BGV ORION';
        global $error;
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true; 
        if($is_gmail)
        {
            // $mail->SMTPSecure = 'ssl';
            // $mail->Host = 'smtp-relay.sendinblue.com';
            // $mail->Port = 587;
            // $mail->Username = 'care@honestwebs.com';
            // $mail->Password = '4VCryWtU37x6SnpN';   


            $mail->SMTPSecure = 'ssl';
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 465;  
            $mail->Username = 'maheshmthorat@gmail.com';  
            $mail->Password = 'ccjxizotbjxfidfa';

        }
                
        $mail->IsHTML(true);
        $mail->From = "care@honestwebs.com";
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