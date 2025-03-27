<?php
session_start();
include '../config/config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: manage_reviews.php?error=Invalid review ID.");
    exit();
}

$review_id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM reviews WHERE id = ?");
$stmt->bind_param("i", $review_id);

if ($stmt->execute()) {
    header("Location: manage_reviews.php?success=Review deleted successfully!");
} else {
    header("Location: manage_reviews.php?error=Error deleting review.");
}
exit();
?>
