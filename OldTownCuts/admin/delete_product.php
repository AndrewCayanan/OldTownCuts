<?php
session_start();
include '../config/config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: manage_products.php?error=Invalid product ID.");
    exit();
}

$product_id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
$stmt->bind_param("i", $product_id);

if ($stmt->execute()) {
    header("Location: manage_products.php?success=Product deleted successfully!");
} else {
    header("Location: manage_products.php?error=Error deleting product.");
}
exit();
?>
