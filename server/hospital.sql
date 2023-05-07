-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Bulan Mei 2023 pada 22.59
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sex` enum('male','female') NOT NULL,
  `religion` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `nik` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `patient`
--

INSERT INTO `patient` (`id`, `name`, `sex`, `religion`, `phone`, `address`, `nik`) VALUES
(1, 'Budi Santoso', 'male', 'Islam', '08123456789', 'Jl. Jend. Sudirman No. 10, Jakarta', '1234567890123456'),
(2, 'Aisyah Nurul Hidayah', 'female', 'Islam', '08234567890', 'Jl. Gatot Subroto No. 25, Surabaya', '2345678901234567'),
(3, 'Joko Susilo', 'male', 'Muslim', '08345678901', 'Jl. Sisingamangaraja No. 30, Bandung', '3456789012345678'),
(4, 'Rahayu Kusumawati', 'female', 'Buddha', '08456789012', 'Jl. Merdeka No. 40, Yogyakarta', '4567890123456789'),
(5, 'Hadi Sutrisno', 'male', 'Hindu', '08567890123', 'Jl. Pemuda No. 50, Medan', '5678901234567890');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
