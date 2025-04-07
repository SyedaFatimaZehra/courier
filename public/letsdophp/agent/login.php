<?php
session_start();
$conn = new mysqli("localhost", "root", "", "hamzaword");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    // Query to find the agent by username
    $result = $conn->query("SELECT * FROM agents WHERE username='$username'");
    
    if ($result->num_rows > 0) {
        $agent = $result->fetch_assoc();
        
        // Check if the password matches the hashed password in the database
        if (password_verify($password, $agent['password'])) {
            $_SESSION['agent_id'] = $agent['id']; // Store agent's ID in session
            header('Location: dashboard.php'); // Redirect to agent dashboard
            exit();
        } else {
            echo "<div class='error-message'>Incorrect password!</div>";
        }
    } else {
        echo "<div class='error-message'>Username not found!</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agent Login</title>
    <style>
        body {
            background-color: #f4f7f6;
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #3498db;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #2980b9;
        }
        .error-message {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
        .signup-link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }
        .signup-link a {
            color: #3498db;
            text-decoration: none;
        }
        .signup-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Agent Login</h2>
    <form method="POST" action="login.php">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <div class="signup-link">
        Don't have an account? <a href="signup.php">Sign up</a>
    </div>
</div>

</body>
</html>
