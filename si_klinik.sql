-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 13 Jan 2023 pada 01.47
-- Versi server: 5.7.33
-- Versi PHP: 8.1.11

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
(1, 'Dr Strange', '2023-01-12 06:59:24', '2023-01-12 06:59:48', NULL, 'Perempuan', 'New York', '1965-02-12', 'Jln. Tenggilis X', 1);

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
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deskripsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`, `deskripsi`) VALUES
(1, 'Obat Batuk Pilek', '2023-01-12 07:06:17', '2023-01-12 07:06:17', NULL, 'Deskripsi untuk obat batuk pilek'),
(2, 'Obat Demam', '2023-01-12 07:06:28', '2023-01-12 07:06:28', NULL, 'Deskripsi untuk obat demam');

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
(1, 'Selesai', '2023-01-12 07:01:45', '2023-01-12 07:15:27', 1, 1, 1, 'Tidak Bisa Melihat', 'Sudah sembuh bosku', '2023-01-12', '03:01:45', '03:15:27', 30000, 1, 'Cash', 10000),
(2, 'Selesai', '2023-01-12 17:01:27', '2023-01-12 17:10:57', 2, 1, 1, 'Tidak bisa melihat jauh', 'pake kacamata minus', '2023-01-13', '01:01:27', '01:06:03', 2500, 1, 'Kredit', 8000),
(3, 'Selesai', '2023-01-12 17:46:24', '2023-01-12 17:47:37', 1, 1, 1, 'Tidak sehat kembali', 'sdh sehat kembali', '2023-01-13', '01:46:24', '01:46:53', 1000, 1, 'Kredit', 1000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `deleted_at` timestamp NULL DEFAULT NULL,
  `harga` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`idobat`, `nama`, `kategori`, `satuan`, `created_at`, `updated_at`, `deleted_at`, `harga`) VALUES
(1, 'Sanmol 250Mg', 'Obat Demam', 'Strip', '2023-01-12 07:06:52', '2023-01-12 07:11:04', NULL, 7500),
(2, 'Neozep Forte 250mg', 'Obat Batuk Pilek', 'Strip', '2023-01-12 07:10:54', '2023-01-12 07:10:54', NULL, 5000);

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
(1, 1, 6, 2000),
(1, 2, 12, 2000),
(2, 1, 13, 2000);

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
(1, '2023-01-12', '12345678', '123123', 'Gusti Bagus', 'Balikpapan', '1999-10-29', 'Laki-laki', 'Jln. Perumnas No 32', 'WIRASWASTA', 'BUDHA', '2023-01-12 06:57:38', '2023-01-12 06:58:04', NULL, 1),
(2, '2023-01-13', '78910', '4321', 'Alexander Evan', 'Ende', '2010-10-10', 'Laki-laki', 'Jln. Sultan Hassanudin', 'WIRASWASTA', 'KATOLIK', '2023-01-12 17:01:07', '2023-01-12 17:01:07', NULL, 1);

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
(1, 'Poli Mata Batin', '2023-01-12 07:01:25', '2023-01-12 07:01:34', NULL);

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
(1, 1, 2, 10000, '1x1'),
(1, 2, 2, 5000, '3x1'),
(2, 1, 1, 2500, '1x1'),
(3, 1, 1, 1000, '1x1');

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
(1, '2023-01-12', '2023-01-12 07:11:34', '2023-01-12 07:11:34'),
(2, '2023-01-12', '2023-01-12 07:21:52', '2023-01-12 07:21:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` enum('Admin','Dokter','Perawat') COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 'Admin', 'Evan', 'evan@evan.com', NULL, '$2y$10$kG/fE9u0bfYMzesyaHGCbOzlhnEH.Z5DcIFb3qUThltL8BQUlzfDS', NULL, '2022-12-05 03:20:40', '2022-12-05 03:20:40'),
(2, 'Dokter', 'Gusti Bagus', 'qwe@gmail.com', NULL, '$2y$10$TjiR1ifocjVoUpWoRa/Xw.ZOrbO6mReC9n8PhmS5A/wbLQekXC9ze', NULL, '2022-12-21 05:20:19', '2022-12-21 05:20:19'),
(3, 'Dokter', 'Dr Strange', 'strange@strange.com', NULL, '$2y$10$65rGQiBgcNtQlOE4fq1im.0F9rvXJerMoge5hhOqHnfB5r9RGoZvy', NULL, '2023-01-12 06:59:24', '2023-01-12 06:59:48');

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
  MODIFY `iddokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  MODIFY `idkunjungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `idobat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `idpasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `poli`
--
ALTER TABLE `poli`
  MODIFY `idpoli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `stok_in`
--
ALTER TABLE `stok_in`
  MODIFY `idstok_in` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
