<?php
session_start(); // Memulai session

// Cek apakah form registrasi disubmit
if (isset($_POST['register'])) {
    include '../../config/database.php'; // Koneksi ke database

    // Ambil data yang diinput
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $role = 'admin'; // Set role default untuk admin

    // Hash password untuk keamanan
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Cek apakah email sudah terdaftar
    $query = "SELECT * FROM admin WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $error_message = "Email sudah terdaftar!";
    } else {
        // Jika email belum terdaftar, simpan data admin ke database
        $query = "INSERT INTO admin (email, password, role) VALUES ('$email', '$hashed_password', '$role')";
        if (mysqli_query($conn, $query)) {
            // Jika berhasil, redirect ke halaman login
            header("Location: loginadmin.php");
            exit();
        } else {
            $error_message = "Terjadi kesalahan, coba lagi.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Admin</title>
    <!-- Link ke Bootstrap CSS untuk tampilan lebih baik -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color:rgb(53, 138, 223);
            font-family: 'Arial', sans-serif;
        }
        .container {
            max-width: 500px;
            margin-top: 100px;
        }
        .card {
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .btn-custom {
            background-color: #6f42c1;
            color: white;
            border-radius: 4px;
        }
        .btn-custom:hover {
            background-color: #5a34b5;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="card">
            <h2 class="text-center mb-4">Registrasi Admin</h2>
            
            <!-- Form Registrasi -->
            <form method="POST" action="registeradmin.php">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" required placeholder="Masukkan email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" required placeholder="Masukkan password">
                </div>
                <button type="submit" name="register" class="btn btn-custom w-100">Register</button>
            </form>

            <!-- Menampilkan pesan error jika ada -->
            <?php if(isset($error_message)) { ?>
                <div class="alert alert-danger mt-3" role="alert">
                    <?php echo $error_message; ?>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- Script Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
