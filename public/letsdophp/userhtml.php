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
</head> 
<body>
    
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
include 'link.php';
if(isset($_GET['og'])){
    ?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  
    <?php echo $_GET['og']; ?>
    <button  type="submit" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
    <!-- <input  type="submit" name="signup" value="sign up"  cl> -->
</div>
<?php
}
?>
<!-- <div class="vango">
<h1 class="vango1">add your courier</h1>
<p class="vango2">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magnam nostrum possimus accusamus veritatis eius, quasi repudiandae quam harum! Libero ab, nulla voluptate assumenda neque excepturi molestias obcaecati quo repell1endus exercitationem.</p>
</div> -->
<!-- <div class="bothform"> -->
  <div class="boss">
  <form class="house"  action="userphp.php" method="post">
    <h1 class="courier">courier form</h1>
    <h1 class="title2">from</h1>
    <div class="house2">
   <div class="firstform">
  <div class="ui">
    <label  for="">from</label>
    </div>
    <input class="oo"  type="text" name="name" placeholder=" your name" required>
<div class="ui1">
    <label for="">your city</label>
    </div>
    
<input class="oo" class="ux" type="text" name="city" placeholder=" enter your city" required>

<div class="ui3">
<label for="">your address</label>
</div>

<input class="oo" type="text" name="address" required>

<div class="ui5">
<label for="">courier type</label>
</div>

<input class="oo" type="text" name="courier" required>

<div class="ui6">
<label for="">your country</label>
</div>

<input class="oo" type="text" name="country" required>
</div>

<!-- <img class="phot" src="../assets/img/gallery/transfer.png" alt=""> -->
<h1 class="title">to</h1>
<div class="scd">
  <div class="line4">
    <div class="scdform">
    <div class="ui7">
    <label for="">to</label><br>
    </div>
    <input class="oo"   type="text" name="to" placeholder=" to" required>
<div class="ui8">
    <label for="">city</label>
    </div>
    
<input class="oo" type="text" name="sendercity" required>

<div class="ui10">
<label for="">address</label>
</div>

<input class="oo" type="text" name="senderaddress" required>

<div class="ui11">
<label for="">courier type</label>
</div>
<input class="oo" type="text" name="sendercourier" required>

<div class="ui12">
<label for="">country</label>
</div>

<input class="oo" type="text" name="sendercountr">
</div>
<input class="subn" type="submit" value="submit" name="submit" >
</div>
</div>
</form>
</div>
</div>
</div>
</body>
</html>




