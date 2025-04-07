<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "UPDATE packages2 SET status='Forwarded' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Package forwarded successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: admin.php");
    exit();
}
?>
