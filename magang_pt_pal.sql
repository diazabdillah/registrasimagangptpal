-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Okt 2021 pada 09.16
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
  `user_id` bigint(20) NOT NULL,
  `waktu_awal` datetime NOT NULL,
  `waktu_akhir` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `absenmhs`
--

INSERT INTO `absenmhs` (`id`, `user_id`, `waktu_awal`, `waktu_akhir`, `created_at`, `updated_at`) VALUES
(1, 2, '2021-10-27 08:17:00', '2021-10-31 20:17:00', '2021-10-27 05:16:11', '2021-10-27 05:16:11'),
(2, 2, '2021-10-28 09:08:00', '2021-10-31 21:08:00', '2021-10-27 06:07:17', '2021-10-27 06:07:17'),
(3, 3, '2021-10-28 02:40:00', '2021-10-31 02:40:00', '2021-10-27 11:39:48', '2021-10-27 11:39:48'),
(4, 3, '2021-10-29 02:47:00', '2021-10-29 14:47:00', '2021-10-27 11:46:54', '2021-10-27 11:46:54'),
(5, 3, '2022-11-29 09:26:00', '2022-11-29 21:26:00', '2021-10-27 18:25:43', '2021-10-27 18:25:43'),
(6, 3, '2022-11-29 09:26:00', '2022-11-29 21:26:00', '2021-10-27 18:26:50', '2021-10-27 18:26:50'),
(7, 3, '2022-11-29 09:26:00', '2022-11-29 21:26:00', '2021-10-27 18:26:56', '2021-10-27 18:26:56'),
(8, 3, '2022-11-29 09:26:00', '2022-11-29 21:26:00', '2021-10-27 18:27:27', '2021-10-27 18:27:27'),
(9, 3, '2022-11-29 09:26:00', '2022-11-29 21:26:00', '2021-10-27 18:30:15', '2021-10-27 18:30:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen_indivs_tabel`
--

CREATE TABLE `absen_indivs_tabel` (
  `id_absen` int(11) NOT NULL,
  `id_individu` int(11) NOT NULL,
  `waktu_absen` datetime NOT NULL,
  `status_absen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `absen_indivs_tabel`
--

INSERT INTO `absen_indivs_tabel` (`id_absen`, `id_individu`, `waktu_absen`, `status_absen`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-10-27 13:04:55', 'Sudah Absensi', '2021-10-27 06:04:55', '2021-10-27 06:04:55'),
(1, 2, '2021-10-27 13:05:44', 'Sudah Absensi', '2021-10-27 06:05:44', '2021-10-27 06:05:44'),
(1, 1, '2021-10-27 18:24:01', 'Sudah Absensi', '2021-10-27 11:24:01', '2021-10-27 11:24:01'),
(1, 1, '2021-10-27 18:24:04', 'Sudah Absensi', '2021-10-27 11:24:04', '2021-10-27 11:24:04'),
(1, 2, '2021-10-27 18:24:06', 'Sudah Absensi', '2021-10-27 11:24:06', '2021-10-27 11:24:06'),
(1, 2, '2021-10-27 18:24:08', 'Sudah Absensi', '2021-10-27 11:24:08', '2021-10-27 11:24:08'),
(1, 1, '2021-10-27 18:24:11', 'Sudah Absensi', '2021-10-27 11:24:11', '2021-10-27 11:24:11'),
(1, 1, '2021-10-27 18:24:13', 'Sudah Absensi', '2021-10-27 11:24:13', '2021-10-27 11:24:13'),
(1, 1, '2021-10-27 18:24:13', 'Sudah Absensi', '2021-10-27 11:24:13', '2021-10-27 11:24:13'),
(1, 3, '2021-10-27 18:42:44', 'Sudah Absensi', '2021-10-27 11:42:44', '2021-10-27 11:42:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_mhs_indivs`
--

CREATE TABLE `data_mhs_indivs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `univ` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strata` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_rumah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departemen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` int(11) NOT NULL,
  `status_idcard` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_mhs_indivs`
--

INSERT INTO `data_mhs_indivs` (`id`, `user_id`, `nama`, `univ`, `strata`, `alamat_rumah`, `no_hp`, `divisi`, `departemen`, `nim`, `status_idcard`, `created_at`, `updated_at`) VALUES
(1, 2, 'mario', 'pens', 'Teknik Informatika D4', 'manyar its', '081331913558', 'Divisi 1', 'Departement 1', 2110191013, NULL, '2021-10-27 04:43:34', '2021-10-27 04:43:34'),
(2, 2, 'Fabyan Kindarya', 'PENS', 'Teknik Informatika D4', 'Jalan Jawa', '0857384758932', 'Divisi 1', 'Departement 1', 2110191015, NULL, '2021-10-27 04:44:04', '2021-10-27 04:44:04'),
(3, 3, 'jay', 'PENS', 'Teknik Informatika D4', 'manyar its', '0857384758932', 'Divisi 1', 'Departemen 1', 2110191015, NULL, '2021-10-27 11:38:59', '2021-10-27 11:38:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_mhs_kelompoks`
--

CREATE TABLE `data_mhs_kelompoks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `univ` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strata` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_rumah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departemen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_smk_indivs`
--

CREATE TABLE `data_smk_indivs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_rumah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departemen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_divisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `file_mhs_indivs`
--

CREATE TABLE `file_mhs_indivs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `file_mhs_kels`
--

CREATE TABLE `file_mhs_kels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `file_smk_indivs`
--

CREATE TABLE `file_smk_indivs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_i_d_mhs`
--

CREATE TABLE `foto_i_d_mhs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `fotoID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_i_d_smks`
--

CREATE TABLE `foto_i_d_smks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `fotoID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_mhs_models`
--

CREATE TABLE `foto_mhs_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_smk_models`
--

CREATE TABLE `foto_smk_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `huruf`
--

CREATE TABLE `huruf` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nilai_huruf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_huruf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuota`
--

CREATE TABLE `kuota` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bagian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_buka` date NOT NULL,
  `tanggal_tutup` date NOT NULL,
  `kuota` int(11) NOT NULL,
  `divisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departemen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kuota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporans`
--

CREATE TABLE `laporans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sinopsis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_kumpul` date NOT NULL,
  `divisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(15, '2021_10_16_093445_create_data_mhs_kel_table', 1),
(16, '2021_10_16_125550_create_file_mhs_kel_table', 1),
(17, '2021_10_19_041613_create_absenmhs_tabel', 1),
(18, '2021_10_19_051054_create_kuota_tabel', 1),
(19, '2021_10_19_053337_create_divisi_tabel', 1),
(20, '2021_10_20_074607_create_laporan_tabel', 1),
(21, '2021_10_22_005528_create_penilaian_tabel', 1),
(22, '2021_10_23_164936_create_indexnilai_tabel', 1),
(23, '2021_10_27_112732_create_absen_indivs_tabel', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaians`
--

CREATE TABLE `penilaians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `pembimbing` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Kerjasama` int(11) NOT NULL,
  `Motivasi` int(11) NOT NULL,
  `InisiatifKerja` int(11) NOT NULL,
  `Loyalitas` int(11) NOT NULL,
  `etika` int(11) NOT NULL,
  `Disiplin` int(11) NOT NULL,
  `PercayaDiri` int(11) NOT NULL,
  `TanggungJawab` int(11) NOT NULL,
  `PemahamanKemampuan` int(11) NOT NULL,
  `KesehatanKeselamatanKerja` int(11) NOT NULL,
  `average` int(11) NOT NULL,
  `nilai_huruf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_penilaian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `status_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `status_user`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$.LOGtRGsQy2UtlnQfoHnbe9PECnF.HskoKBPBxkjpYO6MOSk2NlXi', 1, 'kelompok', NULL, '2021-10-27 04:41:36', '2021-10-27 04:41:36'),
(2, 'kelompok1', 'kelompok1@gmail.com', NULL, '$2y$10$6wlRaLLHmRTwaaenELh3uOZEusrRCZd4XzO2CY1ytcW8kjIOGLDUS', 3, 'kelompok', NULL, '2021-10-27 04:42:55', '2021-10-27 04:42:55'),
(3, 'jay', 'jay@gmail.com', NULL, '$2y$10$7ITFOngvsCKtyBaELr/mv.1UcaF2UGy5F/6GvA0BTo7Uo0V2jPCny', 11, 'individu', NULL, '2021-10-27 11:38:17', '2021-10-27 11:38:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absenmhs`
--
ALTER TABLE `absenmhs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_mhs_indivs`
--
ALTER TABLE `data_mhs_indivs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_mhs_kelompoks`
--
ALTER TABLE `data_mhs_kelompoks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_smk_indivs`
--
ALTER TABLE `data_smk_indivs`
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
-- Indeks untuk tabel `file_mhs_kels`
--
ALTER TABLE `file_mhs_kels`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `file_smk_indivs`
--
ALTER TABLE `file_smk_indivs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `foto_i_d_mhs`
--
ALTER TABLE `foto_i_d_mhs`
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
-- Indeks untuk tabel `foto_smk_models`
--
ALTER TABLE `foto_smk_models`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `huruf`
--
ALTER TABLE `huruf`
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
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `penilaians`
--
ALTER TABLE `penilaians`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absenmhs`
--
ALTER TABLE `absenmhs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `data_mhs_indivs`
--
ALTER TABLE `data_mhs_indivs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `data_mhs_kelompoks`
--
ALTER TABLE `data_mhs_kelompoks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_smk_indivs`
--
ALTER TABLE `data_smk_indivs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `file_mhs_indivs`
--
ALTER TABLE `file_mhs_indivs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `file_mhs_kels`
--
ALTER TABLE `file_mhs_kels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `file_smk_indivs`
--
ALTER TABLE `file_smk_indivs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `foto_i_d_mhs`
--
ALTER TABLE `foto_i_d_mhs`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `foto_smk_models`
--
ALTER TABLE `foto_smk_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `huruf`
--
ALTER TABLE `huruf`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `mulai_dan_selesai_mhs`
--
ALTER TABLE `mulai_dan_selesai_mhs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penilaians`
--
ALTER TABLE `penilaians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
