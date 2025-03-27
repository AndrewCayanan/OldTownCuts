<?php
session_start();
include '../config/config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: manage_services.php?error=Invalid service ID.");
    exit();
}

$service_id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM services WHERE id = ?");
$stmt->bind_param("i", $service_id);

if ($stmt->execute()) {
    header("Location: manage_services.php?success=Service deleted successfully!");
} else {
    header("Location: manage_services.php?error=Error deleting service.");
}
exit();
?>
