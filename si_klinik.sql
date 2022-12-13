-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 13 Des 2022 pada 14.04
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
  `tarif` double DEFAULT NULL,
  `status_bayar` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kunjungan`
--

INSERT INTO `kunjungan` (`idkunjungan`, `status`, `created_at`, `updated_at`, `pasien_idpasien`, `dokter_iddokter`, `poli_idpoli`, `diagnosa_awal`, `hasil_diagnosa`, `tanggal`, `jam_datang`, `jam_selesai`, `tarif`, `status_bayar`) VALUES
(1, NULL, '2022-12-13 02:58:41', '2022-12-13 02:58:41', 2, 2, 2, 's', NULL, '2022-12-13', '10:58:41', NULL, NULL, 0);

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `idobat` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`idobat`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Paracetamol Edit', '2022-12-13 05:46:02', '2022-12-13 05:52:55', NULL);

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
  `keuntungan` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `keterangan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_in`
--

CREATE TABLE `stok_in` (
  `idstok_in` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_in_has_obat`
--

CREATE TABLE `stok_in_has_obat` (
  `stok_in_idstok_in` int(11) NOT NULL,
  `obat_idobat` int(11) NOT NULL,
  `jumlah` varchar(45) DEFAULT NULL,
  `harga` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Evan', 'evan@evan.com', NULL, '$2y$10$kG/fE9u0bfYMzesyaHGCbOzlhnEH.Z5DcIFb3qUThltL8BQUlzfDS', NULL, '2022-12-05 03:20:40', '2022-12-05 03:20:40');

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
-- Indeks untuk tabel `stok_in_has_obat`
--
ALTER TABLE `stok_in_has_obat`
  ADD PRIMARY KEY (`stok_in_idstok_in`,`obat_idobat`),
  ADD KEY `fk_stok_in_has_obat_obat1_idx` (`obat_idobat`),
  ADD KEY `fk_stok_in_has_obat_stok_in1_idx` (`stok_in_idstok_in`);

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
  MODIFY `idkunjungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `idobat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `idstok_in` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Ketidakleluasaan untuk tabel `resep_stock_out`
--
ALTER TABLE `resep_stock_out`
  ADD CONSTRAINT `fk_kunjungan_has_obat_kunjungan1` FOREIGN KEY (`kunjungan_idkunjungan`) REFERENCES `kunjungan` (`idkunjungan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_kunjungan_has_obat_obat1` FOREIGN KEY (`obat_idobat`) REFERENCES `obat` (`idobat`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `stok_in_has_obat`
--
ALTER TABLE `stok_in_has_obat`
  ADD CONSTRAINT `fk_stok_in_has_obat_obat1` FOREIGN KEY (`obat_idobat`) REFERENCES `obat` (`idobat`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_stok_in_has_obat_stok_in1` FOREIGN KEY (`stok_in_idstok_in`) REFERENCES `stok_in` (`idstok_in`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
