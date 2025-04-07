<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from the POST request
    $customer_id = $_POST['customer_id'];
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $order_date = date('Y-m-d H:i:s'); // Current date and time

    // Prepare and execute SQL statement
    $stmt = $pdo->prepare("INSERT INTO orders (customer_id, product_id, quantity, order_date) VALUES (:customer_id, :product_id, :quantity, :order_date)");
    $result = $stmt->execute([
        'customer_id' => $customer_id,
        'product_id' => $product_id,
        'quantity' => $quantity,
        'order_date' => $order_date,
    ]);

    if ($result) {
        echo json_encode(['success' => 'Order placed successfully']);
    } else {
        echo json_encode(['error' => 'Failed to place order']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method']);
}
?>
