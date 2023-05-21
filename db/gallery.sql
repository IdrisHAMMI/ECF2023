DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `galleryId` int(11) NOT NULL AUTO_INCREMENT,
  `galleryImg` varchar(50) NOT NULL,
  `galleryBio` varchar(100) NOT NULL,
  PRIMARY KEY (`galleryId`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;