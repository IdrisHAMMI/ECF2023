-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 10, 2023 at 09:32 PM
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
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `bookingId` int NOT NULL AUTO_INCREMENT,
  `bookingEmail` varchar(50) DEFAULT NULL,
  `bookingDay` varchar(50) DEFAULT NULL,
  `bookingTime` varchar(50) DEFAULT NULL,
  `bookingSeats` varchar(50) DEFAULT NULL,
  `bookingAlergies` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`bookingId`)
) ENGINE=MyISAM AUTO_INCREMENT=303 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingId`, `bookingEmail`, `bookingDay`, `bookingTime`, `bookingSeats`, `bookingAlergies`) VALUES
(302, 'idris@gmail.com', '11/16/2023', '11:30', '1', 'TEST');

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

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `menu_id` int NOT NULL AUTO_INCREMENT,
  `menuTitle` varchar(100) DEFAULT NULL,
  `menuSchedule` varchar(100) DEFAULT NULL,
  `menuDescription` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `menuPrice` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menuTitle`, `menuSchedule`, `menuDescription`, `menuPrice`) VALUES
(1, 'LOREM IPSUM', 'LOREM IPSUM', 'LOREM IPSUM', '10 Euros'),
(2, 'LOREM IPSUM', 'LOREM IPSUM', 'LOREM IPSUM', '20 Euros'),
(3, 'LOREM IPSUM', 'LOREM IPSUM', 'LOREM IPSUM', '30 Euros');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `roleId` int NOT NULL AUTO_INCREMENT,
  `role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`roleId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleId`, `role`) VALUES
(1, 'clients (users)'),
(2, 'employes (admin)');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE IF NOT EXISTS `schedule` (
  `schedule_Id` int NOT NULL AUTO_INCREMENT,
  `days` varchar(50) DEFAULT NULL,
  `timeNoonOpening` varchar(50) DEFAULT NULL,
  `timeNoonEnd` varchar(50) DEFAULT NULL,
  `timeNightOpening` varchar(50) DEFAULT NULL,
  `timeNightEnd` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`schedule_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_Id`, `days`, `timeNoonOpening`, `timeNoonEnd`, `timeNightOpening`, `timeNightEnd`) VALUES
(1, 'Lundi', '11:20', '14:00', '18:15', '21:00'),
(2, 'Mardi', '11:40', '14:00', '19:00', '21:00'),
(3, 'Mercredi', '11:00', '14:00', '18:30', '21:00'),
(4, 'Jeudi', '11:30', '14:00', '20:00', '21:00'),
(5, 'Vendredi', '11:15', '14:00', '18:45', '21:00'),
(6, 'Samedi', '11:35', '14:00', '18:20', '21:00'),
(7, 'Dimanche', 'Fermée', 'Fermée', 'Fermée', 'Fermée');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `userEmail` varchar(70) DEFAULT NULL,
  `userPass` varchar(70) DEFAULT NULL,
  `allergies` varchar(100) DEFAULT NULL,
  `convives` varchar(50) DEFAULT NULL,
  `role_id` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `userEmail`, `userPass`, `allergies`, `convives`, `role_id`) VALUES
(7, 'idris@gmail.com', '$2y$10$ExVzy9f5DSM9OPBF010AiO.iY3vHDWX2PmLLp1VsEyH8BKQrkjMKC', 'non', '1', '2'),
(10, 'hammi.idris@gmail.com', '$2y$10$OCrxoWHm9GHSE.xgM1LbKOVYcXxZT0eAnw.89ip3y3m0iqIY37o1G', 'non', '1', '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
