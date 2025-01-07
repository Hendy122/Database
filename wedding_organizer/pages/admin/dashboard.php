<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

// Koneksi database
include '../../config/database.php';

// Query untuk menghitung jumlah data
$total_paket = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM packages"))['total'];
$total_galeri = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM gallery"))['total'];
$total_users = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM users"))['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Wedding Organizer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background: url('../../uploads/galeri/bgwo.jpg') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            margin: 0;
            font-family: 'Arial', sans-serif;
            color: #fff;
        }
        .container {
            background: rgba(255, 255, 255, 0.9); /* Semi-transparent background */
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px); /* Blur effect */
        }
        h2 {
            color: #333;
            font-weight: bold;
            margin-bottom: 30px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.2);
        }
        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
            color: #444444;
        }
        .card-text {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333333;
        }
        .paket-card {
            background: linear-gradient(135deg, #a18cd1, #fbc2eb);
            color: white;
        }
        .galeri-card {
            background: linear-gradient(135deg, #ff9a9e, #fecfef);
            color: white;
        }
        .users-card {
            background: linear-gradient(135deg, #84fab0, #8fd3f4);
            color: white;
        }
        .card i {
            font-size: 3rem;
            margin-bottom: 15px;
        }
        .navbar {
            background: rgba(255, 255, 255, 0.7); /* Semi-transparent navbar */
            color: #333;
            position: absolute;
            top: 0;
            width: 100%;
            z-index: 10;
        }
        .navbar a {
            color: #333;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
<?php include '../../includes/navbaradmin.php'; ?>

<div class="container mt-5">
    <h2 class="text-center">Dashboard Admin</h2>
    <div class="row">
        <!-- Total Paket -->
        <div class="col-md-4 mb-4">
            <div class="card paket-card text-center p-4">
                <i class="fas fa-box"></i>
                <h5 class="card-title">Total Paket</h5>
                <p class="card-text"><?php echo $total_paket; ?></p>
            </div>
        </div>
        <!-- Total Galeri -->
        <div class="col-md-4 mb-4">
            <div class="card galeri-card text-center p-4">
                <i class="fas fa-images"></i>
                <h5 class="card-title">Total Galeri</h5>
                <p class="card-text"><?php echo $total_galeri; ?></p>
            </div>
        </div>
        <!-- Total Users -->
        <div class="col-md-4 mb-4">
            <div class="card users-card text-center p-4">
                <i class="fas fa-users"></i>
                <h5 class="card-title">Total Users</h5>
                <p class="card-text"><?php echo $total_users; ?></p>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
