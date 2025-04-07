<?php
session_start();
include 'config.php';

$username = $_POST['username'];
$PASSWORD = $_POST['PASSWORD']; // Use plaintext PASSWORD directly

$sql = "SELECT * FROM ohio WHERE username='$username' AND PASSWORD='$PASSWORD' AND role=1";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $_SESSION['admin'] = $username;
    header("Location: admin_panel.php");
} else {
    echo "Invalid login.";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
</body>
</html>
