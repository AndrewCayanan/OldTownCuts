<?php
session_start();
include 'config/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Old Town Cuts</title>
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

        /* Background Image */
        .contact-wrapper {
            background: url('assets/images/barbershop-bg.jpg') no-repeat center center/cover;
            position: relative;
            padding: 30px 0;
        }

        .contact-wrapper::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(2px);
        }

        /* Header and Navigation */
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

        .menu-icon {
            display: none;
            font-size: 24px;
            cursor: pointer;
            color: white;
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

        /* Contact Section */
        .contact-section {
            position: relative;
            max-width: 600px;
            margin: 120px auto 40px;
            background: #E8E6E3;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            z-index: 10;
        }

        .contact-section h2 {
            font-family: 'Playfair Display', serif;
        }

        .contact-info p {
            font-size: 16px;
            margin: 5px 0;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
            text-align: left;
        }

        input, textarea {
            width: 95%;
            padding: 12px;
            margin-top: 5px;
            border: 1px solid #B08D57;
            border-radius: 5px;
            font-size: 16px;
            font-family: 'Poppins', sans-serif;
        }

        textarea {
            resize: vertical;
            height: 120px;
        }

        button {
            width: 100%;
            margin-top: 15px;
            padding: 12px;
            background-color: #B08D57;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            transition: 0.3s;
            border-radius: 5px;
        }

        button:hover {
            background-color: #A07C49;
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
        
        /* Responsive Design */
        @media screen and (max-width: 768px) {
            .menu-icon {
                display: block;
                margin-right: 50px;
            }
            nav {
                display: none;
            }
            .contact-section {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <header>
        <img src="assets/images/logos.png" alt="Old Town Cuts" class="logo">
        <div class="menu-icon" onclick="toggleMenu()">☰</div>
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

    <div class="contact-wrapper">
        <section class="contact-section">
            <h2>Contact Us</h2>
            <p>Have questions? Reach out to us!</p>

            <div class="contact-info">
                <p><strong>Phone:</strong> (123) 456-7890</p>
                <p><strong>Email:</strong> info@oldtowncuts.com</p>
                <p><strong>Address:</strong> 123 Main Street, Old Town</p>
            </div>

            <form action="customer/send_message.php" method="POST">
                <label for="name">Your Name:</label>
                <input type="text" name="name" required>
                
                <label for="email">Your Email:</label>
                <input type="email" name="email" required>
                
                <label for="message">Message:</label>
                <textarea name="message" required></textarea>
                
                <button type="submit">Send Message</button>
            </form>
        </section>
    </div>

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
        function toggleMenu() {
            var menu = document.getElementById("mobile-menu");
            menu.style.display = (menu.style.display === "flex") ? "none" : "flex";
        }
    </script>
</body>
</html>
