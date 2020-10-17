-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2020 at 03:02 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sman1grabag`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(11) NOT NULL,
  `NIS` varchar(15) NOT NULL,
  `id_tahun` int(4) NOT NULL,
  `id_semester` int(10) NOT NULL,
  `tanggal_presensi` date NOT NULL,
  `presensi` varchar(20) NOT NULL,
  `NIP` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `NIS`, `id_tahun`, `id_semester`, `tanggal_presensi`, `presensi`, `NIP`) VALUES
(7, '123337', 1, 2, '2020-01-26', 'Tanpa Keterangan', '000000000000007'),
(8, '123456', 1, 2, '2020-01-26', 'Hadir', '000000000000007'),
(9, '655554', 1, 2, '2020-01-26', 'Hadir', '000000000000007'),
(11, '123337', 1, 1, '2019-09-01', 'Ijin', '000000000000007'),
(12, '123456', 1, 1, '2019-09-01', 'Ijin', '000000000000007'),
(13, '655554', 1, 1, '2019-09-01', 'Hadir', '000000000000007'),
(14, '123337', 1, 2, '2020-01-25', 'Sakit', '000000000000007'),
(15, '123456', 1, 2, '2020-01-25', 'Hadir', '000000000000007'),
(16, '655554', 1, 2, '2020-01-25', 'Hadir', '000000000000007'),
(17, '655554', 2, 2, '2020-01-27', 'Ijin', '000000000000002'),
(18, '655554', 2, 1, '2020-11-25', 'Sakit', '000000000000002'),
(19, '123337', 1, 2, '2020-01-28', 'Hadir', '000000000000007'),
(20, '123456', 1, 2, '2020-01-28', 'Ijin', '000000000000007'),
(21, '655554', 1, 2, '2020-01-28', 'Hadir', '000000000000007'),
(22, '123337', 1, 2, '2020-01-30', 'Hadir', '000000000000007'),
(23, '123456', 1, 2, '2020-01-30', 'Ijin', '000000000000007'),
(24, '655554', 1, 2, '2020-01-30', 'Hadir', '000000000000007'),
(25, '123456', 1, 2, '2020-02-03', 'Hadir', '000000000000007'),
(26, '123456', 1, 2, '2020-02-02', 'Sakit', '000000000000007'),
(27, '123337', 1, 2, '2020-02-01', 'Hadir', '000000000000007'),
(28, '123456', 1, 2, '2020-02-01', 'Hadir', '000000000000007'),
(29, '655554', 1, 2, '2020-02-01', 'Hadir', '000000000000007'),
(30, '123456', 1, 2, '2020-02-05', 'Ijin', '000000000000007'),
(31, '666666666', 1, 2, '2020-02-05', 'Sakit', '000000000000007'),
(34, '123456', 1, 2, '2020-02-06', 'Hadir', '000000000000007_000000000000002'),
(35, '666666666', 1, 2, '2020-02-06', 'Hadir', '000000000000007_000000000000002');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `NIS` (`NIS`),
  ADD KEY `id_tahun` (`id_tahun`),
  ADD KEY `absensi_ibfk_4` (`id_semester`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`NIS`) REFERENCES `siswa` (`NIS`),
  ADD CONSTRAINT `absensi_ibfk_2` FOREIGN KEY (`id_tahun`) REFERENCES `tahun_ajaran` (`id_tahun`),
  ADD CONSTRAINT `absensi_ibfk_4` FOREIGN KEY (`id_semester`) REFERENCES `semester` (`id_semester`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
