<?php
include '../config/database.php';
session_start();

// Cek apakah package_id ada di URL
if (isset($_GET['package_id'])) {
    $package_id = $_GET['package_id'];
    
    // Ambil data paket berdasarkan package_id
    $query = "SELECT * FROM packages WHERE id = $package_id";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        $package = mysqli_fetch_assoc($result);
    } else {
        echo "Paket tidak ditemukan.";
        exit;
    }
} else {
    echo "Package ID tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan - Wedding Organizer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background: linear-gradient(135deg, #ff9a9e, #fad0c4);
            font-family: Arial, sans-serif;
            color: #333333;
        }
        .container {
            background: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            margin-top: 50px;
        }
        .card-header {
            background-color: #ff758c;
            color: white;
            text-align: center;
            font-size: 1.5rem;
            border-radius: 12px 12px 0 0;
        }
        .card-body {
            background-color: #fff;
        }
        .btn-primary {
            background: linear-gradient(135deg, #ff758c, #ff7eb3);
            border: none;
            border-radius: 50px;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #ff7eb3, #ff758c);
        }
        h2 {
            color: #333333;
            margin-bottom: 30px;
        }
        .img-thumbnail {
            border-radius: 12px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <?php include '../includes/navbar.php'; ?>

    <div class="container">
        <h2 class="text-center">Form Pemesanan Paket Wedding</h2>
        <div class="card">
            <div class="card-header">
                Paket Wedding: <?php echo htmlspecialchars($package['name']); ?>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <img src="../uploads/galeri/<?php echo $package['image']; ?>" class="img-fluid img-thumbnail" alt="Paket Image">
                    <p><strong>Harga: Rp <?php echo number_format($package['price'], 2, ',', '.'); ?></strong></p>
                    <p><?php echo htmlspecialchars($package['description']); ?></p>
                </div>
                <form action="submit_order.php" method="POST">
                    <input type="hidden" name="package_id" value="<?php echo $package['id']; ?>">
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">No. Telepon</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>

                    <div class="mb-3">
                        <label for="event_date" class="form-label">Tanggal Acara</label>
                        <input type="date" class="form-control" id="event_date" name="event_date" required>
                    </div>

                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary">Kirim Pesanan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
