DROP TABLE event_tbl;

CREATE TABLE `event_tbl` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `edate` date NOT NULL,
  `photo` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




