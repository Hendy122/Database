<?php
include '../config/database.php';
session_start();

// Pastikan data diterima dari form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $package_id = $_POST['package_id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $event_date = mysqli_real_escape_string($conn, $_POST['event_date']);

    // Query untuk memasukkan data pemesanan ke dalam database
    $query = "INSERT INTO orders (package_id, name, email, phone, event_date) VALUES ('$package_id', '$name', '$email', '$phone', '$event_date')";
    
    if (mysqli_query($conn, $query)) {
        // Pesanan berhasil disimpan, ambil order_id dan detail paket
        $order_id = mysqli_insert_id($conn); // Ambil ID pesanan yang baru saja dimasukkan

        // Query untuk mengambil detail paket berdasarkan package_id
        $package_query = "SELECT * FROM packages WHERE id = $package_id";
        $package_result = mysqli_query($conn, $package_query);
        if ($package_result) {
            $package = mysqli_fetch_assoc($package_result);
        } else {
            echo "Paket tidak ditemukan.";
            exit;
        }


        // Sekarang, masukkan data pembayaran ke tabel payments
        $payment_query = "INSERT INTO payments (order_id, payment_status) VALUES ('$order_id', 'Pending')";
        if (mysqli_query($conn, $payment_query)) {
            // Pembayaran berhasil ditambahkan
            echo "<script>alert('Pesanan berhasil. Silakan lanjutkan ke pembayaran.'); window.location.href = 'payment.php?order_id=$order_id';</script>";
        } else {
            echo "Gagal memproses pembayaran: " . mysqli_error($conn);
        }

    } else {
        // Jika gagal menyimpan data pesanan
        echo "Terjadi kesalahan saat memproses pesanan: " . mysqli_error($conn);
        exit;
    }
} else {
    echo "Akses tidak valid.";
    exit;
}
?>
