-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jun 2024 pada 14.32
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `haloPetani`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenisartikel`
--

CREATE TABLE `jenisartikel` (
  `id_jenisartikel` int(11) NOT NULL,
  `nama_jenisartikel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jenisartikel`
--

INSERT INTO `jenisartikel` (`id_jenisartikel`, `nama_jenisartikel`) VALUES
(1, 'Teknologi'),
(2, 'Hortikultura'),
(3, 'Media Tanam'),
(4, 'Hama');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jenisartikel`
--
ALTER TABLE `jenisartikel`
  ADD PRIMARY KEY (`id_jenisartikel`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jenisartikel`
--
ALTER TABLE `jenisartikel`
  MODIFY `id_jenisartikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
