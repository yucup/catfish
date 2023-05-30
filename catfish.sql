-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2023 at 03:08 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catfish`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `alamat_admin` varchar(100) NOT NULL,
  `tgl_admin` date NOT NULL,
  `password_admin` varchar(100) NOT NULL,
  `foto_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `alamat_admin`, `tgl_admin`, `password_admin`, `foto_admin`) VALUES
(5, 'ridwan', 'klame', '2023-05-09', '123', '');

-- --------------------------------------------------------

--
-- Table structure for table `karung`
--

CREATE TABLE `karung` (
  `id_karung` int(11) NOT NULL,
  `kolam_satu` int(11) NOT NULL,
  `kolam_dua` int(11) NOT NULL,
  `kolam_tiga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `modal`
--

CREATE TABLE `modal` (
  `id_modal` int(11) NOT NULL,
  `modal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `modal`
--

INSERT INTO `modal` (`id_modal`, `modal`) VALUES
(1, 10000000);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_produk` int(100) NOT NULL,
  `jumlah_penjualan` int(11) NOT NULL,
  `harga_penjualan` int(11) NOT NULL,
  `harga_total_penjualan` int(11) NOT NULL,
  `tgl_penjualan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_produk`, `jumlah_penjualan`, `harga_penjualan`, `harga_total_penjualan`, `tgl_penjualan`) VALUES
(51, 20, 10, 19000, 190000, '2023-03-14'),
(52, 20, 19, 19000, 361000, '2023-03-20'),
(53, 20, 10, 19000, 190000, '2023-03-22'),
(54, 20, 1, 19000, 19000, '2023-03-23'),
(55, 20, 114, 19000, 2166000, '2023-03-26'),
(56, 20, 79, 19000, 1501000, '2023-04-10'),
(57, 20, 11, 19000, 209000, '2023-04-20'),
(58, 20, 46, 19000, 874000, '2023-04-13'),
(59, 21, 37, 20000, 740000, '2023-04-26');

-- --------------------------------------------------------

--
-- Table structure for table `perlengkapan`
--

CREATE TABLE `perlengkapan` (
  `id_perlengkapan` int(11) NOT NULL,
  `nama_perlengkapan` varchar(100) NOT NULL,
  `jumlah_perlengkapan` int(11) NOT NULL,
  `harga_perlengkapan` int(11) NOT NULL,
  `harga_total_perlengkapan` int(11) NOT NULL,
  `tgl_perlengkapan` date NOT NULL,
  `foto_perlengkapan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perlengkapan`
--

INSERT INTO `perlengkapan` (`id_perlengkapan`, `nama_perlengkapan`, `jumlah_perlengkapan`, `harga_perlengkapan`, `harga_total_perlengkapan`, `tgl_perlengkapan`, `foto_perlengkapan`) VALUES
(18, 'Pel', 1, 16000, 16000, '2023-03-20', ''),
(19, 'Sikat', 1, 16000, 16000, '2023-03-20', ''),
(20, 'baskom', 1, 15000, 15000, '2023-03-20', ''),
(21, 'bak komal', 2, 31000, 62000, '2023-03-20', 'telang.jpg'),
(22, 'gelas ukur', 1, 14000, 14000, '2023-03-20', ''),
(23, 'Papan tulis', 1, 60000, 60000, '2023-03-20', ''),
(24, 'Spidol', 1, 8000, 8000, '2023-03-20', ''),
(25, 'Pelet', 1, 373000, 373000, '2023-04-17', ''),
(26, 'Pelet', 11, 373000, 4103000, '2023-04-27', 'telang.jpg'),
(27, 'katul', 1, 110000, 110000, '2023-04-27', ''),
(28, 'Onicat adult', 1, 20000, 20000, '2023-04-27', ''),
(29, 'life cat', 2, 5500, 11000, '2023-04-27', '');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `modal` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `kolam_produk` int(11) NOT NULL,
  `karung_produk` int(11) NOT NULL,
  `foto_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `modal`, `nama_produk`, `jumlah_produk`, `harga_produk`, `kolam_produk`, `karung_produk`, `foto_produk`) VALUES
(20, 0, 'lele biasa', 100, 19000, 1, 12, 'masjid mohammed bin zeyd1.jpg'),
(21, 0, 'lele lebaran', 100, 20000, 2, 4, 'ubi.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `karung`
--
ALTER TABLE `karung`
  ADD PRIMARY KEY (`id_karung`);

--
-- Indexes for table `modal`
--
ALTER TABLE `modal`
  ADD PRIMARY KEY (`id_modal`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `perlengkapan`
--
ALTER TABLE `perlengkapan`
  ADD PRIMARY KEY (`id_perlengkapan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `karung`
--
ALTER TABLE `karung`
  MODIFY `id_karung` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modal`
--
ALTER TABLE `modal`
  MODIFY `id_modal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `perlengkapan`
--
ALTER TABLE `perlengkapan`
  MODIFY `id_perlengkapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
