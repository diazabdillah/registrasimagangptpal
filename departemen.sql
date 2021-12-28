-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Dec 20, 2021 at 11:47 AM
-- Server version: 8.0.21
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magang_pt_pal`
--

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

DROP TABLE IF EXISTS `departemen`;
CREATE TABLE IF NOT EXISTS `departemen` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_divisi` int NOT NULL,
  `nama_departemen` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id`, `id_divisi`, `nama_departemen`, `created_at`, `updated_at`) VALUES
(4, 1, 'Humas', '2021-12-15 18:44:06', '2021-12-15 18:44:06'),
(5, 1, 'Perwakilan Jakarta', '2021-12-15 18:44:31', '2021-12-15 18:44:31'),
(6, 1, 'Hukum & Kepatuhan', '2021-12-15 18:45:02', '2021-12-15 18:45:02'),
(7, 3, 'Perencanaan & Pengendalian(Rendal)', '2021-12-15 18:47:45', '2021-12-15 18:47:45'),
(8, 3, 'Sensor Weapon & Command (Sewaco)', '2021-12-15 18:48:23', '2021-12-15 18:48:23'),
(9, 4, 'Proposal Proyek Kapal', '2021-12-15 18:49:40', '2021-12-15 18:49:40'),
(10, 4, 'Pengembangan Pasar & Produk', '2021-12-15 18:50:02', '2021-12-15 18:50:02'),
(11, 4, 'Dukungan Pemasaran', '2021-12-15 18:50:31', '2021-12-15 18:50:31'),
(12, 5, 'Penjualan Harkan', '2021-12-15 18:58:51', '2021-12-15 18:58:51'),
(13, 5, 'Penjualan Rekum', '2021-12-15 18:59:11', '2021-12-15 18:59:11'),
(14, 5, 'Pengembangan Bisnis Rekum & Harkan', '2021-12-15 18:59:34', '2021-12-15 18:59:34'),
(15, 5, 'Dukungan Penjualan', '2021-12-15 18:59:50', '2021-12-15 18:59:50'),
(16, 6, 'Perencanaan & Pengendalian', '2021-12-15 19:04:39', '2021-12-15 19:04:39'),
(17, 6, 'Basic Desain', '2021-12-15 19:04:59', '2021-12-15 19:04:59'),
(18, 6, 'Desain Struktur & Perlengkapan Lambung', '2021-12-15 19:05:51', '2021-12-15 19:05:51'),
(19, 6, 'Desain Perlengkapan Permesinan', '2021-12-15 19:06:21', '2021-12-15 19:06:21'),
(20, 6, 'Desain Perlengkapan Listrik, Elektronika & Seniata', '2021-12-15 19:06:38', '2021-12-15 19:06:38'),
(21, 6, 'Penelitian & Pengembangan (Litbang)', '2021-12-15 19:07:14', '2021-12-15 19:07:14'),
(22, 7, 'QA/QC Bangunan Kapal', '2021-12-15 19:07:56', '2021-12-15 19:07:56'),
(23, 7, 'M/QC Rekayasa Umum', '2021-12-15 19:11:27', '2021-12-15 19:11:27'),
(24, 7, 'QtuQC Harkan', '2021-12-15 19:11:48', '2021-12-15 19:11:48'),
(25, 7, 'Warranty', '2021-12-15 19:12:03', '2021-12-15 19:12:03'),
(26, 8, 'Perencanaan & Pengendalian', '2021-12-15 19:13:12', '2021-12-15 19:13:12'),
(27, 8, 'Pengadaan Material', '2021-12-15 19:13:30', '2021-12-15 19:13:30'),
(28, 8, 'Pengadaan Jasa', '2021-12-15 19:13:46', '2021-12-15 19:13:46'),
(29, 8, 'Pergudangan', '2021-12-15 19:14:10', '2021-12-15 19:14:10'),
(30, 9, 'Perencanaan & Pengendalian', '2021-12-15 19:15:53', '2021-12-15 19:15:53'),
(31, 9, 'Kontruksi Kapal', '2021-12-15 19:17:13', '2021-12-15 19:17:13'),
(32, 9, 'MO & HO', '2021-12-15 19:18:35', '2021-12-15 19:18:35'),
(33, 9, 'Dukungan Produksi', '2021-12-15 19:22:19', '2021-12-15 19:22:19'),
(34, 9, 'Erection', '2021-12-15 19:22:39', '2021-12-15 19:22:39'),
(35, 10, 'Manajemen Proyek', '2021-12-15 19:23:36', '2021-12-15 19:23:36'),
(36, 10, 'Rekayasa Produksi', '2021-12-15 19:24:04', '2021-12-15 19:24:04'),
(37, 10, 'Perencanaan & Pengendalian Material', '2021-12-15 19:24:31', '2021-12-15 19:24:31'),
(38, 10, 'Lambung', '2021-12-15 19:24:53', '2021-12-15 19:24:53'),
(39, 10, 'Perlengkapan Kapal', '2021-12-15 19:25:19', '2021-12-15 19:25:19'),
(40, 10, 'Kualitas', '2021-12-15 19:32:00', '2021-12-15 19:32:00'),
(41, 10, 'Dukungan Produksi', '2021-12-15 19:32:28', '2021-12-15 19:32:28'),
(42, 11, 'Perencanaan & Pengendalian', '2021-12-15 19:34:25', '2021-12-15 19:34:25'),
(43, 11, 'Kontruksi Lambung', '2021-12-15 19:35:05', '2021-12-15 19:35:05'),
(44, 11, 'Erection', '2021-12-15 19:35:44', '2021-12-15 19:35:44'),
(45, 11, 'MO & EO', '2021-12-15 19:37:06', '2021-12-15 19:37:06'),
(46, 11, 'HO & AO', '2021-12-15 19:38:28', '2021-12-15 19:38:28'),
(47, 11, 'Dukungan Produksi', '2021-12-15 19:38:47', '2021-12-15 19:38:47'),
(48, 12, 'Perencanaan & Pengendalian', '2021-12-15 19:45:21', '2021-12-15 19:45:21'),
(49, 12, 'Rekayasa', '2021-12-15 19:45:46', '2021-12-15 19:45:46'),
(50, 12, 'Permesinan & Perakitan', '2021-12-15 19:46:54', '2021-12-15 19:46:54'),
(51, 12, 'Fabrikasi & Konstruksi', '2021-12-15 19:52:58', '2021-12-15 19:52:58'),
(52, 14, 'Akuntansi Manajemen', '2021-12-16 20:23:19', '2021-12-16 20:23:19'),
(53, 14, 'Akuntansi Keuangan', '2021-12-16 20:23:45', '2021-12-16 20:23:45'),
(54, 14, 'Akuntansi Biaya', '2021-12-16 20:24:06', '2021-12-16 20:24:06'),
(55, 16, 'Manajemen Kas', '2021-12-16 20:26:19', '2021-12-16 20:26:19'),
(56, 16, 'Operasional', '2021-12-16 20:26:40', '2021-12-16 20:26:40'),
(57, 16, 'Perpajakan', '2021-12-16 20:27:13', '2021-12-16 20:27:13'),
(58, 16, 'Pembiayaan Proyek', '2021-12-16 20:27:39', '2021-12-16 20:27:39'),
(59, 16, 'Fasilitas bank & Investasi', '2021-12-16 20:28:16', '2021-12-16 20:28:16'),
(60, 17, 'lnfrastruktur dan Hardware', '2021-12-16 20:30:23', '2021-12-16 20:30:23'),
(61, 17, 'Aplikasi dan lntegrasi', '2021-12-16 20:30:54', '2021-12-16 20:30:54'),
(62, 18, 'Human Capital Service', '2021-12-16 20:33:45', '2021-12-16 20:33:45'),
(63, 18, 'Human Capital Development', '2021-12-16 20:34:18', '2021-12-16 20:34:18'),
(64, 18, 'Organization Development & Command Media', '2021-12-16 20:34:53', '2021-12-16 20:34:53'),
(65, 1, 'Lembaga Sertifikasi Profesi', '2021-12-16 20:35:17', '2021-12-16 20:35:17'),
(66, 19, 'Perencanaan Tata Ruang & Tata Graha', '2021-12-16 20:42:28', '2021-12-16 20:42:28'),
(67, 19, 'Fasilitas Umum & Utilitas', '2021-12-16 20:43:04', '2021-12-16 20:43:04'),
(68, 19, 'Pengadaan Non Produksi / Sarana Prasarana Perkantoran', '2021-12-16 20:43:44', '2021-12-16 20:43:44'),
(69, 20, 'Keamanan', '2021-12-16 20:46:49', '2021-12-16 20:46:49'),
(70, 20, 'K3LH', '2021-12-16 20:47:27', '2021-12-16 20:47:27'),
(71, 2, 'Pemeriksaan Keuangan', '2021-12-16 21:01:34', '2021-12-16 21:01:34'),
(72, 2, 'Pemeriksaan Produksi', '2021-12-16 21:02:19', '2021-12-16 21:02:19'),
(73, 2, 'Pemeriksaan Supporting', '2021-12-16 21:02:50', '2021-12-16 21:02:50'),
(74, 15, 'Rendal Korporasi', '2021-12-16 21:07:40', '2021-12-16 21:07:40'),
(75, 15, 'Rendal Produksi Korporasi', '2021-12-16 21:08:11', '2021-12-16 21:08:11');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
