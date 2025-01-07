<?php
include '../../config/database.php';
session_start();

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Hapus gambar dari folder
    $query = "SELECT image FROM packages WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        $image_path = "../../uploads/galeri/" . $row['image'];
        if (file_exists($image_path)) {
            unlink($image_path);
        }
    }

    // Hapus data dari database
    $query = "DELETE FROM packages WHERE id = $id";
    mysqli_query($conn, $query);

    header("Location: paket_manage.php");
    exit();
}
?>
