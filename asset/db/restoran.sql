-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 04 Des 2017 pada 18.45
-- Versi server: 10.0.31-MariaDB-0ubuntu0.16.04.2
-- Versi PHP: 7.1.12-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restoran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `meja`
--

CREATE TABLE `meja` (
  `id_meja` int(12) NOT NULL,
  `no_meja` int(12) NOT NULL,
  `kode_meja` varchar(11) NOT NULL,
  `usage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `meja`
--

INSERT INTO `meja` (`id_meja`, `no_meja`, `kode_meja`, `usage`) VALUES
(1, 1, 'ME01', 0),
(2, 2, 'ME02', 0),
(3, 3, 'ME03', 1511975176),
(23, 4, 'ME04', 1511975181),
(24, 6, 'ME06', 1511976865),
(25, 7, 'ME07', 0),
(27, 5, 'ME05', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `gambar` varchar(250) NOT NULL DEFAULT 'asset/image/dummy/background.png',
  `jenis` enum('makanan','minuman') NOT NULL,
  `harga` varchar(15) NOT NULL,
  `stok` int(12) NOT NULL,
  `status` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama`, `gambar`, `jenis`, `harga`, `stok`, `status`) VALUES
(2, 'Es Teh', 'asset/image/menu/1511776071_es te.jpe', 'minuman', '2000', 2, 0),
(3, 'Ayam Bakar Madu', 'asset/image/menu/1511776756_ayam .jpe', 'makanan', '20000', 0, 0),
(4, 'Sate Ayam Kecap', 'asset/image/menu/1511776836_Sate-.jpe', 'makanan', '10000', 8, 1),
(5, 'Ayam Bakar Kecap', 'asset/image/menu/1511776610_ayam-.jpe', 'makanan', '14000', 15, 0),
(7, 'Milkshake', 'asset/image/menu/1511775270_drums.jpe', 'minuman', '8000', 20, 0),
(8, 'Cappucino', 'asset/image/menu/1511775835_Cappu.jpe', 'minuman', '11000', 20, 0),
(9, 'Susu Coklat', 'asset/image/menu/1511776252_susu-.jpe', 'minuman', '5000', 16, 0),
(10, 'Nila Bakar Madu                ', 'asset/image/menu/1511780662_nila .jpe', 'makanan', '23000', 10, 1),
(11, 'Nila Goreng Saus Tiram', 'asset/image/menu/1511774925_ikan-.jpe', 'makanan', '22000', 19, 0),
(12, 'Gurame Asam Manis', 'asset/image/menu/1511774911_guram.jpe', 'makanan', '21000', 22, 0),
(13, 'Sate Ayam Bumbu Kacang', 'asset/image/menu/1511780507_Sate-.jpe', 'makanan', '14000', 15, 0),
(14, 'Ayam Sambal Hijau', 'asset/image/menu/1511776689_ayam-.jpe', 'makanan', '15000', 20, 0),
(15, 'Ayam Bumbu Rica', 'asset/image/menu/1511780725_ayam-.jpe', 'makanan', '18000', 16, 0),
(16, 'Ayam Bumbu Rujak', 'asset/image/menu/1511776743_large.jpe', 'makanan', '19000', 11, 1),
(17, 'Vanila Latte', 'asset/image/menu/1511776334_vanil.jpe', 'minuman', '11000', 7, 0),
(18, 'Oreo Milkshake', 'asset/image/menu/1511775360_oreo .jpe', 'minuman', '10000', 20, 0),
(19, 'Air Mineral', 'asset/image/menu/1511775725_air m.jpe', 'minuman', '1000', 25, 0),
(20, 'Green tea', 'asset/image/menu/1511776197_green.jpe', 'minuman', '7000', 18, 1),
(21, 'Jeruk Nipis', 'asset/image/menu/1511775457_jeruk.jpe', 'minuman', '4000', 15, 0),
(22, 'Es Teler', 'asset/image/menu/1511776368_es te.jpe', 'minuman', '10000', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_transaksi`
--

CREATE TABLE `tmp_transaksi` (
  `no_nota` int(12) NOT NULL,
  `id_menu` int(12) NOT NULL,
  `jml_porsi` int(12) NOT NULL,
  `id_meja` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `no_nota` int(11) NOT NULL,
  `id_menu` int(12) NOT NULL,
  `jml_porsi` int(12) NOT NULL,
  `id_meja` int(12) NOT NULL,
  `tgl_transaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `checked` int(2) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `no_nota`, `id_menu`, `jml_porsi`, `id_meja`, `tgl_transaksi`, `checked`, `status`) VALUES
(29, 1511786109, 10, 1, 1, '2017-11-27 12:35:13', 0, 'selesai'),
(30, 1511786109, 3, 4, 1, '2017-11-27 12:35:17', 0, 'selesai'),
(31, 1511786109, 9, 4, 1, '2017-11-27 12:35:23', 0, 'selesai'),
(32, 1511786109, 10, 4, 1, '2017-11-27 12:35:37', 0, 'selesai'),
(38, 1511798217, 3, 1, 1, '2017-11-27 15:57:04', 0, 'selesai'),
(39, 1511798217, 16, 1, 1, '2017-11-27 15:57:06', 0, 'selesai'),
(40, 1511798217, 9, 2, 1, '2017-11-27 15:57:13', 0, 'selesai'),
(41, 1511939972, 3, 1, 1, '2017-11-29 07:24:17', 0, 'pesan'),
(42, 1511939972, 2, 1, 1, '2017-11-29 07:24:25', 0, 'pesan'),
(43, 1511941084, 3, 1, 1, '2017-11-29 07:38:09', 0, 'pesan'),
(51, 1511971553, 11, 1, 1, '2017-11-29 16:12:20', 0, 'pesan'),
(52, 1511971553, 22, 2, 1, '2017-11-29 16:13:22', 0, 'pesan'),
(56, 1511976590, 9, 2, 1, '2017-11-29 17:30:01', 0, 'selesai'),
(57, 1511976590, 9, 2, 1, '2017-11-29 17:30:07', 0, 'selesai'),
(61, 1512188995, 5, 5, 2, '2017-12-02 04:34:09', 0, 'selesai'),
(62, 1512188995, 17, 13, 2, '2017-12-02 04:34:29', 0, 'selesai'),
(63, 1512188995, 19, 5, 2, '2017-12-02 04:34:43', 0, 'selesai'),
(64, 1512272767, 4, 2, 1, '2017-12-03 03:46:12', 0, 'masak'),
(65, 1512272767, 20, 2, 1, '2017-12-03 03:46:16', 0, 'masak'),
(66, 1512309240, 16, 2, 1, '2017-12-03 13:54:10', 0, 'bayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(12) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `nama`, `no_telp`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Arief Steyo', '083840745543', 'admin'),
(2, 'dapur', 'de20b1d289dd6005ba8116085122f144', 'dapur', '0834545451', 'dapur'),
(3, 'kasir', 'c7911af3adbd12a035b289556d96470a', 'kasir', '083888386682', 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`id_meja`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `tmp_transaksi`
--
ALTER TABLE `tmp_transaksi`
  ADD PRIMARY KEY (`no_nota`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `meja`
--
ALTER TABLE `meja`
  MODIFY `id_meja` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
