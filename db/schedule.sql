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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
