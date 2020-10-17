-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2020 at 04:20 PM
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
  `tanggal_presensi` date NOT NULL,
  `presensi` varchar(20) NOT NULL,
  `NIP` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `NIS`, `id_tahun`, `tanggal_presensi`, `presensi`, `NIP`) VALUES
(1, '123337', 1, '2020-01-24', 'Hadir', '000000000000007'),
(2, '123456', 1, '2020-01-24', 'Sakit', '000000000000007'),
(3, '655554', 1, '2020-01-24', 'Sakit', '000000000000007'),
(4, '123337', 1, '2020-01-25', 'Tanpa Keterangan', '000000000000007'),
(5, '123456', 1, '2020-01-25', 'Sakit', '000000000000007'),
(6, '655554', 1, '2020-01-25', 'Ijin', '000000000000007');

-- --------------------------------------------------------

--
-- Table structure for table `anggota_kelas`
--

CREATE TABLE `anggota_kelas` (
  `id_wali_kelas` int(11) NOT NULL,
  `NIS` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota_kelas`
--

INSERT INTO `anggota_kelas` (`id_wali_kelas`, `NIS`) VALUES
(7, '655554'),
(9, '123337'),
(9, '123456'),
(9, '655554'),
(11, '655554');

-- --------------------------------------------------------

--
-- Table structure for table `bulan`
--

CREATE TABLE `bulan` (
  `id_bulan` int(2) NOT NULL,
  `nama_bulan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bulan`
--

INSERT INTO `bulan` (`id_bulan`, `nama_bulan`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Desember'),
(6, 'Mei'),
(7, 'Juni'),
(8, 'Juli'),
(9, 'Agustus'),
(10, 'September'),
(11, 'Oktober'),
(12, 'November');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Admin'),
(2, 'Guru'),
(3, 'Kepala Sekolah'),
(4, 'Staf Tata Usaha');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(2) NOT NULL,
  `nama_kelas` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, 'X-BAHASA-1'),
(2, 'X-IPA-1'),
(3, 'X-IPA-2'),
(4, 'X-IPA-3'),
(5, 'X-IPA-4'),
(6, 'X-IPA-5'),
(7, 'X-IPS-1'),
(8, 'X-IPS-2'),
(9, 'X-IPS-3'),
(10, 'X-IPS-4'),
(11, 'X-IPS-5'),
(12, 'XI-BAHASA-1'),
(13, 'XI-IPA-1'),
(14, 'XI-IPA-2'),
(15, 'XI-IPA-3'),
(16, 'XI-IPA-4'),
(17, 'XI-IPA-5'),
(18, 'XI-IPS-1'),
(19, 'XI-IPS-2'),
(20, 'XI-IPS-3'),
(21, 'XI-IPS-4'),
(22, 'XI-IPS-5'),
(23, 'XII-BAHASA-1'),
(24, 'XII-IPA-1'),
(25, 'XII-IPA-2'),
(26, 'XII-IPA-3'),
(27, 'XII-IPA-4'),
(28, 'XII-IPA-5'),
(29, 'XII-IPS-1'),
(30, 'XII-IPS-2'),
(31, 'XII-IPS-3'),
(32, 'XII-IPS-4'),
(33, 'XII-IPS-5');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(2) NOT NULL,
  `nama_mapel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`) VALUES
(2, 'Bahasa Inggris'),
(4, 'Bahasa Jawa'),
(8, 'biologi'),
(11, 'kimia'),
(12, 'sosiologi'),
(14, 'Matematika');

-- --------------------------------------------------------

--
-- Table structure for table `mastertabelbiaya`
--

CREATE TABLE `mastertabelbiaya` (
  `id_biaya` int(3) NOT NULL,
  `jenis_biaya` varchar(50) NOT NULL,
  `nominal` int(10) NOT NULL,
  `nominal_potongan` int(10) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mastertabelbiaya`
--

INSERT INTO `mastertabelbiaya` (`id_biaya`, `jenis_biaya`, `nominal`, `nominal_potongan`, `keterangan`) VALUES
(1, 'iuran bulanan', 150000, 0, ''),
(2, 'tabungan', 20000, 0, ''),
(8, 'Kas', 5000, 0, ''),
(9, 'Piknik', 30000, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `NIP` varchar(15) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `id_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`NIP`, `nama_pegawai`, `alamat`, `email`, `password`, `status`, `foto`, `id_jabatan`) VALUES
('000000000000001', 'Elsa Dwi Okta Saputri', 'Jalan Gondang Raya No. 34 Tembalang, Semarang', '2oktaelsa@gmail.com', 'b3f22c3c98219c4b9f85276dea1f9505', 'Aktif', 'logo-user.png', 1),
('000000000000002', 'Nadisa Gauri Indrajaya', 'Jalan Raya Grabag Kopeng', 'nadisul@gmail.com', 'd63ede165fb6d7337883bed290f721b7', 'Aktif', 'pasfoto1.jpg', 2),
('000000000000003', 'Defina Yasmin Tuffahatti', 'Kabupaten Semarang', 'definayasmint@student.undip.ac.id', 'ac43724f16e9241d990427ab7c8f4228', 'Aktif', 'DSC_5006.jpg', 3),
('000000000000004', 'Admin', 'Kabupaten Semarang', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'Aktif', '', 1),
('000000000000007', 'Dwi Okta Elsa', 'Rumah', 'elsadwi@gmail.com', '783833680e6da5cf6cd7481a44d8fa4c', 'Aktif', 'pasfoto.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pengajar`
--

CREATE TABLE `pengajar` (
  `id_pengajar` int(11) NOT NULL,
  `NIP` varchar(15) NOT NULL,
  `id_kelas` int(2) NOT NULL,
  `id_mapel` int(2) NOT NULL,
  `id_tahun` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajar`
--

INSERT INTO `pengajar` (`id_pengajar`, `NIP`, `id_kelas`, `id_mapel`, `id_tahun`) VALUES
(6, '000000000000002', 1, 2, 3),
(7, '000000000000003', 3, 11, 2),
(8, '000000000000003', 2, 14, 1),
(9, '000000000000003', 3, 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id_semester` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id_semester`) VALUES
('Ganjil'),
('Genap');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `NIS` varchar(15) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status_siswa` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`NIS`, `nama_siswa`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `foto`, `status_siswa`) VALUES
('123337', 'Ayaya', 'Sunda', '2002-09-09', 'P', 'mangkang', 'LOGO_FIRST_PLAY_1.png', 'Keluar'),
('123456', 'Defina YT', 'Ungaran', '2004-11-09', 'P', 'Kota Magelang', 'pasfoto1.jpg', 'Aktif'),
('655554', 'Mufid', 'Mangkang', '2002-10-08', 'L', 'mangkang', '946903_521628801207186_885252321_n_png.jpg', 'Lulus'),
('666666666', 'sadwiels', 'grabag', '2003-12-16', 'L', 'Jalan Raya Grabag Kopengsari', 'profil2.jpg', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `no_transaksi` int(11) NOT NULL,
  `NIS` varchar(15) NOT NULL,
  `id_bulan` int(2) NOT NULL,
  `id_tahun` int(4) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `NIP` varchar(15) NOT NULL,
  `status_pembayaran` varchar(20) NOT NULL,
  `nominal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`no_transaksi`, `NIS`, `id_bulan`, `id_tahun`, `tanggal_bayar`, `NIP`, `status_pembayaran`, `nominal`) VALUES
(11, '123456', 1, 1, '2020-01-23', '000000000000007', 'lunas', 150000),
(12, '123456', 2, 1, '2020-01-23', '000000000000007', 'lunas', 150000),
(13, '123456', 3, 1, '2020-01-23', '000000000000007', 'lunas', 150000),
(14, '123456', 7, 1, '2020-01-23', '000000000000007', 'lunas', 150000),
(15, '123456', 4, 1, '2020-01-23', '000000000000007', 'lunas', 150000),
(16, '123456', 6, 1, '2020-01-23', '000000000000007', 'lunas', 150000),
(17, '123456', 8, 1, '2020-01-23', '000000000000007', 'lunas', 150000),
(18, '123456', 9, 1, '2020-01-23', '000000000000007', 'lunas', 150000),
(19, '123456', 10, 1, '2020-01-23', '000000000000007', 'lunas', 150000),
(20, '666666666', 1, 1, '2020-01-23', '000000000000007', 'lunas', 150000);

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id_tahun` int(4) NOT NULL,
  `tahun` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id_tahun`, `tahun`) VALUES
(1, '2019/2020'),
(2, '2020/2021'),
(3, '2021/2022'),
(4, '2022/2023'),
(5, '2023/2024');

-- --------------------------------------------------------

--
-- Table structure for table `wali_kelas`
--

CREATE TABLE `wali_kelas` (
  `id_wali_kelas` int(11) NOT NULL,
  `NIP` varchar(15) NOT NULL,
  `id_kelas` int(2) NOT NULL,
  `id_tahun` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wali_kelas`
--

INSERT INTO `wali_kelas` (`id_wali_kelas`, `NIP`, `id_kelas`, `id_tahun`) VALUES
(9, '000000000000002', 1, 1),
(4, '000000000000002', 2, 5),
(7, '000000000000002', 23, 1),
(11, '000000000000003', 1, 2),
(12, '000000000000003', 2, 5);

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
  ADD KEY `NIP` (`NIP`);

--
-- Indexes for table `anggota_kelas`
--
ALTER TABLE `anggota_kelas`
  ADD PRIMARY KEY (`id_wali_kelas`,`NIS`),
  ADD KEY `NIS` (`NIS`);

--
-- Indexes for table `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`id_bulan`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `mastertabelbiaya`
--
ALTER TABLE `mastertabelbiaya`
  ADD PRIMARY KEY (`id_biaya`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`NIP`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`id_pengajar`),
  ADD KEY `NIP` (`NIP`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `pengajar_ibfk_3` (`id_mapel`),
  ADD KEY `id_tahun` (`id_tahun`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id_semester`(5));

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`NIS`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`no_transaksi`),
  ADD KEY `NIP` (`NIP`),
  ADD KEY `id_bulan` (`id_bulan`),
  ADD KEY `id_tahun` (`id_tahun`),
  ADD KEY `NIS` (`NIS`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indexes for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD PRIMARY KEY (`id_wali_kelas`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_tahun` (`id_tahun`),
  ADD KEY `kelas` (`NIP`,`id_kelas`,`id_tahun`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bulan`
--
ALTER TABLE `bulan`
  MODIFY `id_bulan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mastertabelbiaya`
--
ALTER TABLE `mastertabelbiaya`
  MODIFY `id_biaya` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pengajar`
--
ALTER TABLE `pengajar`
  MODIFY `id_pengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `no_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id_tahun` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  MODIFY `id_wali_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`NIS`) REFERENCES `siswa` (`NIS`),
  ADD CONSTRAINT `absensi_ibfk_2` FOREIGN KEY (`id_tahun`) REFERENCES `tahun_ajaran` (`id_tahun`),
  ADD CONSTRAINT `absensi_ibfk_3` FOREIGN KEY (`NIP`) REFERENCES `pegawai` (`NIP`);

--
-- Constraints for table `anggota_kelas`
--
ALTER TABLE `anggota_kelas`
  ADD CONSTRAINT `anggota_kelas_ibfk_1` FOREIGN KEY (`id_wali_kelas`) REFERENCES `wali_kelas` (`id_wali_kelas`),
  ADD CONSTRAINT `anggota_kelas_ibfk_2` FOREIGN KEY (`NIS`) REFERENCES `siswa` (`NIS`);

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`);

--
-- Constraints for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD CONSTRAINT `pengajar_ibfk_1` FOREIGN KEY (`NIP`) REFERENCES `pegawai` (`NIP`),
  ADD CONSTRAINT `pengajar_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `pengajar_ibfk_3` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`),
  ADD CONSTRAINT `pengajar_ibfk_4` FOREIGN KEY (`id_tahun`) REFERENCES `tahun_ajaran` (`id_tahun`);

--
-- Constraints for table `spp`
--
ALTER TABLE `spp`
  ADD CONSTRAINT `spp_ibfk_1` FOREIGN KEY (`NIP`) REFERENCES `pegawai` (`NIP`),
  ADD CONSTRAINT `spp_ibfk_2` FOREIGN KEY (`id_bulan`) REFERENCES `bulan` (`id_bulan`),
  ADD CONSTRAINT `spp_ibfk_3` FOREIGN KEY (`id_tahun`) REFERENCES `tahun_ajaran` (`id_tahun`),
  ADD CONSTRAINT `spp_ibfk_4` FOREIGN KEY (`NIS`) REFERENCES `siswa` (`NIS`);

--
-- Constraints for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD CONSTRAINT `wali_kelas_ibfk_1` FOREIGN KEY (`NIP`) REFERENCES `pegawai` (`NIP`),
  ADD CONSTRAINT `wali_kelas_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `wali_kelas_ibfk_3` FOREIGN KEY (`id_tahun`) REFERENCES `tahun_ajaran` (`id_tahun`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
