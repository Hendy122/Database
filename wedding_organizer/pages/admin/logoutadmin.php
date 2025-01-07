<?php
session_start(); // Memulai session

// Menghancurkan semua session yang ada
session_unset(); // Menghapus semua session variables
session_destroy(); // Menghancurkan session

// Mengarahkan admin kembali ke halaman login
header("Location: ../../pages/admin/login.php");
exit();
?>
