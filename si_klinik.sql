-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 18 Jan 2023 pada 06.48
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

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_pasien_bulanan` (IN `tahun` INT)   BEGIN
	SELECT m.name AS bulan,
	(SELECT COUNT(k.idkunjungan) FROM kunjungan AS k WHERE MONTH(k.created_at) = m.id AND YEAR(k.created_at) = tahun AND k.status_bayar =1) AS totalPasien
	FROM months AS m;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_pasien_harian` (IN `tahun` INT, IN `bulan` INT)   BEGIN
	SELECT t.id AS tanggal,
	(SELECT COUNT(k.idkunjungan) FROM kunjungan AS k WHERE DAY(k.created_at) = t.id AND MONTH(k.created_at) = bulan AND YEAR(k.created_at) = tahun AND k.status_bayar =1) AS totalPasien
	FROM tanggal AS t;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_total_pendapatan_bulan` (IN `tahun` INT)   BEGIN
	SELECT m.name AS bulan,
	(SELECT SUM(k1.tarif_periksa + k1.tarif_obat) FROM kunjungan AS k1 
	WHERE MONTH(k1.created_at) = m.id AND YEAR(k1.created_at) = tahun AND k1.status_bayar = 1) AS totalPendapatan
	FROM months AS m;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_total_pendapatan_harian` (IN `bulan` INT, IN `tahun` INT)   BEGIN
	SELECT t.id AS tanggal,
	(SELECT SUM(k1.tarif_periksa + k1.tarif_obat) FROM kunjungan AS k1 
	WHERE DAY(k1.created_at) = t.id AND MONTH(k1.created_at) = bulan AND YEAR(k1.created_at) = tahun AND k1.status_bayar = 1) AS totalPendapatan

	FROM tanggal AS t;
	
END$$

DELIMITER ;

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
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `poli_idpoli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`iddokter`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `status`, `created_at`, `updated_at`, `deleted_at`, `poli_idpoli`) VALUES
(1, 'Dokter A', 'Laki-laki', 'Surabaya', '1999-02-09', 'Tenggilis', 1, '2023-01-17 21:43:45', '2023-01-17 21:43:45', NULL, 1),
(2, 'Dokter B', 'Perempuan', 'Mamumere', '1987-02-09', 'frans seda', 1, '2023-01-17 21:44:24', '2023-01-17 21:44:33', NULL, 2),
(3, 'Dokter C', 'Perempuan', 'Maumere', '1998-08-08', 'Koskwo', 1, '2023-01-17 21:54:07', '2023-01-17 21:54:07', NULL, 1);

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
  `deskripsi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`, `deskripsi`) VALUES
(1, 'Kategori A', '2023-01-17 21:44:50', '2023-01-17 21:44:50', NULL, 'Deskripsiii'),
(2, 'Kategori B', '2023-01-17 21:44:58', '2023-01-17 21:44:58', NULL, 'desss');

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
(1, 'Selesai', '2023-01-17 22:45:51', '2023-01-17 22:48:08', 1, 1, 1, 'jdkajsna', 'n', '2023-01-18', '06:45:51', '06:48:08', 5000, 1, 'Cash', 10000);

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
  `deleted_at` timestamp NULL DEFAULT NULL,
  `harga` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`idobat`, `nama`, `kategori`, `satuan`, `created_at`, `updated_at`, `deleted_at`, `harga`) VALUES
(1, 'Obat A', 'Kategori A', 'Strip', '2023-01-17 21:45:16', '2023-01-17 21:45:16', NULL, 5000),
(2, 'Obat B', 'Kategori B', 'Strip', '2023-01-17 21:45:27', '2023-01-17 21:45:27', NULL, 1250);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat_has_stok_in`
--

CREATE TABLE `obat_has_stok_in` (
  `obat_idobat` int(11) NOT NULL,
  `stok_in_idstok_in` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `umur` int(11) DEFAULT NULL,
  `jenis_kelamin` enum('Perempuan','Laki-laki') DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `pekerjaan` varchar(45) DEFAULT NULL,
  `agama` varchar(45) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`idpasien`, `tanggal`, `nik`, `no_bpjs`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `umur`, `jenis_kelamin`, `alamat`, `pekerjaan`, `agama`, `no_telp`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(1, NULL, NULL, NULL, 'Alexander', NULL, '1999-02-09', NULL, 'Laki-laki', NULL, NULL, NULL, '123465', '2023-01-17 22:45:51', '2023-01-17 22:45:51', NULL, 1);

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
(1, 'Poli A', '2023-01-17 21:38:58', '2023-01-17 21:39:47', NULL),
(2, 'Poli B', '2023-01-17 21:39:19', '2023-01-17 21:39:19', NULL),
(3, 'Poli C', '2023-01-17 21:39:25', '2023-01-17 21:39:25', NULL),
(4, 'Poli D', '2023-01-17 21:39:33', '2023-01-17 21:39:41', '2023-01-17 21:39:41');

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
(1, 1, 1, 5000, '1x1');

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
(1, '2023-01-18', '2023-01-17 21:45:41', '2023-01-17 21:45:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggal`
--

CREATE TABLE `tanggal` (
  `id` int(11) NOT NULL,
  `tanggal` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tanggal`
--

INSERT INTO `tanggal` (`id`, `tanggal`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6'),
(7, '7'),
(8, '8'),
(9, '9'),
(10, '10'),
(11, '11'),
(12, '12'),
(13, '13'),
(14, '14'),
(15, '15'),
(16, '16'),
(17, '17'),
(18, '18'),
(19, '19'),
(20, '20'),
(21, '21'),
(22, '22'),
(23, '23'),
(24, '24'),
(25, '25'),
(26, '26'),
(27, '27'),
(28, '28'),
(29, '29'),
(30, '30'),
(31, '2');

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
(1, 'Dokter', 'Dokter A', 'doktera@doktera.com', NULL, '$2y$10$QTYxi2sN30m7KP2bt28rYOyPeud/hqbhGQzsxTtQUrbWoysfx61dq', NULL, '2023-01-17 21:43:45', '2023-01-17 21:43:45'),
(2, 'Dokter', 'Dokter B', 'dokterb@dokterb.com', NULL, '$2y$10$CJoFjJba9GA93N.YFsUNPu5VHvQA/0B1FNvyKhHoAFm9o3deh7iF6', NULL, '2023-01-17 21:44:24', '2023-01-17 21:44:33'),
(3, 'Dokter', 'Dokter C', 'dokterc@dokterc.com', NULL, '$2y$10$3TPsbBrFo5mtwAsseUKvL.mDvBOJg8K58bPwUMG8VQ7TtIU8lfwpi', NULL, '2023-01-17 21:54:07', '2023-01-17 21:54:07'),
(1000, 'Admin', 'Evan', 'evan@evan.com', NULL, '$2y$10$kG/fE9u0bfYMzesyaHGCbOzlhnEH.Z5DcIFb3qUThltL8BQUlzfDS', NULL, '2022-12-05 03:20:40', '2022-12-05 03:20:40');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_pasien_harian`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_pasien_harian` (
`tanggal` int(11)
,`totalPasien` bigint(21)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_pasien_harian`
--
DROP TABLE IF EXISTS `view_pasien_harian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pasien_harian`  AS SELECT `t`.`id` AS `tanggal`, (select count(`k`.`idkunjungan`) from `kunjungan` `k` where ((cast(`k`.`created_at` as date) = `t`.`id`) and (year(`k`.`created_at`) = 2023) and (`k`.`status_bayar` = 1))) AS `totalPasien` FROM `tanggal` AS `t`;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`iddokter`),
  ADD KEY `fk_dokter_poli1_idx` (`poli_idpoli`);

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
-- Indeks untuk tabel `tanggal`
--
ALTER TABLE `tanggal`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `iddokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `idkunjungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `months`
--
ALTER TABLE `months`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `idobat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `idpasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `poli`
--
ALTER TABLE `poli`
  MODIFY `idpoli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `stok_in`
--
ALTER TABLE `stok_in`
  MODIFY `idstok_in` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tanggal`
--
ALTER TABLE `tanggal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `fk_dokter_poli1` FOREIGN KEY (`poli_idpoli`) REFERENCES `poli` (`idpoli`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD CONSTRAINT `FK_kunjungan_poli` FOREIGN KEY (`poli_idpoli`) REFERENCES `poli` (`idpoli`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kunjungan_dokter1` FOREIGN KEY (`dokter_iddokter`) REFERENCES `dokter` (`iddokter`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kunjungan_pasien` FOREIGN KEY (`pasien_idpasien`) REFERENCES `pasien` (`idpasien`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `fk_kunjungan_has_obat_kunjungan1` FOREIGN KEY (`kunjungan_idkunjungan`) REFERENCES `kunjungan` (`idkunjungan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kunjungan_has_obat_obat1` FOREIGN KEY (`obat_idobat`) REFERENCES `obat` (`idobat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
