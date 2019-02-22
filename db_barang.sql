-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19 Feb 2019 pada 14.26
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_barang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_request`
--

CREATE TABLE IF NOT EXISTS `detail_request` (
  `no_faktur` varchar(20) NOT NULL,
  `kd_barang` int(11) NOT NULL,
  `jml` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_request`
--

INSERT INTO `detail_request` (`no_faktur`, `kd_barang`, `jml`) VALUES
('20180829045133', 12, 2),
('20180829045133', 12, 2),
('20190217070746', 15, 50),
('20190217070810', 10, 1000),
('20190217070832', 18, 5),
('20190217070918', 13, 50),
('20190217070946', 11, 500),
('20190217070746', 18, 1),
('20190219140032', 12, 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `request`
--

CREATE TABLE IF NOT EXISTS `request` (
  `no_faktur` varchar(20) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tgl_request` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `no_rek` varchar(20) NOT NULL,
  `nm_bank` varchar(20) NOT NULL,
  `no_voucher` varchar(20) NOT NULL,
  `tgl_tr` date NOT NULL,
  `jam_tr` time NOT NULL,
  `project` varchar(50) NOT NULL,
  `no_po` varchar(7) NOT NULL,
  `no_invoice` varchar(10) NOT NULL,
  `tgl_inv` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `request`
--

INSERT INTO `request` (`no_faktur`, `total_harga`, `tgl_request`, `status`, `id`, `no_rek`, `nm_bank`, `no_voucher`, `tgl_tr`, `jam_tr`, `project`, `no_po`, `no_invoice`, `tgl_inv`) VALUES
('20190217070746', 3500000, '2019-02-17', 'Transaksi Sukses', 11, '8899009900', 'bca', 'VB001', '2018-06-17', '10:43:00', 'sopodel', 'spdl001', 'F22001', '2018-01-14'),
('20190217070810', 1000000, '2019-02-17', 'Transaksi Sukses', 12, '9990909090', 'bni', 'VB002', '2019-02-16', '10:11:00', 'toko buku', 'tb001', '7765677', '2019-01-23'),
('20190217070832', 15000000, '2019-02-17', 'Transaksi Sukses', 11, '8899009900', 'bca', 'VB001', '2018-06-17', '10:43:00', 'sopodel', 'spdl002', '999081', '2018-01-11'),
('20190217070918', 15000000, '2019-02-17', 'Barang Telah di Terima', 8, '', '', '', '0000-00-00', '00:00:00', 'sopodel', 'spdl003', '0099889', '2019-01-17'),
('20190217070946', 1500000, '2019-02-17', 'Transaksi Sukses', 12, '9990909090', 'bni', 'VB002', '2019-02-16', '10:11:00', 'toko buku', 'tb002', '1093909', '2019-02-12'),
('20190219140032', 250000, '2019-02-19', 'Barang Telah di Terima', 11, '', '', '', '0000-00-00', '00:00:00', 'sopodel', 'spdl004', '90909090', '2019-01-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE IF NOT EXISTS `tbl_barang` (
`kd_barang` int(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `supplier` varchar(50) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`kd_barang`, `nama_barang`, `satuan`, `harga`, `supplier`, `jumlah`) VALUES
(10, 'Penggaris', 'pcs', 1000, '', -935),
(9, 'Buku', 'pcs', 1500, '', 68),
(11, 'Pena', 'pcs', 3000, '', -3416),
(12, 'Tip-X', 'pcs', 5000, '', 43),
(13, 'A4', 'rim', 300000, '', 945),
(15, 'tisu', 'pcs', 10000, 'rama', -50),
(18, 'sofa', 'pcs', 3000000, 'ace hardware', -9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang_keluar`
--

CREATE TABLE IF NOT EXISTS `tbl_barang_keluar` (
`kd_barangkeluar` int(10) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `kd_barang` int(10) NOT NULL,
  `jml` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_barang_keluar`
--

INSERT INTO `tbl_barang_keluar` (`kd_barangkeluar`, `tgl_keluar`, `kd_barang`, `jml`, `nama`, `status`) VALUES
(15, '2018-08-13', 10, 1, 'Evanny Restu P', 'Y'),
(14, '2018-08-04', 9, 1, 'Evanny Restu P', 'Y'),
(13, '2018-08-03', 9, 1, 'Evanny Restu P', 'Y'),
(12, '2018-08-01', 9, 1, 'Puja Ariani S', 'Y'),
(16, '2018-08-14', 10, 1, 'Puja Ariani S', 'Y'),
(17, '2018-08-14', 9, 1, 'Evanny Restu P', 'Y'),
(18, '2018-08-14', 11, 5, 'Rindu Purnama', 'Y'),
(20, '2018-08-16', 10, 5, 'Rudi', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang_masuk`
--

CREATE TABLE IF NOT EXISTS `tbl_barang_masuk` (
`kd_brg_masuk` int(10) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `kd_barang` int(10) NOT NULL,
  `jmlbeli` int(10) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_barang_masuk`
--

INSERT INTO `tbl_barang_masuk` (`kd_brg_masuk`, `tgl_masuk`, `kd_barang`, `jmlbeli`) VALUES
(18, '2018-08-14', 10, 1),
(19, '2018-08-14', 9, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
`id` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `pass` varchar(70) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `uname`, `pass`, `nama`, `level`) VALUES
(1, 'admin', 'admin', 'Admin', 'admin'),
(9, 'supervisor', 'supervisor', 'supervisor', 'supervisor'),
(10, 'accounting', 'accounting', 'Accounting', 'accounting'),
(8, 'dila', 'dila', 'Dila', 'supplier'),
(11, 'supplier', 'supplier', 'Rama', 'supplier'),
(12, 'fajri', 'fajri', 'Fajri', 'supplier'),
(14, 'manajer', 'manajer', 'manajer', 'manajerkeuangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp`
--

CREATE TABLE IF NOT EXISTS `tmp` (
`id_tmp` int(11) NOT NULL,
  `kd_barang` int(11) NOT NULL,
  `jml` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `request`
--
ALTER TABLE `request`
 ADD PRIMARY KEY (`no_faktur`);

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
 ADD PRIMARY KEY (`kd_barang`);

--
-- Indexes for table `tbl_barang_keluar`
--
ALTER TABLE `tbl_barang_keluar`
 ADD PRIMARY KEY (`kd_barangkeluar`);

--
-- Indexes for table `tbl_barang_masuk`
--
ALTER TABLE `tbl_barang_masuk`
 ADD PRIMARY KEY (`kd_brg_masuk`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp`
--
ALTER TABLE `tmp`
 ADD PRIMARY KEY (`id_tmp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
MODIFY `kd_barang` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tbl_barang_keluar`
--
ALTER TABLE `tbl_barang_keluar`
MODIFY `kd_barangkeluar` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbl_barang_masuk`
--
ALTER TABLE `tbl_barang_masuk`
MODIFY `kd_brg_masuk` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tmp`
--
ALTER TABLE `tmp`
MODIFY `id_tmp` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
