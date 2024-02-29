-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2024 at 01:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yaallah`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `kode_barang` varchar(50) DEFAULT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga`, `kode_barang`, `stok`) VALUES
(4, 'Manifesto: Day 1', 400000, 'A001', 30),
(5, 'Enhypen Lighstik', 800000, 'A002', 40),
(6, 'Dimension Dilemma', 300000, 'A003', 50),
(7, 'Sadame', 350000, 'A004', 60),
(8, 'Orange Blood', 200000, 'A005', 70),
(9, 'Dark Blood', 300000, 'A006', 80);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama`) VALUES
(1, 'admin'),
(2, 'kasir');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_waktu` datetime NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `total` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `tanggal_waktu`, `nomor`, `total`, `nama`, `bayar`, `kembali`) VALUES
(1, 0, '2024-02-23 09:33:30', '803279', 300000, 'sri rahayu', 400000, 100000),
(2, 0, '2024-02-23 10:09:35', '862893', 300000, 'sri rahayu', 400000, 100000),
(3, 0, '2024-02-23 10:11:43', '245398', 300000, 'sri rahayu', 400000, 100000),
(4, 0, '2024-02-23 13:12:58', '127927', 350000, 'sri rahayu', 400000, 50000),
(5, 0, '2019-03-19 06:06:06', '397564', 350000, 'sri rahayu', 350000, 0),
(6, 0, '2024-02-29 02:31:28', '424881', 400000, 'sri rahayu', 400000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id_transaksi_detail` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id_transaksi_detail`, `id_transaksi`, `id_barang`, `harga`, `qty`, `total`) VALUES
(1, 35, 3, 375000, 1, 375000),
(2, 36, 4, 300000, 1, 300000),
(3, 37, 3, 375000, 1, 375000),
(4, 38, 5, 350000, 1, 350000),
(5, 38, 10, 1352000, 1, 1352000),
(6, 39, 9, 307000, 1, 307000),
(7, 39, 8, 400000, 1, 400000),
(8, 40, 3, 375000, 1, 375000),
(9, 41, 4, 300000, 70, 21000000),
(10, 42, 15, 1000000, 5, 5000000),
(11, 43, 15, 1000000, 10, 10000000),
(12, 44, 7, 320000, 1, 320000),
(13, 45, 3, 375000, 1, 375000),
(14, 45, 8, 400000, 1, 400000),
(15, 46, 6, 400000, 1, 400000),
(16, 47, 7, 320000, 1, 320000),
(17, 48, 4, 300000, 1, 300000),
(18, 49, 20, 78000, 5, 390000),
(19, 50, 20, 78000, 1, 78000),
(20, 51, 8, 400000, 1, 400000),
(21, 52, 7, 320000, 1, 320000),
(22, 53, 8, 400000, 1, 400000),
(23, 54, 5, 350000, 1, 350000),
(24, 1, 4, 300000, 1, 300000),
(25, 2, 4, 300000, 1, 300000),
(26, 3, 4, 300000, 1, 300000),
(27, 4, 5, 350000, 1, 350000),
(28, 5, 5, 350000, 1, 350000),
(29, 6, 4, 400000, 1, 400000);

--
-- Triggers `transaksi_detail`
--
DELIMITER $$
CREATE TRIGGER `transaksi` AFTER INSERT ON `transaksi_detail` FOR EACH ROW BEGIN
UPDATE barang SET stok=stok-new.qty
WHERE id_barang= new.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `role_id`) VALUES
(1, 'admin', 'admin', 'admin', 1),
(2, 'sri rahayu', 'ayu', 'ayu', 2),
(24, 'a', 'a', 'a', 0),
(25, 'b', 'b', 'b', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id_transaksi_detail`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id_transaksi_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
