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
include 'config.php'; // Include your database connection

// Retrieve the package ID from the URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch package details from the database
if ($id > 0) {
    $stmt = $conn->prepare("SELECT * FROM packages WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $package = $result->fetch_assoc();
    $stmt->close();
}

// Handle form submission for updating package
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
            // Update package info in the database
            $stmt = $conn->prepare("UPDATE packages SET package_name = ?, description = ?, price = ?, image = ? WHERE id = ?");
            $stmt->bind_param("ssisi", $package_name, $description, $price, $imageName, $id);
        } else {
            // No new image was uploaded, so keep the old image
            $stmt = $conn->prepare("UPDATE packages SET package_name = ?, description = ?, price = ? WHERE id = ?");
            $stmt->bind_param("ssii", $package_name, $description, $price, $id);
        }
    } else {
        // No new image was uploaded, so keep the old image
        $stmt = $conn->prepare("UPDATE packages SET package_name = ?, description = ?, price = ? WHERE id = ?");
        $stmt->bind_param("ssii", $package_name, $description, $price, $id);
    }

    if ($stmt->execute()) {
        $message = "Package updated successfully.";
        $alert_class = "alert-success";
    } else {
        $message = "Error updating package.";
        $alert_class = "alert-danger";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Package</title>
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
    <div class="container">
        <?php if (isset($message)): ?>
            <div class="alert <?php echo $alert_class; ?> alert-dismissible fade show" role="alert">
                <?php echo $message; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <h1 class="mb-4">Edit Package</h1>
        <form action="edit_package.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="package_name">Package Name:</label>
                <input type="text" id="package_name" name="package_name" class="form-control" value="<?php echo ($package['package_name']); ?>" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" class="form-control" rows="4" required><?php echo ($package['description']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" class="form-control" step="0.01" value="<?php echo ($package['price']); ?>" required>
            </div>

            <div class="form-group">
                <label for="image">Image (Leave empty to keep current image):</label>
                <input type="file" id="image" name="image" class="form-control-file">
                <?php if (!empty($package['image'])): ?>
                    <img src="uploads/<?php echo ($package['image']); ?>" alt="Current Image" class="img-fluid mt-2" style="max-width: 200px;">
                <?php endif; ?>
            </div>

            <button type="submit" class="btn btn-primary">Update Package</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
