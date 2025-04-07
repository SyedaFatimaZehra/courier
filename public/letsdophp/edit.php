

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicons/favicon.ico">
    <link rel="manifest" href="../assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="../assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">

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
        <div class="bg-holder bg-size" style="background-image:url(../assets/img/gallery/hero-header-bg.png);background-position:top center;background-size:cover;">
        </div>

     

    
      </section>
      </main>

      <?php
include "link.php";
$edit = $_GET['id'];
$query = "SELECT * FROM user1 WHERE id = $edit";
$totel = mysqli_query($hamza_12 , $query);
foreach($totel as $user){


?>
<form class="house" method="post">
<h1 class="title2">update form</h1>
<div class="house2">
<div class="firstform">
  <div class="ui">
<label for="">from</label><br>
</div>
    <input type="text" name="name" placeholder="your name" value="<?php echo $user['name']; ?>"><br>
<div class="ui1">
    <label for="">city</label><br>
    </div> 
<input class="ux" type="text" name="city" value="<?php echo $user['city']; ?> "> <br>

<div class="ui3">
<label for="">address</label><br>
</div>
<input type="text" name="address" value="<?php echo $user['address']; ?>"><br>
<div class="ui5">
<label for="">courier type</label><br>
</div>
<input type="text" name="courier" value="<?php echo $user['courier']; ?>" ><br>

<label class="ui6" for="">country</label><br>
<input type="text" name="country" value="<?php echo $user['country']; ?>"><br>
</div>

<div class="scd">
<div class="line4">
<div class="scdform">
  
  <div class="ui7">
  <label for="">to</label><br>
  </div>
<input type="text" name="send" value="<?php echo $user['send']; ?>"><br>

<div class="ui8">
<label for="">city</label><br>
</div>

<input type="text" name="sendercity" value="<?php echo $user['sendercity'];?>"><br>


<div class="ui10">
<label for="">address</label><br>
</div>
<input type="text" name = "senderaddress" value = "<?php echo $user['senderaddress'];?>"><br>

<div class="ui11">
<label for="">courier</label><br>
</div>


<input type="text" name = "sendercourier" value = "<?php echo $user['sendercourier'];?>"><br>


<div class="ui12">
<label for="">city</label><br>
</div>

<input type="text" name = "sendercountr" value = "<?php echo $user['sendercountr'];?>"><br>
</div>
<input class="subn" type="submit" value="update" name="update" >
</div>
</div>
</form>
</div>
</div>
<?php
}
?>

<?php


if(isset($_POST['update'])){
$name = $_POST['name'];
    $city = $_POST['city'];
    $courier = $_POST['courier'];
    $country = $_POST['country'];
    $address  = $_POST['address'];
    $send  = $_POST['send'];
    $sendercity  = $_POST['sendercity'];
    $senderaddress  = $_POST['senderaddress'];
    $sendercourier  = $_POST['sendercourier'];
    $sendercountr  = $_POST['sendercountr'];

   $sql = "UPDATE user1 SET name ='$name', city ='$city', courier ='$courier', country ='$country' , address ='$address', send = '$send' , sendercity = '$sendercity' , senderaddress = '$senderaddress' , sendercourier = '$sendercourier' , sendercountr = '$sendercountr'  WHERE id ='$edit'";
   $result = mysqli_query($hamza_12,$sql);
if($result){
  echo " <script> alert('data is changed sucssufully')
  window.loocation.href='userlist.php'
   </script>";
}
}
?>
</body>
</html>
