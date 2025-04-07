<?php
include 'config.php';

$order_id = $_GET['order_id'];

$stmt = $pdo->prepare("SELECT * FROM orders WHERE order_id = :order_id");
$stmt->execute(['order_id' => $order_id]);
$order = $stmt->fetch(PDO::FETCH_ASSOC);

if ($order) {
    echo json_encode($order);
} else {
    echo json_encode(['error' => 'Order not found']);
}
?>
