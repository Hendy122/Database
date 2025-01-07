<?php
// Menampilkan pesan error jika ada
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Mulai sesi
session_start();

// Include koneksi database
include '../../config/database.php';

// Jika form telah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pastikan data email dan password ada dalam POST
    if (isset($_POST['email']) && isset($_POST['password'])) {
        // Ambil data email dan password dari form dan amankan dari SQL Injection
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        // Query untuk mencari admin berdasarkan email
        $query = "SELECT * FROM admin WHERE email = '$email'";
        $result = mysqli_query($conn, $query);

        // Jika query gagal
        if (!$result) {
            die('Query Error: ' . mysqli_error($conn));
        }

        // Cek apakah ada admin dengan email tersebut
        if (mysqli_num_rows($result) > 0) {
            // Ambil data admin
            $admin = mysqli_fetch_assoc($result);

            // Verifikasi password
            if (password_verify($password, $admin['password'])) {
                // Jika login berhasil, simpan session dan redirect ke halaman dashboard admin
                $_SESSION['admin_id'] = $admin['id'];
                $_SESSION['role'] = $admin['role'];

                // Arahkan ke halaman dashboard admin
                header("Location: dashboard.php");
                exit();
            } else {
                // Password salah
                $error_message = "Password yang Anda masukkan salah.";
            }
        } else {
            // Email tidak ditemukan
            $error_message = "Email tidak ditemukan!";
        }
    } else {
        // Jika email atau password tidak ada
        $error_message = "Harap masukkan email dan password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Wedding Organizer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
            max-width: 400px;
            margin-top: 100px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            padding: 10px;
        }

        .btn-login {
            width: 100%;
            background-color: #6a11cb;
            border: none;
            padding: 10px;
            color: white;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-login:hover {
            background-color: #2575fc;
        }

        .error-message {
            color: red;
            text-align: center;
        }

        .navbar {
            background: rgba(255, 255, 255, 0.7);
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
    <div class="navbar">
        <div class="container">
            <a href="../../index.php">Home</a>
        </div>
    </div>

    <div class="container">
        <h2>Login Admin</h2>

        <?php
        // Menampilkan pesan error jika ada
        if (isset($error_message)) {
            echo "<p class='error-message'>$error_message</p>";
        }
        ?>

        <form method="POST" action="loginadmin.php">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
            </div>

            <button type="submit" class="btn-login">Login</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
