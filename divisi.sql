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
-- Table structure for table `divisi`
--

DROP TABLE IF EXISTS `divisi`;
CREATE TABLE IF NOT EXISTS `divisi` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_divisi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id`, `nama_divisi`, `created_at`, `updated_at`) VALUES
(1, 'Sekretaris Perusahaan', '2021-09-28 12:24:18', '2021-09-28 12:24:18'),
(2, 'Satuan Pengawasan Intern', '2021-09-28 12:25:15', '2021-09-28 12:25:15'),
(3, 'Naval Technology', '2021-09-28 12:25:32', '2021-09-28 12:25:32'),
(4, 'Pemasaran dan Penjualan Kapal', '2021-09-28 12:25:44', '2021-09-28 12:25:44'),
(5, 'Penjualan REKUMHAR', '2021-09-28 12:25:56', '2021-09-28 12:25:56'),
(6, 'Desain', '2021-09-28 12:26:03', '2021-09-28 12:26:03'),
(7, 'Jaminan Kualitas', '2021-09-28 12:26:11', '2021-09-28 12:26:11'),
(8, 'Supply Chain', '2021-09-28 12:26:18', '2021-09-28 12:26:18'),
(9, 'Kapal Perang', '2021-09-28 12:26:25', '2021-09-28 12:26:25'),
(10, 'Kapal Selam', '2021-09-28 12:26:33', '2021-09-28 12:26:33'),
(11, 'Kapal Niaga', '2021-09-28 12:26:44', '2021-09-28 12:26:44'),
(12, 'Rekayasa Umum', '2021-09-28 12:26:52', '2021-09-28 12:26:52'),
(13, 'Pemeliharaan dan Perbaikan', '2021-09-28 12:27:20', '2021-09-28 12:27:20'),
(14, 'Akuntansi', '2021-09-28 12:27:28', '2021-09-28 12:27:28'),
(15, 'Perencanaan Strategis Perusahaan & Manajemen Risiko', '2021-09-28 12:27:39', '2021-09-28 12:27:39'),
(16, 'Perbendaharaan', '2021-09-28 12:27:49', '2021-09-28 12:27:49'),
(17, 'Teknologi Informasi', '2021-09-28 12:27:58', '2021-09-28 12:27:58'),
(18, 'Human Capital Management', '2021-09-28 12:28:14', '2021-09-28 12:28:14'),
(19, 'Kawasan', '2021-09-28 12:28:20', '2021-09-28 12:28:20'),
(20, 'Kemanan & K3LH', '2021-09-28 12:28:35', '2021-09-28 12:28:35'),
(21, 'Unit Tanggung Jawab Sosial & Lingkungan', '2021-09-28 12:28:53', '2021-09-28 12:28:53');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
