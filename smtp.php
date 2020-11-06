<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$configs = include('config.php');

if ($_POST['action'] == 'send_mail') {

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Mailer = "smtp";

    $mail->SMTPDebug  = 1;
    $mail->SMTPAuth   = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Port       = $configs['mail_port'];
    $mail->Host       = $configs['mail_host'];
    $mail->Username   = $configs['mail_username'];
    $mail->Password   = $configs['mail_password'];

    $mail->IsHTML(true);
    $mail->AddAddress("ashrafuldowlaunited532@gmail.com", "Ashraful Dowla");
    $mail->SetFrom($configs['mail_username'], "Ashraful Dowla");
    // $mail->AddReplyTo("reply-to-email@domain", "reply-to-name");
    //$mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
    $mail->Subject = "Test is Test Email sent via Gmail SMTP Server using PHP Mailer";
    $content = "<b>This is a Test Email sent via Gmail SMTP Server using PHP mailer class.</b>";


    $mail->MsgHTML($content);
    if (!$mail->Send()) {
        echo "Error while sending Email.";
    } else {
        echo "Email sent successfully";
    }
}
