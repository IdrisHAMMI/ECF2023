-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 10, 2023 at 09:33 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecf_restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `galleryId` int NOT NULL AUTO_INCREMENT,
  `galleryImg` varchar(50) NOT NULL,
  `galleryBio` varchar(100) NOT NULL,
  PRIMARY KEY (`galleryId`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`galleryId`, `galleryImg`, `galleryBio`) VALUES
(47, '1684334012-rest6.jpg', 'Lorem Ipsum'),
(48, '1684334201-rest6.jpg', 'Lorem Ipsum'),
(46, '1684334001-rest5.jpg', 'Lorem Ipsum'),
(45, '1684333993-rest4.jpg', 'Lorem Ipsum'),
(44, '1684333986-rest3.jpg', 'Lorem Ipsum'),
(43, '1684333980-rest2.jpg', 'Lorem Ipsum'),
(42, '1684333973-rest1.jpg', 'Lorem Ipsum'),
(49, '1698871858-1684333986-rest3.jpg', 'Lorem Ipsum'),
(50, '1698871865-1684334001-rest5.jpg', 'Lorem Ipsum');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
