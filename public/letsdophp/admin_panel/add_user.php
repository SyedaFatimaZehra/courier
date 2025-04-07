<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
</head>
<body>
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
    <form action="add_user_action.php" method="post">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required>
        <br>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="PASSWORD">PASSWORD:</label>
        <input type="PASSWORD" id="PASSWORD" name="PASSWORD" required> <!-- Changed to PASSWORD for security -->
        <br>
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="phonenumber">Phone Number:</label>
        <input type="text" id="phonenumber" name="phonenumber" required>
        <br>
        <label for="v_token">Verification Token:</label>
        <input type="text" id="v_token" name="v_token" required>
        <br>
        <label for="verification">Verification Status:</label>
        <input type="text" id="verification" name="verification" required>
        <br>
        <label for="resettoken">Reset Token:</label>
        <input type="text" id="resettoken" name="resettoken">
        <br>
        <label for="resettokenexpire">Reset Token Expiry:</label>
        <input type="datetime-local" id="resettokenexpire" name="resettokenexpire">
        <br>
        <label for="role">Role:</label>
        <input type="text" id="role" name="role" required>
        <br>
        <input type="submit" value="Add User">
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
