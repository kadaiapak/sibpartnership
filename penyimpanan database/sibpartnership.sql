-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2021 at 12:06 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sibpartnership`
--

-- --------------------------------------------------------

--
-- Table structure for table `akses`
--

CREATE TABLE `akses` (
  `kode_menu` char(15) NOT NULL,
  `level_user` varchar(30) NOT NULL,
  `akses` enum('0','1') NOT NULL,
  `detail` enum('0','1') NOT NULL,
  `tambah` enum('0','1') NOT NULL,
  `edit` enum('0','1') NOT NULL,
  `hapus` enum('0','1') NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akses`
--

INSERT INTO `akses` (`kode_menu`, `level_user`, `akses`, `detail`, `tambah`, `edit`, `hapus`, `id`) VALUES
('10', '1', '1', '0', '1', '1', '1', 28),
('8', '1', '1', '0', '1', '1', '1', 55),
('4', '1', '1', '0', '1', '1', '1', 57),
('5', '1', '1', '0', '1', '1', '1', 58),
('2', '1', '1', '0', '1', '1', '1', 71),
('7', '1', '1', '1', '1', '1', '1', 76),
('11', '1', '1', '0', '1', '1', '1', 79),
('3', '1', '1', '0', '1', '1', '1', 90),
('18', '1', '1', '0', '1', '1', '1', 91),
('6', '1', '1', '0', '1', '1', '1', 92),
('20', '1', '1', '0', '1', '1', '1', 106),
('1', '1', '1', '0', '1', '1', '1', 108),
('20', '19', '1', '0', '1', '1', '1', 111),
('4', '19', '1', '0', '1', '1', '1', 112),
('5', '19', '1', '0', '1', '1', '1', 113),
('20', '2', '1', '0', '0', '0', '0', 115),
('21', '2', '1', '0', '0', '0', '0', 116),
('23', '1', '1', '0', '1', '1', '1', 117),
('23', '2', '1', '0', '0', '0', '0', 118),
('24', '1', '1', '0', '1', '1', '1', 119),
('29', '1', '1', '0', '1', '1', '1', 129),
('30', '1', '1', '0', '1', '1', '1', 130),
('31', '1', '1', '0', '1', '1', '1', 131),
('21', '1', '1', '0', '1', '1', '1', 132),
('32', '1', '1', '0', '1', '1', '1', 133),
('33', '1', '1', '0', '1', '1', '1', 134),
('33', '2', '1', '0', '0', '0', '0', 135),
('32', '2', '1', '0', '0', '0', '0', 136),
('31', '2', '1', '0', '0', '0', '0', 137),
('21', '19', '1', '0', '1', '1', '1', 138),
('23', '19', '1', '0', '1', '1', '1', 139),
('29', '19', '1', '0', '1', '1', '1', 140),
('33', '19', '1', '0', '1', '1', '1', 141),
('32', '19', '1', '0', '1', '1', '1', 142),
('31', '19', '1', '0', '1', '1', '1', 143),
('33', '14', '1', '0', '1', '1', '1', 144),
('32', '14', '1', '0', '1', '1', '1', 145),
('31', '14', '1', '0', '1', '1', '1', 146),
('21', '14', '1', '0', '1', '1', '1', 147),
('20', '14', '1', '0', '1', '1', '1', 148),
('23', '14', '1', '0', '1', '1', '1', 149),
('20', '5', '1', '0', '1', '1', '1', 150),
('21', '5', '1', '0', '1', '1', '1', 151),
('23', '5', '1', '0', '1', '1', '1', 152),
('32', '5', '1', '0', '1', '1', '1', 153),
('31', '5', '1', '0', '1', '1', '1', 154),
('33', '5', '1', '0', '1', '1', '1', 155);

-- --------------------------------------------------------

--
-- Table structure for table `asal_beasiswa`
--

CREATE TABLE `asal_beasiswa` (
  `id` int(11) NOT NULL,
  `nama_asal_beasiswa` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `asal_beasiswa`
--

INSERT INTO `asal_beasiswa` (`id`, `nama_asal_beasiswa`) VALUES
(1, 'Pusat'),
(2, 'Daerah'),
(3, 'BANK'),
(4, 'Baznas Provinsi'),
(5, 'Provinsi'),
(10, 'Swasta'),
(16, 'Cobasasdfa');

-- --------------------------------------------------------

--
-- Table structure for table `berita_beasiswa`
--

CREATE TABLE `berita_beasiswa` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `isi_berita` mediumtext NOT NULL,
  `file` varchar(100) DEFAULT NULL,
  `id_master_beasiswa` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `tgl` datetime NOT NULL DEFAULT current_timestamp(),
  `aktif` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact_person`
--

CREATE TABLE `contact_person` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `kontak` varchar(100) DEFAULT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `id_master_beasiswa` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='contact_person';

-- --------------------------------------------------------

--
-- Table structure for table `jenis_beasiswa`
--

CREATE TABLE `jenis_beasiswa` (
  `id` int(11) NOT NULL,
  `nama_jenis` varchar(40) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_beasiswa`
--

INSERT INTO `jenis_beasiswa` (`id`, `nama_jenis`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Satu kali penerimaan', 'Jenis Beasiswa yang penerimanya hanya mendapatkan bantuan beasiswa sebanyak satu kali penerimaan. Untuk penerimaan selanjutnya akan diadakan pendaftaran dan penyeleksian kembali.', '2021-10-29 11:14:41', '0000-00-00 00:00:00'),
(2, 'Sampai semester delapan', 'Jenis Beasiswa yang penerimaannya akan terus mendapatkan bantuan  maksimal sampai semester 8, namun penerima bisa diberhentikan sewaktu waktu sesuai dengan peraturan yang berlaku', '2021-10-29 11:30:57', '0000-00-00 00:00:00'),
(3, 'dlls', 'dlls', '2021-10-29 11:31:35', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kelompok_beasiswa`
--

CREATE TABLE `kelompok_beasiswa` (
  `id` int(11) NOT NULL,
  `nama_kelompok` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelompok_beasiswa`
--

INSERT INTO `kelompok_beasiswa` (`id`, `nama_kelompok`) VALUES
(2, 'BUMD'),
(9, 'Pemerintah'),
(16, 'Pemerintah Daerah'),
(17, 'Yayasan'),
(19, 'Pemerintah Provinsi'),
(21, 'kelompoks');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `prodi` varchar(100) DEFAULT NULL,
  `fakultas` varchar(100) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `aktif` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `prodi`, `fakultas`, `photo`, `aktif`) VALUES
(255, '20334017', 'Aprilian Zulfa Badriah', 'Keperawatan (D3)', 'FIK', NULL, '1'),
(256, '19130069', 'Weri Sasra Yanti', 'Teknik Elektro Industri', 'FT', NULL, '1'),
(257, '19023116', 'Abelita Khre Vanesa', 'Sendratasik', 'FBS', NULL, '1'),
(258, '20062007', 'Aldewo Valentios', 'Teknik Sipil dan Banunan (D3)', 'FT', NULL, '1'),
(259, '20130058', 'Nari Amelia Aprilianti Sukma', 'Teknik Elektro Industri', 'FT', NULL, '1'),
(260, '21086174', 'Farhan Furkoni', 'PENJASKESREK', 'FAKULTAS ILMU KEOLAHRAGAAN', NULL, '1'),
(261, '21032003', 'Dhea Kasnelia Putri', 'BIOLOGI (NK)', 'FAKULTAS MATEMATIKA DAN IPA', NULL, '1'),
(262, '21027050', 'Dea Syakira', 'DISAIN KOM. VISUAL (NK)', 'FAKULTAS BAHASA DAN SENI', NULL, '1'),
(263, '21089098', 'Utama Irvan Abdi', 'ILMU KEOLAHRAGAAN (NK)', 'FAKULTAS ILMU KEOLAHRAGAAN', NULL, '1'),
(264, '21016093', 'Muhammad Zaki Gidion', 'PENDD. BHS & SAST. INDO. & DAERAH', 'FAKULTAS BAHASA DAN SENI', NULL, '1'),
(265, '21075050', 'Anisa Gusman', 'PENDD. KESEJAHTERAAN KELUARGA', 'FAKULTAS PARIWISATA DAN PERHOTELAN', NULL, '1'),
(266, '21045004', 'Christian Anugerah Fajar Putra Zebua', 'PENDIDIKAN GEOGRAFI', 'FAKULTAS ILMU SOSIAL', NULL, '1'),
(267, '21338009', 'Felia Maresta', 'TEKNIK MESIN (NK)', 'FAKULTAS TEKNIK', NULL, '1'),
(268, '21338054', 'Silwanus Dakhis', 'TEKNIK MESIN (NK)', 'FAKULTAS TEKNIK', NULL, '1'),
(269, '21338006', 'DEVKY MEINALDI FERNANDA', 'TEKNIK MESIN (NK)', 'FAKULTAS TEKNIK', NULL, '1'),
(270, '21338003', 'ADITYO', 'TEKNIK MESIN (NK)', 'FAKULTAS TEKNIK', NULL, '1'),
(271, '21338010', 'FIDO DELFRI TAMASYA', 'TEKNIK MESIN (NK)', 'FAKULTAS TEKNIK', NULL, '1'),
(272, '21338014', 'REZKI ALHAKIM', 'TEKNIK MESIN (NK)', 'FAKULTAS TEKNIK', NULL, '1'),
(273, '21338031', 'Doni Ersandika', 'TEKNIK MESIN (NK)', 'FAKULTAS TEKNIK', NULL, '1'),
(274, '21338049', 'Randi Pernando', 'TEKNIK MESIN (NK)', 'FAKULTAS TEKNIK', NULL, '1'),
(275, '21338017', 'Abdurrahman Zikra', 'TEKNIK MESIN (NK)', 'FAKULTAS TEKNIK', NULL, '1'),
(276, '21016110', 'Rieska Dinda Savitri', 'PENDD. BHS & SAST. INDO. & DAERAH', 'FAKULTAS BAHASA DAN SENI', NULL, '1'),
(277, '21338026', 'Badri Kurniawan', 'TEKNIK MESIN (NK)', 'FAKULTAS TEKNIK', NULL, '1'),
(278, '21002047', 'Devrizal', 'ADMINISTRASI PENDIDIKAN', 'FAKULTAS ILMU PENDIDIKAN', NULL, '1'),
(279, '21017034', 'Ananta Dona Arsya', 'BAHASA & SASTRA INDONESIA (NK)', 'FAKULTAS BAHASA DAN SENI', NULL, '1'),
(280, '21006028', 'Ruzi Hardian', 'BIMBINGAN DAN KONSELING', 'FAKULTAS ILMU PENDIDIKAN', NULL, '1'),
(281, '21006032', 'Siti Aisyah Putri', 'BIMBINGAN DAN KONSELING', 'FAKULTAS ILMU PENDIDIKAN', NULL, '1'),
(282, '21060055', 'Brelia Zohana', 'EKONOMI PEMBANGUNAN (NK)', 'FAKULTAS EKONOMI', NULL, '1'),
(283, '21060065', 'Firman Hadi Amri', 'EKONOMI PEMBANGUNAN (NK)', 'FAKULTAS EKONOMI', NULL, '1'),
(284, '21034079', 'Rifki Rahman', 'FISIKA (NK)', 'FAKULTAS MATEMATIKA DAN IPA', NULL, '1'),
(285, '21089018', 'Alif Al Jufri', 'ILMU KEOLAHRAGAAN (NK)', 'FAKULTAS ILMU KEOLAHRAGAAN', NULL, '1'),
(286, '21059133', 'Via Aulia Rahmi', 'MANAJEMEN (NK)', 'FAKULTAS EKONOMI', NULL, '1'),
(287, '21022024', 'MAISHA RAHMADETA', 'PEND. GURU PENDIDIKAN ANAK USIA DINI', 'FAKULTAS ILMU PENDIDIKAN', NULL, '1'),
(288, '21022095', 'Rahma Syovianti', 'PEND. GURU PENDIDIKAN ANAK USIA DINI', 'FAKULTAS ILMU PENDIDIKAN', NULL, '1'),
(289, '21076057', 'Husnul Dzikri Hidayatullah', 'PEND. TEKNIK INFORMATIKA DAN KOMPUTER', 'FAKULTAS TEKNIK', NULL, '1'),
(290, '21087137', 'Maihandani', 'PENDD. KEPELATIHAN OLAHRAGA', 'FAKULTAS ILMU KEOLAHRAGAAN', NULL, '1'),
(291, '21087089', 'Ambi Mayu', 'PENDD. KEPELATIHAN OLAHRAGA', 'FAKULTAS ILMU KEOLAHRAGAAN', NULL, '1'),
(292, '21075114', 'Syahrul Ramadhan', 'PENDD. KESEJAHTERAAN KELUARGA', 'FAKULTAS PARIWISATA DAN PERHOTELAN', NULL, '1'),
(293, '21031064', 'Dwi Citra Pertiwi', 'PENDIDIKAN BIOLOGI', 'FAKULTAS MATEMATIKA DAN IPA', NULL, '1'),
(294, '21053044', 'YUNDA ANGGRAINI', 'PENDIDIKAN EKONOMI', 'FAKULTAS EKONOMI', NULL, '1'),
(295, '21053048', 'Adinda Nabila', 'PENDIDIKAN EKONOMI', 'FAKULTAS EKONOMI', NULL, '1'),
(296, '21033095', 'Mhd. Reza Fauzi', 'PENDIDIKAN FISIKA', 'FAKULTAS MATEMATIKA DAN IPA', NULL, '1'),
(297, '21033098', 'Muhammad Reihan', 'PENDIDIKAN FISIKA', 'FAKULTAS MATEMATIKA DAN IPA', NULL, '1'),
(298, '21033131', 'Widia Efrisa', 'PENDIDIKAN FISIKA', 'FAKULTAS MATEMATIKA DAN IPA', NULL, '1'),
(299, '21045003', 'AZIZAH QAIRUNNISA', 'PENDIDIKAN GEOGRAFI', 'FAKULTAS ILMU SOSIAL', NULL, '1'),
(300, '21035042', 'SUCI RAMADANI', 'PENDIDIKAN KIMIA', 'FAKULTAS MATEMATIKA DAN IPA', NULL, '1'),
(301, '21035010', 'DIANDRA NADIFA PUTRI', 'PENDIDIKAN KIMIA', 'FAKULTAS MATEMATIKA DAN IPA', NULL, '1'),
(302, '21035087', 'Munawaroh', 'PENDIDIKAN KIMIA', 'FAKULTAS MATEMATIKA DAN IPA', NULL, '1'),
(303, '21035110', 'Shafina Azahra Yosna', 'PENDIDIKAN KIMIA', 'FAKULTAS MATEMATIKA DAN IPA', NULL, '1'),
(304, '21003059', 'YUTRI MARDIANIS', 'PENDIDIKAN LUAR BIASA', 'FAKULTAS ILMU PENDIDIKAN', NULL, '1'),
(305, '21003006', 'Annisa Wulan Rahmadani', 'PENDIDIKAN LUAR BIASA', 'FAKULTAS ILMU PENDIDIKAN', NULL, '1'),
(306, '21003102', 'Ghina Devita', 'PENDIDIKAN LUAR BIASA', 'FAKULTAS ILMU PENDIDIKAN', NULL, '1'),
(307, '21003157', 'Silva Murdiyani', 'PENDIDIKAN LUAR BIASA', 'FAKULTAS ILMU PENDIDIKAN', NULL, '1'),
(308, '21003115', 'Irfa Dillah Ranisa', 'PENDIDIKAN LUAR BIASA', 'FAKULTAS ILMU PENDIDIKAN', NULL, '1'),
(309, '21005073', 'Sabrina Maha Putri', 'PENDIDIKAN LUAR SEKOLAH', 'FAKULTAS ILMU PENDIDIKAN', NULL, '1'),
(310, '21058081', 'Haris Irsyad', 'PENDIDIKAN SOSIOLOGI ANTROPOLOGI', 'FAKULTAS ILMU SOSIAL', NULL, '1'),
(311, '21073027', 'SONI AHMAD PICTOR RITONGA', 'PENDIDIKAN TEKNIK OTOMOTIF', 'FAKULTAS TEKNIK', NULL, '1'),
(312, '21073057', 'M. Fadhil Dianugraha', 'PENDIDIKAN TEKNIK OTOMOTIF', 'FAKULTAS TEKNIK', NULL, '1'),
(313, '21073066', 'Muhammad Farhan', 'PENDIDIKAN TEKNIK OTOMOTIF', 'FAKULTAS TEKNIK', NULL, '1'),
(314, '21086016', 'ARIANDO PRADANA', 'PENJASKESREK', 'FAKULTAS ILMU KEOLAHRAGAAN', NULL, '1'),
(315, '21129246', 'Miftahul Fadlilah', 'PGSD (PENDIDIKAN GURU SEKOLAH DASAR)', 'FAKULTAS ILMU PENDIDIKAN', NULL, '1'),
(316, '21129294', 'Rendi Maileondri', 'PGSD (PENDIDIKAN GURU SEKOLAH DASAR)', 'FAKULTAS ILMU PENDIDIKAN', NULL, '1'),
(317, '21129227', 'Indriyani', 'PGSD (PENDIDIKAN GURU SEKOLAH DASAR)', 'FAKULTAS ILMU PENDIDIKAN', NULL, '1'),
(318, '21129313', 'Syarifah Aini', 'PGSD (PENDIDIKAN GURU SEKOLAH DASAR)', 'FAKULTAS ILMU PENDIDIKAN', NULL, '1'),
(319, '21078057', 'Nadya Yasmin', 'TATA RIAS DAN KECANTIKAN (NK)', 'FAKULTAS PARIWISATA DAN PERHOTELAN', NULL, '1'),
(320, '20193821', 'Cocok Logi', 'Teknik Informatika', 'Fakultas Teknik', NULL, '1'),
(321, '19033133', 'tegar', 'coba', 'coba', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa_beasiswa`
--

CREATE TABLE `mahasiswa_beasiswa` (
  `id` int(11) NOT NULL,
  `nim_mahasiswa` varchar(11) NOT NULL,
  `id_beasiswa` int(11) NOT NULL,
  `status_beasiswa` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa_beasiswa`
--

INSERT INTO `mahasiswa_beasiswa` (`id`, `nim_mahasiswa`, `id_beasiswa`, `status_beasiswa`) VALUES
(258, '19130069', 17, '1'),
(259, '19023116', 17, '1'),
(260, '20062007', 17, '1'),
(261, '20130058', 17, '1'),
(262, '21086174', 17, '1'),
(263, '21032003', 17, '1'),
(264, '21027050', 17, '1'),
(265, '21089098', 17, '1'),
(266, '21016093', 17, '1'),
(267, '21075050', 17, '1'),
(268, '21045004', 17, '1'),
(269, '21338009', 17, '1'),
(270, '21338054', 17, '0'),
(271, '21338006', 17, '1'),
(272, '21338003', 17, '1'),
(273, '21338010', 17, '1'),
(274, '21338014', 17, '1'),
(275, '21338031', 17, '1'),
(276, '21338049', 17, '0'),
(277, '21338017', 17, '1'),
(278, '21016110', 17, '1'),
(279, '21338026', 17, '1'),
(280, '21002047', 17, '1'),
(281, '21017034', 17, '1'),
(282, '21006028', 17, '1'),
(283, '21006032', 17, '1'),
(284, '21060055', 17, '1'),
(285, '21060065', 17, '1'),
(286, '21034079', 17, '1'),
(287, '21089018', 17, '1'),
(288, '21059133', 17, '1'),
(289, '21022024', 17, '1'),
(290, '21022095', 17, '1'),
(291, '21076057', 17, '1'),
(292, '21087137', 17, '1'),
(293, '21087089', 17, '1'),
(294, '21075114', 17, '1'),
(295, '21031064', 17, '1'),
(296, '21053044', 17, '1'),
(297, '21053048', 17, '1'),
(298, '21033095', 17, '1'),
(299, '21033098', 17, '1'),
(300, '21033131', 17, '1'),
(301, '21045003', 17, '1'),
(302, '21035042', 17, '1'),
(303, '21035010', 17, '1'),
(304, '21035087', 17, '1'),
(305, '21035110', 17, '1'),
(306, '21003059', 17, '1'),
(307, '21003006', 17, '1'),
(308, '21003102', 17, '1'),
(309, '21003157', 17, '1'),
(310, '21003115', 17, '1'),
(311, '21005073', 17, '1'),
(312, '21058081', 17, '1'),
(313, '21073027', 17, '1'),
(314, '21073057', 17, '1'),
(315, '21073066', 17, '1'),
(316, '21086016', 17, '1'),
(317, '21129246', 17, '1'),
(318, '21129294', 17, '1'),
(319, '21129227', 17, '1'),
(320, '21129313', 17, '1'),
(321, '21078057', 17, '1'),
(322, '20193821', 19, '1'),
(323, '19033133', 17, '1');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa_beasiswa_bukti_pembayaran`
--

CREATE TABLE `mahasiswa_beasiswa_bukti_pembayaran` (
  `id` int(11) NOT NULL,
  `id_mahasiswa_beasiswa` int(11) NOT NULL,
  `periode_bukti_pembayaran` int(11) NOT NULL,
  `tahun_bukti_pembayaran` int(11) NOT NULL,
  `nama_file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa_beasiswa_bukti_pembayaran`
--

INSERT INTO `mahasiswa_beasiswa_bukti_pembayaran` (`id`, `id_mahasiswa_beasiswa`, `periode_bukti_pembayaran`, `tahun_bukti_pembayaran`, `nama_file`) VALUES
(14, 270, 1, 2021, 'bukti_P_Badan_Amil_Zakat_Nasional_2021_1636942464.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `master_beasiswa`
--

CREATE TABLE `master_beasiswa` (
  `id` int(11) NOT NULL,
  `nama_beasiswa` int(11) NOT NULL,
  `kelompok_beasiswa` int(2) NOT NULL,
  `asal_beasiswa` int(2) NOT NULL,
  `jenis_beasiswa` int(11) NOT NULL,
  `biaya` varchar(255) NOT NULL,
  `periode` int(11) NOT NULL,
  `tahun` int(4) NOT NULL,
  `metode_pembayaran` varchar(255) DEFAULT NULL,
  `sk` varchar(255) DEFAULT NULL,
  `rekap_bukti_pembayaran` varchar(100) DEFAULT NULL,
  `tanggal_penetapan` datetime DEFAULT NULL,
  `buka_pendaftaran` enum('1','0') NOT NULL DEFAULT '0',
  `tampil` enum('1','0') NOT NULL DEFAULT '1',
  `aktif` enum('1','0') NOT NULL DEFAULT '1',
  `tgl_buka` datetime DEFAULT NULL,
  `tgl_tutup` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `user_created` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_beasiswa`
--

INSERT INTO `master_beasiswa` (`id`, `nama_beasiswa`, `kelompok_beasiswa`, `asal_beasiswa`, `jenis_beasiswa`, `biaya`, `periode`, `tahun`, `metode_pembayaran`, `sk`, `rekap_bukti_pembayaran`, `tanggal_penetapan`, `buka_pendaftaran`, `tampil`, `aktif`, `tgl_buka`, `tgl_tutup`, `created_at`, `updated_at`, `user_created`) VALUES
(17, 1, 19, 4, 1, '2000000', 1, 2021, 'Transfer langsung ke rekening penerima', NULL, NULL, '2021-10-03 00:00:00', '0', '1', '1', NULL, NULL, '2021-10-30 22:34:42', '2021-11-02 07:28:17', NULL),
(18, 14, 21, 10, 3, '2000001', 3, 2021, 'Transfer langsung ke rekening penerimasasd', NULL, NULL, '2021-07-04 00:00:00', '1', '1', '0', NULL, NULL, '2021-10-30 23:51:12', '2021-11-05 03:54:43', 'adminunp'),
(19, 17, 17, 1, 2, '3000000', 1, 2021, 'Bantuan UKT, transfer ke rekening UKT UNP', NULL, NULL, '2021-11-14 00:00:00', '0', '1', '1', NULL, NULL, '2021-11-14 15:05:49', NULL, 'adminunp');

-- --------------------------------------------------------

--
-- Table structure for table `master_beasiswa_bp`
--

CREATE TABLE `master_beasiswa_bp` (
  `id_master_beasiswa_bp` int(11) NOT NULL,
  `id_master_beasiswa` int(11) NOT NULL,
  `periode` int(2) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `nama_file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `master_beasiswa_sk`
--

CREATE TABLE `master_beasiswa_sk` (
  `id_master_beasiswa_sk` int(11) NOT NULL,
  `id_master_beasiswa` int(11) NOT NULL,
  `periode` int(2) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `nama_file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_beasiswa_sk`
--

INSERT INTO `master_beasiswa_sk` (`id_master_beasiswa_sk`, `id_master_beasiswa`, `periode`, `tahun`, `nama_file`) VALUES
(13, 17, 1, '2021', 'sk_Baznas_2021_1636968459.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `kode_menu` int(10) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `url` varchar(125) NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `level` enum('main_menu','sub_menu','single_menu') NOT NULL,
  `main_menu` varchar(15) DEFAULT NULL,
  `aktif` enum('0','1') NOT NULL,
  `no_urut` int(11) NOT NULL,
  `show` enum('0','1') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`kode_menu`, `nama_menu`, `url`, `icon`, `level`, `main_menu`, `aktif`, `no_urut`, `show`, `created_at`, `user`) VALUES
(1, 'Kelompok Beasiswa', 'mbeasiswa/kelompok_beasiswa', NULL, 'sub_menu', '10', '1', 8, '1', '2021-10-06 19:05:41', 'adminunp'),
(2, 'Master Beasiswa', 'mbeasiswa/master_beasiswa', NULL, 'sub_menu', '10', '1', 9, '1', '2021-10-07 20:42:53', 'adminunp'),
(3, 'Manajemen User', 'user', 'fas fa-fw fa-user-plus', 'single_menu', 'null', '1', 10, '1', '2021-10-07 21:55:55', 'adminunp'),
(4, 'Manajemen Penerima Beasiswa', 'data_beasiswa', 'fas fa-fw fa-clipboard-list', 'main_menu', 'null', '1', 11, '1', '2021-10-10 05:39:00', 'adminunp'),
(5, 'Upload Penerima', 'data_beasiswa/beasiswa', '', 'sub_menu', '4', '1', 12, '1', '2021-10-10 05:42:11', 'adminunp'),
(6, 'Konfigurasi', 'konfigurasi', 'fas fa-fw fa-cog', 'main_menu', '', '1', 1, '1', '2021-09-07 17:53:35', 'Admin'),
(7, 'Akses', 'konfigurasi/akses', 'fas fa-fw fa-circle', 'sub_menu', '6', '1', 2, '1', '2021-09-07 17:56:02', 'Admin'),
(8, 'Menu Sistem', 'konfigurasi/menu_sistem', 'fas fa-fw fa-circle', 'sub_menu', '6', '1', 4, '1', '2021-09-07 17:57:48', 'denisuardi'),
(10, 'Manajemen Beasiswa', 'mbeasiswa', 'fas fa-fw fa-user-tie', 'main_menu', 'null', '1', 6, '1', '2021-10-03 18:52:12', 'denisuardi'),
(11, 'Nama Beasiswa', 'mbeasiswa/nama_beasiswa', NULL, 'sub_menu', '10', '1', 7, '1', '2021-10-03 18:56:16', 'denisuardi'),
(18, 'Asal Beasiswa', 'mbeasiswa/asal_beasiswa', NULL, 'sub_menu', '10', '1', 0, '1', '2021-10-22 00:00:00', 'adminunp'),
(20, 'Daftar Penerima', 'mhs', 'fas fa-fw fa-user-graduate', 'single_menu', 'null', '1', 0, '1', '2021-10-25 00:00:00', 'adminunp'),
(21, 'controller', 'mhs/get_ajax', NULL, 'sub_menu', '10', '1', 0, '0', '2021-10-25 00:00:00', 'adminunp'),
(22, 'controller2', 'mhs/coba', NULL, 'sub_menu', '10', '1', 0, '0', '2021-10-26 00:00:00', 'adminunp'),
(23, 'Daftar Beasiswa', 'bsw', 'fas fa-fw fa-graduation-cap', 'single_menu', 'null', '1', 0, '1', '2021-10-28 00:00:00', 'adminunp'),
(24, 'Jenis Beasiswa', 'mbeasiswa/jenis_beasiswa', NULL, 'sub_menu', '10', '1', 0, '1', '2021-10-29 00:00:00', 'adminunp'),
(29, 'Manajemen Mahasiswa', 'data_beasiswa/mahasiswa', NULL, 'sub_menu', '4', '1', 0, '1', '2021-11-04 00:00:00', 'adminunp'),
(30, 'Manajemen Website', 'mwebsite', 'fas fa-fw fa-file-code', 'single_menu', NULL, '1', 0, '1', '2021-11-14 00:00:00', 'adminunp'),
(31, 'controller3', 'mhs/validasiPenerima', NULL, 'sub_menu', '10', '1', 0, '0', '2021-11-14 00:00:00', 'adminunp'),
(32, 'controller4', 'mhs/validasi', NULL, 'sub_menu', '10', '1', 0, '0', '2021-11-14 00:00:00', 'adminunp'),
(33, 'controller5', 'bsw/get_ajax', NULL, 'sub_menu', '10', '1', 0, '0', '2021-11-15 00:00:00', 'adminunp');

-- --------------------------------------------------------

--
-- Table structure for table `nama_beasiswa`
--

CREATE TABLE `nama_beasiswa` (
  `id` int(11) NOT NULL,
  `nama_beasiswa` varchar(255) NOT NULL,
  `singkatan` varchar(255) NOT NULL,
  `keterangan` varchar(1000) NOT NULL,
  `profil` varchar(1000) NOT NULL,
  `kontak` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nama_beasiswa`
--

INSERT INTO `nama_beasiswa` (`id`, `nama_beasiswa`, `singkatan`, `keterangan`, `profil`, `kontak`) VALUES
(1, 'Badan Amil Zakat Nasional', 'Baznas', 'Beasiswa baznas', 'Badan Amil Zakat Nasional (BAZNAS) merupakan badan resmi dan satu-satunya yang dibentuk oleh pemerintah berdasarkan Keputusan Presiden RI No. 8 Tahun 2001 yang memiliki tugas dan fungsi menghimpun dan menyalurkan zakat, infaq, dan sedekah (ZIS) pada tingkat nasional. Lahirnya Undang-Undang Nomor 23 Tahun 2011 tentang Pengelolaan Zakat semakin mengukuhkan peran BAZNAS sebagai lembaga yang berwenang melakukan pengelolaan zakat secara nasional. Dalam UU tersebut, BAZNAS dinyatakan sebagai lembaga pemerintah nonstruktural yang bersifat mandiri dan bertanggung jawab kepada Presiden melalui Menteri Agama.  Dengan demikian, BAZNAS bersama Pemerintah bertanggung jawab untuk mengawal pengelolaan zakat yang berasaskan: syariat Islam, amanah, kemanfaatan, keadilan, kepastian hukum, terintegrasi dan akuntabilitas.', ''),
(8, 'Kartu Jakarta Mahasiswa Unggul', 'KJMU', 'Besaran KJMU<br>\r\n\r\na. Bantuan Biaya Peningkatan Mutu Pendidikan diberikan dalam bentuk biaya penyelenggaraan pendidikan dan/atau biaya pendukung personal yaitu sebesar Rp 1.500.000 per bulan.<br>\r\nb. Biaya penyelenggaraan pendidikan dikelola oleh PTN dan Penyaluran biaya penyelenggaraan pendidikan ke rekening PTN melalui pendebetan dari rekening mahasiswa berdasarkan Surat Kuasa Pendebetan Biaya Penyelenggaraan Pendidikan.', 'Tentang KJMU\r\nKartu Jakarta Mahasiswa Unggul (KJMU) adalah program pemberian bantuan Biaya Peningkatan Mutu Pendidikan bagi calon/mahasiswa PTN/PTS dari keluarga tidak mampu secara ekonomi dan memiliki potensi akademik yang baik untuk meningkatkan akses dan kesempatan belajar di PTN/PTS dengan dibiayai penuh dari dana APBD Provinsi DKI Jakarta.', ''),
(11, 'Van Deventer-Maas Indonesia', 'VDMI', 'Menyalurkan bantuan terutama dalam bentuk beasiswa dan beberapa pelatihan dan proyek sebagai pembekalan dalam meningkatkan kemampuan atau pengembangan potensi diri. Salah satu kegiatan yang menjadi andalan utama adalah “Pengembangan Kemampuan Diri Pribadi', 'The Van Deventer-Maas Indonesia was established in September 17, 2018 . The foundation founded by Prof. Irfan Dwidya Prijambada, M.Eng., Ph.D. and Dr. Ing. Ir. Ilya Fadjar Maharika, MA., IAI.  The Foundation donated by Van Deventer-Maas Stichting Netherland as a non profit social organization especially support Indonesian students in Indonesia, as it\'s mission “To build young talented Indonesian people to be Mandiri”  Van Deventer Maas Stichting is governed by the Boards to ensure the good management of the foundation asset to support the program and the strategic plan of Yayasan Van Deventer-Maas Indonesia and to manage the “niche” of fund.', ''),
(14, 'satus', 'satu', 'satus', 'satu', ''),
(17, 'Beasiswa Cendekia Baznas', 'BCB', 'Beasiswa Cendekia BAZNAS adalah bantuan pendidikan serta pembinaan pengembangan diri bagi mahasiswa S-1 on-going di 101* kampus mitra Beasiswa BAZNAS.', 'Lembaga Beasiswa BAZNAS adalah program\r\nkhusus Divisi Pendistribusian dan Pendayagunaan\r\nBAZNAS yang memiliki tugas menyediakan dana\r\npendidikan demi terjaminnya keberlangsungan\r\nprogram pendidikan bagi golongan kurang\r\nmampu/miskin sebagai pertanggungjawaban\r\nantar generasi dan menyiapkan generasi penerus\r\nbangsa yang memiliki kedalaman ilmu\r\npengetahuan dan keluhuran akhlak.', '');

-- --------------------------------------------------------

--
-- Table structure for table `penerima_beasiswa`
--

CREATE TABLE `penerima_beasiswa` (
  `id` int(11) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `master_beasiswa` int(11) NOT NULL,
  `historis nilai` varchar(255) NOT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `status` int(1) NOT NULL,
  `aktif` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id`, `nama`) VALUES
(1, 'Januari - Juni'),
(2, 'Juli - Desember'),
(3, 'Januari - Desember\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Deni Suardi', 'denisuardi', 'deni@example.com', 'default.jpg', '$2y$10$ke9//UBxH/0m6OYhWBSSqe3eKro/Z9kCS/xqlFDkIpP9Kgpe34guq', 2, 1, 1627412147),
(6, 'adminunp', 'adminunp', 'admin@gmail.com', 'default.jpg', '$2y$10$IK1e3BaxLXrALPeEyrPhpOqgJVjrJ0fDfehRzlEoKQ0LSpFOrA.Ni', 1, 1, 1627567235),
(30, 'Admin Baznas', 'adminbaznas', 'baznas@gmail.com', 'default.jpg', '$2y$10$r8hw1C66/8kH1w9gUWzGfeG9iufG26ifO5Nc8Jxcit9hORHZQ/DH.', 5, 1, 1635056332),
(31, 'Febriyani Yunus', 'febriyani', 'febriyaniyunus1502@gmail.com', 'default.jpg', '$2y$10$lSCj1xcJJGCqbu8u5aaL8Ov4GV.feQZ8riG888EDPVlsBVGvx1SK6', 19, 1, 1635307864),
(40, 'Admin Baznas', 'adminbaznas', 'adminbaznas@gmail.com', 'default.jpg', '$2y$10$kdFU.203QY6sdPu1FpWKRudyBbu1D9md94prgfQCC2ITOlzwKQiQG', 5, 1, 1636944912);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL,
  `nama_panjang` varchar(100) NOT NULL,
  `id_beasiswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`, `nama_panjang`, `id_beasiswa`) VALUES
(1, 'administrator', 'Administrator', 0),
(2, 'member', 'Member Biasa', 0),
(5, 'partnershipbaznas', 'Admin Partnership Baznas', 1),
(13, 'partnershipnagari', 'Admin Partnership Bank Nagari', 6),
(14, 'partnershipkjmu', 'Admin Partnership KJMU', 8),
(19, 'adminbeasiswa', 'Admin Beasiswa', 0);

-- --------------------------------------------------------

--
-- Table structure for table `website_manajemen`
--

CREATE TABLE `website_manajemen` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `nama_yang_digunakan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `website_manajemen`
--

INSERT INTO `website_manajemen` (`id`, `judul`, `nama_yang_digunakan`) VALUES
(1, 'nama_website', 'SIB-Partnership'),
(2, 'kementerian_kop_surat', 'Kementerian Pendidikan, Kebudayaan, Riset dan Teknologi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asal_beasiswa`
--
ALTER TABLE `asal_beasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita_beasiswa`
--
ALTER TABLE `berita_beasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_person`
--
ALTER TABLE `contact_person`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_beasiswa`
--
ALTER TABLE `jenis_beasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelompok_beasiswa`
--
ALTER TABLE `kelompok_beasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa_beasiswa`
--
ALTER TABLE `mahasiswa_beasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa_beasiswa_bukti_pembayaran`
--
ALTER TABLE `mahasiswa_beasiswa_bukti_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_beasiswa`
--
ALTER TABLE `master_beasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_beasiswa_bp`
--
ALTER TABLE `master_beasiswa_bp`
  ADD PRIMARY KEY (`id_master_beasiswa_bp`);

--
-- Indexes for table `master_beasiswa_sk`
--
ALTER TABLE `master_beasiswa_sk`
  ADD PRIMARY KEY (`id_master_beasiswa_sk`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`kode_menu`);

--
-- Indexes for table `nama_beasiswa`
--
ALTER TABLE `nama_beasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penerima_beasiswa`
--
ALTER TABLE `penerima_beasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_manajemen`
--
ALTER TABLE `website_manajemen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akses`
--
ALTER TABLE `akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `asal_beasiswa`
--
ALTER TABLE `asal_beasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `berita_beasiswa`
--
ALTER TABLE `berita_beasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_person`
--
ALTER TABLE `contact_person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_beasiswa`
--
ALTER TABLE `jenis_beasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kelompok_beasiswa`
--
ALTER TABLE `kelompok_beasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=322;

--
-- AUTO_INCREMENT for table `mahasiswa_beasiswa`
--
ALTER TABLE `mahasiswa_beasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=324;

--
-- AUTO_INCREMENT for table `mahasiswa_beasiswa_bukti_pembayaran`
--
ALTER TABLE `mahasiswa_beasiswa_bukti_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `master_beasiswa`
--
ALTER TABLE `master_beasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `master_beasiswa_bp`
--
ALTER TABLE `master_beasiswa_bp`
  MODIFY `id_master_beasiswa_bp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `master_beasiswa_sk`
--
ALTER TABLE `master_beasiswa_sk`
  MODIFY `id_master_beasiswa_sk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `kode_menu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `nama_beasiswa`
--
ALTER TABLE `nama_beasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `penerima_beasiswa`
--
ALTER TABLE `penerima_beasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `website_manajemen`
--
ALTER TABLE `website_manajemen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
