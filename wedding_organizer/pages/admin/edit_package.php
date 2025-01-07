<?php
include '../../config/database.php';
session_start();

// Fetch data paket berdasarkan ID
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $query = "SELECT * FROM packages WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $package = mysqli_fetch_assoc($result);

    if (!$package) {
        header("Location: paket_manage.php");
        exit();
    }
}

// Update data paket
if (isset($_POST['update_package'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = $_POST['price'];

    $image = $package['image'];
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $target = "../../uploads/galeri/" . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);

        // Hapus gambar lama jika ada
        $old_image_path = "../../uploads/galeri/" . $package['image'];
        if (file_exists($old_image_path)) {
            unlink($old_image_path);
        }
    }

    $query = "UPDATE packages SET name = '$name', description = '$description', price = '$price', image = '$image' WHERE id = $id";
    mysqli_query($conn, $query);

    header("Location: paket_manage.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Paket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            background:rgb(117, 99, 99);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .form-title {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="form-container">
        <h2 class="form-title">Edit Paket</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Nama Paket</label>
                <input type="text" name="name" id="name" class="form-control" value="<?php echo htmlspecialchars($package['name']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea name="description" id="description" class="form-control" rows="4" required><?php echo htmlspecialchars($package['description']); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Harga</label>
                <input type="number" name="price" id="price" class="form-control" value="<?php echo $package['price']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Gambar Paket</label>
                <input type="file" name="image" id="image" class="form-control">
                <?php if (!empty($package['image'])): ?>
                    <div class="mt-2">
                        <img src="../../uploads/galeri/<?php echo $package['image']; ?>" width="100" alt="Gambar Paket">
                    </div>
                <?php endif; ?>
            </div>
            <button type="submit" name="update_package" class="btn btn-success w-100">Update Paket</button>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
