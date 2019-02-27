-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 27, 2019 at 09:15 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_barang`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_request`
--

CREATE TABLE `detail_request` (
  `no_faktur` varchar(20) NOT NULL,
  `kd_barang` int(11) NOT NULL,
  `jml` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_request`
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
('20190219140032', 12, 50),
('20190222045411', 24, 1),
('20190222045411', 18, 2),
('20190222045539', 20, 1),
('20190222045706', 20, 1),
('20190222045706', 21, 2),
('20190222050450', 22, 1),
('20190222123443', 23, 2),
('20190223110916', 20, 2),
('20190227062614', 22, 2),
('20190227062614', 20, 2),
('20190227082439', 22, 1),
('20190227082630', 22, 1),
('20190227082701', 22, 1),
('20190227082757', 22, 2),
('20190227083312', 24, 1),
('20190227085935', 22, 1),
('20190227090002', 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
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
-- Dumping data for table `request`
--

INSERT INTO `request` (`no_faktur`, `total_harga`, `tgl_request`, `status`, `id`, `no_rek`, `nm_bank`, `no_voucher`, `tgl_tr`, `jam_tr`, `project`, `no_po`, `no_invoice`, `tgl_inv`) VALUES
('20190222045411', 12500000, '2019-02-22', 'Transaksi Sukses', 1, '8090908980', 'BCA', 'VB001', '2019-05-22', '12:14:00', 'sopodel', 'spdl001', 'ja88901', '2019-02-26'),
('20190222045539', 4085000, '2019-02-22', 'Transaksi Sukses', 2, '123900088890', 'Mandiri', 'VB002', '2019-03-23', '14:16:00', 'sopodel', 'spdl002', 'IN55426', '2019-02-24'),
('20190222045706', 5518168, '2019-02-22', 'Transaksi Sukses', 3, '172940712', 'BCA', 'VB006', '2019-02-27', '01:00:00', 'Tugu Mandiri', 'TM002', 'IN55499', '2019-02-24'),
('20190222050450', 8252000, '2019-02-22', 'Transaksi Sukses', 4, '7030943044', 'BCA', 'VB003', '2019-03-22', '16:44:00', 'Tugu Mandiri', 'TM001', '44400', '2019-02-28'),
('20190223110916', 8170000, '2019-02-23', 'Barang Telah di Terima', 2, '', '', '', '0000-00-00', '00:00:00', 'Sopodel', 'spdl003', '44428', '2019-02-28'),
('20190227062614', 24674000, '2019-02-27', 'Transaksi Sukses', 1, '135793175931', 'BCA', 'VB004', '2019-02-27', '02:02:00', 'Haviz', 'P150101', 'A2019', '2019-02-27'),
('20190227082439', 8252000, '2019-02-27', 'Transaksi Sukses', 1, '135314134', 'BNI', 'VB005', '2019-02-27', '01:00:00', 'AA123', 'AB123', 'INV123', '2019-02-27'),
('20190227082630', 8252000, '2019-02-27', 'Transaksi Sukses', 1, '135314134', 'BNI', 'VB005', '2019-02-27', '01:00:00', 'AA123', 'AB123', 'INV234', '2019-03-27'),
('20190227082701', 8252000, '2019-02-27', 'Transaksi Sukses', 1, '135314134', 'BNI', 'VB005', '2019-02-27', '01:00:00', 'P001', 'PO001', 'INV345', '2019-04-27'),
('20190227082757', 16504000, '2019-02-27', 'Transaksi Sukses', 3, '172940712', 'BCA', 'VB006', '2019-02-27', '01:00:00', 'P002', 'PO002', 'INV001', '2019-02-27'),
('20190227083312', 6500000, '2019-02-27', 'Menunggu Konfirmasi Pembayaran', 3, '175901735', 'BNI', 'VB008', '2019-03-31', '01:00:00', 'P003', 'PO003', 'INV002', '2019-03-30'),
('20190227085935', 8252000, '2019-02-27', 'Menunggu Konfirmasi Pembayaran', 3, '17285713', 'BCA', 'VB007', '2019-02-28', '01:00:00', 'A212', 'B212', 'AB212', '2019-02-28'),
('20190227090002', 3000000, '2019-02-27', 'Menunggu Konfirmasi Pembayaran', 3, '175901735', 'BNI', 'VB008', '2019-03-31', '01:00:00', 'C212', 'D212', 'AC212', '2019-03-30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `kd_barang` int(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`kd_barang`, `nama_barang`, `satuan`, `harga`) VALUES
(22, 'lemari kabinet', 'set', 8252000),
(20, 'meja crevone', 'unit', 4085000),
(21, 'Kursi Pufilo', 'unit', 716584),
(18, 'sofa', 'unit', 3000000),
(24, 'sofa liku', 'unit', 6500000),
(23, 'kabinet kamuflase', 'unit', 1750000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang_keluar`
--

CREATE TABLE `tbl_barang_keluar` (
  `kd_barangkeluar` int(10) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `kd_barang` int(10) NOT NULL,
  `jml` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang_keluar`
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
-- Table structure for table `tbl_barang_masuk`
--

CREATE TABLE `tbl_barang_masuk` (
  `kd_brg_masuk` int(10) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `kd_barang` int(10) NOT NULL,
  `jmlbeli` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang_masuk`
--

INSERT INTO `tbl_barang_masuk` (`kd_brg_masuk`, `tgl_masuk`, `kd_barang`, `jmlbeli`) VALUES
(18, '2018-08-14', 10, 1),
(19, '2018-08-14', 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`id_supplier`, `nama_supplier`, `telepon`, `alamat`) VALUES
(1, 'Pilar Indah Abadi', '08126321841', 'Jakarta'),
(2, 'Electronic City', '08132172131', 'Bogor'),
(3, 'Onel', '0812321122', 'Jakarta'),
(4, 'Jaelani', '08123583105', 'Jakarta Barat');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `pass` varchar(70) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `uname`, `pass`, `nama`, `level`) VALUES
(1, 'admin', 'admin', 'Admin', 'admin'),
(9, 'supervisor', 'supervisor', 'supervisor', 'supervisor'),
(10, 'accounting', 'accounting', 'Accounting', 'accounting'),
(14, 'manajer', 'manajer', 'manajer', 'manajerkeuangan');

-- --------------------------------------------------------

--
-- Table structure for table `tmp`
--

CREATE TABLE `tmp` (
  `id_tmp` int(11) NOT NULL,
  `kd_barang` int(11) NOT NULL,
  `jml` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`id_supplier`);

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
  MODIFY `kd_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_barang_keluar`
--
ALTER TABLE `tbl_barang_keluar`
  MODIFY `kd_barangkeluar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_barang_masuk`
--
ALTER TABLE `tbl_barang_masuk`
  MODIFY `kd_brg_masuk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tmp`
--
ALTER TABLE `tmp`
  MODIFY `id_tmp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
