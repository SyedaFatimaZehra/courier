<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Courier</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 20px;
        }
    </style>
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
    
    <div class="container">
        <h1 class="text-center">Send Courier</h1>
        <form action="send_order.php" method="post">
            <div class="form-group">
                <label for="package_name">Package Name</label>
                <input type="text" class="form-control" id="package_name" name="package_name" required>
            </div>
            <div class="form-group">
                <label for="sender">Sender</label>
                <input type="email" class="form-control" id="sender" name="sender" required>
            </div>
            <div class="form-group">
                <label for="recipient">Recipient</label>
                <input type="text" class="form-control" id="recipient" name="recipient" required>
            </div>
            <div class="form-group">
                <label for="origin">Origin</label>
                <input type="text" class="form-control" id="origin" name="origin" required>
            </div>
            <div class="form-group">
                <label for="destination">Destination</label>
                <input type="text" class="form-control" id="destination" name="destination" required>
            </div>
            <button type="submit" class="btn btn-primary">Send Courier</button>
        </form>
    </div>
</body>
</html>
