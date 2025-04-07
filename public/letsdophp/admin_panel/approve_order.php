<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Update the order status to 'Approved'
    $update_sql = "UPDATE user1 SET orderstatus='Paid' WHERE id=$id";
    if ($conn->query($update_sql) === TRUE) {
        echo "Order approved successfully!";
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "No ID provided.";
}

$conn->close();
?>
