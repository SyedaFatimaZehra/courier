<?php
include 'config.php';

// Get and sanitize inputs
$id = intval($_POST['id']);
$username = $_POST['username'];
$PASSWORD = $_POST['PASSWORD'];
$firstname = $_POST['firstname'];
$email = $_POST['email'];
$phonenumber = $_POST['phonenumber'];
$v_token = $_POST['v_token'];
$verification = $_POST['verification'];
$resettoken = $_POST['resettoken'];
$resettokenexpire = $_POST['resettokenexpire'];
$role = $_POST['role'];

// Validate inputs: basic validation example
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die('Invalid email format');
}

// Construct the SQL query (not recommended, shown here for demonstration purposes)
$sql = "UPDATE ohio SET 
    username='$username', 
    PASSWORD='$PASSWORD', 
    firstname='$firstname', 
    email='$email', 
    phonenumber='$phonenumber', 
    v_token='$v_token', 
    verification='$verification', 
    resettoken='$resettoken', 
    resettokenexpire='$resettokenexpire', 
    role='$role' 
    WHERE id=$id";

// Execute the query
if ($conn->query($sql) === TRUE) {
    header("Location: admin_panel.php");
    exit();
} else {
    echo "Error: " . ($conn->error);
}

// Close the connection
$conn->close();
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
