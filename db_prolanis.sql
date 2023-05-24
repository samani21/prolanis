-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2023 at 07:37 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_prolanis`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bpjs` varchar(20) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `tgl_lahir` varchar(30) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `s_pasien` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pasien`
--

INSERT INTO `tb_pasien` (`id`, `nama`, `bpjs`, `nik`, `tgl_lahir`, `alamat`, `s_pasien`) VALUES
(35, 'sam\'ani', '8967796', '7896', '0067-08-09', 'jbasj', 1),
(36, 'Sai\'dah', 'hjkhbaskjd', '5687', '0008-05-06', '65', 1),
(37, 'asdbjk', '58', '675', '0077-07-06', '8675', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_porlanis`
--

CREATE TABLE `tb_porlanis` (
  `id_prolanis` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `tb` varchar(3) NOT NULL,
  `bb` varchar(3) NOT NULL,
  `bmi` varchar(10) NOT NULL,
  `perut` varchar(10) NOT NULL,
  `t_darah` varchar(10) NOT NULL,
  `tgl_pemeriksaan` varchar(30) NOT NULL,
  `gdp` varchar(20) NOT NULL,
  `cholest` varchar(20) NOT NULL,
  `ldl` varchar(20) NOT NULL,
  `hdl` varchar(20) NOT NULL,
  `trigliserida` varchar(20) NOT NULL,
  `f_ginjal` varchar(30) NOT NULL,
  `p_ulang` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `sts1` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_porlanis`
--

INSERT INTO `tb_porlanis` (`id_prolanis`, `id_pasien`, `tb`, `bb`, `bmi`, `perut`, `t_darah`, `tgl_pemeriksaan`, `gdp`, `cholest`, `ldl`, `hdl`, `trigliserida`, `f_ginjal`, `p_ulang`, `status`, `keterangan`, `sts1`) VALUES
(11, 35, '685', '867', 'bkhj', '7865', 'jbjkb', '24-05-2023', 'jkb', 'jk', 'bkj', 'v', 'hv', 'hjkvk', '24-11-2023', 'jhvbjkl', 'b', 0),
(12, 36, '100', '100', 'bnlj', '8', 'jk', '24-05-2023', 'bjk', 'bjk', 'bjl', 'njk', 'bkh', 'bhk', '24-11-2023', 'bhjk', 'vbhkj', 1),
(13, 36, '12', '12', '78', '5867', '585', '24-05-2023', '89756', '785', '9', '976', '876', '87', '24-11-2023', '5867', '5', 1),
(14, 37, '11', '11', 'hgjv', '6875', '675867', '24-05-2023', 'ghkjb', 'hkjbv', 'hv', 'jhvh', 'vhj', 'vhjk', '23-05-2023', 'vhkj', 'v', 0),
(15, 36, '879', '68', 'kjb', '7', '67', '24-05-2023', 'jb', 'jb', 'jkb', 'jkgb', 'kjhvb', 'hjv', '24-05-2023', 'hjv', 'hjvh', 0),
(16, 37, '76', '23', '5', '587', '5687', '24-05-2023', '567', '567', '5687', 'yhgv', 'hjkvbk', 'hb', '24-11-2023', 'khjb', 'jklbjkl', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_porlanis`
--
ALTER TABLE `tb_porlanis`
  ADD PRIMARY KEY (`id_prolanis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tb_porlanis`
--
ALTER TABLE `tb_porlanis`
  MODIFY `id_prolanis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
