<?php
session_start();
include '../config/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Old Town Cuts</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* General Styles */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F0ECE2;
            color: #2C2C2C;
            margin: 0;
            padding: 0;
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

        /* Form Container */
        .register-container {
            max-width: 400px;
            background: #E8E6E3;
            padding: 25px;
            margin: 120px auto;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .register-container h2 {
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #CCC;
            border-radius: 5px;
            font-size: 14px;
        }

        input {
            width: 95%;
            padding: 10px;
            border: 1px solid #CCC;
            border-radius: 5px;
            font-size: 14px;
        }

        button {
            background-color: #B08D57;
            color: white;
            font-size: 14px;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            transition: background 0.3s ease;
            font-weight: bold;
            border-radius: 5px;
            margin-top: 15px;
        }

        button:hover {
            background-color: #8B6F47;
        }

        .login-link {
            display: block;
            margin-top: 15px;
            font-size: 14px;
            color: #B08D57;
            font-weight: bold;
            text-decoration: none;
        }

        .login-link:hover {
            color: #8B6F47;
        }

        /* Success Popup */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }

        .popup p {
            font-size: 16px;
            color: #2C2C2C;
            margin-bottom: 15px;
        }

        .popup button {
            background-color: #B08D57;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        .popup button:hover {
            background-color: #8B6F47;
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
            .register-container {
                width: 90%;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <header>
        <img src="../assets/images/logos.png" alt="Old Town Cuts" class="logo">
        <div class="menu-icon" onclick="toggleMenu()">☰</div>
        <nav>
            <a href="../index.php">Home</a>
            <a href="../barbers.php">Barbers</a>
            <a href="../appointment.php">Book Now</a>
            <a href="../products.php">Products</a>
            <a href="../contact.php">Contact</a>
        </nav>
    </header>

    <div class="register-container">
        <h2>Create an Account</h2>
        <form id="registerForm">
            <label for="name">Full Name:</label>
            <input type="text" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            
            <label for="role">Select Role:</label>
            <select name="role" required>
                <option value="customer">Customer</option>
                <option value="admin">Admin</option>
            </select>
            
            <button type="submit">Register</button>
        </form>

        <a href="login.php" class="login-link">Already have an account? Login here</a>
    </div>

    <!-- Success Notification -->
    <div id="successPopup" class="popup">
        <p>Registration completed successfully!</p>
        <button onclick="closePopup()">OK</button>
    </div>

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

    <script>
        $(document).ready(function() {
            $("#registerForm").submit(function(event) {
                event.preventDefault(); // Prevent form from submitting normally
                
                $.ajax({
                    url: "register_process.php",
                    type: "POST",
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.trim() === "success") {
                            $("#successPopup").fadeIn(); // Show success popup
                        } else {
                            alert(response); // Show error message if registration fails
                        }
                    }
                });
            });
        });

        function closePopup() {
            $("#successPopup").fadeOut(function() {
                window.location.href = "login.php"; // Redirect to login page after popup closes
            });
        }

        function toggleMenu() {
            var menu = document.getElementById("mobile-menu");
            menu.style.display = (menu.style.display === "flex") ? "none" : "flex";
        }
    </script>
</body>
</html>
