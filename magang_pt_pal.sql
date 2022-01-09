-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jan 2022 pada 15.53
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

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
-- Struktur dari tabel `absenmhs`
--

CREATE TABLE `absenmhs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_individu` bigint(20) NOT NULL,
  `waktu_absen` datetime NOT NULL,
  `jenis_absen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_absen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `absenpenelitian`
--

CREATE TABLE `absenpenelitian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_individu` bigint(20) NOT NULL,
  `waktu_absen` datetime NOT NULL,
  `jenis_absen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_absen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensmk`
--

CREATE TABLE `absensmk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_individu` bigint(20) NOT NULL,
  `waktu_absen` datetime NOT NULL,
  `jenis_absen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `beasiswa`
--

CREATE TABLE `beasiswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_beasiswa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institusi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `beasiswa`
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
-- Struktur dari tabel `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Made Rahano Satryani Widhi', 'calorilin12@gmail.com', 'jdflkasjklfjas', 'sxdcfvgbhunjipmoktfvgybhnjmk', '2022-01-07 08:32:14', '2022-01-07 08:32:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_ruangan`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `daftar_ruangan`
--

INSERT INTO `daftar_ruangan` (`id`, `nama_ruangan`, `fasilitas`, `kapasitas`, `foto_ruangan`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ruangan Rapat', 'AC KIPAS LCD MEJA KURSI', 20, 'navy.png', 'Available', '2022-01-07 06:01:26', '2022-01-07 06:01:26'),
(2, 'Ruangan kamar mandi', 'wc air', 30, 'WhatsApp Image 2021-12-14 at 13.56.45.jpeg', 'Available', '2022-01-07 06:03:56', '2022-01-07 06:03:56'),
(3, 'ruang meeting', 'ember sabun tisu', 40, 'WhatsApp Image 2022-01-06 at 16.08.17 (2).jpeg', 'Available', '2022-01-07 06:06:01', '2022-01-07 06:06:01'),
(4, 'Ruangan Rapat1', 'AC KIPAS LCD MEJA KURSI', 69, 'WhatsApp Image 2022-01-06 at 16.08.15 (1).jpeg', 'Available', '2022-01-07 06:06:23', '2022-01-07 06:06:23'),
(5, 'Ruangan Rapat hcm', 'AC KIPAS LCD MEJA KURSI', 50, 'WhatsApp Image 2021-11-10 at 08.05.53.jpeg', 'Available', '2022-01-07 06:06:45', '2022-01-07 06:06:45'),
(6, 'Ruangan kamar mandi hcm', 'wc air', 30, 'WhatsApp Image 2022-01-06 at 16.08.17 (1).jpeg', 'Unavailable', '2022-01-07 06:09:15', '2022-01-07 06:09:15'),
(7, 'Ruangan kamar mandi pal', 'AC KIPAS LCD MEJA KURSI', 50, 'WhatsApp Image 2021-12-16 at 10.35.41.jpeg', 'Available', '2022-01-07 06:12:12', '2022-01-07 06:12:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_mhs_indivs`
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
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_penerimaan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_penelitian`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_smk_indivs`
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
  `nis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_penerimaan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `departemen`
--

CREATE TABLE `departemen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `nama_departemen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `departemen`
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
(76, 18, 'Lembaga Sertifikasi Profesi', '2022-01-05 04:51:55', '2022-01-05 04:51:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_divisi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `divisi`
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
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `file_mhs_indivs`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `file_penelitian`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `file_smk_indivs`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `forum`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_i_d_mhs`
--

CREATE TABLE `foto_i_d_mhs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_individu` bigint(20) NOT NULL,
  `fotoID` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_i_d_penelitian`
--

CREATE TABLE `foto_i_d_penelitian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `fotoID` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_i_d_smks`
--

CREATE TABLE `foto_i_d_smks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_individu` bigint(20) NOT NULL,
  `fotoID` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_mhs_models`
--

CREATE TABLE `foto_mhs_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_individu` bigint(20) NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_penelitian_models`
--

CREATE TABLE `foto_penelitian_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_smk_models`
--

CREATE TABLE `foto_smk_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_individu` bigint(20) NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id`, `judul`, `foto`, `url`, `created_at`, `updated_at`) VALUES
(1, 'lomba divsi hcm', 'WhatsApp Image 2022-01-06 at 16.08.16 (2).jpeg', '0', '2022-01-07 02:49:51', '2022-01-07 02:49:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `interview`
--

CREATE TABLE `interview` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_individu` bigint(20) NOT NULL,
  `fileinterview` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_kepribadian` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ekstrovet` int(11) NOT NULL,
  `introvet` int(11) NOT NULL,
  `visioner` int(11) NOT NULL,
  `realistik` int(11) NOT NULL,
  `emosional` int(11) NOT NULL,
  `rasional` int(11) NOT NULL,
  `perencanaan` int(11) NOT NULL,
  `improvisasi` int(11) NOT NULL,
  `tegas` int(11) NOT NULL,
  `waspada` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `interview_smk`
--

CREATE TABLE `interview_smk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_individu` bigint(20) NOT NULL,
  `fileinterview` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_kepribadian` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ekstrovet` int(11) NOT NULL,
  `introvet` int(11) NOT NULL,
  `visioner` int(11) NOT NULL,
  `realistik` int(11) NOT NULL,
  `emosional` int(11) NOT NULL,
  `rasional` int(11) NOT NULL,
  `perencanaan` int(11) NOT NULL,
  `improvisasi` int(11) NOT NULL,
  `tegas` int(11) NOT NULL,
  `waspada` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_sertifikasi`
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
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jumlah_asesor`
--

CREATE TABLE `jumlah_asesor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_registrasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_assessor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuota`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporans`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporans_smk`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_penelitian`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
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
-- Struktur dari tabel `mulai_dan_selesai_mhs`
--

CREATE TABLE `mulai_dan_selesai_mhs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `mulai` date NOT NULL,
  `selesai` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mulai_dan_selesai_penelitian`
--

CREATE TABLE `mulai_dan_selesai_penelitian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `mulai` date NOT NULL,
  `selesai` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mulai_dan_selesai_smk`
--

CREATE TABLE `mulai_dan_selesai_smk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `mulai` date NOT NULL,
  `selesai` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `headline` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `konten` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`id`, `judul`, `headline`, `konten`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Divisi HCM Mendapatkan Juara Harapan 1', 'Juara Harapan 1', '<p>memenangkan juara 1&nbsp;</p>', 'WhatsApp Image 2022-01-06 at 16.08.16 (2).jpeg', '2022-01-07 03:04:23', '2022-01-07 03:04:23'),
(2, 'juara yel-yel harapan 2', 'juara harapan 2 yel-yel', '<p>juara harapan 2</p>', 'WhatsApp Image 2022-01-06 at 16.08.15 (2).jpeg', '2022-01-07 03:05:11', '2022-01-07 03:05:11'),
(3, 'Registrasi Magang Online PT PAL', 'Pendaftaran Online di PT PAL', '<p>registrasi online</p>', 'WhatsApp Image 2021-12-16 at 10.35.41.jpeg', '2022-01-07 03:06:30', '2022-01-07 03:06:30'),
(4, 'kegiatan hari kartini', 'Hari kartini', '<p>divisi hcm menyambut hari kartini di pt pal&nbsp;</p>', 'WhatsApp Image 2022-01-06 at 16.08.17 (2).jpeg', '2022-01-07 03:08:58', '2022-01-07 03:08:58'),
(5, 'PT PAL Mengadakan Ulang Tahun', 'Ulang Tahun', '<p>ulang tahun 2021</p>', 'WhatsApp Image 2022-01-06 at 16.08.17.jpeg', '2022-01-07 03:13:19', '2022-01-07 03:13:19'),
(6, 'Kegiatan sumpah pemuda', 'sumpah pemuda', '<p>sumpah pemuda</p>', 'WhatsApp Image 2021-11-10 at 08.05.53.jpeg', '2022-01-07 03:32:34', '2022-01-07 03:32:34'),
(7, 'divisi hcm kegiatan', 'coba', '<p>coba</p>', 'WhatsApp Image 2022-01-06 at 16.08.16 (1).jpeg', '2022-01-07 04:19:09', '2022-01-07 04:19:09'),
(8, 'test', 'test', '<p>test</p>', 'WhatsApp Image 2022-01-06 at 16.08.17.jpeg', '2022-01-07 04:19:45', '2022-01-07 04:19:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman_ruangan`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `peminjaman_ruangan`
--

INSERT INTO `peminjaman_ruangan` (`id`, `pilih_ruangan`, `nama_peminjam`, `divisi`, `departemen`, `no_telp`, `tanggal_mulai`, `tanggal_selesai`, `jam_mulai`, `jam_selesai`, `keperluan`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ruangan kamar mandi', 'zaid', 'HCM', 'ODC', '081331913558', '2022-01-07', '2022-01-07', '13:26:00', '19:26:00', 'mau buat beol', 'Proses', '2022-01-07 06:26:35', '2022-01-07 06:26:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaians`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penilaians`
--

INSERT INTO `penilaians` (`id`, `user_id`, `pembimbing`, `Kerjasama`, `MotivasiPercayaDiri`, `InisiatifTanggungJawabKerja`, `Loyalitas`, `EtikaSopanSantun`, `Disiplin`, `PemahamanKemampuan`, `KesehatanKeselamatanKerja`, `laporankerja`, `kehadiran`, `average`, `nilai_huruf`, `status_penilaian`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, '2022-01-06 09:39:51', '2022-01-06 09:39:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaians_smk`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekapabsenmhs`
--

CREATE TABLE `rekapabsenmhs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_individu` bigint(20) NOT NULL,
  `waktu_absen` datetime NOT NULL,
  `jenis_absen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_absen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekapabsenpenelitian`
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
-- Struktur dari tabel `rekapabsensmk`
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
-- Struktur dari tabel `rekapmhs`
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
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_penerimaan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_user` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mulai` date DEFAULT NULL,
  `selesai` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rekapmhs`
--

INSERT INTO `rekapmhs` (`id`, `user_id`, `nama`, `univ`, `jurusan`, `strata`, `alamat_rumah`, `no_hp`, `divisi`, `departemen`, `nim`, `status_penerimaan`, `status_user`, `mulai`, `selesai`, `created_at`, `updated_at`) VALUES
(2, 23, 'zaid', 'Politeknik Elektronika Surabaya', 'Teknik Informatika', 'D4', 'Wiyung', '08xxx', NULL, NULL, '2110191015', NULL, 'Mahasiswa', NULL, NULL, '2022-01-06 09:39:51', '2022-01-06 09:39:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekappenelitian`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekapsmk`
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
  `nis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_penerimaan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_user` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mulai` date DEFAULT NULL,
  `selesai` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `skema_bnsp`
--

CREATE TABLE `skema_bnsp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_skema` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_skema` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `bidang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `training`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `training`
--

INSERT INTO `training` (`id`, `nama_training`, `penyelenggara`, `tanggal_mulai`, `tanggal_selesai`, `tempat`, `peserta_sprint`, `peserta_hadir`, `fileTraining`, `status`, `created_at`, `updated_at`) VALUES
(1, 'pelatihan kemandirian pribadi', 'pal', '2022-01-07 11:25:00', '2022-01-07 11:25:00', 'hcm', 1, 2, 'WhatsApp Image 2021-12-16 at 10.35.41.jpeg', 'Proses', '2022-01-07 04:26:05', '2022-01-07 04:26:05'),
(2, 'pelatihan soft skill', 'pens', '2022-01-07 11:26:00', '2022-01-22 11:26:00', 'Pens', 2, 2, 'WhatsApp Image 2021-12-16 at 10.35.41.jpeg', 'Proses', '2022-01-07 04:26:56', '2022-01-07 04:26:56'),
(3, 'pelatihan hard skill', 'ppns', '2022-01-07 11:27:00', '2022-01-29 11:27:00', 'ppns', 4, 3, 'WhatsApp Image 2021-12-16 at 10.35.41.jpeg', 'Proses', '2022-01-07 04:27:48', '2022-01-07 04:27:48'),
(4, 'pelatihan kemandirian sejati', 'pal', '2022-01-07 12:55:00', '2022-01-29 12:55:00', 'its', 3, 4, 'WhatsApp Image 2022-01-06 at 16.08.16 (2).jpeg', 'Proses', '2022-01-07 05:55:32', '2022-01-07 05:55:32'),
(5, 'pelatihan kemandirian', 'unair', '2022-01-07 12:56:00', '2022-01-29 12:56:00', 'unair', 4, 4, 'WhatsApp Image 2021-12-16 at 10.35.41.jpeg', 'Proses', '2022-01-07 05:56:38', '2022-01-07 05:56:38'),
(6, 'pelatihan soft skill pribadi', 'pal', '2022-01-07 12:57:00', '2022-01-29 12:57:00', 'unesa', 3, 3, 'WhatsApp Image 2022-01-06 at 16.08.15 (2).jpeg', 'Proses', '2022-01-07 05:57:30', '2022-01-07 05:57:30'),
(7, 'pelatihan kemandirian', 'pal', '2022-01-07 12:58:00', '2022-01-29 12:58:00', 'ppns', 2, 4, 'WhatsApp Image 2022-01-06 at 16.08.16.jpeg', 'Proses', '2022-01-07 05:58:47', '2022-01-07 05:58:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit_kerja`
--

CREATE TABLE `unit_kerja` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_divisi` int(11) NOT NULL,
  `divisi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
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
(21, 'Admin Keamanan & K3LH', 'adminkeamanan@gmail.com', NULL, '$2y$10$2CNpGdyvzEYtAlkfCa0L3.eDDIPgeWG0/5CR58JxgFq9KA7VboyKi', 18, 'Admin Keamanan & K3LH', NULL, '2021-12-29 02:13:17', '2021-12-29 02:13:17');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absenmhs`
--
ALTER TABLE `absenmhs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `absenpenelitian`
--
ALTER TABLE `absenpenelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `absensmk`
--
ALTER TABLE `absensmk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `beasiswa`
--
ALTER TABLE `beasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `daftar_ruangan`
--
ALTER TABLE `daftar_ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_mhs_indivs`
--
ALTER TABLE `data_mhs_indivs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_penelitian`
--
ALTER TABLE `data_penelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_smk_indivs`
--
ALTER TABLE `data_smk_indivs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `file_mhs_indivs`
--
ALTER TABLE `file_mhs_indivs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `file_penelitian`
--
ALTER TABLE `file_penelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `file_smk_indivs`
--
ALTER TABLE `file_smk_indivs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `foto_i_d_mhs`
--
ALTER TABLE `foto_i_d_mhs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `foto_i_d_penelitian`
--
ALTER TABLE `foto_i_d_penelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `foto_i_d_smks`
--
ALTER TABLE `foto_i_d_smks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `foto_mhs_models`
--
ALTER TABLE `foto_mhs_models`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `foto_penelitian_models`
--
ALTER TABLE `foto_penelitian_models`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `foto_smk_models`
--
ALTER TABLE `foto_smk_models`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `interview`
--
ALTER TABLE `interview`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `interview_smk`
--
ALTER TABLE `interview_smk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal_sertifikasi`
--
ALTER TABLE `jadwal_sertifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jumlah_asesor`
--
ALTER TABLE `jumlah_asesor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kuota`
--
ALTER TABLE `kuota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporans`
--
ALTER TABLE `laporans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporans_smk`
--
ALTER TABLE `laporans_smk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporan_penelitian`
--
ALTER TABLE `laporan_penelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mulai_dan_selesai_mhs`
--
ALTER TABLE `mulai_dan_selesai_mhs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mulai_dan_selesai_penelitian`
--
ALTER TABLE `mulai_dan_selesai_penelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mulai_dan_selesai_smk`
--
ALTER TABLE `mulai_dan_selesai_smk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `peminjaman_ruangan`
--
ALTER TABLE `peminjaman_ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penilaians`
--
ALTER TABLE `penilaians`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penilaians_smk`
--
ALTER TABLE `penilaians_smk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `rekapabsenmhs`
--
ALTER TABLE `rekapabsenmhs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rekapabsenpenelitian`
--
ALTER TABLE `rekapabsenpenelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rekapabsensmk`
--
ALTER TABLE `rekapabsensmk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rekapmhs`
--
ALTER TABLE `rekapmhs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rekappenelitian`
--
ALTER TABLE `rekappenelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rekapsmk`
--
ALTER TABLE `rekapsmk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `skema_bnsp`
--
ALTER TABLE `skema_bnsp`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `unit_kerja`
--
ALTER TABLE `unit_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absenmhs`
--
ALTER TABLE `absenmhs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `absenpenelitian`
--
ALTER TABLE `absenpenelitian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `absensmk`
--
ALTER TABLE `absensmk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `beasiswa`
--
ALTER TABLE `beasiswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `daftar_ruangan`
--
ALTER TABLE `daftar_ruangan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `data_mhs_indivs`
--
ALTER TABLE `data_mhs_indivs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_penelitian`
--
ALTER TABLE `data_penelitian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_smk_indivs`
--
ALTER TABLE `data_smk_indivs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `file_mhs_indivs`
--
ALTER TABLE `file_mhs_indivs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `file_penelitian`
--
ALTER TABLE `file_penelitian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `file_smk_indivs`
--
ALTER TABLE `file_smk_indivs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `forum`
--
ALTER TABLE `forum`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `foto_i_d_mhs`
--
ALTER TABLE `foto_i_d_mhs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `foto_i_d_penelitian`
--
ALTER TABLE `foto_i_d_penelitian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `foto_i_d_smks`
--
ALTER TABLE `foto_i_d_smks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `foto_mhs_models`
--
ALTER TABLE `foto_mhs_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `foto_penelitian_models`
--
ALTER TABLE `foto_penelitian_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `foto_smk_models`
--
ALTER TABLE `foto_smk_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `interview`
--
ALTER TABLE `interview`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `interview_smk`
--
ALTER TABLE `interview_smk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jadwal_sertifikasi`
--
ALTER TABLE `jadwal_sertifikasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jumlah_asesor`
--
ALTER TABLE `jumlah_asesor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kuota`
--
ALTER TABLE `kuota`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `laporans`
--
ALTER TABLE `laporans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `laporans_smk`
--
ALTER TABLE `laporans_smk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `laporan_penelitian`
--
ALTER TABLE `laporan_penelitian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `mulai_dan_selesai_mhs`
--
ALTER TABLE `mulai_dan_selesai_mhs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mulai_dan_selesai_penelitian`
--
ALTER TABLE `mulai_dan_selesai_penelitian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mulai_dan_selesai_smk`
--
ALTER TABLE `mulai_dan_selesai_smk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `peminjaman_ruangan`
--
ALTER TABLE `peminjaman_ruangan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `penilaians`
--
ALTER TABLE `penilaians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `penilaians_smk`
--
ALTER TABLE `penilaians_smk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rekapabsenmhs`
--
ALTER TABLE `rekapabsenmhs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `rekapabsenpenelitian`
--
ALTER TABLE `rekapabsenpenelitian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rekapabsensmk`
--
ALTER TABLE `rekapabsensmk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rekapmhs`
--
ALTER TABLE `rekapmhs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `rekappenelitian`
--
ALTER TABLE `rekappenelitian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rekapsmk`
--
ALTER TABLE `rekapsmk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `skema_bnsp`
--
ALTER TABLE `skema_bnsp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `training`
--
ALTER TABLE `training`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `unit_kerja`
--
ALTER TABLE `unit_kerja`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
