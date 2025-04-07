<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Orders</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 20px;
        }
        .btn-group {
            display: flex;
            flex-wrap: nowrap;
            margin-right: -5px;
            justify-content: center;
        }
        .btn-group .btn {
            margin-right: 5px;
            white-space: nowrap;
        }
        .btn-group .btn:last-child {
            margin-right: 0;
        }
        .btn {
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
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
        <h1 class="text-center">Manage Orders</h1>
        <?php
        include 'config.php';

        if (isset($_GET['status']) && isset($_GET['id'])) {
            $status = $_GET['status'];
            $id = $_GET['id'];
            $update_sql = "UPDATE user1 SET orderstatus='$status' WHERE id=$id";
            $conn->query($update_sql);
        }

        $sql = "SELECT * FROM user1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<table class="table table-bordered">';
            echo '<thead><tr><th>ID</th><th>Name</th><th>City</th><th>Address</th><th>Courier</th><th>Country</th><th>Sender City</th><th>Sender Address</th><th>Sender Courier</th><th>Sender Country</th><th>Order Status</th><th>Actions</th></tr></thead>';
            echo '<tbody>';

            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['city'] . '</td>';
                echo '<td>' . $row['address'] . '</td>';
                echo '<td>' . $row['courier'] . '</td>';
                echo '<td>' . $row['country'] . '</td>';
                echo '<td>' . $row['sendercity'] . '</td>';
                echo '<td>' . $row['senderaddress'] . '</td>';
                echo '<td>' . $row['sendercourier'] . '</td>';
                echo '<td>' . $row['sendercountr'] . '</td>';
                echo '<td>' . $row['orderstatus'] . '</td>';
                echo '<td>
                        <div class="btn-group" role="group">
                            <a href="admin.php?id=' . $row['id'] . '&status=Paid" class="btn btn-warning">Mark Paid</a>
                            <a href="admin.php?id=' . $row['id'] . '&status=Unpaid" class="btn btn-secondary">Mark Unpaid</a>
                            <a href="admin.php?id=' . $row['id'] . '&status=Delivered" class="btn btn-success">Mark Delivered</a>
                            <a href="admin.php?id=' . $row['id'] . '&status=Not Delivered" class="btn btn-danger">Mark Not Delivered</a>
                            <a href="download_order.php?id=' . $row['id'] . '" class="btn btn-info">Download</a>
                        </div>
                      </td>';
                echo '</tr>';
            }

            echo '</tbody></table>';
        } else {
            echo '<div class="alert alert-info">No orders found.</div>';
        }

        $conn->close();
        ?>
    </div>
</div>
</body>
</html>

<?php
include 'config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if (isset($_GET['status']) && isset($_GET['id'])) {
    $status = $_GET['status'];
    $id = $_GET['id'];

    if ($status === 'Paid') {
        // Fetch user email
        $email_sql = "SELECT email FROM user1 WHERE id=$id";
        $email_result = $conn->query($email_sql);
        $email_row = $email_result->fetch_assoc();
        $user_email = $email_row['email'];

        // Generate approval link
        $approval_link = "http://localhost/couriertemplate/public/letsdophp/admin_panel/approve_order.php?id=$id";

    }
}

// Fetch and display orders as before
function sendMail($user_email, $v_token)
{
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/Exception.php';  
   require 'PHPMailer/SMTP.php';
   
   $mail = new PHPMailer(true);

try {
    //Server settings
                    
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'hamzaaqib0144@gmail.com';                     //SMTP username
    $mail->PASSWORD   = 'qgls wanx yogw xhxb';                               //SMTP PASSWORD
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('hamzaaqib0144@gmail.com', 'form verification');
    $mail->addAddress($user_email);     //Add a recipient
   


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject hello';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>
    This is the body in plain text for non-HTML mail clients
    <br> <a href= "http://localhost/couriertemplate/public/letsdophp/verify.php?user_email='.$user_email.'&v_token='.$v_token.'">verify email</a>';
   

    $mail->send();
   return true;
} catch (Exception $e) {
    return false;
}
$update_sql = "UPDATE user1 SET orderstatus='$status' WHERE id=$id";
$conn->query($update_sql);
}
?>


