-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 22 Des 2022 pada 13.11
-- Versi server: 5.7.33
-- Versi PHP: 8.1.3

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`iddokter`, `nama_lengkap`, `created_at`, `updated_at`, `deleted_at`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `status`) VALUES
(2, 'Dr DoLittle Edit', '2022-12-12 05:27:36', '2022-12-12 05:30:12', NULL, 'Perempuan', 'Jakarta Edit', '2023-12-12', 'Kokos Edit', 1);

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `status_bayar` tinyint(4) DEFAULT '0',
  `metode_pembayaran` varchar(45) DEFAULT NULL,
  `tarif_periksa` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kunjungan`
--

INSERT INTO `kunjungan` (`idkunjungan`, `status`, `created_at`, `updated_at`, `pasien_idpasien`, `dokter_iddokter`, `poli_idpoli`, `diagnosa_awal`, `hasil_diagnosa`, `tanggal`, `jam_datang`, `jam_selesai`, `tarif_obat`, `status_bayar`, `metode_pembayaran`, `tarif_periksa`) VALUES
(3, 'Selesai', '2022-12-18 06:55:55', '2022-12-19 06:12:22', 4, 2, 3, 'Tidak Sehat', 'Sudah sehat bosku', '2022-12-18', '02:55:55', '02:12:22', 26000, 1, 'Cash', 75000),
(4, 'Selesai', '2022-12-20 06:34:18', '2022-12-21 09:40:28', 2, 2, 2, 'Gigi Berlubang', 'sudah sempu, minum ibat ya', '2022-12-20', '02:34:18', '05:26:53', 52500, 1, 'Kredit', 20000),
(5, 'Menunggu Pemeriksaan', '2022-12-21 09:43:50', '2022-12-21 09:43:50', 2, 2, 2, 'tak tau', NULL, '2022-12-21', '05:43:50', NULL, NULL, 0, NULL, NULL);

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
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `idobat` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `satuan` enum('Strip','Tablet','Sirup') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`idobat`, `nama`, `satuan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Paracetamol', 'Strip', '2022-12-13 05:46:02', '2022-12-15 03:58:21', NULL),
(2, 'Neozep Forte', 'Tablet', '2022-12-15 03:58:34', '2022-12-15 03:58:34', NULL),
(3, 'Neuremacil', 'Sirup', '2022-12-15 03:58:50', '2022-12-15 03:58:50', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat_has_stok_in`
--

CREATE TABLE `obat_has_stok_in` (
  `obat_idobat` int(11) NOT NULL,
  `stok_in_idstok_in` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat_has_stok_in`
--

INSERT INTO `obat_has_stok_in` (`obat_idobat`, `stok_in_idstok_in`, `jumlah`, `harga`) VALUES
(1, 14, 0, 25000),
(1, 15, 4, 25000),
(2, 14, 15, 3500),
(2, 15, 10, 3500),
(3, 14, 30, 4500),
(3, 15, 15, 4500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `idpasien` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nik` varchar(45) NOT NULL,
  `no_bpjs` varchar(45) NOT NULL,
  `nama_lengkap` varchar(45) NOT NULL,
  `tempat_lahir` varchar(45) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Perempuan','Laki-laki') NOT NULL,
  `alamat` varchar(45) NOT NULL,
  `pekerjaan` varchar(45) NOT NULL,
  `agama` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`idpasien`, `tanggal`, `nik`, `no_bpjs`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `pekerjaan`, `agama`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(2, '2022-12-06', '5308745689450002', '1111', 'Alexander', 'Maumere', '2000-10-29', 'Perempuan', 'Jln. Kokos Raya No 35', 'WIRASWASTA', 'ISLAM', '2022-12-05 04:47:42', '2022-12-06 05:51:12', NULL, 1),
(3, '2022-12-06', '5816516161615', '8795416464', 'Richardo', 'Mataram', '2022-12-26', 'Perempuan', 'RMS V No 3', 'WIRASWASTA', 'BUDHA', '2022-12-05 07:18:55', '2022-12-06 06:06:56', '2022-12-06 06:06:56', 1),
(4, '2022-12-06', '123', '456', 'Marianus', 'Ende', '1962-12-21', 'Laki-laki', 'Jln. Sultan Hassanudin', 'PNS', 'KATOLIK', '2022-12-06 05:53:11', '2022-12-06 05:53:11', NULL, 1);

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
(4, 1, 11, 2500, '3x1'),
(4, 2, 5, 5000, '3x1');

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
(14, '2022-12-21', '2022-12-21 09:09:29', '2022-12-21 09:09:29'),
(15, '2022-12-21', '2022-12-21 09:10:33', '2022-12-21 09:10:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','dokter') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Evan', 'evan@evan.com', NULL, '$2y$10$kG/fE9u0bfYMzesyaHGCbOzlhnEH.Z5DcIFb3qUThltL8BQUlzfDS', NULL, '2022-12-05 03:20:40', '2022-12-05 03:20:40', 'dokter'),
(2, 'gusti edit', 'gustediti@gusti.com', NULL, '$2y$10$m5wXhresWJzC5tGl4o6m1uIwIH9/sCH9Cthw/cCeMfMIJLiovswbm', NULL, '2022-12-20 07:40:38', '2022-12-20 07:48:53', 'admin');

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
  MODIFY `iddokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  MODIFY `idkunjungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `idobat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `idpasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `poli`
--
ALTER TABLE `poli`
  MODIFY `idpoli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `stok_in`
--
ALTER TABLE `stok_in`
  MODIFY `idstok_in` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
