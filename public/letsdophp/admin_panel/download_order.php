<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM user1 WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $filename = "order_" . $row['id'] . ".txt";
        header('Content-Type: text/plain');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        echo "Order ID: " . $row['id'] . "\n";
        echo "Package Name: " . $row['package_name'] . "\n";
        echo "Sender: " . $row['sender'] . "\n";
        echo "Recipient: " . $row['recipient'] . "\n";
        echo "Origin: " . $row['origin'] . "\n";
        echo "Destination: " . $row['destination'] . "\n";
        echo "Status: " . $row['status'] . "\n";
        echo "Created At: " . $row['created_at'] . "\n";
    } else {
        echo "No such order.";
    }

    $conn->close();
}
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
                    <a class="nav-link" href="admin.php">Order Status</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </nav>
</body>
</html>