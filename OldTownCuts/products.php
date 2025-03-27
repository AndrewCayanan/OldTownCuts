<?php
session_start();
include 'config/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Products | Old Town Cuts</title>
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

        /* Products Section */
        .products-container {
            max-width: 1200px;
            margin: 100px auto;
            margin-bottom: 0;
            padding: 20px;
            text-align: center;
        }

        .products-title {
            font-size: 32px;
            font-family: 'Playfair Display', serif;
            margin-bottom: 30px;
        }

        .products-list {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            justify-items: center;
        }

        .product-item {
            background: #E8E6E3;
            padding: 10px;
            /* border-radius: 8px; */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            width: 90%;
            max-width: 320px;
        }

        .product-item img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            /* border-radius: 8px; */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product-item:hover {
            transform: scale(1.05);
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        }

        .product-name {
            font-size: 16px;
            font-weight: bold;
            margin-top: 5px;
        }

        .product-price {
            font-size: 14px;
            font-weight: bold;
            color: #B08D57;
            margin-top: 3px;
        }

        /* Products Table */
        .products-table {
            max-width: 900px;
            margin: 50px auto;
            margin-top: 15px;
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

    <section class="products-container">
        <h2 class="products-title">Our Products</h2>
        <div class="products-list">
            <?php
            $products = [
                ["Water Based Pomade", "water_based_pomade.png", "₱250.00"],
                ["Oil Based Pomade", "oil_based_pomade.jpg", "₱220.00"],
                ["Hair Shampoo", "hair_shampoo.jpeg", "₱180.00"],
                ["Hair Powder", "hair_powder.jpeg", "₱150.00"],
                ["Beard Shampoo", "beard_shampoo.jpeg", "₱200.00"],
                ["Beard Oil", "beard_oil.jpeg", "₱230.00"],
                ["Clippers", "clippers.jpeg", "₱590.00"],
                ["Razor", "razor.jpeg", "₱1200.00"],
                ["Barber's Scissors", "barber_scissors.jpeg", "₱600.00"]
            ];

            foreach ($products as $product): ?>
                <div class="product-item">
                    <img src="assets/images/<?php echo $product[1]; ?>" alt="<?php echo $product[0]; ?>">
                    <h3 class="product-name"><?php echo $product[0]; ?></h3>
                    <p class="product-price"><?php echo $product[2]; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="products-table">
        <h2 class="products-title">Full Product List</h2>
        <table>
            <tr>
                <th>Product Name</th>
                <th>Description</th>
                <th>Price</th>
            </tr>
            <?php
            $query = "SELECT name, description, price FROM products";
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()):
            ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
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
