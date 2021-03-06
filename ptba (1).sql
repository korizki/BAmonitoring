-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2022 at 12:47 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ptba`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_file`
--

CREATE TABLE `t_file` (
  `ID` int(11) NOT NULL,
  `DATE` date NOT NULL,
  `USER` varchar(100) NOT NULL,
  `FILE_NAME` varchar(100) NOT NULL,
  `DOC_TYPE` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_halangan`
--

CREATE TABLE `t_halangan` (
  `ID` int(4) NOT NULL,
  `POWER` text NOT NULL,
  `UNIT` text NOT NULL,
  `LOKASI` text NOT NULL,
  `GRUP` text NOT NULL,
  `START` datetime DEFAULT NULL,
  `END` datetime DEFAULT NULL,
  `TOTAL` decimal(4,2) NOT NULL,
  `PROBLEM` text NOT NULL,
  `ACTION_PROBLEM` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_halangan`
--

INSERT INTO `t_halangan` (`ID`, `POWER`, `UNIT`, `LOKASI`, `GRUP`, `START`, `END`, `TOTAL`, `PROBLEM`, `ACTION_PROBLEM`) VALUES
(24, '6 KV', 'CRU PIT-3', 'PIT-2', 'B', '2021-09-01 20:46:00', '2021-09-01 21:52:00', '1.10', 'Kabel Terlindas Dozer', 'Perbaikan Kabel'),
(25, '20 KV', 'CRU PIT-3', 'PIT-3', 'A', '2021-09-01 20:47:00', '2021-09-01 23:47:00', '3.00', 'Rawatan SSU ', 'Pengerjaan Penggantian Spare Part SSU'),
(26, '20 KV', 'CRU PIT-3', 'PIT-3', 'D', '2021-09-01 20:48:00', '2021-09-01 23:48:00', '3.00', 'Pengecekkan Kabel 20KV', 'Pengecekkan Hingga Kondisi Aman'),
(27, '20 KV', 'CRU PIT-3', 'PIT-3', 'D', '2021-09-01 20:48:00', '2021-09-01 23:48:00', '3.00', 'Pengecekkan Kabel 20KV', 'Pengecekkan Hingga Kondisi Aman'),
(28, '20 KV', 'All Unit', 'PIT-3', 'B', '2021-08-31 20:50:00', '2021-09-01 14:50:00', '18.00', 'Pengecekkan Agustus 1', 'Pengecekkan Hingga Clear 1'),
(29, '6 KV', 'CRU PIT-3', 'PIT-3', 'D', '2021-08-29 20:52:00', '2021-08-29 22:52:00', '2.00', 'Pengecekkan Agustus 2', 'Pengecekkan Hingga Clear 2'),
(30, '6 KV', 'All Unit', 'PIT-3', 'A', '2021-07-16 20:53:00', '2021-07-17 20:53:00', '24.00', 'Pengecekkan Juli 1', 'Pengecekkan Clear Juli 1'),
(31, '20 KV', 'All Unit', 'PIT-3', 'B', '2021-07-06 20:54:00', '2021-07-06 23:54:00', '3.00', 'Pengecekkan Juli 2', 'Pengecekkan Clear Juli 2'),
(32, '20 KV', 'CRU PIT-3', 'PIT-3', 'B', '2021-09-20 15:09:00', '2021-09-20 19:09:00', '4.00', 'Test Problem Tanggal 09 September 2021', 'Test Problem Tanggal 09 September 2021');

-- --------------------------------------------------------

--
-- Table structure for table `t_kabel`
--

CREATE TABLE `t_kabel` (
  `ID` int(11) NOT NULL,
  `SHOVEL` text NOT NULL,
  `KABEL` text NOT NULL,
  `PANJANG` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_kabel`
--

INSERT INTO `t_kabel` (`ID`, `SHOVEL`, `KABEL`, `PANJANG`) VALUES
(1, 'SE-3001', 'Kabel 3 x 35mm2', 350),
(2, 'SE-3001', 'Kabel 3 x 70mm2', 550),
(3, 'SE-3002', 'Kabel 3 x 70mm2', 200),
(4, 'SE-3002', 'Kabel 3 x 35mm2', 400),
(5, 'SE-3003', 'Kabel 3 x 70mm2', 600),
(6, 'SE-3003', 'Kabel 3 x 35mm2', 550),
(7, 'SE-3003', 'Kabel 3 x 50mm2', 400),
(8, 'SE-3004', 'Kabel 3 x 35mm2', 1000),
(9, 'SE-3005', 'Kabel 3 x 35mm2', 1250),
(10, 'SE-3006', 'Kabel 3 x 35mm2', 618),
(11, 'SE-3007', 'Kabel 3 x 35mm2', 718);

-- --------------------------------------------------------

--
-- Table structure for table `t_unit`
--

CREATE TABLE `t_unit` (
  `ID` int(11) NOT NULL,
  `NAMA_UNIT` text NOT NULL,
  `LOKASI` text NOT NULL,
  `KONDISI` text NOT NULL,
  `JALUR` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_unit`
--

INSERT INTO `t_unit` (`ID`, `NAMA_UNIT`, `LOKASI`, `KONDISI`, `JALUR`) VALUES
(1, 'CRU 01', 'PIT 3 Utara, Banko Barat', 'Ready', 'SE-3006'),
(2, 'CRU 02', 'PIT 3 Selatan, Banko Barat', 'Ready', 'SE-3004'),
(3, 'CRU 03', 'PIT 3 Selatan, Banko Barat', 'Ready', 'SE-3005'),
(4, 'CRU 04', 'PIT 2 (Front), Banko Barat', 'Breakdown', '-'),
(5, 'CRU 05', 'PIT 2 (Bintan) , Banko Barat', 'Breakdown', '-'),
(6, 'CRU 06', 'PIT 2 Banko Barat', 'Ready', 'SE-3003'),
(7, 'CRU 07', 'PIT 3 Utara, Banko Barat', 'Ready', '-'),
(8, 'SSU 01', 'Pit 3 Selatan, Banko Barat', 'Ready', '20KV Pit 3 Selatan'),
(9, 'SSU 02', 'Pit 2, Banko Barat', 'Ready', '20KV Pit 2'),
(10, 'TSU 01', 'Pit 2, Banko Barat', 'Ready', '-'),
(11, 'TSU 02', 'Pit 3 Selatan, Banko Barat', 'Ready', 'SE 3004 & SE 3005'),
(12, 'TSU 03', 'Pit 3 Utara, Banko Barat', 'Ready', '-'),
(13, 'TSU 04', 'Pit 3 Selatan, Banko Barat', 'Ready', 'SE 3007'),
(14, 'TSU 05', 'Pit 3 Utara, Banko Barat', 'Ready', 'SE 3006'),
(15, 'TSU 06', 'Pit 2, Banko Barat', 'Ready', 'SE 3002'),
(16, 'TSU 07', 'Pit 2, Banko Barat', 'Ready', 'SE 3001 & SE 3003');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `ID` int(11) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`ID`, `USERNAME`, `PASSWORD`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_file`
--
ALTER TABLE `t_file`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `t_halangan`
--
ALTER TABLE `t_halangan`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `t_kabel`
--
ALTER TABLE `t_kabel`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `t_unit`
--
ALTER TABLE `t_unit`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_file`
--
ALTER TABLE `t_file`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_halangan`
--
ALTER TABLE `t_halangan`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `t_kabel`
--
ALTER TABLE `t_kabel`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `t_unit`
--
ALTER TABLE `t_unit`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
