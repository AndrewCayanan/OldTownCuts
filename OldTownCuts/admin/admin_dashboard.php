<?php
session_start();
include '../config/config.php';
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Old Town Cuts</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F5F5F5;
            color: #2C2C2C;
            margin: 0;
            padding: 0;
        }

        /* Admin Header */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 30px;
            background-color: #2C2C2C;
            color: white;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        .logo {
            height: 60px; /* Increase size */
            width: auto; /* Keeps aspect ratio */
            max-height: 70px; /* Prevents it from being too large */
        }

        nav {
            display: flex;
            gap: 15px;
        }

        nav a {
            text-decoration: none;
            font-family: 'Playfair Display', serif;
            color: white;
            font-size: 15px;
            font-weight: bold;
            transition: color 0.3s ease-in-out;
            padding: 8px 12px;
        }

        nav a:hover {
            color: #B08D57;
        }

        nav a:last-child {
            margin-right: 50px;
        }

        /* Dashboard Container */
        .dashboard-container {
            max-width: 1000px;
            margin: 120px auto 40px;
            background: #E8E6E3;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            font-family: 'Playfair Display', serif;
        }

        p {
            text-align: center;
        }

        .dashboard-links {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .dashboard-links a {
            background-color: #B08D57;
            color: white;
            font-size: 16px;
            padding: 12px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.3s ease;
        }

        .dashboard-links a:hover {
            background-color: #8F6D3B;
        }

        /* Background Image */
        .admin-dashboard-wrapper {
            background: url('../assets/images/admin_bg2.jpg') no-repeat center center/cover;
            position: relative;
            padding: 100px 0;
        }

        .admin-dashboard-wrapper::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        /* Dashboard Container */
        .dashboard-container {
            position: relative;
            max-width: 1000px;
            background: #E8E6E3;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            z-index: 10;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 15px;
            background: #2C2C2C;
            color: white;
            margin-top: 0px;
        }

        /* Responsive */
        @media screen and (max-width: 768px) {
            .dashboard-container {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <header>
        <img src="../assets/images/logos.png" alt="Old Town Cuts" class="logo">
        <nav>
            <a href="admin_dashboard.php">Dashboard</a>
            <a href="manage_users.php">Users</a>
            <a href="manage_barbers.php">Barbers</a>
            <a href="manage_appointments.php">Appointments</a>
            <a href="manage_services.php">Services</a>
            <a href="manage_products.php">Products</a>
            <a href="manage_reviews.php">Reviews</a>
            <a href="../auth/logout.php">Logout</a>
        </nav>
    </header>
    <div class="admin-dashboard-wrapper">
        <section class="dashboard-container">
            <h2>Welcome, Admin</h2>
            <p>Manage all aspects of Old Town Cuts from this dashboard.</p>

            <div class="dashboard-links">
                <a href="manage_users.php">Manage Users</a>
                <a href="manage_barbers.php">Manage Barbers</a>
                <a href="manage_appointments.php">Manage Appointments</a>
                <a href="manage_services.php">Manage Services</a>
                <a href="manage_products.php">Manage Products</a>
                <a href="manage_reviews.php">Manage Reviews</a>
            </div>
        </section>
    </div>
    <footer>
        <p>&copy; 2025 Old Town Cuts. All rights reserved.</p>
    </footer>
</body>
</html>
