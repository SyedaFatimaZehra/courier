<?php
include 'config.php';
include 'send_mail.php';

if (isset($_GET['id']) && isset($_GET['status'])) {
    $orderId = intval($_GET['id']);
    $status = $_GET['status'];

    // Validate status value
    $validStatuses = ['Paid', 'Unpaid', 'Delivered', 'Not Delivered', 'Approved'];
    if (!in_array($status, $validStatuses)) {
        die('Invalid status value.');
    }

    // Update order status in the database
    $sql = "UPDATE user1 SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $status, $orderId);
    
    if ($stmt->execute()) {
        // Fetch the sender's email address and existing v_token
        $sql = "SELECT sender, v_token FROM user1 WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $orderId);
        $stmt->execute();
        $result = $stmt->get_result();
        $order = $result->fetch_assoc();

        if ($order) {
            $sender = $order['sender'];
            $v_token = bin2hex(random_bytes(16)); // Generate a new verification token

            // Update verification token in the database
            $sql = "UPDATE user1 SET v_token = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $v_token, $orderId);
            $stmt->execute();

            // Send email notification based on status
            if ($status == 'Delivered') {
                if (sendMail($sender, $v_token)) { // Pass $sender to sendMail function
                    echo "Order updated and email sent to sender.";
                } else {
                    echo "Order updated but email failed to send.";
                }
            } else {
                echo "Order updated.";
            }
        } else {
            echo "Order not found.";
        }
    } else {
        echo "Error updating order.";
    }

    $stmt->close();
}

$conn->close();
?>
