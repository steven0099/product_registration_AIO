-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2024 at 08:49 AM
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
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(31, 31, 'Kecil'),
(32, 31, 'Sedang'),
(33, 31, 'Besar'),
(34, 32, '7 INC'),
(35, 32, '8 INC'),
(36, 32, '9 INC'),
(37, 32, '10 INC'),
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
(53, 24, '50 L'),
(54, 9, '0,5 PK'),
(55, 9, '0,75 PK'),
(56, 9, '1 PK'),
(57, 9, '1,5 PK');

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
  `capacity_id` int(11) NOT NULL,
  `compressor_warranty_id` int(11) NOT NULL,
  `sparepart_warranty_id` int(11) NOT NULL,
  `product_type` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `category_id`, `subcategory_id`, `capacity_id`, `compressor_warranty_id`, `sparepart_warranty_id`, `product_type`, `color`, `created_at`, `updated_at`) VALUES
(15, 15, 3, 6, 1, 1, 6, 'a', 'merah', '2024-10-20 21:07:39', '2024-10-20 21:07:39'),
(16, 17, 4, 4, 1, 1, 6, 'ab', 'merah', '2024-10-20 21:10:51', '2024-10-20 21:10:51'),
(17, 1, 3, 6, 1, 1, 1, 'a', 'merah', '2024-10-20 22:57:11', '2024-10-20 22:57:11'),
(18, 1, 3, 6, 1, 1, 6, 'a', 'merah', '2024-10-20 23:52:18', '2024-10-20 23:52:18'),
(19, 14, 4, 4, 1, 1, 1, 'a', 'merah', '2024-10-21 00:28:03', '2024-10-21 00:32:13'),
(20, 15, 3, 6, 1, 1, 6, 'a', 'merah', '2024-10-21 00:35:33', '2024-10-21 00:36:22'),
(21, 14, 4, 4, 1, 1, 1, 'a', 'merah', '2024-10-21 00:44:09', '2024-10-21 00:44:09'),
(22, 20, 3, 6, 1, 1, 6, 'a', 'merah', '2024-10-21 00:59:45', '2024-10-21 00:59:45'),
(23, 11, 3, 6, 1, 1, 1, 'ab', 'merah', '2024-10-21 02:10:02', '2024-10-21 02:10:02'),
(24, 17, 3, 6, 1, 1, 1, 'a', 'merah', '2024-10-21 06:57:56', '2024-10-21 06:57:56'),
(25, 12, 3, 6, 1, 1, 1, 'a', 'merah', '2024-10-21 07:05:01', '2024-10-21 07:05:01'),
(26, 14, 5, 9, 1, 1, 1, 'a', 'merah', '2024-10-21 07:58:36', '2024-10-21 07:58:36');

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

--
-- Dumping data for table `product_advantages`
--

INSERT INTO `product_advantages` (`id`, `product_id`, `advantage1`, `advantage2`, `advantage3`, `advantage4`, `advantage5`, `advantage6`, `created_at`, `updated_at`) VALUES
(1, 16, '-', '', '', '', '', '', '2024-10-21 04:11:12', '2024-10-21 04:11:12');

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
  `kemasan_p` decimal(10,2) DEFAULT NULL,
  `kemasan_l` decimal(10,2) DEFAULT NULL,
  `kemasan_t` decimal(10,2) DEFAULT NULL,
  `berat` decimal(10,2) DEFAULT NULL,
  `daya` decimal(10,2) DEFAULT NULL,
  `pembuat` varchar(255) DEFAULT NULL,
  `refrigant` varchar(255) NOT NULL,
  `cspf` decimal(11,0) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_specifications`
--

INSERT INTO `product_specifications` (`id`, `product_id`, `produk_p`, `produk_l`, `produk_t`, `kemasan_p`, `kemasan_l`, `kemasan_t`, `berat`, `daya`, `pembuat`, `refrigant`, `cspf`, `created_at`, `updated_at`) VALUES
(8, 15, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 'uk', '', 0, '2024-10-21 04:08:00', '2024-10-21 04:08:00'),
(9, 16, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 'uk', '', 0, '2024-10-21 04:11:08', '2024-10-21 04:11:08'),
(10, 17, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 'uk', '', 0, '2024-10-21 05:57:26', '2024-10-21 05:57:26'),
(11, 18, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 10.00, 'uk', '', 0, '2024-10-21 06:57:25', '2024-10-21 06:57:25');

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
  `daya` decimal(10,2) DEFAULT NULL,
  `product_dimensions` varchar(100) DEFAULT NULL,
  `packaging_dimensions` varchar(100) DEFAULT NULL,
  `berat` decimal(10,2) DEFAULT NULL,
  `pembuat` varchar(255) NOT NULL,
  `refrigant` varchar(100) DEFAULT NULL,
  `compressor_warranty` varchar(100) DEFAULT NULL,
  `sparepart_warranty` varchar(100) DEFAULT NULL,
  `cspf` decimal(10,2) DEFAULT NULL,
  `gambar_utama` varchar(255) NOT NULL,
  `gambar_samping_kiri` varchar(255) NOT NULL,
  `gambar_samping_kanan` varchar(255) NOT NULL,
  `video_produk` varchar(255) NOT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `submitted_by` varchar(255) DEFAULT NULL,
  `confirmed_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_submissions`
--

INSERT INTO `product_submissions` (`id`, `product_id`, `brand`, `category`, `subcategory`, `product_type`, `color`, `capacity`, `daya`, `product_dimensions`, `packaging_dimensions`, `berat`, `pembuat`, `refrigant`, `compressor_warranty`, `sparepart_warranty`, `cspf`, `gambar_utama`, `gambar_samping_kiri`, `gambar_samping_kanan`, `video_produk`, `status`, `submitted_by`, `confirmed_at`, `submitted_at`, `updated_at`) VALUES
(1, 25, 'CHANGHONG', 'KULKAS', '2 Pintu', 'a', 'merah', '1', 10.00, '10 x 10 x 10', '10 x 10 x 10', 10.00, '', NULL, '1', '1', NULL, '1729522036_1dbd9d84c63162c806f6.jpg', '1729522036_4fa0d9fe53ec2733eab5.jpg', '1729522036_8a1c40f9854146e1a355.jpg', '1729522036_4776a10910a8f3263f00.mp4', 'pending', 'superadmin', '2024-10-21 15:29:32', '2024-10-21 14:57:26', '2024-10-21 14:57:26'),
(2, 26, 'COSMOS', 'AC', 'SPLIT STANDARD', 'a', 'merah', '1', 10.00, '10 x 10 x 10', '10 x 10 x 10', 10.00, '', NULL, '1', '1', NULL, '1729522772_ae513370f1bc5048d516.jpg', '1729522772_056cfcef8913fb4da7c8.jpg', '1729522772_4d1c8612f7586789230c.jpg', '1729522772_791584dbb83f10bfe37d.mp4', 'pending', 'cipto', '2024-10-21 15:29:32', '2024-10-21 14:59:32', '2024-10-21 14:59:32'),
(3, 26, 'COSMOS', 'AC', 'SPLIT STANDARD', 'a', 'merah', '1', 10.00, '10 x 10 x 10', '10 x 10 x 10', 10.00, '', NULL, '1', '1', NULL, '1729522772_ae513370f1bc5048d516.jpg', '1729522772_056cfcef8913fb4da7c8.jpg', '1729522772_4d1c8612f7586789230c.jpg', '1729522772_791584dbb83f10bfe37d.mp4', 'pending', 'superadmin', '2024-10-21 15:29:32', '2024-10-21 15:05:44', '2024-10-21 15:05:44'),
(4, 26, 'COSMOS', 'AC', 'SPLIT STANDARD', 'a', 'merah', '1', 10.00, '10 x 10 x 10', '10 x 10 x 10', 10.00, '', NULL, '1', '1', NULL, '1729522772_ae513370f1bc5048d516.jpg', '1729522772_056cfcef8913fb4da7c8.jpg', '1729522772_4d1c8612f7586789230c.jpg', '1729522772_791584dbb83f10bfe37d.mp4', 'pending', 'superadmin', '2024-10-21 15:29:32', '2024-10-21 15:05:51', '2024-10-21 15:05:51'),
(5, 26, 'COSMOS', 'AC', 'SPLIT STANDARD', 'a', 'merah', '1', 10.00, '10 x 10 x 10', '10 x 10 x 10', 10.00, '', NULL, '1', '1', NULL, '1729522772_ae513370f1bc5048d516.jpg', '1729522772_056cfcef8913fb4da7c8.jpg', '1729522772_4d1c8612f7586789230c.jpg', '1729522772_791584dbb83f10bfe37d.mp4', 'pending', 'superadmin', '2024-10-21 15:29:32', '2024-10-21 15:06:20', '2024-10-21 15:06:20');

-- --------------------------------------------------------

--
-- Table structure for table `product_uploads`
--

CREATE TABLE `product_uploads` (
  `id` int(11) UNSIGNED NOT NULL,
  `gambar_utama` varchar(255) NOT NULL,
  `gambar_samping_kiri` varchar(255) NOT NULL,
  `gambar_samping_kanan` varchar(255) NOT NULL,
  `video_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(36, 10, 'DISPENSER GALON BAWAH');

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
(1, 15, '24 INC'),
(2, 15, '27 INC'),
(3, 15, '32 INC'),
(4, 15, '40 INC');

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
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `brand`, `phone`, `address`, `role`) VALUES
(1, 'Rizal F', 'rizal090', '$2y$10$WqQUPoMypavChbYnxsg64eT7k/haq2Ql5vP2v0rygFisSaSm1Rxwu', 'rizal22@gmail.com', 'SAMSUNG', '08789279211', 'jl. e No.7', 'admin'),
(2, 'cipto', 'cipto21', '$2y$10$qN6cvIz761ZKsoOJCly0bOcNUBJGUjv/To4RJc9KgpaRG9SF2.UfK', 'cipto21@gmail.com', 'AQUA', '089212290090', 'jl. e No.90', 'user'),
(3, 'superadmin', 'superadmin_1', '$2y$10$9ZkjqWA5LPB2VD3fJRzVKOetFCDUSWBsTKXE.JlaSyMKGggpRwKUe', 'superadmin1@gmail.com', 'superadmin', '088888888888', 'jl. superadmin no.1', 'superadmin'),
(4, 'citra', 'citra89', '$2y$10$O3KIb0FEqP2l91DmD6dpfOBOSX7cLVBakcKfzPi5sjb3q93.kDdaS', 'citra89@gmail.com', 'POLYTRON', '087199990999', 'jl. a No.7', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `capacity_id` (`capacity_id`),
  ADD KEY `compressor_warranty_id` (`compressor_warranty_id`),
  ADD KEY `sparepart_warranty_id` (`sparepart_warranty_id`);

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
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `capacities`
--
ALTER TABLE `capacities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

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
-- AUTO_INCREMENT for table `garansi_motor`
--
ALTER TABLE `garansi_motor`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `garansi_panel`
--
ALTER TABLE `garansi_panel`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `garansi_semua_service`
--
ALTER TABLE `garansi_semua_service`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `ukuran_tv`
--
ALTER TABLE `ukuran_tv`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`),
  ADD CONSTRAINT `products_ibfk_5` FOREIGN KEY (`compressor_warranty_id`) REFERENCES `compressor_warranties` (`id`),
  ADD CONSTRAINT `products_ibfk_6` FOREIGN KEY (`sparepart_warranty_id`) REFERENCES `sparepart_warranties` (`id`);

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
