<?php
include 'config/database.php';

// Contoh query untuk memeriksa koneksi
$result = mysqli_query($conn, "SELECT * FROM users");

if ($result) {
    echo "Koneksi database berhasil!";
} else {
    echo "Query error: " . mysqli_error($conn);
}
?>
