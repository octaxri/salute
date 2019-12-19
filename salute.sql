-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2019 at 05:55 PM
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
(11, '2019-00000001', 1),
(12, '2019-00000001', 4),
(13, '2019-00000002', 1),
(14, '2019-00000002', 2),
(15, '2019-00000002', 4);

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
(1, 84, 1),
(2, 85, 1),
(3, 86, 1),
(4, 87, 1),
(5, 88, 1),
(6, 89, 1),
(7, 90, 1),
(8, 91, 1),
(9, 92, 1),
(10, 93, 1),
(11, 94, 1),
(12, 95, 1),
(13, 96, 1),
(14, 97, 1),
(15, 98, 1),
(16, 99, 1),
(17, 100, 1),
(18, 101, 1),
(19, 102, 1);

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
(11, '2019-00000001', 4),
(12, '2019-00000001', 7),
(13, '2019-00000001', 8),
(14, '2019-00000002', 4),
(15, '2019-00000003', 4);

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
  `jawaban1A` varchar(300) NOT NULL,
  `jawaban2A` varchar(300) NOT NULL,
  `jawaban3A` varchar(300) NOT NULL,
  `jawaban4A` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kuisioner_a`
--

INSERT INTO `kuisioner_a` (`id_kuisionerA`, `soalA`, `jawaban1A`, `jawaban2A`, `jawaban3A`, `jawaban4A`) VALUES
(15, 'Bagaimana pendapat Saudara tentang kesesuaian persyaratan pelayanan dengan jenis pelayanannya', 'Tidak sesuai', 'Kurang sesuai', 'Sesuai', 'Sangat sesuai.'),
(16, 'Bagaimana pemahaman Saudara tentang kemudahan prosedur pelayanan di unit ini', 'Tidak mudah', 'Kurang mudah', 'Mudah', 'Sangat mudah'),
(17, 'Bagaimana pendapat Saudara tentang kecepatan waktu dalam memberikan pelayanan', 'Tidak cepat', 'Kurang cepat', 'Cepat', 'Sangat cepat'),
(18, 'Bagaimana pendapat Saudara tentang kewajaran biaya/tarif dalam pelayanan', 'Sangat mahal', 'Cukup mahal', 'Murah', 'Gratis'),
(19, 'Bagaimana pendapat Saudara tentang kesesuaian produk pelayanan antara yang tercantum dalam standar pelayanan dengan hasil yang diberikan', 'Tidak sesuai', 'Kurang sesuai', 'Sesuai', 'Sangat sesuai'),
(20, 'Bagaimana pendapat Saudara tentang kompetensi/  kemampuan petugas dalam pelayanan', 'Tidak kompeten', 'Kurang kompeten', 'Kompeten', 'Sangat kompeten'),
(21, 'Bagaimana pendapat saudara perilaku petugas dalam pelayanan terkait kesopanan dan keramahan petugas dalam memberikan pelayanan', 'Tidak sopan dan ramah', 'Kurang sopan dan ramah', 'Sopan dan ramah', 'Sangat sopan dan ramah'),
(22, 'Bagaimana pendapat Saudara tentang kualitas sarana dan prasarana', 'Buruk', 'Cukup', 'Baik', 'Sangat baik'),
(23, 'Bagaimana pendapat Saudara tentang penanganan pengaduan pengguna layanan', 'Tidak ada', 'Ada tetapi tidak berfungsi', 'Berfungsi kurang maksimal', 'Dikekola dengan baik');

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
(56, 2, 'Tenaga pelatih menguasai materi pelatihan teori', 5, 4, 3, 2, 1, 'pg', 9),
(57, 2, 'Tenaga pelatih menguasai materi Pelatihan praktek', 5, 4, 3, 2, 1, 'pg', 9),
(58, 2, 'Tenaga pelatih selalu Mendemonstra sikan dan menjelaskan jobsheet sesuai dengan prosedur kerja', 5, 4, 3, 2, 1, 'pg', 9),
(59, 2, 'Tenaga pelatih selalu menjelaskan, memberikan contoh, dan mengingatkan peserta pelatihan tentang pentingnya K3 (Kesehatan dan Keselamatan Kerja) di Lingkungan kerja', 5, 4, 3, 2, 1, 'pg', 9),
(60, 2, 'Tenaga pelatih menjelaskan tujuan pelatihan dan gambaran pelatihan secara umum di awal pelatihan', 5, 4, 3, 2, 1, 'pg', 10),
(61, 2, 'Tenaga pelatih menyajikan pelajaran dengan jelas dan bahasanya mudah di mengerti', 5, 4, 3, 2, 1, 'pg', 10),
(62, 2, 'Tenaga pelatih selalu Mendampingi peserta Pelatihan selama proses pelatihan', 5, 4, 3, 2, 1, 'pg', 10),
(63, 2, 'Tenaga pelatih memberikan materi sesuai dengan tujuan pembelajaran secara sistematis / berurutan', 5, 4, 3, 2, 1, 'pg', 10),
(64, 2, 'Tenaga pelatih mendorong partisipasi Peserta pelatihan dalam diskusi, demonstrasi, peragaan dan percobaan\r\n', 5, 4, 3, 2, 1, 'pg', 10),
(65, 2, 'Tenaga pelatih memperhatikan kebersihan lingkungan dan keamanan peralatan / bahan praktek\r\n', 5, 4, 3, 2, 1, 'pg', 10),
(66, 2, 'Tenaga pelatih memberikan kesempatan pada peserta pelatihan untuk bertanya atau menyampaikan pendapat\r\n', 5, 4, 3, 2, 1, 'pg', 10),
(67, 2, 'Tenaga pelatih menciptakan suasana belajar yang kondusif (aman dan nyaman)\r\n', 5, 4, 3, 2, 1, 'pg', 11),
(68, 2, 'Tenaga pelatih mendengarkn dan memperhatikan keluhan,usul dan saran dari peserta pelatihan\r\n', 5, 4, 3, 2, 1, 'pg', 11),
(69, 2, 'Tenaga pelatih memperlakukan  Peserta pelatihan secara adil, tidak memihak atau membedabedakan\r\n', 5, 4, 3, 2, 1, 'pg', 11),
(70, 2, 'Tenaga pelatih  hadir tepat waktu sesuai jadwal', 5, 4, 3, 2, 1, 'pg', 12),
(71, 2, 'Tenaga pelatih Memakai pakaian kerja pada saat mengajar praktek\r\n', 5, 4, 3, 2, 1, 'pg', 12),
(72, 2, 'Tenaga pelatih memberikan keteladanan baik di dalam maupun di luar kelas/ bengkel\r\n', 5, 4, 3, 2, 1, 'pg', 12),
(73, 2, 'Tenaga pelatih  tidak Merokok pada saat di ruang kelas/bengkel maupun gedung kantor\r\n', 5, 4, 3, 2, 1, 'pg', 12),
(74, 2, 'Komentar / saran tentang Tenaga pelatih :', 0, 0, 0, 0, 0, 'uraian', 13);

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
('2019-00000001', 2, 16, '2020-01-01', '2020-01-03', 1, 1),
('2019-00000002', 2, 16, '2020-01-01', '2020-01-03', 1, 2),
('2019-00000003', 2, 16, '2020-02-03', '2020-04-03', 1, 3);

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
(5, 'Andi');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_a`
--

CREATE TABLE `penilaian_a` (
  `id` int(11) NOT NULL,
  `kd_pelatihan` char(15) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_soalA` int(11) NOT NULL,
  `jawaban` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian_a`
--

INSERT INTO `penilaian_a` (`id`, `kd_pelatihan`, `id_user`, `id_soalA`, `jawaban`) VALUES
(57, '2019-00000001', 4, 15, '2'),
(58, '2019-00000001', 4, 16, '3'),
(59, '2019-00000001', 4, 17, '3'),
(60, '2019-00000001', 4, 18, '3'),
(61, '2019-00000001', 4, 19, '4'),
(62, '2019-00000001', 4, 20, '4'),
(63, '2019-00000001', 4, 21, '3'),
(64, '2019-00000001', 4, 22, '4'),
(65, '2019-00000001', 4, 23, '4'),
(66, '2019-00000001', 7, 15, '3'),
(67, '2019-00000001', 7, 16, '4'),
(68, '2019-00000001', 7, 17, '4'),
(69, '2019-00000001', 7, 18, '3'),
(70, '2019-00000001', 7, 19, '3'),
(71, '2019-00000001', 7, 20, '2'),
(72, '2019-00000001', 7, 21, '4'),
(73, '2019-00000001', 7, 22, '2'),
(74, '2019-00000001', 7, 23, '2'),
(75, '2019-00000001', 8, 15, '2'),
(76, '2019-00000001', 8, 16, '2'),
(77, '2019-00000001', 8, 17, '3'),
(78, '2019-00000001', 8, 18, '4'),
(79, '2019-00000001', 8, 19, '3'),
(80, '2019-00000001', 8, 20, '2'),
(81, '2019-00000001', 8, 21, '1'),
(82, '2019-00000001', 8, 22, '4'),
(83, '2019-00000001', 8, 23, '4'),
(84, '2019-00000002', 4, 15, '1'),
(85, '2019-00000002', 4, 16, '2'),
(86, '2019-00000002', 4, 17, '1'),
(87, '2019-00000002', 4, 18, '2'),
(88, '2019-00000002', 4, 19, '4'),
(89, '2019-00000002', 4, 20, '4'),
(90, '2019-00000002', 4, 21, '4'),
(91, '2019-00000002', 4, 22, '4'),
(92, '2019-00000002', 4, 23, '4');

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
(20, '2019-00000001', 4, 26, '5'),
(21, '2019-00000001', 4, 27, '5'),
(22, '2019-00000001', 4, 28, '5'),
(23, '2019-00000001', 4, 29, 'wawa'),
(24, '2019-00000002', 4, 26, '5'),
(25, '2019-00000002', 4, 27, '5'),
(26, '2019-00000002', 4, 28, '4'),
(27, '2019-00000002', 4, 29, 'mantap'),
(28, '2019-00000001', 8, 26, '4'),
(29, '2019-00000001', 8, 27, '4'),
(30, '2019-00000001', 8, 28, '4'),
(31, '2019-00000001', 8, 29, 'awa'),
(32, '2019-00000001', 8, 30, '1'),
(33, '2019-00000001', 8, 31, '2'),
(34, '2019-00000001', 8, 32, '3'),
(35, '2019-00000001', 8, 33, '3'),
(36, '2019-00000001', 8, 34, '2'),
(37, '2019-00000001', 8, 35, '2'),
(38, '2019-00000001', 8, 36, '3'),
(39, '2019-00000001', 8, 37, '3'),
(40, '2019-00000001', 8, 38, '3'),
(41, '2019-00000001', 8, 39, '4'),
(42, '2019-00000001', 8, 40, '3'),
(43, '2019-00000001', 8, 41, '2'),
(44, '2019-00000001', 8, 42, '2'),
(45, '2019-00000001', 8, 43, '5'),
(46, '2019-00000001', 8, 44, '4'),
(47, '2019-00000001', 8, 45, '5'),
(48, '2019-00000001', 8, 46, '5'),
(49, '2019-00000001', 8, 47, '5'),
(50, '2019-00000001', 8, 48, '3'),
(51, '2019-00000001', 8, 49, '3'),
(52, '2019-00000001', 8, 50, 'awa'),
(53, '2019-00000001', 8, 51, '1'),
(54, '2019-00000001', 8, 52, '5'),
(55, '2019-00000001', 8, 53, '5'),
(56, '2019-00000001', 8, 54, '5'),
(57, '2019-00000001', 8, 55, 'awa'),
(58, '2019-00000001', 4, 30, '3'),
(59, '2019-00000001', 4, 31, '3'),
(60, '2019-00000001', 4, 32, '5'),
(61, '2019-00000001', 4, 33, '5'),
(62, '2019-00000001', 4, 34, '5'),
(63, '2019-00000001', 4, 35, '3'),
(64, '2019-00000001', 4, 36, '4'),
(65, '2019-00000001', 4, 37, '5'),
(66, '2019-00000001', 4, 38, '3'),
(67, '2019-00000001', 4, 39, '3'),
(68, '2019-00000001', 4, 40, '5'),
(69, '2019-00000001', 4, 41, '5'),
(70, '2019-00000001', 4, 42, '5'),
(71, '2019-00000001', 4, 43, '4'),
(72, '2019-00000001', 4, 44, '3'),
(73, '2019-00000001', 4, 45, '5'),
(74, '2019-00000001', 4, 46, '5'),
(75, '2019-00000001', 4, 47, '4'),
(76, '2019-00000001', 4, 48, '4'),
(77, '2019-00000001', 4, 49, '5'),
(78, '2019-00000001', 4, 50, 'qa'),
(79, '2019-00000001', 4, 51, '5'),
(80, '2019-00000001', 4, 52, '5'),
(81, '2019-00000001', 4, 53, '4'),
(82, '2019-00000001', 4, 54, '5'),
(83, '2019-00000001', 4, 55, 'awa'),
(84, '2019-00000002', 4, 56, '4'),
(85, '2019-00000002', 4, 57, '5'),
(86, '2019-00000002', 4, 58, '5'),
(87, '2019-00000002', 4, 59, '5'),
(88, '2019-00000002', 4, 60, '5'),
(89, '2019-00000002', 4, 61, '5'),
(90, '2019-00000002', 4, 62, '5'),
(91, '2019-00000002', 4, 63, '4'),
(92, '2019-00000002', 4, 64, '4'),
(93, '2019-00000002', 4, 65, '5'),
(94, '2019-00000002', 4, 66, '5'),
(95, '2019-00000002', 4, 67, '5'),
(96, '2019-00000002', 4, 68, '5'),
(97, '2019-00000002', 4, 69, '5'),
(98, '2019-00000002', 4, 70, '5'),
(99, '2019-00000002', 4, 71, '5'),
(100, '2019-00000002', 4, 72, '5'),
(101, '2019-00000002', 4, 73, '5'),
(102, '2019-00000002', 4, 74, 'Jelekk');

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

--
-- Dumping data for table `penilaian_c`
--

INSERT INTO `penilaian_c` (`id`, `kd_pelatihan`, `id_user`, `id_soalC`, `jawaban`) VALUES
(1, '2019-00000001', 4, 7, '4'),
(2, '2019-00000001', 4, 15, '4'),
(3, '2019-00000001', 4, 16, '4'),
(4, '2019-00000001', 4, 17, '4'),
(5, '2019-00000001', 4, 18, '4'),
(6, '2019-00000001', 4, 19, '3'),
(7, '2019-00000001', 4, 20, '4'),
(8, '2019-00000001', 4, 21, 'awawkal'),
(9, '2019-00000001', 4, 22, 'awaaw'),
(10, '2019-00000001', 4, 23, 'awaa'),
(11, '2019-00000001', 4, 24, '4'),
(12, '2019-00000001', 4, 25, '3'),
(13, '2019-00000001', 4, 26, '4'),
(14, '2019-00000001', 4, 27, '4'),
(15, '2019-00000001', 4, 28, 'yap'),
(16, '2019-00000001', 4, 29, 'yap'),
(17, '2019-00000001', 4, 30, '4'),
(18, '2019-00000001', 4, 31, '4'),
(19, '2019-00000001', 4, 32, '4'),
(20, '2019-00000001', 4, 33, '4'),
(21, '2019-00000001', 4, 34, '3'),
(22, '2019-00000001', 4, 35, 'yap'),
(23, '2019-00000001', 4, 36, '4'),
(24, '2019-00000001', 4, 37, '4'),
(25, '2019-00000001', 4, 38, '4'),
(26, '2019-00000001', 4, 39, '3'),
(27, '2019-00000001', 4, 40, '3'),
(28, '2019-00000001', 4, 41, '3'),
(29, '2019-00000001', 4, 42, '4'),
(30, '2019-00000001', 4, 43, 'yap'),
(31, '2019-00000001', 4, 44, '4'),
(32, '2019-00000001', 4, 45, '4'),
(33, '2019-00000001', 4, 46, '3'),
(34, '2019-00000001', 4, 47, '3'),
(35, '2019-00000001', 4, 48, 'yap'),
(36, '2019-00000001', 4, 49, '1'),
(37, '2019-00000001', 4, 50, 'yapp'),
(38, '2019-00000001', 4, 51, '1'),
(39, '2019-00000001', 4, 52, 'yap'),
(40, '2019-00000002', 4, 51, '2'),
(41, '2019-00000002', 4, 52, 'xddd'),
(42, '2019-00000002', 4, 49, '1'),
(43, '2019-00000002', 4, 50, 'awa');

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
(8, 'Uraian'),
(9, 'PENGETAHUAN / PEMAHAMAN'),
(10, 'KEMAMPUAN DALAM MEMBAWAKAN MATERI'),
(11, 'KEMAMPUAN MEMAHAMI MASALAH PESERTA'),
(12, 'PENAMPILAN TENAGA PELATIH'),
(13, 'KOMENTAR / SARAN TENAGA PELATIH');

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
(4, 'fajarhgl1', '$2y$10$WD3t4nCuezWpWKtBTZyr0uX8J64USxgq3DJvqNK2vy8Od0p1CIkb2', 'Fajar Hidayat', 'fajarhdyt30@gmail.com', 'P', '2019-12-06', 'S1', 'Programmer', 0, 'Menginap'),
(5, 'dhimas23', '$2y$10$gq4mbeMP8mAlkD1tz.obhOpO.qiqt6aCJXSAF.8to/RRtxyipdGgi', 'dhimas', 'dhimasputrabudhi@gmail.com', 'L', '2019-10-03', 'S1', 'rere', 0, 'Pulang'),
(6, 'dhimas', '$2y$10$atOD0qvokstCIpJKPjln.uXrV1i4MfwhLrl.IehW5T.2lKnAteMjC', 'b', 'b@gmail.com', 'L', '2019-12-01', 'S1', 'nknk', 0, 'Menginap'),
(7, 'bayu123', '$2y$10$OhH6rsO/tMRdksMmHGNu9./BK0pPx9LS5qu/1vum/f.J/S4vP6Toq', 'da', 'e@gmail.com', 'L', '2019-12-12', 'SD', 'sqad', 0, 'Menginap'),
(8, 'fajarhgl2', '$2y$10$gAR3..9VR4RMVf0vUHbS6emC3ggAHtZMbL5lzY6DuhwlBzPaYaiSy', 'fajarhgl2', 'fajarhgl2@gmail.com', 'L', '2019-12-17', 'S1', 'Programmer', 0, 'Pulang');

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
-- AUTO_INCREMENT for table `bobot_nilai`
--
ALTER TABLE `bobot_nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_pengajar`
--
ALTER TABLE `detail_pengajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `detail_penilaian_b`
--
ALTER TABLE `detail_penilaian_b`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `detail_peserta`
--
ALTER TABLE `detail_peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kejuruan`
--
ALTER TABLE `kejuruan`
  MODIFY `id_kejuruan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kuisioner_a`
--
ALTER TABLE `kuisioner_a`
  MODIFY `id_kuisionerA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `kuisioner_b`
--
ALTER TABLE `kuisioner_b`
  MODIFY `id_kuisionerB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `kuisioner_c`
--
ALTER TABLE `kuisioner_c`
  MODIFY `id_kuisionerC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `pengajar`
--
ALTER TABLE `pengajar`
  MODIFY `id_pengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penilaian_a`
--
ALTER TABLE `penilaian_a`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `penilaian_b`
--
ALTER TABLE `penilaian_b`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `penilaian_c`
--
ALTER TABLE `penilaian_c`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sub_soal`
--
ALTER TABLE `sub_soal`
  MODIFY `id_sub_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  ADD CONSTRAINT `detail_pengajar_ibfk_1` FOREIGN KEY (`kd_pelatihan`) REFERENCES `pelatihan` (`kd_pelatihan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pengajar_ibfk_2` FOREIGN KEY (`id_pengajar`) REFERENCES `pengajar` (`id_pengajar`) ON DELETE CASCADE ON UPDATE CASCADE;

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
