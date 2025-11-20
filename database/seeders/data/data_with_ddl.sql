-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 18, 2025 at 07:09 PM
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
(6, 18, 6, 0, 20, 0, 0, '7 Hari', NULL, 'Tidak Aktif', NULL, 0, 1, 1, '2025-08-16 08:26:42', '2025-08-18 19:09:03'),
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
  `text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qr_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `crud_examples` (`id`, `text`, `barcode`, `qr_code`, `email`, `number`, `currency`, `currency_idr`, `select`, `select2`, `select2_multiple`, `textarea`, `radio`, `checkbox`, `checkbox2`, `tags`, `file`, `image`, `date`, `time`, `color`, `summernote_simple`, `summernote`, `created_at`, `updated_at`, `created_by_id`, `last_updated_by_id`) VALUES
(1, 'EgGDBLIhuY', 'rKtwoe1V2Y', '0960008386615', 'tasdik31@yahoo.com', 230, 6852, 319894, 'Option 2', 'Option 1', '[\"Option 1\",\"Option 2\"]', 'Quod commodi odit aut deserunt iste. Eligendi maiores molestiae repudiandae.', 'Option 2', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=1', 'https://picsum.photos/200/300?random=1', '1970-07-23', '03:52:13', '#0f412c', 'Ex beatae voluptatibus qui sit nesciunt. Magnam doloribus voluptates laboriosam et.', '<html><head><title>Non cumque facilis ex dolores repellendus cumque voluptas aperiam.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">quaerat</label><input type=\"text\" id=\"username\"><label for=\"password\">illo</label><input type=\"password\" id=\"password\"></form><div id=\"66971\"><ul><li>Sed blanditiis laudantium quaerat.</li><li>Ex minima.</li><li>Qui ducimus quis.</li><li>Reprehenderit mollitia dicta.</li><li>Aliquam.</li><li>Amet nam itaque quos et voluptatibus.</li><li>Nam itaque quo sunt vel.</li></ul></div><div class=\"commodi\">Velit ut et velit ut laboriosam.<p>Earum et neque pariatur voluptates odit deleniti a.</p></div></body></html>\n', '2025-08-17 11:22:38', '2025-08-15 15:42:34', NULL, 1),
(2, 'Ks0lZUlDQL', 'N7aWRub3Qg', '7537146319695', 'gandi.agustina@puspasari.co', 391, 9039, 631453, 'Option 4', 'Option 3', '[\"Option 1\",\"Option 2\"]', 'Est consequatur est quibusdam. Omnis vero vel maiores in voluptatibus.', 'Option 2', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=2', 'https://picsum.photos/200/300?random=2', '1994-10-09', '13:39:56', '#3f6767', 'Debitis quo corrupti nemo perspiciatis. Vel veritatis id at adipisci quibusdam ratione sit.', '<html><head><title>Et et aut et.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">odit</label><input type=\"text\" id=\"username\"><label for=\"password\">aliquam</label><input type=\"password\" id=\"password\"></form><div id=\"68313\"></div><div id=\"14445\"></div><div id=\"82047\"><b>Iste temporibus.</b></div><div class=\"harum\"><div id=\"33975\"><h1>Eius eveniet unde inventore.</h1></div></div></body></html>\n', '2025-08-01 10:01:26', '2025-08-12 09:41:06', NULL, 1),
(3, 'uKnxytOKS3', 'xLxyIGl7a1', '0033564577978', 'rwijayanti@yahoo.com', 641, 7009, 9118602, 'Option 8', 'Option 8', '[\"Option 1\",\"Option 2\"]', 'Rem illum fugiat ratione. Sed facere nostrum voluptas.', 'Option 2', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=3', 'https://picsum.photos/200/300?random=3', '2022-10-10', '08:43:28', '#7099ab', 'Cum non quia recusandae aut. Neque et quaerat reiciendis qui fugiat sint provident voluptates.', '<html><head><title>Ipsam.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">quia</label><input type=\"text\" id=\"username\"><label for=\"password\">exercitationem</label><input type=\"password\" id=\"password\"></form><div id=\"40515\"><div id=\"44667\"></div><div class=\"iusto\"></div></div><div id=\"25202\"></div></body></html>\n', '2025-08-09 11:59:09', '2025-07-28 23:21:47', NULL, 1),
(4, '4C4LUg9o2a', 'BKVygWYXoE', '1348876679630', 'wasis04@maryati.web.id', 206, 7721, 5882390, 'Option 2', 'Option 3', '[\"Option 1\"]', 'Rem quibusdam doloribus est quis et ratione consequatur. Quam quas sunt cupiditate quaerat.', 'Option 1', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=4', 'https://picsum.photos/200/300?random=4', '2022-11-05', '06:06:06', '#9a5dd8', 'Cupiditate nemo est quasi ut. Atque ipsum nihil dignissimos qui veritatis.', '<html><head><title>Ad nam non aut voluptatem cupiditate culpa est.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">error</label><input type=\"text\" id=\"username\"><label for=\"password\">eos</label><input type=\"password\" id=\"password\"></form><div id=\"30283\"></div></body></html>\n', '2025-07-22 05:52:30', '2025-08-11 09:36:55', 1, NULL),
(5, '1x0WyAkpFy', 'J956FUYOEx', '8754365180076', 'napitupulu.syahrini@yahoo.com', 265, 5496, 3524187, 'Option 3', 'Option 1', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Voluptates iste natus possimus tenetur. Consequuntur aut repellat deserunt ut ut.', 'Option 2', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=5', 'https://picsum.photos/200/300?random=5', '2019-05-08', '21:20:41', '#a655f3', 'Eaque nihil iusto consequatur odit numquam suscipit dolorem. Quo sed quasi animi molestiae est et.', '<html><head><title>Ut autem atque quae necessitatibus dolor non rem natus exercitationem.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">repellat</label><input type=\"text\" id=\"username\"><label for=\"password\">qui</label><input type=\"password\" id=\"password\"></form><div id=\"98594\"><span>Aspernatur nisi velit inventore molestiae dolore.</span></div><div id=\"75658\"></div><div class=\"aspernatur\"><h1>Odio officiis ratione temporibus incidunt culpa et neque sunt ut odit totam.</h1><a href=\"example.com\">A et quo aperiam veniam consequuntur culpa dolorem totam.</a></div><div id=\"78721\"><div id=\"46736\"></div><div class=\"minima\"><a href=\"example.org\">Esse aut quos accusantium impedit quae non nisi dolores.</a></div><div id=\"686\"></div></div></body></html>\n', '2025-07-20 19:59:51', '2025-08-06 20:02:02', 1, 1),
(6, 'bv1sqRfHYa', 'aRv5hz0bTO', '3460939348043', 'oktaviani.puspa@namaga.net', 50, 4367, 2699315, 'Option 5', 'Option 3', '[\"Option 1\"]', 'Eius esse laudantium aperiam dolorum minima in. Itaque fuga veritatis totam quasi maiores.', 'Option 3', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=6', 'https://picsum.photos/200/300?random=6', '1991-11-15', '15:53:11', '#c75cad', 'Eveniet quos voluptates officiis ut. Ea porro et occaecati in.', '<html><head><title>Quasi amet aliquid aut.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">corporis</label><input type=\"text\" id=\"username\"><label for=\"password\">dolores</label><input type=\"password\" id=\"password\"></form><div class=\"id\"></div><div id=\"19564\"></div><div class=\"modi\"></div><div class=\"assumenda\"></div></body></html>\n', '2025-08-08 22:12:50', '2025-07-20 19:22:06', 1, 1),
(7, '0J3sFIuCQJ', 'UbbAgV3adV', '5772379567570', 'victoria.rajasa@yahoo.co.id', 621, 4408, 6224877, 'Option 6', 'Option 9', '[\"Option 1\",\"Option 2\"]', 'Recusandae quod minima asperiores rem et. Aliquid odit earum consequuntur et dolores.', 'Option 4', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=7', 'https://picsum.photos/200/300?random=7', '1997-03-28', '16:56:28', '#efa41d', 'Laborum et id neque et qui nobis. Repellat maxime enim voluptatem dolorem dolorem reprehenderit.', '<html><head><title>Dolorem recusandae sed est eveniet recusandae ea architecto.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">ut</label><input type=\"text\" id=\"username\"><label for=\"password\">ratione</label><input type=\"password\" id=\"password\"></form><div class=\"et\"><p>Mollitia voluptatibus explicabo consequatur ut harum magnam.</p><a href=\"example.net\">Qui fugiat et consequatur facilis consequatur modi distinctio.</a></div><div id=\"40191\"></div><div class=\"pariatur\"></div></body></html>\n', '2025-08-17 22:08:01', '2025-07-30 05:13:28', NULL, 1),
(8, 'OF6Lw9SPVT', 'Gl9fa1doix', '5313302450981', 'lyuliarti@dabukke.my.id', 696, 9826, 5281068, 'Option 6', 'Option 6', '[\"Option 1\"]', 'Corrupti quis quibusdam quia esse. Voluptatibus et voluptatum qui veniam.', 'Option 2', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=8', 'https://picsum.photos/200/300?random=8', '2018-02-24', '15:27:43', '#d54eaf', 'Dolorem at ut sequi laudantium et quia quae magnam. Minus minima laudantium velit et dolor.', '<html><head><title>Debitis modi id.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">magnam</label><input type=\"text\" id=\"username\"><label for=\"password\">quia</label><input type=\"password\" id=\"password\"></form><div id=\"14575\"><table><thead><tr><th>Perspiciatis quia ipsa quidem.</th><th>Eveniet consequuntur.</th><th>Fugit nemo.</th><th>Exercitationem.</th><th>Dolores sapiente excepturi.</th></tr></thead><tbody><tr><td>Enim exercitationem sed sed officia explicabo eaque magnam temporibus voluptatem voluptas et cupiditate.</td><td>Dicta aperiam in numquam.</td><td>Eum sapiente ab qui.</td><td>Natus qui.</td><td>Sed quia facere id magni accusantium quia rerum perferendis molestiae officiis.</td></tr><tr><td>Architecto qui saepe eos quaerat minima ipsum adipisci aut aut nam.</td><td>Laudantium iste qui sit amet molestiae sint in et.</td><td>Omnis distinctio.</td><td>Eligendi ducimus quia sunt non aut.</td><td>Ad qui mollitia nihil quibusdam labore ut sed repudiandae quidem.</td></tr></tbody></table><table><thead><tr><th>Saepe ut sint mollitia molestias.</th><th>Pariatur aut.</th></tr></thead><tbody><tr><td>Nobis ab aliquid voluptas maiores minus autem modi.</td><td>Error adipisci rerum quia ex ut.</td></tr><tr><td>Veritatis delectus libero iusto et deleniti id non aperiam.</td><td>Deleniti sequi est ratione doloribus tenetur beatae.</td></tr><tr><td>Ratione exercitationem omnis quod aperiam quaerat aperiam autem veniam non hic magnam.</td><td>Quod qui molestias.</td></tr><tr><td>Unde accusantium consectetur quidem.</td><td>Qui quia velit debitis maxime iste ratione distinctio.</td></tr><tr><td>Fuga molestiae et eum rerum omnis officia blanditiis eum dolores.</td><td>Totam qui distinctio nobis fugit in debitis consequatur.</td></tr></tbody></table><h1>Voluptatum molestiae aperiam sunt in facere quibusdam molestiae voluptas quaerat non aut minima natus.</h1></div><div id=\"54274\"><i>Adipisci perferendis doloremque illo accusamus autem neque voluptate fugit voluptas ex.</i><span>Dignissimos eius eum.</span></div><div class=\"quia\"><div class=\"saepe\"></div><div id=\"17015\">Ea soluta necessitatibus eius ratione nesciunt animi nesciunt odit quidem praesentium placeat.<b>Sed ullam quia eligendi porro ratione tempora aspernatur dicta dolorem qui asperiores earum omnis.</b><i>Perferendis nam corporis vel saepe aut eos modi vel voluptatem.</i></div></div></body></html>\n', '2025-08-11 22:15:00', '2025-08-02 00:37:58', NULL, 1),
(9, 'JK2dsVimZN', '7KGr3NQsTN', '1723522932671', 'wasita.danuja@yahoo.com', 819, 506, 5513642, 'Option 2', 'Option 1', '[\"Option 1\",\"Option 2\"]', 'Earum vitae pariatur blanditiis optio. Omnis quisquam rerum natus nisi voluptatem.', 'Option 3', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=9', 'https://picsum.photos/200/300?random=9', '1978-11-25', '01:16:32', '#25db02', 'Molestiae et voluptas quasi aut id. Beatae cumque consequuntur facilis atque.', '<html><head><title>Atque quaerat rerum inventore iste nam nisi aut dolorem quo iste vel blanditiis.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">animi</label><input type=\"text\" id=\"username\"><label for=\"password\">doloremque</label><input type=\"password\" id=\"password\"></form><div class=\"eaque\"></div></body></html>\n', '2025-08-02 03:02:32', '2025-08-06 14:00:45', NULL, 1),
(10, 'FpbcxYyCvc', 'kdBCgH5Jrh', '5542084115959', 'csitorus@susanti.co', 19, 4320, 3006105, 'Option 3', 'Option 1', '[\"Option 1\",\"Option 2\"]', 'Consectetur delectus voluptatum minima. Ut nobis voluptates vel et earum.', 'Option 4', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=10', 'https://picsum.photos/200/300?random=10', '1979-12-19', '02:23:33', '#25ea79', 'Dolorem quod occaecati saepe. Debitis dicta recusandae rerum modi doloremque harum.', '<html><head><title>Qui facilis non corporis nostrum illum dolores et molestias qui.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">nobis</label><input type=\"text\" id=\"username\"><label for=\"password\">et</label><input type=\"password\" id=\"password\"></form><div id=\"86515\">At voluptatem quia dolorem et.</div><div class=\"quos\"></div><div class=\"ab\"></div><div id=\"45605\"><div class=\"aut\"></div></div></body></html>\n', '2025-07-25 07:56:26', '2025-08-03 23:22:07', 1, NULL),
(11, 'rxU6eMlc84', 'h53A2VXov7', '4964116939370', 'kmarpaung@gmail.com', 561, 224, 7471217, 'Option 10', 'Option 6', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Sint est amet ipsa odit cupiditate. Impedit dolor nesciunt id beatae ea non voluptas.', 'Option 3', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=11', 'https://picsum.photos/200/300?random=11', '1991-01-18', '15:02:01', '#fd4dd9', 'Dolor neque minus omnis eum et ducimus. Ut rem nam illum quibusdam velit et excepturi veritatis.', '<html><head><title>Iusto dolorem et et aut et ipsum est.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">ea</label><input type=\"text\" id=\"username\"><label for=\"password\">non</label><input type=\"password\" id=\"password\"></form><div id=\"85235\"><h3>Exercitationem ut earum animi ut provident.</h3><a href=\"example.net\">Unde ipsam omnis.</a></div><div class=\"qui\"></div></body></html>\n', '2025-07-22 11:34:25', '2025-08-07 02:40:21', 1, NULL),
(12, 'CefNpPLMDK', 'hrR62PtFin', '1134227684701', 'dharyanti@saputra.ac.id', 292, 1246, 3904129, 'Option 3', 'Option 8', '[\"Option 1\",\"Option 2\"]', 'Occaecati minima et laudantium numquam est eveniet. Harum aut illo vitae maiores.', 'Option 3', '[\"Option 1\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=12', 'https://picsum.photos/200/300?random=12', '1983-06-14', '01:05:34', '#9e2019', 'Autem voluptatem rerum vel ad. Quo non eum ab illum commodi quo. Est quia facilis magni autem sed.', '<html><head><title>A ut quis placeat pariatur ut optio praesentium delectus eum ducimus eos commodi.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">vitae</label><input type=\"text\" id=\"username\"><label for=\"password\">ad</label><input type=\"password\" id=\"password\"></form><div id=\"95937\"><table><thead><tr><th>Sed sit sed iure aperiam.</th><th>Fugit dolore.</th><th>Explicabo excepturi nihil.</th><th>Quas vel cupiditate voluptas facere beatae.</th></tr></thead><tbody><tr><td>Consequatur doloremque.</td><td>Ut libero nostrum asperiores.</td><td>Sequi ullam incidunt ut itaque aut nostrum voluptatem quo.</td><td>Accusamus aperiam.</td></tr><tr><td>Ratione dolor ut voluptatum nemo qui id perspiciatis.</td><td>At ab.</td><td>Facilis dolorum eos sint.</td><td>Atque nam.</td></tr><tr><td>Quo tenetur eum praesentium debitis cum temporibus ipsam labore et.</td><td>Voluptas unde dolorem quaerat dolor porro eaque.</td><td>Consequatur suscipit voluptas.</td><td>At non veniam enim tempore corrupti facilis maxime omnis amet ipsam repellendus.</td></tr><tr><td>Tempore ut delectus voluptas animi suscipit doloremque quo et.</td><td>Laboriosam officiis sit sint aspernatur.</td><td>Explicabo rerum omnis ut.</td><td>Et aut occaecati autem magni quas in.</td></tr><tr><td>Fuga molestiae quis tempora beatae laboriosam veniam sit sint facere.</td><td>Corrupti sunt voluptatem.</td><td>Ullam at sapiente aliquam qui enim vel repellendus corrupti odit quis qui aliquam.</td><td>Nostrum quam nostrum blanditiis magni qui.</td></tr><tr><td>Expedita.</td><td>Sunt omnis omnis.</td><td>Aut omnis cupiditate ipsa beatae et.</td><td>Pariatur distinctio aperiam necessitatibus accusamus.</td></tr><tr><td>Explicabo non rerum voluptatibus omnis odit.</td><td>Autem ipsum voluptas itaque sint.</td><td>Nobis aut.</td><td>Ut.</td></tr><tr><td>Incidunt deserunt tempore ipsum rerum voluptatem officia nulla voluptas.</td><td>Iure et alias ut consequatur quis exercitationem.</td><td>Vel quo est non qui ut distinctio voluptatem.</td><td>Voluptatibus perferendis sint et sit velit ab accusamus doloremque est.</td></tr></tbody></table></div><div id=\"38884\"><div class=\"et\"></div><div class=\"itaque\"><span>Est rerum exercitationem ea dolorum aut.</span><b>Ullam doloremque omnis.</b><span>Voluptatum aliquid ut dolor aspernatur aspernatur quo illum placeat sed praesentium dicta et.</span></div><div id=\"80688\"></div></div><div class=\"sed\"><h2>Quis ea vero ad vitae recusandae qui dolorum dolorem.</h2><span>Veritatis saepe ut ut illum nulla consequatur id.</span><ul><li>Qui rerum.</li></ul></div><div id=\"90225\"></div></body></html>\n', '2025-08-07 12:31:55', '2025-07-19 03:15:48', 1, NULL),
(13, 'Lp6XEOFode', '0hL8w2ro2d', '3152728896438', 'gandewa39@yahoo.com', 719, 4469, 7690279, 'Option 1', 'Option 7', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Pariatur quia doloribus quia eos. Harum vitae sit aut aperiam quis.', 'Option 4', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=13', 'https://picsum.photos/200/300?random=13', '2020-01-14', '22:25:14', '#f1b7d4', 'Eos quaerat alias tempora quasi. Dolores quam totam expedita rerum et aut.', '<html><head><title>Laboriosam repudiandae quaerat distinctio aut voluptates.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">nihil</label><input type=\"text\" id=\"username\"><label for=\"password\">accusamus</label><input type=\"password\" id=\"password\"></form><div id=\"46492\"><span>Reprehenderit molestias quia voluptatibus.</span><a href=\"example.net\">Voluptatem quis dolorum consequatur ea accusamus.</a><b>Sit modi id est distinctio.</b><a href=\"example.net\">Voluptatem culpa cumque tempore.</a></div><div id=\"14279\"></div><div id=\"63023\"></div><div id=\"44507\"><div id=\"53012\"></div></div></body></html>\n', '2025-08-17 11:24:48', '2025-08-13 16:01:33', NULL, NULL),
(14, 'VeJ4V0j86G', 'YK6pSt7SEb', '6607551555740', 'rini.nasyiah@yahoo.co.id', 261, 8083, 4036491, 'Option 1', 'Option 9', '[\"Option 1\",\"Option 2\"]', 'Eaque quia quia saepe. Sunt aut sed nihil sint sit quis. Non id est error minus fugiat.', 'Option 3', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=14', 'https://picsum.photos/200/300?random=14', '1990-02-08', '21:47:05', '#202ded', 'Sit inventore sed mollitia voluptatem aliquam id ad quo. Hic velit ea quia omnis ducimus atque.', '<html><head><title>Vitae deleniti id et.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">aspernatur</label><input type=\"text\" id=\"username\"><label for=\"password\">qui</label><input type=\"password\" id=\"password\"></form><div class=\"numquam\">Sed enim voluptatem voluptatem voluptatem dolor optio omnis nesciunt itaque.Id aut explicabo quis.<h3>Cum rerum est ullam repellendus et.</h3></div><div id=\"88595\"></div><div class=\"non\"></div></body></html>\n', '2025-08-04 19:03:06', '2025-07-28 12:10:10', NULL, NULL),
(15, 'wMKlUg5O5T', 'f1rJrKLQjc', '3172920148487', 'ibrahim.rahayu@gmail.co.id', 122, 2522, 6131038, 'Option 5', 'Option 3', '[\"Option 1\"]', 'Est dolorem ut rerum quia. Et praesentium sed facere aliquid. Magnam nisi culpa ipsam vitae.', 'Option 3', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=15', 'https://picsum.photos/200/300?random=15', '1993-09-02', '07:26:39', '#862458', 'Quasi possimus quam aut ut at. Sit aut quo cumque omnis sunt voluptatum dolores.', '<html><head><title>Est vitae similique quas error et sapiente odio tempore amet velit.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">enim</label><input type=\"text\" id=\"username\"><label for=\"password\">et</label><input type=\"password\" id=\"password\"></form><div class=\"et\"><div id=\"33192\">Dicta aut magni distinctio architecto.<a href=\"example.org\">Quas asperiores est ducimus doloremque consequatur architecto impedit iste accusantium fugiat.</a>Enim ipsum qui dolorum.</div></div><div id=\"40155\"><b>Vel non voluptates voluptatem voluptatem assumenda vel dolores.</b><a href=\"example.com\">Eos.</a><a href=\"example.org\">Dolor reprehenderit sit quasi impedit facere consequatur et optio dolorum.</a></div><div id=\"84050\">Dolorum autem eius repellat excepturi omnis quod.<i>Totam animi.</i><i>Eum voluptate.</i></div><div class=\"voluptatem\"></div></body></html>\n', '2025-07-26 00:12:42', '2025-07-22 21:12:48', 1, 1),
(16, 'FlsB8qC0j8', 'IIbJTPH148', '1672469410592', 'cayadi39@damanik.go.id', 218, 537, 417704, 'Option 7', 'Option 2', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Sunt eum sequi aliquam perspiciatis. Et molestiae dolor laudantium ab tempora deserunt qui.', 'Option 2', '[\"Option 1\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=16', 'https://picsum.photos/200/300?random=16', '1988-05-25', '18:16:05', '#c51605', 'Quam corrupti officia aut ullam similique in sunt praesentium. Officia soluta quo id quia ea.', '<html><head><title>Ipsum molestias ab rerum aut tempora consectetur in natus consequatur nemo quia quasi.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">quia</label><input type=\"text\" id=\"username\"><label for=\"password\">quis</label><input type=\"password\" id=\"password\"></form><div class=\"maiores\"><a href=\"example.net\">Sint consectetur exercitationem.</a><i>Illo impedit.</i><h3>Nam numquam minus temporibus labore.</h3></div><div id=\"76951\"></div><div id=\"113\"><table><thead><tr><th>Reiciendis.</th><th>Repudiandae quibusdam.</th><th>Recusandae odio illo.</th></tr></thead><tbody><tr><td>Et nesciunt cumque et natus sint aut ipsam voluptates.</td><td>Dolorem voluptatem est tempore dignissimos.</td><td>Perspiciatis dolorum tempora voluptatem.</td></tr><tr><td>Illo assumenda cupiditate in temporibus eius facere.</td><td>Similique voluptas adipisci libero quas quia odio odit.</td><td>Assumenda sequi quod ea.</td></tr><tr><td>Distinctio sed rem rerum ea a perferendis.</td><td>Ipsam commodi cupiditate aut possimus odit.</td><td>Quae quis sapiente repellat sapiente ex et.</td></tr><tr><td>Sunt sequi modi adipisci possimus et corporis eum veniam quam laborum.</td><td>Consectetur dolor totam cum sed voluptatem.</td><td>Ab illo in id.</td></tr><tr><td>Numquam id placeat aperiam non ut eligendi.</td><td>Atque quibusdam eaque labore enim.</td><td>Vel autem ut et id.</td></tr><tr><td>Rerum ab pariatur.</td><td>Excepturi dicta aperiam quasi accusantium quos quo voluptatem eos.</td><td>Unde iusto quia doloremque.</td></tr><tr><td>Dolores dicta praesentium.</td><td>Nihil neque repellendus ut sit inventore.</td><td>Quo sit voluptas reiciendis reiciendis inventore voluptas nihil et.</td></tr><tr><td>Voluptatem quasi sed rerum itaque quis in dolorum in.</td><td>Ut qui nobis.</td><td>Ducimus et et consequatur maxime dolor ut voluptas nemo natus.</td></tr></tbody></table></div><div class=\"praesentium\"></div></body></html>\n', '2025-08-05 06:01:12', '2025-07-25 16:21:58', NULL, 1),
(17, 'AwX5GdmFQM', 'EgkjINv4nS', '9804658820895', 'langgeng63@gmail.co.id', 479, 2556, 6135362, 'Option 7', 'Option 4', '[\"Option 1\"]', 'Ea sit et eius. A et et in cupiditate facere. Qui blanditiis eos repudiandae libero culpa quas.', 'Option 3', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=17', 'https://picsum.photos/200/300?random=17', '1993-01-28', '11:01:53', '#729d7a', 'Ut ut tempora et beatae qui. Qui exercitationem libero placeat eos voluptas.', '<html><head><title>Est expedita rerum doloremque.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">dolorem</label><input type=\"text\" id=\"username\"><label for=\"password\">voluptatem</label><input type=\"password\" id=\"password\"></form><div id=\"98887\"><div id=\"59667\"><span>Eum quia voluptatem delectus molestiae ut.</span></div></div><div class=\"est\"></div></body></html>\n', '2025-08-01 02:43:58', '2025-07-31 17:14:50', NULL, NULL),
(18, 'Z8mEd74Nzu', 'vBa90RYElx', '5349832594895', 'ella06@gmail.co.id', 449, 5900, 8283956, 'Option 3', 'Option 10', '[\"Option 1\"]', 'Odio optio ut maxime in. Hic expedita minima sint quo. Enim et id sapiente occaecati odit quia et.', 'Option 1', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=18', 'https://picsum.photos/200/300?random=18', '1983-06-19', '05:09:02', '#3a9af5', 'Consequatur cum ea sed quia provident. Et dicta ut placeat rem.', '<html><head><title>Et magni nihil.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">hic</label><input type=\"text\" id=\"username\"><label for=\"password\">maiores</label><input type=\"password\" id=\"password\"></form><div id=\"48889\"><span>Ad et sit ad laboriosam reiciendis quas.</span><p>Et ullam sapiente excepturi eligendi excepturi rerum.</p><ul><li>Eum incidunt.</li><li>Quia.</li><li>Omnis repellendus.</li><li>Nihil ipsum.</li><li>Debitis voluptatem.</li></ul></div><div id=\"57243\"></div><div id=\"45879\"><div class=\"voluptates\"></div><div id=\"3205\"></div></div><div id=\"48494\"></div></body></html>\n', '2025-07-29 16:57:50', '2025-08-08 07:22:40', NULL, NULL),
(19, '0NIwgczdWy', 'JmUUp5Aq04', '8741161684716', 'bancar29@yahoo.co.id', 952, 4557, 2251110, 'Option 1', 'Option 3', '[\"Option 1\",\"Option 2\"]', 'Reprehenderit dolor provident est. Aperiam corporis exercitationem sit ut. Sint non aut ea.', 'Option 2', '[\"Option 1\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=19', 'https://picsum.photos/200/300?random=19', '1978-05-08', '01:45:32', '#ead5a6', 'Ullam quo a sapiente a. Vitae et dignissimos aperiam at omnis.', '<html><head><title>Dicta et exercitationem sed voluptate et necessitatibus modi praesentium sed et quis velit.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">enim</label><input type=\"text\" id=\"username\"><label for=\"password\">saepe</label><input type=\"password\" id=\"password\"></form><div id=\"30880\"></div><div id=\"54918\"></div></body></html>\n', '2025-07-29 03:20:11', '2025-08-08 02:25:06', 1, NULL),
(20, '6YdjeDgRD1', 'aNhpIv7pel', '1046856861081', 'uyainah.dono@gmail.com', 491, 234, 4294266, 'Option 7', 'Option 5', '[\"Option 1\"]', 'Harum ad ratione eius quaerat quibusdam. Velit vel sit itaque occaecati.', 'Option 1', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=20', 'https://picsum.photos/200/300?random=20', '2014-11-01', '00:55:50', '#300ea8', 'Ipsa maxime est quia debitis tenetur mollitia distinctio. Ut quasi et sunt quod.', '<html><head><title>Nesciunt illo animi repellendus omnis reprehenderit.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">aperiam</label><input type=\"text\" id=\"username\"><label for=\"password\">cumque</label><input type=\"password\" id=\"password\"></form><div id=\"2098\"><ul><li>Dolores qui natus.</li><li>Aut esse fugit.</li><li>Vitae eaque ex fugiat.</li><li>Voluptatem eligendi corrupti porro.</li><li>Perferendis voluptatem.</li><li>Necessitatibus ut deserunt.</li><li>Natus labore.</li><li>Nesciunt ipsum eum.</li><li>Facilis earum.</li></ul><a href=\"example.org\">Deleniti inventore sed id facere consequatur ab.</a>Debitis qui esse.</div><div id=\"15871\"></div><div class=\"cum\"></div></body></html>\n', '2025-07-29 11:18:55', '2025-08-03 18:31:51', NULL, 1),
(21, '0rcUb1Hyml', 'fEvFLVYG83', '2760057991437', 'mursita37@yahoo.com', 21, 8967, 7734472, 'Option 4', 'Option 6', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Qui ducimus voluptatibus in tempore dolor dolorem. Porro ea blanditiis dolores voluptates sint.', 'Option 3', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=21', 'https://picsum.photos/200/300?random=21', '1982-03-24', '03:16:34', '#6bf968', 'Et praesentium qui soluta sed eum aut optio. Quo amet enim ut nisi maxime expedita quo.', '<html><head><title>Accusamus labore dolores tenetur nulla ut.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">commodi</label><input type=\"text\" id=\"username\"><label for=\"password\">sequi</label><input type=\"password\" id=\"password\"></form><div id=\"93509\"></div><div id=\"16156\"><div id=\"6590\"></div></div><div id=\"97198\"><div class=\"eaque\"></div><div id=\"8483\"></div></div><div class=\"recusandae\"><b>Cumque eligendi ut inventore voluptas error rerum vero minima quo.</b><b>Vel consequatur modi molestias dolor itaque.</b><h1>Ipsam provident non deleniti consequuntur mollitia voluptatem ab.</h1></div></body></html>\n', '2025-08-11 06:34:00', '2025-08-16 09:01:09', 1, NULL),
(22, 'fUZ8HQUaqx', '3310cpTobD', '8975152595648', 'hartati.soleh@hakim.info', 350, 206, 995525, 'Option 2', 'Option 1', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Dicta maiores quasi odio vel eveniet ut. Voluptatem qui consectetur facilis similique officia nemo.', 'Option 4', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=22', 'https://picsum.photos/200/300?random=22', '1997-09-06', '14:29:24', '#8ab05e', 'Distinctio voluptatem veniam quibusdam ex. Cum atque eum eum odio est quae.', '<html><head><title>Aliquam ea consequatur nulla perferendis nihil culpa minus perspiciatis molestiae mollitia earum accusamus non.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">quae</label><input type=\"text\" id=\"username\"><label for=\"password\">quia</label><input type=\"password\" id=\"password\"></form><div id=\"85252\">Quis possimus ut vero aspernatur ut.<a href=\"example.com\">Repudiandae adipisci nesciunt molestiae veritatis animi nobis ipsum.</a><span>Alias quisquam laudantium aut accusamus.</span></div><div id=\"38438\"><p>Nobis libero ea explicabo doloremque voluptas aut quasi fuga repellat soluta dolorem quam.</p><table><thead><tr><th>Optio.</th><th>Magni maxime corrupti molestias.</th></tr></thead><tbody><tr><td>Minus.</td><td>Sed aperiam omnis possimus.</td></tr><tr><td>Nesciunt consequatur est tenetur eligendi et ratione facilis quos quis consequatur repellendus.</td><td>Ea aspernatur exercitationem qui rerum quo cum ipsam dicta.</td></tr><tr><td>Voluptas voluptatem facilis quos.</td><td>Est qui eius cum alias.</td></tr><tr><td>Facere id sed odit aspernatur eaque aut quia.</td><td>Illum est neque iure expedita et incidunt esse officiis ratione mollitia.</td></tr><tr><td>Nihil assumenda dolor sunt.</td><td>Et mollitia aut est odio ad rem eligendi fugiat.</td></tr><tr><td>Velit.</td><td>Porro velit qui esse ut laudantium delectus qui qui ut.</td></tr><tr><td>Qui itaque architecto distinctio eveniet reprehenderit quaerat fugiat veritatis aut.</td><td>Illum quo.</td></tr><tr><td>Et quia sed suscipit ipsam.</td><td>Velit minus accusantium officiis laudantium.</td></tr><tr><td>Dolorem ducimus quo.</td><td>Eos iste voluptas labore.</td></tr><tr><td>Sint aliquid nemo et recusandae velit illo.</td><td>Maxime minima.</td></tr></tbody></table></div></body></html>\n', '2025-08-12 20:01:29', '2025-08-06 12:15:07', 1, NULL),
(23, '5ejUZQc3h6', 't1Mvp851X3', '8280197919862', 'uchita.haryanto@yahoo.co.id', 309, 117, 7437606, 'Option 4', 'Option 4', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Ipsa laudantium commodi velit fugit. Quia quia autem quod dolor facere molestias.', 'Option 4', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=23', 'https://picsum.photos/200/300?random=23', '2012-10-16', '10:44:48', '#5507af', 'Nisi quam qui ducimus atque quae doloremque aut. Minima sed aut beatae assumenda et sequi.', '<html><head><title>Voluptas neque harum.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">sed</label><input type=\"text\" id=\"username\"><label for=\"password\">voluptatem</label><input type=\"password\" id=\"password\"></form><div id=\"39663\"><div id=\"72375\"></div><div id=\"43595\"><i>Et nihil quis consequatur.</i></div><div class=\"dicta\"></div><div id=\"24002\"></div></div></body></html>\n', '2025-07-25 03:10:32', '2025-08-06 19:27:34', 1, NULL),
(24, 'J9RawHr8E2', 'rMUbpXQLiw', '9862397181813', 'luthfi84@gmail.co.id', 741, 7971, 4431860, 'Option 5', 'Option 10', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Repudiandae adipisci aut assumenda et. Laborum adipisci soluta cupiditate voluptatem.', 'Option 2', '[\"Option 1\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=24', 'https://picsum.photos/200/300?random=24', '1999-01-23', '08:55:09', '#411c4e', 'Officiis aut quisquam omnis dicta nihil et ut. Quidem et aut veniam. Ut minima odio voluptas et.', '<html><head><title>Corrupti architecto quo inventore placeat accusantium ut id architecto porro reprehenderit.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">tenetur</label><input type=\"text\" id=\"username\"><label for=\"password\">nobis</label><input type=\"password\" id=\"password\"></form><div class=\"cum\"><div id=\"45663\"><p>Iste vel provident molestiae tempora rerum ab quae.</p><table><thead><tr><th>Sed numquam mollitia.</th><th>Aut at.</th><th>Dolorem expedita.</th><th>Dolor sint.</th><th>Qui porro quos est recusandae.</th><th>Eum repellendus et.</th></tr></thead><tbody><tr><td>Molestias enim nesciunt ut quas.</td><td>Et dolor quisquam modi vitae vel eos.</td><td>Nemo saepe mollitia quis ea.</td><td>Quo quidem vitae corporis a vero est.</td><td>Molestiae quos vel in.</td><td>Aut consectetur error molestiae.</td></tr><tr><td>Ut.</td><td>Id laboriosam possimus dicta aliquid ex.</td><td>Id iste officiis fuga repellat sed alias.</td><td>Soluta quaerat dicta quia aut aliquid beatae rerum libero sequi.</td><td>Quam odio dolores.</td><td>Totam aut voluptate accusantium id quis hic cumque at doloremque non rerum.</td></tr><tr><td>Voluptatem distinctio odit aut neque nemo excepturi corporis quia repellat perspiciatis nihil nesciunt.</td><td>Voluptas debitis dolorum laborum libero amet.</td><td>Sed et aliquam.</td><td>Suscipit vitae iste necessitatibus repellat ut ut porro asperiores dolorum.</td><td>Reprehenderit error odit error et est ipsam debitis sit neque.</td><td>Dolor omnis et non quod consectetur soluta in et facilis.</td></tr><tr><td>Illo error aut minus eius neque est hic odit quibusdam neque dolorem.</td><td>Voluptas officiis rerum dolorem facere ut.</td><td>Nesciunt sint.</td><td>Quam quisquam autem itaque ullam molestias nesciunt.</td><td>Est.</td><td>Labore ut et esse quisquam enim delectus.</td></tr></tbody></table></div><div id=\"38198\"><table><thead><tr><th>Architecto neque aspernatur.</th><th>Ut ea temporibus.</th><th>Qui earum aut.</th></tr></thead><tbody><tr><td>Sit voluptatem nemo delectus.</td><td>Officia ut eum non.</td><td>Et sunt.</td></tr><tr><td>Tempore aut in et ipsum suscipit vitae perspiciatis.</td><td>Autem officiis laudantium odio enim et qui.</td><td>Maiores quis et modi molestias.</td></tr><tr><td>Quisquam eos incidunt iusto vero cupiditate.</td><td>Sunt at molestiae voluptas cum.</td><td>Quam officia molestias officiis cumque sed officia.</td></tr><tr><td>Suscipit error.</td><td>Esse vel sit ea aliquam voluptatum.</td><td>Repudiandae nisi distinctio.</td></tr><tr><td>Qui voluptatem mollitia.</td><td>Est distinctio quaerat eveniet voluptatibus dolorem blanditiis.</td><td>Magni.</td></tr><tr><td>Commodi soluta sunt.</td><td>Et velit dolore earum voluptate nesciunt doloribus nesciunt.</td><td>Eveniet dolor doloribus nihil natus nobis placeat.</td></tr><tr><td>Excepturi repudiandae voluptatem repellat officia quos fugiat quo.</td><td>Molestiae id ea.</td><td>Dolor similique nobis ullam eius aspernatur.</td></tr><tr><td>Tempora deserunt eaque perspiciatis et.</td><td>Maxime ipsa.</td><td>Culpa modi.</td></tr><tr><td>Odio laudantium non rerum in.</td><td>Quasi eveniet atque eum tempore.</td><td>Fuga omnis iure.</td></tr><tr><td>Laborum neque dolores adipisci mollitia quod hic.</td><td>Tenetur ut consectetur dolorem.</td><td>Unde dolor esse possimus aspernatur iusto similique corporis quam atque sed deserunt aut illum.</td></tr></tbody></table>Eveniet quo adipisci non qui maiores.<p>Numquam eius optio consequatur iure dolor eum sit.</p></div><div class=\"ut\"></div><div id=\"32551\"><b>Voluptas doloribus enim esse.</b></div></div></body></html>\n', '2025-08-10 04:03:20', '2025-08-07 04:02:22', NULL, 1),
(25, 'MjW4qhDqH9', 'ppX4dInKbn', '7985483726179', 'mutia.halim@gmail.com', 764, 183, 9625380, 'Option 7', 'Option 5', '[\"Option 1\"]', 'Minus qui maiores quia illo. Ad autem unde consequuntur. Eum deleniti labore dolores eum.', 'Option 1', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=25', 'https://picsum.photos/200/300?random=25', '2008-04-19', '16:20:26', '#81fea1', 'Labore error quo nostrum est. Hic impedit id est dolore.', '<html><head><title>Explicabo quas sint omnis asperiores nemo voluptatem dolorem aut perferendis.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">aliquid</label><input type=\"text\" id=\"username\"><label for=\"password\">quasi</label><input type=\"password\" id=\"password\"></form><div id=\"38892\"></div><div id=\"41545\"></div><div class=\"culpa\"></div></body></html>\n', '2025-08-07 01:25:24', '2025-08-14 10:48:23', NULL, 1),
(26, 'ZkQEllF3yO', 'tXisML55VO', '1916790358032', 'pwijaya@gmail.com', 943, 1857, 7937081, 'Option 2', 'Option 5', '[\"Option 1\"]', 'Quia vel eveniet ut. Et voluptatum libero tempore et.', 'Option 4', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=26', 'https://picsum.photos/200/300?random=26', '2000-10-30', '14:02:16', '#a17613', 'Fugiat perferendis pariatur ipsam reiciendis. Ut nisi et aut.', '<html><head><title>Qui sed quasi omnis sit veniam ratione optio blanditiis.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">qui</label><input type=\"text\" id=\"username\"><label for=\"password\">itaque</label><input type=\"password\" id=\"password\"></form><div class=\"exercitationem\"><div id=\"16999\"></div><div class=\"ut\"></div></div><div class=\"corporis\"></div><div id=\"89158\"><div class=\"possimus\"></div><div id=\"59480\"></div><div id=\"71368\"><table><thead><tr><th>Libero molestiae debitis.</th><th>Ipsa repellat.</th><th>Non ut.</th><th>Libero ea.</th><th>Molestiae et aperiam.</th></tr></thead><tbody><tr><td>Aut molestiae.</td><td>Laudantium quia est.</td><td>Ut delectus atque corporis eveniet adipisci.</td><td>Ab sint non voluptatem et aspernatur molestiae magni ipsa.</td><td>Eum totam unde totam consequuntur ullam nostrum.</td></tr><tr><td>Commodi dignissimos et qui modi assumenda mollitia quae.</td><td>Pariatur quam est.</td><td>Perspiciatis facilis reiciendis sint laudantium rerum modi ea enim.</td><td>Quas minima id enim aliquid.</td><td>Aut porro sequi et esse aut quos dolor.</td></tr><tr><td>Qui qui eum at et consectetur.</td><td>Aut placeat ullam.</td><td>Laborum asperiores quod.</td><td>Vero dolores magnam praesentium velit nam autem magnam vel esse vel accusantium.</td><td>Laudantium recusandae iure ut nesciunt reiciendis est.</td></tr></tbody></table></div></div><div class=\"suscipit\"></div></body></html>\n', '2025-08-12 07:24:18', '2025-07-27 06:02:54', 1, 1),
(27, 'yk8qsA6pui', '5Eh7TEysEH', '1329020818167', 'agustina.samsul@wibowo.co', 558, 690, 4796674, 'Option 10', 'Option 4', '[\"Option 1\",\"Option 2\"]', 'Aperiam qui similique et iure ut adipisci quis. Perferendis quia ratione neque.', 'Option 4', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=27', 'https://picsum.photos/200/300?random=27', '1999-04-11', '18:11:49', '#bd110a', 'Maiores sit maxime voluptate rerum error ullam. Nam est rerum impedit.', '<html><head><title>Ipsa quod eum.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">sint</label><input type=\"text\" id=\"username\"><label for=\"password\">consectetur</label><input type=\"password\" id=\"password\"></form><div class=\"sed\"><div id=\"5861\"></div><div class=\"officiis\"><h3>Amet fuga explicabo nam nihil.</h3><h2>Laborum architecto quibusdam dolores.</h2></div></div></body></html>\n', '2025-07-29 10:55:10', '2025-07-26 07:52:40', NULL, 1),
(28, 'VF6gZ34M2h', 'mROgEBlxJj', '8628874042739', 'widya55@kusmawati.sch.id', 124, 3804, 1841048, 'Option 4', 'Option 8', '[\"Option 1\",\"Option 2\"]', 'Nihil hic autem et aspernatur. Impedit non omnis deserunt odio aut.', 'Option 1', '[\"Option 1\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=28', 'https://picsum.photos/200/300?random=28', '1974-09-01', '12:03:05', '#4a0110', 'Incidunt non non explicabo libero. Molestiae minus id quia sed non doloribus tenetur doloremque.', '<html><head><title>Ipsam quia non voluptatum omnis sit ipsa ab rerum nulla sint eum.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">nostrum</label><input type=\"text\" id=\"username\"><label for=\"password\">itaque</label><input type=\"password\" id=\"password\"></form><div class=\"animi\"></div><div class=\"sed\"></div><div class=\"laudantium\"></div></body></html>\n', '2025-07-31 18:17:38', '2025-08-05 06:36:23', NULL, NULL),
(29, 'sAPFEtTM0v', 'I1lPTFj6h4', '1660292005276', 'ctamba@yahoo.co.id', 451, 8044, 2994932, 'Option 1', 'Option 6', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Vel quo inventore temporibus dolorum natus. Est pariatur libero ducimus sit.', 'Option 1', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=29', 'https://picsum.photos/200/300?random=29', '1990-12-11', '08:04:31', '#11e688', 'Omnis odio quia fugit. Minima unde quia ex sint consectetur adipisci.', '<html><head><title>Delectus dolores at possimus voluptatem ex.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">nihil</label><input type=\"text\" id=\"username\"><label for=\"password\">laudantium</label><input type=\"password\" id=\"password\"></form><div class=\"voluptatem\"></div></body></html>\n', '2025-08-03 00:05:55', '2025-08-11 20:16:25', NULL, NULL),
(30, 'A59da0zc9l', 'L4kChC1xXM', '1244118818228', 'fsuwarno@zulaika.my.id', 295, 6506, 5407450, 'Option 6', 'Option 7', '[\"Option 1\",\"Option 2\"]', 'Ratione voluptatem odio at facilis qui. Sequi eos blanditiis voluptatem aspernatur et aut.', 'Option 2', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=30', 'https://picsum.photos/200/300?random=30', '2010-03-31', '17:09:21', '#7b5c93', 'Illum illum doloremque magnam corrupti voluptatem sunt. Et quia cumque neque ut placeat qui.', '<html><head><title>Velit in commodi consequatur nesciunt ipsa.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">quaerat</label><input type=\"text\" id=\"username\"><label for=\"password\">ipsa</label><input type=\"password\" id=\"password\"></form><div class=\"unde\"><div id=\"66542\"></div><div id=\"26094\"><b>Recusandae dolor dolorem totam reiciendis perferendis nisi itaque.</b>Vitae aut sed.</div><div class=\"delectus\"></div></div><div class=\"aut\"><div id=\"38595\"></div><div class=\"accusamus\"></div><div id=\"17468\"></div></div></body></html>\n', '2025-08-07 14:37:03', '2025-08-06 08:27:37', NULL, NULL),
(31, 'cTGzgozJob', 'a3N7kGdj3y', '7424458917254', 'kania25@natsir.desa.id', 619, 6830, 6292726, 'Option 3', 'Option 3', '[\"Option 1\"]', 'Quia et et quaerat aut reprehenderit. Delectus et rem quidem quibusdam.', 'Option 2', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=31', 'https://picsum.photos/200/300?random=31', '1996-11-24', '05:09:44', '#319613', 'Non sed et a qui. Doloribus perspiciatis asperiores nisi a nihil. Animi assumenda et quo.', '<html><head><title>Voluptatem voluptate blanditiis.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">et</label><input type=\"text\" id=\"username\"><label for=\"password\">consequatur</label><input type=\"password\" id=\"password\"></form><div class=\"consequatur\"><div class=\"ipsa\"></div></div></body></html>\n', '2025-08-17 19:44:33', '2025-08-12 11:39:04', 1, NULL),
(32, '6DhoMOxemz', 'y6mAS5Hv0O', '8178032109519', 'handayani.parman@rahmawati.or.id', 818, 2857, 546479, 'Option 6', 'Option 5', '[\"Option 1\",\"Option 2\"]', 'Qui repellat in est distinctio rerum sed. Quo facilis explicabo velit at beatae.', 'Option 4', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=32', 'https://picsum.photos/200/300?random=32', '1982-05-10', '19:19:12', '#932c99', 'Quam quod nostrum maiores quos atque. Alias dolores ipsam quas. Totam non non nihil laudantium.', '<html><head><title>Natus fuga culpa qui aperiam.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">facere</label><input type=\"text\" id=\"username\"><label for=\"password\">ut</label><input type=\"password\" id=\"password\"></form><div id=\"64483\"><ul><li>Minus reprehenderit quaerat.</li><li>Ut autem ea.</li><li>At et.</li><li>Vero quas.</li><li>Corrupti.</li><li>Dolor maiores vel.</li><li>Rerum odio ullam.</li></ul><span>Labore cupiditate est vel quia.</span></div><div id=\"87716\"><div class=\"dolor\"><h2>Ut est atque eaque.</h2><table><thead><tr><th>Inventore repudiandae sapiente.</th><th>Quo quasi porro.</th><th>Autem autem.</th></tr></thead><tbody><tr><td>Incidunt eveniet et.</td><td>Iure nobis doloribus.</td><td>Asperiores et.</td></tr><tr><td>Possimus fugiat nihil.</td><td>Non necessitatibus voluptas est aliquid.</td><td>Reprehenderit aut voluptatem quaerat necessitatibus et est qui qui natus ex quod.</td></tr><tr><td>Consequatur temporibus.</td><td>Dolor adipisci dolores sed sit atque praesentium saepe.</td><td>Optio enim fuga est.</td></tr></tbody></table><span>Quis nostrum officiis iure deleniti in.</span><ul><li>Et animi maiores debitis.</li><li>Eaque eaque facere neque quibusdam autem.</li><li>Aspernatur corporis debitis voluptas quaerat vel.</li><li>Veritatis culpa qui error.</li><li>Reprehenderit repellendus id.</li><li>Iusto et eligendi quo.</li><li>Incidunt quia quam odio qui.</li><li>Unde odio fugit aut expedita.</li><li>Debitis nam quaerat.</li></ul></div><div id=\"54561\"></div></div><div id=\"75371\">Perferendis consectetur accusamus adipisci.</div><div class=\"voluptas\">Aut qui aut cumque mollitia ut nostrum.<span>Dolorem est nobis.</span><table><thead><tr><th>Velit et ut cupiditate quasi eum.</th><th>Est numquam.</th><th>Eos eius qui dignissimos itaque.</th></tr></thead><tbody><tr><td>Voluptatem cum praesentium et eos soluta quibusdam hic accusamus animi quo et.</td><td>Beatae placeat sint eligendi accusantium iure voluptatem.</td><td>Ut veritatis quia qui necessitatibus.</td></tr><tr><td>Rerum sunt ea similique distinctio cum sed vel qui quisquam adipisci.</td><td>Magni illo maiores.</td><td>In minima non molestiae recusandae autem.</td></tr><tr><td>Nostrum sit odio est omnis.</td><td>Dolore omnis pariatur laudantium nam sunt maxime molestias asperiores.</td><td>Error dolore.</td></tr><tr><td>Eos dolorum consequatur facilis fugiat ex consequatur eos rerum.</td><td>Earum quo.</td><td>Et provident veniam iste rem sed.</td></tr><tr><td>Voluptas consectetur ullam adipisci rem illo vero minus.</td><td>Nam distinctio architecto veniam asperiores itaque accusamus.</td><td>Vero.</td></tr><tr><td>Rerum quo officia nemo velit qui quidem.</td><td>Itaque.</td><td>Cupiditate impedit aperiam est.</td></tr></tbody></table></div></body></html>\n', '2025-08-07 22:16:05', '2025-08-03 22:29:14', 1, 1);
INSERT INTO `crud_examples` (`id`, `text`, `barcode`, `qr_code`, `email`, `number`, `currency`, `currency_idr`, `select`, `select2`, `select2_multiple`, `textarea`, `radio`, `checkbox`, `checkbox2`, `tags`, `file`, `image`, `date`, `time`, `color`, `summernote_simple`, `summernote`, `created_at`, `updated_at`, `created_by_id`, `last_updated_by_id`) VALUES
(33, 'f277GNWB6P', '1hBU4Env5a', '6340866744316', 'jasmani47@mardhiyah.sch.id', 258, 2884, 1703991, 'Option 7', 'Option 4', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Labore unde est exercitationem voluptas. Quia nihil optio dolorem consequatur.', 'Option 2', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=33', 'https://picsum.photos/200/300?random=33', '2019-05-13', '18:11:01', '#eecdd4', 'Et tenetur earum est aspernatur odio iusto. Mollitia eum non voluptates consequatur.', '<html><head><title>Quia voluptatibus.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">praesentium</label><input type=\"text\" id=\"username\"><label for=\"password\">quas</label><input type=\"password\" id=\"password\"></form><div id=\"74542\"></div><div class=\"voluptate\"></div><div class=\"est\"><h1>Fugit consectetur.</h1></div></body></html>\n', '2025-08-16 15:19:12', '2025-08-10 05:51:52', NULL, NULL),
(34, '6SPiB3oe2a', 'a0dD6j1uep', '1369795169309', 'nasyidah.melinda@mandala.tv', 892, 885, 5680442, 'Option 9', 'Option 2', '[\"Option 1\"]', 'Aut est aliquid sit. Omnis adipisci exercitationem velit ex fugit.', 'Option 3', '[\"Option 1\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=34', 'https://picsum.photos/200/300?random=34', '2016-04-17', '14:06:42', '#13cf1f', 'Ipsum est earum fugit non exercitationem. Voluptatem sed et perferendis eum ad aut.', '<html><head><title>Nobis est vel laudantium impedit delectus voluptas aut nisi temporibus cumque.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">hic</label><input type=\"text\" id=\"username\"><label for=\"password\">alias</label><input type=\"password\" id=\"password\"></form><div id=\"29863\"><div id=\"66295\"></div><div class=\"rerum\"></div><div class=\"eos\"></div><div id=\"75395\"></div></div></body></html>\n', '2025-08-13 23:35:42', '2025-07-30 06:47:32', 1, 1),
(35, 'EPze3VGMBb', '1EpIHkDiDH', '4706724239745', 'smangunsong@yahoo.com', 346, 688, 5478746, 'Option 6', 'Option 1', '[\"Option 1\",\"Option 2\"]', 'Perferendis quam nobis perferendis. Explicabo omnis ad tenetur excepturi.', 'Option 3', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=35', 'https://picsum.photos/200/300?random=35', '1987-12-28', '00:21:09', '#0d8df7', 'Voluptatibus consectetur et tenetur eius nam. Atque et aliquam consequuntur non.', '<html><head><title>Sed aliquam eveniet qui quibusdam.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">et</label><input type=\"text\" id=\"username\"><label for=\"password\">eligendi</label><input type=\"password\" id=\"password\"></form><div id=\"47584\"></div><div class=\"voluptate\"></div><div id=\"83340\"></div><div class=\"expedita\">Qui deleniti eaque deleniti et veritatis voluptas accusantium perspiciatis aspernatur porro et reiciendis magni.<p>Repellendus velit nobis temporibus impedit ipsa id.</p></div></body></html>\n', '2025-08-13 12:14:24', '2025-08-17 08:38:30', 1, NULL),
(36, 'v3b8uH1zJZ', 'Il6KIuqp8d', '9507430017079', 'prasasta.zelaya@nasyidah.my.id', 915, 6621, 1743434, 'Option 6', 'Option 6', '[\"Option 1\",\"Option 2\"]', 'Voluptas quidem sint illo harum odit sit pariatur. Quia non sint sed et delectus alias et.', 'Option 4', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=36', 'https://picsum.photos/200/300?random=36', '2021-06-19', '04:44:25', '#9dee81', 'Totam corrupti quia quia vitae. Est minima eveniet qui aliquid. Unde consectetur nesciunt qui.', '<html><head><title>Explicabo quaerat ipsa molestias vitae aut non nostrum ad commodi asperiores autem fugit.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">sed</label><input type=\"text\" id=\"username\"><label for=\"password\">corporis</label><input type=\"password\" id=\"password\"></form><div class=\"sequi\"><div class=\"iusto\"></div><div id=\"96506\"></div></div><div id=\"83906\">Nihil sit molestiae.<ul><li>Quis ut veritatis.</li><li>Ipsa voluptas non.</li></ul></div></body></html>\n', '2025-08-14 19:25:25', '2025-07-30 05:51:12', NULL, 1),
(37, '0owmoj6M23', '5SbbcsnZqb', '5750334714764', 'arajasa@yahoo.com', 33, 8541, 6475896, 'Option 10', 'Option 4', '[\"Option 1\",\"Option 2\"]', 'Natus quae minima rerum asperiores. Nostrum voluptas similique fugiat.', 'Option 3', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=37', 'https://picsum.photos/200/300?random=37', '2001-05-13', '17:50:55', '#ab6fb7', 'Ut dolor eum molestias illo soluta. Accusantium et quo ipsum. Ipsam ipsa sed ab qui.', '<html><head><title>Repellat odio dicta aliquam aliquid quis.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">consequatur</label><input type=\"text\" id=\"username\"><label for=\"password\">necessitatibus</label><input type=\"password\" id=\"password\"></form><div id=\"50851\"><div class=\"et\"><span>Qui eveniet quia quae odio eaque aliquam magni.</span></div><div class=\"quae\"><h3>Ea dolores amet et molestias hic voluptatem.</h3><ul><li>Sapiente exercitationem aspernatur.</li><li>Eum officiis.</li><li>Nesciunt non autem.</li><li>Iure ullam at.</li><li>Aut ea id tempora.</li><li>Nostrum nihil ut.</li><li>Quibusdam ratione delectus.</li><li>Quo animi omnis quia.</li></ul><i>Ut molestias hic eum.</i></div><div class=\"vel\"></div><div class=\"et\"></div></div><div class=\"fugiat\"></div><div class=\"autem\"></div></body></html>\n', '2025-08-18 12:34:27', '2025-08-06 22:25:25', 1, NULL),
(38, 'Bhn142KF41', '7LB2nxNAom', '2434299731457', 'lega57@purnawati.net', 675, 1658, 4026655, 'Option 1', 'Option 6', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Et iste aut et eos et. Quo laudantium sit quia et. Eligendi ipsa iste laborum aut.', 'Option 3', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=38', 'https://picsum.photos/200/300?random=38', '1985-03-06', '20:19:40', '#f6f855', 'Quidem est voluptatem vel. Non assumenda suscipit maiores quisquam eaque. Id soluta sunt quaerat.', '<html><head><title>Accusantium saepe sed ut incidunt delectus aliquid quia quo.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">et</label><input type=\"text\" id=\"username\"><label for=\"password\">facere</label><input type=\"password\" id=\"password\"></form><div id=\"43460\"></div></body></html>\n', '2025-08-09 07:05:15', '2025-08-17 21:54:19', 1, NULL),
(39, 'PhkDREr9v0', 'C92nfKZUxL', '3095980072700', 'habibi.asmianto@gmail.co.id', 79, 6580, 6764083, 'Option 4', 'Option 1', '[\"Option 1\"]', 'Aliquam sint voluptas sint animi a. Qui doloribus sed veniam nihil et cum assumenda ratione.', 'Option 3', '[\"Option 1\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=39', 'https://picsum.photos/200/300?random=39', '1987-01-27', '23:32:55', '#336f78', 'Perspiciatis voluptas animi ipsam. Odit quas amet omnis ut. Dolore aliquid iure dolores a dolorum.', '<html><head><title>Aspernatur ipsam consequatur ut dolor quis.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">quia</label><input type=\"text\" id=\"username\"><label for=\"password\">amet</label><input type=\"password\" id=\"password\"></form><div id=\"71147\"><div class=\"sunt\"></div><div id=\"88470\"><span>Doloribus reiciendis vitae itaque tempore velit est voluptatem nostrum assumenda eligendi.</span><p>Reprehenderit dolorem necessitatibus maiores voluptas est ab.</p><i>Hic qui.</i><h3>Porro sequi enim velit iste id.</h3></div><div class=\"cumque\"></div></div><div id=\"99142\"><div id=\"20480\"></div><div id=\"95743\"><table><thead><tr><th>Aut eveniet cumque fugiat.</th><th>Explicabo corporis.</th><th>Commodi aut neque ut.</th><th>Harum molestiae rerum.</th></tr></thead><tbody><tr><td>Earum ut dicta mollitia.</td><td>Aut qui ex autem magnam ad eos deleniti numquam enim sequi inventore.</td><td>Amet animi est illum rem rerum ut sit.</td><td>Sit culpa porro possimus.</td></tr><tr><td>Repellendus perspiciatis incidunt totam aut et voluptatem dicta.</td><td>Maxime.</td><td>Qui quia quos dolor pariatur.</td><td>Id id quos dolor magni ut et ad.</td></tr><tr><td>Atque quia.</td><td>Qui accusantium cumque.</td><td>Aut et atque ut.</td><td>Sint reiciendis ullam ea fugiat et natus similique sequi omnis.</td></tr><tr><td>Ab iusto accusantium maiores error ut.</td><td>Perferendis aut facilis qui.</td><td>Nihil est non sequi numquam facilis.</td><td>Ipsa repellat occaecati.</td></tr><tr><td>Molestiae nesciunt sunt eveniet.</td><td>Ut reprehenderit unde culpa dolor beatae nisi molestiae beatae laborum.</td><td>Voluptas dolores.</td><td>Illo deserunt dolorum provident sint rerum nisi esse ullam.</td></tr><tr><td>Excepturi optio et architecto qui iusto unde.</td><td>Qui molestiae pariatur commodi debitis.</td><td>A libero sit quasi ab.</td><td>Tempore.</td></tr><tr><td>Vitae libero expedita.</td><td>Reprehenderit et rerum rerum molestiae repellat.</td><td>Odio.</td><td>Sunt ut.</td></tr></tbody></table>Est nostrum magnam dolor quos maxime laboriosam at qui vel.<ul><li>Deleniti quis.</li><li>Corporis provident assumenda odit.</li><li>Error quos velit.</li><li>Dolor quis perferendis placeat.</li><li>Sunt.</li><li>Quas molestias doloremque.</li><li>Eligendi odit.</li><li>Rem ipsa.</li></ul></div><div class=\"et\"></div><div class=\"maiores\"></div></div><div id=\"82753\"><div class=\"nobis\"></div><div id=\"91452\"><p>Et et non quidem.</p>Ut necessitatibus maiores mollitia consequatur sint laborum mollitia autem explicabo accusantium ipsa.</div></div></body></html>\n', '2025-08-16 17:48:50', '2025-08-13 15:53:11', 1, NULL),
(40, 'lQZep7VZ4s', 'H3ddehDRTj', '0533312103683', 'dono.nashiruddin@yahoo.co.id', 366, 6619, 8637327, 'Option 3', 'Option 3', '[\"Option 1\",\"Option 2\"]', 'Quisquam assumenda magni architecto quibusdam aliquid adipisci. Explicabo quis est in et velit.', 'Option 4', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=40', 'https://picsum.photos/200/300?random=40', '1971-11-13', '17:38:10', '#d4f5d7', 'Corrupti voluptatem iste et unde. Nesciunt at ea suscipit asperiores odio nihil saepe culpa.', '<html><head><title>Labore voluptas culpa.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">aliquam</label><input type=\"text\" id=\"username\"><label for=\"password\">voluptatem</label><input type=\"password\" id=\"password\"></form><div class=\"perspiciatis\"></div></body></html>\n', '2025-07-22 12:17:49', '2025-08-05 07:16:57', NULL, 1),
(41, 'FnfmnkIAt1', 'r83rVL4heN', '9237338545748', 'halim22@gmail.com', 976, 4235, 4322932, 'Option 2', 'Option 2', '[\"Option 1\"]', 'Qui iusto et veniam omnis veritatis est. Enim nulla inventore accusantium et voluptatem.', 'Option 4', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=41', 'https://picsum.photos/200/300?random=41', '2021-06-12', '22:51:52', '#34f13d', 'Veniam assumenda eum enim rem. Cumque eum est voluptas et facilis. Sed atque et non.', '<html><head><title>Ad ipsum voluptatum repellendus sequi.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">voluptas</label><input type=\"text\" id=\"username\"><label for=\"password\">quibusdam</label><input type=\"password\" id=\"password\"></form><div id=\"21802\"></div><div class=\"rerum\"><b>Quis est laudantium ullam autem similique sed natus.</b><span>Repellat debitis.</span></div><div id=\"52724\"></div><div id=\"98554\"><p>Quaerat quidem nostrum et.</p></div></body></html>\n', '2025-08-06 20:17:00', '2025-08-06 21:18:30', NULL, 1),
(42, 'ulFyjQ24qV', 'b6g5Fj9seR', '2007522397203', 'cici.maryati@nurdiyanti.co.id', 358, 3095, 8169467, 'Option 7', 'Option 9', '[\"Option 1\",\"Option 2\"]', 'Suscipit repellat aut quas voluptatem odit quia. Consequatur est assumenda odit.', 'Option 1', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=42', 'https://picsum.photos/200/300?random=42', '2015-08-21', '20:43:29', '#231d48', 'Aut quis ullam aut exercitationem dolor atque aperiam ut. Architecto a laudantium beatae enim est.', '<html><head><title>Inventore voluptatibus sed repellat est.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">soluta</label><input type=\"text\" id=\"username\"><label for=\"password\">et</label><input type=\"password\" id=\"password\"></form><div id=\"49673\"><div id=\"96907\"></div><div class=\"soluta\">Possimus maxime odit sit nobis placeat et ut quo repellat.<i>Ut dolor sed hic vero corrupti vel illo tempora hic qui.</i><p>Libero quasi.</p>Exercitationem repudiandae consectetur qui inventore explicabo.</div><div class=\"et\"></div><div id=\"39110\"><p>Et itaque repudiandae qui nobis occaecati est voluptatem voluptatum.</p><span>Id quia omnis facere et blanditiis fugit.</span></div></div></body></html>\n', '2025-08-16 18:06:51', '2025-08-15 17:37:09', NULL, 1),
(43, 'RbXjiOG3Kh', '7AANSGH4k2', '6087828121593', 'kanda38@gmail.co.id', 939, 6727, 6135833, 'Option 1', 'Option 6', '[\"Option 1\"]', 'Ut laboriosam nesciunt ut nemo. Et repudiandae sed laborum perspiciatis eius non.', 'Option 3', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=43', 'https://picsum.photos/200/300?random=43', '2003-05-31', '05:00:15', '#a8b14c', 'Ea placeat quia omnis. Et dicta reprehenderit aut fugiat.', '<html><head><title>Tenetur totam quis sunt adipisci sint enim.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">nesciunt</label><input type=\"text\" id=\"username\"><label for=\"password\">est</label><input type=\"password\" id=\"password\"></form><div class=\"molestiae\"></div><div class=\"labore\"><ul><li>Nemo soluta deserunt.</li><li>Facilis sed temporibus iure odit.</li><li>Dolorem.</li><li>Eligendi inventore laborum libero ut.</li><li>Ut molestiae.</li><li>Est rerum sit harum aut.</li></ul><ul><li>Consequatur dolor.</li><li>Inventore autem consequatur culpa molestias.</li><li>Quas unde.</li><li>Et qui dolore.</li><li>Sint id.</li><li>Quaerat harum.</li><li>Itaque facere placeat adipisci.</li><li>Nam sapiente.</li><li>Officia.</li></ul><table><thead><tr><th>Ut omnis velit iusto ut suscipit.</th><th>Iusto inventore.</th></tr></thead><tbody><tr><td>Porro cumque et.</td><td>Quia dolor distinctio maiores aut eos repellendus.</td></tr><tr><td>Tenetur ut alias.</td><td>Placeat quia praesentium.</td></tr><tr><td>Nihil eaque.</td><td>Consequatur nobis.</td></tr><tr><td>Omnis tenetur.</td><td>Est saepe.</td></tr><tr><td>Ratione quia officiis sed sunt.</td><td>Alias harum ipsa ab maxime enim omnis minima voluptas commodi modi provident possimus sed vel.</td></tr><tr><td>Et cupiditate consectetur.</td><td>Ut ducimus quasi reprehenderit nesciunt consequatur.</td></tr><tr><td>Quia et facilis amet dolores quam ipsa illum.</td><td>Dolor quae ab perspiciatis.</td></tr><tr><td>Quia id neque quia et amet.</td><td>Distinctio commodi sit enim voluptate officia hic harum ut.</td></tr></tbody></table><h1>Dolore maxime aut dolorum itaque temporibus quam suscipit explicabo beatae.</h1></div><div id=\"73399\"><table><thead><tr><th>Placeat quis adipisci aut quo.</th><th>Distinctio quis.</th><th>Accusamus dolorum.</th><th>Dolorem.</th><th>Illum.</th></tr></thead><tbody><tr><td>Hic recusandae reiciendis tenetur temporibus.</td><td>Harum saepe voluptatem iure quas id est expedita quis totam quisquam.</td><td>Omnis quas eum sint sequi quidem asperiores est sapiente et nostrum.</td><td>Ea odit labore quaerat pariatur voluptatem.</td><td>Sint consequatur vel dolore molestiae voluptatem mollitia beatae rerum atque debitis aliquam expedita impedit.</td></tr><tr><td>Aliquid repellat.</td><td>Aperiam.</td><td>Quasi soluta.</td><td>Quia consequuntur neque harum accusantium quod quod.</td><td>Et eos labore aspernatur voluptatem delectus adipisci eum suscipit cum atque.</td></tr><tr><td>Et praesentium voluptas et et qui commodi est iusto dolorem consequatur deleniti est debitis.</td><td>In illo laudantium et laborum animi animi.</td><td>Modi nisi ut laboriosam praesentium quo sequi placeat.</td><td>Ipsa molestiae dolores eum et quis molestiae sit qui ut.</td><td>Sed ut voluptas sit minima ipsam a pariatur.</td></tr><tr><td>Atque voluptatum voluptatem beatae quam sint debitis.</td><td>Hic esse vero quo mollitia animi eum.</td><td>Libero molestiae non est omnis illo.</td><td>Et ut quisquam.</td><td>Id aut qui ut quasi perspiciatis.</td></tr><tr><td>Pariatur aut eum dolores tempora repellendus.</td><td>Consectetur nulla iure.</td><td>Blanditiis illum aut nulla iste aliquid non veniam ut.</td><td>Ex deleniti animi vitae.</td><td>Reiciendis consequatur illo dolorum.</td></tr></tbody></table></div></body></html>\n', '2025-07-20 11:22:59', '2025-07-20 01:28:19', NULL, NULL),
(44, 'FFgGKeBY2P', 'IGpFd6LcRQ', '0962462938942', 'mdongoran@halimah.biz', 433, 9090, 621804, 'Option 4', 'Option 10', '[\"Option 1\"]', 'Itaque iure porro iure iure velit. Ab error delectus id odio ex mollitia.', 'Option 4', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=44', 'https://picsum.photos/200/300?random=44', '1989-12-06', '02:30:37', '#5d6d76', 'Sunt deleniti in sit ut aut. Odit magni perspiciatis quod optio modi et.', '<html><head><title>Doloribus.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">illo</label><input type=\"text\" id=\"username\"><label for=\"password\">mollitia</label><input type=\"password\" id=\"password\"></form><div class=\"ut\"><b>Ex consequuntur ut ab voluptas voluptatum at qui hic.</b><a href=\"example.com\">Quia magnam consectetur velit iste sunt molestias.</a></div></body></html>\n', '2025-07-29 10:13:25', '2025-08-02 12:10:41', NULL, 1),
(45, 'sivGMqxO9r', 'ycnvBSg0El', '6209350492457', 'elvin18@yahoo.com', 894, 952, 6782763, 'Option 4', 'Option 3', '[\"Option 1\"]', 'Sint sit veniam placeat dolores reprehenderit. Quaerat fuga quae voluptas eum magni.', 'Option 1', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=45', 'https://picsum.photos/200/300?random=45', '2002-01-02', '14:22:13', '#99f9ff', 'Quasi quo voluptas a. Repellendus officia et libero itaque dolor qui ipsam.', '<html><head><title>Adipisci libero delectus dolorum praesentium non saepe eius corrupti eos.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">aliquid</label><input type=\"text\" id=\"username\"><label for=\"password\">quibusdam</label><input type=\"password\" id=\"password\"></form><div class=\"repellat\"></div></body></html>\n', '2025-07-28 05:56:09', '2025-08-09 08:59:06', 1, NULL),
(46, 'fp9AJGBp1v', 'fNNHxdU4ur', '7673946936677', 'smaryadi@puspita.co', 906, 1717, 9157213, 'Option 9', 'Option 7', '[\"Option 1\"]', 'Hic saepe vel velit in. Repudiandae sunt at inventore aliquid repudiandae.', 'Option 3', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=46', 'https://picsum.photos/200/300?random=46', '2017-09-28', '15:46:23', '#52004b', 'Voluptatem dolorem laudantium dolores. Esse porro error ad ea earum ipsum ea.', '<html><head><title>Inventore rerum quidem cupiditate minima.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">facere</label><input type=\"text\" id=\"username\"><label for=\"password\">explicabo</label><input type=\"password\" id=\"password\"></form><div class=\"mollitia\">Officiis veritatis laborum totam aut illum.Necessitatibus autem cumque aut debitis dolorem cum.<span>Nostrum dolorum nihil deserunt.</span>Qui quam quidem at quo reiciendis velit.</div></body></html>\n', '2025-07-29 05:54:37', '2025-08-15 01:05:52', 1, NULL),
(47, '6DFZZASwpA', 'kiljVSwPLs', '0518477610085', 'tari.tamba@saragih.co.id', 141, 7002, 7843165, 'Option 3', 'Option 4', '[\"Option 1\"]', 'Dolores occaecati sed qui incidunt. Sint ea quaerat blanditiis nisi.', 'Option 4', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=47', 'https://picsum.photos/200/300?random=47', '1978-02-26', '12:24:35', '#e1f738', 'Et quos earum ex. Sit atque animi et. Dicta voluptas qui qui sed. Et et ipsum nihil ut vel.', '<html><head><title>Dicta.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">qui</label><input type=\"text\" id=\"username\"><label for=\"password\">ullam</label><input type=\"password\" id=\"password\"></form><div id=\"79521\">Magnam omnis neque sint.<i>Doloribus deserunt et perferendis totam aut nobis est.</i><i>Atque quibusdam.</i>Eum eius consequatur sapiente quasi et assumenda at.</div></body></html>\n', '2025-07-23 09:53:36', '2025-08-04 02:24:25', 1, 1),
(48, 'OkHKuwIs22', 'NS349ufgFB', '4817281925238', 'simbolon.uchita@gmail.co.id', 551, 1343, 7536953, 'Option 10', 'Option 9', '[\"Option 1\"]', 'Assumenda perspiciatis neque sint dolor ipsam voluptas dolor. Fuga facilis ut beatae accusantium.', 'Option 2', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=48', 'https://picsum.photos/200/300?random=48', '1992-05-22', '00:26:34', '#d506b2', 'Sed non dolorum porro vero ea. Quo incidunt ab id ab et. Natus in quisquam aliquid esse.', '<html><head><title>Et ut qui necessitatibus nihil ad quibusdam praesentium voluptate maxime quod excepturi fugiat.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">et</label><input type=\"text\" id=\"username\"><label for=\"password\">qui</label><input type=\"password\" id=\"password\"></form><div id=\"26074\"><b>Sit beatae repellendus cumque et.</b><table><thead><tr><th>Earum eos.</th><th>Expedita ut voluptas asperiores impedit.</th></tr></thead><tbody><tr><td>Saepe nihil facilis aperiam quia eveniet et est porro.</td><td>Iste consequatur nesciunt dolor et voluptatibus delectus non.</td></tr><tr><td>Quod vitae consequuntur numquam voluptates vel et vitae tempora perferendis magnam consequatur.</td><td>Autem magnam fugiat optio maiores.</td></tr><tr><td>Maxime repudiandae omnis nam similique alias culpa eius laborum est est fugiat et.</td><td>Placeat deserunt laborum hic repellat ratione quidem sint.</td></tr><tr><td>Minima sint facere odio consequatur consequatur consequatur vel aut quos sint.</td><td>Cupiditate aut provident minus quibusdam qui quos autem.</td></tr><tr><td>Ut voluptates harum quis.</td><td>Dolore quibusdam omnis eos sapiente qui est officia hic aut occaecati officiis sint autem.</td></tr><tr><td>Ut illum optio ut eos fugit atque ut.</td><td>Excepturi dolorem at consequatur omnis similique et praesentium aperiam numquam officia necessitatibus rem et nisi.</td></tr></tbody></table></div></body></html>\n', '2025-08-01 16:41:47', '2025-07-19 16:40:48', NULL, NULL),
(49, 'igV3szVo1F', 'BFBffsT15m', '7203220885614', 'pudjiastuti.hamima@pratiwi.biz', 538, 3241, 134330, 'Option 9', 'Option 2', '[\"Option 1\",\"Option 2\"]', 'Voluptates cupiditate exercitationem est quam. Qui distinctio ab quisquam.', 'Option 4', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=49', 'https://picsum.photos/200/300?random=49', '1975-06-29', '21:38:30', '#97a391', 'Quasi quisquam aut ut. Nihil excepturi natus minima eaque ad sunt reiciendis.', '<html><head><title>Omnis aliquam quos nisi vitae velit eaque.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">velit</label><input type=\"text\" id=\"username\"><label for=\"password\">itaque</label><input type=\"password\" id=\"password\"></form><div class=\"cumque\"><table><thead><tr><th>Voluptatibus animi.</th><th>Animi vitae molestias vitae.</th></tr></thead><tbody><tr><td>Earum est eum alias mollitia quidem animi.</td><td>Distinctio ex numquam autem officia.</td></tr><tr><td>Commodi eligendi amet earum est modi accusamus.</td><td>Aliquam itaque deleniti nobis sint vero qui excepturi placeat.</td></tr><tr><td>Ut excepturi consequatur illo voluptas nisi id amet tempore voluptas voluptas ducimus magnam.</td><td>Earum esse ut laboriosam.</td></tr><tr><td>Quia.</td><td>Sit expedita.</td></tr><tr><td>Iure voluptates sit doloremque officiis mollitia ut.</td><td>Et odio explicabo.</td></tr></tbody></table><b>Qui voluptas reiciendis iste occaecati consequuntur ut.</b><span>Ut ut cumque incidunt vero debitis ea magnam ut aut.</span></div></body></html>\n', '2025-08-03 22:19:02', '2025-08-11 03:14:55', NULL, NULL),
(50, 'T8NvcFbchz', 'R09Y9NfmPn', '6500734865059', 'cdabukke@winarno.biz.id', 910, 2466, 459844, 'Option 6', 'Option 5', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Aut ea dolorem et molestias. Unde deserunt veniam delectus neque qui quasi maxime.', 'Option 3', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=50', 'https://picsum.photos/200/300?random=50', '1988-08-24', '09:42:32', '#9132a7', 'Dolor eaque unde sed. Tempora accusantium magnam mollitia aut in sit.', '<html><head><title>Laboriosam velit et ullam voluptas fugiat rerum iure quia.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">in</label><input type=\"text\" id=\"username\"><label for=\"password\">error</label><input type=\"password\" id=\"password\"></form><div id=\"73597\"></div><div class=\"nam\"></div></body></html>\n', '2025-08-16 21:35:40', '2025-08-01 15:33:33', 1, 1),
(51, 'kkqzpvMdyu', 'jZM61kTGOh', '8536854487879', 'zharyanti@suryono.biz', 353, 8569, 71976, 'Option 1', 'Option 7', '[\"Option 1\",\"Option 2\"]', 'Id aut doloribus iste. Vitae occaecati aut ducimus non quod qui. Natus qui dolore pariatur enim.', 'Option 1', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=51', 'https://picsum.photos/200/300?random=51', '1990-03-18', '11:33:25', '#1edddd', 'Quo perferendis et qui maxime. Ea unde sapiente aspernatur quaerat vel laboriosam nam molestias.', '<html><head><title>Quia dicta voluptas porro magnam blanditiis laudantium ipsam cupiditate reprehenderit.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">aut</label><input type=\"text\" id=\"username\"><label for=\"password\">iste</label><input type=\"password\" id=\"password\"></form><div id=\"85846\"></div><div id=\"21729\">Architecto ut porro neque aut qui fugit.</div><div id=\"83183\"><div id=\"91246\"></div><div class=\"et\">Hic provident nostrum corrupti non aperiam architecto maxime aut.<a href=\"example.com\">Perspiciatis nobis.</a><h2>Blanditiis dignissimos fugit autem.</h2></div></div><div id=\"22586\"><span>Soluta.</span></div></body></html>\n', '2025-08-13 08:48:58', '2025-07-20 13:56:52', 1, 1),
(52, 'zrSZe1WCez', 'm04QGrJ3yO', '4645826087529', 'ella86@yahoo.com', 384, 5951, 1493227, 'Option 2', 'Option 7', '[\"Option 1\",\"Option 2\"]', 'Id et magnam eius quis aut. Necessitatibus itaque qui quidem. Fuga qui et molestias vitae qui.', 'Option 2', '[\"Option 1\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=52', 'https://picsum.photos/200/300?random=52', '1979-09-03', '19:17:40', '#7e2216', 'Ipsa quia et sint at. Maxime unde error qui recusandae autem. Sint quis eum odit.', '<html><head><title>Non quia dolorem voluptatem cupiditate et dignissimos.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">sapiente</label><input type=\"text\" id=\"username\"><label for=\"password\">ut</label><input type=\"password\" id=\"password\"></form><div id=\"8171\"></div><div id=\"80630\"></div><div id=\"62068\"></div><div class=\"illum\">Est qui vitae neque illo tempora.<h2>Sint nisi laborum necessitatibus quia sit quas rerum at itaque.</h2></div></body></html>\n', '2025-08-04 23:38:00', '2025-08-06 19:35:46', 1, NULL),
(53, 'j311TivodJ', 'VVzdGIU6QD', '3045380684041', 'violet.palastri@yahoo.com', 839, 3287, 941217, 'Option 7', 'Option 4', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Praesentium libero rerum ipsum. Nesciunt tenetur hic in sunt aliquam eos et. Quia aut ut ut.', 'Option 4', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=53', 'https://picsum.photos/200/300?random=53', '1975-10-18', '16:28:03', '#f81935', 'Sint laboriosam deserunt harum. Velit laborum suscipit reiciendis a.', '<html><head><title>Ea praesentium sapiente rerum est adipisci est quisquam adipisci ipsam.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">sint</label><input type=\"text\" id=\"username\"><label for=\"password\">ea</label><input type=\"password\" id=\"password\"></form><div id=\"87222\"></div><div class=\"sit\"><span>Deserunt ut.</span></div></body></html>\n', '2025-08-11 09:07:52', '2025-08-11 00:42:01', NULL, NULL),
(54, '3sKiREBGJl', 'rlkf9R0oJK', '0248430839221', 'saadat.wastuti@mandasari.id', 594, 2654, 5490831, 'Option 8', 'Option 1', '[\"Option 1\",\"Option 2\"]', 'Alias aut quos molestiae veniam. Hic ut commodi error ea dolor.', 'Option 1', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=54', 'https://picsum.photos/200/300?random=54', '1999-02-23', '06:02:42', '#1b526d', 'Et id beatae blanditiis tempore aut quis. Fuga animi voluptatum occaecati suscipit qui.', '<html><head><title>Non dolor porro ut numquam libero aut facere consequuntur vel.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">voluptatem</label><input type=\"text\" id=\"username\"><label for=\"password\">ut</label><input type=\"password\" id=\"password\"></form><div id=\"28591\"></div><div id=\"37001\">Et molestiae aspernatur tenetur quod.</div></body></html>\n', '2025-07-31 21:56:49', '2025-07-29 16:23:27', NULL, 1),
(55, 'NzUyexPTe2', 'PlLvgkaiYz', '3516326018683', 'marpaung.latif@wijaya.or.id', 440, 1654, 7420091, 'Option 4', 'Option 3', '[\"Option 1\",\"Option 2\"]', 'Temporibus qui possimus libero iure eos consectetur. Totam aut rerum eveniet iusto.', 'Option 4', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=55', 'https://picsum.photos/200/300?random=55', '1995-07-16', '16:14:33', '#5d2bc4', 'Unde maxime dolorum et deserunt sint et a. Sed quia est id quia. Quidem et nostrum eos quidem eum.', '<html><head><title>Eligendi earum nobis distinctio quo officiis occaecati non.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">eum</label><input type=\"text\" id=\"username\"><label for=\"password\">ratione</label><input type=\"password\" id=\"password\"></form><div class=\"expedita\"></div><div class=\"et\"><div id=\"35850\"></div></div><div id=\"65476\"><div id=\"47956\"><span>Mollitia amet est ut neque porro est est culpa et doloremque.</span></div><div class=\"officia\"></div></div><div id=\"14617\"><div id=\"37044\"></div></div></body></html>\n', '2025-08-11 17:18:53', '2025-07-28 20:32:39', NULL, NULL),
(56, 'KLa7F4EsXL', 'ydR0otzQxy', '6448865169724', 'vusada@gmail.co.id', 634, 6552, 1360148, 'Option 10', 'Option 3', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Incidunt ut veniam et beatae id. Ut vero non odit maiores. Alias qui quis aperiam.', 'Option 1', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=56', 'https://picsum.photos/200/300?random=56', '1998-01-29', '00:07:47', '#491f9e', 'Sed dignissimos voluptatem dicta modi aperiam asperiores aut. Voluptas ea sint dolorum non.', '<html><head><title>Nostrum iste suscipit in quod sequi.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">facilis</label><input type=\"text\" id=\"username\"><label for=\"password\">impedit</label><input type=\"password\" id=\"password\"></form><div id=\"39101\"></div><div class=\"ex\"><div class=\"consequuntur\"></div><div class=\"id\"></div></div><div class=\"quaerat\">Repellendus eos minus quo magni.<i>Quia et.</i><a href=\"example.org\">Est ab eligendi quos placeat aspernatur quibusdam placeat et dolores et quis harum.</a><h2>Deserunt tenetur atque exercitationem voluptas deserunt ut omnis praesentium aut.</h2></div><div id=\"87610\">Repellat provident impedit.</div></body></html>\n', '2025-07-29 02:04:45', '2025-08-04 11:55:57', NULL, NULL),
(57, 'Mbv28yMSa7', 'B0SCJDd2O2', '3378130602010', 'ridwan.safitri@yahoo.co.id', 128, 5144, 4041196, 'Option 8', 'Option 9', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Minima voluptate ducimus quae in. Quibusdam harum et iure cum. Consectetur et quis modi ut sed.', 'Option 4', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=57', 'https://picsum.photos/200/300?random=57', '1979-02-21', '07:28:40', '#2c57ac', 'Neque dolorem non maxime et. Distinctio odio consequatur sunt sint nesciunt et veniam.', '<html><head><title>Molestiae labore voluptas.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">magnam</label><input type=\"text\" id=\"username\"><label for=\"password\">commodi</label><input type=\"password\" id=\"password\"></form><div class=\"ut\"></div><div class=\"vero\"></div></body></html>\n', '2025-08-06 07:59:12', '2025-07-29 20:12:46', NULL, NULL),
(58, 'trmidlGgHr', 'fJlO9cSFjZ', '6248778580865', 'saptono.gara@hutagalung.asia', 352, 8342, 1347120, 'Option 4', 'Option 10', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Ratione officia alias voluptatibus voluptatem qui quam. Et ullam quaerat commodi ad.', 'Option 2', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=58', 'https://picsum.photos/200/300?random=58', '1972-08-13', '09:15:19', '#619da5', 'Ab id aliquam ex suscipit ducimus ut. Architecto voluptate illum eos est est.', '<html><head><title>Voluptatem fuga enim.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">illo</label><input type=\"text\" id=\"username\"><label for=\"password\">similique</label><input type=\"password\" id=\"password\"></form><div class=\"officiis\"></div><div id=\"22057\"><ul><li>Corporis adipisci accusantium.</li><li>Minus cumque.</li><li>Quo id pariatur esse est eum.</li><li>Et delectus sint.</li><li>Rerum dolorem est error accusamus sed.</li><li>Non minima.</li><li>Fugit sint.</li><li>Maxime molestias ut.</li></ul><p>Quasi itaque assumenda unde porro modi.</p><ul><li>Et.</li><li>Atque ducimus veniam quo mollitia.</li></ul></div><div id=\"59258\"></div><div class=\"nam\"></div></body></html>\n', '2025-08-14 04:55:26', '2025-08-04 16:41:17', 1, NULL),
(59, 't7a1fW8TTP', 'JiKGCeQ5td', '8465772923605', 'muni.handayani@gunarto.biz.id', 675, 5195, 5232212, 'Option 7', 'Option 9', '[\"Option 1\",\"Option 2\"]', 'Voluptate ut et nobis. Est velit sunt in corporis magnam quia.', 'Option 2', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=59', 'https://picsum.photos/200/300?random=59', '1992-09-08', '22:41:08', '#c5df6e', 'Voluptatem est ullam nisi molestiae. Aut vitae error possimus provident.', '<html><head><title>Consequuntur at doloremque esse tempore aliquid.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">fuga</label><input type=\"text\" id=\"username\"><label for=\"password\">qui</label><input type=\"password\" id=\"password\"></form><div id=\"21620\"></div><div class=\"corrupti\"><div class=\"molestias\"></div><div id=\"45365\"></div><div class=\"quia\"></div><div id=\"50746\"></div></div><div id=\"19855\"></div><div class=\"corrupti\"><b>In qui incidunt quia sit et consequuntur et velit qui est tempora sapiente.</b>Praesentium ut odit hic corporis debitis saepe quia.</div></body></html>\n', '2025-08-09 12:32:59', '2025-08-09 03:02:40', NULL, 1),
(60, 'LM1VFiMvZL', 'XxmZfbkVfX', '4861426671368', 'nurul75@susanti.sch.id', 253, 5270, 3413991, 'Option 10', 'Option 2', '[\"Option 1\"]', 'Qui quidem consequatur et possimus sed id. Asperiores deserunt nihil et alias odio.', 'Option 1', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=60', 'https://picsum.photos/200/300?random=60', '2019-09-19', '17:11:07', '#5574aa', 'In aspernatur ab est tempore error at aliquid. Beatae vitae delectus earum qui sint.', '<html><head><title>Accusantium blanditiis sit suscipit veritatis iure.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">veniam</label><input type=\"text\" id=\"username\"><label for=\"password\">esse</label><input type=\"password\" id=\"password\"></form><div class=\"dolore\"><span>Consequatur modi eos animi a id.</span></div><div class=\"officia\"></div><div id=\"89354\"><div class=\"eum\"></div></div><div class=\"repellat\"><div class=\"expedita\">Corporis optio.<a href=\"example.org\">Mollitia aliquid commodi doloremque possimus hic dolorum tempora.</a></div><div id=\"86787\"></div></div></body></html>\n', '2025-08-01 05:34:32', '2025-07-20 07:19:08', 1, 1),
(61, 'eBfAXRxqXT', 'HMGMzoMufs', '8534583931281', 'pradana.hamima@gmail.co.id', 284, 658, 2395574, 'Option 7', 'Option 1', '[\"Option 1\",\"Option 2\"]', 'Debitis ipsum natus et fugit. Commodi enim reprehenderit corrupti vel iste ad.', 'Option 4', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=61', 'https://picsum.photos/200/300?random=61', '2017-06-27', '00:22:05', '#9847ab', 'Et ipsa eius iusto cum similique sequi tenetur. Eos cum soluta ea qui ipsam recusandae eos quos.', '<html><head><title>Quaerat dolores enim delectus molestiae aut cum quis esse tenetur.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">est</label><input type=\"text\" id=\"username\"><label for=\"password\">consequuntur</label><input type=\"password\" id=\"password\"></form><div id=\"3325\"><div id=\"72727\"><a href=\"example.com\">Eos dolor beatae ex qui voluptatem veritatis.</a><ul><li>Placeat quia dolores mollitia non et.</li><li>Non totam ut.</li><li>Voluptas saepe mollitia.</li><li>Ut ad cupiditate maxime.</li><li>Minima illum esse.</li><li>Ut adipisci.</li><li>Ducimus accusamus autem.</li><li>Consequuntur mollitia.</li><li>Id iste.</li><li>Veniam quod.</li><li>Libero ducimus doloremque.</li></ul><table><thead><tr><th>Consequatur labore reiciendis.</th><th>Nisi nam.</th><th>Et.</th><th>Eius culpa.</th></tr></thead><tbody><tr><td>Aperiam error.</td><td>Itaque sit nulla ad illum repellendus est eligendi.</td><td>In deleniti provident sit cupiditate rerum suscipit quod.</td><td>Molestiae ipsa sunt minus ut deleniti natus sed quisquam nostrum recusandae.</td></tr><tr><td>Minima.</td><td>Iste ea.</td><td>Modi et vel fuga quas quae provident.</td><td>Blanditiis ea rem et at non et commodi.</td></tr><tr><td>Incidunt praesentium dolor.</td><td>Dicta temporibus commodi ut et quam autem ut voluptatem temporibus.</td><td>Officiis ut omnis magni mollitia minus aut.</td><td>Reiciendis veritatis qui et maiores id corporis voluptatem itaque.</td></tr><tr><td>Non corrupti id cum asperiores eum impedit ex facilis.</td><td>Ducimus distinctio eius amet facilis dignissimos quis dolorum ut excepturi id officia vero doloribus.</td><td>Facilis eos.</td><td>Animi alias fugiat et assumenda ut.</td></tr><tr><td>Eius quaerat aspernatur reiciendis qui pariatur.</td><td>Temporibus.</td><td>Dignissimos.</td><td>Ad ea doloremque ea enim sint.</td></tr><tr><td>Voluptas fuga libero non assumenda est consequatur.</td><td>Sequi voluptatem hic et id earum voluptas.</td><td>Id et reprehenderit adipisci ut rerum ad dolorum ea voluptatem quis.</td><td>Distinctio.</td></tr><tr><td>Aut earum provident quaerat nemo aut et.</td><td>Omnis consequatur similique voluptatem iusto.</td><td>Rem iusto laudantium ipsum nisi vitae.</td><td>Eveniet odio sed odit reiciendis magnam consequatur.</td></tr><tr><td>Impedit omnis.</td><td>Sed dolor est molestiae alias quod.</td><td>Unde voluptatum illo consectetur.</td><td>Ab aut quia deserunt veritatis id iusto sapiente dolor accusantium ducimus rerum.</td></tr></tbody></table></div><div class=\"neque\"><h3>Et omnis.</h3><b>Et necessitatibus cumque earum.</b><p>Impedit dolores commodi quo a deserunt voluptatem esse recusandae molestias.</p><table><thead><tr><th>Provident quasi quasi recusandae quasi incidunt.</th></tr></thead><tbody><tr><td>Impedit porro animi natus ut molestiae veniam dolores et ea facere perspiciatis.</td></tr><tr><td>Quia eveniet exercitationem occaecati sint sed et nihil et maxime.</td></tr><tr><td>Quaerat eum ad assumenda non.</td></tr></tbody></table></div><div id=\"13670\"></div></div><div class=\"eligendi\"></div><div id=\"16379\"></div></body></html>\n', '2025-08-11 05:05:55', '2025-08-08 23:50:32', NULL, NULL),
(62, 'TYqTL0sVKm', 'QrqHr3zsPN', '1874427961898', 'maryadi45@yahoo.co.id', 366, 555, 5756705, 'Option 4', 'Option 6', '[\"Option 1\"]', 'Quod rem et alias sit corporis excepturi. Suscipit earum placeat voluptas. Hic ratione hic et.', 'Option 2', '[\"Option 1\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=62', 'https://picsum.photos/200/300?random=62', '2020-09-19', '02:28:47', '#a38fb1', 'Est voluptatem laboriosam et. Temporibus voluptatem repellendus ea natus accusantium.', '<html><head><title>Officiis incidunt fugit sed perferendis molestias unde quos eligendi.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">voluptatum</label><input type=\"text\" id=\"username\"><label for=\"password\">omnis</label><input type=\"password\" id=\"password\"></form><div id=\"41475\"></div><div id=\"3072\"><span>Quia aspernatur tenetur aut corrupti adipisci id molestias.</span><h1>Aut placeat iusto quia voluptas.</h1><h2>Non debitis asperiores aperiam.</h2></div><div class=\"rerum\"></div><div class=\"harum\"></div></body></html>\n', '2025-08-03 13:32:58', '2025-07-29 01:04:40', NULL, NULL),
(63, 'ecuEtObYhR', 'Jc3QCSGBV5', '5920547143723', 'mulyani.septi@gmail.com', 508, 2128, 3223085, 'Option 1', 'Option 10', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Aut laudantium debitis ipsa voluptates. Sequi id est quo est sequi et quia. Voluptas nemo ea aut.', 'Option 1', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=63', 'https://picsum.photos/200/300?random=63', '2021-03-01', '06:33:12', '#844751', 'Rerum maxime qui et quidem et iure ea. Labore et qui ullam tempore nesciunt non vitae.', '<html><head><title>Illo quas et impedit dignissimos rem odio.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">et</label><input type=\"text\" id=\"username\"><label for=\"password\">ex</label><input type=\"password\" id=\"password\"></form><div class=\"deleniti\"><b>Provident sit provident dolor impedit ea aut.</b></div><div class=\"minus\"><div id=\"15292\"></div><div id=\"70166\"></div><div class=\"earum\"></div></div></body></html>\n', '2025-08-07 00:00:27', '2025-07-22 06:20:42', NULL, 1),
(64, 'fyuTa2xmys', 'G8sL3Ifep3', '5699116421974', 'zulaika.ega@yahoo.co.id', 717, 2277, 5405485, 'Option 6', 'Option 2', '[\"Option 1\"]', 'Sed sit non omnis assumenda ipsa voluptates. Est voluptatem eaque libero aliquid.', 'Option 2', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=64', 'https://picsum.photos/200/300?random=64', '2011-02-26', '16:23:43', '#e1eb5f', 'Eaque rem sit voluptatem in quo. Dolor exercitationem mollitia et libero illum.', '<html><head><title>Quia et vitae qui ut unde recusandae voluptates.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">dolores</label><input type=\"text\" id=\"username\"><label for=\"password\">cum</label><input type=\"password\" id=\"password\"></form><div class=\"voluptas\"><b>Velit ipsum doloribus vel distinctio iste vel in.</b>Reiciendis dicta.</div></body></html>\n', '2025-08-08 21:09:23', '2025-07-28 06:34:18', 1, NULL),
(65, 'VlvzZglOzL', 'HPpzxS6M0C', '6163464164375', 'crahayu@yahoo.com', 873, 4002, 6823921, 'Option 4', 'Option 9', '[\"Option 1\",\"Option 2\"]', 'Dolores qui et et. Maiores aut quibusdam id quibusdam in.', 'Option 1', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=65', 'https://picsum.photos/200/300?random=65', '2009-09-08', '05:21:33', '#f0df29', 'Ipsam eum et corporis. Totam odio ad quia dignissimos ut. Numquam sed veniam assumenda est hic.', '<html><head><title>Consequatur nisi iste placeat corporis totam quod illo doloremque reprehenderit.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">veniam</label><input type=\"text\" id=\"username\"><label for=\"password\">sequi</label><input type=\"password\" id=\"password\"></form><div class=\"molestiae\"><a href=\"example.com\">Harum molestiae voluptas soluta laudantium ut id magnam optio.</a>Hic et totam animi ut atque temporibus omnis voluptas enim nobis aut.</div><div id=\"82916\"></div><div id=\"68133\"><div id=\"4577\">Quo quia rem qui est atque adipisci voluptatum in nobis magnam quia.<ul><li>Dignissimos.</li><li>Doloremque vitae qui deleniti.</li><li>Ab quidem quibusdam maiores.</li><li>Laudantium rerum quam voluptatibus fugit.</li><li>Deserunt accusamus rerum.</li><li>Adipisci autem occaecati.</li><li>Sint corporis quisquam.</li><li>Quo qui.</li><li>Doloribus aliquid sed quae.</li><li>Qui non rerum voluptate.</li></ul></div><div class=\"qui\"></div><div class=\"officiis\"></div></div></body></html>\n', '2025-07-19 03:35:38', '2025-07-28 18:20:41', NULL, 1),
(66, '5mF7vjPhJo', 'e46RjxuUJT', '2719758143195', 'natalia35@gmail.co.id', 424, 9952, 8600546, 'Option 5', 'Option 7', '[\"Option 1\",\"Option 2\"]', 'Quis amet et quia eveniet. Enim architecto ut autem inventore voluptatem laudantium vel.', 'Option 4', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=66', 'https://picsum.photos/200/300?random=66', '1991-04-22', '10:40:08', '#d94be7', 'Vel soluta iure ducimus amet. Qui eveniet et quibusdam non repudiandae. Porro minima illum vel.', '<html><head><title>Dolorem ad quidem est id.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">odio</label><input type=\"text\" id=\"username\"><label for=\"password\">numquam</label><input type=\"password\" id=\"password\"></form><div id=\"35381\"><div class=\"eligendi\"></div><div id=\"66214\"></div><div id=\"39749\"></div><div class=\"id\">Maxime sint est veritatis laboriosam iste sunt aut sequi accusamus.<a href=\"example.org\">Atque sint atque quia quia et autem.</a><i>Deserunt placeat dolores iste quasi iusto illo.</i><i>Rerum distinctio voluptatem magni cupiditate non dolores vero dolore.</i></div></div><div class=\"voluptatem\"><div id=\"17869\"><p>Qui aut nemo.</p><a href=\"example.org\">Odit laborum ab ullam exercitationem qui nam magnam dolore error nisi quis.</a><i>Quia dolores necessitatibus velit debitis repellendus qui beatae debitis tenetur.</i><table><thead><tr><th>Esse inventore et.</th><th>Cumque.</th></tr></thead><tbody><tr><td>Eaque quae et non reiciendis recusandae est non.</td><td>Et explicabo reiciendis saepe repudiandae esse officia.</td></tr></tbody></table></div><div class=\"dolor\"></div><div class=\"et\"></div></div></body></html>\n', '2025-08-13 06:38:50', '2025-08-18 10:38:10', 1, 1),
(67, '1Vzjdq60XM', 'iUDvJMfzvX', '9632082114569', 'prakosa.hariyah@rahimah.desa.id', 817, 6940, 7568580, 'Option 2', 'Option 8', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Dolor et perspiciatis atque soluta fugit quae est. Hic delectus est iure dolore corporis nemo.', 'Option 1', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=67', 'https://picsum.photos/200/300?random=67', '2008-09-18', '22:41:38', '#25afa7', 'Est illum reiciendis consequatur quia. Eius et deleniti ea magnam sed ad provident.', '<html><head><title>Nihil.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">dolor</label><input type=\"text\" id=\"username\"><label for=\"password\">quae</label><input type=\"password\" id=\"password\"></form><div id=\"88391\"></div><div class=\"est\"></div></body></html>\n', '2025-08-09 01:01:28', '2025-08-05 06:37:32', NULL, 1);
INSERT INTO `crud_examples` (`id`, `text`, `barcode`, `qr_code`, `email`, `number`, `currency`, `currency_idr`, `select`, `select2`, `select2_multiple`, `textarea`, `radio`, `checkbox`, `checkbox2`, `tags`, `file`, `image`, `date`, `time`, `color`, `summernote_simple`, `summernote`, `created_at`, `updated_at`, `created_by_id`, `last_updated_by_id`) VALUES
(68, '9Xz8VwrcaS', '8JEpfrJO8D', '7629696703885', 'digdaya.latupono@yahoo.co.id', 234, 2454, 700165, 'Option 9', 'Option 8', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Quaerat non repudiandae voluptate mollitia. Doloremque excepturi ea possimus. Aut velit quia porro.', 'Option 2', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=68', 'https://picsum.photos/200/300?random=68', '1979-02-03', '01:47:37', '#a749d8', 'Ipsum nisi beatae debitis aliquid. Sunt magni rerum illum consequatur voluptatem quo quia.', '<html><head><title>Sit eum aut enim.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">et</label><input type=\"text\" id=\"username\"><label for=\"password\">veniam</label><input type=\"password\" id=\"password\"></form><div class=\"eaque\"><div id=\"35022\"></div><div class=\"velit\"></div><div id=\"2405\"></div><div class=\"qui\"></div></div><div id=\"3036\"></div><div class=\"eum\"><span>Ab velit est aut mollitia eos.</span><ul><li>Ut excepturi laudantium.</li><li>Quam ut odio sunt.</li><li>Sequi et.</li><li>Eligendi ab.</li><li>Laboriosam et.</li><li>Ea possimus non repellat.</li><li>Animi similique.</li><li>Ab quisquam sunt.</li></ul><ul><li>Suscipit dicta accusantium et expedita.</li><li>Possimus est quis.</li><li>Cum aut numquam.</li><li>Iste recusandae eos.</li><li>Rerum distinctio dolorem.</li><li>Quibusdam quae est.</li><li>Maxime mollitia non molestias quidem.</li><li>Distinctio expedita nihil quidem ut neque.</li><li>Aliquam.</li><li>Voluptatem dolores libero mollitia tenetur temporibus.</li></ul><i>Quis laborum qui officiis quia ex rerum qui ut.</i></div><div class=\"dicta\"><div id=\"32871\"></div><div class=\"adipisci\"><a href=\"example.com\">Distinctio alias et cumque aliquid.</a></div><div class=\"quia\"><h3>Quis nihil consequatur ut autem praesentium magni fugit sed vitae nihil quis veniam libero.</h3><table><thead><tr><th>Aliquam earum ab ut.</th></tr></thead><tbody><tr><td>Veritatis doloribus perspiciatis debitis est dicta tempora magni nostrum quod aliquam.</td></tr><tr><td>Quos corporis aut et est.</td></tr><tr><td>Maiores molestias qui consequuntur natus in animi vel et quia rem exercitationem et voluptatem.</td></tr></tbody></table></div></div></body></html>\n', '2025-08-06 06:15:47', '2025-07-31 00:03:06', 1, NULL),
(69, 'u8j8FyQ5xy', 'htqfblM1Zk', '0682812694396', 'ynasyiah@gmail.co.id', 202, 3181, 9056539, 'Option 6', 'Option 8', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Vel et odio occaecati totam. Quae voluptatem repellendus blanditiis doloremque sunt error et.', 'Option 4', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=69', 'https://picsum.photos/200/300?random=69', '2007-06-29', '13:31:52', '#fa7bfc', 'Neque iusto incidunt fuga cumque aut ullam. Magnam odit natus sed occaecati corporis dolorem nisi.', '<html><head><title>Hic explicabo totam.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">velit</label><input type=\"text\" id=\"username\"><label for=\"password\">aut</label><input type=\"password\" id=\"password\"></form><div id=\"27454\"><ul><li>Nisi.</li><li>Veritatis ullam ea error.</li></ul><span>Dolores sit cupiditate vero et.</span><p>Velit eius veritatis ducimus voluptatem non voluptate.</p><i>Vitae aspernatur maiores placeat maxime quae praesentium voluptatem in laborum aut.</i></div><div id=\"91180\"></div><div class=\"quibusdam\"></div></body></html>\n', '2025-08-11 06:46:10', '2025-07-21 05:00:21', NULL, NULL),
(70, 'DgUb93mgid', 'E1zliT7D06', '4982538555602', 'paramita88@yahoo.co.id', 994, 2781, 3863061, 'Option 6', 'Option 10', '[\"Option 1\"]', 'Provident sint consectetur ad vel dignissimos. Modi omnis consectetur occaecati est.', 'Option 4', '[\"Option 1\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=70', 'https://picsum.photos/200/300?random=70', '1992-09-27', '08:43:24', '#b49af7', 'Omnis eveniet sit recusandae. Quam suscipit nam porro. Perspiciatis ut quaerat laborum vel.', '<html><head><title>Accusantium eum accusamus voluptates.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">nostrum</label><input type=\"text\" id=\"username\"><label for=\"password\">voluptate</label><input type=\"password\" id=\"password\"></form><div id=\"86520\"></div></body></html>\n', '2025-07-28 02:48:06', '2025-08-01 00:34:37', 1, 1),
(71, 'sJEKzD6iPO', 'JlF9Bcp5dU', '2509435128160', 'artawan.yuniar@gmail.co.id', 133, 2309, 4630617, 'Option 3', 'Option 8', '[\"Option 1\",\"Option 2\"]', 'Corporis consectetur atque minus cum blanditiis eum ipsam in. Aut veniam qui animi non quas.', 'Option 4', '[\"Option 1\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=71', 'https://picsum.photos/200/300?random=71', '2003-07-04', '07:20:41', '#2c7de7', 'Dignissimos deserunt in et debitis. Repudiandae praesentium veniam magni porro officia sapiente.', '<html><head><title>Ut vel veniam dolor velit rerum.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">magnam</label><input type=\"text\" id=\"username\"><label for=\"password\">laborum</label><input type=\"password\" id=\"password\"></form><div id=\"78291\"><b>Impedit.</b>Labore optio quia iure qui porro maiores voluptas.</div></body></html>\n', '2025-08-01 10:44:30', '2025-08-13 10:31:24', 1, 1),
(72, 'thuoRZ4mKd', 'Tu1bw0hvjX', '2350012869682', 'rsamosir@rahayu.mil.id', 778, 6298, 9797232, 'Option 10', 'Option 1', '[\"Option 1\"]', 'Quod qui perferendis unde ea. Libero explicabo fugiat accusantium adipisci tempora sint aut quis.', 'Option 3', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=72', 'https://picsum.photos/200/300?random=72', '1977-06-24', '14:45:18', '#7fe8b3', 'Earum in ut nesciunt. Nihil recusandae sunt omnis aut quia sed numquam delectus.', '<html><head><title>Sit ratione quia minus alias saepe nesciunt quas deleniti iure qui ea.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">neque</label><input type=\"text\" id=\"username\"><label for=\"password\">et</label><input type=\"password\" id=\"password\"></form><div class=\"nulla\"></div></body></html>\n', '2025-07-29 12:26:37', '2025-08-06 19:54:56', NULL, NULL),
(73, 'n4u7mnh0nS', 'ADOHD43OkF', '7424586475701', 'prasetyo.suwarno@halimah.net', 775, 4721, 9746780, 'Option 5', 'Option 5', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Rem corrupti ut nulla fugit. Nihil molestias soluta aliquam nam. Cumque quia eum at.', 'Option 4', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=73', 'https://picsum.photos/200/300?random=73', '1978-12-15', '12:02:32', '#b5f097', 'Officiis qui ex et tempora omnis possimus. Culpa et voluptatem temporibus fugiat cum ipsa quidem.', '<html><head><title>Iste voluptatem ex sapiente labore.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">delectus</label><input type=\"text\" id=\"username\"><label for=\"password\">aperiam</label><input type=\"password\" id=\"password\"></form><div id=\"21314\"></div><div id=\"61062\"><div class=\"corporis\"></div><div class=\"veritatis\"><i>Harum mollitia a cum et.</i></div><div id=\"94746\"></div></div><div class=\"aperiam\"></div></body></html>\n', '2025-07-26 09:41:48', '2025-08-05 01:04:16', 1, NULL),
(74, '7X2j7zOmBZ', 'DDV2dBsBS1', '3731465127939', 'pprasetya@mandala.tv', 645, 613, 7648783, 'Option 6', 'Option 10', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Voluptas quae sint dolor perferendis. Qui eos ad repudiandae sapiente rerum.', 'Option 3', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=74', 'https://picsum.photos/200/300?random=74', '2018-09-25', '14:06:56', '#b7ecae', 'Omnis accusantium dolorum quae dignissimos deserunt. Repellendus id ipsum in deserunt in minus.', '<html><head><title>Iure et est.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">vero</label><input type=\"text\" id=\"username\"><label for=\"password\">corporis</label><input type=\"password\" id=\"password\"></form><div id=\"93760\"></div><div id=\"58640\"></div><div class=\"maxime\"><div class=\"consectetur\"></div><div class=\"esse\"></div><div id=\"63671\"><b>Maiores et.</b><ul><li>Vero.</li><li>Laborum est.</li><li>Quaerat fugit dolor.</li><li>Quisquam velit ratione.</li><li>Aliquam.</li></ul><h3>Quis minima et soluta et et ea.</h3></div><div class=\"consequatur\"><a href=\"example.org\">Neque.</a><p>Non nam voluptatem et tempora.</p></div></div></body></html>\n', '2025-08-11 15:15:49', '2025-08-10 19:34:39', 1, 1),
(75, 'qzVgeIu29h', 'UfrntoM1gI', '2984841811859', 'uyainah.jail@gmail.com', 397, 3490, 692125, 'Option 8', 'Option 3', '[\"Option 1\",\"Option 2\"]', 'Assumenda magni vitae ea quas eos aliquid aut. Pariatur at eligendi cupiditate.', 'Option 4', '[\"Option 1\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=75', 'https://picsum.photos/200/300?random=75', '2003-01-28', '09:12:21', '#902060', 'Eligendi laborum et suscipit deserunt. Eaque error eum laborum non amet.', '<html><head><title>Itaque eveniet nemo nam a ipsa voluptas.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">excepturi</label><input type=\"text\" id=\"username\"><label for=\"password\">maxime</label><input type=\"password\" id=\"password\"></form><div id=\"78233\"><div id=\"68265\"></div><div id=\"47291\">Commodi ab.Ad ab dicta temporibus ad velit.<table><thead><tr><th>Consequatur voluptates laborum doloremque illo expedita.</th><th>Officia accusantium veniam.</th><th>Distinctio non rerum aliquid suscipit.</th><th>Omnis repellendus ab natus ut.</th><th>Aut deleniti repellendus vel.</th></tr></thead><tbody><tr><td>Odit odio amet delectus.</td><td>Et hic dolorum nobis praesentium dignissimos.</td><td>Ab ut officiis consequatur praesentium.</td><td>Explicabo impedit.</td><td>Impedit quos odio.</td></tr><tr><td>Veniam aliquid error fugiat et et et qui ut qui exercitationem tempora quia.</td><td>Quo consequatur eum et velit.</td><td>Mollitia minima aspernatur est delectus alias libero.</td><td>Ea pariatur aliquid temporibus ex laboriosam accusamus dolores minima.</td><td>Nostrum est necessitatibus.</td></tr><tr><td>Voluptatem recusandae culpa totam ducimus aut et hic nihil nesciunt architecto.</td><td>Deserunt.</td><td>Sed est velit facilis inventore et.</td><td>Soluta ipsum aut temporibus aperiam commodi et sed.</td><td>Laudantium quae aliquam assumenda.</td></tr><tr><td>Necessitatibus perferendis ipsam eveniet sed a voluptas omnis saepe.</td><td>Et vero.</td><td>Ullam.</td><td>Eos amet quaerat eveniet reprehenderit molestiae vero dignissimos deleniti architecto voluptatum.</td><td>Deserunt error est soluta totam laudantium.</td></tr><tr><td>Explicabo sint quaerat facere sed ipsa.</td><td>Illum qui.</td><td>Aut qui aperiam est ea earum eum voluptas.</td><td>Iure occaecati est architecto ipsum nihil enim.</td><td>Cum ad tempore eos adipisci harum.</td></tr><tr><td>Veniam.</td><td>Enim quo.</td><td>Debitis quam.</td><td>Cum ut earum.</td><td>Vitae aut quia laboriosam nemo unde sapiente ut.</td></tr><tr><td>Illo.</td><td>Qui voluptas qui dolor voluptatem deserunt.</td><td>Non tempore et.</td><td>Quis voluptatem quaerat explicabo.</td><td>Officia saepe.</td></tr><tr><td>Voluptates impedit.</td><td>Dolor autem voluptatem itaque consequatur rerum quia quaerat consequatur architecto quibusdam assumenda error.</td><td>Quibusdam.</td><td>Aut sint laborum ad doloribus quia tenetur iste assumenda totam voluptas natus.</td><td>Et tempora.</td></tr><tr><td>Ut non labore fugiat illo qui amet at ea praesentium.</td><td>Sed voluptas eveniet voluptates ut est qui quo rerum.</td><td>Ab corrupti deleniti autem mollitia dolor.</td><td>Et iste.</td><td>Libero cupiditate omnis expedita voluptas eos aliquam magnam.</td></tr></tbody></table><span>Magni consequatur aut in eligendi laboriosam.</span></div></div></body></html>\n', '2025-08-09 19:13:37', '2025-07-19 07:05:54', NULL, 1),
(76, 'Snx22OdrHF', 'FnWbXJ6fQg', '1842544761189', 'purnawati.uda@yuliarti.biz', 817, 3489, 9103308, 'Option 9', 'Option 5', '[\"Option 1\"]', 'Eaque eum soluta ut ullam. Nam aperiam ab officiis aut. Voluptatum dolores in voluptatem ut qui.', 'Option 1', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=76', 'https://picsum.photos/200/300?random=76', '1987-07-22', '14:36:31', '#6f0413', 'Cum et quibusdam officiis ipsa aperiam. Odio consequuntur saepe vitae amet quisquam autem sint.', '<html><head><title>Quia iusto ipsam consectetur vel.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">temporibus</label><input type=\"text\" id=\"username\"><label for=\"password\">sequi</label><input type=\"password\" id=\"password\"></form><div id=\"98900\"></div><div id=\"78872\"><div id=\"47365\"></div></div><div class=\"error\"></div></body></html>\n', '2025-07-25 09:38:44', '2025-07-29 14:25:34', 1, 1),
(77, 'YNAQo36iX8', 'ySmnv2iGee', '3774592630354', 'wibowo.reksa@nababan.co', 39, 1988, 4335094, 'Option 3', 'Option 6', '[\"Option 1\"]', 'Inventore iusto ipsam quia rerum praesentium. Quam commodi iure est voluptatem magni.', 'Option 2', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=77', 'https://picsum.photos/200/300?random=77', '1975-03-13', '12:50:49', '#e6ec4a', 'Rerum dolores rerum est voluptatem harum ab. Iusto voluptatem aut hic et.', '<html><head><title>Dolorem consequatur optio aperiam molestiae consequatur.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">fugit</label><input type=\"text\" id=\"username\"><label for=\"password\">dolor</label><input type=\"password\" id=\"password\"></form><div id=\"24499\"><table><thead><tr><th>Occaecati ab.</th><th>Ipsa.</th><th>Nihil.</th><th>Est ut.</th><th>Veniam.</th></tr></thead><tbody><tr><td>Porro commodi possimus quia aut.</td><td>Fugit sed nemo in et qui.</td><td>Repudiandae itaque aut veniam dolor eos nulla vero dignissimos ab et.</td><td>Illo nisi eius possimus quia veritatis facere nulla.</td><td>Voluptatem ab deleniti aut quidem nihil et hic.</td></tr><tr><td>Explicabo necessitatibus officia.</td><td>Quae laborum id quaerat ab aut.</td><td>Qui officiis voluptates in quam dolores odio sunt.</td><td>Aliquid.</td><td>Corrupti vitae.</td></tr><tr><td>Facere quaerat libero quia quia quaerat fuga.</td><td>Omnis quisquam maiores natus.</td><td>Optio aliquid dicta.</td><td>Vel veniam est.</td><td>Neque consectetur provident facilis dolore optio.</td></tr><tr><td>Qui laudantium molestiae rem iste in hic exercitationem vel occaecati est consequuntur dignissimos.</td><td>Nostrum nihil.</td><td>Reiciendis ad ut voluptas excepturi aperiam.</td><td>Et quia neque deserunt.</td><td>Sequi quaerat repellat minima culpa est voluptas.</td></tr><tr><td>Et enim ex mollitia quibusdam dolorum.</td><td>Eum labore nihil voluptatibus excepturi occaecati pariatur assumenda delectus illo nesciunt sit.</td><td>Odio eos est omnis sed atque aut et incidunt voluptate.</td><td>Officia nesciunt culpa rem id repudiandae.</td><td>Qui rerum corrupti voluptatem quia sequi.</td></tr><tr><td>Hic qui sed quaerat eligendi impedit velit deleniti.</td><td>Nostrum corrupti neque aut totam cupiditate earum temporibus molestias culpa.</td><td>Ut sed est similique sit quas.</td><td>Omnis ea.</td><td>Dolorem molestias natus.</td></tr></tbody></table><ul><li>Natus dolores.</li><li>Et labore quia.</li><li>Dolor placeat iusto beatae.</li><li>Non ex repellat.</li><li>Ipsum labore voluptas possimus rerum.</li><li>Ut vitae sit.</li></ul><ul><li>Laudantium cupiditate.</li><li>Sint debitis.</li><li>Eveniet perspiciatis ea.</li><li>Omnis atque.</li><li>Dolores molestiae.</li><li>Modi voluptatem ipsum.</li></ul></div><div id=\"39115\"></div><div class=\"qui\"><div id=\"69307\"></div><div id=\"23341\"></div><div id=\"97311\">Cumque voluptatem vel totam voluptatem aliquid ut architecto quo.<b>A ut repudiandae aliquid quod exercitationem nisi est aut.</b><a href=\"example.org\">Magni quae id blanditiis rerum eum et.</a></div><div id=\"30219\"><h2>Voluptas ducimus voluptatum dolores explicabo ipsum consequatur accusantium.</h2><ul><li>Nemo delectus aut fugiat veniam.</li><li>Sed.</li><li>Non hic.</li><li>Quod veniam officia similique assumenda.</li><li>Ut repellat.</li><li>A sequi ut possimus.</li></ul><span>Et quo velit omnis laudantium soluta repudiandae ipsam quidem.</span></div></div></body></html>\n', '2025-07-29 19:00:52', '2025-08-06 02:00:37', 1, NULL),
(78, 'O4TfohD8QC', 'J5IeM99eVc', '5463338004693', 'jamil.putra@gmail.com', 23, 161, 5933959, 'Option 8', 'Option 2', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Eaque atque eum ab sunt dolorem est fuga. Dignissimos tenetur sunt sunt quis qui.', 'Option 4', '[\"Option 1\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=78', 'https://picsum.photos/200/300?random=78', '1994-01-28', '15:47:54', '#ff78cc', 'Suscipit odio quia ratione. Dicta maiores et impedit necessitatibus aut facere.', '<html><head><title>Aut quis.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">et</label><input type=\"text\" id=\"username\"><label for=\"password\">rerum</label><input type=\"password\" id=\"password\"></form><div id=\"78830\"><div id=\"87326\"></div><div id=\"23041\"><table><thead><tr><th>Eius repellat exercitationem et dicta nulla.</th><th>Repellat veritatis iste eum est.</th><th>Architecto modi.</th></tr></thead><tbody><tr><td>Quia non.</td><td>Et minus saepe in ut aperiam qui aspernatur.</td><td>Rerum autem accusantium.</td></tr><tr><td>Cupiditate tempora minus ad.</td><td>Sint velit porro sed atque autem.</td><td>Sed ullam enim voluptatem quam ipsam aperiam.</td></tr><tr><td>Temporibus perferendis earum.</td><td>Ut facere ut et nostrum sed eum eligendi.</td><td>Iusto aspernatur corporis.</td></tr><tr><td>Est et iusto perferendis ipsam facere aut voluptatem.</td><td>Praesentium voluptatem.</td><td>Ut ullam nisi explicabo debitis.</td></tr><tr><td>Et repellat a est eius natus.</td><td>Cum sint provident qui hic sint hic.</td><td>Omnis sit beatae est suscipit consequatur.</td></tr><tr><td>Est dicta laboriosam.</td><td>Eum culpa.</td><td>Sed illum dolores voluptas.</td></tr><tr><td>Doloribus corporis.</td><td>Exercitationem consequatur cupiditate nulla rerum dolorem dignissimos.</td><td>Debitis repudiandae illum aspernatur a ipsam.</td></tr><tr><td>Est quia nihil provident minima sed sunt.</td><td>Natus quo delectus et.</td><td>Quo aliquam non ut dolor harum est.</td></tr><tr><td>Provident dolores corrupti similique accusamus qui.</td><td>Et expedita minima est mollitia recusandae molestias id.</td><td>Enim aut eligendi blanditiis nemo sed.</td></tr><tr><td>Reprehenderit rerum et et iure.</td><td>Expedita aut fugiat.</td><td>Ullam autem sapiente vitae a voluptatum.</td></tr></tbody></table><h2>Doloremque.</h2><h1>Culpa dolorum dignissimos dolor.</h1></div></div></body></html>\n', '2025-08-14 06:49:38', '2025-07-23 15:28:02', 1, NULL),
(79, 'lV3zA5qT7U', 'IdPw8juTM6', '0905304062856', 'rahmawati.vanya@gmail.com', 752, 1176, 6686095, 'Option 1', 'Option 1', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Iste consectetur quo vitae dolor ducimus fugit. Quam dolorem aut et fugiat excepturi et aut.', 'Option 4', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=79', 'https://picsum.photos/200/300?random=79', '1974-11-17', '02:05:25', '#c2cdff', 'Odit id eius id ut consectetur. Quis quod debitis ea. Minus adipisci aperiam aut aliquid.', '<html><head><title>Quaerat excepturi commodi dolore at quisquam voluptatem laudantium a praesentium.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">ad</label><input type=\"text\" id=\"username\"><label for=\"password\">occaecati</label><input type=\"password\" id=\"password\"></form><div id=\"14170\"></div><div id=\"36267\"><div id=\"81427\"><table><thead><tr><th>Voluptatem omnis.</th><th>Natus necessitatibus.</th><th>Consequuntur quia maiores.</th><th>Debitis aut recusandae enim.</th><th>Impedit aliquid.</th></tr></thead><tbody><tr><td>Soluta praesentium magnam nesciunt aut nihil vitae mollitia.</td><td>Rerum.</td><td>Sunt natus laborum.</td><td>Esse incidunt rerum suscipit vero ut dolorem.</td><td>Omnis facere eius neque doloribus quibusdam consectetur eius sit.</td></tr><tr><td>Dolorem culpa inventore voluptas aut sit eius corrupti quia veritatis voluptatem.</td><td>Non tempora vitae.</td><td>Id fugiat quaerat animi.</td><td>Ea eos facere tenetur nostrum omnis.</td><td>Voluptas laborum quibusdam et aut enim quia odio veritatis libero.</td></tr><tr><td>Et molestiae delectus voluptatum qui libero modi saepe est.</td><td>Quisquam laboriosam.</td><td>Est aut repudiandae sint ut voluptatibus velit repellendus exercitationem explicabo dolores eum.</td><td>Veniam voluptatem quia adipisci qui deleniti et qui et sapiente velit.</td><td>Laudantium id voluptatum.</td></tr><tr><td>Dignissimos eaque odit id.</td><td>Eos possimus ut incidunt nesciunt.</td><td>Sit quibusdam et laudantium qui quisquam voluptatem.</td><td>Excepturi nostrum explicabo dignissimos officia ut accusamus officiis eum.</td><td>Quasi incidunt et quia aut accusantium.</td></tr><tr><td>Et magni.</td><td>Nulla inventore incidunt ipsam quisquam perspiciatis eveniet magnam.</td><td>Quibusdam velit ut totam.</td><td>Ut vero quibusdam doloremque quia omnis non quaerat repudiandae.</td><td>Vel voluptatem nihil magni non cum harum sed dolores.</td></tr></tbody></table><p>Natus tempora earum minus eum hic placeat qui.</p>Officia laborum modi magnam sed.<i>Commodi architecto voluptatem eos.</i></div><div id=\"85855\">Est quia est dolorem.Ut aut amet sint dolores.</div><div id=\"88280\"></div></div><div id=\"62535\"><div class=\"nihil\"></div><div class=\"ut\"></div><div id=\"79053\"></div></div><div class=\"dolorem\"></div></body></html>\n', '2025-08-09 02:24:40', '2025-08-06 15:46:22', NULL, 1),
(80, 'Gs1QAM8kRO', 'eR7UgfhgJr', '0782783018624', 'ciaobella.pratama@pangestu.biz', 741, 1957, 3116266, 'Option 7', 'Option 1', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Praesentium ea necessitatibus fugit tempore ipsam. Provident quibusdam ut ab.', 'Option 4', '[\"Option 1\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=80', 'https://picsum.photos/200/300?random=80', '1981-06-29', '15:34:08', '#96179e', 'Quod quisquam porro dolorum earum nobis. Assumenda labore est pariatur.', '<html><head><title>Amet et quas.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">dolor</label><input type=\"text\" id=\"username\"><label for=\"password\">saepe</label><input type=\"password\" id=\"password\"></form><div id=\"93458\"></div><div class=\"sint\"><div id=\"65339\"></div><div id=\"35740\"><table><thead><tr><th>Cum a.</th></tr></thead><tbody><tr><td>Commodi voluptatem sit neque quia provident nobis neque omnis quia.</td></tr><tr><td>Non quam ratione vel corporis a quasi.</td></tr><tr><td>Libero omnis consequuntur laudantium eos sapiente hic consequatur ut et.</td></tr><tr><td>Sunt illo dolorem.</td></tr><tr><td>Et fugit hic non sint facilis sit.</td></tr><tr><td>Id aut ut culpa sed accusantium voluptatem est eos adipisci.</td></tr><tr><td>Quis sint quam culpa et qui atque.</td></tr><tr><td>Tempora unde ut.</td></tr><tr><td>Est laboriosam ducimus cumque vero.</td></tr><tr><td>Enim possimus veritatis sapiente et ut.</td></tr></tbody></table></div><div id=\"69121\"></div><div id=\"52916\"></div></div></body></html>\n', '2025-08-17 23:07:24', '2025-08-14 02:41:48', 1, NULL),
(81, 'PJbrCS7c6R', 'NDcrQnsqu4', '8402441908952', 'vanya06@hakim.web.id', 812, 596, 733169, 'Option 9', 'Option 7', '[\"Option 1\",\"Option 2\"]', 'Laboriosam nulla enim ducimus ut. Sit qui at sed quam itaque. Ut numquam omnis et perferendis.', 'Option 1', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=81', 'https://picsum.photos/200/300?random=81', '2024-11-16', '14:16:28', '#929331', 'Illo et neque culpa et. Eum quia sequi dolores sit quam.', '<html><head><title>Sequi sed consequuntur non veniam praesentium.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">doloremque</label><input type=\"text\" id=\"username\"><label for=\"password\">excepturi</label><input type=\"password\" id=\"password\"></form><div id=\"74518\"></div><div class=\"impedit\"><div id=\"13509\"><i>Minima at provident quia optio.</i><p>Culpa quia non labore error iure sint quam.</p><h3>Et sit aut eum sed.</h3></div><div class=\"ipsum\"></div><div class=\"repudiandae\">Quia et sit.<a href=\"example.net\">Omnis impedit maiores amet sit nisi dolorum nisi.</a><span>Quia placeat iusto occaecati quae esse sed.</span></div><div class=\"voluptas\"></div></div></body></html>\n', '2025-07-25 11:42:07', '2025-07-20 03:58:12', 1, NULL),
(82, 'tcEhe05cXB', '6V7N3vM3eH', '7707073274644', 'jarwi.yolanda@yahoo.com', 834, 17, 9118548, 'Option 9', 'Option 4', '[\"Option 1\"]', 'Impedit quia quia sit recusandae deleniti eius. Repudiandae unde dolores molestiae nulla et ut id.', 'Option 4', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=82', 'https://picsum.photos/200/300?random=82', '2008-02-26', '04:38:14', '#8b494b', 'Et recusandae et qui consectetur. Soluta quidem hic tempora est. Odio minima qui dolores pariatur.', '<html><head><title>Facilis ea et.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">nihil</label><input type=\"text\" id=\"username\"><label for=\"password\">ea</label><input type=\"password\" id=\"password\"></form><div id=\"72386\"><div id=\"90594\"></div><div id=\"22642\"></div><div class=\"autem\"></div></div><div class=\"nihil\"></div><div id=\"37051\"></div><div class=\"velit\"><div id=\"87048\"></div></div></body></html>\n', '2025-08-09 09:40:08', '2025-08-15 13:01:14', 1, 1),
(83, '11cqRUfb1v', 'yIUD9DT8wx', '6395177329851', 'atma.manullang@maryadi.web.id', 255, 7809, 277938, 'Option 9', 'Option 7', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Rerum earum possimus itaque in. Amet hic sit eum. Aut voluptatem aliquid provident.', 'Option 2', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=83', 'https://picsum.photos/200/300?random=83', '1976-12-07', '04:51:17', '#47839d', 'Exercitationem natus delectus laborum consequatur. Ut id impedit voluptatem hic.', '<html><head><title>Dolore quis officia est nihil ea in voluptas.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">ab</label><input type=\"text\" id=\"username\"><label for=\"password\">nihil</label><input type=\"password\" id=\"password\"></form><div class=\"blanditiis\">Qui nihil ad ratione voluptatem quis ipsum optio itaque.</div><div id=\"19101\"><i>Itaque sit et aut possimus.</i></div></body></html>\n', '2025-08-14 23:44:30', '2025-08-02 05:59:13', NULL, NULL),
(84, 'FD9fvg2SPN', 'uT38RU6HBV', '0702775198417', 'sihotang.dariati@halimah.name', 452, 9587, 2783321, 'Option 1', 'Option 3', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Sunt quos qui sit. Asperiores aut ex est adipisci. Ab quo ut aut eos et.', 'Option 3', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=84', 'https://picsum.photos/200/300?random=84', '1989-07-24', '12:07:03', '#f3bd33', 'Perspiciatis cumque iste deserunt minus. Quas perspiciatis animi minima dolorem possimus nobis.', '<html><head><title>Pariatur reprehenderit fugit possimus similique id et est.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">vitae</label><input type=\"text\" id=\"username\"><label for=\"password\">at</label><input type=\"password\" id=\"password\"></form><div class=\"adipisci\"><div id=\"80484\"></div><div class=\"iusto\"></div></div><div class=\"natus\"></div></body></html>\n', '2025-08-09 20:34:23', '2025-07-23 08:09:58', NULL, NULL),
(85, 'IcWcWkfiR6', 'BYXrddnfqF', '1255964340870', 'xhakim@pangestu.name', 914, 6704, 7808654, 'Option 1', 'Option 6', '[\"Option 1\"]', 'Dolor similique ex a maxime. Aut libero quia ipsa illo. Quia nihil iure necessitatibus omnis quae.', 'Option 3', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=85', 'https://picsum.photos/200/300?random=85', '1981-06-06', '05:38:43', '#659c1e', 'Qui non enim architecto saepe et maiores. Non ea sapiente tempora rerum et.', '<html><head><title>Autem.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">aspernatur</label><input type=\"text\" id=\"username\"><label for=\"password\">sunt</label><input type=\"password\" id=\"password\"></form><div id=\"60324\"></div><div id=\"10091\"></div><div class=\"cum\"></div><div id=\"24201\"><div class=\"aut\"></div><div id=\"55225\"></div><div class=\"ad\">Assumenda laudantium ut cumque.<a href=\"example.net\">Minima consequatur officia fugit voluptates iste sequi molestiae ut.</a>Dolores tenetur ut et repellendus sequi id qui.</div></div></body></html>\n', '2025-08-05 23:49:02', '2025-07-30 02:31:43', NULL, 1),
(86, 'kjAAxzwu7K', '2LVNCtpi2S', '4713119008114', 'vero33@wulandari.or.id', 127, 269, 3793028, 'Option 4', 'Option 10', '[\"Option 1\"]', 'Temporibus ipsum quia rerum cumque. Quam magnam nihil sint. Minus autem tenetur sed.', 'Option 2', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=86', 'https://picsum.photos/200/300?random=86', '2002-03-16', '12:14:02', '#9feae0', 'Quos fugit nostrum ipsam. Beatae tempore voluptates porro ipsa. Iure ipsum quasi est.', '<html><head><title>Maxime eveniet nisi qui consequatur voluptate.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">velit</label><input type=\"text\" id=\"username\"><label for=\"password\">sint</label><input type=\"password\" id=\"password\"></form><div id=\"23761\">Veniam nobis necessitatibus ab.<b>Similique aut.</b></div><div id=\"76650\"></div></body></html>\n', '2025-07-31 18:38:45', '2025-08-15 20:51:55', 1, NULL),
(87, '09PTTGU2eq', 'wgKIjtrbxM', '9253063375955', 'simbolon.unggul@gmail.co.id', 90, 3905, 398804, 'Option 3', 'Option 1', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Libero sit et est. Eum modi ratione omnis et velit. A eius ipsum et. Eaque natus eos qui.', 'Option 1', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=87', 'https://picsum.photos/200/300?random=87', '2017-07-24', '19:10:37', '#f31d74', 'Minus quo adipisci laudantium provident minus. Consequatur blanditiis odio expedita ut cupiditate.', '<html><head><title>Doloribus velit saepe corrupti facere.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">facilis</label><input type=\"text\" id=\"username\"><label for=\"password\">omnis</label><input type=\"password\" id=\"password\"></form><div class=\"assumenda\"></div><div class=\"dolores\"></div><div class=\"ratione\"><div class=\"eum\"></div><div id=\"58966\"></div></div></body></html>\n', '2025-07-22 03:51:33', '2025-08-09 11:10:36', 1, 1),
(88, 'EBmAbNGzRW', 'S8S4cdJO6E', '6701264613824', 'hidayat.gandewa@yuliarti.org', 785, 2451, 927699, 'Option 2', 'Option 7', '[\"Option 1\"]', 'Et et autem qui iure quidem qui veniam nihil. Exercitationem et est dignissimos inventore.', 'Option 3', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=88', 'https://picsum.photos/200/300?random=88', '1997-07-22', '03:30:25', '#de1626', 'A praesentium repellendus voluptatem et in. Quo aut vel et saepe id.', '<html><head><title>Vitae quia.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">dicta</label><input type=\"text\" id=\"username\"><label for=\"password\">ipsa</label><input type=\"password\" id=\"password\"></form><div id=\"821\"></div><div class=\"non\"><ul><li>Ab voluptates.</li><li>Quis corporis ea.</li><li>Doloremque qui.</li><li>Molestiae vero temporibus sunt.</li><li>Qui.</li></ul></div><div class=\"magni\"><i>Omnis a et dolores.</i>Sit aut ad ut aut eaque provident doloribus asperiores aut eaque reiciendis.Natus vero maiores id quidem ab porro.</div></body></html>\n', '2025-07-19 10:38:13', '2025-07-21 09:37:01', 1, 1),
(89, 'ZYq6tWnFkS', 'udlWIvtOG5', '4559804526989', 'narpati.baktianto@yahoo.com', 847, 9555, 7372465, 'Option 9', 'Option 8', '[\"Option 1\",\"Option 2\"]', 'Qui dignissimos ullam deleniti qui sed quis culpa. Dolore qui sint et ea.', 'Option 1', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=89', 'https://picsum.photos/200/300?random=89', '1983-01-14', '23:11:34', '#44bca4', 'Eius nemo nemo quae quo. Officiis nobis nisi veritatis. Aut eos nisi distinctio accusantium iusto.', '<html><head><title>Adipisci qui.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">aspernatur</label><input type=\"text\" id=\"username\"><label for=\"password\">et</label><input type=\"password\" id=\"password\"></form><div id=\"11344\"><div id=\"29939\"><h3>Sed necessitatibus explicabo quia voluptas aut dolorem et aut.</h3><p>Ducimus laboriosam repudiandae placeat.</p></div><div id=\"58125\"></div></div><div id=\"1288\"><table><thead><tr><th>Fuga sunt atque fugiat expedita necessitatibus.</th><th>Eos ex ipsa.</th><th>Repudiandae amet dolorum magni.</th></tr></thead><tbody><tr><td>Consequatur molestiae.</td><td>Saepe recusandae dolorem.</td><td>Dolorem sit et et nobis.</td></tr><tr><td>Iure neque et.</td><td>Laudantium aut.</td><td>Unde cumque occaecati libero velit.</td></tr><tr><td>Perspiciatis ducimus est minus hic et unde.</td><td>Natus consequuntur ut ut et.</td><td>Quis molestiae error autem modi et doloremque.</td></tr><tr><td>Consequuntur et ab cumque esse ea eaque aut aperiam amet reiciendis necessitatibus optio.</td><td>Ut natus exercitationem sit minus excepturi aperiam dolores incidunt sint.</td><td>Saepe quasi voluptatum sit totam.</td></tr><tr><td>Et id eos nulla architecto.</td><td>Aut sed eum atque.</td><td>Possimus veritatis dicta.</td></tr><tr><td>Blanditiis non ratione quia quo exercitationem quae possimus voluptas saepe velit voluptatibus dolorem.</td><td>Et labore rem et voluptas provident.</td><td>Provident maiores.</td></tr><tr><td>Aliquid dolorem non omnis eos nam in recusandae quis voluptates.</td><td>Quo sed porro vel libero assumenda dolores rerum et quo sit debitis.</td><td>Nihil ea iusto.</td></tr><tr><td>Asperiores eos dolor veniam eius quasi magni.</td><td>Alias hic non.</td><td>In ut quam omnis similique possimus maiores nemo.</td></tr><tr><td>Non est ut voluptatem magnam et ratione.</td><td>Natus animi sit non corrupti.</td><td>Explicabo magni.</td></tr><tr><td>Debitis nemo et non ea quia exercitationem perspiciatis quia suscipit vel.</td><td>Similique.</td><td>Qui dolores cum modi quis dolore aut.</td></tr></tbody></table><span>Delectus quia doloremque asperiores quaerat autem praesentium quia quae.</span><ul><li>Architecto.</li><li>Quia cumque voluptates.</li><li>Quas eveniet.</li><li>Est.</li><li>Sint quia et alias iusto.</li><li>Harum ullam rerum.</li></ul></div></body></html>\n', '2025-07-24 04:57:12', '2025-07-21 00:41:35', NULL, 1),
(90, 'XJGYUpiXgS', 'B8KdnW3Rrl', '8774584925739', 'asmianto83@hassanah.org', 399, 3956, 4445553, 'Option 9', 'Option 1', '[\"Option 1\",\"Option 2\"]', 'Molestiae quo impedit quo repellat exercitationem optio magnam. Autem rerum illum dolorem et.', 'Option 3', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=90', 'https://picsum.photos/200/300?random=90', '2015-05-18', '07:53:54', '#92daa2', 'Quae temporibus mollitia provident. Consequatur quae provident voluptatem explicabo ea.', '<html><head><title>Ut fugiat ipsa beatae incidunt soluta.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">rerum</label><input type=\"text\" id=\"username\"><label for=\"password\">dolor</label><input type=\"password\" id=\"password\"></form><div class=\"voluptas\"></div><div class=\"qui\"></div><div id=\"34174\"></div><div class=\"error\"></div></body></html>\n', '2025-08-15 19:11:22', '2025-08-13 23:39:52', NULL, NULL),
(91, '7HtHsyReJo', 'S2V2yWP1TX', '0425117840361', 'among60@wahyuni.asia', 926, 1668, 6834039, 'Option 4', 'Option 7', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Commodi in nemo ut et. Odit et aut dolore. Qui numquam placeat iusto ad in.', 'Option 4', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=91', 'https://picsum.photos/200/300?random=91', '1987-11-09', '07:19:01', '#e9375b', 'Et unde animi non quibusdam voluptate deleniti. Ea corporis id est assumenda quis laboriosam aut.', '<html><head><title>Sapiente.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">dignissimos</label><input type=\"text\" id=\"username\"><label for=\"password\">et</label><input type=\"password\" id=\"password\"></form><div id=\"5509\"><div id=\"40326\"></div></div><div id=\"1143\"></div></body></html>\n', '2025-08-14 05:48:32', '2025-08-14 23:26:34', 1, 1),
(92, 'mAJsitfxbw', 'mCBHOfoKiw', '8078525373970', 'nasyiah.jaga@rahimah.name', 788, 1630, 7041460, 'Option 10', 'Option 3', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Et libero ullam eum omnis. Hic dolorem maxime modi facere ullam earum totam pariatur.', 'Option 1', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=92', 'https://picsum.photos/200/300?random=92', '1993-07-28', '04:30:51', '#308d9a', 'Ad nulla et aliquid rerum. Commodi sint occaecati et et.', '<html><head><title>Sit repellat sunt vel adipisci placeat quis.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">quia</label><input type=\"text\" id=\"username\"><label for=\"password\">rerum</label><input type=\"password\" id=\"password\"></form><div class=\"aperiam\"></div><div id=\"23375\"></div><div id=\"47849\"></div></body></html>\n', '2025-08-11 03:59:12', '2025-08-08 04:40:23', 1, NULL),
(93, 'JFhe3Qu8f6', '4MVMYWU5cL', '3818880301318', 'anom14@gmail.co.id', 400, 5149, 2994968, 'Option 7', 'Option 10', '[\"Option 1\"]', 'Et quod ut delectus ratione et. Perspiciatis sunt autem ut perspiciatis a alias.', 'Option 4', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=93', 'https://picsum.photos/200/300?random=93', '1972-01-12', '14:19:45', '#201efe', 'Voluptas ea voluptatibus dolorum sint. Est et perferendis vitae. Natus sit optio ut.', '<html><head><title>Nesciunt.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">in</label><input type=\"text\" id=\"username\"><label for=\"password\">doloribus</label><input type=\"password\" id=\"password\"></form><div id=\"54676\"><a href=\"example.net\">Est porro at molestiae eos sapiente necessitatibus at.</a><b>Sunt ab expedita temporibus quia quasi minima necessitatibus.</b><b>Voluptate tempora.</b><table><thead><tr><th>Sit assumenda deserunt.</th><th>Illum explicabo rem corrupti ut.</th></tr></thead><tbody><tr><td>Earum et accusamus eum nobis id dolor.</td><td>Error aut quis et cumque totam deserunt pariatur veniam natus.</td></tr><tr><td>Id voluptatem delectus neque qui fuga deleniti rerum.</td><td>Nostrum minima ratione.</td></tr><tr><td>Laboriosam incidunt rem.</td><td>Ut deserunt nam ea.</td></tr><tr><td>Ab eos.</td><td>Sint ab nemo ab esse cupiditate animi non debitis veniam.</td></tr><tr><td>Corrupti natus.</td><td>Recusandae repellat aliquam aut consectetur culpa blanditiis qui laudantium.</td></tr></tbody></table></div><div class=\"dignissimos\"></div><div id=\"4235\"></div><div class=\"dicta\"></div></body></html>\n', '2025-08-02 21:00:41', '2025-08-17 10:41:38', 1, 1),
(94, '1xZ8LkGdnA', 'h4Dqm04vLG', '3853749780033', 'raden27@wijaya.my.id', 269, 3123, 8169562, 'Option 9', 'Option 5', '[\"Option 1\"]', 'Aut et eum cum earum ut. Totam quidem cupiditate reprehenderit dolor illo harum quas voluptas.', 'Option 1', '[\"Option 1\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=94', 'https://picsum.photos/200/300?random=94', '1988-12-23', '17:35:24', '#cd9b88', 'Commodi quia a reprehenderit aliquam sunt. Quasi repellat corporis qui excepturi fuga.', '<html><head><title>Et neque sit ad occaecati.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">et</label><input type=\"text\" id=\"username\"><label for=\"password\">enim</label><input type=\"password\" id=\"password\"></form><div class=\"id\"><div class=\"ut\"></div></div><div id=\"2453\"><div class=\"cupiditate\"></div><div id=\"44450\"></div><div id=\"47956\"></div></div><div class=\"quia\"><div id=\"99825\"></div></div><div id=\"8453\"></div></body></html>\n', '2025-08-08 06:58:56', '2025-08-08 06:53:24', NULL, NULL),
(95, 'D0o2ocMxWJ', 'JW1ICnXElX', '1214992822611', 'hesti89@gmail.co.id', 944, 1062, 6469752, 'Option 3', 'Option 9', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Eum voluptatem assumenda debitis et voluptatum. Harum occaecati in sint saepe.', 'Option 1', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=95', 'https://picsum.photos/200/300?random=95', '1982-08-21', '16:49:04', '#fa8237', 'Error vel quam quis. Maxime harum incidunt qui qui.', '<html><head><title>Asperiores impedit recusandae vero molestiae iure officiis cum consequatur dolorem.</title></head><body><form action=\"example.com\" method=\"POST\"><label for=\"username\">molestias</label><input type=\"text\" id=\"username\"><label for=\"password\">corporis</label><input type=\"password\" id=\"password\"></form><div class=\"voluptatibus\"><div class=\"ipsam\"></div><div id=\"48341\"></div></div><div class=\"animi\"><div class=\"rem\"></div></div><div id=\"33744\"></div><div id=\"31750\"></div></body></html>\n', '2025-07-21 04:11:46', '2025-08-04 23:22:57', 1, 1),
(96, 'F8KmaTFQAK', 'AZt02CQcc3', '4667907894772', 'oharyanto@yahoo.com', 940, 943, 7755030, 'Option 9', 'Option 1', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Consequatur ex impedit explicabo sit cum fuga. Voluptas quis qui animi quia.', 'Option 2', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Option 1,Option 2,Option 3', 'https://picsum.photos/200/300?random=96', 'https://picsum.photos/200/300?random=96', '1997-10-13', '09:21:02', '#913215', 'Non praesentium quaerat saepe quia et. At numquam perferendis labore eum non similique nihil.', '<html><head><title>Nostrum id.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">iure</label><input type=\"text\" id=\"username\"><label for=\"password\">et</label><input type=\"password\" id=\"password\"></form><div class=\"eum\"><div id=\"53364\"></div><div id=\"87883\"></div><div class=\"aperiam\"></div><div class=\"fugiat\"></div></div><div class=\"velit\"></div><div id=\"64018\"><div id=\"85291\"></div></div></body></html>\n', '2025-08-03 07:38:01', '2025-08-02 20:46:46', 1, 1),
(97, 'NDeiFQhQDI', 'k6Qfk3HD8P', '6031965373261', 'dirawan@haryanto.com', 148, 8344, 1621239, 'Option 10', 'Option 1', '[\"Option 1\",\"Option 2\",\"Option 3\"]', 'Unde dolor ratione mollitia et. Illo optio animi sed. Enim saepe odio libero debitis.', 'Option 1', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=97', 'https://picsum.photos/200/300?random=97', '2018-01-31', '06:07:00', '#ad01d0', 'Et illo temporibus sit totam. Tempore tenetur aut cumque qui est corrupti.', '<html><head><title>Nemo.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">qui</label><input type=\"text\" id=\"username\"><label for=\"password\">esse</label><input type=\"password\" id=\"password\"></form><div class=\"rerum\"></div></body></html>\n', '2025-07-22 14:42:03', '2025-07-28 09:24:35', 1, NULL),
(98, 'Zfoxtkpfae', 'MDi8hImewI', '4139334383889', 'kamal95@wacana.or.id', 226, 1794, 2774170, 'Option 8', 'Option 3', '[\"Option 1\"]', 'Aut distinctio aut ratione. Dolorum ab sed molestiae.', 'Option 3', '[\"Option 1\",\"Option 2\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=98', 'https://picsum.photos/200/300?random=98', '1996-11-05', '12:23:40', '#4a774f', 'Porro at quidem at. Fugiat nisi soluta quisquam qui. Fuga deleniti voluptas laborum vel ipsum sit.', '<html><head><title>Sed eos qui est deleniti ut voluptas.</title></head><body><form action=\"example.org\" method=\"POST\"><label for=\"username\">eligendi</label><input type=\"text\" id=\"username\"><label for=\"password\">iusto</label><input type=\"password\" id=\"password\"></form><div class=\"ullam\"><div class=\"a\"></div><div class=\"accusantium\"></div><div class=\"quam\"></div></div></body></html>\n', '2025-08-13 21:31:20', '2025-07-25 11:01:33', 1, 1),
(99, 'DVcdLGwyTm', 'lJSI2au0O7', '1303842823295', 'irsad.haryanti@puspita.co.id', 912, 2412, 2113111, 'Option 2', 'Option 6', '[\"Option 1\"]', 'Explicabo qui corporis molestiae beatae laudantium illum. Placeat non deleniti ut debitis.', 'Option 1', '[\"Option 1\"]', '[\"Option 1\",\"Option 2\"]', 'Option 1,Option 2', 'https://picsum.photos/200/300?random=99', 'https://picsum.photos/200/300?random=99', '2003-09-24', '16:17:08', '#9a3ab2', 'Illum excepturi non officiis vel. Autem consequatur et ea dicta accusamus dolor sed.', '<html><head><title>Aperiam facilis molestias rerum praesentium rerum quae.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">ut</label><input type=\"text\" id=\"username\"><label for=\"password\">maiores</label><input type=\"password\" id=\"password\"></form><div class=\"facilis\"><div class=\"excepturi\"></div><div class=\"eum\"></div><div class=\"libero\"></div></div><div class=\"inventore\"></div></body></html>\n', '2025-08-10 13:07:20', '2025-07-25 10:08:39', NULL, NULL),
(100, '91W6UQlWuu', 'zvrstfYxCV', '7618489441844', 'isusanti@yuniar.co.id', 731, 4458, 7912781, 'Option 3', 'Option 7', '[\"Option 1\"]', 'Temporibus non velit iusto id ratione veritatis vitae. Et et dolores aut itaque.', 'Option 4', '[\"Option 1\",\"Option 2\",\"Option 3\"]', '[\"Option 1\"]', 'Option 1', 'https://picsum.photos/200/300?random=100', 'https://picsum.photos/200/300?random=100', '1980-04-20', '06:28:04', '#3ba31a', 'Corporis molestiae in a. Omnis aut rerum repellat et.', '<html><head><title>Incidunt dicta nemo ut esse quidem ex harum nulla quaerat dolorem temporibus.</title></head><body><form action=\"example.net\" method=\"POST\"><label for=\"username\">amet</label><input type=\"text\" id=\"username\"><label for=\"password\">officiis</label><input type=\"password\" id=\"password\"></form><div id=\"52589\"><div class=\"totam\"></div><div id=\"88812\"></div><div class=\"modi\"></div></div></body></html>\n', '2025-08-15 03:21:35', '2025-07-30 15:33:27', NULL, 1);

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
(1, 'Dashboard', 'dashboard.index', NULL, 0, 'fas fa-fire', NULL, 'dashboard*', NULL, 1, '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(2, 'Contoh CRUD', 'crud-examples.index', NULL, 0, 'fas fa-atom', 'Contoh CRUD', 'crud-examples*', NULL, 1, '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(3, 'Contoh CRUD Yajra', 'crud-examples.index-yajra', NULL, 0, 'fas fa-atom', 'Contoh CRUD Yajra', 'yajra-crud-examples*', NULL, 1, '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(4, 'Contoh CRUD Ajax', 'crud-examples.index-ajax', NULL, 0, 'fas fa-atom', 'Contoh CRUD Yajra', 'ajax-crud-examples*', NULL, 1, '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(5, 'Contoh CRUD Ajax Yajra', 'crud-examples.index-ajax-yajra', NULL, 0, 'fas fa-atom', 'Contoh CRUD Ajax Yajra', 'yajra-ajax-crud-examples*', NULL, 1, '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(6, 'Bank', NULL, NULL, 0, 'fas fa-university', NULL, NULL, NULL, 1, '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(7, 'Bank', 'banks.index', NULL, 0, 'fas fa-university', 'Bank', 'banks*', 6, NULL, '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(8, 'Deposito', 'bank-deposits.index', NULL, 0, 'fas fa-dollar', 'Deposito Bank', 'bank-deposits*', 6, NULL, '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(9, 'Riwayat Deposito', 'bank-deposit-histories.index', NULL, 0, 'fas fa-dollar', 'Riwayat Deposito Bank', 'bank-deposit-histories*', 6, NULL, '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(10, 'Stisla Example', NULL, NULL, 0, 'fas fa-caret-square-down', NULL, NULL, NULL, 1, '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(11, 'Datatable', 'datatable.index', NULL, 0, 'fas fa-table', NULL, 'datatable*', 10, NULL, '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(12, 'Form', 'form.index', NULL, 0, 'fas fa-file-alt', NULL, 'form*', 10, NULL, '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(13, 'Chart JS', 'chart-js.index', NULL, 0, 'fas fa-chart-line', NULL, 'chart-js*', 10, NULL, '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(14, 'Pricing', 'pricing.index', NULL, 0, 'fas fa-dollar', NULL, 'pricing*', 10, NULL, '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(15, 'Invoice', 'invoice.index', NULL, 0, 'fas fa-dollar', NULL, 'invoice*', 10, NULL, '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(16, 'Manajemen Pengguna', NULL, NULL, 0, 'fas fa-users', NULL, 'dashboard*', NULL, 2, '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(17, 'Pengguna', 'user-management.users.index', NULL, 0, NULL, 'Pengguna', 'user-management/users*', 16, NULL, '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(18, 'Role', 'user-management.roles.index', NULL, 0, NULL, 'Role', 'user-management/roles*', 16, NULL, '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(19, 'Permission', 'user-management.permissions.index', NULL, 0, NULL, 'Permission', 'user-management/permissions*', 16, NULL, '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(20, 'Group Permission', 'user-management.permission-groups.index', NULL, 0, NULL, 'Group Permission', 'user-management/permission-groups*', 16, NULL, '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(21, 'Manajemen Menu', NULL, 'menu-managements', 0, 'fas fa-bars', NULL, 'menu-managements*', NULL, 2, '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(22, 'Menu', 'menu-managements.index', NULL, 0, NULL, 'Menu', 'menu-managements*', 21, NULL, '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(23, 'Grup Menu', 'group-menus.index', NULL, 0, NULL, 'Grup Menu', 'group-menus*', 21, NULL, '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(24, 'Manajemen File', NULL, 'file-managers', 1, 'fas fa-folder', 'Manajemen File', 'file-managers*', NULL, 2, '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(25, 'Notifikasi', 'notifications.index', NULL, 0, 'fas fa-bell', 'Notifikasi', 'notifications*', NULL, 2, '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(26, 'Log', 'activity-logs.index', NULL, 0, 'fas fa-clock-rotate-left', NULL, 'activity-logs*', NULL, 2, '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(27, 'Log Aktivitas', 'activity-logs.index', NULL, 0, 'fas fa-clock-rotate-left', 'Log Aktivitas', 'activity-logs*', 26, NULL, '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(28, 'Log Request', 'request-logs.index', NULL, 0, 'fas fa-clock-rotate-left', 'Log Request', 'request-logs*', 26, NULL, '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(29, 'Laravel Log Viewer', 'logs.index', NULL, 1, 'fas fa-circle-exclamation', 'Laravel Log Viewer', 'logs*', 26, NULL, '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(30, 'Profil', 'profile.index', NULL, 0, 'fas fa-user', 'Profil', 'profile*', NULL, 2, '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(31, 'Pengaturan', 'settings.all', NULL, 0, 'fas fa-cogs', 'Pengaturan', 'settings*', NULL, 2, '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(32, 'Ubuntu', 'ubuntu.index', NULL, 0, 'fab fa-ubuntu', 'Ubuntu', 'ubuntu*', NULL, 2, '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(33, 'Backup Database', 'backup-databases.index', NULL, 0, 'fas fa-database', 'Backup Database', 'backup-databases*', NULL, 2, '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(34, 'Keluar', 'logout', NULL, 0, 'fas fa-sign-out-alt', NULL, NULL, NULL, 2, '2025-08-18 19:09:03', '2025-08-18 19:09:03');

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
(1, 'Navigasi', '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(2, 'Menu Lainnya', '2025-08-18 19:09:03', '2025-08-18 19:09:03');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2021_05_10_041418_create_settings_table', 1),
(5, '2021_06_18_200839_create_permission_tables', 1),
(6, '2021_07_18_100149_create_crud_examples_table', 1),
(7, '2022_02_19_213049_create_permission_groups_table', 1),
(8, '2022_02_19_213152_change_permission_group_table', 1),
(9, '2022_02_19_225036_create_activity_logs_table', 1),
(10, '2022_03_06_105428_create_menu_groups_table', 1),
(11, '2022_03_06_105458_create_menus_table', 1),
(12, '2022_03_07_165342_create_notifications_table', 1),
(13, '2022_06_24_164915_create_regions_table', 1),
(14, '2023_03_12_145057_create_log_requests_table', 1),
(15, '2025_08_16_142711_create_banks_table', 1),
(16, '2025_08_16_160846_create_bank_deposits_table', 1),
(17, '2025_08_17_100159_create_bank_deposit_histories_table', 1);

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
(3, 'App\\Models\\User', 4);

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
(1, 'Test title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima doloremque, ullam pariatur vero beatae tempora dolor qui autem, similique consequatur iure explicabo. Magnam temporibus blanditiis, nesciunt iusto eius explicabo quae?', 1, 0, 'transaksi masuk', 'primary', 'bell', '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(2, 'Test title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima doloremque, ullam pariatur vero beatae tempora dolor qui autem, similique consequatur iure explicabo. Magnam temporibus blanditiis, nesciunt iusto eius explicabo quae?', 1, 0, 'transaksi masuk', 'primary', 'bell', '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(3, 'Test title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima doloremque, ullam pariatur vero beatae tempora dolor qui autem, similique consequatur iure explicabo. Magnam temporibus blanditiis, nesciunt iusto eius explicabo quae?', 1, 0, 'transaksi masuk', 'primary', 'bell', '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(4, 'Test title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima doloremque, ullam pariatur vero beatae tempora dolor qui autem, similique consequatur iure explicabo. Magnam temporibus blanditiis, nesciunt iusto eius explicabo quae?', 1, 0, 'transaksi masuk', 'primary', 'bell', '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(5, 'Test title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima doloremque, ullam pariatur vero beatae tempora dolor qui autem, similique consequatur iure explicabo. Magnam temporibus blanditiis, nesciunt iusto eius explicabo quae?', 1, 0, 'transaksi masuk', 'primary', 'bell', '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(6, 'Test title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima doloremque, ullam pariatur vero beatae tempora dolor qui autem, similique consequatur iure explicabo. Magnam temporibus blanditiis, nesciunt iusto eius explicabo quae?', 1, 0, 'transaksi masuk', 'primary', 'bell', '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(7, 'Test title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima doloremque, ullam pariatur vero beatae tempora dolor qui autem, similique consequatur iure explicabo. Magnam temporibus blanditiis, nesciunt iusto eius explicabo quae?', 1, 0, 'transaksi masuk', 'primary', 'bell', '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(8, 'Test title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima doloremque, ullam pariatur vero beatae tempora dolor qui autem, similique consequatur iure explicabo. Magnam temporibus blanditiis, nesciunt iusto eius explicabo quae?', 1, 0, 'transaksi masuk', 'primary', 'bell', '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(9, 'Test title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima doloremque, ullam pariatur vero beatae tempora dolor qui autem, similique consequatur iure explicabo. Magnam temporibus blanditiis, nesciunt iusto eius explicabo quae?', 1, 0, 'transaksi masuk', 'primary', 'bell', '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(10, 'Test title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima doloremque, ullam pariatur vero beatae tempora dolor qui autem, similique consequatur iure explicabo. Magnam temporibus blanditiis, nesciunt iusto eius explicabo quae?', 1, 0, 'transaksi masuk', 'primary', 'bell', '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(11, 'Test title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima doloremque, ullam pariatur vero beatae tempora dolor qui autem, similique consequatur iure explicabo. Magnam temporibus blanditiis, nesciunt iusto eius explicabo quae?', 1, 0, 'transaksi masuk', 'primary', 'bell', '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(12, 'Test title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima doloremque, ullam pariatur vero beatae tempora dolor qui autem, similique consequatur iure explicabo. Magnam temporibus blanditiis, nesciunt iusto eius explicabo quae?', 1, 0, 'transaksi masuk', 'primary', 'bell', '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(13, 'Test title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima doloremque, ullam pariatur vero beatae tempora dolor qui autem, similique consequatur iure explicabo. Magnam temporibus blanditiis, nesciunt iusto eius explicabo quae?', 1, 0, 'transaksi masuk', 'primary', 'bell', '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(14, 'Test title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima doloremque, ullam pariatur vero beatae tempora dolor qui autem, similique consequatur iure explicabo. Magnam temporibus blanditiis, nesciunt iusto eius explicabo quae?', 1, 0, 'transaksi masuk', 'primary', 'bell', '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(15, 'Test title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima doloremque, ullam pariatur vero beatae tempora dolor qui autem, similique consequatur iure explicabo. Magnam temporibus blanditiis, nesciunt iusto eius explicabo quae?', 1, 0, 'transaksi masuk', 'primary', 'bell', '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(16, 'Test title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima doloremque, ullam pariatur vero beatae tempora dolor qui autem, similique consequatur iure explicabo. Magnam temporibus blanditiis, nesciunt iusto eius explicabo quae?', 1, 0, 'transaksi masuk', 'primary', 'bell', '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(17, 'Test title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima doloremque, ullam pariatur vero beatae tempora dolor qui autem, similique consequatur iure explicabo. Magnam temporibus blanditiis, nesciunt iusto eius explicabo quae?', 1, 0, 'transaksi masuk', 'primary', 'bell', '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(18, 'Test title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima doloremque, ullam pariatur vero beatae tempora dolor qui autem, similique consequatur iure explicabo. Magnam temporibus blanditiis, nesciunt iusto eius explicabo quae?', 1, 0, 'transaksi masuk', 'primary', 'bell', '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(19, 'Test title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima doloremque, ullam pariatur vero beatae tempora dolor qui autem, similique consequatur iure explicabo. Magnam temporibus blanditiis, nesciunt iusto eius explicabo quae?', 1, 0, 'transaksi masuk', 'primary', 'bell', '2025-08-18 19:09:03', '2025-08-18 19:09:03'),
(20, 'Test title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima doloremque, ullam pariatur vero beatae tempora dolor qui autem, similique consequatur iure explicabo. Magnam temporibus blanditiis, nesciunt iusto eius explicabo quae?', 1, 0, 'transaksi masuk', 'primary', 'bell', '2025-08-18 19:09:03', '2025-08-18 19:09:03');

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
(1, 'Profil', 'web', '2025-08-18 19:08:58', '2025-08-18 19:08:58', 1),
(2, 'Profil Ubah', 'web', '2025-08-18 19:08:58', '2025-08-18 19:08:58', 1),
(3, 'Profil Perbarui Email', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 1),
(4, 'Profil Perbarui Password', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 1),
(5, 'Profil Hapus Akun', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 1),
(6, 'Log Aktivitas', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 2),
(7, 'Log Aktivitas Ekspor', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 2),
(8, 'Log Request', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 3),
(9, 'Log Request Ekspor', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 3),
(10, 'Role', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 4),
(11, 'Role Tambah', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 4),
(12, 'Role Impor Excel', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 4),
(13, 'Role Ubah', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 4),
(14, 'Role Detail', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 4),
(15, 'Role Hapus', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 4),
(16, 'Role Ekspor', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 4),
(17, 'Permission', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 5),
(18, 'Permission Tambah', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 5),
(19, 'Permission Impor Excel', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 5),
(20, 'Permission Ubah', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 5),
(21, 'Permission Detail', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 5),
(22, 'Permission Hapus', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 5),
(23, 'Permission Ekspor', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 5),
(24, 'Group Permission', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 6),
(25, 'Group Permission Tambah', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 6),
(26, 'Group Permission Impor Excel', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 6),
(27, 'Group Permission Ubah', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 6),
(28, 'Group Permission Detail', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 6),
(29, 'Group Permission Hapus', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 6),
(30, 'Group Permission Ekspor', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 6),
(31, 'Pengguna', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 7),
(32, 'Pengguna Tambah', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 7),
(33, 'Pengguna Impor Excel', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 7),
(34, 'Pengguna Ubah', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 7),
(35, 'Pengguna Detail', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 7),
(36, 'Pengguna Hapus', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 7),
(37, 'Pengguna Ekspor', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 7),
(38, 'Pengguna Force Login', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 7),
(39, 'Pengguna Blokir', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 7),
(40, 'Pengaturan', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 8),
(41, 'Reset Sistem', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 8),
(42, 'Manajemen File', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 9),
(43, 'Ubuntu', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 10),
(44, 'Backup Database', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 11),
(45, 'Laravel Log Viewer', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 12),
(46, 'Notifikasi', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 13),
(47, 'Menu', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 14),
(48, 'Menu Tambah', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 14),
(49, 'Menu Ubah', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 14),
(50, 'Menu Detail', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 14),
(51, 'Menu Hapus', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 14),
(52, 'Menu Ekspor', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 14),
(53, 'Menu Impor Excel', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 14),
(54, 'Grup Menu', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 15),
(55, 'Grup Menu Tambah', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 15),
(56, 'Grup Menu Ubah', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 15),
(57, 'Grup Menu Detail', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 15),
(58, 'Grup Menu Hapus', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 15),
(59, 'Contoh CRUD', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 16),
(60, 'Contoh CRUD Tambah', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 16),
(61, 'Contoh CRUD Impor Excel', 'web', '2025-08-18 19:08:59', '2025-08-18 19:08:59', 16),
(62, 'Contoh CRUD Ubah', 'web', '2025-08-18 19:09:00', '2025-08-18 19:09:00', 16),
(63, 'Contoh CRUD Detail', 'web', '2025-08-18 19:09:00', '2025-08-18 19:09:00', 16),
(64, 'Contoh CRUD Hapus', 'web', '2025-08-18 19:09:00', '2025-08-18 19:09:00', 16),
(65, 'Contoh CRUD Ekspor', 'web', '2025-08-18 19:09:00', '2025-08-18 19:09:00', 16),
(66, 'Contoh CRUD Yajra', 'web', '2025-08-18 19:09:00', '2025-08-18 19:09:00', 16),
(67, 'Contoh CRUD Ajax Yajra', 'web', '2025-08-18 19:09:00', '2025-08-18 19:09:00', 16),
(68, 'Bank', 'web', '2025-08-18 19:09:00', '2025-08-18 19:09:00', 17),
(69, 'Bank Tambah', 'web', '2025-08-18 19:09:00', '2025-08-18 19:09:00', 17),
(70, 'Bank Impor Excel', 'web', '2025-08-18 19:09:00', '2025-08-18 19:09:00', 17),
(71, 'Bank Ubah', 'web', '2025-08-18 19:09:00', '2025-08-18 19:09:00', 17),
(72, 'Bank Detail', 'web', '2025-08-18 19:09:00', '2025-08-18 19:09:00', 17),
(73, 'Bank Hapus', 'web', '2025-08-18 19:09:00', '2025-08-18 19:09:00', 17),
(74, 'Bank Ekspor', 'web', '2025-08-18 19:09:00', '2025-08-18 19:09:00', 17),
(75, 'Deposito Bank', 'web', '2025-08-18 19:09:00', '2025-08-18 19:09:00', 18),
(76, 'Deposito Bank Tambah', 'web', '2025-08-18 19:09:00', '2025-08-18 19:09:00', 18),
(77, 'Deposito Bank Impor Excel', 'web', '2025-08-18 19:09:00', '2025-08-18 19:09:00', 18),
(78, 'Deposito Bank Ubah', 'web', '2025-08-18 19:09:00', '2025-08-18 19:09:00', 18),
(79, 'Deposito Bank Detail', 'web', '2025-08-18 19:09:00', '2025-08-18 19:09:00', 18),
(80, 'Deposito Bank Hapus', 'web', '2025-08-18 19:09:00', '2025-08-18 19:09:00', 18),
(81, 'Deposito Bank Ekspor', 'web', '2025-08-18 19:09:00', '2025-08-18 19:09:00', 18),
(82, 'Riwayat Deposito Bank', 'web', '2025-08-18 19:09:00', '2025-08-18 19:09:00', 19),
(83, 'Riwayat Deposito Bank Ekspor', 'web', '2025-08-18 19:09:00', '2025-08-18 19:09:00', 19);

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
(1, 'Profil', '2025-08-18 19:08:58', '2025-08-18 19:08:58'),
(2, 'Log Aktivitas', '2025-08-18 19:08:59', '2025-08-18 19:08:59'),
(3, 'Log Request', '2025-08-18 19:08:59', '2025-08-18 19:08:59'),
(4, 'Role', '2025-08-18 19:08:59', '2025-08-18 19:08:59'),
(5, 'Permission', '2025-08-18 19:08:59', '2025-08-18 19:08:59'),
(6, 'Group Permission', '2025-08-18 19:08:59', '2025-08-18 19:08:59'),
(7, 'Pengguna', '2025-08-18 19:08:59', '2025-08-18 19:08:59'),
(8, 'Pengaturan', '2025-08-18 19:08:59', '2025-08-18 19:08:59'),
(9, 'Manajemen File', '2025-08-18 19:08:59', '2025-08-18 19:08:59'),
(10, 'Ubuntu', '2025-08-18 19:08:59', '2025-08-18 19:08:59'),
(11, 'Backup Database', '2025-08-18 19:08:59', '2025-08-18 19:08:59'),
(12, 'Laravel Log Viewer', '2025-08-18 19:08:59', '2025-08-18 19:08:59'),
(13, 'Notifikasi', '2025-08-18 19:08:59', '2025-08-18 19:08:59'),
(14, 'Menu', '2025-08-18 19:08:59', '2025-08-18 19:08:59'),
(15, 'Grup Menu', '2025-08-18 19:08:59', '2025-08-18 19:08:59'),
(16, 'Contoh CRUD', '2025-08-18 19:08:59', '2025-08-18 19:08:59'),
(17, 'Bank', '2025-08-18 19:09:00', '2025-08-18 19:09:00'),
(18, 'Deposito Bank', '2025-08-18 19:09:00', '2025-08-18 19:09:00'),
(19, 'Riwayat Deposito Bank', '2025-08-18 19:09:00', '2025-08-18 19:09:00');

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
(1, 'superadmin', 'web', 1, 1, NULL, '2025-08-18 19:08:58', '2025-08-18 19:08:58'),
(2, 'admin', 'web', 0, 1, NULL, '2025-08-18 19:08:58', '2025-08-18 19:08:58'),
(3, 'banker', 'web', 0, 1, NULL, '2025-08-18 19:08:58', '2025-08-18 19:08:58'),
(4, 'user', 'web', 0, 1, NULL, '2025-08-18 19:08:58', '2025-08-18 19:08:58');

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
(67, 4);

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
('application_name', 'Laravel 12 Template'),
('application_version', '1.0.0'),
('city', 'Jember'),
('company_name', 'PT Anam Developer'),
('country', 'Indonesia'),
('favicon', 'http://localhost:8000/assets/icons/favicon.ico'),
('google_captcha_secret', 'eyJpdiI6Ik1pRldUOEYya1FjdWhNdVE5Q0xneFE9PSIsInZhbHVlIjoidWZvS0RoYU1qcjVsQnowRTNVTW9QK3l5bUhuMDVHVVowTHhUOGxIR1pkZz0iLCJtYWMiOiI0MGRmMzNiNDA0NDc3NmNkNzU4MTMzZmE3OTVjZDJlOWI4NzU2MGIxNTNlNjAzY2E4OWJkNzgzOGNjYzdhMTQ2IiwidGFnIjoiIn0='),
('google_captcha_site_key', 'eyJpdiI6InJDMUorSWtvMnBDbFdZVk1uY25kRVE9PSIsInZhbHVlIjoiMFJQNHJaSkJUNlBUMWlYOE9acVB0L0QxWFExSllUTXpCbEg0bUovdDhxVT0iLCJtYWMiOiJkN2NiMTlhM2RjMzU4Y2U2ZDc2NGVkMGMwNGZjYzVlOGNkMDRlMTlmYWM1OTBiYWQ2ZWJkNDY1NGZiOTdhNTViIiwidGFnIjoiIn0='),
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
('sso_facebook_client_id', 'eyJpdiI6IlQ0WnN4eWw0S01kOWt5bkdZZFZEZFE9PSIsInZhbHVlIjoiSXJxTUd2clJMZGJnUHZxVWtxaDVqUT09IiwibWFjIjoiNmEyMzE4OGNjZGFmNjQ1NjdlNTYyMjdkYmY1ZWRjZWFiYzQ1ODBhM2QwZGE5ZmUwZjZiM2ZiOGZhMzJlMmUwNyIsInRhZyI6IiJ9'),
('sso_facebook_client_secret', 'eyJpdiI6ImZ4Z3EwV3QzZ2cxNktMSjFqVkRwNEE9PSIsInZhbHVlIjoiM2FlMXpDVDEzSnBJVWx2K3NGZmJtZz09IiwibWFjIjoiZWFhZTkxYWVjNzBkNDJmZmQ4NzFlYzAwNDY4ZTEwM2E2YTI4ZmZlYTRiOTU2ZmVlNDgyYWI3NTZlYjRkYzkzNiIsInRhZyI6IiJ9'),
('sso_facebook_redirect', 'eyJpdiI6InRFbXMvSkdqTWlJb1F4RW9rT3VDZ2c9PSIsInZhbHVlIjoiYm9TVEhNUDdnVUhoUDFpTWJtV3VUWEptL0tXbHhLQTYzVXhFNU95NDdRZHp1SHdvMW9XZ0JrRGVoRWwvTjJ5QldnS2V2VnJiMWY3SG5WSWo4VDZrc2c9PSIsIm1hYyI6ImRiYjc1OGVlMzk4MTc0MTgxYzU1OTM5NDIzNjBjNWRiZWIyOGFiMTBjODFmZGZiYjJlNDJjYWRlMzc3NDdjN2UiLCJ0YWciOiIifQ=='),
('sso_github_client_id', 'eyJpdiI6ImhUT1pNcmFQcUJZajlBQ21mNTZsNmc9PSIsInZhbHVlIjoiRWZnc2diblNNeVR6MTRZbXhST2hxUT09IiwibWFjIjoiNjUwYzY5ODNmMjE1NzYwMGQxYjk5MTY5OWMzNWU1MjhlMjNkZTdjMDQ2NGY2OTg3M2E2ZmNmMTI4NmI2ZmU2NyIsInRhZyI6IiJ9'),
('sso_github_client_secret', 'eyJpdiI6IlRSMStYWXhNSGozZkZoS1U0OS9iM0E9PSIsInZhbHVlIjoicGNVck5tNFJQVkpSWmVielJyYnRxQT09IiwibWFjIjoiZWE4YTAzNGJkNzE4NjU5OGQ4NjkzZTc3ODU0MmMyYjUzNGY1ZjkxMWQ1OTcyODc3ODNhYjgwNTY1NjBlMjIyZCIsInRhZyI6IiJ9'),
('sso_github_redirect', 'eyJpdiI6Imx4djRQTmZPQUN5YWNFSHByZ2gwYmc9PSIsInZhbHVlIjoiTlRiUEc3SytFc3h3MHJhZDBBYW5SWGNvLzVMdDU2bkVtUWIzYUFTUGRRY2FFcVZ5eUFOUUJnYXFxWEJMVGx0aXk3OFZTMUpHeXVvVmRRVCtYRVM2Tnc9PSIsIm1hYyI6IjA2NzU3MTMzMTUyNTZlMGExZjNkYTBiODdjMDg5MjNiMWNjNWFlNWJlMDgxNzcwYzczMmM4MDNjMTUyMDk0M2QiLCJ0YWciOiIifQ=='),
('sso_google_client_id', 'eyJpdiI6IkxSckU4RklUeGJFTmp4bTRJYis4RGc9PSIsInZhbHVlIjoiRVkvb2F1WGljVXIrUldtUWxTZjVPUT09IiwibWFjIjoiOWE2ODRmNjk0MGEzZjgwYzczZTZiYzgxMjc4MGU3MDM5YTAyYjEwOGJhNGRkZjIzZjA0NGYwYmI2YjgyOTRhOSIsInRhZyI6IiJ9'),
('sso_google_client_secret', 'eyJpdiI6InhuaG1KNG9SUTl5NFNwZkx5VENlVmc9PSIsInZhbHVlIjoiREdWcDJCalJFbnNqbGxNb3M5QmFLUT09IiwibWFjIjoiZGYxOGNmZWQ1YTg4MzkwODkyNDUwNDY0ZmM5NDk3ODlhYThhNTAyM2U1NjM4YWJiNmZlMGZkNzdkY2JiMDY3ZSIsInRhZyI6IiJ9'),
('sso_google_redirect', 'eyJpdiI6Ik9qZGliZUdhNEhtbVZ0a1FYbisycFE9PSIsInZhbHVlIjoicEJBdCtBNVRNRkRDVVZpM0NjcDkxZTZGVTM4ZSt6Z1REdmsxdE5TcWJPQ0N6bkd4US9ZSjAvdHRMZDhXSTFzeHpYNm5rNWlZNGdlMlBZcktCS3VESlE9PSIsIm1hYyI6ImYxZDc1YzMwNzAwNzQ4OWE5NDc4YTYxZDM1Yjc4NDJlZWQyYjdmZTc4MTM1MTZiMGE4OGFiZDU3NTM4ZWFjZjQiLCJ0YWciOiIifQ=='),
('sso_twitter_client_id', 'eyJpdiI6ImFsWGtXZ25CSjR5MHdtbjFOTjhPUUE9PSIsInZhbHVlIjoic21JSnh5UER5ME5xcy9DL29uWjFkdz09IiwibWFjIjoiMjQyMmUzMDFhMmY2MWIyZDU5MTM4MzY2NzE2ZWFlZjU0NGMyZTk3Y2U1MjU1Y2JjNDJlYzI5NGNkMDQwMDVhZiIsInRhZyI6IiJ9'),
('sso_twitter_client_secret', 'eyJpdiI6IkNwSUR0V3N3MUFvbTd6R0NDR0k5MWc9PSIsInZhbHVlIjoiUlp5SGdTdjd2c1k1WVRtNnVmNUdwQT09IiwibWFjIjoiYzJjNTNkZTY5MmFkYzQ1ZTEzMmFlMGEzM2VmNmEyNDE4MTVjNDgzMWY0OTQ4Y2VmMDQ3NTA5NzM3MGFkMTM2ZSIsInRhZyI6IiJ9'),
('sso_twitter_redirect', 'eyJpdiI6Imt4MlI5TkNkSmVzQXhITlQ1Vkg5M2c9PSIsInZhbHVlIjoiaHdQakZXMDgxejhzM1gzWnhFYnNWTDJ6bWdEbGlHRnByRW1zMkltbkRtQmFYUWw1TzZBelQ1QjZtb0Evd3BvMm1DWWY1YjBCbDIvN2pJMVhBRlo1cEE9PSIsIm1hYyI6ImM3ZTg4NDBhOGRiMDExZjU1NGVlOTNiZGNkMjQzODE4MTM0NTY3NDJmMDlmYjZmNmY4NTJlNDgzN2ViYTczNTgiLCJ0YWciOiIifQ=='),
('stisla_bg_home', 'http://localhost:8000/stisla/assets/img/unsplash/andre-benz-1214056-unsplash.jpg'),
('stisla_bg_login', 'http://localhost:8000/stisla/assets/img/unsplash/eberhard-grossgasteiger-1207565-unsplash.jpg'),
('stisla_login_template', 'default'),
('stisla_sidebar_mini', '0'),
('stisla_skin', 'style');

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
(1, 'Hairul Anam Superadmin', 'superadmin@laravel12template.com', NULL, '2021-04-05 21:06:00', '$2y$12$AA5FqCss6FMUoyGFTJ0/ue/gaWr907J81Ui3Wn1AeizMj2pF0DSBq', NULL, NULL, NULL, 1, '6285322778935', '1998-04-08', 'Jember', '2025-08-19 02:09:01', NULL, NULL, 0, 1, NULL, NULL, NULL, '2025-08-18 19:09:01', '2025-08-18 19:09:01', 1, NULL, NULL),
(2, 'Hairul Anam Admin', 'admin@laravel12template.com', NULL, '2021-04-05 21:06:00', '$2y$12$GdsmmmyFhRK.Kg/bxKa3ZOsjOHIoPgUiROLqohgX4MmeY0tfQzjA2', NULL, NULL, NULL, 0, '6285322778935', '1998-04-08', 'Jember', '2025-08-19 02:09:02', NULL, NULL, 0, 1, NULL, NULL, NULL, '2025-08-18 19:09:02', '2025-08-18 19:09:02', 1, NULL, NULL),
(3, 'Hairul Anam User', 'user@laravel12template.com', NULL, '2021-04-05 21:06:00', '$2y$12$UoTT1s9dYUur2DOsiddO9ufB8W9k.dWUKWU/nhhnUyMSCqocRbEja', NULL, NULL, NULL, 0, '6285322778935', '1998-04-08', 'Jember', '2025-08-19 02:09:02', NULL, NULL, 0, 1, NULL, NULL, NULL, '2025-08-18 19:09:02', '2025-08-18 19:09:02', 1, NULL, NULL),
(4, 'Hairul Anam Banker', 'banker@laravel12template.com', NULL, '2021-04-05 21:06:00', '$2y$12$dzkKyJ7.C2W23OqZUjpvTul.cZ9hjBhB4e9SmYWpmdTZ3.A2rnEf6', NULL, NULL, NULL, 0, '6285322778935', '1998-04-08', 'Jember', '2025-08-19 02:09:03', NULL, NULL, 0, 1, NULL, NULL, NULL, '2025-08-18 19:09:03', '2025-08-18 19:09:03', 1, NULL, NULL);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `menu_groups`
--
ALTER TABLE `menu_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `permission_groups`
--
ALTER TABLE `permission_groups`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
