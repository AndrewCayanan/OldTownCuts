<?php
session_start();
include '../config/config.php';
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit();
}

// Fetch appointments from the database
$query = "SELECT appointments.id, users.name AS customer_name, barbers.name AS barber_name, appointment_date, appointment_time, status 
          FROM appointments 
          JOIN users ON appointments.user_id = users.id 
          JOIN barbers ON appointments.barber_id = barbers.id";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Appointments | Old Town Cuts</title>
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

        /* Appointment Management */
        .container {
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

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            margin-top: 15px;
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #B08D57;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .actions a {
            text-decoration: none;
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        .update {
            background-color: #4CAF50;
            color: white;
        }

        .update:hover {
            background-color: #3E8E41;
        }

        .delete {
            background-color: #D9534F;
            color: white;
        }

        .delete:hover {
            background-color: #C9302C;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 15px;
            background: #2C2C2C;
            color: white;
            margin-top: 134px;
        }

        .social-links {
            margin-top: 10px;
        }

        .social-links img {
            width: 40px;
            margin: 0 8px;
        }

        /* Responsive */
        @media screen and (max-width: 768px) {
            .container {
                width: 90%;
            }

            table {
                font-size: 14px;
            }

            .actions a {
                font-size: 12px;
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

    <section class="container">
        <h2>Manage Appointments</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Barber</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['customer_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['barber_name']); ?></td>
                    <td><?php echo $row['appointment_date']; ?></td>
                    <td><?php echo $row['appointment_time']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td class="actions">
                        <a href="update_appointment.php?id=<?php echo $row['id']; ?>" class="update">Update</a>
                        <a href="delete_appointment.php?id=<?php echo $row['id']; ?>" class="delete" onclick="return confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </section>

    <footer>
        <p>&copy; 2025 Old Town Cuts. All rights reserved.</p>
        <div class="social-links">
            <a href="https://www.facebook.com/andrew.cayanan.1" target="_blank"><img src="../assets/images/facebook.jpg" alt="Facebook"></a>
            <a href="https://www.instagram.com/mickodedios?igsh=dnp1OTRtdWpxZ3Z4&utm_source=qr" target="_blank"><img src="../assets/images/instagram.jpg" alt="Instagram"></a>
            <a href="https://www.linkedin.com/in/david-tulio-126916316/" target="_blank"><img src="../assets/images/linkedin.jpg" alt="LinkedIn"></a>
        </div>
    </footer>
</body>
</html>
