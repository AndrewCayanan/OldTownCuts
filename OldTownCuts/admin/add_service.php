<?php
session_start();
include '../config/config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $service_name = trim($_POST['service_name']);
    $description = trim($_POST['description']);
    $price = trim($_POST['price']);

    if (!empty($service_name) && !empty($description) && !empty($price)) {
        $stmt = $conn->prepare("INSERT INTO services (service_name, description, price) VALUES (?, ?, ?)");
        $stmt->bind_param("ssd", $service_name, $description, $price);

        if ($stmt->execute()) {
            header("Location: manage_services.php?success=Service added successfully!");
            exit();
        } else {
            $error = "Failed to add service.";
        }
    } else {
        $error = "Please fill out all fields.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Service | Old Town Cuts</title>
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
            height: 60px;
            width: auto;
            max-height: 70px;
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

        /* Form Container */
        .container {
            max-width: 500px;
            margin: 120px auto;
            background: #E8E6E3;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            font-family: 'Playfair Display', serif;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
        }

        input {
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #B08D57;
            border-radius: 5px;
        }

        button {
            background-color: #B08D57;
            color: white;
            padding: 10px;
            border: none;
            font-weight: bold;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 15px;
            transition: background 0.3s ease;
        }

        button:hover {
            background-color: #8F6D3B;
        }

        .error {
            color: red;
            text-align: center;
            font-weight: bold;
        }

        /* Footer */
        .footer-container {
        display: flex;
        align-items: center;
        justify-content: center;
        background: #2C2C2C;
        padding: 15px;
        color: white;
        }

        .footer-logo {
            margin-right: 20px; /* Space between logo and text */
        }

        .footer-logo img {
            width: 90px; /* Slightly larger logo */
            height: auto;
        }

        .footer-content {
            text-align: center;
        }

        .social-links {
            margin-top: 5px;
            margin-right: 60px;
        }

        .social-links img {
            width: 40px;
            margin: 0 8px;
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

    <section class="container">
        <h2>Add New Service</h2>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="add_service.php" method="POST">
            <label for="service_name">Service Name:</label>
            <input type="text" name="service_name" required>

            <label for="description">Description:</label>
            <input type="text" name="description" required>

            <label for="price">Price (₱):</label>
            <input type="number" name="price" step="0.01" required>

            <button type="submit">Add Service</button>
        </form>
    </section>

    <footer>
        <div class="footer-container">
            <div class="footer-logo">
                <a href="index.php"><img src="../assets/images/logo2.png" alt="Old Town Cuts"></a>
            </div>
            <div class="footer-content">
                <p>&copy; 2025 Old Town Cuts. All rights reserved.</p>
                <div class="social-links">
                    <a href="https://www.facebook.com/andrew.cayanan.1" target="_blank"><img src="../assets/images/facebook.jpg" alt="Facebook"></a>
                    <a href="https://www.instagram.com/mickodedios?igsh=dnp1OTRtdWpxZ3Z4&utm_source=qr" target="_blank"><img src="../assets/images/instagram.jpg" alt="Instagram"></a>
                    <a href="https://www.linkedin.com/in/david-tulio-126916316/" target="_blank"><img src="../assets/images/linkedin.jpg" alt="LinkedIn"></a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
