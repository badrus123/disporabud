-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27 Feb 2019 pada 13.55
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `disporabud_new`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir`
--

CREATE TABLE `kasir` (
  `id_kasir` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kasir`
--

INSERT INTO `kasir` (`id_kasir`, `username`, `nama_lengkap`, `no_hp`, `email`, `alamat`) VALUES
('-', 'kasir_dummy', 'dummy', '123123123', 'kasir@kasir.com', 'bandung'),
('3234242', 'kasir', 'kasir', '324242424', 'kasir@gmail.com', 'Asrama 3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakat`
--

CREATE TABLE `masyarakat` (
  `no_ktp` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `masyarakat`
--

INSERT INTO `masyarakat` (`no_ktp`, `username`, `nama_lengkap`, `no_hp`, `email`, `alamat`) VALUES
(111111, 'ken', 'ken', '555555', 'lala@lala.com', 'pga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_transaksi` int(20) NOT NULL,
  `approval_pengajuan` varchar(20) NOT NULL,
  `status_pembayaran` varchar(20) NOT NULL,
  `bukti_pembayaran` text NOT NULL,
  `id_peminjaman` int(20) NOT NULL,
  `id_kasir` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_transaksi`, `approval_pengajuan`, `status_pembayaran`, `bukti_pembayaran`, `id_peminjaman`, `id_kasir`) VALUES
(3302, 'Belum diapprove', 'Belum dibayar', '-', 8892, '-'),
(7127, 'Belum diapprove', 'Belum dibayar', '-', 9379, '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(20) NOT NULL,
  `nama_acara` varchar(50) NOT NULL,
  `tgl_pelaksanaan` text NOT NULL,
  `tgl_selesai` text NOT NULL,
  `note` text NOT NULL,
  `total_harga` int(50) NOT NULL,
  `no_ktp` int(20) NOT NULL,
  `id_prasarana` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `nama_acara`, `tgl_pelaksanaan`, `tgl_selesai`, `note`, `total_harga`, `no_ktp`, `id_prasarana`) VALUES
(8892, 'mmmmm', '1549494000', '1550098800', 'mmmmm', 5250968, 111111, 'P-004'),
(9379, 'cgr', '1549321200', '1550185200', 'awdwedawd', 7500848, 111111, 'P-005');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna_dinas`
--

CREATE TABLE `pengguna_dinas` (
  `nip` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna_dinas`
--

INSERT INTO `pengguna_dinas` (`nip`, `username`, `nama_lengkap`, `no_hp`, `email`, `alamat`) VALUES
('34343', 'kasi', 'kasi', '20193', 'kasi@kasi.com', 'kladawed'),
('55', 'staff', 'staff', '81818181', 'staff@staff.com', 'staffhome');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prasarana`
--

CREATE TABLE `prasarana` (
  `id_prasarana` varchar(20) NOT NULL,
  `nama_prasarana` varchar(50) NOT NULL,
  `gambar` text NOT NULL,
  `tarif` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prasarana`
--

INSERT INTO `prasarana` (`id_prasarana`, `nama_prasarana`, `gambar`, `tarif`) VALUES
('P-001', 'Stadion Event Biasa', '', 1000000),
('P-002', 'Stadion Event Khusus', '', 5000000),
('P-003', 'Gor Basket', 'assets/img/prasarana/1548921819LRM_EXPORT_179718848268866_20190129_101945659.jpeg', 750000),
('P-004', 'Gor Futsal', 'assets/img/prasarana/1548921993LRM_EXPORT_179882829724837_20190129_102229641.jpeg', 750000),
('P-005', 'Gor Tenis', 'assets/img/prasarana/1548921943LRM_EXPORT_180062153467232_20190129_102529093.jpeg', 750000),
('P-006', 'Gor Laka Tangkas', 'assets/img/prasarana/1548921875LRM_EXPORT_179537821238125_20190129_101644105.jpeg', 750000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_login`
--

CREATE TABLE `user_login` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `akses` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_login`
--

INSERT INTO `user_login` (`username`, `password`, `akses`) VALUES
('admin', 'admin', 'admin'),
('kasi', 'kasi', 'kasek'),
('kasir', 'kasir', 'kasir'),
('kasir_dummy', 'a0293lkjaewd', 'kasir'),
('ken', 'ken', 'masyarakat'),
('staff', 'staff', 'staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`id_kasir`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`no_ktp`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_peminjaman` (`id_peminjaman`),
  ADD KEY `id_kasir` (`id_kasir`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `no_ktp` (`no_ktp`),
  ADD KEY `id_prasarana` (`id_prasarana`);

--
-- Indexes for table `pengguna_dinas`
--
ALTER TABLE `pengguna_dinas`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `prasarana`
--
ALTER TABLE `prasarana`
  ADD PRIMARY KEY (`id_prasarana`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`username`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kasir`
--
ALTER TABLE `kasir`
  ADD CONSTRAINT `kasir_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user_login` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD CONSTRAINT `masyarakat_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user_login` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_kasir`) REFERENCES `kasir` (`id_kasir`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`no_ktp`) REFERENCES `masyarakat` (`no_ktp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_ibfk_3` FOREIGN KEY (`id_prasarana`) REFERENCES `prasarana` (`id_prasarana`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengguna_dinas`
--
ALTER TABLE `pengguna_dinas`
  ADD CONSTRAINT `pengguna_dinas_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user_login` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
