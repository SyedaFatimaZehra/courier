<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Package</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 20px;
        }
        .container {
            max-width: 600px;
        }
    </style>
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

        <div class="container">
            <?php
            include 'config.php'; // Include your database connection

            // Handle form submission for adding package
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $package_name = $_POST['package_name'];
                $description = $_POST['description'];
                $price = $_POST['price'];

                // Handle file upload
                if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
                    $imageTmpName = $_FILES['image']['tmp_name'];
                    $imageName = basename($_FILES['image']['name']);
                    $uploadDir = __DIR__ . '/uploads/';
                    $uploadFile = $uploadDir . $imageName;

                    // Attempt to move the uploaded file
                    if (move_uploaded_file($imageTmpName, $uploadFile)) {
                        // Insert package info into the database
                        $stmt = $conn->prepare("INSERT INTO packages (package_name, description, price, image) VALUES (?, ?, ?, ?)");
                        $stmt->bind_param("ssis", $package_name, $description, $price, $imageName);
                    } else {
                        $message = "Error uploading image.";
                        $alert_class = "alert-danger";
                    }
                } else {
                    // No image uploaded
                    $stmt = $conn->prepare("INSERT INTO packages (package_name, description, price) VALUES (?, ?, ?)");
                    $stmt->bind_param("ssi", $package_name, $description, $price);
                }

                if (isset($stmt) && $stmt->execute()) {
                    $message = "Package added successfully.";
                    $alert_class = "alert-success";
                } else {
                    $message = "Error adding package.";
                    $alert_class = "alert-danger";
                }

                $stmt->close();
            }
            ?>

            <?php if (isset($message)): ?>
                <div class="alert <?php echo $alert_class; ?> alert-dismissible fade show" role="alert">
                    <?php echo $message; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <h1 class="mb-4">Add New Package</h1>
            <form action="add_package.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="package_name">Package Name:</label>
                    <input type="text" id="package_name" name="package_name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
                </div>

                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" id="price" name="price" class="form-control" step="0.01" required>
                </div>

                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" id="image" name="image" class="form-control-file">
                </div>

                <button type="submit" class="btn btn-primary">Add Package</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
