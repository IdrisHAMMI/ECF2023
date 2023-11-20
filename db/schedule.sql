CREATE TABLE `schedule` (
  `schedule_Id` int NOT NULL AUTO_INCREMENT,
  `days` varchar(50) DEFAULT NULL,
  `timeNoonOpening` varchar(50) DEFAULT NULL,
  `timeNoonEnd` varchar(50) DEFAULT NULL,
  `timeNightOpening` varchar(50) DEFAULT NULL,
  `timeNightEnd` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`schedule_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;