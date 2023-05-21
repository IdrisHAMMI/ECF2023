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