<?php
// Database configuration
$host = "localhost";
$dbname = "old_town_cuts";
$username = "root"; // Default for XAMPP
$password = ""; // Default for XAMPP

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
