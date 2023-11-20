CREATE TABLE `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `userEmail` varchar(70) DEFAULT NULL,
  `userPass` varchar(255) DEFAULT NULL,
  `allergies` varchar(100) DEFAULT NULL,
  `convives` varchar(50) DEFAULT NULL,
  `role_id` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;