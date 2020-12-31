-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2020 at 07:10 AM
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
-- Database: `si_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `ID_anggota` varchar(50) NOT NULL,
  `Nama` varchar(200) NOT NULL,
  `Alamat` varchar(300) NOT NULL,
  `JK` varchar(15) NOT NULL,
  `Kontak` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`ID_anggota`, `Nama`, `Alamat`, `JK`, `Kontak`) VALUES
('170845', 'Indonesia', 'Asia', 'tidak ada', 'Ada'),
('220998', 'Nicollas Edgar Septandita', 'Perum Pondok Mutiara Asri E6/1', 'Pria', '087750992001'),
('250101', 'Anggela Merici Punglipa Lewuras', 'Perum Permata Regency Blok 21/1', 'Wanita', '081917458683'),
('ada', 'ada', 'Seminari', 'Pria', 'tidak ada');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `Kode_buku` varchar(50) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `penulis` varchar(300) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `no_rak` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`Kode_buku`, `judul`, `penulis`, `penerbit`, `tahun`, `no_rak`) VALUES
('121', 'Pengantar Filsafat Nilai', 'Frondizi, Risieri ', 'Pustaka Pelajar', '2001', '121'),
('128/had/j', 'Jati diri manusia berdasar organisme Whitehead', 'Hardono hadi', 'Kanisius', '1996', '128'),
('128/Ver/i', 'Identitas Manusia menurut psikologi psikiatri abad ke-20', 'John W.M.Verhaar', 'Kanisius', '0', '128'),
('150/Sur/p', 'Pengembangan Alat ukur Psikologis', 'Sumadi, Suryabrata', 'Andi', '2015', '150'),
('297.9-AJA-p-2009', 'Perang Salib & Kembangkitan Kembali Ekonomi Eropa', 'Ajat Sudrajat; M. Solahudin', 'Leutika', '2009', '297'),
('302/Azw/r', 'Reliabilitasa dan Validitas', 'Saifuddin Azwar MA.', 'Liberty', '1986', '302'),
('305/Poe/k', 'Kebudayaan dan lingkungan: dalam perspektif antropologi', 'Hari Poerwanto Dr.', 'Pustaka Pelajar', '2000', '305'),
('575.016/how/d', 'Darwin pencetus teori evolusi', 'Jonathan Howard', 'Grafiti', '1991', '575'),
('808.84-MEL-d-2007', 'Doa Sang Katak 1: meditasi dengan cerita', 'Mello, Anthony de', 'Kanisius', '2007', '808.84'),
('813-ANA-b-1980', 'Bumi Manusia', 'Pramoedya Ananta Toer', 'Hasta Mitra', '1980', '813'),
('813-FUA-n-2009', 'Negeri 5 Menara', 'A. Fuadi', 'Gramedia Pustaka Utama', '2009', '813'),
('819.-MYB-a-2009', 'Burung-Burung Manyar', 'YB Mangunwijaya', 'Kanisius', '2009', '819'),
('823-BRO-t-2005', 'The Da Vinci Code', 'Brown, Dan; Isma B. Koesalamwardi', 'Serambi Ilmu Semesta', '2005', '823'),
('901/par', 'Para filsuf penentu gerak zaman', 'Mudji Sutrisno', 'Kanisius', '1992', '901');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peminjaman`
--

CREATE TABLE `tb_peminjaman` (
  `Kode_pinjam` varchar(50) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `ID_petugas` varchar(50) NOT NULL,
  `ID_anggota` varchar(50) NOT NULL,
  `Kode_buku` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_peminjaman`
--

INSERT INTO `tb_peminjaman` (`Kode_pinjam`, `tgl_pinjam`, `ID_petugas`, `ID_anggota`, `Kode_buku`) VALUES
('2020.3.1', '2020-03-27', 'CM2', '170845', '819.-MYB-a-2009'),
('2020.3.2', '2020-03-27', 'CM1', '220998', '808.84-MEL-d-2007'),
('2020.3.3', '2020-03-27', 'CM1', '250101', '297.9-AJA-p-2009');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengembalian`
--

CREATE TABLE `tb_pengembalian` (
  `Kode_kembali` varchar(50) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `denda` int(11) NOT NULL,
  `ID_petugas` varchar(50) NOT NULL,
  `ID_anggota` varchar(50) NOT NULL,
  `Kode_buku` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengembalian`
--

INSERT INTO `tb_pengembalian` (`Kode_kembali`, `tgl_kembali`, `denda`, `ID_petugas`, `ID_anggota`, `Kode_buku`) VALUES
('2020.3.2', '2020-04-02', 0, 'CM1', '220998', '808.84-MEL-d-2007');

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `ID_petugas` varchar(50) NOT NULL,
  `Nama` varchar(150) NOT NULL,
  `Alamat` varchar(300) NOT NULL,
  `JK` varchar(15) NOT NULL,
  `Kontak` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`ID_petugas`, `Nama`, `Alamat`, `JK`, `Kontak`) VALUES
('CM1', 'Joshua', 'Seminari', 'Pria', '081***'),
('CM2', 'Glen', 'Seminari', 'Pria', '082***'),
('CM3', 'Valentino', 'Seminari', 'Pria', 'valen@valen.valen'),
('CM4', 'Aldo', 'Seminari', 'Pria', 'aldo@aldo.aldo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`ID_anggota`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`Kode_buku`);

--
-- Indexes for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD PRIMARY KEY (`Kode_pinjam`),
  ADD KEY `ID_petugas` (`ID_petugas`),
  ADD KEY `ID_anggota` (`ID_anggota`),
  ADD KEY `Kode_buku` (`Kode_buku`);

--
-- Indexes for table `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  ADD PRIMARY KEY (`Kode_kembali`),
  ADD KEY `ID_petugas` (`ID_petugas`),
  ADD KEY `ID_anggota` (`ID_anggota`),
  ADD KEY `Kode_buku` (`Kode_buku`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`ID_petugas`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD CONSTRAINT `tb_peminjaman_ibfk_1` FOREIGN KEY (`ID_anggota`) REFERENCES `tb_anggota` (`ID_anggota`),
  ADD CONSTRAINT `tb_peminjaman_ibfk_2` FOREIGN KEY (`Kode_buku`) REFERENCES `tb_buku` (`Kode_buku`),
  ADD CONSTRAINT `tb_peminjaman_ibfk_3` FOREIGN KEY (`ID_petugas`) REFERENCES `tb_petugas` (`ID_petugas`);

--
-- Constraints for table `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  ADD CONSTRAINT `tb_pengembalian_ibfk_1` FOREIGN KEY (`ID_petugas`) REFERENCES `tb_petugas` (`ID_petugas`),
  ADD CONSTRAINT `tb_pengembalian_ibfk_2` FOREIGN KEY (`ID_anggota`) REFERENCES `tb_anggota` (`ID_anggota`),
  ADD CONSTRAINT `tb_pengembalian_ibfk_3` FOREIGN KEY (`Kode_buku`) REFERENCES `tb_buku` (`Kode_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
