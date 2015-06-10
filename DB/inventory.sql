-- phpMyAdmin SQL Dump
-- version 2.11.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 10, 2015 at 11:47 AM
-- Server version: 5.0.45
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_sisa`
--

CREATE TABLE IF NOT EXISTS `barang_sisa` (
  `kode_brg` varchar(15) NOT NULL,
  `jml_stock1` int(10) NOT NULL,
  `jml_stock2` int(10) NOT NULL,
  `jml_stock3` int(10) NOT NULL,
  `harga_jual1` int(10) NOT NULL,
  `harga_jual2` int(10) NOT NULL,
  `harga_jual3` int(10) NOT NULL,
  `harga_beli1` int(10) NOT NULL,
  `harga_beli2` int(10) NOT NULL,
  `harga_beli3` int(10) NOT NULL,
  `kode_psk` varchar(10) NOT NULL,
  PRIMARY KEY  (`kode_brg`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_sisa`
--


-- --------------------------------------------------------

--
-- Table structure for table `bayar_hutang`
--

CREATE TABLE IF NOT EXISTS `bayar_hutang` (
  `no_bukti` varchar(50) NOT NULL,
  `kode_psk` varchar(10) NOT NULL,
  `sisa` decimal(20,0) NOT NULL,
  `angsuran` varchar(50) NOT NULL,
  `jml_bayar` decimal(20,0) NOT NULL,
  `lunas` varchar(50) NOT NULL,
  `tgl_bayar` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bayar_hutang`
--


-- --------------------------------------------------------

--
-- Table structure for table `bayar_piutang`
--

CREATE TABLE IF NOT EXISTS `bayar_piutang` (
  `no_bukti` varchar(50) NOT NULL,
  `kode_plg` varchar(10) NOT NULL,
  `sisa` decimal(20,0) NOT NULL,
  `angsuran` varchar(50) NOT NULL,
  `jml_bayar` decimal(20,0) NOT NULL,
  `lunas` varchar(50) NOT NULL,
  `tgl_bayar` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bayar_piutang`
--


-- --------------------------------------------------------

--
-- Table structure for table `coa_kelompok`
--

CREATE TABLE IF NOT EXISTS `coa_kelompok` (
  `kode` varchar(5) NOT NULL,
  `kelompok` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coa_kelompok`
--

INSERT INTO `coa_kelompok` (`kode`, `kelompok`) VALUES
('n', 'AKTIVA'),
('n', 'HUTANG'),
('n', 'MODAL'),
('r', 'PENDAPATAN'),
('r', 'HPP'),
('r', 'BIAYA');

-- --------------------------------------------------------

--
-- Table structure for table `coa_template`
--

CREATE TABLE IF NOT EXISTS `coa_template` (
  `id` int(2) NOT NULL auto_increment,
  `perkiraan` char(9) default NULL,
  `deskripsi` char(23) default NULL,
  `tingkat` char(7) default NULL,
  `grup` char(10) default NULL,
  `grup2` char(13) default NULL,
  `grup3` char(17) default NULL,
  `saldo` char(5) default NULL,
  `kode` char(4) default NULL,
  `kode2` char(5) default NULL,
  `debet` char(5) default NULL,
  `kredit` char(6) default NULL,
  `saldo1` char(6) default NULL,
  `saldo2` char(6) default NULL,
  `saldo3` char(6) default NULL,
  `debet1` char(6) default NULL,
  `kredit1` char(7) default NULL,
  `debet2` char(6) default NULL,
  `kredit2` char(7) default NULL,
  `debet3` char(6) default NULL,
  `kredit3` char(7) default NULL,
  `b1` char(2) default NULL,
  `b2` char(2) default NULL,
  `b3` char(2) default NULL,
  `b4` char(2) default NULL,
  `b5` char(2) default NULL,
  `b6` char(2) default NULL,
  `b7` char(2) default NULL,
  `b8` char(2) default NULL,
  `b9` char(2) default NULL,
  `b10` char(3) default NULL,
  `b11` char(3) default NULL,
  `b12` char(3) default NULL,
  `tahun` char(5) default NULL,
  `link` char(4) default NULL,
  `kodecoa` char(7) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `coa_template`
--

INSERT INTO `coa_template` (`id`, `perkiraan`, `deskripsi`, `tingkat`, `grup`, `grup2`, `grup3`, `saldo`, `kode`, `kode2`, `debet`, `kredit`, `saldo1`, `saldo2`, `saldo3`, `debet1`, `kredit1`, `debet2`, `kredit2`, `debet3`, `kredit3`, `b1`, `b2`, `b3`, `b4`, `b5`, `b6`, `b7`, `b8`, `b9`, `b10`, `b11`, `b12`, `tahun`, `link`, `kodecoa`) VALUES
(1, '11', 'AKTIVA LANCAR', 'G', 'AKTIVA', '', '', '0', 'n', '1', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(2, '21', 'HUTANG', 'G', 'HUTANG', '', '', '0', 'n', '1', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(3, '31', 'MODAL', 'G', 'MODAL', '', '', '0', 'n', '1', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(4, '41', 'PENDAPATAN', 'G', 'PENDAPATAN', '', '', '0', 'r', 'a', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(5, '51', 'HPP', 'G', 'HPP', '', '', '0', 'r', 'b', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(6, '61', 'BIAYA', 'G', 'BIAYA', '', '', '0', 'r', 'c', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(7, '111', 'KAS DAN BANK', 'SG', 'AKTIVA', 'AKTIVA LANCAR', '', '0', 'n', '1', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(8, '11101', 'KAS', 'D', 'AKTIVA', 'AKTIVA LANCAR', 'KAS DAN BANK', '0', 'n', '1', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(9, '11102', 'KAS KECIL', 'D', 'AKTIVA', 'AKTIVA LANCAR', 'KAS DAN BANK', '0', 'n', '1', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(10, '11103', 'BANK', 'D', 'AKTIVA', 'AKTIVA LANCAR', 'KAS DAN BANK', '0', 'n', '1', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(11, '112', 'PIUTANG', 'SG', 'AKTIVA', 'AKTIVA LANCAR', '', '0', 'n', '1', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(12, '11104', 'CHEQUE (BG)', 'D', 'AKTIVA', 'AKTIVA LANCAR', 'KAS DAN BANK', '0', 'n', '1', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(13, '11201', 'PIUTANG USAHA', 'D', 'AKTIVA', 'AKTIVA LANCAR', 'PIUTANG', '0', 'n', '1', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(14, '11202', 'PIUTANG KARYAWAN', 'D', 'AKTIVA', 'AKTIVA LANCAR', 'PIUTANG', '0', 'n', '1', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(15, '113', 'PERSEDIAAN', 'SG', 'AKTIVA', 'AKTIVA LANCAR', '', '0', 'n', '1', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(16, '11301', 'PERSEDIAAN BARANG', 'D', 'AKTIVA', 'AKTIVA LANCAR', 'PERSEDIAAN', '0', 'n', '1', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(17, '11299', 'PIUTANG LAIN-LAIN', 'D', 'AKTIVA', 'AKTIVA LANCAR', 'PIUTANG', '0', 'n', '1', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(18, '11399', 'PERSEDIAAN LAIN-LAIN', 'D', 'AKTIVA', 'AKTIVA LANCAR', 'PERSEDIAAN', '0', 'n', '1', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(19, '211', 'HUTANG LANCAR', 'SG', 'HUTANG', 'HUTANG', '', '0', 'n', '1', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(20, '21101', 'HUTANG USAHA', 'D', 'HUTANG', 'HUTANG', 'HUTANG LANCAR', '0', 'n', '1', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(21, '21199', 'HUTANG LAIN-LAIN', 'D', 'HUTANG', 'HUTANG', 'HUTANG LANCAR', '0', 'n', '1', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(22, '11204', 'PIUTANG LANGGANAN', 'D', 'AKTIVA', 'AKTIVA LANCAR', 'PIUTANG', '0', 'n', '1', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(23, '11209', 'UANG MUKA PEMBELIAN', 'D', 'AKTIVA', 'AKTIVA LANCAR', 'PIUTANG', '0', 'n', '1', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(24, '311', 'MODAL DAN LABA', 'SG', 'MODAL', 'MODAL', '', '0', 'n', '1', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(25, '31101', 'MODAL', 'D', 'MODAL', 'MODAL', 'MODAL DAN LABA', '0', 'n', '1', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(26, '31102', 'LABA DITAHAN', 'D', 'MODAL', 'MODAL', 'MODAL DAN LABA', '0', 'n', '1', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(27, '31103', 'LABA TAHUN BERJALAN', 'D', 'MODAL', 'MODAL', 'MODAL DAN LABA', '0', 'n', 'd', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(28, '411', 'PENDAPATAN', 'SG', 'PENDAPATAN', 'PENDAPATAN', '', '0', 'r', 'a', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(29, '41101', 'PENDAPATAN UTAMA', 'D', 'PENDAPATAN', 'PENDAPATAN', 'PENDAPATAN', '0', 'r', 'a', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(30, '41102', 'PENDAPATAN SAMPINGAN', 'D', 'PENDAPATAN', 'PENDAPATAN', 'PENDAPATAN', '0', 'r', 'a', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(31, '49999', 'PENDAPATAN LAIN-LAIN', 'D', 'PENDAPATAN', 'PENDAPATAN', 'PENDAPATAN', '0', 'r', 'a', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(32, '21110', 'UANG MUKA PENJUALAN', 'D', 'HUTANG', 'HUTANG', 'HUTANG LANCAR', '0', 'n', '1', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(33, '21111', 'PPN PENJUALAN', 'D', 'HUTANG', 'HUTANG', 'HUTANG LANCAR', '0', 'n', '1', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(34, '511', 'HPP', 'SG', 'HPP', 'HPP', '', '0', 'r', 'b', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(35, '51101', 'HPP', 'D', 'HPP', 'HPP', 'HPP', '0', 'r', 'b', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(36, '59999', 'HPP LAIN-LAIN', 'D', 'HPP', 'HPP', 'HPP', '0', 'r', 'b', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(37, '611', 'BIAYA OPERASIONAL', 'SG', 'BIAYA', 'BIAYA', '', '0', 'r', 'c', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(38, '61101', 'BIAYA TELPONE', 'D', 'BIAYA', 'BIAYA', 'BIAYA OPERASIONAL', '0', 'r', 'c', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(39, '61102', 'BIAYA LISTRIK', 'D', 'BIAYA', 'BIAYA', 'BIAYA OPERASIONAL', '0', 'r', 'c', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(40, '61103', 'BIAYA PDAM', 'D', 'BIAYA', 'BIAYA', 'BIAYA OPERASIONAL', '0', 'r', 'c', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(41, '61105', 'BIAYA PERJALANAN', 'D', 'BIAYA', 'BIAYA', 'BIAYA OPERASIONAL', '0', 'r', 'c', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(42, '612', 'BIAYA KARYAWAN', 'SG', 'BIAYA', 'BIAYA', '', '0', 'r', 'c', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(43, '61201', 'BIAYA GAJI', 'D', 'BIAYA', 'BIAYA', 'BIAYA KARYAWAN', '0', 'r', 'c', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(44, '69999', 'BIAYA LAIN-LAIN', 'D', 'BIAYA', 'BIAYA', 'BIAYA OPERASIONAL', '0', 'r', 'c', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(45, '61110', 'ONGKOS KIRIM PEMBELIAN', 'D', 'BIAYA', 'BIAYA', 'BIAYA OPERASIONAL', '0', 'r', 'c', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(46, '41901', 'ONGKOS KIRIM PENJUALAN', 'D', 'PENDAPATAN', 'PENDAPATAN', 'PENJUALAN ATK', '0', 'r', 'a', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(47, '61901', 'PPN PEMBELIAN', 'D', 'BIAYA', 'BIAYA', 'BIAYA OPERASIONAL', '0', 'r', 'c', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(48, '61902', 'BIAYA ADMINISTRASI BANK', 'D', 'BIAYA', 'BIAYA', 'BIAYA OPERASIONAL', '0', 'r', 'c', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(49, '61104', 'BIAYA BBM', 'D', 'BIAYA', 'BIAYA', 'BIAYA OPERASIONAL', '0', 'r', 'c', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(50, '61106', 'BIAYA PARKIR', 'D', 'BIAYA', 'BIAYA', 'BIAYA OPERASIONAL', '0', 'r', 'c', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(51, '61107', 'OLI & SERVICE', 'D', 'BIAYA', 'BIAYA', 'BIAYA OPERASIONAL', '0', 'r', 'c', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(52, '61109', 'IURAN WARGA & KEAMANAN', 'D', 'BIAYA', 'BIAYA', 'BIAYA OPERASIONAL', '0', 'r', 'c', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(53, '61111', 'BIAYA SAMPAH', 'D', 'BIAYA', 'BIAYA', 'BIAYA OPERASIONAL', '0', 'r', 'c', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0000'),
(54, '21112', 'HUTANG BG', 'D', 'HUTANG', 'HUTANG', 'HUTANG LANCAR', '0', 'n', '1', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `golongan_barang`
--

CREATE TABLE IF NOT EXISTS `golongan_barang` (
  `kode_gol` varchar(5) NOT NULL,
  `nama_gol` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY  (`kode_gol`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `golongan_barang`
--

INSERT INTO `golongan_barang` (`kode_gol`, `nama_gol`, `keterangan`) VALUES
('MKN', 'Makanan', 'Makanan Hallal'),
('MIN', 'Minuman', 'Minuman Hallal'),
('KRT', 'Keperluan Rumah Tangga', '');

-- --------------------------------------------------------

--
-- Table structure for table `gudang_standart`
--

CREATE TABLE IF NOT EXISTS `gudang_standart` (
  `kode_brg` varchar(15) NOT NULL,
  `satuan1` varchar(20) NOT NULL,
  `satuan2` varchar(20) NOT NULL,
  `satuan3` varchar(20) NOT NULL,
  `jml_stock1` int(10) NOT NULL,
  `jml_stock2` int(10) NOT NULL,
  `jml_stock3` int(10) NOT NULL,
  `harga_jual1` int(10) NOT NULL,
  `harga_jual2` int(10) NOT NULL,
  `harga_jual3` int(10) NOT NULL,
  `harga_beli1` int(10) NOT NULL,
  `harga_beli2` int(10) NOT NULL,
  `harga_beli3` int(10) NOT NULL,
  `kode_psk` varchar(10) NOT NULL,
  PRIMARY KEY  (`kode_brg`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gudang_standart`
--

INSERT INTO `gudang_standart` (`kode_brg`, `satuan1`, `satuan2`, `satuan3`, `jml_stock1`, `jml_stock2`, `jml_stock3`, `harga_jual1`, `harga_jual2`, `harga_jual3`, `harga_beli1`, `harga_beli2`, `harga_beli3`, `kode_psk`) VALUES
('MKN001001000001', 'karton', 'dosin', 'biji', 10, 0, 0, 120425, 0, 0, 120425, 0, 0, 'SP-005'),
('MKN001001000002', 'karton', 'dosin', 'biji', 0, 5, 0, 0, 42093, 0, 0, 42093, 0, 'SP-005'),
('MKN001001000003', 'karton', 'dosin', 'biji', 0, 3, 0, 0, 56201, 0, 0, 56201, 0, 'SP-005'),
('MKN001001000004', 'karton', 'dosin', 'biji', 0, 5, 0, 0, 29185, 0, 0, 29185, 0, 'SP-005'),
('MKN001001000006', 'karton', 'dosin', 'biji', 0, 4, 0, 0, 24230, 0, 0, 24230, 0, 'SP-005'),
('KRT001001000001', 'karton', 'dosin', 'biji', 0, 6, 0, 0, 14128, 0, 0, 14128, 0, 'SP-003'),
('KRT001001000002', 'karton', 'dosin', 'biji', 0, 6, 0, 0, 14128, 0, 0, 14128, 0, 'SP-003'),
('KRT001001000003', 'karton', 'dosin', 'biji', 0, 6, 0, 0, 14128, 0, 0, 14128, 0, 'SP-003'),
('KRT001001000004', 'karton', 'dosin', 'biji', 0, 6, 0, 0, 14128, 0, 0, 14128, 0, 'SP-003'),
('KRT001001000005', 'karton', 'dosin', 'biji', 0, 6, 0, 0, 13091, 0, 0, 13091, 0, 'SP-003'),
('KRT001001000006', 'karton', 'dosin', 'biji', 0, 6, 0, 0, 13091, 0, 0, 13091, 0, 'SP-003'),
('KRT001001000007', 'karton', 'dosin', 'biji', 0, 6, 0, 0, 13091, 0, 0, 13091, 0, 'SP-003'),
('KRT002001000001', 'karton', 'dosin', 'biji', 9, 0, 0, 95000, 0, 0, 95000, 0, 0, 'SP-003'),
('KRT002001000002', 'karton', 'dosin', 'biji', 4, 0, 0, 4996, 0, 0, 4996, 0, 0, 'SP-003'),
('KRT002001000003', 'karton', 'dosin', 'biji', 0, 4, 0, 0, 76968, 0, 0, 76968, 0, 'SP-003'),
('KRT003001000002', 'karton', 'dosin', 'biji', 0, 3, 0, 0, 31975, 0, 0, 31975, 0, 'SP-004'),
('KRT001003000003', 'karton', 'dosin', 'biji', 1, 0, 0, 162984, 0, 0, 162984, 0, 0, 'SP-004'),
('KRT001003000002', 'karton', 'dosin', 'biji', 2, 0, 0, 162984, 0, 0, 162984, 0, 0, 'SP-004'),
('KRT001003000001', 'karton', 'dosin', 'biji', 2, 0, 0, 162984, 0, 0, 162984, 0, 0, 'SP-004'),
('KRT001002000002', 'karton', 'dosin', 'biji', 1, 0, 0, 176460, 0, 0, 176460, 0, 0, 'SP-004'),
('KRT001002000001', 'karton', 'dosin', 'biji', 1, 0, 0, 176460, 0, 0, 176460, 0, 0, 'SP-004');

-- --------------------------------------------------------

--
-- Table structure for table `hutang`
--

CREATE TABLE IF NOT EXISTS `hutang` (
  `tgl_bukti` date NOT NULL,
  `no_bukti` varchar(50) NOT NULL,
  `kode_psk` varchar(10) NOT NULL,
  `nilai` decimal(20,0) NOT NULL,
  `lunas` varchar(10) NOT NULL,
  `jatuh_tempo` char(2) NOT NULL,
  `sisa` decimal(20,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hutang`
--

INSERT INTO `hutang` (`tgl_bukti`, `no_bukti`, `kode_psk`, `nilai`, `lunas`, `jatuh_tempo`, `sisa`) VALUES
('2015-05-08', 'A-528675', 'SP-004', '968847', '', '30', '968847');

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE IF NOT EXISTS `identitas` (
  `id` int(2) NOT NULL auto_increment,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(50) NOT NULL,
  `kode_pos` varchar(10) NOT NULL,
  `tlp` varchar(15) NOT NULL,
  `fax` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`id`, `nama`, `alamat`, `kota`, `kode_pos`, `tlp`, `fax`, `email`, `website`) VALUES
(1, 'CV. JASMINE USAHA MANDIRI', 'KOMP SOREANG INDAH BLOK DD NO 13', 'BANDUNG', '40912', '022 - 5890000', '022 - 5891111', 'info@jaya-aneka-usaha.com', 'www.jaya-aneka-usaha.com');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE IF NOT EXISTS `jenis_barang` (
  `kode_jenis` varchar(6) NOT NULL,
  `kode_gol` varchar(5) NOT NULL,
  `numerator` varchar(10) NOT NULL,
  `nama_jenis` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY  (`kode_jenis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`kode_jenis`, `kode_gol`, `numerator`, `nama_jenis`, `keterangan`) VALUES
('MKN001', 'MKN', '', 'Mie Instan', ''),
('MKN002', 'MKN', '', 'Snack/Makanan RIngan', ''),
('MIN002', 'MIN', '', 'Minuman Energi/Suplemen Tubuh', ''),
('MIN001', 'MIN', '', 'Minuman Ringan', ''),
('KRT001', 'KRT', '', 'Perlengkapan Mandi dan Cuci', ''),
('KRT002', 'KRT', '', 'Pewangi dan Pelembut Pakaian', ''),
('KRT003', 'KRT', '', 'Pembersih Lantai', ''),
('KRT004', 'KRT', '', 'Obat Nyamuk', ''),
('MKN003', 'MKN', '', 'Bahan Tambahan/Penyedap Masakan', ''),
('KRT005', 'KRT', '', 'Pewangi dan Pemutih Badan', ''),
('MKN004', 'MKN', '', 'Makanan Aanak/Bayi', '');

-- --------------------------------------------------------

--
-- Table structure for table `master_barang`
--

CREATE TABLE IF NOT EXISTS `master_barang` (
  `kode_brg` varchar(15) NOT NULL,
  `kode_gol` varchar(5) NOT NULL,
  `kode_jenis` varchar(6) NOT NULL,
  `kode_psk` varchar(5) NOT NULL,
  `kode_prd` varchar(10) NOT NULL,
  `numerator` varchar(12) NOT NULL,
  `nama_brg` varchar(100) NOT NULL,
  `spec` varchar(50) NOT NULL,
  `satuan1` text NOT NULL,
  `satuan2` text NOT NULL,
  `satuan3` varchar(10) NOT NULL,
  `isi1` int(4) NOT NULL,
  `isi2` int(4) NOT NULL,
  `isi3` int(4) NOT NULL,
  `stock_awal1` int(4) NOT NULL,
  `stock_awal2` int(4) NOT NULL,
  `stock_awal3` int(4) NOT NULL,
  `stock_minimal` int(4) NOT NULL,
  `stock_maximal` int(4) NOT NULL,
  PRIMARY KEY  (`kode_brg`),
  KEY `numerator` (`numerator`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_barang`
--

INSERT INTO `master_barang` (`kode_brg`, `kode_gol`, `kode_jenis`, `kode_psk`, `kode_prd`, `numerator`, `nama_brg`, `spec`, `satuan1`, `satuan2`, `satuan3`, `isi1`, `isi2`, `isi3`, `stock_awal1`, `stock_awal2`, `stock_awal3`, `stock_minimal`, `stock_maximal`) VALUES
('MKN001001000001', 'MKN', 'MKN001', '', 'MKN001001', '', 'Indomie Goreng Special 84 Gr', ' 84 Gr', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('MKN001001000002', 'MKN', 'MKN001', '', 'MKN001001', '', 'Indomie Rasa Ayam 84 Gr', ' 84 Gr', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('MKN001001000003', 'MKN', 'MKN001', '', 'MKN001001', '', 'Indomie Rasa Soto 84 Gr', ' 84 Gr', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('MKN001001000004', 'MKN', 'MKN001', '', 'MKN001001', '', 'Indomie Rasa Kare Ayam 84 Gr', ' 84 Gr', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('MKN001001000005', 'MKN', 'MKN001', '', 'MKN001001', '', 'Indomie Rasa Ayam Bawang 84 Gr', ' 84 Gr', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('MKN001001000006', 'MKN', 'MKN001', '', 'MKN001001', '', 'Indomie Goreng Special Jumbo', ' Jumbo', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('MKN001001000007', 'MKN', 'MKN001', '', 'MKN001001', '', 'Indomie Rasa Ayam Jumbo', ' Jumbo', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('MKN001001000008', 'MKN', 'MKN001', '', 'MKN001001', '', 'Indomie Rasa Soto Jumbo', ' Jumbo', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('MKN001001000009', 'MKN', 'MKN001', '', 'MKN001001', '', 'Indomie Rasa Kare Ayam Jumbo', ' Jumbo', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('MKN001001000010', 'MKN', 'MKN001', '', 'MKN001001', '', 'Indomie Rasa Ayam Bawang Jumbo', ' Jumbo', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('MKN001002000001', 'MKN', 'MKN001', '', 'MKN001002', '', 'Sarimie Rasa ayan84 Gr', 'n84 Gr', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('MKN001002000002', 'MKN', 'MKN001', '', 'MKN001002', '', 'Sarimie Rasa Kare Ayam 84 Gr', ' 84 Gr', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('MKN001002000003', 'MKN', 'MKN001', '', 'MKN001002', '', 'Sarimie Rasa Ayam Bawang 84 Gr', ' 84 Gr', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('MKN001002000004', 'MKN', 'MKN001', '', 'MKN001002', '', 'Ssarimie Goreng 84 Gr', ' 84 Gr', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('MKN001002000005', 'MKN', 'MKN001', '', 'MKN001002', '', 'Sariemie Rasa ayam Extra', ' Extra', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('MKN001002000006', 'MKN', 'MKN001', '', 'MKN001002', '', 'Sarimie Rasa Kare Ayam Extra', ' Extra', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('MKN001002000007', 'MKN', 'MKN001', '', 'MKN001002', '', 'Sarimie Rasa Ayam Bawang Extra', ' Extra', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('MKN001002000008', 'MKN', 'MKN001', '', 'MKN001002', '', 'Sarimie Goreng Extra', ' Extra', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('MKN001003000001', 'MKN', 'MKN001', '', 'MKN001003', '', 'Supermie Goreng 84Gr', 'g 84Gr', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('MKN001003000002', 'MKN', 'MKN001', '', 'MKN001003', '', 'Supermie Rasa ayam Bawang 84 Gr', ' 84 Gr', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('MKN001003000003', 'MKN', 'MKN001', '', 'MKN001003', '', 'Supermie Rasa Ayam 84 Gr', ' 84 Gr', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('MKN001003000004', 'MKN', 'MKN001', '', 'MKN001003', '', 'Supermie Rasa Kare Ayam 84 Gr', ' 84 Gr', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('MKN001003000005', 'MKN', 'MKN001', '', 'MKN001003', '', 'Supermie Goreng Extra', ' Extra', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('MKN001003000006', 'MKN', 'MKN001', '', 'MKN001003', '', 'Supermie Rasa ayam Bawang Extra', ' Extra', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('MKN001003000007', 'MKN', 'MKN001', '', 'MKN001003', '', 'Supermie Rasa Ayam Extra', ' Extra', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('MKN001003000008', 'MKN', 'MKN001', '', 'MKN001003', '', 'Supermie Rasa Kare Ayam Extra', ' Extra', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('MKN001004000001', 'MKN', 'MKN001', '', 'MKN001004', '', 'Mie Sedap Goreng 90 gr', ' 90 gr', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('MKN001004000002', 'MKN', 'MKN001', '', 'MKN001004', '', 'Mie Sedap Rasa Soto 90 Gr', ' 90 Gr', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('MKN001004000003', 'MKN', 'MKN001', '', 'MKN001004', '', 'Mie Sedap Rasa ayam Goreng 90 gr', ' 90 gr', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('MKN001005000001', 'MKN', 'MKN001', '', 'MKN001005', '', 'Salam Mie Goreng 84 Gr', ' 84 Gr', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('MKN001005000002', 'MKN', 'MKN001', '', 'MKN001005', '', 'Salam Mie Goreng Jawa 84 Gr', ' 84 Gr', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('KRT001001000001', 'KRT', 'KRT001', '', 'KRT001001', '', 'Lux Beauty White 100 Gr', '100 Gr', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('KRT001001000002', 'KRT', 'KRT001', '', 'KRT001001', '', 'Lux Beauty Pink 100 Gr', '100 Gr', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('KRT001001000003', 'KRT', 'KRT001', '', 'KRT001001', '', 'Lux Beauty Blue 100 Gr', '100 Gr', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('KRT001001000004', 'KRT', 'KRT001', '', 'KRT001001', '', 'Lux Beauty Purple 100 Gr', '100 Gr', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('KRT001001000005', 'KRT', 'KRT001', '', 'KRT001001', '', 'Lifeboy Ts Pink 90 Gr', ' 90 Gr', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('KRT001001000006', 'KRT', 'KRT001', '', 'KRT001001', '', 'Lifeboy Ts White 90 Gr', ' 90 Gr', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('KRT001001000007', 'KRT', 'KRT001', '', 'KRT001001', '', 'Lifeboy Ts Gold 90 Gr', ' 90 Gr', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('KRT001004000002', 'KRT', 'KRT001', '', 'KRT001004', '', 'Pepsodent White 120 Gr', '120 Gr', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('KRT001004000001', 'KRT', 'KRT001', '', 'KRT001004', '', 'Pepsodent White 75 Gr', ' 75 Gr', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('KRT002001000001', 'KRT', 'KRT002', '', 'KRT002001', '', 'Molto Wangi Blue POUNC 30 ML', ' 30 ML', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('KRT002001000002', 'KRT', 'KRT002', '', 'KRT002001', '', 'Molto Wangi Sach Pink 30 ML', ' 30 ML', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('KRT002001000003', 'KRT', 'KRT002', '', 'KRT002001', '', 'Molto Soft Blue 30 ML', ' 30 ML', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('KRT002001000004', 'KRT', 'KRT002', '', 'KRT002001', '', 'Molto Soft Pink Sach 30 ML', ' 30 ML', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('KRT002001000005', 'KRT', 'KRT002', '', 'KRT002001', '', 'Molto Wangi Pch Pink 450 ML', '450 ML', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('KRT002001000006', 'KRT', 'KRT002', '', 'KRT002001', '', 'Molto Wangi Pch Blue 450 ML', '450 ML', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('KRT002001000007', 'KRT', 'KRT002', '', 'KRT002001', '', 'Molto Soft Blue 450 ML', '450 ML', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('KRT002001000008', 'KRT', 'KRT002', '', 'KRT002001', '', 'Molto Soft Blue Reff 900 ML', '900 ML', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('KRT001002000001', 'KRT', 'KRT001', '', 'KRT001002', '', 'Shampo Clear Sch 50 ML', ' 50 ML', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('KRT001002000002', 'KRT', 'KRT001', '', 'KRT001002', '', 'Shampo Clear Btl 150 ML', '150 ML', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('KRT001003000001', 'KRT', 'KRT001', '', 'KRT001003', '', 'CIF Cream Lemon Btl 500 ML', '500 ML', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('KRT001003000002', 'KRT', 'KRT001', '', 'KRT001003', '', 'CIF Cream Lemon Refill 325ML', ' 325ML', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('KRT001003000003', 'KRT', 'KRT001', '', 'KRT001003', '', 'Mama Lemon Extra Jeruk Nipis Refill 800 ML', '800 ML', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('KRT001003000004', 'KRT', 'KRT001', '', 'KRT001003', '', 'Polytex Double Scourer', 'courer', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('KRT001003000005', 'KRT', 'KRT001', '', 'KRT001003', '', 'Aganol Lavender Floor Cleaner 700ml', ' 700ml', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('KRT001003000006', 'KRT', 'KRT001', '', 'KRT001003', '', 'Aganol Morning Fresh Floor Cleaner 700ml', ' 700ml', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('KRT001003000007', 'KRT', 'KRT001', '', 'KRT001003', '', 'Mr. Muscle AXI Keramik Citrus Pouch 800ml', ' 800ml', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('KRT003001000001', 'KRT00', 'KRT', '', 'KRT003001', '', 'Super Pell Matic Dust Cloth Medium', 'Medium', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('KRT003001000002', 'KRT', 'KRT003', '', 'KRT003001', '', 'Super Pell Yellow Lemon Ginger Refill 800ml', ' 800ml', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('KRT003001000003', 'KRT', 'KRT003', '', 'KRT003001', '', 'Super Pell White Refill Floor Cleaner 800ml', ' 800ml', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('KRT003001000004', 'KRT', 'KRT003', '', 'KRT003001', '', 'Super Pell Cherry Rose Red Refill Floor Cleaner 800ml', ' 800ml', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('KRT003001000005', 'KRT', 'KRT003', '', 'KRT003001', '', 'Super Pell Purple Refill Floor Cleaner 800ml', ' 800ml', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('KRT003001000006', 'KRT', 'KRT003', '', 'KRT003001', '', 'Super Pell Blue Refill Floor Cleaner 800ml', ' 800ml', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('KRT004001000001', 'KRT', 'KRT004', '', 'KRT004001', '', 'Domestos Toilet Extra Power Pink Power 500ml', ' 500ml', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('KRT004001000002', 'KRT', 'KRT004', '', 'KRT004001', '', 'Domestos Toilet Extra Power Blue Original 500ml', ' 500ml', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('KRT004001000003', 'KRT', 'KRT004', '', 'KRT004001', '', 'Domestos Toilet Antikerak Lemon 450Ml', ' 450Ml', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('KRT004001000004', 'KRT', 'KRT004', '', 'KRT004001', '', 'Domestos Toilet Antikerak Fresh 450Ml', ' 450Ml', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0),
('KRT001004000003', 'KRT', 'KRT001', '', 'KRT001004', '', 'Close Up Toothpaste Fire Freeze 160g', 'e 160g', 'karton', 'dosin', 'biji', 0, 0, 0, 0, 0, 0, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `kode_plg` varchar(7) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `nama_pemilik` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(15) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `kode_pos` varchar(5) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `fax` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY  (`kode_plg`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`kode_plg`, `nama_perusahaan`, `nama_pemilik`, `alamat`, `telp`, `kota`, `kode_pos`, `hp`, `fax`, `email`) VALUES
('PLG-001', 'CV. Mitra Usaha', 'Pepen Farid Hartato', 'Jl. Gading Tutuka No. 99', '022589 7878', 'Bandung', '40912', '0823322322', '0222 56799', 'mitra_usaha_mandiri@yahoo.com'),
('PLG-002', 'Mang Donal', 'H. Donal', 'JL. Terusan Kopo No. 123', '0225412345', 'Bandung', '4099', '08213457689', '-', 'mang_donal@gmail.com'),
('PLG-003', 'CV. Pelangi Sejahtera', 'HJ. Yanti Sastrawijaya', 'JL. Gading Tutuka No. 45', '022 5898787', 'Bandung', '40912', '098765432123', '022 878909', 'pelangi_sejahtera@yahoo.co.id'),
('PLG-004', 'CV. Radiance Jaya', 'Jojo Pamungkas', 'Jl. Kopo sayati No. 11', '0225419090', 'Bandung', '40312', '09878909878', '0225437887', 'radiance@gmail.com'),
('PLG-005', 'Anonymouse', 'Anonymouse', '-', '-', '-', '-', '-', '-', '-'),
('PLG-006', 'CV. Jasmine Media Informatika', 'Dikdik Tasdik Laksana', 'Komp. Soreang Indah Blok DD 13', '0225890141', 'Bandung', '40912', '082116914224', '-', 'info@zahirra.com');

-- --------------------------------------------------------

--
-- Table structure for table `pemasok`
--

CREATE TABLE IF NOT EXISTS `pemasok` (
  `kode_psk` varchar(6) NOT NULL,
  `nama_psk` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(100) NOT NULL,
  `kode_pos` varchar(10) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `fax` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `kontak` varchar(100) NOT NULL,
  PRIMARY KEY  (`kode_psk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemasok`
--

INSERT INTO `pemasok` (`kode_psk`, `nama_psk`, `alamat`, `kota`, `kode_pos`, `telp`, `hp`, `fax`, `email`, `kontak`) VALUES
('SP-001', 'PT. Sinar Usaha', 'Jl. Raya Bekasi KM 27 Ujung Menteng Jaktim', 'Jakarta', '-', '-', '-', '-', '-', '-'),
('SP-002', 'PT. CIpta Usaha', 'Jl. Setia Budi 21 Madiun', 'Madiun', '-', '-', '-', '-', '-', '-'),
('SP-003', 'PT. Alausaha', 'Jl. Trunojoyo 5 Madiun', 'Madiun', '-', '-', '-', '-', '-', '-'),
('SP-004', 'PT. Bravita Usaha', 'Komp. Margorejo Indah Blok A III Surabaya', 'Surabaya', '-', '-', '-', '-', '-', '-'),
('SP-005', 'CV. Usaha Jaya', 'Jl. Lengkong No. 35 Bandung', 'Bandung', '-', '-', '-', '-', '-', '-'),
('SP-006', 'UD. Mekar Usaha', 'Jl. Hasanudin Barat 49 Surabaya', 'Surabaya', '-', '-', '-', '-', '-', '-'),
('SP-007', 'PT. Maju Usaha', 'Kapten Saputra 50 Medan', 'Medan', '-', '-', '-', '-', '-', '-'),
('SP-008', 'CV. Dunia Usaha', 'Jl. Moch Toha No. 45 Bandung', 'Bandung', '-', '-', '-', '-', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE IF NOT EXISTS `pembelian` (
  `no_bukti` varchar(15) NOT NULL,
  `tgl_bukti` date NOT NULL,
  `kode_psk` varchar(10) NOT NULL,
  `cara_bayar` varchar(10) NOT NULL,
  `lunas` varchar(15) NOT NULL default '0',
  `jatuh_tempo` int(2) NOT NULL default '0',
  `tgl_jt` date NOT NULL,
  `uraian` text NOT NULL,
  `user_id` int(2) NOT NULL,
  PRIMARY KEY  (`no_bukti`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`no_bukti`, `tgl_bukti`, `kode_psk`, `cara_bayar`, `lunas`, `jatuh_tempo`, `tgl_jt`, `uraian`, `user_id`) VALUES
('00001', '2015-05-08', 'SP-005', 'tunai', '0', 0, '2015-05-08', 'Contoh 1 Transkasi Pembelian ', 1),
('60528675', '2015-05-09', 'SP-003', 'tunai', '0', 0, '2015-05-09', 'Contoh 2 Transkasi Pembelian', 1),
('A-528675', '2015-05-08', 'SP-004', 'kredit', '0', 30, '2015-06-07', 'Contoh 3 Transaksi Pembelian', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pemusnahan`
--

CREATE TABLE IF NOT EXISTS `pemusnahan` (
  `no_bukti` varchar(50) NOT NULL,
  `operator` varchar(100) NOT NULL,
  `tgl_bukti` date NOT NULL,
  `kode_brg` varchar(15) NOT NULL,
  `jumlah` varchar(4) NOT NULL,
  `satuan` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemusnahan`
--


-- --------------------------------------------------------

--
-- Table structure for table `pengaturan_transkasi`
--

CREATE TABLE IF NOT EXISTS `pengaturan_transkasi` (
  `id` int(2) NOT NULL auto_increment,
  `jenis_trx` varchar(10) NOT NULL,
  `nama_trx` varchar(100) NOT NULL,
  `kode_perk_kas` varchar(50) NOT NULL,
  `kode_perk` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pengaturan_transkasi`
--

INSERT INTO `pengaturan_transkasi` (`id`, `jenis_trx`, `nama_trx`, `kode_perk_kas`, `kode_perk`) VALUES
(1, '100', 'Pembelian Barang Tunai', '11101', '11301'),
(2, '101', 'Pembelian Barang Kredit', '11301', '21101'),
(3, '200', 'Penjualan Tunai', '11101', '');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `tgl_bukti` date NOT NULL,
  `no_bukti` varchar(10) NOT NULL,
  `kode_plg` varchar(10) NOT NULL,
  `cara_bayar` varchar(10) NOT NULL,
  `jatuh_tempo` date NOT NULL,
  `uraian` text NOT NULL,
  `nama_opr` varchar(100) NOT NULL,
  `user_id` int(2) NOT NULL,
  PRIMARY KEY  (`no_bukti`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--


-- --------------------------------------------------------

--
-- Table structure for table `piutang`
--

CREATE TABLE IF NOT EXISTS `piutang` (
  `tgl_bukti` date NOT NULL,
  `no_bukti` varchar(50) NOT NULL,
  `kode_plg` varchar(10) NOT NULL,
  `nilai` decimal(20,0) NOT NULL,
  `lunas` varchar(10) NOT NULL,
  `jatuh_tempo` date NOT NULL,
  `sisa` decimal(20,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `piutang`
--


-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `kode_prd` varchar(10) NOT NULL,
  `kode_gol` varchar(5) NOT NULL,
  `kode_jenis` varchar(6) NOT NULL,
  `numerator` varchar(10) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY  (`kode_prd`),
  KEY `numerator` (`numerator`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`kode_prd`, `kode_gol`, `kode_jenis`, `numerator`, `nama_produk`, `keterangan`) VALUES
('MKN001001', 'MKN', 'MKN001', '', 'Indomie', ''),
('MKN001002', 'MKN', 'MKN001', '', 'Sarimie', ''),
('MKN001003', 'MKN', 'MKN001', '', 'Supermie', ''),
('MKN001004', 'MKN', 'MKN001', '', 'Mie Sedap', ''),
('MKN001005', 'MKN', 'MKN001', '', 'Salam Mie', ''),
('KRT001001', 'KRT', 'KRT001', '', 'Sabun Mandi', ''),
('KRT001002', 'KRT', 'KRT001', '', 'Shampo', ''),
('KRT001003', 'KRT', 'KRT001', '', 'Sabun Cuci', ''),
('KRT001004', 'KRT', 'KRT001', '', 'Pasta Gigi', ''),
('KRT002001', 'KRT', 'KRT002', '', 'Molto', ''),
('KRT003001', 'KRT', 'KRT003', '', 'Super Pell', ''),
('KRT004001', 'KRT', 'KRT004', '', 'Domestos', '');

-- --------------------------------------------------------

--
-- Table structure for table `repacking`
--

CREATE TABLE IF NOT EXISTS `repacking` (
  `no_bukti` varchar(50) NOT NULL,
  `operator` varchar(100) NOT NULL,
  `tgl_bukti` date NOT NULL,
  `kode_brg` varchar(15) NOT NULL,
  `jumlah` varchar(4) NOT NULL,
  `satuan` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `repacking`
--


-- --------------------------------------------------------

--
-- Table structure for table `retur_pembelian`
--

CREATE TABLE IF NOT EXISTS `retur_pembelian` (
  `tgl_retur` date NOT NULL,
  `no_retur` varchar(15) NOT NULL,
  `no_urut` varchar(4) NOT NULL,
  `kode_psk` varchar(10) NOT NULL,
  `kode_brg` varchar(15) NOT NULL,
  `jumlah` varchar(4) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga_beli` decimal(20,0) NOT NULL,
  `jatuh_tempo` date NOT NULL,
  `uraian` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retur_pembelian`
--


-- --------------------------------------------------------

--
-- Table structure for table `retur_penjualan`
--

CREATE TABLE IF NOT EXISTS `retur_penjualan` (
  `tgl_retur` date NOT NULL,
  `no_retur` varchar(15) NOT NULL,
  `no_urut` varchar(4) NOT NULL,
  `kode_plg` varchar(10) NOT NULL,
  `kode_brg` varchar(15) NOT NULL,
  `jumlah` varchar(4) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga_jual` decimal(20,0) NOT NULL,
  `jatuh_tempo` date NOT NULL,
  `uraian` text NOT NULL,
  `kondisi` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retur_penjualan`
--


-- --------------------------------------------------------

--
-- Table structure for table `sementara`
--

CREATE TABLE IF NOT EXISTS `sementara` (
  `id` int(5) NOT NULL auto_increment,
  `no_bukti` varchar(15) NOT NULL,
  `kode_brg` varchar(15) NOT NULL,
  `nama_brg` varchar(100) NOT NULL,
  `jumlah` varchar(4) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga` decimal(20,0) NOT NULL,
  `no_urut` varchar(4) NOT NULL,
  `exp_date` date NOT NULL,
  `diskon` smallint(2) NOT NULL,
  `harga_stl_diskon` decimal(20,0) NOT NULL,
  `status` varchar(50) NOT NULL,
  `user_id` int(2) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `sementara`
--


-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL,
  `value` text NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `type`, `value`, `description`, `created_at`, `updated_at`) VALUES
(19, 'FACEBOOK', 'text', 'http://facebook.com/artha_wijaya', '', '0000-00-00 00:00:00', '2014-06-04 06:57:42'),
(20, 'TWITTER', 'text', 'http://twitter.com/artha_wijaya', '', '0000-00-00 00:00:00', '2014-06-04 06:57:55'),
(35, 'PERSENTASE_HARGA_JUAL', 'text', '10', '', '0000-00-00 00:00:00', '2015-05-04 12:01:52'),
(11, 'NAMA_APLIKASI', 'text', 'Inventory Control', '', '0000-00-00 00:00:00', '2014-06-23 16:16:10'),
(36, 'METODE_HARGA_POKOK', 'text', 'AVG', 'FIFO dan AVG', '2015-04-24 07:37:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE IF NOT EXISTS `transaksi_detail` (
  `id` int(15) NOT NULL auto_increment,
  `no_bukti` varchar(20) NOT NULL,
  `kode_brg` varchar(15) NOT NULL,
  `jumlah` varchar(4) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga_beli` decimal(20,0) NOT NULL,
  `diskon` smallint(2) NOT NULL,
  `form` varchar(15) NOT NULL,
  `user_id` int(2) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `transaksi_detail`
--


-- --------------------------------------------------------

--
-- Table structure for table `trans_detail_pembelian`
--

CREATE TABLE IF NOT EXISTS `trans_detail_pembelian` (
  `id` int(15) NOT NULL auto_increment,
  `no_bukti` varchar(20) NOT NULL,
  `kode_brg` varchar(15) NOT NULL,
  `jumlah` varchar(4) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga_beli` decimal(20,0) NOT NULL,
  `diskon` smallint(2) NOT NULL,
  `harga_stl_diskon` decimal(30,0) NOT NULL,
  `user_id` int(2) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `trans_detail_pembelian`
--

INSERT INTO `trans_detail_pembelian` (`id`, `no_bukti`, `kode_brg`, `jumlah`, `satuan`, `harga_beli`, `diskon`, `harga_stl_diskon`, `user_id`) VALUES
(1, '00001', 'MKN001001000001', '10', 'karton', '120425', 0, '0', 1),
(2, '00001', 'MKN001001000002', '5', 'dosin', '42093', 0, '0', 1),
(3, '00001', 'MKN001001000003', '3', 'dosin', '56201', 0, '0', 1),
(4, '00001', 'MKN001001000004', '5', 'dosin', '29185', 0, '0', 1),
(5, '00001', 'MKN001001000006', '4', 'dosin', '24230', 0, '0', 1),
(6, '60528675', 'KRT001001000001', '6', 'dosin', '14128', 0, '0', 1),
(7, '60528675', 'KRT001001000002', '6', 'dosin', '14128', 0, '0', 1),
(8, '60528675', 'KRT001001000003', '6', 'dosin', '14128', 0, '0', 1),
(9, '60528675', 'KRT001001000004', '6', 'dosin', '14128', 0, '0', 1),
(10, '60528675', 'KRT001001000005', '6', 'dosin', '13091', 0, '0', 1),
(11, '60528675', 'KRT001001000006', '6', 'dosin', '13091', 0, '0', 1),
(12, '60528675', 'KRT001001000007', '6', 'dosin', '13091', 0, '0', 1),
(13, '60528675', 'KRT002001000001', '4', 'karton', '4996', 0, '0', 1),
(14, '60528675', 'KRT002001000002', '4', 'karton', '4996', 0, '0', 1),
(15, '60528675', 'KRT002001000003', '4', 'dosin', '76968', 0, '0', 1),
(16, 'A-528675', 'KRT003001000002', '3', 'dosin', '31975', 0, '0', 1),
(17, 'A-528675', 'KRT001003000003', '1', 'karton', '162984', 0, '0', 1),
(18, 'A-528675', 'KRT001003000002', '2', 'karton', '162984', 0, '0', 1),
(19, 'A-528675', 'KRT001003000001', '2', 'karton', '162984', 0, '0', 1),
(20, 'A-528675', 'KRT001002000002', '1', 'karton', '176460', 0, '0', 1),
(21, 'A-528675', 'KRT001002000001', '1', 'karton', '176460', 0, '0', 1),
(22, 'A-528675', 'KRT002001000001', '5', 'karton', '95000', 0, '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trans_detail_penjualan`
--

CREATE TABLE IF NOT EXISTS `trans_detail_penjualan` (
  `id` int(15) NOT NULL auto_increment,
  `no_bukti` varchar(20) NOT NULL,
  `kode_brg` varchar(15) NOT NULL,
  `jumlah` varchar(4) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga` decimal(20,0) NOT NULL,
  `diskon` smallint(2) NOT NULL,
  `harga_stl_diskon` decimal(30,0) NOT NULL,
  `user_id` int(2) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `trans_detail_penjualan`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL auto_increment,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `status`) VALUES
(1, 'superuser', '21232f297a57a5a743894a0e4a801fc3', 'Admin');
