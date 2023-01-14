-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jan 2023 pada 16.27
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_klinik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `iddokter` int(11) NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`iddokter`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Dr DoLittle Edit', 'Perempuan', 'Jakarta Edit', '2023-12-12', 'Kokos Edit', 1, '2022-12-12 05:27:36', '2022-12-12 05:30:12', NULL),
(3, 'Dokter A', NULL, NULL, NULL, NULL, 1, '2023-01-11 21:05:14', '2023-01-11 23:20:27', '2023-01-11 23:20:27'),
(4, 'Dokter A', NULL, NULL, NULL, NULL, 1, '2023-01-11 21:28:38', '2023-01-11 22:47:45', '2023-01-11 22:47:45'),
(8, 'Bagus', 'Laki-laki', 'Balikpapan', '1999-07-13', 'gasdasd', 1, '2023-01-11 23:11:06', '2023-01-11 23:19:59', '2023-01-11 23:19:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `name`, `created_at`, `updated_at`) VALUES
(5, 'Obat Batuk', '2023-01-11 23:21:13', '2023-01-11 23:21:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kunjungan`
--

CREATE TABLE `kunjungan` (
  `idkunjungan` int(11) NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pasien_idpasien` int(11) NOT NULL,
  `dokter_iddokter` int(11) NOT NULL,
  `poli_idpoli` int(11) NOT NULL,
  `diagnosa_awal` varchar(45) DEFAULT NULL,
  `hasil_diagnosa` varchar(45) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_datang` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `tarif_obat` double DEFAULT NULL,
  `status_bayar` tinyint(4) DEFAULT 0,
  `metode_pembayaran` varchar(45) DEFAULT NULL,
  `tarif_periksa` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kunjungan`
--

INSERT INTO `kunjungan` (`idkunjungan`, `status`, `created_at`, `updated_at`, `pasien_idpasien`, `dokter_iddokter`, `poli_idpoli`, `diagnosa_awal`, `hasil_diagnosa`, `tanggal`, `jam_datang`, `jam_selesai`, `tarif_obat`, `status_bayar`, `metode_pembayaran`, `tarif_periksa`) VALUES
(3, 'Selesai', '2022-12-18 06:55:55', '2023-01-13 05:24:46', 4, 2, 3, 'Tidak Sehat', 'Sudah sehat bosku', '2022-12-18', '02:55:55', '01:24:46', 26000, 1, 'Cash', 100000),
(4, 'Selesai', '2022-12-21 05:21:09', '2023-01-13 05:27:42', 2, 2, 2, 'tes', 'tesss', '2022-12-21', '01:21:09', '01:27:42', 750000, 1, 'Cash', 100000),
(5, 'Batal', '2023-01-13 03:39:36', '2023-01-13 06:59:25', 2, 2, 2, 'tes', 'tesss', '2023-01-13', '11:39:36', NULL, 250001, 0, NULL, 25000),
(6, 'Batal', '2023-01-13 06:19:39', '2023-01-13 07:08:45', 6, 2, 2, 'tess', NULL, '2023-01-13', '02:19:39', NULL, 25000, 3, NULL, 100000),
(7, 'Batal', '2023-01-13 06:38:45', '2023-01-13 07:08:40', 7, 2, 2, 'tes', NULL, '2023-01-13', '02:38:45', NULL, NULL, 3, NULL, NULL),
(8, 'Batal', '2023-01-13 06:42:04', '2023-01-13 07:02:49', 7, 2, 3, 'tes', NULL, '2023-01-13', '02:42:04', NULL, NULL, 3, NULL, NULL),
(9, 'Batal', '2023-01-13 07:06:56', '2023-01-13 07:07:41', 5, 2, 2, 'tes', NULL, '2023-01-13', '03:06:56', NULL, NULL, 3, NULL, NULL),
(10, 'Selesai', '2023-01-13 07:07:53', '2023-01-13 07:10:33', 5, 2, 2, '1', NULL, '2023-01-13', '03:07:53', NULL, 750000, 1, NULL, 750000),
(11, 'Batal', '2023-01-13 07:09:37', '2023-01-13 07:09:46', 7, 2, 2, 'a', NULL, '2023-01-13', '03:09:37', NULL, NULL, 3, NULL, NULL),
(12, 'Menunggu Pemeriksaan', '2023-01-13 07:11:17', '2023-01-13 07:11:17', 5, 2, 2, '1', NULL, '2023-01-13', '03:11:17', NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_10_06_215330_create_customers_table', 2),
(5, '2022_10_07_094114_create_suppliers_table', 2),
(6, '2022_10_07_094406_create_product_uoms_table', 2),
(7, '2022_10_07_114126_create_product_types_table', 2),
(8, '2022_10_07_120544_create_product_categories_table', 2),
(9, '2022_10_07_120825_create_purchases_order_table', 2),
(10, '2022_10_07_121030_create_sales_order_table', 2),
(11, '2022_10_08_094224_create_products_table', 2),
(12, '2022_10_12_213850_create_stock_in_table', 2),
(13, '2022_10_12_214317_create_stock_out_table', 2),
(14, '2022_10_24_221910_create_stock_opnames_table', 2),
(15, '2022_10_24_222025_create_detail_stock_opname', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `months`
--

CREATE TABLE `months` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `months`
--

INSERT INTO `months` (`id`, `name`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `idobat` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `kategori` varchar(50) NOT NULL,
  `satuan` enum('Strip','Tablet','Sirup') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`idobat`, `nama`, `kategori`, `satuan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Paracetamol', 'Obat Pusing', 'Strip', '2022-12-13 05:46:02', '2022-12-15 03:58:21', NULL),
(2, 'Neozep Forte', 'Obat Pusing', 'Tablet', '2022-12-15 03:58:34', '2022-12-15 03:58:34', NULL),
(3, 'Neuremacil', 'Obat Batuk', 'Sirup', '2022-12-15 03:58:50', '2022-12-15 03:58:50', NULL),
(4, NULL, '5', NULL, '2023-01-11 23:38:00', '2023-01-11 23:39:30', '2023-01-11 23:39:30'),
(5, NULL, 'Obat Batuk', NULL, '2023-01-11 23:39:51', '2023-01-11 23:39:51', NULL),
(6, NULL, 'Obat Batuk', NULL, '2023-01-11 23:40:19', '2023-01-11 23:40:19', NULL),
(7, 'tes', 'Obat Batuk', NULL, '2023-01-11 23:41:23', '2023-01-11 23:41:23', NULL),
(8, 'caca', 'Obat Batuk', NULL, '2023-01-11 23:41:59', '2023-01-11 23:41:59', NULL),
(9, 'data', 'Obat Batuk', NULL, '2023-01-11 23:42:08', '2023-01-11 23:42:08', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat_has_stok_in`
--

CREATE TABLE `obat_has_stok_in` (
  `obat_idobat` int(11) NOT NULL,
  `stok_in_idstok_in` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat_has_stok_in`
--

INSERT INTO `obat_has_stok_in` (`obat_idobat`, `stok_in_idstok_in`, `jumlah`, `harga`, `created_at`) VALUES
(1, 14, 10, 15000, '2023-01-11 12:27:45'),
(1, 16, 5, 50000, '2023-01-13 11:44:29'),
(2, 14, 14, 25000, '2023-01-11 12:27:45'),
(2, 15, 5, 250000, '2023-01-11 12:27:45'),
(2, 16, 0, 50000, '2023-01-13 11:44:29'),
(3, 14, 10, 25000, '2023-01-11 12:27:45'),
(3, 16, 5, 10000, '2023-01-13 11:44:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `idpasien` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `nik` varchar(45) DEFAULT NULL,
  `no_bpjs` varchar(45) DEFAULT NULL,
  `nama_lengkap` varchar(45) DEFAULT NULL,
  `tempat_lahir` varchar(45) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `umur` int(11) NOT NULL,
  `jenis_kelamin` enum('Perempuan','Laki-laki') DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `pekerjaan` varchar(45) DEFAULT NULL,
  `agama` varchar(45) DEFAULT NULL,
  `no_telp` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`idpasien`, `tanggal`, `nik`, `no_bpjs`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `umur`, `jenis_kelamin`, `alamat`, `pekerjaan`, `agama`, `no_telp`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(2, '2022-12-06', '5308745689450002', '1111', 'Alexander', 'Maumere', '2000-10-29', 0, 'Perempuan', 'Jln. Kokos Raya No 35', 'WIRASWASTA', 'ISLAM', '', '2022-12-05 04:47:42', '2022-12-06 05:51:12', NULL, 1),
(3, '2022-12-06', '5816516161615', '8795416464', 'Richardo', 'Mataram', '2022-12-26', 0, 'Perempuan', 'RMS V No 3', 'WIRASWASTA', 'BUDHA', '', '2022-12-05 07:18:55', '2022-12-06 06:06:56', '2022-12-06 06:06:56', 1),
(4, '2022-12-06', '123', '456', 'Marianus', 'Ende', '1962-12-21', 0, 'Laki-laki', 'Jln. Sultan Hassanudin', 'PNS', 'KATOLIK', '', '2022-12-06 05:53:11', '2022-12-06 05:53:11', NULL, 1),
(5, NULL, NULL, NULL, 'tes', NULL, NULL, 23, 'Laki-laki', NULL, NULL, NULL, '0812454544', '2023-01-13 06:18:32', '2023-01-13 06:18:32', NULL, 1),
(6, NULL, NULL, NULL, 'a', NULL, NULL, 23, 'Perempuan', NULL, NULL, NULL, '0812454544', '2023-01-13 06:19:39', '2023-01-13 06:19:39', NULL, 1),
(7, '2023-01-13', '12313123', '123123', 'caca', 'Balikpapan', '2023-01-13', 24, 'Laki-laki', NULL, NULL, NULL, '0812454544', '2023-01-13 06:38:45', '2023-01-13 07:15:36', NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `poli`
--

CREATE TABLE `poli` (
  `idpoli` int(11) NOT NULL,
  `nama_lengkap` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `poli`
--

INSERT INTO `poli` (`idpoli`, `nama_lengkap`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Polikarbonat', '2022-12-12 06:13:08', '2022-12-12 06:14:21', '2022-12-12 06:14:21'),
(2, 'Poli Gigi', '2022-12-12 06:14:33', '2022-12-12 06:14:33', NULL),
(3, 'Poli Umum', '2022-12-12 06:14:40', '2022-12-12 06:14:40', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep_stock_out`
--

CREATE TABLE `resep_stock_out` (
  `kunjungan_idkunjungan` int(11) NOT NULL,
  `obat_idobat` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `keterangan` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `resep_stock_out`
--

INSERT INTO `resep_stock_out` (`kunjungan_idkunjungan`, `obat_idobat`, `jumlah`, `harga`, `keterangan`) VALUES
(3, 1, 2, 2500, '1x1'),
(3, 2, 3, 7000, '3x1'),
(4, 1, 5, 150000, '2x1'),
(5, 2, 1, 25000, '2x1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_in`
--

CREATE TABLE `stok_in` (
  `idstok_in` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stok_in`
--

INSERT INTO `stok_in` (`idstok_in`, `tanggal`, `created_at`, `updated_at`) VALUES
(10, '2022-12-18', '2022-12-18 02:24:20', '2022-12-18 02:24:20'),
(11, '2022-12-19', '2022-12-19 05:04:47', '2022-12-19 05:04:47'),
(12, '2022-12-19', '2022-12-19 05:55:20', '2022-12-19 05:55:20'),
(13, '2022-12-19', '2022-12-19 05:55:32', '2022-12-19 05:55:32'),
(14, '2023-01-11', '2023-01-11 04:24:51', '2023-01-11 04:24:51'),
(15, '2023-01-11', '2023-01-11 04:26:47', '2023-01-11 04:26:47'),
(16, '2023-01-13', '2023-01-13 03:44:29', '2023-01-13 03:44:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` enum('Admin','Dokter') COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dokter', 'Evan', 'evan@evan.com', NULL, '$2y$10$kG/fE9u0bfYMzesyaHGCbOzlhnEH.Z5DcIFb3qUThltL8BQUlzfDS', NULL, '2022-12-05 03:20:40', '2022-12-05 03:20:40'),
(2, 'Dokter', 'Gusti Bagus', 'qwe@gmail.com', NULL, '$2y$10$TjiR1ifocjVoUpWoRa/Xw.ZOrbO6mReC9n8PhmS5A/wbLQekXC9ze', NULL, '2022-12-21 05:20:19', '2022-12-21 05:20:19'),
(6, 'Dokter', 'Dokter ABC', 'doktera@gmail.com', NULL, '$2y$10$l0yMBy7bwW5jldxEPL9Fvez2Ey4L46TwnqxJzx3FnOfRm4RK.ltaG', NULL, '2023-01-11 21:28:38', '2023-01-11 21:32:08'),
(7, 'Dokter', 'tes', 'qwe1234@gmail.com', NULL, '$2y$10$QEF6naCEMUCzkXQecA9gn.OeYrUPlyQvPhRQu/2waraTgpQpduQjW', NULL, '2023-01-11 23:11:07', '2023-01-11 23:11:07');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`iddokter`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD PRIMARY KEY (`idkunjungan`),
  ADD KEY `fk_kunjungan_pasien_idx` (`pasien_idpasien`),
  ADD KEY `fk_kunjungan_dokter1_idx` (`dokter_iddokter`),
  ADD KEY `fk_kunjungan_poli1_idx` (`poli_idpoli`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `months`
--
ALTER TABLE `months`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`idobat`);

--
-- Indeks untuk tabel `obat_has_stok_in`
--
ALTER TABLE `obat_has_stok_in`
  ADD PRIMARY KEY (`obat_idobat`,`stok_in_idstok_in`),
  ADD KEY `fk_obat_has_stok_in_stok_in1_idx` (`stok_in_idstok_in`),
  ADD KEY `fk_obat_has_stok_in_obat1_idx` (`obat_idobat`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`idpasien`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`idpoli`);

--
-- Indeks untuk tabel `resep_stock_out`
--
ALTER TABLE `resep_stock_out`
  ADD PRIMARY KEY (`kunjungan_idkunjungan`,`obat_idobat`),
  ADD KEY `fk_kunjungan_has_obat_obat1_idx` (`obat_idobat`),
  ADD KEY `fk_kunjungan_has_obat_kunjungan1_idx` (`kunjungan_idkunjungan`);

--
-- Indeks untuk tabel `stok_in`
--
ALTER TABLE `stok_in`
  ADD PRIMARY KEY (`idstok_in`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dokter`
--
ALTER TABLE `dokter`
  MODIFY `iddokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  MODIFY `idkunjungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `months`
--
ALTER TABLE `months`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `idobat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `idpasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `poli`
--
ALTER TABLE `poli`
  MODIFY `idpoli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `stok_in`
--
ALTER TABLE `stok_in`
  MODIFY `idstok_in` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD CONSTRAINT `fk_kunjungan_dokter1` FOREIGN KEY (`dokter_iddokter`) REFERENCES `dokter` (`iddokter`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_kunjungan_pasien` FOREIGN KEY (`pasien_idpasien`) REFERENCES `pasien` (`idpasien`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_kunjungan_poli1` FOREIGN KEY (`poli_idpoli`) REFERENCES `poli` (`idpoli`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `obat_has_stok_in`
--
ALTER TABLE `obat_has_stok_in`
  ADD CONSTRAINT `fk_obat_has_stok_in_obat1` FOREIGN KEY (`obat_idobat`) REFERENCES `obat` (`idobat`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_obat_has_stok_in_stok_in1` FOREIGN KEY (`stok_in_idstok_in`) REFERENCES `stok_in` (`idstok_in`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `resep_stock_out`
--
ALTER TABLE `resep_stock_out`
  ADD CONSTRAINT `fk_kunjungan_has_obat_kunjungan1` FOREIGN KEY (`kunjungan_idkunjungan`) REFERENCES `kunjungan` (`idkunjungan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_kunjungan_has_obat_obat1` FOREIGN KEY (`obat_idobat`) REFERENCES `obat` (`idobat`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
