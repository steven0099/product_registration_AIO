-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2024 at 07:09 AM
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
(41, 'PH', 'PHILIPS');

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
(77, 10, '1 PK');

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
(54, 10, 'AIR FRYER');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `capacities`
--
ALTER TABLE `capacities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

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
