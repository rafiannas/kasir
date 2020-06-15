-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jun 2020 pada 19.08
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Struktur dari tabel `active`
--

CREATE TABLE `active` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `warna` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `active`
--

INSERT INTO `active` (`id`, `keterangan`, `warna`) VALUES
(1, 'Aktif', 'green'),
(2, 'Tidak Aktif', 'red');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_obat`
--

CREATE TABLE `daftar_obat` (
  `id` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `nama_obat` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `daftar_obat`
--

INSERT INTO `daftar_obat` (`id`, `id_satuan`, `nama_obat`) VALUES
(1, 6, 'Panadol'),
(2, 7, 'Tolak Angin'),
(3, 8, 'Panadol');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `id_daftar_obat` int(11) NOT NULL,
  `obat` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_per_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_stok`
--

CREATE TABLE `history_stok` (
  `id` int(11) NOT NULL,
  `id_stok` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `tgl_ubah` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `jenis_kelamin` varchar(5) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama`, `username`, `password`, `jenis_kelamin`, `no_hp`, `role_id`, `is_active`) VALUES
(7, 'Arif S', 'arif', '$2y$10$oZU1M/v2RaVUf6PmaEH7r.qfnMgMu4zTZwTzjENGf04AAhqol0hyi', 'L', '081231232', 1, 1),
(21, 'NABIL', 'nabil', '$2y$10$pFm1C.vPwDePem/qlgaI3ekonmbBqpLADYjYFkSUydFWX./Su3jvW', 'L', '089672231770', 1, 1),
(22, 'Makmudin', 'makmudin', '$2y$10$zK5Ex7TgX1Q3kNAsYT8JOOFIWTR9lUSs8fKMPOZUzw2KsuuLqpoei', 'L', '089672231770', 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan_access_menu`
--

CREATE TABLE `karyawan_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan_access_menu`
--

INSERT INTO `karyawan_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(6, 3, 2),
(8, 3, 4),
(9, 3, 5),
(10, 3, 2),
(12, 1, 1),
(13, 1, 11),
(14, 1, 35);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan_menu`
--

CREATE TABLE `karyawan_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan_menu`
--

INSERT INTO `karyawan_menu` (`id`, `menu`) VALUES
(1, 'Super Admin'),
(3, 'Dapur'),
(4, 'Kasir'),
(6, 'Akuntan'),
(9, 'User'),
(11, 'Utility');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan_role`
--

CREATE TABLE `karyawan_role` (
  `id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan_role`
--

INSERT INTO `karyawan_role` (`id`, `role`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'Kasir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan_sub_menu`
--

CREATE TABLE `karyawan_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan_sub_menu`
--

INSERT INTO `karyawan_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 11, 'Managemen User', 'admin/manage_user', 'fas fa-fw fa-users', 1),
(3, 1, 'Supplier', 'admin/supplier', 'fas fa-cart-plus', 1),
(4, 1, 'Obat', 'admin/obat', '\r\nfas fa-medkit', 1),
(5, 1, 'Katalog Obat', 'admin/katalog_obat', ' fas fa-pills', 1),
(6, 1, 'Penjualan', 'admin/penjualan', 'fas fa-cart-arrow-down', 1),
(7, 1, 'Laporan Penjualan', 'admin/laporan_penjualan', 'fas fa-file-invoice', 1),
(8, 1, 'Laporan Stok', 'admin/laporan_stok', 'fas fa-file-alt', 1),
(27, 3, 'Masakan', 'dapur', 'fas fa-fw fa-concierge-bell', 1),
(28, 3, 'Riwayat Masakan', 'dapur/riwayat_masakan', 'fas fa-fw fa-history', 1),
(40, 4, 'Dashboard', 'kasir', 'fas fa-fw fa-tachometer-alt\r\n', 1),
(41, 4, 'Penjualan', 'kasir/penjualan', 'fas fa-shopping-cart', 1),
(42, 4, 'Laporan Stok', 'kasir/laporanstok', 'fas fa-file-alt', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `id_daftar_obat` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `jumlah_obat` int(11) NOT NULL,
  `tgl_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id`, `id_daftar_obat`, `id_supplier`, `harga_beli`, `jumlah_obat`, `tgl_input`) VALUES
(4, 3, 2, 2000, 9, '2020-06-15 20:02:21'),
(5, 2, 2, 1500, 90, '2020-06-15 20:30:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat_satuan`
--

CREATE TABLE `obat_satuan` (
  `id` int(11) NOT NULL,
  `satuan` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `obat_satuan`
--

INSERT INTO `obat_satuan` (`id`, `satuan`) VALUES
(6, 'Tablet'),
(7, 'Botol'),
(8, 'Box'),
(9, 'Sachet');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `tgl` datetime NOT NULL,
  `ppn` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `total_bayar` int(50) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `kembalian` int(25) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `catatan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok`
--

CREATE TABLE `stok` (
  `id` int(11) NOT NULL,
  `id_daftar_obat` int(11) NOT NULL,
  `harga_jualan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama_supplier` varchar(60) NOT NULL,
  `no_kontak` varchar(13) NOT NULL,
  `alamat` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `nama_supplier`, `no_kontak`, `alamat`) VALUES
(1, 'PT. Sinar Naturalindo Berkah', '08977789000', 'Bekasi Jl. Kobra No.78'),
(2, 'PT. Sinar Herbal', '08977789123', 'Jl. Sejahtera, Karawang');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `active`
--
ALTER TABLE `active`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `daftar_obat`
--
ALTER TABLE `daftar_obat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `history_stok`
--
ALTER TABLE `history_stok`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`,`username`);

--
-- Indeks untuk tabel `karyawan_access_menu`
--
ALTER TABLE `karyawan_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `karyawan_menu`
--
ALTER TABLE `karyawan_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `karyawan_role`
--
ALTER TABLE `karyawan_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `karyawan_sub_menu`
--
ALTER TABLE `karyawan_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `obat_satuan`
--
ALTER TABLE `obat_satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `active`
--
ALTER TABLE `active`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `daftar_obat`
--
ALTER TABLE `daftar_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `history_stok`
--
ALTER TABLE `history_stok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `karyawan_access_menu`
--
ALTER TABLE `karyawan_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `karyawan_menu`
--
ALTER TABLE `karyawan_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `karyawan_role`
--
ALTER TABLE `karyawan_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `karyawan_sub_menu`
--
ALTER TABLE `karyawan_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `obat_satuan`
--
ALTER TABLE `obat_satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `stok`
--
ALTER TABLE `stok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
