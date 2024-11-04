-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 24, 2023 at 06:48 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_akademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bdstudi`
--

CREATE TABLE IF NOT EXISTS `tb_bdstudi` (
  `id_bdstudi` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) NOT NULL,
  PRIMARY KEY (`id_bdstudi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_bdstudi`
--

INSERT INTO `tb_bdstudi` (`id_bdstudi`, `nama`) VALUES
(1, 'Ilmu Komputer'),
(2, 'Akuntansi'),
(3, 'Robotika');

-- --------------------------------------------------------

--
-- Table structure for table `tb_berkas`
--

CREATE TABLE IF NOT EXISTS `tb_berkas` (
  `id_berkas` int(11) NOT NULL AUTO_INCREMENT,
  `tgl` date NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `file_ktm` varchar(64) DEFAULT NULL,
  `file_bayar` varchar(64) DEFAULT NULL,
  `file_proposal` varchar(64) DEFAULT NULL,
  `file_hasil` varchar(64) DEFAULT NULL,
  `file_tutup` varchar(64) DEFAULT NULL,
  `file_jurnal` varchar(64) DEFAULT NULL,
  `file_krs` varchar(64) DEFAULT NULL,
  `approve_prodi` varchar(1) DEFAULT NULL,
  `catatan_prodi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_berkas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_berkas_hasil`
--

CREATE TABLE IF NOT EXISTS `tb_berkas_hasil` (
  `id_berkas` int(11) NOT NULL AUTO_INCREMENT,
  `tgl` date NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `bpp` varchar(64) DEFAULT NULL,
  `per_pembimbing` varchar(64) DEFAULT NULL,
  `krs` varchar(64) DEFAULT NULL,
  `jurnal` varchar(64) DEFAULT NULL,
  `bukti_seminar` varchar(64) DEFAULT NULL,
  `suket_alquran` varchar(64) DEFAULT NULL,
  `sk_pembimbing` varchar(64) DEFAULT NULL,
  `bukti_konsumsi` varchar(64) DEFAULT NULL,
  `approve_prodi` varchar(1) DEFAULT NULL,
  `catatan_prodi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_berkas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tb_berkas_hasil`
--

INSERT INTO `tb_berkas_hasil` (`id_berkas`, `tgl`, `id_siswa`, `bpp`, `per_pembimbing`, `krs`, `jurnal`, `bukti_seminar`, `suket_alquran`, `sk_pembimbing`, `bukti_konsumsi`, `approve_prodi`, `catatan_prodi`) VALUES
(11, '2022-12-28', 29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_berkas_ujian_tutup`
--

CREATE TABLE IF NOT EXISTS `tb_berkas_ujian_tutup` (
  `id_berkas` int(11) NOT NULL AUTO_INCREMENT,
  `tgl` date NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `bpp` varchar(64) DEFAULT NULL,
  `persetujuan` varchar(64) DEFAULT NULL,
  `krs` varchar(64) DEFAULT NULL,
  `jurnal` varchar(64) DEFAULT NULL,
  `bukti_seminar` varchar(64) DEFAULT NULL,
  `suket_alquran` varchar(64) DEFAULT NULL,
  `sk_pembimbing` varchar(64) DEFAULT NULL,
  `bukti_konsumsi` varchar(64) DEFAULT NULL,
  `alumni` varchar(64) DEFAULT NULL,
  `loogbook` varchar(64) DEFAULT NULL,
  `perbaikan` varchar(64) DEFAULT NULL,
  `approve_prodi` varchar(1) DEFAULT NULL,
  `catatan_prodi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_berkas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen`
--

CREATE TABLE IF NOT EXISTS `tb_dosen` (
  `id_dosen` int(11) NOT NULL AUTO_INCREMENT,
  `nidn` varchar(32) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `bdstudi` varchar(128) NOT NULL,
  PRIMARY KEY (`id_dosen`),
  UNIQUE KEY `nidn` (`nidn`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tb_dosen`
--

INSERT INTO `tb_dosen` (`id_dosen`, `nidn`, `nama`, `bdstudi`) VALUES
(14, '001', 'Ansel R, S.Kom, M.Kom', 'Ilmu Komputer'),
(15, '002', 'Indra A, S.Kom', 'Robotika'),
(16, '003', 'Juhariah, S.Kom', 'Akuntansi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan`
--

CREATE TABLE IF NOT EXISTS `tb_jurusan` (
  `id_jurusan` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) NOT NULL,
  PRIMARY KEY (`id_jurusan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id_jurusan`, `nama`) VALUES
(1, 'Teknik Informatika'),
(2, 'Sistem Informasi'),
(3, 'Sistem Analis'),
(4, 'Arsitektur Komputer');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE IF NOT EXISTS `tb_kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama`) VALUES
(1, 'Hardware Programing'),
(2, 'Sistem Pakar'),
(3, 'Sistem Informasi'),
(4, 'SIG'),
(5, 'SPK');

-- --------------------------------------------------------

--
-- Table structure for table `tb_setup`
--

CREATE TABLE IF NOT EXISTS `tb_setup` (
  `id_setup` int(11) NOT NULL,
  `universitas` varchar(128) NOT NULL,
  `kabkota` varchar(16) NOT NULL,
  `nama_kabkota` varchar(128) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telp` varchar(16) NOT NULL,
  `web_url` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  PRIMARY KEY (`id_setup`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_setup`
--

INSERT INTO `tb_setup` (`id_setup`, `universitas`, `kabkota`, `nama_kabkota`, `alamat`, `telp`, `web_url`, `email`) VALUES
(1, 'Politeknik Cilacap', 'Kabupaten', 'Cilacap', 'Jl. Raya Pesanggrahan No. 20B. Kesugihan Cilacap - 53274', '082137801536', 'www.bedroweb.com', 'jasaaplikasidanweb34@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE IF NOT EXISTS `tb_siswa` (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `npm` varchar(32) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jurusan` varchar(128) NOT NULL,
  PRIMARY KEY (`id_siswa`),
  UNIQUE KEY `npm` (`npm`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `npm`, `nama`, `jurusan`) VALUES
(29, '111', 'gendis Dhiya', 'Sistem Informasi'),
(30, '112', 'Faula N', 'Arsitektur Komputer'),
(31, '113', 'Abril Guntara', 'Sistem Analis');

-- --------------------------------------------------------

--
-- Table structure for table `tb_skripsi`
--

CREATE TABLE IF NOT EXISTS `tb_skripsi` (
  `id_skripsi` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `kategori` varchar(128) NOT NULL,
  `topik` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `angkatan` varchar(4) NOT NULL,
  `file_proposal` varchar(64) DEFAULT NULL,
  `file_jurnal` varchar(64) DEFAULT NULL,
  `approve_prodi` varchar(1) DEFAULT NULL,
  `catatan_prodi` varchar(255) DEFAULT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `id_dosen2` int(11) DEFAULT NULL,
  `id_dosen3` int(11) DEFAULT NULL,
  `approve_dosen` varchar(1) DEFAULT NULL,
  `approve_dosen2` varchar(1) DEFAULT NULL,
  `approve_dosen3` varchar(1) DEFAULT NULL,
  `catatan_dosen` varchar(255) DEFAULT NULL,
  `catatan_dosen2` varchar(255) DEFAULT NULL,
  `catatan_dosen3` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_skripsi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tb_skripsi`
--

INSERT INTO `tb_skripsi` (`id_skripsi`, `id_siswa`, `tgl`, `kategori`, `topik`, `judul`, `angkatan`, `file_proposal`, `file_jurnal`, `approve_prodi`, `catatan_prodi`, `id_dosen`, `id_dosen2`, `id_dosen3`, `approve_dosen`, `approve_dosen2`, `approve_dosen3`, `catatan_dosen`, `catatan_dosen2`, `catatan_dosen3`) VALUES
(10, 29, '2022-12-28', 'Sistem Informasi', 'Sistem Informasi', 'Sistem Informasi Pengajuan Judul Skripsi', '2022', NULL, NULL, 'Y', 'Dilanjutkan ke dosen', 14, 15, 16, NULL, 'Y', NULL, NULL, 'Ok lanjutkan', NULL),
(11, 30, '2022-12-28', 'Hardware Programing', 'Hardware', 'Perakitan Komputer Untuk Menghasilkan Spesifikasi yang WOOW', '2021', NULL, NULL, 'Y', 'Dilanjutkan ke dosen', 14, 15, 16, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 31, '2022-12-28', 'SPK', 'Analisa', 'Penggunaan Metode X Untuk Menganalisa Kinerja Motherboard pada PC', '2021', NULL, NULL, 'Y', 'Dilanjutkan ke dosen', 14, 15, 16, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` varchar(32) NOT NULL,
  `nama_user` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hak_akses` varchar(16) NOT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `password`, `hak_akses`, `id_dosen`, `id_siswa`) VALUES
('001', 'Ansel R, S.Kom, M.Kom', '202cb962ac59075b964b07152d234b70', 'Dosen', 14, NULL),
('002', 'Indra A, S.Kom', '202cb962ac59075b964b07152d234b70', 'Dosen', 15, NULL),
('003', 'Juhariah, S.Kom', '202cb962ac59075b964b07152d234b70', 'Dosen', 16, NULL),
('111', 'gendis Dhiya', '202cb962ac59075b964b07152d234b70', 'Siswa', NULL, 29),
('112', 'Faula N', '202cb962ac59075b964b07152d234b70', 'Siswa', NULL, 30),
('113', 'Abril Guntara', '202cb962ac59075b964b07152d234b70', 'Siswa', NULL, 31),
('prodi', 'APP Prodi', '202cb962ac59075b964b07152d234b70', 'Prodi', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
