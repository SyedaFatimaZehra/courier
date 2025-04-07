<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <!-- <link rel="stylesheet" href="hamza1.css"> -->
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
            </div><a class="btn btn-primary order-1 order-lg-0 ms-lg-3" href="contact.php">Contact Us</a>
            <form class="d-flex my-3 d-block d-lg-none">
              <input class="form-control me-2 border-200 bg-light" type="search" placeholder="Search" aria-label="Search" />
              <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
      <section class="py-xxl-10 pb-0" id="home">
        <div class="bg-holder bg-size" style="background-image:url(../assets/img/gallery/hero-header-bg.png);background-position:top center;background-size:cover;">
        </div>

     

    
      </section>
      </main>
    
<?php
include 'link.php';
if(isset($_GET['logi'])){
    ?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <?php echo $_GET['logi']; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <!-- <input  type="submit" name="signup" value="sign up"  cl> -->
    </div>
    <?php
}
?>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
 <div class="home"> 
  <div class="all">
 <form class="form1" action="" method="POST">
        <h1 class="head">log in</h1>
       <label class="logt" for="">username or email</label> <br>
       <input class="holder" type="text" name="user_email" placeholder="username or email" required ><br><br>
       <div class="line">
       <label class="logt" for="">password</label><br>
       <input class="holder1" type="password" name= "user_password" required> <br><br>
       </div>
       <input class="submit" type="submit" name="login" value="log in" cl><br><br>
        
      
       <div class="ht">
      <a  href="formhtml.php">sign up</a>
    

    <a class="htt " href="forgot.php">forgot password</a>
    </div>
    </form>
    </div>
    </div>  
</body>
</html>
<?php
include('link.php');


if(isset($_POST['login'])){
      $user_email = $_POST["user_email"];
      $user_password = $_POST["user_password"];
      $checkquery = "SELECT * FROM ohio WHERE username = '$user_email' OR email = '$user_email'";
      $result = mysqli_query($hamza_12, $checkquery);

     if(mysqli_num_rows($result) > 0){
         if($result_fetch = mysqli_fetch_assoc($result)){
            if($result_fetch['PASSWORD'] == $user_password){
                if($result_fetch['verification'] == 1){

                    // admin role
              if($result_fetch['role'] == 1){   
           if($result_fetch['username'] || $result_fetch['email']){
              session_start();
              $_SESSION['admin'] = $result_fetch['user_name'];
              $_SESSION['email'] = $result_fetch['user_email'];
              echo "<script>
              alert('hi admin');
              window.location.href='admin_panel/admin_panel.php'
              </script>";
                 }
       
     }   
 if($result_fetch['agentrole'] == 1){
  if($result_fetch['username'] || $result_fetch['email']){
    session_start();
    $_SESSION['agent'] = $result_fetch['user_name'];
    $_SESSION['email'] = $result_fetch['user_email'];
    echo "<script>
    alert('hi')
     window.location.href='agent/dashboard.php'
    </script>";
  }
 


      else {
      session_start();
      $_SESSION['username'] = $result_fetch['user_name'];
      $_SESSION['email'] = $result_fetch['user_email'];
      echo "<script>
      alert('somthing is going on with your memory');
      window.location.href='userhtml.php'
</script>";
  }
          
 
} 
 else{
      echo "<script>
              alert('incorect password');
              window.location.href='form.php'
        </script>";
        }
         }
        }
    }
  }
}
?>