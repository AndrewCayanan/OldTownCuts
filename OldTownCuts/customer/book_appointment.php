<?php
session_start();
include '../config/config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $barber_id = $_POST['barber_id'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];

    //stores appointments in the database
    $stmt = $conn->prepare("INSERT INTO appointments (user_id, barber_id, appointment_date, appointment_time, status) VALUES (?, ?, ?, ?, 'Pending')");
    $stmt->bind_param("iiss", $user_id, $barber_id, $appointment_date, $appointment_time);

    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Appointment booked successfully!";
        header("Location: ../customer/dashboard.php"); // Redirects after success
        exit();
    } else {
        $_SESSION['error_message'] = "Error booking appointment. Please try again.";
        header("Location: ../appointment.php"); // Redirects back to form
        exit();
    }
} else {
    header("Location: ../appointment.php");
    exit();
}
?>
