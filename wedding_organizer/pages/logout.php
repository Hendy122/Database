<?php
session_start();  // Mulai sesi

// Hapus semua session yang ada
session_unset();

// Hapus sesi pengguna
session_destroy();

// Arahkan pengguna kembali ke halaman login setelah logout
header("Location: login.php");
exit();
?>
