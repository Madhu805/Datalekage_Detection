SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
 -- Table structure for table `admin`
--
 
CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
 

 
INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');
 

CREATE TABLE IF NOT EXISTS `askkey` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `reciver` varchar(50) NOT NULL,
  `k` varchar(38) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;
 

INSERT INTO `askkey` (`id`, `user`, `filename`, `status`, `reciver`, `k`) VALUES
(17, 's', 'UY', 'yes', 'admin', 'as'),
(18, 'sam', 'web', 'yes', 'admin', '12345'),
(19, 'sam', 'UY', 'yes', 'admin', 'HG'),
(20, 'sam', 'UY', 'yes', 'admin', 'HG'),
(21, 'sam', 'afh', 'no', 'admin', ''),
(22, 'sam', 'article', 'no', 'admin', ''),
(23, 'sam', 'article', 'no', 'admin', ''),
(24, 'vi', 'UY', 'yes', 'admin', 'as');
 
CREATE TABLE IF NOT EXISTS `leaker` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `time` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;
 

INSERT INTO `leaker` (`id`, `name`, `time`) VALUES
(12, 'dj', '0000-00-00'),
(13, 'sam', '0000-00-00'),
(14, 'sam', '0000-00-00'),
(15, 'ka', '0000-00-00'),
(16, 'vi', '0000-00-00'),
(17, 'sam', '0000-00-00');
 

CREATE TABLE IF NOT EXISTS `msg` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `sender` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `reciver` varchar(50) NOT NULL,
  `msg` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;
 

INSERT INTO `msg` (`id`, `sender`, `email`, `reciver`, `msg`) VALUES
(3, 'aa', 'jhgnbn', 'rupesh', 'hi '),
(15, 'admin', 'jhg', 'aa', 'khk'),
(16, 'admin', 'uhu', 'mu', 'uhuhuh'),
(18, 'admin', 'sam@gmail.com', 'sam', 'y u leak my file,plz ask me key'),
(19, 'admin', 'kk@gmail.com', 'kk', 'u have leak my file');
 

CREATE TABLE IF NOT EXISTS `presentation` (
  `subject` varchar(50) NOT NULL,
  `Topic` text NOT NULL,
  `fname` varchar(100) NOT NULL,
  `time` date NOT NULL,
  `sendto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
 

INSERT INTO `presentation` (`subject`, `Topic`, `fname`, `time`, `sendto`) VALUES
('UY', 'as', 'Unfiled Notes.one', '2015-04-19', 'gh'),
('web', '12345', 'ketan.docx', '2015-04-08', 'mu'),
('afh', 'jj', 'CHAPTER 1-9.docx', '2015-04-06', ''),
('article', '12', 'dk.png', '2015-04-22', ''),
('art', '1', 'hemen.docx', '2015-04-26', ''),
('a', 'qq', 'front pages.docx', '0000-00-00', '');
 

CREATE TABLE IF NOT EXISTS `register` (
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `userid` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `emailid` varchar(255) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
 
--
-- Dumping data for table `register`
--
 
INSERT INTO `register` (`username`, `userid`, `password`, `emailid`) VALUES
('ka', 'ka', 'ka', 'ka@gmail.com'),
('rupesh  chaudhari', 'rupesh', '123', 'rup@gmail.com'),
('sam', 'sam', 'sam', 'sam@gmail.com'),
('sumeet', 's', 's', 's@gmail.com'),
('sumit', 'su', 'su', 'su@gmail.com'),
('viraj', 'vi', 'vi', 'vi@gmail.com');

