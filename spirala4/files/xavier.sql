-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2016 at 10:15 AM
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
CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `vijest` int(11) NOT NULL,
  `odgovor` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `tekst`, `vijest`, `odgovor`) VALUES
(1, 'komentar', 13, 0),
(2, 'komentar', 13, 0),
(3, 'prikaz komentara', 13, 0),
(4, 'asdasd', 14, 0);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `username` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_slovenian_ci NOT NULL,
  `ime` varchar(30) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

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
CREATE TABLE `vijest` (
  `id` int(11) NOT NULL,
  `naslov` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `slika` text COLLATE utf8_slovenian_ci NOT NULL,
  `datum` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `komentar` varchar(1) COLLATE utf8_slovenian_ci NOT NULL,
  `autor` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `vijest`
--

INSERT INTO `vijest` (`id`, `naslov`, `tekst`, `slika`, `datum`, `komentar`, `autor`) VALUES
(10, 'Film "Deadpool" pokorio američ', 'Film &quot;Deadpool&quot; je na svom debiju pokorio američki box office zaradivši 135 miliona dolara. Zahvaljujući odličnom debiju u kinima, film &quot;Deadpool&quot; je postao najuspješniji od svih koji nose oznaku R, što znači da je zabranjen za osobe mlađe od 17 godina...', '../images/vijest1.jpg', '2016-06-02T12:28:04', '0', 1),
(11, 'Biografija: Profesor Charles F', 'Charles Francis Xavier rođen je u New Yorku, oca Brian Xavier i majke, cijenjene naučnice u oblasti nuklearne fizike, Sharon Xavier. Nakon što je izgubio oca u saobraćajnoj nesreći, njegov prijatelj Kurt Marko stupa u brak s Sharon...', '../images/vijest4.jpg', '2016-06-02T12:31:19', '0', 1),
(12, 'asaaaaaa', 'Na osnovu člana 125. Zakona o visokom obrazovanju (&quot;Službene novine Kantona Sarajevo&quot;, br. 42/13 - prečišćeni tekst i 13/15), člana 95. Statuta Xavier Instituta u New Yorku i tačke III Odluke Vlade o davanju...', '../images/vijest4.jpg', '2016-06-02T12:35:22', '0', 1),
(13, 'a,a,a,a,a', 'Na osnovu člana 125. Zakona o visokom obrazovanju (&quot;Službene novine Kantona Sarajevo&quot;, br. 42/13 - prečišćeni tekst i 13/15), člana 95. Statuta Xavier Instituta u New Yorku i tačke III Odluke Vlade o davanju...', '../images/vijest4.jpg', '2016-06-02T12:35:42', '0', 1),
(14, 'asdas', 'aaaaa', '../images/vijest3.jpg', '2016-06-02T12:38:58', '1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vijest`
--
ALTER TABLE `vijest`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `vijest`
--
ALTER TABLE `vijest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
