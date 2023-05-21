DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menuTitle` varchar(100) DEFAULT NULL,
  `menuSchedule` varchar(100) DEFAULT NULL,
  `menuDescriptionPrice` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;