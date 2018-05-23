-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2018 at 02:27 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seluler_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user`, `pass`, `email`, `gambar`, `status`) VALUES
(1, 'Nurul Ihsan', 'nurulihsan', 'nurulihsan50@gmail.com', 'ihsan.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_karyawan`
--

CREATE TABLE `data_karyawan` (
  `nip` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `gaji` int(50) NOT NULL,
  `departemen` varchar(100) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_karyawan`
--

INSERT INTO `data_karyawan` (`nip`, `nama`, `gambar`, `alamat`, `gaji`, `departemen`, `sex`, `status`, `no_telp`) VALUES
('PEG-0001', 'M Nurul Ihsan', 'ihsan.jpg', 'Jl Purwakarta 5 no 8, Antapani, Bandung.', 3000000, 'Information Technology', 'Laki-Laki', 'Tetap', '085212139702'),
('PEG-0002', 'Hary Armando', 'hary.jpg', 'JL. moh toha no 140 bandung', 2500000, 'Produksi', 'Laki-Laki', 'Kontrak', '081223066846'),
('PEG-0003', 'Syauqi abdillah', 'reza.jpg', 'JL.Merdeka no 30 Bandung', 2500000, 'Jaminan Kualitas', 'Laki-Laki', 'Tetap', '085635889076'),
('PEG-0004', 'arief maulana', 'adipati.jpg', 'jl dipatiukur no 20 bandung', 2000000, 'Kepersonaliaan', 'Perempuan', 'Tetap', '082114098751'),
('PEG-0005', 'ratna juwita', 'raisa.jpg', 'jl gatot subroto bandung', 3000000, 'keuangan', 'perempuan', 'Kontrak', '0895376851993'),
('PEG-0006', 'faisza shalilhah', 'isyana.jpg', 'perum kencana rancaekek, bandung', 2500000, 'Marketing ', 'Perempuan', 'Tetap', '089662568681'),
('PEG-0007', 'Muhammad Ari', 'afgan.jpg', 'jl sindangsari 3, bandung', 2500000, 'produksi', 'laki-laki', 'Kontrak', '085223765145'),
('PEG-0008', 'Siti Maemunah', 'chelsea.jpg', 'jl cicalengka raya, kabupaten bandung', 3000000, 'customer service', 'perempuan', 'Tetap', '089522344995'),
('PEG-0009', 'Jajang khaerudin', 'iqbal.jpg', 'jl ahmad yani no 170, Bandung', 2500000, 'Marketing', 'Laki-Laki', 'Kontrak', '081356117879'),
('PEG-0010', 'Rahma Susilawati', 'bella.png', 'jl jakarta n0 120 Bandung', 2000000, 'Customer Service', 'perempuan', 'Kontrak', '087665112789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  ADD PRIMARY KEY (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
