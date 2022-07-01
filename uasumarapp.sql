-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2022 at 04:38 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uasumarapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nip` varchar(100) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `jk` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `alamat` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip`, `nama`, `jk`, `email`, `alamat`) VALUES
('123235', 'Sokid', 'Laki - laki', 'sokd@email.com', 'Cirebon'),
('123321', 'Wahyu Triyono', 'Laki - laki', 'wahyu@email.com', 'Yogyakarta'),
('123322', 'Fredy Wicaksono', 'Laki - laki', 'fredy@email.com', 'Cirebon'),
('123323', 'Dian Novianti', 'Perempuan', 'dian@email.com', 'Cirebon'),
('123324', 'Supriyono', 'Laki - laki', 'supriyono@email.com', 'Banjarnegara'),
('123325', 'Agus Isa', 'Laki - laki', 'agus@email.com', 'Cirebon'),
('123326', 'Suhana', 'Laki - laki', 'suhana@email.com', 'Cimahi');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `idmahasiswa` int(11) NOT NULL,
  `nim` varchar(100) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `jk` varchar(100) NOT NULL,
  `kode_fakultas` varchar(100) NOT NULL,
  `kode_prodi` varchar(100) NOT NULL,
  `nip_pembimbing1` varchar(100) NOT NULL,
  `nip_pembimbing2` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`idmahasiswa`, `nim`, `nama`, `jk`, `kode_fakultas`, `kode_prodi`, `nip_pembimbing1`, `nip_pembimbing2`, `tanggal_lahir`) VALUES
(3, '12344321', 'Umar Sahid', 'Laki - laki', 'FT', 'TIF', '123325', '123324', '1997-06-15'),
(4, '12344322', 'Faz Halimah', 'Perempuan', 'FT', 'TIF', '123323', '123235', '1999-12-29'),
(5, '12344323', 'Yoga Pratama', 'Laki - laki', 'FT', 'TIF', '123322', '123235', '1998-02-22'),
(6, '12344324', 'Indah Lestari', 'Perempuan', 'FT', 'TIF', '123326', '123321', '1999-02-08');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(11) NOT NULL,
  `nomor_bukti` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `judul_skripsi` text NOT NULL,
  `nim` varchar(100) NOT NULL,
  `nama_mahasiswa` varchar(150) NOT NULL,
  `nama_pembimbing1` varchar(150) NOT NULL,
  `nama_pembimbing2` varchar(150) NOT NULL,
  `file_laporan` text NOT NULL,
  `file_rekomendasi` text NOT NULL,
  `tema_skripsi` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `nomor_bukti`, `tanggal`, `judul_skripsi`, `nim`, `nama_mahasiswa`, `nama_pembimbing1`, `nama_pembimbing2`, `file_laporan`, `file_rekomendasi`, `tema_skripsi`) VALUES
(3, '220221230053', '2022-02-21', 'Aplikasi Pendukung Keputusan Karyawan Teladan', '12344321', 'Umar Sahid', 'Agus Isa', 'Supriyono', 'Umar Sahidfile_laporan.pdf', 'Umar Sahidfile_rekomendasi.pdf', 'spk'),
(4, '220221231657', '2022-02-21', 'Aplikasi Absensi Pegawai', '12344322', 'Faz Halimah', 'Dian Novianti', 'Sokid', 'Faz Halimahfile_laporan.pdf', 'Faz Halimahfile_rekomendasi.pdf', 'spk');

-- --------------------------------------------------------

--
-- Table structure for table `sidang`
--

CREATE TABLE `sidang` (
  `idsidang` int(11) NOT NULL,
  `nomor_bukti` varchar(100) NOT NULL,
  `tanggal_sidang` date NOT NULL,
  `nip_penguji1` varchar(100) NOT NULL,
  `nip_penguji2` varchar(100) NOT NULL,
  `status_sidang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sidang`
--

INSERT INTO `sidang` (`idsidang`, `nomor_bukti`, `tanggal_sidang`, `nip_penguji1`, `nip_penguji2`, `status_sidang`) VALUES
(3, '220221231657', '2022-02-28', '123322', '123325', 'belum sidang'),
(4, '220221230053', '2022-02-26', '123321', '123323', 'belum sidang');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `iduser` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL,
  `rolename` varchar(100) NOT NULL,
  `nim_mahasiswa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`iduser`, `username`, `password`, `rolename`, `nim_mahasiswa`) VALUES
(3, 'admin', '$2y$10$xlqMechB1m/oYB0zI/gsI.q7P3KAfOOMTMTSJCumDb8gq8id9f0JW', 'admin', 'admin'),
(4, 'umarsahid', '$2y$10$aIyd9I0UGeN7DmgXBHL9t.Evrg7eCWXg5ndHB2/xkZWin2X28K.5q', 'mahasiswa', '12344321'),
(5, 'fazhalima', '$2y$10$a2BcZDrr95LredTeBWVExOz1NTgaWZIbMjkRUGyK3rtZwQ4wV.Efu', 'mahasiswa', '12344322');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`idmahasiswa`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sidang`
--
ALTER TABLE `sidang`
  ADD PRIMARY KEY (`idsidang`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `idmahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sidang`
--
ALTER TABLE `sidang`
  MODIFY `idsidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
