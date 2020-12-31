-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2020 at 07:13 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dw_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `dim_peminjaman_anggota`
--

CREATE TABLE `dim_peminjaman_anggota` (
  `sk_peminjaman_anggota` int(11) DEFAULT NULL,
  `Kode_pinjam` varchar(50) DEFAULT NULL,
  `Nama` varchar(200) DEFAULT NULL,
  `tgl_pinjam` datetime DEFAULT NULL,
  `judul` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dim_peminjaman_anggota`
--

INSERT INTO `dim_peminjaman_anggota` (`sk_peminjaman_anggota`, `Kode_pinjam`, `Nama`, `tgl_pinjam`, `judul`) VALUES
(1, '2020.3.1', 'Indonesia', '2020-03-27 00:00:00', 'Burung-Burung Manyar'),
(2, '2020.3.2', 'Nicollas Edgar Septandita', '2020-03-27 00:00:00', 'Doa Sang Katak 1: meditasi dengan cerita'),
(3, '2020.3.3', 'Anggela Merici Punglipa Lewuras', '2020-03-27 00:00:00', 'Perang Salib & Kembangkitan Kembali Ekonomi Eropa'),
(4, NULL, 'ada', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dim_peminjaman_petugas`
--

CREATE TABLE `dim_peminjaman_petugas` (
  `sk_peminjaman_petugas` int(11) DEFAULT NULL,
  `Kode_pinjam` varchar(50) DEFAULT NULL,
  `Nama` varchar(150) DEFAULT NULL,
  `judul` varchar(150) DEFAULT NULL,
  `Alamat` text,
  `tgl_tugas_pinjam` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dim_peminjaman_petugas`
--

INSERT INTO `dim_peminjaman_petugas` (`sk_peminjaman_petugas`, `Kode_pinjam`, `Nama`, `judul`, `Alamat`, `tgl_tugas_pinjam`) VALUES
(1, '2020.3.3', 'Joshua', 'Perang Salib & Kembangkitan Kembali Ekonomi Eropa', 'Seminari', '2020-03-27 00:00:00'),
(2, '2020.3.1', 'Glen', 'Burung-Burung Manyar', 'Seminari', '2020-03-27 00:00:00'),
(3, NULL, 'Valentino', NULL, 'Seminari', NULL),
(4, NULL, 'Aldo', NULL, 'Seminari', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dim_pengembalian_anggota`
--

CREATE TABLE `dim_pengembalian_anggota` (
  `sk_pengembalian_anggota` int(11) DEFAULT NULL,
  `Kode_kembali` varchar(50) DEFAULT NULL,
  `Nama` varchar(200) DEFAULT NULL,
  `tgl_kembali` datetime DEFAULT NULL,
  `judul` varchar(150) DEFAULT NULL,
  `denda` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dim_pengembalian_anggota`
--

INSERT INTO `dim_pengembalian_anggota` (`sk_pengembalian_anggota`, `Kode_kembali`, `Nama`, `tgl_kembali`, `judul`, `denda`) VALUES
(1, NULL, 'Indonesia', NULL, NULL, NULL),
(2, '2020.3.2', 'Nicollas Edgar Septandita', '2020-04-02 00:00:00', 'Doa Sang Katak 1: meditasi dengan cerita', 0),
(3, NULL, 'Anggela Merici Punglipa Lewuras', NULL, NULL, NULL),
(4, NULL, 'ada', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dim_pengembalian_petugas`
--

CREATE TABLE `dim_pengembalian_petugas` (
  `sk_pengembalian_petugas` int(11) DEFAULT NULL,
  `Kode_kembali` varchar(50) DEFAULT NULL,
  `Nama` varchar(150) DEFAULT NULL,
  `judul` varchar(150) DEFAULT NULL,
  `denda` int(11) DEFAULT NULL,
  `tgl_petugas_pengembalian` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dim_pengembalian_petugas`
--

INSERT INTO `dim_pengembalian_petugas` (`sk_pengembalian_petugas`, `Kode_kembali`, `Nama`, `judul`, `denda`, `tgl_petugas_pengembalian`) VALUES
(1, '2020.3.2', 'Joshua', 'Doa Sang Katak 1: meditasi dengan cerita', 0, '2020-04-02 00:00:00'),
(2, NULL, 'Glen', NULL, NULL, NULL),
(3, NULL, 'Valentino', NULL, NULL, NULL),
(4, NULL, 'Aldo', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fact_perpustakaan`
--

CREATE TABLE `fact_perpustakaan` (
  `sk_peminjaman_anggota` int(11) DEFAULT NULL,
  `sk_peminjaman_petugas` int(11) DEFAULT NULL,
  `sk_pengembalian_anggota` int(11) DEFAULT NULL,
  `sk_pengembalian_petugas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fact_perpustakaan`
--

INSERT INTO `fact_perpustakaan` (`sk_peminjaman_anggota`, `sk_peminjaman_petugas`, `sk_pengembalian_anggota`, `sk_pengembalian_petugas`) VALUES
(4, 4, 4, 4),
(4, 4, 4, 4),
(4, 4, 4, 4),
(4, 4, 4, 4),
(3, 3, 3, 3),
(4, 4, 4, 4),
(4, 4, 4, 4),
(4, 4, 4, 4),
(2, 2, 2, 2),
(4, 4, 4, 4),
(4, 4, 4, 4),
(1, 1, 1, 1),
(4, 4, 4, 4),
(4, 4, 4, 4);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
