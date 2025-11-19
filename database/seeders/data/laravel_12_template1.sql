-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 02, 2025 at 03:26 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_12_template`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_data` longtext COLLATE utf8mb4_unicode_ci,
  `before` longtext COLLATE utf8mb4_unicode_ci,
  `after` longtext COLLATE utf8mb4_unicode_ci,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `roles` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '[]' COMMENT 'history roles',
  `browser` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `platform` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `title`, `activity_type`, `request_data`, `before`, `after`, `ip`, `user_agent`, `user_id`, `roles`, `browser`, `platform`, `device`, `created_at`, `updated_at`) VALUES
(1, 'Tambah Contoh CRUD Baru', 'CREATE', '{\"_token\":\"L31Qkt2z4MqMChCgD3tpH7kZsH5Ky6qcmInENkDL\",\"name\":\"anam test\",\"phone_number\":\"anam test\",\"birthdate\":\"2023-01-01\",\"address\":\"anam test textarea\",\"text\":\"anam test\",\"barcode\":\"anam test\",\"qr_code\":\"anam test\",\"email\":\"anam@test.com\",\"password\":\"anam test\",\"number\":\"1000\",\"currency\":\"1000\",\"currency_idr\":\"1000\",\"select\":\"Option 10\",\"select2\":\"Option 10\",\"select2_multiple\":[\"Option 10\"],\"tags\":\"anam test\",\"radio\":\"Option 4\",\"checkbox\":[\"Option 1\",\"Option 2\",\"Option 3\",\"Option 4\",\"Option 5\"],\"checkbox2\":[\"Option 1\",\"Option 2\",\"Option 3\",\"Option 4\",\"Option 5\"],\"date\":\"2023-01-01\",\"time\":\"12:00\",\"color\":\"#ff0000\",\"textarea\":\"anam test textarea\",\"summernote_simple\":\"<h1>Hello Summernote!<\\/h1><p>This is some content.<\\/p>\",\"summernote\":\"<h1>Hello Summernote!<\\/h1><p>This is some content.<\\/p>\",\"avatar\":{},\"file\":{},\"image\":{}}', 'null', '{\"text\":\"anam test\",\"email\":\"anam@test.com\",\"number\":\"1000\",\"select\":\"Option 10\",\"textarea\":\"anam test textarea\",\"radio\":\"Option 4\",\"date\":\"2023-01-01\",\"checkbox\":[\"Option 1\",\"Option 2\",\"Option 3\",\"Option 4\",\"Option 5\"],\"checkbox2\":[\"Option 1\",\"Option 2\",\"Option 3\",\"Option 4\",\"Option 5\"],\"time\":\"12:00\",\"tags\":\"anam test\",\"color\":\"#ff0000\",\"select2\":\"Option 10\",\"select2_multiple\":[\"Option 10\"],\"summernote\":\"<h1>Hello Summernote!<\\/h1><p>This is some content.<\\/p>\",\"summernote_simple\":\"<h1>Hello Summernote!<\\/h1><p>This is some content.<\\/p>\",\"barcode\":\"anam test\",\"qr_code\":\"anam test\",\"name\":\"anam test\",\"phone_number\":\"anam test\",\"birthdate\":\"2023-01-01\",\"address\":\"anam test textarea\",\"currency\":\"1000\",\"currency_idr\":\"1000\",\"file\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/crud-examples\\/20250902214326_bHmfZpozxUJN3SDxxjPk.pdf\",\"image\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/crud-examples\\/20250902214326_LjKPW4QRvhnpiwjpVgI9.png\",\"avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/crud-examples\\/20250902214326_iIbrNKdi1MUPTacN3EzZ.png\",\"password\":\"$2y$12$3IJnLAmXAZqUQE8iocpvIuetx4bOe6OjKiYWcBeB\\/Ef16EoOOJPYG\",\"created_by_id\":1,\"updated_at\":\"2025-09-02T14:43:27.000000Z\",\"created_at\":\"2025-09-02T14:43:27.000000Z\",\"id\":101}', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', '2025-09-02 14:43:27', '2025-09-02 14:43:27');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_type` enum('Syariah','Konvensional') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Konvensional',
  `created_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `last_updated_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `bank_type`, `created_by_id`, `last_updated_by_id`, `created_at`, `updated_at`) VALUES
(1, 'ALADIN SYARIAH', 'Syariah', 1, NULL, NULL, NULL),
(2, 'ALLO BANK', 'Konvensional', 1, NULL, NULL, NULL),
(3, 'AMAR BANK', 'Konvensional', 1, NULL, NULL, NULL),
(4, 'BANK SAQU', 'Konvensional', 1, NULL, NULL, NULL),
(5, 'BCA', 'Konvensional', 1, NULL, NULL, NULL),
(6, 'BINA DIGITAL', 'Konvensional', 1, NULL, NULL, NULL),
(7, 'BLU', 'Konvensional', 1, NULL, NULL, NULL),
(8, 'BSI', 'Syariah', 1, NULL, NULL, NULL),
(9, 'CIMB', 'Konvensional', 1, NULL, NULL, NULL),
(10, 'CIMB SYARIAH', 'Syariah', 1, NULL, NULL, NULL),
(11, 'FINETIKS', 'Konvensional', 1, NULL, NULL, NULL),
(12, 'JAGO SYARIAH', 'Syariah', 1, NULL, NULL, NULL),
(13, 'KROM BANK', 'Konvensional', 1, NULL, NULL, NULL),
(14, 'MEGA', 'Konvensional', 1, NULL, NULL, NULL),
(15, 'MEGA SYARIAH', 'Syariah', 1, NULL, NULL, NULL),
(16, 'NEOCOMMERCE', 'Konvensional', 1, NULL, NULL, NULL),
(17, 'SEABANK', 'Konvensional', 1, NULL, NULL, NULL),
(18, 'SUPERBANK', 'Konvensional', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bank_deposits`
--

CREATE TABLE `bank_deposits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_id` bigint(20) UNSIGNED DEFAULT NULL,
  `per_anum` double NOT NULL COMMENT 'percentage',
  `amount` double NOT NULL,
  `tax_percentage` double NOT NULL DEFAULT '2',
  `tax` double NOT NULL,
  `estimation` double NOT NULL,
  `time_period` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `due_date` date DEFAULT NULL,
  `status` enum('Aktif','Tidak Aktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `realization` double DEFAULT NULL,
  `difference` double DEFAULT NULL,
  `created_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `last_updated_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_deposits`
--

INSERT INTO `bank_deposits` (`id`, `bank_id`, `per_anum`, `amount`, `tax_percentage`, `tax`, `estimation`, `time_period`, `due_date`, `status`, `realization`, `difference`, `created_by_id`, `last_updated_by_id`, `created_at`, `updated_at`) VALUES
(1, 1, 9, 34999000, 20, 52498.5, 209994, '1 Bulan', '2025-09-07', 'Aktif', NULL, NULL, 1, 1, '2025-08-16 08:03:18', '2025-08-16 09:37:27'),
(2, 13, 7.25, 10000000, 20, 12083.333333333, 48333.333333333, '1 Bulan', '2025-09-06', 'Aktif', NULL, NULL, 1, 1, '2025-08-16 08:20:43', '2025-08-16 09:36:51'),
(3, 4, 6.8, 5000000, 20, 5666.6666666667, 22666.666666667, '1 Bulan', '2025-09-03', 'Aktif', NULL, NULL, 1, 1, '2025-08-16 08:22:34', '2025-08-16 09:35:49'),
(4, 4, 6.5, 10000000, 20, 10833.333333333, 43333.333333333, '1 Bulan', '2025-09-03', 'Aktif', NULL, NULL, 1, 1, '2025-08-16 08:23:08', '2025-08-16 09:35:31'),
(5, 18, 6, 1250000, 20, 625, 2500, '14 Hari', '2025-08-20', 'Aktif', NULL, NULL, 1, 1, '2025-08-16 08:26:12', '2025-08-16 09:35:07'),
(6, 18, 6, 0, 20, 0, 0, '7 Hari', NULL, 'Tidak Aktif', NULL, 0, 1, 1, '2025-08-16 08:26:42', '2025-09-02 14:08:31'),
(7, 4, 5, 3703400, 20, 3086.1666666667, 12344.666666667, '1 Bulan', '2025-09-05', 'Aktif', NULL, NULL, 1, 1, '2025-08-16 08:27:18', '2025-08-16 09:32:44'),
(8, 11, 5, 2500000, 20, 2083.3333333333, 8333.3333333333, '1 Bulan', '2025-09-16', 'Aktif', NULL, NULL, 1, 1, '2025-08-16 08:28:23', '2025-08-16 08:28:23'),
(9, 17, 4.75, 10000000, 20, 7916.6666666667, 31666.666666667, '1 Bulan', '2025-09-04', 'Aktif', NULL, NULL, 1, 1, '2025-08-16 08:29:38', '2025-08-16 09:32:04'),
(10, 17, 4.5, 10000000, 20, 7500, 30000, '1 Bulan', '2025-09-03', 'Aktif', NULL, NULL, 1, 1, '2025-08-16 08:29:56', '2025-08-16 09:31:46'),
(11, 4, 4.25, 1000000, 20, 708.33333333333, 2833.3333333333, '1 Bulan', '2025-09-16', 'Aktif', NULL, NULL, 1, 1, '2025-08-16 08:30:52', '2025-08-16 08:30:52'),
(12, 12, 4, 30000000, 20, 20000, 80000, '1 Bulan', '2025-09-03', 'Aktif', NULL, NULL, 1, 1, '2025-08-16 08:31:18', '2025-08-16 09:27:23'),
(13, 15, 3.99, 20000000, 20, 13300, 53200, '1 Bulan', '2025-09-08', 'Aktif', NULL, NULL, 1, 1, '2025-08-16 08:31:42', '2025-08-16 09:26:08'),
(14, 8, 3, 60000000, 20, 30000, 120000, '1 Bulan', '2025-09-03', 'Aktif', NULL, NULL, 1, 1, '2025-08-16 08:32:10', '2025-08-16 09:10:21'),
(15, 10, 3, 8000000, 20, 4000, 16000, '1 Bulan', '2025-09-06', 'Aktif', NULL, NULL, 1, 1, '2025-08-16 08:32:26', '2025-08-16 09:09:14');

-- --------------------------------------------------------

--
-- Table structure for table `bank_deposit_histories`
--

CREATE TABLE `bank_deposit_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_deposit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `per_anum` double NOT NULL COMMENT 'percentage',
  `amount` double NOT NULL,
  `tax_percentage` double NOT NULL DEFAULT '2',
  `tax` double NOT NULL,
  `estimation` double NOT NULL,
  `time_period` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `due_date` date DEFAULT NULL,
  `realization` double DEFAULT NULL,
  `difference` double DEFAULT NULL,
  `created_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `last_updated_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_deposit_histories`
--

INSERT INTO `bank_deposit_histories` (`id`, `bank_deposit_id`, `per_anum`, `amount`, `tax_percentage`, `tax`, `estimation`, `time_period`, `due_date`, `realization`, `difference`, `created_by_id`, `last_updated_by_id`, `created_at`, `updated_at`) VALUES
(1, 6, 6, 750000, 20, 187.5, 750, '7 Hari', '2025-08-13', 863, -113, 1, 1, '2025-08-16 01:26:42', '2025-08-16 02:34:30');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('spatie.permission.cache', 'a:3:{s:5:\"alias\";a:8:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"f\";s:19:\"permission_group_id\";s:1:\"r\";s:5:\"roles\";s:1:\"j\";s:9:\"is_locked\";s:1:\"k\";s:13:\"created_by_id\";s:1:\"l\";s:18:\"last_updated_by_id\";}s:11:\"permissions\";a:108:{i:0;a:5:{s:1:\"a\";i:1;s:1:\"b\";s:6:\"Profil\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:1;s:1:\"r\";a:5:{i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:4;i:4;i:5;}}i:1;a:5:{s:1:\"a\";i:2;s:1:\"b\";s:11:\"Profil Ubah\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:1;s:1:\"r\";a:5:{i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:4;i:4;i:5;}}i:2;a:5:{s:1:\"a\";i:3;s:1:\"b\";s:21:\"Profil Perbarui Email\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:1;s:1:\"r\";a:5:{i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:4;i:4;i:5;}}i:3;a:5:{s:1:\"a\";i:4;s:1:\"b\";s:24:\"Profil Perbarui Password\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:1;s:1:\"r\";a:5:{i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:4;i:4;i:5;}}i:4;a:5:{s:1:\"a\";i:5;s:1:\"b\";s:17:\"Profil Hapus Akun\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:1;s:1:\"r\";a:5:{i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:4;i:4;i:5;}}i:5;a:5:{s:1:\"a\";i:6;s:1:\"b\";s:13:\"Log Aktivitas\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:2;s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:6;a:5:{s:1:\"a\";i:7;s:1:\"b\";s:20:\"Log Aktivitas Ekspor\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:2;s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:7;a:5:{s:1:\"a\";i:8;s:1:\"b\";s:11:\"Log Request\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:3;s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:8;a:5:{s:1:\"a\";i:9;s:1:\"b\";s:18:\"Log Request Ekspor\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:3;s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:9;a:5:{s:1:\"a\";i:10;s:1:\"b\";s:4:\"Role\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:4;s:1:\"r\";a:1:{i:0;i:1;}}i:10;a:5:{s:1:\"a\";i:11;s:1:\"b\";s:11:\"Role Tambah\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:4;s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:5:{s:1:\"a\";i:12;s:1:\"b\";s:16:\"Role Impor Excel\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:4;s:1:\"r\";a:1:{i:0;i:1;}}i:12;a:5:{s:1:\"a\";i:13;s:1:\"b\";s:9:\"Role Ubah\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:4;s:1:\"r\";a:1:{i:0;i:1;}}i:13;a:5:{s:1:\"a\";i:14;s:1:\"b\";s:11:\"Role Detail\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:4;s:1:\"r\";a:1:{i:0;i:1;}}i:14;a:5:{s:1:\"a\";i:15;s:1:\"b\";s:10:\"Role Hapus\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:4;s:1:\"r\";a:1:{i:0;i:1;}}i:15;a:5:{s:1:\"a\";i:16;s:1:\"b\";s:11:\"Role Ekspor\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:4;s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:16;a:5:{s:1:\"a\";i:17;s:1:\"b\";s:10:\"Permission\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:5;s:1:\"r\";a:1:{i:0;i:1;}}i:17;a:5:{s:1:\"a\";i:18;s:1:\"b\";s:17:\"Permission Tambah\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:5;s:1:\"r\";a:1:{i:0;i:1;}}i:18;a:5:{s:1:\"a\";i:19;s:1:\"b\";s:22:\"Permission Impor Excel\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:5;s:1:\"r\";a:1:{i:0;i:1;}}i:19;a:5:{s:1:\"a\";i:20;s:1:\"b\";s:15:\"Permission Ubah\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:5;s:1:\"r\";a:1:{i:0;i:1;}}i:20;a:5:{s:1:\"a\";i:21;s:1:\"b\";s:17:\"Permission Detail\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:5;s:1:\"r\";a:1:{i:0;i:1;}}i:21;a:5:{s:1:\"a\";i:22;s:1:\"b\";s:16:\"Permission Hapus\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:5;s:1:\"r\";a:1:{i:0;i:1;}}i:22;a:5:{s:1:\"a\";i:23;s:1:\"b\";s:17:\"Permission Ekspor\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:5;s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:23;a:5:{s:1:\"a\";i:24;s:1:\"b\";s:16:\"Group Permission\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:6;s:1:\"r\";a:1:{i:0;i:1;}}i:24;a:5:{s:1:\"a\";i:25;s:1:\"b\";s:23:\"Group Permission Tambah\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:6;s:1:\"r\";a:1:{i:0;i:1;}}i:25;a:5:{s:1:\"a\";i:26;s:1:\"b\";s:28:\"Group Permission Impor Excel\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:6;s:1:\"r\";a:1:{i:0;i:1;}}i:26;a:5:{s:1:\"a\";i:27;s:1:\"b\";s:21:\"Group Permission Ubah\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:6;s:1:\"r\";a:1:{i:0;i:1;}}i:27;a:5:{s:1:\"a\";i:28;s:1:\"b\";s:23:\"Group Permission Detail\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:6;s:1:\"r\";a:1:{i:0;i:1;}}i:28;a:5:{s:1:\"a\";i:29;s:1:\"b\";s:22:\"Group Permission Hapus\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:6;s:1:\"r\";a:1:{i:0;i:1;}}i:29;a:5:{s:1:\"a\";i:30;s:1:\"b\";s:23:\"Group Permission Ekspor\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:6;s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:30;a:5:{s:1:\"a\";i:31;s:1:\"b\";s:8:\"Pengguna\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:7;s:1:\"r\";a:1:{i:0;i:1;}}i:31;a:5:{s:1:\"a\";i:32;s:1:\"b\";s:15:\"Pengguna Tambah\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:7;s:1:\"r\";a:1:{i:0;i:1;}}i:32;a:5:{s:1:\"a\";i:33;s:1:\"b\";s:20:\"Pengguna Impor Excel\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:7;s:1:\"r\";a:1:{i:0;i:1;}}i:33;a:5:{s:1:\"a\";i:34;s:1:\"b\";s:13:\"Pengguna Ubah\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:7;s:1:\"r\";a:1:{i:0;i:1;}}i:34;a:5:{s:1:\"a\";i:35;s:1:\"b\";s:15:\"Pengguna Detail\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:7;s:1:\"r\";a:1:{i:0;i:1;}}i:35;a:5:{s:1:\"a\";i:36;s:1:\"b\";s:14:\"Pengguna Hapus\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:7;s:1:\"r\";a:1:{i:0;i:1;}}i:36;a:5:{s:1:\"a\";i:37;s:1:\"b\";s:15:\"Pengguna Ekspor\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:7;s:1:\"r\";a:1:{i:0;i:1;}}i:37;a:5:{s:1:\"a\";i:38;s:1:\"b\";s:20:\"Pengguna Force Login\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:7;s:1:\"r\";a:1:{i:0;i:1;}}i:38;a:5:{s:1:\"a\";i:39;s:1:\"b\";s:15:\"Pengguna Blokir\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:7;s:1:\"r\";a:1:{i:0;i:1;}}i:39;a:5:{s:1:\"a\";i:40;s:1:\"b\";s:10:\"Pengaturan\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:8;s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:40;a:5:{s:1:\"a\";i:41;s:1:\"b\";s:12:\"Reset Sistem\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:8;s:1:\"r\";a:1:{i:0;i:1;}}i:41;a:5:{s:1:\"a\";i:42;s:1:\"b\";s:14:\"Manajemen File\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:9;s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:42;a:5:{s:1:\"a\";i:43;s:1:\"b\";s:6:\"Ubuntu\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:10;s:1:\"r\";a:1:{i:0;i:1;}}i:43;a:5:{s:1:\"a\";i:44;s:1:\"b\";s:15:\"Backup Database\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:11;s:1:\"r\";a:1:{i:0;i:1;}}i:44;a:5:{s:1:\"a\";i:45;s:1:\"b\";s:18:\"Laravel Log Viewer\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:12;s:1:\"r\";a:1:{i:0;i:1;}}i:45;a:5:{s:1:\"a\";i:46;s:1:\"b\";s:10:\"Notifikasi\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:13;s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:46;a:5:{s:1:\"a\";i:47;s:1:\"b\";s:4:\"Menu\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:14;s:1:\"r\";a:1:{i:0;i:1;}}i:47;a:5:{s:1:\"a\";i:48;s:1:\"b\";s:11:\"Menu Tambah\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:14;s:1:\"r\";a:1:{i:0;i:1;}}i:48;a:5:{s:1:\"a\";i:49;s:1:\"b\";s:9:\"Menu Ubah\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:14;s:1:\"r\";a:1:{i:0;i:1;}}i:49;a:5:{s:1:\"a\";i:50;s:1:\"b\";s:11:\"Menu Detail\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:14;s:1:\"r\";a:1:{i:0;i:1;}}i:50;a:5:{s:1:\"a\";i:51;s:1:\"b\";s:10:\"Menu Hapus\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:14;s:1:\"r\";a:1:{i:0;i:1;}}i:51;a:5:{s:1:\"a\";i:52;s:1:\"b\";s:11:\"Menu Ekspor\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:14;s:1:\"r\";a:1:{i:0;i:1;}}i:52;a:5:{s:1:\"a\";i:53;s:1:\"b\";s:16:\"Menu Impor Excel\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:14;s:1:\"r\";a:1:{i:0;i:1;}}i:53;a:5:{s:1:\"a\";i:54;s:1:\"b\";s:9:\"Grup Menu\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:15;s:1:\"r\";a:1:{i:0;i:1;}}i:54;a:5:{s:1:\"a\";i:55;s:1:\"b\";s:16:\"Grup Menu Tambah\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:15;s:1:\"r\";a:1:{i:0;i:1;}}i:55;a:5:{s:1:\"a\";i:56;s:1:\"b\";s:14:\"Grup Menu Ubah\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:15;s:1:\"r\";a:1:{i:0;i:1;}}i:56;a:5:{s:1:\"a\";i:57;s:1:\"b\";s:16:\"Grup Menu Detail\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:15;s:1:\"r\";a:1:{i:0;i:1;}}i:57;a:5:{s:1:\"a\";i:58;s:1:\"b\";s:15:\"Grup Menu Hapus\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:15;s:1:\"r\";a:1:{i:0;i:1;}}i:58;a:5:{s:1:\"a\";i:59;s:1:\"b\";s:11:\"Contoh CRUD\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:16;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:4;}}i:59;a:5:{s:1:\"a\";i:60;s:1:\"b\";s:18:\"Contoh CRUD Tambah\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:16;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:4;}}i:60;a:5:{s:1:\"a\";i:61;s:1:\"b\";s:23:\"Contoh CRUD Impor Excel\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:16;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:4;}}i:61;a:5:{s:1:\"a\";i:62;s:1:\"b\";s:16:\"Contoh CRUD Ubah\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:16;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:4;}}i:62;a:5:{s:1:\"a\";i:63;s:1:\"b\";s:18:\"Contoh CRUD Detail\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:16;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:4;}}i:63;a:5:{s:1:\"a\";i:64;s:1:\"b\";s:17:\"Contoh CRUD Hapus\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:16;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:4;}}i:64;a:5:{s:1:\"a\";i:65;s:1:\"b\";s:18:\"Contoh CRUD Ekspor\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:16;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:4;}}i:65;a:5:{s:1:\"a\";i:66;s:1:\"b\";s:17:\"Contoh CRUD Yajra\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:16;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:4;}}i:66;a:5:{s:1:\"a\";i:67;s:1:\"b\";s:22:\"Contoh CRUD Ajax Yajra\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:16;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:4;}}i:67;a:5:{s:1:\"a\";i:68;s:1:\"b\";s:4:\"Bank\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:17;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:68;a:5:{s:1:\"a\";i:69;s:1:\"b\";s:11:\"Bank Tambah\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:17;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:69;a:5:{s:1:\"a\";i:70;s:1:\"b\";s:16:\"Bank Impor Excel\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:17;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:70;a:5:{s:1:\"a\";i:71;s:1:\"b\";s:9:\"Bank Ubah\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:17;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:71;a:5:{s:1:\"a\";i:72;s:1:\"b\";s:11:\"Bank Detail\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:17;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:72;a:5:{s:1:\"a\";i:73;s:1:\"b\";s:10:\"Bank Hapus\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:17;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:73;a:5:{s:1:\"a\";i:74;s:1:\"b\";s:11:\"Bank Ekspor\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:17;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:74;a:5:{s:1:\"a\";i:75;s:1:\"b\";s:13:\"Deposito Bank\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:18;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:75;a:5:{s:1:\"a\";i:76;s:1:\"b\";s:20:\"Deposito Bank Tambah\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:18;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:76;a:5:{s:1:\"a\";i:77;s:1:\"b\";s:25:\"Deposito Bank Impor Excel\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:18;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:77;a:5:{s:1:\"a\";i:78;s:1:\"b\";s:18:\"Deposito Bank Ubah\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:18;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:78;a:5:{s:1:\"a\";i:79;s:1:\"b\";s:20:\"Deposito Bank Detail\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:18;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:79;a:5:{s:1:\"a\";i:80;s:1:\"b\";s:19:\"Deposito Bank Hapus\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:18;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:80;a:5:{s:1:\"a\";i:81;s:1:\"b\";s:20:\"Deposito Bank Ekspor\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:18;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:81;a:5:{s:1:\"a\";i:82;s:1:\"b\";s:21:\"Riwayat Deposito Bank\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:19;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:82;a:5:{s:1:\"a\";i:83;s:1:\"b\";s:28:\"Riwayat Deposito Bank Ekspor\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:19;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:83;a:5:{s:1:\"a\";i:84;s:1:\"b\";s:9:\"Mahasiswa\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:20;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:5;}}i:84;a:5:{s:1:\"a\";i:85;s:1:\"b\";s:16:\"Mahasiswa Tambah\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:20;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:5;}}i:85;a:5:{s:1:\"a\";i:86;s:1:\"b\";s:21:\"Mahasiswa Impor Excel\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:20;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:5;}}i:86;a:5:{s:1:\"a\";i:87;s:1:\"b\";s:14:\"Mahasiswa Ubah\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:20;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:5;}}i:87;a:5:{s:1:\"a\";i:88;s:1:\"b\";s:16:\"Mahasiswa Detail\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:20;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:5;}}i:88;a:5:{s:1:\"a\";i:89;s:1:\"b\";s:15:\"Mahasiswa Hapus\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:20;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:5;}}i:89;a:5:{s:1:\"a\";i:90;s:1:\"b\";s:16:\"Mahasiswa Ekspor\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:20;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:5;}}i:90;a:5:{s:1:\"a\";i:91;s:1:\"b\";s:8:\"Fakultas\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:21;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:5;}}i:91;a:5:{s:1:\"a\";i:92;s:1:\"b\";s:15:\"Fakultas Tambah\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:21;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:5;}}i:92;a:5:{s:1:\"a\";i:93;s:1:\"b\";s:20:\"Fakultas Impor Excel\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:21;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:5;}}i:93;a:5:{s:1:\"a\";i:94;s:1:\"b\";s:13:\"Fakultas Ubah\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:21;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:5;}}i:94;a:5:{s:1:\"a\";i:95;s:1:\"b\";s:15:\"Fakultas Detail\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:21;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:5;}}i:95;a:5:{s:1:\"a\";i:96;s:1:\"b\";s:14:\"Fakultas Hapus\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:21;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:5;}}i:96;a:5:{s:1:\"a\";i:97;s:1:\"b\";s:15:\"Fakultas Ekspor\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:21;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:5;}}i:97;a:5:{s:1:\"a\";i:98;s:1:\"b\";s:14:\"Fakultas Yajra\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:21;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:5;}}i:98;a:5:{s:1:\"a\";i:99;s:1:\"b\";s:19:\"Fakultas Ajax Yajra\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:21;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:5;}}i:99;a:5:{s:1:\"a\";i:100;s:1:\"b\";s:13:\"Program Studi\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:22;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:5;}}i:100;a:5:{s:1:\"a\";i:101;s:1:\"b\";s:20:\"Program Studi Tambah\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:22;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:5;}}i:101;a:5:{s:1:\"a\";i:102;s:1:\"b\";s:25:\"Program Studi Impor Excel\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:22;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:5;}}i:102;a:5:{s:1:\"a\";i:103;s:1:\"b\";s:18:\"Program Studi Ubah\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:22;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:5;}}i:103;a:5:{s:1:\"a\";i:104;s:1:\"b\";s:20:\"Program Studi Detail\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:22;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:5;}}i:104;a:5:{s:1:\"a\";i:105;s:1:\"b\";s:19:\"Program Studi Hapus\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:22;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:5;}}i:105;a:5:{s:1:\"a\";i:106;s:1:\"b\";s:20:\"Program Studi Ekspor\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:22;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:5;}}i:106;a:5:{s:1:\"a\";i:107;s:1:\"b\";s:19:\"Program Studi Yajra\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:22;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:5;}}i:107;a:5:{s:1:\"a\";i:108;s:1:\"b\";s:24:\"Program Studi Ajax Yajra\";s:1:\"c\";s:3:\"web\";s:1:\"f\";i:22;s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:5;}}}s:5:\"roles\";a:5:{i:0;a:6:{s:1:\"a\";i:1;s:1:\"b\";s:10:\"superadmin\";s:1:\"c\";s:3:\"web\";s:1:\"j\";i:1;s:1:\"k\";i:1;s:1:\"l\";N;}i:1;a:6:{s:1:\"a\";i:2;s:1:\"b\";s:5:\"admin\";s:1:\"c\";s:3:\"web\";s:1:\"j\";i:0;s:1:\"k\";i:1;s:1:\"l\";N;}i:2;a:6:{s:1:\"a\";i:3;s:1:\"b\";s:6:\"banker\";s:1:\"c\";s:3:\"web\";s:1:\"j\";i:0;s:1:\"k\";i:1;s:1:\"l\";N;}i:3;a:6:{s:1:\"a\";i:4;s:1:\"b\";s:4:\"user\";s:1:\"c\";s:3:\"web\";s:1:\"j\";i:0;s:1:\"k\";i:1;s:1:\"l\";N;}i:4;a:6:{s:1:\"a\";i:5;s:1:\"b\";s:16:\"admin pendidikan\";s:1:\"c\";s:3:\"web\";s:1:\"j\";i:0;s:1:\"k\";i:1;s:1:\"l\";N;}}}', 1756908732);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `crud_examples`
--

CREATE TABLE `crud_examples` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qr_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` double NOT NULL,
  `currency` double NOT NULL,
  `currency_idr` double NOT NULL,
  `select` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `select2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `select2_multiple` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `textarea` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `radio` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checkbox` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checkbox2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `color` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summernote_simple` text COLLATE utf8mb4_unicode_ci,
  `summernote` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `last_updated_by_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `crud_examples`
--

INSERT INTO `crud_examples` (`id`, `name`, `phone_number`, `birthdate`, `address`, `avatar`, `text`, `barcode`, `qr_code`, `email`, `password`, `number`, `currency`, `currency_idr`, `select`, `select2`, `select2_multiple`, `textarea`, `radio`, `checkbox`, `checkbox2`, `tags`, `file`, `image`, `date`, `time`, `color`, `summernote_simple`, `summernote`, `created_at`, `updated_at`, `created_by_id`, `last_updated_by_id`) VALUES
(1, 'Unjani Putri Usamah S.Ked', '0412 5394 435', '2011-12-26', 'Jr. Bhayangkara No. 295, Salatiga 64605, Lampung', 'https://gravatar.com/avatar/a6611171be3134b5685c7441f509984a6795aebed7c9897d70244ebc0e667405', 'TUNqvy3MpE', 'xGpK4fidvf', '4876834440833', 'joko10@gmail.co.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 610, 6300, 1862250, 'Option 5', 'Option 3', '[\"Option 1\",\"Option 2\"]', 'Vel voluptate voluptatibus iste repudiandae. Enim numquam sint expedita illo quod nisi et.', 'Option 2', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=1', 'https://picsum.photos/200/300?random=1', '1996-01-20', '18:36:14', '#af1242', 'Modi voluptatum exercitationem dolorem voluptas dicta. Aut quis cum nisi et et. Ad iure qui sed.', '<html><head><title>Doloribus saepe labore fuga est assumenda soluta.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">consequatur</label><input type=\"text\" id=\"username\"><label for=\"password\">omnis</label><input type=\"password\" id=\"password\"></form><div class=\"sapiente\">Sapiente inventore at quaerat rerum nisi ut tempora autem.Ut amet quidem ab quod laudantium.<span>Quia illo ipsum.</span></div><div class=\"incidunt\">Possimus eius quae.</div><div id=\"83353\"><div class=\"deleniti\"></div></div><div id=\"90238\"></div></body></html>\n', '2025-08-25 05:20:28', '2025-08-11 23:56:35', 1, NULL),
(2, 'Hamzah Vero Gunarto', '0210 6004 175', '1978-02-04', 'Jr. Baiduri No. 330, Tegal 27853, Aceh', 'https://gravatar.com/avatar/0d999ec2a881d98326f5eded86f1ba5bb3f0aaf670a2cd27d43e8815014d664a', 'Lg7QrGF9Kc', 'ynjYBTpG0K', '0809934913130', 'kani72@anggraini.ac.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 583, 9421, 5986254, 'Option 7', 'Option 4', '[\"Option 1\"]', 'Fuga et fugiat libero sed earum. Est sed ratione soluta tempora. Sed quo sint quia pariatur.', 'Option 1', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=2', 'https://picsum.photos/200/300?random=2', '1998-01-28', '00:35:14', '#a64fb6', 'Minima nisi quod corrupti dolorum exercitationem. Commodi hic maxime animi aut nihil et eos.', '<html><head><title>Neque molestiae ipsa.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">nostrum</label><input type=\"text\" id=\"username\"><label for=\"password\">occaecati</label><input type=\"password\" id=\"password\"></form><div class=\"sunt\"><div class=\"deleniti\"></div></div><div class=\"tenetur\"><h1>Assumenda nihil modi.</h1><p>Voluptatibus commodi.</p><p>Omnis delectus impedit fuga quia aut veritatis consequatur.</p><span>Eum doloremque exercitationem dolore voluptatem delectus reprehenderit.</span></div><div class=\"similique\"><p>Voluptatum.</p></div><div class=\"omnis\"></div></body></html>\n', '2025-08-24 08:31:32', '2025-08-10 18:58:48', NULL, 1),
(3, 'Juli Agustina S.E.', '0873 0824 864', '1977-12-02', 'Jln. Kebangkitan Nasional No. 992, Bima 73051, Sulut', 'https://gravatar.com/avatar/e41673bb752a82d956e4850707e0018d3e6806922314ececb3efd17c727facbe', 'TwRJ7Hp978', 'mKctUBF6Sq', '2793460774403', 'yessi.waluyo@yahoo.co.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 920, 5509, 8057467, 'Option 7', 'Option 3', '[\"Option 1\"]', 'Labore quaerat beatae voluptatem aut. Pariatur consequatur nihil quae illum ipsum qui.', 'Option 4', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=3', 'https://picsum.photos/200/300?random=3', '1970-08-21', '23:03:43', '#9c5752', 'Dolor eos sint eum in et. Praesentium provident deserunt ea tempora.', '<html><head><title>Autem nihil illo modi qui ut voluptas ex voluptas fugit vitae et blanditiis harum.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">provident</label><input type=\"text\" id=\"username\"><label for=\"password\">repellendus</label><input type=\"password\" id=\"password\"></form><div id=\"59153\"><b>Aut iure maiores ullam quaerat.</b>Facilis autem facere sapiente doloribus molestiae necessitatibus error tenetur et necessitatibus.</div><div class=\"aut\"><div id=\"41947\"></div><div id=\"24641\"><a href=\"example.com\">Excepturi ratione et aut odio.</a><b>Est consequatur est nostrum iste expedita repudiandae.</b></div></div><div id=\"59605\"><div id=\"24704\"></div><div class=\"aut\"></div><div id=\"34877\"><b>Illo at consequatur doloribus fugiat.</b><ul><li>Qui quia inventore quas.</li><li>Veritatis modi recusandae.</li><li>Itaque vero aut.</li><li>Mollitia sequi facilis.</li><li>Vel qui.</li></ul></div></div></body></html>\n', '2025-08-25 08:20:35', '2025-08-19 04:46:00', NULL, NULL),
(4, 'Yuni Yulianti S.T.', '(+62) 669 5461 1885', '1997-08-21', 'Gg. Dipenogoro No. 229, Pontianak 76139, Jambi', 'https://gravatar.com/avatar/a19d14e333132b56d9073b41b932370e28220ef239145a75acd9cc7088dba153', 'Bt1b1rGfU6', 'qN8lANUR3M', '0385066161552', 'esaefullah@agustina.com', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 16, 503, 7336588, 'Option 3', 'Option 6', '[\"Option 1\",\"Option 2\"]', 'Dolor id est velit culpa. Quam illo sed ut vel ut fuga eligendi.', 'Option 1', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=4', 'https://picsum.photos/200/300?random=4', '2021-02-14', '13:29:22', '#3e20d8', 'Impedit dolores molestiae id. Error qui quia commodi quo eos fuga. Quibusdam ut quis rerum soluta.', '<html><head><title>Et qui et ut qui placeat culpa et animi distinctio.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">perspiciatis</label><input type=\"text\" id=\"username\"><label for=\"password\">consequatur</label><input type=\"password\" id=\"password\"></form><div id=\"15386\"></div><div class=\"rerum\"></div></body></html>\n', '2025-08-25 19:45:24', '2025-08-31 08:42:49', NULL, 1),
(5, 'Rahayu Karen Kuswandari', '(+62) 327 3123 5493', '2013-05-28', 'Psr. Imam Bonjol No. 315, Makassar 44907, Riau', 'https://gravatar.com/avatar/53e9afe1c7804c3dd743497a06e04a3718a005563390d8ea4781db0fe2037053', 'zcsVp8tXk3', 'AXfBSdVs21', '8832973312659', 'anita21@gmail.com', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 393, 1877, 2802702, 'Option 1', 'Option 3', '[\"Option 1\"]', 'Sed qui quia natus deserunt. Est corporis aspernatur aut. Quia placeat in voluptatem quis et quos.', 'Option 3', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=5', 'https://picsum.photos/200/300?random=5', '1971-10-30', '18:15:41', '#10d899', 'Quae ea rem aut. Veritatis ut autem sint voluptatibus. Ut molestias nisi ducimus itaque.', '<html><head><title>Ut rerum voluptatem mollitia asperiores mollitia deserunt rem minus.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">sequi</label><input type=\"text\" id=\"username\"><label for=\"password\">qui</label><input type=\"password\" id=\"password\"></form><div class=\"dolorum\"></div></body></html>\n', '2025-08-21 22:41:00', '2025-08-06 04:38:34', NULL, NULL),
(6, 'Hani Puspita M.Ak', '0521 5513 945', '2021-03-19', 'Ki. Dewi Sartika No. 35, Tarakan 25208, Riau', 'https://gravatar.com/avatar/f207d259bbbb26e9e0052fca88cb6cb7f7a06b07d43601245563ac935ca10806', 'dokjZZrWgw', '7AwFeMigb6', '0058643665001', 'phassanah@susanti.sch.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 795, 1636, 8396755, 'Option 1', 'Option 5', '[\"Option 1\",\"Option 2\"]', 'Beatae optio vel dolor et debitis ratione. Voluptatem quisquam qui aut.', 'Option 2', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=6', 'https://picsum.photos/200/300?random=6', '1982-06-04', '03:02:05', '#223a44', 'Facilis animi dolores sint et commodi ipsa dolor. Odit ullam odio et magnam alias.', '<html><head><title>Reprehenderit nemo odio esse cupiditate enim veritatis provident et.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">aut</label><input type=\"text\" id=\"username\"><label for=\"password\">et</label><input type=\"password\" id=\"password\"></form><div class=\"voluptas\"><div id=\"81411\"></div><div id=\"50094\"><a href=\"example.com\">Voluptate sed voluptas sint et fugiat illo ex.</a><ul><li>Explicabo quia dolores distinctio.</li><li>Et maxime officiis laboriosam.</li><li>Qui similique et.</li><li>Et voluptatem eveniet rerum.</li></ul><b>Voluptatem repudiandae a voluptatem commodi laudantium et cupiditate delectus et sint.</b></div><div id=\"21664\"><table><thead><tr><th>Deserunt ratione.</th><th>Sequi eligendi sed.</th><th>Quibusdam itaque voluptatibus.</th><th>Enim iure quia ab ut.</th><th>At rerum sed molestias.</th></tr></thead><tbody><tr><td>Maxime culpa est voluptate non pariatur dolorum minima suscipit quis.</td><td>Sapiente veritatis repellendus animi.</td><td>Magnam ut eos accusantium sit veritatis ea vel consectetur excepturi quos.</td><td>Aliquam aut accusantium atque consectetur.</td><td>Porro rerum consequatur.</td></tr><tr><td>Adipisci velit.</td><td>Voluptate nisi cumque aperiam beatae voluptate error.</td><td>Est eum et.</td><td>Aliquam quidem consequatur aliquid ab amet ipsum magni sit.</td><td>Iusto id id culpa ut vel vel nihil.</td></tr><tr><td>Praesentium.</td><td>Aut dolore incidunt a provident vel et rerum sit qui.</td><td>Eum eveniet.</td><td>Voluptas similique facilis animi cupiditate.</td><td>Nostrum sunt debitis omnis qui dolorum.</td></tr><tr><td>Qui debitis eum dolores et sint.</td><td>Temporibus adipisci in ipsa adipisci molestiae.</td><td>Autem est magni numquam odit doloribus id.</td><td>Voluptatibus ex unde.</td><td>Libero ipsa vero quia pariatur et.</td></tr><tr><td>Eaque ut ut nihil neque omnis necessitatibus minus necessitatibus nesciunt nam.</td><td>Consequatur quaerat provident.</td><td>Est voluptatem voluptas autem nemo.</td><td>Laborum sint officia iusto doloremque et quia.</td><td>Laborum.</td></tr><tr><td>Eius blanditiis maiores velit et et.</td><td>Officia quos ea aut debitis ex.</td><td>Sit autem ipsa saepe voluptate aut velit occaecati et.</td><td>Et qui odit.</td><td>Distinctio ad quisquam.</td></tr><tr><td>Dolorem sunt blanditiis laborum.</td><td>Ut aperiam sit voluptatem voluptatem voluptas aperiam.</td><td>Aspernatur esse voluptatem optio modi nam unde inventore nesciunt necessitatibus exercitationem dicta velit saepe.</td><td>Illum.</td><td>Dolor reprehenderit doloremque repudiandae sunt quod amet dolor sit rerum quisquam cum possimus.</td></tr><tr><td>Omnis sint.</td><td>Deserunt nam alias cumque pariatur pariatur quisquam.</td><td>Corporis praesentium error mollitia vero sequi nostrum consectetur saepe velit dolore est.</td><td>Dolor quaerat maiores nam et.</td><td>A et doloribus tempora expedita quo dolorem aperiam.</td></tr></tbody></table></div><div id=\"177\"></div></div><div class=\"minus\"></div><div class=\"reiciendis\"><span>Cum animi laboriosam molestiae suscipit tempore rerum.</span></div></body></html>\n', '2025-08-18 13:29:29', '2025-08-22 23:10:23', NULL, 1),
(7, 'Puput Salsabila Hasanah M.Kom.', '(+62) 671 6575 2017', '2020-03-16', 'Ki. Otto No. 215, Makassar 87379, Bali', 'https://gravatar.com/avatar/e91a10c7aa366fed3db895c6db69b2fb06eedf5046529904dde9ad587018eed0', 'AC2unzrAIq', 'FM155cJrrX', '2766582551764', 'jati.wasita@gmail.com', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 471, 170, 2566544, 'Option 1', 'Option 6', '[\"Option 1\",\"Option 2\"]', 'Rerum et enim pariatur sed sit. Ut optio autem quisquam. Aut vel et ea impedit id harum architecto.', 'Option 4', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=7', 'https://picsum.photos/200/300?random=7', '1996-06-29', '04:45:35', '#c1ed14', 'Sit debitis voluptatibus amet praesentium tenetur. Iure sit nostrum eaque omnis at.', '<html><head><title>Placeat provident et voluptatem consectetur earum eos.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">ea</label><input type=\"text\" id=\"username\"><label for=\"password\">reiciendis</label><input type=\"password\" id=\"password\"></form><div id=\"80469\"></div><div class=\"et\"><div class=\"velit\"></div><div class=\"aliquam\"></div></div><div id=\"75995\"></div><div class=\"corporis\"><p>Ut et asperiores tenetur quis quis nobis nulla fuga sed.</p><b>Velit aut enim.</b><a href=\"example.org\">Exercitationem ea aperiam architecto deleniti hic et.</a>Dolor minus corrupti totam suscipit quos numquam et.</div></body></html>\n', '2025-08-13 05:49:11', '2025-08-27 12:44:28', NULL, NULL),
(8, 'Opung Jaiman Sitorus S.Pt', '(+62) 961 5156 910', '1970-04-09', 'Ki. Adisumarmo No. 520, Sabang 98679, Sulut', 'https://gravatar.com/avatar/a30be957a10f5ca0f29536e4fd10ef23aeecc0edbd5deb7298ebcf300a6df992', 'ClSp3uUkN8', 'XZsp3lZJyg', '1057896933188', 'lbudiyanto@yahoo.com', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 988, 8153, 9452256, 'Option 10', 'Option 5', '[\"Option 1\"]', 'Quis ut odit quae ad. Officiis dolores sapiente et.', 'Option 1', '[\"Option 1\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=8', 'https://picsum.photos/200/300?random=8', '1975-09-20', '18:09:12', '#7b27b8', 'Aliquid similique nihil impedit. Ut autem odit debitis molestias. Quia aut est aut quia.', '<html><head><title>Sunt veritatis laudantium et suscipit iste optio dolores et quasi.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">quia</label><input type=\"text\" id=\"username\"><label for=\"password\">qui</label><input type=\"password\" id=\"password\"></form><div class=\"reiciendis\"></div><div id=\"19613\"><div id=\"77409\"></div></div><div id=\"46612\">Vitae quas consequuntur consequatur voluptatem eaque iusto laudantium omnis deleniti.</div><div class=\"et\"></div></body></html>\n', '2025-08-31 09:38:43', '2025-08-10 12:00:46', 1, 1),
(9, 'Eva Purwanti', '(+62) 889 2888 756', '2002-05-10', 'Dk. Bakau Griya Utama No. 829, Langsa 30180, Sulbar', 'https://gravatar.com/avatar/a18fcadf4b774f0639f5c85ae7081916b379538902ba64b8bed44e8df86d9833', 'PY7ygGWvrs', 'ijheFPn3Of', '6350330782706', 'rhardiansyah@waluyo.info', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 1000, 5669, 9127663, 'Option 4', 'Option 2', '[\"Option 1\",\"Option 2\"]', 'Vel odio atque suscipit error eos voluptates. Velit omnis incidunt eius earum et.', 'Option 2', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=9', 'https://picsum.photos/200/300?random=9', '2001-08-03', '14:38:24', '#042dab', 'Non voluptatem blanditiis vel aut. Et quasi molestiae quidem eaque eveniet aut.', '<html><head><title>Ipsam perspiciatis iste consectetur dolorem voluptatem provident molestiae.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">id</label><input type=\"text\" id=\"username\"><label for=\"password\">illo</label><input type=\"password\" id=\"password\"></form><div class=\"quaerat\"><div id=\"88\"></div><div id=\"84709\"></div></div><div id=\"2309\"><a href=\"example.org\">Fuga at consequatur ab sapiente.</a><h1>Animi temporibus aut quia nihil.</h1>Error dolorum iure quia reiciendis modi ad.</div></body></html>\n', '2025-08-17 13:34:32', '2025-08-08 12:14:11', 1, NULL),
(10, 'Cici Nurdiyanti', '(+62) 346 7548 505', '1998-03-04', 'Ds. Villa No. 568, Dumai 58347, Lampung', 'https://gravatar.com/avatar/8688f6e8e0e3ca5568b420892fb5064d5b50987e45c1f301934deb0652915a74', '83iX9VisnB', 'YutwZDHH6w', '2011773883026', 'situmorang.cahyo@simbolon.name', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 344, 1271, 730092, 'Option 5', 'Option 2', '[\"Option 1\"]', 'Sit repudiandae eius nisi nisi aliquam qui. Quis possimus reiciendis et officia.', 'Option 1', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=10', 'https://picsum.photos/200/300?random=10', '1999-06-16', '11:47:23', '#7efa97', 'Delectus quas aspernatur ipsam suscipit ipsum. Earum eveniet molestias dicta itaque quia.', '<html><head><title>Fugiat quia molestiae sunt consequatur aliquid eaque sint expedita dolorem.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">vel</label><input type=\"text\" id=\"username\"><label for=\"password\">voluptatibus</label><input type=\"password\" id=\"password\"></form><div class=\"ad\"><div class=\"suscipit\"><a href=\"example.net\">Excepturi delectus perferendis doloribus ab non beatae voluptatem aut.</a></div><div class=\"illum\"></div><div id=\"21838\"><span>Aliquam libero provident non.</span>Blanditiis sed eaque fugit aspernatur odio aut aut nostrum provident.Distinctio illo.</div></div><div class=\"error\">Quaerat occaecati repudiandae quis non aut.Ea odio.<span>In minus error officiis ex fuga quas aut.</span><ul><li>At cum.</li><li>Fugiat in.</li><li>Dolorem eligendi cumque aut aut quidem.</li><li>Aut.</li><li>Libero vero.</li></ul></div></body></html>\n', '2025-08-21 09:14:55', '2025-08-11 09:14:44', 1, NULL),
(11, 'Lala Talia Melani', '0792 5028 870', '1993-11-17', 'Psr. Batako No. 584, Prabumulih 83322, DKI', 'https://gravatar.com/avatar/3ce9d7b5d84f72fdb9c1f18b3bb8cb9667792bc64ee8c2173355de0b32ef3da5', 'FdCjDqgMFn', 'jWStcuWpf0', '6643103194258', 'rafid30@gmail.com', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 67, 9707, 9617016, 'Option 3', 'Option 8', '[\"Option 1\",\"Option 2\"]', 'Officia ex omnis dolorem ex quia veritatis. Est voluptate quia sit non earum minima.', 'Option 3', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=11', 'https://picsum.photos/200/300?random=11', '1986-03-23', '04:54:57', '#9e2ffc', 'Voluptatem magnam ex velit voluptate consequatur. In corporis aut enim id.', '<html><head><title>Aut corrupti recusandae consequatur.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">deserunt</label><input type=\"text\" id=\"username\"><label for=\"password\">et</label><input type=\"password\" id=\"password\"></form><div class=\"voluptatem\"><h1>Iure optio similique sint ut asperiores quod laudantium.</h1><ul><li>Cumque vel tempore.</li></ul></div><div class=\"rem\"><div id=\"61937\"></div></div></body></html>\n', '2025-08-30 21:54:32', '2025-08-10 15:28:35', NULL, 1),
(12, 'Irfan Pradipta', '0670 2317 8745', '1991-09-18', 'Jln. Ekonomi No. 612, Tidore Kepulauan 24143, DKI', 'https://gravatar.com/avatar/b658e2dd1d03e0b7d556473b1bde4e46a9c71cd3b632c1f9d58cdbde2b4c9669', 'cIZPPQF1Kl', '9yX2eo7NWL', '6122024773075', 'lazuardi.aris@aryani.org', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 905, 3571, 7518721, 'Option 2', 'Option 1', '[\"Option 1\"]', 'Architecto rem maiores sunt voluptatum. Sit ratione alias eos.', 'Option 4', '[\"Option 1\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=12', 'https://picsum.photos/200/300?random=12', '2021-10-01', '05:37:53', '#12485d', 'Est saepe impedit amet ipsa. Fuga nesciunt exercitationem aliquam. Libero unde est eos vel ab quae.', '<html><head><title>Eos quibusdam esse veniam autem.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">consectetur</label><input type=\"text\" id=\"username\"><label for=\"password\">minus</label><input type=\"password\" id=\"password\"></form><div id=\"78504\"></div><div class=\"rerum\"><div id=\"28175\"></div><div id=\"68260\"></div><div class=\"sequi\"></div></div><div id=\"96226\"></div><div id=\"34763\"></div></body></html>\n', '2025-08-07 02:00:27', '2025-08-05 19:15:05', 1, 1),
(13, 'Puput Usada', '(+62) 602 1205 037', '2000-07-18', 'Kpg. Ir. H. Juanda No. 206, Kupang 48913, Sulbar', 'https://gravatar.com/avatar/c824fc492a1165494daa64e4671e8e1146d8374607bff8d8e884073ef2899b88', '5UQMZlCTxH', 'QKEFZQRZ3Q', '9218142200634', 'twinarsih@nugroho.co', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 941, 2619, 6661446, 'Option 5', 'Option 2', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Dignissimos odit non iste vel fugiat ut. Ratione totam nostrum voluptas vel nulla est.', 'Option 3', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=13', 'https://picsum.photos/200/300?random=13', '1984-12-30', '10:11:20', '#509d6f', 'Et minima ut et. Odit culpa iure ab nisi occaecati. Adipisci autem quos et repellat nulla quis.', '<html><head><title>Cumque sit enim adipisci dignissimos cumque quidem sunt.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">omnis</label><input type=\"text\" id=\"username\"><label for=\"password\">distinctio</label><input type=\"password\" id=\"password\"></form><div id=\"70017\"><div class=\"molestias\"><a href=\"example.net\">Eligendi aliquid ea voluptas veritatis repudiandae voluptatibus accusamus quae modi.</a></div><div id=\"77458\"><p>Et ut ea voluptatibus.</p>Consequatur voluptates ipsam aut veniam doloribus excepturi et dolores ipsum ab.</div><div id=\"12322\"><p>Aspernatur qui magni qui voluptatem eius.</p><i>Autem nostrum eos nostrum eum sed.</i><ul><li>Facilis explicabo dolorum delectus ipsam.</li><li>Quam.</li><li>Corporis voluptatibus doloremque.</li><li>Occaecati deleniti est.</li><li>Explicabo.</li><li>Error eius reiciendis repellendus.</li><li>Ipsam quia repellat aut aut atque.</li><li>Cumque quia ullam.</li><li>Voluptatem magni cumque molestiae accusamus et.</li><li>Libero earum.</li></ul></div></div><div class=\"et\"><div id=\"91901\"><table><thead><tr><th>Deleniti alias sit consequuntur.</th></tr></thead><tbody><tr><td>Deleniti omnis velit qui fuga error nulla et maiores itaque dolor.</td></tr><tr><td>Veritatis culpa sunt in.</td></tr><tr><td>Eius et.</td></tr><tr><td>Sit rerum eos est quis animi modi quia beatae sint.</td></tr><tr><td>Et eaque aliquam enim incidunt suscipit in sapiente.</td></tr><tr><td>Id voluptas aut est blanditiis quibusdam error qui recusandae odit voluptates cupiditate.</td></tr></tbody></table></div><div id=\"33777\"></div></div></body></html>\n', '2025-08-04 14:26:12', '2025-08-12 19:28:48', NULL, NULL),
(14, 'Kani Kuswandari', '0578 1892 350', '1972-12-04', 'Psr. Flora No. 492, Mataram 61499, Sulteng', 'https://gravatar.com/avatar/a42602376d4d4667b260dfb672dc634d0261ab9ab523775a1da85f0110b544e7', 'hv3CmKA4BX', '2JYqGXnOT8', '8788778696350', 'anggabaya.habibi@putra.or.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 970, 3357, 9471794, 'Option 10', 'Option 8', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Vitae aut et ullam animi vel distinctio non. Animi ratione et veniam ab quod.', 'Option 1', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=14', 'https://picsum.photos/200/300?random=14', '1992-05-09', '02:04:51', '#76b0cd', 'Molestiae aperiam ut asperiores velit. In inventore molestiae nemo tempore quia.', '<html><head><title>Pariatur accusamus dolore animi nihil fuga voluptatum sunt quia fugit sed vitae.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">perferendis</label><input type=\"text\" id=\"username\"><label for=\"password\">esse</label><input type=\"password\" id=\"password\"></form><div class=\"laboriosam\"></div><div class=\"minima\"></div></body></html>\n', '2025-08-23 14:57:55', '2025-08-25 12:36:46', NULL, NULL),
(15, 'Olivia Hastuti', '0910 4792 730', '1980-12-17', 'Ki. Uluwatu No. 719, Tanjungbalai 97244, Pabar', 'https://gravatar.com/avatar/6de9e59227164ad62b0805166ff317ebfbd3fddd6ec61e1076b42079258afd1f', 'PNXUxacvdb', 'Nu33xS4DCd', '1992589463996', 'siregar.ajiono@winarno.com', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 842, 6463, 4266905, 'Option 5', 'Option 10', '[\"Option 1\",\"Option 2\"]', 'Earum earum id voluptatem et. Nihil ipsum ut molestiae. Voluptates velit optio aliquam delectus.', 'Option 1', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=15', 'https://picsum.photos/200/300?random=15', '1976-03-27', '14:33:50', '#176fdf', 'Rerum est vitae non soluta culpa. Facere et nam quo aut.', '<html><head><title>Cum consequatur qui et.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">quis</label><input type=\"text\" id=\"username\"><label for=\"password\">dolore</label><input type=\"password\" id=\"password\"></form><div id=\"44157\"></div><div class=\"quam\"><div id=\"59570\"><span>Ipsa facere laborum beatae doloribus dolorem.</span><i>Sunt quidem rerum id repudiandae.</i><h1>Ducimus blanditiis.</h1></div><div class=\"quaerat\"></div><div class=\"ipsam\"></div><div class=\"sunt\">Sunt nisi minima.<h3>Id aut exercitationem est porro consectetur praesentium assumenda eum.</h3><i>Est aut facilis quia praesentium.</i></div></div></body></html>\n', '2025-08-03 03:54:55', '2025-08-28 21:25:31', 1, NULL),
(16, 'Ana Hamima Purnawati', '(+62) 431 7365 1472', '2008-06-17', 'Jr. Gatot Subroto No. 163, Semarang 20450, Bali', 'https://gravatar.com/avatar/80e6f12a98c63bc22f36b765b47757a06cc099fdbe79ead67f909194d19cf080', '074vxfq9OZ', 'rP7u3n0fWi', '3650192584443', 'nabila.lailasari@utama.desa.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 615, 4779, 9760089, 'Option 10', 'Option 6', '[\"Option 1\"]', 'Quae repudiandae repellat ipsum eos ut sint. Qui sit dolores labore expedita.', 'Option 1', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=16', 'https://picsum.photos/200/300?random=16', '1985-04-28', '12:26:29', '#f0578e', 'Ab est iure laudantium. Consectetur eius laudantium rem. Ipsa hic voluptatem et ea nobis veritatis.', '<html><head><title>Totam aut eligendi numquam aspernatur qui.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">quia</label><input type=\"text\" id=\"username\"><label for=\"password\">numquam</label><input type=\"password\" id=\"password\"></form><div id=\"53121\"></div><div id=\"37899\"><p>Est sit.</p><i>Doloremque aut maiores repudiandae modi debitis sed incidunt non.</i></div><div id=\"89490\">Et hic et aut quis est quasi et neque distinctio magnam.<a href=\"example.com\">Fugiat praesentium aut illo veritatis ipsam cum dolore id ut cupiditate rem.</a></div></body></html>\n', '2025-08-17 13:56:06', '2025-08-14 13:13:08', NULL, NULL),
(17, 'Maimunah Wulandari', '(+62) 364 8930 704', '2000-05-13', 'Kpg. Baha No. 503, Mataram 71841, Lampung', 'https://gravatar.com/avatar/1ef3ecbb5ec2ff6346df2b1a0b099e7a5099429598d0ddfeb1e368e6d8933376', '0oIiAGpLfa', '8aM8CHnOXK', '7436078829695', 'auyainah@gmail.com', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 82, 2475, 7162993, 'Option 1', 'Option 4', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Nemo quia quis aliquid. Hic sed sint quos et est. Et eveniet ab et laboriosam voluptates.', 'Option 1', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=17', 'https://picsum.photos/200/300?random=17', '2006-12-15', '10:42:26', '#b703f6', 'Voluptate dolor aspernatur et ut. Veniam maiores eligendi non id voluptatem.', '<html><head><title>Delectus esse aut animi hic.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">eum</label><input type=\"text\" id=\"username\"><label for=\"password\">iusto</label><input type=\"password\" id=\"password\"></form><div id=\"90827\"><div id=\"64590\">Sapiente.<a href=\"example.org\">Occaecati blanditiis eos aliquam ut quia ab et eligendi explicabo reprehenderit iste.</a><a href=\"example.net\">Rem ex occaecati culpa possimus iure quasi.</a></div><div class=\"dolorum\"></div><div class=\"rerum\"><span>Est et velit sed facilis molestiae quia necessitatibus qui.</span>Laudantium impedit dolores et eaque vitae.Sit mollitia reiciendis tempora.<a href=\"example.com\">Id eos voluptas ipsum voluptates nam dolores sed esse aut sed id.</a></div></div><div class=\"id\"></div></body></html>\n', '2025-08-16 18:32:35', '2025-08-10 12:18:16', 1, 1),
(18, 'Raina Haryanti S.E.', '0987 8380 9355', '2009-12-04', 'Dk. Halim No. 482, Padangpanjang 26942, Sulsel', 'https://gravatar.com/avatar/439e159258f8dd60fb2fe4f7156936552301152d8d4562911783ca0ff9423ac9', '5wMtfKYvrd', '7QqtI9Gatt', '9239974100138', 'janet.hardiansyah@yahoo.co.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 117, 9161, 6837159, 'Option 9', 'Option 2', '[\"Option 1\",\"Option 2\"]', 'Neque et temporibus fuga dolorem. Enim voluptate perferendis quia qui cumque ut.', 'Option 1', '[\"Option 1\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=18', 'https://picsum.photos/200/300?random=18', '2004-04-23', '07:45:53', '#f1a26f', 'Necessitatibus ex ad necessitatibus distinctio et. Temporibus explicabo et eaque fuga quia ea.', '<html><head><title>Consequatur tempora.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">qui</label><input type=\"text\" id=\"username\"><label for=\"password\">porro</label><input type=\"password\" id=\"password\"></form><div id=\"37431\"></div></body></html>\n', '2025-08-29 22:57:47', '2025-08-21 07:45:46', 1, NULL),
(19, 'Dono Adriansyah', '(+62) 411 3132 625', '2014-03-05', 'Jr. Banda No. 820, Pagar Alam 30576, Gorontalo', 'https://gravatar.com/avatar/756daee1e1dc55f1e652fc47acafb8a8913931894ebea9eb0ed2af3658b2fcd4', 'J0Ri6XSKOl', 'v0bl27X2Dy', '5228052316855', 'mangunsong.kardi@pratiwi.biz.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 746, 2066, 4167708, 'Option 4', 'Option 3', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Non maxime sapiente nisi inventore. Ratione perferendis sequi fugiat expedita.', 'Option 1', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=19', 'https://picsum.photos/200/300?random=19', '2001-05-14', '05:14:57', '#e8c040', 'Ut eius voluptates magnam ipsa itaque rem maiores. Ullam quia rerum rerum sit reiciendis soluta.', '<html><head><title>Iste delectus id odio sed nesciunt labore distinctio quasi et exercitationem voluptas.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">consequuntur</label><input type=\"text\" id=\"username\"><label for=\"password\">ut</label><input type=\"password\" id=\"password\"></form><div class=\"vero\"></div><div class=\"mollitia\"></div><div class=\"consequatur\"><b>Laborum incidunt ea nobis autem voluptatem.</b><table><thead><tr><th>Similique at nesciunt.</th><th>Et esse nemo amet voluptates.</th><th>Mollitia quis id.</th><th>Esse neque.</th><th>Iste amet.</th><th>Nulla et magni.</th></tr></thead><tbody><tr><td>Aut dignissimos ab laudantium id ipsum alias nostrum eius sit dolore tempore error doloremque.</td><td>Eaque ducimus expedita tempora.</td><td>Dolor sed voluptas consequatur blanditiis.</td><td>Sunt voluptates doloremque eum in natus illum excepturi.</td><td>Nihil rem non dolor iure sit expedita unde ut ea aspernatur.</td><td>Non vel et eos ut non sapiente est.</td></tr><tr><td>Iure et voluptas et placeat.</td><td>Qui.</td><td>Dolor libero officia officia.</td><td>Et voluptatem quia excepturi est.</td><td>Totam.</td><td>Eum.</td></tr><tr><td>Iusto quia.</td><td>Magnam fugit earum fugiat ipsum est cum quaerat in deleniti.</td><td>Minima quia nulla mollitia voluptatem a soluta quos qui.</td><td>Enim libero ut est.</td><td>Dolor tenetur officia laborum optio explicabo perspiciatis aut.</td><td>Officia nihil.</td></tr><tr><td>Laudantium et nulla ut necessitatibus maxime et est perferendis illo.</td><td>Repellat vitae sint aut voluptatem maxime.</td><td>Repellendus aliquid.</td><td>Ex.</td><td>Nisi adipisci perferendis nesciunt porro est officiis ad repellat aspernatur laudantium eos.</td><td>Esse nihil repellendus.</td></tr><tr><td>Aut error.</td><td>Deserunt excepturi sed aut doloremque et ipsum.</td><td>Magnam assumenda recusandae consectetur nostrum sunt voluptatum ducimus odio omnis qui deserunt.</td><td>Ipsa quis ea itaque eum atque dolores officia.</td><td>Dolores culpa consequuntur velit minus quam.</td><td>Repellendus nostrum atque harum.</td></tr><tr><td>Soluta quos blanditiis deleniti nobis quibusdam occaecati sed blanditiis fugit.</td><td>Tempora incidunt aut eum rerum magnam asperiores ab quo reprehenderit.</td><td>Ut.</td><td>Dolores quod.</td><td>Explicabo saepe magnam necessitatibus sint.</td><td>Blanditiis corporis vel praesentium id temporibus.</td></tr></tbody></table></div><div class=\"et\"><div class=\"quos\"></div><div id=\"81320\"></div><div id=\"4956\"></div><div class=\"voluptatem\"></div></div></body></html>\n', '2025-08-29 17:24:18', '2025-08-29 13:22:00', NULL, 1),
(20, 'Irfan Budiman S.Farm', '0726 6429 6247', '2025-07-28', 'Dk. Yohanes No. 992, Bekasi 44127, Papua', 'https://gravatar.com/avatar/83b334627ac6a0c965914530bf541530183213f9f2cbd26037b7730bbdb1d739', 'z51LcIAakm', 'b40vOGzy7E', '2953587912083', 'mahesa86@yahoo.com', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 495, 9787, 379304, 'Option 10', 'Option 8', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Eos iste quod quo. Voluptas ea et necessitatibus aut inventore vel.', 'Option 3', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=20', 'https://picsum.photos/200/300?random=20', '2003-11-17', '19:02:35', '#5a99da', 'Et non iure delectus et. Error odit rem magni dolores quia vel vero.', '<html><head><title>Sed nisi fugiat accusantium tempore necessitatibus voluptatum.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">quod</label><input type=\"text\" id=\"username\"><label for=\"password\">saepe</label><input type=\"password\" id=\"password\"></form><div class=\"molestiae\"><h1>Quia voluptate numquam ea sint ipsa.</h1><span>Molestias aut repellat quod.</span></div><div id=\"10370\"></div></body></html>\n', '2025-08-21 13:53:57', '2025-08-15 20:08:47', NULL, NULL),
(21, 'Elvin Vero Januar M.Kom.', '(+62) 692 6223 203', '1991-01-05', 'Dk. Samanhudi No. 491, Kotamobagu 43409, Sulsel', 'https://gravatar.com/avatar/a49675473275f076bda35f9b942b4e2cc0eca1ff6df905632fcbbc87ae7df36a', 'cE8DRic4o8', 'zcRzlmdpHn', '3877919562700', 'paiman10@yahoo.co.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 181, 7221, 3968997, 'Option 10', 'Option 6', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Quis temporibus nisi voluptatem consectetur odit reprehenderit. At maxime suscipit quo cupiditate.', 'Option 3', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=21', 'https://picsum.photos/200/300?random=21', '1978-08-04', '15:48:36', '#5b5797', 'Porro est consequatur ut et. Voluptate quam est amet. Tenetur magnam nihil velit.', '<html><head><title>Exercitationem.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">dolores</label><input type=\"text\" id=\"username\"><label for=\"password\">porro</label><input type=\"password\" id=\"password\"></form><div id=\"74591\"></div></body></html>\n', '2025-08-19 23:56:32', '2025-08-12 16:25:29', NULL, 1),
(22, 'Julia Zelda Mayasari S.T.', '(+62) 634 3742 770', '1972-11-08', 'Jr. Sukajadi No. 734, Tasikmalaya 42584, Jabar', 'https://gravatar.com/avatar/8288dee24bec3fd5ef50d5f672e2b6b74dc7908af0571dc0264c76ce7a5d8357', 'PSvPXAYj6s', '0sZzTS4bSX', '2752300150487', 'xprasasta@pradana.ac.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 609, 6083, 3890139, 'Option 8', 'Option 8', '[\"Option 1\",\"Option 2\"]', 'Rem rem doloribus ut minima molestiae minus eos consequatur. Tempore esse inventore excepturi vel.', 'Option 1', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=22', 'https://picsum.photos/200/300?random=22', '1986-01-16', '10:06:53', '#035123', 'Et ea qui ipsa qui temporibus nulla nam. Earum vel minima perferendis dolor quia.', '<html><head><title>Esse et non consequuntur et et aut est voluptas est.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">ipsum</label><input type=\"text\" id=\"username\"><label for=\"password\">excepturi</label><input type=\"password\" id=\"password\"></form><div id=\"62286\"></div></body></html>\n', '2025-08-24 12:13:26', '2025-08-07 15:06:33', 1, 1),
(23, 'Gada Putra', '029 7683 833', '1987-03-08', 'Gg. Kebonjati No. 378, Gunungsitoli 60381, Sultra', 'https://gravatar.com/avatar/a2d2e2da28fdd8460685067af35e76a3dafcc70397a090c72b163a69c52e48ec', 'C0LT703sFk', 'JWpKq4lXDB', '7541383706521', 'rmayasari@gmail.co.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 900, 1681, 1859617, 'Option 2', 'Option 1', '[\"Option 1\"]', 'Sed et veniam minima quo facere aliquid. Maiores quod rerum qui praesentium illum.', 'Option 4', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=23', 'https://picsum.photos/200/300?random=23', '1988-01-13', '04:53:26', '#c76395', 'Cum magni et inventore cumque non. Dolorem quia amet nostrum est. Unde quis dolor id.', '<html><head><title>Consequatur sint.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">sequi</label><input type=\"text\" id=\"username\"><label for=\"password\">laboriosam</label><input type=\"password\" id=\"password\"></form><div id=\"34095\"><div class=\"sint\"><b>Minima reiciendis vel esse debitis eos nulla quos ut.</b></div><div id=\"82924\"></div><div class=\"saepe\"></div><div id=\"38086\"></div></div><div id=\"62040\"></div><div class=\"officiis\"><div id=\"71786\"></div><div class=\"porro\"></div><div id=\"42494\"></div><div id=\"23023\"></div></div><div id=\"2614\"><div class=\"et\"><a href=\"example.com\">Omnis consequatur quia vel sapiente itaque.</a><h2>Sint porro est.</h2><p>Vero cum amet qui.</p></div><div id=\"40223\"></div><div id=\"69807\"><b>Sit quia.</b></div></div></body></html>\n', '2025-08-05 20:33:40', '2025-08-05 18:23:02', NULL, 1),
(24, 'Daliman Prasasta', '0655 3751 266', '2020-02-19', 'Ds. Halim No. 342, Pariaman 79332, Aceh', 'https://gravatar.com/avatar/44ca8ecd30b849de9a36b070f613675061a77fe04494518774c36702a04246ba', 'ZcvMoEN8Jw', 'V6zkHcUbIA', '7147309910166', 'wahyudin.praba@susanti.or.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 735, 8716, 2610649, 'Option 1', 'Option 9', '[\"Option 1\",\"Option 2\"]', 'Quaerat provident tempora maiores provident sed. Quis in aut cum ipsam.', 'Option 4', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=24', 'https://picsum.photos/200/300?random=24', '2022-01-13', '11:15:35', '#1612d8', 'Voluptas vero laudantium eum. Sed est saepe natus rem alias. Minima aut dolorum porro rerum.', '<html><head><title>Molestiae non fugit.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">aut</label><input type=\"text\" id=\"username\"><label for=\"password\">repudiandae</label><input type=\"password\" id=\"password\"></form><div class=\"ut\"><div id=\"39986\"></div><div id=\"36769\"></div><div id=\"84772\"></div><div id=\"10996\"></div></div><div id=\"92204\"></div><div id=\"50221\"><div id=\"31140\"></div><div id=\"41902\"></div><div class=\"modi\"><span>Occaecati minus dicta cum et.</span></div></div></body></html>\n', '2025-08-20 06:54:22', '2025-08-09 14:31:17', 1, NULL),
(25, 'Mahfud Latupono', '0415 8403 5906', '2020-06-28', 'Ki. Kali No. 997, Payakumbuh 76801, DKI', 'https://gravatar.com/avatar/3a829c89f4edc52d4a8621860923abca14dbd5b6f1ec7b87af569e420fac6c6e', '7SDfhYYgAK', 'WMJrv9ZW3A', '2850129214486', 'iswahyudi.jumari@usada.or.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 25, 8964, 402576, 'Option 9', 'Option 4', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Fugit in accusantium voluptas omnis. Ad est pariatur aut odio veniam.', 'Option 3', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=25', 'https://picsum.photos/200/300?random=25', '2016-06-05', '16:15:36', '#0b88a6', 'Perspiciatis placeat sunt iusto sunt. Pariatur facere perferendis maxime sint pariatur ut aliquam.', '<html><head><title>Ipsum ipsam tenetur placeat atque.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">ipsum</label><input type=\"text\" id=\"username\"><label for=\"password\">sequi</label><input type=\"password\" id=\"password\"></form><div id=\"34742\"></div><div class=\"voluptas\"></div><div class=\"aperiam\"></div></body></html>\n', '2025-08-27 08:33:55', '2025-09-01 06:29:43', NULL, NULL),
(26, 'Ihsan Rajasa', '0309 4733 538', '1985-03-02', 'Ds. Katamso No. 76, Cimahi 45771, Gorontalo', 'https://gravatar.com/avatar/fa978171d3fac0f23e07dbdea889eedfdb0e456e612e8902dc5bf92263f51a36', 'GcuGnn5OWz', '5DvOlJzIja', '8580472939241', 'vpuspita@pangestu.mil.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 116, 9178, 7690322, 'Option 10', 'Option 6', '[\"Option 1\",\"Option 2\"]', 'Magni corrupti veniam a qui et vel rerum illo. Sed ducimus voluptas ducimus quaerat eos velit.', 'Option 3', '[\"Option 1\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=26', 'https://picsum.photos/200/300?random=26', '2021-11-25', '17:11:55', '#4faff2', 'Et explicabo beatae dolorem qui ut laboriosam et. Natus ipsam accusantium nostrum qui et.', '<html><head><title>Nisi est facere nesciunt.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">aspernatur</label><input type=\"text\" id=\"username\"><label for=\"password\">ut</label><input type=\"password\" id=\"password\"></form><div class=\"voluptas\"><i>Recusandae vel totam nisi natus qui.</i><table><thead><tr><th>Cum nisi.</th><th>Voluptatibus sit.</th></tr></thead><tbody><tr><td>Eius quisquam.</td><td>Eum fuga.</td></tr><tr><td>Qui quibusdam natus suscipit consequatur ut asperiores quo consequatur placeat.</td><td>Quo ipsum expedita adipisci accusamus a veniam quis ratione sunt.</td></tr><tr><td>Blanditiis quis quibusdam sunt omnis sit voluptatibus qui totam dignissimos blanditiis.</td><td>Dolorum beatae.</td></tr></tbody></table></div><div class=\"sit\">Sit consequatur eius iusto veritatis ratione ducimus cum.<h3>Et incidunt est necessitatibus reprehenderit odit architecto voluptas ut illum quia.</h3></div></body></html>\n', '2025-08-08 19:37:47', '2025-08-14 09:53:48', 1, 1),
(27, 'Radika Utama', '0314 7183 517', '2010-04-24', 'Dk. Kebangkitan Nasional No. 466, Sibolga 20646, Sumut', 'https://gravatar.com/avatar/8fe86a59a6fb9c213949dd45d42c2af1870a7919543fb37f9c58b0ba283b7b11', 'azN9u9rduQ', 'cbTffqWhH3', '1537331350416', 'banawa.hariyah@nuraini.sch.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 166, 4204, 3721124, 'Option 7', 'Option 9', '[\"Option 1\"]', 'Asperiores ut quasi et natus et. Incidunt non et ab cum enim quia ab. Qui possimus earum unde sunt.', 'Option 2', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=27', 'https://picsum.photos/200/300?random=27', '1970-06-17', '22:46:06', '#29534a', 'Aut qui ab ipsam odit totam amet officia. Cumque consequatur quasi vel consequatur nam soluta.', '<html><head><title>Mollitia beatae est et esse.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">pariatur</label><input type=\"text\" id=\"username\"><label for=\"password\">inventore</label><input type=\"password\" id=\"password\"></form><div class=\"harum\"><h2>Fuga corrupti rerum exercitationem.</h2>Id blanditiis.<span>Ipsum mollitia.</span></div><div id=\"70169\"></div><div class=\"et\"><div id=\"64978\"></div><div class=\"quidem\">Molestias perferendis impedit nesciunt.</div><div id=\"88782\"></div><div class=\"ea\"></div></div><div class=\"illo\"><div class=\"consectetur\"><a href=\"example.org\">Animi officia dolores in rerum voluptatem.</a><h2>Non deleniti error ut a dolorem ad laudantium ducimus.</h2><span>Sapiente ex.</span>Voluptas ut est adipisci hic.</div></div></body></html>\n', '2025-08-05 03:15:34', '2025-08-30 09:48:18', 1, NULL),
(28, 'Kemba Wibowo', '(+62) 286 0559 507', '1998-10-16', 'Kpg. Peta No. 339, Pasuruan 95234, Sulsel', 'https://gravatar.com/avatar/fe39b435da658c9773cdcec967b5ff28b5db3718e861a728c4a326b28b78f1f3', 'GsaaUnKN0y', '8luebWsuP2', '0433229886368', 'yani15@safitri.go.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 171, 2053, 4993045, 'Option 8', 'Option 6', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Blanditiis repellat eaque fugiat sed. Perspiciatis excepturi nobis quaerat dignissimos.', 'Option 1', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=28', 'https://picsum.photos/200/300?random=28', '1981-04-09', '04:32:18', '#5d4f67', 'Soluta dolorem eos qui quis et mollitia. Aliquam molestiae ut molestiae aut laboriosam.', '<html><head><title>Fugit repellat.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">soluta</label><input type=\"text\" id=\"username\"><label for=\"password\">pariatur</label><input type=\"password\" id=\"password\"></form><div id=\"19046\"></div><div id=\"12800\"></div><div id=\"18528\"><div id=\"20191\"><a href=\"example.org\">Totam mollitia eaque.</a><h2>Expedita maxime minima laudantium dolores qui.</h2><span>Animi quia iste earum consequatur dolor qui aliquid nobis.</span><p>Dolores voluptatem corporis facilis autem dolores dolores quas impedit asperiores nesciunt fugiat ipsum quasi.</p></div><div class=\"illo\"></div><div class=\"est\"><i>Aut laborum necessitatibus dolor et velit libero voluptatibus asperiores.</i><b>Distinctio dicta quas fugiat fugiat qui recusandae ut amet.</b>Consequuntur.</div></div><div class=\"adipisci\"></div></body></html>\n', '2025-09-02 05:09:47', '2025-08-30 17:17:44', 1, 1),
(29, 'Laksana Sitompul', '(+62) 378 8926 1145', '1987-08-23', 'Ki. Baranangsiang No. 555, Sukabumi 31635, Kaltim', 'https://gravatar.com/avatar/98fe7d6ce652f0000abc96aca3925b25ad4f415d0214aa30162587e23048b0f4', 'rDb3mlDcI5', 'KD8StAfFPI', '7740162852330', 'malika.susanti@waskita.biz.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 235, 7168, 6344777, 'Option 9', 'Option 10', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Eligendi qui quam id similique veritatis. Error voluptas incidunt repudiandae fugiat in ut.', 'Option 3', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=29', 'https://picsum.photos/200/300?random=29', '1988-12-04', '09:12:52', '#b09855', 'Quaerat quae velit quae. Aut consequatur eum quod sed. Blanditiis quisquam atque voluptas.', '<html><head><title>Nemo delectus quasi sint et esse in quo dignissimos.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">et</label><input type=\"text\" id=\"username\"><label for=\"password\">odio</label><input type=\"password\" id=\"password\"></form><div id=\"78691\"><b>Exercitationem voluptatem placeat.</b></div><div id=\"97569\"></div></body></html>\n', '2025-08-11 03:22:36', '2025-08-28 20:51:23', NULL, 1),
(30, 'Julia Susanti', '(+62) 621 8780 5655', '1983-05-26', 'Ds. Antapani Lama No. 878, Cirebon 45857, Sumsel', 'https://gravatar.com/avatar/9ed4ce1a8508eae2bcdab2e90024506d9e34e093efb24746aefca1c7763f4fac', 'UOv2mEenkt', 'yHFay7pvsX', '6424362052981', 'maya44@winarno.org', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 516, 3013, 7255590, 'Option 4', 'Option 1', '[\"Option 1\",\"Option 2\"]', 'Dolorem minima in quae voluptas aut. Et praesentium asperiores non.', 'Option 4', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=30', 'https://picsum.photos/200/300?random=30', '2017-05-01', '12:50:35', '#addf35', 'Maxime deserunt molestiae nulla et ad culpa. Qui ut optio vitae sunt consequatur.', '<html><head><title>Harum ratione cupiditate et aperiam optio deserunt.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">quod</label><input type=\"text\" id=\"username\"><label for=\"password\">sed</label><input type=\"password\" id=\"password\"></form><div class=\"sed\"></div></body></html>\n', '2025-08-09 01:01:41', '2025-08-19 23:55:03', 1, NULL);
INSERT INTO `crud_examples` (`id`, `name`, `phone_number`, `birthdate`, `address`, `avatar`, `text`, `barcode`, `qr_code`, `email`, `password`, `number`, `currency`, `currency_idr`, `select`, `select2`, `select2_multiple`, `textarea`, `radio`, `checkbox`, `checkbox2`, `tags`, `file`, `image`, `date`, `time`, `color`, `summernote_simple`, `summernote`, `created_at`, `updated_at`, `created_by_id`, `last_updated_by_id`) VALUES
(31, 'Zizi Sudiati', '0979 1293 036', '2013-07-05', 'Ki. Veteran No. 356, Kediri 58428, NTT', 'https://gravatar.com/avatar/4ad4273b5ddad4f4b332a28c41d2b881628df519df8e04de9b426a3df6562935', 'cnNmO0jgHp', 'UUabqUo7dS', '9936798208599', 'dewi.agustina@gmail.com', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 938, 7550, 1453077, 'Option 1', 'Option 3', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Eaque odit dolores doloribus id. Debitis ea error aut ea. Qui et tempora ut et fugiat.', 'Option 1', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=31', 'https://picsum.photos/200/300?random=31', '2005-09-22', '19:17:25', '#24040e', 'Non quis sunt ducimus error. Aliquid magni vero voluptatibus.', '<html><head><title>Consequuntur minus quis eligendi dolores tempora doloribus rerum est ullam enim hic.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">autem</label><input type=\"text\" id=\"username\"><label for=\"password\">ipsa</label><input type=\"password\" id=\"password\"></form><div class=\"repudiandae\"></div><div class=\"aut\"><div class=\"rem\"></div></div></body></html>\n', '2025-08-28 17:38:16', '2025-08-30 04:24:17', 1, NULL),
(32, 'Among Tirtayasa Pradipta S.I.Kom', '(+62) 660 5807 254', '2007-04-10', 'Ds. Ciwastra No. 32, Administrasi Jakarta Barat 69273, Kalteng', 'https://gravatar.com/avatar/6ba2b78e1f57ceca6e878a453a25b13f1f6fa960e5aadd32387df046f39fb501', 'JkE3XxChlJ', 'rFdAFoIrq9', '2698034738129', 'zsitorus@yahoo.com', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 443, 5365, 2920378, 'Option 6', 'Option 1', '[\"Option 1\"]', 'Exercitationem velit inventore cupiditate. Necessitatibus in in iure non aut.', 'Option 3', '[\"Option 1\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=32', 'https://picsum.photos/200/300?random=32', '1976-04-06', '21:22:53', '#a313c7', 'Aliquam at qui sed neque distinctio ex dignissimos provident. Id quod quam non enim vero tempore.', '<html><head><title>Hic ab repellat quos fugit sint totam magnam commodi ratione quidem eligendi explicabo.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">corrupti</label><input type=\"text\" id=\"username\"><label for=\"password\">cum</label><input type=\"password\" id=\"password\"></form><div id=\"89848\"><i>Sed quam amet sit expedita enim autem exercitationem cupiditate.</i><span>Impedit tempore praesentium adipisci quo quis error itaque.</span></div><div id=\"61199\"></div><div id=\"25524\"></div><div class=\"magnam\"></div></body></html>\n', '2025-08-10 22:20:25', '2025-08-15 02:12:39', NULL, 1),
(33, 'Jati Prabowo', '(+62) 20 8193 8995', '1986-05-20', 'Psr. Yoga No. 582, Bau-Bau 85370, DKI', 'https://gravatar.com/avatar/382c5360b48600de47b82904078354d66f3a2e29b7e4724f1ab799de43bb8a55', 'fxenSLE9n4', 'WxEy1NddBs', '3347497144037', 'npuspasari@hartati.biz', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 783, 2209, 5298545, 'Option 2', 'Option 5', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Et quibusdam maxime voluptatem corporis. Inventore sunt qui fugiat.', 'Option 3', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=33', 'https://picsum.photos/200/300?random=33', '1970-11-06', '21:59:00', '#b6ea36', 'Sunt voluptates quo consequatur atque eius qui. Corporis vitae nihil doloremque.', '<html><head><title>Eos exercitationem recusandae et omnis illum dolorum aut.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">similique</label><input type=\"text\" id=\"username\"><label for=\"password\">sed</label><input type=\"password\" id=\"password\"></form><div id=\"27278\"><div class=\"praesentium\"><b>Quas qui fuga pariatur reiciendis consequatur laboriosam et.</b><p>Magni dolorem non.</p></div><div id=\"86340\"></div><div id=\"87823\"></div></div></body></html>\n', '2025-08-28 15:34:28', '2025-08-18 20:00:46', 1, 1),
(34, 'Lili Wulandari', '0209 5834 8852', '2009-03-23', 'Jr. Basuki No. 557, Palembang 87814, Sulsel', 'https://gravatar.com/avatar/ca2a007c2d32c254afe8b9ece9e2a4f21131b0368aa0cd2d14d8dbf3af22a86f', '4GbG0jBDBR', 'yawUJZoTc0', '7133194815532', 'epurwanti@yahoo.co.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 134, 6583, 5526468, 'Option 10', 'Option 6', '[\"Option 1\"]', 'Ratione atque eum tempora et animi. Necessitatibus aspernatur vel quidem qui mollitia quisquam.', 'Option 1', '[\"Option 1\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=34', 'https://picsum.photos/200/300?random=34', '2022-11-14', '17:41:54', '#e66f5d', 'Omnis est et reprehenderit error. Autem minus laborum dolores. Est est dicta libero et.', '<html><head><title>Autem officiis et corporis est et et.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">dolores</label><input type=\"text\" id=\"username\"><label for=\"password\">ut</label><input type=\"password\" id=\"password\"></form><div id=\"38201\"></div><div id=\"82280\"><div class=\"similique\"><ul><li>Eligendi.</li><li>Facere et quisquam.</li><li>Expedita voluptas.</li><li>Sit sit.</li><li>Sint quod ipsum ratione repellendus.</li><li>Natus debitis voluptas corporis voluptates.</li><li>Quibusdam maiores maiores earum provident.</li></ul><h2>Deserunt blanditiis.</h2>Magni explicabo adipisci vel ipsam quia dolores corrupti.</div><div id=\"25115\"></div><div class=\"consequuntur\"></div><div class=\"praesentium\"></div></div><div class=\"temporibus\"></div><div id=\"4856\"></div></body></html>\n', '2025-08-22 03:49:36', '2025-08-07 08:51:58', NULL, 1),
(35, 'Nurul Endah Laksita S.H.', '(+62) 868 147 882', '1979-06-13', 'Psr. Diponegoro No. 968, Bengkulu 68628, Sulut', 'https://gravatar.com/avatar/d3dc135f61a129231ff7aaf74fb86b250d6928f527dce8c68b2258ab04f22c1c', 'sivvdBV6P6', '3A4SjMfxXG', '4173821838674', 'rama73@yahoo.co.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 757, 5957, 2558146, 'Option 7', 'Option 1', '[\"Option 1\",\"Option 2\"]', 'Nobis dolor neque debitis illum. Omnis dicta sunt soluta eum. Autem quisquam culpa ullam aut.', 'Option 2', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=35', 'https://picsum.photos/200/300?random=35', '1979-07-15', '01:35:00', '#43578e', 'Ab pariatur ipsa nostrum ut provident quisquam fugiat. Ea nesciunt quia magni distinctio.', '<html><head><title>Saepe mollitia dicta repellendus rem explicabo et mollitia possimus.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">possimus</label><input type=\"text\" id=\"username\"><label for=\"password\">amet</label><input type=\"password\" id=\"password\"></form><div id=\"60476\"></div><div id=\"91036\"></div></body></html>\n', '2025-08-26 01:14:05', '2025-09-02 09:30:23', NULL, NULL),
(36, 'Saadat Lanjar Kurniawan M.Farm', '0825 095 051', '1986-08-15', 'Kpg. R.E. Martadinata No. 464, Ternate 55283, Sulteng', 'https://gravatar.com/avatar/70805d777174313d5bfe90b70d784ebe2ec05b264ef75cc485dc91c1603a48a4', 'fNQWZ7wDDr', '5SSq6gMngF', '8610400246179', 'hidayanto.ghani@gmail.com', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 295, 2240, 6651612, 'Option 2', 'Option 1', '[\"Option 1\",\"Option 2\"]', 'Vel et officia impedit velit. Cupiditate in quod qui vel. Possimus aut sunt autem eligendi at.', 'Option 2', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=36', 'https://picsum.photos/200/300?random=36', '2001-08-28', '20:17:25', '#694110', 'Dolorem soluta qui iure est. Maiores non ut iste ratione at.', '<html><head><title>Fugiat temporibus ullam facilis fugiat autem.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">magni</label><input type=\"text\" id=\"username\"><label for=\"password\">et</label><input type=\"password\" id=\"password\"></form><div class=\"consequuntur\"></div><div id=\"81965\"></div></body></html>\n', '2025-08-06 14:06:29', '2025-08-03 13:26:33', NULL, 1),
(37, 'Olivia Fujiati', '0569 1035 8642', '1970-01-01', 'Jln. Basoka Raya No. 793, Bekasi 20669, Sumsel', 'https://gravatar.com/avatar/b1f64956482212a9083818778fa67c0bed0014d4f615a7b9c4b013e4489e7c13', '5X3lqJdsFR', 'aL2PqdBhW1', '0042848309679', 'kani.rahimah@kurniawan.asia', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 690, 5083, 3396670, 'Option 3', 'Option 10', '[\"Option 1\",\"Option 2\"]', 'Nihil sunt perferendis omnis reprehenderit sit molestiae ab. Maiores et sint quia mollitia.', 'Option 2', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=37', 'https://picsum.photos/200/300?random=37', '1993-04-08', '06:59:50', '#07d201', 'Fuga possimus debitis ut. Est officia assumenda pariatur et officia tenetur. Eum esse ea nam.', '<html><head><title>In cum ipsam nemo et quibusdam delectus quia consequatur esse.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">fuga</label><input type=\"text\" id=\"username\"><label for=\"password\">voluptatem</label><input type=\"password\" id=\"password\"></form><div class=\"quia\"><ul><li>Officiis quia.</li><li>Velit asperiores quia quo.</li><li>Et praesentium porro.</li><li>Voluptas quaerat nemo.</li><li>Itaque qui et.</li><li>Nisi fuga reprehenderit.</li></ul><a href=\"example.net\">Sed ut vero.</a><p>Voluptatem deleniti molestiae iste voluptas repellat.</p></div><div class=\"consequatur\"><div id=\"52900\">Quidem quia ad.</div></div><div class=\"quasi\"><h1>Repellendus ipsa exercitationem facilis quo dolores eligendi voluptatem totam.</h1></div></body></html>\n', '2025-08-07 01:49:10', '2025-08-02 22:26:21', NULL, NULL),
(38, 'Kairav Wijaya', '(+62) 206 3682 1435', '1976-08-27', 'Gg. Laksamana No. 457, Sukabumi 38646, NTT', 'https://gravatar.com/avatar/5819d2872bceb1d5128cd8a980d962a8969bb41a5fd55f8a094c57db94800f83', 'XCDlyPiRdV', 'ImenQAtoSU', '8714005601989', 'muwais@yahoo.com', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 97, 8185, 5963293, 'Option 10', 'Option 7', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Ex et ad ut qui corporis commodi neque. Suscipit est consequuntur quibusdam.', 'Option 3', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=38', 'https://picsum.photos/200/300?random=38', '2002-12-08', '20:32:01', '#dbfb2d', 'Incidunt et quod iure explicabo et. Eum qui rem eum minima quia repudiandae. Quam sed et nemo ut.', '<html><head><title>Et porro voluptas eligendi a ut.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">nesciunt</label><input type=\"text\" id=\"username\"><label for=\"password\">qui</label><input type=\"password\" id=\"password\"></form><div class=\"eum\"></div><div class=\"rerum\"><div id=\"45906\"></div></div></body></html>\n', '2025-09-02 07:10:16', '2025-08-17 21:06:34', NULL, NULL),
(39, 'Adiarja Najam Uwais M.M.', '(+62) 805 3959 753', '2000-07-04', 'Ds. Sutarjo No. 365, Tegal 54464, Lampung', 'https://gravatar.com/avatar/c7ae4ee6c5ad80f56fcd1f1063238eda6dfe5e7054dc9fd0cd5a447c721a2639', 'vROIKfueMb', 'ZWTLuSV1a3', '9331150536547', 'nyoman43@yuliarti.asia', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 976, 6700, 6184451, 'Option 6', 'Option 5', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Voluptatibus veritatis quia maxime consequuntur porro. Voluptatibus nostrum laudantium odit ut.', 'Option 1', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=39', 'https://picsum.photos/200/300?random=39', '1996-09-17', '22:51:22', '#5f7238', 'Sit quis omnis voluptas quod ad sapiente quia. Et deleniti aut ut ducimus.', '<html><head><title>Quibusdam dolore cumque magnam et dignissimos voluptate cupiditate.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">quia</label><input type=\"text\" id=\"username\"><label for=\"password\">et</label><input type=\"password\" id=\"password\"></form><div id=\"71080\"></div></body></html>\n', '2025-08-03 05:10:44', '2025-08-15 02:46:17', NULL, NULL),
(40, 'Ikin Januar', '(+62) 205 5738 5828', '2011-07-31', 'Ds. Bappenas No. 66, Sorong 46026, Bali', 'https://gravatar.com/avatar/d0ab4c5daba2a6df27153cfcd84ee9e8988c8816c086b4a7aa554b17c03b3dda', '62jf5eybvT', 'PVELedFcyq', '9369929342549', 'mnasyiah@gmail.com', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 414, 1916, 4141559, 'Option 7', 'Option 9', '[\"Option 1\",\"Option 2\"]', 'Non minus facere dicta vel voluptas minima. Iusto nesciunt sed tempore reprehenderit.', 'Option 2', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=40', 'https://picsum.photos/200/300?random=40', '2007-08-18', '20:09:38', '#08e811', 'Non omnis asperiores pariatur non dolor quae. Et ratione consequatur ullam vel temporibus.', '<html><head><title>Deserunt vel accusantium at accusantium.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">odio</label><input type=\"text\" id=\"username\"><label for=\"password\">quasi</label><input type=\"password\" id=\"password\"></form><div id=\"30606\"></div><div id=\"35899\"><div class=\"distinctio\"></div><div class=\"eos\"></div></div><div class=\"voluptas\"><i>Nam aut neque et at illum.</i><h1>Occaecati aut.</h1><h2>Cupiditate ipsam suscipit quo.</h2>Nisi nemo nemo neque quia cupiditate fuga.</div></body></html>\n', '2025-08-11 01:04:12', '2025-08-05 15:22:34', 1, NULL),
(41, 'Budi Suwarno', '0597 9059 5421', '2021-12-13', 'Jln. Muwardi No. 142, Binjai 97852, Sulsel', 'https://gravatar.com/avatar/735eadba41191f1ff806cbc4d2cb7a74557911b47f41196c9ff2c73007c1a224', 'zNFpnw8ApH', 'IubTq00WRJ', '2429741268636', 'nurdiyanti.mila@yahoo.co.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 754, 2485, 4889340, 'Option 1', 'Option 10', '[\"Option 1\"]', 'Illum doloribus voluptatibus at modi qui. Aliquid sapiente velit atque dolores tenetur.', 'Option 1', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=41', 'https://picsum.photos/200/300?random=41', '1984-03-11', '15:17:17', '#87db03', 'Mollitia dignissimos animi asperiores rerum consequatur soluta. Cum sunt iste vel ut dolorum aut.', '<html><head><title>Maiores.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">qui</label><input type=\"text\" id=\"username\"><label for=\"password\">qui</label><input type=\"password\" id=\"password\"></form><div id=\"79311\"></div><div class=\"tempore\"><div id=\"63777\"></div><div id=\"87821\"></div><div class=\"eveniet\"><i>Impedit voluptas sit qui.</i><h2>Vel ut.</h2><table><thead><tr><th>Sapiente vel quis.</th><th>Dolorum vel.</th><th>Numquam enim.</th><th>A reiciendis commodi autem soluta quia.</th><th>Dicta molestiae amet cupiditate.</th></tr></thead><tbody><tr><td>A omnis est totam perferendis accusantium.</td><td>Temporibus voluptates eaque quisquam et.</td><td>Optio vel ratione et fuga facilis dolorem.</td><td>Labore voluptas nihil rerum alias qui fugiat est.</td><td>Molestiae aut reiciendis odio et provident.</td></tr><tr><td>Repellendus consequatur beatae qui dignissimos quos magni modi aut id quia ducimus quia odio.</td><td>Quo ut molestiae reiciendis perferendis impedit ipsam.</td><td>Autem cum quam aperiam.</td><td>Quas quo dolore non commodi ut cupiditate neque quia consequatur.</td><td>Architecto aliquid quos doloremque voluptatibus deserunt nesciunt id.</td></tr><tr><td>Odio aut nihil velit explicabo.</td><td>Sit exercitationem aut perferendis.</td><td>Iure architecto esse labore dignissimos vitae occaecati consequatur ipsam.</td><td>Doloribus fuga cupiditate.</td><td>Vel eum.</td></tr></tbody></table></div><div id=\"97581\"></div></div></body></html>\n', '2025-08-10 10:54:50', '2025-08-27 03:08:03', 1, NULL),
(42, 'Hani Victoria Pertiwi M.TI.', '0990 3203 569', '1991-03-27', 'Gg. Baik No. 898, Surabaya 18462, Sulut', 'https://gravatar.com/avatar/4b55a6bbc20b33e6fda6917f67f9baea392b5d266a15bb1757423d0df5781cf3', 'UzegQ2nZxa', 'vAUtlHCG1f', '4278092615242', 'nyana.mustofa@gmail.com', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 195, 5962, 4635983, 'Option 4', 'Option 3', '[\"Option 1\"]', 'Quibusdam commodi vero porro rerum ullam doloribus cum. Eum quia vel alias dolor.', 'Option 2', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=42', 'https://picsum.photos/200/300?random=42', '1977-04-12', '23:50:09', '#8cabd3', 'Quo porro laudantium similique maiores sed hic. Impedit consectetur sit alias voluptas voluptate.', '<html><head><title>Aspernatur consequuntur dicta fugit et odit delectus.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">enim</label><input type=\"text\" id=\"username\"><label for=\"password\">sit</label><input type=\"password\" id=\"password\"></form><div id=\"55443\"></div></body></html>\n', '2025-08-18 06:12:05', '2025-08-04 19:32:46', NULL, 1),
(43, 'Prayitna Nainggolan', '(+62) 27 8396 811', '2017-02-23', 'Ki. Batako No. 728, Tegal 70930, Banten', 'https://gravatar.com/avatar/1072a22077482e219c08e6e6c59f170bdb0f478eabe3998ae9d4745a3c7702ac', 'zodf2QBTSB', 'r9v40NwNXM', '9254472661158', 'mandasari.darimin@hasanah.asia', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 336, 180, 9374784, 'Option 2', 'Option 10', '[\"Option 1\"]', 'Laboriosam voluptatem error quibusdam qui. Adipisci nemo unde nostrum sit maiores saepe.', 'Option 2', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=43', 'https://picsum.photos/200/300?random=43', '1983-03-02', '20:45:27', '#fde083', 'Qui aliquam amet ex aut debitis dolore. Autem sit vero veritatis omnis reiciendis molestiae.', '<html><head><title>Doloremque voluptate id corrupti assumenda quam necessitatibus.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">quos</label><input type=\"text\" id=\"username\"><label for=\"password\">vel</label><input type=\"password\" id=\"password\"></form><div id=\"77259\"><span>Ipsa quibusdam optio ut iste laudantium voluptatem excepturi quis.</span><a href=\"example.com\">Veritatis.</a></div><div id=\"9950\"></div><div class=\"consequatur\"></div></body></html>\n', '2025-08-15 19:57:59', '2025-08-29 07:32:56', 1, 1),
(44, 'Raditya Sihombing', '(+62) 20 1042 043', '1974-05-01', 'Kpg. Suharso No. 849, Ternate 87280, Kalbar', 'https://gravatar.com/avatar/22432765f29b4f493dc150ef412817dfaf1b839433b2704cec1824617316bdf5', 'ddBRlOBuIb', 'xarKZnyBvc', '8165684860080', 'safina65@pudjiastuti.org', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 788, 3971, 840362, 'Option 10', 'Option 8', '[\"Option 1\"]', 'Omnis cumque minima consectetur rerum id reprehenderit. Pariatur officia est neque est.', 'Option 3', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=44', 'https://picsum.photos/200/300?random=44', '1977-02-04', '06:53:24', '#c2fc2a', 'Quaerat dolorem iusto odit autem ad dolorum est. Ea laudantium in recusandae et nihil.', '<html><head><title>Reiciendis ut est.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">sint</label><input type=\"text\" id=\"username\"><label for=\"password\">aut</label><input type=\"password\" id=\"password\"></form><div class=\"est\"></div></body></html>\n', '2025-08-31 02:22:10', '2025-08-13 12:00:16', NULL, NULL),
(45, 'Umay Simanjuntak', '0600 2870 1452', '1992-08-27', 'Gg. Baranang Siang No. 454, Salatiga 57764, Malut', 'https://gravatar.com/avatar/5c2860249bf3ca500dfa967010812d6a5af9f16ebb3af0c5efb6bd19a42e1b13', 'ulKulvLJWk', '2ljbls5Z1w', '9629284106997', 'jasmin.maulana@gmail.com', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 209, 4715, 7027458, 'Option 1', 'Option 1', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Inventore nostrum itaque sunt vitae. Qui et qui non qui. Nam laudantium dolor nesciunt.', 'Option 4', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=45', 'https://picsum.photos/200/300?random=45', '1973-07-29', '15:17:56', '#d8eec8', 'Quas ratione nisi odit. Aut est molestias sunt quaerat similique veniam quis cumque.', '<html><head><title>Minima et doloremque.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">aut</label><input type=\"text\" id=\"username\"><label for=\"password\">error</label><input type=\"password\" id=\"password\"></form><div class=\"est\"></div><div class=\"rerum\"><h1>Ut vel iste quo illo.</h1>Molestiae iure laborum.</div><div id=\"78774\"><div class=\"natus\"><span>Ea sed consequatur quae molestiae consectetur.</span></div><div id=\"94658\"></div><div class=\"aliquid\"></div></div><div id=\"77964\"><div class=\"aut\"><table><thead><tr><th>Maxime fugit necessitatibus eos.</th><th>Vero quis ipsum.</th></tr></thead><tbody><tr><td>Qui doloremque aut odit consequatur.</td><td>Repellendus ducimus assumenda itaque veniam.</td></tr><tr><td>In sunt suscipit et perferendis fugit numquam.</td><td>Autem quia et animi dicta sed aliquid.</td></tr><tr><td>Sunt qui iure provident doloremque fuga voluptas quia debitis illum.</td><td>Voluptatem nisi alias id.</td></tr></tbody></table><span>Necessitatibus qui.</span></div><div id=\"30685\"><p>Est est amet nam et.</p><table><thead><tr><th>Aliquid sed aspernatur.</th></tr></thead><tbody><tr><td>Vitae at quo a nam ea mollitia.</td></tr><tr><td>Est dolor error est dignissimos dolor rerum sapiente officiis eaque.</td></tr><tr><td>Ad asperiores expedita.</td></tr><tr><td>Perferendis ad.</td></tr><tr><td>Officiis est sunt alias incidunt delectus.</td></tr><tr><td>Ipsam sed odio.</td></tr></tbody></table><ul><li>Delectus vero optio.</li></ul><a href=\"example.net\">Excepturi dolorum officiis velit quasi dolores blanditiis velit.</a></div><div id=\"59638\">Nihil ut quibusdam sint temporibus ullam rerum.<h3>Nobis minima voluptatem.</h3><span>Soluta natus quaerat repellendus veritatis aliquid voluptas omnis unde est eveniet corporis rerum.</span><p>Cumque quisquam et commodi esse impedit aperiam.</p></div></div></body></html>\n', '2025-08-30 08:55:21', '2025-08-23 21:28:53', 1, NULL),
(46, 'Radit Nababan', '(+62) 417 9061 041', '2002-03-05', 'Ds. Jend. A. Yani No. 577, Langsa 32388, NTB', 'https://gravatar.com/avatar/38bcad1719b2ee810c5b1f9273431f707a315f01a5967121461dc6fa22f88159', 'HRxc3ViyLR', 'x0V2fxp275', '1199373730191', 'rahimah.hartaka@habibi.org', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 269, 7838, 3936500, 'Option 7', 'Option 6', '[\"Option 1\",\"Option 2\"]', 'Animi facere voluptas voluptas dolor nisi deleniti assumenda. Quod occaecati veniam eos.', 'Option 1', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=46', 'https://picsum.photos/200/300?random=46', '1981-12-14', '08:02:54', '#a5bd0f', 'Aut accusantium dolorem qui. Labore eum unde doloremque inventore quo expedita id.', '<html><head><title>Aspernatur ipsam unde aut sit aspernatur.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">quos</label><input type=\"text\" id=\"username\"><label for=\"password\">est</label><input type=\"password\" id=\"password\"></form><div class=\"et\">Magni pariatur odio.<span>Eveniet aut eligendi voluptatem modi molestiae beatae dolorem qui odit eaque est.</span><a href=\"example.net\">Delectus minima.</a></div><div id=\"17700\"><h1>Corrupti doloremque voluptates et alias ab enim in repellendus rerum iusto.</h1>Repellendus et voluptas rerum.<span>Quis et assumenda.</span>Molestiae omnis aut et.</div><div id=\"5882\"></div><div class=\"commodi\"></div></body></html>\n', '2025-08-05 09:13:50', '2025-08-10 11:44:48', 1, NULL),
(47, 'Taswir Wage Sihombing', '020 6350 238', '1972-06-01', 'Ds. Villa No. 77, Tanjung Pinang 78142, Sumsel', 'https://gravatar.com/avatar/6304ca038246d1abb86420f20baf70cf938e10a0f07a224d77b3608cd0f32010', 'axTVLiHLwp', '3ax9ks5fAy', '0663826056189', 'karen.usada@gmail.co.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 162, 8170, 3230801, 'Option 10', 'Option 6', '[\"Option 1\"]', 'Cum voluptatem ad porro nihil. Similique quis consequatur iste minus eveniet animi.', 'Option 4', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=47', 'https://picsum.photos/200/300?random=47', '2003-07-15', '12:05:03', '#dea6d0', 'Ipsa quas quis quis qui non dignissimos quo. Consectetur quos quia nostrum placeat.', '<html><head><title>Accusamus quis expedita.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">cum</label><input type=\"text\" id=\"username\"><label for=\"password\">voluptatum</label><input type=\"password\" id=\"password\"></form><div class=\"possimus\"></div><div id=\"29195\"><ul><li>Non iste fugit id.</li><li>Ut nobis maiores.</li><li>Quibusdam.</li><li>Doloribus repellat omnis vel neque.</li></ul>Temporibus voluptatem temporibus possimus perferendis ea officia rem eos laborum voluptatibus.</div><div id=\"77303\"><ul><li>Iure amet sint non.</li><li>Rerum sapiente.</li><li>Tempora.</li><li>Et quo vero.</li><li>Reiciendis et animi ut.</li><li>Vero quia nulla.</li></ul></div><div id=\"82797\"></div></body></html>\n', '2025-08-08 23:08:03', '2025-08-17 06:36:24', 1, NULL),
(48, 'Yuliana Ira Wastuti S.Gz', '021 9291 8096', '1985-04-10', 'Gg. Bakit  No. 433, Salatiga 10564, Sultra', 'https://gravatar.com/avatar/189d196b23941bc900f1fb29556c4383ad65eff7739ff6cd9ca33afb5432414f', 'tXDBBgN1vc', 'o8fwL5llOL', '3426275812952', 'melinda19@yahoo.co.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 232, 9522, 5065651, 'Option 2', 'Option 6', '[\"Option 1\"]', 'Eligendi ullam unde atque nam architecto sit quos. Quidem sint libero minima cum error.', 'Option 3', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=48', 'https://picsum.photos/200/300?random=48', '1970-03-22', '10:54:40', '#a4dedf', 'Beatae qui eum illum ut. Odio nesciunt itaque eum corrupti occaecati itaque dolor.', '<html><head><title>Ipsa consequatur eius.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">esse</label><input type=\"text\" id=\"username\"><label for=\"password\">quam</label><input type=\"password\" id=\"password\"></form><div class=\"amet\"><table><thead><tr><th>Non similique dolorem perspiciatis.</th><th>Eos delectus.</th><th>Explicabo fugiat voluptate.</th><th>Recusandae vitae.</th><th>Et eaque soluta.</th><th>Et velit maxime.</th></tr></thead><tbody><tr><td>Tempora sunt aut repellat iusto.</td><td>Et enim qui placeat debitis.</td><td>Molestias eum beatae in nesciunt consequuntur.</td><td>Qui dolor quo soluta veniam qui nihil quia.</td><td>Optio velit.</td><td>Itaque rerum consectetur.</td></tr><tr><td>Aut nulla corrupti eos.</td><td>Accusantium eaque incidunt maiores.</td><td>Debitis omnis laborum ad molestiae quia voluptatem at.</td><td>Quibusdam aspernatur quisquam iure dolorum.</td><td>Necessitatibus qui repellat impedit corrupti aut.</td><td>Velit.</td></tr><tr><td>Voluptatum velit nobis.</td><td>Aut tempora sequi quis voluptatem.</td><td>Similique facere itaque.</td><td>Eum esse sequi voluptas sunt et.</td><td>Molestiae aut est dolores dolores itaque.</td><td>Ab ea nulla odio esse.</td></tr><tr><td>Laboriosam ea laboriosam aut.</td><td>Sunt autem explicabo.</td><td>Ipsam quam ea illo alias quae neque reiciendis.</td><td>Eum eos corporis iste atque perspiciatis.</td><td>Voluptatibus nostrum error architecto minus maiores suscipit.</td><td>Repellendus qui et repellendus aspernatur quas.</td></tr><tr><td>Aut ad non vero ut qui illo ea reprehenderit dolor excepturi pariatur.</td><td>Quam vero velit.</td><td>Enim possimus voluptates beatae.</td><td>Dolorum assumenda doloribus eum amet laudantium sed.</td><td>Aspernatur aut quo magnam itaque delectus qui qui.</td><td>Qui beatae rerum iusto ut doloribus ratione eum laborum qui quos.</td></tr><tr><td>Qui culpa maxime impedit voluptates non et odit asperiores numquam occaecati praesentium eligendi.</td><td>Est enim enim non beatae aut illo.</td><td>Eum.</td><td>Iure nihil est.</td><td>Facilis veniam.</td><td>Dicta.</td></tr></tbody></table><table><thead><tr><th>A amet qui quam.</th><th>Numquam reprehenderit officiis assumenda.</th><th>Illo voluptatem.</th><th>Hic amet occaecati.</th><th>Aut iusto vel.</th></tr></thead><tbody><tr><td>Repellat qui.</td><td>Et provident unde sint voluptas consequatur animi voluptas sit voluptas quae.</td><td>Voluptatem suscipit odio voluptatem.</td><td>Corrupti in molestias dicta hic autem velit.</td><td>Sit incidunt impedit voluptatum.</td></tr></tbody></table><ul><li>Unde.</li><li>Ipsa non.</li><li>Minus enim exercitationem.</li><li>Fuga corrupti.</li><li>Autem quisquam modi deserunt distinctio.</li></ul>Quo voluptate natus.</div></body></html>\n', '2025-08-10 03:28:25', '2025-08-08 14:21:18', NULL, NULL),
(49, 'Dalimin Situmorang S.Kom', '0939 2373 3665', '2009-11-04', 'Gg. Cemara No. 619, Sabang 62525, Jabar', 'https://gravatar.com/avatar/f5010dbab6ddf588161b5f975107cd1860dd05102157538750f16919490b93b8', 'uIsuDYmuvE', 'TsS25bpE2h', '1284273679067', 'znasyiah@gmail.com', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 114, 4556, 9334767, 'Option 6', 'Option 3', '[\"Option 1\"]', 'Eius tenetur quae velit maxime delectus cupiditate. Voluptate quae ut omnis est et rem.', 'Option 4', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=49', 'https://picsum.photos/200/300?random=49', '2001-01-11', '17:08:48', '#eb581a', 'Magni iusto voluptatum beatae est sed impedit. Aut animi et quaerat vero est.', '<html><head><title>Dolorum sunt ipsam voluptatem cum labore facilis rerum.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">voluptates</label><input type=\"text\" id=\"username\"><label for=\"password\">et</label><input type=\"password\" id=\"password\"></form><div id=\"44541\"><ul><li>Dolorem similique eaque.</li><li>Dignissimos.</li><li>Et nobis.</li><li>Voluptas alias corrupti.</li><li>Ipsum deleniti.</li><li>Quod est alias.</li></ul>Quisquam laudantium ullam aut quae.<b>Tempore iure aliquam ut.</b><h3>Consequuntur magni sunt voluptas qui.</h3></div><div id=\"67885\"><div id=\"36264\"></div><div class=\"consequatur\"></div><div class=\"facere\">Omnis rerum minus quo quidem cum ad sapiente exercitationem velit voluptatibus.Atque occaecati atque ex consequatur delectus odio odio.</div><div class=\"modi\"></div></div><div id=\"37609\"></div><div class=\"et\"><div id=\"92813\"></div><div id=\"87528\"></div></div></body></html>\n', '2025-08-04 18:17:46', '2025-08-27 14:30:18', NULL, 1),
(50, 'Zelda Ani Suryatmi', '0982 9818 532', '1990-01-27', 'Jln. Padma No. 463, Palembang 56829, Jabar', 'https://gravatar.com/avatar/3a331cee095fc9357678dedf932c53eb66ae0470e2e4ae90527ff3113b15929e', '99YhQn2Y0D', 'y6lEMeyIcv', '2161758686859', 'maryanto07@gmail.co.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 317, 2145, 6345154, 'Option 7', 'Option 3', '[\"Option 1\",\"Option 2\"]', 'Dolor est ut omnis voluptas porro ut. Similique dolor sit ipsa quaerat.', 'Option 4', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=50', 'https://picsum.photos/200/300?random=50', '1987-11-05', '15:44:52', '#395e9f', 'Magnam doloremque neque vel sunt aut et. Animi aliquid consequatur sit deleniti.', '<html><head><title>Sed soluta unde illum earum vel placeat rem.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">dolor</label><input type=\"text\" id=\"username\"><label for=\"password\">perspiciatis</label><input type=\"password\" id=\"password\"></form><div id=\"20082\"><div id=\"3030\"></div><div id=\"88214\"><i>Rem ab laudantium enim architecto velit aut.</i><h2>Natus nostrum velit asperiores.</h2>Occaecati doloribus suscipit velit reprehenderit.<span>Qui esse facere adipisci voluptatem consectetur commodi consequatur.</span></div><div class=\"accusamus\"><i>Ad voluptatem.</i><table><thead><tr><th>Veritatis commodi.</th><th>Mollitia aut eos.</th></tr></thead><tbody><tr><td>Quia dolor molestias vero nihil illo eligendi aspernatur et corrupti.</td><td>Velit beatae sunt ut placeat est voluptates placeat et.</td></tr><tr><td>Iusto rerum quae repudiandae.</td><td>Distinctio dolore optio qui odio.</td></tr><tr><td>Totam fugit laboriosam omnis nihil dignissimos et quam.</td><td>Aliquid modi corporis nulla eveniet non.</td></tr><tr><td>Eius numquam reprehenderit sint dolore tempora eum et adipisci odio ab ea.</td><td>Quisquam non.</td></tr><tr><td>Ipsa quia veniam.</td><td>Labore nihil perspiciatis.</td></tr></tbody></table><table><thead><tr><th>Expedita qui.</th><th>Adipisci eligendi culpa.</th><th>Deserunt dignissimos omnis quidem.</th></tr></thead><tbody><tr><td>Enim adipisci omnis non voluptatem.</td><td>Minima quo dicta accusamus beatae ullam temporibus quaerat molestiae consequatur fugit aut.</td><td>Harum repudiandae sed voluptas deleniti magni dolorem soluta et porro.</td></tr><tr><td>Vero dolorum natus.</td><td>Quae sed perspiciatis.</td><td>Ut est neque placeat labore vel est sit praesentium dolorem provident.</td></tr></tbody></table>Qui odit et architecto temporibus necessitatibus eius fuga.</div></div><div class=\"non\"></div><div id=\"57685\"></div><div id=\"56693\"></div></body></html>\n', '2025-08-03 16:10:48', '2025-08-06 23:35:23', NULL, 1),
(51, 'Luis Saiful Hutagalung', '0210 3644 6410', '1987-12-26', 'Psr. M.T. Haryono No. 423, Palopo 15209, Sumbar', 'https://gravatar.com/avatar/13f1a159c2ce63c32b6290c7dcad0a964ae552bf939c146599c077c64f064361', '8MOJYZ8tvn', 'XaZxlo2My8', '0002919437892', 'nurul.gunawan@gmail.co.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 846, 9496, 7507522, 'Option 9', 'Option 3', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Natus repellat tenetur reiciendis et. Sit quo et sapiente non et.', 'Option 3', '[\"Option 1\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=51', 'https://picsum.photos/200/300?random=51', '1970-05-18', '16:59:54', '#1bd1a0', 'Incidunt expedita quia fuga labore placeat magnam cupiditate. A rerum et repellat natus voluptas.', '<html><head><title>Provident alias eligendi temporibus.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">modi</label><input type=\"text\" id=\"username\"><label for=\"password\">nihil</label><input type=\"password\" id=\"password\"></form><div class=\"qui\"><div class=\"error\"><ul><li>Eum culpa rerum.</li><li>Ipsam voluptate.</li><li>Quis nostrum cupiditate.</li><li>Voluptate ut aut tempora.</li><li>Quo.</li><li>Debitis quo quidem.</li><li>Porro ipsam et qui.</li><li>Ullam temporibus quam cumque.</li><li>Quisquam doloribus est.</li><li>Sapiente.</li><li>Modi qui et aut quo.</li></ul><table><thead><tr><th>Ex ad sit.</th><th>Nostrum sunt.</th></tr></thead><tbody><tr><td>Perspiciatis neque quis facere dolores voluptatem quia amet voluptates autem qui velit quo.</td><td>Id voluptate dicta.</td></tr><tr><td>Pariatur voluptatem voluptatibus et.</td><td>Velit sed quia distinctio possimus.</td></tr><tr><td>Officia beatae facilis.</td><td>Laboriosam iste voluptatem sint nostrum suscipit nostrum quia facilis.</td></tr><tr><td>Ea vel nulla quia ut distinctio id ratione.</td><td>Dolor cupiditate consectetur nobis sapiente corporis consequatur ut quidem quis voluptatem.</td></tr><tr><td>Est maiores cumque et ut.</td><td>Sunt velit porro dolores est rerum hic exercitationem dolor ut velit.</td></tr><tr><td>Suscipit.</td><td>Ut quis ut tempora.</td></tr></tbody></table>Harum voluptatibus.</div><div class=\"iure\">Aspernatur vel voluptatem sequi quidem nihil ut.<ul><li>Earum nostrum sed.</li></ul><a href=\"example.org\">Omnis.</a></div></div><div id=\"7505\"><table><thead><tr><th>Fugit ab deserunt.</th><th>Quod id vel explicabo non.</th><th>Ut perspiciatis.</th><th>Quis et.</th><th>Fuga est.</th><th>Ea iusto.</th></tr></thead><tbody><tr><td>Sequi eius iure.</td><td>Provident cumque at occaecati.</td><td>Ab hic et dolorem dolorem sit quod dolores iure repellat esse incidunt.</td><td>Et voluptas autem et ut officiis in.</td><td>Reiciendis quisquam nostrum nam est minus.</td><td>Suscipit iure.</td></tr><tr><td>Qui a est praesentium culpa iste.</td><td>Illo hic aut vitae numquam aut velit ducimus voluptates autem maxime non.</td><td>Dolor sapiente quo optio optio illum ut velit consectetur maiores provident dolorem consectetur accusantium.</td><td>Sed corrupti sit consectetur magni voluptatem molestiae rerum.</td><td>Et eaque dolores veritatis molestiae nihil illum recusandae cumque.</td><td>Voluptas totam.</td></tr></tbody></table></div><div class=\"animi\"></div><div class=\"quo\"></div></body></html>\n', '2025-09-01 23:01:32', '2025-08-30 15:52:57', 1, NULL),
(52, 'Hafshah Gasti Widiastuti S.Psi', '(+62) 235 3410 186', '2023-10-01', 'Gg. Basmol Raya No. 411, Payakumbuh 15648, Sulteng', 'https://gravatar.com/avatar/7bb236f33e7abc22709ec2a2e33551bd042c5dcfd8dcb7420a06529955948947', 'anwdCL5RnP', 'YhUDCCRbN1', '8218409753249', 'khartati@gmail.co.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 137, 9055, 7202692, 'Option 6', 'Option 2', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Et est non deserunt recusandae nisi. At minus nihil corporis qui et.', 'Option 4', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=52', 'https://picsum.photos/200/300?random=52', '1982-06-26', '08:10:46', '#bef292', 'Voluptates quia sed sunt amet unde esse. Maiores ut rerum doloribus maxime cumque sapiente.', '<html><head><title>Eum aut est.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">molestiae</label><input type=\"text\" id=\"username\"><label for=\"password\">facilis</label><input type=\"password\" id=\"password\"></form><div class=\"qui\">Deserunt tempore voluptate quibusdam dicta quis.<table><thead><tr><th>Sit quo.</th><th>Veritatis quis officia qui.</th></tr></thead><tbody><tr><td>Dolores sit consequatur consectetur sed optio.</td><td>Et et dolore.</td></tr><tr><td>Delectus unde et maiores repellendus harum iusto atque.</td><td>Eligendi nostrum assumenda nesciunt.</td></tr><tr><td>Delectus natus odio quo id aliquid laboriosam qui aut omnis.</td><td>Non consectetur et dolorem autem laboriosam doloribus et harum et doloremque nihil optio.</td></tr><tr><td>Optio ut libero magni omnis consequatur.</td><td>Porro dolorem eos id voluptate nisi.</td></tr><tr><td>Eius.</td><td>Deserunt.</td></tr><tr><td>Impedit ut culpa est est dolores vel rem.</td><td>Et minus totam aut.</td></tr><tr><td>Repellat doloribus id itaque aut.</td><td>Rerum dignissimos repellendus.</td></tr><tr><td>Voluptas est suscipit nobis quibusdam.</td><td>Expedita suscipit.</td></tr><tr><td>Possimus ut quis.</td><td>Adipisci nesciunt odit adipisci.</td></tr><tr><td>Voluptas vitae nihil molestiae molestias architecto aut et ea quisquam.</td><td>Fuga vitae.</td></tr></tbody></table><a href=\"example.net\">Ut minima non quod at eos.</a><table><thead><tr><th>Accusantium.</th><th>Commodi sapiente.</th><th>Qui quis eos.</th><th>Corrupti.</th><th>Nemo ratione.</th></tr></thead><tbody><tr><td>Tempore exercitationem harum aut corrupti quas quis quia nobis sint nemo sit est.</td><td>Soluta explicabo.</td><td>Provident consequatur labore laboriosam cupiditate qui ut nemo pariatur.</td><td>Quos aut dicta minima nulla debitis dolor.</td><td>Atque et repellat inventore corrupti accusantium dolore.</td></tr></tbody></table></div><div class=\"id\"></div></body></html>\n', '2025-08-29 22:17:49', '2025-08-08 14:30:21', 1, 1),
(53, 'Jatmiko Wawan Nashiruddin S.Ked', '0208 3052 771', '2005-12-17', 'Jr. Madiun No. 460, Gorontalo 95872, Sumbar', 'https://gravatar.com/avatar/1dedc609fd751dc7f21c4bbe5d141bcac2da5fb69d306a7233e4a8c17638263c', 'yC2ak9V3qp', 'ZeVuZEMtxl', '4414507959260', 'hassanah.martaka@yahoo.co.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 863, 4235, 3792089, 'Option 9', 'Option 1', '[\"Option 1\"]', 'Optio nemo facilis maxime id sed. Et similique beatae velit architecto.', 'Option 1', '[\"Option 1\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=53', 'https://picsum.photos/200/300?random=53', '2009-07-29', '00:44:53', '#f659d3', 'Aliquid voluptatem et perspiciatis libero minima quod ipsa. Enim earum corporis totam deleniti id.', '<html><head><title>Quasi qui voluptates sit.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">blanditiis</label><input type=\"text\" id=\"username\"><label for=\"password\">non</label><input type=\"password\" id=\"password\"></form><div class=\"distinctio\"></div><div id=\"57537\"></div></body></html>\n', '2025-08-28 02:42:00', '2025-08-15 03:14:48', 1, 1),
(54, 'Ulya Ratna Hastuti S.H.', '0616 7672 6920', '2003-12-11', 'Ds. Salatiga No. 196, Padang 91313, Sumbar', 'https://gravatar.com/avatar/90e5b33cd41091d0a959b25ca8154913a76ad5d25ab363b7b0cf4d49ce54a357', 'MGQdp1WOfK', 'YrrCC3JJ0O', '6476981107740', 'dzulaika@yahoo.com', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 258, 2085, 1326189, 'Option 3', 'Option 4', '[\"Option 1\"]', 'Enim est autem et non dolorum natus. Ut nulla nesciunt sit. Corporis ab accusantium animi illum.', 'Option 3', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=54', 'https://picsum.photos/200/300?random=54', '2014-09-27', '07:20:41', '#705880', 'Veritatis illum commodi nesciunt atque tempore. Et quia animi maxime et omnis.', '<html><head><title>Numquam neque.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">sed</label><input type=\"text\" id=\"username\"><label for=\"password\">sed</label><input type=\"password\" id=\"password\"></form><div id=\"67333\"><div id=\"54043\"></div><div id=\"50653\"><p>Alias eos asperiores nam voluptatibus voluptas aut aut magnam.</p><ul><li>Molestiae.</li><li>Recusandae.</li><li>Blanditiis.</li></ul>Consequuntur voluptas.<a href=\"example.org\">Quo ut natus quidem esse rerum libero unde in eveniet vel ducimus repellendus.</a></div><div class=\"minima\"></div></div></body></html>\n', '2025-08-31 23:27:20', '2025-08-28 00:11:05', 1, NULL),
(55, 'Zulaikha Hasanah', '0818 0204 2293', '1984-01-05', 'Kpg. Baranang Siang No. 468, Pariaman 90350, NTB', 'https://gravatar.com/avatar/34f4fd1b9ea6531bbe622a3c1a63b99c868a30cac8140aadf371a19fdcae7d26', 'xQ9cDPgG4q', 'NaMUheIx5z', '2809398404760', 'olivia.handayani@yahoo.co.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 924, 2807, 6515533, 'Option 7', 'Option 6', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Molestiae qui enim voluptatem. Fugiat omnis dicta aut autem. Et tempora quia earum aliquam et.', 'Option 3', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=55', 'https://picsum.photos/200/300?random=55', '1983-10-07', '13:35:55', '#d3130a', 'Esse eveniet molestias et iure iste. Asperiores alias accusamus odit porro cumque.', '<html><head><title>Facere ad consequatur ducimus debitis consequatur ipsa velit.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">qui</label><input type=\"text\" id=\"username\"><label for=\"password\">sed</label><input type=\"password\" id=\"password\"></form><div class=\"eaque\"><div class=\"dolor\"><i>Facilis ipsa voluptatem et ex quis corrupti ut.</i><span>At et consectetur dolores itaque quas exercitationem fuga sit sint autem ut repudiandae nisi.</span><h3>Laborum at voluptate iure delectus quisquam ut.</h3></div></div></body></html>\n', '2025-08-18 16:33:40', '2025-08-12 06:19:38', NULL, NULL),
(56, 'Oni Haryanti', '022 6421 0618', '1981-02-28', 'Jln. Ekonomi No. 587, Mataram 30484, Kepri', 'https://gravatar.com/avatar/6f5c4e2ba2403aedcc6f5782906144d7e4d38594093552b7ad36454f9aa5dd57', 'UUO6lK5Nrl', 'c18oiZBEjW', '9309124998110', 'tlestari@kusumo.ac.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 890, 3674, 2344229, 'Option 8', 'Option 10', '[\"Option 1\",\"Option 2\"]', 'Aut provident excepturi molestiae nisi nobis. Officia est ratione nam sed ut in laboriosam.', 'Option 2', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=56', 'https://picsum.photos/200/300?random=56', '2006-12-11', '02:50:25', '#825939', 'Sequi accusantium qui ut et enim est maxime. Ut perferendis excepturi vel dolorum modi.', '<html><head><title>Ea est sapiente quia aliquam eos id consequuntur eum omnis eaque.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">sunt</label><input type=\"text\" id=\"username\"><label for=\"password\">vitae</label><input type=\"password\" id=\"password\"></form><div id=\"70653\"></div><div id=\"13562\"></div><div class=\"autem\">Hic a cum.Fugiat nihil id delectus.</div></body></html>\n', '2025-08-18 21:50:36', '2025-08-10 05:22:14', NULL, 1);
INSERT INTO `crud_examples` (`id`, `name`, `phone_number`, `birthdate`, `address`, `avatar`, `text`, `barcode`, `qr_code`, `email`, `password`, `number`, `currency`, `currency_idr`, `select`, `select2`, `select2_multiple`, `textarea`, `radio`, `checkbox`, `checkbox2`, `tags`, `file`, `image`, `date`, `time`, `color`, `summernote_simple`, `summernote`, `created_at`, `updated_at`, `created_by_id`, `last_updated_by_id`) VALUES
(57, 'Lurhur Nugroho', '(+62) 28 8609 169', '1999-06-25', 'Ds. Baranangsiang No. 528, Semarang 97757, Sumbar', 'https://gravatar.com/avatar/a605ec143517f19dc2770145a5f36918ea2d3483f4d6c41b91203062bc20c152', 'C2BgJvm7tp', 'qMg8dN4vSZ', '7237044044025', 'xanana93@gmail.com', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 189, 8523, 7131317, 'Option 10', 'Option 8', '[\"Option 1\"]', 'Mollitia et quas sit. Amet voluptas praesentium quos quo.', 'Option 3', '[\"Option 1\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=57', 'https://picsum.photos/200/300?random=57', '2004-10-01', '21:34:10', '#f10c0c', 'Occaecati rerum quia quam vel. Voluptas et iusto repudiandae voluptas ex.', '<html><head><title>Quos optio fugiat iusto quia aliquid sit et.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">quis</label><input type=\"text\" id=\"username\"><label for=\"password\">dolores</label><input type=\"password\" id=\"password\"></form><div id=\"95444\"></div><div class=\"veniam\"></div><div class=\"qui\"><table><thead><tr><th>Iste aliquam.</th><th>Voluptatum sapiente.</th><th>Aut vel et sunt.</th></tr></thead><tbody><tr><td>Omnis animi tempore cum tempore eveniet sint.</td><td>Quidem maxime possimus optio ex modi nemo.</td><td>Autem aut officiis.</td></tr><tr><td>Aut earum rem in ipsa nesciunt rerum et.</td><td>Animi rem voluptatum sunt suscipit inventore enim similique ipsam omnis corrupti.</td><td>Officiis ut repellat architecto minima aperiam dignissimos sit minima quia corporis quasi magni.</td></tr><tr><td>Et dolor sed.</td><td>Nesciunt est.</td><td>Laudantium et aut optio architecto aut hic eius.</td></tr><tr><td>Quaerat quis nam nemo et iste officia.</td><td>Nesciunt rerum nihil ipsa eum.</td><td>Qui enim laboriosam ipsam odio aut.</td></tr><tr><td>Cumque eum asperiores et voluptatem ex.</td><td>Totam adipisci neque laboriosam eveniet consequatur voluptas velit et.</td><td>Eaque hic tempore.</td></tr><tr><td>Reprehenderit quis aperiam provident unde.</td><td>Veritatis rerum qui ipsam sed nihil voluptatum consequuntur doloribus doloribus et.</td><td>Tempora suscipit distinctio ut vero ipsum quis vel.</td></tr><tr><td>Temporibus nam provident est debitis vitae quia doloribus occaecati sint ut.</td><td>Ex repudiandae qui dolores facere ut sint est labore.</td><td>Qui sit quidem.</td></tr><tr><td>Eveniet nesciunt sint quo id quae earum et magni.</td><td>Reprehenderit est quia.</td><td>Eveniet perferendis non quam.</td></tr><tr><td>Nesciunt beatae quia.</td><td>Est in quia sed omnis deleniti sunt error vero in sit tempore sint voluptas.</td><td>Veritatis inventore quia ipsa deserunt.</td></tr></tbody></table>Voluptatem itaque delectus quisquam et qui quod ut atque dolores.<i>Dignissimos eos facere nihil voluptas ut cumque et omnis.</i><h1>Incidunt voluptas reprehenderit enim aliquam voluptas provident omnis et maxime.</h1></div><div class=\"maiores\"><div id=\"23590\"></div><div id=\"97043\">Adipisci voluptatum aut vel accusamus hic voluptas non.<table><thead><tr><th>Reprehenderit quas velit voluptatum.</th><th>Vel enim odit et facilis.</th><th>Itaque odio sit.</th></tr></thead><tbody><tr><td>Sit ex reprehenderit est id amet consequatur.</td><td>Molestias eum eaque sint autem sed.</td><td>Ipsum libero culpa voluptatem et.</td></tr><tr><td>Quae rerum doloribus ipsum quas.</td><td>Quam et quia voluptatem et est vero labore nulla.</td><td>Ut nisi qui enim est.</td></tr><tr><td>Saepe modi magnam nesciunt perferendis voluptatem fugiat illum fuga.</td><td>Repellat sit perferendis unde corporis tempora ab assumenda similique et ducimus nobis omnis.</td><td>Enim.</td></tr></tbody></table><h2>Deserunt maiores commodi consequatur error ipsa soluta.</h2><ul><li>Illo.</li><li>Sapiente.</li><li>Enim tenetur.</li><li>Doloribus.</li><li>Iste repellendus aliquam voluptates.</li></ul></div></div></body></html>\n', '2025-08-06 14:46:50', '2025-08-16 05:19:51', NULL, 1),
(58, 'Sakti Ramadan M.Ak', '(+62) 416 8063 116', '2001-01-05', 'Dk. Ir. H. Juanda No. 1, Solok 39711, Lampung', 'https://gravatar.com/avatar/d9eb38defccf56c620fe13dfb89bb3df705b2bb485f58f3e39c72de9b74798f1', 'qYhWk8ejEB', '6Gm24wk5Tq', '7354990000902', 'swahyudin@pradana.biz', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 642, 7575, 5971089, 'Option 5', 'Option 2', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Sunt autem numquam est nobis et quia. Sed quidem voluptates nulla iure.', 'Option 1', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=58', 'https://picsum.photos/200/300?random=58', '1972-06-12', '06:47:26', '#89522b', 'Sed ex molestiae voluptatem. Non aut molestias maiores eum explicabo rem.', '<html><head><title>Laboriosam voluptatem dolores sint occaecati molestiae.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">occaecati</label><input type=\"text\" id=\"username\"><label for=\"password\">non</label><input type=\"password\" id=\"password\"></form><div id=\"62824\"><div class=\"quas\"><p>Ratione.</p></div></div><div class=\"ex\"><ul><li>Nobis enim.</li><li>Autem et debitis.</li><li>Quae veritatis.</li><li>Aliquam.</li></ul><table><thead><tr><th>Sapiente corporis voluptatem esse.</th></tr></thead><tbody><tr><td>Voluptatem sit fugit perferendis tenetur similique facilis recusandae sapiente omnis molestiae.</td></tr><tr><td>Consequatur ut sit aut distinctio.</td></tr><tr><td>Rerum dicta consequatur nihil harum itaque.</td></tr><tr><td>Maiores aut impedit qui consequuntur atque sed in corrupti.</td></tr></tbody></table><span>Et voluptatem debitis veniam reprehenderit et expedita nostrum et nisi aliquam libero quas est.</span></div></body></html>\n', '2025-08-24 15:55:16', '2025-08-09 14:09:58', NULL, NULL),
(59, 'Rangga Eka Sitorus S.IP', '(+62) 896 678 297', '2023-11-24', 'Psr. Padang No. 27, Bontang 21975, Gorontalo', 'https://gravatar.com/avatar/c3440d7eac4d41b2cbb21e22d5b491a28a69675edd1af0a5ae7a87ad1ba5124e', 'LdyrXDrGM0', 'l2Cm4szaxf', '7444795306207', 'vpermadi@wijaya.co', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 563, 5122, 3103682, 'Option 1', 'Option 6', '[\"Option 1\"]', 'Et ut voluptas et sunt non. Impedit aut rerum pariatur iste sed voluptatem illum.', 'Option 4', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=59', 'https://picsum.photos/200/300?random=59', '1973-03-25', '22:06:40', '#4a3618', 'Ullam fugit doloremque vitae qui possimus. Et ipsam impedit ea et.', '<html><head><title>Accusantium quod sunt nisi sit nam.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">voluptatum</label><input type=\"text\" id=\"username\"><label for=\"password\">quidem</label><input type=\"password\" id=\"password\"></form><div class=\"quaerat\"><div class=\"sed\"><p>Non.</p>Error omnis sapiente deleniti est quia.<h1>Vero magni quod rerum quia numquam non odit.</h1>Provident debitis porro et ipsa perspiciatis magnam voluptates sed nisi sint.</div><div id=\"63067\"></div><div class=\"et\"></div></div><div class=\"ullam\"><span>Similique hic magni nam.</span>Quas assumenda reprehenderit ut quos quaerat.</div><div class=\"fuga\"><div class=\"dolorem\"></div><div id=\"96314\"><h2>Distinctio veritatis illo sint earum excepturi voluptas provident dignissimos voluptatem et et.</h2></div><div class=\"ad\"></div><div class=\"ipsa\"></div></div><div class=\"earum\"></div></body></html>\n', '2025-08-12 05:45:39', '2025-08-17 06:55:45', 1, 1),
(60, 'Raharja Irawan', '(+62) 405 3565 225', '1973-11-04', 'Jr. Badak No. 609, Tomohon 56341, Kaltara', 'https://gravatar.com/avatar/02636c8b8bcf1763ebc5e5fb44a6fd79a4d94267161b41d1d1a5f461ace97322', 'JKCC0NIjFL', 'HiE8Z4ygkT', '6623926864262', 'ciaobella43@gmail.co.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 461, 5298, 9308227, 'Option 9', 'Option 3', '[\"Option 1\"]', 'Numquam exercitationem nihil reiciendis nostrum sed. Dolor quo qui in.', 'Option 3', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=60', 'https://picsum.photos/200/300?random=60', '1996-01-20', '16:56:47', '#3fd927', 'Aut qui illum sunt officiis fuga dolores facere aut. Facilis possimus et asperiores et occaecati.', '<html><head><title>Sunt modi accusamus corporis.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">consequatur</label><input type=\"text\" id=\"username\"><label for=\"password\">aut</label><input type=\"password\" id=\"password\"></form><div id=\"68542\"><table><thead><tr><th>Fuga pariatur occaecati.</th><th>Ut.</th><th>Quis.</th><th>Amet sed nihil labore eos odio.</th></tr></thead><tbody><tr><td>Non expedita dolorum ipsa omnis laudantium nobis.</td><td>Exercitationem ipsum voluptas sit.</td><td>Ut nesciunt.</td><td>Ipsa tempora adipisci minima quo et aut reiciendis.</td></tr><tr><td>Iusto est ut.</td><td>Id ab nobis.</td><td>Libero cumque reiciendis id fuga reiciendis consequuntur sint omnis.</td><td>Sapiente voluptatum voluptatem nobis eos sapiente odio praesentium error ut consequatur.</td></tr><tr><td>Voluptas eos quasi nihil nemo harum.</td><td>Sint mollitia.</td><td>Molestiae molestiae totam.</td><td>Consectetur ut sed qui laborum consequatur.</td></tr></tbody></table><p>Aut quia eaque qui non accusantium.</p><i>Dolores ratione.</i><h2>Soluta atque eum doloremque consequatur ullam quo nostrum.</h2></div><div id=\"23169\"></div><div id=\"57046\"></div><div class=\"odit\"><span>Dolor reiciendis atque quas sed quia ipsum ullam neque ut labore impedit aut necessitatibus.</span><span>Quia ut quam id.</span></div></body></html>\n', '2025-08-02 20:32:40', '2025-08-04 16:42:59', NULL, NULL),
(61, 'Maya Utami M.Farm', '020 4289 211', '1975-09-04', 'Psr. Padang No. 707, Blitar 97523, Sulbar', 'https://gravatar.com/avatar/8de079a7ff8ebbfabf200248fb6b7196c6e07775c76adf3fe7227f4411a73283', '46Lrm4LfJq', '0wit2ThT3f', '0186448775691', 'galak33@yahoo.co.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 115, 7338, 3151613, 'Option 7', 'Option 1', '[\"Option 1\",\"Option 2\"]', 'Aliquam aut consequatur quia nemo. Aut repellat sed id beatae vitae.', 'Option 3', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=61', 'https://picsum.photos/200/300?random=61', '1997-12-01', '07:46:10', '#d986fc', 'Eveniet et rem vero id. Qui voluptas assumenda est voluptatum doloribus. Eum quia aut aut.', '<html><head><title>Et deleniti eius iusto ducimus excepturi velit.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">fugiat</label><input type=\"text\" id=\"username\"><label for=\"password\">voluptate</label><input type=\"password\" id=\"password\"></form><div id=\"12653\"><ul><li>Harum dolore eos.</li><li>Ullam dicta.</li><li>Iusto ut quia laudantium voluptatem.</li><li>Ratione.</li><li>Perspiciatis fugiat porro.</li><li>Reiciendis.</li><li>Deserunt suscipit omnis.</li><li>Rerum minima occaecati.</li><li>Exercitationem eos.</li><li>Temporibus.</li></ul></div><div id=\"81428\"><div class=\"sint\"></div><div id=\"88062\"></div><div class=\"ea\"></div></div><div id=\"6474\"></div><div class=\"excepturi\"></div></body></html>\n', '2025-08-06 03:06:30', '2025-08-18 23:55:00', NULL, 1),
(62, 'Rahman Kalim Waluyo S.Kom', '(+62) 884 9943 1347', '1987-02-04', 'Psr. Laksamana No. 46, Manado 13590, Papua', 'https://gravatar.com/avatar/d3415664438ad8128beeba7e110f4842aca08927c6f262b4c59e30e4922c15af', 'ZapURh5kHw', '5Q5vQ6iglb', '8622757204351', 'gthamrin@gmail.co.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 961, 5626, 5524426, 'Option 3', 'Option 9', '[\"Option 1\"]', 'Voluptas neque in voluptate ut aut enim facilis quia. Enim quos ut quibusdam.', 'Option 3', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=62', 'https://picsum.photos/200/300?random=62', '2021-02-24', '14:10:53', '#e3d439', 'Nulla rerum quia velit ut ratione dicta. Vero blanditiis quam error provident facere non ea.', '<html><head><title>Et cum in et voluptas architecto est quae sit numquam.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">voluptatem</label><input type=\"text\" id=\"username\"><label for=\"password\">ea</label><input type=\"password\" id=\"password\"></form><div id=\"14450\">Libero earum sed voluptatibus.<h3>Quia fugiat ipsum non voluptas quo consequuntur cupiditate enim sapiente.</h3></div><div class=\"at\"><table><thead><tr><th>Eos tempora.</th><th>Deserunt omnis.</th><th>Ut distinctio aut.</th><th>Rerum minus facilis.</th></tr></thead><tbody><tr><td>Veritatis est nam quia fugit.</td><td>Voluptas aut modi ad repellat dolorem minus quia voluptatum quam.</td><td>Autem at culpa corporis non excepturi ea rerum autem voluptas magnam.</td><td>Aliquam dolores ad qui id temporibus.</td></tr><tr><td>Et neque et et.</td><td>Inventore necessitatibus voluptatem facere iste nihil harum sapiente atque sint fugiat.</td><td>Aut rerum et et sunt est maiores sunt et.</td><td>Cumque qui.</td></tr><tr><td>Et ut rerum nesciunt officiis harum inventore repellat voluptatibus.</td><td>Molestias repudiandae nesciunt molestiae omnis ratione libero iste reiciendis quisquam omnis id.</td><td>Ea consequatur nulla.</td><td>Error qui omnis quo possimus ratione voluptas qui.</td></tr><tr><td>Aut sapiente id nesciunt rerum explicabo ratione iure aliquam sequi et eum saepe dignissimos.</td><td>Quibusdam repudiandae nihil.</td><td>Veritatis ut ad non aut voluptas.</td><td>Et labore sint facere excepturi.</td></tr><tr><td>Aut quis ipsum autem dolorem aut delectus minima voluptates a omnis.</td><td>Quia dolorum qui.</td><td>In molestiae consequatur ut.</td><td>Adipisci molestiae consequatur porro quod praesentium.</td></tr><tr><td>Molestiae explicabo aut et assumenda laborum ullam non deserunt harum natus qui dignissimos.</td><td>Ipsam aliquam expedita maiores nobis.</td><td>Ut expedita voluptatem sit quos fuga pariatur.</td><td>A autem sequi deleniti.</td></tr><tr><td>Sed voluptas tempore quibusdam a omnis.</td><td>Porro veniam sit repellat odio dolorem et.</td><td>Et.</td><td>Laudantium tempora et provident eum et quo architecto est.</td></tr><tr><td>Eos qui deserunt tempore eos deserunt laborum corporis error.</td><td>Ex occaecati qui dolorem voluptate unde tempore.</td><td>Sunt ipsa et et voluptatem.</td><td>Repellat laboriosam voluptatem consequatur.</td></tr></tbody></table><a href=\"example.net\">Dolores facilis in dolor.</a></div><div id=\"34225\"><div id=\"71733\">Hic.</div><div id=\"5149\"></div><div id=\"89424\"><table><thead><tr><th>Consequatur cum non facere.</th><th>Aliquam enim aut.</th></tr></thead><tbody><tr><td>Cum.</td><td>Ratione totam.</td></tr><tr><td>Maiores corrupti non asperiores soluta.</td><td>Molestiae quo in eum qui et dolor dolore porro natus perferendis ipsam.</td></tr><tr><td>Tenetur eius consequatur at et.</td><td>Commodi unde molestiae repudiandae est.</td></tr><tr><td>Qui natus sit ea officia excepturi et cumque.</td><td>Sequi sed quasi omnis.</td></tr><tr><td>Deserunt labore.</td><td>Ea voluptatem atque aut distinctio velit porro atque nihil assumenda architecto voluptatum repellendus.</td></tr><tr><td>Placeat doloremque doloribus est consequuntur perferendis a est voluptatem.</td><td>Quis et sit doloremque ut officia omnis nemo quidem.</td></tr><tr><td>Expedita alias qui quia ea omnis quam culpa quasi.</td><td>Repellat voluptates at voluptatem fugit est animi.</td></tr></tbody></table><i>Consectetur eaque placeat assumenda earum laboriosam.</i><p>Et aut inventore rerum eos harum fugiat.</p><h3>Velit aut autem sed deserunt quia veniam.</h3></div></div></body></html>\n', '2025-08-22 10:44:23', '2025-08-21 13:06:00', NULL, NULL),
(63, 'Cecep Sihombing', '0442 2285 1595', '1992-07-19', 'Kpg. Gajah No. 923, Kendari 37279, Sumsel', 'https://gravatar.com/avatar/b019da3809fe58766a7ff71f779745c540cb5ccc43cdafca795fe3a194fb3001', 'DFsW5GUzrQ', 'ssHbBUYiMA', '9199702846601', 'namaga.karman@yahoo.com', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 583, 8045, 264816, 'Option 5', 'Option 8', '[\"Option 1\",\"Option 2\"]', 'Officia quasi enim quas qui vel debitis sequi. Error modi porro id.', 'Option 4', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=63', 'https://picsum.photos/200/300?random=63', '2007-05-20', '23:09:29', '#87b170', 'Temporibus ab maxime aut qui. Itaque rerum ab reiciendis. Quis esse et tempora ut.', '<html><head><title>Quo incidunt quis aut.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">sint</label><input type=\"text\" id=\"username\"><label for=\"password\">vitae</label><input type=\"password\" id=\"password\"></form><div id=\"5264\">Pariatur est molestiae earum quisquam aut nihil rerum corrupti et sit.</div><div id=\"30130\"></div></body></html>\n', '2025-08-13 02:32:09', '2025-08-25 01:54:38', NULL, NULL),
(64, 'Baktiono Siregar', '(+62) 230 2730 8737', '2015-08-23', 'Jln. Ki Hajar Dewantara No. 562, Tebing Tinggi 35457, Kalbar', 'https://gravatar.com/avatar/111350a32d32a91792171add695c9b0e321497d57cd6c907b0e6a351f66da872', 'IXOs8oDdvG', 'N3YNn9EAqN', '3253534957952', 'emong.habibi@waskita.my.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 845, 9899, 2841227, 'Option 7', 'Option 10', '[\"Option 1\",\"Option 2\"]', 'Inventore illo eveniet et qui. Eos voluptatem ipsam ullam repellat illo.', 'Option 2', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=64', 'https://picsum.photos/200/300?random=64', '1973-05-31', '10:37:45', '#c74c4c', 'Recusandae minus est fuga quos recusandae. Autem eum enim aperiam placeat inventore cum rerum sed.', '<html><head><title>Qui dolore amet et.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">cumque</label><input type=\"text\" id=\"username\"><label for=\"password\">modi</label><input type=\"password\" id=\"password\"></form><div id=\"71314\"><a href=\"example.org\">Cumque eum qui beatae ut fugiat deserunt deserunt architecto sit.</a><table><thead><tr><th>Quidem et reiciendis exercitationem id nihil.</th><th>Quos unde molestiae adipisci magnam libero.</th><th>Vel et neque.</th><th>Ut aut quasi.</th><th>Odio.</th></tr></thead><tbody><tr><td>Ducimus neque porro ut dolor libero nemo.</td><td>Amet dolorem quia ut.</td><td>Sequi iusto cumque quibusdam sint nulla dicta quidem consequuntur eligendi.</td><td>Unde officiis ut non possimus recusandae voluptatibus fugit libero aut nihil.</td><td>Laborum molestiae modi.</td></tr><tr><td>Error nobis excepturi dolore repudiandae in et voluptas eligendi.</td><td>Dicta et et sequi dolore.</td><td>Reiciendis harum omnis totam vero dolorum consequatur pariatur officiis nobis.</td><td>Quas at.</td><td>Ipsam et quia similique quo dignissimos.</td></tr><tr><td>Vitae esse reiciendis debitis omnis voluptatem.</td><td>A voluptatum velit vero consectetur tempore sequi necessitatibus.</td><td>Ut ut dolores excepturi voluptate quod aut esse est quo.</td><td>Velit molestiae autem sint vel quos et ea assumenda sit assumenda sed.</td><td>Sapiente doloribus et quae ut.</td></tr><tr><td>Suscipit esse non aut et illum ullam sit qui corporis voluptates sed.</td><td>Et rerum deserunt eveniet animi et a consequatur aut consequatur accusantium.</td><td>Et dicta.</td><td>Nostrum aperiam aut sint vel.</td><td>Dolor voluptate.</td></tr><tr><td>Et eum eos maiores animi labore.</td><td>Sunt sit.</td><td>Rerum velit.</td><td>Harum quidem asperiores reiciendis distinctio voluptates magni quasi tempora dignissimos cumque voluptates voluptatibus.</td><td>Laboriosam perferendis officia eius non dolorem debitis aut dolores et.</td></tr><tr><td>Accusantium maxime laudantium et assumenda.</td><td>Maiores.</td><td>Et.</td><td>Qui dolor est.</td><td>Voluptatem sapiente sit quia qui harum rerum in eum.</td></tr><tr><td>Ullam natus qui et eum.</td><td>Ut officiis velit.</td><td>Nostrum iusto ipsa.</td><td>Similique vitae deleniti laudantium aut.</td><td>Blanditiis numquam culpa.</td></tr></tbody></table><p>Exercitationem est.</p></div><div class=\"eum\"><ul><li>Quaerat eos numquam aliquid.</li><li>Occaecati sed vero.</li><li>Minima repellendus.</li><li>Ipsa non fuga voluptate.</li><li>Dolores.</li><li>Nihil sunt doloribus tenetur.</li><li>Iure nihil quo autem.</li><li>Et qui ex.</li></ul><span>Expedita aut architecto eum dolorem vitae.</span><b>Neque natus harum architecto.</b></div><div id=\"51601\"></div></body></html>\n', '2025-08-20 08:52:00', '2025-08-22 23:40:30', 1, NULL),
(65, 'Nova Titi Safitri S.Pd', '(+62) 758 9936 097', '2018-07-01', 'Ki. Mulyadi No. 642, Administrasi Jakarta Barat 70041, Riau', 'https://gravatar.com/avatar/97aafe5eef6baf270757ff894db9ec4c319f186dc3f6579554462822db1562ff', 'A2CpzzZZAX', 'YTmPeGzggy', '6230401461436', 'qlazuardi@yahoo.co.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 597, 6639, 7202958, 'Option 6', 'Option 6', '[\"Option 1\"]', 'Eum veritatis adipisci neque facilis aut. Vero aut consequuntur eaque eligendi ut harum.', 'Option 2', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=65', 'https://picsum.photos/200/300?random=65', '2022-08-04', '04:16:27', '#5d0229', 'Quam quod doloremque nihil dolorem. Itaque velit molestiae atque sed doloribus distinctio nemo qui.', '<html><head><title>Iusto.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">omnis</label><input type=\"text\" id=\"username\"><label for=\"password\">architecto</label><input type=\"password\" id=\"password\"></form><div class=\"esse\"></div><div class=\"aliquam\"><div id=\"71423\"></div><div id=\"72138\"></div><div id=\"11632\"></div></div><div id=\"18221\"><div id=\"53953\"></div><div id=\"99095\"></div><div class=\"totam\"></div><div class=\"consequuntur\"><i>Cum doloribus.</i></div></div></body></html>\n', '2025-08-27 22:20:58', '2025-08-13 07:11:34', NULL, NULL),
(66, 'Kanda Kurnia Nugroho S.Ked', '(+62) 575 6206 352', '1982-01-12', 'Dk. Bakaru No. 288, Kendari 14204, Pabar', 'https://gravatar.com/avatar/c47e8996ff4708bdce4d7bedb08574ca3c3927f24d850dc43756de78d67baf6a', 'PjPTXhcjcd', 'CngbdYxHU8', '7741109040025', 'anggriawan.marwata@gmail.com', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 70, 7144, 5807526, 'Option 9', 'Option 8', '[\"Option 1\"]', 'Fugiat sed in enim voluptate officiis. Non sed et est repudiandae perspiciatis dolores nemo iusto.', 'Option 4', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=66', 'https://picsum.photos/200/300?random=66', '1971-03-26', '00:18:45', '#4696bc', 'Perspiciatis odio pariatur fugiat. Quisquam maxime ab qui labore qui aut. Eum aut dolorum sed ea.', '<html><head><title>Quam provident eius voluptatibus id omnis pariatur aut velit blanditiis.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">sapiente</label><input type=\"text\" id=\"username\"><label for=\"password\">omnis</label><input type=\"password\" id=\"password\"></form><div class=\"non\"></div><div class=\"laboriosam\"><div class=\"commodi\"><i>Blanditiis beatae.</i></div><div id=\"4441\"></div></div><div class=\"sint\"><div id=\"4531\"><ul><li>Et vero.</li><li>Dolor fugiat.</li><li>Ut dicta.</li><li>Sunt ab.</li><li>Deleniti dolores autem.</li><li>Consequatur quibusdam dolor nihil.</li><li>Nisi asperiores ipsa et.</li><li>Dolorum qui.</li><li>Sit dolorem totam.</li><li>Sit aut.</li><li>Autem quo ab.</li></ul><b>Non aspernatur et.</b><ul><li>Voluptas fuga eos.</li></ul></div></div><div id=\"38209\"></div></body></html>\n', '2025-08-06 07:47:24', '2025-08-25 00:19:54', NULL, 1),
(67, 'Padma Nasyiah', '0806 9308 179', '1984-11-15', 'Kpg. Bakaru No. 572, Blitar 25600, Sumut', 'https://gravatar.com/avatar/5f4106f7b5cab86526a4d58a80ec6f02bab5df5b23cf06b873f4494f872d30c8', 'SKvkdNi3gn', '2bpEDV2G08', '4426506829956', 'nadine99@maryati.desa.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 25, 5111, 5103902, 'Option 5', 'Option 2', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Magnam sit nam dolor et qui corporis soluta. Quaerat quia harum ut et minus.', 'Option 3', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=67', 'https://picsum.photos/200/300?random=67', '1977-03-23', '16:32:56', '#5e2f4b', 'Aut et similique iusto et dolores possimus. Itaque placeat eos porro sed eum autem.', '<html><head><title>Hic ad ratione maiores rem aspernatur eum magni et qui voluptas.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">exercitationem</label><input type=\"text\" id=\"username\"><label for=\"password\">non</label><input type=\"password\" id=\"password\"></form><div class=\"et\"></div><div class=\"quis\"><div id=\"80632\"><i>Illum et quibusdam commodi rerum officia nobis aperiam deserunt.</i>Dolore sed sit dignissimos.</div></div><div class=\"optio\"><div class=\"rem\"></div><div id=\"72270\">Natus voluptate placeat autem molestiae repellendus.<ul><li>Sed rem beatae.</li><li>Doloribus sed voluptatum unde laborum.</li><li>Quia vero eum eos repellendus.</li><li>A molestiae similique.</li><li>Et sit voluptatibus.</li><li>Amet rerum corporis.</li><li>Fugiat blanditiis.</li></ul><ul><li>Dolores quia ut ratione qui dignissimos.</li><li>Quia non.</li><li>Animi saepe.</li><li>Eius saepe unde et adipisci.</li></ul><span>Saepe voluptate.</span></div></div><div id=\"78647\"><table><thead><tr><th>Porro eius quia dolor.</th><th>Repudiandae rerum aperiam necessitatibus.</th><th>Quo itaque.</th><th>Quisquam enim.</th></tr></thead><tbody><tr><td>Aperiam commodi provident est dicta.</td><td>Aut eaque sit ad praesentium et.</td><td>Recusandae quo quod.</td><td>Aut sed sed ut quis molestiae ut.</td></tr><tr><td>Velit ab voluptates voluptates ipsum est similique libero ea.</td><td>Quo fuga recusandae sunt cupiditate facere esse.</td><td>Est non in modi vero deleniti.</td><td>Neque mollitia labore eos temporibus eum consequatur.</td></tr><tr><td>Minima.</td><td>Quia expedita qui omnis nulla doloremque consequatur autem quo consequatur.</td><td>Molestias atque quas sunt.</td><td>Suscipit sed libero veniam qui ipsa autem minus commodi ipsum tempore non deserunt dicta.</td></tr><tr><td>Labore quia doloribus aperiam cumque dolorum perspiciatis voluptas.</td><td>Labore tempore dolor tempora sit sapiente omnis iusto libero rerum delectus necessitatibus accusamus.</td><td>Sunt eos vel voluptas culpa iste dolores ut harum nesciunt.</td><td>Consequuntur officiis adipisci recusandae explicabo.</td></tr><tr><td>Necessitatibus et ea quisquam ab et.</td><td>Animi earum quo blanditiis architecto velit quo nostrum consequatur nobis ipsa.</td><td>Ducimus dolor et ea beatae sint ab.</td><td>Sequi itaque itaque sint et.</td></tr><tr><td>Iste consequuntur.</td><td>Assumenda doloremque debitis beatae aliquam.</td><td>Provident ducimus.</td><td>Nulla.</td></tr><tr><td>Doloribus.</td><td>Et odio aut id beatae reiciendis adipisci.</td><td>Consequuntur exercitationem repellat omnis quis ullam cum voluptas vel doloremque.</td><td>Quo dicta fugiat rerum dolore et cum illo minus incidunt.</td></tr></tbody></table><b>Natus est commodi non nemo ea et delectus aspernatur.</b><table><thead><tr><th>Maiores mollitia.</th><th>Et unde.</th><th>Non vel quia.</th><th>Voluptas quos.</th></tr></thead><tbody><tr><td>Quod minus totam vel dolores labore ullam et minus.</td><td>Aliquid omnis iusto sapiente iusto est ut est dolores voluptatum.</td><td>Aut ut.</td><td>Numquam quos vitae velit est qui maxime est placeat velit qui laboriosam.</td></tr><tr><td>Sit dolorum qui error nisi nostrum qui.</td><td>Vitae aut iste odit amet aliquid nam sunt.</td><td>Officia molestiae voluptatem aut et ratione quam quisquam pariatur voluptatem repellendus alias deleniti.</td><td>Adipisci ut quam sint culpa.</td></tr><tr><td>Nisi ut ad animi sit impedit.</td><td>Dolorum eius veritatis.</td><td>Necessitatibus nulla in quos voluptates provident.</td><td>Ut aut sed sit quisquam voluptatem quo sint fuga ex.</td></tr><tr><td>Ea consequatur accusantium ad voluptatibus ut accusamus.</td><td>Ut nam.</td><td>Quasi reprehenderit quaerat.</td><td>Ab vel voluptatum quidem aut sequi eaque sunt dolores.</td></tr><tr><td>Dicta debitis nostrum facilis hic.</td><td>Nulla eius.</td><td>Voluptatem distinctio qui nihil quod.</td><td>Et debitis dolores accusantium.</td></tr><tr><td>Facere in dolore.</td><td>Illum alias hic sapiente dolor consequatur.</td><td>Ex quas rerum et accusantium beatae.</td><td>Non odit temporibus quam.</td></tr><tr><td>Ipsam rerum assumenda voluptate iure.</td><td>Voluptas accusantium in et aut molestiae rerum tenetur voluptatem ab mollitia dolores.</td><td>Sed sunt soluta consectetur eligendi ea aut eius.</td><td>Rem qui quam quos assumenda rerum atque et quam dolores inventore voluptatibus.</td></tr><tr><td>Et reiciendis id facere corporis.</td><td>Corporis dignissimos omnis.</td><td>Aperiam reiciendis aliquid soluta iure excepturi esse iste.</td><td>Aut mollitia voluptatem dolores et.</td></tr></tbody></table><span>Non illum omnis ut et officia est placeat rerum delectus cumque esse ducimus.</span></div></body></html>\n', '2025-08-17 01:00:28', '2025-08-15 10:30:02', 1, NULL),
(68, 'Janet Nilam Sudiati S.IP', '(+62) 290 4673 7160', '1998-02-26', 'Psr. Suryo Pranoto No. 613, Sibolga 27145, Sultra', 'https://gravatar.com/avatar/c03a3fea2a22e310e92a6c9001295a69e736d0c04b13e91480ac74f574e76362', 'tXNN26Uf8m', 'jVSuvw4XFt', '1901106323149', 'wpuspita@gmail.co.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 503, 9464, 3736245, 'Option 2', 'Option 4', '[\"Option 1\"]', 'Inventore dignissimos ad eum earum. Voluptatibus autem perferendis est magni praesentium.', 'Option 2', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=68', 'https://picsum.photos/200/300?random=68', '2016-03-23', '13:20:48', '#112e92', 'Doloremque qui est corrupti. Aut optio unde autem.', '<html><head><title>Omnis fugiat voluptatem libero impedit sit tempore ipsum voluptatem a perferendis eos ut.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">animi</label><input type=\"text\" id=\"username\"><label for=\"password\">nemo</label><input type=\"password\" id=\"password\"></form><div class=\"quae\"><p>Voluptas nostrum est aut nihil quo.</p><span>Et laudantium reiciendis dicta et excepturi iste ab.</span><i>Cupiditate saepe fugit vel minima magni et magnam id eos quis eos doloribus.</i><a href=\"example.net\">Rerum soluta adipisci rerum temporibus dolorem.</a></div><div id=\"71007\"></div><div class=\"placeat\"><table><thead><tr><th>Optio magni quo quam qui ut.</th></tr></thead><tbody><tr><td>Consequatur qui.</td></tr><tr><td>Maxime voluptatibus placeat molestiae cupiditate laboriosam quaerat nihil ratione at magnam ut.</td></tr><tr><td>Dignissimos qui ratione itaque reprehenderit aliquam sunt enim et provident.</td></tr><tr><td>Beatae et quia blanditiis sit fugit ipsam hic.</td></tr><tr><td>Omnis vel tempore consequatur quaerat.</td></tr><tr><td>Similique perferendis quisquam commodi eum at voluptates aliquid non laboriosam possimus.</td></tr><tr><td>Laborum ratione id eveniet est explicabo quod sed hic non.</td></tr><tr><td>Natus quia adipisci et voluptatibus dicta sed vitae molestiae quis reprehenderit repudiandae quia.</td></tr><tr><td>Laudantium.</td></tr><tr><td>Porro eligendi consequatur reiciendis eligendi expedita distinctio et dignissimos.</td></tr></tbody></table><p>Cupiditate sit sed laborum eius ut ut quia qui.</p>Beatae qui ut nihil odit.</div><div class=\"voluptas\"><div id=\"33675\"></div><div id=\"14099\"><h3>Omnis qui.</h3></div><div class=\"pariatur\"><table><thead><tr><th>Voluptates aliquam vel.</th><th>Rerum est molestiae.</th><th>Quae deserunt quo praesentium et.</th><th>Perspiciatis molestiae reiciendis.</th><th>Vitae quos.</th><th>Nulla.</th></tr></thead><tbody><tr><td>Beatae officiis deleniti veritatis et ut.</td><td>Voluptatem commodi.</td><td>Eos neque saepe.</td><td>Dolorum ex dolorem voluptas.</td><td>Autem porro aut.</td><td>Aperiam deserunt harum iure laborum.</td></tr><tr><td>Dolor.</td><td>Amet ea facilis quam debitis nobis saepe aut quos.</td><td>Optio et atque est porro magnam eveniet et deleniti.</td><td>Voluptate aut vel deleniti iure.</td><td>Nulla quo officiis pariatur nihil facere exercitationem sed.</td><td>A omnis perspiciatis quis quasi est nemo enim quod et.</td></tr><tr><td>Enim voluptatum.</td><td>Voluptas voluptatem odit omnis cumque cupiditate.</td><td>Sunt quia.</td><td>Deserunt incidunt.</td><td>Eos.</td><td>Quia deleniti adipisci voluptas omnis culpa.</td></tr><tr><td>Consectetur quos aut nihil.</td><td>Veritatis vero id perspiciatis doloremque.</td><td>Ut cum itaque dolor quis vel odio nesciunt.</td><td>Eos est saepe vitae sequi quia.</td><td>Aut quam aliquam dolores.</td><td>Qui earum non deserunt.</td></tr><tr><td>Illum fugit inventore ipsa explicabo nemo delectus ratione consequatur architecto et.</td><td>Eveniet ipsam ipsam ut illum.</td><td>Aut amet rerum fugit eum laborum quis.</td><td>Sint voluptate sit et vel tempora.</td><td>Fuga numquam aut.</td><td>Quo quasi sit molestiae praesentium dolorem sunt ipsam rerum minus.</td></tr><tr><td>Autem error.</td><td>Repudiandae eaque dolorem autem ab.</td><td>Sequi ipsam est doloremque voluptas omnis dolorem ut maiores eius.</td><td>Quo saepe quidem aut consectetur quasi.</td><td>Animi iusto et.</td><td>Quibusdam molestias dolores aut sit cum ab.</td></tr><tr><td>Qui iusto est dolore odio et repellendus architecto.</td><td>Fugit voluptates possimus explicabo sed accusamus quasi.</td><td>Dicta et omnis.</td><td>Commodi alias consectetur corporis dolores.</td><td>Neque nostrum impedit.</td><td>Eos aliquam modi aut nihil vel.</td></tr></tbody></table></div></div></body></html>\n', '2025-08-15 05:42:15', '2025-08-15 16:41:57', NULL, NULL),
(69, 'Najam Carub Wijaya', '0962 6766 833', '2003-12-18', 'Dk. Sentot Alibasa No. 381, Pekanbaru 48165, NTB', 'https://gravatar.com/avatar/fe1821f6e4f67e8299363504b47f16014d73c35bc007904bfcfeea658efa6764', 'cAflWmxVyJ', 'xe7czIBzj5', '9326570358565', 'sakura.kusmawati@rajasa.com', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 430, 5083, 750398, 'Option 2', 'Option 6', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Accusantium ratione vel eum animi deserunt. Culpa vel officiis earum perspiciatis et.', 'Option 1', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=69', 'https://picsum.photos/200/300?random=69', '1986-08-29', '07:11:57', '#79e844', 'Et sit dolore et dolore. Nisi in ad voluptas non esse. Quia illo qui facere eos ipsa.', '<html><head><title>Omnis praesentium quaerat animi.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">recusandae</label><input type=\"text\" id=\"username\"><label for=\"password\">ea</label><input type=\"password\" id=\"password\"></form><div id=\"61494\"></div><div class=\"natus\"></div></body></html>\n', '2025-08-30 16:32:06', '2025-08-13 02:30:03', 1, 1),
(70, 'Kawaya Sihotang', '(+62) 530 8508 597', '1981-01-05', 'Psr. Abdul Muis No. 188, Lubuklinggau 13235, Babel', 'https://gravatar.com/avatar/ff09bbfb4ee74811189fce8fbdda944080b038b212e0a1921477ee273a066cc8', 'sr7Ktnj4E9', 'PS4nybGeDV', '3784017350538', 'maras.kuswandari@gmail.co.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 459, 3985, 3375482, 'Option 4', 'Option 6', '[\"Option 1\",\"Option 2\"]', 'Enim sunt explicabo veritatis. Voluptatem molestiae at ea optio ea.', 'Option 4', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=70', 'https://picsum.photos/200/300?random=70', '2024-04-21', '10:17:17', '#ce2d62', 'Sed in est occaecati laborum velit modi rerum. Laboriosam vel nihil et quam.', '<html><head><title>Et veniam maiores aut sapiente dolores eveniet.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">nihil</label><input type=\"text\" id=\"username\"><label for=\"password\">optio</label><input type=\"password\" id=\"password\"></form><div id=\"67077\"></div><div id=\"23109\"></div></body></html>\n', '2025-08-23 11:05:16', '2025-08-19 18:57:14', 1, 1),
(71, 'Daru Marbun S.Kom', '028 0652 514', '1993-07-08', 'Kpg. Suryo Pranoto No. 854, Blitar 51571, Lampung', 'https://gravatar.com/avatar/2bd9ec110c82d7ad87b3f2efcbdaa808e5047bcd3f032313b8d0daa8c157dcc4', '8GIaUu3iiv', 'wEMMPJAOYC', '7886304024767', 'winarno.yessi@sihombing.sch.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 451, 864, 735181, 'Option 2', 'Option 1', '[\"Option 1\",\"Option 2\"]', 'Consectetur voluptates qui laboriosam officiis maxime id. Ut maxime nulla vero ut voluptatem.', 'Option 3', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=71', 'https://picsum.photos/200/300?random=71', '2014-09-14', '09:30:23', '#e39001', 'Quaerat quis eum ex dolor et autem et. Et aspernatur nobis dolorem dolores ut.', '<html><head><title>Consequuntur aut vero aperiam commodi aliquam dolores officia explicabo animi.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">ut</label><input type=\"text\" id=\"username\"><label for=\"password\">sint</label><input type=\"password\" id=\"password\"></form><div class=\"et\"><a href=\"example.com\">Excepturi esse.</a><i>Ut qui praesentium a et qui.</i><a href=\"example.com\">Quia ipsa.</a></div><div class=\"eveniet\"><ul><li>Velit quo.</li><li>Quasi.</li><li>Laboriosam dolores dolorum.</li><li>Quasi impedit magni.</li><li>Dolor et sunt.</li></ul>Deserunt quaerat.<ul><li>Est ipsam.</li><li>Et eum dolore.</li><li>Et doloremque qui.</li><li>Corporis eveniet corrupti quam.</li><li>Quia facilis natus.</li><li>Voluptas beatae.</li><li>Eos quis non.</li><li>Error facilis corrupti est.</li><li>Est.</li></ul><a href=\"example.com\">Quia.</a></div><div class=\"cupiditate\"></div></body></html>\n', '2025-08-02 16:31:41', '2025-08-18 22:55:54', 1, 1),
(72, 'Unjani Hartati', '0420 6681 955', '1986-02-01', 'Kpg. Pattimura No. 36, Gorontalo 76115, Pabar', 'https://gravatar.com/avatar/f75c6e852fdef9ea36bfa5108e668636bf2dec4f84d1ff9aaf7fe187e4e410b5', 'biOP4ShER7', 'hCWVvic085', '7485686643704', 'lega30@mandasari.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 738, 5071, 1099490, 'Option 1', 'Option 9', '[\"Option 1\"]', 'Assumenda ipsum cum eaque ipsum nobis facilis non. Unde sed architecto beatae et sapiente magni.', 'Option 4', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=72', 'https://picsum.photos/200/300?random=72', '2024-01-11', '07:40:55', '#a54ea7', 'Perferendis consequuntur fuga est rerum est libero. Facilis explicabo labore itaque quibusdam.', '<html><head><title>Eum atque cupiditate et quos deleniti.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">quia</label><input type=\"text\" id=\"username\"><label for=\"password\">ut</label><input type=\"password\" id=\"password\"></form><div id=\"35221\">Ipsam libero.Quod aut pariatur.<table><thead><tr><th>Ut quisquam eum temporibus.</th><th>Quia est excepturi consequuntur.</th><th>Non ut sequi.</th><th>Consectetur ut suscipit quibusdam.</th></tr></thead><tbody><tr><td>Repudiandae nam debitis.</td><td>Et expedita fugit minus omnis quidem et sint aut.</td><td>Non qui repudiandae aut quaerat excepturi est.</td><td>Atque esse eius ducimus maxime corporis excepturi harum illum temporibus voluptatem.</td></tr><tr><td>Rerum et eum atque.</td><td>Voluptate sint vero aliquam.</td><td>Aut perferendis quibusdam nisi facilis assumenda.</td><td>Nihil velit incidunt quo.</td></tr><tr><td>Cumque.</td><td>Voluptas assumenda ut quod nam.</td><td>Blanditiis et molestiae.</td><td>Quibusdam et nostrum distinctio quo.</td></tr><tr><td>Ipsum ut ea eos laboriosam voluptatum inventore.</td><td>Dolor enim et non omnis sit voluptatem ea.</td><td>Nihil laborum iste.</td><td>Commodi velit ex excepturi.</td></tr></tbody></table><p>Delectus laudantium accusantium.</p></div></body></html>\n', '2025-08-16 05:09:03', '2025-08-05 04:58:59', NULL, NULL),
(73, 'Wirda Yulianti S.Ked', '(+62) 350 8972 3220', '2014-03-12', 'Ds. Madiun No. 737, Bontang 57184, Sulut', 'https://gravatar.com/avatar/cfb74e1ebffb106e66e59e6388efce92b5a582c7181fa992382b381f5a25dd1f', 'uAis830m0U', 'vDAn1C47UO', '4494339175212', 'baktiadi23@wahyuni.biz.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 696, 328, 2131563, 'Option 6', 'Option 10', '[\"Option 1\"]', 'Quam dolores sit beatae. Voluptatem nihil aut laborum quas eveniet voluptas.', 'Option 2', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=73', 'https://picsum.photos/200/300?random=73', '2020-04-06', '08:44:58', '#40fa69', 'Similique sit voluptatem natus numquam nisi. Quisquam cupiditate aut in. Velit nam ullam vero.', '<html><head><title>Atque voluptas architecto expedita quod saepe alias voluptas earum maiores necessitatibus omnis magnam.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">ut</label><input type=\"text\" id=\"username\"><label for=\"password\">enim</label><input type=\"password\" id=\"password\"></form><div id=\"53371\"><i>Qui at et rerum.</i>Suscipit perferendis.Dolores assumenda eveniet in.</div><div class=\"distinctio\"><h3>Est.</h3><i>Aut rerum temporibus eos voluptate qui et optio beatae quos recusandae illo harum.</i></div><div class=\"enim\"></div></body></html>\n', '2025-08-25 09:37:07', '2025-08-20 02:23:05', NULL, 1),
(74, 'Nasim Irawan', '(+62) 530 2299 9266', '2004-12-18', 'Gg. Arifin No. 912, Kotamobagu 47877, Sulteng', 'https://gravatar.com/avatar/b2e0a05de3d10d72b53139b7f3323aada6e9262cf3b03cea7c963ef079c1a4cc', 'DMlmpylGvm', 'jYLlrvkriE', '4398832122165', 'fwinarno@puspita.mil.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 605, 2413, 3763511, 'Option 10', 'Option 4', '[\"Option 1\",\"Option 2\"]', 'Vero possimus quia quia eveniet odit nihil. Ea accusantium iusto ea consequuntur vel recusandae.', 'Option 1', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=74', 'https://picsum.photos/200/300?random=74', '2011-09-18', '02:27:16', '#fc3422', 'Et eligendi ducimus et alias enim illum fugit. Eum est et maiores. Aut similique aut sunt.', '<html><head><title>Eos est quia.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">voluptatibus</label><input type=\"text\" id=\"username\"><label for=\"password\">aut</label><input type=\"password\" id=\"password\"></form><div class=\"distinctio\"></div><div class=\"incidunt\"></div></body></html>\n', '2025-08-24 03:53:12', '2025-08-07 10:49:48', NULL, NULL),
(75, 'Marsudi Uwais', '0412 5040 989', '1978-10-15', 'Jr. Ujung No. 784, Tidore Kepulauan 65869, DKI', 'https://gravatar.com/avatar/5c6a15203eb23d03cf07e6f456df8d14c299bad11253d7ce15450ad97ede3350', 'c0ydn5fwnZ', 'ii6Qa89Y6O', '3766305532482', 'mulyani.umaya@yahoo.co.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 456, 4977, 2232142, 'Option 6', 'Option 5', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Corporis aliquam laborum voluptas vitae. Sit nihil deleniti illum omnis ab dolore exercitationem.', 'Option 2', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=75', 'https://picsum.photos/200/300?random=75', '2013-11-01', '01:18:04', '#3e6992', 'In dolorum aperiam aut et omnis. Fugit id quod numquam. Pariatur voluptatem labore ea nihil.', '<html><head><title>Est quia nostrum ipsum.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">enim</label><input type=\"text\" id=\"username\"><label for=\"password\">quia</label><input type=\"password\" id=\"password\"></form><div id=\"44162\"><div id=\"9230\"><span>Cumque.</span><h1>Aut qui ipsa ab et molestias voluptate est voluptatum.</h1></div><div class=\"autem\"></div><div class=\"sint\"></div></div><div class=\"harum\"><p>Dolores a perspiciatis autem voluptatem harum itaque deleniti similique quasi.</p><a href=\"example.net\">Dolor ab qui labore accusamus dolores tenetur omnis.</a><a href=\"example.net\">Eum officiis ut minus.</a></div></body></html>\n', '2025-08-03 09:55:04', '2025-08-04 19:32:52', NULL, 1),
(76, 'Bakidin Pradana', '0542 2856 023', '2012-03-30', 'Jln. Jend. A. Yani No. 201, Tarakan 89940, NTB', 'https://gravatar.com/avatar/6c10a1cfaff1aadeb4a354516a92550904858622f1ffbd514d140a4a9047a015', 'uDh6dDGzk2', 'QWPmk9tbQ6', '2980982473680', 'endah.sihombing@wijaya.in', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 230, 8222, 7583795, 'Option 5', 'Option 7', '[\"Option 1\"]', 'Explicabo dolorem laborum voluptate expedita facilis. Deleniti voluptatum facere est occaecati ut.', 'Option 2', '[\"Option 1\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=76', 'https://picsum.photos/200/300?random=76', '2001-12-04', '10:35:01', '#601233', 'Aliquam accusantium sequi dolorum praesentium. Ut asperiores beatae eligendi est ut.', '<html><head><title>Soluta maiores exercitationem ipsum autem repudiandae sequi.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">illum</label><input type=\"text\" id=\"username\"><label for=\"password\">et</label><input type=\"password\" id=\"password\"></form><div class=\"consectetur\"><ul><li>Perspiciatis rerum.</li><li>Ex aut harum.</li><li>Velit reiciendis.</li><li>Pariatur magni fuga.</li><li>Mollitia excepturi qui et dicta.</li><li>Et est voluptatem.</li><li>Velit totam.</li></ul><h1>Dolores sunt praesentium.</h1></div><div class=\"mollitia\"><div class=\"repellendus\"><a href=\"example.net\">Quia qui aliquam libero eum commodi sint dolor qui est.</a></div><div class=\"consequatur\"></div><div class=\"et\"></div></div></body></html>\n', '2025-08-30 05:19:05', '2025-08-31 12:59:14', 1, 1),
(77, 'Paulin Suryatmi', '0914 1795 711', '2009-04-11', 'Ds. Ters. Pasir Koja No. 367, Manado 41270, Pabar', 'https://gravatar.com/avatar/a7a2fbbad630331d4789ba71a2122730e1cb121f516ceab00d2d70337c09e12a', 'fRTQ1OfQ2P', 'xf7nXD0VgQ', '2340050070751', 'whidayanto@gmail.co.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 402, 7701, 7768319, 'Option 10', 'Option 3', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Pariatur nihil id delectus beatae rerum officia animi. Et et consequuntur suscipit aut.', 'Option 2', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=77', 'https://picsum.photos/200/300?random=77', '2014-07-17', '00:20:43', '#c43cd9', 'Porro sunt neque voluptas aliquid. Quia quia dolorem et facere omnis repellat qui.', '<html><head><title>Ad.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">tenetur</label><input type=\"text\" id=\"username\"><label for=\"password\">est</label><input type=\"password\" id=\"password\"></form><div class=\"quisquam\"></div><div id=\"560\"><b>Assumenda et numquam.</b></div></body></html>\n', '2025-08-18 05:27:56', '2025-08-22 04:26:58', 1, 1);
INSERT INTO `crud_examples` (`id`, `name`, `phone_number`, `birthdate`, `address`, `avatar`, `text`, `barcode`, `qr_code`, `email`, `password`, `number`, `currency`, `currency_idr`, `select`, `select2`, `select2_multiple`, `textarea`, `radio`, `checkbox`, `checkbox2`, `tags`, `file`, `image`, `date`, `time`, `color`, `summernote_simple`, `summernote`, `created_at`, `updated_at`, `created_by_id`, `last_updated_by_id`) VALUES
(78, 'Aslijan Siregar S.Psi', '0363 0316 946', '2021-10-12', 'Gg. Balikpapan No. 609, Padangsidempuan 51657, Kepri', 'https://gravatar.com/avatar/31510383ce86f2eaa893400a58fb746f2774a013b2747f6977d00b41fea91802', 'sTJqa6mtND', 'JTIra881r4', '4199340670793', 'suwarno.aurora@gmail.co.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 160, 7775, 4433705, 'Option 3', 'Option 10', '[\"Option 1\",\"Option 2\"]', 'Inventore et ut sit quia rem. Aut ut maxime aliquid et. Iusto optio et vitae quo laboriosam.', 'Option 2', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=78', 'https://picsum.photos/200/300?random=78', '2020-02-08', '05:00:19', '#13d4f7', 'Iusto in et quod eaque facere. Animi voluptatem quod amet sit vel.', '<html><head><title>Pariatur voluptatum libero voluptatem aut.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">eos</label><input type=\"text\" id=\"username\"><label for=\"password\">molestias</label><input type=\"password\" id=\"password\"></form><div id=\"23623\"></div><div class=\"perferendis\"><div class=\"vel\"></div><div id=\"87383\"></div></div><div class=\"et\"><div id=\"35536\"><b>Porro nam qui suscipit consequatur sed aut.</b><i>Enim qui qui ipsum ut.</i></div><div class=\"molestias\">Quod.Eius voluptatibus accusamus et vel.</div><div class=\"corrupti\"></div></div><div class=\"quos\"><b>Nihil deleniti aut nulla eum doloribus.</b><p>Excepturi sint natus quia quia molestiae est molestiae.</p></div></body></html>\n', '2025-08-22 01:08:31', '2025-08-17 06:28:23', NULL, NULL),
(79, 'Perkasa Prasetyo Prakasa M.M.', '0852 3304 0809', '1978-04-08', 'Ds. Fajar No. 870, Tangerang 41401, Sumbar', 'https://gravatar.com/avatar/ca8931f4886be7c0a9fad4f6530d0521a5700308a86dd4ac715b5f894081ba2c', 'vLCj3rQQjC', 'XelDbuQQ6l', '4422924064955', 'jaiman.widiastuti@gmail.com', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 746, 5304, 7413023, 'Option 1', 'Option 4', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Velit ut facilis ratione possimus sit iusto voluptas. Sit explicabo iusto autem reprehenderit.', 'Option 4', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=79', 'https://picsum.photos/200/300?random=79', '1983-05-31', '12:22:49', '#d201cf', 'Rem quos non labore aliquam. Molestiae occaecati cum sequi at. Nihil nemo explicabo qui amet.', '<html><head><title>Ex quis ad.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">blanditiis</label><input type=\"text\" id=\"username\"><label for=\"password\">aut</label><input type=\"password\" id=\"password\"></form><div class=\"iste\"></div><div id=\"95\"><h2>Earum sit consequuntur repellat autem voluptatem.</h2><i>Aut praesentium officiis.</i><table><thead><tr><th>Minus.</th><th>Voluptas rerum.</th><th>In nihil sunt quia enim.</th><th>Ratione reprehenderit nemo consequatur accusamus.</th><th>Iusto voluptate.</th><th>Vitae.</th></tr></thead><tbody><tr><td>Labore aut expedita quo eveniet corporis non temporibus quis.</td><td>Illum ut illo.</td><td>Et magni.</td><td>Dolores quos perspiciatis vel velit dolor dolores.</td><td>Voluptas ad repellendus culpa aut ipsam.</td><td>Omnis laborum dolores dolores delectus accusantium eligendi consequatur.</td></tr><tr><td>Accusamus reiciendis rerum aut cum iste reprehenderit.</td><td>Sed aperiam numquam voluptates.</td><td>Eius aut debitis molestias dicta sunt non doloribus sed qui.</td><td>A ut voluptatibus laudantium.</td><td>Ut adipisci dolorum.</td><td>Esse qui doloremque reiciendis quam repellendus sunt occaecati et aut ex.</td></tr><tr><td>Excepturi rem laudantium ipsum.</td><td>Similique mollitia sit ullam ex ut ullam occaecati error itaque error.</td><td>Natus itaque temporibus.</td><td>Eaque placeat maiores consectetur inventore explicabo corrupti natus pariatur expedita corrupti autem.</td><td>Et aperiam qui eius nam nihil aut explicabo maxime dolor.</td><td>Ullam consequuntur ducimus est itaque perspiciatis ducimus fuga.</td></tr><tr><td>Repellat quis et iusto.</td><td>Porro voluptatem culpa qui nobis.</td><td>Dolores veritatis.</td><td>Iste adipisci culpa laboriosam.</td><td>Unde est temporibus.</td><td>Explicabo libero sint autem sed sit.</td></tr><tr><td>Tempore laboriosam.</td><td>Accusamus non similique minus enim commodi sint quae.</td><td>Saepe aliquam omnis ut nesciunt sunt tempore est modi.</td><td>Aspernatur vero dicta magni in exercitationem.</td><td>A in rerum doloremque tempora ut perspiciatis exercitationem sapiente esse voluptatibus.</td><td>Deleniti non odio vel minima rerum earum.</td></tr><tr><td>Qui enim porro totam corporis.</td><td>Consequatur odit sed.</td><td>Rerum sunt repudiandae possimus est alias.</td><td>Ea sed earum est labore est architecto.</td><td>Adipisci minima ullam sapiente fugit.</td><td>Quasi repudiandae et sed nobis autem velit et atque eveniet et quia.</td></tr><tr><td>Neque eum sint quo laboriosam odio recusandae architecto rerum et aperiam consectetur.</td><td>Eum aperiam ut.</td><td>Sit ut pariatur.</td><td>Nostrum qui hic corrupti quaerat.</td><td>Nisi cupiditate eos unde optio soluta eligendi natus ipsam ullam eligendi distinctio magni.</td><td>Quia sequi ad cumque qui.</td></tr><tr><td>Iusto quia vero repudiandae quo.</td><td>Tenetur praesentium qui eum dolor rerum aliquam ad.</td><td>Fuga sint et nam sequi aut velit sunt.</td><td>Nemo itaque.</td><td>Dolorem tenetur sed deleniti velit cupiditate dicta ut earum voluptatibus maxime.</td><td>Ipsa ut iusto voluptatem aliquid totam nihil maiores sunt id in quisquam.</td></tr><tr><td>Expedita voluptatibus velit.</td><td>Qui aperiam dignissimos ipsa animi laboriosam distinctio fugiat.</td><td>Qui expedita eius voluptatem nobis.</td><td>Quo quo quia quia sit voluptas ad.</td><td>Blanditiis magni tempore doloremque natus enim dignissimos itaque dolores ut quia incidunt placeat et.</td><td>Voluptatum ad laudantium mollitia magni id repellendus aut et.</td></tr><tr><td>Aspernatur ullam voluptates officiis rerum quis voluptate voluptate sint recusandae optio.</td><td>Molestiae voluptatem.</td><td>Ipsa.</td><td>Beatae molestias maxime qui reiciendis illo est soluta est non eveniet consequatur et.</td><td>Natus laudantium repellat quos aut nesciunt pariatur.</td><td>Est maxime ea quia.</td></tr></tbody></table></div><div class=\"quas\"></div></body></html>\n', '2025-08-29 13:20:29', '2025-08-28 01:43:50', 1, 1),
(80, 'Titi Yolanda', '0247 7761 1945', '1981-08-27', 'Psr. Bhayangkara No. 901, Tegal 65924, Kepri', 'https://gravatar.com/avatar/b63a9f3f54d74705013749bc790270eaf41d5fc0593ea44c51bcbf089aec9881', 'g3lYhbtpZa', 'FKkJlAmoIB', '6614617439715', 'iwahyuni@yahoo.co.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 193, 3919, 2101300, 'Option 7', 'Option 1', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Excepturi possimus sint id et. Quia voluptas sint eum et.', 'Option 3', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=80', 'https://picsum.photos/200/300?random=80', '1971-02-09', '04:15:38', '#654060', 'Ab et qui harum et voluptates. Consequatur et quo consequatur est ea. Nemo nemo similique et nihil.', '<html><head><title>Quae aperiam nihil consequatur iste eligendi delectus autem architecto.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">aut</label><input type=\"text\" id=\"username\"><label for=\"password\">at</label><input type=\"password\" id=\"password\"></form><div class=\"est\"></div><div id=\"4108\">Sunt temporibus numquam ex.<h3>Et voluptate et delectus.</h3><p>Occaecati ad modi cupiditate officiis dolores minus quas accusamus et maxime.</p></div></body></html>\n', '2025-08-24 13:13:16', '2025-08-06 15:51:38', 1, 1),
(81, 'Sidiq Jaeman Waskita S.T.', '(+62) 473 1162 597', '2019-03-27', 'Ki. Urip Sumoharjo No. 295, Mojokerto 66701, Pabar', 'https://gravatar.com/avatar/69e698e587a45fcc829a11458efd17d509f81756fb622a30e2cdb9739179db3d', 'Hgce6Apfgg', '8WcFJRYo63', '1727611649846', 'usamah.gading@saputra.sch.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 503, 1809, 6225662, 'Option 6', 'Option 1', '[\"Option 1\",\"Option 2\"]', 'Voluptas temporibus est id mollitia voluptas esse. Dignissimos aut in sit velit.', 'Option 4', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=81', 'https://picsum.photos/200/300?random=81', '1983-09-15', '12:20:23', '#98021f', 'Atque perspiciatis sit mollitia officiis pariatur ut alias odit. Qui commodi placeat in.', '<html><head><title>Et quod aperiam illo ut quia.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">dignissimos</label><input type=\"text\" id=\"username\"><label for=\"password\">voluptas</label><input type=\"password\" id=\"password\"></form><div id=\"64148\"></div><div class=\"consequatur\"><i>Ad nihil nulla sed aliquam ullam.</i></div><div class=\"et\"><h2>Laudantium dolorem voluptatem dolor omnis.</h2><span>Modi adipisci minus at.</span></div><div class=\"et\"><span>Unde.</span>Aliquid voluptas vel vel non explicabo deserunt qui eum esse esse praesentium accusantium.<ul><li>Aut.</li><li>Quae.</li><li>Eaque voluptatem voluptatem.</li><li>Earum labore.</li><li>Porro blanditiis facere.</li><li>Voluptas numquam sapiente facilis id.</li></ul></div></body></html>\n', '2025-08-14 01:55:52', '2025-08-08 01:24:24', NULL, 1),
(82, 'Puput Raisa Namaga', '(+62) 497 8133 8265', '2008-04-29', 'Jln. Bayam No. 570, Pematangsiantar 96402, Sulteng', 'https://gravatar.com/avatar/492a6ca3042b1f634734886ff842815b086bfebb775cc046424ff41fae2dc9a6', 'uuuwtGCO2m', 'QPxBbzGfGj', '4414418397458', 'pagustina@siregar.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 773, 5293, 8642481, 'Option 10', 'Option 10', '[\"Option 1\",\"Option 2\"]', 'Illum aut nostrum voluptas. Eveniet quo totam maxime animi. Animi et magni vel rem cupiditate.', 'Option 3', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=82', 'https://picsum.photos/200/300?random=82', '1982-05-20', '12:47:17', '#229a65', 'Voluptas quidem eum dolorem praesentium debitis. Nulla ratione pariatur est aperiam.', '<html><head><title>Repudiandae aut ea possimus velit omnis fugiat.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">quam</label><input type=\"text\" id=\"username\"><label for=\"password\">dolorum</label><input type=\"password\" id=\"password\"></form><div id=\"85491\"><ul><li>Atque quod.</li><li>Expedita occaecati debitis laudantium.</li><li>Exercitationem praesentium.</li><li>Et alias sit.</li><li>Et vel.</li><li>Modi consequuntur omnis ad.</li><li>Officiis commodi praesentium dolorum.</li><li>Vero.</li></ul></div><div id=\"24045\"></div><div id=\"84915\"><div id=\"25622\"></div><div id=\"25395\"></div><div class=\"ea\"><i>Sed assumenda praesentium laboriosam a voluptatem eligendi.</i><h1>Quam dolorum reiciendis ullam et architecto facilis occaecati cumque laborum harum.</h1><ul><li>Qui corporis expedita voluptatem aut.</li><li>Ea totam quidem quibusdam laboriosam.</li></ul></div><div id=\"93612\"><span>Vel esse iure nihil ipsum molestiae et.</span></div></div></body></html>\n', '2025-08-12 08:18:45', '2025-08-17 02:22:13', NULL, 1),
(83, 'Sakura Intan Pertiwi', '(+62) 535 4843 2040', '2004-08-31', 'Jr. Kalimalang No. 734, Tarakan 82726, Sumbar', 'https://gravatar.com/avatar/6086615e0adc4406f6758469b62abb72a7b04d94054b89e218ecf1f857214d5d', 'MYLnNu5AeP', 'aYkjbFfOg9', '6972682113504', 'uyainah.hasan@hastuti.co.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 549, 4089, 5283610, 'Option 10', 'Option 3', '[\"Option 1\",\"Option 2\"]', 'Recusandae voluptatem ut maiores. Nobis facere voluptas dicta nihil ipsum ipsum.', 'Option 3', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=83', 'https://picsum.photos/200/300?random=83', '1999-04-01', '15:41:13', '#34a67f', 'Esse a consequuntur voluptates in. Eos aliquam praesentium ut repellendus error.', '<html><head><title>Dolores.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">quos</label><input type=\"text\" id=\"username\"><label for=\"password\">veniam</label><input type=\"password\" id=\"password\"></form><div id=\"63462\"><div id=\"28018\"></div><div id=\"17154\"></div><div class=\"inventore\"></div></div><div id=\"32152\"></div><div class=\"illum\"><p>Omnis reprehenderit quis non qui ad ut id ex aliquam molestiae.</p><a href=\"example.org\">Quibusdam aspernatur perferendis aut rerum eos eaque modi dolores nemo ratione ea molestiae temporibus.</a><h2>Eius aut quia quia nesciunt voluptates et et autem magnam enim.</h2></div><div id=\"72415\"><table><thead><tr><th>Beatae aperiam doloremque assumenda ut.</th></tr></thead><tbody><tr><td>Facilis repellendus mollitia laudantium aut velit similique.</td></tr><tr><td>Et repellendus impedit illum.</td></tr><tr><td>Eum praesentium tempore quia.</td></tr><tr><td>Voluptatem voluptas tempora modi cumque temporibus provident minus voluptatem adipisci itaque soluta.</td></tr><tr><td>Beatae similique quod debitis nam ipsa qui.</td></tr></tbody></table>Omnis quae autem ut ducimus eos reiciendis.<i>Quo similique et.</i></div></body></html>\n', '2025-08-29 09:12:42', '2025-08-11 01:00:44', 1, NULL),
(84, 'Digdaya Pratama', '(+62) 878 2908 9803', '1986-10-09', 'Kpg. Padang No. 554, Blitar 66432, Jambi', 'https://gravatar.com/avatar/9e655fc8c3e3f0f764e70fa4960f53caf0a595ca8b036bd5c507c47afa18bfc5', 'jLqK5FSSfX', 'LaIV6Dly5r', '7505651090033', 'fmayasari@melani.mil.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 495, 7987, 9600256, 'Option 7', 'Option 3', '[\"Option 1\",\"Option 2\"]', 'Saepe ex quasi iure sit. Rerum quo vero rerum qui. Est veniam sint corrupti iusto.', 'Option 1', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=84', 'https://picsum.photos/200/300?random=84', '2011-08-20', '23:40:04', '#ac0188', 'Quaerat aut quae nihil voluptas iste. Nemo quam iusto qui aperiam corrupti est.', '<html><head><title>Debitis sed a et exercitationem autem ratione molestiae eius esse et et.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">non</label><input type=\"text\" id=\"username\"><label for=\"password\">doloribus</label><input type=\"password\" id=\"password\"></form><div class=\"eaque\"></div></body></html>\n', '2025-08-06 23:30:29', '2025-09-01 17:29:32', NULL, 1),
(85, 'Wani Gabriella Uyainah M.Ak', '0972 1997 124', '2012-08-31', 'Gg. Thamrin No. 594, Sorong 25670, DKI', 'https://gravatar.com/avatar/6066e0ac7df20c7ed2d21c7e2961d547d2846cb6e03ca188ef2f37e620f53000', 'mzGIEVowQm', '89kUhKeSn4', '7153344181652', 'karen.rahayu@pratiwi.or.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 780, 3291, 369395, 'Option 1', 'Option 2', '[\"Option 1\",\"Option 2\"]', 'Dolores enim autem non nisi at. Perspiciatis rem ut fugit illo. Est deserunt qui nulla ea.', 'Option 3', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=85', 'https://picsum.photos/200/300?random=85', '2023-09-29', '13:55:00', '#9fa5a0', 'Deleniti quas consequatur aut ut rerum. Sit delectus nihil delectus eaque exercitationem.', '<html><head><title>Et alias debitis ut error.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">aspernatur</label><input type=\"text\" id=\"username\"><label for=\"password\">quia</label><input type=\"password\" id=\"password\"></form><div id=\"83900\"></div><div class=\"reiciendis\"></div><div class=\"et\"></div><div class=\"laboriosam\"><div class=\"omnis\"></div><div class=\"aut\"></div><div class=\"consequuntur\"></div><div id=\"31614\"></div></div></body></html>\n', '2025-08-13 23:10:58', '2025-08-08 19:08:02', NULL, 1),
(86, 'Ibrahim Ardianto', '(+62) 971 7963 704', '1986-10-27', 'Ki. Karel S. Tubun No. 922, Padangsidempuan 90496, Sulbar', 'https://gravatar.com/avatar/edc1077985a99d7e842db76bf152565106efdfc2d34fd46fb9d556ef02bcd104', 'Yka8Ufp7ix', 'dmMS4vqj2S', '8750193529094', 'hariyah.sarah@gmail.co.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 769, 7596, 3680364, 'Option 6', 'Option 7', '[\"Option 1\",\"Option 2\"]', 'Accusamus sint quibusdam omnis. Dolore voluptatem veritatis at ut.', 'Option 4', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=86', 'https://picsum.photos/200/300?random=86', '2023-01-17', '05:56:27', '#4cbca8', 'Aliquam facilis quaerat molestiae a necessitatibus maxime. Nulla rerum possimus adipisci excepturi.', '<html><head><title>Et aut ipsa.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">provident</label><input type=\"text\" id=\"username\"><label for=\"password\">voluptas</label><input type=\"password\" id=\"password\"></form><div id=\"42489\"><div id=\"35716\"></div><div class=\"molestiae\"></div><div class=\"enim\"><p>Quidem eum facilis illo dolores aut illo possimus ut.</p><p>Placeat quis quia quia aut quia assumenda.</p></div><div class=\"ipsam\"></div></div><div id=\"32539\"><a href=\"example.org\">Sunt tempora aut aperiam quo sequi reprehenderit repellat libero iusto voluptatem.</a><h2>Autem voluptate ut consectetur autem cumque et.</h2><b>Ullam deleniti.</b></div></body></html>\n', '2025-08-15 13:04:52', '2025-08-20 17:12:10', 1, NULL),
(87, 'Padma Yunita Hassanah', '(+62) 332 3093 252', '1989-05-17', 'Jr. Bak Mandi No. 305, Mataram 85487, Sulteng', 'https://gravatar.com/avatar/e786b223dc56876e5e0aa7031cffecbf31735678caf2c6bb69f33e766013c04f', 'qiRPrE2KZb', 'c5lmfRGn6l', '3444393839750', 'nlaksmiwati@yahoo.co.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 620, 8950, 350876, 'Option 9', 'Option 5', '[\"Option 1\"]', 'Est sint ipsam debitis et cumque quam dolore. Totam distinctio animi quae. Qui vero est illum vel.', 'Option 3', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=87', 'https://picsum.photos/200/300?random=87', '1996-11-05', '16:56:01', '#2a024c', 'Commodi ea omnis illum labore. Temporibus eaque accusantium autem.', '<html><head><title>Suscipit enim optio non.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">reprehenderit</label><input type=\"text\" id=\"username\"><label for=\"password\">qui</label><input type=\"password\" id=\"password\"></form><div class=\"eaque\"><a href=\"example.org\">Quis consequatur laborum sed dolor itaque.</a><p>Magnam aut quasi odio corrupti cupiditate eum dolore non sit.</p></div><div id=\"9717\"></div><div class=\"quasi\"><div class=\"sed\"><table><thead><tr><th>Qui totam saepe modi.</th><th>Qui officiis nihil.</th></tr></thead><tbody><tr><td>Provident qui voluptatibus iusto consectetur autem.</td><td>Debitis aut maxime dolorum.</td></tr><tr><td>Quibusdam sit.</td><td>Eos.</td></tr><tr><td>Itaque enim aspernatur non sed est.</td><td>Voluptatem quam dolorum eius.</td></tr><tr><td>Excepturi quae consequatur molestias eius.</td><td>Est eum cum dolor quis rerum fugit.</td></tr><tr><td>Ut.</td><td>Asperiores non inventore fugiat iste.</td></tr><tr><td>Labore laboriosam quis hic accusantium aut aut saepe.</td><td>Ab molestias voluptatem.</td></tr><tr><td>Aut nihil molestias.</td><td>Dolor et eligendi enim dolor quasi.</td></tr></tbody></table></div><div id=\"77780\"></div></div><div class=\"a\"></div></body></html>\n', '2025-08-23 18:03:50', '2025-08-25 15:43:23', 1, 1),
(88, 'Najwa Permata', '0750 3742 4442', '2018-05-06', 'Dk. HOS. Cjokroaminoto (Pasirkaliki) No. 969, Mojokerto 21468, Pabar', 'https://gravatar.com/avatar/367571f804a3e31c9045ddf4cb886aede11be1ad0137bc5968307866564f7942', 'EgqCW6A0ws', '6CvWI5R2kE', '9109938498598', 'padmi.uyainah@yahoo.co.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 587, 1946, 9157581, 'Option 1', 'Option 3', '[\"Option 1\"]', 'Quibusdam et quia facilis. Quia maxime est omnis. Non sed quisquam fugit beatae.', 'Option 2', '[\"Option 1\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=88', 'https://picsum.photos/200/300?random=88', '2008-06-01', '16:23:48', '#edd5ad', 'Adipisci consequuntur est est esse. Vitae odit aperiam unde consequuntur rerum rerum.', '<html><head><title>Dolor quia consequuntur laborum voluptatibus.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">non</label><input type=\"text\" id=\"username\"><label for=\"password\">sed</label><input type=\"password\" id=\"password\"></form><div id=\"27333\"></div><div id=\"34733\"></div><div class=\"inventore\"></div></body></html>\n', '2025-08-30 07:51:39', '2025-08-19 08:22:32', NULL, NULL),
(89, 'Parman Hutagalung', '024 5072 6875', '1987-08-14', 'Gg. Raden No. 62, Medan 28657, Sumsel', 'https://gravatar.com/avatar/783d86dcaf484e7d9fa331a8ff61581d9518f01b695ac21c2171652135031223', 'gppodXQVAk', 'HJbPZCBCbO', '3437002366518', 'laksmiwati.aurora@sitorus.in', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 551, 7550, 629861, 'Option 6', 'Option 9', '[\"Option 1\"]', 'Consequatur suscipit eligendi ex. Asperiores error inventore amet aspernatur quod.', 'Option 2', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=89', 'https://picsum.photos/200/300?random=89', '2002-01-16', '17:40:08', '#a8e2b2', 'Quis sapiente temporibus et accusamus deserunt. Ea nobis animi veniam sit aperiam recusandae.', '<html><head><title>Similique sint delectus corporis voluptatem maxime est explicabo.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">praesentium</label><input type=\"text\" id=\"username\"><label for=\"password\">delectus</label><input type=\"password\" id=\"password\"></form><div class=\"aut\"></div><div id=\"84336\"><ul><li>Nihil ratione quo dolores.</li></ul><p>Voluptatibus recusandae ut iste dolor mollitia repellendus.</p>Voluptatibus voluptas ea.<b>Nobis repudiandae.</b></div><div class=\"sed\"></div></body></html>\n', '2025-08-12 10:47:22', '2025-08-25 06:22:07', 1, 1),
(90, 'Embuh Jati Utama', '(+62) 916 1183 653', '1986-08-20', 'Jr. Basuki Rahmat  No. 637, Malang 34241, Bengkulu', 'https://gravatar.com/avatar/7ad166b2826503c1d630d5c614d2f21e5d22cea3ce6f76a627b7bc9fd3a8dddc', 'qHpDL4lPs7', 'IM4OWovXkG', '7920459740599', 'putri91@yuliarti.info', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 962, 4687, 3386407, 'Option 7', 'Option 9', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Nihil autem doloribus ut enim. Ullam aut explicabo et voluptatem in.', 'Option 3', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=90', 'https://picsum.photos/200/300?random=90', '2006-09-18', '02:17:26', '#eed1e8', 'Dolores nihil illo temporibus hic quis. Consequatur nemo facilis aliquid exercitationem.', '<html><head><title>In mollitia.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">autem</label><input type=\"text\" id=\"username\"><label for=\"password\">deleniti</label><input type=\"password\" id=\"password\"></form><div class=\"exercitationem\"></div><div id=\"74322\"></div></body></html>\n', '2025-08-14 15:33:31', '2025-08-11 19:39:48', 1, NULL),
(91, 'Kemba Kacung Tarihoran S.Pt', '0563 4139 8273', '2020-01-31', 'Jr. Lada No. 600, Cirebon 84310, Jambi', 'https://gravatar.com/avatar/6368aab58866c6e2e835f56fb0b61693b821ce374dfd3c685ce3cf8d7002ab61', 'F69OkNYjIk', 'K27FMANlLe', '8170257946108', 'lmandasari@gmail.co.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 387, 5786, 9834913, 'Option 8', 'Option 5', '[\"Option 1\"]', 'Dolores sed vitae odit neque omnis inventore quisquam. Aut neque vero nulla ab hic autem aperiam.', 'Option 4', '[\"Option 1\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=91', 'https://picsum.photos/200/300?random=91', '1991-05-02', '17:39:09', '#fac791', 'Omnis modi itaque quia sit voluptates animi. Consequatur tempora omnis quos aut.', '<html><head><title>Quos eos non quia in et vel.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">voluptas</label><input type=\"text\" id=\"username\"><label for=\"password\">hic</label><input type=\"password\" id=\"password\"></form><div class=\"ut\"></div><div id=\"61617\"></div><div id=\"67198\"></div><div class=\"ad\"><p>Ut omnis dolores quo.</p><h1>Quia aliquid.</h1></div></body></html>\n', '2025-08-19 13:54:04', '2025-08-20 12:41:59', 1, NULL),
(92, 'Wasis Maulana S.T.', '(+62) 594 8569 4731', '1993-08-28', 'Jr. Reksoninten No. 49, Sungai Penuh 14921, Jabar', 'https://gravatar.com/avatar/1718144cc68d3092f0c3a0187704e2d3af00edd327e0af6ce82e1407b1426b16', '2FF8iIc4Yc', '0DRUhSxkwv', '3721934747805', 'yuliarti.titi@yahoo.com', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 480, 2135, 136489, 'Option 8', 'Option 3', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Nostrum quisquam est nihil aut corrupti. Nam numquam et et ratione odit.', 'Option 2', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=92', 'https://picsum.photos/200/300?random=92', '1973-12-21', '05:02:42', '#5b7c92', 'Aut ipsa sunt tempora quod. Qui delectus quas minima non temporibus maiores. Qui et qui minus est.', '<html><head><title>Atque nemo dicta et eius quo praesentium nobis quia impedit quidem.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">est</label><input type=\"text\" id=\"username\"><label for=\"password\">deserunt</label><input type=\"password\" id=\"password\"></form><div class=\"quis\"></div><div id=\"13888\"><div id=\"22456\"></div></div><div id=\"38316\"><div id=\"2130\"></div><div id=\"87028\"><i>Perspiciatis voluptates quo sint ex.</i><h3>Culpa rerum beatae.</h3>Quo inventore veritatis amet quisquam aspernatur eius ut.Eius velit.</div></div></body></html>\n', '2025-08-04 00:07:35', '2025-08-26 04:14:21', NULL, NULL),
(93, 'Ulya Puspasari', '(+62) 943 7396 075', '2021-12-12', 'Ki. Bagonwoto  No. 684, Solok 37213, Kalbar', 'https://gravatar.com/avatar/ecea540e5d8e1f52bc8fc4316864bfac402704ffac1841a1fe5dc83f40e610f8', 'ehbxlKv8an', '3cRl1LdspN', '7478485722466', 'wzulaika@yahoo.co.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 419, 5915, 3627508, 'Option 8', 'Option 1', '[\"Option 1\"]', 'Et esse vel explicabo qui aut. Et molestias aliquam consequatur quo qui.', 'Option 1', '[\"Option 1\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=93', 'https://picsum.photos/200/300?random=93', '1987-03-28', '11:56:33', '#3f7bc3', 'Libero ut magnam rem veritatis. Molestiae magnam similique dicta saepe non aut maxime.', '<html><head><title>Aut qui eius explicabo quia laudantium.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">numquam</label><input type=\"text\" id=\"username\"><label for=\"password\">et</label><input type=\"password\" id=\"password\"></form><div class=\"omnis\"></div></body></html>\n', '2025-08-04 09:43:54', '2025-08-08 02:08:01', NULL, NULL),
(94, 'Nurul Uyainah', '0991 5531 3719', '1993-10-23', 'Psr. Ki Hajar Dewantara No. 577, Banda Aceh 72210, Banten', 'https://gravatar.com/avatar/7d83a417fd605ae8371a3d35a63f8859027d0bb9802b66a9e643c4d0187c78fa', 'Wz9xb4LKr8', 'QoUcuu8Z0J', '3000726263731', 'hartati.kamila@permadi.mil.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 250, 9492, 2768094, 'Option 8', 'Option 6', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Qui sequi ratione qui quidem. Maxime quod laudantium explicabo sed delectus odit.', 'Option 2', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=94', 'https://picsum.photos/200/300?random=94', '2010-04-21', '02:47:43', '#b66c36', 'Id beatae sint est eaque. Odio amet voluptatem omnis qui qui. Dolorum ea sunt quis ad.', '<html><head><title>Et.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">officia</label><input type=\"text\" id=\"username\"><label for=\"password\">excepturi</label><input type=\"password\" id=\"password\"></form><div class=\"accusamus\"></div><div class=\"aut\"></div><div class=\"nobis\"></div><div id=\"1055\"><h1>Voluptatibus corrupti ea vel nemo.</h1><i>Perferendis architecto consequatur repudiandae aut rerum.</i></div></body></html>\n', '2025-08-23 17:03:06', '2025-08-09 11:03:47', NULL, 1),
(95, 'Lanang Nainggolan', '(+62) 435 8651 4421', '2009-08-02', 'Ds. Salatiga No. 143, Administrasi Jakarta Selatan 18535, Jatim', 'https://gravatar.com/avatar/f239717ad52ee753e5ba1ab047186522c9223a351b4a5634e8f98409130f1ed5', 'FS3sebOwVN', 'PnutM791UA', '6019900250266', 'wprasetyo@rahayu.biz', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 263, 4393, 6859436, 'Option 8', 'Option 10', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Ea eos sequi et incidunt. Assumenda aliquid earum enim voluptatibus eos autem culpa.', 'Option 1', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=95', 'https://picsum.photos/200/300?random=95', '2001-03-09', '18:29:15', '#d2c74e', 'Temporibus dolor praesentium voluptates voluptas. Quos animi soluta id aut vero ut.', '<html><head><title>Est dolor quod eum et perferendis et reiciendis.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">adipisci</label><input type=\"text\" id=\"username\"><label for=\"password\">et</label><input type=\"password\" id=\"password\"></form><div id=\"42004\"></div><div class=\"non\"><div class=\"voluptas\"><span>Impedit sapiente rerum in est.</span><a href=\"example.com\">Reiciendis est.</a><span>Sint et natus qui.</span><i>Sunt unde tempore error et facere delectus aut sit ipsum laborum commodi.</i></div></div><div class=\"dolorem\"><table><thead><tr><th>Omnis quo consequatur.</th></tr></thead><tbody><tr><td>Architecto voluptatem provident porro dolorum est ullam et consequatur expedita sit sit.</td></tr><tr><td>Iusto et ab tempora.</td></tr><tr><td>Commodi deserunt.</td></tr><tr><td>Non dolore quia.</td></tr><tr><td>Temporibus quidem veniam esse ab ipsa ea consequatur enim.</td></tr></tbody></table><ul><li>Ut.</li><li>Et et eaque.</li><li>Ut.</li><li>Aut asperiores.</li><li>Quis et.</li><li>Veritatis voluptatem.</li></ul></div></body></html>\n', '2025-08-22 03:48:27', '2025-08-31 18:01:42', NULL, NULL),
(96, 'Clara Hassanah', '0381 3257 820', '1983-01-10', 'Dk. Babadan No. 411, Tangerang Selatan 10061, Maluku', 'https://gravatar.com/avatar/c91d1d81b72c2d4cc1d30cd387b22d4bc4673f580b2bce4f3b3a8d418457fa67', 'QBaYm0QYP8', 'sKjcinq0FA', '1457635940291', 'prahayu@yahoo.co.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 101, 564, 781626, 'Option 2', 'Option 3', '[\"Option 1\",\"Option 2\"]', 'Placeat iusto iste porro rerum. Sed ducimus voluptatum ipsa nam est. Qui nobis modi voluptate.', 'Option 4', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=96', 'https://picsum.photos/200/300?random=96', '1972-05-13', '23:01:13', '#51919b', 'Omnis autem ullam est culpa rerum similique. Beatae excepturi repellendus illo qui consectetur qui.', '<html><head><title>Quasi in rerum.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">repudiandae</label><input type=\"text\" id=\"username\"><label for=\"password\">atque</label><input type=\"password\" id=\"password\"></form><div id=\"83878\"></div></body></html>\n', '2025-08-07 00:34:49', '2025-08-31 16:09:26', NULL, NULL),
(97, 'Perkasa Tarihoran', '(+62) 409 9929 1939', '2011-04-22', 'Gg. Salatiga No. 971, Pekanbaru 14923, Aceh', 'https://gravatar.com/avatar/9c3c6e9486e4a1a6d013c2b2093b7ab37d93b4ed9ead13de220965acf8f9d5c9', 'wC7CYMiMF6', 'epzkP2Az0I', '3834078254747', 'kusmawati.yunita@rajasa.info', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 747, 552, 6865829, 'Option 5', 'Option 8', '[\"Option 1\"]', 'Commodi totam qui eligendi maxime odio. Veritatis sequi repellendus voluptate rerum et quaerat.', 'Option 3', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=97', 'https://picsum.photos/200/300?random=97', '1999-05-31', '06:34:54', '#ca5902', 'Quisquam illo ea repudiandae. Rerum et atque quod. Recusandae omnis voluptatum aut velit.', '<html><head><title>Et aspernatur deleniti dolorem qui.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">molestiae</label><input type=\"text\" id=\"username\"><label for=\"password\">qui</label><input type=\"password\" id=\"password\"></form><div class=\"beatae\"></div></body></html>\n', '2025-08-19 08:33:15', '2025-08-15 02:21:09', 1, 1),
(98, 'Jatmiko Budiman', '0798 7373 993', '1999-07-04', 'Jln. Rajawali Timur No. 2, Sabang 36378, Kalteng', 'https://gravatar.com/avatar/4d978ddec4260eda2f75befd4f4cda1ad1880199e6fa2d6bc0d9e91743fdfbae', 'lIEdh55Vu9', 'mfJfQvKtHM', '7855036290184', 'teddy.salahudin@yahoo.com', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 834, 4612, 8113476, 'Option 3', 'Option 7', '[\"Option 1\",\"Option 2\"]', 'Aut neque sequi commodi. Deserunt expedita qui eum maiores soluta distinctio autem.', 'Option 4', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=98', 'https://picsum.photos/200/300?random=98', '2025-08-26', '02:20:27', '#2161b7', 'Voluptatem omnis non fuga libero ad ut. Sed porro ab ullam non id. Tenetur est nobis amet.', '<html><head><title>Aut deleniti atque illo sequi placeat.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">earum</label><input type=\"text\" id=\"username\"><label for=\"password\">velit</label><input type=\"password\" id=\"password\"></form><div class=\"voluptatibus\"><p>Facilis tempora eaque fugiat.</p>Perferendis sit tempore quo aspernatur sint debitis eum cupiditate aut dignissimos.</div></body></html>\n', '2025-08-06 02:30:11', '2025-08-20 21:21:29', 1, 1),
(99, 'Uli Hasanah S.T.', '(+62) 853 1585 6574', '2021-07-23', 'Kpg. Pahlawan No. 342, Bengkulu 13045, Kaltim', 'https://gravatar.com/avatar/0158b680dd78b558133c2bbca863e12050f75d4ca6d7cbbc4ab9b094069c1a89', 'NNOUPHLSuD', 'uw09hVYK6i', '3062091873373', 'paramita10@marpaung.web.id', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 196, 829, 5266346, 'Option 4', 'Option 1', '[\"Option 1\",\"Option 2\"]', 'Minus asperiores est tempore sed deserunt. Molestiae sit porro voluptatum vitae.', 'Option 2', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=99', 'https://picsum.photos/200/300?random=99', '1995-01-27', '08:17:25', '#14d730', 'Occaecati quam id labore nostrum. Qui unde quo dolores consequuntur. Ea deleniti voluptas aliquam.', '<html><head><title>Et ut reiciendis hic.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">voluptatibus</label><input type=\"text\" id=\"username\"><label for=\"password\">quia</label><input type=\"password\" id=\"password\"></form><div id=\"21484\"></div></body></html>\n', '2025-08-24 22:59:34', '2025-08-08 07:45:53', 1, 1),
(100, 'Ade Yuniar', '0674 4414 2182', '2009-11-18', 'Gg. Sadang Serang No. 194, Administrasi Jakarta Utara 34686, Kalbar', 'https://gravatar.com/avatar/8d2da468f95c4021a5ec037013818af80b817a83df36fe5f890e974ba6b59534', 'CzvPNSE59l', 'W7XRPlc0UI', '8079015075114', 'wakiman56@wibowo.com', '$2y$12$klqa6dXaUSarYQqH8yyDDO0LEfRnuzaxk2mFuS/E36ZbtM/UbDane', 452, 8058, 1306539, 'Option 8', 'Option 10', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Esse itaque dolorem adipisci ut. Ratione consequatur est minima nulla et totam ab.', 'Option 4', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=100', 'https://picsum.photos/200/300?random=100', '1978-08-16', '01:59:59', '#f2def0', 'Quaerat dolore et fugiat ea maiores aliquid veritatis. Non eos est cumque dolore.', '<html><head><title>Tempora labore voluptatem placeat incidunt et excepturi nam.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">repellendus</label><input type=\"text\" id=\"username\"><label for=\"password\">corrupti</label><input type=\"password\" id=\"password\"></form><div class=\"maxime\"></div><div class=\"ut\"><ul><li>Ut.</li><li>Ipsa et.</li><li>Qui excepturi.</li></ul><i>Aut sed.</i></div></body></html>\n', '2025-08-30 21:58:51', '2025-08-25 21:11:12', 1, 1),
(101, 'anam test', 'anam test', '2023-01-01', 'anam test textarea', 'http://127.0.0.1:8000/storage/crud-examples/20250902214326_iIbrNKdi1MUPTacN3EzZ.png', 'anam test', 'anam test', 'anam test', 'anam@test.com', '$2y$12$3IJnLAmXAZqUQE8iocpvIuetx4bOe6OjKiYWcBeB/Ef16EoOOJPYG', 1000, 1000, 1000, 'Option 10', 'Option 10', '[\"Option 10\"]', 'anam test textarea', 'Option 4', '[\"Option 1\",\"Option 2\",\"Option 3\",\"Option 4\",\"Option 5\"]', '[\"Option 1\",\"Option 2\",\"Option 3\",\"Option 4\",\"Option 5\"]', 'anam test', 'http://127.0.0.1:8000/storage/crud-examples/20250902214326_bHmfZpozxUJN3SDxxjPk.pdf', 'http://127.0.0.1:8000/storage/crud-examples/20250902214326_LjKPW4QRvhnpiwjpVgI9.png', '2023-01-01', '12:00:00', '#ff0000', '<h1>Hello Summernote!</h1><p>This is some content.</p>', '<h1>Hello Summernote!</h1><p>This is some content.</p>', '2025-09-02 14:43:27', '2025-09-02 14:43:27', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `last_updated_by_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `name`, `created_at`, `updated_at`, `created_by_id`, `last_updated_by_id`) VALUES
(1, 'Fakultas Ekonomi dan Bisnis', '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(2, 'Fakultas Hukum', '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(3, 'Fakultas Ilmu Sosial dan Ilmu Politik', '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(4, 'Fakultas Ilmu Budaya', '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(5, 'Fakultas Psikologi', '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(6, 'Fakultas Ilmu Administrasi', '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(7, 'Fakultas Keguruan dan Ilmu Pendidikan', '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(8, 'Fakultas Sains dan Teknologi', '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(9, 'Fakultas Teknik', '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(10, 'Fakultas Ilmu Komputer', '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(11, 'Fakultas Pertanian', '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(12, 'Fakultas Kedokteran', '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(13, 'Fakultas Kesehatan Masyarakat', '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(14, 'Fakultas Kedokteran Gigi', '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(15, 'Fakultas Kedokteran Hewan', '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(16, 'Fakultas Teknologi Pertanian', '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(17, 'Fakultas Perikanan dan Ilmu Kelautan', '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(18, 'Fakultas Peternakan', '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(19, 'Fakultas Kehutanan', '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(20, 'Fakultas Seni Rupa dan Desain', '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(21, 'Fakultas Ilmu Keolahragaan', '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(22, 'Fakultas Ilmu Komunikasi', '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(23, 'Fakultas Pariwisata', '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(24, 'Fakultas Filsafat', '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(25, 'Fakultas Vokasi', '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL);

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log_requests`
--

CREATE TABLE `log_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uri` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `query_string` longtext COLLATE utf8mb4_unicode_ci,
  `method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_data` longtext COLLATE utf8mb4_unicode_ci,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `roles` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'history roles',
  `browser` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `platform` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_ajax` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log_requests`
--

INSERT INTO `log_requests` (`id`, `uri`, `query_string`, `method`, `request_data`, `ip`, `user_agent`, `user_id`, `roles`, `browser`, `platform`, `device`, `is_ajax`, `created_at`, `updated_at`) VALUES
(1, 'crud-examples', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:12:12', '2025-09-02 14:12:12'),
(2, 'crud-examples/create', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:12:35', '2025-09-02 14:12:35'),
(3, 'crud-examples/create', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:16:12', '2025-09-02 14:16:12'),
(4, 'crud-examples/create', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:16:45', '2025-09-02 14:16:45'),
(5, 'crud-examples/create', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:19:37', '2025-09-02 14:19:37'),
(6, 'crud-examples/create', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:20:23', '2025-09-02 14:20:23'),
(7, 'crud-examples/create', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:21:55', '2025-09-02 14:21:55'),
(8, 'crud-examples/create', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:22:09', '2025-09-02 14:22:09'),
(9, 'crud-examples/create', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:22:43', '2025-09-02 14:22:43'),
(10, 'crud-examples/create', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:23:29', '2025-09-02 14:23:29'),
(11, 'crud-examples/create', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:25:22', '2025-09-02 14:25:22'),
(12, 'crud-examples/create', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:25:24', '2025-09-02 14:25:24'),
(13, 'crud-examples/create', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:26:08', '2025-09-02 14:26:08'),
(14, 'crud-examples/create', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:26:19', '2025-09-02 14:26:19'),
(15, 'crud-examples/create', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:27:39', '2025-09-02 14:27:39'),
(16, 'crud-examples/create', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:27:49', '2025-09-02 14:27:49'),
(17, 'crud-examples/create', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:30:04', '2025-09-02 14:30:04'),
(18, 'crud-examples/create', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:31:13', '2025-09-02 14:31:13'),
(19, 'crud-examples/create', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:31:59', '2025-09-02 14:31:59'),
(20, 'crud-examples/create', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:35:44', '2025-09-02 14:35:44'),
(21, 'crud-examples/create', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:36:04', '2025-09-02 14:36:04'),
(22, 'crud-examples/create', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:36:28', '2025-09-02 14:36:28'),
(23, 'crud-examples/create', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:36:32', '2025-09-02 14:36:32'),
(24, 'crud-examples/create', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:37:19', '2025-09-02 14:37:19'),
(25, 'crud-examples/create', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:37:27', '2025-09-02 14:37:27'),
(26, 'crud-examples/create', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:38:20', '2025-09-02 14:38:20'),
(27, 'crud-examples/create', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:38:55', '2025-09-02 14:38:55'),
(28, 'crud-examples/create', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:40:15', '2025-09-02 14:40:15'),
(29, 'crud-examples/create', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:41:29', '2025-09-02 14:41:29'),
(30, 'crud-examples/create', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:42:46', '2025-09-02 14:42:46'),
(31, 'crud-examples/create', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:42:55', '2025-09-02 14:42:55'),
(32, 'crud-examples', NULL, 'POST', '{\"_token\":\"L31Qkt2z4MqMChCgD3tpH7kZsH5Ky6qcmInENkDL\",\"name\":\"anam test\",\"phone_number\":\"anam test\",\"birthdate\":\"2023-01-01\",\"address\":\"anam test textarea\",\"text\":\"anam test\",\"barcode\":\"anam test\",\"qr_code\":\"anam test\",\"email\":\"anam@test.com\",\"password\":\"anam test\",\"number\":\"1000\",\"currency\":\"1000\",\"currency_idr\":\"1000\",\"select\":\"Option 10\",\"select2\":\"Option 10\",\"select2_multiple\":[\"Option 10\"],\"tags\":\"anam test\",\"radio\":\"Option 4\",\"checkbox\":[\"Option 1\",\"Option 2\",\"Option 3\",\"Option 4\",\"Option 5\"],\"checkbox2\":[\"Option 1\",\"Option 2\",\"Option 3\",\"Option 4\",\"Option 5\"],\"date\":\"2023-01-01\",\"time\":\"12:00\",\"color\":\"#ff0000\",\"textarea\":\"anam test textarea\",\"summernote_simple\":\"<h1>Hello Summernote!<\\/h1><p>This is some content.<\\/p>\",\"summernote\":\"<h1>Hello Summernote!<\\/h1><p>This is some content.<\\/p>\",\"avatar\":{},\"file\":{},\"image\":{}}', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:43:26', '2025-09-02 14:43:26'),
(33, 'crud-examples/create', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:43:27', '2025-09-02 14:43:27'),
(34, 'crud-examples', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:43:30', '2025-09-02 14:43:30'),
(35, 'crud-examples/pdf', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:43:50', '2025-09-02 14:43:50'),
(36, 'crud-examples/101', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:44:07', '2025-09-02 14:44:07'),
(37, 'crud-examples', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:45:04', '2025-09-02 14:45:04'),
(38, 'crud-examples', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:48:02', '2025-09-02 14:48:02'),
(39, 'crud-examples/create', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:48:17', '2025-09-02 14:48:17'),
(40, 'crud-examples', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:48:26', '2025-09-02 14:48:26'),
(41, 'crud-examples', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:54:18', '2025-09-02 14:54:18'),
(42, 'crud-examples', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:55:20', '2025-09-02 14:55:20'),
(43, 'crud-examples', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:55:45', '2025-09-02 14:55:45'),
(44, 'crud-examples', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:56:03', '2025-09-02 14:56:03'),
(45, 'crud-examples', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 14:56:06', '2025-09-02 14:56:06'),
(46, 'crud-examples', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 15:02:10', '2025-09-02 15:02:10'),
(47, 'crud-examples', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 15:02:32', '2025-09-02 15:02:32'),
(48, 'crud-examples', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 15:02:41', '2025-09-02 15:02:41'),
(49, 'crud-examples', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 15:02:50', '2025-09-02 15:02:50'),
(50, 'crud-examples', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 15:03:30', '2025-09-02 15:03:30'),
(51, 'crud-examples', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 15:03:36', '2025-09-02 15:03:36'),
(52, 'crud-examples', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 15:03:41', '2025-09-02 15:03:41'),
(53, 'crud-examples', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 15:04:17', '2025-09-02 15:04:17'),
(54, 'crud-examples', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 15:04:29', '2025-09-02 15:04:29'),
(55, 'crud-examples', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 15:05:17', '2025-09-02 15:05:17'),
(56, 'crud-examples', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 15:16:44', '2025-09-02 15:16:44'),
(57, 'crud-examples', '_token=L31Qkt2z4MqMChCgD3tpH7kZsH5Ky6qcmInENkDL&filter_created_by_id=&filter_end_created_at=&filter_end_updated_at=&filter_last_updated_by_id=&filter_limit=5&filter_sort_by_created_at=latest&filter_start_created_at=&filter_start_updated_at=', 'GET', '{\"_token\":\"L31Qkt2z4MqMChCgD3tpH7kZsH5Ky6qcmInENkDL\",\"filter_start_created_at\":null,\"filter_end_created_at\":null,\"filter_start_updated_at\":null,\"filter_end_updated_at\":null,\"filter_created_by_id\":null,\"filter_last_updated_by_id\":null,\"filter_sort_by_created_at\":\"latest\",\"filter_limit\":\"5\"}', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 15:17:25', '2025-09-02 15:17:25'),
(58, 'crud-examples', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 15:17:50', '2025-09-02 15:17:50'),
(59, 'students', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 15:17:52', '2025-09-02 15:17:52'),
(60, 'faculties', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 15:17:57', '2025-09-02 15:17:57'),
(61, 'study-programs', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 15:18:16', '2025-09-02 15:18:16'),
(62, 'study-programs/json', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 15:18:34', '2025-09-02 15:18:34'),
(63, 'dashboard', NULL, 'GET', '[]', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 1, '[\"superadmin\",\"admin\"]', 'Chrome', 'OS X', 'Macintosh', 0, '2025-09-02 15:19:05', '2025-09-02 15:19:05');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uri` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_blank` tinyint(1) NOT NULL DEFAULT '0',
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active_if_url_includes` text COLLATE utf8mb4_unicode_ci,
  `parent_menu_id` bigint(20) UNSIGNED DEFAULT NULL,
  `menu_group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_name`, `route_name`, `uri`, `is_blank`, `icon`, `permission`, `is_active_if_url_includes`, `parent_menu_id`, `menu_group_id`, `created_at`, `updated_at`) VALUES
(1, 'Dashboard', 'dashboard.index', NULL, 0, 'fas fa-fire', NULL, 'dashboard*', NULL, 1, '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(2, 'Contoh CRUD', 'crud-examples.index', NULL, 0, 'fas fa-atom', 'Contoh CRUD', 'crud-examples*', NULL, 1, '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(3, 'Contoh CRUD Yajra', 'crud-examples.index-yajra', NULL, 0, 'fas fa-atom', 'Contoh CRUD Yajra', 'yajra-crud-examples*', NULL, 1, '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(4, 'Contoh CRUD Ajax', 'crud-examples.index-ajax', NULL, 0, 'fas fa-atom', 'Contoh CRUD Yajra', 'ajax-crud-examples*', NULL, 1, '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(5, 'Contoh CRUD Ajax Yajra', 'crud-examples.index-ajax-yajra', NULL, 0, 'fas fa-atom', 'Contoh CRUD Ajax Yajra', 'yajra-ajax-crud-examples*', NULL, 1, '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(6, 'Bank', NULL, NULL, 0, 'fas fa-university', NULL, NULL, NULL, 1, '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(7, 'Bank', 'banks.index', NULL, 0, 'fas fa-university', 'Bank', 'banks*', 6, NULL, '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(8, 'Deposito', 'bank-deposits.index', NULL, 0, 'fas fa-dollar', 'Deposito Bank', 'bank-deposits*', 6, NULL, '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(9, 'Riwayat Deposito', 'bank-deposit-histories.index', NULL, 0, 'fas fa-dollar', 'Riwayat Deposito Bank', 'bank-deposit-histories*', 6, NULL, '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(10, 'Pendidikan', NULL, NULL, 0, 'fas fa-graduation-cap', NULL, NULL, NULL, 1, '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(11, 'Mahasiswa', 'students.index', NULL, 0, 'fas fa-users', 'Mahasiswa', 'students*', 10, NULL, '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(12, 'Fakultas', 'faculties.index', NULL, 0, 'fas fa-university', 'Fakultas', 'faculties*', 10, NULL, '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(13, 'Program Studi', 'study-programs.index', NULL, 0, 'fas fa-book', 'Program Studi', 'study-programs*', 10, NULL, '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(14, 'Stisla Example', NULL, NULL, 0, 'fas fa-caret-square-down', NULL, NULL, NULL, 1, '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(15, 'Datatable', 'datatable.index', NULL, 0, 'fas fa-table', NULL, 'datatable*', 14, NULL, '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(16, 'Form', 'form.index', NULL, 0, 'fas fa-file-alt', NULL, 'form*', 14, NULL, '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(17, 'Chart JS', 'chart-js.index', NULL, 0, 'fas fa-chart-line', NULL, 'chart-js*', 14, NULL, '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(18, 'Pricing', 'pricing.index', NULL, 0, 'fas fa-dollar', NULL, 'pricing*', 14, NULL, '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(19, 'Invoice', 'invoice.index', NULL, 0, 'fas fa-dollar', NULL, 'invoice*', 14, NULL, '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(20, 'Manajemen Pengguna', NULL, NULL, 0, 'fas fa-users', NULL, 'dashboard*', NULL, 2, '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(21, 'Pengguna', 'user-management.users.index', NULL, 0, NULL, 'Pengguna', 'user-management/users*', 20, NULL, '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(22, 'Role', 'user-management.roles.index', NULL, 0, NULL, 'Role', 'user-management/roles*', 20, NULL, '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(23, 'Permission', 'user-management.permissions.index', NULL, 0, NULL, 'Permission', 'user-management/permissions*', 20, NULL, '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(24, 'Group Permission', 'user-management.permission-groups.index', NULL, 0, NULL, 'Group Permission', 'user-management/permission-groups*', 20, NULL, '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(25, 'Manajemen Menu', NULL, 'menu-managements', 0, 'fas fa-bars', NULL, 'menu-managements*', NULL, 2, '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(26, 'Menu', 'menu-managements.index', NULL, 0, NULL, 'Menu', 'menu-managements*', 25, NULL, '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(27, 'Grup Menu', 'group-menus.index', NULL, 0, NULL, 'Grup Menu', 'group-menus*', 25, NULL, '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(28, 'Manajemen File', NULL, 'file-managers', 1, 'fas fa-folder', 'Manajemen File', 'file-managers*', NULL, 2, '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(29, 'Notifikasi', 'notifications.index', NULL, 0, 'fas fa-bell', 'Notifikasi', 'notifications*', NULL, 2, '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(30, 'Log', 'activity-logs.index', NULL, 0, 'fas fa-clock-rotate-left', NULL, 'activity-logs*', NULL, 2, '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(31, 'Log Aktivitas', 'activity-logs.index', NULL, 0, 'fas fa-clock-rotate-left', 'Log Aktivitas', 'activity-logs*', 30, NULL, '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(32, 'Log Request', 'request-logs.index', NULL, 0, 'fas fa-clock-rotate-left', 'Log Request', 'request-logs*', 30, NULL, '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(33, 'Laravel Log Viewer', 'logs.index', NULL, 1, 'fas fa-circle-exclamation', 'Laravel Log Viewer', 'logs*', 30, NULL, '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(34, 'Profil', 'profile.index', NULL, 0, 'fas fa-user', 'Profil', 'profile*', NULL, 2, '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(35, 'Pengaturan', 'settings.all', NULL, 0, 'fas fa-cogs', 'Pengaturan', 'settings*', NULL, 2, '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(36, 'Ubuntu', 'ubuntu.index', NULL, 0, 'fab fa-ubuntu', 'Ubuntu', 'ubuntu*', NULL, 2, '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(37, 'Backup Database', 'backup-databases.index', NULL, 0, 'fas fa-database', 'Backup Database', 'backup-databases*', NULL, 2, '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(38, 'Keluar', 'logout', NULL, 0, 'fas fa-sign-out-alt', NULL, NULL, NULL, 2, '2025-09-02 14:08:30', '2025-09-02 14:08:30');

-- --------------------------------------------------------

--
-- Table structure for table `menu_groups`
--

CREATE TABLE `menu_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_groups`
--

INSERT INTO `menu_groups` (`id`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'Navigasi', '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(2, 'Menu Lainnya', '2025-09-02 14:08:30', '2025-09-02 14:08:30');

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
(221, '0001_01_01_000000_create_users_table', 1),
(222, '0001_01_01_000001_create_cache_table', 1),
(223, '0001_01_01_000002_create_jobs_table', 1),
(224, '2021_05_10_041418_create_settings_table', 1),
(225, '2021_06_18_200839_create_permission_tables', 1),
(226, '2021_07_18_100149_create_crud_examples_table', 1),
(227, '2022_02_19_213049_create_permission_groups_table', 1),
(228, '2022_02_19_213152_change_permission_group_table', 1),
(229, '2022_02_19_225036_create_activity_logs_table', 1),
(230, '2022_03_06_105428_create_menu_groups_table', 1),
(231, '2022_03_06_105458_create_menus_table', 1),
(232, '2022_03_07_165342_create_notifications_table', 1),
(233, '2022_06_24_164915_create_regions_table', 1),
(234, '2023_03_12_145057_create_log_requests_table', 1),
(235, '2025_08_02_160741_create_faculties_table', 1),
(236, '2025_08_02_181357_create_study_programs_table', 1),
(237, '2025_08_16_142711_create_banks_table', 1),
(238, '2025_08_16_160846_create_bank_deposits_table', 1),
(239, '2025_08_17_100159_create_bank_deposit_histories_table', 1),
(240, '2025_09_02_011701_create_students_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(4, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 4),
(5, 'App\\Models\\User', 5);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `is_read` tinyint(1) NOT NULL,
  `notification_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bg_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'primary',
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'bell',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `content`, `user_id`, `is_read`, `notification_type`, `bg_color`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Test title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima doloremque, ullam pariatur vero beatae tempora dolor qui autem, similique consequatur iure explicabo. Magnam temporibus blanditiis, nesciunt iusto eius explicabo quae?', 1, 0, 'transaksi masuk', 'primary', 'bell', '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(2, 'Test title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima doloremque, ullam pariatur vero beatae tempora dolor qui autem, similique consequatur iure explicabo. Magnam temporibus blanditiis, nesciunt iusto eius explicabo quae?', 1, 0, 'transaksi masuk', 'primary', 'bell', '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(3, 'Test title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima doloremque, ullam pariatur vero beatae tempora dolor qui autem, similique consequatur iure explicabo. Magnam temporibus blanditiis, nesciunt iusto eius explicabo quae?', 1, 0, 'transaksi masuk', 'primary', 'bell', '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(4, 'Test title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima doloremque, ullam pariatur vero beatae tempora dolor qui autem, similique consequatur iure explicabo. Magnam temporibus blanditiis, nesciunt iusto eius explicabo quae?', 1, 0, 'transaksi masuk', 'primary', 'bell', '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(5, 'Test title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima doloremque, ullam pariatur vero beatae tempora dolor qui autem, similique consequatur iure explicabo. Magnam temporibus blanditiis, nesciunt iusto eius explicabo quae?', 1, 0, 'transaksi masuk', 'primary', 'bell', '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(6, 'Test title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima doloremque, ullam pariatur vero beatae tempora dolor qui autem, similique consequatur iure explicabo. Magnam temporibus blanditiis, nesciunt iusto eius explicabo quae?', 1, 0, 'transaksi masuk', 'primary', 'bell', '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(7, 'Test title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima doloremque, ullam pariatur vero beatae tempora dolor qui autem, similique consequatur iure explicabo. Magnam temporibus blanditiis, nesciunt iusto eius explicabo quae?', 1, 0, 'transaksi masuk', 'primary', 'bell', '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(8, 'Test title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima doloremque, ullam pariatur vero beatae tempora dolor qui autem, similique consequatur iure explicabo. Magnam temporibus blanditiis, nesciunt iusto eius explicabo quae?', 1, 0, 'transaksi masuk', 'primary', 'bell', '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(9, 'Test title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima doloremque, ullam pariatur vero beatae tempora dolor qui autem, similique consequatur iure explicabo. Magnam temporibus blanditiis, nesciunt iusto eius explicabo quae?', 1, 0, 'transaksi masuk', 'primary', 'bell', '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(10, 'Test title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima doloremque, ullam pariatur vero beatae tempora dolor qui autem, similique consequatur iure explicabo. Magnam temporibus blanditiis, nesciunt iusto eius explicabo quae?', 1, 0, 'transaksi masuk', 'primary', 'bell', '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(11, 'Test title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima doloremque, ullam pariatur vero beatae tempora dolor qui autem, similique consequatur iure explicabo. Magnam temporibus blanditiis, nesciunt iusto eius explicabo quae?', 1, 0, 'transaksi masuk', 'primary', 'bell', '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(12, 'Test title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima doloremque, ullam pariatur vero beatae tempora dolor qui autem, similique consequatur iure explicabo. Magnam temporibus blanditiis, nesciunt iusto eius explicabo quae?', 1, 0, 'transaksi masuk', 'primary', 'bell', '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(13, 'Test title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima doloremque, ullam pariatur vero beatae tempora dolor qui autem, similique consequatur iure explicabo. Magnam temporibus blanditiis, nesciunt iusto eius explicabo quae?', 1, 0, 'transaksi masuk', 'primary', 'bell', '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(14, 'Test title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima doloremque, ullam pariatur vero beatae tempora dolor qui autem, similique consequatur iure explicabo. Magnam temporibus blanditiis, nesciunt iusto eius explicabo quae?', 1, 0, 'transaksi masuk', 'primary', 'bell', '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(15, 'Test title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima doloremque, ullam pariatur vero beatae tempora dolor qui autem, similique consequatur iure explicabo. Magnam temporibus blanditiis, nesciunt iusto eius explicabo quae?', 1, 0, 'transaksi masuk', 'primary', 'bell', '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(16, 'Test title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima doloremque, ullam pariatur vero beatae tempora dolor qui autem, similique consequatur iure explicabo. Magnam temporibus blanditiis, nesciunt iusto eius explicabo quae?', 1, 0, 'transaksi masuk', 'primary', 'bell', '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(17, 'Test title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima doloremque, ullam pariatur vero beatae tempora dolor qui autem, similique consequatur iure explicabo. Magnam temporibus blanditiis, nesciunt iusto eius explicabo quae?', 1, 0, 'transaksi masuk', 'primary', 'bell', '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(18, 'Test title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima doloremque, ullam pariatur vero beatae tempora dolor qui autem, similique consequatur iure explicabo. Magnam temporibus blanditiis, nesciunt iusto eius explicabo quae?', 1, 0, 'transaksi masuk', 'primary', 'bell', '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(19, 'Test title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima doloremque, ullam pariatur vero beatae tempora dolor qui autem, similique consequatur iure explicabo. Magnam temporibus blanditiis, nesciunt iusto eius explicabo quae?', 1, 0, 'transaksi masuk', 'primary', 'bell', '2025-09-02 14:08:30', '2025-09-02 14:08:30'),
(20, 'Test title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima doloremque, ullam pariatur vero beatae tempora dolor qui autem, similique consequatur iure explicabo. Magnam temporibus blanditiis, nesciunt iusto eius explicabo quae?', 1, 0, 'transaksi masuk', 'primary', 'bell', '2025-09-02 14:08:30', '2025-09-02 14:08:30');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `permission_group_id` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `permission_group_id`) VALUES
(1, 'Profil', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 1),
(2, 'Profil Ubah', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 1),
(3, 'Profil Perbarui Email', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 1),
(4, 'Profil Perbarui Password', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 1),
(5, 'Profil Hapus Akun', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 1),
(6, 'Log Aktivitas', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 2),
(7, 'Log Aktivitas Ekspor', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 2),
(8, 'Log Request', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 3),
(9, 'Log Request Ekspor', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 3),
(10, 'Role', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 4),
(11, 'Role Tambah', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 4),
(12, 'Role Impor Excel', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 4),
(13, 'Role Ubah', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 4),
(14, 'Role Detail', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 4),
(15, 'Role Hapus', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 4),
(16, 'Role Ekspor', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 4),
(17, 'Permission', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 5),
(18, 'Permission Tambah', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 5),
(19, 'Permission Impor Excel', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 5),
(20, 'Permission Ubah', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 5),
(21, 'Permission Detail', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 5),
(22, 'Permission Hapus', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 5),
(23, 'Permission Ekspor', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 5),
(24, 'Group Permission', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 6),
(25, 'Group Permission Tambah', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 6),
(26, 'Group Permission Impor Excel', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 6),
(27, 'Group Permission Ubah', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 6),
(28, 'Group Permission Detail', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 6),
(29, 'Group Permission Hapus', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 6),
(30, 'Group Permission Ekspor', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 6),
(31, 'Pengguna', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 7),
(32, 'Pengguna Tambah', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 7),
(33, 'Pengguna Impor Excel', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 7),
(34, 'Pengguna Ubah', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 7),
(35, 'Pengguna Detail', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 7),
(36, 'Pengguna Hapus', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 7),
(37, 'Pengguna Ekspor', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 7),
(38, 'Pengguna Force Login', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 7),
(39, 'Pengguna Blokir', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 7),
(40, 'Pengaturan', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 8),
(41, 'Reset Sistem', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 8),
(42, 'Manajemen File', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 9),
(43, 'Ubuntu', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 10),
(44, 'Backup Database', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 11),
(45, 'Laravel Log Viewer', 'web', '2025-09-02 14:08:24', '2025-09-02 14:08:24', 12),
(46, 'Notifikasi', 'web', '2025-09-02 14:08:25', '2025-09-02 14:08:25', 13),
(47, 'Menu', 'web', '2025-09-02 14:08:25', '2025-09-02 14:08:25', 14),
(48, 'Menu Tambah', 'web', '2025-09-02 14:08:25', '2025-09-02 14:08:25', 14),
(49, 'Menu Ubah', 'web', '2025-09-02 14:08:25', '2025-09-02 14:08:25', 14),
(50, 'Menu Detail', 'web', '2025-09-02 14:08:25', '2025-09-02 14:08:25', 14),
(51, 'Menu Hapus', 'web', '2025-09-02 14:08:25', '2025-09-02 14:08:25', 14),
(52, 'Menu Ekspor', 'web', '2025-09-02 14:08:25', '2025-09-02 14:08:25', 14),
(53, 'Menu Impor Excel', 'web', '2025-09-02 14:08:25', '2025-09-02 14:08:25', 14),
(54, 'Grup Menu', 'web', '2025-09-02 14:08:25', '2025-09-02 14:08:25', 15),
(55, 'Grup Menu Tambah', 'web', '2025-09-02 14:08:25', '2025-09-02 14:08:25', 15),
(56, 'Grup Menu Ubah', 'web', '2025-09-02 14:08:25', '2025-09-02 14:08:25', 15),
(57, 'Grup Menu Detail', 'web', '2025-09-02 14:08:25', '2025-09-02 14:08:25', 15),
(58, 'Grup Menu Hapus', 'web', '2025-09-02 14:08:25', '2025-09-02 14:08:25', 15),
(59, 'Contoh CRUD', 'web', '2025-09-02 14:08:25', '2025-09-02 14:08:25', 16),
(60, 'Contoh CRUD Tambah', 'web', '2025-09-02 14:08:25', '2025-09-02 14:08:25', 16),
(61, 'Contoh CRUD Impor Excel', 'web', '2025-09-02 14:08:25', '2025-09-02 14:08:25', 16),
(62, 'Contoh CRUD Ubah', 'web', '2025-09-02 14:08:25', '2025-09-02 14:08:25', 16),
(63, 'Contoh CRUD Detail', 'web', '2025-09-02 14:08:25', '2025-09-02 14:08:25', 16),
(64, 'Contoh CRUD Hapus', 'web', '2025-09-02 14:08:25', '2025-09-02 14:08:25', 16),
(65, 'Contoh CRUD Ekspor', 'web', '2025-09-02 14:08:25', '2025-09-02 14:08:25', 16),
(66, 'Contoh CRUD Yajra', 'web', '2025-09-02 14:08:25', '2025-09-02 14:08:25', 16),
(67, 'Contoh CRUD Ajax Yajra', 'web', '2025-09-02 14:08:25', '2025-09-02 14:08:25', 16),
(68, 'Bank', 'web', '2025-09-02 14:08:25', '2025-09-02 14:08:25', 17),
(69, 'Bank Tambah', 'web', '2025-09-02 14:08:25', '2025-09-02 14:08:25', 17),
(70, 'Bank Impor Excel', 'web', '2025-09-02 14:08:25', '2025-09-02 14:08:25', 17),
(71, 'Bank Ubah', 'web', '2025-09-02 14:08:25', '2025-09-02 14:08:25', 17),
(72, 'Bank Detail', 'web', '2025-09-02 14:08:25', '2025-09-02 14:08:25', 17),
(73, 'Bank Hapus', 'web', '2025-09-02 14:08:25', '2025-09-02 14:08:25', 17),
(74, 'Bank Ekspor', 'web', '2025-09-02 14:08:25', '2025-09-02 14:08:25', 17),
(75, 'Deposito Bank', 'web', '2025-09-02 14:08:25', '2025-09-02 14:08:25', 18),
(76, 'Deposito Bank Tambah', 'web', '2025-09-02 14:08:25', '2025-09-02 14:08:25', 18),
(77, 'Deposito Bank Impor Excel', 'web', '2025-09-02 14:08:25', '2025-09-02 14:08:25', 18),
(78, 'Deposito Bank Ubah', 'web', '2025-09-02 14:08:25', '2025-09-02 14:08:25', 18),
(79, 'Deposito Bank Detail', 'web', '2025-09-02 14:08:25', '2025-09-02 14:08:25', 18),
(80, 'Deposito Bank Hapus', 'web', '2025-09-02 14:08:25', '2025-09-02 14:08:25', 18),
(81, 'Deposito Bank Ekspor', 'web', '2025-09-02 14:08:25', '2025-09-02 14:08:25', 18),
(82, 'Riwayat Deposito Bank', 'web', '2025-09-02 14:08:25', '2025-09-02 14:08:25', 19),
(83, 'Riwayat Deposito Bank Ekspor', 'web', '2025-09-02 14:08:25', '2025-09-02 14:08:25', 19),
(84, 'Mahasiswa', 'web', '2025-09-02 14:08:26', '2025-09-02 14:08:26', 20),
(85, 'Mahasiswa Tambah', 'web', '2025-09-02 14:08:26', '2025-09-02 14:08:26', 20),
(86, 'Mahasiswa Impor Excel', 'web', '2025-09-02 14:08:26', '2025-09-02 14:08:26', 20),
(87, 'Mahasiswa Ubah', 'web', '2025-09-02 14:08:26', '2025-09-02 14:08:26', 20),
(88, 'Mahasiswa Detail', 'web', '2025-09-02 14:08:26', '2025-09-02 14:08:26', 20),
(89, 'Mahasiswa Hapus', 'web', '2025-09-02 14:08:26', '2025-09-02 14:08:26', 20),
(90, 'Mahasiswa Ekspor', 'web', '2025-09-02 14:08:26', '2025-09-02 14:08:26', 20),
(91, 'Fakultas', 'web', '2025-09-02 14:08:26', '2025-09-02 14:08:26', 21),
(92, 'Fakultas Tambah', 'web', '2025-09-02 14:08:26', '2025-09-02 14:08:26', 21),
(93, 'Fakultas Impor Excel', 'web', '2025-09-02 14:08:26', '2025-09-02 14:08:26', 21),
(94, 'Fakultas Ubah', 'web', '2025-09-02 14:08:26', '2025-09-02 14:08:26', 21),
(95, 'Fakultas Detail', 'web', '2025-09-02 14:08:26', '2025-09-02 14:08:26', 21),
(96, 'Fakultas Hapus', 'web', '2025-09-02 14:08:26', '2025-09-02 14:08:26', 21),
(97, 'Fakultas Ekspor', 'web', '2025-09-02 14:08:26', '2025-09-02 14:08:26', 21),
(98, 'Fakultas Yajra', 'web', '2025-09-02 14:08:26', '2025-09-02 14:08:26', 21),
(99, 'Fakultas Ajax Yajra', 'web', '2025-09-02 14:08:26', '2025-09-02 14:08:26', 21),
(100, 'Program Studi', 'web', '2025-09-02 14:08:26', '2025-09-02 14:08:26', 22),
(101, 'Program Studi Tambah', 'web', '2025-09-02 14:08:26', '2025-09-02 14:08:26', 22),
(102, 'Program Studi Impor Excel', 'web', '2025-09-02 14:08:26', '2025-09-02 14:08:26', 22),
(103, 'Program Studi Ubah', 'web', '2025-09-02 14:08:26', '2025-09-02 14:08:26', 22),
(104, 'Program Studi Detail', 'web', '2025-09-02 14:08:26', '2025-09-02 14:08:26', 22),
(105, 'Program Studi Hapus', 'web', '2025-09-02 14:08:26', '2025-09-02 14:08:26', 22),
(106, 'Program Studi Ekspor', 'web', '2025-09-02 14:08:27', '2025-09-02 14:08:27', 22),
(107, 'Program Studi Yajra', 'web', '2025-09-02 14:08:27', '2025-09-02 14:08:27', 22),
(108, 'Program Studi Ajax Yajra', 'web', '2025-09-02 14:08:27', '2025-09-02 14:08:27', 22);

-- --------------------------------------------------------

--
-- Table structure for table `permission_groups`
--

CREATE TABLE `permission_groups` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `group_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_groups`
--

INSERT INTO `permission_groups` (`id`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'Profil', '2025-09-02 14:08:24', '2025-09-02 14:08:24'),
(2, 'Log Aktivitas', '2025-09-02 14:08:24', '2025-09-02 14:08:24'),
(3, 'Log Request', '2025-09-02 14:08:24', '2025-09-02 14:08:24'),
(4, 'Role', '2025-09-02 14:08:24', '2025-09-02 14:08:24'),
(5, 'Permission', '2025-09-02 14:08:24', '2025-09-02 14:08:24'),
(6, 'Group Permission', '2025-09-02 14:08:24', '2025-09-02 14:08:24'),
(7, 'Pengguna', '2025-09-02 14:08:24', '2025-09-02 14:08:24'),
(8, 'Pengaturan', '2025-09-02 14:08:24', '2025-09-02 14:08:24'),
(9, 'Manajemen File', '2025-09-02 14:08:24', '2025-09-02 14:08:24'),
(10, 'Ubuntu', '2025-09-02 14:08:24', '2025-09-02 14:08:24'),
(11, 'Backup Database', '2025-09-02 14:08:24', '2025-09-02 14:08:24'),
(12, 'Laravel Log Viewer', '2025-09-02 14:08:24', '2025-09-02 14:08:24'),
(13, 'Notifikasi', '2025-09-02 14:08:24', '2025-09-02 14:08:24'),
(14, 'Menu', '2025-09-02 14:08:25', '2025-09-02 14:08:25'),
(15, 'Grup Menu', '2025-09-02 14:08:25', '2025-09-02 14:08:25'),
(16, 'Contoh CRUD', '2025-09-02 14:08:25', '2025-09-02 14:08:25'),
(17, 'Bank', '2025-09-02 14:08:25', '2025-09-02 14:08:25'),
(18, 'Deposito Bank', '2025-09-02 14:08:25', '2025-09-02 14:08:25'),
(19, 'Riwayat Deposito Bank', '2025-09-02 14:08:25', '2025-09-02 14:08:25'),
(20, 'Mahasiswa', '2025-09-02 14:08:26', '2025-09-02 14:08:26'),
(21, 'Fakultas', '2025-09-02 14:08:26', '2025-09-02 14:08:26'),
(22, 'Program Studi', '2025-09-02 14:08:26', '2025-09-02 14:08:26');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `code` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_locked` tinyint(1) NOT NULL DEFAULT '0',
  `created_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `last_updated_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `is_locked`, `created_by_id`, `last_updated_by_id`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'web', 1, 1, NULL, '2025-09-02 14:08:24', '2025-09-02 14:08:24'),
(2, 'admin', 'web', 0, 1, NULL, '2025-09-02 14:08:24', '2025-09-02 14:08:24'),
(3, 'banker', 'web', 0, 1, NULL, '2025-09-02 14:08:24', '2025-09-02 14:08:24'),
(4, 'user', 'web', 0, 1, NULL, '2025-09-02 14:08:24', '2025-09-02 14:08:24'),
(5, 'admin pendidikan', 'web', 0, 1, NULL, '2025-09-02 14:08:24', '2025-09-02 14:08:24');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(107, 1),
(108, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(16, 2),
(23, 2),
(30, 2),
(40, 2),
(42, 2),
(46, 2),
(59, 2),
(60, 2),
(61, 2),
(62, 2),
(63, 2),
(64, 2),
(65, 2),
(66, 2),
(67, 2),
(68, 2),
(69, 2),
(70, 2),
(71, 2),
(72, 2),
(73, 2),
(74, 2),
(75, 2),
(76, 2),
(77, 2),
(78, 2),
(79, 2),
(80, 2),
(81, 2),
(82, 2),
(83, 2),
(84, 2),
(85, 2),
(86, 2),
(87, 2),
(88, 2),
(89, 2),
(90, 2),
(91, 2),
(92, 2),
(93, 2),
(94, 2),
(95, 2),
(96, 2),
(97, 2),
(98, 2),
(99, 2),
(100, 2),
(101, 2),
(102, 2),
(103, 2),
(104, 2),
(105, 2),
(106, 2),
(107, 2),
(108, 2),
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(68, 3),
(69, 3),
(70, 3),
(71, 3),
(72, 3),
(73, 3),
(74, 3),
(75, 3),
(76, 3),
(77, 3),
(78, 3),
(79, 3),
(80, 3),
(81, 3),
(82, 3),
(83, 3),
(1, 4),
(2, 4),
(3, 4),
(4, 4),
(5, 4),
(59, 4),
(60, 4),
(61, 4),
(62, 4),
(63, 4),
(64, 4),
(65, 4),
(66, 4),
(67, 4),
(1, 5),
(2, 5),
(3, 5),
(4, 5),
(5, 5),
(84, 5),
(85, 5),
(86, 5),
(87, 5),
(88, 5),
(89, 5),
(90, 5),
(91, 5),
(92, 5),
(93, 5),
(94, 5),
(95, 5),
(96, 5),
(97, 5),
(98, 5),
(99, 5),
(100, 5),
(101, 5),
(102, 5),
(103, 5),
(104, 5),
(105, 5),
(106, 5),
(107, 5),
(108, 5);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `key` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`key`, `value`) VALUES
('app_description', 'Deskripsi sistem tulis disini'),
('app_is_demo', '0'),
('application_name', 'Laravel 12 Template'),
('application_version', '1.0.0'),
('city', 'Jember'),
('company_name', 'PT Anam Developer'),
('country', 'Indonesia'),
('debugbar', '1'),
('favicon', 'http://localhost:8000/assets/icons/favicon.ico'),
('google_captcha_secret', 'eyJpdiI6IlVraTMvUzhFRjVZUUs4bXIrOGdSTXc9PSIsInZhbHVlIjoiTzhTaXFLM1V0NDdpUEhXTjIrY3lrNjMxUElSSWcwK1VTTXdZTmhDN05Raz0iLCJtYWMiOiIxYzEyNmI3Nzc4NDBkMzJmYTE2ZmQ3MTIxM2I1MjM3MTE4NGQyYmJlYzRlOTZjOGJlYmU1YTEwNjFkZDMwNDkyIiwidGFnIjoiIn0='),
('google_captcha_site_key', 'eyJpdiI6IlIxLzlLY2pMeW01ai9nWXNidloyWUE9PSIsInZhbHVlIjoiSGN4N2lkWDZqU3orQTQxMHVrcmlxZTZjcDQ5MURaVllwTnp5NHM3RmYyZz0iLCJtYWMiOiJiZGRhNDQ1OTAwYjdhMDNlNTZiODU3YmI2NjEwZDk5MDc5YzdhMGRjYThlNGFmM2Q5ZThkNWQ3OTZlM2M4MzA3IiwidGFnIjoiIn0='),
('is_active_register_page', '1'),
('is_forgot_password_send_to_email', '1'),
('is_google_captcha_forgot_password', '1'),
('is_google_captcha_login', '1'),
('is_google_captcha_register', '1'),
('is_google_captcha_reset_password', '1'),
('is_login_must_verified', '1'),
('is_login_with_facebook', '1'),
('is_login_with_github', '1'),
('is_login_with_google', '1'),
('is_login_with_twitter', '1'),
('is_register_with_facebook', '1'),
('is_register_with_github', '1'),
('is_register_with_google', '1'),
('is_register_with_twitter', '1'),
('logo', 'http://localhost:8000/assets/images/logo.png'),
('mail_encryption', 'tls'),
('mail_from_address', 'anamkun@laravel12template.com'),
('mail_from_name', 'Superadmin'),
('mail_host', 'smtp'),
('mail_mailgun_api_key', 'test'),
('mail_mailgun_domain', 'test'),
('mail_mailtrap_encryption', 'tls'),
('mail_mailtrap_host', 'sandbox.smtp.mailtrap.io'),
('mail_mailtrap_password', '11fd65a07d9f25'),
('mail_mailtrap_port', '2525'),
('mail_mailtrap_username', '10c9ffc0387d2a'),
('mail_password', 'e9d1aa54a61db1'),
('mail_port', '2525'),
('mail_provider', 'mailtrap'),
('mail_username', '809d58dfa23ade'),
('meta_author', 'Hairul Anam'),
('meta_description', 'PT Anam Developer'),
('meta_keywords', 'Sistem Informasi, Pemrograman, Github, PHP, Laravel, Stisla, Heroku, Gitlab, MySQL'),
('since', '2021'),
('sso_facebook_client_id', 'eyJpdiI6IjJxdkk3RUQzcXBTNXRUUU9nekljd0E9PSIsInZhbHVlIjoiREpJcWJZUUpnSkxqYWtYR0pveXBRUT09IiwibWFjIjoiZmVlOGI3NGY1OTVkYjdiNzYyNDM3OGQwYWUzNDVkMzQ5NzdmZTkyN2QwZTNiNGEyMTdhYzk1OGM3YjU0Y2VlNyIsInRhZyI6IiJ9'),
('sso_facebook_client_secret', 'eyJpdiI6IlE5aTZiQTltM1ljZ2RaeHMySjZJM1E9PSIsInZhbHVlIjoiSjdmc0tUM0JkN0ovWEtvNmNkbDBCZz09IiwibWFjIjoiMDJkOTI5YzM4ZTY2ZTM4MmM1YzgyZjllYjU0MzA4NmU5NDNkM2JkYWIzNTEzZTE5ZDFiOGNlODA0ZjllODk4YyIsInRhZyI6IiJ9'),
('sso_facebook_redirect', 'eyJpdiI6Im1DVE44RCtWVzNYRVZPVmxXVmxFV0E9PSIsInZhbHVlIjoiSWxLMmlSTjN4M3RiM1J3Ykx2L1VoVFdDR2dtbXVTVzFaZ0RkT0FMRzc1a3Bocm5KdmRzQ3ZvdFhJVjBHc2xxMWpzdHpPM1dQM0dZcTNBbnZpT2RXL2c9PSIsIm1hYyI6IjBlNTYyNTYxMWE1NTI5M2IxYzdkNDkyMDNkZGExYWE0N2NlZmJlNDA0YzlkZTI5ODQ2NDMzMmZkNDIwY2YxYmQiLCJ0YWciOiIifQ=='),
('sso_github_client_id', 'eyJpdiI6IlFYOWFmZjRxR2ZWMXhPUGJFSVVSY2c9PSIsInZhbHVlIjoieDhBUS9PcklzMmdDYmtUMnY5cjNhQT09IiwibWFjIjoiYjk2ODk3ZGRmNmU5YzUwZTg3NWIzZGVmYzExODY4OWUxZTMzOWNiYjcyMmI2MzcxYTA1ZDQxOGYxN2E3YmUwMyIsInRhZyI6IiJ9'),
('sso_github_client_secret', 'eyJpdiI6InlLaEpNbE9mYnJqbTVTZ2NDUWt5bWc9PSIsInZhbHVlIjoiTGN0QnZsVUNZWVAwLzNzT0JiZjhuZz09IiwibWFjIjoiYzFkOWJmMTM4MjYyMzkwZTU1YzRkMzI0MGRlYmM1YmYxZTA5MmJlODI1ZDQ5ZWM4MTNiYjdjZDJmMjgxMGMyMiIsInRhZyI6IiJ9'),
('sso_github_redirect', 'eyJpdiI6IncxN2VDQXNFTjNDc01naEdKMEVkYXc9PSIsInZhbHVlIjoiRDlwUURGRzQ4Y3JTNllpbDh0b05wRXZHU2lFYjNycitUVldKUnRUOE5kd2pzMjZ4dUpvU01TTlNIRlNaUXFDSWNESFJKNHR5RG4xSE42UjlwVlFkMlE9PSIsIm1hYyI6IjkxZGFiZDdmZmZkMzIyNTA2MGM3MzEyYmUxNWY1ZWM3MjVmZjVkMzYxNjI5ZTU5M2MzN2Y1ZmVjYTlkZmMyNGYiLCJ0YWciOiIifQ=='),
('sso_google_client_id', 'eyJpdiI6IjRvQlZBWVpJcm5Sb0hVZFpidzUwNkE9PSIsInZhbHVlIjoid0hTSURUTlB3SS8wbnlvTml6dys3Zz09IiwibWFjIjoiMjlkZDUxODQ2MTRmNWUzZjc2NGY2MTMyNDNlY2ZjYjhmYmJiMjViMzUwOTJkNDM5MmY2ZGFiZGE0MmY0YzA0MyIsInRhZyI6IiJ9'),
('sso_google_client_secret', 'eyJpdiI6Im1KOEhzVnR1bW1XWmwwK080K2dWVmc9PSIsInZhbHVlIjoibXVzZEIvb0txcWRJdmxWa25tMUJDdz09IiwibWFjIjoiYWQ2MjQyNTc2OGM5NTMyZTM4MDU3MmQ5MmU1ODBlZmZiNTYwZjJlNzI5NDQ5ZDVmNzc3YWRhNDE2YWFlYWIyYiIsInRhZyI6IiJ9'),
('sso_google_redirect', 'eyJpdiI6IlhsSHFlbnJNMVNGZjczRXBwTHMzVFE9PSIsInZhbHVlIjoiNXNFdVN0NVJQRkRqcUllQzBmZGVaQnRMMjd3ZXI1SlJzenE4dXhLNEN4aXVYVW1mY3A2TmgyQ0JmTmNMdm4wb3JFTVpTWGRBOEZFMVhEQW15OS8vZVE9PSIsIm1hYyI6ImIxNjRkZDQ5ODQ3NjQxM2RlYmMyMjI1OTE5N2Q3ZjEwMzY3M2Q1ZGQ2N2I5YWUzMTQ1ZGM5ZWFjYjIzN2ZkMDAiLCJ0YWciOiIifQ=='),
('sso_twitter_client_id', 'eyJpdiI6ImEvUldCMHdYZyt3MHJObVJibHF4M0E9PSIsInZhbHVlIjoiU0lPKzVmbnMreFp6SjQwNVR3bWVhQT09IiwibWFjIjoiZTJkN2Y2MTcwNjE3NTE4ZjBiNTIzNDU0MGJjODllNjcyNDE0OGZmMWVmYzljMjcyZWMyMzQyNzlhNDRhZDgxNCIsInRhZyI6IiJ9'),
('sso_twitter_client_secret', 'eyJpdiI6IkswUHV3QkhwNTdyRUpqR0RpNmVhM0E9PSIsInZhbHVlIjoiUUlqcWhSaHEvRmtRNHQyRGdZdnpTdz09IiwibWFjIjoiMDgyNmNlNmEzNjY4MTJmOWQ1Y2IxYTk1OWE3NGYyNjEwZTBmYTI5ZmY2N2Y0MTM0NWI5YzY0Zjc4M2NlNzRiYSIsInRhZyI6IiJ9'),
('sso_twitter_redirect', 'eyJpdiI6IllaZWlrOXFXWUpFMUorMWo4UDRmM0E9PSIsInZhbHVlIjoiaTRrbEcyQi9CV1VBcGgrVDBTRGI0MlpzSFVSNjZSUjBoOUdDNW1oYS9xc1dMZEJWTnJUeEZ0V2NuL0xhaUVhNWNwVkpSb1g0clJtdEs5Zmpmc1NkRkE9PSIsIm1hYyI6Ijk3NTMxNmUyZmFhNTYwMDcwZDU5MzBmMTcwZWMwZDU4MDBlNmYwMGRhZjFlODQ1OWNjNTFmYWI5NmI0NDI2MWQiLCJ0YWciOiIifQ=='),
('stisla_bg_home', 'http://localhost:8000/stisla/assets/img/unsplash/andre-benz-1214056-unsplash.jpg'),
('stisla_bg_login', 'http://localhost:8000/stisla/assets/img/unsplash/eberhard-grossgasteiger-1207565-unsplash.jpg'),
('stisla_login_template', 'default'),
('stisla_sidebar_mini', '0'),
('stisla_skin', 'style');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `study_program_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `last_updated_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `nim`, `date_of_birth`, `study_program_id`, `created_by_id`, `last_updated_by_id`, `created_at`, `updated_at`) VALUES
(1, 'Citra Lestari', '21081010001', '1999-05-12', 1, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(2, 'Budi Santoso', '21081010002', '2000-01-20', 2, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(3, 'Dewi Anggraini', '21081010003', '2001-08-30', 3, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(4, 'Fajar Pratama', '21081010004', '1999-11-05', 4, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(5, 'Kartika Sari', '21081010005', '2000-03-17', 5, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(6, 'Rizki Hidayat', '21081010006', '2001-02-28', 6, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(7, 'Siti Aminah', '21081010007', '2000-07-09', 7, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(8, 'Daffa Maulana', '21081010008', '1999-09-22', 8, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(9, 'Putri Ramadhani', '21081010009', '2001-04-01', 9, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(10, 'Yoga Prawira', '21081010010', '2000-06-15', 10, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(11, 'Wulan Febriani', '21081010011', '2001-03-11', 11, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(12, 'Dimas Nugroho', '21081010012', '1999-10-25', 12, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(13, 'Nadia Fitri', '21081010013', '2000-08-08', 13, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(14, 'Eko Susanto', '21081010014', '2001-01-19', 14, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(15, 'Maya Rahayu', '21081010015', '2000-12-04', 15, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(16, 'Rina Wulandari', '21081010017', '2001-06-18', 17, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(17, 'Hendra Kurniawan', '21081010018', '2000-04-27', 18, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(18, 'Larasati Dewi', '21081010019', '2001-09-02', 19, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(19, 'Bayu Saputra', '21081010020', '1999-07-14', 20, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(20, 'Cindy Audina', '21081010021', '2000-05-23', 21, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(21, 'Fahmi Akbar', '21081010022', '2001-10-08', 22, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(22, 'Gina Permata', '21081010023', '2000-02-13', 23, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(23, 'Kevin Sanjaya', '21081010024', '2001-07-07', 24, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(24, 'Laila Nurmala', '21081010025', '1999-04-16', 25, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(25, 'Mirza Putra', '21081010026', '2000-11-29', 26, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(26, 'Nina Kusuma', '21081010027', '2001-01-06', 27, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(27, 'Panca Andika', '21081010028', '2000-09-24', 28, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(28, 'Qori Maulida', '21081010029', '1999-06-03', 29, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(29, 'Rizky Firmansyah', '21081010030', '2001-08-14', 30, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(30, 'Sarah Ayu', '21081010031', '2000-03-28', 31, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(31, 'Taufik Rahman', '21081010032', '2001-05-19', 32, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(32, 'Vina Octavia', '21081010033', '1999-12-07', 33, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(33, 'Wisnu Aditama', '21081010034', '2000-01-26', 34, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(34, 'Yuni Susanti', '21081010035', '2001-04-09', 35, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(35, 'Zaki Alfarizi', '21081010036', '2000-10-31', 36, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(36, 'Anisa Putri', '21081010037', '1999-08-01', 37, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(37, 'Dito Kurniawan', '21081010038', '2001-06-11', 38, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(38, 'Elisa Fitriani', '21081010039', '2000-05-09', 39, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(39, 'Gita Lestari', '21081010040', '2001-02-20', 40, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(40, 'Hafiz Maulana', '21081010041', '1999-09-18', 41, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(41, 'Indah Sari', '21081010042', '2000-07-27', 42, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(42, 'Joko Wicaksono', '21081010043', '2001-11-04', 43, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(43, 'Kiki Amalia', '21081010044', '2000-03-01', 44, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(44, 'Luthfi Adnan', '21081010045', '1999-12-25', 45, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(45, 'Mita Rahmawati', '21081010046', '2001-08-03', 46, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(46, 'Nova Susanti', '21081010047', '2000-06-20', 47, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(47, 'Oki Permana', '21081010048', '2001-01-10', 48, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(48, 'Putra Aditya', '21081010049', '2000-04-14', 49, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(49, 'Rani Amelia', '21081010050', '1999-07-28', 50, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(50, 'Rian Kusuma', '21081010051', '2001-10-05', 51, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(51, 'Silvi Nuraini', '21081010052', '2000-08-16', 52, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(52, 'Toni Setiawan', '21081010053', '2001-03-22', 53, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(53, 'Ulfa Damayanti', '21081010054', '1999-05-08', 54, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(54, 'Vicky Maulana', '21081010055', '2000-02-19', 55, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(55, 'Winda Septiani', '21081010056', '2001-09-29', 56, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(56, 'Yudha Wijaya', '21081010057', '2000-11-13', 57, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(57, 'Zahra Permata', '21081010058', '1999-04-06', 58, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(58, 'Abdi Negara', '21081010059', '2001-06-25', 59, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(59, 'Bella Ayu', '21081010060', '2000-05-15', 60, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(60, 'Candra Firmansyah', '21081010061', '2001-02-04', 61, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(61, 'Dina Wulandari', '21081010062', '1999-10-10', 62, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(62, 'Eka Saputra', '21081010063', '2000-09-01', 63, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(63, 'Fitriani', '21081010064', '2001-07-12', 64, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(64, 'Galih Ramadhan', '21081010065', '1999-03-21', 65, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(65, 'Hani Pratiwi', '21081010066', '2000-04-07', 66, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(66, 'Iqbal Fadillah', '21081010067', '2001-11-17', 67, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(67, 'Jessica Tan', '21081010068', '2000-06-29', 68, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(68, 'Kurniawan', '21081010069', '2001-08-05', 69, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(69, 'Lia Aprilia', '21081010070', '1999-12-19', 70, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(70, 'Maulana Siddiq', '21081010071', '2000-01-03', 71, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(71, 'Nurfadillah', '21081010072', '2001-05-24', 72, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(72, 'Oscar Pratama', '21081010073', '2000-10-15', 73, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(73, 'Peni Wulandari', '21081010074', '1999-08-26', 74, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(74, 'Rizka Amelia', '21081010075', '2001-09-08', 75, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(75, 'Septian Haryadi', '21081010076', '2000-03-10', 76, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(76, 'Tiara Andini', '21081010077', '2001-07-21', 77, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(77, 'Umar Dzakwan', '21081010078', '1999-04-20', 78, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(78, 'Vina Rizky', '21081010079', '2000-11-02', 79, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(79, 'Wahyu Syahputra', '21081010080', '2001-01-31', 80, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(80, 'Yusuf Maulana', '21081010081', '2000-06-13', 81, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(81, 'Zara Faradila', '21081010082', '1999-09-28', 82, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(82, 'Ali Murtado', '21081010083', '2001-04-03', 83, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(83, 'Bella Salsabila', '21081010084', '2000-03-08', 84, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(84, 'Cahya Ramadhani', '21081010085', '2001-07-16', 85, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(85, 'Danu Prasetyo', '21081010086', '1999-10-29', 86, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(86, 'Erica Putri', '21081010087', '2000-09-05', 87, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31'),
(87, 'Gilang Mahendra', '21081010088', '2001-02-15', 88, NULL, NULL, '2025-09-02 14:08:31', '2025-09-02 14:08:31');

-- --------------------------------------------------------

--
-- Table structure for table `study_programs`
--

CREATE TABLE `study_programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `last_updated_by_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `study_programs`
--

INSERT INTO `study_programs` (`id`, `name`, `faculty_id`, `created_at`, `updated_at`, `created_by_id`, `last_updated_by_id`) VALUES
(1, 'Manajemen', 1, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(2, 'Akuntansi', 1, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(3, 'Ilmu Ekonomi', 1, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(4, 'Ekonomi Pembangunan', 1, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(5, 'Ekonomi Syariah', 1, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(6, 'Bisnis Digital', 1, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(7, 'Ilmu Hukum', 2, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(8, 'Hukum Bisnis', 2, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(9, 'Hukum Pidana', 2, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(10, 'Hukum Tata Negara', 2, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(11, 'Ilmu Komunikasi', 3, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(12, 'Hubungan Internasional', 3, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(13, 'Ilmu Politik', 3, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(14, 'Sosiologi', 3, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(15, 'Kriminologi', 3, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(16, 'Ilmu Pemerintahan', 3, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(17, 'Sastra Indonesia', 4, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(18, 'Sastra Inggris', 4, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(19, 'Sastra Jepang', 4, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(20, 'Antropologi Budaya', 4, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(21, 'Sejarah', 4, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(22, 'Psikologi', 5, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(23, 'Ilmu Administrasi Negara', 6, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(24, 'Ilmu Administrasi Bisnis', 6, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(25, 'Administrasi Fiskal', 6, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(26, 'Pendidikan Guru Sekolah Dasar (PGSD)', 7, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(27, 'Pendidikan Matematika', 7, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(28, 'Pendidikan Bahasa Inggris', 7, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(29, 'Pendidikan Biologi', 7, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(30, 'Pendidikan Kimia', 7, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(31, 'Bimbingan dan Konseling', 7, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(32, 'Sains Data', 8, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(33, 'Teknologi Pangan', 8, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(34, 'Statistika', 8, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(35, 'Matematika', 8, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(36, 'Biologi', 8, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(37, 'Teknik Sipil', 9, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(38, 'Teknik Mesin', 9, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(39, 'Teknik Elektro', 9, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(40, 'Teknik Industri', 9, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(41, 'Arsitektur', 9, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(42, 'Perencanaan Wilayah dan Kota', 9, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(43, 'Teknik Kimia', 9, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(44, 'Informatika', 10, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(45, 'Sistem Informasi', 10, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(46, 'Teknologi Informasi', 10, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(47, 'Teknik Komputer', 10, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(48, 'Agroteknologi', 11, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(49, 'Agribisnis', 11, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(50, 'Teknik Pertanian', 11, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(51, 'Ilmu Tanah', 11, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(52, 'Pendidikan Dokter', 12, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(53, 'Ilmu Gizi', 12, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(54, 'Keperawatan', 12, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(55, 'Farmasi', 12, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(56, 'Kesehatan Masyarakat', 13, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(57, 'Gizi Masyarakat', 13, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(58, 'Pendidikan Dokter Gigi', 14, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(59, 'Ilmu Kedokteran Gigi', 14, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(60, 'Pendidikan Dokter Hewan', 15, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(61, 'Ilmu dan Teknologi Pangan', 16, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(62, 'Teknik Pertanian dan Biosistem', 16, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(63, 'Teknologi Industri Pertanian', 16, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(64, 'Ilmu Kelautan', 17, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(65, 'Akuakultur', 17, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(66, 'Teknologi Hasil Perikanan', 17, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(67, 'Manajemen Sumber Daya Perairan', 17, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(68, 'Ilmu dan Teknologi Peternakan', 18, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(69, 'Nutrisi dan Teknologi Pakan', 18, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(70, 'Kehutanan', 19, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(71, 'Konservasi Sumber Daya Hutan dan Ekowisata', 19, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(72, 'Seni Rupa Murni', 20, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(73, 'Desain Komunikasi Visual', 20, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(74, 'Desain Interior', 20, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(75, 'Kriya Seni', 20, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(76, 'Pendidikan Jasmani', 21, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(77, 'Ilmu Keolahragaan', 21, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(78, 'Pendidikan Kepelatihan Olahraga', 21, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(79, 'Ilmu Komunikasi', 22, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(80, 'Jurnalistik', 22, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(81, 'Hubungan Masyarakat', 22, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(82, 'Penyiaran', 22, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(83, 'Pariwisata', 23, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(84, 'Manajemen Perhotelan', 23, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(85, 'Filsafat', 24, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(86, 'Manajemen Perkantoran', 25, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(87, 'Akuntansi Keuangan Publik', 25, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL),
(88, 'Manajemen Pemasaran', 25, '2025-09-02 14:08:31', '2025-09-02 14:08:31', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `email_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verification_code` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_locked` tinyint(1) NOT NULL DEFAULT '0',
  `phone_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `last_password_change` datetime DEFAULT NULL,
  `twitter_id` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_upload` text COLLATE utf8mb4_unicode_ci,
  `wrong_login` tinyint(4) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `blocked_reason` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `last_updated_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `last_login`, `email_token`, `verification_code`, `is_locked`, `phone_number`, `birth_date`, `address`, `last_password_change`, `twitter_id`, `file_upload`, `wrong_login`, `is_active`, `blocked_reason`, `deleted_at`, `remember_token`, `created_at`, `updated_at`, `created_by_id`, `last_updated_by_id`, `deleted_by_id`) VALUES
(1, 'Hairul Anam Superadmin', 'superadmin@laravel12template.com', NULL, '2021-04-05 21:06:00', '$2y$12$l7ajcg/dvmUjZ8k1D0Q0yeHSaZicE0agQV6UwX4gL0dRxM2KwDPwy', NULL, NULL, NULL, 1, '6285322778935', '1998-04-08', 'Jember', '2025-09-02 21:08:27', NULL, NULL, 0, 1, NULL, NULL, NULL, '2025-09-02 14:08:27', '2025-09-02 14:08:27', 1, NULL, NULL),
(2, 'Hairul Anam Admin', 'admin@laravel12template.com', NULL, '2021-04-05 21:06:00', '$2y$12$rNx9y2m.Cy7eQhoGEWnDPepuipmc1.thcM4Q8En8xfS7Pl1nuBbgy', NULL, NULL, NULL, 0, '6285322778935', '1998-04-08', 'Jember', '2025-09-02 21:08:28', NULL, NULL, 0, 1, NULL, NULL, NULL, '2025-09-02 14:08:28', '2025-09-02 14:08:28', 1, NULL, NULL),
(3, 'Hairul Anam User', 'user@laravel12template.com', NULL, '2021-04-05 21:06:00', '$2y$12$W/wrCR/s05qpqlfy1pAY5.z4Uz.mxX.7nNYbw9aAQ4d2.YZfdd/XK', NULL, NULL, NULL, 0, '6285322778935', '1998-04-08', 'Jember', '2025-09-02 21:08:29', NULL, NULL, 0, 1, NULL, NULL, NULL, '2025-09-02 14:08:29', '2025-09-02 14:08:29', 1, NULL, NULL),
(4, 'Hairul Anam Banker', 'banker@laravel12template.com', NULL, '2021-04-05 21:06:00', '$2y$12$MxynJZquBD/W45KoYUgnmuLIYGr.M.hhK7SButt3gfUX62amp946C', NULL, NULL, NULL, 0, '6285322778935', '1998-04-08', 'Jember', '2025-09-02 21:08:29', NULL, NULL, 0, 1, NULL, NULL, NULL, '2025-09-02 14:08:29', '2025-09-02 14:08:29', 1, NULL, NULL),
(5, 'Hairul Anam Admin Pendidikan', 'adminpendidikan@laravel12template.com', NULL, '2021-04-05 21:06:00', '$2y$12$j.kbviUfYOMqDPO.D9ZsZOg0jpI.vhKaWByBgLFqlqDQBk/9SOKce', NULL, NULL, NULL, 0, '6285322778935', '1998-04-08', 'Jember', '2025-09-02 21:08:30', NULL, NULL, 0, 1, NULL, NULL, NULL, '2025-09-02 14:08:30', '2025-09-02 14:08:30', 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `banks_name_unique` (`name`),
  ADD KEY `banks_created_by_id_foreign` (`created_by_id`),
  ADD KEY `banks_last_updated_by_id_foreign` (`last_updated_by_id`);

--
-- Indexes for table `bank_deposits`
--
ALTER TABLE `bank_deposits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bank_deposits_bank_id_foreign` (`bank_id`),
  ADD KEY `bank_deposits_created_by_id_foreign` (`created_by_id`),
  ADD KEY `bank_deposits_last_updated_by_id_foreign` (`last_updated_by_id`);

--
-- Indexes for table `bank_deposit_histories`
--
ALTER TABLE `bank_deposit_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bank_deposit_histories_bank_deposit_id_foreign` (`bank_deposit_id`),
  ADD KEY `bank_deposit_histories_created_by_id_foreign` (`created_by_id`),
  ADD KEY `bank_deposit_histories_last_updated_by_id_foreign` (`last_updated_by_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `crud_examples`
--
ALTER TABLE `crud_examples`
  ADD PRIMARY KEY (`id`),
  ADD KEY `crud_examples_created_by_id_foreign` (`created_by_id`),
  ADD KEY `crud_examples_last_updated_by_id_foreign` (`last_updated_by_id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faculties_name_unique` (`name`),
  ADD KEY `faculties_created_by_id_foreign` (`created_by_id`),
  ADD KEY `faculties_last_updated_by_id_foreign` (`last_updated_by_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_requests`
--
ALTER TABLE `log_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `log_requests_user_id_foreign` (`user_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_parent_menu_id_foreign` (`parent_menu_id`),
  ADD KEY `menus_menu_group_id_foreign` (`menu_group_id`);

--
-- Indexes for table `menu_groups`
--
ALTER TABLE `menu_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`),
  ADD KEY `permissions_permission_group_id_foreign` (`permission_group_id`);

--
-- Indexes for table `permission_groups`
--
ALTER TABLE `permission_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permission_groups_group_name_unique` (`group_name`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`),
  ADD KEY `roles_created_by_id_foreign` (`created_by_id`),
  ADD KEY `roles_last_updated_by_id_foreign` (`last_updated_by_id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_nim_unique` (`nim`),
  ADD KEY `students_study_program_id_foreign` (`study_program_id`),
  ADD KEY `students_created_by_id_foreign` (`created_by_id`),
  ADD KEY `students_last_updated_by_id_foreign` (`last_updated_by_id`);

--
-- Indexes for table `study_programs`
--
ALTER TABLE `study_programs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `study_programs_faculty_id_foreign` (`faculty_id`),
  ADD KEY `study_programs_created_by_id_foreign` (`created_by_id`),
  ADD KEY `study_programs_last_updated_by_id_foreign` (`last_updated_by_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_twitter_id_unique` (`twitter_id`),
  ADD KEY `users_created_by_id_foreign` (`created_by_id`),
  ADD KEY `users_last_updated_by_id_foreign` (`last_updated_by_id`),
  ADD KEY `users_deleted_by_id_foreign` (`deleted_by_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `bank_deposits`
--
ALTER TABLE `bank_deposits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `bank_deposit_histories`
--
ALTER TABLE `bank_deposit_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `crud_examples`
--
ALTER TABLE `crud_examples`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_requests`
--
ALTER TABLE `log_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `menu_groups`
--
ALTER TABLE `menu_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `permission_groups`
--
ALTER TABLE `permission_groups`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `study_programs`
--
ALTER TABLE `study_programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `banks`
--
ALTER TABLE `banks`
  ADD CONSTRAINT `banks_created_by_id_foreign` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `banks_last_updated_by_id_foreign` FOREIGN KEY (`last_updated_by_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `bank_deposits`
--
ALTER TABLE `bank_deposits`
  ADD CONSTRAINT `bank_deposits_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `bank_deposits_created_by_id_foreign` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `bank_deposits_last_updated_by_id_foreign` FOREIGN KEY (`last_updated_by_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `bank_deposit_histories`
--
ALTER TABLE `bank_deposit_histories`
  ADD CONSTRAINT `bank_deposit_histories_bank_deposit_id_foreign` FOREIGN KEY (`bank_deposit_id`) REFERENCES `bank_deposits` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `bank_deposit_histories_created_by_id_foreign` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `bank_deposit_histories_last_updated_by_id_foreign` FOREIGN KEY (`last_updated_by_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `crud_examples`
--
ALTER TABLE `crud_examples`
  ADD CONSTRAINT `crud_examples_created_by_id_foreign` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `crud_examples_last_updated_by_id_foreign` FOREIGN KEY (`last_updated_by_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `faculties`
--
ALTER TABLE `faculties`
  ADD CONSTRAINT `faculties_created_by_id_foreign` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `faculties_last_updated_by_id_foreign` FOREIGN KEY (`last_updated_by_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `log_requests`
--
ALTER TABLE `log_requests`
  ADD CONSTRAINT `log_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_menu_group_id_foreign` FOREIGN KEY (`menu_group_id`) REFERENCES `menu_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menus_parent_menu_id_foreign` FOREIGN KEY (`parent_menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_permission_group_id_foreign` FOREIGN KEY (`permission_group_id`) REFERENCES `permission_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_created_by_id_foreign` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `roles_last_updated_by_id_foreign` FOREIGN KEY (`last_updated_by_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_created_by_id_foreign` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `students_last_updated_by_id_foreign` FOREIGN KEY (`last_updated_by_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `students_study_program_id_foreign` FOREIGN KEY (`study_program_id`) REFERENCES `study_programs` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `study_programs`
--
ALTER TABLE `study_programs`
  ADD CONSTRAINT `study_programs_created_by_id_foreign` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `study_programs_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `study_programs_last_updated_by_id_foreign` FOREIGN KEY (`last_updated_by_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_created_by_id_foreign` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `users_deleted_by_id_foreign` FOREIGN KEY (`deleted_by_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `users_last_updated_by_id_foreign` FOREIGN KEY (`last_updated_by_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
