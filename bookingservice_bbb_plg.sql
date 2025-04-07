-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2025 at 11:16 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookingservice_bbb_plg`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `service_id` bigint(20) DEFAULT NULL,
  `mekanik_id` bigint(20) DEFAULT NULL,
  `cs_id` bigint(20) DEFAULT NULL,
  `jenis_service` varchar(255) DEFAULT NULL,
  `no_polisi` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu` varchar(255) DEFAULT NULL,
  `model_kendaraan` varchar(255) DEFAULT NULL,
  `odo_meter` bigint(20) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `customer_id`, `service_id`, `mekanik_id`, `cs_id`, `jenis_service`, `no_polisi`, `tanggal`, `waktu`, `model_kendaraan`, `odo_meter`, `status`, `catatan`, `created_at`, `updated_at`) VALUES
(2, 2, 2, NULL, 5, 'HOME SERVICE', 'F 5647 TYU', '2025-04-06', '11:00', 'Pajero', 12345, 'MENUNGGU KONFIRMASI SP', 'Menunggu Konfirmasi Kebutuhan dari Customer Service', '2025-04-06 09:25:14', '2025-04-06 09:47:24'),
(4, 2, 1, 7, NULL, 'DEALER VISIT', 'D 8965 OJK', '2025-04-06', '09:00', 'Mitsubishi Xpander', 20000, 'SELESAI', 'Silahkan Datang pada Tanggal dan Waktu yang telah ditentukan', '2025-04-06 09:39:07', '2025-04-06 09:44:38'),
(5, 2, 2, NULL, NULL, 'DEALER VISIT', 'D 8965 OJK', '2025-04-07', '09:00', 'Xpander', 60000, 'BOOKED', 'Silahkan Datang pada Tanggal dan Waktu yang telah ditentukan', '2025-04-06 10:25:40', '2025-04-06 10:25:40'),
(6, 2, 2, NULL, 5, 'DEALER VISIT', 'F 5647 TYU', '2025-04-08', '13:00', 'Mitsubishi Xpander', 67890, 'MENUNGGU KONFIRMASI SP', 'Menunggu Konfirmasi Kebutuhan dari Customer Service', '2025-04-06 10:28:34', '2025-04-06 10:29:24');

-- --------------------------------------------------------

--
-- Table structure for table `detail_booking`
--

CREATE TABLE `detail_booking` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `ask_service` varchar(255) DEFAULT NULL,
  `konfirmasi_sparepart` varchar(255) DEFAULT NULL,
  `ask_10km` varchar(255) DEFAULT NULL,
  `biaya_10km` double DEFAULT NULL,
  `ask_extra` varchar(255) DEFAULT NULL,
  `biaya_extra` double DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `pdf` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_booking`
--

INSERT INTO `detail_booking` (`id`, `booking_id`, `ask_service`, `konfirmasi_sparepart`, `ask_10km`, `biaya_10km`, `ask_extra`, `biaya_extra`, `foto`, `pdf`, `created_at`, `updated_at`) VALUES
(2, 2, 'TIDAK', NULL, NULL, NULL, 'YA', NULL, NULL, NULL, '2025-04-06 09:25:14', '2025-04-06 09:25:14'),
(4, 4, 'YA', NULL, NULL, NULL, 'TIDAK', NULL, NULL, NULL, '2025-04-06 09:39:07', '2025-04-06 09:39:07'),
(5, 5, 'TIDAK', NULL, NULL, NULL, 'TIDAK', NULL, NULL, NULL, '2025-04-06 10:25:40', '2025-04-06 10:25:40'),
(6, 6, 'TIDAK', NULL, NULL, NULL, 'TIDAK', NULL, NULL, NULL, '2025-04-06 10:28:34', '2025-04-06 10:28:34');

-- --------------------------------------------------------

--
-- Table structure for table `detail_booking_spareparts`
--

CREATE TABLE `detail_booking_spareparts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `detail_booking_id` bigint(20) UNSIGNED NOT NULL,
  `sparepart_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `total_price` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_booking_spareparts`
--

INSERT INTO `detail_booking_spareparts` (`id`, `detail_booking_id`, `sparepart_id`, `quantity`, `total_price`, `created_at`, `updated_at`) VALUES
(3, 2, 4, 2, 40000, '2025-04-06 09:25:14', '2025-04-06 09:25:14'),
(4, 6, 5, 2, 20000, '2025-04-06 10:28:34', '2025-04-06 10:28:34');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(42, '2014_10_12_000000_create_users_table', 1),
(43, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(44, '2019_08_19_000000_create_failed_jobs_table', 1),
(45, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(46, '2025_03_17_084012_create_services_table', 1),
(47, '2025_03_17_084131_create_bookings_table', 1),
(48, '2025_03_18_063544_create_detail_bookings_table', 1),
(49, '2025_04_02_090051_create_spareparts_table', 1),
(50, '2025_04_03_052347_create_detail_booking_spareparts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `estimasi` varchar(255) DEFAULT NULL,
  `biaya` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `estimasi`, `biaya`, `created_at`, `updated_at`) VALUES
(1, 'Free Service 1000', '1 jam', 0, '2025-04-06 09:22:31', '2025-04-06 09:22:43'),
(2, 'General Repair', '1 jam', 500000, '2025-04-06 09:23:03', '2025-04-06 09:23:03'),
(3, 'Free Service 20000', '2 jam', 0, '2025-04-06 09:23:22', '2025-04-06 09:23:22');

-- --------------------------------------------------------

--
-- Table structure for table `spareparts`
--

CREATE TABLE `spareparts` (
  `id_sparepart` bigint(20) UNSIGNED NOT NULL,
  `nama_sparepart` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL DEFAULT 0,
  `stok` int(11) NOT NULL DEFAULT 0,
  `status` enum('Tersedia','Tidak Tersedia') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spareparts`
--

INSERT INTO `spareparts` (`id_sparepart`, `nama_sparepart`, `harga`, `stok`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Oli', 20000, 15, 'Tersedia', '2025-04-06 06:11:57', '2025-04-06 06:11:57'),
(5, 'Filter Oli', 10000, 10, 'Tersedia', '2025-04-06 06:12:49', '2025-04-06 06:12:49'),
(6, 'Filter Udara', 30000, 18, 'Tidak Tersedia', '2025-04-06 06:13:06', '2025-04-06 06:13:06'),
(7, 'Ban', 500000, 12, 'Tersedia', '2025-04-06 10:14:02', '2025-04-06 10:14:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `no_hp`, `alamat`, `jenis_kelamin`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@app.com', '$2y$12$Nvg/u638JuA3l4v/93m/mumq1lsh/7g3ugk7GRwI0HlYgAdp7asXS', '085172116048', 'Bandung Selatan', 'Laki-Laki', 'Admin', NULL, NULL),
(2, 'Cahya', 'cahya@gmail.com', '$2y$12$vqelTFgQQXBNSJ3y/GRuTeIBsK9.9Wmh2cVIFN3YJn5eJm374JY6y', '123456789', 'Bogor', 'Perempuan', 'Customer', '2025-04-06 06:10:29', '2025-04-06 06:10:29'),
(3, 'Irfan', 'spbatavia@gmail.com', '$2y$12$zHSt/ey7jDhKHeU.vXIfkOcrJrxQBMthf7l5jJQRpSWCpFtLhJ6f6', '1232456476', 'Papua', 'Laki-Laki', 'Sparepart', '2025-04-06 09:18:43', '2025-04-06 09:18:43'),
(4, 'Angga', 'smbatavia@gmail.com', '$2y$12$3ljgzkpIjkg4VKewOd0u2OOEc4OAXB9jwj1if9yin0uh.neNktLrG', '237465985653', 'Cibubur', 'Laki-Laki', 'SM', '2025-04-06 09:21:48', '2025-04-06 09:21:48'),
(5, 'Eka Fuji Hapsari', 'csbatavia@gmail.com', '$2y$12$g2WlRt3nU3lFCZB1HUOi3OK5iVT7vmcP4OP484uiesz8v/RdiozXm', '098765432123', 'Depok', 'Perempuan', 'CS', '2025-04-06 09:26:17', '2025-04-06 09:26:17'),
(6, 'Lidia Eka Utami', 'sabatavia@gmail.com', '$2y$12$8la3UVpWTA4QxdOvTn4SKuMl9tPMG6.jwysVeM0iT1I6IzHtNZyBa', '09675846538576', 'Jakarta', 'Perempuan', 'SA', '2025-04-06 09:26:55', '2025-04-06 09:26:55'),
(7, 'Andre Hariadi', 'mekanikbatavia@gmail.com', '$2y$12$xw6Zi1Aflfth8APKbHEUjeHrklfIUDqv6bgBbTurFHIP7dmKJTNNe', '08887674635425', 'Pulogadung', 'Laki-Laki', 'Mekanik', '2025-04-06 09:44:10', '2025-04-06 09:44:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_booking`
--
ALTER TABLE `detail_booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_booking_booking_id_foreign` (`booking_id`);

--
-- Indexes for table `detail_booking_spareparts`
--
ALTER TABLE `detail_booking_spareparts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_booking_spareparts_detail_booking_id_foreign` (`detail_booking_id`),
  ADD KEY `detail_booking_spareparts_sparepart_id_foreign` (`sparepart_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spareparts`
--
ALTER TABLE `spareparts`
  ADD PRIMARY KEY (`id_sparepart`);

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
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `detail_booking`
--
ALTER TABLE `detail_booking`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `detail_booking_spareparts`
--
ALTER TABLE `detail_booking_spareparts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `spareparts`
--
ALTER TABLE `spareparts`
  MODIFY `id_sparepart` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_booking`
--
ALTER TABLE `detail_booking`
  ADD CONSTRAINT `detail_booking_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `detail_booking_spareparts`
--
ALTER TABLE `detail_booking_spareparts`
  ADD CONSTRAINT `detail_booking_spareparts_detail_booking_id_foreign` FOREIGN KEY (`detail_booking_id`) REFERENCES `detail_booking` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_booking_spareparts_sparepart_id_foreign` FOREIGN KEY (`sparepart_id`) REFERENCES `spareparts` (`id_sparepart`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
