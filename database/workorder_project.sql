-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Mar 2025 pada 09.02
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `workorder_project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Malas Ngoding', 'malasngoding', 'malasngoding123', 'admin'),
(2, 'Diki Alfarabi Hadi', 'diki', 'diki123', 'pegawai'),
(3, 'Jamaludin', 'jamaludin', 'jamaludin123', 'pengurus'),
(4, 'marcelo biels', 'marcelo', 'd5842dbd31592ac59c914c89f78d0ef1', 'manager'),
(5, 'arya', 'arya', '87129ae9fda7ed40a257052e4e3b9a96', 'operator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `workorder`
--

CREATE TABLE `workorder` (
  `id_workorder` varchar(20) NOT NULL,
  `nproduk` varchar(100) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('Pending','In Progress','Completed','Canceled') NOT NULL,
  `jwaktu` varchar(20) NOT NULL,
  `keterangan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `workorder`
--

INSERT INTO `workorder` (`id_workorder`, `nproduk`, `jumlah`, `tanggal`, `status`, `jwaktu`, `keterangan`) VALUES
('WO-20250302-0013', 'Pipa Baja', 1, '2025-03-03', 'In Progress', '1 hari', 'Proses Pemotongan'),
('WO-20250302-0014', 'Karton', 8, '2025-03-03', 'Pending', '2 hari', 'Pemotongan'),
('WO-20250302-0015', 'Kursi', 14, '2025-03-02', 'Pending', '', ''),
('WO-20250302-0016', 'Meja', 1, '2025-03-02', 'Pending', '', ''),
('WO-20250302-0017', 'Baja Ringan', 8, '2025-03-01', 'In Progress', '', ''),
('WO-20250303-0001', 'Gunting', 5, '2025-03-04', 'Completed', '', ''),
('WO-20250303-0002', 'kipas', 1, '2025-03-04', 'Completed', '2 hari', 'Selesai'),
('WO-20250303-0003', 'Gunting', 4, '2025-03-05', 'Completed', '', ''),
('WO-20250303-0004', 'kipas', 2, '2025-03-03', 'Canceled', '', ''),
('WO-20250303-0005', 'Pipa Baja', 2, '2025-03-03', 'In Progress', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `workorder`
--
ALTER TABLE `workorder`
  ADD PRIMARY KEY (`id_workorder`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
