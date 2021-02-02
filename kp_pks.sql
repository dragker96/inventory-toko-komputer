-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Bulan Mei 2020 pada 19.42
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kp_pks`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_unit_masuk`
--

CREATE TABLE `dt_unit_masuk` (
  `kd_masuk` char(5) NOT NULL,
  `harga_beli` int(10) NOT NULL,
  `tgl_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dt_unit_masuk`
--

INSERT INTO `dt_unit_masuk` (`kd_masuk`, `harga_beli`, `tgl_masuk`) VALUES
('K_001', 1234000, '2019-01-13'),
('K_002', 99000, '2020-02-02'),
('K_003', 2000, '2020-02-02'),
('K_004', 1000000, '2020-02-02'),
('K_005', 559000, '2020-02-04'),
('K_006', 12600000, '2020-05-01'),
('K_007', 1000000, '2020-02-02'),
('K_008', 1000000, '2020-02-02'),
('K_009', 11709000, '2020-04-21'),
('K_010', 2500000, '2020-02-06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `kelas` char(5) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`kelas`, `password`) VALUES
('admin', 'admin'),
('admin', 'cek'),
('owner', 'owner'),
('cek', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit`
--

CREATE TABLE `unit` (
  `id_unit` varchar(10) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `kondisi` varchar(10) NOT NULL,
  `nm_unit` varchar(50) NOT NULL,
  `harga` int(10) NOT NULL,
  `informasi` varchar(200) NOT NULL,
  `stok` varchar(10) NOT NULL,
  `kd_masuk` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `unit`
--

INSERT INTO `unit` (`id_unit`, `kategori`, `kondisi`, `nm_unit`, `harga`, `informasi`, `stok`, `kd_masuk`) VALUES
('LL', 'laptop', 'mulus', 'asus', 140000, 'popopopopopolololokokokaoaoaoaooa\r\nff\r\nfe\r\nfe\r\n\r\nfeea\r\nlal\r\nmama mau makan buka', 'habis', 'K_007'),
('qw', 'laptop', 'mulus', 'toshiba', 140000, 'laptop baru\r\nraso seken', 'ada', 'K_003'),
('qw2', 'laptop', 'rusak', 'toshiba', 142000, 'd', 'ada', 'K_002'),
('qw3', 'laptop', 'sedang', 'acer ROG 2-110', 23000000, 'kece badai', 'ada', 'K_004'),
('qw4', 'laptop', 'mulus', 'asus ROG wkwkwk', 12350000, 'jnjnm', 'ada', 'K_001'),
('qw5', 'mouse', 'rusak', 'samsung  ', 15000, 'bre der', 'ada', 'K_005'),
('qw6', 'laptop', 'mulus', 'acer aspire ES-14', 2200000, 'gigabit LAN\r\nram 2 gb', 'ada', 'K_006'),
('qw7', 'laptop', 'mulus', 'acer espire -205', 4200900, 'gahar abis', 'ada', 'K_008');

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit_keluar`
--

CREATE TABLE `unit_keluar` (
  `no_nota` varchar(10) NOT NULL,
  `nm_u` varchar(50) NOT NULL,
  `nm_p` varchar(30) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `alamat_p` varchar(50) NOT NULL,
  `hp_p` text NOT NULL,
  `id_unit` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dt_unit_masuk`
--
ALTER TABLE `dt_unit_masuk`
  ADD PRIMARY KEY (`kd_masuk`);

--
-- Indeks untuk tabel `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id_unit`),
  ADD UNIQUE KEY `kode_masuk` (`kd_masuk`);

--
-- Indeks untuk tabel `unit_keluar`
--
ALTER TABLE `unit_keluar`
  ADD PRIMARY KEY (`no_nota`),
  ADD KEY `id_unit` (`id_unit`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `unit`
--
ALTER TABLE `unit`
  ADD CONSTRAINT `unit_ibfk_1` FOREIGN KEY (`kd_masuk`) REFERENCES `dt_unit_masuk` (`kd_masuk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
