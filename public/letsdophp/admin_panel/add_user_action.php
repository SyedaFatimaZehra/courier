<?php
include 'config.php';

$id = $_POST['id'];
$username = $_POST['username'];
$PASSWORD = ($_POST['PASSWORD']);
$firstname = $_POST['firstname'];
$email = $_POST['email'];
$phonenumber = $_POST['phonenumber'];
$v_token = $_POST['v_token'];
$verification = $_POST['verification'];
$resettoken = $_POST['resettoken'];
$resettokenexpire = $_POST['resettokenexpire'];
$role = $_POST['role'];


$sql = "INSERT INTO ohio (username, PASSWORD) VALUES ('$username', '$PASSWORD')";
if ($conn->query($sql) === TRUE) {
    header("Location: admin_panel.php");
} else {
    echo "Error: " . $conn->error;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="d-flex">
        <nav class="sidebar">
            <h4>Admin Panel</h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="admin_panel.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add_user.php">Add User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add_package.php">Add Package</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin.php">Order Status</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </nav>
