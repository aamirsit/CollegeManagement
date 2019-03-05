DROP TABLE event_tbl;

CREATE TABLE `event_tbl` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `edate` date NOT NULL,
  `photo` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE news_tbl;

CREATE TABLE `news_tbl` (
  `nid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `ndate` date NOT NULL,
  `ntime` time NOT NULL,
  `photo` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`nid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO news_tbl VALUES("1","Farewell Party Batch 2015","2018-04-20","09:00:00","20182804110828_IMG_3550.JPG,20182804110828_IMG_3495.JPG,","A Farewell party is arranged for the TY students of IQRA BCA COLLEGE batch 2015 on march 5th 2018");



