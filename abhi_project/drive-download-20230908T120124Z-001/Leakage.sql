SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
 
CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(11) NOT NULL,
  `password` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
 

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin'),
('admin', 'password');
 

CREATE TABLE IF NOT EXISTS `article` (
  `pkey` int(5) NOT NULL AUTO_INCREMENT,
  `filename` varchar(100) NOT NULL,
  `filesize` varchar(100) NOT NULL,
  `filetype` varchar(100) NOT NULL,
  `filecontent` mediumtext NOT NULL,
  `a1` varchar(49) NOT NULL,
  `a2` varchar(49) NOT NULL,
  `a3` varchar(49) NOT NULL,
  `a4` varchar(49) NOT NULL,
  PRIMARY KEY (`pkey`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
 
CREATE TABLE IF NOT EXISTS `msg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
 
-- Table structure for table `user 
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
 -- Dumping data for table `user` 