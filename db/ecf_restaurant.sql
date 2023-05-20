-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 20 mai 2023 à 15:15
-- Version du serveur : 5.7.31
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecf_restaurant`
--

-- --------------------------------------------------------

--
-- Structure de la table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `bookingId` int(11) NOT NULL AUTO_INCREMENT,
  `bookingEmail` varchar(50) DEFAULT NULL,
  `bookingDay` varchar(50) DEFAULT NULL,
  `bookingTime` varchar(50) DEFAULT NULL,
  `bookingSeats` varchar(50) DEFAULT NULL,
  `bookingLimit` varchar(10) NOT NULL DEFAULT '3',
  `bookingAlergies` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`bookingId`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `booking`
--

INSERT INTO `booking` (`bookingId`, `bookingEmail`, `bookingDay`, `bookingTime`, `bookingSeats`, `bookingLimit`, `bookingAlergies`) VALUES
(31, 'idris@gmail.com', '05/10/2023', '19:00', '1', '3', NULL),
(30, 'idris@gmail.com', '05/16/2023', '19:30', '1', '3', NULL),
(29, 'idris@gmail.com', '05/16/2023', '19:00', '1', '3', NULL),
(28, 'idris@gmail.com', '05/09/2023', '11:30', '1', '3', NULL),
(27, 'idris@gmail.com', '05/09/2023', '19:00', '1', '3', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `galleryId` int(11) NOT NULL AUTO_INCREMENT,
  `galleryImg` varchar(50) NOT NULL,
  `galleryBio` varchar(100) NOT NULL,
  PRIMARY KEY (`galleryId`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `gallery`
--

INSERT INTO `gallery` (`galleryId`, `galleryImg`, `galleryBio`) VALUES
(47, '1684334012-rest6.jpg', 'DUMMY6'),
(48, '1684334201-rest6.jpg', 'TEST7'),
(46, '1684334001-rest5.jpg', 'DUMMY5'),
(45, '1684333993-rest4.jpg', 'DUMMY4'),
(44, '1684333986-rest3.jpg', 'DUMMY3'),
(43, '1684333980-rest2.jpg', 'DUMMY2'),
(42, '1684333973-rest1.jpg', 'DUMMY1');

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menuTitle` varchar(100) DEFAULT NULL,
  `menuSchedule` varchar(100) DEFAULT NULL,
  `menuDescriptionPrice` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`menu_id`, `menuTitle`, `menuSchedule`, `menuDescriptionPrice`) VALUES
(1, 'TEST BIO MENU          ', 'TEST MENU', 'TEST BIO MENU          '),
(2, 'TEST           ', '(De 12h a 21H)', 'TEST           '),
(3, 'qsdq', 'qsdq', 'qsdq');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `roleId` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`roleId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`roleId`, `role`) VALUES
(1, 'clients (users)'),
(2, 'employes (admin)');

-- --------------------------------------------------------

--
-- Structure de la table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE IF NOT EXISTS `schedule` (
  `schedule_Id` int(11) NOT NULL AUTO_INCREMENT,
  `days` varchar(50) DEFAULT NULL,
  `timeNoonOpening` varchar(50) DEFAULT NULL,
  `timeNoonEnd` varchar(50) DEFAULT NULL,
  `timeNightOpening` varchar(50) DEFAULT NULL,
  `timeNightEnd` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`schedule_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `schedule`
--

INSERT INTO `schedule` (`schedule_Id`, `days`, `timeNoonOpening`, `timeNoonEnd`, `timeNightOpening`, `timeNightEnd`) VALUES
(1, 'Lundi', '12:00', '15:00', '14:00', '14:00'),
(2, 'Mardi', '11:30', '14:00', '19:00', '21:00'),
(3, 'Mercredi', '11:30', '14:00', '19:00', '21:00'),
(4, 'Jeudi', '11:30', '14:00', '14:00', '14:00'),
(5, 'Vendredi', '14:00', '14:00', '14:00', '14:00'),
(6, 'Samedi', '14:00', '14:00', '14:00', '14:00'),
(7, 'Dimanche', 'Fermer', 'Fermer', 'Fermer', 'Fermer');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `userEmail` varchar(70) DEFAULT NULL,
  `userPass` varchar(70) DEFAULT NULL,
  `allergies` varchar(100) DEFAULT NULL,
  `convives` varchar(50) DEFAULT NULL,
  `role_id` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `userEmail`, `userPass`, `allergies`, `convives`, `role_id`) VALUES
(1, 'blahblah@gmail.com', '$2y$10$DU3PgtLxODCp5flgEg48COj/7xoS0icH8mIcbXs.PPK6NLKYgxz42', NULL, NULL, NULL),
(2, 'hammi.idris@gmail.com', '$2y$10$XwgpTJYok49leeEbDyoAduY4PkTu6O3VuEMMm0P06aSMIishjCqO6', NULL, NULL, NULL),
(3, 'boktaimega007@gmail.com', '$2y$10$CNdAxpMH0u.KSY/TVot0guglN5mq5RpzEHjadU65u5AxN5lOb4HXK', NULL, NULL, NULL),
(4, 'ne.fer@live.fr', '$2y$10$vDOw7a7lEFtbCPl0XOk1zuiqn/9IVqLjE3nqA6zIXwGr.txLGTae2', 'non', 'non', NULL),
(5, 'major.bootman@gmail.com', '$2y$10$x0UwIwHceauPEUHvn04FIOhRyTdNOUhDaxrmL1hub/ssoAOFjMxPS', 'non', '0', NULL),
(6, 'gradrielval@gmail.com', '$2y$10$oCuvUSWOdeSqAkbkC0/s/OdnZC1RE8Ng2E2UqQJdPC4nIveEaoEWC', 'placeholdertext', 'PLACEHOLDERTEXT', '1'),
(7, 'idris@gmail.com', '$2y$10$ExVzy9f5DSM9OPBF010AiO.iY3vHDWX2PmLLp1VsEyH8BKQrkjMKC', 'non', '1 seul', '2'),
(8, 'idrisdd@gmail.com', '$2y$10$c0NEgVjQoImO1.oi/JDlfOKnJBb2yG0TCl2pNIzKq1ZNclthhg./a', 'test', 'test', '1'),
(9, 'idrisqsdqs@gmail.com', '$2y$10$7wyMONjzevhe3.sUj0eal.9bZtewbOwoq0oBhuYSeCyjgEDWSpowi', 'test', 'test', '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
