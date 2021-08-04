-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 04, 2021 at 09:11 AM
-- Server version: 10.2.39-MariaDB-log-cll-lve
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tkacom_peternakan_annisa`
--

-- --------------------------------------------------------

--
-- Table structure for table `kondisi_kandang`
--

CREATE TABLE `kondisi_kandang` (
  `id` int(11) NOT NULL,
  `kd_peternak` varchar(100) NOT NULL,
  `tgl` date NOT NULL,
  `waktu` time NOT NULL,
  `suhu_1` smallint(6) NOT NULL,
  `kelembapan_1` smallint(6) NOT NULL,
  `suhu_2` smallint(6) NOT NULL,
  `kelembapan_2` smallint(6) NOT NULL,
  `suhu_3` smallint(6) NOT NULL,
  `kelembapan_3` smallint(6) NOT NULL,
  `jml_ayam` int(11) NOT NULL,
  `foto_ayam` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kondisi_kandang`
--

INSERT INTO `kondisi_kandang` (`id`, `kd_peternak`, `tgl`, `waktu`, `suhu_1`, `kelembapan_1`, `suhu_2`, `kelembapan_2`, `suhu_3`, `kelembapan_3`, `jml_ayam`, `foto_ayam`) VALUES
(1, 'anto', '2016-01-20', '07:00:00', 28, 80, 29, 80, 28, 80, 3000, 'img/kandangayam1.jpeg'),
(2, 'anto', '2016-01-20', '09:00:00', 29, 70, 26, 70, 29, 70, 3000, 'img/kandangayam2.jpg'),
(3, 'anto', '2016-01-20', '20:00:00', 29, 80, 28, 80, 29, 80, 2500, 'img/kandangayam3.jpg'),
(4, 'anto', '2016-01-21', '08:00:00', 27, 65, 27, 65, 27, 65, 2500, 'img/kandangayam4.jpg'),
(5, 'anto', '2016-01-22', '08:00:00', 26, 70, 26, 70, 26, 70, 2000, 'img/kandangayam5.jpg'),
(6, 'anto', '2016-01-23', '08:00:00', 27, 66, 27, 66, 27, 66, 1200, 'img/kandangayam6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_login`
--

CREATE TABLE `tabel_login` (
  `id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(400) NOT NULL,
  `id_grup` varchar(100) NOT NULL,
  `nama` text NOT NULL,
  `alamat` text NOT NULL,
  `kota` text NOT NULL,
  `tlp` decimal(20,0) NOT NULL,
  `email` text NOT NULL,
  `last_login` datetime NOT NULL,
  `create_login` datetime NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_login`
--

INSERT INTO `tabel_login` (`id`, `user`, `pass`, `id_grup`, `nama`, `alamat`, `kota`, `tlp`, `email`, `last_login`, `create_login`, `stok`, `harga`) VALUES
(3, 'budi', '4e5668ae44d828956df765dab5b9a6f8', 'penjual', 'Budi Luhur', 'Jl. Gang Ayam No. 23', 'Kudus', '8545678980', 'budiluhur@gmail.com', '2016-01-22 02:25:21', '2015-12-20 19:20:43', 100, 100000),
(6, 'tukul', '5f7d68ae44d828956df765dab5b9a6f8', 'peternak', 'Tukul Ayam', 'Jl. Ayam Boiler No. 2', 'Pati', '8885788901', 'tukul_ayam@gmail.com', '2016-01-23 09:15:00', '2015-11-05 18:11:33', 100, 25000),
(7, 'anto', 'df3e68ae44d828956df765dab5b9a6f8', 'peternak', 'Anto Ayam', 'Jl. Ayam Jago No.1', 'Semarang', '8132546789', 'anto_ayam@gmail.com', '2016-01-23 08:05:00', '2015-12-10 19:10:23', 1200, 30000),
(12, 'admin', '12345', 'admin', 'admin', 'admin', 'admin', '89669298587', 'annisania70@gmail.com', '2021-07-03 13:50:01', '2021-07-03 13:50:01', 0, 0),
(13, 'peternak', '12345', 'peternak', 'Lucas', 'Jl. Ayam Berkokok', 'Semarang', '81234567890', 'lucasayam@gmail.com', '2021-07-11 04:02:18', '2021-07-11 04:02:18', 1200, 25000),
(14, 'penjual', '12345', 'penjual', 'Sam', 'Jl. Telur Ayam', 'Kudus', '88899997777', 'samayam@gmail.com', '2021-07-11 04:04:37', '2021-07-11 04:04:37', 200, 30000);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_transaksi`
--

CREATE TABLE `tabel_transaksi` (
  `id` int(11) NOT NULL,
  `kd_peternak` varchar(100) NOT NULL,
  `kd_penjual` varchar(100) NOT NULL,
  `tgl` date NOT NULL,
  `waktu` time NOT NULL,
  `jml` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_transaksi`
--

INSERT INTO `tabel_transaksi` (`id`, `kd_peternak`, `kd_penjual`, `tgl`, `waktu`, `jml`, `harga`, `total`) VALUES
(1, 'anto', 'ryan', '2016-01-20', '10:00:00', 500, 30000, 15000000),
(2, 'anto', 'budi', '2016-01-21', '17:23:50', 500, 30000, 15000000),
(3, 'anto', 'budi', '2016-01-22', '12:05:34', 800, 29000, 23200000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kondisi_kandang`
--
ALTER TABLE `kondisi_kandang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_login`
--
ALTER TABLE `tabel_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_transaksi`
--
ALTER TABLE `tabel_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kondisi_kandang`
--
ALTER TABLE `kondisi_kandang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tabel_login`
--
ALTER TABLE `tabel_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tabel_transaksi`
--
ALTER TABLE `tabel_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
