<?php
// Konfigurasi koneksi database
$host = "localhost";       // Host database (default: localhost)
$username = "root";        // Username MySQL Anda
$password = "";            // Password MySQL Anda (kosong jika default)
$database = "wedding_organizer";  // Nama database

// Membuat koneksi
$conn = mysqli_connect($host, $username, $password, $database);

// Cek koneksi
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
