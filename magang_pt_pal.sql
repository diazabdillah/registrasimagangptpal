-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jan 25, 2022 at 01:24 AM
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
-- Table structure for table `absenmhs`
--

DROP TABLE IF EXISTS `absenmhs`;
CREATE TABLE IF NOT EXISTS `absenmhs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_individu` bigint NOT NULL,
  `waktu_absen` datetime NOT NULL,
  `jenis_absen` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_absen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `absenpenelitian`
--

DROP TABLE IF EXISTS `absenpenelitian`;
CREATE TABLE IF NOT EXISTS `absenpenelitian` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_individu` bigint NOT NULL,
  `waktu_absen` datetime NOT NULL,
  `jenis_absen` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_absen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `absensmk`
--

DROP TABLE IF EXISTS `absensmk`;
CREATE TABLE IF NOT EXISTS `absensmk` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_individu` bigint NOT NULL,
  `waktu_absen` datetime NOT NULL,
  `jenis_absen` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `beasiswa`
--

DROP TABLE IF EXISTS `beasiswa`;
CREATE TABLE IF NOT EXISTS `beasiswa` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_beasiswa` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `institusi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beasiswa`
--

INSERT INTO `beasiswa` (`id`, `nama_beasiswa`, `institusi`, `url`, `created_at`, `updated_at`) VALUES
(1, 'beasiswa s1', 'mendikbud', 'https://beasiswa.kemdikbud.go.id/', '2022-01-07 04:22:55', '2022-01-07 04:22:55'),
(2, 'beasiswa s2', 'mendikbud', 'https://beasiswa.kemdikbud.go.id/', '2022-01-07 04:23:11', '2022-01-07 04:23:11'),
(3, 'beasiswa s3', 'kemdikbud', 'https://beasiswa.kemdikbud.go.id/', '2022-01-07 04:23:32', '2022-01-07 04:23:32'),
(4, 'beasiswa s4', 'kemdikbud', 'https://beasiswa.kemdikbud.go.id/', '2022-01-07 04:23:48', '2022-01-07 04:23:48'),
(5, 'beasiswa s5', 'kemdikbud', 'https://beasiswa.kemdikbud.go.id/', '2022-01-07 04:24:01', '2022-01-07 04:24:01'),
(6, 'beasiswa s6', 'kemdikbud', 'https://beasiswa.kemdikbud.go.id/', '2022-01-07 04:24:13', '2022-01-07 04:24:13'),
(7, 'beasiswa s7', 'kemdikbud', 'https://beasiswa.kemdikbud.go.id/', '2022-01-07 04:24:30', '2022-01-07 04:24:30');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

DROP TABLE IF EXISTS `contact_us`;
CREATE TABLE IF NOT EXISTS `contact_us` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daftar_ruangan`
--

DROP TABLE IF EXISTS `daftar_ruangan`;
CREATE TABLE IF NOT EXISTS `daftar_ruangan` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_ruangan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fasilitas` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kapasitas` int NOT NULL,
  `foto_ruangan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_mhs_indivs`
--

DROP TABLE IF EXISTS `data_mhs_indivs`;
CREATE TABLE IF NOT EXISTS `data_mhs_indivs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `nama` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `univ` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `strata` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_rumah` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departemen` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nim` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_penerimaan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_penelitian`
--

DROP TABLE IF EXISTS `data_penelitian`;
CREATE TABLE IF NOT EXISTS `data_penelitian` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `nama` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_instansi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `strata` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_rumah` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departemen` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judul_penelitian` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_penerimaan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_smk_indivs`
--

DROP TABLE IF EXISTS `data_smk_indivs`;
CREATE TABLE IF NOT EXISTS `data_smk_indivs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `nama` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sekolah` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_rumah` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departemen` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_penerimaan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id`, `id_divisi`, `nama_departemen`, `created_at`, `updated_at`) VALUES
(4, 1, 'Humas', '2021-12-15 11:44:06', '2021-12-15 11:44:06'),
(5, 1, 'Perwakilan Jakarta', '2021-12-15 11:44:31', '2021-12-15 11:44:31'),
(6, 1, 'Hukum & Kepatuhan', '2021-12-15 11:45:02', '2021-12-15 11:45:02'),
(7, 3, 'Perencanaan & Pengendalian(Rendal)', '2021-12-15 11:47:45', '2021-12-15 11:47:45'),
(8, 3, 'Sensor Weapon & Command (Sewaco)', '2021-12-15 11:48:23', '2021-12-15 11:48:23'),
(9, 4, 'Proposal Proyek Kapal', '2021-12-15 11:49:40', '2021-12-15 11:49:40'),
(10, 4, 'Pengembangan Pasar & Produk', '2021-12-15 11:50:02', '2021-12-15 11:50:02'),
(11, 4, 'Dukungan Pemasaran', '2021-12-15 11:50:31', '2021-12-15 11:50:31'),
(12, 5, 'Penjualan Harkan', '2021-12-15 11:58:51', '2021-12-15 11:58:51'),
(13, 5, 'Penjualan Rekum', '2021-12-15 11:59:11', '2021-12-15 11:59:11'),
(14, 5, 'Pengembangan Bisnis Rekum & Harkan', '2021-12-15 11:59:34', '2021-12-15 11:59:34'),
(15, 5, 'Dukungan Penjualan', '2021-12-15 11:59:50', '2021-12-15 11:59:50'),
(16, 6, 'Perencanaan & Pengendalian', '2021-12-15 12:04:39', '2021-12-15 12:04:39'),
(17, 6, 'Basic Desain', '2021-12-15 12:04:59', '2021-12-15 12:04:59'),
(18, 6, 'Desain Struktur & Perlengkapan Lambung', '2021-12-15 12:05:51', '2021-12-15 12:05:51'),
(19, 6, 'Desain Perlengkapan Permesinan', '2021-12-15 12:06:21', '2021-12-15 12:06:21'),
(20, 6, 'Desain Perlengkapan Listrik, Elektronika & Seniata', '2021-12-15 12:06:38', '2021-12-15 12:06:38'),
(21, 6, 'Penelitian & Pengembangan (Litbang)', '2021-12-15 12:07:14', '2021-12-15 12:07:14'),
(22, 7, 'QA/QC Bangunan Kapal', '2021-12-15 12:07:56', '2021-12-15 12:07:56'),
(23, 7, 'M/QC Rekayasa Umum', '2021-12-15 12:11:27', '2021-12-15 12:11:27'),
(24, 7, 'QtuQC Harkan', '2021-12-15 12:11:48', '2021-12-15 12:11:48'),
(25, 7, 'Warranty', '2021-12-15 12:12:03', '2021-12-15 12:12:03'),
(26, 8, 'Perencanaan & Pengendalian', '2021-12-15 12:13:12', '2021-12-15 12:13:12'),
(27, 8, 'Pengadaan Material', '2021-12-15 12:13:30', '2021-12-15 12:13:30'),
(28, 8, 'Pengadaan Jasa', '2021-12-15 12:13:46', '2021-12-15 12:13:46'),
(29, 8, 'Pergudangan', '2021-12-15 12:14:10', '2021-12-15 12:14:10'),
(30, 9, 'Perencanaan & Pengendalian', '2021-12-15 12:15:53', '2021-12-15 12:15:53'),
(31, 9, 'Kontruksi Kapal', '2021-12-15 12:17:13', '2021-12-15 12:17:13'),
(32, 9, 'MO & HO', '2021-12-15 12:18:35', '2021-12-15 12:18:35'),
(33, 9, 'Dukungan Produksi', '2021-12-15 12:22:19', '2021-12-15 12:22:19'),
(34, 9, 'Erection', '2021-12-15 12:22:39', '2021-12-15 12:22:39'),
(35, 10, 'Manajemen Proyek', '2021-12-15 12:23:36', '2021-12-15 12:23:36'),
(36, 10, 'Rekayasa Produksi', '2021-12-15 12:24:04', '2021-12-15 12:24:04'),
(37, 10, 'Perencanaan & Pengendalian Material', '2021-12-15 12:24:31', '2021-12-15 12:24:31'),
(38, 10, 'Lambung', '2021-12-15 12:24:53', '2021-12-15 12:24:53'),
(39, 10, 'Perlengkapan Kapal', '2021-12-15 12:25:19', '2021-12-15 12:25:19'),
(40, 10, 'Kualitas', '2021-12-15 12:32:00', '2021-12-15 12:32:00'),
(41, 10, 'Dukungan Produksi', '2021-12-15 12:32:28', '2021-12-15 12:32:28'),
(42, 11, 'Perencanaan & Pengendalian', '2021-12-15 12:34:25', '2021-12-15 12:34:25'),
(43, 11, 'Kontruksi Lambung', '2021-12-15 12:35:05', '2021-12-15 12:35:05'),
(44, 11, 'Erection', '2021-12-15 12:35:44', '2021-12-15 12:35:44'),
(45, 11, 'MO & EO', '2021-12-15 12:37:06', '2021-12-15 12:37:06'),
(46, 11, 'HO & AO', '2021-12-15 12:38:28', '2021-12-15 12:38:28'),
(47, 11, 'Dukungan Produksi', '2021-12-15 12:38:47', '2021-12-15 12:38:47'),
(48, 12, 'Perencanaan & Pengendalian', '2021-12-15 12:45:21', '2021-12-15 12:45:21'),
(49, 12, 'Rekayasa', '2021-12-15 12:45:46', '2021-12-15 12:45:46'),
(50, 12, 'Permesinan & Perakitan', '2021-12-15 12:46:54', '2021-12-15 12:46:54'),
(51, 12, 'Fabrikasi & Konstruksi', '2021-12-15 12:52:58', '2021-12-15 12:52:58'),
(52, 14, 'Akuntansi Manajemen', '2021-12-16 13:23:19', '2021-12-16 13:23:19'),
(53, 14, 'Akuntansi Keuangan', '2021-12-16 13:23:45', '2021-12-16 13:23:45'),
(54, 14, 'Akuntansi Biaya', '2021-12-16 13:24:06', '2021-12-16 13:24:06'),
(55, 16, 'Manajemen Kas', '2021-12-16 13:26:19', '2021-12-16 13:26:19'),
(56, 16, 'Operasional', '2021-12-16 13:26:40', '2021-12-16 13:26:40'),
(57, 16, 'Perpajakan', '2021-12-16 13:27:13', '2021-12-16 13:27:13'),
(58, 16, 'Pembiayaan Proyek', '2021-12-16 13:27:39', '2021-12-16 13:27:39'),
(59, 16, 'Fasilitas bank & Investasi', '2021-12-16 13:28:16', '2021-12-16 13:28:16'),
(60, 17, 'lnfrastruktur dan Hardware', '2021-12-16 13:30:23', '2021-12-16 13:30:23'),
(61, 17, 'Aplikasi dan lntegrasi', '2021-12-16 13:30:54', '2021-12-16 13:30:54'),
(62, 18, 'Human Capital Service', '2021-12-16 13:33:45', '2021-12-16 13:33:45'),
(63, 18, 'Human Capital Development', '2021-12-16 13:34:18', '2021-12-16 13:34:18'),
(64, 18, 'Organization Development & Command Media', '2021-12-16 13:34:53', '2021-12-16 13:34:53'),
(65, 1, 'Lembaga Sertifikasi Profesi', '2021-12-16 13:35:17', '2021-12-16 13:35:17'),
(66, 19, 'Perencanaan Tata Ruang & Tata Graha', '2021-12-16 13:42:28', '2021-12-16 13:42:28'),
(67, 19, 'Fasilitas Umum & Utilitas', '2021-12-16 13:43:04', '2021-12-16 13:43:04'),
(68, 19, 'Pengadaan Non Produksi / Sarana Prasarana Perkantoran', '2021-12-16 13:43:44', '2021-12-16 13:43:44'),
(69, 20, 'Keamanan', '2021-12-16 13:46:49', '2021-12-16 13:46:49'),
(70, 20, 'K3LH', '2021-12-16 13:47:27', '2021-12-16 13:47:27'),
(71, 2, 'Pemeriksaan Keuangan', '2021-12-16 14:01:34', '2021-12-16 14:01:34'),
(72, 2, 'Pemeriksaan Produksi', '2021-12-16 14:02:19', '2021-12-16 14:02:19'),
(73, 2, 'Pemeriksaan Supporting', '2021-12-16 14:02:50', '2021-12-16 14:02:50'),
(74, 15, 'Rendal Korporasi', '2021-12-16 14:07:40', '2021-12-16 14:07:40'),
(75, 15, 'Rendal Produksi Korporasi', '2021-12-16 14:08:11', '2021-12-16 14:08:11'),
(76, 18, 'Lembaga Sertifikasi Profesi', '2022-01-05 04:51:55', '2022-01-05 04:51:55'),
(78, 13, 'Dukungan Produksi', '2022-01-25 01:01:49', '2022-01-25 01:01:49'),
(79, 13, 'Perencanaan & Pengendalian', '2022-01-25 01:02:03', '2022-01-25 01:02:03'),
(80, 13, 'Produksi', '2022-01-25 01:02:25', '2022-01-25 01:02:25'),
(81, 13, 'Dok Gali', '2022-01-25 01:02:43', '2022-01-25 01:02:43'),
(82, 13, 'Dok Apung', '2022-01-25 01:02:54', '2022-01-25 01:02:54');

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
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id`, `nama_divisi`, `created_at`, `updated_at`) VALUES
(17, 'Teknologi Informasi', '2021-09-27 22:27:58', '2021-09-27 22:27:58'),
(16, 'Perbendaharaan', '2021-09-27 22:27:49', '2021-09-27 22:27:49'),
(15, 'Perencanaan Strategis Perusahaan & Manajemen Risiko', '2021-09-27 22:27:39', '2021-09-27 22:27:39'),
(14, 'Akuntansi', '2021-09-27 22:27:28', '2021-09-27 22:27:28'),
(13, 'Pemeliharaan dan Perbaikan', '2021-09-27 22:27:20', '2021-09-27 22:27:20'),
(12, 'Rekayasa Umum', '2021-09-27 22:26:52', '2021-09-27 22:26:52'),
(11, 'Kapal Niaga', '2021-09-27 22:26:44', '2021-09-27 22:26:44'),
(10, 'Kapal Selam', '2021-09-27 22:26:33', '2021-09-27 22:26:33'),
(9, 'Kapal Perang', '2021-09-27 22:26:25', '2021-09-27 22:26:25'),
(8, 'Supply Chain', '2021-09-27 22:26:18', '2021-09-27 22:26:18'),
(7, 'Jaminan Kualitas', '2021-09-27 22:26:11', '2021-09-27 22:26:11'),
(6, 'Desain', '2021-09-27 22:26:03', '2021-09-27 22:26:03'),
(5, 'Penjualan REKUMHAR', '2021-09-27 22:25:56', '2021-09-27 22:25:56'),
(4, 'Pemasaran dan Penjualan Kapal', '2021-09-27 22:25:44', '2021-09-27 22:25:44'),
(3, 'Naval Technology', '2021-09-27 22:25:32', '2021-09-27 22:25:32'),
(2, 'Satuan Pengawasan Intern', '2021-09-27 22:25:15', '2021-09-27 22:25:15'),
(1, 'Sekretaris Perusahaan', '2021-09-27 22:24:18', '2021-09-27 22:24:18'),
(18, 'Human Capital Management', '2021-09-27 22:28:14', '2021-09-27 22:28:14'),
(19, 'Kawasan', '2021-09-27 22:28:20', '2021-09-27 22:28:20'),
(20, 'Kemanan & K3LH', '2021-09-27 22:28:35', '2021-09-27 22:28:35'),
(21, 'Unit Tanggung Jawab Sosial & Lingkungan', '2021-09-27 22:28:53', '2021-09-27 22:28:53'),
(22, 'Office Of The Board', '2022-01-05 20:10:13', '2022-01-05 20:10:13'),
(23, 'Legal', '2022-01-05 20:10:25', '2022-01-05 20:10:25');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_mhs_indivs`
--

DROP TABLE IF EXISTS `file_mhs_indivs`;
CREATE TABLE IF NOT EXISTS `file_mhs_indivs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `path` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomorsurat` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_penelitian`
--

DROP TABLE IF EXISTS `file_penelitian`;
CREATE TABLE IF NOT EXISTS `file_penelitian` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `path` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomorsurat` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_smk_indivs`
--

DROP TABLE IF EXISTS `file_smk_indivs`;
CREATE TABLE IF NOT EXISTS `file_smk_indivs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `path` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomorsurat` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

DROP TABLE IF EXISTS `forum`;
CREATE TABLE IF NOT EXISTS `forum` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_user` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `konten` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foto_i_d_mhs`
--

DROP TABLE IF EXISTS `foto_i_d_mhs`;
CREATE TABLE IF NOT EXISTS `foto_i_d_mhs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_individu` bigint NOT NULL,
  `fotoID` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foto_i_d_penelitian`
--

DROP TABLE IF EXISTS `foto_i_d_penelitian`;
CREATE TABLE IF NOT EXISTS `foto_i_d_penelitian` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `fotoID` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foto_i_d_smks`
--

DROP TABLE IF EXISTS `foto_i_d_smks`;
CREATE TABLE IF NOT EXISTS `foto_i_d_smks` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_individu` bigint NOT NULL,
  `fotoID` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foto_mhs_models`
--

DROP TABLE IF EXISTS `foto_mhs_models`;
CREATE TABLE IF NOT EXISTS `foto_mhs_models` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_individu` bigint NOT NULL,
  `foto` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foto_penelitian_models`
--

DROP TABLE IF EXISTS `foto_penelitian_models`;
CREATE TABLE IF NOT EXISTS `foto_penelitian_models` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `foto` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foto_smk_models`
--

DROP TABLE IF EXISTS `foto_smk_models`;
CREATE TABLE IF NOT EXISTS `foto_smk_models` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_individu` bigint NOT NULL,
  `foto` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `judul` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `interview`
--

DROP TABLE IF EXISTS `interview`;
CREATE TABLE IF NOT EXISTS `interview` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_individu` bigint NOT NULL,
  `fileinterview` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `interview_smk`
--

DROP TABLE IF EXISTS `interview_smk`;
CREATE TABLE IF NOT EXISTS `interview_smk` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_individu` bigint NOT NULL,
  `fileinterview` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_sertifikasi`
--

DROP TABLE IF EXISTS `jadwal_sertifikasi`;
CREATE TABLE IF NOT EXISTS `jadwal_sertifikasi` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_training` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `penyelenggara` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` datetime NOT NULL,
  `tanggal_selesai` datetime NOT NULL,
  `tempat` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `peserta_sprint` int NOT NULL,
  `peserta_hadir` int NOT NULL,
  `fileSertifikasi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jumlah_asesor`
--

DROP TABLE IF EXISTS `jumlah_asesor`;
CREATE TABLE IF NOT EXISTS `jumlah_asesor` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomor_registrasi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_assessor` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

DROP TABLE IF EXISTS `komentar`;
CREATE TABLE IF NOT EXISTS `komentar` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `forum_id` bigint NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_user` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint NOT NULL,
  `konten` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kuota`
--

DROP TABLE IF EXISTS `kuota`;
CREATE TABLE IF NOT EXISTS `kuota` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `tanggal_buka` date NOT NULL,
  `tanggal_tutup` date NOT NULL,
  `divisi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kuota` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tw1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tw2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tw3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tw4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporans`
--

DROP TABLE IF EXISTS `laporans`;
CREATE TABLE IF NOT EXISTS `laporans` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path_revisi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_pembimbing_lapangan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_pembimbing_hcd` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revisi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revisi_divisi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `divisi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporans_smk`
--

DROP TABLE IF EXISTS `laporans_smk`;
CREATE TABLE IF NOT EXISTS `laporans_smk` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_revisi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jurusan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pembimbing_lapangan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_pembimbing_hcd` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revisi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revisi_divisi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `divisi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_penelitian`
--

DROP TABLE IF EXISTS `laporan_penelitian`;
CREATE TABLE IF NOT EXISTS `laporan_penelitian` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_09_02_093953_create_data_mhs_indivs_table', 1),
(6, '2021_09_02_094118_create_file_mhs_indivs_table', 1),
(7, '2021_09_02_094233_user_role', 1),
(8, '2021_09_02_094354_foto_mhs_model', 1),
(9, '2021_09_02_094505_data_smk_indivs', 1),
(10, '2021_09_02_094617_file_smk_indivs', 1),
(11, '2021_09_02_094710_foto_smk_models', 1),
(12, '2021_09_02_094816_mulai_dan_selesai_mhs', 1),
(13, '2021_09_02_100713_foto_i_d_mhs', 1),
(14, '2021_09_03_033609_foto_i_d_smks', 1),
(15, '2021_10_19_041613_create_absenmhs_tabel', 1),
(16, '2021_10_19_051054_create_kuota_tabel', 1),
(17, '2021_10_19_053337_create_divisi_tabel', 1),
(18, '2021_10_20_074607_create_laporan_tabel', 1),
(19, '2021_10_22_005528_create_penilaian_tabel', 1),
(20, '2021_10_23_164936_create_indexnilai_tabel', 1),
(21, '2021_10_25_070220_create_news_table', 1),
(22, '2021_10_27_081822_create_gallery_table', 1),
(23, '2021_11_04_154128_create_training_table', 1),
(24, '2021_11_04_154635_create_beasiswa_table', 1),
(25, '2021_11_04_155457_create_daftar_ruangan_table', 1),
(26, '2021_11_04_155637_create_peminjaman_ruangan_table', 1),
(27, '2021_11_05_035032_create_interview_tabel', 1),
(28, '2021_11_10_020649_create_unit_kerja_table', 1),
(29, '2021_11_10_021434_create_skema_bnsp_table', 1),
(30, '2021_11_10_021705_create_jumlah_asesor_table', 1),
(31, '2021_11_10_032440_create_interview_smk_tabel', 1),
(32, '2021_11_10_032911_create_absensmk_table', 1),
(33, '2021_11_10_033021_create_laporans_smk_table', 1),
(34, '2021_11_10_033158_create_penilaians_smk_table', 1),
(35, '2021_11_10_081241_create_mulai_dan_selesai_smk_table', 1),
(36, '2021_11_14_023424_create_data_penelitian_tabel', 1),
(37, '2021_11_14_023839_create_file_penelitian_tabel', 1),
(38, '2021_11_16_054035_foto_i_d_penelitian', 1),
(39, '2021_11_16_054232_foto_penelitian_models', 1),
(40, '2021_11_17_122911_create_absenpenelitian_tabel', 1),
(41, '2021_11_18_014156_create_laporan_penelitian_tabel', 1),
(42, '2021_11_18_025323_create_mulai_dan_selesai_penelitian_table', 1),
(43, '2021_11_24_113915_create_forum_table', 1),
(44, '2021_11_24_113950_create_komentar_table', 1),
(45, '2021_11_29_073550_create_jadwal_sertifikasi', 1),
(46, '2021_12_07_142646_create_departemen_table', 1),
(47, '2021_12_20_102415_create__rekapsmk_table', 1),
(48, '2021_12_20_102443_create__rekappenelitian_table', 1),
(49, '2021_12_20_102454_create__rekapmhs_table', 1),
(50, '2022_01_01_074336_create__rekap_absenmhs_table', 2),
(51, '2022_01_01_075100_create_rekapabsemhs_table', 3),
(52, '2022_01_01_075220_create_rekapabsenmhs_table', 4),
(53, '2022_01_01_162118_create_rekapabsensmk_table', 5),
(54, '2022_01_02_124705_create_rekapabsenpenelitian_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `mulai_dan_selesai_mhs`
--

DROP TABLE IF EXISTS `mulai_dan_selesai_mhs`;
CREATE TABLE IF NOT EXISTS `mulai_dan_selesai_mhs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `mulai` date NOT NULL,
  `selesai` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mulai_dan_selesai_penelitian`
--

DROP TABLE IF EXISTS `mulai_dan_selesai_penelitian`;
CREATE TABLE IF NOT EXISTS `mulai_dan_selesai_penelitian` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `mulai` date NOT NULL,
  `selesai` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mulai_dan_selesai_smk`
--

DROP TABLE IF EXISTS `mulai_dan_selesai_smk`;
CREATE TABLE IF NOT EXISTS `mulai_dan_selesai_smk` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `mulai` date NOT NULL,
  `selesai` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `judul` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `headline` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `konten` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_ruangan`
--

DROP TABLE IF EXISTS `peminjaman_ruangan`;
CREATE TABLE IF NOT EXISTS `peminjaman_ruangan` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `pilih_ruangan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_peminjam` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `departemen` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `keperluan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penilaians`
--

DROP TABLE IF EXISTS `penilaians`;
CREATE TABLE IF NOT EXISTS `penilaians` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `pembimbing` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Kerjasama` int NOT NULL,
  `MotivasiPercayaDiri` int NOT NULL,
  `InisiatifTanggungJawabKerja` int NOT NULL,
  `Loyalitas` int NOT NULL,
  `EtikaSopanSantun` int NOT NULL,
  `Disiplin` int NOT NULL,
  `PemahamanKemampuan` int NOT NULL,
  `KesehatanKeselamatanKerja` int NOT NULL,
  `laporankerja` int NOT NULL,
  `kehadiran` int NOT NULL,
  `average` int NOT NULL,
  `nilai_huruf` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_penilaian` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penilaians_smk`
--

DROP TABLE IF EXISTS `penilaians_smk`;
CREATE TABLE IF NOT EXISTS `penilaians_smk` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `pembimbing` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Kerjasama` int NOT NULL,
  `MotivasiPercayaDiri` int NOT NULL,
  `InisiatifTanggungJawabKerja` int NOT NULL,
  `Loyalitas` int NOT NULL,
  `EtikaSopanSantun` int NOT NULL,
  `Disiplin` int NOT NULL,
  `PemahamanKemampuan` int NOT NULL,
  `KesehatanKeselamatanKerja` int NOT NULL,
  `laporankerja` int NOT NULL,
  `kehadiran` int NOT NULL,
  `average` int NOT NULL,
  `nilai_huruf` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_penilaian` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rekapabsenmhs`
--

DROP TABLE IF EXISTS `rekapabsenmhs`;
CREATE TABLE IF NOT EXISTS `rekapabsenmhs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_individu` bigint NOT NULL,
  `waktu_absen` datetime NOT NULL,
  `jenis_absen` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_absen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rekapabsenpenelitian`
--

DROP TABLE IF EXISTS `rekapabsenpenelitian`;
CREATE TABLE IF NOT EXISTS `rekapabsenpenelitian` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_individu` bigint NOT NULL,
  `waktu_absen` datetime NOT NULL,
  `jenis_absen` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_absen` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rekapabsensmk`
--

DROP TABLE IF EXISTS `rekapabsensmk`;
CREATE TABLE IF NOT EXISTS `rekapabsensmk` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_individu` bigint NOT NULL,
  `waktu_absen` datetime NOT NULL,
  `jenis_absen` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_absen` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rekapmhs`
--

DROP TABLE IF EXISTS `rekapmhs`;
CREATE TABLE IF NOT EXISTS `rekapmhs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `nama` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `univ` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `strata` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_rumah` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departemen` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nim` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_penerimaan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_user` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mulai` date DEFAULT NULL,
  `selesai` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rekappenelitian`
--

DROP TABLE IF EXISTS `rekappenelitian`;
CREATE TABLE IF NOT EXISTS `rekappenelitian` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `nama` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_instansi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `strata` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_rumah` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departemen` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judul_penelitian` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_penerimaan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_user` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mulai` date DEFAULT NULL,
  `selesai` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rekapsmk`
--

DROP TABLE IF EXISTS `rekapsmk`;
CREATE TABLE IF NOT EXISTS `rekapsmk` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `nama` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sekolah` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_rumah` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departemen` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_penerimaan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_user` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mulai` date DEFAULT NULL,
  `selesai` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skema_bnsp`
--

DROP TABLE IF EXISTS `skema_bnsp`;
CREATE TABLE IF NOT EXISTS `skema_bnsp` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_skema` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_skema` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int NOT NULL,
  `bidang` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

DROP TABLE IF EXISTS `training`;
CREATE TABLE IF NOT EXISTS `training` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_training` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `penyelenggara` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` datetime NOT NULL,
  `tanggal_selesai` datetime NOT NULL,
  `tempat` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `peserta_sprint` int NOT NULL,
  `peserta_hadir` int NOT NULL,
  `fileTraining` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unit_kerja`
--

DROP TABLE IF EXISTS `unit_kerja`;
CREATE TABLE IF NOT EXISTS `unit_kerja` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_divisi` int NOT NULL,
  `divisi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int NOT NULL,
  `status_user` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `status_user`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Pusat', 'adminpusat@gmail.com', NULL, '$2y$10$0EIvwzn8sMIoofBBng3x5e9pAogE7lSfM6AQbVQr8NokiJIbCJism', 1, 'Admin Pusat', NULL, '2021-12-29 02:03:05', '2021-12-29 02:03:05'),
(2, 'Admin HCM', 'adminhcm@gmail.com', NULL, '$2y$10$Xw7QBIZnRq3z9LoYCz8smuxbCnj5AA.qJQSLgnZOAJR.9optzsRCO', 18, 'Admin HCM', NULL, '2021-12-29 02:03:57', '2021-12-29 02:03:57'),
(3, 'Admin Sekretaris Perusahaan', 'adminsekper@gmail.com', NULL, '$2y$10$PDl1ysrDS4282P7pZUz2XOPeRVnMPGEcS9OGB9Vlk9ZfbpZnP0Vra', 18, 'Admin Sekretaris Perusahaan', NULL, '2021-12-29 02:05:04', '2021-12-29 02:05:04'),
(4, 'Admin Satuan Pengawasan Intern', 'adminspi@gmail.com', NULL, '$2y$10$T6YK/fYEtFIvAs18qk8oKeKLoCMwPdcT3dHCP4NMSkpqmMdAQDG/C', 18, 'Admin Satuan Pengawasan Intern', NULL, '2021-12-29 02:05:28', '2021-12-29 02:05:28'),
(5, 'Admin Naval Technology', 'adminnavtech@gmail.com', NULL, '$2y$10$TTvMbFhNri5LFfSgSlwPVuESg06TdvKsGvF6urgfijatv9pQTURPe', 18, 'Admin Naval Technology', NULL, '2021-12-29 02:06:04', '2021-12-29 02:06:04'),
(6, 'Admin Pemasaran dan Penjualan Kapal', 'adminpdpk@gmail.com', NULL, '$2y$10$b1iBKUMuA.UQXVn.vnsioOxjAC4u88fP.L/Lz.FWrXgt2waM0lbv6', 18, 'Admin Pemasaran dan Penjualan Kapal', NULL, '2021-12-29 02:06:54', '2021-12-29 02:06:54'),
(7, 'Admin Penjualan REKUMHAR', 'adminprekumhar@gmail.com', NULL, '$2y$10$Uo3T2oVk0Wf4T/X1wCigCe/rdEV7P/FY7equpPo5f1goWxfSPg/Tq', 18, 'Admin Penjualan REKUMHAR', NULL, '2021-12-29 02:07:21', '2021-12-29 02:07:21'),
(8, 'Admin Desain', 'admindesain@gmail.com', NULL, '$2y$10$yfW4QmYrHSxWwkzYUyNHR.qjfmoZY8NZWPnebCGNgiEHeBhbEo3A2', 18, 'Admin Desain', NULL, '2021-12-29 02:07:55', '2021-12-29 02:07:55'),
(9, 'Admin Jaminan Kualitas', 'adminjaminankualitas@gmail.com', NULL, '$2y$10$PH8bxllJwSj..vt7hQv8ae27O2qxRch2jGCma5NtOjlH2dDFcGUEm', 18, 'Admin Jaminan Kualitas', NULL, '2021-12-29 02:08:20', '2021-12-29 02:08:20'),
(10, 'Admin Supply Chain', 'adminsupplychain@gmail.com', NULL, '$2y$10$BNArCU5Ge1P56WC90wiLa.qaSn0u0RqCYv49lW9t2mmKPUVyF9VTu', 18, 'Admin Supply Chain', NULL, '2021-12-29 02:08:59', '2021-12-29 02:08:59'),
(11, 'Admin Kapal Perang', 'adminkaprang@gmail.com', NULL, '$2y$10$h8896e.sea58SCsR9AaqEemyiRIalzdrJ4vdo4jMTc4nBD4mejgwq', 18, 'Admin Kapal Perang', NULL, '2021-12-29 02:09:18', '2021-12-29 02:09:18'),
(12, 'Admin Kapal Selam', 'adminkasel@gmail.com', NULL, '$2y$10$vfioizRvtdCzvF9yussmSOfOwumk93tAnAirqNCqx/UuKFY3ykMye', 18, 'Admin Kapal Selam', NULL, '2021-12-29 02:09:39', '2021-12-29 02:09:39'),
(13, 'Admin Kapal Niaga', 'adminkapalniaga@gmail.com', NULL, '$2y$10$j4Oaw1Oo9dd2Z4mhXRTZAOleOhCmeN6VMxcl5YFmARfuD57yn0Oxy', 18, 'Admin Kapal Niaga', NULL, '2021-12-29 02:10:02', '2021-12-29 02:10:02'),
(14, 'Admin Rekayasa Umum', 'adminrekum@gmail.com', NULL, '$2y$10$ThTUrD6lEHIJhXX/UiESGuuJhel6IS2HDpeHT.qaIVuB.07L1syfe', 18, 'Admin Rekayasa Umum', NULL, '2021-12-29 02:10:18', '2021-12-29 02:10:18'),
(15, 'Admin Pemeliharaan dan Perbaikan', 'adminpdp@gmail.com', NULL, '$2y$10$1MVLe.GjzDxjmXIdhH5XUO26QwpIROZ3DhSCqZpCijq6inT.IvHqi', 18, 'Admin Pemeliharaan dan Perbaikan', NULL, '2021-12-29 02:10:44', '2021-12-29 02:10:44'),
(16, 'Admin Akuntansi', 'adminakuntansi@gmail.com', NULL, '$2y$10$aOy8VUBy6hyH2s0jT.stT.UBdwLwcY4VNbilxCYS.gq24zKLXHHM.', 18, 'Admin Akuntansi', NULL, '2021-12-29 02:11:03', '2021-12-29 02:11:03'),
(17, 'Admin Perencanaan Strategis Perusahaan', 'adminpsp@gmail.com', NULL, '$2y$10$fR9WZ2xz58mOrqP2vJFTU.lHTf2L.wXtwMi8AVcFnkJlSqlEQ8Slq', 18, 'Admin Perencanaan Strategis Perusahaan', NULL, '2021-12-29 02:11:40', '2021-12-29 02:11:40'),
(18, 'Admin Perbendaharaan', 'adminperbendaharaan@gmail.com', NULL, '$2y$10$mpLrMaqexiJfT7YnFwr0muueZ1TaNu8Ycn2KTKMUu3pD3/lf15rTa', 18, 'Admin Perbendaharaan', NULL, '2021-12-29 02:12:09', '2021-12-29 02:12:09'),
(19, 'Admin Teknologi Informasi', 'adminti@gmail.com', NULL, '$2y$10$LvvWI1ZUX6zwe/znxxAB.uQasETDM.Wt7o6ZpJui9pjGCfeKlbSkK', 18, 'Admin Teknologi Informasi', NULL, '2021-12-29 02:12:29', '2021-12-29 02:12:29'),
(20, 'Admin Kawasan', 'adminkawasan@gmail.com', NULL, '$2y$10$sKCPXM97G0lnuqlx2hDF7eDjFBnwoCb9f7q.1/pE/CzdY0YXSIXY6', 18, 'Admin Kawasan', NULL, '2021-12-29 02:12:53', '2021-12-29 02:12:53'),
(21, 'Admin Keamanan & K3LH', 'adminkeamanan@gmail.com', NULL, '$2y$10$2CNpGdyvzEYtAlkfCa0L3.eDDIPgeWG0/5CR58JxgFq9KA7VboyKi', 18, 'Admin Keamanan & K3LH', NULL, '2021-12-29 02:13:17', '2021-12-29 02:13:17'),
(22, 'Admin Legal', 'legal@gmail.com', NULL, '$2y$10$SU0bLOJRvE9ziixY8SE9refqnSqfJzROI2aVDszJcGcccoNPICL8K', 18, 'Admin Legal', NULL, '2022-01-12 01:51:30', '2022-01-12 01:51:30'),
(23, 'Admin Office of The Board', 'office@gmail.com', NULL, '$2y$10$XPaQPG.raMqflHS65osF/eqDUlUTi4Rs6dEK1aWuGnCQ2I92exVSa', 18, 'Admin Office Of The Board', NULL, '2022-01-12 02:33:38', '2022-01-12 02:33:38');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
