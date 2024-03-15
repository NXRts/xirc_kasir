-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Mar 2024 pada 12.26
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_detail` int(11) NOT NULL,
  `kode_penjualan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sub_total` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_detail`, `kode_penjualan`, `id_produk`, `jumlah`, `sub_total`) VALUES
(11, 2401261, 1, 2, 8000),
(12, 2401261, 5, 1, 35000),
(13, 2401272, 1, 2, 8000),
(14, 2401272, 4, 4, 20000),
(15, 2401272, 5, 3, 105000),
(16, 2401273, 1, 2, 8000),
(17, 2401273, 4, 3, 15000),
(18, 2401273, 5, 4, 140000),
(19, 2401274, 1, 1, 4000),
(20, 2401274, 4, 3, 15000),
(21, 2401274, 5, 2, 70000),
(22, 2401295, 6, 3, 450000),
(23, 2401295, 5, 2, 70000),
(24, 2402051, 6, 3, 450000),
(25, 2402051, 4, 1, 5000),
(26, 2402072, 6, 2, 300000),
(27, 2402083, 6, 2, 300000),
(28, 2402084, 5, 2, 70000),
(29, 2402106, 5, 1, 35000),
(30, 2402117, 4, 4, 20000),
(31, 2402117, 4, 4, 20000),
(32, 2402128, 4, 2, 10000),
(33, 2402129, 4, 3, 15000),
(34, 24021210, 4, 2, 10000),
(35, 24021811, 7, 1, 5000),
(36, 24021912, 7, 1, 5000),
(37, 24022513, 8, 2, 8000),
(38, 2403021, 8, 2, 8000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `alamat` varchar(32) NOT NULL,
  `telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `alamat`, `telp`) VALUES
(5, 'Azka GG', 'Jaten', '085712239267');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `kode_penjualan` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `total_harga` decimal(10,0) NOT NULL,
  `id_pelanggan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `kode_penjualan`, `tanggal`, `total_harga`, `id_pelanggan`) VALUES
(2, '2401261', '2024-01-26', 43000, 1),
(3, '2401272', '2024-01-27', 133000, 1),
(4, '2401273', '2024-01-27', 163000, 3),
(5, '2401274', '2024-01-27', 89000, 2),
(6, '2401295', '2024-01-20', 520000, 1),
(7, '2402051', '2024-02-05', 455000, 2),
(8, '2402072', '2024-02-07', 300000, 1),
(9, '2402083', '2024-02-08', 300000, 1),
(10, '2402084', '2024-02-08', 70000, 1),
(11, '2402084', '2024-02-08', 70000, 1),
(12, '2402106', '2024-02-10', 35000, 1),
(13, '2402117', '2024-02-11', 0, 1),
(14, '2402128', '2024-02-12', 10000, 1),
(15, '2402129', '2024-02-12', 15000, 1),
(16, '24021210', '2024-02-12', 10000, 1),
(17, '24021811', '2024-02-18', 5000, 5),
(18, '24021912', '2024-02-19', 5000, 5),
(19, '24022513', '2024-02-25', 8000, 5),
(20, '2403021', '2024-03-02', 8000, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `kode_produk` varchar(50) NOT NULL,
  `nama_produk` varchar(25) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `kode_produk`, `nama_produk`, `stok`, `harga`) VALUES
(4, 'pnslll', 'pensiljerapah', 1, 5000),
(5, 'RaOtann', 'rautan sultan', 13, 35000),
(7, 'erashh', 'eraser', 11, 5000),
(8, 'pointz', 'bolpoin', 9, 4000),
(9, 'bokoezs', 'buku', 20, 3000),
(10, 'tipzxx', 'tipex', 7, 8000),
(11, 'hdfbn', 'jangkasyorong', 3, 15000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `suara`
--

CREATE TABLE `suara` (
  `total_suara_25` int(11) NOT NULL,
  `total_suara_sah` int(11) NOT NULL,
  `total_suara_tidak_sah` int(11) NOT NULL,
  `no_1` int(11) NOT NULL,
  `no_2` int(11) NOT NULL,
  `no_3` int(11) NOT NULL,
  `nama_tps` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `suara`
--

INSERT INTO `suara` (`total_suara_25`, `total_suara_sah`, `total_suara_tidak_sah`, `no_1`, `no_2`, `no_3`, `nama_tps`) VALUES
(33, 30, 3, 10, 15, 5, 1),
(5, 3, 1, 1, 1, 1, 4),
(30, 15, 15, 5, 5, 5, 5),
(5, 8, 1, 1, 6, 1, 45);

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp`
--

CREATE TABLE `temp` (
  `id_temp` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `level` enum('Admin','Kasir') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `level`) VALUES
(34, 'Azka GG', '81dc9bdb52d04dc20036dbd8313ed055', 'Azka GG', 'Admin'),
(35, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Admin'),
(36, 'kasir', 'c7911af3adbd12a035b289556d96470a', 'kasir', 'Kasir');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `suara`
--
ALTER TABLE `suara`
  ADD PRIMARY KEY (`nama_tps`);

--
-- Indeks untuk tabel `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id_temp`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `suara`
--
ALTER TABLE `suara`
  MODIFY `nama_tps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `temp`
--
ALTER TABLE `temp`
  MODIFY `id_temp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
