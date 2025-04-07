<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



// Define the sendMail function
function sendMail($sender, $v_token) {

    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/Exception.php';  
    require 'PHPMailer/SMTP.php';

    $mail = new PHPMailer(true);

    try {
        // Server settings
         $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'hamzaaqib0144@gmail.com';                     //SMTP username
        $mail->PASSWORD   = 'qgls wanx yogw xhxb';                               //SMTP PASSWORD
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;  

        // Debug output
        $mail->SMTPDebug = 2;

        // Recipients
        $mail->setFrom('ozaneffendi018@gmail.com', 'Courier Service');
        $mail->addAddress($sender);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Order Status Update';
        $mail->Body    = 'Dear Sender, <br>Your order has been updated. Please <a href="http://localhost/Aptech_project2/couriertemplate/public/letsdophp/admin_panel.php/verify.php?user_email=' . urlencode($sender) . '&v_token=' . urlencode($v_token) . '">verify your email</a>.';

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
        return false;
    }
}
?>
