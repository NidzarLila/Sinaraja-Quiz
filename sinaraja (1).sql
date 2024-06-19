-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 19 Jun 2024 pada 23.38
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sinaraja`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id` int NOT NULL,
  `materi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id`, `materi`, `gambar`, `updated_at`, `created_at`) VALUES
(15, 'Aksara Jawa juga memiliki sejarah mistis yang menarik. Meskipun belum ada kepastian mengenai penemunya, legenda populer mengaitkan Aji Saka, seorang pemuda asal India, dengan penciptaan aksara Jawa. Cerita ini melibatkan perjalanan panjang Saka dan dua rekannya, Dora dan Sembada, dalam upaya mereka menjadi raja di Nusantara.\r\n\r\nArtikel ini telah tayang di Bisnis.com dengan judul \"Aksara Jawa Lengkap, Pasangan, Tanda Baca dan Contoh Kalimat\", Klik selengkapnya di sini: https://kabar24.bisnis.com/read/20231114/243/1713766/aksara-jawa-lengkap-pasangan-tanda-baca-dan-contoh-kalimat.\r\nPenulis : Rendi Mahendra - Bisnis.com\r\n\r\n\r\nDownload aplikasi Bisnis.com terbaru untuk akses lebih cepat dan nyaman di sini:\r\nAndroid: http://bit.ly/AppsBisniscomPS\r\niOS: http://bit.ly/AppsBisniscomIOS', 'images/OpMtROtqMM1ExkELavRqdI3SNwnaCU02i1kgH3nZ.jpg', '2024-06-19 18:01:22', '2024-06-19 18:01:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

CREATE TABLE `soal` (
  `id` int NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `pertanyaan` text NOT NULL,
  `pilihan` text NOT NULL,
  `jawaban` text NOT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `soal`
--

INSERT INTO `soal` (`id`, `gambar`, `pertanyaan`, `pilihan`, `jawaban`, `updated_at`, `created_at`) VALUES
(1, NULL, 'apa diatas', '[\"Gambar\",\"Bunga\",\"Sapi\"]', 'A', '2024-06-19 19:51:46', '2024-06-19 19:51:46');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `soal`
--
ALTER TABLE `soal`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
