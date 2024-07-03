-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2024 at 09:18 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sportcenter`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_212279`
--

CREATE TABLE `admin_212279` (
  `212279_id_user` int(11) NOT NULL,
  `212279_username` varchar(20) NOT NULL,
  `212279_password` varchar(20) NOT NULL,
  `212279_nama` varchar(50) NOT NULL,
  `212279_no_handphone` varchar(15) NOT NULL,
  `212279_email` varchar(50) NOT NULL,
  `212279_foto` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_212279`
--

INSERT INTO `admin_212279` (`212279_id_user`, `212279_username`, `212279_password`, `212279_nama`, `212279_no_handphone`, `212279_email`, `212279_foto`) VALUES
(2, 'khawarismi', '123456', 'Yusti Adhami', '0123', 'yustikhawarismi@gmail.com', 'admin.jpg'),
(3, 'diana', '1234', 'hardiana', '082352336322', 'hardiana@gmail.com', ''),
(8, 'april ', '1234', 'april azizah', '089898986767', 'april@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `bayar_212279`
--

CREATE TABLE `bayar_212279` (
  `212279_id_bayar` int(11) NOT NULL,
  `212279_id_sewa` int(11) NOT NULL,
  `212279_bukti` text NOT NULL,
  `212279_tanggal_upload` timestamp NOT NULL DEFAULT current_timestamp(),
  `212279_konfirmasi` varchar(50) NOT NULL DEFAULT 'Belum'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bayar_212279`
--

INSERT INTO `bayar_212279` (`212279_id_bayar`, `212279_id_sewa`, `212279_bukti`, `212279_tanggal_upload`, `212279_konfirmasi`) VALUES
(58, 131, '665d42e573056.jpg', '2024-06-03 00:00:00', 'Terkonfirmasi'),
(59, 134, '665d4e7a325dd.jpg', '2024-06-03 00:00:00', 'Terkonfirmasi'),
(60, 138, '666a4d347d699.jpg', '2024-06-13 00:00:00', 'Terkonfirmasi'),
(61, 139, '666afce90fc3e.jpg', '2024-06-13 00:00:00', 'Sudah Bayar'),
(62, 142, '666afdf8dc10d.jpg', '2024-06-13 00:00:00', 'Sudah Bayar'),
(63, 154, '666d4b72d092b.jpeg', '2024-06-15 00:00:00', 'Terkonfirmasi'),
(64, 150, '666d61e55fde7.jpg', '2024-06-15 00:00:00', 'Terkonfirmasi'),
(65, 158, '666db75182f33.png', '2024-06-15 15:46:25', 'Terkonfirmasi'),
(66, 159, '666f211e36380.png', '2024-06-16 17:30:06', 'Terkonfirmasi'),
(67, 161, '66712acb728a9.jpg', '2024-06-18 06:35:55', 'Terkonfirmasi'),
(68, 163, '6671420582eab.jpg', '2024-06-18 08:15:01', 'Terkonfirmasi'),
(69, 177, '6677375f82c5a.jpg', '2024-06-22 20:43:11', 'Terkonfirmasi'),
(70, 176, '667737bf4fbe1.jpg', '2024-06-22 20:44:47', 'Terkonfirmasi'),
(71, 178, '667917c2e906d.png', '2024-06-24 06:52:50', 'Terkonfirmasi'),
(72, 179, '667917de4ccec.png', '2024-06-24 06:53:18', 'Terkonfirmasi'),
(73, 180, '66794721c8689.png', '2024-06-24 10:14:57', 'Sudah Bayar'),
(74, 181, '66794bad98549.png', '2024-06-24 10:34:21', 'Terkonfirmasi');

-- --------------------------------------------------------

--
-- Table structure for table `booking_212279`
--

CREATE TABLE `booking_212279` (
  `id_booking` int(11) NOT NULL,
  `id_lapangan` int(11) NOT NULL,
  `tgl_main` date NOT NULL,
  `jam_mulai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lapangan_212279`
--

CREATE TABLE `lapangan_212279` (
  `212279_id_lapangan` int(11) NOT NULL,
  `212279_nama` varchar(35) NOT NULL,
  `212279_harga` int(11) NOT NULL,
  `212279_foto` text NOT NULL,
  `212279_keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `lapangan_212279`
--

INSERT INTO `lapangan_212279` (`212279_id_lapangan`, `212279_nama`, `212279_harga`, `212279_foto`, `212279_keterangan`) VALUES
(32, 'Lapangan Silver', 80000, 'semen1.jpeg', 'Rp. 80.000 /Jam\r\n\r\n\r\n\r\n\r\n'),
(38, 'Lapangan Gold', 95000, 'karpet2.jpg', 'Rp. 95.000 /Jam');

-- --------------------------------------------------------

--
-- Table structure for table `sewa_212279`
--

CREATE TABLE `sewa_212279` (
  `212279_id_sewa` int(11) NOT NULL,
  `212279_id_user` int(11) NOT NULL,
  `212279_id_lapangan` int(11) NOT NULL,
  `212279_tanggal_pesan` timestamp NOT NULL DEFAULT current_timestamp(),
  `212279_lama_sewa` int(50) NOT NULL,
  `212279_jam_mulai` datetime NOT NULL,
  `212279_jam_habis` datetime NOT NULL,
  `212279_harga` int(11) NOT NULL,
  `212279_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sewa_212279`
--

INSERT INTO `sewa_212279` (`212279_id_sewa`, `212279_id_user`, `212279_id_lapangan`, `212279_tanggal_pesan`, `212279_lama_sewa`, `212279_jam_mulai`, `212279_jam_habis`, `212279_harga`, `212279_total`) VALUES
(150, 100, 32, '2024-06-14 00:00:00', 1, '2024-06-21 09:00:00', '2024-06-21 10:00:00', 80000, 80000),
(151, 102, 32, '2024-06-13 00:00:00', 0, '2024-06-16 17:00:00', '2024-06-16 18:00:00', 80000, 80000),
(152, 100, 32, '2024-06-14 00:00:00', 9, '2024-06-21 00:00:00', '2024-06-21 09:00:00', 80000, 720000),
(153, 100, 32, '2024-06-14 00:00:00', 10, '2024-06-14 09:00:00', '2024-06-14 19:00:00', 80000, 800000),
(154, 104, 32, '2024-06-15 00:00:00', 22, '2024-06-16 16:05:00', '2024-06-17 14:05:00', 80000, 1760000),
(158, 2, 32, '2024-06-15 14:49:36', 1, '2024-06-21 21:36:00', '2024-06-21 22:36:00', 80000, 80000),
(159, 104, 32, '2024-06-16 17:27:51', 1, '2024-06-18 10:00:00', '2024-06-18 11:00:00', 80000, 80000),
(160, 2, 32, '2024-06-16 17:49:15', 2, '2024-06-18 14:00:00', '2024-06-18 16:00:00', 80000, 160000),
(161, 2, 32, '2024-06-16 17:54:51', 3, '2024-06-19 14:00:00', '2024-06-19 17:00:00', 80000, 240000),
(162, 2, 32, '2024-06-16 19:23:41', 1, '2024-06-20 15:00:00', '2024-06-20 16:00:00', 80000, 80000),
(163, 104, 32, '2024-06-18 06:44:06', 1, '2024-06-19 20:00:00', '2024-06-19 21:00:00', 80000, 80000),
(176, 104, 38, '2024-06-22 20:05:41', 1, '2024-06-23 04:05:00', '2024-06-23 05:05:00', 95000, 95000),
(177, 104, 38, '2024-06-22 20:42:03', 3, '2024-06-23 10:00:00', '2024-06-23 13:00:00', 95000, 285000),
(178, 105, 32, '2024-06-24 06:51:49', 1, '2024-06-24 15:51:00', '2024-06-24 16:51:00', 80000, 80000),
(179, 105, 38, '2024-06-24 06:52:24', 3, '2024-06-24 20:52:00', '2024-06-24 23:52:00', 95000, 285000),
(181, 105, 32, '2024-06-24 10:33:58', 2, '2024-06-29 09:00:00', '2024-06-29 11:00:00', 80000, 160000),
(182, 105, 38, '2024-06-24 10:39:56', 1, '2024-06-30 10:00:00', '2024-06-30 11:00:00', 95000, 95000);

-- --------------------------------------------------------

--
-- Table structure for table `user_212279`
--

CREATE TABLE `user_212279` (
  `212279_id_user` int(11) NOT NULL,
  `212279_nama_lengkap` int(11) NOT NULL,
  `212279_email` varchar(50) NOT NULL,
  `212279_password` varchar(32) NOT NULL,
  `212279_no_handphone` varchar(20) NOT NULL,
  `212279_jenis_kelamin` varchar(10) NOT NULL,
  `212279_username` varchar(60) NOT NULL,
  `212279_alamat` text NOT NULL,
  `212279_foto` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_212279`
--

INSERT INTO `user_212279` (`212279_id_user`, `212279_nama_lengkap`, `212279_email`, `212279_password`, `212279_no_handphone`, `212279_jenis_kelamin`, `212279_username`, `212279_alamat`, `212279_foto`) VALUES
(1, 0, 'yustiadhami@gmail.com', 'm212279', '081256701042', 'Perempuan', 'Yusti Adhami Khawarismi', 'Bontang', '645229918b946.jpg'),
(2, 0, 'ismijuraije@gmail.com', '252525', '088888', '', 'ismi', 'Bontang', ''),
(100, 0, 'astina@gmail.com', '212121', '08123456789', 'Perempuan', 'astina', 'tj laut', '66698fb982d8e.jpg'),
(101, 0, 'adhami@gmail.com', '252525', '081234433455', 'Perempuan', 'adhami', 'salebba', '6669901748378.jpeg'),
(102, 0, 'mahencegil@gmail.com', '210416', '0812343434', 'Perempuan', 'aprillia', 'loktuan', '666990dd20b86.jpeg'),
(103, 0, 'hardianaa@gmail.com', '123456', '323443355', 'Perempuan', 'hardiana', 'tj laut', '66699143986ab.jpg'),
(104, 0, 'farid@gmail.com', '1234', '089808981212', 'Laki-laki', 'farid reyhan', 'jln kenanga', '66714394d0e4c.png'),
(105, 0, 'ariana@gmail.com', '1234', '082188871600', 'Perempuan', 'ariana', 'jln paris', '66712ba6367ef.jpg'),
(106, 0, 'hardianaverlita12@gmail.com', 'gentaganteng12', '82352336322', 'Perempuan', 'Hardiana ', 'jln asmara', '66775033da02a.png'),
(107, 0, 'masade@gmail.com', '1234', '08228989123', 'Laki-Laki', 'ade', 'jln kpk', '66794656bcb3b.png'),
(108, 0, 'selviana@gmail.com', '1234', '823520000999', 'Perempuan', 'selviana', 'jln tiktok', '6682b115bf81e.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_212279`
--
ALTER TABLE `admin_212279`
  ADD PRIMARY KEY (`212279_id_user`);

--
-- Indexes for table `bayar_212279`
--
ALTER TABLE `bayar_212279`
  ADD PRIMARY KEY (`212279_id_bayar`);

--
-- Indexes for table `booking_212279`
--
ALTER TABLE `booking_212279`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indexes for table `lapangan_212279`
--
ALTER TABLE `lapangan_212279`
  ADD PRIMARY KEY (`212279_id_lapangan`);

--
-- Indexes for table `sewa_212279`
--
ALTER TABLE `sewa_212279`
  ADD PRIMARY KEY (`212279_id_sewa`);

--
-- Indexes for table `user_212279`
--
ALTER TABLE `user_212279`
  ADD PRIMARY KEY (`212279_id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_212279`
--
ALTER TABLE `admin_212279`
  MODIFY `212279_id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bayar_212279`
--
ALTER TABLE `bayar_212279`
  MODIFY `212279_id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `booking_212279`
--
ALTER TABLE `booking_212279`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lapangan_212279`
--
ALTER TABLE `lapangan_212279`
  MODIFY `212279_id_lapangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `sewa_212279`
--
ALTER TABLE `sewa_212279`
  MODIFY `212279_id_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `user_212279`
--
ALTER TABLE `user_212279`
  MODIFY `212279_id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
