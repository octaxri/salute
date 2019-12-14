-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2019 at 08:32 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

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
-- Table structure for table `bobot`
--

CREATE TABLE `bobot` (
  `id_bobot` int(11) NOT NULL,
  `nilai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bobot`
--

INSERT INTO `bobot` (`id_bobot`, `nilai`) VALUES
(7, '5.0'),
(8, '5.0');

-- --------------------------------------------------------

--
-- Table structure for table `bobot_nilai`
--

CREATE TABLE `bobot_nilai` (
  `id` int(11) NOT NULL,
  `jenis_penilaian` enum('a','b','c') NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pengajar`
--

CREATE TABLE `detail_pengajar` (
  `id` int(11) NOT NULL,
  `kd_pelatihan` char(15) NOT NULL,
  `id_pengajar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pengajar`
--

INSERT INTO `detail_pengajar` (`id`, `kd_pelatihan`, `id_pengajar`) VALUES
(4, '2019-00000002', 1),
(5, '2019-00000002', 4),
(6, '2019-00000001', 2),
(7, '2019-00000004', 2),
(8, '2019-00000004', 4);

-- --------------------------------------------------------

--
-- Table structure for table `detail_penilaian_b`
--

CREATE TABLE `detail_penilaian_b` (
  `id` int(11) NOT NULL,
  `id_penilaian_b` int(11) NOT NULL,
  `id_pengajar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_penilaian_b`
--

INSERT INTO `detail_penilaian_b` (`id`, `id_penilaian_b`, `id_pengajar`) VALUES
(1, 42, 2),
(2, 44, 6);

-- --------------------------------------------------------

--
-- Table structure for table `detail_peserta`
--

CREATE TABLE `detail_peserta` (
  `id` int(11) NOT NULL,
  `kd_pelatihan` char(15) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_peserta`
--

INSERT INTO `detail_peserta` (`id`, `kd_pelatihan`, `id_user`) VALUES
(3, '2019-00000001', 4),
(5, '2019-00000002', 4),
(6, '2019-00000002', 5),
(7, '2019-00000003', 5),
(8, '2019-00000003', 6),
(9, '2019-00000002', 7),
(10, '2019-00000003', 7),
(11, '2019-00000004', 8);

-- --------------------------------------------------------

--
-- Table structure for table `kejuruan`
--

CREATE TABLE `kejuruan` (
  `id_kejuruan` int(11) NOT NULL,
  `nama_kejuruan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kejuruan`
--

INSERT INTO `kejuruan` (`id_kejuruan`, `nama_kejuruan`) VALUES
(2, 'Fashion Tech'),
(4, 'Bisnis Manajemen');

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

--
-- Dumping data for table `kuisioner_a`
--

INSERT INTO `kuisioner_a` (`id_kuisionerA`, `soalA`, `jawaban1A`, `jawaban2A`, `jawaban3A`, `jawaban4A`) VALUES
(3, 'Bagaimana pendapat Saudara tentang kesesuaian persyaratan pelayanan dengan jenis pelayanannya', 'Tidak sesuai', 'Kurang Sesuai', 'Sesuai', 'Sangat sesuai.'),
(4, 'Bagaimana pemahaman Saudara tentang kemudahan prosedur pelayanan di unit ini.', 'Tidak mudah', 'Kurang Mudah', 'Mudah', 'Sangat Mudah'),
(5, 'Bagaimana pendapat Saudara tentang kecepatan waktu dalam memberikan pelayanan', 'Tidak Cepat', 'Kurang Cepat', 'Cepat', 'Sangat Cepat');

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

--
-- Dumping data for table `kuisioner_b`
--

INSERT INTO `kuisioner_b` (`id_kuisionerB`, `jenis_soal`, `soalB`, `jawaban1B`, `jawaban2B`, `jawaban3B`, `jawaban4B`, `jawaban5B`, `tipe_soal`, `sub_soal`) VALUES
(26, 1, 'Tulisan di dalam materi pelatihan jelas dan mudah di baca', 5, 4, 3, 2, 1, 'pg', 4),
(27, 1, 'Kualitas materi pelatihan dapat menambah tingkat ketrampilan dan pengetahuan anda', 5, 4, 3, 2, 1, 'pg', 4),
(28, 1, ' Tahapan materi pelatihan sudah berurutan dari materi tingkat dasar sampai dengan materi tingkat lanjut', 5, 4, 3, 2, 1, 'pg', 4),
(29, 1, 'Komentar / saran tentang materi pelatihan :', 0, 0, 0, 0, 0, 'uraian', 8),
(30, 3, 'Workshop yang ada telah memiliki kelengkapan alat/mesin untuk praktek dengan jumlah yang cukup', 1, 2, 3, 4, 5, 'pg', 1),
(31, 3, 'Peralatan dan mesin di workshop dalam kondisi baik dan siap pakai', 1, 2, 3, 4, 5, 'pg', 1),
(32, 3, 'Workshop dilengkapi intruksi & prosedur cara penggunaan alat/mesin', 1, 2, 3, 4, 5, 'pg', 1),
(33, 3, 'Kelengkapan P3K di workshop tersedia', 1, 2, 3, 4, 5, 'pg', 1),
(34, 3, 'Kelengkapan alat pelindung diri tersedia', 1, 2, 3, 4, 5, 'pg', 1),
(35, 3, 'Kelengkapan alat kebersihan tersedia dan kondisi baik', 1, 2, 3, 4, 5, 'pg', 1),
(36, 3, 'Kondisi ruang teori dalam keadaan baik, nyaman dan bersih', 1, 2, 3, 4, 5, 'pg', 2),
(37, 3, 'Diruang teori tersedia alat/media pelatihan dalam kondisi baik', 1, 2, 3, 4, 5, 'pg', 2),
(38, 3, 'Meja dan kursi bagi instruktur dan peserta tersedia dalam kondisi baik dan cukup', 1, 2, 3, 4, 5, 'pg', 2),
(39, 3, 'Kelengkapan alat kebersihan tersedia dan kondisi baik', 1, 2, 3, 4, 5, 'pg', 2),
(40, 3, 'Sumber listrik untuk peralatan pelatihan dalam keadaan cukup', 1, 2, 3, 4, 5, 'pg', 5),
(41, 3, 'Penerangan lampu pada ruangan pelatihan dan bengkel dalam kondisi cukup dan baik', 1, 2, 3, 4, 5, 'pg', 5),
(42, 3, ' Air bersih cukup tersedia', 1, 2, 3, 4, 5, 'pg', 6),
(43, 3, 'Kamar mandi/toilet dalam kondisi bersih, wangi dan tidak licin', 1, 2, 3, 4, 5, 'pg', 6),
(44, 3, 'Kran yang terpasang kondisinya baik', 1, 2, 3, 4, 5, 'pg', 6),
(45, 3, 'Perlengkapan kamar mandi dan toilet tersedia', 1, 2, 3, 4, 5, 'pg', 6),
(46, 3, 'Sarana ibadah bersih dan dilengkapi dengan perlengkapan ibadah', 1, 2, 3, 4, 5, 'pg', 7),
(47, 3, 'Sarana olah raga yang memadai', 1, 2, 3, 4, 5, 'pg', 7),
(48, 3, 'Layanan kesehatan yang memadai', 1, 2, 3, 4, 5, 'pg', 7),
(49, 3, 'Perpustakaan berisi buku-buku penunjang pelatihan', 1, 2, 3, 4, 5, 'pg', 7),
(50, 3, 'Komentar / saran tentang Sarana Prasarana :', 0, 0, 0, 0, 0, 'uraian', 8),
(51, 4, 'Ketersediaan bahan latihan yang digunakan', 1, 2, 3, 4, 5, 'pg', 4),
(52, 4, 'Modul pelatihan yang diterimakan peserta (secara umum)', 1, 2, 3, 4, 5, 'pg', 4),
(53, 4, 'Alat tulis / kelengkapan yang diterima peserta', 1, 2, 3, 4, 5, 'pg', 4),
(54, 4, 'Seragam yang diterima peserta (kondisi umum : ukuran, jenis bahan , kenyamanan dalam pemakaian)', 1, 2, 3, 4, 5, 'pg', 4),
(55, 4, 'Komentar / saran tentang Bahan Latihan, Modul, ATK, dan Seragam Peserta :', 0, 0, 0, 0, 0, 'uraian', 8),
(56, 5, 'Berapa unit Kompetensi yang harus saudara laksanakan pada program pelatihan yang sedang diikuti sekarang ini..', 0, 0, 0, 0, 0, 'pg', 4),
(57, 5, 'Sampai dengan saat ini sudah berapa unit kompetensi yang saudara ikuti?', 0, 0, 0, 0, 0, 'pg', 4),
(58, 2, 'Bagaimana Sikap anda ?', 1, 2, 3, 4, 5, 'pg', 4),
(59, 2, 'gimana ?', 0, 0, 0, 0, 0, 'uraian', 8);

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

--
-- Dumping data for table `kuisioner_c`
--

INSERT INTO `kuisioner_c` (`id_kuisionerC`, `jenis_soal`, `soalC`, `jawaban1C`, `jawaban2C`, `jawaban3C`, `jawaban4C`, `tipe_soal`) VALUES
(7, 1, 'Secara umum Pelaksanaan rekruitmen di daerah asal oleh petugas rekruit.', 1, 2, 3, 4, 'pg'),
(15, 1, 'Pemberitahuan / informasi tentang program pelatihan boarding yang diterima oleh peserta.', 1, 2, 3, 4, 'pg'),
(16, 1, 'Kemudahan dalam memenuhi persyaratan yang harus dipenuhi calon peserta.', 1, 2, 3, 4, 'pg'),
(17, 1, 'Perjalanan dari daerah asal peserta ke Bandara asal peserta.', 1, 2, 3, 4, 'pg'),
(18, 1, 'Perjalanan dari bandara Semarang ke BBPLK Semarang.', 1, 2, 3, 4, 'pg'),
(19, 1, 'Akomodasi dan konsumsi yang diterima selama perjalanan.', 1, 2, 3, 4, 'pg'),
(20, 1, 'Kenyamanan selama perjalanan.', 1, 2, 3, 4, 'pg'),
(21, 1, 'Yang berkenaan dengan rekruitmen peserta', 0, 0, 0, 0, 'uraian'),
(22, 1, 'Yang berkenaan dengan perjalanan dari daerah asal ke BBPLK Semarang peserta', 0, 0, 0, 0, 'uraian'),
(23, 1, 'Yang berkenaan dengan persyaratan yang harus dipenuhi peserta.', 0, 0, 0, 0, 'uraian'),
(24, 2, 'Penerimaan peserta setelah sampai di BBPLK Semarang (oleh security atau petugas asrama)', 1, 2, 3, 4, 'pg'),
(25, 2, 'Pembagian kamar sudah sesuai dengan keinginan peserta', 1, 2, 3, 4, 'pg'),
(26, 2, 'Ada petugas yang mengarahkan pada saat peserta sampai di asrama', 1, 2, 3, 4, 'pg'),
(27, 2, 'Keramahan petugas pada saat kedatangan peserta di BBPLK Semarang', 1, 2, 3, 4, 'pg'),
(28, 2, 'Yang berkenaan dengan penyambutan peserta', 0, 0, 0, 0, 'uraian'),
(29, 2, 'Yang berkenaan dengan pembagian kamar', 0, 0, 0, 0, 'uraian'),
(30, 3, 'Kondisi kamar menurut anda (jumlah bed, penataan, kebersihan, tata udara, pencahayaan)', 1, 2, 3, 4, 'pg'),
(31, 3, 'Kondisi kamar mandi (kebersihan, air, wc, tata udara, pencahayaan)', 1, 2, 3, 4, 'pg'),
(32, 3, 'Kondisi asrama secara umum', 1, 2, 3, 4, 'pg'),
(33, 3, 'Kondisi ruang kelas (kebersihan, tata udara, pencahayaan)', 1, 2, 3, 4, 'pg'),
(34, 3, 'Kondisi lingkungan secara umum', 1, 2, 3, 4, 'pg'),
(35, 3, 'Yang berkenaan dengan sarana dan prasarana', 0, 0, 0, 0, 'uraian'),
(36, 4, 'Variasi menu yang disajikan', 1, 2, 3, 4, 'pg'),
(37, 4, 'Cita rasa menu secara umum', 1, 2, 3, 4, 'pg'),
(38, 4, 'Kebersihan dalam proses pengolahan sampai penyajian', 1, 2, 3, 4, 'pg'),
(39, 4, 'Cara penyajian', 1, 2, 3, 4, 'pg'),
(40, 4, 'Kebersihan alat makan\r\n', 1, 2, 3, 4, 'pg'),
(41, 4, 'Kondisi ruang makan (kebersihan, tata udara, pencahayaan)', 1, 2, 3, 4, 'pg'),
(42, 4, 'Jumlah makanan yang dihidangkan', 1, 2, 3, 4, 'pg'),
(43, 4, 'Yang berkenaan dengan konsumsi', 0, 0, 0, 0, 'uraian'),
(44, 5, 'Ketersediaan bahan latihan yang digunakan', 1, 2, 3, 4, 'pg'),
(45, 5, 'Modul pelatihan yang diterimakan peserta (secara umum)', 1, 2, 3, 4, 'pg'),
(46, 5, 'Alat tulis / kelengkapan yang diterima peserta', 1, 2, 3, 4, 'pg'),
(47, 5, 'Seragam yang diterima peserta. (kondisi umum : ukuran, jenis bahan, kenyamanan dalam pemakaian)', 1, 2, 3, 4, 'pg'),
(48, 5, 'Yang berkenaan dengan bahan latihan, modul, ATK, dan seragam peserta', 0, 0, 0, 0, 'uraian'),
(49, 6, 'Secara umum pelaksanaan Uji Kompetensi yang dilaksanakan setelah mengikuti pelatihan (Kesesuaian materi uji, kemudahan dalam mengerjakan soal, waktu pengerjaan soal, kesiapan dalam UJK)', 1, 2, 3, 4, 'pg'),
(50, 6, 'Yang berkenaan dengan pelaksanaan UJK', 0, 0, 0, 0, 'uraian'),
(51, 7, 'Secara umum pelaksanaan pelatihan Boarding yang dilaksanakan BBPLK Semarang menurut saudara', 1, 2, 3, 4, 'pg'),
(52, 7, 'Pelaksanaan pelatihan Boarding secara umum', 0, 0, 0, 0, 'uraian');

-- --------------------------------------------------------

--
-- Table structure for table `pelatihan`
--

CREATE TABLE `pelatihan` (
  `kd_pelatihan` char(15) NOT NULL,
  `id_kejuruan` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `tgl_mulai_pelatihan` date NOT NULL,
  `tgl_akhir_pelatihan` date NOT NULL,
  `tahap_pelatihan` int(11) NOT NULL,
  `kelas_pelatihan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelatihan`
--

INSERT INTO `pelatihan` (`kd_pelatihan`, `id_kejuruan`, `id_program`, `tgl_mulai_pelatihan`, `tgl_akhir_pelatihan`, `tahap_pelatihan`, `kelas_pelatihan`) VALUES
('2019-00000001', 2, 16, '2019-12-01', '2019-12-03', 1, 1),
('2019-00000002', 2, 16, '2019-12-01', '2019-12-03', 1, 2),
('2019-00000003', 2, 16, '2019-12-06', '2019-12-17', 2, 2),
('2019-00000004', 4, 18, '2019-12-11', '2019-12-31', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengajar`
--

CREATE TABLE `pengajar` (
  `id_pengajar` int(11) NOT NULL,
  `nama_pengajar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajar`
--

INSERT INTO `pengajar` (`id_pengajar`, `nama_pengajar`) VALUES
(1, 'Fajar Hidayat'),
(2, 'Dhimas Budi'),
(4, 'Bayu Dwi'),
(5, 'Andi'),
(6, ' Pardi');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_a`
--

CREATE TABLE `penilaian_a` (
  `id` int(11) NOT NULL,
  `kd_pelatihan` char(15) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_soalA` int(11) NOT NULL,
  `jawaban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian_a`
--

INSERT INTO `penilaian_a` (`id`, `kd_pelatihan`, `id_user`, `id_soalA`, `jawaban`) VALUES
(8, '2019-00000003', 5, 3, 1),
(9, '2019-00000003', 5, 4, 1),
(10, '2019-00000003', 5, 5, 2),
(11, '2019-00000003', 6, 3, 1),
(12, '2019-00000003', 6, 4, 2),
(13, '2019-00000003', 6, 5, 2),
(14, '2019-00000004', 8, 3, 1),
(15, '2019-00000004', 8, 4, 3),
(16, '2019-00000004', 8, 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_b`
--

CREATE TABLE `penilaian_b` (
  `id` int(11) NOT NULL,
  `kd_pelatihan` char(15) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_soalB` int(11) NOT NULL,
  `jawaban` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian_b`
--

INSERT INTO `penilaian_b` (`id`, `kd_pelatihan`, `id_user`, `id_soalB`, `jawaban`) VALUES
(39, '2019-00000003', 7, 58, '1'),
(40, '2019-00000003', 7, 59, 'dafafsf'),
(41, '2019-00000003', 7, 58, '1'),
(42, '2019-00000003', 7, 59, 'dafafsf'),
(43, '2019-00000003', 7, 58, '4'),
(44, '2019-00000003', 7, 59, 'dasdsd');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_c`
--

CREATE TABLE `penilaian_c` (
  `id` int(11) NOT NULL,
  `kd_pelatihan` char(15) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_soalC` int(11) NOT NULL,
  `jawaban` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id_program` int(11) NOT NULL,
  `id_kejuruan` int(11) NOT NULL,
  `nama_program` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id_program`, `id_kejuruan`, `nama_program`) VALUES
(16, 2, 'Operator Bordir'),
(18, 4, 'Operator Service');

-- --------------------------------------------------------

--
-- Table structure for table `sub_soal`
--

CREATE TABLE `sub_soal` (
  `id_sub_soal` int(11) NOT NULL,
  `nama_sub_soal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_soal`
--

INSERT INTO `sub_soal` (`id_sub_soal`, `nama_sub_soal`) VALUES
(1, 'A'),
(2, 'B'),
(4, 'Tidak Ada'),
(5, 'C'),
(6, 'D'),
(7, 'E'),
(8, 'Uraian');

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
  `pekerjaan` varchar(100) NOT NULL,
  `is_level` int(11) NOT NULL,
  `tipe_peserta` enum('Menginap','Pulang') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `email`, `jk`, `tgl_lahir`, `pendidikan`, `pekerjaan`, `is_level`, `tipe_peserta`) VALUES
(3, 'fajarhgl', '$2y$10$tQKN5bGmshT8aQoPnBEhwOkD/PdpYteph0XVA0dq6eHh22eACAVoe', '', 'fajarhdytt30@gmail.com', '', '0000-00-00', '', '', 1, ''),
(4, 'fajarhgl1', '$2y$10$WD3t4nCuezWpWKtBTZyr0uX8J64USxgq3DJvqNK2vy8Od0p1CIkb2', 'Fajar Hidayat', 'fajarhdyt30@gmail.com', 'P', '2019-12-06', 'S1', 'Programmer', 0, 'Pulang'),
(5, 'dhimas23', '$2y$10$gq4mbeMP8mAlkD1tz.obhOpO.qiqt6aCJXSAF.8to/RRtxyipdGgi', 'dhimas', 'dhimasputrabudhi@gmail.com', 'L', '2019-10-03', 'S1', 'rere', 0, 'Pulang'),
(6, 'dhimas', '$2y$10$atOD0qvokstCIpJKPjln.uXrV1i4MfwhLrl.IehW5T.2lKnAteMjC', 'b', 'b@gmail.com', 'L', '2019-12-01', 'S1', 'nknk', 0, 'Menginap'),
(7, 'dhimasputra230795', '$2y$10$hLOutSjcbRRb6gFs9h9dmuV1UF0s6g7duPuYX9EnyVCFc59Hw.8O2', 'dhimas putra buhdi', 'balapkereto@gmail.com', 'L', '2019-12-01', 'S1', 'gege', 0, 'Menginap'),
(8, 'kereto', '$2y$10$MlZYGJtXo96AsoPKR4MxquBiDjOTH2HogE6j78fRwmQfLs6BRe6wy', 'wedos', 'l@gmail.com', 'L', '2019-12-02', 'S1', 'sdfds', 0, 'Menginap');

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
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(1, 'fajarhdytt30@gmail.com', 'iMjTnBXB6wUCCbu5Z0sOEvBRkRWxO0vkQLuHLz4VN20=', 1574862470),
(2, 'fajarhdytt30@gmail.com', 'D81OFLN7bkVjb14jPB46OjHYa7ZDxwqLrrxd6zVmpcU=', 1575098724),
(3, 'fajarhdytt30@gmail.com', 'p4435MLpvUU9Tb+k8kNOHBoY+MdOvzQAAht+Uc5aaVw=', 1575098819),
(4, 'fajarhdytt30@gmail.com', 'BPaK2Rf/G0yBiMd2ipxB8h8UMuuR8prkP5tfLeBZ0n4=', 1575098870);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bobot`
--
ALTER TABLE `bobot`
  ADD PRIMARY KEY (`id_bobot`);

--
-- Indexes for table `bobot_nilai`
--
ALTER TABLE `bobot_nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_pengajar`
--
ALTER TABLE `detail_pengajar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kd_pelatihan` (`kd_pelatihan`),
  ADD KEY `id_pengajar` (`id_pengajar`);

--
-- Indexes for table `detail_penilaian_b`
--
ALTER TABLE `detail_penilaian_b`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_penilaian_b` (`id_penilaian_b`),
  ADD KEY `id_pengajar` (`id_pengajar`);

--
-- Indexes for table `detail_peserta`
--
ALTER TABLE `detail_peserta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kd_pelatihan` (`kd_pelatihan`),
  ADD KEY `id_user` (`id_user`);

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
  ADD PRIMARY KEY (`id_kuisionerB`),
  ADD KEY `sub_soal` (`sub_soal`);

--
-- Indexes for table `kuisioner_c`
--
ALTER TABLE `kuisioner_c`
  ADD PRIMARY KEY (`id_kuisionerC`);

--
-- Indexes for table `pelatihan`
--
ALTER TABLE `pelatihan`
  ADD PRIMARY KEY (`kd_pelatihan`),
  ADD KEY `id_program` (`id_program`),
  ADD KEY `id_kejuruan` (`id_kejuruan`);

--
-- Indexes for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`id_pengajar`);

--
-- Indexes for table `penilaian_a`
--
ALTER TABLE `penilaian_a`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kd_pelatihan` (`kd_pelatihan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_soalA` (`id_soalA`);

--
-- Indexes for table `penilaian_b`
--
ALTER TABLE `penilaian_b`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kd_pelatihan` (`kd_pelatihan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_soalB` (`id_soalB`);

--
-- Indexes for table `penilaian_c`
--
ALTER TABLE `penilaian_c`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kd_pelatihan` (`kd_pelatihan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_soalC` (`id_soalC`);

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
-- AUTO_INCREMENT for table `bobot`
--
ALTER TABLE `bobot`
  MODIFY `id_bobot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bobot_nilai`
--
ALTER TABLE `bobot_nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_pengajar`
--
ALTER TABLE `detail_pengajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `detail_penilaian_b`
--
ALTER TABLE `detail_penilaian_b`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_peserta`
--
ALTER TABLE `detail_peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kejuruan`
--
ALTER TABLE `kejuruan`
  MODIFY `id_kejuruan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kuisioner_a`
--
ALTER TABLE `kuisioner_a`
  MODIFY `id_kuisionerA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kuisioner_b`
--
ALTER TABLE `kuisioner_b`
  MODIFY `id_kuisionerB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `kuisioner_c`
--
ALTER TABLE `kuisioner_c`
  MODIFY `id_kuisionerC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `pengajar`
--
ALTER TABLE `pengajar`
  MODIFY `id_pengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `penilaian_a`
--
ALTER TABLE `penilaian_a`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `penilaian_b`
--
ALTER TABLE `penilaian_b`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `penilaian_c`
--
ALTER TABLE `penilaian_c`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sub_soal`
--
ALTER TABLE `sub_soal`
  MODIFY `id_sub_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pengajar`
--
ALTER TABLE `detail_pengajar`
  ADD CONSTRAINT `detail_pengajar_ibfk_1` FOREIGN KEY (`id_pengajar`) REFERENCES `pengajar` (`id_pengajar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pengajar_ibfk_2` FOREIGN KEY (`kd_pelatihan`) REFERENCES `pelatihan` (`kd_pelatihan`);

--
-- Constraints for table `detail_penilaian_b`
--
ALTER TABLE `detail_penilaian_b`
  ADD CONSTRAINT `detail_penilaian_b_ibfk_1` FOREIGN KEY (`id_penilaian_b`) REFERENCES `penilaian_b` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_penilaian_b_ibfk_2` FOREIGN KEY (`id_pengajar`) REFERENCES `pengajar` (`id_pengajar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_peserta`
--
ALTER TABLE `detail_peserta`
  ADD CONSTRAINT `detail_peserta_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_peserta_ibfk_2` FOREIGN KEY (`kd_pelatihan`) REFERENCES `pelatihan` (`kd_pelatihan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pelatihan`
--
ALTER TABLE `pelatihan`
  ADD CONSTRAINT `pelatihan_ibfk_1` FOREIGN KEY (`id_kejuruan`) REFERENCES `kejuruan` (`id_kejuruan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pelatihan_ibfk_2` FOREIGN KEY (`id_program`) REFERENCES `program` (`id_program`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penilaian_a`
--
ALTER TABLE `penilaian_a`
  ADD CONSTRAINT `penilaian_a_ibfk_1` FOREIGN KEY (`kd_pelatihan`) REFERENCES `pelatihan` (`kd_pelatihan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_a_ibfk_2` FOREIGN KEY (`id_soalA`) REFERENCES `kuisioner_a` (`id_kuisionerA`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_a_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penilaian_b`
--
ALTER TABLE `penilaian_b`
  ADD CONSTRAINT `penilaian_b_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_b_ibfk_2` FOREIGN KEY (`id_soalB`) REFERENCES `kuisioner_b` (`id_kuisionerB`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_b_ibfk_3` FOREIGN KEY (`kd_pelatihan`) REFERENCES `pelatihan` (`kd_pelatihan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penilaian_c`
--
ALTER TABLE `penilaian_c`
  ADD CONSTRAINT `penilaian_c_ibfk_1` FOREIGN KEY (`kd_pelatihan`) REFERENCES `pelatihan` (`kd_pelatihan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_c_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_c_ibfk_3` FOREIGN KEY (`id_soalC`) REFERENCES `kuisioner_c` (`id_kuisionerC`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `program_ibfk_2` FOREIGN KEY (`id_kejuruan`) REFERENCES `kejuruan` (`id_kejuruan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
