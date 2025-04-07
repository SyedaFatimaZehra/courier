<?php
session_start();
if (!isset($_SESSION['agent_id'])) {
    header('Location: login.php');
    exit();
}

$conn = new mysqli("localhost", "root", "", "hamzaword");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tracking_number = $conn->real_escape_string($_POST['tracking_number']);
    $sender = $conn->real_escape_string($_POST['sender']);
    $receiver = $conn->real_escape_string($_POST['receiver']);
    $branch_id = $conn->real_escape_string($_POST['branch_id']);

    $conn->query("INSERT INTO couriers (tracking_number, sender, receiver, status, branch_id) 
    VALUES ('$tracking_number', '$sender', '$receiver', 'In Transit', '$branch_id')");

    echo "<p style='color: green;'>Courier added successfully!</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Courier</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 30px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input, select {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            padding: 10px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #2980b9;
        }
        .back-btn {
            display: block;
            margin: 20px auto;
            text-align: center;
            background-color: #e74c3c;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
        }
        .back-btn:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Add New Courier</h2>
    <form method="POST" action="new_courier.php">
        <input type="text" name="tracking_number" placeholder="Tracking Number" required>
        <input type="text" name="sender" placeholder="Sender" required>
        <input type="text" name="receiver" placeholder="Receiver" required>
        <select name="branch_id" required>
            <option value="" disabled selected>Select Branch</option>
            <?php
            $branches = $conn->query("SELECT id, name FROM branches");
            while ($branch = $branches->fetch_assoc()) {
                echo "<option value='{$branch['id']}'>{$branch['name']}</option>";
            }
            ?>
        </select>
        <button type="submit">Add Courier</button>
    </form>
    <a href="dashboard.php" class="back-btn">Back to Dashboard</a>
</div>

</body>
</html>
