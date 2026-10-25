-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 25, 2026 at 12:00 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chewy_bakery`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanans`
--

CREATE TABLE `detail_pesanans` (
  `id` bigint UNSIGNED NOT NULL,
  `pesanan_id` bigint UNSIGNED NOT NULL,
  `produk_id` bigint UNSIGNED NOT NULL,
  `jumlah` int NOT NULL,
  `harga` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_pesanans`
--

INSERT INTO `detail_pesanans` (`id`, `pesanan_id`, `produk_id`, `jumlah`, `harga`, `created_at`, `updated_at`) VALUES
(1, 7, 6, 6, 23000.00, '2026-10-12 00:37:32', '2026-10-12 00:37:32'),
(2, 8, 1, 4, 25000.00, '2026-10-12 03:27:40', '2026-10-12 03:27:40'),
(3, 8, 3, 2, 20000.00, '2026-10-12 03:27:40', '2026-10-12 03:27:40'),
(4, 9, 1, 7, 25000.00, '2026-10-13 00:22:00', '2026-10-13 00:22:00'),
(5, 10, 1, 3, 25000.00, '2026-10-13 07:26:26', '2026-10-13 07:26:26'),
(6, 11, 3, 3, 20000.00, '2026-10-19 17:23:56', '2026-10-19 17:23:56'),
(7, 12, 3, 4, 20000.00, '2026-10-19 18:01:16', '2026-10-19 18:01:16'),
(8, 16, 3, 2, 20000.00, '2026-10-21 07:46:10', '2026-10-21 07:46:10'),
(9, 17, 3, 1, 20000.00, '2026-10-22 07:19:22', '2026-10-22 07:19:22'),
(10, 17, 6, 4, 23000.00, '2026-10-22 07:19:22', '2026-10-22 07:19:22'),
(11, 18, 8, 1, 30000.00, '2026-10-23 18:38:51', '2026-10-23 18:38:51'),
(12, 19, 7, 2, 26000.00, '2026-10-23 18:40:06', '2026-10-23 18:40:06'),
(13, 20, 8, 4, 30000.00, '2026-10-23 23:11:31', '2026-10-23 23:11:31'),
(14, 21, 5, 2, 28000.00, '2026-10-23 23:29:04', '2026-10-23 23:29:04'),
(15, 22, 4, 6, 25000.00, '2026-10-24 00:42:39', '2026-10-24 00:42:39'),
(16, 23, 3, 2, 20000.00, '2026-10-24 00:43:58', '2026-10-24 00:43:58'),
(17, 24, 6, 2, 23000.00, '2026-10-24 00:44:40', '2026-10-24 00:44:40');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama_kategori`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Pastry & Croissant', 'pastry-croissant', '2026-10-10 17:02:06', '2026-10-10 17:02:06'),
(2, 'Sweet Bun & Roll', 'sweet-bun-roll', '2026-10-10 17:02:06', '2026-10-10 17:02:06'),
(3, 'Savory Bread', 'savory-bread', '2026-10-10 17:02:06', '2026-10-10 17:02:06');

-- --------------------------------------------------------

--
-- Table structure for table `kuota_harians`
--

CREATE TABLE `kuota_harians` (
  `id` bigint UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `kuota_maksimal` int NOT NULL DEFAULT '50',
  `kuota_terpakai` int NOT NULL DEFAULT '0',
  `is_tutup` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kuota_harians`
--

INSERT INTO `kuota_harians` (`id`, `tanggal`, `kuota_maksimal`, `kuota_terpakai`, `is_tutup`, `created_at`, `updated_at`) VALUES
(1, '2026-10-15', 50, 9, 0, '2026-10-12 02:30:28', '2026-10-13 07:26:26'),
(2, '2026-10-23', 50, 8, 0, '2026-10-13 00:22:00', '2026-10-22 07:19:22'),
(3, '2026-10-16', 150, 0, 0, '2026-10-14 07:13:16', '2026-10-14 07:13:16'),
(4, '2026-10-21', 50, 3, 0, '2026-10-19 17:23:56', '2026-10-19 17:23:56'),
(5, '2026-10-22', 50, 5, 0, '2026-10-19 18:01:16', '2026-10-21 07:46:10'),
(6, '2026-10-25', 50, 7, 0, '2026-10-23 18:38:51', '2026-10-24 00:44:40'),
(7, '2026-10-24', 100, 0, 0, '2026-10-23 20:08:21', '2026-10-23 20:08:21'),
(8, '2026-10-26', 200, 0, 0, '2026-10-24 00:55:33', '2026-10-24 00:55:33');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_10_06_025618_create_kategoris_table', 1),
(5, '2026_10_06_025637_create_produks_table', 1),
(6, '2026_10_06_025648_create_kuota_harians_table', 1),
(7, '2026_10_06_025659_create_pesanans_table', 1),
(8, '2026_10_06_025713_create_detail_pesanans_table', 1),
(9, '2026_10_06_025725_create_ulasans_table', 1),
(10, '2026_10_06_025746_tambah_kolom_peran_di_tabel_users', 1),
(11, '2026_10_07_025505_tambah_kolom_peran_di_tabel_users', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanans`
--

CREATE TABLE `pesanans` (
  `id` bigint UNSIGNED NOT NULL,
  `nomor_pesanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `total_harga` decimal(12,2) NOT NULL,
  `metode_pembayaran` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'qris',
  `bukti_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('menunggu','diproses','selesai','dibatalkan') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'menunggu',
  `tanggal_ambil` date NOT NULL,
  `jam_ambil` time NOT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanans`
--

INSERT INTO `pesanans` (`id`, `nomor_pesanan`, `user_id`, `total_harga`, `metode_pembayaran`, `bukti_pembayaran`, `status`, `tanggal_ambil`, `jam_ambil`, `catatan`, `created_at`, `updated_at`) VALUES
(1, 'CB-20261011105138', 1, 40000.00, 'qris', NULL, 'selesai', '2026-10-17', '10:00:00', 'Nama: Kaluna Maheswari | WA: 088888888888 | Metode: pickup | Alamat/Catatan: diambil jam 4 sore', '2026-10-11 03:51:38', '2026-10-18 23:09:48'),
(2, 'CB-20261012072413', 1, 138000.00, 'qris', NULL, 'selesai', '2026-10-15', '10:00:00', 'Nama: Kaluna Maheswari | WA: 08999999999 | Metode: delivery | Alamat/Catatan: Jl. Pantura No. 275', '2026-10-12 00:24:13', '2026-10-18 23:10:20'),
(3, 'CB-20261012072604', 1, 138000.00, 'qris', NULL, 'selesai', '2026-10-15', '10:00:00', 'Nama: Kaluna Maheswari | WA: 08999999999 | Metode: delivery | Alamat/Catatan: Jl. Pantura No. 275', '2026-10-12 00:26:04', '2026-10-18 23:14:16'),
(4, 'CB-20261012073022', 1, 138000.00, 'qris', NULL, 'selesai', '2026-10-15', '10:00:00', 'Nama: Kaluna Maheswari | WA: 08999999999 | Metode: delivery | Alamat/Catatan: Jl. Pantura No. 275', '2026-10-12 00:30:22', '2026-10-18 23:14:37'),
(5, 'CB-20261012073550', 1, 138000.00, 'qris', NULL, 'selesai', '2026-10-15', '10:00:00', 'Nama: Kaluna Maheswari | WA: 0899999999 | Metode: pickup | Alamat/Catatan: jam 3 sore di outlet', '2026-10-12 00:35:50', '2026-10-22 07:46:12'),
(6, 'CB-20261012073553', 1, 138000.00, 'qris', NULL, 'selesai', '2026-10-15', '10:00:00', 'Nama: Kaluna Maheswari | WA: 0899999999 | Metode: pickup | Alamat/Catatan: jam 3 sore di outlet', '2026-10-12 00:35:53', '2026-10-22 07:46:29'),
(7, 'CB-20261012073732', 1, 138000.00, 'qris', NULL, 'selesai', '2026-10-15', '10:00:00', 'Nama: Kaluna Maheswari | WA: 0899999999 | Metode: pickup | Alamat/Catatan: jam 3 sore di outlet', '2026-10-12 00:37:32', '2026-10-22 07:46:48'),
(8, 'CB-202610121721', 1, 140000.00, 'qris', NULL, 'selesai', '2026-10-15', '16:00:00', NULL, '2026-10-12 03:27:40', '2026-10-22 07:47:03'),
(9, 'CB-202610136955', 1, 175000.00, 'qris', NULL, 'selesai', '2026-10-23', '16:00:00', NULL, '2026-10-13 00:22:00', '2026-10-23 20:18:57'),
(10, 'CB-202610136852', 1, 75000.00, 'qris', NULL, 'selesai', '2026-10-15', '16:00:00', NULL, '2026-10-13 07:26:26', '2026-10-17 08:31:49'),
(11, 'CB-202610205202', 1, 60000.00, 'qris', 'bukti_bayar/OUFuj5KEecxxOzL5g7lL6yunqyayWFjyJoJB0gPT.jpg', 'selesai', '2026-10-21', '16:00:00', NULL, '2026-10-19 17:23:56', '2026-10-22 07:45:37'),
(12, 'CB-202610205688', 1, 80000.00, 'qris', NULL, 'selesai', '2026-10-22', '16:00:00', NULL, '2026-10-19 18:01:16', '2026-10-22 07:47:20'),
(16, 'PO-20261021-6395', 1, 40000.00, 'qris', NULL, 'selesai', '2026-10-22', '21:46:00', NULL, '2026-10-21 07:46:10', '2026-10-22 07:47:37'),
(17, 'PO-20261022-724C', 1, 112000.00, 'qris', 'bukti_pembayaran/yHazc66tfa5oPJoQ70iRJzkrnlLBT2cEiAlDQ5ib.jpg', 'selesai', '2026-10-23', '10:19:00', NULL, '2026-10-22 07:19:22', '2026-10-23 20:19:12'),
(18, 'PO-20261024-1079', 1, 30000.00, 'transfer', 'bukti_pembayaran/tKB3fzcKTRUuehOkSeKJae1WWKVfQd3IqVrZxeLT.jpg', 'selesai', '2026-10-25', '08:38:00', NULL, '2026-10-23 18:38:51', '2026-10-24 00:55:04'),
(19, 'PO-20261024-D84E', 1, 52000.00, 'cod', NULL, 'diproses', '2026-10-25', '08:39:00', NULL, '2026-10-23 18:40:06', '2026-10-23 20:09:33'),
(20, 'PO-20261024-9ED4', 1, 120000.00, 'qris', 'bukti_pembayaran/RGf6MDPmIaJb0qlBb5h5EwUpbKC00mP4tXlBzz4i.jpg', 'diproses', '2026-10-25', '13:11:00', NULL, '2026-10-23 23:11:31', '2026-10-23 23:43:30'),
(21, 'PO-20261024-D95F', 1, 56000.00, 'transfer', 'bukti_pembayaran/yMarUbQFDAeVxoBW1kjB4SESTtSRkWaUcKjpvEs2.jpg', 'diproses', '2026-10-25', '13:28:00', NULL, '2026-10-23 23:29:04', '2026-10-24 00:54:44'),
(22, 'PO-20261024-CE15', 1, 150000.00, 'qris', 'bukti_pembayaran/0ixQKkYyM2uETsPbiLGoAykuoYommBeMTGC7s7BC.jpg', 'menunggu', '2026-10-25', '10:42:00', NULL, '2026-10-24 00:42:39', '2026-10-24 00:43:00'),
(23, 'PO-20261024-583F', 1, 40000.00, 'transfer', 'bukti_pembayaran/XO1zrizYQquWdpUn28kpfkNveg4rxYf7HsfRAhzw.jpg', 'menunggu', '2026-10-25', '14:43:00', NULL, '2026-10-24 00:43:58', '2026-10-24 00:44:17'),
(24, 'PO-20261024-AD18', 1, 46000.00, 'cod', NULL, 'menunggu', '2026-10-25', '14:44:00', NULL, '2026-10-24 00:44:40', '2026-10-24 00:44:40');

-- --------------------------------------------------------

--
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `id` bigint UNSIGNED NOT NULL,
  `kategori_id` bigint UNSIGNED NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `harga` decimal(12,2) NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_tersedia` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id`, `kategori_id`, `nama_produk`, `slug`, `deskripsi`, `harga`, `gambar`, `is_tersedia`, `created_at`, `updated_at`) VALUES
(1, 2, 'Chewy Cinnamon Roll', 'chewy-cinnamon-roll', 'Roti gulung kayu manis empuk dengan lapisan cream cheese manis di atasnya.', 25000.00, NULL, 1, '2026-10-10 17:02:06', '2026-10-10 17:02:06'),
(3, 2, 'Choco Lava Bun', 'choco-lava-bun', 'Roti lembut berisikan lumeran cokelat pekat berkualitas tinggi.', 20000.00, NULL, 1, '2026-10-10 17:02:06', '2026-10-10 17:02:06'),
(4, 3, 'Korean Garlic Cheese Bread', 'korean-garlic-cheese-bread', 'Roti lembut dengan baluran saus bawang putih gurih dan cream cheese leleh yang melimpah.', 25000.00, NULL, 1, '2026-10-10 17:02:06', '2026-10-24 00:21:39'),
(5, 1, 'Almond Croissant', 'almond-croissant', 'Croissant mentega renyah dengan isian frangipane almond manis dan taburan irisan almond panggang.', 26000.00, NULL, 1, '2026-10-10 17:02:06', '2026-10-24 00:54:01'),
(6, 2, 'Matcha Cream Bun', 'matcha-cream-bun', 'Roti lembut berisikan krim teh hijau Jepang (matcha) yang harum dan manis pas.', 23000.00, NULL, 1, '2026-10-10 17:02:06', '2026-10-10 17:02:06'),
(7, 3, 'Sausage Cheese Puff', 'sausage-cheese-puff', 'Pastry gurih berlapis dengan isian sosis pilihan dan lelehan keju mozarella di atasnya.', 26000.00, NULL, 1, '2026-10-10 17:02:06', '2026-10-10 17:02:06'),
(8, 1, 'Pistachio Croissant', 'pistachio-croissant', 'Croissant berlapis renyah dengan isian krim pistachio yang lembut dan kaya rasa, dilengkapi topping pistachio cincang untuk tampilan yang elegan.', 30000.00, 'products/J1uyir9ELuISz3lroPyQUYFOeHl1k0I2XaHBppJg.jpg', 1, '2026-10-23 08:09:54', '2026-10-23 08:09:54');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('su84uaX2LBaa2PmzFnW1s3DUv0eH9x29L2Y5sGmY', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJ6cTB2OUlUV2I0b2xPb01DRVd6bHRwcHF3Zlh0ZFRRVUN0WkRhUEM5IiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDAiLCJyb3V0ZSI6ImhvbWUifX0=', 1792828620);

-- --------------------------------------------------------

--
-- Table structure for table `ulasans`
--

CREATE TABLE `ulasans` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `produk_id` bigint UNSIGNED NOT NULL,
  `pesanan_id` bigint UNSIGNED NOT NULL,
  `rating` int NOT NULL,
  `komentar` text COLLATE utf8mb4_unicode_ci,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_disetujui` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ulasans`
--

INSERT INTO `ulasans` (`id`, `user_id`, `produk_id`, `pesanan_id`, `rating`, `komentar`, `gambar`, `is_disetujui`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 16, 5, NULL, NULL, 1, '2026-10-23 19:32:48', '2026-10-23 19:32:48'),
(2, 1, 1, 16, 5, NULL, NULL, 1, '2026-10-23 19:49:56', '2026-10-23 19:49:56'),
(3, 1, 1, 16, 5, NULL, NULL, 1, '2026-10-23 19:55:55', '2026-10-23 19:55:55'),
(4, 1, 3, 17, 5, 'kuenya harum, lembut, rasanya enak banget', NULL, 1, '2026-10-23 23:36:29', '2026-10-23 23:36:29'),
(5, 1, 3, 17, 5, 'kuenya enak, harum, lembut pokonya worth it deh untuk di beli', NULL, 1, '2026-10-23 23:37:03', '2026-10-23 23:37:03'),
(6, 1, 3, 17, 5, 'kuenya enak, lembut dan josjiis', NULL, 1, '2026-10-23 23:39:36', '2026-10-23 23:39:36'),
(7, 1, 3, 17, 5, 'kuenya lembut dan enak', NULL, 1, '2026-10-23 23:42:18', '2026-10-23 23:42:18'),
(8, 1, 3, 17, 4, 'kuenya enak dan lembut', NULL, 1, '2026-10-24 00:45:38', '2026-10-24 00:45:38'),
(9, 1, 3, 17, 4, 'kuenya enak dan lembut', NULL, 1, '2026-10-24 00:45:39', '2026-10-24 00:45:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pelanggan',
  `nomor_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `peran`, `nomor_hp`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kaluna Maheswari', 'kaluna@gmail.com', 'pelanggan', NULL, NULL, '$2y$12$qQ3AdZWbfVu4oz1o5uYPIu5uE6SZy6i2Jd05jRwdWbBGXzOgGZra.', NULL, '2026-10-10 10:04:51', '2026-10-10 10:04:51'),
(2, 'Admin Chewy', 'admin@gmail.com', 'admin', '081234567890', '2026-10-12 10:36:33', '$2y$12$2YGTMbiOgN957dI55et6eOo.40bHcBz3N9ZikVt0geY4ZrBcsSuju', NULL, NULL, '2026-10-13 00:43:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `detail_pesanans`
--
ALTER TABLE `detail_pesanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_pesanans_pesanan_id_foreign` (`pesanan_id`),
  ADD KEY `detail_pesanans_produk_id_foreign` (`produk_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kategoris_slug_unique` (`slug`);

--
-- Indexes for table `kuota_harians`
--
ALTER TABLE `kuota_harians`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kuota_harians_tanggal_unique` (`tanggal`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pesanans_nomor_pesanan_unique` (`nomor_pesanan`),
  ADD KEY `pesanans_user_id_foreign` (`user_id`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `produks_slug_unique` (`slug`),
  ADD KEY `produks_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `ulasans`
--
ALTER TABLE `ulasans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ulasans_user_id_foreign` (`user_id`),
  ADD KEY `ulasans_produk_id_foreign` (`produk_id`),
  ADD KEY `ulasans_pesanan_id_foreign` (`pesanan_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pesanans`
--
ALTER TABLE `detail_pesanans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kuota_harians`
--
ALTER TABLE `kuota_harians`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ulasans`
--
ALTER TABLE `ulasans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pesanans`
--
ALTER TABLE `detail_pesanans`
  ADD CONSTRAINT `detail_pesanans_pesanan_id_foreign` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_pesanans_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pesanans`
--
ALTER TABLE `pesanans`
  ADD CONSTRAINT `pesanans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `produks`
--
ALTER TABLE `produks`
  ADD CONSTRAINT `produks_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ulasans`
--
ALTER TABLE `ulasans`
  ADD CONSTRAINT `ulasans_pesanan_id_foreign` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ulasans_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ulasans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
