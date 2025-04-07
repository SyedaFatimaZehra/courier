<?php
$servername = "localhost";
$username = "root"; // default XAMPP username
$PASSWORD = ""; // default XAMPP PASSWORD
$dbname = "hamzaword"; // Updated database name

// Create connection
$conn = new mysqli($servername, $username, $PASSWORD, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
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
