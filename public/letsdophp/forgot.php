<?php

include('link.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


function sendMail($user_email, $resettoken)
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
    $mail->setFrom('hamzaaqib0144@gmail.com', 'forgot password');
    $mail->addAddress($user_email);     //Add a recipient
   


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'forgot password';
    $mail->Body    = 'hi do you forgot your password dont worry this link gonna fix it all<b>in bold!</b>
    This is the body in plain text for non-HTML mail clients
    <br> <a href= "http://localhost/project/couriertemplate/public/letsdophp/reset.php?user_email='.$user_email.'&resettoken='.$resettoken.'">reset password email</a>';
   

    $mail->send();
   return true;
} catch (Exception $e) {
    return false;
}
}

if(isset($_POST['sendmail'])){
   
    $user_email = $_POST['user_email'];
    $query ="SELECT * FROM ohio WHERE email = '$user_email'";
    $result = mysqli_query($hamza_12,$query);
    if(mysqli_num_rows($result) > 0){
        $resettoken = bin2hex(random_bytes(16));
        $date = date('y-m-d');
        date_default_timezone_set("Asia/karachi");
        if($result){
           $update = "UPDATE ohio SET resettoken = '$resettoken',
           resettokenexpire = '$date' WHERE email = '$user_email'";
            $final = mysqli_query($hamza_12,$update);
            if($final && sendMail($user_email, $resettoken)){
                echo "<script>
                alert(hi there i have send you a gmail);
                window.location.href = 'log.php';
                </script> ";

            }
            else{
                echo "<script>
                alert(sorry mate now this time is my bad);
                window.location.href = 'log.php';
                </script> ";

            }
        }

    }
    else{
        echo "<script>
        alert(comeon don't play dumb wit me);
        window.location.href = 'log.php';
        </script> ";

    }
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="hamza.css"> -->


    <link rel="apple-touch-icon" sizes="180x180" href="../assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicons/favicon.ico">
    <link rel="manifest" href="../assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="../assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="../assets/css/theme.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="hamza.css"> -->
</head>
<body>

<main class="main" id="top">
      <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 d-block" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand" href="../index.html"><img src="../assets/img/gallery/logo.png" height="45" alt="logo" /></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base">
              <li class="nav-item px-2"><a class="nav-link" aria-current="page" href="../index.html">Home</a></li>
              <li class="nav-item px-2"><a class="nav-link" href="#services">Our Services</a></li>
              <li class="nav-item px-2"><a class="nav-link" href="#findUs">Find Us</a></li>
            </ul>
            <div class="dropdown d-none d-lg-block">
              <button class="btn bg-soft-warning ms-2" id="dropdownMenuButton1" type="submit" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-search text-warning"></i></button>
              <div class="dropdown-menu dropdown-menu-lg-end p-0 rounded" aria-labelledby="dropdownMenuButton1" style="top:55px">
                <form>
                  <input class="form-control border-200" type="search" placeholder="Search" aria-label="Search" style="background:#FDF1DF;" />
                </form>
              </div>
            </div><a class="btn btn-primary order-1 order-lg-0 ms-lg-3" href="#!">Contact Us</a>
            <form class="d-flex my-3 d-block d-lg-none">
              <input class="form-control me-2 border-200 bg-light" type="search" placeholder="Search" aria-label="Search" />
              <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
      <section class="py-xxl-10 pb-0" id="home">
        <div class="bg-holder bg-size" style="background-image:url(assets/img/gallery/hero-header-bg.png);background-position:top center;background-size:cover;">
        </div>
    
      </section>
      </main>

    <form class="form7" action="" method="POST">
            <h2 class="head9">forgot password</h2>
    <div class="labss1">
           <label class="labss" for="">email</label> <br>
           <input class="teen" type="text" name="user_email" placeholder="email" required ><br><br>
           </div>
           <input class="forgoty" type="submit" name="sendmail" value="send" cl><br><br>
    
      
          
           <div class="ht23">
               <a  href="log.php">login</a> 
          
           <a class="ht3"  href="formhtml.php">sign up</a>
        </div>
        
        
        </form>
    
</body>
</html>
    









