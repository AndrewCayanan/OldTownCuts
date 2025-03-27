<?php
session_start();
include 'config/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Old Town Cuts</title>
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

        /* Hero Section */
        .hero {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            padding: 100px 40px;
            height: 500px;
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('assets/images/barbershop-bg.jpg');
            background-size: cover;
            background-position: center;
            color: white;
        }

        .hero-content {
            max-width: 600px;
        }

        .hero h2 {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .hero p {
            font-size: 16px;
            margin-bottom: 15px;
        }

        .hero button {
            background-color: #B08D57;
            color: white;
            font-size: 16px;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background 0.3s ease;
            font-family: 'Playfair Display', serif;
        }

        .hero button:hover {
            background-color: #8F6D3B;
        }

        /* Sections Styling */
        .section {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 50px 80px;
        }

        .section-content {
            max-width: 500px;
        }

        .section-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 10px;
        }

        .section-hover:hover {
            transform: scale(1.02);
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.2);
        }

        .section img {
            width: 340px;
            border-radius: 10px;
        }

        .section button {
            background-color: #B08D57;
            color: white;
            font-size: 16px;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background 0.3s ease;
            font-family: 'Playfair Display', serif;
        }

        .section button:hover {
            background-color: #8F6D3B;
        }

        /* Reviews Section */
        .reviews {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
            text-align: center;
        }

        .reviews h2 {
            font-family: 'Playfair Display', serif;
            margin-bottom: 20px;
        }

        .reviews-container {
            display: flex;
            overflow-x: auto;
            gap: 20px;
            padding: 10px;
        }

        .review-card {
            background:rgb(221, 221, 221);
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            min-width: 300px;
            flex: 0 0 auto;
        }

        .review-card p {
            font-size: 14px;
            color: #444;
        }

        .review-card .rating {
            color: #B08D57;
            font-weight: bold;
            margin-top: 8px;
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

    <!-- Header -->
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

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h2>Experience Premium Grooming</h2>
            <p>Book an appointment with our professional barbers and get the best cut.</p>
            <a href="appointment.php"><button>Book Now</button></a>
        </div>
    </section>

    <!-- Services Section -->
    <section class="section section-hover" style="background-color: #E8E6E3;">
        <div class="section-content">
            <h2>Our Services</h2>
            <p>Get a sharp, polished look with our expert haircuts, beard trims, scalp massages, and premium hair coloring. Experience top-notch grooming tailored to your style.</p>
            <a href="services.php"><button>View All</button></a>
        </div>
        <img src="assets/images/service.jpeg" alt="Services Image">
    </section>

    <!-- Products Section -->
    <section class="section section-hover">
        <img src="assets/images/products.jpg" alt="Products Image">
        <div class="section-content">
            <h2>Our Products</h2>
            <p>Keep your style fresh with our premium pomades, shampoos, beard oils, and barber-grade tools. Quality products trusted by professionals and customers alike.</p>
            <a href="products.php"><button>View All</button></a>
        </div>
    </section>

    <!-- Reviews Section -->
    <section class="reviews">
        <h2>What Our Customers Say</h2>
        <div class="reviews-container">
            <?php
            $query = "SELECT users.name, reviews.rating, reviews.comment FROM reviews 
                      JOIN users ON reviews.user_id = users.id LIMIT 6";
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()): ?>
                <div class="review-card">
                    <p><strong><?php echo htmlspecialchars($row['name']); ?></strong></p>
                    <p>"<?php echo htmlspecialchars($row['comment']); ?>"</p>
                    <p class="rating">Rating: <?php echo $row['rating']; ?>/5</p>
                </div>
            <?php endwhile; ?>
        </div>
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
