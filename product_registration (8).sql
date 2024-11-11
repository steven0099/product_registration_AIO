-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2024 at 05:41 AM
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
(39, 'TB', 'TOSHIBA'),
(40, 'ZB', 'ZEBRA');

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
(61, 38, '1.3 L');

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
(6, '3');

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
(126, 24, 5, 9, 55, 1, 1, NULL, NULL, NULL, NULL, NULL, 'ABCD09', 'UNGU', NULL, NULL, '2024-11-10 00:34:32', '2024-11-10 00:34:32');

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
  `advantage1` varchar(255) NOT NULL,
  `advantage2` varchar(255) NOT NULL,
  `advantage3` varchar(255) NOT NULL,
  `advantage4` varchar(255) DEFAULT NULL,
  `advantage5` varchar(255) DEFAULT NULL,
  `advantage6` varchar(255) DEFAULT NULL,
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
(80, 82, 'ARTUGO', 'TV', 'ANALOG', 'ABCD09', 'X', '', NULL, NULL, NULL, NULL, '24 INCH', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'CHINA', '', '1 x 1 x 1 cm', '2 x 2', NULL, '', '<1', NULL, '11', '2', '3', '', '', '', '1730084986_a70d59874d394cd72958.png', '1730084986_6f1835ccc8fb0bee9434.png', '1730084986_c91212f22505df7ef920.png', '1730084986_7eeca5a9a4e3ae61ba2a.png', '1730084986_a5e7a33e906b29e02091.png', '1730084986_c8acde9bcfde71a1d016.png', 'https://www.youtube.com/watch?v=FOaSPfALEHk', '', 'approved', 'cipto', '2024-11-05 07:05:01', '2024-11-04 04:11:14', NULL, '2024-10-28 03:09:46', '2024-11-05 07:05:01'),
(81, 83, 'BEKO', 'FREEZER', 'CHEST FREEZER 1 PINTU', 'ABCD09', 'MERAH', '42 L', NULL, NULL, NULL, NULL, '', '', '', 1.00, '11 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'CHINA', '', NULL, ' x ', NULL, '<1', '<1', NULL, '1', '2', '3', '', '', '', '1730086384_73d779181ed615312773.png', '1730086384_8fee6b3e567c39f870dc.png', '1730086384_e1472cc5225122ab5bc5.png', '1730086384_8bc3b71e13b640576c26.png', '1730086384_d1643a3ed983d7b96d24.png', '1730086384_a44030cf61f9c8379248.png', 'https://www.youtube.com/watch?v=FOaSPfALEHk', '', 'pending', 'cipto', '2024-10-28 03:33:04', NULL, NULL, '2024-10-28 03:33:04', '2024-10-28 03:33:04'),
(82, 84, 'HISENSE', 'AC', 'SPLIT STANDARD', 'EFGH78', 'MERAH', '0,5 PK', NULL, NULL, NULL, NULL, '', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'CHINA', 'R-32', NULL, ' x ', '2', '<1', '<1', 4.30, '1', '2', '3', '', '', '', '1730096229_6a6524bb3ed3a965943d.png', '1730096229_f222315a3f990d127593.png', '1730096229_e8f2b7e25a847cbd0bee.png', '1730096229_0fbe8577c941b5eb8445.png', '1730096229_60033b9343b7c2bb6ef0.png', '1730096229_7c48e93939c95833523d.png', 'https://www.youtube.com/watch?v=FOaSPfALEHk', '', 'approved', 'cipto', '2024-11-06 05:55:38', '2024-10-30 03:20:28', NULL, '2024-10-28 06:17:10', '2024-11-06 05:55:38'),
(83, 85, 'BEKO', 'KULKAS', 'KULKAS PORTABLE', 'ABCD09', 'MERAH', '47 L', NULL, NULL, NULL, NULL, '', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'CHINA', '', NULL, ' x ', NULL, '1', '<1', NULL, '1', '2', '3', '', '', '', '1730104248_84a546cc1e634e7592c5.png', '1730104248_ecee0caffd927295be4b.png', '1730104248_f068b490480ae0e116c4.png', '1730104248_ec2aada8c57fbed814e2.png', '1730104248_2d7bf1172708542434bf.png', '1730104248_f175bbf46f9b702d48f8.png', 'https://www.youtube.com/watch?v=FOaSPfALEHk', '', 'pending', 'cipto', '2024-10-28 09:57:13', NULL, NULL, '2024-10-28 08:30:48', '2024-10-28 09:57:13'),
(84, 86, 'ELECTROLUX', 'AC', 'SPLIT STANDARD', 'ABCD09', 'PUTIH', '1 PK', NULL, NULL, NULL, NULL, 'Unknown', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'CHINA', 'R-410 A', NULL, ' x ', '1', '<1', '<1', NULL, '1', '2', '3', '', '', '', '1730164668_9705a4a14e245791ff14.png', '1730164668_624afe2b9c54a4656087.png', '1730164668_ac41cdcb0ee03f187be4.png', '1730164668_81d9364e2a117a15b183.png', '1730164668_53a233931409c2a57fd7.png', '1730164668_e8a475206dc717e000c2.png', 'https://www.youtube.com/watch?v=FOaSPfALEHk', '', 'pending', 'cipto', '2024-10-29 02:35:20', NULL, NULL, '2024-10-29 01:17:48', '2024-10-29 02:35:20'),
(86, 94, 'BEKO', 'TV', 'ANDROID', 'ABCD09', 'BIRU', '', '', '', '<1', '', '40 INC', '', '', 3.14, '2 x 2 x 2 cm', '2 x 2 x 2 cm', 1.00, 'CHINA', '', '1 x 1 x 1 cm', '1 x 1', '', '', '2', 0.00, '1', '2', '3', '', '', '', '1730281659_11d9280ed09db2b0b3f9.png', '1730281659_8425beeb490787f9c568.png', '1730281659_dbd1bfd8a7b5967256fb.png', '1730281659_63a25eea985929ad224d.png', '1730281659_0f032cea4ba262c6cebd.png', '1730281659_05042f804e3ce65ac322.png', 'https://www.youtube.com/watch?v=FOaSPfALEHk', '', 'approved', 'superadmin', '2024-11-06 02:52:10', '2024-11-06 02:52:10', NULL, '2024-10-30 09:47:40', '2024-11-06 02:52:10'),
(88, 96, 'DAIKIN', 'FREEZER', 'CHEST FREEZER 1 PINTU', 'AB091', 'HIJAU', '42 L', '', '', '', '', '', '', '', 123.45, '123 x 123 x 123 cm', '100 x 100 x 100 cm', 123.45, 'UK', '', '', '', '', '3', '3', 0.00, '1', '2', '3', '4', '5', '', '1730346278_8bf1aae5c580ad3fe533.png', '1730346278_48504c0bbd1d6a97fe72.png', '1730346278_44078201a8c2d8ceaeea.png', '1730346278_6726dd3d6b421e17a6d5.png', '1730346278_13c590061d187c866e8d.png', '1730346278_2bea85d0e738332a25a0.png', 'https://www.youtube.com/watch?v=FOaSPfALEHk', '', 'approved', 'Aoz0raSenpai', '2024-11-04 03:58:24', '2024-10-31 03:45:24', NULL, '2024-10-31 03:44:39', '2024-11-04 03:58:24'),
(89, 97, 'ELECTROLUX', 'KULKAS', 'KULKAS PORTABLE', 'ZHL019', 'HITAM', '42 L', '', '', '', '', '', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'CHINA', '', '', '', '', '3', '2', 0.00, '1', '2', '3', '', '', '', '1730360126_14cff9c23225585f8b0e.png', '1730360126_a61f6148dcde7e86ee05.png', '1730360126_f254de4a5b457d9c1e93.png', '1730360126_a2fa6aa2339c25e663bb.png', '1730360126_4e7f608afb1a89ec96b9.png', '1730360126_99fce0b15f61a1c49d29.png', 'https://www.youtube.com/watch?v=FOaSPfALEHk', '', 'approved', 'Aoz0raSenpai', '2024-11-06 05:56:15', '2024-11-05 06:54:57', NULL, '2024-10-31 07:35:27', '2024-11-06 05:56:15'),
(90, 108, 'ADVAN', 'TV', 'ANDROID', 'ABCD09', 'HIJAU', '', NULL, NULL, NULL, NULL, '40 INCH', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'CHINA', '', NULL, '1 x 1', '1', '', '1', NULL, '1', '2', '334', '', '', '', '1730367638_175f12d05ccab6b00760.png', '1730367638_88cdd0f213d27668f52d.png', '1730367638_1f651c8b3153f68bccdc.png', '1730367638_fe1838ee0f235f303c9d.png', '1730367638_3a31d72d8f2098172e1d.png', '1730367638_d8ed7345430e6704f49e.png', 'https://www.youtube.com/watch?v=FOaSPfALEHk', '', 'pending', 'cipto', '2024-10-31 09:42:59', NULL, NULL, '2024-10-31 09:26:49', '2024-10-31 09:42:59'),
(91, 109, 'CHANGHONG', 'MESIN CUCI', 'MESIN CUCI PORTABLE', 'ABCD09', 'HITAM', '6,5 Kg', '', '<1', '', '', '', '', '', 10.00, '10 x 10 x 10 cm', '10 x 10 x 10 cm', 10.00, '10', '', '', '', '', '', '2', 0.00, '1', '2', '3', '4', '5', '', '1730370135_b02de051e122dac89be7.png', '', '', '', '', '', '', '', 'rejected', 'cipto', '2024-11-01 09:41:35', NULL, '2024-11-01 09:41:35', '2024-10-31 10:22:15', '2024-11-01 09:41:35'),
(92, 110, 'BERVIN', 'SMALL APPLIANCES', 'DISPENSER GALON BAWAH', 'ABCD09', 'HIJAU', '', '', '', '', '', '', '9', '10', 2.00, '2 x 2 x 2 cm', '2 x 2 x 2 cm', 2.00, 'CHINA', '', '', '', '', '2', '', 0.00, '1', '2', '3', '', '', '', '1730700690_4f5799f7a5c7ec16966b.png', '', '', '', '', '', '', 'Rp 2.000.000,00', 'approved', 'Aoz0raSenpai', '2024-11-11 01:40:38', '2024-11-04 06:12:09', NULL, '2024-11-04 06:11:31', '2024-11-11 01:40:38'),
(93, 111, 'CHANGHONG', 'MESIN CUCI', 'MESIN CUCI PORTABLE', 'ABCD09E1', 'HIJAU', '7 Kg', '', '<1', '', '', '', '', '', 1.00, '1 x 2 x 3 cm', '4 x 5 x 6 cm', 1.00, 'CHINA', '', '', '', '', '', '1', 0.00, '1', '2', '3', '', '', '', '1730792644_5025e4d31c014b36a65e.png', '', '', '', '', '', '', '', 'confirmed', 'Aoz0raSenpai', '2024-11-05 07:56:17', NULL, NULL, '2024-11-05 07:44:06', '2024-11-05 07:56:17'),
(94, 118, 'ELECTROLUX', 'MESIN CUCI', 'MESIN CUCI PORTABLE', 'ABCD09', 'HIJAU', '6,5 Kg', '', '<1', '', '', '', '', '', 1.00, '1 x 2 x 3 cm', '1 x 2 x 3 cm', 1.00, 'CHINA', '', '', '', '', '', '<1', 0.00, '1', '2', '3', '', '', '', '1730800035_48cf72aaa55f1f3832d0.png', '', '', '', '', '', '', '', 'pending', 'cipto', '2024-11-05 09:47:16', NULL, NULL, '2024-11-05 09:47:16', '2024-11-05 09:47:16'),
(95, 119, 'COSMOS', 'AC', 'SPLIT STANDARD', 'HVILAPN0132', 'KUNING', '0,75 PK', '', '', '', '', '', '', '', 8.00, '1 x 2 x 3 cm', '4 x 5 x 6 cm', 7.00, 'CHINA', 'R-32', '', '', '9', '<1', '<1', 4.30, '1', '2', '3', '', '', '', '1730875380_cb30c991f05b11fac62a.png', '', '', '', '', '', '', '', 'confirmed', 'Aoz0raSenpai', '2024-11-06 06:45:32', NULL, NULL, '2024-11-06 06:43:00', '2024-11-06 06:45:32'),
(96, 120, 'ELECTROLUX', 'TV', 'ANDROID', 'A90DWW9', 'KUNING', '', '', '', '1', '', '40 INCH', '', '', 13.00, '1 x 2 x 3 cm', '7 x 8 x 9 cm', 12.00, 'CHINA', '', '4 x 5 x 6 cm', '10 x 11', '', '', '2', 0.00, '1', '2', '3', '', '', '', '1730882028_e3f92399dd70ff70b564.png', '', '', '', '', '', '', '', 'pending', 'Aoz0raSenpai', '2024-11-06 08:33:49', NULL, NULL, '2024-11-06 08:21:59', '2024-11-06 08:33:49'),
(97, 121, 'ELECTROLUX', 'TV', 'ANALOG', 'A90DWW9', 'KUNING', '', '', '', '<1', '', '24 INCH', '', '', 13.00, '1 x 2 x 3 cm', '7 x 8 x 9 cm', 12.00, 'CHINA', '', '4 x 5 x 6 cm', '10 x 11', '', '', '2', 0.00, '1', '2', '3', '', '', '', '1730882309_2d2dbc06a1fb60073128.png', '', '', '', '', '', '', '', 'approved', 'Aoz0raSenpai', '2024-11-08 07:43:13', '2024-11-08 07:43:13', NULL, '2024-11-06 08:38:30', '2024-11-08 07:43:13'),
(98, 122, 'ELECTROLUX', 'SMALL APPLIANCES', 'SPEAKER', 'ABCD09', 'KUNING', '', '', '', '', '1', 'Besar', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'CHINA', '', '', '', '', '', '2', 0.00, '1', '2', '3', '', '', '', '1731054566_a33afd8e61dda6b2a9b0.png', '1731054566_a96e590806f099068b5e.png', '', '', '', '1731054566_a29597ed1345d2440c51.png', '', '', 'pending', 'cipto', '2024-11-08 08:29:26', NULL, NULL, '2024-11-08 08:29:26', '2024-11-08 08:29:26'),
(99, 123, 'ELECTROLUX', 'SMALL APPLIANCES', 'SPEAKER', 'ABCD09', 'KUNING', '', '', '', '', '2', 'Besar', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'CHINA', '', '', '', '', '', '2', 0.00, '1', '2', '3', '', '', '', '1731054626_d4cade1e49edf94cf7f0.png', '1731054626_4b843e4a87bb2c18e198.png', '', '', '', '1731054626_197885da8e63648ad079.png', '', '', 'approved', 'cipto', '2024-11-08 08:34:25', '2024-11-08 08:34:25', NULL, '2024-11-08 08:30:26', '2024-11-08 08:34:25'),
(100, 125, 'LG', 'SMALL APPLIANCES', 'DISPENSER GALON BAWAH', 'J2EI0EP1S', 'PUTIH', '', '', '', '', '', '', '9', '10', 1.00, '1 x 2 x 3 cm', '2 x 3 x 4 cm', 1.00, 'INDIA', '', '', '', '', '2', '', 0.00, '1', '2', '3', '', '', '', '1731054835_e7e451d60f468fb73c9f.png', '', '', '', '1731054835_24765437e60493b9c25b.png', '1731054835_d5fc0fa9fcfcd1d165f0.png', '', '', 'approved', 'Rizal F', '2024-11-08 08:34:38', '2024-11-08 08:34:38', NULL, '2024-11-08 08:33:56', '2024-11-08 08:34:38'),
(101, 126, 'LG', 'AC', 'SPLIT STANDARD', 'ABCD09', 'UNGU', '0,75 PK', '', '', '', '', '', '', '', 10.00, '1 x 2 x 3 cm', '1 x 2 x 3 cm', 1.00, 'PRAPATAN CIAMIS', 'R-410 A', '', '', '10', '<1', '<1', 5.00, '1', '2', '3', '', '', '', '1731198942_2e189eea7d2f4c2db788.png', '1731198942_dcab665afb9744dd9561.png', '', '', '', '1731198942_6e326430b68c803c7fba.png', 'https://www.youtube.com/watch?v=FOaSPfALEHk', '', 'approved', 'Rizal F', '2024-11-10 00:41:17', '2024-11-10 00:41:17', NULL, '2024-11-10 00:35:43', '2024-11-10 00:41:17');

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
(21, 3, 'KULKAS PORTABLE'),
(22, 3, 'SIDE BY SIDE'),
(23, 3, 'MULTIDOOR'),
(24, 6, 'MESIN CUCI PORTABLE'),
(25, 6, '2 TABUNG'),
(26, 6, 'TOP LOADING'),
(27, 6, 'FRONT LOADING'),
(28, 4, 'CHEST FREEZER 2 PINTU ATAU LEBIH'),
(29, 7, 'SHOWCASE 1 PINTU'),
(30, 7, 'SHOWCASE 2 PINTU ATAU LEBIH'),
(31, 10, 'SPEAKER'),
(32, 10, 'KIPAS ANGIN'),
(33, 10, 'MAGIC COM'),
(34, 10, 'RICE COOKER'),
(35, 10, 'DISPENSER GALON ATAS'),
(36, 10, 'DISPENSER GALON BAWAH'),
(37, 10, 'WATER HEATER'),
(38, 10, 'COFFEE MAKER');

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
(12, 16, '40 INCH');

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
  `brand` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` enum('user','admin','superadmin','') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `brand`, `phone`, `address`, `role`) VALUES
(1, 'Rizal F', 'rizal090', '$2y$10$WqQUPoMypavChbYnxsg64eT7k/haq2Ql5vP2v0rygFisSaSm1Rxwu', 'rizal22@gmail.com', 'SAMSUNG', '08789279211', 'jl. e No.7', 'admin'),
(2, 'cipto', 'cipto21', '$2y$10$qN6cvIz761ZKsoOJCly0bOcNUBJGUjv/To4RJc9KgpaRG9SF2.UfK', 'cipto21@gmail.com', 'AQUA', '089212290090', 'jl. e No.90', 'user'),
(3, 'superadmin', 'superadmin_1', '$2y$10$9ZkjqWA5LPB2VD3fJRzVKOetFCDUSWBsTKXE.JlaSyMKGggpRwKUe', 'superadmin1@gmail.com', 'superadmin', '088888888888', 'jl. superadmin no.1', 'superadmin'),
(4, 'citra', 'citra89', '$2y$10$O3KIb0FEqP2l91DmD6dpfOBOSX7cLVBakcKfzPi5sjb3q93.kDdaS', 'citra89@gmail.com', 'POLYTRON', '087199990999', 'jl. a No.7', 'user'),
(6, 'Aoz0raSenpai', 'steven0099', '$2a$12$oWgTdCgkw3eKFUdJZM/rFOFVAJ1VyIahUTJ.oNZ0VpqZUUWQmSnde', 'sgamess0099@gmail.com', '-', '087822297790', '-', 'superadmin');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `capacities`
--
ALTER TABLE `capacities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `compressor_warranties`
--
ALTER TABLE `compressor_warranties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `garansi_semua_service`
--
ALTER TABLE `garansi_semua_service`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `product_uploads`
--
ALTER TABLE `product_uploads`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `refrigrant_type`
--
ALTER TABLE `refrigrant_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sparepart_warranties`
--
ALTER TABLE `sparepart_warranties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `ukuran_tv`
--
ALTER TABLE `ukuran_tv`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
