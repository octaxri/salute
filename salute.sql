-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2019 at 03:00 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salute`
--

-- --------------------------------------------------------

--
-- Table structure for table `kejuruan`
--

CREATE TABLE `kejuruan` (
  `id_kejuruan` int(11) NOT NULL,
  `nama_kejuruan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kuisioner_a`
--

CREATE TABLE `kuisioner_a` (
  `id_kuisionerA` int(11) NOT NULL,
  `soalA` text NOT NULL,
  `jawaban1A` varchar(100) NOT NULL,
  `jawaban2A` varchar(100) NOT NULL,
  `jawaban3A` varchar(100) NOT NULL,
  `jawaban4A` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kuisioner_b`
--

CREATE TABLE `kuisioner_b` (
  `id_kuisionerB` int(11) NOT NULL,
  `jenis_soal` int(11) NOT NULL,
  `soalB` text NOT NULL,
  `jawaban1B` int(11) NOT NULL,
  `jawaban2B` int(11) NOT NULL,
  `jawaban3B` int(11) NOT NULL,
  `jawaban4B` int(11) NOT NULL,
  `jawaban5B` int(11) NOT NULL,
  `tipe_soal` enum('pg','uraian') NOT NULL,
  `sub_soal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kuisioner_c`
--

CREATE TABLE `kuisioner_c` (
  `id_kuisionerC` int(11) NOT NULL,
  `jenis_soal` int(11) NOT NULL,
  `soalC` text NOT NULL,
  `jawaban1C` int(11) NOT NULL,
  `jawaban2C` int(11) NOT NULL,
  `jawaban3C` int(11) NOT NULL,
  `jawaban4C` int(11) NOT NULL,
  `tipe_soal` enum('pg','uraian') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengajar`
--

CREATE TABLE `pengajar` (
  `id_pengajar` int(11) NOT NULL,
  `nama_pengajar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id_program` int(11) NOT NULL,
  `id_kejuruan` int(11) NOT NULL,
  `nama_kejuruan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sub_soal`
--

CREATE TABLE `sub_soal` (
  `id_sub_soal` int(11) NOT NULL,
  `nama_sub_soal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `pendidikan` enum('SD','SMP/SLTP','SMA/SMK/SLTA','DIPLOMA','S1','S2','S3') NOT NULL,
  `pekerjaan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kejuruan`
--
ALTER TABLE `kejuruan`
  ADD PRIMARY KEY (`id_kejuruan`);

--
-- Indexes for table `kuisioner_a`
--
ALTER TABLE `kuisioner_a`
  ADD PRIMARY KEY (`id_kuisionerA`);

--
-- Indexes for table `kuisioner_b`
--
ALTER TABLE `kuisioner_b`
  ADD PRIMARY KEY (`id_kuisionerB`);

--
-- Indexes for table `kuisioner_c`
--
ALTER TABLE `kuisioner_c`
  ADD PRIMARY KEY (`id_kuisionerC`);

--
-- Indexes for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`id_pengajar`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id_program`),
  ADD KEY `id_kejuruan` (`id_kejuruan`);

--
-- Indexes for table `sub_soal`
--
ALTER TABLE `sub_soal`
  ADD PRIMARY KEY (`id_sub_soal`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kejuruan`
--
ALTER TABLE `kejuruan`
  MODIFY `id_kejuruan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kuisioner_a`
--
ALTER TABLE `kuisioner_a`
  MODIFY `id_kuisionerA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kuisioner_b`
--
ALTER TABLE `kuisioner_b`
  MODIFY `id_kuisionerB` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kuisioner_c`
--
ALTER TABLE `kuisioner_c`
  MODIFY `id_kuisionerC` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengajar`
--
ALTER TABLE `pengajar`
  MODIFY `id_pengajar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id_program` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_soal`
--
ALTER TABLE `sub_soal`
  MODIFY `id_sub_soal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
