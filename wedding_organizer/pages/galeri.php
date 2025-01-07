<?php
include '../config/database.php';

// Ambil data galeri
$query = "SELECT * FROM gallery";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Wedding</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #ff9a9e, #fad0c4);
            font-family: Arial, sans-serif;
        }
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        .card img {
            width: 100%;
            height: 200px; /* Set fixed height for the image */
            object-fit: cover; /* Maintain aspect ratio while covering the area */
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }
        .card-body {
            padding: 15px;
            flex-grow: 1; /* Make sure the body takes up remaining space */
        }
        .card-title {
            color: #333333;
            font-weight: bold;
            text-align: center;
        }
        .card-text {
            font-size: 0.9rem;
            color: #555;
            text-align: center;
        }
        .btn-primary {
            border-radius: 50px;
            background: linear-gradient(135deg, #ff758c, #ff7eb3);
            border: none;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #ff7eb3, #ff758c);
        }
        h2 {
            color: #333333;
        }
        .container {
            background: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <?php include '../includes/navbar.php'; ?>

    <!-- Galeri Konten -->
    <div class="container">
        <h2 class="text-center mb-5">Galeri Wedding Organizer</h2>
        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <!-- Gambar yang bisa diklik untuk membuka modal -->
                        <img src="../uploads/galeri/<?php echo $row['image']; ?>" class="card-img-top" alt="Image" data-bs-toggle="modal" data-bs-target="#imageModal<?php echo $row['id']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($row['title']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($row['description']); ?></p>
                        </div>
                    </div>
                </div>

                <!-- Modal untuk gambar -->
                <div class="modal fade" id="imageModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="imageModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="imageModalLabel<?php echo $row['id']; ?>">Gambar Galeri</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="../uploads/galeri/<?php echo $row['image']; ?>" class="img-fluid" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
