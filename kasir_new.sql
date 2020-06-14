-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jun 2020 pada 10.38
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
-- Struktur dari tabel `bahan`
--

CREATE TABLE `bahan` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tgl` datetime NOT NULL,
  `jumlah_bahan` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `pj` int(11) NOT NULL,
  `Catatan` varchar(512) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bahan`
--

INSERT INTO `bahan` (`id`, `judul`, `tgl`, `jumlah_bahan`, `total_harga`, `pj`, `Catatan`, `status`) VALUES
(1, 'Tester', '2020-03-31 23:36:40', 1, 50000, 7, 'Beli di Toko A', 2),
(2, '', '0000-00-00 00:00:00', 0, 0, 11, '', 1),
(3, '', '0000-00-00 00:00:00', 0, 0, 7, '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_bahan`
--

CREATE TABLE `detail_bahan` (
  `id` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `nama_bahan` varchar(128) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_bahan`
--

INSERT INTO `detail_bahan` (`id`, `id_bahan`, `nama_bahan`, `jumlah`, `harga`) VALUES
(3, 1, 'bawang', 2, 50000),
(4, 2, 'Kecap', 1, 10000),
(5, 3, 't', 5, 5000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `id` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `obat` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `harga_per_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id`, `id_pembelian`, `obat`, `harga`, `jumlah`, `satuan`, `harga_per_obat`) VALUES
(17, 8, 'Panadol', 2500, 9, 'tablet', 22500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id`, `id_pesanan`, `id_menu`, `jumlah`) VALUES
(50, 23, 58, 1),
(51, 24, 37, 1),
(52, 24, 53, 1),
(53, 24, 35, 1),
(54, 25, 58, 1),
(55, 25, 17, 2),
(56, 26, 26, 8),
(57, 26, 41, 2),
(58, 27, 57, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_stok`
--

CREATE TABLE `history_stok` (
  `id` int(11) NOT NULL,
  `tgl` datetime NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `sebelum` int(11) NOT NULL,
  `sesudah` int(11) NOT NULL,
  `pj` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `history_stok`
--

INSERT INTO `history_stok` (`id`, `tgl`, `id_menu`, `id_kategori`, `sebelum`, `sesudah`, `pj`) VALUES
(1, '2020-04-11 21:19:46', 58, 4, 3, 15, 7);

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
(27, 3, 'Masakan', 'dapur', 'fas fa-fw fa-concierge-bell', 1),
(28, 3, 'Riwayat Masakan', 'dapur/riwayat_masakan', 'fas fa-fw fa-history', 1),
(35, 1, 'Supplier', 'admin/supplier', 'fas fa-cart-plus', 1),
(36, 1, 'Pembelian', 'admin/pembelian', 'fas fa-cart-arrow-down', 1),
(37, 1, 'Data Obat', 'admin/dataobat', '\r\nfas fa-medkit', 1),
(38, 1, 'Laporan Stok', 'admin/stok', 'fas fa-file-alt', 1),
(39, 1, 'Laporan Pembelian', 'admin/pembelian', 'fas fa-file-invoice', 1),
(40, 4, 'Dashboard', 'kasir', 'fas fa-fw fa-tachometer-alt\r\n', 1),
(41, 4, 'Penjualan', 'kasir/penjualan', 'fas fa-shopping-cart', 1),
(42, 4, 'Laporan Stok', 'kasir/laporanstok', 'fas fa-file-alt', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `kategori_aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `kategori_aktif`) VALUES
(1, 'Ayam Yummy', 0),
(2, 'Ikan', 0),
(3, 'Minuman', 0),
(4, 'Ikan krapu', 1),
(10, 'Minuman', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `stok` int(10) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `menu_aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `id_kategori`, `nama_menu`, `harga`, `deskripsi`, `stok`, `foto`, `menu_aktif`) VALUES
(1, 1, 'Ayam Bakar mantap', 9000, 'Ayam Bakar enak', 50, 'ay_bakar.jpg', 1),
(2, 1, 'Ayam Goreng', 7000, 'Ayam Goreng Asik', 50, 'ay_goreng.jpg', 1),
(3, 1, 'Ayam Opor', 10000, 'Ayam Opor Gembira', 30, 'ay_opor.jpg', 1),
(4, 1, 'Ayam Geprek', 11000, 'Ayam Geprek Mantab', 40, 'ay_geprek.jpg', 1),
(5, 2, 'Ikan asal', 121212, 'hahaha', 55, 'KOP_SURAT_JSR_TERBARU.jpg', 1),
(6, 2, 'Ikan Goreng', 12000, 'Ikan Bakar Duar', 44, 'ik_goreng.jpg', 1),
(7, 3, 'Es teh manis', 4000, 'Es teh manis segerr', 34, 'es_teh_manis.jpg', 1),
(8, 3, 'Teh Tarik', 5000, 'Teh Tarik juss', 65, 'teh_tarik.jpg', 1),
(9, 3, 'Es Kelapa', 8000, 'Es Kelapa Muda segar', 100, 'es_kelapa.jpg', 1),
(10, 1, 'tester', 22000, 'ini tester', 81, 'ay_bakar.jpg', 1),
(11, 1, 'tester 2', 21000, 'ini tester 2', 63, 'ay_goreng.jpg', 1),
(13, 0, 'jajanan 1', 10000, 'wwkwkwk', 23, 'ND.jpg', 1),
(14, 13, 'Ayam Bakar Bumbu Kemiri  1/2', 80000, 'Ukuran 1/2 Ekor', 47, 'ayam_bakar.PNG', 1),
(15, 13, 'Ayam Bakar Suwir', 80000, 'Ukuran 1/2 Ekor', 77, 'ayam_bakar1.PNG', 1),
(16, 10, 'Milk Shake', 15000, 'Segar .....', 56, 'milkshake.png', 1),
(19, 10, 'Teh Lemon', 6000, 'Segar.....', 50, 'es-teh-lemon-foto-resep-utama.jpg', 1),
(22, 10, 'Air Mineral', 5000, 'Segar.....', 80, 'aqq.jpg', 1),
(25, 11, 'Jus Alpukat', 15000, 'Segar.....', 84, 'jus.jpg', 1),
(26, 11, 'Jus Orange', 10000, 'Segar.....', 77, 'jus1.jpg', 1),
(27, 11, 'Jus Campuran', 10000, 'Segar.....', 21, 'jus2.jpg', 1),
(28, 11, 'Jus Mangga', 10000, 'Segar.....', 5, 'jus3.jpg', 1),
(29, 11, 'Jus Lemon', 10000, 'Segar.....', 21, 'jus4.jpg', 1),
(30, 11, 'Jus Tomat', 10000, 'Segar.....', 10, 'jus5.jpg', 1),
(31, 12, 'Fruit Platter', 15000, 'Segar.....', 5, 'dessert.jpg', 1),
(32, 12, 'Ice Cream', 15000, '15000', 6, 'dessert1.jpg', 1),
(33, 12, 'Banana Split', 25000, 'Segar.....', 5, 'dessert2.jpg', 1),
(34, 14, 'Ayam Betutu Gilimanuk', 150000, 'Ukuran 1 Ekor', 8, 'ayam_bet.PNG', 1),
(35, 14, 'Ayam Betutu Gilimanuk', 80000, 'Ukuran 1/2 Ekor', 6, 'ayam_bet1.PNG', 1),
(36, 6, 'Ikan Bakar Slengseng', 75000, 'Ukuran Besar', 6, 'slengseng.PNG', 1),
(37, 6, 'Ikan Bakar Slengseng', 50000, 'Ukuran Sedang', 8, 'slengseng1.PNG', 1),
(38, 6, 'Ikan Bakar Slengseng', 25000, 'Ukuran Kecil', 6, 'slengseng2.PNG', 1),
(39, 7, 'Sup Ikan Krapu', 85000, 'Banyak Gizi', 3, 'sup_krapu.PNG', 1),
(40, 8, 'Nasi Campur Betutu dan Es Teh', 20000, 'Paket Ayam', 6, 'paket.png', 1),
(41, 8, 'Nasi Jinggo dan Es Teh', 20000, 'Paket Ayam', 6, 'paket1.png', 1),
(42, 8, 'Nasi Ayam Bakar dan Es Teh', 30000, 'paket Ayam', 8, 'paket2.png', 1),
(43, 8, 'Paket Ikan', 40000, 'Ikan Bakar, Sate Lilit, Sup Ikan Tuna, Matah dan Nasi', 5, 'paket3.png', 1),
(44, 9, 'Salad Mangga', 10000, 'Seger...', 22, 'salad.PNG', 1),
(45, 9, 'Salad Wortel', 10000, 'Seger...', 44, 'salad1.PNG', 1),
(46, 9, 'Ca Tauge', 10000, 'Enaaak...', 9, 'salad2.PNG', 1),
(47, 9, 'Ca Kangkung', 10000, 'Enaaak...', 18, 'salad3.PNG', 1),
(48, 9, 'Ca Brokoli', 25000, 'Enaaak...', 19, 'salad4.PNG', 1),
(49, 9, 'Urap Bali', 15000, 'Enaaak...', 11, 'salad5.PNG', 1),
(50, 15, 'Nasi Ubi', 5000, 'Enaaaak', 6, 'tmb.PNG', 1),
(51, 15, 'Nasi Putih', 4000, 'Enaaaak', 5, 'tmb1.PNG', 1),
(52, 15, 'Sambal Bangkot', 5000, 'Enaaaak', 7, 'tmb2.PNG', 1),
(53, 15, 'Sambal Terasi', 5000, 'Enaaaak', 7, 'tmb3.PNG', 1),
(54, 15, 'Sambal Matah', 5000, 'Enaaaak', 10, 'tmb4.PNG', 1),
(55, 15, 'Sate Lilit', 20000, '1 Porsi', 9, 'tmb5.PNG', 1),
(57, 4, 'Ikan Krapu Goreng', 75000, 'Enaaaak Kriuuk', 1088, 'ikan-kerapu-goreng-garing-foto-resep-utama.jpg', 1),
(58, 4, 'Ikan Krapu Kukus Bumbu Jahe', 75000, 'Enaaaak', 13, 'krapu1.PNG', 1),
(59, 5, 'Ikan Tumis Marlin', 85000, 'Enaaaak', 2, 'krapu2.PNG', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `nama_obat` varchar(200) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `minimum_stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id`, `id_satuan`, `nama_obat`, `harga_beli`, `harga_jual`, `minimum_stok`) VALUES
(1, 1, 'Panadol', 2500, 5000, 3),
(2, 1, 'Paracetamol', 5000, 23000, 2),
(3, 2, 'Tolak Angin', 8000, 23000, 9);

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
(1, 'tablet'),
(2, 'kapsul'),
(3, 'botol'),
(4, 'sashet'),
(5, 'tablet');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `tgl` datetime NOT NULL,
  `nota` int(11) NOT NULL,
  `ppn` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `total_bayar` int(50) NOT NULL,
  `kembalian` int(25) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id`, `tgl`, `nota`, `ppn`, `total_harga`, `total_bayar`, `kembalian`, `id_karyawan`, `id_status`) VALUES
(8, '2020-06-14 15:18:07', 0, 2250, 24750, 35000, 10250, 22, 1),
(9, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, 7, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `atas_nama` varchar(100) NOT NULL,
  `jumlah_pesanan` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_status2` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `server` int(11) NOT NULL,
  `kasir` int(11) NOT NULL,
  `note` varchar(265) NOT NULL,
  `uang_bayar` int(11) NOT NULL,
  `uang_kembali` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `simbol` varchar(50) NOT NULL,
  `class` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id`, `keterangan`, `simbol`, `class`) VALUES
(1, 'menunggu server', 'fas fa-fw fa-stop', 'btn btn-danger btn-circle'),
(2, 'belum bayar', 'fas fa-fw fa-times', 'btn btn-warning btn-circle'),
(3, 'dibayar', 'fas fa-fw fa-check', 'btn btn-success btn-circle');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status2`
--

CREATE TABLE `status2` (
  `id` int(11) NOT NULL,
  `ket` varchar(20) NOT NULL,
  `simbol2` varchar(30) NOT NULL,
  `class2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status2`
--

INSERT INTO `status2` (`id`, `ket`, `simbol2`, `class2`) VALUES
(1, 'menunggu', 'fas fa-fw fa-pause', 'btn btn-danger btn-circle'),
(2, 'dimasak', 'fas fa-fw fa-temperature-high', 'btn btn-warning btn-circle'),
(3, 'selesai', 'fas fa-fw fa-thumbs-up', 'btn btn-success btn-circle');

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
(1, 'PT. Sinar Naturalindo Berkah', '08977789000', 'Bekasi Jl. Kobra No.78\r\n\r\n\r\n\r\n'),
(2, 'PT. Sinar Herbal', '08977789123', 'Jl. Sejahtera, Karawang ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `date_create` int(11) NOT NULL,
  `role_id` int(1) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `no_hp`, `date_create`, `role_id`, `is_active`) VALUES
(1, 'rafi', 'rafi@if.uai.ac.id', '$2y$10$hYevGBtFvznengZbQqV/Reku86UMS.wX2uscbVnMW2IJNhM4rAiy6', '0887215654', 1590862579, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `active`
--
ALTER TABLE `active`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_bahan`
--
ALTER TABLE `detail_bahan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
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
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
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
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `status2`
--
ALTER TABLE `status2`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
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
-- AUTO_INCREMENT untuk tabel `bahan`
--
ALTER TABLE `bahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `detail_bahan`
--
ALTER TABLE `detail_bahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `history_stok`
--
ALTER TABLE `history_stok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `obat_satuan`
--
ALTER TABLE `obat_satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `status2`
--
ALTER TABLE `status2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
