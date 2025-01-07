<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-custom {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
        }

        .navbar-custom .navbar-brand, 
        .navbar-custom .nav-link {
            color:rgb(20, 20, 20);
        }

        .navbar-custom .nav-link {
            padding: 12px 18px;
            border: 2px solid transparent; /* Border transparan untuk tidak tampak pada awal */
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .navbar-custom .nav-link:hover {
            color: #ffffff;
            background-color: #ff7eb3; /* Menambahkan background saat hover */
            border-color: #ffffff; /* Warna border saat hover */
        }

        .navbar-custom .nav-link:focus {
            outline: none;
        }

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container">
        <a class="navbar-brand" href="#">Wedding Organizer</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="paket.php">Package</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="galeri.php">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kontak.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
