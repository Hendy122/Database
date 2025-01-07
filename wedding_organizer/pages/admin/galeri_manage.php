<?php
include '../../config/database.php';
session_start();

// Tambah Galeri
if (isset($_POST['add_gallery'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    // Upload Gambar
    $image = $_FILES['image']['name'];
    $target = "../../uploads/galeri/" . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);

    $query = "INSERT INTO gallery (title, description, image) VALUES ('$title', '$description', '$image')";
    mysqli_query($conn, $query);
    header("Location: galeri_manage.php");
}

// Edit Galeri
if (isset($_POST['edit_gallery'])) {
    $id = $_POST['id'];
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    // Update Gambar jika ada yang baru
    if ($_FILES['image']['name']) {
        $image = $_FILES['image']['name'];
        $target = "../../uploads/galeri/" . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        $query = "UPDATE gallery SET title='$title', description='$description', image='$image' WHERE id=$id";
    } else {
        $query = "UPDATE gallery SET title='$title', description='$description' WHERE id=$id";
    }

    mysqli_query($conn, $query);
    header("Location: galeri_manage.php");
}

// Hapus Galeri
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM gallery WHERE id = $id");
    header("Location: galeri_manage.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Galeri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #ff7eb3, #ff758c);
            font-family: Arial, sans-serif;
            color: #333;
        }
        .container {
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            margin-top: 50px;
        }
        h2, h4 {
            color: #ff7e5f;
        }
        .table img {
            border-radius: 8px;
        }
        .btn-primary {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            border: none;
        }
    </style>
</head>
<body>
    <?php include '../../includes/navbaradmin.php'; ?>
<div class="container">
    <h2>Kelola Galeri</h2>

    <!-- Tombol Tambah Galeri -->
    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addGalleryModal">
        Tambah Galeri
    </button>

    <!-- Modal Tambah Galeri -->
    <div class="modal fade" id="addGalleryModal" tabindex="-1" aria-labelledby="addGalleryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addGalleryModalLabel">Tambah Galeri</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label>Judul Foto:</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Deskripsi:</label>
                            <textarea name="description" class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Gambar:</label>
                            <input type="file" name="image" class="form-control-file" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="add_gallery" class="btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Tabel Galeri -->
    <h4>Daftar Galeri</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM gallery";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td><?php echo htmlspecialchars($row['description']); ?></td>
                    <td><img src="../../uploads/galeri/<?php echo $row['image']; ?>" width="100"></td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editGalleryModal<?php echo $row['id']; ?>">
                            Edit
                        </button>
                        <a href="galeri_manage.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                    </td>
                </tr>

                <!-- Modal Edit Galeri -->
                <div class="modal fade" id="editGalleryModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="editGalleryModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editGalleryModalLabel<?php echo $row['id']; ?>">Edit Galeri</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <div class="form-group mb-3">
                                        <label>Judul Foto:</label>
                                        <input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($row['title']); ?>" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Deskripsi:</label>
                                        <textarea name="description" class="form-control" rows="3" required><?php echo htmlspecialchars($row['description']); ?></textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Gambar Baru (Kosongkan jika tidak ingin mengubah):</label>
                                        <input type="file" name="image" class="form-control-file">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" name="edit_gallery" class="btn btn-success">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
