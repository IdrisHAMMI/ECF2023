CREATE TABLE `booking` (
  `bookingId` int NOT NULL AUTO_INCREMENT,
  `bookingEmail` varchar(50) DEFAULT NULL,
  `bookingDay` varchar(50) DEFAULT NULL,
  `bookingTime` varchar(50) DEFAULT NULL,
  `bookingSeats` varchar(50) DEFAULT NULL,
  `bookingAlergies` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`bookingId`)
) ENGINE=MyISAM AUTO_INCREMENT=303 DEFAULT CHARSET=latin1;
