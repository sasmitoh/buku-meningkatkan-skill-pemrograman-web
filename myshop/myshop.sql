-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Apr 2019 pada 04.54
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
-- Database: `myshop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_category` int(15) NOT NULL,
  `nama_category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_category`, `nama_category`) VALUES
(1, 'Pakaian Wanita'),
(2, 'Pakaian Pria'),
(3, 'Laptop'),
(4, 'Hand Phone');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` varchar(20) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_jual` double NOT NULL,
  `jumlah_bayar` double NOT NULL,
  `nama_pemesan` varchar(50) NOT NULL,
  `alamat_pemesanan` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `status_bayar` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_produk`, `jumlah`, `harga_jual`, `jumlah_bayar`, `nama_pemesan`, `alamat_pemesanan`, `no_hp`, `status_bayar`) VALUES
('20190404063659', 12, 1, 9000000, 9000000, 'Sasmitoh RR', 'Kp. Cijambe Rt.04/02, Desa Sukadami, Kec. Cikarang Selatan', '01282463431', 1),
('20190404065159', 13, 1, 5000000, 5000000, 'Khalis Sofi', 'PT Mulia Boga Raya\r\nPT Mulia Boga Raya Jalan Inti II Blok C7 No 5A Kawasan Hyundai BIIE Cikarang Selatan Bekasi 17550', '01282463431', 0),
('20190404083533', 13, 1, 5000000, 5000000, 'Sasmitoh RR', 'Kp. Cijambe Rt.04/02, Desa Sukadami, Kec. Cikarang Selatan', '01282463431', 0),
('20190404083724', 13, 1, 5000000, 5000000, 'Sasmitoh RR', 'Kp. Cijambe Rt.04/02, Desa Sukadami, Kec. Cikarang Selatan', '01282463431', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga_jual` double NOT NULL,
  `gambar_produk` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `category_id`, `nama_produk`, `deskripsi`, `harga_jual`, `gambar_produk`) VALUES
(11, 2, 'Kemeja Keren', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia dolor, natus suscipit quos, consectetur eum cumque aliquid alias fuga molestias dolorum delectus iusto dignissimos ipsam a aspernatur officiis, voluptate tenetur?', 5000000, 'image/produk/20190404104701.jpg'),
(12, 1, 'jas wanita', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia dolor, natus suscipit quos, consectetur eum cumque aliquid alias fuga molestias dolorum delectus iusto dignissimos ipsam a aspernatur officiis, voluptate tenetur?', 9000000, 'image/produk/20190404073554.jpg'),
(13, 4, 'HP Samsung ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia dolor, natus suscipit quos,  consectetur eum cumque aliquid alias fuga molestias dolorum delectus iusto dignissimos ipsam a aspernatur officiis, voluptate tenetur?', 5000000, 'image/produk/20190404073414.jpg'),
(14, 3, 'Leptop lenovo t440s', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut nobis quos in. Molestias et rerum, omnis, numquam aspernatur, error quaerat consectetur aut quos itaque dolor eligendi possimus voluptatum impedit tempore.', 5000000, 'image/produk/20190404073939.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_category` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `kategori` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
