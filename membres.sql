-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2015 at 04:56 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bado`
--

-- --------------------------------------------------------

--
-- Table structure for table `membres`
--

CREATE TABLE IF NOT EXISTS `membres` (
  `id_membres` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_membres`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `email_2` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `membres`
--

INSERT INTO `membres` (`id_membres`, `email`, `pseudo`, `password`) VALUES
(11, 'EdithECampbell@dayrep.com ', 'Scoleney', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(12, 'JoseSAnderson@teleworm.us ', 'Calawn', 'd54b76b2bad9d9946011ebc62a1d272f4122c7b5'),
(13, 'JesusDMilton@dayrep.com ', 'Cail1940', '51eac6b471a284d3341d8c0c63d0f1a286262a18');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
