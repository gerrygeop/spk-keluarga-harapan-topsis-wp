-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 17, 2021 at 01:24 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_wendy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(3, 'kurniati', '$2y$10$kmuGNjCZPgPKqFcvAoX1mumjwtlx.NBs0/ODFcRH3lESI8BCzMdeC'),
(4, 'admin', '$2y$10$hX2hQ0U6Bwb1i5zQ/ayFd.uh6sKPqVi.SPfO0ymw6EuiTCo8HSkZa');

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alt` int(11) NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c1` int(11) NOT NULL,
  `c2` int(11) NOT NULL,
  `c3` int(11) NOT NULL,
  `c4` int(11) NOT NULL,
  `c5` int(11) NOT NULL,
  `c6` int(11) NOT NULL,
  `c7` int(11) NOT NULL,
  `c8` int(11) NOT NULL,
  `c9` int(11) NOT NULL,
  `c10` int(11) NOT NULL,
  `c11` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alt`, `nama`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`, `c7`, `c8`, `c9`, `c10`, `c11`) VALUES
(1, 'Tini', 2, 1, 5, 1, 2, 2, 10, 11, 16, 19, 25),
(2, 'Haniyah', 2, 1, 4, 1, 2, 2, 10, 12, 16, 22, 27),
(3, 'Marsono', 2, 2, 3, 2, 1, 2, 8, 14, 17, 20, 27),
(4, 'Paat', 2, 2, 3, 1, 2, 2, 10, 13, 17, 20, 27),
(5, 'Sutiah', 1, 1, 6, 2, 2, 1, 7, 14, 16, 20, 27),
(6, 'Masrukia', 2, 2, 3, 1, 2, 2, 9, 12, 18, 22, 25),
(7, 'Samsiah', 1, 2, 6, 2, 2, 1, 10, 14, 17, 21, 24),
(8, 'Warida', 1, 2, 4, 1, 2, 2, 10, 15, 18, 21, 25),
(9, 'Sukarno', 2, 2, 3, 1, 2, 1, 8, 12, 17, 21, 25),
(10, 'Rusdaniar', 2, 1, 3, 2, 1, 2, 9, 13, 18, 21, 26),
(11, 'Supran', 2, 2, 3, 1, 2, 2, 10, 11, 17, 19, 27),
(12, 'Ajan Laing', 2, 1, 3, 2, 2, 1, 10, 11, 16, 20, 24),
(13, 'Hamsia', 2, 1, 3, 2, 1, 2, 10, 14, 17, 20, 24),
(14, 'La Muhu', 2, 1, 4, 2, 1, 2, 7, 12, 18, 21, 25),
(15, 'Badariah', 2, 2, 3, 1, 2, 1, 10, 14, 18, 20, 26),
(16, 'Sarintan', 1, 1, 6, 2, 2, 1, 10, 14, 17, 20, 25),
(17, 'Ahmad', 2, 2, 3, 2, 2, 1, 7, 15, 17, 20, 25),
(18, 'Zulifah', 1, 1, 6, 1, 2, 2, 10, 15, 18, 21, 27),
(19, 'Yana Pur', 1, 2, 6, 2, 2, 1, 10, 14, 18, 20, 27),
(20, 'Rohmah', 1, 2, 6, 1, 2, 2, 10, 14, 18, 21, 25),
(21, 'Hatimah', 2, 1, 3, 1, 1, 2, 9, 14, 17, 20, 25),
(22, 'Mastora', 2, 1, 3, 2, 1, 2, 10, 11, 16, 20, 24),
(23, 'Darkasi', 2, 1, 5, 2, 1, 1, 10, 11, 16, 21, 24),
(24, 'Makmur', 2, 2, 5, 2, 1, 1, 10, 14, 17, 19, 27),
(25, 'Masitah', 1, 2, 6, 2, 1, 1, 10, 14, 16, 20, 25),
(26, 'Ngatmiya', 1, 2, 6, 1, 2, 2, 10, 13, 17, 22, 25),
(27, 'Noryana', 1, 2, 6, 1, 2, 2, 10, 12, 17, 20, 24),
(28, 'Jati', 2, 1, 3, 1, 2, 1, 10, 15, 18, 19, 27),
(29, 'Rusita', 2, 2, 6, 2, 1, 1, 7, 12, 16, 20, 25),
(30, 'Ruhaidah', 1, 2, 6, 2, 1, 2, 10, 14, 18, 20, 27),
(31, 'Lestari', 1, 2, 6, 2, 1, 2, 10, 14, 17, 20, 24),
(32, 'Siti', 2, 2, 6, 2, 2, 1, 10, 12, 17, 21, 25),
(33, 'Siti Zuba', 2, 1, 6, 1, 2, 2, 8, 12, 17, 21, 24),
(34, 'Dwi Sri U', 1, 2, 6, 1, 2, 2, 8, 12, 18, 21, 26),
(35, 'Sukirah', 2, 2, 6, 1, 2, 1, 10, 13, 17, 19, 27),
(36, 'Fitria', 2, 2, 6, 2, 2, 1, 10, 11, 17, 20, 24),
(37, 'Ita', 1, 2, 6, 2, 1, 2, 9, 14, 17, 20, 25),
(38, 'Diana', 1, 1, 6, 1, 2, 2, 10, 12, 18, 22, 25),
(39, 'Muhamad', 2, 1, 6, 1, 2, 1, 10, 14, 18, 20, 26),
(40, 'Karsi', 1, 1, 6, 1, 2, 2, 10, 11, 17, 20, 24),
(41, 'Asnah', 1, 2, 6, 2, 2, 1, 7, 12, 17, 20, 27),
(42, 'Djamila', 2, 2, 4, 1, 2, 2, 10, 13, 17, 21, 27),
(43, 'Warsi', 1, 1, 6, 2, 1, 1, 10, 14, 18, 20, 25),
(44, 'Astutik', 1, 2, 6, 1, 2, 2, 10, 14, 18, 21, 25),
(45, 'Waisandi', 2, 2, 4, 1, 1, 2, 9, 14, 17, 20, 24),
(46, 'Siti Zul', 1, 1, 6, 2, 2, 2, 10, 12, 16, 20, 24),
(47, 'Sapardi', 2, 2, 3, 1, 2, 1, 10, 11, 16, 21, 24),
(48, 'Napsiah', 2, 2, 6, 1, 1, 1, 10, 14, 17, 19, 27),
(49, 'Norlenah', 1, 1, 6, 1, 1, 2, 9, 15, 17, 20, 25),
(50, 'Rasli Mafe', 2, 1, 3, 2, 2, 1, 10, 14, 16, 20, 24);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_ktr` int(11) NOT NULL,
  `nama_ktr` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_bk` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_ktr`, `nama_ktr`, `nilai_bk`) VALUES
(1, 'Ibu Hamil', 0.5),
(2, 'Balita', 0.3),
(3, 'Lansia', 0.5),
(4, 'Anak SD', 0.3),
(5, 'Anak SMP', 0.3),
(6, 'Anak SMA', 0.3),
(7, 'Penyandang Disabilitas', 0.5),
(8, 'Pekerjaan', 0.3),
(9, 'Status Rumah', 0.4),
(10, 'Jumlah Anggota Keluarga', 0.3),
(11, 'Aset Kepemilikan', 0.2);

-- --------------------------------------------------------

--
-- Table structure for table `pivot_ktr_sub`
--

CREATE TABLE `pivot_ktr_sub` (
  `id_ktr` int(11) NOT NULL,
  `id_sub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pivot_ktr_sub`
--

INSERT INTO `pivot_ktr_sub` (`id_ktr`, `id_sub`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(7, 7),
(7, 8),
(7, 9),
(7, 10),
(8, 11),
(8, 12),
(8, 13),
(8, 14),
(8, 15),
(9, 16),
(9, 17),
(9, 18),
(10, 19),
(10, 20),
(10, 21),
(10, 22),
(10, 23),
(11, 24),
(11, 25),
(11, 26),
(11, 27);

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id_sub` int(11) NOT NULL,
  `nama_sub` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot_sub` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`id_sub`, `nama_sub`, `bobot_sub`) VALUES
(1, 'Ada', 1),
(2, 'Tidak Ada', 0.5),
(3, 'Umur > 70 tahun', 1),
(4, 'Umur 65-69 tahun', 0.75),
(5, 'Umur 60-64 tahun', 0.5),
(6, 'umur <= 59 tahun', 0.25),
(7, 'Disabilitas Berat', 1),
(8, 'Disabilitas Mental', 0.75),
(9, 'Disabilitas Fisik', 0.5),
(10, 'Tidak memiliki kriteria disabilitas', 0.25),
(11, 'Pengangguran', 1),
(12, 'Pedagang Kecil', 0.75),
(13, 'Pedagang Besar', 0.5),
(14, 'Buruh/Karyawan', 0.25),
(15, 'PNS/POLRI/BUMN/BUMD', 0),
(16, 'Menumpang', 0.75),
(17, 'Menyewa', 0.5),
(18, 'Milik Sendiri', 0.25),
(19, '>= 7 orang', 1),
(20, '5-6 orang', 0.75),
(21, '3-4 orang', 0.5),
(22, '1-2 orang', 0.25),
(23, 'sendiri/sebatang kara', 0),
(24, 'Tidak memiliki aset', 1),
(25, 'Barang elektronik (AC,Pemanas air,Komputer)', 0.75),
(26, 'Emas atau perhiasan(senilai 10 gram)', 0.5),
(27, 'Kendaraan umum(mobil,motor)', 0.25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alt`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_ktr`);

--
-- Indexes for table `pivot_ktr_sub`
--
ALTER TABLE `pivot_ktr_sub`
  ADD KEY `id_ktr` (`id_ktr`),
  ADD KEY `id_sub` (`id_sub`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`id_sub`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_ktr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pivot_ktr_sub`
--
ALTER TABLE `pivot_ktr_sub`
  ADD CONSTRAINT `pivot_ktr_sub_ibfk_1` FOREIGN KEY (`id_ktr`) REFERENCES `kriteria` (`id_ktr`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pivot_ktr_sub_ibfk_2` FOREIGN KEY (`id_sub`) REFERENCES `subkriteria` (`id_sub`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
