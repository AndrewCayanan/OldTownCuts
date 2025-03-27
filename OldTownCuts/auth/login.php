<?php
session_start();
include '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role']; // Get selected role
    
    $stmt = $conn->prepare("SELECT id, name, password FROM users WHERE email = ? AND role = ?");
    $stmt->bind_param("ss", $email, $role);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['role'] = $role;

            if ($role === 'admin') {
                header("Location: ../admin/admin_dashboard.php");
                exit();
            } else {
                header("Location: ../index.php");
                exit();
            }            
        } else {
            $error = "Invalid email or password.";
        }
    } else {
        $error = "Invalid email, password, or role.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Old Town Cuts</title>
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

        /* Fix for Cut-off Login/Logout Button */
        nav a:last-child {
            margin-right: 50px;
        }

        /* Login Form */
        .login-container {
            max-width: 400px;
            background: #E8E6E3;
            padding: 25px;
            margin: 120px auto;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .login-container h2 {
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
            width: 94%;
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

        .register-link {
            display: block;
            margin-top: 15px;
            font-size: 14px;
            color: #B08D57;
            font-weight: bold;
            text-decoration: none;
        }

        .register-link:hover {
            color: #8B6F47;
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
            .login-container {
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

    <div class="login-container">
        <h2>Login to Your Account</h2>
        <?php if (isset($error)): ?>
            <p style="color: red;"> <?php echo $error; ?> </p>
        <?php endif; ?>
        <form action="login.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            
            <label for="role">Login as:</label>
            <select name="role" required>
                <option value="customer">Customer</option>
                <option value="admin">Admin</option>
            </select>
            
            <a href="register.php" class="register-link">Don't have an account? Register here</a>
            
            <button type="submit">Login</button>
        </form>

       
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
        function toggleMenu() {
            var menu = document.getElementById("mobile-menu");
            menu.style.display = (menu.style.display === "flex") ? "none" : "flex";
        }
    </script>
</body>
</html>
