<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="apple-touch-icon" sizes="180x180" href="../assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicons/favicon.ico">
    <link rel="manifest" href="../assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="../assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <link href="../assets/css/theme.css" rel="stylesheet"/>
  <!-- <link rel="stylesheet" href="hamza2.css"> -->
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

  <?php
  include ('link.php');
  if(isset($_GET['user_email']) && isset($_GET['resettoken'])){
      $user_email = $_GET['user_email'];
      $resettoken = $_GET['resettoken'];
      date_default_timezone_set("Asia/karachi");
      $date = date('y-m-d');
      $query = "SELECT * FROM ohio WHERE email = '$user_email' AND resettoken = '$resettoken' AND
       resettokenexpire = '$date'"; 
      $result = mysqli_query($hamza_12,$query);
  
      if($result){
        if(mysqli_num_rows($result) > 0){
        echo"
        <div class='bod'>
        <form class='formx' action='' method='POST'>
        <h1 class='head4' >new password</h1>

        <div class='hut'>
        <label class='bodu' for=''>new password</label> <br>
         <input class='body' type='password' name='password' placeholder='new password' required ><br><br>
  
  </div>
         <input  type='hidden' name='user_email' value='$user_email' cl><br><br>
    
          <input class='bu' type='submit' name='done' value='done' cl><br><br>
         
         <div class='httt'>
         <a  href='formhtml.php'>sign up</a>
         
        
         <a class='htttt'  href='log.php'>login</a>
         </div>
         
         
         </form>
         </div>";
  
      }
      else{
         echo "<script>
          alert('cant find')
          </script>";
      }
  
      }
      else{
          echo"<script>
          alert('something is wronge')
          </script>";
      }
    }
  
  ?>
  </body>
  </html>
   
  <?php
  include "link.php";
  if(isset($_POST['done'])){
      $user_email = $_POST['user_email'];
      $password = $_POST['password'];
      $query = "UPDATE ohio SET PASSWORD = '$password' , resettoken = null , resettokenexpire = null WHERE 
      email = '$user_email'";
      $finalquery = mysqli_query($hamza_12 , $query);
      if($finalquery){ 
          echo "
     <script>
     alert('i got you');
     window.location.href = 'log.php';
     </script>"; 
     
  }
  else{
      echo"  <script>
      alert('please come back after a few time so i can figure what's wronge);
      window.location.href = 'log.php';
      </script>"; 
  }
  }
  
  
  ?>

  

