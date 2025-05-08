<?php
session_start();
include 'db_connection.php';

if (!isset($_POST['user_id']) || !isset($_POST['amount'])) {
    die("Invalid access.");
}

$user_id = $_POST['user_id'];
$amount = $_POST['amount'];
$card_holder = $_POST['card_holder'];
$card_number = $_POST['card_number'];
$expiry = $_POST['expiry'];
$cvv = $_POST['cvv'];

try {
    $stmt = $pdo->prepare("INSERT INTO payments (user_id, amount, payment_date) VALUES (?, ?, NOW())");
    $stmt->execute([$user_id, $amount]);

    echo "<script>alert('Payment successful!'); window.location.href='customer_dashboard.php';</script>";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
