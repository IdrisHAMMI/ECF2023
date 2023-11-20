CREATE TABLE `menu` (
  `menu_id` int NOT NULL AUTO_INCREMENT,
  `menuTitle` varchar(100) DEFAULT NULL,
  `menuSchedule` varchar(100) DEFAULT NULL,
  `menuDescription` varchar(100) DEFAULT NULL,
  `menuPrice` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;