-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Dec 29, 2021 at 02:16 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(21, 'Admin Keamanan & K3LH', 'adminkeamanan@gmail.com', NULL, '$2y$10$2CNpGdyvzEYtAlkfCa0L3.eDDIPgeWG0/5CR58JxgFq9KA7VboyKi', 18, 'Admin Keamanan & K3LH', NULL, '2021-12-29 02:13:17', '2021-12-29 02:13:17');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
