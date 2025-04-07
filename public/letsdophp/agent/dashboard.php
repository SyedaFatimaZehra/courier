<?php
session_start();
if (!isset($_SESSION['agent_id'])) {
    header('Location: login.php'); // Redirect to login if not logged in
    exit();
}

// For demonstration purposes
$agent_id = $_SESSION['agent_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agent Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .dashboard-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 500px;
            text-align: center;
        }
        h2 {
            color: #333;
            margin-bottom: 30px;
        }
        .welcome {
            margin-bottom: 20px;
            font-size: 18px;
        }
        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            font-size: 16px;
            color: white;
            background-color: #3498db;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
        }
        .btn:hover {
            background-color: #2980b9;
        }
        .logout-btn {
            background-color: #e74c3c;
        }
        .logout-btn:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>

<div class="dashboard-container">
    <h2>Agent Dashboard</h2>
    <p class="welcome">Welcome to your dashboard, Agent ID: <?php echo $agent_id; ?>!</p>
    
    <!-- Branch Status Button -->
    <a href="branch_status.php" class="btn">View Branch Status</a>
    
    <!-- Download Report Button -->
    <a href="download_report.php" class="btn">Download Report</a>
    
    <!-- Add New Courier Button 
    <a href="new_courier.php" class="btn">Add New Courier</a>
    -->
    <!-- View Couriers Button -->
    <a href="view_couriers.php" class="btn">View Couriers</a>
    
    <!-- Logout Button -->
    <a href="logout.php" class="btn logout-btn">Logout</a>
</div>

</body>
</html>
