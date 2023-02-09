-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2015 at 11:36 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inventori`
--
CREATE DATABASE IF NOT EXISTS `inventori` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `inventori`;

-- --------------------------------------------------------

--
-- Table structure for table `daftar_barang`
--

CREATE TABLE IF NOT EXISTS `daftar_barang` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `kode` varchar(20) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jenis` varchar(32) NOT NULL,
  `stock` int(10) NOT NULL,
  `satuan` varchar(15) NOT NULL,
  `spek` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `daftar_barang`
--

INSERT INTO `daftar_barang` (`id`, `kode`, `nama_barang`, `jenis`, `stock`, `satuan`, `spek`) VALUES
(2, 'BR2', 'EPSON EX12', 'Printer', 7, 'Unit', '-'),
(4, 'BR3', 'ASUS ROG', 'Laptop', 8, 'UNIT', ''),
(5, 'BR4', 'MOUSE', 'Lainnya', 17, 'UNIT', ''),
(6, 'BR10', 'SOUND', 'Lainnya', 18, 'UNIT', ''),
(7, 'BR11', 'MODEM', 'Lainnya', 14, 'UNIT', ''),
(8, 'BR9', 'ASUS X452CP', 'Laptop', 7, 'Unit', '- Intel i3 2.50GHz\r\n- RAM 4GB\r\n- Bluetooth\r\n- VGA ATI Radeon 1GB '),
(9, 'BR12', 'BB 9300', 'Handphone', 9, 'Unit', '- Touch Screen\r\n- Dual Core\r\n- RAM 1GB'),
(11, 'KIH124', 'RAM CORSAIR 2000', 'Lainnya', 8, 'Pcs', ''),
(12, 'KIH122', 'HARDISK 500GB', 'Lainnya', 15, 'Pcs', ''),
(13, 'KIH2344', 'MOUSE GAMER', 'Lainnya', 10, 'Pcs', ''),
(14, 'KIH2132', 'KABEL RJ45', 'Lainnya', 15, 'Unit', ''),
(15, 'HJ11', 'LENOVO G405S', 'Laptop', 29, 'UNIT', ''),
(16, 'R29', 'LENOVO THINKPAD', 'Laptop', 19, 'UNIT', '- Core i5\r\n- Ram 4GB\r\n- Windows 8.1 Pro'),
(17, 'HU11', 'ACER ASPIRE 10', 'Laptop', -1, 'UNIT', '- Core i3 1.8GHz\r\n- Ram 2 Gb\r\n- Touch Screen\r\n- Windows 8 Pro\r\n- VGA iNvidia GT2000'),
(18, 'E2', 'NOKIA ASHA', 'Handphone', 6, 'UNIT', '- GSM\r\n- Dual SIM\r\n- 2 Gb Memory ');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE IF NOT EXISTS `jenis` (
  `jenis_barang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`jenis_barang`) VALUES
('Laptop'),
('Handphone'),
('Lainnya'),
('PC'),
('Printer');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_trans`
--

CREATE TABLE IF NOT EXISTS `laporan_trans` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `kode_trans` varchar(32) NOT NULL,
  `nama_brg` varchar(100) NOT NULL,
  `jenis_trans` varchar(32) NOT NULL,
  `brg_to` varchar(100) NOT NULL,
  `jumlah_trans` int(10) NOT NULL,
  `stock_awal` varchar(10) NOT NULL,
  `stock_akhir` varchar(10) NOT NULL,
  `tanggal` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
 -- FULLTEXT KEY `nama_brg` (`nama_brg`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `laporan_trans`
--

INSERT INTO `laporan_trans` (`id`, `kode_trans`, `nama_brg`, `jenis_trans`, `brg_to`, `jumlah_trans`, `stock_awal`, `stock_akhir`, `tanggal`) VALUES
(2, 'TR0', 'LENOVO G405S', 'Keluar', '', 4, '29', '25', '2015-11-30'),
(3, 'TR1', 'ASUS ROG', 'Masuk', '', 4, '4', '8', '2015-12-01'),
(4, 'TR2', 'LENOVO THINKPAD', 'Masuk', '', 10, '9', '19', '2015-12-02'),
(13, 'TR3', 'ACER ASPIRE 10', 'Keluar', 'saya', 4, '3', '-1', '2015-12-14'),
(14, 'TR4', 'EPSON EX12', 'Masuk', '-', 7, '0', '7', '2015-12-14'),
(15, 'TR5', 'RAM CORSAIR 2000', 'Keluar', 'saya', 2, '10', '8', '2015-12-18');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `user`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE IF NOT EXISTS `satuan` (
  `satuan_barang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`satuan_barang`) VALUES
('Unit'),
('Pcs'),
('Roll');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `kode_trans` varchar(32) NOT NULL,
  `barang` varchar(32) NOT NULL,
  `jenis_trans` varchar(32) NOT NULL,
  `brg_to` varchar(100) NOT NULL,
  `jumlah_trans` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `kode_trans`, `barang`, `jenis_trans`, `brg_to`, `jumlah_trans`, `tanggal`) VALUES
(17, 'TR0', 'LENOVO G405S', 'Keluar', '', 4, '2015-11-30'),
(18, 'TR1', 'ASUS ROG', 'Masuk', '', 4, '2015-12-01'),
(19, 'TR2', 'LENOVO THINKPAD', 'Masuk', '', 10, '2015-12-02'),
(30, 'TR3', 'ACER ASPIRE 10', 'Keluar', 'saya', 4, '2015-12-14'),
(31, 'TR4', 'EPSON EX12', 'Masuk', '-', 7, '2015-12-14'),
(32, 'TR5', 'RAM CORSAIR 2000', 'Keluar', 'saya', 2, '2015-12-18');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
