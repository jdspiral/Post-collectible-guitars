-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2015 at 02:47 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `guitars`
--

-- --------------------------------------------------------

--
-- Table structure for table `guitar`
--

CREATE TABLE IF NOT EXISTS `guitars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `make` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `strings` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);




--
-- Dumping data for table `guitar`
--

INSERT INTO `guitars` (`id`, `name`, `make`, `age`, `strings`, `description`, `image`) VALUES
(1, 'Slash''s Guitar', 'Gibson', 2, 6, 'Played you know, in the jungle', 'slash.png'),
(2, 'Kirk''s Guitar', 'ESP', 10, 6, 'Played live in Never Never land', 'kirk.png'),
(3, 'Omar''s Guitar', 'Fender', 5, 6, 'Played with the Mars Volta.', 'omar.png'),
(4, 'Kerry''s Guitar', 'Dean', 15, 6, 'Played live from hell!', 'kerry.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
