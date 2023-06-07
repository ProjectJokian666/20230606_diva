-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 12, 2023 at 01:49 PM
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
-- Database: `gym-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggotais`
--

CREATE TABLE `anggotais` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_anggota` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggotais`
--

INSERT INTO `anggotais` (`id`, `user_id`, `nama`, `alamat`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `no_telp`, `status_anggota`, `created_at`, `updated_at`) VALUES
(1, 7, 'member1', 'Jl. Sawojajar No 12, Jombang', 'Kediri', '1999-12-31', 'Laki-Laki', '08172937161', 1, '2023-05-07 09:05:00', '2023-05-07 09:05:00'),
(2, 8, 'member2', 'Jl. Sawotimur No 12, Kediri', 'Jombang', '1992-04-21', 'Perempuan', '018263812', 1, '2023-05-07 09:05:00', '2023-05-07 09:05:00'),
(3, 9, 'member3', 'Jl. Merdeka No 10, Madiun', 'Madiun', '1997-09-11', 'Laki-Lai', '08271036121', 1, '2023-05-07 09:05:00', '2023-05-07 09:05:00'),
(5, 18, 'andi odank', 'Jl. Kopral Usman', 'Kediri', '2011-02-12', 'Laki-Laki', '081283716271', 0, '2023-05-11 15:02:21', '2023-05-11 15:02:21'),
(6, 19, 'budi', 'Jl. Kebumen no 12', 'Jombang', '2000-12-12', 'Laki-Laki', '08126381721', 0, '2023-05-11 15:03:42', '2023-05-11 15:03:42');

-- --------------------------------------------------------

--
-- Table structure for table `audiences`
--

CREATE TABLE `audiences` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `pendaftaran_kelas_id` bigint UNSIGNED NOT NULL,
  `status_hadir` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_event` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail_event` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_start` datetime NOT NULL,
  `event_finish` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `nama_event`, `detail_event`, `event_start`, `event_finish`, `created_at`, `updated_at`) VALUES
(3, 'Yoga Bersama Mas Eko', 'Guest Star: Mimi Peri', '2023-05-11 08:00:00', '2023-05-11 10:00:00', '2023-05-09 06:14:09', '2023-05-09 06:14:09');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_sesies`
--

CREATE TABLE `jadwal_sesies` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_sesi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` time NOT NULL,
  `finish` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_sesies`
--

INSERT INTO `jadwal_sesies` (`id`, `nama_sesi`, `start`, `finish`, `created_at`, `updated_at`) VALUES
(1, 'Sesi 1', '08:30:00', '09:30:00', '2023-05-07 06:28:49', '2023-05-07 06:28:49'),
(2, 'Sesi 2', '15:00:00', '16:00:00', '2023-05-07 06:28:49', '2023-05-07 06:28:49'),
(4, 'Sesi Pagi I', '06:00:00', '08:00:00', '2023-05-08 08:17:47', '2023-05-08 08:18:40');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_senams`
--

CREATE TABLE `kelas_senams` (
  `id` bigint UNSIGNED NOT NULL,
  `jadwal_sesi_id` bigint UNSIGNED NOT NULL,
  `pelatih_id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int NOT NULL,
  `diskon` int NOT NULL,
  `hari` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas_senams`
--

INSERT INTO `kelas_senams` (`id`, `jadwal_sesi_id`, `pelatih_id`, `nama`, `harga`, `diskon`, `hari`, `created_at`, `updated_at`) VALUES
(6, 1, 5, 'Yoga Harian', 60000, 10, '[\"Jumat\", \"Sabtu\"]', '2023-05-08 09:11:59', '2023-05-08 09:11:59');

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_05_07_074254_create_role_table', 1),
(3, '2023_05_07_074259_create_users_table', 1),
(4, '2023_05_07_075230_create_pelatih_table', 1),
(5, '2023_05_07_075534_create_pemilik_table', 1),
(6, '2023_05_07_075720_create_anggota_table', 1),
(7, '2023_05_07_080122_create_jadwal_sesies_table', 1),
(8, '2023_05_07_080437_create_kelas_senam_table', 1),
(9, '2023_05_07_080835_create_pendaftaran_kelases_table', 1),
(10, '2023_05_07_081127_create_pembayaran_table', 1),
(11, '2023_05_07_081432_create_audiences_table', 1),
(12, '2023_05_07_083319_create_events_table', 1),
(13, '2023_05_07_083442_create_pemasukkans_table', 1),
(14, '2023_05_07_115648_create_pemasukkan_pelatihs_table', 1),
(15, '2023_05_08_120004_add_pendaftaran_kelas_to_pemasukkans', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pelatihs`
--

CREATE TABLE `pelatihs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_pelatih` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kepelatihan` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelatihs`
--

INSERT INTO `pelatihs` (`id`, `user_id`, `nama`, `asal_kota`, `alamat`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `no_telp`, `jenis_pelatih`, `status_kepelatihan`, `created_at`, `updated_at`) VALUES
(5, 3, 'Pelatih1', 'Kediris', 'Jl. Kumbang Selatan No 11', 'Madiun', '1999-12-12', 'Laki-Laki', '08129834612', 'Aerobic Pemula', 1, '2023-05-07 08:17:02', '2023-05-08 07:50:56'),
(6, 4, 'Pelatih2', 'Kediri', 'Jl. Kumbang Utara No 11', 'Madiun', '1992-02-12', 'Laki-Laki', '08129834612', 'Aerobic Koreo', 1, '2023-05-07 08:17:02', '2023-05-07 08:17:02'),
(7, 5, 'Pelatih3', 'Kediri', 'Jl. Kumbang Selatan No 11', 'Madiun', '1999-12-12', 'Laki-Laki', '08129834612', 'Yoga', 1, '2023-05-07 08:17:02', '2023-05-07 08:17:02'),
(8, 6, 'Pelatih4', 'Kediri', 'Jl. Kumbang Selatan No 11', 'Madiun', '1999-12-12', 'Laki-Laki', '08129834612', 'Aerobic Zumba', 1, '2023-05-07 08:17:02', '2023-05-07 08:17:02');

-- --------------------------------------------------------

--
-- Table structure for table `pemasukkans`
--

CREATE TABLE `pemasukkans` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `pendaftaran_kelas_id` bigint UNSIGNED NOT NULL,
  `jenis_pemasukkan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendapatan_kotor` int NOT NULL,
  `gaji_pelatih` int NOT NULL,
  `pendapatan_bersih` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemasukkan_pelatihs`
--

CREATE TABLE `pemasukkan_pelatihs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `pendaftaran_kelas_id` bigint UNSIGNED NOT NULL,
  `pendapatan` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` bigint UNSIGNED NOT NULL,
  `anggota_id` bigint UNSIGNED NOT NULL,
  `pendaftaran_kelas_id` bigint UNSIGNED NOT NULL,
  `total_dibayar` int NOT NULL,
  `bukti_transfer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_konfirmasi` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `anggota_id`, `pendaftaran_kelas_id`, `total_dibayar`, `bukti_transfer`, `status_konfirmasi`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 60000, '12317923871982371.jpeg', 1, '2023-05-09 12:47:03', '2023-05-09 06:01:42');

-- --------------------------------------------------------

--
-- Table structure for table `pemiliks`
--

CREATE TABLE `pemiliks` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemiliks`
--

INSERT INTO `pemiliks` (`id`, `user_id`, `nama`, `alamat`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `no_telp`, `created_at`, `updated_at`) VALUES
(3, 1, 'Pemilik', 'Jl. Jendral Sudirman no 11', 'Kediri', '1998-02-12', 'Laki-Laki', '081203849121', '2023-05-07 08:17:09', '2023-05-07 08:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran_kelases`
--

CREATE TABLE `pendaftaran_kelases` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `kelas_senam_id` bigint UNSIGNED NOT NULL,
  `persen_diskon` int NOT NULL,
  `total_diskon` int NOT NULL,
  `total_harga` int NOT NULL,
  `paket_mulai` datetime NOT NULL,
  `paket_selesai` datetime NOT NULL,
  `status_pembayaran` int NOT NULL,
  `status_paket` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendaftaran_kelases`
--

INSERT INTO `pendaftaran_kelases` (`id`, `user_id`, `kelas_senam_id`, `persen_diskon`, `total_diskon`, `total_harga`, `paket_mulai`, `paket_selesai`, `status_pembayaran`, `status_paket`, `created_at`, `updated_at`) VALUES
(1, 7, 6, 10, 0, 60000, '2023-05-12 19:46:01', '2023-05-12 19:46:01', 1, 1, '2023-05-09 12:46:01', '2023-05-09 06:01:42'),
(4, 7, 6, 10, 18000, 180000, '2023-05-12 21:49:00', '2023-05-15 21:49:00', 0, 0, '2023-05-10 07:52:24', '2023-05-10 07:52:24');

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
(1, 'pemilik', '2023-05-07 06:28:49', '2023-05-07 06:28:49'),
(2, 'admin', '2023-05-07 06:28:49', '2023-05-07 06:28:49'),
(3, 'pelatih', '2023-05-07 06:28:49', '2023-05-07 06:28:49'),
(4, 'member', '2023-05-07 06:28:49', '2023-05-07 06:28:49'),
(5, 'non-member', '2023-05-07 06:28:49', '2023-05-07 06:28:49');

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

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `username`, `image`, `password`, `remember_token`, `_token`, `remember`, `created_at`, `updated_at`) VALUES
(1, 1, 'pemilik', 'pemilik@gmail.com', 'pemilik', NULL, '$2y$10$IwDivn6T4mxeISwVxh1MhuIFUa0EXPUH4pwQ7X0JKMdf9v7EDxRDS', NULL, NULL, NULL, '2023-05-07 07:31:26', '2023-05-07 07:31:26'),
(2, 2, 'admin', 'admin@gmail.com', 'admin', NULL, '$2y$10$JDir67p6zQ803L8pCI.DK.FQ8xzp5/hUKKjsynsY/vSgdi7sQTUym', NULL, NULL, NULL, '2023-05-07 07:31:26', '2023-05-07 07:31:26'),
(3, 3, 'Pelatih1', 'pelatih1@gmail.com', '', NULL, '$2y$10$.k1YnKbnzWdTHJGLLOI9E.JUBKBxk4humo2K8wMEBrHczg/S0uV8i', NULL, NULL, NULL, '2023-05-07 07:31:26', '2023-05-08 07:50:56'),
(4, 3, 'pelatih2', 'pelatih2@gmail.com', 'pelatih2', NULL, '$2y$10$IPG7hr1YAkRnMiTs.E.OiuJst9PhVEkFKXmsK7fw43RHoNgIHsZ4K', NULL, NULL, NULL, '2023-05-07 07:31:26', '2023-05-07 07:31:26'),
(5, 3, 'pelatih3', 'pelatih3@gmail.com', 'pelatih3', NULL, '$2y$10$VymfFMrexz2sPp6m.b44COuZIPB.YZSrtjTnHtefR6ZSaC8xGT.a.', NULL, NULL, NULL, '2023-05-07 07:31:27', '2023-05-07 07:31:27'),
(6, 3, 'pelatih4', 'pelatih4@gmail.com', 'pelatih4', NULL, '$2y$10$oVFAQ6hC7ypaAZBsrbxg0O9RWtb4/V1oNfF39.pqwadB/ariGAqpG', NULL, NULL, NULL, '2023-05-07 07:31:27', '2023-05-07 07:31:27'),
(7, 4, 'member1', 'member1@gmail.com', 'member1', NULL, '$2y$10$4aeH9lQ.2UYg9XziN9Ic4Oh0W4amqQdzfNgrvWfteCsVeKV2EbrF2', NULL, NULL, NULL, '2023-05-07 07:31:27', '2023-05-07 07:31:27'),
(8, 4, 'member2', 'member2@gmail.com', 'member2', NULL, '$2y$10$ra6jnF5qPrc58iw4C2euo.jjG5JydMZkAa1NN6MDr1aVUFscPJQY6', NULL, NULL, NULL, '2023-05-07 07:31:27', '2023-05-07 07:31:27'),
(9, 4, 'member3', 'member3@gmail.com', 'member3', NULL, '$2y$10$giBx31kB0WjiV0WwOlwwvuDCVXrNbTnQ6WpsYzMwY5CQE2FRmcPBu', NULL, NULL, NULL, '2023-05-07 07:31:27', '2023-05-07 07:31:27'),
(10, 5, 'non-member1', 'non-member1@gmail.com', 'non-member1', NULL, '$2y$10$QHrfpDtO6JoXhI0ZrigYJONR.bhsDzXX5k9x1fYEHADjkJiJ.MJaK', NULL, NULL, NULL, '2023-05-07 07:31:27', '2023-05-07 07:31:27'),
(11, 5, 'non-member2', 'non-member2@gmail.com', 'non-member2', NULL, '$2y$10$fNHz5ez2R6KVaXLMD0JTWuWtdot8POqnf68tUO/tiivWkybnJ.CdG', NULL, NULL, NULL, '2023-05-07 07:31:27', '2023-05-07 07:31:27'),
(18, 4, 'andi odank', 'andiodank@gmail.com', 'andi', NULL, '$2y$10$xEttoDFjWB.ihAKa70k8oeAaFwkWe0mKrfGPX9SGdx.mRDMupv0vK', NULL, NULL, NULL, '2023-05-11 15:02:21', '2023-05-11 15:02:21'),
(19, 4, 'budi', 'budi@gmail.com', 'budi', NULL, '$2y$10$sy2Ozic.OgK9eEDJNspSO.U2Cmo0i4CPK1JV5eFB22PVjGU7XHjGK', NULL, NULL, NULL, '2023-05-11 15:03:42', '2023-05-11 15:03:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggotais`
--
ALTER TABLE `anggotais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anggotais_user_id_foreign` (`user_id`);

--
-- Indexes for table `audiences`
--
ALTER TABLE `audiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `audiences_user_id_foreign` (`user_id`),
  ADD KEY `audiences_pendaftaran_kelas_id_foreign` (`pendaftaran_kelas_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_sesies`
--
ALTER TABLE `jadwal_sesies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas_senams`
--
ALTER TABLE `kelas_senams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_senams_jadwal_sesi_id_foreign` (`jadwal_sesi_id`),
  ADD KEY `kelas_senams_pelatih_id_foreign` (`pelatih_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelatihs`
--
ALTER TABLE `pelatihs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelatihs_user_id_foreign` (`user_id`);

--
-- Indexes for table `pemasukkans`
--
ALTER TABLE `pemasukkans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pemasukkans_user_id_foreign` (`user_id`),
  ADD KEY `pemasukkans_pendaftaran_kelas_id_foreign` (`pendaftaran_kelas_id`);

--
-- Indexes for table `pemasukkan_pelatihs`
--
ALTER TABLE `pemasukkan_pelatihs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pemasukkan_pelatihs_user_id_foreign` (`user_id`),
  ADD KEY `pemasukkan_pelatihs_pendaftaran_kelas_id_foreign` (`pendaftaran_kelas_id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayaran_anggota_id_foreign` (`anggota_id`),
  ADD KEY `pembayaran_pendaftaran_kelas_id_foreign` (`pendaftaran_kelas_id`);

--
-- Indexes for table `pemiliks`
--
ALTER TABLE `pemiliks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pemiliks_user_id_foreign` (`user_id`);

--
-- Indexes for table `pendaftaran_kelases`
--
ALTER TABLE `pendaftaran_kelases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pendaftaran_kelases_user_id_foreign` (`user_id`),
  ADD KEY `pendaftaran_kelases_kelas_senam_id_foreign` (`kelas_senam_id`);

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
-- AUTO_INCREMENT for table `anggotais`
--
ALTER TABLE `anggotais`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `audiences`
--
ALTER TABLE `audiences`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jadwal_sesies`
--
ALTER TABLE `jadwal_sesies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kelas_senams`
--
ALTER TABLE `kelas_senams`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pelatihs`
--
ALTER TABLE `pelatihs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pemasukkans`
--
ALTER TABLE `pemasukkans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemasukkan_pelatihs`
--
ALTER TABLE `pemasukkan_pelatihs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pemiliks`
--
ALTER TABLE `pemiliks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pendaftaran_kelases`
--
ALTER TABLE `pendaftaran_kelases`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggotais`
--
ALTER TABLE `anggotais`
  ADD CONSTRAINT `anggotais_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `audiences`
--
ALTER TABLE `audiences`
  ADD CONSTRAINT `audiences_pendaftaran_kelas_id_foreign` FOREIGN KEY (`pendaftaran_kelas_id`) REFERENCES `pendaftaran_kelases` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `audiences_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelas_senams`
--
ALTER TABLE `kelas_senams`
  ADD CONSTRAINT `kelas_senams_jadwal_sesi_id_foreign` FOREIGN KEY (`jadwal_sesi_id`) REFERENCES `jadwal_sesies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kelas_senams_pelatih_id_foreign` FOREIGN KEY (`pelatih_id`) REFERENCES `pelatihs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pelatihs`
--
ALTER TABLE `pelatihs`
  ADD CONSTRAINT `pelatihs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemasukkans`
--
ALTER TABLE `pemasukkans`
  ADD CONSTRAINT `pemasukkans_pendaftaran_kelas_id_foreign` FOREIGN KEY (`pendaftaran_kelas_id`) REFERENCES `pendaftaran_kelases` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemasukkans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemasukkan_pelatihs`
--
ALTER TABLE `pemasukkan_pelatihs`
  ADD CONSTRAINT `pemasukkan_pelatihs_pendaftaran_kelas_id_foreign` FOREIGN KEY (`pendaftaran_kelas_id`) REFERENCES `pendaftaran_kelases` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemasukkan_pelatihs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_anggota_id_foreign` FOREIGN KEY (`anggota_id`) REFERENCES `anggotais` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_pendaftaran_kelas_id_foreign` FOREIGN KEY (`pendaftaran_kelas_id`) REFERENCES `pendaftaran_kelases` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemiliks`
--
ALTER TABLE `pemiliks`
  ADD CONSTRAINT `pemiliks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pendaftaran_kelases`
--
ALTER TABLE `pendaftaran_kelases`
  ADD CONSTRAINT `pendaftaran_kelases_kelas_senam_id_foreign` FOREIGN KEY (`kelas_senam_id`) REFERENCES `kelas_senams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pendaftaran_kelases_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
