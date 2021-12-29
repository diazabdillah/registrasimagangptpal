-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Dec 29, 2021 at 01:21 AM
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
  `jenis_absen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `jenis_absen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `jenis_absen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `nama_beasiswa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `institusi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beasiswa`
--

INSERT INTO `beasiswa` (`id`, `nama_beasiswa`, `institusi`, `url`, `created_at`, `updated_at`) VALUES
(1, 'BEASISWA LPDP', 'Institusi : KEMENTRIAN PENDIDIKAN', 'https://www.pertamina.com/', '2021-12-02 23:08:24', '2021-12-02 23:08:24'),
(2, 'BEASISWA A', 'Institusi : Instansi A', 'http://www.pal.co.id', '2021-12-02 23:08:54', '2021-12-02 23:08:54');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_ruangan`
--

DROP TABLE IF EXISTS `daftar_ruangan`;
CREATE TABLE IF NOT EXISTS `daftar_ruangan` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_ruangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fasilitas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kapasitas` int NOT NULL,
  `foto_ruangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daftar_ruangan`
--

INSERT INTO `daftar_ruangan` (`id`, `nama_ruangan`, `fasilitas`, `kapasitas`, `foto_ruangan`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Louge Room', 'Kursi, Meja, Sound System, AC, mic', 200, 'Lounge_Room.jpg', 'Available', '2021-12-03 00:00:58', '2021-12-03 00:00:58');

-- --------------------------------------------------------

--
-- Table structure for table `data_mhs_indivs`
--

DROP TABLE IF EXISTS `data_mhs_indivs`;
CREATE TABLE IF NOT EXISTS `data_mhs_indivs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `univ` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strata` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_rumah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departemen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nim` int NOT NULL,
  `status_penerimaan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_mhs_indivs`
--

INSERT INTO `data_mhs_indivs` (`id`, `user_id`, `nama`, `univ`, `jurusan`, `strata`, `alamat_rumah`, `no_hp`, `divisi`, `departemen`, `nim`, `status_penerimaan`, `created_at`, `updated_at`) VALUES
(1, 2, 'Zaid Abdillah', 'PENS', 'Teknik Informatika', 'D4', 'Keputih', '08xxx', NULL, NULL, 2110191013, NULL, '2021-12-20 13:00:23', '2021-12-20 13:00:23');

-- --------------------------------------------------------

--
-- Table structure for table `data_penelitian`
--

DROP TABLE IF EXISTS `data_penelitian`;
CREATE TABLE IF NOT EXISTS `data_penelitian` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_instansi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strata` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_rumah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departemen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judul_penelitian` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_penerimaan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_penelitian`
--

INSERT INTO `data_penelitian` (`id`, `user_id`, `nama`, `asal_instansi`, `strata`, `jurusan`, `alamat_rumah`, `no_hp`, `divisi`, `departemen`, `judul_penelitian`, `status_penerimaan`, `created_at`, `updated_at`) VALUES
(1, 4, 'Made Rahano', 'PENS', 'D4', 'Teknik Informatika', 'Gubeng', '08xxx', NULL, NULL, 'Sabun Mandi', NULL, '2021-12-20 14:20:32', '2021-12-20 14:20:32');

-- --------------------------------------------------------

--
-- Table structure for table `data_smk_indivs`
--

DROP TABLE IF EXISTS `data_smk_indivs`;
CREATE TABLE IF NOT EXISTS `data_smk_indivs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sekolah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_rumah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departemen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nis` int NOT NULL,
  `status_penerimaan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_smk_indivs`
--

INSERT INTO `data_smk_indivs` (`id`, `user_id`, `nama`, `sekolah`, `jurusan`, `alamat_rumah`, `no_hp`, `divisi`, `departemen`, `nis`, `status_penerimaan`, `created_at`, `updated_at`) VALUES
(1, 3, 'Fabyan Kindarya', 'SMK Bhayangkari', 'Teknik Informatika', 'Sidoarjo', '08xxx', NULL, NULL, 1009, NULL, '2021-12-20 13:37:05', '2021-12-20 13:37:05');

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

DROP TABLE IF EXISTS `departemen`;
CREATE TABLE IF NOT EXISTS `departemen` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_divisi` int NOT NULL,
  `nama_departemen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(75, 15, 'Rendal Produksi Korporasi', '2021-12-16 14:08:11', '2021-12-16 14:08:11');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

DROP TABLE IF EXISTS `divisi`;
CREATE TABLE IF NOT EXISTS `divisi` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_divisi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id`, `nama_divisi`, `created_at`, `updated_at`) VALUES
(1, 'Sekretaris Perusahaan', '2021-09-28 05:24:18', '2021-09-28 05:24:18'),
(2, 'Satuan Pengawasan Intern', '2021-09-28 05:25:15', '2021-09-28 05:25:15'),
(3, 'Naval Technology', '2021-09-28 05:25:32', '2021-09-28 05:25:32'),
(4, 'Pemasaran dan Penjualan Kapal', '2021-09-28 05:25:44', '2021-09-28 05:25:44'),
(5, 'Penjualan REKUMHAR', '2021-09-28 05:25:56', '2021-09-28 05:25:56'),
(6, 'Desain', '2021-09-28 05:26:03', '2021-09-28 05:26:03'),
(7, 'Jaminan Kualitas', '2021-09-28 05:26:11', '2021-09-28 05:26:11'),
(8, 'Supply Chain', '2021-09-28 05:26:18', '2021-09-28 05:26:18'),
(9, 'Kapal Perang', '2021-09-28 05:26:25', '2021-09-28 05:26:25'),
(10, 'Kapal Selam', '2021-09-28 05:26:33', '2021-09-28 05:26:33'),
(11, 'Kapal Niaga', '2021-09-28 05:26:44', '2021-09-28 05:26:44'),
(12, 'Rekayasa Umum', '2021-09-28 05:26:52', '2021-09-28 05:26:52'),
(13, 'Pemeliharaan dan Perbaikan', '2021-09-28 05:27:20', '2021-09-28 05:27:20'),
(14, 'Akuntansi', '2021-09-28 05:27:28', '2021-09-28 05:27:28'),
(15, 'Perencanaan Strategis Perusahaan & Manajemen Risiko', '2021-09-28 05:27:39', '2021-09-28 05:27:39'),
(16, 'Perbendaharaan', '2021-09-28 05:27:49', '2021-09-28 05:27:49'),
(17, 'Teknologi Informasi', '2021-09-28 05:27:58', '2021-09-28 05:27:58'),
(18, 'Human Capital Management', '2021-09-28 05:28:14', '2021-09-28 05:28:14'),
(19, 'Kawasan', '2021-09-28 05:28:20', '2021-09-28 05:28:20'),
(20, 'Kemanan & K3LH', '2021-09-28 05:28:35', '2021-09-28 05:28:35'),
(21, 'Unit Tanggung Jawab Sosial & Lingkungan', '2021-09-28 05:28:53', '2021-09-28 05:28:53');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomorsurat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_penelitian`
--

DROP TABLE IF EXISTS `file_penelitian`;
CREATE TABLE IF NOT EXISTS `file_penelitian` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomorsurat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomorsurat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

DROP TABLE IF EXISTS `forum`;
CREATE TABLE IF NOT EXISTS `forum` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `konten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `fotoID` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foto_i_d_penelitian`
--

DROP TABLE IF EXISTS `foto_i_d_penelitian`;
CREATE TABLE IF NOT EXISTS `foto_i_d_penelitian` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `fotoID` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `fotoID` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foto_penelitian_models`
--

DROP TABLE IF EXISTS `foto_penelitian_models`;
CREATE TABLE IF NOT EXISTS `foto_penelitian_models` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `judul`, `foto`, `url`, `created_at`, `updated_at`) VALUES
(2, 'Saya HIyama', '0', 'https://www.youtube.com/embed/drzd6M0sgOE', '2021-11-30 01:40:45', '2021-11-30 01:40:45'),
(3, 'Stiker Zaed', 'bfda97fd-6195-4a3d-b43e-f92c4cb6a237.png', '0', '2021-11-30 01:40:58', '2021-11-30 01:40:58'),
(4, 'Febyan', 'Fabyan.jpg', '0', '2021-12-01 10:39:35', '2021-12-01 10:39:35');

-- --------------------------------------------------------

--
-- Table structure for table `interview`
--

DROP TABLE IF EXISTS `interview`;
CREATE TABLE IF NOT EXISTS `interview` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_individu` bigint NOT NULL,
  `fileinterview` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_kepribadian` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ekstrovet` int NOT NULL,
  `introvet` int NOT NULL,
  `visioner` int NOT NULL,
  `realistik` int NOT NULL,
  `emosional` int NOT NULL,
  `rasional` int NOT NULL,
  `perencanaan` int NOT NULL,
  `improvisasi` int NOT NULL,
  `tegas` int NOT NULL,
  `waspada` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `interview_smk`
--

DROP TABLE IF EXISTS `interview_smk`;
CREATE TABLE IF NOT EXISTS `interview_smk` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_individu` bigint NOT NULL,
  `fileinterview` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_kepribadian` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ekstrovet` int NOT NULL,
  `introvet` int NOT NULL,
  `visioner` int NOT NULL,
  `realistik` int NOT NULL,
  `emosional` int NOT NULL,
  `rasional` int NOT NULL,
  `perencanaan` int NOT NULL,
  `improvisasi` int NOT NULL,
  `tegas` int NOT NULL,
  `waspada` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_sertifikasi`
--

DROP TABLE IF EXISTS `jadwal_sertifikasi`;
CREATE TABLE IF NOT EXISTS `jadwal_sertifikasi` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_training` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `penyelenggara` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` datetime NOT NULL,
  `tanggal_selesai` datetime NOT NULL,
  `tempat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `peserta_sprint` int NOT NULL,
  `peserta_hadir` int NOT NULL,
  `fileSertifikasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jumlah_asesor`
--

DROP TABLE IF EXISTS `jumlah_asesor`;
CREATE TABLE IF NOT EXISTS `jumlah_asesor` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomor_registrasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_assessor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

DROP TABLE IF EXISTS `komentar`;
CREATE TABLE IF NOT EXISTS `komentar` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `forum_id` bigint NOT NULL,
  `parent` bigint NOT NULL,
  `konten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `bagian` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_buka` date NOT NULL,
  `tanggal_tutup` date NOT NULL,
  `kuota` int NOT NULL,
  `divisi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departemen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kuota` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporans`
--

DROP TABLE IF EXISTS `laporans`;
CREATE TABLE IF NOT EXISTS `laporans` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revisi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_kumpul` date NOT NULL,
  `divisi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporans_smk`
--

DROP TABLE IF EXISTS `laporans_smk`;
CREATE TABLE IF NOT EXISTS `laporans_smk` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sinopsis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revisi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_kumpul` date NOT NULL,
  `divisi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sinopsis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revisi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_kumpul` date NOT NULL,
  `divisi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(23, '2021_10_27_112732_create_absen_indivs_tabel', 1),
(24, '2021_11_05_035032_create_interview_tabel', 1),
(25, '2021_11_10_032440_create_interview_smk_tabel', 1),
(26, '2021_11_10_032911_create_absensmk_table', 1),
(27, '2021_11_10_033021_create_laporans_smk_table', 1),
(28, '2021_11_10_033158_create_penilaians_smk_table', 1),
(29, '2021_11_10_081241_create_mulai_dan_selesai_smk_table', 1),
(30, '2021_11_10_153034_create_absen_smks_tabel', 1),
(31, '2021_11_14_023424_create_data_penelitian_tabel', 1),
(32, '2021_11_14_023839_create_file_penelitian_tabel', 1),
(33, '2021_11_16_054035_foto_i_d_penelitian', 1),
(34, '2021_11_16_054232_foto_penelitian_models', 1),
(35, '2021_11_17_122911_create_absenpenelitian_tabel', 1),
(36, '2021_11_18_012846_create_absen_penelitians_tabel', 1),
(37, '2021_11_18_014156_create_laporan_penelitian_tabel', 1),
(38, '2021_11_18_025323_create_mulai_dan_selesai_penelitian_table', 1),
(39, '2021_11_24_113915_create_forum_table', 1),
(40, '2021_11_24_113950_create_komentar_table', 1),
(41, '2021_12_07_142646_create_departemen_table', 1),
(42, '2021_12_20_102415_create__rekapsmk_table', 1),
(43, '2021_12_20_102443_create__rekappenelitian_table', 1),
(44, '2021_12_20_102454_create__rekapmhs_table', 1);

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
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `headline` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `konten` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `judul`, `headline`, `konten`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Sukses Laksanakan Commodore Inspection, KRI Cakra-401 Siap Perkuat Koarmada TNI AL', '(Panarukan, 22 November) PT PAL Indonesia (Persero) sekali lagi membuktikan kemampuan teknisnya dalam pemeliharaan kapal perang dengan melaksanakan overhaul terhadap kapal selam di jajaran TNI AL yakni KRI Cakra-401.', '<p>(Panarukan, 22 November) PT PAL Indonesia (Persero) sekali lagi membuktikan kemampuan teknisnya dalam pemeliharaan kapal perang dengan melaksanakan overhaul terhadap kapal selam di jajaran TNI AL yakni KRI Cakra-401. Dengan telah dilakukan Commodore Inspection pada KRI Cakra-401 di Panarukan, yang dipimpin oleh Waasops Kasal – Laksma TNI Wasis Priyono. Setelah dilaksanakannya serangkaian uji coba (HAT &amp; SAT), dilakukan Commodore Inspection dalam rangka meninjau kesesuaian dan kelaikan hasil dari overhaul (OVH) atau perbaikan menyeluruh pada kapal selam KRI Cakra-401 sesuai yang diamanatkan dalam kontrak. Sebagai alutsista dengan misi strategis, Project Manager (PM) KRI Cakra-401 Kolonel Laut (T) Wiranto dalam Commodore Inspection menyampaikan bahwa “KRI Cakra-401 telah mampu mencapai kecepatan maksimal di atas permukaan air dan di bawah permukaan air. Menilik fungsi dan kemampuan penyelamannya, KRI Cakra-401 juga telah menunjukkan hasil yang memuaskan dengan melakukan penyelaman sampai 200 meter” tuturnya. “Sebelumnya telah dilakukan pengujian terpisah pada seluruh sistem pipa dan katup-katup pokok kapal dengan tekanan 32-50 bar” tutur Kolonel Laut (P) Indra Agus Wijaya. Sebagai informasi 1 bar setara dengan tekanan air sedalam 10 meter, “sehingga disimpulkan sistem tersebut mampu menerima tekanan sampai lebih dari 300 meter” tutup Komandan Satuan Tugas (DanSatgas) Kolonel Laut (P) Indra Agus Wijaya.</p>', 'Sukses-Laksanakan-Commodore-InspectionKRI-Cakra-401-Siap-Perkuat-Koarmada-TNI-AL-1.jpeg', '2021-12-01 19:02:29', '2021-12-01 19:02:29'),
(2, 'Perkuat Global Supply Chain, Menlu Denmark Kunjungi PAL', 'Surabaya, 21 November 2021 – Ministry of Foreign Affairs (Kementerian Luar Negeri) Denmark H.E. Jeppe Sebastian Kofod, serta duta besar Denmark untuk Indonesia H.E Lars Bo Larsen bersama para rombongan berkunjung ke PT PAL Indonesia (Persero).', 'Surabaya, 21 November 2021 – Ministry of Foreign Affairs (Kementerian Luar Negeri) Denmark H.E. Jeppe Sebastian Kofod, serta duta besar Denmark untuk Indonesia H.E Lars Bo Larsen bersama para rombongan berkunjung ke PT PAL Indonesia (Persero). Kunjungan perdana oleh Kementerian Luar Negeri Denmark ini disambut langsung oleh CEO Bapak Kaharuddin Djenod bersama jajaran pejabat PAL di gedung Pusat Informasi Perusahaan (PIP) PT PAL Indonesia (Persero).  Bapak Kaharuddin Djenod dalam sambutannya menyampaikan “PAL selama ini telah melakukan kolaborasi dan kerjasama yang luar biasa dengan Denmark, terutama dengan Terma. Diwujudkan melalui supply radar pada empat proyek Kapal Cepat Rudal (KCR) 60 meter. Selain itu teknologi Denmark juga berperan dalam Kapal Bantu Rumah Sakit (BRS) yang menggunakan Naval Surveillance Radar-Scanter 6002”. Dilanjutkan sambutan dari Minister of Foreign Affairs of Denmark H.E. Jeppe Sebastian Kofod yang menyatakan bahwa “komunikasi dan kerjasama yang selama ini dilakukan Denmark, khususnya Terma merupakan bukti dari kolaborasi yang luar biasa. Kami berharap dalam waktu dekat akan adanya kerjasama dan kolaborasi yang lebih besar antara Indonesia khususnya PT PAL dengan Denmark” ujarnya. Dalam kesempatan tersebut, Menlu Denmark juga menunjukkan antusiasmenya atas rencana implementasi transfromasi industry maritim 4.0 yang akan dilakukan oleh PT PAL Indonesia (Persero).', '20211121-Perkuat-Global-Supply-Chain-Menlu-Denmark-Kunjungi-PAL-2.jpeg', '2021-12-01 23:45:13', '2021-12-01 23:45:13'),
(3, 'CEO PT PAL Indonesia (Persero) Resmikan TIM 4.0', '(Surabaya, 10 November 2021) Hari Pahlawan turut dirayakan dengan suka cita oleh PT PAL Indonesia (Persero). Tepat pada Hari Pahlawan, Bapak Kaharuddin Djenod selaku CEO PT PAL Indonesia (Persero)', '(Surabaya, 10 November 2021) Hari Pahlawan turut dirayakan dengan suka cita oleh PT PAL Indonesia (Persero). Tepat pada Hari Pahlawan, Bapak Kaharuddin Djenod selaku CEO PT PAL Indonesia (Persero) secara detil sampaikan konsep Transformasi Industri Maritim (TIM) 4.0. Acara tersebut dilaksanakan di Hanggar Divisi Kapal Selam dengan mengundang jajaran pejabat PT PAL Indonesia (Persero) eselon 1, eselon 2, dan eselon 3.  Sebagai tonggak terdepan dalam pengembangan industri maritim nasional, PT PAL Indonesia (Persero) terus mengembangkan diri untuk menyerap sebesar-besarnya peluang tersebut sebagai bentuk kontribusi kepada RI. Melalui lompatan kuantum ini, PT PAL Indonesia (Persero) akan mendukung pertahanan maritim Indonesia melalui pembangunan kapal kombatan dan non-kombatan sejumlah 2805 unit yang tersebar di seluruh perairan Indonesia. Dengan potensi pasar yang besar dan peluang untuk meningkatkan kapabilitas perusahaan, dibutuhkan dukungan aspek keuangan dan peningkatan kompetensi SDM guna menyerap segala potensi yang ada. Kerjasama yang dilakukan PT PAL Indonesia (Persero) dengan Bank/Asuransi/Lembaga keuangan non-bank (trade finance) dilaksanakan untuk meningkatkan kapasitas dalam pembiayaan. Salah satunya diwujudkan dalam restrukturisasi bunga hutang sehingga dapat meningkatkan status kredit.', 'Pemukulan-Gong-Oleh-CEO-PT-PAL-Indonesia-Persero-menandai-dimulainya-TIM-4.0-di-PT-PAL-Indonesia-Persero.jpeg', '2021-12-01 23:46:15', '2021-12-01 23:46:15'),
(4, 'Selesaikan Final Docking, Kapal Bantu Rumah Sakit (BRS) dr. Wahidin Sudirohusodo Siap Lanjutkan Harbour Acceptance Test', 'Surabaya, 03/11) Tim Kemanproan Kapal BRS PT PAL Indonesia (Persero), Tim Kelaikan Material (TKM) dari TNI AL, dan Tim Satgas sukses laksanakan Sea Trial pada Rigid Hull Inflatable Boat (RHIB) dan Landing Craft Vehicle Personnel (LCVP)', '<p><strong>(Surabaya, 03/11)</strong> Tim Kemanproan Kapal BRS PT PAL Indonesia (Persero), Tim Kelaikan Material (TKM) dari TNI AL, dan Tim Satgas sukses laksanakan Sea Trial pada Rigid Hull Inflatable Boat (RHIB) dan Landing Craft Vehicle Personnel (LCVP) kapal Bantu Rumah Sakit (BRS) dr. Wahidin Sudirohusodo, yang dilaksanakan tanggal 25 Oktober 2021 di PT PAL Indonesia (Persero). Rigid Hull Inflatable Boat (RHIB) dan Landing Craft Vehicle Personnel (LCVP) sendiri merupakan bagian dari kapal Bantu Rumah Sakit (BRS) dr. Wahidin Sudirohusodo. Uji coba tersebut menandai salah satu pencapaian proyek sebelum pelaksanaan Harbour Acceptance Test (HAT).</p><p>Sea Trial pada RHIB dan LCVP kapal Bantu Rumah Sakit (BRS) dr. Wahidin Sudirohusodo memenuhi parameter keberhasilan dengan tercapainya maximum speed sebesar 31,9 knots dan 30,7 knots pada LCVP ke-1 dan ke-2 dengan kondisi full load. Angka tersebut melebihi persyaratan minimum yang diamanatkan kontrak antara PAL dengan Mabes TNI AL yaitu sebesar 30 knots. Pada uji coba RHIB, maximun speed yang tercapai adalah 27,6 knots dengan persyaratan minimum 27 knots.</p><p><br>RHIB dan LCVP memiliki fungsi sebagai sarana angkut personil, relawan medis, atau peralatan dari darat ke kapal ataupun sebaliknya. Kapal Bantu Rumah Sakit (BRS) memiliki ukuran yang besar dan tidak bisa merapat ke daratan dalam kondisi tertentu atau diperlukan Tug Boat untuk menarik kapal ke dermaga, sehingga akan memakan waktu yang cukup lama. Hal ini membuat RHIB dan LCVP sangat diperlukan dalam mobilitas evakuasi medis dengan estimasi waktu lebih singkat, terutama dalam kondisi darurat.</p><p>Setelah dilakukan uji coba pada LCVP dan RHIB, akan dilanjutkan dengan final docking. Proses tersebut meliputi penyiapan peralatan pendukung di atas kapal untuk kelanjutan pekerjaan outstanding kapal, perbaikan lampu penerangan kapal yang berfungsi untuk pergeseran, open sea chest yang dilakukan pembersihan di dalamnya, pemeriksaan cat bawah garis air (BGA), penyempurnaan pengecatan di bagian kapal bawah garis air, pemeriksaan propeler dan daun kemudi (rudder blade), dan pembersihan bow thruster. Setelah final docking, akan dilakukan inclining test untuk memenuhi persyaratan HAT (Harbour Acceptance Test) dilanjutkan dengan SAT, dan serah-terima kapal.</p><p>Kemajuan proses pembangunan kapal Bantu Rumah Sakit dr. Wahidin Sudirohusodo secara keseluruhan telah mencapai sebesar 96,259%, dengan semua block sudah terpasang 100%,. Alat kesehatan yang telah siap beroperasi meliputi: X-Ray, CT-Scan, Mortuary Refrigerator, CSSD dan Ruang Isolasi untuk penanggulangan wabah menular seperti Covid-19.</p><p><strong>Tentang PT PAL Indonesia (Persero)</strong><br>PT PAL Indonesia (Persero) merupakan perusahaan galangan kapal terbesar di Indonesia. Kami memiliki keunggulan bisnis pada kapabilitas Pembangunan dan rancang-bangun Kapal Perang dan Kapal Niaga; Pembangunan dan Maintenance, Repair, dan Overhaul ( MRO ) Kapal Selam; Maintenance, Repair, dan Overhaul Kapal Perang, Kapal Niaga, dan produk-produk kemaritiman; General Engineering produk Energi dan Elektrifikasi; dan Technology Development.</p>', 'IMG-20211025-WA0048.jpg', '2021-12-02 01:05:50', '2021-12-02 01:05:50');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `pilih_ruangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_peminjam` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `departemen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `keperluan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peminjaman_ruangan`
--

INSERT INTO `peminjaman_ruangan` (`id`, `pilih_ruangan`, `nama_peminjam`, `divisi`, `departemen`, `no_telp`, `tanggal_mulai`, `tanggal_selesai`, `jam_mulai`, `jam_selesai`, `keperluan`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Louge Room', 'Fabyan', 'HCM', 'ODCM', '231241241', '2021-12-03', '2021-12-08', '08:00:00', '16:00:00', 'nobar', 'Proses', '2021-12-03 00:02:22', '2021-12-03 00:02:22');

-- --------------------------------------------------------

--
-- Table structure for table `penilaians`
--

DROP TABLE IF EXISTS `penilaians`;
CREATE TABLE IF NOT EXISTS `penilaians` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `pembimbing` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `nilai_huruf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_penilaian` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penilaians_smk`
--

DROP TABLE IF EXISTS `penilaians_smk`;
CREATE TABLE IF NOT EXISTS `penilaians_smk` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `pembimbing` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `nilai_huruf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_penilaian` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penilaians_smk`
--

INSERT INTO `penilaians_smk` (`id`, `user_id`, `pembimbing`, `Kerjasama`, `MotivasiPercayaDiri`, `InisiatifTanggungJawabKerja`, `Loyalitas`, `EtikaSopanSantun`, `Disiplin`, `PemahamanKemampuan`, `KesehatanKeselamatanKerja`, `laporankerja`, `kehadiran`, `average`, `nilai_huruf`, `status_penilaian`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '2021-12-20 13:37:05', '2021-12-20 13:37:05');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rekapmhs`
--

DROP TABLE IF EXISTS `rekapmhs`;
CREATE TABLE IF NOT EXISTS `rekapmhs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `univ` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strata` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_rumah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departemen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nim` int NOT NULL,
  `status_penerimaan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_instansi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strata` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_rumah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departemen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judul_penelitian` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_penerimaan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rekappenelitian`
--

INSERT INTO `rekappenelitian` (`id`, `user_id`, `nama`, `asal_instansi`, `strata`, `jurusan`, `alamat_rumah`, `no_hp`, `divisi`, `departemen`, `judul_penelitian`, `status_penerimaan`, `created_at`, `updated_at`) VALUES
(1, 4, 'Made Rahano', 'PENS', 'D4', 'Teknik Informatika', 'Gubeng', '08xxx', NULL, NULL, 'Sabun Mandi', NULL, '2021-12-20 14:20:32', '2021-12-20 14:20:32');

-- --------------------------------------------------------

--
-- Table structure for table `rekapsmk`
--

DROP TABLE IF EXISTS `rekapsmk`;
CREATE TABLE IF NOT EXISTS `rekapsmk` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sekolah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_rumah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departemen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nis` int NOT NULL,
  `status_penerimaan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rekapsmk`
--

INSERT INTO `rekapsmk` (`id`, `user_id`, `nama`, `sekolah`, `jurusan`, `alamat_rumah`, `no_hp`, `divisi`, `departemen`, `nis`, `status_penerimaan`, `created_at`, `updated_at`) VALUES
(1, 3, 'Fabyan Kindarya', 'SMK Bhayangkari', 'Teknik Informatika', 'Sidoarjo', '08xxx', NULL, NULL, 1009, NULL, '2021-12-20 13:37:05', '2021-12-20 13:37:05');

-- --------------------------------------------------------

--
-- Table structure for table `skema_bnsp`
--

DROP TABLE IF EXISTS `skema_bnsp`;
CREATE TABLE IF NOT EXISTS `skema_bnsp` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_skema` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_skema` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int NOT NULL,
  `bidang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

DROP TABLE IF EXISTS `training`;
CREATE TABLE IF NOT EXISTS `training` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_training` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `penyelenggara` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` timestamp NULL DEFAULT NULL,
  `tanggal_selesai` timestamp NULL DEFAULT NULL,
  `tempat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `peserta_sprint` int NOT NULL,
  `peserta_hadir` int NOT NULL,
  `fileTraining` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`id`, `nama_training`, `penyelenggara`, `tanggal_mulai`, `tanggal_selesai`, `tempat`, `peserta_sprint`, `peserta_hadir`, `fileTraining`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Pelatihan pemadam kebakaran & P3K _Divisi Kawasan dan KAM & K3LH', 'PT. PAL Indonesia (Persero)', '2021-12-01 01:00:00', '2021-12-05 09:00:00', 'Divisi Kawasan', 21, 20, '{\"fileTraining\":\"Katalog Booth & Avatar SimHive v6.0 Fix.pdf\"}', 'Proses', '2021-12-02 23:10:44', '2021-12-02 23:10:44'),
(2, 'fjkkasldfj', 'dsjfklajslkdf', '2021-12-03 09:25:00', '2021-12-03 12:25:00', 'fsafsadfs', 21, 11, '{\"fileTraining\":\"{\\\"fileTraining\\\":\\\"Katalog Booth & Avatar SimHive v6.0 Fix.pdf\\\"}\"}', 'Proses', '2021-12-03 02:24:05', '2021-12-03 02:24:05'),
(3, 'fasdfasdf', 'asdfasdfas', '2021-12-03 09:32:00', '2021-12-03 12:32:00', 'fsadfasd', 21, 22, '{\"fileTraining\":\"{\\\"fileTraining\\\":\\\"Katalog Booth & Avatar SimHive v6.0 Fix.pdf\\\"}\"}', 'Selesai', '2021-12-03 02:31:56', '2021-12-03 02:31:56'),
(4, 'ghjhjhjhjgjhgk', 'hjkhjk', '2021-12-03 09:33:00', '2021-12-03 13:33:00', 'fasfasd', 21, 224, 'Katalog Booth & Avatar SimHive v6.0 Fix.pdf', 'Proses', '2021-12-03 02:34:07', '2021-12-03 02:34:07'),
(5, 'ffsdfasdfasdf', 'safsadfasdfas', '2021-12-02 09:53:00', '2021-12-10 09:53:00', 'adfasdfa', 25, 75, 'IJISRT20AUG414_(1).pdf', 'Proses', '2021-12-03 02:53:31', '2021-12-03 02:53:31'),
(6, 'et3qeterer', 'qertqwerwrerq', '2021-12-03 10:53:00', '2021-12-16 09:55:00', 'rqwerwqer', 41, 555, '-', 'Proses', '2021-12-03 02:53:52', '2021-12-03 02:53:52'),
(7, 'sfasfasdfasdf', '3r3tqffqwefqerf', '2021-12-03 10:18:00', '2021-12-03 11:18:00', 'fqwefqwef', 51, 654, 'WCECS2018_pp349-356.pdf', 'Proses', '2021-12-03 02:54:16', '2021-12-03 02:54:16');

-- --------------------------------------------------------

--
-- Table structure for table `unit_kerja`
--

DROP TABLE IF EXISTS `unit_kerja`;
CREATE TABLE IF NOT EXISTS `unit_kerja` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_divisi` int NOT NULL,
  `divisi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int NOT NULL,
  `status_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `status_user`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin pusat', 'admin@gmail.com', NULL, '$2y$10$X6P2rcoaYnllxPL5lq9NguE4OK9XL/cWKPm5VZndtIIlngBhagjBm', 1, 'Mahasiswa', NULL, '2021-12-19 14:49:21', '2021-12-19 14:49:21'),
(2, 'zaid', 'zaidabdillah@gmail.com', NULL, '$2y$10$s3sGlIg0iH7rL9L37EuvkuZmLsQiXYrLriKk1LHdp9.5L/dCucTlq', 3, 'Mahasiswa', NULL, '2021-12-19 14:54:14', '2021-12-19 14:54:14'),
(3, 'Fabyan Kindarya', 'fabyan@gmail.com', NULL, '$2y$10$gMR81pHLFSx2XEIcY6PbKumupRusiprp66XdlObUvXj5/xpH09UCC', 4, 'SMK', NULL, '2021-12-20 13:27:13', '2021-12-20 13:27:13'),
(4, 'Made Rahano', 'rahano@gmail.com', NULL, '$2y$10$oKqRAtA35VB0lbKbLIWZ3OEdkwzEJdwhiE88jhIyc7ndTAkYLkL1C', 23, 'Penelitian', NULL, '2021-12-20 14:14:53', '2021-12-20 14:14:53');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
