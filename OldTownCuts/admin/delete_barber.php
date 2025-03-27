<?php
session_start();
include '../config/config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: manage_barbers.php?error=Invalid barber ID.");
    exit();
}

$barber_id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM barbers WHERE id = ?");
$stmt->bind_param("i", $barber_id);

if ($stmt->execute()) {
    header("Location: manage_barbers.php?success=Barber deleted successfully!");
} else {
    header("Location: manage_barbers.php?error=Error deleting barber.");
}
exit();
?>
