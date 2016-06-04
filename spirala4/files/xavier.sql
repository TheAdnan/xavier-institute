-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 04, 2016 at 12:10 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `xavier`
--
CREATE DATABASE IF NOT EXISTS `xavier` DEFAULT CHARACTER SET utf8 COLLATE utf8_slovenian_ci;
USE `xavier`;

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `vijest` int(11) NOT NULL,
  `odgovor` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vijest` (`vijest`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `tekst`, `vijest`, `odgovor`) VALUES
(17, 'Komentari su Bože', 16, 0),
(18, 'Dramaaa', 16, 0),
(19, 'Dramaaa', 16, 0);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE IF NOT EXISTS `korisnik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin` tinyint(1) NOT NULL,
  `username` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_slovenian_ci NOT NULL,
  `ime` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `admin`, `username`, `password`, `ime`) VALUES
(1, 1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'Adnan'),
(2, 0, 'guest', 'guest', 'Guest');

-- --------------------------------------------------------

--
-- Table structure for table `vijest`
--

CREATE TABLE IF NOT EXISTS `vijest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naslov` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `slika` text COLLATE utf8_slovenian_ci NOT NULL,
  `datum` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `komentar` tinyint(1) NOT NULL,
  `autor` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `vijest`
--

INSERT INTO `vijest` (`id`, `naslov`, `tekst`, `slika`, `datum`, `komentar`, `autor`) VALUES
(16, 'Film "Deadpool" pokorio američ', 'Film &quot;Deadpool&quot; je na svom debiju pokorio američki box office zaradivši 135 miliona dolara. Zahvaljujući odličnom debiju u kinima, film &quot;Deadpool&quot; je postao najuspješniji od svih koji nose oznaku R, što znači da je zabranjen za osobe mlađe od 17 godina...', '../images/vijest1.jpg', '2016-06-04T14:06:20', 1, 1),
(17, 'Prvi X-Men Apocalypse trailer', 'Ako ste gledajući X-Men: Days of Future Past odsjedili iza završnice, imali ste priliku vidjeti kraći teaser za idući nastavak koji nosi naziv X-Men: Apocalypse. Špekulacije su od tada potvrđene pa znamo da će se X-Men ekipa u novom filmu boriti protiv Apocalypsea i njegova četiri jahača...', '../images/vijest2.jpg', '2016-06-04T14:06:53', 0, 1),
(18, 'Apocalypse Sneak Peek', 'Film &quot;Deadpool&quot; je na svom debiju pokorio američki box office zaradivši 135 miliona dolara. Zahvaljujući odličnom debiju u kinima, film &quot;Deadpool&quot; je postao najuspješniji od svih koji nose oznaku R, što znači da je zabranjen za osobe mlađe od 17 godina...', '../images/apocalypse.jpg', '2016-06-04T14:07:39', 1, 1),
(19, 'Apocalypse poster #1', 'Ako ste gledajući X-Men: Days of Future Past odsjedili iza završnice, imali ste priliku vidjeti kraći teaser za idući nastavak koji nosi naziv X-Men: Apocalypse. Špekulacije su od tada potvrđene pa znamo da će se X-Men ekipa u novom filmu boriti protiv Apocalypsea i njegova četiri jahača...', '../images/apocalypse-1.jpg', '2016-06-04T14:08:15', 0, 1);

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
