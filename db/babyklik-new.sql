-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Des 2022 pada 05.23
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `babyklik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(7) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `del_no` varchar(15) NOT NULL,
  `id_kategori` varchar(5) NOT NULL,
  `harga_satuan` int(15) NOT NULL,
  `stok` int(11) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama`, `satuan`, `del_no`, `id_kategori`, `harga_satuan`, `stok`, `deskripsi`) VALUES
('BRG0001', 'BRAKE SHOE HONDA ASP', 'pcs', 'Box', 'KTG01', 1000, 5, 'qwerty'),
('BRG0002', 'BRAKE SHOE KHARISMA', 'pcs', 'Box', 'KTG02', 2000, 7, 'qwerty'),
('BRG0003', 'BRAKE SHOE SUPRA FED', 'pcs', 'Box', 'KTG01', 3000, 4, ''),
('BRG0004', 'BRAKE SHOE YAMAHA ASP', 'pcs', 'Box', 'KTG01', 10000, 2, ''),
('BRG0005', 'PAD SET HONDA BLADE - ASP', 'SATUAN 1', 'Box', 'KTG01', 3000, 0, ''),
('BRG0006', 'PAD SET HONDA SUPRA X 125 - AS', 'SATUAN 1', 'BOX', 'KTG01', 2000, 0, ''),
('BRG0007', 'PAD SET SUPRA FED', 'SATUAN 1', 'Box', 'KTG01', 0, 0, ''),
('BRG0008', 'PAD SET SUPRA X 125 - ASP', 'SATUAN 1', 'Box', 'KTG01', 0, 0, ''),
('BRG0009', 'PAD SET VIXION ASP', 'SATUAN 1', 'Box', 'KTG01', 0, 0, ''),
('BRG0010', 'PAD SET JUPITER-MX ASP', 'SATUAN 1', 'Box', 'KTG01', 0, 0, ''),
('BRG0011', 'PAD SET VEGA-ZR ASP', 'SATUAN 1', 'Box', 'KTG01', 0, 0, ''),
('BRG0012', 'PAD SET MIO FED', 'SATUAN 1', 'Box', 'KTG01', 0, 0, ''),
('BRG0013', 'PAD SET FZR FED', 'SATUAN 1', 'Box', 'KTG01', 0, 0, ''),
('BRG0014', 'PAD SET JUPITER-MX FED', 'SATUAN 1', 'Box', 'KTG01', 0, 0, ''),
('BRG0015', 'PAD SET VEGA-ZR FED', 'SATUAN 1', 'Box', 'KTG01', 0, 0, ''),
('BRG0016', 'PAD SET TORNADO ASP', 'SATUAN 1', 'Box', 'KTG01', 0, 0, ''),
('BRG0017', 'PAD SET TIGER F ASP', 'SATUAN 1', 'Box', 'KTG01', 0, 0, ''),
('BRG0018', 'PAD SET THUNDER 125 ASP', 'SATUAN 1', 'Box', 'KTG01', 0, 0, ''),
('BRG0019', 'PAD SET THUNDER 125 FED', 'SATUAN 1', 'Box', 'KTG01', 0, 0, ''),
('BRG0020', 'PAD SET VARIO - ASP', 'SATUAN 1', 'Box', 'KTG01', 0, 0, ''),
('BRG0021', 'PAD SET SPIN - ASP', 'SATUAN 1', 'Box', 'KTG01', 0, 0, ''),
('BRG0022', 'PAD SET SPIN - FED', 'SATUAN 1', 'Box', 'KTG01', 0, 0, ''),
('BRG0023', 'SPRING FRONT FORK KHARISMA ASP', 'SATUAN 2', 'Box', 'KTG02', 0, 0, ''),
('BRG0024', 'SPRING FRONT FORK SUPRA ASP', 'SATUAN 2', 'Box', 'KTG02', 0, 0, ''),
('BRG0025', 'BOTOL ULTRATEC 0.8L 2016 - RED', 'SATUAN 3', 'PALLET', 'KTG03', 0, 0, ''),
('BRG0026', 'BOTOL SUPREME XX 50 0.8L 2016 ', 'SATUAN 3', 'PALLET', 'KTG03', 0, 0, ''),
('BRG0027', 'BOTOL AHM OIL 0.8L MPX-1 10W-3', 'SATUAN 3', 'PALLET', 'KTG03', 0, 0, ''),
('BRG0028', 'BOTOL MPX-1 0.8L', 'SATUAN 3', 'PALLET', 'KTG03', 0, 0, ''),
('BRG0029', 'BOTOL SPX1 FEDERAL 0.8L', 'SATUAN 3', 'PALLET', 'KTG03', 0, 0, ''),
('BRG0030', 'BOTOL SPX1 2014 REPSOL 1.0L', 'SATUAN 3', 'PALLET', 'KTG03', 0, 0, ''),
('BRG0031', 'BOTOL SPX-1 1.2L 2016', 'SATUAN 3', 'PALLET', 'KTG03', 0, 0, ''),
('BRG0032', 'BOTOL SUPREME XX 30 0.8L 2016-', 'SATUAN 3', 'PALLET', 'KTG03', 0, 0, ''),
('BRG0033', 'BOTOL FEDERAL YMATIC 0.8L 2016', 'SATUAN 3', 'PALLET', 'KTG03', 0, 0, ''),
('BRG0034', 'BOTOL AHM OIL 1.0L MPX-1 10W-3', 'SATUAN 3', 'PALLET', 'KTG03', 0, 0, ''),
('BRG0035', 'BOTOL MPX1 AHM 2014 1.0L', 'SATUAN 3', 'PALLET', 'KTG03', 0, 0, ''),
('BRG0036', 'BOTOL COBA', 'pcs', '', 'KTG02', 10000, 22, 'coba coba');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pengiriman`
--

CREATE TABLE `detail_pengiriman` (
  `id_detail` int(4) NOT NULL,
  `id_pengiriman` varchar(14) NOT NULL,
  `id_barang` varchar(7) NOT NULL,
  `qty` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pengiriman`
--

INSERT INTO `detail_pengiriman` (`id_detail`, `id_pengiriman`, `id_barang`, `qty`) VALUES
(13, 'KRM20221128890', 'BRG0001', 1),
(15, 'KRM20221203891', 'BRG0001', 1),
(16, 'KRM20221204391', 'BRG0003', 2),
(17, 'KRM20221204391', 'BRG0036', 4),
(18, 'KRM20221205546', 'BRG0003', 2),
(19, 'KRM20221205546', 'BRG0004', 1),
(20, 'KRM20221205556', 'BRG0003', 2),
(21, 'KRM20221205556', 'BRG0004', 1),
(22, 'KRM20221206557', 'BRG0001', 2),
(23, 'KRM20221206557', 'BRG0003', 1),
(24, 'KRM20221206657', 'BRG0004', 1),
(25, 'KRM20221206657', 'BRG0003', 2),
(29, 'KRM20221207668', 'BRG0002', 1),
(30, 'KRM20221207668', 'BRG0004', 1),
(31, 'KRM20221206667', 'BRG0001', 2),
(32, 'KRM20221206667', 'BRG0002', 5),
(33, 'KRM20221206667', 'BRG0004', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `keterangan` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama`, `keterangan`) VALUES
('KTG01', 'KATEGORI 1', 'KATEGORI 1'),
('KTG02', 'KATEGORI 2', 'KATEGORI 2'),
('KTG03', 'KATEGORI 3', 'KATEGORI 3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurir`
--

CREATE TABLE `kurir` (
  `id_kurir` varchar(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `no_kendaraan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kurir`
--

INSERT INTO `kurir` (`id_kurir`, `nama`, `jenis_kelamin`, `telepon`, `alamat`, `no_kendaraan`) VALUES
('KRR01', 'EKO ', 'Laki-Laki', '081385195955', 'TANGERANG', 'AB 7890'),
('KRR02', 'ERIK', 'Laki-Laki', '081284959589', 'TANGERANG', 'AB 7899'),
('KRR03', 'TRIBUDI', 'Laki-Laki', '081219900381', 'TANGERANG', 'AB 1213'),
('KRR04', 'SUMANTA', 'Laki-Laki', '081382630321', 'TANGERANG', 'AB 3231'),
('KRR05', 'UDRI', 'Laki-Laki', '081210426881', 'TANGERANG', 'AB 6788'),
('KRR06', 'SAEPUL', 'Laki-Laki', '081314485383', 'TANGERANG', 'AB 21312'),
('KRR07', 'yanto', 'Laki-Laki', '081284213311', 'Gandul, 16512', 'AB 5655'),
('KRR08', 'SUJONO', 'Laki-Laki', '0812345678', 'Jonggol, West Java', 'AB 78909');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(7) NOT NULL,
  `nama_toko` varchar(50) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_toko`, `nama`, `telepon`, `alamat`) VALUES
('CST0001', '', 'ASTRA OTOPART', '021-4603550', 'jakarta'),
('CST0002', '', 'Idemitsu Lube Indonesia', '021-8911 4611', 'JL Permata Raya, Kawasan Industri KIIC, Lot BB/4A, Karawang, Jawa Barat,'),
('CST0003', '', 'Federal Karyatama', '021-4613583', 'Jl. Pulobuaran Raya, RW.9, Jatinegara, Cakung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13910'),
('CST0004', 'anis shop', 'anis cantik', '082132183712', 'qwerty'),
('CST0005', 'Toko Hims', 'Hims', '087848879337', 'Banjarharjo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` varchar(14) NOT NULL,
  `tanggal` date NOT NULL,
  `id_pelanggan` varchar(7) NOT NULL,
  `id_kurir` varchar(5) NOT NULL,
  `no_kendaraan` varchar(8) NOT NULL,
  `no_po` varchar(15) NOT NULL,
  `keterangan` varchar(150) DEFAULT NULL,
  `penerima` varchar(50) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `total_harga` int(25) NOT NULL,
  `tanggal_diterima` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengiriman`
--

INSERT INTO `pengiriman` (`id_pengiriman`, `tanggal`, `id_pelanggan`, `id_kurir`, `no_kendaraan`, `no_po`, `keterangan`, `penerima`, `photo`, `status`, `total_harga`, `tanggal_diterima`) VALUES
('KRM20160820001', '2016-08-20', 'CST0001', 'KRR01', 'B021ZIG', '8732984732984', 'wqeqwe', 'qeqwe', '', 2, 3000, '2022-11-28'),
('KRM20161015001', '2016-10-15', 'CST0003', 'KRR08', 'B03L', 'km1230jg', 'qwerty', 'qwerty', '', 2, 2000, '2022-11-28'),
('KRM20221128501', '2022-11-28', 'CST0001', 'KRR03', 'AB 1213', '2312123', '89898', '8989', NULL, 2, 12000, '2022-11-28'),
('KRM20221128851', '2022-11-28', 'CST0003', 'KRR05', 'AB 6788', '2313', 'er', 'aweeqw', NULL, 2, 1000, '2022-11-28'),
('KRM20221128886', '2022-11-28', 'CST0001', 'KRR03', 'AB 1213', '2313', 'nnnn', 'nnmn', NULL, 2, 1000, '2022-11-28'),
('KRM20221128889', '2022-11-28', 'CST0001', 'KRR04', 'AB 3231', '43433', 'uiuiui', 'haha', NULL, 2, 1000, '2022-11-28'),
('KRM20221128890', '2022-11-28', 'CST0001', 'KRR08', 'AB 78909', '8888', NULL, NULL, NULL, 1, 1000, NULL),
('KRM20221203891', '2022-12-03', 'CST0001', 'KRR02', 'AB 7899', '42434', NULL, NULL, NULL, 1, 1000, NULL),
('KRM20221204391', '2022-12-04', 'CST0004', 'KRR08', 'AB 78909', '42343243243', NULL, NULL, NULL, 1, 40000, NULL),
('KRM20221205441', '2022-12-05', 'CST0001', 'KRR02', 'AB 7899', '2132131', NULL, NULL, NULL, 1, 0, NULL),
('KRM20221205546', '2022-12-05', 'CST0004', 'KRR06', 'AB 21312', '42434', NULL, NULL, NULL, 1, 0, NULL),
('KRM20221205556', '2022-12-05', 'CST0004', 'KRR01', 'AB 7890', '42434', NULL, NULL, NULL, 1, 16000, NULL),
('KRM20221206557', '2022-12-06', 'CST0001', 'KRR01', 'AB 7890', '123456789', NULL, NULL, NULL, 1, 5000, NULL),
('KRM20221206657', '2022-12-06', 'CST0002', 'KRR02', 'AB 7899', '987654321', NULL, NULL, NULL, 1, 16000, NULL),
('KRM20221206667', '2022-12-06', 'CST0005', 'KRR08', 'AB 78909', '221299', 'jkadhkjakdjaksd', 'Hims', NULL, 2, 10000, NULL),
('KRM20221207668', '2022-12-07', 'CST0001', 'KRR04', 'AB 3231', '2132131', NULL, NULL, NULL, 1, 12000, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
('USR01', 'adminbabyklik', '1a1dc91c907325c69271ddf0c944bc72', 1),
('USR02', 'owner', '1a1dc91c907325c69271ddf0c944bc72', 2),
('USR03', 'gudang', '1a1dc91c907325c69271ddf0c944bc72', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `detail_pengiriman`
--
ALTER TABLE `detail_pengiriman`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_pengiriman` (`id_pengiriman`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id_kurir`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_kurir` (`id_kurir`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_pengiriman`
--
ALTER TABLE `detail_pengiriman`
  MODIFY `id_detail` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `qwerty` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_pengiriman`
--
ALTER TABLE `detail_pengiriman`
  ADD CONSTRAINT `detail_pengiriman_ibfk_1` FOREIGN KEY (`id_pengiriman`) REFERENCES `pengiriman` (`id_pengiriman`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `qwerty1234` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `qwerty7654` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `qwerty7890` FOREIGN KEY (`id_kurir`) REFERENCES `kurir` (`id_kurir`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
