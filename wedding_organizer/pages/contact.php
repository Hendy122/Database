<?php
// Inisialisasi variabel untuk pesan sukses atau error
$successMessage = "";
$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data dari form
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Cek jika ada data kosong
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Proses kirim pesan (misalnya ke email atau database)
        // Di sini kita hanya memberikan pesan sukses untuk contoh
        $successMessage = "Pesan Anda berhasil dikirim!";
    } else {
        $errorMessage = "Terjadi kesalahan, coba lagi.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Us</title>
    <!-- Link ke Bootstrap CSS untuk tampilan lebih baik -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <style>
      body {
        background-image: url('../uploads/galeri/bgwo.jpg');
        background-size: cover;
        background-position: center;
        font-family: 'Roboto', sans-serif;
        color: #fff;
        height: 100vh;
        margin: 0;
        padding: 0;
      }

      .container {
        background: rgba(255, 255, 255, 0.9);
        padding: 50px;
        border-radius: 15px;
        box-shadow: 0 15px 25px rgba(0, 0, 0, 0.3);
        backdrop-filter: blur(10px);
        max-width: 900px;
        margin: 0 auto;
      }

      .alert {
        display: none;
        transition: opacity 0.5s ease;
      }

      .alert.show {
        display: block;
      }

      h1, h2 {
        color: #6b705c;
        font-weight: 700;
        text-transform: uppercase;
      }

      p {
        color: #3d405b;
        line-height: 1.8;
        font-size: 1.1rem;
      }
    </style>
  </head>
  <body>
  <?php include '../includes/navbar.php'; ?>
    <div class="container mt-5">
      <h1 class="text-center mb-4">Wedding Organizer</h1>
      <div class="card">
        <h2 class="text-center mb-4">Hubungi Kami</h2>

        <!-- Form Kontak -->
        <form action="contact.php" method="POST">
          <div class="mb-3">
            <label for="name" class="form-label">Nama Anda</label>
            <input
              type="text"
              name="name"
              class="form-control"
              id="name"
              required
              placeholder="Masukkan nama Anda"
            />
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email Anda</label>
            <input
              type="email"
              name="email"
              class="form-control"
              id="email"
              required
              placeholder="Masukkan email Anda"
            />
          </div>
          <div class="mb-3">
            <label for="message" class="form-label">Pesan Anda</label>
            <textarea
              name="message"
              class="form-control"
              id="message"
              rows="5"
              required
              placeholder="Masukkan pesan Anda"
            ></textarea>
          </div>
          <button type="submit" class="btn btn-custom w-100">
            Kirim Pesan
          </button>
        </form>

        <!-- Menampilkan pesan sukses atau error -->
        <?php if ($successMessage): ?>
          <div class="alert alert-success mt-3 show" role="alert">
            <?php echo $successMessage; ?>
          </div>
        <?php endif; ?>

        <?php if ($errorMessage): ?>
          <div class="alert alert-danger mt-3 show" role="alert">
            <?php echo $errorMessage; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <!-- Script Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
