<?php
session_start();
if (!isset($_SESSION['agent_id'])) {
    header('Location: login.php');
    exit();
}

$conn = new mysqli("localhost", "root", "", "hamzaword");
$branches = $conn->query("SELECT * FROM branches");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Branch Status</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
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
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #3498db;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #2980b9;
        }
        .back-btn {
            display: block;
            margin: 0 auto;
            width: fit-content;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Branch Status</h2>
    <table>
        <thead>
            <tr>
                <th>Branch Name</th>
                <th>Location</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($branch = $branches->fetch_assoc()) { ?>
                <tr>
                    <td><?= htmlspecialchars($branch['name']); ?></td>
                    <td><?= htmlspecialchars($branch['location']); ?></td>
                    <td><?= htmlspecialchars($branch['status']); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- Back to Dashboard Button -->
    <a href="dashboard.php" class="btn back-btn">Back to Dashboard</a>
</div>

</body>
</html>
