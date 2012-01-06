CREATE TABLE IF NOT EXISTS `movies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tmdb` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `img` text NOT NULL,
  `lien` text NOT NULL,
  `date` varchar(255) NOT NULL,
  `duree` int(5) NOT NULL,
  `genres` text NOT NULL,
  `vu` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;
