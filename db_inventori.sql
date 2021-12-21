-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2021 at 05:05 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventori`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `brg_keluar`
--

CREATE TABLE `brg_keluar` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `jml` int(11) NOT NULL,
  `sumber_dana` varchar(225) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `brg_masuk`
--

CREATE TABLE `brg_masuk` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `jml` int(11) NOT NULL,
  `sumber_dana` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role_id`, `username`, `password`, `nama_lengkap`) VALUES
(1, 1, 'administrator', 'administrator123', 'Guntur'),
(2, 2, 'admin', 'admin123', 'Pamuji');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_brg_keluar`
-- (See below for the actual view)
--
CREATE TABLE `v_brg_keluar` (
`id` int(11)
,`tgl` date
,`nama_barang` varchar(255)
,`jml` int(11)
,`sumber_dana` varchar(225)
,`keterangan` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_brg_masuk`
-- (See below for the actual view)
--
CREATE TABLE `v_brg_masuk` (
`id` int(11)
,`tgl` date
,`nama_barang` varchar(255)
,`jml` int(11)
,`sumber_dana` varchar(255)
,`keterangan` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_total_keluar`
-- (See below for the actual view)
--
CREATE TABLE `v_total_keluar` (
`id_barang` int(11)
,`total` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_total_masuk`
-- (See below for the actual view)
--
CREATE TABLE `v_total_masuk` (
`id_barang` int(11)
,`total` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_total_stok`
-- (See below for the actual view)
--
CREATE TABLE `v_total_stok` (
`id` int(11)
,`nama_barang` varchar(255)
,`total` decimal(33,0)
);

-- --------------------------------------------------------

--
-- Structure for view `v_brg_keluar`
--
DROP TABLE IF EXISTS `v_brg_keluar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_brg_keluar`  AS  select `masuk`.`id` AS `id`,`masuk`.`tgl` AS `tgl`,`barang`.`nama_barang` AS `nama_barang`,`masuk`.`jml` AS `jml`,`masuk`.`sumber_dana` AS `sumber_dana`,`masuk`.`keterangan` AS `keterangan` from (`barang` join `brg_keluar` `masuk` on(`masuk`.`id_barang` = `barang`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_brg_masuk`
--
DROP TABLE IF EXISTS `v_brg_masuk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_brg_masuk`  AS  select `masuk`.`id` AS `id`,`masuk`.`tgl` AS `tgl`,`barang`.`nama_barang` AS `nama_barang`,`masuk`.`jml` AS `jml`,`masuk`.`sumber_dana` AS `sumber_dana`,`masuk`.`keterangan` AS `keterangan` from (`barang` join `brg_masuk` `masuk` on(`masuk`.`id_barang` = `barang`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_total_keluar`
--
DROP TABLE IF EXISTS `v_total_keluar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_total_keluar`  AS  select `barang`.`id` AS `id_barang`,ifnull(sum(`keluar`.`jml`),0) AS `total` from (`barang` left join `brg_keluar` `keluar` on(`keluar`.`id_barang` = `barang`.`id`)) group by `barang`.`id` order by `barang`.`nama_barang` ;

-- --------------------------------------------------------

--
-- Structure for view `v_total_masuk`
--
DROP TABLE IF EXISTS `v_total_masuk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_total_masuk`  AS  select `barang`.`id` AS `id_barang`,ifnull(sum(`masuk`.`jml`),0) AS `total` from (`barang` left join `brg_masuk` `masuk` on(`masuk`.`id_barang` = `barang`.`id`)) group by `barang`.`id` order by `barang`.`nama_barang` ;

-- --------------------------------------------------------

--
-- Structure for view `v_total_stok`
--
DROP TABLE IF EXISTS `v_total_stok`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_total_stok`  AS  select `barang`.`id` AS `id`,`barang`.`nama_barang` AS `nama_barang`,`msk`.`total` - `klr`.`total` AS `total` from ((`barang` join `v_total_masuk` `msk` on(`barang`.`id` = `msk`.`id_barang`)) join `v_total_keluar` `klr` on(`barang`.`id` = `klr`.`id_barang`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brg_keluar`
--
ALTER TABLE `brg_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brg_masuk`
--
ALTER TABLE `brg_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brg_keluar`
--
ALTER TABLE `brg_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brg_masuk`
--
ALTER TABLE `brg_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
