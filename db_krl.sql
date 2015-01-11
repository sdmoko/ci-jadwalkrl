-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 18, 2014 at 05:17 PM
-- Server version: 5.5.35-1
-- PHP Version: 5.5.9-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_krl`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal`
--

CREATE TABLE IF NOT EXISTS `tbl_jadwal` (
  `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `stasiun` varchar(50) NOT NULL,
  `jam` time NOT NULL,
  `id_krl` int(11) NOT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`id_jadwal`, `stasiun`, `jam`, `id_krl`) VALUES
(1, 'Depok', '04:32:00', 1033),
(2, 'Depok Baru', '05:15:00', 1039),
(3, 'Depok Baru', '08:06:00', 1083);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_konten`
--

CREATE TABLE IF NOT EXISTS `tbl_konten` (
  `konten` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_konten`
--

INSERT INTO `tbl_konten` (`konten`) VALUES
('<p>&nbsp;</p>\n\n<p style="text-align: center;"><span style="font-size:20px">InfoKRL merupakan website untuk mencari jadwal terkini Commuter Line.</span></p>\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_krl`
--

CREATE TABLE IF NOT EXISTS `tbl_krl` (
  `id_krl` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `stasiun_awal` varchar(50) NOT NULL,
  `stasiun_akhir` varchar(50) NOT NULL,
  PRIMARY KEY (`id_krl`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_krl`
--

INSERT INTO `tbl_krl` (`id_krl`, `nama`, `stasiun_awal`, `stasiun_akhir`) VALUES
(1031, 'Commuter Line', 'Bogor', 'Jakarta Kota'),
(1033, 'Commuter Line', 'Bogor', 'Jakarta Kota'),
(1039, 'Commuter Line', 'Depok', 'Jakarta Kota');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(3, 'guest', '084e0343a0486ff05530df6c705c8bb4', 'pengguna');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
