<?php
include '../config/database.php';
session_start();

// Ambil data paket dari database
$query = "SELECT * FROM packages";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Wedding Organizer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background: linear-gradient(135deg, #ff9a9e, #fad0c4);
            font-family: Arial, sans-serif;
        }
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            height: 100%;
        }
        .card img {
            width: 100%;
            height: 200px; /* Menetapkan tinggi gambar agar seragam */
            object-fit: cover; /* Menjaga aspek rasio gambar */
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            cursor: pointer;
        }
        .card-body {
            padding: 15px;
        }
        .card-title {
            color: #333333;
            font-weight: bold;
            text-align: center;
            margin-top: 10px;
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
        .modal-body img {
            width: 100%;
            border-radius: 12px;
        }
        .col-md-4 {
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>
    <?php include '../includes/navbar.php'; ?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Paket Wedding Organizer</h2>
    <div class="row">
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <!-- Gambar yang bisa diklik untuk membuka modal -->
                    <img src="../uploads/galeri/<?php echo $row['image']; ?>" class="card-img-top" alt="Paket Image" data-bs-toggle="modal" data-bs-target="#packageModal<?php echo $row['id']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($row['name']); ?></h5>
                    </div>
                </div>
            </div>

            <!-- Modal untuk detail paket wedding -->
            <div class="modal fade" id="packageModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="packageModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="packageModalLabel<?php echo $row['id']; ?>">Detail Paket Wedding: <?php echo htmlspecialchars($row['name']); ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img src="../uploads/galeri/<?php echo $row['image']; ?>" class="img-fluid" alt="Paket Image">
                            <p><?php echo htmlspecialchars($row['description']); ?></p>
                            <p><strong>Harga: Rp <?php echo number_format($row['price'], 2, ',', '.'); ?></strong></p>
                            <a href="order_form.php?package_id=<?php echo $row['id']; ?>" class="btn btn-primary w-100">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
