-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jan 2025 pada 00.20
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wedding_organizer`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `description`, `image`, `created_at`) VALUES
(7, 'Wedding di Pantai', 'Dengan pemandangan laut dan suasana romantis, banyak pasangan memilih pantai sebagai tempat pernikahan outdoor.', 'wopantai.jpg', '2024-12-31 22:01:24'),
(8, 'Wedding di Hotel', 'Untuk suasana yang lebih formal dan elegan, hotel dengan ballroom mewah adalah pilihan populer, lengkap dengan fasilitas yang mendukung.', 'wohotel.jpg', '2024-12-31 22:02:53'),
(9, 'Wedding di Puncak', 'Pernikahan di puncak bukit atau pegunungan memberikan pemandangan alam yang spektakuler dan kesan yang sangat romantis.', 'wogunung.jpg', '2024-12-31 22:03:57'),
(10, 'Wedding di Taman', 'Taman hijau atau kebun yang asri cocok untuk pernikahan dengan tema alami dan intim.', 'wotaman.png', '2024-12-31 22:04:44'),
(11, 'Wedding di Winery/Kebun Anggur', 'Lokasi ini memberikan nuansa romantis dan eksklusif dengan pemandangan kebun anggur yang indah.', 'wowinery.png', '2024-12-31 22:05:09'),
(12, 'Wedding di Kapal Pesiar', 'Pernikahan di kapal pesiar menawarkan pengalaman unik dengan pemandangan laut yang menakjubkan.', 'wopesiar.jpeg', '2024-12-31 22:05:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `event_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `package_id`, `name`, `email`, `phone`, `event_date`, `created_at`) VALUES
(1, 7, 'Hendy Juniawan', 'hendyjuniawan2018@gmail.com', '123456789', '2025-01-15', '2024-12-31 22:21:13'),
(2, 7, 'Fauzan', 'fauzan@gmail.com', '123456789', '2025-01-23', '2024-12-31 23:14:23'),
(3, 7, 'Fauzan', 'fauzan@gmail.com', '123456789', '2025-01-23', '2024-12-31 23:14:51'),
(4, 7, 'Fauzan', 'fauzan@gmail.com', '123456789', '2025-01-23', '2024-12-31 23:18:06'),
(5, 7, 'Fauzan', 'fauzan@gmail.com', '123456789', '2025-01-23', '2024-12-31 23:18:10'),
(6, 7, 'Fauzan', 'fauzan@gmail.com', '123456789', '2025-01-23', '2024-12-31 23:18:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `packages`
--

INSERT INTO `packages` (`id`, `name`, `description`, `price`, `image`, `created_at`) VALUES
(7, 'Paket Wedding di Puncak', 'Bagi pasangan yang menginginkan pemandangan spektakuler, pernikahan di puncak bukit atau pegunungan adalah pilihan yang tepat. Dikelilingi oleh alam yang menakjubkan, pernikahan ini memberikan pengalaman luar biasa dengan latar belakang panorama yang memukau. Nikmati udara segar dan pemandangan yang tak tertandingi dalam setiap momen penting hari Anda.', '1500000.00', 'wogunung.jpg', '2024-12-17 17:07:45'),
(8, 'Paket Wedding di Hotel', 'Untuk pasangan yang menginginkan pernikahan yang elegan dan mewah, ballroom hotel bintang lima adalah pilihan sempurna. Dengan fasilitas lengkap dan desain interior yang mewah, acara Anda akan berlangsung dengan penuh kemewahan. Nikmati layanan istimewa, dekorasi menawan, dan hidangan lezat yang disiapkan oleh koki berkelas. ', '1750000.00', 'wohotel.jpg', '2024-12-18 07:38:03'),
(9, 'Paket Wedding di Pantai', 'Nikmati keindahan alam dengan latar belakang laut biru yang mempesona. Suasana romantis di pantai memberikan momen tak terlupakan di hari spesial Anda. Dikelilingi pasir putih dan angin laut yang sejuk, pernikahan di pantai menciptakan kesan yang santai namun tetap mewah. Paket ini mencakup dekorasi tema pantai, dll.', '2000000.00', 'wopantai.jpg', '2024-12-31 21:52:57'),
(10, 'Paket Wedding di Taman', 'Sempurnakan hari istimewa Anda dengan pernikahan di taman hijau atau kebun yang asri. Dikelilingi oleh flora alami dan udara segar, pernikahan ini memberikan nuansa alami yang intim. Paket ini mencakup dekorasi bunga segar, lampu hias yang romantis, serta area khusus untuk upacara dan resepsi yang dirancang agar terasa personal dan hangat.', '1800000.00', 'wotaman.png', '2024-12-31 21:57:30'),
(11, 'Paket Wedding di Winery/Kebun Anggur', 'Dikelilingi oleh ladang anggur yang subur, suasana yang tenang dan eksklusif memberikan sentuhan mewah bagi pernikahan Anda. Paket ini termasuk tour kebun anggur, wine tasting, serta dekorasi elegan.', '1600000.00', 'wowinery.png', '2024-12-31 21:58:35'),
(12, 'Paket Wedding di Kapal Pesiar', 'Untuk pengalaman yang benar-benar unik, nikmati pernikahan di kapal pesiar, berlayar di atas laut yang luas dengan pemandangan yang menakjubkan. Paket ini mencakup dekorasi mewah di atas kapal, hidangan gourmet, dan perjalanan romantis di tengah lautan.', '2500000.00', 'wopesiar.jpeg', '2024-12-31 22:00:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_status` varchar(50) NOT NULL DEFAULT 'Pending',
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `amount` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `payment_method`, `payment_status`, `payment_date`, `amount`) VALUES
(2, 2, '', 'Pending', '2024-12-31 23:14:23', '0.00'),
(3, 3, 'Bank Transfer', 'Paid', '2024-12-31 23:14:51', '0.00'),
(4, 6, 'Credit Card', 'Paid', '2024-12-31 23:18:45', '0.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'hilal', 'hilal@gmail.com', '$2y$10$k6I8CSygVuTKssyfOfghZehv63TvYvt3DV5ZlVC392rqJnJh1Jtty', 'user', '2024-12-17 10:57:22'),
(2, 'hendy', 'juniawanhendi88@gmail.com', '$2y$10$DPl2tQODXWUfb2iJ6ngGmOGCThwq4fOJVUgVbMN3B5Xi54OcNYM0O', 'user', '2024-12-17 14:36:53'),
(3, 'fauzan', 'fauzan@gmail.com', '$2y$10$OxakGDuxqD7ShSJgSHqd4.TZfj4pG1FQk2CzWUW0BNuIiP.6cTBrq', 'user', '2024-12-17 14:50:46'),
(4, 'ahnaf', 'ahnaf@gmail.com', '$2y$10$Fh4tGUijsgiqWMnx1cDsSO33NcsZGPhOSdGWRyjTYRhGzTtmHeJ4y', 'user', '2024-12-18 07:35:51');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_id` (`package_id`);

--
-- Indeks untuk tabel `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`);

--
-- Ketidakleluasaan untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
