-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jun 2021 pada 14.50
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bukawarung`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_telp` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_address` text NOT NULL,
  `tipe_login` enum('customer','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `username`, `password`, `admin_telp`, `admin_email`, `admin_address`, `tipe_login`) VALUES
(1, 'Ryan', 'ryan', '21232f297a57a5a743894a0e4a801fc3', '0812345678910', 'ryan@gmail.com', 'Lumpias Jaga2 Kec.dimembe', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_category`
--

CREATE TABLE `tb_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_category`
--

INSERT INTO `tb_category` (`category_id`, `category_name`) VALUES
(1, 'Makanan Ringan'),
(2, 'Minuman'),
(3, 'Alat Tulis'),
(4, 'Sembako');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_customer`
--

CREATE TABLE `tb_customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `customer_telp` varchar(20) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_address` text NOT NULL,
  `Wish_list` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_customer`
--

INSERT INTO `tb_customer` (`customer_id`, `customer_name`, `username`, `password`, `customer_telp`, `customer_email`, `customer_address`, `Wish_list`) VALUES
(0, 'REYNALDO WAGIU', '', '0', '081280247313', 'aldowagiu@gmail.com', 'JAGA II, RT/RW -/-, Kel/Desa LUMPIAS, Kecamatan DIMEMBE', NULL),
(1, 'andi', 'andi', '123', '1234567891011', 'andi@gmail.com', 'manado', NULL),
(2, 'REYNALDO WAGIU', 'aldo', '123', '081280247313', 'aldowagiu@gmail.com', 'JAGA II, RT/RW -/-, Kel/Desa LUMPIAS, Kecamatan DIMEMBE', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_product`
--

CREATE TABLE `tb_product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_status` tinyint(1) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_product`
--

INSERT INTO `tb_product` (`product_id`, `category_id`, `product_name`, `product_price`, `product_description`, `product_image`, `product_status`, `date_create`) VALUES
(1, 2, 'aqua botol', 3500, '', 'produk1622560721.jpg', 1, '2021-06-01 15:18:41'),
(2, 2, 'club', 3000, '<p>air putih dalam kemasan</p>\r\n', 'produk1622560840.jpg', 1, '2021-06-01 15:20:40'),
(3, 1, 'chitato', 5000, '<p>keripik kentang dalam kemasan</p>\r\n', 'produk1622560930.jpg', 1, '2021-06-01 15:22:10'),
(4, 1, 'Lays', 5000, '<p>keripik kentang dalam kemasan</p>\r\n', 'produk1622560986.jpg', 0, '2021-06-01 15:23:06'),
(5, 3, 'pensil', 1500, '', 'produk1622561054.jpg', 1, '2021-06-01 15:24:14'),
(6, 3, 'Pulpen', 2500, '', 'produk1622561150.jpg', 1, '2021-06-01 15:25:50'),
(7, 3, 'Penghapus pensil', 2000, '', 'produk1622561238.jpg', 0, '2021-06-01 15:27:18'),
(8, 3, 'tipp-ex', 4000, '<p>penghapus pulpen</p>\r\n', 'produk1622561479.jpg', 0, '2021-06-01 15:31:19');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeks untuk tabel `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indeks untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
