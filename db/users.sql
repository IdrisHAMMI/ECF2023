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