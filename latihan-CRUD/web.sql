-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Apr 2019 pada 04.53
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jurusan_id` int(10) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `kelas` varchar(20) DEFAULT NULL,
  `alamat` text,
  `no_hp` varchar(15) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `moto` text,
  `foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama`, `jurusan_id`, `tanggal`, `kelas`, `alamat`, `no_hp`, `email`, `moto`, `foto`) VALUES
(19, 'Rianti Kinasih', 1, '2019-02-23', 'Reguler', 'adksadlk', '13465', 'sfds', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio repudiandae incidunt id, laudantium voluptatum voluptates deserunt nam cumque dolorem in iste officia illo praesentium, quibusdam sunt quidem fugit, eum laborum.', 'img/photo_2018-12-07_00-40-17.jpg'),
(20, 'Tulasi', 1, '2019-02-19', 'Non Reguler', 'afcdsafA', '32354', 'zvds', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio repudiandae incidunt id, laudantium voluptatum voluptates deserunt nam cumque dolorem in iste officia illo praesentium, quibusdam sunt quidem fugit, eum laborum.', 'img/photo_2018-12-07_00-40-42.jpg'),
(21, 'Uswah watun', 1, '2019-02-05', 'Non Reguler', 'adlkjps', '23', 'asadsasdk@d', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio repudiandae incidunt id, laudantium voluptatum voluptates deserunt nam cumque dolorem in iste officia illo praesentium, quibusdam sunt quidem fugit, eum laborum.', 'img/photo_2018-12-07_00-40-47.jpg'),
(22, 'Sanusi', 1, '2019-02-07', 'Non Reguler', 'asdadsdcsdcds', '8273700', 'axsa', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio repudiandae incidunt id, laudantium voluptatum voluptates deserunt nam cumque dolorem in iste officia illo praesentium, quibusdam sunt quidem fugit, eum laborum.', 'img/photo_2018-12-07_00-40-35.jpg'),
(26, 'ads', 2, '2019-02-05', 'Non Reguler', 'asda', '131', 'adsa', 'adsa', 'img/SOFA.png'),
(31, 'sasmitoh rahmad riady', 1, '2019-03-20', 'Non Reguler', 'cikarang\r\ncikarang', '2147483647', 'sasmitohrr@gmail.com', 'adsa', 'img/sas.png'),
(36, 'qw', 2, '2019-03-04', 'Reguler', 'sadsa', '2147483647', 'asdsad@gmail.com', 'acdsa', 'img/bn.png'),
(37, 'wqd', 1, '2019-03-04', 'Reguler', 'adsa', '2147483647', 'asdsad@gmail.com', 'asdsa', 'img/alan_turing.png'),
(38, 'sasmitoh rahmad riady', 1, '0000-00-00', 'Reguler', 'cikarang\r\ncikarang', '081282463431', 'sasmitohrr@gmail.com', 'ds', 'img/winda.png'),
(39, 'test', 1, '2019-03-09', 'Reguler', 'cikarang\r\ncikarang', '081282463431', 'sasmitohrr@gmail.com', 'adaw', 'img/winda.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(10) NOT NULL,
  `jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `jurusan`) VALUES
(1, 'Teknik Informatik   123'),
(2, 'Teknik Lingkungan'),
(3, 'Teknik Arsitektur'),
(28, 'SAx asa sdsa'),
(29, 'EWUFTUEWTU 565');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `is_admin`) VALUES
(1, 'sasmitoh', '$2y$10$vUhlzCNKJBfCECXtnDZFx.tefFBkoksl5fbiUGz3m1aIWSNG8w182', 'sasmitohrr@gmail.com', 0),
(2, 'admin', '$2y$10$G1J.LrA6OU7nV9AhNRpSZORd7qsZW4GyqDatE/9ksmiHiS353zYMK', 'sasmitoh@gmail.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `jurusan_id` (`jurusan_id`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `anggota_ibfk_1` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id_jurusan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
