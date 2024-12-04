-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2024 at 03:51 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product_registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `code` varchar(2) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `code`, `name`) VALUES
(1, 'AD', 'ADVAN'),
(9, 'AR', 'ARTUGO'),
(10, 'BK', 'BEKO'),
(11, 'BR', 'BERVIN'),
(12, 'CH', 'CHANGHONG'),
(14, 'CO', 'COSMOS'),
(15, 'DA', 'DAIKIN'),
(16, 'EL', 'ELECTROLUX'),
(17, 'GE', 'GEA'),
(18, 'GM', 'GMC'),
(19, 'GR', 'GREE'),
(20, 'HA', 'HAIER'),
(21, 'HS', 'HISENSE'),
(22, 'IN', 'INTRA'),
(23, 'JU', 'JUNDO'),
(24, 'LG', 'LG'),
(25, 'MD', 'MIDEA'),
(26, 'MT', 'MITO'),
(27, 'MB', 'MITSUBISHI HEAVY INDUSTRIES'),
(28, 'MY', 'MIYAKO'),
(29, 'PN', 'PANASONIC'),
(30, 'PT', 'POLYTRON'),
(31, 'RW', 'REIWA'),
(32, 'RS', 'RSA'),
(33, 'SG', 'SAGA'),
(34, 'SM', 'SAMSUNG'),
(35, 'SP', 'SHARP'),
(36, 'ST', 'STEKO'),
(37, 'TC', 'TCL'),
(38, 'TB', 'TOSHIBA'),
(40, 'ZB', 'ZEBRA'),
(41, 'PH', 'PHILIPS'),
(53, 'AQ', 'AQUA');

-- --------------------------------------------------------

--
-- Table structure for table `capacities`
--

CREATE TABLE `capacities` (
  `id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `capacities`
--

INSERT INTO `capacities` (`id`, `subcategory_id`, `value`) VALUES
(38, 29, '42 L'),
(39, 29, '46 L'),
(40, 29, '47 L'),
(41, 29, '50 L'),
(42, 4, '42 L'),
(43, 4, '46 L'),
(44, 4, '47 L'),
(45, 4, '50 L'),
(46, 21, '42 L'),
(47, 21, '46 L'),
(48, 21, '47 L'),
(49, 21, '50 L'),
(50, 24, '6,5 Kg'),
(51, 24, '7 Kg'),
(52, 24, '7,5 Kg'),
(53, 24, '8 Kg'),
(54, 9, '0,5 PK'),
(55, 9, '0,75 PK'),
(56, 9, '1 PK'),
(57, 9, '1,5 PK'),
(58, 4, '60 L'),
(59, 4, '128 L'),
(60, 4, '133 L'),
(61, 38, '1.3 L'),
(66, 33, '1.2 L'),
(67, 43, '0.3 L'),
(68, 44, '20 L'),
(69, 45, '1 TUNGKU'),
(70, 46, '1 TUNGKU'),
(71, 48, '4 SLICE'),
(72, 49, '1 L'),
(73, 6, '100 L'),
(74, 53, '500 ML'),
(75, 54, '2.4 L'),
(76, 54, '4.1 L'),
(77, 10, '1 PK'),
(78, 25, '9 KG'),
(79, 78, '72V/20AH'),
(80, 4, '90 L');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(3, 'KULKAS'),
(4, 'FREEZER'),
(5, 'AC'),
(6, 'MESIN CUCI'),
(7, 'SHOWCASE'),
(9, 'TV'),
(10, 'SMALL APPLIANCES');

-- --------------------------------------------------------

--
-- Table structure for table `compressor_warranties`
--

CREATE TABLE `compressor_warranties` (
  `id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `compressor_warranties`
--

INSERT INTO `compressor_warranties` (`id`, `value`) VALUES
(1, '<1'),
(4, '1'),
(5, '2'),
(6, '3'),
(7, '10');

-- --------------------------------------------------------

--
-- Table structure for table `garansi_elemen_panas`
--

CREATE TABLE `garansi_elemen_panas` (
  `id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `garansi_elemen_panas`
--

INSERT INTO `garansi_elemen_panas` (`id`, `value`) VALUES
(1, '<1'),
(2, '1'),
(3, '2'),
(4, '3');

-- --------------------------------------------------------

--
-- Table structure for table `garansi_motor`
--

CREATE TABLE `garansi_motor` (
  `id` int(11) UNSIGNED NOT NULL,
  `value` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `garansi_motor`
--

INSERT INTO `garansi_motor` (`id`, `value`) VALUES
(1, '<1'),
(2, '1'),
(3, '2'),
(4, '3');

-- --------------------------------------------------------

--
-- Table structure for table `garansi_panel`
--

CREATE TABLE `garansi_panel` (
  `id` int(11) UNSIGNED NOT NULL,
  `value` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `garansi_panel`
--

INSERT INTO `garansi_panel` (`id`, `value`) VALUES
(1, '<1'),
(2, '1'),
(3, '2'),
(4, '3');

-- --------------------------------------------------------

--
-- Table structure for table `garansi_semua_service`
--

CREATE TABLE `garansi_semua_service` (
  `id` int(11) UNSIGNED NOT NULL,
  `value` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `garansi_semua_service`
--

INSERT INTO `garansi_semua_service` (`id`, `value`) VALUES
(1, '<1'),
(2, '1'),
(3, '2'),
(4, '3');

-- --------------------------------------------------------

--
-- Table structure for table `marketplaces`
--

CREATE TABLE `marketplaces` (
  `id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marketplaces`
--

INSERT INTO `marketplaces` (`id`, `location`, `phone`) VALUES
(1, 'Test Location', '6287822297790'),
(2, 'Cirebon', '6287811528848'),
(6, 'Tasikmalaya', '6287811528848');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2024-12-02-083040', 'App\\Database\\Migrations\\CreateWheelSegments', 'default', 'App', 1733128303, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `capacity_id` int(11) DEFAULT NULL,
  `compressor_warranty_id` int(11) DEFAULT NULL,
  `sparepart_warranty_id` int(11) DEFAULT NULL,
  `garansi_elemen_panas_id` int(11) DEFAULT NULL,
  `garansi_motor_id` int(11) UNSIGNED DEFAULT NULL,
  `garansi_panel_id` int(11) UNSIGNED DEFAULT NULL,
  `garansi_semua_service_id` int(11) UNSIGNED DEFAULT NULL,
  `ukuran_id` int(11) UNSIGNED DEFAULT NULL,
  `product_type` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `kapasitas_air_panas` varchar(255) DEFAULT NULL,
  `kapasitas_air_dingin` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `category_id`, `subcategory_id`, `capacity_id`, `compressor_warranty_id`, `sparepart_warranty_id`, `garansi_elemen_panas_id`, `garansi_motor_id`, `garansi_panel_id`, `garansi_semua_service_id`, `ukuran_id`, `product_type`, `color`, `kapasitas_air_panas`, `kapasitas_air_dingin`, `created_at`, `updated_at`) VALUES
(77, 12, 5, 9, 55, 1, 1, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'MERAH', NULL, NULL, '2024-10-28 01:17:55', '2024-10-28 01:17:55'),
(78, 10, 5, 9, 54, 1, 1, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'MERAH', NULL, NULL, '2024-10-28 01:24:12', '2024-10-28 01:24:12'),
(79, 9, 5, 9, 54, 1, 1, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'MERAH', NULL, NULL, '2024-10-28 01:29:18', '2024-10-28 01:29:18'),
(80, 1, 5, 9, 54, 1, 1, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'MERAH', NULL, NULL, '2024-10-28 01:33:16', '2024-10-28 01:33:16'),
(81, 9, 9, 15, NULL, NULL, 1, NULL, NULL, 1, NULL, 3, 'ABCD09', 'MERAH', NULL, NULL, '2024-10-28 03:06:34', '2024-10-28 03:06:34'),
(82, 9, 9, 15, NULL, NULL, 1, NULL, NULL, 1, NULL, 1, 'ABCD09', 'MERAH', NULL, NULL, '2024-10-28 03:07:35', '2024-10-28 03:07:35'),
(83, 10, 4, 4, 42, 1, 1, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'MERAH', NULL, NULL, '2024-10-28 03:32:20', '2024-10-28 03:32:20'),
(84, 14, 5, 9, 54, 1, 1, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'MERAH', NULL, NULL, '2024-10-28 06:13:09', '2024-10-28 07:31:17'),
(85, 10, 3, 21, 48, 4, 1, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'MERAH', NULL, NULL, '2024-10-28 08:30:11', '2024-10-28 08:30:11'),
(86, 16, 5, 9, 56, 1, 1, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'PUTIH', NULL, NULL, '2024-10-29 01:16:56', '2024-10-29 01:16:56'),
(88, 1, 9, 15, NULL, NULL, 1, NULL, NULL, 1, NULL, 1, 'ABC-D09', 'BIRU', NULL, NULL, '2024-10-29 08:00:11', '2024-10-29 08:00:11'),
(89, 1, 9, 15, NULL, NULL, 1, NULL, NULL, 1, NULL, 1, 'ABCD09', 'HITAM', NULL, NULL, '2024-10-30 08:10:45', '2024-10-30 08:10:45'),
(90, 1, 9, 15, NULL, NULL, 1, NULL, NULL, 2, NULL, 1, 'ABCD09', 'HITAM', NULL, NULL, '2024-10-30 08:12:49', '2024-10-30 08:12:49'),
(91, 18, 4, 4, 58, 5, 6, NULL, NULL, NULL, NULL, NULL, 'ABC-D09/', 'HITAM', NULL, NULL, '2024-10-30 09:36:17', '2024-10-30 09:36:17'),
(92, 18, 3, 21, 46, 1, 6, NULL, NULL, NULL, NULL, NULL, 'ABC-D09/', 'HITAM', NULL, NULL, '2024-10-30 09:40:31', '2024-10-30 09:40:31'),
(93, 10, 3, 21, 46, 1, 6, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'BIRU', NULL, NULL, '2024-10-30 09:42:27', '2024-10-30 09:42:27'),
(94, 10, 9, 16, NULL, NULL, 6, NULL, NULL, 1, NULL, 12, 'ABCD09', 'BIRU', NULL, NULL, '2024-10-30 09:46:45', '2024-10-30 09:46:45'),
(95, 19, 3, 21, 49, 5, 6, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'BIRU', NULL, NULL, '2024-10-31 03:26:18', '2024-10-31 03:26:18'),
(96, 15, 4, 4, 42, 6, 7, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'HITAM', NULL, NULL, '2024-10-31 03:43:52', '2024-10-31 03:43:52'),
(97, 16, 3, 21, 46, 6, 6, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'HITAM', NULL, NULL, '2024-10-31 07:34:48', '2024-10-31 07:34:48'),
(98, 1, 3, 21, 46, 1, 1, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'MERAH', NULL, NULL, '2024-10-31 08:12:39', '2024-10-31 08:12:39'),
(99, 1, 4, 4, 42, 4, 1, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'MERAH', NULL, NULL, '2024-10-31 08:13:41', '2024-10-31 08:13:41'),
(100, 1, 3, 21, 46, 1, 1, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'MERAH', NULL, NULL, '2024-10-31 08:15:23', '2024-10-31 08:15:23'),
(101, 19, 4, 4, 59, 4, 7, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'PUTIH', NULL, NULL, '2024-10-31 08:22:02', '2024-10-31 08:22:02'),
(102, 1, 3, 21, 46, 1, 1, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'MERAH', NULL, NULL, '2024-10-31 08:26:10', '2024-10-31 08:26:10'),
(103, 10, 4, 4, 42, 1, 4, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'BIRU', NULL, NULL, '2024-10-31 08:42:07', '2024-10-31 08:42:07'),
(104, 1, 3, 21, 46, 1, 1, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'MERAH', NULL, NULL, '2024-10-31 08:52:05', '2024-10-31 08:52:05'),
(105, 1, 4, 4, 59, 1, 1, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'MERAH', NULL, NULL, '2024-10-31 08:54:19', '2024-10-31 08:54:19'),
(106, 1, 5, 9, 54, 1, 1, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'MERAH', NULL, NULL, '2024-10-31 08:54:46', '2024-10-31 08:54:46'),
(107, 1, 4, 4, 45, 4, 1, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'MERAH', NULL, NULL, '2024-10-31 09:00:26', '2024-10-31 09:00:26'),
(108, 1, 9, 16, NULL, NULL, 4, NULL, NULL, 1, NULL, 12, 'ABCD09', 'HIJAU', NULL, NULL, '2024-10-31 09:16:50', '2024-10-31 09:16:50'),
(109, 21, 6, 24, NULL, NULL, 6, NULL, 1, NULL, NULL, NULL, 'ABCD09', 'HITAM', NULL, NULL, '2024-10-31 10:15:16', '2024-10-31 10:15:16'),
(110, 11, 10, 36, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'HIJAU', '8', '7', '2024-11-04 06:10:59', '2024-11-04 06:10:59'),
(111, 12, 6, 24, NULL, NULL, 4, NULL, 1, NULL, NULL, NULL, 'ABCD09E1', 'HIJAU', NULL, NULL, '2024-11-05 07:38:32', '2024-11-05 07:38:32'),
(112, 27, 10, 36, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'MERAH', '6', '6', '2024-11-05 08:07:12', '2024-11-05 08:07:12'),
(113, 27, 9, 15, NULL, NULL, 1, NULL, NULL, 1, NULL, 1, 'ABCD09', 'MERAH', NULL, NULL, '2024-11-05 08:22:26', '2024-11-05 08:22:26'),
(114, 1, 3, 21, 46, 1, 7, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'MERAH', NULL, NULL, '2024-11-05 08:31:07', '2024-11-05 08:31:07'),
(115, 10, 10, 38, NULL, NULL, 4, 1, NULL, NULL, NULL, NULL, 'ABCD09', 'PUTIH', NULL, NULL, '2024-11-05 09:38:20', '2024-11-05 09:38:20'),
(116, 16, 10, 38, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, 'ABCD09', 'PUTIH', NULL, NULL, '2024-11-05 09:39:44', '2024-11-05 09:39:44'),
(117, 16, 10, 38, NULL, NULL, 1, 4, NULL, NULL, NULL, NULL, 'ABCD09', 'PUTIH', NULL, NULL, '2024-11-05 09:40:48', '2024-11-05 09:40:48'),
(118, 16, 6, 24, NULL, NULL, 1, NULL, 1, NULL, NULL, NULL, 'ABCD09', 'HIJAU', NULL, NULL, '2024-11-05 09:46:57', '2024-11-05 09:46:57'),
(119, 14, 5, 9, 55, 1, 1, NULL, NULL, NULL, NULL, NULL, 'HVILAPN0132', 'KUNING', NULL, NULL, '2024-11-06 06:42:25', '2024-11-06 06:42:25'),
(120, 16, 9, 16, NULL, NULL, 6, NULL, NULL, 2, NULL, 12, 'A90DWW9', 'KUNING', NULL, NULL, '2024-11-06 08:21:12', '2024-11-06 08:21:12'),
(121, 16, 9, 15, NULL, NULL, 6, NULL, NULL, 1, NULL, 1, 'A90DWW9', 'KUNING', NULL, NULL, '2024-11-06 08:38:11', '2024-11-06 08:38:11'),
(122, 16, 10, 31, NULL, NULL, NULL, NULL, NULL, NULL, 2, 7, 'ABCD09', 'KUNING', NULL, NULL, '2024-11-08 08:28:58', '2024-11-08 08:28:58'),
(123, 16, 10, 31, NULL, NULL, NULL, NULL, NULL, NULL, 3, 7, 'ABCD09', 'KUNING', NULL, NULL, '2024-11-08 08:30:05', '2024-11-08 08:30:05'),
(124, 24, 10, 36, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'J2EI0EP1S', 'PUTIH', '9', NULL, '2024-11-08 08:32:51', '2024-11-08 08:32:51'),
(125, 24, 10, 36, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'J2EI0EP1S', 'PUTIH', '9', '10', '2024-11-08 08:33:17', '2024-11-08 08:33:17'),
(126, 24, 5, 9, 55, 1, 1, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'UNGU', NULL, NULL, '2024-11-10 00:34:32', '2024-11-10 00:34:32'),
(127, 17, 10, 42, NULL, NULL, 4, 2, NULL, NULL, NULL, NULL, 'JFQ0WFJ', 'PUTIH', NULL, NULL, '2024-11-12 04:09:08', '2024-11-12 04:09:08'),
(128, 1, 10, 47, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'JDWQD0QW', 'HIJAU', NULL, NULL, '2024-11-12 06:33:55', '2024-11-12 06:33:55'),
(129, 11, 10, 52, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'JJ09WEFFC', 'HITAM', NULL, NULL, '2024-11-14 03:09:32', '2024-11-14 03:09:32'),
(130, 25, 10, 52, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'D0WFIEW1A', 'MERAH', NULL, NULL, '2024-11-14 03:15:58', '2024-11-14 03:15:58'),
(131, 22, 10, 35, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'PPWE21', 'PUTIH', '12jk', '1jj', '2024-11-15 02:01:58', '2024-11-15 02:01:58'),
(132, 15, 9, 19, NULL, NULL, 1, NULL, NULL, 1, NULL, 19, 'PPWE21', 'PUTIH', NULL, NULL, '2024-11-15 02:53:58', '2024-11-15 02:53:58'),
(133, 22, 9, 18, NULL, NULL, 1, NULL, NULL, 1, NULL, 18, 'CKJ0WCW', 'HIJAU', NULL, NULL, '2024-11-15 02:55:00', '2024-11-15 02:55:00'),
(134, 25, 9, 18, NULL, NULL, 1, NULL, NULL, 1, NULL, 18, 'SC0WC2', 'HIJAU', NULL, NULL, '2024-11-15 02:56:56', '2024-11-15 02:56:56'),
(135, 25, 9, 18, NULL, NULL, 1, NULL, NULL, 2, NULL, 18, 'SC0WC2', 'HIJAU', NULL, NULL, '2024-11-15 02:58:34', '2024-11-15 02:58:34'),
(136, 27, 9, 19, NULL, NULL, 4, NULL, NULL, 3, NULL, 19, 'D9Q9DJ911', 'PINK', NULL, NULL, '2024-11-15 02:59:32', '2024-11-15 02:59:32'),
(137, 15, 5, 9, 56, 1, 1, NULL, NULL, NULL, NULL, NULL, 'FTKCSTRINV1', 'PUTIH', NULL, NULL, '2024-11-15 03:05:43', '2024-11-15 03:05:43'),
(138, 15, 5, 9, 56, 4, 1, NULL, NULL, NULL, NULL, NULL, 'FTKC25TVM4', 'PUTIH', NULL, NULL, '2024-11-15 03:07:22', '2024-11-15 03:07:22'),
(139, 41, 10, 54, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'HD920091', 'HITAM', NULL, NULL, '2024-11-15 04:07:10', '2024-11-15 04:07:10'),
(140, 35, 5, 10, 77, 6, 7, NULL, NULL, NULL, NULL, NULL, 'AHAP9UHL', 'PUTIH', NULL, NULL, '2024-11-15 06:18:37', '2024-11-15 06:18:37'),
(141, 34, 9, 18, NULL, NULL, 4, NULL, NULL, 2, NULL, 20, 'QA55QE1DAKXXD', 'HITAM', NULL, NULL, '2024-11-18 08:04:50', '2024-11-18 08:04:50'),
(142, 30, 9, 19, NULL, NULL, 4, NULL, NULL, 1, NULL, 21, 'PLD55UG5959', 'HITAM', NULL, NULL, '2024-11-18 08:18:23', '2024-11-18 08:18:23'),
(143, 15, 5, 9, 56, 5, 1, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'HITAM', NULL, NULL, '2024-11-19 06:57:39', '2024-11-19 06:57:39'),
(144, 9, 3, 21, 47, 1, 1, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'KUNING', NULL, NULL, '2024-11-19 07:13:21', '2024-11-19 07:13:21'),
(145, 9, 5, 9, 54, 1, 1, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'KUNING', NULL, NULL, '2024-11-19 07:16:07', '2024-11-19 07:16:07'),
(146, 10, 4, 4, 43, 1, 1, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'HIJAU', NULL, NULL, '2024-11-19 09:12:56', '2024-11-19 09:12:56'),
(147, 10, 5, 10, 77, 1, 1, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'HIJAU', NULL, NULL, '2024-11-19 09:32:13', '2024-11-19 09:32:13'),
(148, 10, 9, 15, NULL, NULL, 1, NULL, NULL, 1, NULL, 1, 'ABCD09', 'HIJAU', NULL, NULL, '2024-11-19 09:59:34', '2024-11-19 09:59:34'),
(149, 11, 5, 9, 54, 1, 1, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'BIRU', NULL, NULL, '2024-11-20 03:44:23', '2024-11-20 03:44:23'),
(150, 11, 5, 10, 77, 1, 1, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'BIRU', NULL, NULL, '2024-11-20 04:05:26', '2024-11-20 04:05:26'),
(151, 11, 9, 15, NULL, NULL, 1, NULL, NULL, 1, NULL, 1, 'ABCD09', 'BIRU', NULL, NULL, '2024-11-20 04:05:54', '2024-11-20 04:05:54'),
(152, 11, 5, 10, 77, 4, 1, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'BIRU', NULL, NULL, '2024-11-20 04:15:16', '2024-11-20 04:15:16'),
(153, 11, 6, 24, 52, NULL, 1, NULL, 1, NULL, NULL, NULL, 'ABCD09', 'BIRU', NULL, NULL, '2024-11-20 04:19:40', '2024-11-20 04:19:40'),
(154, 11, 5, 9, 54, 1, 1, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'BIRU', NULL, NULL, '2024-11-20 06:03:40', '2024-11-20 06:03:40'),
(155, 11, 9, 15, NULL, NULL, 1, NULL, NULL, 2, NULL, 1, 'ABCD09', 'BIRU', NULL, NULL, '2024-11-20 06:05:42', '2024-11-20 06:05:42'),
(156, 11, 5, 9, 54, 1, 1, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'BIRU', NULL, NULL, '2024-11-20 06:08:14', '2024-11-20 06:08:14'),
(157, 11, 10, 46, 70, NULL, 1, NULL, NULL, NULL, 1, NULL, 'ABCD09', 'BIRU', NULL, NULL, '2024-11-20 06:09:22', '2024-11-20 06:09:22'),
(158, 25, 10, 38, 61, NULL, 1, 1, NULL, NULL, NULL, NULL, 'ABCD09', 'BIRU', NULL, NULL, '2024-11-20 08:48:34', '2024-11-20 08:48:34'),
(159, 9, 5, 9, 55, 4, 4, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'KUNING', NULL, NULL, '2024-11-20 09:23:24', '2024-11-20 09:23:24'),
(160, 19, 5, 9, 54, 6, 7, NULL, NULL, NULL, NULL, NULL, 'A90DWW9', 'BIRU', NULL, NULL, '2024-11-21 06:11:47', '2024-11-21 06:11:47'),
(161, 20, 5, 9, 54, 4, 4, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'HIJAU', NULL, NULL, '2024-11-21 06:43:05', '2024-11-21 06:43:05'),
(162, 22, 9, 16, NULL, NULL, 1, NULL, NULL, 2, NULL, 12, 'ABCD09', 'KUNING', NULL, NULL, '2024-11-21 07:36:49', '2024-11-21 07:36:49'),
(163, 11, 5, 10, 77, 4, 1, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'BIRU', NULL, NULL, '2024-11-21 09:49:06', '2024-11-21 09:49:06'),
(164, 10, 10, 52, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'PUTIH', NULL, NULL, '2024-11-22 03:03:45', '2024-11-22 03:03:45'),
(165, 1, 3, 6, 73, 1, 1, NULL, NULL, NULL, NULL, NULL, 'AB', 'MERAH', NULL, NULL, '2024-11-22 03:46:35', '2024-11-22 03:46:35'),
(166, 1, 3, 6, 73, 1, 1, NULL, NULL, NULL, NULL, NULL, 'AB', 'MERAH', NULL, NULL, '2024-11-22 03:46:59', '2024-11-22 03:46:59'),
(167, 1, 3, 6, 73, 4, 1, NULL, NULL, NULL, NULL, NULL, 'AB', 'MERAH', NULL, NULL, '2024-11-22 07:02:22', '2024-11-22 07:02:22'),
(168, 16, 9, 16, NULL, NULL, 1, NULL, NULL, 2, NULL, 12, 'AB', 'MERAH', NULL, NULL, '2024-11-22 07:02:47', '2024-11-22 07:02:47'),
(169, 16, 9, 16, NULL, NULL, 1, NULL, NULL, 2, NULL, 12, 'AB', 'MERAH', NULL, NULL, '2024-11-22 07:03:48', '2024-11-22 07:03:48'),
(170, 16, 10, 43, 67, NULL, 1, 2, NULL, NULL, NULL, NULL, 'AB', 'MERAH', NULL, NULL, '2024-11-22 07:04:25', '2024-11-22 07:04:25'),
(171, 16, 10, 35, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'AB', 'MERAH', '9', '80', '2024-11-22 07:04:47', '2024-11-22 07:04:47'),
(172, 16, 6, 24, 51, NULL, 1, NULL, 2, NULL, NULL, NULL, 'AB', 'MERAH', NULL, NULL, '2024-11-22 07:06:35', '2024-11-22 07:06:35'),
(173, 16, 6, 24, 51, NULL, 1, NULL, 1, NULL, NULL, NULL, 'AB', 'MERAH', NULL, NULL, '2024-11-22 07:06:49', '2024-11-22 07:06:49'),
(174, 16, 9, 16, NULL, NULL, 1, NULL, NULL, 1, NULL, 12, 'AB', 'MERAH', NULL, NULL, '2024-11-22 07:09:20', '2024-11-22 07:09:20'),
(175, 16, 3, 21, 46, 4, 1, NULL, NULL, NULL, NULL, NULL, 'AB', 'MERAH', NULL, NULL, '2024-11-22 07:10:52', '2024-11-22 07:10:52'),
(176, 21, 9, 17, NULL, NULL, 4, NULL, NULL, 3, NULL, 13, 'ABCD09', 'KUNING', NULL, NULL, '2024-11-22 07:12:23', '2024-11-22 07:12:23'),
(177, 16, 4, 4, 43, 5, 4, NULL, NULL, NULL, NULL, NULL, 'A', 'HIJAU', NULL, NULL, '2024-11-22 07:14:47', '2024-11-22 07:14:47'),
(178, 16, 4, 4, 43, 4, 4, NULL, NULL, NULL, NULL, NULL, 'A', 'HIJAU', NULL, NULL, '2024-11-22 07:15:13', '2024-11-22 07:15:13'),
(179, 16, 4, 4, 43, 4, 4, NULL, NULL, NULL, NULL, NULL, 'A', 'HIJAU', NULL, NULL, '2024-11-22 07:16:27', '2024-11-22 07:16:27'),
(180, 16, 4, 4, 43, 4, 4, NULL, NULL, NULL, NULL, NULL, 'A', 'HIJAU', NULL, NULL, '2024-11-22 07:23:52', '2024-11-22 07:23:52'),
(181, 16, 4, 4, 43, 4, 4, NULL, NULL, NULL, NULL, NULL, 'A', 'HIJAU', NULL, NULL, '2024-11-22 07:24:06', '2024-11-22 07:24:06'),
(182, 12, 5, 10, 77, 4, 1, NULL, NULL, NULL, NULL, NULL, 'AB', 'BIRU', NULL, NULL, '2024-11-22 08:13:00', '2024-11-22 08:13:00'),
(183, 12, 5, 10, 77, 4, 1, NULL, NULL, NULL, NULL, NULL, 'AB', 'BIRU', NULL, NULL, '2024-11-22 08:13:32', '2024-11-22 08:13:32'),
(184, 15, 10, 31, NULL, NULL, NULL, NULL, NULL, NULL, 1, 7, 'ABCD09', 'KUNING', NULL, NULL, '2024-11-25 03:12:00', '2024-11-25 03:12:00'),
(185, 22, 10, 31, NULL, NULL, NULL, NULL, NULL, NULL, 1, 6, 'ABCD09', 'HITAM', NULL, NULL, '2024-11-25 03:12:50', '2024-11-25 03:12:50'),
(186, 22, 10, 31, NULL, NULL, NULL, NULL, NULL, NULL, 2, 7, 'ABCD09', 'HITAM', NULL, NULL, '2024-11-25 03:13:02', '2024-11-25 03:13:02'),
(187, 1, 10, 36, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'MERAH', '7', '7', '2024-11-25 03:13:52', '2024-11-25 03:13:52'),
(188, 1, 10, 36, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'MERAH', '7', '7', '2024-11-25 03:13:52', '2024-11-25 03:13:52'),
(189, 23, 7, 29, 40, 4, 1, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'BIRU', NULL, NULL, '2024-11-25 05:02:27', '2024-11-25 05:02:27'),
(190, 24, 3, 6, 73, 4, 7, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'KUNING', NULL, NULL, '2024-11-25 08:59:40', '2024-11-25 08:59:40'),
(191, 20, 3, 21, 46, 4, 7, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'KUNING', NULL, NULL, '2024-11-25 09:00:25', '2024-11-25 09:00:25'),
(192, 23, 6, 25, 78, NULL, 4, NULL, 2, NULL, NULL, NULL, 'ABCD09', 'BIRU', NULL, NULL, '2024-11-25 09:15:50', '2024-11-25 09:15:50'),
(193, 20, 10, 78, NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'HITAM', '70', '80', '2024-11-27 10:28:08', '2024-11-27 10:28:08'),
(194, 14, 3, 6, 73, 1, 4, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'HIJAU', NULL, NULL, '2024-11-29 01:40:06', '2024-11-29 01:40:06'),
(195, 14, 9, 15, NULL, NULL, 4, NULL, NULL, 2, NULL, 2, 'ABCD09', 'HIJAU', NULL, NULL, '2024-11-29 01:44:34', '2024-11-29 01:44:34'),
(196, 14, 9, 15, NULL, NULL, 4, NULL, NULL, 1, NULL, 2, 'ABCD09', 'HIJAU', NULL, NULL, '2024-11-29 01:45:53', '2024-11-29 01:45:53'),
(197, 14, 9, 15, NULL, NULL, 4, NULL, NULL, 1, NULL, 2, 'ABCD09', 'HIJAU', NULL, NULL, '2024-11-29 01:49:35', '2024-11-29 01:49:35'),
(198, 14, 9, 15, NULL, NULL, 4, NULL, NULL, 1, NULL, 2, 'ABCD09', 'HIJAU', NULL, NULL, '2024-11-29 01:57:15', '2024-11-29 01:57:15'),
(199, 14, 9, 15, NULL, NULL, 4, NULL, NULL, 1, NULL, 2, 'ABCD09', 'HIJAU', NULL, NULL, '2024-11-29 01:57:44', '2024-11-29 01:57:44'),
(200, 14, 9, 15, NULL, NULL, 4, NULL, NULL, 1, NULL, 2, 'ABCD09', 'HIJAU', NULL, NULL, '2024-11-29 01:59:02', '2024-11-29 01:59:02'),
(201, 14, 9, 15, NULL, NULL, 4, NULL, NULL, 1, NULL, 2, 'ABCD09', 'HIJAU', NULL, NULL, '2024-11-29 02:02:02', '2024-11-29 02:02:02'),
(202, 14, 9, 15, NULL, NULL, 4, NULL, NULL, 1, NULL, 2, 'ABCD09', 'HIJAU', NULL, NULL, '2024-11-29 02:08:20', '2024-11-29 02:08:20'),
(203, 14, 9, 15, NULL, NULL, 4, NULL, NULL, 2, NULL, 2, 'ABCD09', 'HIJAU', NULL, NULL, '2024-11-29 02:09:15', '2024-11-29 02:09:15'),
(204, 14, 9, 15, NULL, NULL, 4, NULL, NULL, 2, NULL, 2, 'ABCD09', 'HIJAU', NULL, NULL, '2024-11-29 02:11:32', '2024-11-29 02:11:32'),
(205, 14, 9, 15, NULL, NULL, 4, NULL, NULL, 2, NULL, 2, 'ABCD09', 'HIJAU', NULL, NULL, '2024-11-29 02:14:25', '2024-11-29 02:14:25'),
(206, 14, 9, 15, NULL, NULL, 4, NULL, NULL, 2, NULL, 2, 'ABCD09', 'HIJAU', NULL, NULL, '2024-11-29 02:14:33', '2024-11-29 02:14:33'),
(207, 14, 9, 15, NULL, NULL, 4, NULL, NULL, 2, NULL, 3, 'ABCD09', 'HIJAU', NULL, NULL, '2024-11-29 02:15:21', '2024-11-29 02:15:21'),
(208, 14, 6, 24, 50, NULL, 4, NULL, 1, NULL, NULL, NULL, 'ABCD09', 'HIJAU', NULL, NULL, '2024-11-29 02:17:49', '2024-11-29 02:17:49'),
(209, 14, 9, 15, NULL, NULL, 4, NULL, NULL, 2, NULL, 2, 'ABCD09', 'HIJAU', NULL, NULL, '2024-11-29 02:20:24', '2024-11-29 02:20:24'),
(210, 14, 9, 15, NULL, NULL, 4, NULL, NULL, 4, NULL, 2, 'ABCD09', 'HIJAU', NULL, NULL, '2024-11-29 02:20:39', '2024-11-29 02:20:39'),
(211, 14, 9, 15, NULL, NULL, 4, NULL, NULL, 2, NULL, 2, 'ABCD09', 'HIJAU', NULL, NULL, '2024-11-29 02:21:10', '2024-11-29 02:21:10'),
(212, 14, 9, 15, NULL, NULL, 4, NULL, NULL, 1, NULL, 2, 'ABCD09', 'HIJAU', NULL, NULL, '2024-11-29 02:35:09', '2024-11-29 02:35:09'),
(213, 14, 9, 15, NULL, NULL, 4, NULL, NULL, 2, NULL, 2, 'ABCD09', 'HIJAU', NULL, NULL, '2024-11-29 02:35:34', '2024-11-29 02:35:34'),
(214, 14, 9, 15, NULL, NULL, 4, NULL, NULL, 3, NULL, 2, 'ABCD09', 'HIJAU', NULL, NULL, '2024-11-29 02:43:08', '2024-11-29 02:43:08'),
(215, 14, 9, 15, NULL, NULL, 4, NULL, NULL, 2, NULL, 2, 'ABCD09', 'HIJAU', NULL, NULL, '2024-11-29 02:51:50', '2024-11-29 02:51:50'),
(216, 14, 6, 24, 50, NULL, 4, NULL, 1, NULL, NULL, NULL, 'ABCD09', 'HIJAU', NULL, NULL, '2024-11-29 02:52:53', '2024-11-29 02:52:53'),
(217, 14, 10, 36, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'HIJAU', '9', '40', '2024-11-29 03:05:46', '2024-11-29 03:05:46'),
(218, 14, 3, 6, 73, 1, 4, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'HIJAU', NULL, NULL, '2024-11-29 03:14:06', '2024-11-29 03:14:06'),
(219, 14, 9, 15, NULL, NULL, 4, NULL, NULL, 2, NULL, 2, 'ABCD09', 'HIJAU', NULL, NULL, '2024-11-29 03:54:04', '2024-11-29 03:54:04'),
(220, 14, 3, 6, 73, 1, 4, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'HIJAU', NULL, NULL, '2024-11-29 03:56:47', '2024-11-29 03:56:47'),
(221, 14, 9, 15, NULL, NULL, 4, NULL, NULL, 1, NULL, 1, 'ABCD09', 'HIJAU', NULL, NULL, '2024-11-29 03:57:50', '2024-11-29 03:57:50'),
(222, 14, 5, 10, 77, 1, 4, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'HIJAU', NULL, NULL, '2024-11-29 04:03:28', '2024-11-29 04:03:28'),
(223, 14, 9, 15, NULL, NULL, 4, NULL, NULL, 1, NULL, 2, 'ABCD09', 'HIJAU', NULL, NULL, '2024-11-29 04:06:06', '2024-11-29 04:06:06'),
(224, 14, 6, 24, 50, NULL, 4, NULL, 1, NULL, NULL, NULL, 'ABCD09', 'HIJAU', NULL, NULL, '2024-11-29 04:15:37', '2024-11-29 04:15:37'),
(225, 14, 6, 24, 50, NULL, 4, NULL, 1, NULL, NULL, NULL, 'ABCD09', 'HIJAU', NULL, NULL, '2024-11-29 04:22:35', '2024-11-29 04:22:35'),
(226, 14, 9, 17, NULL, NULL, 4, NULL, NULL, 1, NULL, 13, 'ABCD09', 'HIJAU', NULL, NULL, '2024-11-29 04:23:05', '2024-11-29 04:23:05'),
(227, 14, 6, 25, 78, NULL, 4, NULL, 2, NULL, NULL, NULL, 'ABCD09', 'HIJAU', NULL, NULL, '2024-11-29 04:23:20', '2024-11-29 04:23:20'),
(228, 14, 10, 43, 67, NULL, 4, NULL, NULL, NULL, 1, NULL, 'ABCD09', 'HIJAU', NULL, NULL, '2024-11-29 04:25:11', '2024-11-29 04:25:11'),
(229, 17, 9, 16, NULL, NULL, 4, NULL, NULL, 3, NULL, 12, 'ABCD09', 'HIJAU', NULL, NULL, '2024-11-29 04:28:34', '2024-11-29 04:28:34'),
(230, 17, 4, 4, 44, 4, 4, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'HIJAU', NULL, NULL, '2024-11-29 04:28:51', '2024-11-29 04:28:51'),
(231, 15, 10, 47, NULL, NULL, 6, NULL, NULL, NULL, 1, 15, 'ABCD09', 'HITAM', NULL, NULL, '2024-11-29 06:56:37', '2024-11-29 06:56:37'),
(232, 15, 10, 47, NULL, NULL, 6, NULL, NULL, NULL, 1, 15, 'ABCD09', 'HITAM', NULL, NULL, '2024-11-29 07:00:02', '2024-11-29 07:00:02'),
(233, 11, 3, 6, 73, 4, 6, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'HITAM', NULL, NULL, '2024-11-29 09:12:15', '2024-11-29 09:12:15'),
(234, 11, 10, 53, 74, NULL, 6, NULL, 1, NULL, NULL, NULL, 'ABCD09', 'HITAM', NULL, NULL, '2024-11-29 09:13:06', '2024-11-29 09:13:06');

-- --------------------------------------------------------

--
-- Table structure for table `product_advantages`
--

CREATE TABLE `product_advantages` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `advantage1` varchar(255) DEFAULT NULL,
  `advantage2` varchar(255) DEFAULT NULL,
  `advantage3` varchar(255) DEFAULT NULL,
  `advantage4` varchar(255) DEFAULT NULL,
  `advantage5` varchar(255) DEFAULT NULL,
  `advantage6` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_specifications`
--

CREATE TABLE `product_specifications` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `produk_p` decimal(10,2) DEFAULT NULL,
  `produk_l` decimal(10,2) DEFAULT NULL,
  `produk_t` decimal(10,2) DEFAULT NULL,
  `pstand_p` decimal(10,2) DEFAULT NULL,
  `pstand_l` decimal(10,2) DEFAULT NULL,
  `pstand_t` decimal(10,2) DEFAULT NULL,
  `kemasan_p` decimal(10,2) DEFAULT NULL,
  `kemasan_l` decimal(10,2) DEFAULT NULL,
  `kemasan_t` decimal(10,2) DEFAULT NULL,
  `resolusi_x` int(11) DEFAULT NULL,
  `resolusi_y` int(11) DEFAULT NULL,
  `berat` decimal(10,2) DEFAULT NULL,
  `daya` decimal(10,2) DEFAULT NULL,
  `cooling_capacity` int(11) DEFAULT NULL,
  `pembuat` varchar(255) DEFAULT NULL,
  `refrigrant_id` varchar(255) DEFAULT NULL,
  `cspf` decimal(11,0) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_submissions`
--

CREATE TABLE `product_submissions` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `product_type` varchar(255) DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL,
  `capacity` varchar(100) DEFAULT NULL,
  `garansi_elemen_panas` varchar(255) DEFAULT NULL,
  `garansi_motor` varchar(255) DEFAULT NULL,
  `garansi_panel` varchar(255) DEFAULT NULL,
  `garansi_semua_service` varchar(255) DEFAULT NULL,
  `ukuran` varchar(255) DEFAULT NULL,
  `kapasitas_air_panas` varchar(255) DEFAULT NULL,
  `kapasitas_air_dingin` varchar(255) DEFAULT NULL,
  `daya` decimal(10,2) DEFAULT NULL,
  `product_dimensions` varchar(100) DEFAULT NULL,
  `packaging_dimensions` varchar(100) DEFAULT NULL,
  `berat` decimal(10,2) DEFAULT NULL,
  `pembuat` varchar(255) NOT NULL,
  `refrigrant` varchar(100) DEFAULT NULL,
  `pstand_dimensions` varchar(255) DEFAULT NULL,
  `panel_resolution` varchar(255) DEFAULT NULL,
  `cooling_capacity` varchar(255) DEFAULT NULL,
  `compressor_warranty` varchar(100) DEFAULT NULL,
  `sparepart_warranty` varchar(100) DEFAULT NULL,
  `cspf` decimal(10,2) DEFAULT NULL,
  `advantage1` varchar(400) NOT NULL,
  `advantage2` varchar(400) NOT NULL,
  `advantage3` varchar(400) NOT NULL,
  `advantage4` varchar(400) DEFAULT NULL,
  `advantage5` varchar(400) DEFAULT NULL,
  `advantage6` varchar(400) DEFAULT NULL,
  `gambar_depan` varchar(255) NOT NULL,
  `gambar_belakang` varchar(255) DEFAULT NULL,
  `gambar_atas` varchar(255) DEFAULT NULL,
  `gambar_bawah` varchar(255) DEFAULT NULL,
  `gambar_samping_kiri` varchar(255) DEFAULT NULL,
  `gambar_samping_kanan` varchar(255) DEFAULT NULL,
  `video_produk` varchar(255) DEFAULT NULL,
  `harga` varchar(100) NOT NULL,
  `status` enum('pending','confirmed','approved','rejected') DEFAULT 'pending',
  `submitted_by` varchar(255) DEFAULT NULL,
  `confirmed_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `approved_at` timestamp NULL DEFAULT NULL,
  `rejected_at` timestamp NULL DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_submissions`
--

INSERT INTO `product_submissions` (`id`, `product_id`, `brand`, `category`, `subcategory`, `product_type`, `color`, `capacity`, `garansi_elemen_panas`, `garansi_motor`, `garansi_panel`, `garansi_semua_service`, `ukuran`, `kapasitas_air_panas`, `kapasitas_air_dingin`, `daya`, `product_dimensions`, `packaging_dimensions`, `berat`, `pembuat`, `refrigrant`, `pstand_dimensions`, `panel_resolution`, `cooling_capacity`, `compressor_warranty`, `sparepart_warranty`, `cspf`, `advantage1`, `advantage2`, `advantage3`, `advantage4`, `advantage5`, `advantage6`, `gambar_depan`, `gambar_belakang`, `gambar_atas`, `gambar_bawah`, `gambar_samping_kiri`, `gambar_samping_kanan`, `video_produk`, `harga`, `status`, `submitted_by`, `confirmed_at`, `approved_at`, `rejected_at`, `submitted_at`, `updated_at`) VALUES
(76, 76, 'BERVIN', 'SMALL APPLIANCES', 'SPEAKER', 'A', 'MERAH', '', NULL, NULL, NULL, '1', 'Kecil', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'CHINA', NULL, NULL, ' x ', NULL, '', '', NULL, '1', '2', '3', '', '', '', '1729931363_1ee6203a640b1d46b26f.png', '1729931363_d011157a73a96d5c47d6.png', '1729931363_1e9efc6763dad0674bc5.png', '1729931363_bdcc7e0c43864ed518d0.png', '1729931363_8870b9102d3a98c23577.png', '1729931363_0c3c4182d359fab4c585.png', 'https://www.youtube.com/watch?v=FOaSPfALEHk', '', 'rejected', 'cipto', '2024-10-30 03:20:45', NULL, '2024-10-30 03:20:45', '2024-10-26 08:29:09', '2024-10-30 03:20:45'),
(77, 77, 'CHANGHONG', 'AC', 'SPLIT STANDARD', 'ABCD09', 'MERAH', '0,75 PK', NULL, NULL, NULL, NULL, '', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'CHINA', '', NULL, ' x ', '1', '<1', '<1', NULL, '1', '2', '3', '', '', '', '1730078608_60fc8860690082794285.png', '1730078608_85bc4383f384abf12e41.png', '1730078608_f8b5bc7dbc4a1e263789.png', '1730078608_4f4c0ea18a9c06daaea6.png', '1730078608_06ba7f22e505294a8d27.png', '1730078608_b1ddff2963258452219d.png', 'https://www.youtube.com/watch?v=FOaSPfALEHk', '', 'pending', 'cipto', '2024-10-28 01:23:28', NULL, NULL, '2024-10-28 01:19:37', '2024-10-28 01:23:28'),
(78, 78, 'BEKO', 'AC', 'SPLIT STANDARD', 'ABCD09', 'MERAH', '0,5 PK', NULL, NULL, NULL, NULL, '', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'CHINA', '', NULL, ' x ', '1', '<1', '<1', NULL, '1', '2', '3', '', '', '', '1730078772_2078c4220ac99ec3e554.png', '1730078772_65ea157ee029df0b967b.png', '1730078772_82a087777f6f6318ac06.png', '1730078772_5532d03843b3879e4e9b.png', '1730078772_69db91660ddd793cf86b.png', '1730078772_d671c235a7e122f56abd.png', 'https://www.youtube.com/watch?v=FOaSPfALEHk', '', 'pending', 'cipto', '2024-10-28 01:26:13', NULL, NULL, '2024-10-28 01:26:13', '2024-10-28 01:26:13'),
(79, 80, 'ADVAN', 'AC', 'SPLIT STANDARD', 'ABCD09', 'MERAH', '0,5 PK', NULL, NULL, NULL, NULL, '', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'CHINA', 'R-22', NULL, ' x ', '1', '<1', '<1', NULL, '1', '2', '3', '', '', '', '1730080882_fdb6f6562f4184499199.png', '1730080882_e5ce7f5e2096fbc00645.png', '1730080882_ec43bb6116ddee831fda.png', '1730080882_80d5ccec55a19e81b1c2.png', '1730080882_bd564f4d54ab71c1b379.png', '1730080882_5a83b3c99eb94aaa29c6.png', 'https://www.youtube.com/watch?v=FOaSPfALEHk', '', 'pending', 'cipto', '2024-10-28 02:01:22', NULL, NULL, '2024-10-28 02:01:22', '2024-10-28 02:01:22'),
(80, 82, 'ARTUGO', 'TV', 'ANALOG', 'ABCD09', 'X', '', NULL, NULL, '1', NULL, '24 INCH', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'CHINA', '', '1 x 1 x 1 cm', '2 x 2', NULL, '', '<1', NULL, '11', '2', '3', '', '', '', '1730084986_a70d59874d394cd72958.png', '1730084986_6f1835ccc8fb0bee9434.png', '1730084986_c91212f22505df7ef920.png', '1730084986_7eeca5a9a4e3ae61ba2a.png', '1730084986_a5e7a33e906b29e02091.png', '1730084986_c8acde9bcfde71a1d016.png', 'https://www.youtube.com/watch?v=FOaSPfALEHk', '', 'approved', 'cipto', '2024-11-12 08:28:52', '2024-11-04 04:11:14', NULL, '2024-10-28 03:09:46', '2024-11-12 08:28:52'),
(81, 83, 'BEKO', 'FREEZER', 'CHEST FREEZER 1 PINTU', 'ABCD09', 'MERAH', '42 L', NULL, NULL, NULL, NULL, '', '', '', 1.00, '11 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'CHINA', '', NULL, ' x ', NULL, '<1', '<1', NULL, '1', '2', '3', '', '', '', '1730086384_73d779181ed615312773.png', '1730086384_8fee6b3e567c39f870dc.png', '1730086384_e1472cc5225122ab5bc5.png', '1730086384_8bc3b71e13b640576c26.png', '1730086384_d1643a3ed983d7b96d24.png', '1730086384_a44030cf61f9c8379248.png', 'https://www.youtube.com/watch?v=FOaSPfALEHk', '', 'pending', 'cipto', '2024-10-28 03:33:04', NULL, NULL, '2024-10-28 03:33:04', '2024-10-28 03:33:04'),
(82, 84, 'HISENSE', 'AC', 'SPLIT STANDARD', 'EFGH78', 'MERAH', '0,5 PK', NULL, NULL, NULL, NULL, '', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'CHINA', 'R-32', NULL, ' x ', '2', '<1', '<1', 2.40, '1', '2', '3', '', '', '', '1730096229_6a6524bb3ed3a965943d.png', '1730096229_f222315a3f990d127593.png', '1730096229_e8f2b7e25a847cbd0bee.png', '1730096229_0fbe8577c941b5eb8445.png', '1730096229_60033b9343b7c2bb6ef0.png', '1730096229_7c48e93939c95833523d.png', 'https://www.youtube.com/watch?v=FOaSPfALEHk', '', 'approved', 'cipto', '2024-11-19 07:59:17', '2024-10-30 03:20:28', NULL, '2024-10-28 06:17:10', '2024-11-19 07:59:17'),
(83, 85, 'BEKO', 'KULKAS', 'PORTABLE', 'ABCD09', 'MERAH', '47 L', NULL, NULL, NULL, NULL, '', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'CHINA', '', NULL, ' x ', NULL, '1', '<1', NULL, '1', '2', '3', '', '', '', '1730104248_84a546cc1e634e7592c5.png', '1730104248_ecee0caffd927295be4b.png', '1730104248_f068b490480ae0e116c4.png', '1730104248_ec2aada8c57fbed814e2.png', '1730104248_2d7bf1172708542434bf.png', '1730104248_f175bbf46f9b702d48f8.png', 'https://www.youtube.com/watch?v=FOaSPfALEHk', '', 'pending', 'cipto', '2024-11-14 06:29:04', NULL, NULL, '2024-10-28 08:30:48', '2024-11-14 06:29:04'),
(84, 86, 'ELECTROLUX', 'AC', 'SPLIT STANDARD', 'ABCD09', 'PUTIH', '1 PK', NULL, NULL, NULL, NULL, 'Unknown', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'CHINA', 'R-410 A', NULL, ' x ', '1', '<1', '<1', NULL, '1', '2', '3', '', '', '', '1730164668_9705a4a14e245791ff14.png', '1730164668_624afe2b9c54a4656087.png', '1730164668_ac41cdcb0ee03f187be4.png', '1730164668_81d9364e2a117a15b183.png', '1730164668_53a233931409c2a57fd7.png', '1730164668_e8a475206dc717e000c2.png', 'https://www.youtube.com/watch?v=FOaSPfALEHk', '', 'pending', 'cipto', '2024-10-29 02:35:20', NULL, NULL, '2024-10-29 01:17:48', '2024-10-29 02:35:20'),
(86, 94, 'BEKO', 'TV', 'ANDROID', 'ABCD09', 'BIRU', '', '', '', '<1', '', '40 INCH', '', '', 3.14, '2 x 2 x 2 cm', '2 x 2 x 2 cm', 1.00, 'CHINA', '', '1 x 1 x 1 cm', '1 x 1', '', '', '2', 0.00, '1', '2', '3', '', '', '', '1730281659_11d9280ed09db2b0b3f9.png', '1730281659_8425beeb490787f9c568.png', '1730281659_dbd1bfd8a7b5967256fb.png', '1730281659_63a25eea985929ad224d.png', '1730281659_0f032cea4ba262c6cebd.png', '1730281659_05042f804e3ce65ac322.png', 'https://www.youtube.com/watch?v=FOaSPfALEHk', '', 'approved', 'superadmin', '2024-11-12 08:28:16', '2024-11-06 02:52:10', NULL, '2024-10-30 09:47:40', '2024-11-12 08:28:16'),
(88, 96, 'DAIKIN', 'FREEZER', 'CHEST FREEZER 1 PINTU', 'ABC92JA1', 'HIJAU', '42 L', '', '', '', '', '', '', '', 123.45, '123 x 123 x 123 cm', '100 x 100 x 100 cm', 123.45, 'UK', '', '', '', '', '3', '3', 0.00, '1', '2', '3', '4', '5', '', '1730346278_8bf1aae5c580ad3fe533.png', '1730346278_48504c0bbd1d6a97fe72.png', '1730346278_44078201a8c2d8ceaeea.png', '1730346278_6726dd3d6b421e17a6d5.png', '1730346278_13c590061d187c866e8d.png', '1730346278_2bea85d0e738332a25a0.png', 'https://www.youtube.com/watch?v=FOaSPfALEHk', '', 'approved', 'Aoz0raSenpai', '2024-11-29 08:43:14', '2024-10-31 03:45:24', NULL, '2024-10-31 03:44:39', '2024-11-29 08:43:14'),
(89, 97, 'ELECTROLUX', 'KULKAS', 'PORTABLE', 'ZHL019', 'HITAM', '42 L', '', '', '', '', '', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'CHINA', '', '', '', '', '3', '2', 0.00, '1', '2', '3', '', '', '', '1732592332_fa6a4d380802ec410c72.png', '1732592332_c6a7a98d464ebae68f48.png', '1732592332_bd306e37ce4a8f52a315.png', '1732592332_9ea8d5ad2dc9b3e06756.png', '1732592332_9b26579ce95aa4081421.png', '1732592332_ab538510ec0ecad16952.png', 'https://www.youtube.com/watch?v=FOaSPfALEHk', '', 'approved', 'Aoz0raSenpai', '2024-11-26 03:38:52', '2024-11-05 06:54:57', NULL, '2024-10-31 07:35:27', '2024-11-26 03:38:52'),
(90, 108, 'ADVAN', 'TV', 'ANDROID', 'ABCD09', 'HIJAU', '', NULL, NULL, NULL, NULL, '40 INCH', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'CHINA', '', NULL, '1 x 1', '1', '', '1', NULL, '1', '2', '334', '', '', '', '1730367638_175f12d05ccab6b00760.png', '1730367638_88cdd0f213d27668f52d.png', '1730367638_1f651c8b3153f68bccdc.png', '1730367638_fe1838ee0f235f303c9d.png', '1730367638_3a31d72d8f2098172e1d.png', '1730367638_d8ed7345430e6704f49e.png', 'https://www.youtube.com/watch?v=FOaSPfALEHk', '', 'pending', 'cipto', '2024-10-31 09:42:59', NULL, NULL, '2024-10-31 09:26:49', '2024-10-31 09:42:59'),
(91, 109, 'CHANGHONG', 'MESIN CUCI', 'PORTABLE', 'ABCD09', 'HITAM', '6,5 Kg', '', '<1', '', '', '', '', '', 10.00, '10 x 10 x 10 cm', '10 x 10 x 10 cm', 10.00, '10', '', '', '', '', '', '2', 0.00, '1', '2', '3', '4', '5', '', '1730370135_b02de051e122dac89be7.png', '', '', '', '', '', '', '', 'rejected', 'cipto', '2024-11-25 09:49:00', NULL, '2024-11-01 09:41:35', '2024-10-31 10:22:15', '2024-11-25 09:49:00'),
(92, 110, 'BERVIN', 'SMALL APPLIANCES', 'DISPENSER GALON BAWAH', 'ABCD09', 'HIJAU', '', '', '', '', '', '', '9', '10', 2.00, '2 x 2 x 2 cm', '2 x 2 x 2 cm', 2.00, 'CHINA', '', '', '', '', '2', '', 0.00, '1', '2', '3', '', '', '', '1730700690_4f5799f7a5c7ec16966b.png', '', '', '', '', '', '', 'Rp 2.000.000,00', 'approved', 'Aoz0raSenpai', '2024-11-11 01:40:38', '2024-11-04 06:12:09', NULL, '2024-11-04 06:11:31', '2024-11-11 01:40:38'),
(93, 111, 'CHANGHONG', 'MESIN CUCI', 'MESIN CUCI PORTABLE', 'ABCD09E1', 'HIJAU', '7 Kg', '', '<1', '', '', '', '', '', 1.00, '1 x 2 x 3 cm', '4 x 5 x 6 cm', 1.00, 'CHINA', '', '', '', '', '', '1', 0.00, '1', '2', '3', '', '', '', '1730792644_5025e4d31c014b36a65e.png', '', '', '', '', '', '', '', 'approved', 'Aoz0raSenpai', '2024-11-25 09:11:12', '2024-11-25 09:11:12', NULL, '2024-11-05 07:44:06', '2024-11-25 09:11:12'),
(94, 118, 'ELECTROLUX', 'MESIN CUCI', 'MESIN CUCI PORTABLE', 'ABCD09', 'HIJAU', '6,5 Kg', '', '<1', '', '', '', '', '', 1.00, '1 x 2 x 3 cm', '1 x 2 x 3 cm', 1.00, 'CHINA', '', '', '', '', '', '<1', 0.00, '1', '2', '3', '', '', '', '1730800035_48cf72aaa55f1f3832d0.png', '', '', '', '', '', '', '', 'pending', 'cipto', '2024-11-05 09:47:16', NULL, NULL, '2024-11-05 09:47:16', '2024-11-05 09:47:16'),
(95, 119, 'COSMOS', 'AC', 'SPLIT STANDARD', 'HVILAPN0132', 'KUNING', '0,75 PK', '', '', '', '', '', '', '', 8.00, '1 x 2 x 3 cm', '4 x 5 x 6 cm', 7.00, 'CHINA', 'R-32', '', '', '9', '<1', '<1', 4.30, '1', '2', '3', '', '', '', '1730875380_cb30c991f05b11fac62a.png', '', '', '', '', '', '', '', 'confirmed', 'Aoz0raSenpai', '2024-11-06 06:45:32', NULL, NULL, '2024-11-06 06:43:00', '2024-11-06 06:45:32'),
(96, 120, 'ELECTROLUX', 'TV', 'ANDROID', 'A90DWW9', 'KUNING', '', '', '', '1', '', '40 INCH', '', '', 13.00, '1 x 2 x 3 cm', '7 x 8 x 9 cm', 12.00, 'CHINA', '', '4 x 5 x 6 cm', '10 x 11', '', '', '2', 0.00, '1', '2', '3', '', '', '', '1730882028_e3f92399dd70ff70b564.png', '', '', '', '', '', '', '', 'pending', 'Aoz0raSenpai', '2024-11-06 08:33:49', NULL, NULL, '2024-11-06 08:21:59', '2024-11-06 08:33:49'),
(97, 121, 'ELECTROLUX', 'TV', 'ANALOG', 'A90DWW9', 'KUNING', '', '', '', '<1', '', '40 INCH', '', '', 13.00, '1 x 2 x 3 cm', '7 x 8 x 9 cm', 12.00, 'CHINA', '', '4 x 5 x 6 cm', '10 x 11', '', '', '2', 0.00, '1', '2', '3', '', '', '', '1730882309_2d2dbc06a1fb60073128.png', '', '', '', '', '', 'https://www.youtube.com/watch?v=XADWOc8alvw', '', 'approved', 'Aoz0raSenpai', '2024-11-28 09:51:50', '2024-11-08 07:43:13', NULL, '2024-11-06 08:38:30', '2024-11-28 09:51:50'),
(98, 122, 'ELECTROLUX', 'SMALL APPLIANCES', 'SPEAKER', 'ABCD09', 'KUNING', '', '', '', '', '1', 'Besar', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'CHINA', '', '', '', '', '', '2', 0.00, '1', '2', '3', '', '', '', '1731054566_a33afd8e61dda6b2a9b0.png', '1731054566_a96e590806f099068b5e.png', '', '', '', '1731054566_a29597ed1345d2440c51.png', '', '', 'pending', 'cipto', '2024-11-08 08:29:26', NULL, NULL, '2024-11-08 08:29:26', '2024-11-08 08:29:26'),
(99, 123, 'ELECTROLUX', 'SMALL APPLIANCES', 'SPEAKER', 'ABCD09', 'KUNING', '', '', '', '', '2', 'Besar', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'CHINA', '', '', '', '', '', '2', 0.00, '1', '2', '3', '', '', '', '1732589280_042a96ef4adbcf36f4ea.png', '1731054626_4b843e4a87bb2c18e198.png', '', '', '1732589280_f9f1490ea36215de7af6.png', '1731054626_197885da8e63648ad079.png', 'https://www.youtube.com/watch?v=fwpGHihMKiY', '', 'approved', 'cipto', '2024-11-26 02:58:43', '2024-11-08 08:34:25', NULL, '2024-11-08 08:30:26', '2024-11-26 02:58:43'),
(100, 125, 'LG', 'SMALL APPLIANCES', 'DISPENSER GALON BAWAH', 'J2EI0EP1S', 'PUTIH', '', '', '', '', '', '', '9', '10', 1.00, '1 x 2 x 3 cm', '2 x 3 x 4 cm', 1.00, 'INDIA', '', '', '', '', '2', '', 0.00, '1', '2', '3', '', '', '', '1732777573_3a3130a985391bf1bf16.png', '', '', '', '1731054835_24765437e60493b9c25b.png', '1731054835_d5fc0fa9fcfcd1d165f0.png', 'https://www.youtube.com/watch?v=XADWOc8alvw', '', 'approved', 'Rizal F', '2024-11-28 07:06:13', '2024-11-08 08:34:38', NULL, '2024-11-08 08:33:56', '2024-11-28 07:06:13'),
(101, 126, 'COSMOS', 'AC', 'SPLIT STANDARD', 'ABCD09', 'UNGU', '0,75 PK', '', '', '', '', '', '', '', 10.00, '1 x 2 x 3 cm', '1 x 2 x 3 cm', 1.00, 'PRAPATAN CIAMIS', 'R-32', '', '', '10', '<1', '<1', 5.00, '1', '2', '3', '', '', '', '1731198942_2e189eea7d2f4c2db788.png', '1731198942_dcab665afb9744dd9561.png', '', '', '', '1731198942_6e326430b68c803c7fba.png', 'https://www.youtube.com/watch?v=FOaSPfALEHk', '', 'approved', 'Rizal F', '2024-11-28 09:44:23', '2024-11-10 00:41:17', NULL, '2024-11-10 00:35:43', '2024-11-28 09:44:23'),
(102, 127, 'GEA', 'SMALL APPLIANCES', 'SETRIKA', 'JFQ0WFJ', 'PUTIH', '', '1', '', '', '', '', '', '', 1.00, '1 x 2 x 3 cm', '1 x 2 x 3 cm', 1.00, 'MALAYSIA', '', '', '', '', '', '1', 0.00, '1', '2', '3', '4', '5', '', '1731384621_a5bb38de44df059a1ad3.png', '1731384621_6cddb34a2d1791408f71.png', '', '', '1731384621_341126d3d9cecfbecc79.png', '', 'https://youtu.be/XADWOc8alvw?si=s39H4f7nws8vyouf', '', 'approved', 'Aoz0raSenpai', '2024-11-12 04:13:11', '2024-11-12 04:13:11', NULL, '2024-11-12 04:10:54', '2024-11-12 04:13:11'),
(103, 128, 'ADVAN', 'SMALL APPLIANCES', 'COOKER HOOD', 'JDWQD0QW', 'HIJAU', '', '', '', '', '1', 'BESAR', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'RUSIA', '', '', '', '', '', '<1', 0.00, '1', '2', '3', '', '', '', '1731393265_5e794b206b0934cea84f.png', '', '', '', '1731393265_216d038a746e37c3e13f.png', '', '', '', 'confirmed', 'Aoz0raSenpai', '2024-11-12 06:34:35', NULL, NULL, '2024-11-12 06:34:26', '2024-11-12 06:34:35'),
(104, 129, 'BERVIN', 'SMALL APPLIANCES', 'AIR PURIFIER', 'JJ09WEFFC', 'HITAM', '', '', '', '', '1', '', '', '40', 1.00, '1 x 2 x 3 cm', '1 x 2 x 3 cm', 1.00, 'JERMAN', '', '', '', '', '', '', 0.00, '1', '2', '3', '', '', '', '1731553811_e2a7376553e3f46db5b6.png', '1731553811_dc565f424654b84f8770.png', '1731553811_5fc961f03287a2e8a641.png', '1731553811_d4ad9f5af83ffb373b73.png', '', '', 'https://youtu.be/XADWOc8alvw?si=s39H4f7nws8vyouf', '', 'approved', 'Aoz0raSenpai', '2024-11-14 03:10:48', '2024-11-14 03:10:48', NULL, '2024-11-14 03:10:12', '2024-11-14 03:10:48'),
(105, 130, 'MIDEA', 'SMALL APPLIANCES', 'AIR PURIFIER', 'D0WFIEW1A', 'MERAH', '', '', '', '', '1', '', '', '80', 4.00, '1 x 2 x 3 cm', '1 x 2 x 33 cm', 3.00, 'SWEDIA', '', '', '', '', '', '', 0.00, '1', '2', '3', '', '', '', '1731554190_a45f6101a3b7529e259b.png', '', '', '', '', '1731554190_db0524a452d38950a6e6.png', 'https://www.youtube.com/watch?v=FOaSPfALEHk', '', 'approved', 'Aoz0raSenpai', '2024-11-14 03:16:50', '2024-11-14 03:16:50', NULL, '2024-11-14 03:16:30', '2024-11-14 03:16:50'),
(106, 132, 'DAIKIN', 'TV', 'GOOGLE', 'PPWE21', 'PUTIH', '', '', '', '<1', '', '24 INCH', '', '', 1.00, '1 x 2 x 3 cm', '1 x 2 x 3 cm', 1.00, 'CHINA', '', '1 x 2 x 3 cm', '1 x 1', '', '', '<1', 0.00, '1', '2', '3', '', '', '', '1731639266_e6d303ee09e8f7dc05aa.png', '', '', '', '', '', '', '', 'approved', 'Aoz0raSenpai', '2024-11-15 02:55:46', '2024-11-15 02:55:46', NULL, '2024-11-15 02:54:26', '2024-11-15 02:55:46'),
(107, 133, 'INTRA', 'TV', 'SMART', 'CKJ0WCW', 'HIJAU', '', '', '', '<1', '', '24 INCH', '', '', 1.00, '1 x 2 x 3 cm', '1 x 2 x 3 cm', 1.00, 'BAHRAIN', '', '1 x 2 x 3 cm', '1 x 2', '', '', '<1', 0.00, '1', '2', '3', '', '', '', '1731639324_936461c5cb847ae82394.png', '', '', '', '', '', '', '', 'approved', 'Aoz0raSenpai', '2024-11-15 02:55:54', '2024-11-15 02:55:54', NULL, '2024-11-15 02:55:25', '2024-11-15 02:55:54'),
(108, 134, 'MIDEA', 'TV', 'SMART', 'SC0WC2', 'HIJAU', '', '', '', '<1', '', '24 INCH', '', '', 3.00, '1 x 2 x 3 cm', '1 x 23 x 1 cm', 3.00, 'BRAZIL', '', '1 x 2 x 3 cm', '12 x 23', '', '', '<1', 0.00, '1', '2', '3', '', '', '', '1731639450_0df31eb0ffc4ef663617.png', '', '', '', '', '', '', '', 'approved', 'Aoz0raSenpai', '2024-11-15 03:00:31', '2024-11-15 03:00:31', NULL, '2024-11-15 02:57:31', '2024-11-15 03:00:31'),
(110, 136, 'MITSUBISHI HEAVY INDUSTRIES', 'TV', 'GOOGLE', 'D9Q9DJ911', 'PINK', '', '', '', '2', '', '24 INCH', '', '', 1.00, '1 x 2 x 3 cm', '1 x 2 x 3 cm', 1.00, 'RUSIA', '', '1 x 2 x 3 cm', '1 x 2', '', '', '1', 0.00, '1', '2', '3', '', '', '', '1731639603_f051476e52bd416cb11a.png', '', '', '', '', '', '', '', 'approved', 'Aoz0raSenpai', '2024-11-15 03:00:48', '2024-11-15 03:00:48', NULL, '2024-11-15 03:00:04', '2024-11-15 03:00:48'),
(111, 138, 'DAIKIN', 'AC', 'SPLIT STANDARD', 'FTKC25TVM4', 'PUTIH', '1 PK', '', '', '', '', '', '', '', 680.00, '77 x 29 x 24 cm', '80 x 30 x 30 cm', 8.00, 'JEPANG', 'R-32', '', '', '8500', '1', '<1', 5.00, 'Enzyme Blue Deodorizing Filter - menghilangkan bau dan bakteri dengan daya serap yang luar biasa. Sehingga udara yang tersebar di dalam ruangan bisa didapatkan dengan maksimal.', 'Super PCB - Mode untuk menahan lonjakan tegangan listrik rendah mulai dari 150 - 440V, untuk mencegah kerusahakan dini pada unit outdoor.', 'Mode Low Watt - Dapat digunakan pada saat konsumsi daya listrik yang dibutuhkan rendah dan penggunakan bersama dengan alat elektronik lainnya. Hal ini dapat mencegah konsumsi daya listrik yang berlebihan, sehingga lebih hemat.', 'Refrigerant R32 - Refirigeran ramah lingkungan dengan 0 ODP (Ozone Depletion Potential) dan lebih cepat dingin.', 'Intelligent Eye - Sensor inframerah yang mampu mendeteksi gerakan manusia di dalam ruangan di zona kiri, kanan dan tengah.', 'Mode Operasi Senyap - Memberikan kenyamanan yang maksimal dengan unit indoor yang senyap hingga 19 dB(A).', '1731640329_b1c38796ca64f3fbe428.webp', '', '', '', '', '', 'https://youtu.be/4CR3huG54MM', '', 'approved', 'cipto', '2024-11-15 06:20:28', '2024-11-15 03:12:40', NULL, '2024-11-15 03:12:09', '2024-11-15 06:20:28'),
(112, 139, 'PHILIPS', 'SMALL APPLIANCES', 'AIR FRYER', 'HD920091', 'HITAM', '4.1 L', '', '', '', '1', '', '', '', 1400.00, '36 x 26 x 29 cm', '40 x 30 x 30 cm', 4.50, 'CHINA', '', '', '', '', '', '<1', 0.00, 'Teknologi Rapid Air, dengan desain bintang laut yang unik, memutar udara panas untuk menghasilkan makanan lezat yang garing di luar dan lembut di dalam, dengan sedikit atau tanpa minyak tambahan.', 'Philips Airfryer menggunakan udara panas untuk memasak makanan favorit Anda hingga renyah sempurna, dengan lemak hingga 90% lebih sedikit.', 'Temukan ratusan resep hidangan menggugah selera yang lezat, sehat, dan praktis dibuat menggunakan Airfryer. Sebagian besar resep di aplikasi HomeID dipilih khusus oleh para ahli gizi untuk memasak sehari-hari.', 'Dapatkan rekomendasi resep harian sesuai preferensi keluarga Anda. Makin sering Anda menggunakan HomeID, makin baik rekomendasi resep yang diberikan sesuai kebutuhan Anda. Dapatkan inspirasi dari juru masak lain dan ikuti orang-orang dengan selera yang se', 'Philips Airfryer menawarkan segala fungsi: menggoreng, memanggang kue, membakar, memanggang, mengeringkan, memanggang roti, mencairkan, memanaskan ulang, dan lainnya.', 'Airfryer Philips bekerja lebih efisien untuk menghemat waktu dan energi Anda dengan memasak hidangan lezat hemat energi hingga 70% dan 50% lebih cepat dibandingkan oven tradisional.', '1731644095_9bfd9fa69a1385596e49.webp', '', '', '', '', '1731644095_4f586e8b9cf332ed889a.webp', 'https://www.youtube.com/watch?v=fwpGHihMKiY', '', 'approved', 'Aoz0raSenpai', '2024-11-15 04:16:00', '2024-11-15 04:16:00', NULL, '2024-11-15 04:14:55', '2024-11-15 04:16:00'),
(113, 140, 'SHARP', 'AC', 'SPLIT LOW WATT', 'AHAP9UHL', 'PUTIH', '1 PK', '', '', '', '', '', '', '', 690.00, '87 x 29 x 22 cm', '90 x 30 x 30 cm', 8.00, 'JEPANG', 'R-32', '', '', '9000', '3', '3', 4.00, 'Teknologi Ion Plasmacluster, Udara bersih, terbebas dari bakteri, jamur dan bau', 'Jetstream G9, Pendinginan ruangan yang lebih cepat dan lebih tahan lama', 'Coanda Air Flow, Penyebaran udara sejuk menyeluruh dan aman untuk pengguna yang sensitif terhadap udara dingin', '14 Degree Setting, Pengaturan suhu dari remote control dapat mencapai hingga 14 derajat', 'Low Wattage and Low Voltage Opertaion, Pengunaan ramah bagi rumah dengan kapasitas listrik terbatas, dan dapat beroperasi ketika tegangan rendah atau tidak stabil', 'Penambahan Garansi Kompresor Sharp (10 Tahun)', '1731652115_2f0db602b3856db123f3.jpg', '', '', '', '', '', '', '', 'approved', 'Aoz0raSenpai', '2024-11-15 06:28:59', '2024-11-15 06:28:59', NULL, '2024-11-15 06:28:36', '2024-11-15 06:28:59'),
(114, 141, 'SAMSUNG', 'TV', 'SMART', 'QA55QE1DAKXXD', 'HITAM', '', '', '', '1', '', '55 INCH', '', '', 150.00, '123 x 71 x 3 cm', '140 x 85 x 15 cm', 14.90, 'KOREA SELATAN', '', '123 x 75 x 23 cm', '3840 x 2160', '', '', '1', 0.00, '100% Color Volume with Quantum Dot, Quantum Dot technology delivers our finest picture ever. With 100% Color Volume, Quantum Dot technology takes light and turns it into breathtaking colors that stay accurate in various levels of brightness.', '4K Upscaling, Powerful 4K upscaling ensures you get up to 4K resolution for the content you love.', 'Samsung Tizen OS, Get more out of your TV with the latest apps & services on Samsung Tizen OS. Enjoy free live TV channels and thousands of movies with Samsung TV Plus, and seamless cloud gaming with Gaming Hub. You can even manage your daily activities w', 'Quantum HDR, Quantum HDR brings out the details and contrast, so you can experience the full power in every image. Going beyond leading standards, the dynamic tone mapping of HDR10+ creates deeper blacks, more vibrant imagery and details that always shine', '', '', '1731917791_73a047aacd376aef82b8.webp', '', '', '', '1731917791_bab14e053e9182c259ea.png', '', '', '', 'approved', 'citra', '2024-11-18 08:24:12', '2024-11-18 08:24:12', NULL, '2024-11-18 08:16:32', '2024-11-18 08:24:12'),
(115, 142, 'POLYTRON', 'TV', 'GOOGLE', 'PLD55UG5959', 'HITAM', '', '', '', '<1', '', '55 INCH', '', '', 150.00, '150 x 134 x 80 cm', '160 x 160 x 100 cm', 165.00, 'CHINA', '', '150 x 150 x 80 cm', '3840 x 2160', '', '', '1', 0.00, '4K UHD Smart Android Google TV menggunakan Operating system terbaru Google TV yang mampu menganalisa dan merekomendasikan konten yang Anda sukai. Produk yang didukung oleh sistem operasi Android TV memudahkan Anda mengakses berbagai aplikasi hiburan favor', 'Dengan teknologi Dolby yang diadopsi dari bioskop, menghadirkan pengalaman audio visual yang menakjubkan. Dolby Vision. Menghadirkan warna, kontras, dan kecerahan yang luar biasa ke layer televisi, meningkatkan pengalaman menonton Anda. Dolby Atmos. Membe', 'Konektivitas nirkabel berkecepatan tinggi memberikan kemudahan akses ke konten favorit.', 'Teknologi MEMC menyesuaikan frame rate yang didukung oleh video, game, atau aplikasi dengan refresh rate layar yang dibuat selaras dengan gerakan animasinya sehingga tampilan lebih halus.', 'Resolusi 4K UHD (3840X 2160 piksel) memiliki resolusi 4 kali lebih detail dari gambar Full HD (1920 X 1080 piksel). Sehingga menampilkan rentang kontras dan warna yang lebih luas.', 'Menghadirkan tayangan hiburan berupa film, tv serial, tayangan edukatif anak sampai tayangan olahraga kelas dunia seperti, sepak bola, badminton, balap, dan lainnya yang dapat disaksikan melalui Mola TV. Tersedia juga aplikasi popular seperti Disney Hotst', '1731918225_e9bb983567d2052c61b0.webp', '1731918225_dbbae205199ef892bd61.webp', '1731918225_21fb3331a40dca6d3cd8.jpg', '1731918225_b54cf651b14c882d9e43.webp', '', '1731918225_1ed1c8cc12d756dd784a.jpg', '', '', 'approved', 'citra', '2024-11-18 08:24:19', '2024-11-18 08:24:19', NULL, '2024-11-18 08:23:45', '2024-11-18 08:24:19'),
(116, 143, 'DAIKIN', 'AC', 'SPLIT STANDARD', 'ABCD09', 'HITAM', '1 PK', '', '', '', '', '', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'CHINA', 'R-410 A', '', '', '1', '2', '<1', 3.40, '1', '2', '3', '', '', '', '1731999529_b83d442e07e5013bcd17.webp', '', '', '', '', '', '', '', 'confirmed', 'cipto', '2024-11-19 06:59:23', NULL, NULL, '2024-11-19 06:58:50', '2024-11-19 06:59:23'),
(117, 145, 'ARTUGO', 'AC', 'SPLIT STANDARD', 'ABCD09', 'KUNING', '0,5 PK', '', '', '', '', '', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'CHINA', 'R-22', '', '', '1', '<1', '<1', 3.00, '1', '2', '3', '', '', '', '1732000806_b0f894865c4b709b048f.webp', '', '', '', '', '', '', '', 'confirmed', 'superadmin', '2024-11-19 07:24:33', NULL, NULL, '2024-11-19 07:20:07', '2024-11-19 07:24:33'),
(118, 158, 'MIDEA', 'SMALL APPLIANCES', 'COFFEE MAKER', 'ABCD09', 'BIRU', '1.3 L', '<1', '', '', '', '', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, '1', '', '', '', '1', '', '<1', 1.00, '1', '2', '3', '', '', '', '1732092588_100799d5ee15b6761b6b.png', '', '', '', '', '', '', '', 'confirmed', 'Aoz0raSenpai', '2024-11-20 08:58:42', NULL, NULL, '2024-11-20 08:49:49', '2024-11-20 08:58:42'),
(119, 159, 'ARTUGO', 'AC', 'SPLIT STANDARD', 'ABCD09', 'KUNING', '0,75 PK', '', '', '', '', '', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, '-', 'R-22', '', '', '1', '1', '1', 1.00, '1', '2', '3', '', '', '', '1732094784_d36d59a0d79376b31438.webp', '', '', '', '', '', '', '', 'pending', 'Aoz0raSenpai', '2024-11-20 09:26:24', NULL, NULL, '2024-11-20 09:26:24', '2024-11-20 09:26:24'),
(120, 160, 'GREE', 'AC', 'SPLIT STANDARD', 'A90DWW9', 'BIRU', '0,5 PK', '', '', '', '', '', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'CHINA', 'R-22', '', '', '1', '3', '3', 4.60, '1', '2', '3', '', '', '', '1732169731_b490502b66cf38c42ffe.png', '', '', '', '', '', '', '', 'confirmed', 'Aoz0raSenpai', '2024-11-21 06:15:48', NULL, NULL, '2024-11-21 06:15:32', '2024-11-21 06:15:48'),
(121, 161, 'HAIER', 'AC', 'SPLIT STANDARD', 'ABCD09', 'HIJAU', '0,5 PK', '', '', '', '', '', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, '1', 'R-22', '', '', '1', '1', '1', 1.00, '1', '2', '3', '', '', '', '1732172742_8821c26392ff4eef33ff.png', '1732172742_fb9da3d7fb5c71d6597b.png', '', '', '', '', '', '', 'confirmed', 'cipto', '2024-11-21 07:06:06', NULL, NULL, '2024-11-21 07:04:16', '2024-11-21 07:06:06'),
(122, 162, 'INTRA', 'TV', 'ANDROID', 'ABCD09', 'KUNING', '', '', '', '1', '', '40 INCH', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'JEPANG', '', '1 x 1 x 1 cm', '1 x 1', '', '', '<1', 0.00, '1', '2', '4', '', '', '', '1732174698_13041feafcc9fc10dc9c.jpg', '1732174698_f68faa2ce0be9aff3c1a.gif', '', '', '', '', '', '', 'confirmed', 'cipto', '2024-11-21 07:38:22', NULL, NULL, '2024-11-21 07:38:19', '2024-11-21 07:38:23'),
(123, 163, 'BERVIN', 'AC', 'SPLIT LOW WATT', 'ABCD09', 'BIRU', '1 PK', '', '', '', '', '', '', '', 2.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, '1', 'R-32', '', '', '1', '1', '<1', 3.00, '1', '2', '3', '', '', '', '1732183045_cb42edf3c324562f715e.jpg', '1732183045_6f0d0e4e9199322ea0a7.jpg', '', '', '', '', '', '', 'confirmed', 'Aoz0raSenpai', '2024-11-21 10:00:23', NULL, NULL, '2024-11-21 09:52:22', '2024-11-21 10:00:23'),
(124, 184, 'DAIKIN', 'SMALL APPLIANCES', 'SPEAKER', 'ABCD09', 'KUNING', '', '', '', '', '<1', 'Besar', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'UK', '', '', '', '', '', '', 0.00, '1', '2', '3', '', '', '', '1732504344_b8b2396aa6b0a1626032.jpg', '', '', '', '', '', '', '', 'approved', 'Aoz0raSenpai', '2024-11-25 03:14:59', '2024-11-25 03:14:59', NULL, '2024-11-25 03:12:24', '2024-11-25 03:14:59'),
(125, 186, 'INTRA', 'SMALL APPLIANCES', 'SPEAKER', 'ABCD09', 'HITAM', '', '', '', '', '1', 'Besar', '', '', 1.00, '1 x 2 x 3 cm', '1 x 2 x 3 cm', 1.00, 'USA', '', '', '', '', '', '', 0.00, '1', '2', '3', '', '', '', '1732504403_00200a89fe49665a3b41.jpg', '', '', '', '', '', '', '', 'approved', 'Aoz0raSenpai', '2024-11-25 03:15:11', '2024-11-25 03:15:11', NULL, '2024-11-25 03:13:24', '2024-11-25 03:15:11'),
(126, 188, 'ADVAN', 'SMALL APPLIANCES', 'DISPENSER GALON BAWAH', 'ABCD09', 'MERAH', '', '', '', '', '', '', '7', '7', 1.00, '1 x 2 x 3 cm', '1 x 23 x 1 cm', 11.00, 'USA', '', '', '', '', '1', '', 0.00, '1', '2', '3', '', '', '', '1732504468_182cec71c99b51a13d6e.jpg', '', '', '', '', '', '', '', 'approved', 'Aoz0raSenpai', '2024-11-25 03:15:21', '2024-11-25 03:15:21', NULL, '2024-11-25 03:14:28', '2024-11-25 03:15:21'),
(127, 190, 'LG', 'KULKAS', '2 Pintu', 'ABCD09', 'KUNING', '100 L', '', '', '', '', '', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'CHINA', '', '', '', '', '1', '3', 0.00, '1', '22', '3', '', '', '', '1732525202_b02d7f7ad9c0f0302b5c.jpg', '', '', '', '', '', '', '', 'approved', 'Aoz0raSenpai', '2024-11-25 09:01:31', '2024-11-25 09:01:31', NULL, '2024-11-25 09:00:03', '2024-11-25 09:01:31'),
(128, 191, 'HAIER', 'KULKAS', 'PORTABLE', 'ABCD09', 'KUNING', '42 L', '', '', '', '', '', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'JAPAN', '', '', '', '', '1', '3', 0.00, '1', '2', '3', '', '', '', '1732525245_f6aacbb2a33f6657116e.jpg', '', '', '', '', '', '', '', 'approved', 'Aoz0raSenpai', '2024-11-25 09:01:12', '2024-11-25 09:01:12', NULL, '2024-11-25 09:00:45', '2024-11-25 09:01:12'),
(129, 192, 'JUNDO', 'MESIN CUCI', '2 TABUNG', 'ABCD09', 'BIRU', '9 KG', '', '1', '', '', '', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'CHINA', '', '', '', '', '', '1', 0.00, '1', '2', '3', '', '', '', '1732526178_9bcdb7218e2b40f04a1e.jpg', '', '', '', '', '', '', '', 'approved', 'Aoz0raSenpai', '2024-11-25 09:16:38', '2024-11-25 09:16:38', NULL, '2024-11-25 09:16:19', '2024-11-25 09:16:38'),
(130, 193, 'HAIER', 'SMALL APPLIANCES', 'MOTOR LISTRIK', 'ABCD09', 'HITAM', '72V/20AH', '', '', '', '', '', '70', '60', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'CHINA', '', '', '', '', '3', '', 0.00, '1', '2', '3', '', '', '', '1732776502_dec8b1898991c41d0da9.png', '', '', '', '', '', '', '', 'approved', 'Aoz0raSenpai', '2024-11-28 06:48:22', '2024-11-27 10:42:55', NULL, '2024-11-27 10:28:31', '2024-11-28 06:48:22'),
(131, 230, 'GEA', 'FREEZER', 'CHEST FREEZER 1 PINTU', 'ABCD09', 'HIJAU', '47 L', '', '', '', '', '', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'CHINA', '', '', '', '', '1', '1', 0.00, '1', '2', '3', '', '', '', '1732854554_31314dc990395d58f23a.png', '', '', '', '', '', '', '', 'confirmed', 'cipto', '2024-11-29 04:29:29', NULL, NULL, '2024-11-29 04:29:14', '2024-11-29 04:29:29'),
(132, 234, 'BERVIN', 'SMALL APPLIANCES', 'JUICER', 'ABCD09', 'HITAM', '500 ML', '', '<1', '', '', '', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'A', '', '', '', '', '', '2', 0.00, '1', '2', '4', '', '', '', '1732871617_146fe19d124151d42434.jpg', '', '', '', '', '', '', '', 'confirmed', 'Aoz0raSenpai', '2024-11-29 09:13:42', NULL, NULL, '2024-11-29 09:13:38', '2024-11-29 09:13:42');

-- --------------------------------------------------------

--
-- Table structure for table `product_uploads`
--

CREATE TABLE `product_uploads` (
  `id` int(11) UNSIGNED NOT NULL,
  `gambar_depan` varchar(255) NOT NULL,
  `gambar_belakang` varchar(255) NOT NULL,
  `gambar_atas` varchar(255) NOT NULL,
  `gambar_bawah` varchar(255) NOT NULL,
  `gambar_samping_kiri` varchar(255) NOT NULL,
  `gambar_samping_kanan` varchar(255) NOT NULL,
  `video_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `refrigrant_type`
--

CREATE TABLE `refrigrant_type` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `refrigrant_type`
--

INSERT INTO `refrigrant_type` (`id`, `type`) VALUES
(1, 'R-22'),
(2, 'R-32'),
(3, 'R-410 A');

-- --------------------------------------------------------

--
-- Table structure for table `sparepart_warranties`
--

CREATE TABLE `sparepart_warranties` (
  `id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sparepart_warranties`
--

INSERT INTO `sparepart_warranties` (`id`, `value`) VALUES
(1, '<1'),
(4, '1'),
(6, '2'),
(7, '3');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `name`) VALUES
(4, 4, 'CHEST FREEZER 1 PINTU'),
(6, 3, '2 Pintu'),
(9, 5, 'SPLIT STANDARD'),
(10, 5, 'SPLIT LOW WATT'),
(11, 5, 'SPLIT INVERTER'),
(12, 5, 'FLOOR STANDING'),
(13, 5, 'CASSETTE'),
(14, 5, 'DUCT'),
(15, 9, 'ANALOG'),
(16, 9, 'ANDROID'),
(17, 9, 'DIGITAL'),
(18, 9, 'SMART'),
(19, 9, 'GOOGLE'),
(20, 3, '1 Pintu'),
(21, 3, 'PORTABLE'),
(22, 3, 'SIDE BY SIDE'),
(23, 3, 'MULTIDOOR'),
(24, 6, 'PORTABLE'),
(25, 6, '2 TABUNG'),
(26, 6, 'TOP LOADING'),
(27, 6, 'FRONT LOADING'),
(28, 4, 'CHEST FREEZER 2 PINTU ATAU LEBIH'),
(29, 7, '1 PINTU'),
(30, 7, '2 PINTU ATAU LEBIH'),
(31, 10, 'SPEAKER'),
(32, 10, 'KIPAS ANGIN'),
(33, 10, 'MAGIC COM'),
(34, 10, 'RICE COOKER'),
(35, 10, 'DISPENSER GALON ATAS'),
(36, 10, 'DISPENSER GALON BAWAH'),
(37, 10, 'WATER HEATER'),
(38, 10, 'COFFEE MAKER'),
(41, 10, 'MICROWAVE'),
(42, 10, 'SETRIKA'),
(43, 10, 'VACUUM CLEANER'),
(44, 10, 'OVEN'),
(45, 10, 'KOMPOR TUNGKU'),
(46, 10, 'KOMPOR TANAM'),
(47, 10, 'COOKER HOOD'),
(48, 10, 'TOASTER'),
(49, 10, 'BLENDER'),
(50, 10, 'AIR COOLER'),
(51, 10, 'AIR CURTAIN'),
(52, 10, 'AIR PURIFIER'),
(53, 10, 'JUICER'),
(54, 10, 'AIR FRYER'),
(78, 10, 'MOTOR LISTRIK');

-- --------------------------------------------------------

--
-- Table structure for table `ukuran_tv`
--

CREATE TABLE `ukuran_tv` (
  `id` int(10) UNSIGNED NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ukuran_tv`
--

INSERT INTO `ukuran_tv` (`id`, `subcategory_id`, `size`) VALUES
(1, 15, '24 INCH'),
(2, 15, '27 INCH'),
(3, 15, '32 INCH'),
(4, 15, '40 INCH'),
(5, 31, 'Kecil'),
(6, 31, 'Sedang'),
(7, 31, 'Besar'),
(8, 32, '7 INCH'),
(9, 32, '8 INCH'),
(10, 32, '9 INCH'),
(11, 32, '10 INCH'),
(12, 16, '40 INCH'),
(13, 17, '50 INCH'),
(15, 47, 'BESAR'),
(16, 50, 'KECIL'),
(17, 51, 'SEDANG'),
(18, 18, '24 INCH'),
(19, 19, '24 INCH'),
(20, 18, '55 INCH'),
(21, 19, '55 INCH');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` enum('user','admin','superadmin','visitor') NOT NULL DEFAULT 'visitor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `brand`, `phone`, `address`, `role`) VALUES
(1, 'Rizal F', 'rizal090', '$2y$10$tibC9s0GWZKFWQAryzWxjuS1y.32DcHfHLSm5HSio6W/xkZF6sAeu', 'rizal22@gmail.com', 'SAMSUNG', '08789279211', 'jl. e No.7', 'admin'),
(2, 'cipto', 'cipto21', '$2y$10$qN6cvIz761ZKsoOJCly0bOcNUBJGUjv/To4RJc9KgpaRG9SF2.UfK', 'cipto21@gmail.com', 'AQUA', '089212290090', 'jl. e No.90', 'user'),
(3, 'superadmin', 'superadmin_1', '$2y$10$9ZkjqWA5LPB2VD3fJRzVKOetFCDUSWBsTKXE.JlaSyMKGggpRwKUe', 'superadmin1@gmail.com', 'superadmin', '088888888888', 'jl. superadmin no.1', 'superadmin'),
(4, 'citra', 'citra89', '$2y$10$ylDB/L0WYj2DWsH2nwo/jOEz9rUSgnvSY1X9917UvPx2r6gdW1pEW', 'citra89@gmail.com', 'POLYTRON', '087199990999', 'jl. a No.7', 'user'),
(7, 'jamal', 'visitor1', '$2y$10$Wkykc15aMbZJ6V/O6ljhF.VtaMUEIh2JTIUUkpfwIUC9T.2nnKtpu', 'visitor@gmail.com', '', '088810102020', '-', 'visitor'),
(8, 'Bambang Sumanto', 'bambang12', '$2y$10$Tz7YiFlJljob1L3VwNxX3eBuocah3k/gTvcLrUoWvf5kdNde0CZRi', 'bambang177@gmail.com', NULL, '087199990999', '-', 'visitor'),
(9, 'Aoz0raSenpai', 'steven0099', '$2a$12$h48K.Ws9BSCp40/ZT29C8eLiszKLcbPgQ2xr/t3ycChXFb0pZT/WG', 'sgamess0099@gmail.com', '-', '087822297790', '-', 'superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `wheels`
--

CREATE TABLE `wheels` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `wheel_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wheel_segments`
--

CREATE TABLE `wheel_segments` (
  `id` int(11) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `odds` float(5,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wheel_segments`
--

INSERT INTO `wheel_segments` (`id`, `image`, `label`, `odds`, `created_at`, `updated_at`) VALUES
(1, '1733278111_1582ebbb8ac91826f872.png', 'Piring Cantik', 15.00, '2024-12-02 09:01:06', '2024-12-04 02:08:31'),
(2, '1733278121_96cf9e9de3b5dc1e3f5d.png', 'Sendok Sup Abad Ke-17', 12.00, '2024-12-02 09:01:39', '2024-12-04 02:08:42'),
(3, '1733278130_1ad21ac98259b9309d15.png', 'Payung Ratu Swiss', 25.00, '2024-12-02 09:01:52', '2024-12-04 02:08:51'),
(4, '1733278141_12b67788ca0f748bbabe.png', 'Mobil Avanza', 0.80, '2024-12-02 09:03:40', '2024-12-04 02:09:01'),
(5, '1733278152_4c7081561c89409cb6c7.png', 'IPhone 9', 7.20, '2024-12-02 09:04:03', '2024-12-04 02:09:12'),
(6, '1733277654_852de61f702d566e2cde.png', '5Jt Cash (Dipotong Pajak 100%)', 40.00, '2024-12-02 09:04:16', '2024-12-04 02:00:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `capacities`
--
ALTER TABLE `capacities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_subcategory` (`subcategory_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compressor_warranties`
--
ALTER TABLE `compressor_warranties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `garansi_elemen_panas`
--
ALTER TABLE `garansi_elemen_panas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `garansi_motor`
--
ALTER TABLE `garansi_motor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `garansi_panel`
--
ALTER TABLE `garansi_panel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `garansi_semua_service`
--
ALTER TABLE `garansi_semua_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marketplaces`
--
ALTER TABLE `marketplaces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `subcategory_id` (`subcategory_id`),
  ADD KEY `products_ibfk_4` (`capacity_id`),
  ADD KEY `products_ibfk_5` (`compressor_warranty_id`),
  ADD KEY `products_ibfk_6` (`sparepart_warranty_id`),
  ADD KEY `products_ibfk_7` (`garansi_elemen_panas_id`),
  ADD KEY `products_ibfk_8` (`garansi_motor_id`),
  ADD KEY `products_ibfk_9` (`garansi_panel_id`),
  ADD KEY `products_ibfk_10` (`garansi_semua_service_id`),
  ADD KEY `products_ibfk_11` (`ukuran_id`);

--
-- Indexes for table `product_advantages`
--
ALTER TABLE `product_advantages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_specifications`
--
ALTER TABLE `product_specifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_submissions`
--
ALTER TABLE `product_submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_uploads`
--
ALTER TABLE `product_uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refrigrant_type`
--
ALTER TABLE `refrigrant_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sparepart_warranties`
--
ALTER TABLE `sparepart_warranties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `ukuran_tv`
--
ALTER TABLE `ukuran_tv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_subcategory_tv` (`subcategory_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wheels`
--
ALTER TABLE `wheels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wheel_segments`
--
ALTER TABLE `wheel_segments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `capacities`
--
ALTER TABLE `capacities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `compressor_warranties`
--
ALTER TABLE `compressor_warranties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `garansi_elemen_panas`
--
ALTER TABLE `garansi_elemen_panas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `garansi_motor`
--
ALTER TABLE `garansi_motor`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `garansi_panel`
--
ALTER TABLE `garansi_panel`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `garansi_semua_service`
--
ALTER TABLE `garansi_semua_service`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `marketplaces`
--
ALTER TABLE `marketplaces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT for table `product_advantages`
--
ALTER TABLE `product_advantages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_specifications`
--
ALTER TABLE `product_specifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_submissions`
--
ALTER TABLE `product_submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `product_uploads`
--
ALTER TABLE `product_uploads`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `refrigrant_type`
--
ALTER TABLE `refrigrant_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sparepart_warranties`
--
ALTER TABLE `sparepart_warranties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `ukuran_tv`
--
ALTER TABLE `ukuran_tv`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `wheels`
--
ALTER TABLE `wheels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wheel_segments`
--
ALTER TABLE `wheel_segments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `capacities`
--
ALTER TABLE `capacities`
  ADD CONSTRAINT `fk_subcategory` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_ibfk_10` FOREIGN KEY (`garansi_semua_service_id`) REFERENCES `garansi_semua_service` (`id`),
  ADD CONSTRAINT `products_ibfk_11` FOREIGN KEY (`ukuran_id`) REFERENCES `ukuran_tv` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`),
  ADD CONSTRAINT `products_ibfk_4` FOREIGN KEY (`capacity_id`) REFERENCES `capacities` (`id`),
  ADD CONSTRAINT `products_ibfk_5` FOREIGN KEY (`compressor_warranty_id`) REFERENCES `compressor_warranties` (`id`),
  ADD CONSTRAINT `products_ibfk_6` FOREIGN KEY (`sparepart_warranty_id`) REFERENCES `sparepart_warranties` (`id`),
  ADD CONSTRAINT `products_ibfk_7` FOREIGN KEY (`garansi_elemen_panas_id`) REFERENCES `garansi_elemen_panas` (`id`),
  ADD CONSTRAINT `products_ibfk_8` FOREIGN KEY (`garansi_motor_id`) REFERENCES `garansi_motor` (`id`),
  ADD CONSTRAINT `products_ibfk_9` FOREIGN KEY (`garansi_panel_id`) REFERENCES `garansi_panel` (`id`);

--
-- Constraints for table `product_advantages`
--
ALTER TABLE `product_advantages`
  ADD CONSTRAINT `product_advantages_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_specifications`
--
ALTER TABLE `product_specifications`
  ADD CONSTRAINT `product_specifications_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ukuran_tv`
--
ALTER TABLE `ukuran_tv`
  ADD CONSTRAINT `fk_subcategory_tv` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
