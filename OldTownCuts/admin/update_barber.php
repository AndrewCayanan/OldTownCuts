<?php
session_start();
include '../config/config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: manage_barbers.php");
    exit();
}

$barber_id = $_GET['id'];

$query = "SELECT * FROM barbers WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $barber_id);
$stmt->execute();
$result = $stmt->get_result();
$barber = $result->fetch_assoc();

if (!$barber) {
    header("Location: manage_barbers.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $specialty = trim($_POST['specialty']);

    if (!empty($name) && !empty($specialty)) {
        $update_stmt = $conn->prepare("UPDATE barbers SET name = ?, specialty = ? WHERE id = ?");
        $update_stmt->bind_param("ssi", $name, $specialty, $barber_id);

        if ($update_stmt->execute()) {
            header("Location: manage_barbers.php?success=Barber updated successfully!");
            exit();
        } else {
            $error = "Failed to update barber.";
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
    <title>Update Barber | Old Town Cuts</title>
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
        footer {
            text-align: center;
            padding: 15px;
            background: #2C2C2C;
            color: white;
            margin-top: 50px;
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
        <h2>Update Barber</h2>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="update_barber.php?id=<?php echo $barber_id; ?>" method="POST">
            <label for="name">Barber Name:</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($barber['name']); ?>" required>

            <label for="specialty">Specialty:</label>
            <input type="text" name="specialty" value="<?php echo htmlspecialchars($barber['specialty']); ?>" required>

            <button type="submit">Update Barber</button>
        </form>
    </section>

    <footer>
        <p>&copy; 2025 Old Town Cuts. All rights reserved.</p>
    </footer>
</body>
</html>
