-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2021 at 02:32 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kabar_kabinet`
--
CREATE DATABASE IF NOT EXISTS `kabar_kabinet` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `kabar_kabinet`;

-- --------------------------------------------------------

--
-- Table structure for table `kabar_kabinet_berita_kl`
--

CREATE TABLE `kabar_kabinet_berita_kl` (
  `id` int(11) NOT NULL,
  `id_kl` int(11) NOT NULL,
  `tgl_berita` date NOT NULL,
  `judul_berita` text NOT NULL,
  `url_berita` text NOT NULL,
  `monitor` varchar(50) NOT NULL DEFAULT 'DIMONITOR'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kabar_kabinet_berita_kl`
--

INSERT INTO `kabar_kabinet_berita_kl` (`id`, `id_kl`, `tgl_berita`, `judul_berita`, `url_berita`, `monitor`) VALUES
(5, 50, '2021-04-11', 'Menperin: Hannover Messe 2021 Momentum Indonesia Tunjukkan Kemampuan Menuju Industri 4.0', 'https://setkab.go.id/menperin-hannover-messe-2021-momentum-indonesia-tunjukkan-kemampuan-menuju-industri-4-0/', 'DIMONITOR'),
(6, 62, '2021-04-12', 'Gempa di Jatim, Presiden: Segera Lakukan Upaya Tanggap Darurat', 'https://setkab.go.id/gempa-di-jatim-presiden-segera-lakukan-upaya-tanggap-darurat/', 'DIMONITOR'),
(7, 1, '2021-04-14', 'apa deh', 'https://detik.com', 'TIDAK DIMONITOR');

-- --------------------------------------------------------

--
-- Table structure for table `kabar_kabinet_kl`
--

CREATE TABLE `kabar_kabinet_kl` (
  `id` int(11) NOT NULL,
  `nama_kl` varchar(256) NOT NULL,
  `website_kl` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kabar_kabinet_kl`
--

INSERT INTO `kabar_kabinet_kl` (`id`, `nama_kl`, `website_kl`) VALUES
(1, 'Presiden', ''),
(2, 'Wakil Presiden', 'https://www.wapresri.go.id/'),
(3, 'Kementerian Koordinator Bidang Politik, Hukum, dan Keamanan', 'https://polkam.go.id/'),
(4, 'Kementerian Koordinator Bidang Perekonomian', 'https://ekon.go.id/'),
(5, 'Kementerian Koordinator Bidang Pembangunan Manusia dan Kebudayaan', 'https://www.kemenkopmk.go.id/'),
(6, 'Kementerian Koordinator Bidang Kemaritiman dan Investasi', 'https://maritim.go.id/'),
(7, 'Kementerian Sekretaris Negara', 'https://www.setneg.go.id/'),
(8, 'Kementerian Dalam Negeri', 'https://www.kemendagri.go.id/'),
(9, 'Kementerian Luar Negeri', 'https://kemlu.go.id/'),
(10, 'Kementerian Pertahanan', 'https://www.kemhan.go.id/'),
(11, 'Kementerian Agama', 'https://kemenag.go.id/'),
(12, 'Kementerian Hukum dan Hak Asasi Manusia', 'https://www.kemenkumham.go.id/'),
(13, 'Kementerian Keuangan', 'https://www.kemenkeu.go.id/'),
(14, 'Kementerian Pendidikan dan Kebudayaan', 'https://www.kemdikbud.go.id/'),
(15, 'Kementerian Kesehatan', 'https://www.kemkes.go.id/'),
(16, 'Sehat Negeriku Kementerian Kesehatan', 'https://sehatnegeriku.kemkes.go.id/'),
(17, 'Kementerian Sosial', 'https://kemensos.go.id/'),
(18, 'Kementerian Ketenagakerjaan', 'https://kemnaker.go.id/'),
(19, 'Kementerian Perindustrian', 'https://kemenperin.go.id/'),
(20, 'Kementerian Perdagangan', 'https://www.kemendag.go.id/'),
(21, 'Kementerian Energi dan Sumber Daya Mineral', 'https://www.esdm.go.id/'),
(22, 'Kementerian Pekerjaan Umum dan Perumahan Rakyat', 'https://www.pu.go.id/'),
(23, 'Kementerian Perhubungan', 'http://dephub.go.id/'),
(24, 'Kementerian Komunikasi dan Informatika', 'https://www.kominfo.go.id/'),
(25, 'Kementerian Pertanian', 'https://www.pertanian.go.id/home/'),
(26, 'Kementerian Lingkungan Hidup dan Kehutanan', 'http://www.menlhk.go.id/'),
(27, 'Kementerian Kelautan dan Perikanan', 'https://kkp.go.id/'),
(28, 'Kementerian Desa, Pembangunan Daerah Tertinggal dan Transmigrasi', 'https://www.kemendesa.go.id/berita/'),
(29, 'Kementerian Agraria dan Tata Ruang/Kepala Badan Pertanahan Nasional', 'https://www.atrbpn.go.id/'),
(30, 'Kementerian Perencanaan Pembangunan Nasional/Kepala Badan Perencanaan Pembangunan Nasional', 'https://www.bappenas.go.id/'),
(31, 'Kementerian Pendayagunaan Aparatur Negara dan Reformasi Birokrasi', 'https://www.menpan.go.id/site/'),
(32, 'Kementerian Badan Usaha Milik Negara', 'https://bumn.go.id/'),
(33, 'Kementerian Koperasi dan Usaha Kecil dan Menengah', 'http://kemenkopukm.go.id/ '),
(34, 'Kementerian Pariwisata dan Ekonomi Kreatif/Kepala Badan Pariwisata dan Ekonomi Kreatif', 'https://www.kemenparekraf.go.id/'),
(35, 'Kementerian Pemberdayaan Perempuan dan Perlindungan', 'https://www.kemenpppa.go.id/'),
(36, 'Kementerian Riset dan Teknologi/Kepala Badan Riset dan Inovasi Nasional', 'https://www.ristekbrin.go.id/'),
(37, 'Kementerian Pemuda dan Olahraga', 'https://www.kemenpora.go.id/'),
(38, 'Jaksa Agung', 'https://www.kejaksaan.go.id/'),
(39, 'Panglima Tentara Nasional Indonesia', 'https://www.tni.mil.id/'),
(40, 'Kepala Kepolisian Republik Indonesia', 'https://www.polri.go.id/'),
(41, 'Kepala Staf Kepresidenan', 'https://ksp.go.id/'),
(42, 'Kepala Badan Koordinasi Penanaman Modal', 'https://www.bkpm.go.id/'),
(43, 'Satgas COVID-19', 'https://covid19.go.id/'),
(44, 'Badan Pengawasan Obat dan Makanan', 'https://www.pom.go.id/new/'),
(45, 'Badan Pusat Statistik', 'https://www.bps.go.id/'),
(46, 'Badan Kepegawaian Negara', 'https://www.bkn.go.id/'),
(47, 'Badan Meteorologi, Klimatologi, dan Geofisika', 'https://www.bmkg.go.id/'),
(48, 'Badan Kependudukan dan Keluarga Berencana Nasional', 'https://www.bkkbn.go.id/'),
(49, 'Badan Nasional Penanggulangan Bencana ', 'https://www.bnpb.go.id/'),
(50, 'Badan Nasional Pengelola perbatasan ', 'https://www.bnpp.go.id/'),
(51, 'Badan Narkotika Nasional', 'https://bnn.go.id/'),
(52, 'Lembaga Ilmu Pengetahuan Indonesia', 'http://lipi.go.id/'),
(53, 'Bank Indonesia', 'https://www.bi.go.id/'),
(54, 'Otoritas Jasa Keuangan', 'https://www.ojk.go.id/'),
(62, 'Sekretariat Kabinet', 'https://www.setkab.go.id');

-- --------------------------------------------------------

--
-- Table structure for table `kabar_kabinet_narasumber`
--

CREATE TABLE `kabar_kabinet_narasumber` (
  `id` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `jabatan` varchar(256) NOT NULL,
  `id_kl` int(11) NOT NULL,
  `awal_jabatan` date NOT NULL,
  `akhir_jabatan` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kabar_kabinet_narasumber`
--

INSERT INTO `kabar_kabinet_narasumber` (`id`, `nama`, `jabatan`, `id_kl`, `awal_jabatan`, `akhir_jabatan`, `status`) VALUES
(1, 'Deni Setiadhi', 'Ketua', 11, '2021-04-14', '2021-04-30', 'AKTIF'),
(2, 'Johan', 'Ketua', 13, '2021-04-15', '2021-04-15', 'TIDAK AKTIF'),
(3, 'Maher', 'Ketua', 10, '2021-04-16', '2021-04-16', 'AKTIF'),
(4, 'Azka', 'Ketua', 14, '2021-04-14', '2021-04-30', 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `kabar_kabinet_pengguna`
--

CREATE TABLE `kabar_kabinet_pengguna` (
  `id` int(3) NOT NULL,
  `nama_pengguna` varchar(256) NOT NULL,
  `pin_pengguna` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kabar_kabinet_pengguna`
--

INSERT INTO `kabar_kabinet_pengguna` (`id`, `nama_pengguna`, `pin_pengguna`) VALUES
(1, 'manusia ikan', '039b113967e6c538a38528fe5a64b5a2');

-- --------------------------------------------------------

--
-- Table structure for table `kabar_kabinet_setkab`
--

CREATE TABLE `kabar_kabinet_setkab` (
  `id` int(11) NOT NULL,
  `judul_berita` text NOT NULL,
  `url_berita` text NOT NULL,
  `tgl_berita` date NOT NULL,
  `tag` varchar(256) NOT NULL,
  `id_narsum` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kabar_kabinet_setkab`
--

INSERT INTO `kabar_kabinet_setkab` (`id`, `judul_berita`, `url_berita`, `tgl_berita`, `tag`, `id_narsum`) VALUES
(1, 'Seskab: Pandemi Tidak Hilangkan Makna dan Kesyahduan Ramadan\r\n', 'https://setkab.go.id/seskab-pandemi-tidak-hilangkan-makna-dan-kesyahduan-ramadan/', '2021-04-15', 'Kabar Kabinet', '');

-- --------------------------------------------------------

--
-- Table structure for table `kabar_kabinet_setkab_detail`
--

CREATE TABLE `kabar_kabinet_setkab_detail` (
  `id` int(11) NOT NULL,
  `id_berita_setkab` int(11) NOT NULL,
  `id_berita_kl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_berita_kl`
-- (See below for the actual view)
--
CREATE TABLE `view_berita_kl` (
`id` int(11)
,`id_kl` int(11)
,`tgl_berita` date
,`judul_berita` text
,`url_berita` text
,`monitor` varchar(50)
,`nama_kl` varchar(256)
,`status_monitor` varchar(5)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_narasumber`
-- (See below for the actual view)
--
CREATE TABLE `view_narasumber` (
`id` int(11)
,`nama` varchar(256)
,`jabatan` varchar(256)
,`id_kl` int(11)
,`awal_jabatan` date
,`akhir_jabatan` date
,`status` varchar(20)
,`nama_kl` varchar(256)
);

-- --------------------------------------------------------

--
-- Structure for view `view_berita_kl`
--
DROP TABLE IF EXISTS `view_berita_kl`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_berita_kl`  AS  select `kabar_kabinet_berita_kl`.`id` AS `id`,`kabar_kabinet_berita_kl`.`id_kl` AS `id_kl`,`kabar_kabinet_berita_kl`.`tgl_berita` AS `tgl_berita`,`kabar_kabinet_berita_kl`.`judul_berita` AS `judul_berita`,`kabar_kabinet_berita_kl`.`url_berita` AS `url_berita`,`kabar_kabinet_berita_kl`.`monitor` AS `monitor`,`kabar_kabinet_kl`.`nama_kl` AS `nama_kl`,if((`kabar_kabinet_berita_kl`.`monitor` = '1'),'YA','TIDAK') AS `status_monitor` from (`kabar_kabinet_berita_kl` left join `kabar_kabinet_kl` on((`kabar_kabinet_berita_kl`.`id_kl` = `kabar_kabinet_kl`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_narasumber`
--
DROP TABLE IF EXISTS `view_narasumber`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_narasumber`  AS  select `kabar_kabinet_narasumber`.`id` AS `id`,`kabar_kabinet_narasumber`.`nama` AS `nama`,`kabar_kabinet_narasumber`.`jabatan` AS `jabatan`,`kabar_kabinet_narasumber`.`id_kl` AS `id_kl`,`kabar_kabinet_narasumber`.`awal_jabatan` AS `awal_jabatan`,`kabar_kabinet_narasumber`.`akhir_jabatan` AS `akhir_jabatan`,`kabar_kabinet_narasumber`.`status` AS `status`,`kabar_kabinet_kl`.`nama_kl` AS `nama_kl` from (`kabar_kabinet_narasumber` left join `kabar_kabinet_kl` on((`kabar_kabinet_narasumber`.`id_kl` = `kabar_kabinet_kl`.`id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kabar_kabinet_berita_kl`
--
ALTER TABLE `kabar_kabinet_berita_kl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kabar_kabinet_kl`
--
ALTER TABLE `kabar_kabinet_kl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kabar_kabinet_narasumber`
--
ALTER TABLE `kabar_kabinet_narasumber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kabar_kabinet_pengguna`
--
ALTER TABLE `kabar_kabinet_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kabar_kabinet_setkab`
--
ALTER TABLE `kabar_kabinet_setkab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kabar_kabinet_setkab_detail`
--
ALTER TABLE `kabar_kabinet_setkab_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kabar_kabinet_berita_kl`
--
ALTER TABLE `kabar_kabinet_berita_kl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kabar_kabinet_kl`
--
ALTER TABLE `kabar_kabinet_kl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `kabar_kabinet_narasumber`
--
ALTER TABLE `kabar_kabinet_narasumber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kabar_kabinet_pengguna`
--
ALTER TABLE `kabar_kabinet_pengguna`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kabar_kabinet_setkab`
--
ALTER TABLE `kabar_kabinet_setkab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kabar_kabinet_setkab_detail`
--
ALTER TABLE `kabar_kabinet_setkab_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
