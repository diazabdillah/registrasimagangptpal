-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2022 at 05:44 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

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

CREATE TABLE `absenmhs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_individu` bigint(20) NOT NULL,
  `waktu_absen` datetime NOT NULL,
  `jenis_absen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_absen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `absenpenelitian`
--

CREATE TABLE `absenpenelitian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_individu` bigint(20) NOT NULL,
  `waktu_absen` datetime NOT NULL,
  `jenis_absen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_absen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `absensmk`
--

CREATE TABLE `absensmk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_individu` bigint(20) NOT NULL,
  `waktu_absen` datetime NOT NULL,
  `jenis_absen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_absen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `beasiswa`
--

CREATE TABLE `beasiswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_beasiswa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institusi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daftar_ruangan`
--

CREATE TABLE `daftar_ruangan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_ruangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fasilitas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `foto_ruangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_mhs_indivs`
--

CREATE TABLE `data_mhs_indivs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `univ` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strata` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_rumah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departemen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nim` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_penerimaan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_penelitian`
--

CREATE TABLE `data_penelitian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_penelitian`
--

INSERT INTO `data_penelitian` (`id`, `user_id`, `nama`, `asal_instansi`, `strata`, `jurusan`, `alamat_rumah`, `no_hp`, `divisi`, `departemen`, `judul_penelitian`, `status_penerimaan`, `created_at`, `updated_at`) VALUES
(1, 23, 'penelitian', 'pens', 'D3', 'Teknik Informatika', 'Sdr 1', '08155787869', NULL, NULL, 'kapal auto pilot', NULL, '2022-01-12 03:17:56', '2022-01-12 03:17:56');

-- --------------------------------------------------------

--
-- Table structure for table `data_smk_indivs`
--

CREATE TABLE `data_smk_indivs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sekolah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_rumah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departemen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_penerimaan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_smk_indivs`
--

INSERT INTO `data_smk_indivs` (`id`, `user_id`, `nama`, `sekolah`, `jurusan`, `alamat_rumah`, `no_hp`, `divisi`, `departemen`, `nis`, `status_penerimaan`, `created_at`, `updated_at`) VALUES
(1, 22, 'SMK Sahaje La', 'SMK PAL', 'Teknik Informatika', 'Sdr 1', '08155787869', NULL, NULL, '11729', NULL, '2022-01-12 02:40:34', '2022-01-12 02:40:34');

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `nama_departemen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id`, `id_divisi`, `nama_departemen`, `created_at`, `updated_at`) VALUES
(4, 1, 'Humas', '2021-12-15 04:44:06', '2021-12-15 04:44:06'),
(5, 1, 'Perwakilan Jakarta', '2021-12-15 04:44:31', '2021-12-15 04:44:31'),
(6, 1, 'Hukum & Kepatuhan', '2021-12-15 04:45:02', '2021-12-15 04:45:02'),
(7, 3, 'Perencanaan & Pengendalian(Rendal)', '2021-12-15 04:47:45', '2021-12-15 04:47:45'),
(8, 3, 'Sensor Weapon & Command (Sewaco)', '2021-12-15 04:48:23', '2021-12-15 04:48:23'),
(9, 4, 'Proposal Proyek Kapal', '2021-12-15 04:49:40', '2021-12-15 04:49:40'),
(10, 4, 'Pengembangan Pasar & Produk', '2021-12-15 04:50:02', '2021-12-15 04:50:02'),
(11, 4, 'Dukungan Pemasaran', '2021-12-15 04:50:31', '2021-12-15 04:50:31'),
(12, 5, 'Penjualan Harkan', '2021-12-15 04:58:51', '2021-12-15 04:58:51'),
(13, 5, 'Penjualan Rekum', '2021-12-15 04:59:11', '2021-12-15 04:59:11'),
(14, 5, 'Pengembangan Bisnis Rekum & Harkan', '2021-12-15 04:59:34', '2021-12-15 04:59:34'),
(15, 5, 'Dukungan Penjualan', '2021-12-15 04:59:50', '2021-12-15 04:59:50'),
(16, 6, 'Perencanaan & Pengendalian', '2021-12-15 05:04:39', '2021-12-15 05:04:39'),
(17, 6, 'Basic Desain', '2021-12-15 05:04:59', '2021-12-15 05:04:59'),
(18, 6, 'Desain Struktur & Perlengkapan Lambung', '2021-12-15 05:05:51', '2021-12-15 05:05:51'),
(19, 6, 'Desain Perlengkapan Permesinan', '2021-12-15 05:06:21', '2021-12-15 05:06:21'),
(20, 6, 'Desain Perlengkapan Listrik, Elektronika & Seniata', '2021-12-15 05:06:38', '2021-12-15 05:06:38'),
(21, 6, 'Penelitian & Pengembangan (Litbang)', '2021-12-15 05:07:14', '2021-12-15 05:07:14'),
(22, 7, 'QA/QC Bangunan Kapal', '2021-12-15 05:07:56', '2021-12-15 05:07:56'),
(23, 7, 'M/QC Rekayasa Umum', '2021-12-15 05:11:27', '2021-12-15 05:11:27'),
(24, 7, 'QtuQC Harkan', '2021-12-15 05:11:48', '2021-12-15 05:11:48'),
(25, 7, 'Warranty', '2021-12-15 05:12:03', '2021-12-15 05:12:03'),
(26, 8, 'Perencanaan & Pengendalian', '2021-12-15 05:13:12', '2021-12-15 05:13:12'),
(27, 8, 'Pengadaan Material', '2021-12-15 05:13:30', '2021-12-15 05:13:30'),
(28, 8, 'Pengadaan Jasa', '2021-12-15 05:13:46', '2021-12-15 05:13:46'),
(29, 8, 'Pergudangan', '2021-12-15 05:14:10', '2021-12-15 05:14:10'),
(30, 9, 'Perencanaan & Pengendalian', '2021-12-15 05:15:53', '2021-12-15 05:15:53'),
(31, 9, 'Kontruksi Kapal', '2021-12-15 05:17:13', '2021-12-15 05:17:13'),
(32, 9, 'MO & HO', '2021-12-15 05:18:35', '2021-12-15 05:18:35'),
(33, 9, 'Dukungan Produksi', '2021-12-15 05:22:19', '2021-12-15 05:22:19'),
(34, 9, 'Erection', '2021-12-15 05:22:39', '2021-12-15 05:22:39'),
(35, 10, 'Manajemen Proyek', '2021-12-15 05:23:36', '2021-12-15 05:23:36'),
(36, 10, 'Rekayasa Produksi', '2021-12-15 05:24:04', '2021-12-15 05:24:04'),
(37, 10, 'Perencanaan & Pengendalian Material', '2021-12-15 05:24:31', '2021-12-15 05:24:31'),
(38, 10, 'Lambung', '2021-12-15 05:24:53', '2021-12-15 05:24:53'),
(39, 10, 'Perlengkapan Kapal', '2021-12-15 05:25:19', '2021-12-15 05:25:19'),
(40, 10, 'Kualitas', '2021-12-15 05:32:00', '2021-12-15 05:32:00'),
(41, 10, 'Dukungan Produksi', '2021-12-15 05:32:28', '2021-12-15 05:32:28'),
(42, 11, 'Perencanaan & Pengendalian', '2021-12-15 05:34:25', '2021-12-15 05:34:25'),
(43, 11, 'Kontruksi Lambung', '2021-12-15 05:35:05', '2021-12-15 05:35:05'),
(44, 11, 'Erection', '2021-12-15 05:35:44', '2021-12-15 05:35:44'),
(45, 11, 'MO & EO', '2021-12-15 05:37:06', '2021-12-15 05:37:06'),
(46, 11, 'HO & AO', '2021-12-15 05:38:28', '2021-12-15 05:38:28'),
(47, 11, 'Dukungan Produksi', '2021-12-15 05:38:47', '2021-12-15 05:38:47'),
(48, 12, 'Perencanaan & Pengendalian', '2021-12-15 05:45:21', '2021-12-15 05:45:21'),
(49, 12, 'Rekayasa', '2021-12-15 05:45:46', '2021-12-15 05:45:46'),
(50, 12, 'Permesinan & Perakitan', '2021-12-15 05:46:54', '2021-12-15 05:46:54'),
(51, 12, 'Fabrikasi & Konstruksi', '2021-12-15 05:52:58', '2021-12-15 05:52:58'),
(52, 14, 'Akuntansi Manajemen', '2021-12-16 06:23:19', '2021-12-16 06:23:19'),
(53, 14, 'Akuntansi Keuangan', '2021-12-16 06:23:45', '2021-12-16 06:23:45'),
(54, 14, 'Akuntansi Biaya', '2021-12-16 06:24:06', '2021-12-16 06:24:06'),
(55, 16, 'Manajemen Kas', '2021-12-16 06:26:19', '2021-12-16 06:26:19'),
(56, 16, 'Operasional', '2021-12-16 06:26:40', '2021-12-16 06:26:40'),
(57, 16, 'Perpajakan', '2021-12-16 06:27:13', '2021-12-16 06:27:13'),
(58, 16, 'Pembiayaan Proyek', '2021-12-16 06:27:39', '2021-12-16 06:27:39'),
(59, 16, 'Fasilitas bank & Investasi', '2021-12-16 06:28:16', '2021-12-16 06:28:16'),
(60, 17, 'lnfrastruktur dan Hardware', '2021-12-16 06:30:23', '2021-12-16 06:30:23'),
(61, 17, 'Aplikasi dan lntegrasi', '2021-12-16 06:30:54', '2021-12-16 06:30:54'),
(62, 18, 'Human Capital Service', '2021-12-16 06:33:45', '2021-12-16 06:33:45'),
(63, 18, 'Human Capital Development', '2021-12-16 06:34:18', '2021-12-16 06:34:18'),
(64, 18, 'Organization Development & Command Media', '2021-12-16 06:34:53', '2021-12-16 06:34:53'),
(65, 1, 'Lembaga Sertifikasi Profesi', '2021-12-16 06:35:17', '2021-12-16 06:35:17'),
(66, 19, 'Perencanaan Tata Ruang & Tata Graha', '2021-12-16 06:42:28', '2021-12-16 06:42:28'),
(67, 19, 'Fasilitas Umum & Utilitas', '2021-12-16 06:43:04', '2021-12-16 06:43:04'),
(68, 19, 'Pengadaan Non Produksi / Sarana Prasarana Perkantoran', '2021-12-16 06:43:44', '2021-12-16 06:43:44'),
(69, 20, 'Keamanan', '2021-12-16 06:46:49', '2021-12-16 06:46:49'),
(70, 20, 'K3LH', '2021-12-16 06:47:27', '2021-12-16 06:47:27'),
(71, 2, 'Pemeriksaan Keuangan', '2021-12-16 07:01:34', '2021-12-16 07:01:34'),
(72, 2, 'Pemeriksaan Produksi', '2021-12-16 07:02:19', '2021-12-16 07:02:19'),
(73, 2, 'Pemeriksaan Supporting', '2021-12-16 07:02:50', '2021-12-16 07:02:50'),
(74, 15, 'Rendal Korporasi', '2021-12-16 07:07:40', '2021-12-16 07:07:40'),
(75, 15, 'Rendal Produksi Korporasi', '2021-12-16 07:08:11', '2021-12-16 07:08:11'),
(76, 18, 'Lembaga Sertifikasi Profesi', '2022-01-04 21:51:55', '2022-01-04 21:51:55');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_divisi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id`, `nama_divisi`, `created_at`, `updated_at`) VALUES
(1, 'Sekretaris Perusahaan', '2021-09-27 15:24:18', '2021-09-27 15:24:18'),
(2, 'Satuan Pengawasan Intern', '2021-09-27 15:25:15', '2021-09-27 15:25:15'),
(3, 'Naval Technology', '2021-09-27 15:25:32', '2021-09-27 15:25:32'),
(4, 'Pemasaran dan Penjualan Kapal', '2021-09-27 15:25:44', '2021-09-27 15:25:44'),
(5, 'Penjualan REKUMHAR', '2021-09-27 15:25:56', '2021-09-27 15:25:56'),
(6, 'Desain', '2021-09-27 15:26:03', '2021-09-27 15:26:03'),
(7, 'Jaminan Kualitas', '2021-09-27 15:26:11', '2021-09-27 15:26:11'),
(8, 'Supply Chain', '2021-09-27 15:26:18', '2021-09-27 15:26:18'),
(9, 'Kapal Perang', '2021-09-27 15:26:25', '2021-09-27 15:26:25'),
(10, 'Kapal Selam', '2021-09-27 15:26:33', '2021-09-27 15:26:33'),
(11, 'Kapal Niaga', '2021-09-27 15:26:44', '2021-09-27 15:26:44'),
(12, 'Rekayasa Umum', '2021-09-27 15:26:52', '2021-09-27 15:26:52'),
(13, 'Pemeliharaan dan Perbaikan', '2021-09-27 15:27:20', '2021-09-27 15:27:20'),
(14, 'Akuntansi', '2021-09-27 15:27:28', '2021-09-27 15:27:28'),
(15, 'Perencanaan Strategis Perusahaan & Manajemen Risiko', '2021-09-27 15:27:39', '2021-09-27 15:27:39'),
(16, 'Perbendaharaan', '2021-09-27 15:27:49', '2021-09-27 15:27:49'),
(17, 'Teknologi Informasi', '2021-09-27 15:27:58', '2021-09-27 15:27:58'),
(18, 'Human Capital Management', '2021-09-27 15:28:14', '2021-09-27 15:28:14'),
(19, 'Kawasan', '2021-09-27 15:28:20', '2021-09-27 15:28:20'),
(20, 'Kemanan & K3LH', '2021-09-27 15:28:35', '2021-09-27 15:28:35'),
(21, 'Unit Tanggung Jawab Sosial & Lingkungan', '2021-09-27 15:28:53', '2021-09-27 15:28:53'),
(22, 'Office Of The Board', '2022-01-05 13:10:13', '2022-01-05 13:10:13'),
(23, 'Legal', '2022-01-05 13:10:25', '2022-01-05 13:10:25');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_mhs_indivs`
--

CREATE TABLE `file_mhs_indivs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomorsurat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_penelitian`
--

CREATE TABLE `file_penelitian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomorsurat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_smk_indivs`
--

CREATE TABLE `file_smk_indivs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomorsurat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `konten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foto_i_d_mhs`
--

CREATE TABLE `foto_i_d_mhs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_individu` bigint(20) NOT NULL,
  `fotoID` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foto_i_d_penelitian`
--

CREATE TABLE `foto_i_d_penelitian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `fotoID` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foto_i_d_smks`
--

CREATE TABLE `foto_i_d_smks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_individu` bigint(20) NOT NULL,
  `fotoID` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foto_mhs_models`
--

CREATE TABLE `foto_mhs_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_individu` bigint(20) NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foto_penelitian_models`
--

CREATE TABLE `foto_penelitian_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foto_smk_models`
--

CREATE TABLE `foto_smk_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_individu` bigint(20) NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `judul`, `foto`, `url`, `created_at`, `updated_at`) VALUES
(1, 'Lomba Gerakan AKHLAK', '0', 'https://www.youtube.com/embed/SjYPe9tn71Q', '2022-01-12 02:23:08', '2022-01-12 02:23:08');

-- --------------------------------------------------------

--
-- Table structure for table `huruf`
--

CREATE TABLE `huruf` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nilai_huruf` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_huruf` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `interview`
--

CREATE TABLE `interview` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_individu` bigint(20) NOT NULL,
  `fileinterview` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `interview_smk`
--

CREATE TABLE `interview_smk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_individu` bigint(20) NOT NULL,
  `fileinterview` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_sertifikasi`
--

CREATE TABLE `jadwal_sertifikasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_training` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penyelenggara` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` datetime NOT NULL,
  `tanggal_selesai` datetime NOT NULL,
  `tempat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peserta_sprint` int(11) NOT NULL,
  `peserta_hadir` int(11) NOT NULL,
  `fileSertifikasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jumlah_asesor`
--

CREATE TABLE `jumlah_asesor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_registrasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_assessor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `forum_id` bigint(20) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) NOT NULL,
  `konten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kuota`
--

CREATE TABLE `kuota` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_buka` date NOT NULL,
  `tanggal_tutup` date NOT NULL,
  `kuota` int(11) NOT NULL,
  `divisi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kuota` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporans`
--

CREATE TABLE `laporans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revisi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_kumpul` date NOT NULL,
  `divisi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporans_smk`
--

CREATE TABLE `laporans_smk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revisi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_kumpul` date NOT NULL,
  `divisi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_penelitian`
--

CREATE TABLE `laporan_penelitian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revisi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_kumpul` date NOT NULL,
  `divisi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(50, '2022_01_01_075220_create_rekapabsenmhs_table', 1),
(51, '2022_01_01_162118_create_rekapabsensmk_table', 1),
(52, '2022_01_02_124705_create_rekapabsenpenelitian_table', 1),
(53, '2022_01_07_140032_create_contact_us_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mulai_dan_selesai_mhs`
--

CREATE TABLE `mulai_dan_selesai_mhs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `mulai` date NOT NULL,
  `selesai` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mulai_dan_selesai_penelitian`
--

CREATE TABLE `mulai_dan_selesai_penelitian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `mulai` date NOT NULL,
  `selesai` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mulai_dan_selesai_smk`
--

CREATE TABLE `mulai_dan_selesai_smk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `mulai` date NOT NULL,
  `selesai` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mulai_dan_selesai_smk`
--

INSERT INTO `mulai_dan_selesai_smk` (`id`, `user_id`, `mulai`, `selesai`, `created_at`, `updated_at`) VALUES
(1, 22, '2022-01-12', '2022-03-12', '2022-01-12 03:27:28', '2022-01-12 03:27:28');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `headline` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `konten` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_ruangan`
--

CREATE TABLE `peminjaman_ruangan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pilih_ruangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_peminjam` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departemen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `keperluan` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penilaians`
--

CREATE TABLE `penilaians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `pembimbing` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Kerjasama` int(11) NOT NULL,
  `MotivasiPercayaDiri` int(11) NOT NULL,
  `InisiatifTanggungJawabKerja` int(11) NOT NULL,
  `Loyalitas` int(11) NOT NULL,
  `EtikaSopanSantun` int(11) NOT NULL,
  `Disiplin` int(11) NOT NULL,
  `PemahamanKemampuan` int(11) NOT NULL,
  `KesehatanKeselamatanKerja` int(11) NOT NULL,
  `laporankerja` int(11) NOT NULL,
  `kehadiran` int(11) NOT NULL,
  `average` int(11) NOT NULL,
  `nilai_huruf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_penilaian` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penilaians_smk`
--

CREATE TABLE `penilaians_smk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `pembimbing` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Kerjasama` int(11) NOT NULL,
  `MotivasiPercayaDiri` int(11) NOT NULL,
  `InisiatifTanggungJawabKerja` int(11) NOT NULL,
  `Loyalitas` int(11) NOT NULL,
  `EtikaSopanSantun` int(11) NOT NULL,
  `Disiplin` int(11) NOT NULL,
  `PemahamanKemampuan` int(11) NOT NULL,
  `KesehatanKeselamatanKerja` int(11) NOT NULL,
  `laporankerja` int(11) NOT NULL,
  `kehadiran` int(11) NOT NULL,
  `average` int(11) NOT NULL,
  `nilai_huruf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_penilaian` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penilaians_smk`
--

INSERT INTO `penilaians_smk` (`id`, `user_id`, `pembimbing`, `Kerjasama`, `MotivasiPercayaDiri`, `InisiatifTanggungJawabKerja`, `Loyalitas`, `EtikaSopanSantun`, `Disiplin`, `PemahamanKemampuan`, `KesehatanKeselamatanKerja`, `laporankerja`, `kehadiran`, `average`, `nilai_huruf`, `status_penilaian`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '2022-01-12 02:40:34', '2022-01-12 02:40:34');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rekapabsenmhs`
--

CREATE TABLE `rekapabsenmhs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_individu` bigint(20) NOT NULL,
  `waktu_absen` datetime NOT NULL,
  `jenis_absen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_absen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rekapabsenpenelitian`
--

CREATE TABLE `rekapabsenpenelitian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_individu` bigint(20) NOT NULL,
  `waktu_absen` datetime NOT NULL,
  `jenis_absen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_absen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rekapabsensmk`
--

CREATE TABLE `rekapabsensmk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_individu` bigint(20) NOT NULL,
  `waktu_absen` datetime NOT NULL,
  `jenis_absen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_absen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rekapmhs`
--

CREATE TABLE `rekapmhs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `univ` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strata` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_rumah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departemen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nim` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_penerimaan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_user` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mulai` date DEFAULT NULL,
  `selesai` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rekappenelitian`
--

CREATE TABLE `rekappenelitian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
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
  `status_user` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mulai` date DEFAULT NULL,
  `selesai` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rekappenelitian`
--

INSERT INTO `rekappenelitian` (`id`, `user_id`, `nama`, `asal_instansi`, `strata`, `jurusan`, `alamat_rumah`, `no_hp`, `divisi`, `departemen`, `judul_penelitian`, `status_penerimaan`, `status_user`, `mulai`, `selesai`, `created_at`, `updated_at`) VALUES
(1, 23, 'penelitian', 'pens', 'D3', 'Teknik Informatika', 'Sdr 1', '08155787869', NULL, NULL, 'kapal auto pilot', NULL, 'Penelitian', NULL, NULL, '2022-01-12 03:17:56', '2022-01-12 03:17:56');

-- --------------------------------------------------------

--
-- Table structure for table `rekapsmk`
--

CREATE TABLE `rekapsmk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sekolah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_rumah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departemen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_penerimaan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_user` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mulai` date DEFAULT NULL,
  `selesai` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rekapsmk`
--

INSERT INTO `rekapsmk` (`id`, `user_id`, `nama`, `sekolah`, `jurusan`, `alamat_rumah`, `no_hp`, `divisi`, `departemen`, `nis`, `status_penerimaan`, `status_user`, `mulai`, `selesai`, `created_at`, `updated_at`) VALUES
(1, 22, 'SMK Sahaje La', 'SMK PAL', 'Teknik Informatika', 'Sdr 1', '08155787869', NULL, NULL, '11729', NULL, 'SMK', '2022-01-12', '2022-03-12', '2022-01-12 02:40:34', '2022-01-12 02:40:34');

-- --------------------------------------------------------

--
-- Table structure for table `skema_bnsp`
--

CREATE TABLE `skema_bnsp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_skema` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_skema` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `bidang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_training` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penyelenggara` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` datetime NOT NULL,
  `tanggal_selesai` datetime NOT NULL,
  `tempat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peserta_sprint` int(11) NOT NULL,
  `peserta_hadir` int(11) NOT NULL,
  `fileTraining` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`id`, `nama_training`, `penyelenggara`, `tanggal_mulai`, `tanggal_selesai`, `tempat`, `peserta_sprint`, `peserta_hadir`, `fileTraining`, `status`, `created_at`, `updated_at`) VALUES
(1, 'training', 'pt pal', '2022-01-13 10:55:00', '2022-01-14 12:53:00', 'surabaya', 2, 0, 'muhammad zaid.pdf', 'Proses', '2022-01-12 02:50:45', '2022-01-12 02:50:45');

-- --------------------------------------------------------

--
-- Table structure for table `unit_kerja`
--

CREATE TABLE `unit_kerja` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_divisi` int(11) NOT NULL,
  `divisi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `status_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `status_user`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Pusat', 'adminpusat@gmail.com', NULL, '$2y$10$0EIvwzn8sMIoofBBng3x5e9pAogE7lSfM6AQbVQr8NokiJIbCJism', 1, 'Admin Pusat', NULL, '2021-12-28 19:03:05', '2021-12-28 19:03:05'),
(2, 'Admin HCM', 'adminhcm@gmail.com', NULL, '$2y$10$Xw7QBIZnRq3z9LoYCz8smuxbCnj5AA.qJQSLgnZOAJR.9optzsRCO', 18, 'Admin HCM', NULL, '2021-12-28 19:03:57', '2021-12-28 19:03:57'),
(3, 'Admin Sekretaris Perusahaan', 'adminsekper@gmail.com', NULL, '$2y$10$PDl1ysrDS4282P7pZUz2XOPeRVnMPGEcS9OGB9Vlk9ZfbpZnP0Vra', 18, 'Admin Sekretaris Perusahaan', NULL, '2021-12-28 19:05:04', '2021-12-28 19:05:04'),
(4, 'Admin Satuan Pengawasan Intern', 'adminspi@gmail.com', NULL, '$2y$10$T6YK/fYEtFIvAs18qk8oKeKLoCMwPdcT3dHCP4NMSkpqmMdAQDG/C', 18, 'Admin Satuan Pengawasan Intern', NULL, '2021-12-28 19:05:28', '2021-12-28 19:05:28'),
(5, 'Admin Naval Technology', 'adminnavtech@gmail.com', NULL, '$2y$10$TTvMbFhNri5LFfSgSlwPVuESg06TdvKsGvF6urgfijatv9pQTURPe', 18, 'Admin Naval Technology', NULL, '2021-12-28 19:06:04', '2021-12-28 19:06:04'),
(6, 'Admin Pemasaran dan Penjualan Kapal', 'adminpdpk@gmail.com', NULL, '$2y$10$b1iBKUMuA.UQXVn.vnsioOxjAC4u88fP.L/Lz.FWrXgt2waM0lbv6', 18, 'Admin Pemasaran dan Penjualan Kapal', NULL, '2021-12-28 19:06:54', '2021-12-28 19:06:54'),
(7, 'Admin Penjualan REKUMHAR', 'adminprekumhar@gmail.com', NULL, '$2y$10$Uo3T2oVk0Wf4T/X1wCigCe/rdEV7P/FY7equpPo5f1goWxfSPg/Tq', 18, 'Admin Penjualan REKUMHAR', NULL, '2021-12-28 19:07:21', '2021-12-28 19:07:21'),
(8, 'Admin Desain', 'admindesain@gmail.com', NULL, '$2y$10$yfW4QmYrHSxWwkzYUyNHR.qjfmoZY8NZWPnebCGNgiEHeBhbEo3A2', 18, 'Admin Desain', NULL, '2021-12-28 19:07:55', '2021-12-28 19:07:55'),
(9, 'Admin Jaminan Kualitas', 'adminjaminankualitas@gmail.com', NULL, '$2y$10$PH8bxllJwSj..vt7hQv8ae27O2qxRch2jGCma5NtOjlH2dDFcGUEm', 18, 'Admin Jaminan Kualitas', NULL, '2021-12-28 19:08:20', '2021-12-28 19:08:20'),
(10, 'Admin Supply Chain', 'adminsupplychain@gmail.com', NULL, '$2y$10$BNArCU5Ge1P56WC90wiLa.qaSn0u0RqCYv49lW9t2mmKPUVyF9VTu', 18, 'Admin Supply Chain', NULL, '2021-12-28 19:08:59', '2021-12-28 19:08:59'),
(11, 'Admin Kapal Perang', 'adminkaprang@gmail.com', NULL, '$2y$10$h8896e.sea58SCsR9AaqEemyiRIalzdrJ4vdo4jMTc4nBD4mejgwq', 18, 'Admin Kapal Perang', NULL, '2021-12-28 19:09:18', '2021-12-28 19:09:18'),
(12, 'Admin Kapal Selam', 'adminkasel@gmail.com', NULL, '$2y$10$vfioizRvtdCzvF9yussmSOfOwumk93tAnAirqNCqx/UuKFY3ykMye', 18, 'Admin Kapal Selam', NULL, '2021-12-28 19:09:39', '2021-12-28 19:09:39'),
(13, 'Admin Kapal Niaga', 'adminkapalniaga@gmail.com', NULL, '$2y$10$j4Oaw1Oo9dd2Z4mhXRTZAOleOhCmeN6VMxcl5YFmARfuD57yn0Oxy', 18, 'Admin Kapal Niaga', NULL, '2021-12-28 19:10:02', '2021-12-28 19:10:02'),
(14, 'Admin Rekayasa Umum', 'adminrekum@gmail.com', NULL, '$2y$10$ThTUrD6lEHIJhXX/UiESGuuJhel6IS2HDpeHT.qaIVuB.07L1syfe', 18, 'Admin Rekayasa Umum', NULL, '2021-12-28 19:10:18', '2021-12-28 19:10:18'),
(15, 'Admin Pemeliharaan dan Perbaikan', 'adminpdp@gmail.com', NULL, '$2y$10$1MVLe.GjzDxjmXIdhH5XUO26QwpIROZ3DhSCqZpCijq6inT.IvHqi', 18, 'Admin Pemeliharaan dan Perbaikan', NULL, '2021-12-28 19:10:44', '2021-12-28 19:10:44'),
(16, 'Admin Akuntansi', 'adminakuntansi@gmail.com', NULL, '$2y$10$aOy8VUBy6hyH2s0jT.stT.UBdwLwcY4VNbilxCYS.gq24zKLXHHM.', 18, 'Admin Akuntansi', NULL, '2021-12-28 19:11:03', '2021-12-28 19:11:03'),
(17, 'Admin Perencanaan Strategis Perusahaan', 'adminpsp@gmail.com', NULL, '$2y$10$fR9WZ2xz58mOrqP2vJFTU.lHTf2L.wXtwMi8AVcFnkJlSqlEQ8Slq', 18, 'Admin Perencanaan Strategis Perusahaan', NULL, '2021-12-28 19:11:40', '2021-12-28 19:11:40'),
(18, 'Admin Perbendaharaan', 'adminperbendaharaan@gmail.com', NULL, '$2y$10$mpLrMaqexiJfT7YnFwr0muueZ1TaNu8Ycn2KTKMUu3pD3/lf15rTa', 18, 'Admin Perbendaharaan', NULL, '2021-12-28 19:12:09', '2021-12-28 19:12:09'),
(19, 'Admin Teknologi Informasi', 'adminti@gmail.com', NULL, '$2y$10$LvvWI1ZUX6zwe/znxxAB.uQasETDM.Wt7o6ZpJui9pjGCfeKlbSkK', 18, 'Admin Teknologi Informasi', NULL, '2021-12-28 19:12:29', '2021-12-28 19:12:29'),
(20, 'Admin Kawasan', 'adminkawasan@gmail.com', NULL, '$2y$10$sKCPXM97G0lnuqlx2hDF7eDjFBnwoCb9f7q.1/pE/CzdY0YXSIXY6', 18, 'Admin Kawasan', NULL, '2021-12-28 19:12:53', '2021-12-28 19:12:53'),
(21, 'Admin Keamanan & K3LH', 'adminkeamanan@gmail.com', NULL, '$2y$10$2CNpGdyvzEYtAlkfCa0L3.eDDIPgeWG0/5CR58JxgFq9KA7VboyKi', 18, 'Admin Keamanan & K3LH', NULL, '2021-12-28 19:13:17', '2021-12-28 19:13:17'),
(22, 'SMK Sahaje La', 'smk@gmail.com', NULL, '$2y$10$ijc5SBH3pneug3PCx7U.b.XrjTTZWUlau8ACaRCDzgNesuYvL.h56', 17, 'SMK', NULL, '2022-01-12 02:39:48', '2022-01-12 02:39:48'),
(23, 'penelitian', 'penelitian@gmail.com', NULL, '$2y$10$PVNKYdViJS5f24sumxLx0ugA4hAJSGQ/awPfhHsdONlo4YZsGHZhe', 23, 'Penelitian', NULL, '2022-01-12 03:17:03', '2022-01-12 03:17:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absenmhs`
--
ALTER TABLE `absenmhs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `absenpenelitian`
--
ALTER TABLE `absenpenelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `absensmk`
--
ALTER TABLE `absensmk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beasiswa`
--
ALTER TABLE `beasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar_ruangan`
--
ALTER TABLE `daftar_ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_mhs_indivs`
--
ALTER TABLE `data_mhs_indivs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_penelitian`
--
ALTER TABLE `data_penelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_smk_indivs`
--
ALTER TABLE `data_smk_indivs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `file_mhs_indivs`
--
ALTER TABLE `file_mhs_indivs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_penelitian`
--
ALTER TABLE `file_penelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_smk_indivs`
--
ALTER TABLE `file_smk_indivs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foto_i_d_mhs`
--
ALTER TABLE `foto_i_d_mhs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foto_i_d_penelitian`
--
ALTER TABLE `foto_i_d_penelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foto_i_d_smks`
--
ALTER TABLE `foto_i_d_smks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foto_mhs_models`
--
ALTER TABLE `foto_mhs_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foto_penelitian_models`
--
ALTER TABLE `foto_penelitian_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foto_smk_models`
--
ALTER TABLE `foto_smk_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `huruf`
--
ALTER TABLE `huruf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interview`
--
ALTER TABLE `interview`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interview_smk`
--
ALTER TABLE `interview_smk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_sertifikasi`
--
ALTER TABLE `jadwal_sertifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jumlah_asesor`
--
ALTER TABLE `jumlah_asesor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kuota`
--
ALTER TABLE `kuota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporans`
--
ALTER TABLE `laporans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporans_smk`
--
ALTER TABLE `laporans_smk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_penelitian`
--
ALTER TABLE `laporan_penelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mulai_dan_selesai_mhs`
--
ALTER TABLE `mulai_dan_selesai_mhs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mulai_dan_selesai_penelitian`
--
ALTER TABLE `mulai_dan_selesai_penelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mulai_dan_selesai_smk`
--
ALTER TABLE `mulai_dan_selesai_smk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `peminjaman_ruangan`
--
ALTER TABLE `peminjaman_ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penilaians`
--
ALTER TABLE `penilaians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penilaians_smk`
--
ALTER TABLE `penilaians_smk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rekapabsenmhs`
--
ALTER TABLE `rekapabsenmhs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekapabsenpenelitian`
--
ALTER TABLE `rekapabsenpenelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekapabsensmk`
--
ALTER TABLE `rekapabsensmk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekapmhs`
--
ALTER TABLE `rekapmhs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekappenelitian`
--
ALTER TABLE `rekappenelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekapsmk`
--
ALTER TABLE `rekapsmk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skema_bnsp`
--
ALTER TABLE `skema_bnsp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_kerja`
--
ALTER TABLE `unit_kerja`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `absenmhs`
--
ALTER TABLE `absenmhs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `absenpenelitian`
--
ALTER TABLE `absenpenelitian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `absensmk`
--
ALTER TABLE `absensmk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `beasiswa`
--
ALTER TABLE `beasiswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daftar_ruangan`
--
ALTER TABLE `daftar_ruangan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_mhs_indivs`
--
ALTER TABLE `data_mhs_indivs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_penelitian`
--
ALTER TABLE `data_penelitian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_smk_indivs`
--
ALTER TABLE `data_smk_indivs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_mhs_indivs`
--
ALTER TABLE `file_mhs_indivs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_penelitian`
--
ALTER TABLE `file_penelitian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_smk_indivs`
--
ALTER TABLE `file_smk_indivs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_i_d_mhs`
--
ALTER TABLE `foto_i_d_mhs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_i_d_penelitian`
--
ALTER TABLE `foto_i_d_penelitian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_i_d_smks`
--
ALTER TABLE `foto_i_d_smks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_mhs_models`
--
ALTER TABLE `foto_mhs_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_penelitian_models`
--
ALTER TABLE `foto_penelitian_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_smk_models`
--
ALTER TABLE `foto_smk_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `huruf`
--
ALTER TABLE `huruf`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interview`
--
ALTER TABLE `interview`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interview_smk`
--
ALTER TABLE `interview_smk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal_sertifikasi`
--
ALTER TABLE `jadwal_sertifikasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jumlah_asesor`
--
ALTER TABLE `jumlah_asesor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kuota`
--
ALTER TABLE `kuota`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporans`
--
ALTER TABLE `laporans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporans_smk`
--
ALTER TABLE `laporans_smk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporan_penelitian`
--
ALTER TABLE `laporan_penelitian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `mulai_dan_selesai_mhs`
--
ALTER TABLE `mulai_dan_selesai_mhs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mulai_dan_selesai_penelitian`
--
ALTER TABLE `mulai_dan_selesai_penelitian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mulai_dan_selesai_smk`
--
ALTER TABLE `mulai_dan_selesai_smk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peminjaman_ruangan`
--
ALTER TABLE `peminjaman_ruangan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penilaians`
--
ALTER TABLE `penilaians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penilaians_smk`
--
ALTER TABLE `penilaians_smk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekapabsenmhs`
--
ALTER TABLE `rekapabsenmhs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekapabsenpenelitian`
--
ALTER TABLE `rekapabsenpenelitian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekapabsensmk`
--
ALTER TABLE `rekapabsensmk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekapmhs`
--
ALTER TABLE `rekapmhs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekappenelitian`
--
ALTER TABLE `rekappenelitian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rekapsmk`
--
ALTER TABLE `rekapsmk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skema_bnsp`
--
ALTER TABLE `skema_bnsp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `unit_kerja`
--
ALTER TABLE `unit_kerja`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
