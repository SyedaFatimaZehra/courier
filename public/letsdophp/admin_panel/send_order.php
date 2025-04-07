<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $packageName = $_POST['package_name'];
    $sender = $_POST['sender'];
    $recipient = $_POST['recipient'];
    $origin = $_POST['origin'];
    $destination = $_POST['destination'];

    $sql = "INSERT INTO user1 (package_name, sender, recipient, origin, destination, status) VALUES (?, ?, ?, ?, ?, 'Unpaid')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $packageName, $sender, $recipient, $origin, $destination);

    if ($stmt->execute()) {
        echo "Order has been sent.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                    <a class="nav-link" href="  ">Order Status</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </nav>
</body>
</html>