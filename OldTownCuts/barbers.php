<?php
session_start();
include 'config/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Barbers | Old Town Cuts</title>
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

        /* About Section */
        .about-section {
            max-width: 1000px;
            margin: 120px auto 40px;
            text-align: center;
            padding: 40px;
            background: #E8E6E3;
            border-radius: 10px;
        }

        .map-container {
            margin-top: 20px;
            width: 100%;
            height: 300px;
            border-radius: 8px;
            overflow: hidden;
        }

        .hours {
            margin-top: 20px;
            font-size: 16px;
        }

        /* Featured Barbers Section */
        .featured-barbers {
            max-width: 1200px;
            margin: 40px auto;
            text-align: center;
            padding: 20px;
        }

        .barber-list {
            display: flex;
            justify-content: center;
            gap: 30px;
        }

        .barber-card {
            background: #E8E6E3;
            padding: 15px;
            /* border-radius: 8px; */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .barber-card:hover {
            transform: scale(1.05);
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        }

        .barber-card img {
            width: 100%;
            height: 350px;
            object-fit: cover;
            /* border-radius: 8px; */
        }

        .barber-card h3 {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            margin-top: 10px;
        }

        .barber-card p {
            font-size: 14px;
            color: #444;
        }

        /* Barbers Table */
        .barbers-table {
            max-width: 800px;
            margin: 50px auto;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #E8E6E3;
        }

        th, td {
            padding: 12px;
            border: 1px solid #B08D57;
        }

        th {
            background-color: #B08D57;
            color: white;
            font-family: 'Playfair Display', serif;
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

    <!-- About Section -->
    <section class="about-section">
        <h2>About Old Town Cuts</h2>
        <p>Old Town Cuts has been providing premium grooming services for over a decade. Our team of skilled barbers is dedicated to delivering the best styles and cuts while ensuring customer satisfaction.</p>

        <div class="map-container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d123246.71914980162!2d120.50760918615046!3d15.133063067362471!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x3396f24ec2f5a1f9%3A0x5e0af8a6aaab2282!2s%231%20Holy%20Angel%20St%2C%20Angeles%2C%202009%20Pampanga!3m2!1d15.133078!2d120.59001099999999!5e0!3m2!1sen!2sph!4v1742655857341!5m2!1sen!2sph" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class="hours">
            <h3>Opening Hours:</h3>
            <p>Monday - Friday: 9:00 AM - 7:00 PM</p>
            <p>Saturday - Sunday: 10:00 AM - 5:00 PM</p>
        </div>
    </section>

    <!-- Featured Barbers Section -->
    <section class="featured-barbers">
        <h2>Meet Our Expert Barbers</h2>
        <div class="barber-list">
            <div class="barber-card" onclick="bookAppointment('Micko')">
                <img src="assets/images/2.jpg" alt="Micko">
                <h3>Micko</h3>
            </div>
            <div class="barber-card" onclick="bookAppointment('Bart')">
                <img src="assets/images/3.jpg" alt="Bart">
                <h3>Bart</h3>
            </div>
            <div class="barber-card" onclick="bookAppointment('David')">
                <img src="assets/images/1.jpg" alt="David">
                <h3>David</h3>
            </div>
        </div>
    </section>

    <!-- Barbers Table -->
    <section class="barbers-table">
        <h2>Our Barbers & Specialties</h2>
        <table>
            <tr>
                <th>Barber</th>
                <th>Specialty</th>
            </tr>
            <?php
            $query = "SELECT name, specialty FROM barbers";
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['specialty']); ?></td>
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
    <script>
        function bookAppointment(barberName) {
            window.location.href = "appointment.php?barber=" + encodeURIComponent(barberName);
        }
    </script>
</body>
</html>
