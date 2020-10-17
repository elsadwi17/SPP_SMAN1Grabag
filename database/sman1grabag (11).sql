-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2020 at 01:41 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

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

-- --------------------------------------------------------

--
-- Table structure for table `anggota_kelas`
--

CREATE TABLE `anggota_kelas` (
  `id_wali_kelas` int(11) NOT NULL,
  `NIS` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `beasiswa`
--

CREATE TABLE `beasiswa` (
  `id_beasiswa` int(11) NOT NULL,
  `nama_beasiswa` varchar(50) NOT NULL,
  `nominal_beasiswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

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
(7, 'X-IPS-1'),
(8, 'X-IPS-2'),
(9, 'X-IPS-3'),
(10, 'X-IPS-4'),
(12, 'XI-BAHASA-1'),
(13, 'XI-IPA-1'),
(14, 'XI-IPA-2'),
(15, 'XI-IPA-3'),
(16, 'XI-IPA-4'),
(18, 'XI-IPS-1'),
(19, 'XI-IPS-2'),
(20, 'XI-IPS-3'),
(21, 'XI-IPS-4'),
(23, 'XII-BAHASA-1'),
(24, 'XII-IPA-1'),
(25, 'XII-IPA-2'),
(26, 'XII-IPA-3'),
(27, 'XII-IPA-4'),
(29, 'XII-IPS-1'),
(30, 'XII-IPS-2'),
(31, 'XII-IPS-3'),
(32, 'XII-IPS-4');

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
(14, 'Matematika'),
(15, 'Biologi'),
(16, 'Bahasa Indonesia'),
(17, 'Bahasa Prancis'),
(18, 'Bimbingan Konseling'),
(19, 'Kimia'),
(20, 'Olahraga'),
(21, 'Fisika'),
(22, 'Geografi'),
(23, 'Ekonomi'),
(24, 'Pendidikan Agama Islam'),
(25, 'Pendidikan Kewarganegaraan'),
(26, 'Sejarah'),
(27, 'Seni Musik'),
(28, 'Sosiologi'),
(29, 'Teknologi Ilmu Komunikasi'),
(30, 'Seni Tari'),
(31, 'Seni Rupa');

-- --------------------------------------------------------

--
-- Table structure for table `mastertabelbiaya`
--

CREATE TABLE `mastertabelbiaya` (
  `id_biaya` int(3) NOT NULL,
  `jenis_biaya` varchar(50) NOT NULL,
  `nominal` int(10) NOT NULL,
  `tahun_masuk` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mastertabelbiaya`
--

INSERT INTO `mastertabelbiaya` (`id_biaya`, `jenis_biaya`, `nominal`, `tahun_masuk`) VALUES
(1, 'Sumbangan Pembinaan Pendidikan 2018', 170000, 2018),
(10, 'Sumbangan Pembinaan Pendidikan 2017', 160000, 2017),
(11, 'Sumbangan Pembinaan Pendidikan 2019', 200000, 2019);

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
('000000000000004', 'Admin', 'Kabupaten Semarang', 'admin@admin.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', 'logo-user.png', 1),
('111111111111110', 'Anggoro Buana Praja Murti', 'Semalen RT 02 / RW 01 Ngadirojo Secang', 'AnggoroBuanaPrajaMurti@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('111111111111111', 'Avesina Akbar ', 'Sawahan RT 3 / RW 2 Grabag ', 'AvesinaAkbar@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('111111111111112', 'Danang Alih Prasetyo', 'Perumnas Susukan RT 05 / RW 02 Grabag', 'DanangAlihPrasetyo@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('111111111111113', 'Enny Sri Haryani', 'Perumnas No 51 RT 04 / RW 1 Susukan Grabag', 'EnnySriHaryani@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('111111111111114', 'Fitri Rahmaningrum ', 'Asrama Yon Armed 11 RT 08 / RW 5 Gelangan Magelang Selatan', 'FitriRahmaningrum@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('111111111111115', 'Hanum Jazimah Puji Astuti', 'Krajan I RT 07 / RW 02 Grabag', 'HanumJazimahPujiAstuti@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('111111111111116', 'Hapsari Novita Ruriyanti', 'Kayupuring Lor RT 3 / RW 14 Banyusari Grabag', 'HapsariNovitaRuriyanti@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('111111111111117', 'Herlina Milatina Khumairoh', 'Kemantren Ngabean Secang', 'HerlinaMilatinaKhumairoh@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('111111111111118', 'Imanti Vita Febriyani', 'Lokomotif No 2 RT 31 / RW 12 Jlodran Jambewangi Secang', 'ImantiVitaFebriyani@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('111111111111119', 'Manteb Raharja', 'Susukan Barat RT 01 / RW 05 Grabag', 'mantebraharja@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('111111111111120', 'Muhammad Rizkayussro', 'Kulon RT 03 / RW 01 Sampangan Bumirejo Kaliangkrik', 'muhammadrizkayussro@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('111111111111121', 'Nur Utami ', 'Dusun Susukan RT 02 / RW 01 Grabag ', 'NurUtami@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('111111111111122', 'Nurma Ika Pratiwi', 'Bengkal RT 02 / RW 01 Kranggan ', 'NurmaIkaPratiwi@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('111111111111123', 'Wiwiek Wahyu Widyawati', 'Krajan No 37 RT 02 / RW 01  Tegalrejo Magelang', 'WiwiekWahyuWidyawati@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('111111111111124', 'Yohan Arifianto', 'Kauman RT 04 / RW 01 Sukorejo', 'YohanArifianto@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('111111111111125', 'Tri Haryani', 'Susukan RT 04 / RW 01 Grabag', 'triharyani@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', 'logo-user.png', 4),
('195802251982031', 'Badrus Salam', 'Krincing RT 14 / RW 6 Secang', 'BadrusSalam@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('196009171983032', 'Elli Iriana ', 'Sandang Saru No 83 RT 01 / RW 08 Madyocondro Secang', 'ElliIriana@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('196102072014061', 'Masdar', 'Susukan RT 04 / RW 01 Grabag ', 'masdar@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('196103231985011', 'Muh Baiquni', 'Ngasinan RT 01 / RW 01 Grabag', 'muhbaiquni@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 3),
('196111021984051', 'Bahrodin', 'Pagutan RT 02 / RW 7 Dlimas Tegalrejo', 'Bahrodin@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('196204111987032', 'Faizah Indah Wahyuningjati', 'Perumnas 40 RT 05 / RW 02 Susukan Grabag', 'FaizahIndahWahyuningjati@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('196208131986032', 'Ristina ', 'Gowak RT 05 / RW 02 Grabag', 'Ristina@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('196402061989031', 'Supriyanto', 'Grogol RT 10 / RW 03 Giriwetan Grabag', 'Supriyanto@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('196403171988031', 'Suwandi', 'Perum Sukarno Hatta RT 05 / RW 21 Canguk', 'Suwandi@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('196410101986012', 'Wartini', 'Jalan Telaga Bleder 14 RT 01 / RW 01 Tegalrandu Grabag', 'Wartini@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('196507082003121', 'Purwandi', 'Perumnas RT 05 / RW 02 Grabag', 'Purwandi@gmail.com', 'c12a9c7c6f2228219614d722c55e7f3b', 'Aktif', '', 2),
('196508301990032', 'Ester Reni Sawitri ', 'Perum Depkes Blok A7 No 2 RT 4 / RW 5 Kramat Utara Magelang Utara', 'EsterReniSawitri@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('196512281990012', 'Kristina Wahyu Widyastuti', 'Sandangsari RT 02 / RW 08 Madyocondro Secang', 'KristinaWahyuWidyastuti@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('196603131989011', 'Bambang Budi Yuwono', 'Krajan II RT 02 / RW 01  Grabag', 'BambangBudiYuwono@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('196611062007012', 'Noviana Tri Wahyu Widayanti', 'Jalan A. Yani Gang Progo 1 No 4 RT 06 / RW 03 Ringinanom Kramat Selatan', 'NovianaTriWahyuWidayanti@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('196612172008012', 'Suswati', 'Perum Depkes  Blok D2 / 11 RT 05 / RW 03 Kramat', 'Suswati@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('196702192008011', 'Eko Margo Setyo Budhi Wardono', 'Potrobangsan ID No.433A RT 05 / RW 04 Magelang Utara', 'EkoMargoSetyoBudhiWardono@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('196801172007011', 'Budi Wibowo', 'Tegalrandu RT 04 / RW 01 Grabag', 'BudiWibowo@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('196804261995122', 'Rini Fisikawati', 'Gowak RT 05 / RW 02 Grabag', 'RiniFisikawati@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('196807181999101', 'Tri Wahyuningsih', 'Krajan RT 01 / RW 01 Candiroto ', 'TriWahyuningsih@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('196902112003122', 'Siti Fatimah', 'Jetis RT 02 / RW 01 Gambasan Selopampang', 'SitiFatimah@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('196902251995031', 'Muh Zaini', 'Jalan Bugenvil 3 RT 02 / RW 02 Kupang Dukuh Ambarawa', 'muhzaini@gmail.com', '1fe5b5c5c6256b7605d28dee50be2cb6', 'Aktif', '', 2),
('196902282005011', 'Bambang Budi Darmoko ', 'Pondok Asri I D 68 RT 24 / RW 11 Madusari Secang', 'BambangBudiDarmoko@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('197501052006042', 'Irma Susanti ', 'Ngaran RT 05 / RW 03 Ngasinan Grabag', 'IrmaSusanti@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('197605132008012', 'Evawani Palupi', 'Susukan RT 05 / RW 02 Grabag ', 'EvawaniPalupi@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('197609062014062', 'Ratna Wulandari', 'Butuh RT 03 / RW 05 Grabag', 'RatnaWulandari@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('197611182007011', 'Achmad Nurudin Fauzi', 'Kaponan RT 06/ RW 03 Rejosari III Grabag ', 'AchmadNurudinFauzi@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('197803052003122', 'Erni Eko Rahayu', 'Karangkajen RT 03 / RW 01 Karangtalun Secang', 'ErniEkoRahayu@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('197804122008012', 'Karmila', 'Gang Condong 7 A RT 08 / RW 08 Gang Condon Cacaban Magelang Tengah', 'Karmila@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('197909162006042', 'Christina Septi Nugraheni', 'Melati Purna F54 RT 01/ RW 9 Banyurojo Mertoyudan', 'ChristinaSeptiNugraheni@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('198004122014062', 'Fransisca Dewi Presti Anggraini ', 'Gowak RT 02 / RW 01 Grabag ', 'FransiscaDewiPrestiAnggraini@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('198208012006041', 'Sigit Prasetya Widodo', 'Selurah RT 24 / RW 10 Krincing Secang', 'SigitPrasetyaWidodo@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('198411222009031', 'Danang Kusumawardana', 'Sembir RT 04 / RW 07 Rejosari Pakis', 'DanangKusumawardana@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('198608202010012', 'Festi Ika Pradita ', 'Jalan Magelang - Purworejo RT 5 / RW 09 Jurang Sari Banjarnegoro Mertoyudan', 'FestiIkaPradita@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('199012012019022', 'Dessy Eka Setyaningrum', 'Ngrantunan RT 5 / RW 8 Sonorejo Candimulyo', 'DessyEkaSetyaningrum@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('199105282019022', 'Kristina Jayanti ', 'Krajan RT 01 / RW 01 Geblog Kaloran', 'KristinaJayanti@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('199106162019022', 'Dewi Sukmawati', 'Ngloji RT 20 / RW 9 Krincing Secang', 'DewiSukmawati@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('199309232019022', 'Nisa Havidza', 'Jalan Tegalrejo Pucang RT 07 / RW 02 Gadoh Banyusari', 'NisaHavidza@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2),
('199610212019021', 'Wisnu Dian Permana', 'Dodogan RT 07 Jatimulyo Dlingo', 'WisnuDianPermana@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', 2);

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

-- --------------------------------------------------------

--
-- Table structure for table `potongan`
--

CREATE TABLE `potongan` (
  `NIS` varchar(15) NOT NULL,
  `id_beasiswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id_semester` int(10) NOT NULL,
  `semester` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id_semester`, `semester`) VALUES
(1, 'Ganjil'),
(2, 'Genap');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `NIS` varchar(15) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `tahun_masuk` year(4) NOT NULL,
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

INSERT INTO `siswa` (`NIS`, `nama_siswa`, `tahun_masuk`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `foto`, `status_siswa`) VALUES
('0004440982', 'Achmad Taufik', 2018, 'Magelang', '2000-10-12', 'L', 'Pampung Sumurarum Grabag', '', 'Aktif'),
('0004934185', 'Imam Utomo', 2017, 'Magelang', '2000-07-08', 'L', 'Ngaglik Kalipucang Grabag', '', 'Aktif'),
('0005069986', 'Bagas Indrawan', 2017, 'Magelang', '2000-11-01', 'L', 'Lodosewu Tejosari Ngablak', '', 'Aktif'),
('0007920546', 'Gilang Satrio Purwowibobo', 2017, 'Magelang', '2000-10-03', 'L', 'Candi Umbul Kartoharjo Grabag', '', 'Aktif'),
('0010946042', 'Bayu Kalbuadi', 2017, 'Magelang', '2002-09-07', 'L', 'Jrebeng Giriwetan Grabag', '', 'Aktif'),
('0011366179', 'Radinka Atmajaya', 2017, 'Magelang', '2001-12-16', 'L', 'Keditan Banaran Ngablak', '', 'Aktif'),
('0011417821', 'Joddik Dwiyan Saputra', 2017, 'Magelang', '2001-01-31', 'L', 'Gowak Grabag', '', 'Aktif'),
('0011511891', 'Muhamad Agung Prasetya', 2017, 'Magelang', '2001-12-27', 'L', 'Rejosari Grabag', '', 'Aktif'),
('0011677408', 'Devi Salsabila Putri', 2017, 'Magelang', '2002-07-14', 'P', 'Krincing Secang', '', 'Aktif'),
('0011677696', 'Alfian Saiful Bahri', 2017, 'Magelang', '2000-12-26', 'L', 'Pengilon Purwosari Secang', '', 'Aktif'),
('0012469612', 'Huda Busyra Mubarak', 2017, 'Magelang', '2001-02-24', 'L', 'Ngadirojo Secang', '', 'Aktif'),
('0013543613', 'Aulia Isna Nur Imani', 2017, 'Magelang', '2001-05-20', 'P', 'Kaligandu Grabag', '', 'Aktif'),
('0013854770', 'Feri Hendra Saputra', 2018, 'Magelang', '2003-03-28', 'L', 'Batikan Ngadirejo Tegalrejo', '', 'Aktif'),
('0016306612', 'Luthfian Faja Alzura', 2017, 'Magelang', '2001-08-18', 'L', 'Tegalsari Jambewangi Secang', '', 'Aktif'),
('0016775947', 'Ibrahim ZIdane Al Sadham', 2017, 'Magelang', '2001-07-01', 'L', 'Sambungjetis Jambewangi Secang', '', 'Aktif'),
('0016776071', 'Fitria Nastain', 2017, 'Magelang', '2001-12-19', 'P', 'Sambung Lor Jambewangi Secang', '', 'Aktif'),
('0016777680', 'Lintang Bagas Prokoso', 2017, 'Magelang', '2001-10-16', 'L', 'Jlamprang Pirikan Secang', '', 'Aktif'),
('0016989127', 'Alfina Rahma Damayanti', 2017, 'Magelang', '2001-06-16', 'P', 'Padan Krincing Secang', '', 'Aktif'),
('0017277941', 'Bagas Hardianto', 2017, 'Sukabumi', '2001-06-20', 'L', 'Gunungsari Madusari Secang', '', 'Aktif'),
('0017386035', 'AgungSetiyawan', 2019, 'Magelang', '2001-04-21', 'L', 'Kleteran Grabag', '', 'Aktif'),
('0017570711', 'Faisal Masduqi', 2017, 'Magelang', '2002-05-02', 'P', 'Perum Pondok Asri Madusari Secang', '', 'Aktif'),
('0017574233', 'Tera Rhebekka', 2017, 'Magelang', '2001-10-19', 'L', 'Pondok Asri I  Madusari Secang', '', 'Aktif'),
('0017574254', 'Fahreza Nur Wahid', 2017, 'Magelang', '2001-09-06', 'L', 'Secang ', '', 'Aktif'),
('0017574295', 'Dian Kusumaningrum', 2019, 'Magelang', '2001-02-16', 'P', 'Nglojo Krincing Secang', '', 'Aktif'),
('0017574325', 'Anggita Sakti Ningrum', 2017, 'Magelang', '2001-06-26', 'P', 'Mirikerep Madusari Secang', '', 'Aktif'),
('0017574336', 'Danya Nur Azizah', 2019, 'Magelang', '2001-12-23', 'P', 'Kuwaluan Secang', '', 'Aktif'),
('0017574347', 'Muhammad Faisal Arif', 2017, 'Magelang', '2001-06-01', 'L', 'Kenayan Ngabean Secang', '', 'Aktif'),
('0017574588', 'Fakhri Riana Putra', 2017, 'Magelang', '2001-10-09', 'L', 'Gaiso Gunung Candisari Secang', '', 'Aktif'),
('0017574652', 'Leni Puspita Utami', 2017, 'Magelang', '2001-11-14', 'P', 'Tawang Krincing Secang', '', 'Aktif'),
('0017575892', 'Aikido Kartiko Wicaksono', 2017, 'Malang', '2001-08-07', 'L', 'Cecekan Soroyudan Tegalrejo', '', 'Aktif'),
('0017620200', 'Ahmad Saifudin', 2018, 'Magelang', '2001-10-28', 'L', 'Ngasinan Grabag', '', 'Aktif'),
('0017794757', 'Muhamad Arzaq Kahfi', 2017, 'Magelang', '2001-07-08', 'L', 'Bangsren Krincing Secang', '', 'Aktif'),
('0018876515', 'Ega Bagus Panuntun', 2017, 'Magelang', '2001-10-26', 'L', 'Cokro Grabag', '', 'Aktif'),
('0018876628', 'Sandi Lazuardi', 2017, 'Magelang', '2001-08-02', 'L', 'Ponggol 2 Grabag', '', 'Aktif'),
('0018876643', 'Bhanu Widyadana', 2018, 'Magelang', '2001-11-20', 'L', 'Kayupuring Banyusari', '', 'Aktif'),
('0018876719', 'Bagus Tri Wibowo', 2019, 'Magelang', '2002-09-07', 'L', 'Kaligintung Sidogede Grabag', '', 'Aktif'),
('0018876724', 'Bagas Cahyo Adi', 2017, 'Magelang', '2001-12-08', 'L', 'Tegalrandu Grabag', '', 'Aktif'),
('0018877267', 'Galuh Muthia Maharani', 2017, 'Magelang', '2001-11-08', 'P', 'Candi Umbul Kartoharjo Grabag', '', 'Aktif'),
('0018878518', 'Ahmad Arjunnaja', 2017, 'Magelang', '2001-11-02', 'L', 'Ngasinan Grabag', '', 'Aktif'),
('0018879313', 'Akhmad Faqih', 2017, 'Magelang', '2001-09-25', 'L', 'Kalisalak Sumurarum Grabag', '', 'Aktif'),
('0018879695', 'Dani Marcelo Septianto Kuntardi', 2017, 'Magelang', '2001-09-21', 'L', 'Susukan Grabag', '', 'Aktif'),
('0018890567', 'Dikha Muhammad Ridwan', 2017, 'Magelang', '2001-06-23', 'L', 'Delik Grabag', '', 'Aktif'),
('0018890579', 'Ahmad Ramadhani Yusuf', 2017, 'Temanggung', '2001-11-17', 'L', 'Ngebong Pingit Pringsurat', '', 'Aktif'),
('0019084982', 'Galih Tri Andito', 2018, 'Magelang', '2001-11-05', 'L', 'Semarum Sumurarum Grabag', '', 'Aktif'),
('0019093055', 'Rizqiyana Salma Musarofah', 2017, 'Magelang', '2001-09-26', 'P', 'Tegalrandu Grabag', '', 'Aktif'),
('0019417757', 'Muhammad Rifky Alfareza', 2017, 'Magelang', '2001-08-05', 'L', 'Sumberagung 1 Secang', '', 'Aktif'),
('0019751055', 'Afrizal Maulana', 2017, 'Magelang', '2001-11-21', 'L', 'Gowak Grabag', '', 'Aktif'),
('0020120457', 'Dewi Isnaini Zulaiha', 2018, 'Temanggung', '2002-09-24', 'P', 'Candi Candisari Secang', '', 'Aktif'),
('0020140601', 'Indah Dwi Septiani', 2018, 'Magelang', '2002-09-19', 'P', 'Gondangan Wetan Girirejo Ngablak', '', 'Aktif'),
('0021034496', 'Aprilia Devina Syahril', 2017, 'Temanggung', '2002-04-24', 'P', 'Elo Sawahan Pancuran Mas Secang', '', 'Aktif'),
('0021753214', 'Duta Julyanto', 2017, 'Magelang', '2002-07-09', 'L', 'Tegalsari Jambewangi Secang', '', 'Aktif'),
('0022009645', 'Eni Luthfiyati Indriyasari', 2018, 'Magelang', '2002-05-20', 'P', 'Purwogondo Sumurarum Grabag', '', 'Aktif'),
('0022020841', 'Aurelia Salma Yusan Putri', 2018, 'Yogyakarta', '2002-02-14', 'P', 'Sanggrahan Wates Magelang', '', 'Aktif'),
('0022145079', 'Dea Tri Rahayu', 2018, 'Magelang', '2002-12-29', 'P', 'Susukan Grabag', '', 'Aktif'),
('0022581919', 'Amelia DIta Kuntari', 2018, 'Magelang', '2002-09-22', 'P', 'Gabahan Banaran Grabag', '', 'Aktif'),
('0023049953', 'Devinca Radya Kyrani', 2018, 'Magelang', '2002-12-10', 'P', 'Kliwonan 2 Grabag', '', 'Aktif'),
('0023135934', 'Amalia Vira Cahyani', 2017, 'Magelang', '2002-02-01', 'P', 'Temanggung Secang', '', 'Aktif'),
('0023135954', 'Fadhilah Lulu Nurjannah', 2017, 'Magelang', '2002-05-02', 'L', 'Pondok Asri I  Madusari Secang', '', 'Aktif'),
('0023135969', 'Aditya Widyatmoko', 2017, 'Magelang', '2002-06-25', 'L', 'Krajan II Secang ', '', 'Aktif'),
('0023137715', 'Lukman Dinadi Sabdono', 2017, 'Magelang', '2002-07-11', 'L', 'Clapar Purwodadi Tegalrejo', '', 'Aktif'),
('0023137749', 'Gabril Titto Wardhana', 2017, 'Temanggung', '2002-03-31', 'L', 'Jambewangi Secang', '', 'Aktif'),
('0023222160', 'Ichwan Fachrizal', 2018, 'Magelang', '2002-11-25', 'L', 'Ngaran Ngasinan Grabag', '', 'Aktif'),
('0023225947', 'Dhea Finitadewi Saputri', 2018, 'Magelang', '2002-08-21', 'P', 'Ngencek Kalikuto Grabag', '', 'Aktif'),
('0023328055', 'Ana Khoirun Naqibah', 2017, 'Magelang', '2002-09-09', 'P', 'Kleteran Grabag', '', 'Aktif'),
('0023656634', 'Ella Maylidia Putri', 2017, 'Sungai Raya', '2002-05-29', 'P', 'Kawanan Secang', '', 'Aktif'),
('0023955643', 'Cut Intan Ayu Nurjanah', 2017, 'Magelang', '2002-10-01', 'P', 'Semalen Ngadirejo Secang', '', 'Aktif'),
('0023974053', 'Kartika Salma', 2017, 'Magelang', '2002-04-21', 'P', 'Ngrantunan  Sonorejo Candimulyo', '', 'Aktif'),
('0023975295', 'Alfin Abiu Fadhilla', 2017, 'Jakarta', '2002-03-02', 'L', 'Kwiden Pakis', '', 'Aktif'),
('0023975944', 'Eka Dewi Sulistyowati', 2017, 'Magelang', '2002-05-29', 'P', 'Klimbangan Banyusidi Pakis', '', 'Aktif'),
('0023990351', 'Farah Dina Inez Ghaezani', 2017, 'Magelang', '2002-01-17', 'P', 'Sumber Ketandan Secang', '', 'Aktif'),
('0023990361', 'Akbar Mahmud Wijaya', 2017, 'Magelang', '2002-04-02', 'L', 'Krajan II Secang ', '', 'Aktif'),
('0023990362', 'Cheni Afriliasandi', 2017, 'Surabaya', '2002-04-11', 'P', 'Krajan Secang ', '', 'Aktif'),
('0023990456', 'Idham Haswi Abdurochim', 2017, 'Magelang', '2002-02-02', 'L', 'Madyocondro Secang', '', 'Aktif'),
('0023990458', 'Ilham Haswi Abdurochman', 2017, 'Magelang', '2002-02-02', 'L', 'Mertan Madyocondro Secang', '', 'Aktif'),
('0023990467', 'Poppy Widi Shapira', 2017, 'Magelang', '2002-02-01', 'P', 'Catak Madyocondro Secang', '', 'Aktif'),
('0023990562', 'Dewi Fatma Humairoh', 2017, 'Magelang', '2002-04-24', 'P', 'Setan I Candiretno Secang', '', 'Aktif'),
('0023990635', 'Nina Kurniawati', 2017, 'Magelang', '2001-01-02', 'P', 'Margo Agung Candisari Secang', '', 'Aktif'),
('0023990702', 'Ahmad Syaiffudin ', 2017, 'Magelang', '2002-03-24', 'L', 'Gunungtugel Purwosari Secang', '', 'Aktif'),
('0023990990', 'Milatun Naila', 2017, 'Magelang', '2002-02-12', 'P', 'Candireto Bengkung Secang', '', 'Aktif'),
('0023991992', 'Septiani Wahyuningtyas', 2017, 'Jakarta', '2002-09-30', 'P', 'Piyamanan Girikulon Secang', '', 'Aktif'),
('0023993044', 'Khotibul Umam', 2017, 'Magelang', '2002-07-22', 'L', 'Kalitengah Glagahombo Tegalrejo', '', 'Aktif'),
('0024527780', 'Amalia Salsabila Ramadhani', 2018, 'Magelang', '2002-11-19', 'P', 'Pasinan Grabag', '', 'Aktif'),
('0025404646', 'Anisa Setyaningtyas', 2018, 'Magelang', '2002-09-16', 'P', 'Kaligandu Grabag', '', 'Aktif'),
('0025942923', 'Destin Alfianti', 2018, 'Magelang', '2002-02-18', 'P', 'Gowak Grabag', '', 'Aktif'),
('0025962574', 'Sahrul Ulum', 2018, 'Magelang', '2002-12-06', 'L', 'Kleteran Grabag', '', 'Aktif'),
('0026101261', 'Miftahul Hilda Cahyono', 2018, 'Magelang', '2002-06-03', 'L', 'Kleteran Grabag', '', 'Aktif'),
('0026374628', 'Devi LAtifatul Azizah', 2017, 'Magelang', '2002-03-08', 'P', 'Talun Banyusari', '', 'Aktif'),
('0026375653', 'Hanifah Nurul Fazira', 2017, 'Magelang', '2002-08-12', 'L', 'Candi Umbul Kartoharjo Grabag', '', 'Aktif'),
('0026375818', 'Aji Sejati', 2017, 'Magelang', '2002-02-15', 'L', 'Mlobo Karang Kajen Secang', '', 'Aktif'),
('0026375824', 'Aji Hendra PErmana', 2017, 'Magelang', '2002-04-24', 'L', 'Semarum Sumurarum Grabag', '', 'Aktif'),
('0026375827', 'Khoirul Arif Rahman', 2017, 'Magelang', '2002-05-18', 'L', 'Kayupuring Banyusari', '', 'Aktif'),
('0026376454', 'Adam Firmanysah', 2017, 'Magelang', '2002-01-01', 'L', 'Ngaran Ngasinan Grabag', '', 'Aktif'),
('0026376470', 'Dea Hayu Ningtyas', 2017, 'Magelang', '2002-03-30', 'P', 'Paingan Grabag', '', 'Aktif'),
('0026376485', 'Atha Sifal Haqqi Ahmada', 2017, 'Magelang', '2001-04-29', 'L', 'Janggelan Kleteran Grabag', '', 'Aktif'),
('0026377187', 'Ananda Satria BImantara', 2017, 'Magelang', '2002-05-04', 'L', 'Lebak Lor Grabag', '', 'Aktif'),
('0026377944', 'Intan Mega Sevia', 2017, 'Magelang', '2002-04-22', 'P', 'Kragan Losari  Grabag', '', 'Aktif'),
('0026377956', 'Angia Clara Dwi Saputri', 2017, 'Magelang', '2002-10-11', 'L', 'Losari Grabag', '', 'Aktif'),
('0026378049', 'Afif Safaat', 2019, 'Magelang', '2002-06-06', 'L', 'Kwijilan Sumurarum Grabag', '', 'Aktif'),
('0026379562', 'Annisa Rose LIta', 2017, 'Magelang', '2002-02-03', 'P', 'Sumurbandung Grabag', '', 'Aktif'),
('0026379577', 'Choirul Arif Mahendra', 2018, 'Magelang', '2002-11-01', 'L', 'Susukan Grabag', '', 'Aktif'),
('0026379752', 'Devi Yuliana', 2017, 'Magelang', '2002-07-14', 'P', 'Ketawang Grabag', '', 'Aktif'),
('0026386575', 'Muhammad Khanafi Sahrul Umam', 2018, 'Magelang', '2002-05-09', 'L', 'Klegen Gegunung Grabag', '', 'Aktif'),
('0026390179', 'Khusnul Puspita Wati', 2017, 'Magelang', '2002-01-26', 'P', 'Susukan Grabag', '', 'Aktif'),
('0026390180', 'Leni Ayundasari', 2017, 'Magelang', '2002-03-27', 'P', 'Susukan Grabag', '', 'Aktif'),
('0026391515', 'Mita Askabul Janah', 2017, 'Magelang', '2002-02-18', 'P', 'Pringapus Baleagung Grabag', '', 'Aktif'),
('0026392130', 'Favian Wisnu Saputra', 2017, 'Magelang', '2002-07-16', 'L', 'Sawahan Grabag', '', 'Aktif'),
('0026392658', 'Fara Asnarul Hidayah', 2019, 'Magelang', '2002-08-26', 'P', 'Gowak Grabag', '', 'Aktif'),
('0026393052', 'Dwi Tarwiyati', 2017, 'Magelang', '2002-02-20', 'L', 'Pasanggrahan', '', 'Aktif'),
('0026393054', 'Algani Adam Ray', 2018, 'Magelang', '2002-03-29', 'L', 'Dempel Gentan Tirto Grabag', '', 'Aktif'),
('0026393425', 'Annisa Prajna Muthi', 2017, 'Magelang', '2002-03-05', 'P', 'Sumurbandung Grabag', '', 'Aktif'),
('0026394515', 'Ana Aeni Najib', 2017, 'Magelang', '2002-12-31', 'P', 'Batur Citrosono Grabag', '', 'Aktif'),
('0026452002', 'Cahyatunima', 2017, 'Temanggung', '2002-05-31', 'P', 'Banjaran Klepu Pringsurat', '', 'Aktif'),
('0026452800', 'Agustya Syakira Aini', 2018, 'Temanggung', '2002-08-12', 'P', 'Kebumen Pringsurat', '', 'Aktif'),
('0026453359', 'Faizal Bagas Hermawan', 2018, 'Temanggung', '2002-07-14', 'L', 'Jurangsari Soropadan Pringsurat', '', 'Aktif'),
('0026880368', 'Asa Anugrahing Tyasono', 2018, 'Magelang', '2002-10-16', 'P', 'Pijahan Kalipucang Grabag', '', 'Aktif'),
('0027331023', 'Gagah Sultan Ramdana', 2019, 'Magelang', '2002-12-01', 'L', 'Legetan Banaran Grabag', '', 'Aktif'),
('0027497703', 'Mega Ria Anggraini', 2018, 'Cahaya Murni', '2002-10-16', 'P', 'Pagonan Ngabean Secang', '', 'Aktif'),
('0027625343', 'Citra Oca Febriyanti', 2018, 'Magelang', '2002-02-16', 'P', 'Sawahan Grabag', '', 'Aktif'),
('0027747521', 'Alan Fatah Aji Pangestu', 2017, 'Magelang', '2002-03-29', 'L', 'Sorobayan Banaran Grabag', '', 'Aktif'),
('0028262316', 'Dimas Iqbal Maulana', 2018, 'Magelang', '2002-07-21', 'L', 'Sawahan Grabag', '', 'Aktif'),
('0028507626', 'Achmad Luthfi Adzana', 2018, 'Magelang', '2002-10-28', 'L', 'Kalangan Grabag', '', 'Aktif'),
('0028508829', 'Dika Prihantoro', 2019, 'Magelang', '2002-10-02', 'L', 'Rejosari 3 Grabag', '', 'Aktif'),
('0028609553', 'Miftah Muhammad Yusuf', 2019, 'Magelang', '2002-10-22', 'P', 'Susukan Grabag', '', 'Aktif'),
('0028609595', 'Elza Dharma Pertiwi', 2018, 'Sukoharjo', '2002-12-12', 'P', 'Pagonan Sidogede Grabag', '', 'Aktif'),
('0028641149', 'Hamdani', 2017, 'Magelang', '2002-01-29', 'L', 'Kupen Baleagung Grabag', '', 'Aktif'),
('0028802762', 'Dwi Khusnatul Fauziah', 2018, 'Magelang', '2002-08-15', 'P', 'Suwiti Lebak Grabag', '', 'Aktif'),
('0028991129', 'Dewi Anisa Wulan Dhari', 2018, 'Temanggung', '2002-11-20', 'P', 'Karawang Mungkid Klepu Pringsurat', '', 'Aktif'),
('0029148826', 'Depri Setiyanto', 2019, 'Magelang', '2002-04-29', 'L', 'Bedoyo Baleagung Grabag', '', 'Aktif'),
('0029199272', 'Muhammad Andy Hakim', 2017, 'Boyolali', '2002-02-06', 'L', 'Kembangan Madusari Secang', '', 'Aktif'),
('0029465478', 'Chudzafah Murbianto', 2019, 'Magelang', '2002-05-06', 'L', 'Samirono Krincing Secang', '', 'Aktif'),
('0029698532', 'LAYLATUL ILMIAH', 2018, 'Magelang', '2003-12-02', 'P', 'Gogik Girirejo Grabag', '', 'Aktif'),
('0030317071', 'Chabib Faruq Taftazani', 2017, 'Magelang', '2002-03-30', 'L', 'Karang Kulon Secang', '', 'Aktif'),
('0030573356', 'Ayuning Andhani', 2018, 'Madiun', '2003-05-02', 'P', 'Batikan Soropadan Pringsurat', '', 'Aktif'),
('0031062608', 'Muhamad Maulana Ferdiansyah', 2018, 'Magelang', '2003-05-12', 'L', 'Kalangan Sidogede Grabag', '', 'Aktif'),
('0031168149', 'Ciya Adi Nasti', 2019, 'Magelang', '2003-08-21', 'P', 'Tegalrandu Grabag', '', 'Aktif'),
('0031340705', 'Dhea Novita Geovani', 2018, 'Magelang', '2003-03-28', 'P', 'Pucang Ngrancah Grabag', '', 'Aktif'),
('0031995949', 'Akmalia Daka', 2018, 'Semarang', '2003-05-10', 'P', 'Bengkal Lor Kranggan', '', 'Aktif'),
('0032003293', 'Ali Rohman Nugroho', 2019, 'Magelang', '2003-04-16', 'L', 'Janggelan Kleteran Grabag', '', 'Aktif'),
('0032006869', 'Aji Bagas Pambudi', 2018, 'Magelang', '2003-10-09', 'L', 'Banaran Grabag', '', 'Aktif'),
('0032114298', 'Elsa Veronika Salim', 2018, 'Sleman', '2003-01-07', 'P', 'Krodan Maguwoharjo Depok', '', 'Aktif'),
('0032221124', 'Diah Ayu Oktaviani', 2018, 'Magelang', '2003-10-09', 'P', 'Duren Sawit Selomirah Ngablak', '', 'Aktif'),
('0032389006', 'Muhammad Bondhi Alby Maulana', 2018, 'Magelang', '2003-02-17', 'L', 'Perum Pondok Asri Gembongan Payaman Secang', '', 'Aktif'),
('0032481575', 'Ahmad Gufron Rofii', 2019, 'Magelang', '2003-12-09', 'L', 'Baleagung Grabag', '', 'Aktif'),
('0032529349', 'Eflina Rossaliana', 2018, 'Magelang', '2003-04-09', 'P', 'Senanpiran Banaran Grabag', '', 'Aktif'),
('0032681856', 'Eko Hariyanto', 2018, 'Magelang', '2003-06-08', 'L', 'Klegen Grabag', '', 'Aktif'),
('0032724126', 'Alfi Ichsanudin', 2019, 'Magelang', '2003-03-25', 'L', 'Tegalrandu Grabag', '', 'Aktif'),
('0032760497', 'Budi Cahyono', 2018, 'Magelang', '2003-12-26', 'L', 'Gunungtugel Purwosari Secang', '', 'Aktif'),
('0032769193', 'Cintya Ajeng Kumala Dewi', 2019, 'Magelang', '2003-06-24', 'P', 'Gesari Banyusari Grabag', '', 'Aktif'),
('0032933647', 'Bias Ayu Sekartaji', 2018, 'Magelang', '2003-05-28', 'P', 'Gowak Grabag', '', 'Aktif'),
('0032937866', 'Agus Nur Wakil', 2018, 'Magelang', '2003-08-01', 'L', 'Kebumen Pringsurat', '', 'Aktif'),
('0033011274', 'Niken Wulandari', 2018, 'Temanggung', '2003-04-17', 'P', 'Mangli Pringsurat ', '', 'Aktif'),
('0033011763', 'Fabbina Nafsha Wandhani', 2018, 'Temanggung', '2003-02-04', 'P', 'Mungkid Klepu Pringsurat', '', 'Aktif'),
('0033084998', 'Mohamad Firman Imanudin Akbar', 2019, 'Magelang', '2003-10-25', 'L', 'Kuwangsan Donorejo Secang', '', 'Aktif'),
('0033241214', 'Inayati Fikriyah', 2019, 'Magelang', '2003-02-19', 'P', 'Bawang Ketawang Grabag', '', 'Aktif'),
('0033336716', 'Dheka Putri Falisa', 2018, 'Magelang', '2003-08-13', 'P', 'Bedoyo Baleagung Grabag', '', 'Aktif'),
('0033689090', 'Ahmad Muzaka', 2018, 'Magelang', '2003-04-19', 'L', 'Ngasinan Grabag', '', 'Aktif'),
('0033716750', 'Hilda Nurdianningsih', 2018, 'Magelang', '2003-06-26', 'P', 'Ngencek Kalikuto Grabag', '', 'Aktif'),
('0033716903', 'Arzi Kurnia Kholifah', 2018, 'Magelang', '2003-03-14', 'P', 'Kliwonan 2 Grabag', '', 'Aktif'),
('0033726558', 'Dany Kristianto', 2018, 'Magelang', '2003-02-24', 'L', 'Selembu', '', 'Aktif'),
('0034100746', 'Amelia Citra Ayu Parmadi', 2019, 'Magelang', '2003-10-24', 'P', 'Kalangan Grabag', '', 'Aktif'),
('0034241997', 'Farras BAyu Satrio', 2019, 'Magelang', '2003-09-23', 'L', 'Bongso Kalikuto Grabag', '', 'Aktif'),
('0034369825', 'Hafidz Alfiandrian', 2019, 'Magelang', '2003-10-07', 'L', 'Krajan 1 Grabag', '', 'Aktif'),
('0034388202', 'Isah Putri Lestari', 2018, 'Bekasi', '2003-03-27', 'P', 'Gowak Grabag', '', 'Aktif'),
('0034402126', 'Aulia Wahyu Faisa R', 2019, 'Magelang', '2003-12-06', 'P', 'Ponggol 1 Grabag', '', 'Aktif'),
('0034488622', 'Liana Afza Farzana', 2018, 'Magelang', '2003-04-07', 'P', 'Jantur Banyusari Grabag', '', 'Aktif'),
('0034548870', 'Angga Nur Wahyu Pratama', 2019, 'Sragen', '2003-08-03', 'L', 'Selurah Gunung Lawak Krincing Secang', '', 'Aktif'),
('0034708712', 'Ajeng Dania Mada Dewi', 2018, 'Magelang', '2003-05-02', 'P', 'Gowak Grabag', '', 'Aktif'),
('0034722079', 'Anggun Khoriah', 2019, 'Magelang', '2003-12-07', 'P', 'Bleder Ngasinan Grabag', '', 'Aktif'),
('0034844735', 'Bagas Muhammad Azzam', 2019, 'Magelang', '2003-09-29', 'L', 'Puntingan Madyogondo Ngablak', '', 'Aktif'),
('0035060757', 'Aesya Nurfunda Arkhatu', 2019, 'Magelang', '2003-11-30', 'P', 'Krajan 1 Grabag', '', 'Aktif'),
('0035149418', 'Adinda Salsa Bella', 2019, 'Magelang', '2003-09-08', 'P', 'Kliwonan 1 Grabag', '', 'Aktif'),
('0035421090', 'Binta Aaliyah Hanifa', 2018, 'Magelang', '2003-02-21', 'P', 'Karangtalun Karangkajen Grabag', '', 'Aktif'),
('0035980648', 'Agda Faisal Aziz', 2018, 'Magelang', '2003-02-25', 'L', 'Pagonan Sidogede Grabag', '', 'Aktif'),
('0036346143', 'Fajar Kurniawan ', 2018, 'Magelang', '2003-04-10', 'L', 'Rejosari 3 Grabag', '', 'Aktif'),
('0036589267', 'Dwi Rahmawati', 2018, 'Magelang', '2004-11-29', 'P', 'Kupen Baleagung Grabag', '', 'Aktif'),
('0036730388', 'Novi Nurlelli Mufidah', 2019, 'Magelang', '2003-11-08', 'P', 'Tirto Grabag', '', 'Aktif'),
('0036777069', 'Akhmad Saiful Hadi', 2019, 'Magelang', '2003-08-17', 'L', 'Jogoyasan Ngablak', '', 'Aktif'),
('0036814376', 'Aan Naisya Tri Ayu', 2018, 'Magelang', '2003-06-07', 'P', 'Klabaran Sumberejo Ngablak', '', 'Aktif'),
('0036815308', 'Danung Prakoso', 2019, 'Magelang', '2003-09-15', 'L', 'Mantran Wetan', '', 'Aktif'),
('0036853198', 'Ibnu Ahzamil Umam', 2018, 'Magelang', '2003-10-16', 'L', 'Kedokan Magersari Ngablak', '', 'Aktif'),
('0036858931', 'Andika Octa Andrian Cipta', 2019, 'Magelang', '2003-10-24', 'L', 'Derpowangsan Tejoasari Ngablak', '', 'Aktif'),
('0036859943', 'Ayu Aristin Nur Janah', 2019, 'Magelang', '2003-08-28', 'P', 'Pandean Lor Ngablak', '', 'Aktif'),
('0036876962', 'Ainur Ayu Octaviya', 2019, 'Magelang', '2003-10-03', 'P', 'Ngeren Mangunrejo Tegalrejo', '', 'Aktif'),
('0036883977', 'Aunul Fadilah', 2018, 'Magelang', '2003-02-23', 'P', 'Wiyono Grabag', '', 'Aktif'),
('0037022262', 'Ade Ria Yulia Pusparini', 2019, 'Magelang', '2003-07-29', 'P', 'Krajan II Secang ', '', 'Aktif'),
('0037175292', 'Aisya Ardhini', 2019, 'Magelang', '2003-12-20', 'P', 'Krajan 1 Soropadan Pringsurat', '', 'Aktif'),
('0037175418', 'Dwi Cahyani Sari', 2018, 'Magelang', '2003-04-02', 'P', 'Gunungsari Madusari Secang', '', 'Aktif'),
('0037175423', 'Nevi Amrika Achanindya', 2018, 'Semarang', '2003-09-03', 'P', 'Gunungsari Madusari Secang', '', 'Aktif'),
('0037175449', 'Arya Candra Wibowo', 2019, 'Magelang', '2003-01-19', 'L', 'Krajan Pingit Pringsurat', '', 'Aktif'),
('0037175478', 'Ajeng Indah Nurjanah', 2019, 'Magelang', '2003-10-09', 'P', 'Perum Purna Bakti Ngadirojo Secang', '', 'Aktif'),
('0037175550', 'Andini Larisa Putri', 2019, 'Malang', '2003-06-28', 'P', 'Kaligaleh Kalijoso Secang', '', 'Aktif'),
('0037178564', 'Irsyad Achmad', 2019, 'Magelang', '2003-09-25', 'L', 'Gioso Gunung Candisari Secang', '', 'Aktif'),
('0037179982', 'Baty Putra Kurniawan', 2019, 'Magelang', '2004-03-14', 'L', 'Jurangsari Soropadan Pringsurat', '', 'Aktif'),
('0037241629', 'Ahmad Rosid', 2019, 'Magelang', '2003-06-08', 'L', 'Jetis Kleteran Grabag', '', 'Aktif'),
('0037464607', 'Annisa Nur Rahma', 2018, 'Magelang', '2003-07-07', 'P', 'Cokro Grabag', '', 'Aktif'),
('0037516287', 'Cinta Putri Enjelita', 2019, 'Magelang', '2003-10-08', 'P', 'Secang Atas ', '', 'Aktif'),
('0037526928', 'Farkhan Desta Aditya', 2019, 'Magelang', '2003-12-08', 'L', 'Ketawang Granag', '', 'Aktif'),
('0037618636', 'Aldela Mahadewi', 2018, 'Magelang', '2003-01-05', 'P', 'Kayupuring Lor Banyusari', '', 'Aktif'),
('0037618652', 'Amani Putri Latifah', 2018, 'Magelang', '2003-08-01', 'P', 'Kayupuring Tengah Banyusari Grabag', '', 'Aktif'),
('0037728692', 'Ainni Hikmatul Aliffah', 2018, 'Magelang', '2003-05-28', 'P', 'Manggung Sumurarum Grabag', '', 'Aktif'),
('0037755507', 'Bonifasius Brandy Wijaya', 2018, 'Magelang', '2003-06-03', 'L', 'Kalikuto Grabag', '', 'Aktif'),
('0037840548', 'Atina Sabila Khoirul Hidayati', 2018, 'Magelang', '2003-11-01', 'P', 'Banaran Sumberejo Ngablak', '', 'Aktif'),
('0038264088', 'Aldi Kurniawan', 2018, 'Magelang', '2003-04-28', 'L', 'Susukan Grabag', '', 'Aktif'),
('0038324925', 'Meiliyana Luthfiani', 2018, 'Magelang', '2003-05-13', 'P', 'Kalibendo Lor Banyusari Grabag', '', 'Aktif'),
('0038413582', 'Aji Putra Efendi', 2019, 'Magelang', '2003-05-17', 'L', 'Wonolobo Pandean Ngablak', '', 'Aktif'),
('0038463537', 'Amartya Sulistyani', 2019, 'Magelang', '2003-11-27', 'P', 'Ngadirejo Tegalrejo', '', 'Aktif'),
('0038547387', 'Annisa Aulia Rizky', 2018, 'Magelang', '2003-05-11', 'P', 'Wonokerto Tegalrejo ', '', 'Aktif'),
('0038590031', 'Ardian Putra Pratama', 2018, 'Magelang', '2003-02-22', 'L', 'Susukan Grabag', '', 'Aktif'),
('0038629421', 'Desti Rachmanita', 2019, 'Magelang', '2003-05-03', 'P', 'Jantur Banyusari Grabag', '', 'Aktif'),
('0038636079', 'Hasna Ulya Syarifah', 2019, 'Magelang', '2003-12-16', 'P', 'Krajan 1 Grabag', '', 'Aktif'),
('0038688035', 'Anggytha Mutiara', 2018, 'Magelang', '2003-06-28', 'P', 'Citrosono Grabag', '', 'Aktif'),
('0038800779', 'Amanda Febriyanti', 2018, 'Magelang', '2003-02-08', 'P', 'Ngasinan Grabang ', '', 'Aktif'),
('0038898660', 'Indra Lestari Haningrum', 2018, 'Magelang', '2003-11-28', 'P', 'Ketanggung Cokro Grabag', '', 'Aktif'),
('0038927274', 'Dimas Nugroho', 2019, 'Temanggung', '2003-03-13', 'L', 'Wiyono Grabag', '', 'Aktif'),
('0039006842', 'Aulia Niswa Azzahra', 2018, 'Magelang', '2003-06-17', 'P', 'Bawang Ketawang Grabag', '', 'Aktif'),
('0039067857', 'Anggraeni Huntari Saputri', 2018, 'Magelang', '2003-05-14', 'P', 'Sambung Lor Jambewangi Secang', '', 'Aktif'),
('0039324844', 'Achmad Sodikun', 2019, 'Magelang', '2003-05-09', 'L', 'Kalipucang Banyusari Grabag', '', 'Aktif'),
('0039513261', 'Aviva Septiyani Rahayu', 2019, 'Magelang', '2003-09-20', 'P', 'Nasri Sidogede Grabag', '', 'Aktif'),
('0039588987', 'Armuna Putra Pratama', 2018, 'Magelang', '2003-05-13', 'L', 'Kleteran Grabag', '', 'Aktif'),
('0039669222', 'Aiza Azkiya', 2018, 'Magelang', '2003-01-11', 'P', 'Kalangan Grabag', '', 'Aktif'),
('0039797104', 'Ageng Saadia Avicenna', 2019, 'Magelang', '2003-04-13', 'L', 'Magelang', '', 'Aktif'),
('0039894355', 'Alfath Haris Satrio Wicaksono', 2019, 'Magelang', '2003-10-25', 'L', 'Banaran Grabag', '', 'Aktif'),
('0039904442', 'Alfika Wahyu Ningtyas', 2018, 'Semarang', '2003-06-16', 'P', 'Susukan Grabag', '', 'Aktif'),
('0040210782', 'Aldy Gunawan', 2018, 'Temanggung', '2004-02-16', 'L', 'Kwayuhan Karangwuni Grabag', '', 'Aktif'),
('0040210795', 'Agung Nugroho', 2018, 'Temanggung', '2004-04-08', 'L', 'Semampir Gowak Pringsurat', '', 'Aktif'),
('0040311610', 'Andri Winanto', 2018, 'Magelang', '2004-10-17', 'L', 'Delok Gondangsari Pakis', '', 'Aktif'),
('0041405333', 'Masrukhan', 2019, 'Magelang', '2004-06-19', 'L', 'Magelang', '', 'Aktif'),
('0042109288', 'Dia Nurmasari', 2019, 'Magelang', '2004-06-13', 'P', 'Wates Losari Grabag', '', 'Aktif'),
('0042621053', 'Mukti Miftakhul Ulum', 2019, 'Magelang', '2004-09-24', 'P', 'Sembungan Gondangsari Ngablak', '', 'Aktif'),
('0043035015', 'Khori Adi Pamungkas', 2019, 'Temanggung', '2004-04-14', 'L', 'Digelan II Soropadan Pringsurat', '', 'Aktif'),
('0043139974', 'Eka Nur Setyaningsih', 2019, 'Magelang', '2004-05-12', 'P', 'Pandean Lor Ngablak', '', 'Aktif'),
('0043152841', 'Duwik Susanti', 2019, 'Magelang', '2004-09-02', 'P', 'Dempel Girirejo Ngablak', '', 'Aktif'),
('0043259976', 'Ataka Akhsya Sadat', 2019, 'Magelang', '2004-06-21', 'L', 'Krajan Pingit Pringsurat', '', 'Aktif'),
('0043270196', 'Afi Apriliyani', 2019, 'Magelang', '2004-04-26', 'P', 'Bangsren Krincing Secang', '', 'Aktif'),
('0043404994', 'Misky Laelatunnajach', 2019, 'Magelang', '2004-09-01', 'P', 'Ketanggung Cokro Grabag', '', 'Aktif'),
('0043476719', 'Candra Tejo Nugroho', 2019, 'Kabupaten Semarang', '2004-07-05', 'L', 'Ngadikerso Sumowono', '', 'Aktif'),
('0043497995', 'Ananda Salma Vesandy', 2019, 'Magelang', '2004-02-29', 'P', 'Perum Purna Bakti Ngadirojo Secang', '', 'Aktif'),
('0043511318', 'Enjang Widiasmoro', 2019, 'Magelang', '2004-04-17', 'L', 'Tempuksari Candisari Secang', '', 'Aktif'),
('0043553210', 'Egita Setyaningrum', 2019, 'Magelang', '2004-08-26', 'P', 'Semarum Sumurarum Grabag', '', 'Aktif'),
('0043852411', 'Ahmad Wafi Ladira', 2019, 'Magelang', '2004-03-03', 'L', 'Perum Pondok Asri Madusari Secang', '', 'Aktif'),
('0043916693', 'Fatmawati Amalia', 2019, 'Magelang', '2004-01-20', 'P', 'Karangtalun Karangkajen Grabag', '', 'Aktif'),
('0043936550', 'Angger Setiawan', 2019, 'Magelang', '2004-06-15', 'L', 'Krajan Lor Kartoharjo Grabag', '', 'Aktif'),
('0043956682', 'Adibatul Fitriya', 2019, 'Magelang', '2004-04-19', 'P', 'Karang Sumurarum Grabag', '', 'Aktif'),
('0043997871', 'Adinda Nur Alifva', 2019, 'Kabupaten Semarang', '2004-11-20', 'P', 'Jerukwangi Bedono Jambu', '', 'Aktif'),
('0044437016', 'Alfin Baihaqi', 2019, 'Magelang', '2004-09-03', 'L', 'Nganti Sendangadi Mlati', '', 'Aktif'),
('0044772089', 'Haris Octavian Adam', 2019, 'Magelang', '2004-10-07', 'L', 'Gatran Gondangsari Pakis', '', 'Aktif'),
('0044772890', 'Fery Adi Putra', 2019, 'Magelang', '2004-04-07', 'L', 'Bawang Ketawang Grabag', '', 'Aktif'),
('0045061873', 'Adrian Maulana', 2019, 'Magelang', '2004-10-29', 'L', 'Krajan II Secang ', '', 'Aktif'),
('0045315461', 'Aulia Niswa Azzahra', 2019, 'Mataram', '2004-05-13', 'P', 'BTNSeganteng Cakraselatan Baru Cakranegara', '', 'Aktif'),
('0045817585', 'Ahmad Salman Nur Said', 2019, 'Magelang', '2004-03-05', 'L', 'Mirikerep Madusari Secang', '', 'Aktif'),
('0046945610', 'Achmad Febri Prasetyo', 2019, 'Magelang', '2004-02-14', 'L', 'Karangtalun Karangkajen Grabag', '', 'Aktif'),
('0047849741', 'Aulia Habibatus Tsuroya', 2019, 'Magelang', '2004-06-30', 'P', 'Gunungsari Banyusari Grabag', '', 'Aktif'),
('0047972649', 'Fahrul Adi Gunawan', 2019, 'Magelang', '2004-01-08', 'L', 'Kajoran Losari Grabag', '', 'Aktif'),
('0048268443', 'Alifua Tia Aulia', 2019, 'Magelang', '2004-08-28', 'P', 'Janggelan Kleteran Grabag', '', 'Aktif'),
('0049311830', 'Davin Nawfan Nabeel', 2019, 'Magelang', '2004-07-01', 'P', 'Sambung Donorejo Secang', '', 'Aktif'),
('0049534820', 'Nesssa Refiana', 2019, 'Magelang', '2004-04-16', 'P', 'Kleteran Grabag', '', 'Aktif'),
('0049580580', 'Ira Okta Verina', 2019, 'Magelang', '2004-01-01', 'P', 'Jlopo Seworan Grabag', '', 'Aktif'),
('0049648651', 'Budi Bintoro', 2019, 'Magelang', '2004-03-14', 'L', 'Jurangsari Soropadan Pringsurat', '', 'Aktif'),
('0049939517', 'Ferdy Dwi Nugroho', 2019, 'Magelang', '2004-08-24', 'L', 'Tanggulangin Pandean Ngablak', '', 'Aktif'),
('0050493686', 'Iin Rahmawati', 2019, 'Magelang', '2005-10-16', 'P', 'Seloprojo Grabag', '', 'Aktif'),
('0050498506', 'Marshela Vebianti', 2019, 'Temanggung', '2004-02-25', 'L', 'Lungge', '', 'Aktif'),
('0051742716', 'Muhamad Ardina Nur Heavendrianto', 2019, 'Magelang', '2005-09-23', 'L', 'Daru Pagergunung Ngablak', '', 'Aktif'),
('0059344719', 'Ahmad Muzadi Arimianto', 2018, 'Magelang', '2005-01-07', 'L', 'Banaran Grabag', '', 'Aktif'),
('3001730243', 'Imam Syafii', 2019, 'Magelang', '2000-05-20', 'P', 'Kruwet Sumurarum Grabang', '', 'Aktif'),
('3036006165', 'Ina Maratul Qoniah', 2018, 'Magelang', '2003-05-05', 'P', 'Nipis Sambungrejo Grabag', '', 'Aktif'),
('3036836615', 'Alfin Mahfudhoh', 2018, 'Magelang', '2003-06-10', 'L', 'Gedono Donomulya Secang', '', 'Aktif'),
('3039101771', 'Angelika Dwi Putri Nurhasanah', 2018, 'Jakarta', '2003-04-03', 'P', 'Tanduran Madyocondro Secang', '', 'Aktif'),
('3046879077', 'Afi Sintiyani', 2019, 'Magelang', '2004-10-04', 'P', 'Krajan 1 Grabag', '', 'Aktif'),
('3133317255', 'Fahrezi Abdan Alghifary', 2018, 'Surakarta', '2003-07-25', 'L', 'Banyusari Grabag', '', 'Aktif');

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
  `nominal` int(10) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(5, '2023/2024'),
(6, '2018/2019'),
(7, '2017/2018');

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
(17, '111111111111110', 1, 2),
(22, '111111111111113', 18, 2),
(23, '111111111111117', 19, 2),
(21, '111111111111118', 18, 3),
(19, '195802251982031', 2, 2),
(18, '196807181999101', 25, 2);

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
-- Indexes for table `anggota_kelas`
--
ALTER TABLE `anggota_kelas`
  ADD PRIMARY KEY (`id_wali_kelas`,`NIS`),
  ADD KEY `NIS` (`NIS`);

--
-- Indexes for table `beasiswa`
--
ALTER TABLE `beasiswa`
  ADD PRIMARY KEY (`id_beasiswa`);

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
-- Indexes for table `potongan`
--
ALTER TABLE `potongan`
  ADD KEY `id_beasiswa` (`id_beasiswa`),
  ADD KEY `NIS` (`NIS`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id_semester`);

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
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `beasiswa`
--
ALTER TABLE `beasiswa`
  MODIFY `id_beasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id_kelas` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `mastertabelbiaya`
--
ALTER TABLE `mastertabelbiaya`
  MODIFY `id_biaya` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pengajar`
--
ALTER TABLE `pengajar`
  MODIFY `id_pengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id_semester` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `no_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id_tahun` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  MODIFY `id_wali_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
-- Constraints for table `potongan`
--
ALTER TABLE `potongan`
  ADD CONSTRAINT `potongan_ibfk_1` FOREIGN KEY (`id_beasiswa`) REFERENCES `beasiswa` (`id_beasiswa`),
  ADD CONSTRAINT `potongan_ibfk_2` FOREIGN KEY (`NIS`) REFERENCES `siswa` (`NIS`);

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
