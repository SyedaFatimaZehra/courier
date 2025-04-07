<?php

include('link.php');


 if(isset($_POST['submit'])){
   $name = $_POST["name"];
    $city = $_POST["city"];
    $courier = $_POST["courier"];
    $country = $_POST["country"];
    $address  = $_POST["address"];
    $send  = $_POST["to"];
    $sendercity  = $_POST["sendercity"];
    $senderaddress  = $_POST["senderaddress"];
    $sendercourier  = $_POST["sendercourier"];
    $sendercountr  = $_POST["sendercountr"];
    
    $insertQuery = mysqli_query($hamza_12, "INSERT INTO user1 (name,city,courier,country,address,send,sendercity,senderaddress,sendercourier,sendercountr) VALUES
    ('$name','$city','$courier','$country','$address','$send','$sendercity','$senderaddress','$sendercourier','$sendercountr')");

    
    if($insertQuery){
        header('location: userlist.php?og=your order is in proces');
        // echo '<script>alert("hi")</script>';
        
        
    }
    else{
        header('location: userhtml.php?suck=somthing is wrong but i conld not able to figure it out');

    }
}




    


 
?>