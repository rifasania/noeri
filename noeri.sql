-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jan 2025 pada 05.45
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `noeri`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `chef`
--

CREATE TABLE `chef` (
  `id_chef` int(11) NOT NULL,
  `nama_chef` varchar(50) NOT NULL,
  `no_telp_chef` varchar(14) NOT NULL,
  `alamat_chef` varchar(50) NOT NULL,
  `jenis_kelamin_chef` varchar(11) NOT NULL,
  `foto_chef` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `chef`
--

INSERT INTO `chef` (`id_chef`, `nama_chef`, `no_telp_chef`, `alamat_chef`, `jenis_kelamin_chef`, `foto_chef`) VALUES
(1, 'Vindex tengker', '081209876789', 'Medan', 'L', 'vindex1.jpg'),
(2, 'Juna Rorimpandey', '089683551278', 'Jakarta', 'L', 'juna.jpg'),
(3, 'Degan Septoadji', '081299031789', 'Malang', 'L', 'degan.jpg'),
(4, 'Chandra Yudasswara', '088267559082', 'Semarang', 'L', 'chandra.jpg'),
(5, 'Farah Quinn', '085678223990', 'Makasar', 'P', 'farah.jpg'),
(6, 'Rinrin Marinka ', '08210897833', 'Yogyakarta', 'P', 'rinrin.jpg'),
(7, 'Arnold Poernomo', '089876121109', 'Jakarta', 'L', 'arnold.jpg'),
(8, 'Renatta Moeloek', '081278346677', 'Palembang', 'P', 'renata.jpg'),
(9, 'Yuda Bustara ', '081290776288', 'Bandung', 'L', 'yuda.jpg'),
(10, 'William Gozali', '085509121900', 'Bali', 'L ', 'william.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_menu`
--

CREATE TABLE `jenis_menu` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `jenis_menu`
--

INSERT INTO `jenis_menu` (`id_jenis`, `nama_jenis`) VALUES
(1, 'Makanan'),
(2, 'Minuman'),
(3, 'Snack');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(50) DEFAULT NULL,
  `foto_menu` varchar(100) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `deskripsi` varchar(250) DEFAULT NULL,
  `id_chef` int(11) DEFAULT NULL,
  `id_jenis` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `foto_menu`, `harga`, `deskripsi`, `id_chef`, `id_jenis`) VALUES
(1, 'Omelette', 'omelette.jpg', 10000, 'Telur', 1, 1),
(2, 'Boiled eggs', 'eggs.jpg', 15000, 'Telur', 1, 1),
(3, 'Cronflakes Cookies', 'cronflakes.jpg', 30000, 'Cereals', 8, 3),
(4, 'Parride ', 'parride.jpg', 25000, 'Cereals', 8, 3),
(5, 'Ikan Bakar', 'ikan.jpg', 30000, 'Ikan', 3, 1),
(6, 'Mie Aceh', 'mie.jpg', 25000, 'Mie', 2, 1),
(7, 'Rendang ', 'rendang.jpg', 25000, 'Daging', 4, 1),
(8, 'Gulai ikan Patin', 'gulai.jpg', 30000, 'Ikan', 5, 1),
(9, 'Otak Otak', 'otak_otak.jpg', 15000, 'Ikan', 7, 3),
(10, 'Pempek', 'pempek.jpg', 18000, 'Ikan', 9, 1),
(11, 'Gudeg', 'gudeg.jpg', 27000, 'Makanan sehat', 4, 1),
(12, 'Rujak', 'rujak.jpg', 20000, 'Buah-buahan segar', 2, 3),
(13, 'Teh Talua', 'teh_talua.jpg', 15000, 'Teh', 6, 2),
(14, 'Es Milo', 'milo.jpg', 10000, 'Susu', 6, 2),
(15, 'Es Teh ', 'esteh.jpg', 8000, 'Teh', 6, 2),
(16, 'Es Cendol', 'cendol.jpg', 12000, 'Dingin dan segar', 1, 2),
(17, 'Soda Gembira', 'soda.jpg', 15000, 'Soda', 3, 2),
(18, 'Orange', 'orange.jpg', 17000, 'Jeruk', 3, 2),
(19, 'Es Buah', 'esbuah.jpg', 18000, 'Buah', 3, 2),
(20, 'Es Selendang Mayang', 'selendang_mayang.jpg', 20000, 'Segar dan dingin', 3, 2),
(47, 'Nasi goreng', 'nasgor.jpg', 15000, 'Gurih dan lezat', 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `metode_bayar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `metode_bayar`) VALUES
(1, 'Tunai'),
(2, 'Shopeepay'),
(3, 'Gopay'),
(4, 'OVO'),
(5, 'BNI'),
(6, 'BCA'),
(7, 'BRI'),
(8, 'MANDIRI'),
(9, 'BSI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `id_status_pesanan` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `waktu_pesanan` time DEFAULT current_timestamp(),
  `total_harga` int(11) NOT NULL,
  `tanggal_pesanan` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `nama`, `id_status_pesanan`, `id_pembayaran`, `waktu_pesanan`, `total_harga`, `tanggal_pesanan`) VALUES
(8, 'Boy', 3, 1, '08:12:20', 52000, '2023-06-20'),
(11, 'Zalfa', 3, 1, '21:25:28', 27000, '2023-06-20'),
(12, 'Yusdan', 2, 1, '23:27:54', 92000, '2023-06-20'),
(13, 'Alfi', 2, 1, '23:31:07', 93000, '2023-06-20'),
(15, 'Raihan', 1, 6, '00:03:30', 50000, '2023-06-21'),
(16, 'rifa', 1, 1, '15:51:05', 50000, '2025-01-04'),
(17, 'jjj', 1, 1, '16:02:21', 20000, '2025-01-04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan_menu`
--

CREATE TABLE `pesanan_menu` (
  `id_pesanan_menu` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `pesanan_menu`
--

INSERT INTO `pesanan_menu` (`id_pesanan_menu`, `id_pesanan`, `id_menu`, `jumlah`) VALUES
(7, 8, 2, 1),
(8, 8, 11, 1),
(9, 8, 14, 1),
(16, 11, 11, 1),
(17, 12, 6, 1),
(18, 12, 7, 2),
(19, 12, 18, 1),
(20, 13, 10, 1),
(21, 13, 6, 1),
(22, 13, 20, 1),
(23, 13, 9, 2),
(26, 15, 7, 2),
(27, 16, 47, 1),
(28, 16, 14, 1),
(29, 16, 4, 1),
(30, 17, 1, 1),
(31, 17, 14, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_pesanan`
--

CREATE TABLE `status_pesanan` (
  `id_status_pesanan` int(11) NOT NULL,
  `keterangan_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `status_pesanan`
--

INSERT INTO `status_pesanan` (`id_status_pesanan`, `keterangan_status`) VALUES
(1, 'Masuk Antrian Masak'),
(2, 'Sedang Dimasak'),
(3, 'Selesai Dimasak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE `t_user` (
  `id_user` int(11) NOT NULL,
  `usn_user` varchar(50) NOT NULL,
  `pass_user` varchar(50) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `no_telp_user` varchar(15) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`id_user`, `usn_user`, `pass_user`, `email_user`, `nama_user`, `no_telp_user`, `id_role`) VALUES
(1, 'salmaghaida', '123', 'salmaghaida@gmail.com', 'Salma Ghaida', '081236273423', 1),
(2, 'alfifaiz', '123', 'alfifaiz@gmail.com', 'Muhammad Alfi Faiz', '081236273424', 1),
(3, 'imamchalish', '123', 'imamchalish@gmail.com', 'Imam Chalis ', '081236273426', 1),
(4, 'boyadityar', '123', 'boyaditya@gmail.com', 'Boy Aditya', '081236273428', 1),
(5, 'ameliazalfa', '123', 'ameliazalfa@gmail.com', 'Amelia Zalfa', '081236273251', 1),
(6, 'syifaazzahra', '123', 'syifa@gmail.com', 'Syifa Azzahra', '087253642514', 1),
(8, 'sitirija', '123', 'sitirija@gmail.com', 'Siti Rija', '083625431652', 1),
(9, 'raihanaulia', '123', 'raihan@gmail.com', 'Raihan Aulia', '083625417623', 1),
(10, 'defrizal', '123', 'defrizal@gmail.com', 'Defrizal Yahdiyan R.', '087253642764', 1),
(11, 'sitireza', '123', 'sitireza@gmail.com', 'Siti Reza', '087253646734', 1),
(12, 'admin1', '123', 'admin1@gmail.com', 'Nurainun Lubis', '087354231432', 2),
(13, 'admin2', '123', 'admin2@gmail.com', 'Rifa Sania', '086453242534', 2),
(14, 'admin3', '123', 'admin3@gmail.com', 'Galaksi Andromeda', '086345243132', 2),
(15, 'andypark', '123', 'andypark@gmail.com', 'Andy Park', '086354234231', 1),
(16, 'sekalazuardi', '123', 'sekalazuardi@gmail.com', 'Sekala Lazuardi', '086354231232', 1),
(18, 'pshacilll', '12345678', 'sunghoon@gmail.com', 'sunghoon', '082546387716', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `chef`
--
ALTER TABLE `chef`
  ADD PRIMARY KEY (`id_chef`) USING BTREE;

--
-- Indeks untuk tabel `jenis_menu`
--
ALTER TABLE `jenis_menu`
  ADD PRIMARY KEY (`id_jenis`) USING BTREE;

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`) USING BTREE,
  ADD KEY `id_chef` (`id_chef`) USING BTREE,
  ADD KEY `id_jenis` (`id_jenis`) USING BTREE;

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`) USING BTREE,
  ADD KEY `id_pelanggan` (`nama`) USING BTREE,
  ADD KEY `id_status_pesanan` (`id_status_pesanan`) USING BTREE,
  ADD KEY `id_pramusaji` (`id_pembayaran`) USING BTREE;

--
-- Indeks untuk tabel `pesanan_menu`
--
ALTER TABLE `pesanan_menu`
  ADD PRIMARY KEY (`id_pesanan_menu`) USING BTREE,
  ADD KEY `id_pesanan` (`id_pesanan`) USING BTREE,
  ADD KEY `id_menu` (`id_menu`) USING BTREE;

--
-- Indeks untuk tabel `status_pesanan`
--
ALTER TABLE `status_pesanan`
  ADD PRIMARY KEY (`id_status_pesanan`) USING BTREE;

--
-- Indeks untuk tabel `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `chef`
--
ALTER TABLE `chef`
  MODIFY `id_chef` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `jenis_menu`
--
ALTER TABLE `jenis_menu`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `pesanan_menu`
--
ALTER TABLE `pesanan_menu`
  MODIFY `id_pesanan_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `status_pesanan`
--
ALTER TABLE `status_pesanan`
  MODIFY `id_status_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_menu` (`id_jenis`),
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_chef`) REFERENCES `chef` (`id_chef`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `fk_pembayaran_pesanan` FOREIGN KEY (`id_pembayaran`) REFERENCES `pembayaran` (`id_pembayaran`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_status` FOREIGN KEY (`id_status_pesanan`) REFERENCES `status_pesanan` (`id_status_pesanan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pesanan_menu`
--
ALTER TABLE `pesanan_menu`
  ADD CONSTRAINT `pesanan_menu_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pesanan_menu_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
