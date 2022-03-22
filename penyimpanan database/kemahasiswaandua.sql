-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2021 at 07:37 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kemahasiswaandua`
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
('5', '14', '1', '0', '0', '0', '0', 96),
('4', '5', '1', '0', '0', '0', '0', 97),
('5', '5', '1', '0', '0', '0', '0', 98),
('20', '1', '1', '0', '1', '1', '1', 106),
('1', '1', '1', '0', '1', '1', '1', 108),
('21', '1', '1', '0', '1', '1', '1', 109),
('20', '19', '1', '0', '1', '1', '1', 111),
('4', '19', '1', '0', '0', '0', '0', 112),
('5', '19', '1', '0', '0', '0', '0', 113),
('20', '2', '1', '0', '0', '0', '0', 115),
('21', '2', '1', '0', '0', '0', '0', 116),
('23', '1', '1', '0', '0', '0', '0', 117),
('23', '2', '1', '0', '0', '0', '0', 118),
('24', '1', '1', '0', '1', '1', '1', 119),
('29', '1', '1', '0', '0', '0', '0', 129);

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
(10, 'Swasta');

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
(258, '20062007', 'Aldewo Valentio', 'Teknik Sipil dan Banunan (D3)', 'FT', NULL, '1'),
(259, '20130058', 'Nari Amelia Aprilianti Sukma', 'Teknik Elektro Industri', 'FT', NULL, '1');

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
(261, '20130058', 17, '1');

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
  `tanggal_penetapan` date DEFAULT NULL,
  `buka_pendaftaran` enum('1','0') NOT NULL DEFAULT '0',
  `tampil` enum('1','0') NOT NULL DEFAULT '1',
  `aktif` enum('1','0') NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `user_created` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_beasiswa`
--

INSERT INTO `master_beasiswa` (`id`, `nama_beasiswa`, `kelompok_beasiswa`, `asal_beasiswa`, `jenis_beasiswa`, `biaya`, `periode`, `tahun`, `metode_pembayaran`, `sk`, `rekap_bukti_pembayaran`, `tanggal_penetapan`, `buka_pendaftaran`, `tampil`, `aktif`, `created_at`, `updated_at`, `user_created`) VALUES
(17, 1, 19, 4, 1, '2000000', 1, 2021, 'Transfer langsung ke rekening penerima', NULL, NULL, '2021-10-03', '0', '1', '1', '2021-10-30 22:34:42', '2021-11-02 07:28:17', NULL),
(18, 14, 21, 10, 3, '2000001', 3, 2021, 'Transfer langsung ke rekening penerimasasd', NULL, NULL, '2021-07-04', '1', '1', '0', '2021-10-30 23:51:12', '2021-11-05 03:54:43', 'adminunp');

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
(29, 'Manajemen Mahasiswa', 'data_beasiswa/mahasiswa', NULL, 'sub_menu', '4', '1', 0, '1', '2021-11-04 00:00:00', 'adminunp');

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
(14, 'satus', 'satu', 'satus', 'satu', '');

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
(31, 'Febriyani Yunus', 'febriyani', 'febriyaniyunus1502@gmail.com', 'default.jpg', '$2y$10$lSCj1xcJJGCqbu8u5aaL8Ov4GV.feQZ8riG888EDPVlsBVGvx1SK6', 19, 1, 1635307864);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akses`
--
ALTER TABLE `akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `asal_beasiswa`
--
ALTER TABLE `asal_beasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=260;

--
-- AUTO_INCREMENT for table `mahasiswa_beasiswa`
--
ALTER TABLE `mahasiswa_beasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;

--
-- AUTO_INCREMENT for table `mahasiswa_beasiswa_bukti_pembayaran`
--
ALTER TABLE `mahasiswa_beasiswa_bukti_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `master_beasiswa`
--
ALTER TABLE `master_beasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `master_beasiswa_bp`
--
ALTER TABLE `master_beasiswa_bp`
  MODIFY `id_master_beasiswa_bp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `master_beasiswa_sk`
--
ALTER TABLE `master_beasiswa_sk`
  MODIFY `id_master_beasiswa_sk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `kode_menu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `nama_beasiswa`
--
ALTER TABLE `nama_beasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
