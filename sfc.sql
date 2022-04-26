-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Apr 2022 pada 14.51
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sfc`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `idcart` int(11) NOT NULL,
  `orderid` varchar(256) NOT NULL,
  `userid` int(11) NOT NULL,
  `tglorder` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(256) NOT NULL DEFAULT 'Menunggu Konfirmasi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`idcart`, `orderid`, `userid`, `tglorder`, `status`) VALUES
(5, '16fyjmlt8PRvw', 2, '2022-04-04 19:03:36', 'Selesai'),
(6, '16nRd/D.Fm73.', 2, '2022-04-05 07:24:47', 'Selesai'),
(7, '16.pQgmwk/FD.', 2, '2022-04-05 07:54:02', 'Confirmed'),
(8, '16V4QlBkNtN4E', 2, '2022-04-05 07:59:48', 'Confirmed'),
(9, '16pzI.xa5ss1g', 2, '2022-04-05 09:30:35', 'Confirmed'),
(10, '16NzQJ9XObt4c', 2, '2022-04-05 17:18:38', 'Confirmed'),
(11, '16X2rJY.gMP4I', 2, '2022-04-05 17:40:10', 'Confirmed'),
(12, '16YgUP8gyG1MU', 4, '2022-04-06 03:27:32', 'Payment'),
(13, '16KEdHsa2shFE', 2, '2022-04-26 12:39:47', 'Confirmed');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailorder`
--

CREATE TABLE `detailorder` (
  `detailid` int(11) NOT NULL,
  `orderid` varchar(100) NOT NULL,
  `idlayanan` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detailorder`
--

INSERT INTO `detailorder` (`detailid`, `orderid`, `idlayanan`, `qty`) VALUES
(6, '16fyjmlt8PRvw', 2, 1),
(7, '16nRd/D.Fm73.', 2, 1),
(8, '16.pQgmwk/FD.', 3, 1),
(9, '16V4QlBkNtN4E', 8, 1),
(10, '16pzI.xa5ss1g', 11, 1),
(11, '16NzQJ9XObt4c', 10, 1),
(12, '16X2rJY.gMP4I', 2, 1),
(13, '16YgUP8gyG1MU', 3, 1),
(14, '16KEdHsa2shFE', 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `idevent` int(11) NOT NULL,
  `namaevent` varchar(3000) NOT NULL,
  `gambar` varchar(256) NOT NULL,
  `held` varchar(3000) NOT NULL,
  `url` varchar(3000) NOT NULL,
  `tgldibuat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`idevent`, `namaevent`, `gambar`, `held`, `url`, `tgldibuat`) VALUES
(2, 'Virtual Expo Dinas Kehutanan Provinsi Sumatera Utara', 'event/16qZw8KP.QMek.png', 'Ir. Herianto, M.Si', 'https://sfc-expo.000webhostapp.com/sfc-expo/', '2022-04-06 10:17:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `idkategori` int(11) NOT NULL,
  `namakategori` varchar(256) NOT NULL,
  `tgldibuat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`idkategori`, `namakategori`, `tgldibuat`) VALUES
(1, 'Virtual Expo', '2022-04-01 03:09:03'),
(3, 'Webinar', '2022-04-01 03:09:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `idkonfirmasi` int(11) NOT NULL,
  `orderid` varchar(256) NOT NULL,
  `userid` int(11) NOT NULL,
  `payment` varchar(25) NOT NULL,
  `namarek` varchar(256) NOT NULL,
  `tglbayar` text NOT NULL,
  `tglsubmit` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `konfirmasi`
--

INSERT INTO `konfirmasi` (`idkonfirmasi`, `orderid`, `userid`, `payment`, `namarek`, `tglbayar`, `tglsubmit`) VALUES
(1, '16fyjmlt8PRvw', 2, 'Bank Mandiri', 'Andreas Pratama', '2022-04-05 12:45:19', '2022-04-05 05:45:21'),
(2, '16nRd/D.Fm73.', 2, 'Bank Mandiri', 'Andreas Pratama', '2022-04-05 14:26:26', '2022-04-05 07:26:46'),
(3, '16.pQgmwk/FD.', 2, 'Bank Mandiri', 'Andreas Pratama', '2022-04-05 14:57:27', '2022-04-05 07:57:29'),
(4, '16V4QlBkNtN4E', 2, 'Bank Mandiri', 'Andreas Pratama', '2022-04-05 15:00:04', '2022-04-05 08:00:07'),
(5, '16pzI.xa5ss1g', 2, 'Bank Mandiri', 'Andreas Pratama', '2022-04-05 16:31:37', '2022-04-05 09:31:46'),
(6, '16NzQJ9XObt4c', 2, 'Bank BCA', 'Andreas Pratama', '2022-04-06 00:19:59', '2022-04-05 17:20:11'),
(7, '16X2rJY.gMP4I', 2, 'Bank Mandiri', 'Andreas Pratama', '2022-04-06 00:41:18', '2022-04-05 17:41:44'),
(8, '16KEdHsa2shFE', 2, 'Bank Mandiri', 'Andreas Pratama', '2022-04-26 19:40:07', '2022-04-26 12:40:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `idlayanan` int(11) NOT NULL,
  `idkategori` int(11) NOT NULL,
  `namalayanan` varchar(256) NOT NULL,
  `gambar` varchar(256) NOT NULL,
  `deskripsi` varchar(3000) NOT NULL,
  `hargabefore` int(11) NOT NULL,
  `hargaafter` int(11) NOT NULL,
  `tgldibuat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`idlayanan`, `idkategori`, `namalayanan`, `gambar`, `deskripsi`, `hargabefore`, `hargaafter`, `tgldibuat`) VALUES
(2, 3, 'SFC Webinar Basic Package', 'layanan/16y0CWv1NZfQ1.png', '(1) Consultation - Basic (3 Times); (2) Concept - Basic; (3) Link URL Website; (4) Webinar Engine; (5) Event Calendar; (6) Profile Slider; (7) Sli.do; (8) EO Webinar 1 Day; (9) Report Analytics Trend', 68952000, 45968000, '2022-04-03 16:48:55'),
(3, 3, 'SFC Webinar Premium Package', 'layanan/16y0CWv1NZfQ2.png', '(1) Consultation - Medium (3 Times); (2) Concept - Medium; (3) Link URL Website; (4) Webinar Engine; (5) Event Calendar; (6) Sli.do; (7) Profile Slider; (8) Mini Games; (9) EO Webinar 1 Day; (10) Report Analytics Trend & Overall', 97266000, 64844000, '2022-04-03 16:49:39'),
(8, 3, 'SFC Webinar Platinum Package', 'layanan/16y0CWv1NZfQ3.png', '(1) Consultation - Advance (3 Times); (2) Concept - Advance; (3) Link URL Website; (4) Webinar Engine; (5) Event Calendar; (6) Sli.do; (7) Profile Slider; (8) Mini Games; (9) EO Webinar 1 Day; (10) Report Analytics Trend & Overall; (11) Leaderboard', 144300000, 96200000, '2022-04-03 17:51:46'),
(9, 1, 'SFC Virtual Expo Basic Package', 'layanan/169inYl.LaUN1.png', '(1) Consultation - Basic (3 Times); (2) Concept - Basic; (3) Link URL Website; (4) Webinar Engine; (5) Event Calendar; (6) Profile Slider; (7) Sli.do; (8) 3D Content Design 5 - Basic; (9) Asset Texturing 5 - Basic; (10) Information Pop Up 10; (11) Navigation Button 10; (12) BGM; (13) EO Webinar 1 Day; (14) Report Analytics Trend', 78858000, 52572000, '2022-04-03 17:52:30'),
(10, 1, 'SFC Virtual Expo Premium Package', 'layanan/169inYl.LaUN2.png', '(1) Consultation - Premium (3 Times); (2) Concept - Premium; (3) Link URL Website; (4) Webinar Engine; (5) Event Calendar; (6) Profile Slider; (7) Sli.do; (8) 3D Content Design 5 - Premium; (9) Asset Texturing 5 - Premium; (10) Information Pop Up 10; (11) Navigation Button 10; (12) BGM; (13) EO Webinar 1 Day; (14) Report Analytics Trend & Overall; (15) Mini Games Website; (16) Link Direct to Social Media', 108966000, 72644000, '2022-04-03 17:53:37'),
(11, 1, 'SFC Virtual Expo Platinum Package', 'layanan/169inYl.LaUN3.png', '(1) Consultation - Platinum (3 Times); (2) Concept - Platinum; (3) Link URL Website; (4) Webinar Engine; (5) Event Calendar; (6) Profile Slider; (7) Sli.do; (8) 3D Content Design 5 - Platinum; (9) Asset Texturing 5 - Platinum; (10) Information Pop Up 10; (11) Navigation Button 10; (12) BGM; (13) EO Webinar 1 Day; (14) Report Analytics Trend & Overall; (15) Mini Games Website; (16) Link Direct to Social Media; (17) Omni Communication Channel', 184236000, 122824000, '2022-04-03 17:54:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `userid` int(11) NOT NULL,
  `namalengkap` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `notelp` varchar(15) NOT NULL,
  `institusi` varchar(256) NOT NULL,
  `pekerjaan` varchar(256) NOT NULL,
  `tgljoin` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(7) NOT NULL DEFAULT 'Member',
  `lastlogin` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`userid`, `namalengkap`, `email`, `password`, `notelp`, `institusi`, `pekerjaan`, `tgljoin`, `role`, `lastlogin`) VALUES
(2, 'Andreas Pratama', 'tamaskywalker2@gmail.com', '$2y$10$qWhYB8Wxt6JZEDHqGrg31OSH3uIS2hB5sZKtAFMVBHIc8FrVg.32e', '085260358159', 'Universitas Negeri Medan', 'Mahasiswa', '2022-03-31 16:54:08', 'Member', NULL),
(3, 'Rivaldo Santosa', 'valdo22@gmail.com', '$2y$10$GBCvzrS.KdJkorUFgvjW8.isPIqIcpkCk6RdJJBERd5JhlLxBpk52', '085260358160', 'Universitas Negeri Medan', 'Mahasiswa', '2022-03-31 17:53:18', 'Member', NULL),
(4, 'Muhammad Mustofa Fajrin', 'muhammadmus22@gmail.com', '$2y$10$xIwK.QCKBDPrJp0AWETDyeF3YYddIPri5cgfqOjphACS0Ts9VeNoy', '081270201902', 'Universitas Gadjah Mada', 'Mahasiswa', '2022-04-06 03:08:47', 'Member', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_admin`
--

CREATE TABLE `login_admin` (
  `userid` int(11) NOT NULL,
  `namalengkap` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `notelp` varchar(15) NOT NULL,
  `tgljoin` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(6) NOT NULL DEFAULT 'Admin',
  `lastlogin` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login_admin`
--

INSERT INTO `login_admin` (`userid`, `namalengkap`, `email`, `password`, `notelp`, `tgljoin`, `role`, `lastlogin`) VALUES
(1, 'Aldy Wildani', 'aldy22@gmail.com', '$2y$10$lsjATdvP6djkhBDByY8boO/inK9NJbtbl3e8X7Zx7lsPMBE7xSGY6', '081270201902', '2022-03-31 19:05:52', 'Admin', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `idatm` int(11) NOT NULL,
  `metode` varchar(256) NOT NULL,
  `norek` varchar(25) NOT NULL,
  `logo` text DEFAULT NULL,
  `an` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`idatm`, `metode`, `norek`, `logo`, `an`) VALUES
(1, 'Bank Mandiri', '123456789', 'img/aset/16QGsnBoAYcFg.jpg', 'SFC'),
(2, 'Bank BCA', '123456789', 'img/aset/16UcftBpZTtYo.jpg', 'SFC');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`idcart`),
  ADD KEY `orderid` (`orderid`);

--
-- Indeks untuk tabel `detailorder`
--
ALTER TABLE `detailorder`
  ADD PRIMARY KEY (`detailid`),
  ADD KEY `orderid` (`orderid`),
  ADD KEY `idlayanan` (`idlayanan`);

--
-- Indeks untuk tabel `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`idevent`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indeks untuk tabel `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`idkonfirmasi`),
  ADD KEY `userid` (`userid`);

--
-- Indeks untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`idlayanan`),
  ADD KEY `idkategori` (`idkategori`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`userid`);

--
-- Indeks untuk tabel `login_admin`
--
ALTER TABLE `login_admin`
  ADD PRIMARY KEY (`userid`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`idatm`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `idcart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `detailorder`
--
ALTER TABLE `detailorder`
  MODIFY `detailid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `event`
--
ALTER TABLE `event`
  MODIFY `idevent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `idkonfirmasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `layanan`
--
ALTER TABLE `layanan`
  MODIFY `idlayanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `login_admin`
--
ALTER TABLE `login_admin`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `idatm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
