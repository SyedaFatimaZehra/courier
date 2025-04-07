<?php

include "link.php";
$id = $_GET['id'];
    mysqli_query($hamza_12,"DELETE from `user1` where id='$id'");
    header('location:userlist.php');
