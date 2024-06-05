-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jun 2024 pada 21.31
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
-- Struktur dari tabel `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `idpertanyaan` int(11) NOT NULL,
  `pertanyaan` varchar(200) NOT NULL,
  `fullname` varchar(45) NOT NULL,
  `jawaban` varchar(100) DEFAULT NULL,
  `pertanyaandilaporkan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pertanyaan`
--

INSERT INTO `pertanyaan` (`idpertanyaan`, `pertanyaan`, `fullname`, `jawaban`, `pertanyaandilaporkan`) VALUES
(1, 'ha', 'adzka', 'a', 0),
(2, 'hi', 'd', 'a', 0),
(3, 'a', 'a', NULL, 0),
(4, 'a', 'a', NULL, 0),
(5, 'sd', 'ad', NULL, 0),
(6, 'sd', 'ad', NULL, 0),
(7, 'cuy', 'ap', NULL, 0),
(8, 'cuy', 'ap', NULL, 0),
(9, 'cuy', 'ap', NULL, 0),
(10, 'cuy', 'ap', NULL, 0),
(11, 'cuy', 'ap', NULL, 0),
(12, 'cuy', 'ap', NULL, 0),
(13, 'cuy', 'ap', NULL, 0),
(14, 'cuy', 'ap', NULL, 0),
(15, 'cuy', 'ap', NULL, 0),
(16, 'halo', 'ap', NULL, 0),
(17, 'ini saya bingung kok epep burik ya', 'adzka', NULL, 0),
(18, 'beringin', 'ku', NULL, 0),
(19, 'halo', 'adzka', NULL, 0),
(20, 'ini apa ya', 'aku', NULL, 0),
(21, 'aa', 'aa', NULL, 0),
(22, 'ini siapa sih', 'Rifki', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`idpertanyaan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `idpertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
