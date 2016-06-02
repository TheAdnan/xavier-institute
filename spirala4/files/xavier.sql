-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2016 at 11:41 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xavier`
--
CREATE DATABASE IF NOT EXISTS `xavier` DEFAULT CHARACTER SET utf8 COLLATE utf8_slovenian_ci;
USE `xavier`;

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

DROP TABLE IF EXISTS `komentar`;
CREATE TABLE IF NOT EXISTS `komentar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `vijest` int(11) NOT NULL,
  `odgovor` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vijest` (`vijest`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
CREATE TABLE IF NOT EXISTS `korisnik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin` tinyint(1) NOT NULL,
  `username` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_slovenian_ci NOT NULL,
  `ime` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `admin`, `username`, `password`, `ime`) VALUES
(1, 1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'Adnan');

-- --------------------------------------------------------

--
-- Table structure for table `vijest`
--

DROP TABLE IF EXISTS `vijest`;
CREATE TABLE IF NOT EXISTS `vijest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naslov` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `slika` text COLLATE utf8_slovenian_ci NOT NULL,
  `datum` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `komentar` tinyint(1) NOT NULL,
  `autor` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `vijest`
--

INSERT INTO `vijest` (`id`, `naslov`, `tekst`, `slika`, `datum`, `komentar`, `autor`) VALUES
(2, 'vijest', 'vijest', 'vijest', '2016-06-02T11:00:32', 1, 1),
(7, 'prva viojest', 'asdasd', 'asdas', '2016-06-02T11:32:25', 1, 1),
(8, 'prva viojest', 'asdasw', 'asdas', '2016-06-02T11:32:39', 1, 1),
(9, 'asdas', 'asdas', 'asdas', '2016-06-02T11:40:13', 0, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`vijest`) REFERENCES `vijest` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
