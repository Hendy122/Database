<?php
include '../config/database.php';
session_start();

// Ambil order_id dari URL
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    // Ambil informasi pembayaran terkait order_id
    $query = "SELECT * FROM payments WHERE order_id = $order_id AND payment_status = 'Pending'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $payment = mysqli_fetch_assoc($result);
    } else {
        echo "Pembayaran tidak ditemukan.";
        exit;
    }

    // Proses pembayaran jika form dikirim
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $payment_method = $_POST['payment_method'];
        $payment_status = 'Paid'; // Ubah status menjadi "Paid"
        
        // Update status pembayaran di database
        $payment_query = "UPDATE payments SET payment_method = '$payment_method', payment_status = '$payment_status' WHERE order_id = $order_id";
        if (mysqli_query($conn, $payment_query)) {
            echo "<script>alert('Pembayaran berhasil! Terima kasih.'); window.location.href = 'home.php';</script>";
        } else {
            echo "Gagal memproses pembayaran.";
        }
    }
} else {
    echo "ID Pesanan tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran - Wedding Organizer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background: linear-gradient(135deg, #ff9a9e, #fad0c4);
            font-family: Arial, sans-serif;
            color: #333333;
        }
        .container {
            background: rgba(255, 255, 255, 0.9);
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
        .btn-secondary {
            background: #ff758c;
            color: white;
            border-radius: 50px;
            text-decoration: none;
        }
        .btn-secondary:hover {
            background: #ff7eb3;
        }
        h2 {
            color: #333333;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Pembayaran Paket Wedding</h2>
        <div class="card">
            <div class="card-header">
                Pembayaran untuk Pesanan ID: <?php echo $order_id; ?>
            </div>
            <div class="card-body">
                <p class="text-center">Terima kasih telah memilih paket wedding kami. Silakan pilih metode pembayaran Anda.</p>
                
                <!-- Form Pembayaran -->
                <form action="payment.php?order_id=<?php echo $order_id; ?>" method="POST">
                    <div class="mb-3">
                        <label for="payment_method" class="form-label">Metode Pembayaran</label>
                        <select class="form-control" id="payment_method" name="payment_method" required>
                            <option value="Bank Transfer">Bank Transfer</option>
                            <option value="Credit Card">Credit Card</option>
                            <option value="Cash on Delivery">Cash on Delivery</option>
                        </select>
                    </div>
                    
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary">Bayar Sekarang</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
