<?php
// Database connection settings
$host = 'localhost';      // Replace with your database host
$dbname = 'hamza'; // Replace with your database name
$user = 'your_db_user';   // Replace with your database username
$pass = ''; // Replace with your database PASSWORD

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Check if parameters are set
if (isset($_GET['user_email']) && isset($_GET['v_token'])) {
    $user_email = $_GET['user_email'];
    $v_token = $_GET['v_token'];

    // Prepare and execute the query to find the user with the matching token
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email AND verification_token = :token');
    $stmt->execute(['email' => $user_email, 'token' => $v_token]);

    if ($stmt->rowCount() > 0) {
        // Token is valid, update the user's status
        $update_stmt = $pdo->prepare('UPDATE users SET is_verified = 1, verification_token = NULL WHERE email = :email');
        $update_stmt->execute(['email' => $user_email]);

        echo '<h1>Email Verified Successfully</h1>';
        echo '<p>Thank you for verifying your email address. You can now <a href="login.php">log in</a>.</p>';
    } else {
        // Invalid token
        echo '<h1>Invalid Verification Link</h1>';
        echo '<p>The verification link is invalid or has expired. Please request a new verification link.</p>';
    }
} else {
    // Missing parameters
    echo '<h1>Invalid Request</h1>';
    echo '<p>The verification link is missing required parameters. Please check your email for the correct link.</p>';
}
?>
