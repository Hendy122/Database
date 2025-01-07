<?php
include '../../config/database.php';
session_start();

// Tambah paket
if (isset($_POST['add_package'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = $_POST['price'];

    // Upload gambar
    $image = $_FILES['image']['name'];
    $target = "../../uploads/galeri/" . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);

    $query = "INSERT INTO packages (name, description, price, image) VALUES ('$name', '$description', '$price', '$image')";
    mysqli_query($conn, $query);
    header("Location: paket_manage.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Paket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background: linear-gradient(135deg, #ff7eb3, #ff758c);
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }
        .form-control, .form-control-file {
            border-radius: 8px;
        }
        .btn-success {
            background: linear-gradient(135deg, #28a745, #218838);
            border: none;
            border-radius: 50px;
            padding: 10px 20px;
        }
        .btn-success:hover {
            background: linear-gradient(135deg, #218838, #28a745);
        }
        .table-bordered th, .table-bordered td {
            vertical-align: middle;
        }
        h2, h4 {
            color: #333333;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php include '../../includes/navbaradmin.php'; ?>
<div class="container mt-5">
    <h2>Kelola Paket</h2>

    <!-- Tombol untuk membuka modal -->
    <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addPackageModal">Tambah Paket</button>

    <!-- Modal Tambah Paket -->
    <div class="modal fade" id="addPackageModal" tabindex="-1" aria-labelledby="addPackageModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPackageModalLabel">Tambah Paket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            <label>Nama Paket:</label>
                            <input type="text" name="name" class="form-control" placeholder="Masukkan nama paket" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Deskripsi:</label>
                            <textarea name="description" class="form-control" rows="3" placeholder="Masukkan deskripsi paket" required></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Harga:</label>
                            <input type="number" name="price" class="form-control" placeholder="Masukkan harga" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Gambar Paket:</label>
                            <input type="file" name="image" class="form-control-file" required>
                        </div>
                        <button type="submit" name="add_package" class="btn btn-success w-100">Tambah Paket</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Daftar Paket -->
    <h4>Daftar Paket</h4>
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nama Paket</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM packages";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['description']); ?></td>
                    <td>Rp <?php echo number_format($row['price'], 2, ',', '.'); ?></td>
                    <td><img src="../../uploads/galeri/<?php echo $row['image']; ?>" width="100" alt="Gambar Paket"></td>
                    <td>
                        <a href="edit_package.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="delete_package.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
