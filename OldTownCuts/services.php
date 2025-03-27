<?php
session_start();
include 'config/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services | Old Town Cuts</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F0ECE2;
            color: #2C2C2C;
            margin: 0;
            padding: 0;
        }

        /* Header */
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

        /* Services Section */
        .services-container {
            max-width: 1200px;
            margin: 100px auto;
            margin-bottom: 0;
            padding: 20px;
            text-align: center;
        }

        .services-title {
            font-size: 32px;
            font-family: 'Playfair Display', serif;
            margin-bottom: 30px;
        }

        .services-list {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            justify-items: center;
        }

        .service-item {
            background: #E8E6E3;
            padding: 10px;
            /* border-radius: 8px; */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            width: 90%;
            max-width: 320px;
        }

        .service-item img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            /* border-radius: 8px; */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .service-item:hover {
            transform: scale(1.05);
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        }

        .service-name {
            font-size: 16px;
            font-weight: bold;
            margin-top: 5px;
        }

        .service-price {
            font-size: 14px;
            font-weight: bold;
            color: #B08D57;
            margin-top: 3px;
        }

        /* Services Table */
        .services-table {
            max-width: 900px;
            margin: 50px auto;
            margin-top: 0;
            background: #FFF;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #B08D57;
            color: white;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f1f1f1;
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
        <img src="assets/images/logos.png" alt="Old Town Cuts" class="logo">
        <nav>
            <a href="index.php">Home</a>
            <a href="barbers.php">Barbers</a>
            <a href="appointment.php">Book Now</a>
            <a href="products.php">Products</a>
            <a href="contact.php">Contact</a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="customer/dashboard.php">Dashboard</a>
                <a href="auth/logout.php">Logout</a>
            <?php else: ?>
                <a href="auth/login.php">Login</a>
            <?php endif; ?>
        </nav>
    </header>

    <section class="services-container">
        <h2 class="services-title">Our Services</h2>
        <div class="services-list">
            <div class="service-item">
                <img src="assets/images/haircut.jpeg" alt="Haircut">
                <h3 class="service-name">Haircut</h3>
                <p class="service-price">₱250.00</p>
            </div>

            <div class="service-item">
                <img src="assets/images/face_shave.jpeg" alt="Face Shave">
                <h3 class="service-name">Face Shave</h3>
                <p class="service-price">₱100.00</p>
            </div>

            <div class="service-item">
                <img src="assets/images/massage.jpeg" alt="Massage">
                <h3 class="service-name">Massage</h3>
                <p class="service-price">₱250.00</p>
            </div>

            <div class="service-item">
                <img src="assets/images/scalp_massage.jpeg" alt="Scalp Massage">
                <h3 class="service-name">Scalp Massage</h3>
                <p class="service-price">₱150.00</p>
            </div>

            <div class="service-item">
                <img src="assets/images/hair_coloring.jpeg" alt="Hair Coloring">
                <h3 class="service-name">Hair Coloring</h3>
                <p class="service-price">₱500.00</p>
            </div>

            <div class="service-item">
                <img src="assets/images/perm.jpg" alt="Perm">
                <h3 class="service-name">Perm</h3>
                <p class="service-price">₱600.00</p>
            </div>
        </div>
    </section>

    <section class="services-table">
        <h2 class="services-title">Full Service List</h2>
        <table>
            <tr>
                <th>Service Name</th>
                <th>Description</th>
                <th>Price</th>
            </tr>
            <?php
            $query = "SELECT service_name, description, price FROM services";
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()):
            ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['service_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['description']); ?></td>
                    <td>₱<?php echo htmlspecialchars($row['price']); ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </section>

    <footer>
        <div class="footer-container">
            <div class="footer-logo">
                <a href="index.php"><img src="assets/images/logo2.png" alt="Old Town Cuts"></a>
            </div>
            <div class="footer-content">
                <p>&copy; 2025 Old Town Cuts. All rights reserved.</p>
                <div class="social-links">
                    <a href="https://www.facebook.com/andrew.cayanan.1" target="_blank"><img src="assets/images/facebook.jpg" alt="Facebook"></a>
                    <a href="https://www.instagram.com/mickodedios?igsh=dnp1OTRtdWpxZ3Z4&utm_source=qr" target="_blank"><img src="assets/images/instagram.jpg" alt="Instagram"></a>
                    <a href="https://www.linkedin.com/in/david-tulio-126916316/" target="_blank"><img src="assets/images/linkedin.jpg" alt="LinkedIn"></a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
