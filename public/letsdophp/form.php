<?php
include 'link.php';
session_start();
if(!$_SESSION['user_name'] || !$_SESSION['user_email']){
 header('location: log.php');
}
?>
   

 



<?php

include('link.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


function sendMail($user_email, $v_token)
{
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/Exception.php';  
   require 'PHPMailer/SMTP.php';
   
   $mail = new PHPMailer(true);

try {
    //Server settings
                    
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'hamzaaqib0144@gmail.com';                     //SMTP username
    $mail->Password   = 'qgls wanx yogw xhxb';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('hamzaaqib0144@gmail.com', 'form verification');
    $mail->addAddress($user_email);     //Add a recipient
   


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject hello';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>
    This is the body in plain text for non-HTML mail clients
    <br> <a href= "http://localhost/project/couriertemplate/public/letsdophp/verify.php?user_email='.$user_email.'&v_token='.$v_token.'">verify email</a>';
   

    $mail->send();
   return true;
} catch (Exception $e) {
    return false;
}
}

 if(isset($_POST['signup'])){
    $user_name = $_POST["user_name"];
    $user_password = $_POST["user_password"];
    $first_1 = $_POST["first_1"];
    $user_email = $_POST["user_email"];
    $user_number = $_POST["user_number"];
    $checkQuery = "SELECT * FROM ohio WHERE username = '$user_name' OR email = '$user_email'";

    $result = mysqli_query($hamza_12, $checkQuery);
    if(mysqli_num_rows($result) > 0){
$result_fetch = mysqli_fetch_assoc($result);
if($result_fetch['username'] == $user_name){
    header('location: log.php?logi=youer username is already in');
// echo "<script>
// alert('youer username is already in');
// window.location.href = 'log.php';
// </script>";
} else{
    echo "<script>
    alert('youer email is already in');
    window.location.href = 'login.php';
    </script>";
}

    } else{
        $v_token = bin2hex(random_bytes(16));
        $insertQuery = "INSERT INTO ohio (username,PASSWORD,firstname,email,phonenumber,v_token,verification) VALUES
        ('$user_name','$user_password','$first_1','$user_email','$user_number','$v_token',0)";

        $final = mysqli_query($hamza_12, $insertQuery);
        if($final && sendMail($user_email, $v_token)){
            header('location: formhtml.php?reg=i have send you a verification email');
            
        }
        else{
            header('location: formhtml.php?suck=somthing is wrong but i conld not able to figure it out');
    //         echo "<script>
    // alert('oh no');
    // window.location.href = 'form.php';
    // </script>";
        }
    }
    }
 

    

    ?>





