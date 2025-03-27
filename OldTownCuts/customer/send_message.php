<?php
session_start();
include '../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    if (empty($name) || empty($email) || empty($message)) {
        echo "<script>
                alert('All fields are required.');
                window.location.href = 'contact.php';
              </script>";
        exit();
    }

    // Store the message in the database
    $stmt = $conn->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        echo "<script>
                alert('Your message has been sent successfully.');
                window.location.href = '../contact.php';
              </script>";
    } else {
        echo "<script>
                alert('Error sending message. Please try again.');
                window.location.href = '../contact.php';
              </script>";
    }
}
?>
