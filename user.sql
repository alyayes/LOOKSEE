-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Bulan Mei 2025 pada 14.11
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
-- Database: `looksee`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','konsumen') NOT NULL DEFAULT 'konsumen'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`, `role`) VALUES
(5, 'admin', 'inaya@gmail.com', '$2y$10$TDCTQmHlnj3SHXaF77XRFuVzMxdDZQdKE7/NDEgd4S5aQO8WWWLMS', 'admin'),
(6, 'whoocyl', 'cecyl@gmail.com', '$2y$10$3lP/ABN9rngPyQnAiAQVieRA69H9AhucFr5oubf5plVypIRP2tELS', 'konsumen'),
(7, 'Luthfi', 'luthfinuradli@gmail.com', '$2y$10$FTyZ9ZNZ39ckllb4npGKRuvy2n0AjfVUl01ndYnzW2xyYMGldpmBm', 'konsumen'),
(8, 'alya', 'alya@gmail.com', '$2y$10$w8Gs/anTHaNO81somSyZYO3H/Qa.GGTtm/tnBiYCvwnR1Sz9TpOSa', 'konsumen'),
(9, 'dalfa', 'dalf@gmail.com', '$2y$10$nfvr.NpSojAc2hcoxdUIxOk2wRnRIt2avlTcmEuWFnPqYm.9puVAO', 'konsumen'),
(10, 'saniy', 'saniy@gmail.com', '$2y$10$98ieskstSlcO1EQMm2cxK.9Nbh0nCWhjhUAqfNBMFXXA/pUQvm4si', 'konsumen');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
