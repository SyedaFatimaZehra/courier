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


<?php
include 'config.php';

$id = intval($_GET['id']); 
$sql = "SELECT * FROM ohio WHERE id=$id";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <form action="edit_user_action.php" method="post">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>" required>
        <br>
        <label for="PASSWORD">PASSWORD:</label>
        <input type="text" id="PASSWORD" name="PASSWORD" value="<?php echo $user['PASSWORD']; ?>"> <!-- Display plaintext PASSWORD -->
        <br>
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname" value="<?php echo $user['firstname']; ?>">
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>">
        <br>
        <label for="phonenumber">Phone Number:</label>
        <input type="text" id="phonenumber" name="phonenumber" value="<?php echo $user['phonenumber']; ?>">
        <br>
        <label for="v_token">Verification Token:</label>
        <input type="text" id="v_token" name="v_token" value="<?php echo $user['v_token']; ?>">
        <br>
        <label for="verification">Verification Status:</label>
        <input type="text" id="verification" name="verification" value="<?php echo $user['verification']; ?>">
        <br>
        <label for="resettoken">Reset Token:</label>
        <input type="text" id="resettoken" name="resettoken" value="<?php echo $user['resettoken']; ?>">
        <br>
        <label for="resettokenexpire">Reset Token Expiry:</label>
        <input type="text" id="resettokenexpire" name="resettokenexpire" value="<?php echo $user['resettokenexpire']; ?>">
        <br>
        <label for="role">Role:</label>
        <input type="text" id="role" name="role" value="<?php echo $user['role']; ?>">
        <br>
        <input type="submit" value="Update User">
    </form>
</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    
</body>
</html>

