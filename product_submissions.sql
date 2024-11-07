-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2024 at 03:27 AM
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

INSERT INTO `product_submissions` (`id`, `product_id`, `brand`, `category`, `subcategory`, `product_type`, `color`, `capacity`, `garansi_elemen_panas`, `garansi_motor`, `garansi_panel`, `garansi_semua_service`, `ukuran`, `kapasitas_air_panas`, `kapasitas_air_dingin`, `daya`, `product_dimensions`, `packaging_dimensions`, `berat`, `pembuat`, `refrigrant`, `pstand_dimensions`, `panel_resolution`, `cooling_capacity`, `compressor_warranty`, `sparepart_warranty`, `cspf`, `advantage1`, `advantage2`, `advantage3`, `advantage4`, `advantage5`, `advantage6`, `gambar_depan`, `gambar_belakang`, `gambar_atas`, `gambar_bawah`, `gambar_samping_kiri`, `gambar_samping_kanan`, `video_produk`, `status`, `submitted_by`, `confirmed_at`, `approved_at`, `rejected_at`, `submitted_at`, `updated_at`) VALUES
(76, 76, 'BERVIN', 'SMALL APPLIANCES', 'SPEAKER', 'A', 'MERAH', '', NULL, NULL, NULL, '1', 'Kecil', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'CHINA', NULL, NULL, ' x ', NULL, '', '', NULL, '1', '2', '3', '', '', '', '1729931363_1ee6203a640b1d46b26f.png', '1729931363_d011157a73a96d5c47d6.png', '1729931363_1e9efc6763dad0674bc5.png', '1729931363_bdcc7e0c43864ed518d0.png', '1729931363_8870b9102d3a98c23577.png', '1729931363_0c3c4182d359fab4c585.png', 'https://www.youtube.com/watch?v=FOaSPfALEHk', 'rejected', 'cipto', '2024-10-30 03:20:45', NULL, '2024-10-30 03:20:45', '2024-10-26 08:29:09', '2024-10-30 03:20:45'),
(77, 77, 'CHANGHONG', 'AC', 'SPLIT STANDARD', 'ABCD09', 'MERAH', '0,75 PK', NULL, NULL, NULL, NULL, '', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'CHINA', '', NULL, ' x ', '1', '<1', '<1', NULL, '1', '2', '3', '', '', '', '1730078608_60fc8860690082794285.png', '1730078608_85bc4383f384abf12e41.png', '1730078608_f8b5bc7dbc4a1e263789.png', '1730078608_4f4c0ea18a9c06daaea6.png', '1730078608_06ba7f22e505294a8d27.png', '1730078608_b1ddff2963258452219d.png', 'https://www.youtube.com/watch?v=FOaSPfALEHk', 'pending', 'cipto', '2024-10-28 01:23:28', NULL, NULL, '2024-10-28 01:19:37', '2024-10-28 01:23:28'),
(78, 78, 'BEKO', 'AC', 'SPLIT STANDARD', 'ABCD09', 'MERAH', '0,5 PK', NULL, NULL, NULL, NULL, '', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'CHINA', '', NULL, ' x ', '1', '<1', '<1', NULL, '1', '2', '3', '', '', '', '1730078772_2078c4220ac99ec3e554.png', '1730078772_65ea157ee029df0b967b.png', '1730078772_82a087777f6f6318ac06.png', '1730078772_5532d03843b3879e4e9b.png', '1730078772_69db91660ddd793cf86b.png', '1730078772_d671c235a7e122f56abd.png', 'https://www.youtube.com/watch?v=FOaSPfALEHk', 'pending', 'cipto', '2024-10-28 01:26:13', NULL, NULL, '2024-10-28 01:26:13', '2024-10-28 01:26:13'),
(79, 80, 'ADVAN', 'AC', 'SPLIT STANDARD', 'ABCD09', 'MERAH', '0,5 PK', NULL, NULL, NULL, NULL, '', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'CHINA', 'R-22', NULL, ' x ', '1', '<1', '<1', NULL, '1', '2', '3', '', '', '', '1730080882_fdb6f6562f4184499199.png', '1730080882_e5ce7f5e2096fbc00645.png', '1730080882_ec43bb6116ddee831fda.png', '1730080882_80d5ccec55a19e81b1c2.png', '1730080882_bd564f4d54ab71c1b379.png', '1730080882_5a83b3c99eb94aaa29c6.png', 'https://www.youtube.com/watch?v=FOaSPfALEHk', 'pending', 'cipto', '2024-10-28 02:01:22', NULL, NULL, '2024-10-28 02:01:22', '2024-10-28 02:01:22'),
(80, 82, 'ARTUGO', 'TV', 'ANALOG', 'ABCD09', 'X', '', NULL, NULL, NULL, NULL, '24 INCH', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'CHINA', '', '1 x 1 x 1 cm', '2 x 2', NULL, '', '<1', NULL, '11', '2', '3', '', '', '', '1730084986_a70d59874d394cd72958.png', '1730084986_6f1835ccc8fb0bee9434.png', '1730084986_c91212f22505df7ef920.png', '1730084986_7eeca5a9a4e3ae61ba2a.png', '1730084986_a5e7a33e906b29e02091.png', '1730084986_c8acde9bcfde71a1d016.png', 'https://www.youtube.com/watch?v=FOaSPfALEHk', 'approved', 'cipto', '2024-11-05 07:05:01', '2024-11-04 04:11:14', NULL, '2024-10-28 03:09:46', '2024-11-05 07:05:01'),
(81, 83, 'BEKO', 'FREEZER', 'CHEST FREEZER 1 PINTU', 'ABCD09', 'MERAH', '42 L', NULL, NULL, NULL, NULL, '', '', '', 1.00, '11 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'CHINA', '', NULL, ' x ', NULL, '<1', '<1', NULL, '1', '2', '3', '', '', '', '1730086384_73d779181ed615312773.png', '1730086384_8fee6b3e567c39f870dc.png', '1730086384_e1472cc5225122ab5bc5.png', '1730086384_8bc3b71e13b640576c26.png', '1730086384_d1643a3ed983d7b96d24.png', '1730086384_a44030cf61f9c8379248.png', 'https://www.youtube.com/watch?v=FOaSPfALEHk', 'pending', 'cipto', '2024-10-28 03:33:04', NULL, NULL, '2024-10-28 03:33:04', '2024-10-28 03:33:04'),
(82, 84, 'HISENSE', 'AC', 'SPLIT STANDARD', 'EFGH78', 'MERAH', '0,5 PK', NULL, NULL, NULL, NULL, '', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'CHINA', 'R-32', NULL, ' x ', '2', '<1', '<1', 4.30, '1', '2', '3', '', '', '', '1730096229_6a6524bb3ed3a965943d.png', '1730096229_f222315a3f990d127593.png', '1730096229_e8f2b7e25a847cbd0bee.png', '1730096229_0fbe8577c941b5eb8445.png', '1730096229_60033b9343b7c2bb6ef0.png', '1730096229_7c48e93939c95833523d.png', 'https://www.youtube.com/watch?v=FOaSPfALEHk', 'approved', 'cipto', '2024-11-06 05:55:38', '2024-10-30 03:20:28', NULL, '2024-10-28 06:17:10', '2024-11-06 05:55:38'),
(83, 85, 'BEKO', 'KULKAS', 'KULKAS PORTABLE', 'ABCD09', 'MERAH', '47 L', NULL, NULL, NULL, NULL, '', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'CHINA', '', NULL, ' x ', NULL, '1', '<1', NULL, '1', '2', '3', '', '', '', '1730104248_84a546cc1e634e7592c5.png', '1730104248_ecee0caffd927295be4b.png', '1730104248_f068b490480ae0e116c4.png', '1730104248_ec2aada8c57fbed814e2.png', '1730104248_2d7bf1172708542434bf.png', '1730104248_f175bbf46f9b702d48f8.png', 'https://www.youtube.com/watch?v=FOaSPfALEHk', 'pending', 'cipto', '2024-10-28 09:57:13', NULL, NULL, '2024-10-28 08:30:48', '2024-10-28 09:57:13'),
(84, 86, 'ELECTROLUX', 'AC', 'SPLIT STANDARD', 'ABCD09', 'PUTIH', '1 PK', NULL, NULL, NULL, NULL, 'Unknown', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'CHINA', 'R-410 A', NULL, ' x ', '1', '<1', '<1', NULL, '1', '2', '3', '', '', '', '1730164668_9705a4a14e245791ff14.png', '1730164668_624afe2b9c54a4656087.png', '1730164668_ac41cdcb0ee03f187be4.png', '1730164668_81d9364e2a117a15b183.png', '1730164668_53a233931409c2a57fd7.png', '1730164668_e8a475206dc717e000c2.png', 'https://www.youtube.com/watch?v=FOaSPfALEHk', 'pending', 'cipto', '2024-10-29 02:35:20', NULL, NULL, '2024-10-29 01:17:48', '2024-10-29 02:35:20'),
(86, 94, 'BEKO', 'TV', 'ANDROID', 'ABCD09', 'BIRU', '', '', '', '<1', '', '40 INC', '', '', 3.14, '2 x 2 x 2 cm', '2 x 2 x 2 cm', 1.00, 'CHINA', '', '1 x 1 x 1 cm', '1 x 1', '', '', '2', 0.00, '1', '2', '3', '', '', '', '1730281659_11d9280ed09db2b0b3f9.png', '1730281659_8425beeb490787f9c568.png', '1730281659_dbd1bfd8a7b5967256fb.png', '1730281659_63a25eea985929ad224d.png', '1730281659_0f032cea4ba262c6cebd.png', '1730281659_05042f804e3ce65ac322.png', 'https://www.youtube.com/watch?v=FOaSPfALEHk', 'approved', 'superadmin', '2024-11-06 02:52:10', '2024-11-06 02:52:10', NULL, '2024-10-30 09:47:40', '2024-11-06 02:52:10'),
(88, 96, 'DAIKIN', 'FREEZER', 'CHEST FREEZER 1 PINTU', 'AB091', 'HIJAU', '42 L', '', '', '', '', '', '', '', 123.45, '123 x 123 x 123 cm', '100 x 100 x 100 cm', 123.45, 'UK', '', '', '', '', '3', '3', 0.00, '1', '2', '3', '4', '5', '', '1730346278_8bf1aae5c580ad3fe533.png', '1730346278_48504c0bbd1d6a97fe72.png', '1730346278_44078201a8c2d8ceaeea.png', '1730346278_6726dd3d6b421e17a6d5.png', '1730346278_13c590061d187c866e8d.png', '1730346278_2bea85d0e738332a25a0.png', 'https://www.youtube.com/watch?v=FOaSPfALEHk', 'approved', 'Aoz0raSenpai', '2024-11-04 03:58:24', '2024-10-31 03:45:24', NULL, '2024-10-31 03:44:39', '2024-11-04 03:58:24'),
(89, 97, 'ELECTROLUX', 'KULKAS', 'KULKAS PORTABLE', 'ZHL019', 'HITAM', '42 L', '', '', '', '', '', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'CHINA', '', '', '', '', '3', '2', 0.00, '1', '2', '3', '', '', '', '1730360126_14cff9c23225585f8b0e.png', '1730360126_a61f6148dcde7e86ee05.png', '1730360126_f254de4a5b457d9c1e93.png', '1730360126_a2fa6aa2339c25e663bb.png', '1730360126_4e7f608afb1a89ec96b9.png', '1730360126_99fce0b15f61a1c49d29.png', 'https://www.youtube.com/watch?v=FOaSPfALEHk', 'approved', 'Aoz0raSenpai', '2024-11-06 05:56:15', '2024-11-05 06:54:57', NULL, '2024-10-31 07:35:27', '2024-11-06 05:56:15'),
(90, 108, 'ADVAN', 'TV', 'ANDROID', 'ABCD09', 'HIJAU', '', NULL, NULL, NULL, NULL, '40 INCH', '', '', 1.00, '1 x 1 x 1 cm', '1 x 1 x 1 cm', 1.00, 'CHINA', '', NULL, '1 x 1', '1', '', '1', NULL, '1', '2', '334', '', '', '', '1730367638_175f12d05ccab6b00760.png', '1730367638_88cdd0f213d27668f52d.png', '1730367638_1f651c8b3153f68bccdc.png', '1730367638_fe1838ee0f235f303c9d.png', '1730367638_3a31d72d8f2098172e1d.png', '1730367638_d8ed7345430e6704f49e.png', 'https://www.youtube.com/watch?v=FOaSPfALEHk', 'pending', 'cipto', '2024-10-31 09:42:59', NULL, NULL, '2024-10-31 09:26:49', '2024-10-31 09:42:59'),
(91, 109, 'CHANGHONG', 'MESIN CUCI', 'MESIN CUCI PORTABLE', 'ABCD09', 'HITAM', '6,5 Kg', '', '<1', '', '', '', '', '', 10.00, '10 x 10 x 10 cm', '10 x 10 x 10 cm', 10.00, '10', '', '', '', '', '', '2', 0.00, '1', '2', '3', '4', '5', '', '1730370135_b02de051e122dac89be7.png', '', '', '', '', '', '', 'rejected', 'cipto', '2024-11-01 09:41:35', NULL, '2024-11-01 09:41:35', '2024-10-31 10:22:15', '2024-11-01 09:41:35'),
(92, 110, 'BERVIN', 'SMALL APPLIANCES', 'DISPENSER GALON BAWAH', 'ABCD09', 'HIJAU', '', '', '', '', '', '', '9', '10', 2.00, '2 x 2 x 2 cm', '2 x 2 x 2 cm', 2.00, 'CHINA', '', '', '', '', '2', '', 0.00, '1', '2', '3', '', '', '', '1730700690_4f5799f7a5c7ec16966b.png', '', '', '', '', '', '', 'approved', 'Aoz0raSenpai', '2024-11-04 06:12:40', '2024-11-04 06:12:09', NULL, '2024-11-04 06:11:31', '2024-11-04 06:12:40'),
(93, 111, 'CHANGHONG', 'MESIN CUCI', 'MESIN CUCI PORTABLE', 'ABCD09E1', 'HIJAU', '7 Kg', '', '<1', '', '', '', '', '', 1.00, '1 x 2 x 3 cm', '4 x 5 x 6 cm', 1.00, 'CHINA', '', '', '', '', '', '1', 0.00, '1', '2', '3', '', '', '', '1730792644_5025e4d31c014b36a65e.png', '', '', '', '', '', '', 'confirmed', 'Aoz0raSenpai', '2024-11-05 07:56:17', NULL, NULL, '2024-11-05 07:44:06', '2024-11-05 07:56:17'),
(94, 118, 'ELECTROLUX', 'MESIN CUCI', 'MESIN CUCI PORTABLE', 'ABCD09', 'HIJAU', '6,5 Kg', '', '<1', '', '', '', '', '', 1.00, '1 x 2 x 3 cm', '1 x 2 x 3 cm', 1.00, 'CHINA', '', '', '', '', '', '<1', 0.00, '1', '2', '3', '', '', '', '1730800035_48cf72aaa55f1f3832d0.png', '', '', '', '', '', '', 'pending', 'cipto', '2024-11-05 09:47:16', NULL, NULL, '2024-11-05 09:47:16', '2024-11-05 09:47:16'),
(95, 119, 'COSMOS', 'AC', 'SPLIT STANDARD', 'HVILAPN0132', 'KUNING', '0,75 PK', '', '', '', '', '', '', '', 8.00, '1 x 2 x 3 cm', '4 x 5 x 6 cm', 7.00, 'CHINA', 'R-32', '', '', '9', '<1', '<1', 4.30, '1', '2', '3', '', '', '', '1730875380_cb30c991f05b11fac62a.png', '', '', '', '', '', '', 'confirmed', 'Aoz0raSenpai', '2024-11-06 06:45:32', NULL, NULL, '2024-11-06 06:43:00', '2024-11-06 06:45:32'),
(96, 120, 'ELECTROLUX', 'TV', 'ANDROID', 'A90DWW9', 'KUNING', '', '', '', '1', '', '40 INCH', '', '', 13.00, '1 x 2 x 3 cm', '7 x 8 x 9 cm', 12.00, 'CHINA', '', '4 x 5 x 6 cm', '10 x 11', '', '', '2', 0.00, '1', '2', '3', '', '', '', '1730882028_e3f92399dd70ff70b564.png', '', '', '', '', '', '', 'pending', 'Aoz0raSenpai', '2024-11-06 08:33:49', NULL, NULL, '2024-11-06 08:21:59', '2024-11-06 08:33:49'),
(97, 121, 'ELECTROLUX', 'TV', 'ANALOG', 'A90DWW9', 'KUNING', '', '', '', '<1', '', '24 INCH', '', '', 13.00, '1 x 2 x 3 cm', '7 x 8 x 9 cm', 12.00, 'CHINA', '', '4 x 5 x 6 cm', '10 x 11', '', '', '2', 0.00, '1', '2', '3', '', '', '', '1730882309_2d2dbc06a1fb60073128.png', '', '', '', '', '', '', 'confirmed', 'Aoz0raSenpai', '2024-11-06 08:41:16', NULL, NULL, '2024-11-06 08:38:30', '2024-11-06 08:41:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_submissions`
--
ALTER TABLE `product_submissions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_submissions`
--
ALTER TABLE `product_submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
