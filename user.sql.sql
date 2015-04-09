

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(100) NOT NULL,
  `pwd` char(40) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `pwd`, `status`) VALUES
(1, 'zxcvzxc', 'zxcvxzcv', 1),
(2, 'php', '8cb2237d0679ca88db6464eac60da96345513964', 1),
(3, 'yoda', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 3),
(4, 'nodejs', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1);