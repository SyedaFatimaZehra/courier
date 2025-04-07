<?php
session_start();
if (!isset($_SESSION['admin']) || !isset($_SESSION['role']) || $_SESSION['role'] != 1) {
    // header('Location: login.php');
    // exit();
}
include 'config.php';

// Fetch user data from ohio table
$user_sql = "SELECT * FROM ohio";
$user_result = $conn->query($user_sql);

// Fetch package data from packages table
$package_sql = "SELECT * FROM packages";
$package_result = $conn->query($package_sql);


    
// Count the total number of ohio
$total_ohio_sql = "SELECT COUNT(*) as total_ohio FROM ohio";
$total_ohio_result = $conn->query($total_ohio_sql);
$total_ohio_row = $total_ohio_result->fetch_assoc();
$total_ohio = $total_ohio_row['total_ohio'];
?>
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
        <div class="container-fluid">
            <header class="d-flex justify-content-between align-items-center py-3 mb-4 border-bottom">
                <h1 class="h2">Admin Panel</h1>
            </header>

            <main>
                <div class="mb-4">
                    <h2 class="h4">Users (Total: <?php echo $total_ohio; ?>)</h2>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>PASSWORD</th>
                                <th>First Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Verification Token</th>
                                <th>Verification Status</th>
                                <th>Reset Token</th>
                                <th>Reset Token Expiry</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $user_result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['PASSWORD']; ?></td>
                                <td><?php echo $row['firstname']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['phonenumber']; ?></td>
                                <td><?php echo $row['v_token']; ?></td>
                                <td><?php echo $row['verification']; ?></td>
                                <td><?php echo $row['resettoken']; ?></td>
                                <td><?php echo $row['resettokenexpire']; ?></td>
                                <td><?php echo $row['role']; ?></td>
                                <td>
                                    <a href="edit_user.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="delete_user.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                <div>
                    <h2 class="h4">Packages</h2>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Package Name</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $package_result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['package_name']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td>
                                    <a href="edit_package.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="delete_package.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                <div>
                  
                            <?php  ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
