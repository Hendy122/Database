<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - Wedding Organizer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('../uploads/galeri/bgwo.jpg'); /* Ganti dengan path gambar yang diinginkan */
            background-size: cover; /* Membuat gambar latar belakang menutupi seluruh halaman */
            background-position: center; /* Menyusun gambar agar terpusat */
            font-family: 'Roboto', sans-serif;
            color: #fff;
            height: 100vh; /* Membuat background memenuhi layar */
            margin: 0;
            padding: 0;
        }

        .navbar-custom {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            border: 2px solid transparent; /* Border transparan pada navbar */
        }

        .navbar-custom .navbar-brand, 
        .navbar-custom .nav-link {
            color: rgb(20, 20, 20);
        }

        .navbar-custom .nav-link {
            padding: 12px 18px;
            border: 2px solid transparent; /* Border transparan pada tombol navigasi */
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

        .container {
            background: rgba(255, 255, 255, 0.9); /* Transparansi latar belakang container */
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px); /* Menambahkan efek blur pada latar belakang */
            max-width: 900px;
            margin: 0 auto;
        }

        h1, h2 {
            color: #6b705c;
            font-weight: 700;
            text-transform: uppercase;
        }

        p {
            color: #3d405b;
            line-height: 1.8;
            font-size: 1.1rem;
        }

        .vision-mission {
            background: linear-gradient(135deg, #f9f3df, #d6e0f0);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
            margin-bottom: 30px;
        }

        .contact {
            background: linear-gradient(135deg, #ff758c, #ff7eb3);
            color: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            margin-bottom: 30px;
        }

        .contact h3 {
            margin-bottom: 20px;
            font-size: 1.5rem;
        }

        .contact a {
            color: white;
            font-weight: bold;
            text-decoration: none;
            margin: 0 10px;
        }

        .contact a:hover {
            text-decoration: underline;
        }

        /* Hover effect pada section */
        .container section:hover {
            transform: scale(1.02);
            transition: all 0.3s ease-in-out;
        }

        /* Animasi pada judul */
        h1, h2 {
            animation: fadeInUp 1.5s ease-out;
        }

        /* Keyframe untuk animasi fadeInUp */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <?php include '../includes/navbar.php'; ?>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Wedding Organizer</h1>

        <!-- Tentang Kami -->
        <section class="mb-5">
            <h2>Tentang Kami</h2>
            <p>
                Kami adalah Wedding Organizer profesional yang berfokus pada mewujudkan hari spesial Anda menjadi pengalaman yang tak terlupakan. 
                Dengan pengalaman bertahun-tahun dalam industri ini, kami memahami pentingnya detail dan dedikasi dalam menciptakan pernikahan yang sempurna.
            </p>
        </section>

        <!-- Visi & Misi -->
        <section class="vision-mission mb-5">
            <h2>Visi & Misi</h2>
            <p><strong>Visi:</strong> Menjadi penyedia layanan Wedding Organizer terbaik yang dipercaya oleh pasangan di seluruh negeri.</p>
            <p><strong>Misi:</strong></p>
            <ul>
                <li>Menyediakan layanan berkualitas tinggi yang berpusat pada kebutuhan klien.</li>
                <li>Menghadirkan kreativitas dalam setiap konsep pernikahan yang kami tangani.</li>
                <li>Menjaga komitmen untuk membuat pernikahan menjadi momen yang berkesan seumur hidup.</li>
            </ul>
        </section>

        <!-- Kontak -->
        <section class="contact">
            <h3>Hubungi Kami</h3>
            <p>Alamat: Jl. Baros, Cimahi</p>
            <p>Email: <a href="mailto:info@weddingorganizer.com">info@weddingorganizer.com</a></p>
            <p>Telepon: <a href="tel:+628123456789">+62 812-3456-789</a></p>
            <p>Media Sosial: 
                <a href="#">Instagram</a> | 
                <a href="#">Facebook</a> | 
                <a href="#">Twitter</a>
            </p>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
