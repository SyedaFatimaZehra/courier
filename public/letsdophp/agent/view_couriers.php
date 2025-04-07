<?php
session_start();
if (!isset($_SESSION['agent_id'])) {
    header('Location: login.php');
    exit();
}

// Database connection
$conn = new mysqli("localhost", "root", "", "hamzaword");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user data from `user1` table
$sql = "SELECT `id`, `name`, `city`, `address`, `courier`, `country`, `send`, `sendercity`, `senderaddress`, `sendercourier`, `sendercountr` FROM `user1` WHERE 1";
$users = $conn->query($sql);

// Check for query errors
if (!$users) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 90%;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f1c40f;
            color: white;
        }

        .btn {
            display: block;
            width: 200px;
            margin: 20px auto;
            text-align: center;
            padding: 10px 0;
            background-color: #e74c3c;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Courier List</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>City</th>
                <th>Address</th>
                <th>Courier</th>
                <th>Country</th>
                <th>Send</th>
                <th>Sender City</th>
                <th>Sender Address</th>
                <th>Sender Courier</th>
                <th>Sender Country</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($user = $users->fetch_assoc()) { ?>
                <tr>
                    <td><?= htmlspecialchars($user['id']) ?></td>
                    <td><?= htmlspecialchars($user['name']) ?></td>
                    <td><?= htmlspecialchars($user['city']) ?></td>
                    <td><?= htmlspecialchars($user['address']) ?></td>
                    <td><?= htmlspecialchars($user['courier']) ?></td>
                    <td><?= htmlspecialchars($user['country']) ?></td>
                    <td><?= htmlspecialchars($user['send']) ?></td>
                    <td><?= htmlspecialchars($user['sendercity']) ?></td>
                    <td><?= htmlspecialchars($user['senderaddress']) ?></td>
                    <td><?= htmlspecialchars($user['sendercourier']) ?></td>
                    <td><?= htmlspecialchars($user['sendercountr']) ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="dashboard.php" class="btn">Back to Dashboard</a>
</div>

</body>
</html>
