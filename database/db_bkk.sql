-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2024 at 08:26 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bkk`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_perusahaan`
--

CREATE TABLE `data_perusahaan` (
  `id` int(30) NOT NULL,
  `nama_perusahaan` varchar(100) DEFAULT NULL,
  `nama_hrd` varchar(100) DEFAULT NULL,
  `telepon_hrd` varchar(50) DEFAULT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `alamat_perusahaan` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_perusahaan`
--

INSERT INTO `data_perusahaan` (`id`, `nama_perusahaan`, `nama_hrd`, `telepon_hrd`, `nik`, `alamat_perusahaan`, `email`) VALUES
(1, 'PT Bringin Gigantara', 'Ariyal Zarhan', '082112071288', '737110696969', 'Jakarta Selatan', 'falenikospreigratis@yahoo.com'),
(2, 'PT Astra Metal', 'Faleniko Wowontoro', '12345', '234567', 'Cikarang Barat', 'akunakspreigratis@yahoo.com'),
(3, 'CV Trireka', 'Muhammad Fatur Imaniaji', '0821234567', '3456789', 'Perumahan Danau Duta', 'trireka@fatur.com');

-- --------------------------------------------------------

--
-- Table structure for table `data_siswa`
--

CREATE TABLE `data_siswa` (
  `id` int(30) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `tb` varchar(5) DEFAULT NULL,
  `bb` varchar(50) DEFAULT NULL,
  `pendidikan_terakhir` varchar(50) DEFAULT NULL,
  `foto_pas` varchar(500) NOT NULL,
  `foto_ijazah` varchar(500) NOT NULL,
  `foto_sk_kerja` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_siswa`
--

INSERT INTO `data_siswa` (`id`, `nama`, `alamat`, `tb`, `bb`, `pendidikan_terakhir`, `foto_pas`, `foto_ijazah`, `foto_sk_kerja`) VALUES
(6, 'Faleniko Mubintoro', 'Perumahan Wisma Asri', '180', '75', 'SMK Negeri 1 Jomokerto', '', '', ''),
(7, 'Ariyal Zarhan Ikhlas Haryanto', 'Perumahan Pesona Anggrek', '180', '75', 'SMK Negeri 5 Kota Bekasi', '', '', ''),
(8, 'Muhammad Atallah', 'Perumahan Wisma Asri', '175', '76', 'SMK Negeri 5 Kota Bekasi', '', '', ''),
(9, 'Bryllent Arcielio Lim', 'Perumahan Wisma Asri', '176', '65', 'SMK Negeri 1 Jomokerto', '', '', ''),
(10, 'Sprei Gratis', 'Perumahan Wisma Asri', '123', '456', 'SMK Negeri 5 Kota Bekasi', '1728281126_2024-09-07_22_36_18.png', '1728281126_2024-09-15_13_19_10.png', '1728281126_2024-09-07_23_48_12.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin_bkk', '47b7dd29668b37731110543945aa1e9d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_perusahaan`
--
ALTER TABLE `data_perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_perusahaan`
--
ALTER TABLE `data_perusahaan`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
