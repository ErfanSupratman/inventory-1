-- phpMyAdmin SQL Dump
-- version 2.11.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 20, 2015 at 03:44 PM
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
('KRT', 'Keperluan Rumah Tangga', ''),
('KPP', 'Keperluan Pria', ''),
('KPW', 'Keperluan Wanita', ''),
('ATK', 'Keperluan Perlengkapan Kantor', '');

-- --------------------------------------------------------

--
-- Table structure for table `gudang_standart`
--

CREATE TABLE IF NOT EXISTS `gudang_standart` (
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
-- Dumping data for table `gudang_standart`
--


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
  `jatuh_tempo` date NOT NULL,
  `sisa` decimal(20,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hutang`
--


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
('MKN003', 'MKN', '', 'Bahan Tambahan/Penyedap Masakan', ''),
('MKN004', 'MKN', '', 'Makanan Aanak/Bayi', ''),
('KRT001', 'KRT', '', 'Perlengkapan Mandi dan Cuci', ''),
('KRT002', 'KRT', '', 'Pewangi dan Pelembut Pakaian', ''),
('KRT003', 'KRT', '', 'Pembersih Lantai', ''),
('KRT004', 'KRT', '', 'Obat Nyamuk', ''),
('KRT005', 'KRT', '', 'Pewangi dan Pemutih Badan', ''),
('MIN001', 'MIN', '', 'Minuman Ringan', ''),
('MIN002', 'MIN', '', 'Minuman Energi/Suplemen Tubuh', ''),
('ATK001', 'ATK', '', 'Buku', ''),
('ATK002', 'ATK', '', 'Amplop', ''),
('ATK003', 'ATK', '', 'Penghapus', ''),
('ATK004', 'ATK', '', 'Kertas', ''),
('ATK005', 'ATK', '', 'Lain - Lain', ''),
('MKN005', 'MKN', '', 'Beras', ''),
('KPP001', 'KPP', '', 'Alat Cukur', '');

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
('KRT001001000001', 'KRT', 'KRT001', '', 'KRT001001', '', 'Lifeboy Merah 50ml', '', 'karton', 'dosin', 'biji', 5, 10, 90, 10, 20, 30, 10, 10),
('ATK001001000001', 'ATK', 'ATK001', '', 'ATK001001', '', 'Big Boss 42 Lembar', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('ATK001001000002', 'ATK', 'ATK001', '', 'ATK001001', '', 'Dodo 38 Lembar', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('ATK001001000003', 'ATK', 'ATK001', '', 'ATK001001', '', ' LANI 30 Lembar', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('ATK001001000004', 'ATK', 'ATK001', '', 'ATK001001', '', 'LANI 38 Lembar', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('ATK001001000005', 'ATK', 'ATK001', '', 'ATK001001', '', 'SEGITIGA  58 Lembar', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('ATK001001000006', 'ATK', 'ATK001', '', 'ATK001001', '', 'SIDU 30 Lembar', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('ATK001001000007', 'ATK', 'ATK001', '', 'ATK001001', '', 'SIDU 38 Lembar', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('ATK001001000008', 'ATK', 'ATK001', '', 'ATK001001', '', 'Gambar Ria 4 Lembar', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('ATK001001000009', 'ATK', 'ATK001', '', 'ATK001001', '', 'Gambar Ria Kecil', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('ATK002001000001', 'ATK', 'ATK002', '', 'ATK002001', '', 'Amplop Polos 110x230', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('ATK004002000001', 'ATK', 'ATK004', '', 'ATK004002', '', 'Amplop Polos 95x152', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('MKN003001000001', 'MKN', 'MKN003', '', 'MKN003001', '', 'Bawang Merah', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('MKN003001000002', 'MKN', 'MKN003', '', 'MKN003001', '', 'Bawang Putih', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('MKN003001000003', 'MKN', 'MKN003', '', 'MKN003001', '', 'Ketumbar', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('MKN003001000004', 'MKN', 'MKN003', '', 'MKN003001', '', 'Kemiri', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('MKN003001000005', 'MKN', 'MKN003', '', 'MKN003001', '', 'Telor Ayam', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('MKN003001000006', 'MKN', 'MKN003', '', 'MKN003001', '', 'Telor Bebek', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('MKN003001000007', 'MKN', 'MKN003', '', 'MKN003001', '', 'Gula Pasir', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('MKN003001000008', 'MKN', 'MKN003', '', 'MKN003001', '', 'Gula Merah', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('MKN003002000001', 'MKN', 'MKN003', '', 'MKN003002', '', 'ABC Kecap Botol 135 ML', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('MKN003002000002', 'MKN', 'MKN003', '', 'MKN003002', '', 'ABC Kecap Sach', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('MKN003002000003', 'MKN', 'MKN003', '', 'MKN003002', '', 'ABC Sambal Saos Meja', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('MKN003002000004', 'MKN', 'MKN003', '', 'MKN003002', '', 'Bango Kecap Reff 200ML', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('ATK004001000001', 'ATK', 'ATK004', '', 'ATK004001', '', 'HVS Sinar Dunia A4', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('ATK004001000002', 'ATK', 'ATK004', '', 'ATK004001', '', 'HVS Sinar Dunia A3', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('ATK004001000003', 'ATK', 'ATK004', '', 'ATK004001', '', 'HVS Sinar Dunia Legal', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('ATK004001000004', 'ATK', 'ATK004', '', 'ATK004001', '', 'HVS Sinar Dunia Letter', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('KRT001004000001', 'KRT', 'KRT001', '', 'KRT001004', '', 'Pepsoden 50 ML', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('KRT001004000002', 'KRT', 'KRT001', '', 'KRT001004', '', 'Pepsoden 100 ML', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('KRT001004000003', 'KRT', 'KRT001', '', 'KRT001004', '', 'Pepsoden Extra 100 ML', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('KRT001004000004', 'KRT', 'KRT001', '', 'KRT001004', '', 'Closeup White 50 ML', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('KRT001004000005', 'KRT', 'KRT001', '', 'KRT001004', '', 'Closeup Extra 100 ML', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('KRT001003000001', 'KRT', 'KRT001', '', 'KRT001003', '', 'Attack sach 500', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('KRT001003000002', 'KRT', 'KRT001', '', 'KRT001003', '', 'Attack Sach 1000', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('KRT001003000003', 'KRT', 'KRT001', '', 'KRT001003', '', 'Boom Det 750 gr', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('KRT001003000004', 'KRT', 'KRT001', '', 'KRT001003', '', 'Bayclin Botol 100 ml', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('KRT001003000005', 'KRT', 'KRT001', '', 'KRT001003', '', 'MOLTO 1X Bilas', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('KRT001001000002', 'KRT', 'KRT001', '', 'KRT001001', '', 'Lifebouy Merah 50 ML', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('KRT001001000003', 'KRT', 'KRT001', '', 'KRT001001', '', 'Nuvo Putih 50 ML', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('MKN002005000001', 'MKN', 'MKN002', '', 'MKN002005', '', 'BISKUAT BOLU', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('MKN002005000002', 'MKN', 'MKN002', '', 'MKN002005', '', 'BENG BENG 20GR', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('MKN002005000003', 'MKN', 'MKN002', '', 'MKN002005', '', 'BETTER ROMA', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('MKN002005000004', 'MKN', 'MKN002', '', 'MKN002005', '', 'BISKUAT COKLAT 20GR', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('MKN002005000005', 'MKN', 'MKN002', '', 'MKN002005', '', 'BISKUAT ENERGI 22.5GR', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('MKN002005000006', 'MKN', 'MKN002', '', 'MKN002005', '', 'BISKUAT SUSU 21GR', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('MKN002005000007', 'MKN', 'MKN002', '', 'MKN002005', '', 'BALLET TWIST', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('MKN002005000008', 'MKN', 'MKN002', '', 'MKN002005', '', 'CHO CHO', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1),
('MIN001001000001', 'MIN', 'MIN001', '', 'MIN001001', '', 'Coca - Cola 1 Liter', '', 'karton', 'dosin', 'biji', 1, 5, 50, 1, 5, 50, 1, 1);

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
('PLG-001', 'CV. Mitra Usaha', 'Parjo', 'Jl. Gading Tutuka No. 99', '022589 7878', 'Bandung', '40912', '0823322322', '0222 56799', 'mitra_usaha_mandiri@yahoo.com');

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
('SP-001', 'CV Makmur Cell', 'Jl. Raya Soreang No. 27', 'Bandung', '40912', '022 5893434', '082134567889', '022 8789090', 'makmur_cell@yahoo.com', 'Jono'),
('SP-002', 'CV. Nugraha', 'Jl. Raya Terusan Kopo', 'Bandung', '40921', '02276767676', '0823334442', '', 'nugraha@gmail.com', 'Asep Nugraha');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE IF NOT EXISTS `pembelian` (
  `tgl_bukti` date NOT NULL,
  `no_bukti` varchar(15) NOT NULL,
  `no_urut` varchar(4) NOT NULL,
  `kode_psk` varchar(10) NOT NULL,
  `kode_brg` varchar(15) NOT NULL,
  `jumlah` varchar(4) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga_beli` decimal(20,0) NOT NULL,
  `cara_bayar` varchar(10) NOT NULL,
  `lunas` varchar(15) NOT NULL,
  `jatuh_tempo` date NOT NULL,
  `uraian` text NOT NULL,
  `exp_date` date NOT NULL,
  `diskon` smallint(2) NOT NULL,
  `nama_opr` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--


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
-- Table structure for table `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `tgl_bukti` date NOT NULL,
  `no_bukti` varchar(15) NOT NULL,
  `no_urut` varchar(4) NOT NULL,
  `kode_plg` varchar(10) NOT NULL,
  `kode_brg` varchar(15) NOT NULL,
  `jumlah` varchar(4) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga_jual` decimal(20,0) NOT NULL,
  `cara_bayar` varchar(10) NOT NULL,
  `lunas` varchar(15) NOT NULL,
  `jatuh_tempo` date NOT NULL,
  `uraian` text NOT NULL,
  `exp_date` date NOT NULL,
  `diskon` smallint(2) NOT NULL,
  `nama_opr` varchar(100) NOT NULL
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
('KRT001001', 'KRT', 'KRT001', '', 'Sabun Mandi', ''),
('KRT001002', 'KRT', 'KRT001', '', 'Shampo', ''),
('KRT001003', 'KRT', 'KRT001', '', 'Sabun Cuci', ''),
('KRT001004', 'KRT', 'KRT001', '', 'Pasta Gigi', ''),
('MIN001001', 'MIN', 'MIN001', '', 'Coca - Cola', ''),
('MIN001002', 'MIN', 'MIN001', '', 'Teh Botol', ''),
('MKN002001', 'MKN', 'MKN002', '', 'Indomie', ''),
('MKN002002', 'MKN', 'MKN002', '', 'Sarimie', ''),
('MKN002003', 'MKN', 'MKN002', '', 'Mie Sedap', ''),
('KRT004001', 'KRT', 'KRT004', '', 'Baygon Bakar', ''),
('KRT004002', 'KRT', 'KRT004', '', 'Baygon Cair', ''),
('MKN002004', 'MKN', 'MKN002', '', 'Milna', ''),
('ATK001001', 'ATK', 'ATK001', '', 'Buku Tulis', ''),
('ATK001002', 'ATK', 'ATK001', '', 'Buku Gambar', ''),
('ATK004001', 'ATK', 'ATK004', '', 'HVS', ''),
('ATK004002', 'ATK', 'ATK004', '', 'Polio', ''),
('ATK004003', 'ATK', 'ATK004', '', 'Kado', ''),
('ATK002001', 'ATK', 'ATK002', '', 'Polos', ''),
('ATK002002', 'ATK', 'ATK002', '', 'Bergasi', ''),
('MKN003001', 'MKN', 'MKN003', '', 'Curah', ''),
('MKN003002', 'MKN', 'MKN003', '', 'Kecap', ''),
('MKN002005', 'MKN', 'MKN002', '', 'Biskuit', '');

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
  `kode_brg` varchar(15) NOT NULL,
  `nama_brg` varchar(100) NOT NULL,
  `jumlah` varchar(4) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga` decimal(20,0) NOT NULL,
  `no_urut` varchar(4) NOT NULL,
  `exp_date` date NOT NULL,
  `diskon` smallint(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `type`, `value`, `created_at`, `updated_at`) VALUES
(19, 'FACEBOOK', 'text', 'http://facebook.com/artha_wijaya', '0000-00-00 00:00:00', '2014-06-04 06:57:42'),
(20, 'TWITTER', 'text', 'http://twitter.com/artha_wijaya', '0000-00-00 00:00:00', '2014-06-04 06:57:55'),
(11, 'NAMA_APLIKASI', 'text', 'Inventory & Hutang Piutang', '0000-00-00 00:00:00', '2014-06-23 16:16:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `status`) VALUES
(0, 'superuser', '21232f297a57a5a743894a0e4a801fc3', 'Admin');
