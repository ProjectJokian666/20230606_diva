-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 05, 2023 at 01:56 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sanggar-senam-atheena`
--

-- --------------------------------------------------------

--
-- Table structure for table `absens`
--

CREATE TABLE `absens` (
  `id` bigint UNSIGNED NOT NULL,
  `pelatih_id` bigint UNSIGNED NOT NULL,
  `jenis_id` bigint UNSIGNED NOT NULL,
  `tgl_absen` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `anggotais`
--

CREATE TABLE `anggotais` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `nama_ang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `almt_ang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint UNSIGNED NOT NULL,
  `pelatih_id` bigint UNSIGNED NOT NULL,
  `foto_event` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_event` datetime NOT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwals`
--

CREATE TABLE `jadwals` (
  `id` bigint UNSIGNED NOT NULL,
  `pelatih_id` bigint UNSIGNED NOT NULL,
  `jenis_id` bigint UNSIGNED NOT NULL,
  `tanggal` datetime NOT NULL,
  `harga` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenises`
--

CREATE TABLE `jenises` (
  `id` bigint UNSIGNED NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenises`
--

INSERT INTO `jenises` (`id`, `jenis`, `created_at`, `updated_at`) VALUES
(1, 'Aerobic pemula', '2023-04-09 12:47:56', '2023-04-09 12:47:56'),
(2, 'Aerobic koreo', '2023-04-09 12:47:56', '2023-04-09 12:47:56'),
(3, 'Aerobic Zumba', '2023-04-09 12:47:56', '2023-04-09 12:47:56'),
(4, 'Yoga', '2023-04-09 12:47:56', '2023-04-09 12:47:56');

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
(1, '2013_04_08_161120_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2023_04_08_161615_create_pemiliks_table', 1),
(8, '2023_04_08_161646_create_pemasukkan_pemiliks_table', 1),
(9, '2023_04_08_161714_create_anggotais_table', 1),
(10, '2023_04_08_161723_create_jenises_table', 1),
(11, '2023_04_08_161727_create_pembayaran_anggotais_table', 1),
(12, '2023_04_08_161739_create_pelatihs_table', 1),
(13, '2023_04_08_161756_create_events_table', 1),
(14, '2023_04_08_161834_create_jadwals_table', 1),
(15, '2023_04_08_161844_create_absens_table', 1),
(16, '2023_04_08_161853_create_pemasukkan_pelatihs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `pelatihs`
--

CREATE TABLE `pelatihs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `jenis_id` bigint UNSIGNED NOT NULL,
  `nama_pelatih` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tlp_pelatih` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `almt_pelatih` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelatihs`
--

INSERT INTO `pelatihs` (`id`, `user_id`, `jenis_id`, `nama_pelatih`, `tlp_pelatih`, `almt_pelatih`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 'pelatih', '0861527281', 'Kediri', '2023-04-09 12:47:56', '2023-04-09 07:42:53');

-- --------------------------------------------------------

--
-- Table structure for table `pemasukkan_pelatihs`
--

CREATE TABLE `pemasukkan_pelatihs` (
  `id` bigint UNSIGNED NOT NULL,
  `pelatih_id` bigint UNSIGNED NOT NULL,
  `jenis_id` bigint UNSIGNED NOT NULL,
  `tgl_absen` datetime NOT NULL,
  `jumlah_pempel` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemasukkan_pemiliks`
--

CREATE TABLE `pemasukkan_pemiliks` (
  `id` bigint UNSIGNED NOT NULL,
  `pemilik_id` bigint UNSIGNED NOT NULL,
  `tgl_terima` datetime NOT NULL,
  `jumlah_pempem` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_anggotais`
--

CREATE TABLE `pembayaran_anggotais` (
  `id` bigint UNSIGNED NOT NULL,
  `anggota_id` bigint UNSIGNED NOT NULL,
  `jenis_bayar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_bayar` datetime NOT NULL,
  `jumlah_bayar` int NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemiliks`
--

CREATE TABLE `pemiliks` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `nama_pemilik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tlp_pem` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alm_pem` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `role` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Pemilik', NULL, NULL),
(2, 'Admin', NULL, NULL),
(3, 'Pelatih', NULL, NULL),
(4, 'Anggota', NULL, NULL),
(5, 'Non-Anggota', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `_token` text COLLATE utf8mb4_unicode_ci,
  `remember` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `username`, `email_verified_at`, `image`, `password`, `remember_token`, `_token`, `remember`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pemilik', 'pemilik@gmail.com', 'pemilik', NULL, NULL, '$2y$10$xiLCpsJFL3b8gCMY6hVRI.AUPXKFGGZRSekljqlQEhsMYZ5YDrWKm', 'Atk145w3FMaAldWCx6CpWEAeWu35bzuMbOVD98VvcZdjnfLzB4iKHjTtsqXt', NULL, NULL, NULL, NULL),
(2, 2, 'Admin', 'admin@gmail.com', 'admin', NULL, NULL, '$2y$10$x7hq.QFZPe10PIbz6W3aGeRTCtTPgjUMil.kxXXCaVX5z/2wXitCC', NULL, NULL, 1, NULL, NULL),
(3, 3, 'pelatih', 'pelatih@gmail.com', 'pelatih', NULL, NULL, '$2y$10$6EYdc3nT1NrBhwQNhX/XVeXQnk6cTTaUyhyH1UZ.AgvL.2Lm4VP1.', NULL, NULL, NULL, NULL, '2023-04-09 07:42:53'),
(4, 4, 'Anggota', 'anggota@gmail.com', 'anggota', NULL, NULL, '$2y$10$/fMi0Ms6NL.CKEKqUboD5eGjKKuxL8PKN76Gt.0zTfF1KCM8UY0DW', NULL, NULL, NULL, NULL, NULL),
(5, 5, 'Non-Anggota', 'non-anggota@gmail.com', 'non-anggota', NULL, NULL, '$2y$10$4vzOCUDkM7/CBjDy/miTcewJrFB5dZfAVmQW71Gf8zbpPtLbIve1G', NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absens`
--
ALTER TABLE `absens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absens_pelatih_id_foreign` (`pelatih_id`),
  ADD KEY `absens_jenis_id_foreign` (`jenis_id`);

--
-- Indexes for table `anggotais`
--
ALTER TABLE `anggotais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anggotais_user_id_foreign` (`user_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_pelatih_id_foreign` (`pelatih_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jadwals`
--
ALTER TABLE `jadwals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwals_pelatih_id_foreign` (`pelatih_id`),
  ADD KEY `jadwals_jenis_id_foreign` (`jenis_id`);

--
-- Indexes for table `jenises`
--
ALTER TABLE `jenises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pelatihs`
--
ALTER TABLE `pelatihs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelatihs_user_id_foreign` (`user_id`),
  ADD KEY `pelatihs_jenis_id_foreign` (`jenis_id`);

--
-- Indexes for table `pemasukkan_pelatihs`
--
ALTER TABLE `pemasukkan_pelatihs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pemasukkan_pelatihs_pelatih_id_foreign` (`pelatih_id`),
  ADD KEY `pemasukkan_pelatihs_jenis_id_foreign` (`jenis_id`);

--
-- Indexes for table `pemasukkan_pemiliks`
--
ALTER TABLE `pemasukkan_pemiliks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran_anggotais`
--
ALTER TABLE `pembayaran_anggotais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayaran_anggotais_anggota_id_foreign` (`anggota_id`);

--
-- Indexes for table `pemiliks`
--
ALTER TABLE `pemiliks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pemiliks_user_id_foreign` (`user_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absens`
--
ALTER TABLE `absens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `anggotais`
--
ALTER TABLE `anggotais`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwals`
--
ALTER TABLE `jadwals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenises`
--
ALTER TABLE `jenises`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pelatihs`
--
ALTER TABLE `pelatihs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pemasukkan_pelatihs`
--
ALTER TABLE `pemasukkan_pelatihs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemasukkan_pemiliks`
--
ALTER TABLE `pemasukkan_pemiliks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran_anggotais`
--
ALTER TABLE `pembayaran_anggotais`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemiliks`
--
ALTER TABLE `pemiliks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absens`
--
ALTER TABLE `absens`
  ADD CONSTRAINT `absens_jenis_id_foreign` FOREIGN KEY (`jenis_id`) REFERENCES `jenises` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `absens_pelatih_id_foreign` FOREIGN KEY (`pelatih_id`) REFERENCES `pelatihs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `anggotais`
--
ALTER TABLE `anggotais`
  ADD CONSTRAINT `anggotais_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_pelatih_id_foreign` FOREIGN KEY (`pelatih_id`) REFERENCES `pelatihs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwals`
--
ALTER TABLE `jadwals`
  ADD CONSTRAINT `jadwals_jenis_id_foreign` FOREIGN KEY (`jenis_id`) REFERENCES `jenises` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwals_pelatih_id_foreign` FOREIGN KEY (`pelatih_id`) REFERENCES `pelatihs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pelatihs`
--
ALTER TABLE `pelatihs`
  ADD CONSTRAINT `pelatihs_jenis_id_foreign` FOREIGN KEY (`jenis_id`) REFERENCES `jenises` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pelatihs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemasukkan_pelatihs`
--
ALTER TABLE `pemasukkan_pelatihs`
  ADD CONSTRAINT `pemasukkan_pelatihs_jenis_id_foreign` FOREIGN KEY (`jenis_id`) REFERENCES `jenises` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemasukkan_pelatihs_pelatih_id_foreign` FOREIGN KEY (`pelatih_id`) REFERENCES `pelatihs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran_anggotais`
--
ALTER TABLE `pembayaran_anggotais`
  ADD CONSTRAINT `pembayaran_anggotais_anggota_id_foreign` FOREIGN KEY (`anggota_id`) REFERENCES `anggotais` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemiliks`
--
ALTER TABLE `pemiliks`
  ADD CONSTRAINT `pemiliks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
