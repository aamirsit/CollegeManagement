DROP TABLE attendence_tbl;

CREATE TABLE `attendence_tbl` (
  `attid` int(11) NOT NULL AUTO_INCREMENT,
  `studid` text NOT NULL,
  `attenddate` date NOT NULL,
  `fid` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  PRIMARY KEY (`attid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO attendence_tbl VALUES("1","","2018-04-19","3","2");
INSERT INTO attendence_tbl VALUES("2","2,","2018-04-20","3","2");
INSERT INTO attendence_tbl VALUES("3","","2018-04-20","1","3");



DROP TABLE dummy;

CREATE TABLE `dummy` (
  `did` int(11) NOT NULL AUTO_INCREMENT,
  `smid` int(11) NOT NULL,
  `rollno` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `marks` int(11) NOT NULL,
  `per` int(11) NOT NULL,
  PRIMARY KEY (`did`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE event_tbl;

CREATE TABLE `event_tbl` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `edate` date NOT NULL,
  `photo` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE exam_result_tbl;

CREATE TABLE `exam_result_tbl` (
  `erid` int(11) NOT NULL AUTO_INCREMENT,
  `smid` int(11) NOT NULL,
  `exid` int(11) NOT NULL,
  `subid` int(11) NOT NULL,
  `marks` int(11) NOT NULL,
  PRIMARY KEY (`erid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO exam_result_tbl VALUES("1","1","1","11","35");
INSERT INTO exam_result_tbl VALUES("2","2","1","11","33");
INSERT INTO exam_result_tbl VALUES("3","3","1","11","45");
INSERT INTO exam_result_tbl VALUES("4","4","1","20","33");
INSERT INTO exam_result_tbl VALUES("5","5","1","20","33");
INSERT INTO exam_result_tbl VALUES("6","6","1","20","35");
INSERT INTO exam_result_tbl VALUES("7","4","1","22","35");
INSERT INTO exam_result_tbl VALUES("8","5","1","22","16");
INSERT INTO exam_result_tbl VALUES("9","6","1","22","33");



DROP TABLE exam_tbl;

CREATE TABLE `exam_tbl` (
  `exid` int(11) NOT NULL AUTO_INCREMENT,
  `exname` varchar(15) NOT NULL,
  `marks` int(11) NOT NULL,
  PRIMARY KEY (`exid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO exam_tbl VALUES("1","Internal","50");
INSERT INTO exam_tbl VALUES("2","Unit Test 1","20");
INSERT INTO exam_tbl VALUES("3","Unit test 2","20");
INSERT INTO exam_tbl VALUES("4","Performance","5");
INSERT INTO exam_tbl VALUES("5","Practical","60");



DROP TABLE faculty_sem_tbl;

CREATE TABLE `faculty_sem_tbl` (
  `fsid` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(10) NOT NULL,
  `sem` int(11) DEFAULT NULL,
  `fid` int(11) NOT NULL,
  PRIMARY KEY (`fsid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO faculty_sem_tbl VALUES("2","2017-2018","4","5");
INSERT INTO faculty_sem_tbl VALUES("5","2018-2019","5","5");
INSERT INTO faculty_sem_tbl VALUES("6","2018-2019","3","8");



DROP TABLE faculty_tbl;

CREATE TABLE `faculty_tbl` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `doj` date NOT NULL,
  `emailid` text NOT NULL,
  `photo` varchar(100) NOT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO faculty_tbl VALUES("1","Admin","Iqra","1997-03-10","Male","2015-07-01","asitponiya97@gmail.com","20185304101653_2aa7952d662a3b506318450768bc52c2.jpg");
INSERT INTO faculty_tbl VALUES("4","Sneha","Saini","1990-03-11","Female","2014-07-01","","20180403075303_sneha.jpg");
INSERT INTO faculty_tbl VALUES("5","Hujefa","Patel","1989-03-01","Male","2014-07-01","","20180403105824_hujefa.jpg");
INSERT INTO faculty_tbl VALUES("6","Mehul","Chauhan","1992-02-01","Male","2013-07-01","","20180403075316_Mehul.jpg");
INSERT INTO faculty_tbl VALUES("7","Divyesh","Jadav","1992-02-01","Male","2014-07-01","","20180403075326_Divyesh.jpg");
INSERT INTO faculty_tbl VALUES("8","Tasneem","Gandhi","1992-02-01","Female","2013-07-01","","20181004052410_20180403075253_tasneem.jpg");
INSERT INTO faculty_tbl VALUES("9","Anis","Patel","1994-02-01","Male","2017-07-01","","20185804052458_20180331165459_Anis.jpg");



DROP TABLE gd_comment_tbl;

CREATE TABLE `gd_comment_tbl` (
  `gdcid` int(11) NOT NULL AUTO_INCREMENT,
  `fid` int(11) NOT NULL,
  `gdtid` int(11) NOT NULL,
  `comment` text NOT NULL,
  `gdcdate` datetime NOT NULL,
  PRIMARY KEY (`gdcid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE gd_topic_tbl;

CREATE TABLE `gd_topic_tbl` (
  `gdtid` int(11) NOT NULL AUTO_INCREMENT,
  `fid` int(11) NOT NULL,
  `topic` varchar(20) NOT NULL,
  `gdtdate` datetime NOT NULL,
  PRIMARY KEY (`gdtid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE login_tbl;

CREATE TABLE `login_tbl` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `usertype` varchar(10) NOT NULL,
  `fid` int(11) DEFAULT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO login_tbl VALUES("1","admin318","admin318","Admin","1");
INSERT INTO login_tbl VALUES("4","snehasaini","snehasaini","Faculty","4");
INSERT INTO login_tbl VALUES("5","hujefapatel","hujefapatel","Faculty","5");
INSERT INTO login_tbl VALUES("6","mehulchauhan","mehulchauhan","Faculty","6");
INSERT INTO login_tbl VALUES("7","divyeshjadav","divyeshjadav","Faculty","7");
INSERT INTO login_tbl VALUES("8","tasneemgandhi","tasneemgandhi","Faculty","8");
INSERT INTO login_tbl VALUES("9","anispatel","anispatel","Faculty","9");



DROP TABLE mail_from_tbl;

CREATE TABLE `mail_from_tbl` (
  `mfid` int(11) NOT NULL AUTO_INCREMENT,
  `mailfrom` int(11) NOT NULL,
  `subject` text NOT NULL,
  `description` text NOT NULL,
  `attach` varchar(100) NOT NULL,
  `maildate` datetime NOT NULL,
  `isdraft` int(11) NOT NULL,
  `isdelete` int(11) NOT NULL,
  PRIMARY KEY (`mfid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE mail_to_tbl;

CREATE TABLE `mail_to_tbl` (
  `mtid` int(11) NOT NULL AUTO_INCREMENT,
  `mfid` int(11) NOT NULL,
  `mailto` int(11) NOT NULL,
  `isread` int(11) NOT NULL,
  `isdelete` int(11) NOT NULL,
  PRIMARY KEY (`mtid`)
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



DROP TABLE student_sem_tbl;

CREATE TABLE `student_sem_tbl` (
  `smid` int(11) NOT NULL AUTO_INCREMENT,
  `studid` int(11) NOT NULL,
  `year` varchar(15) NOT NULL,
  `sem` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`smid`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

INSERT INTO student_sem_tbl VALUES("1","1","2017-2018","2");
INSERT INTO student_sem_tbl VALUES("2","2","2017-2018","2");
INSERT INTO student_sem_tbl VALUES("3","3","2017-2018","2");
INSERT INTO student_sem_tbl VALUES("4","4","2017-2018","4");
INSERT INTO student_sem_tbl VALUES("5","5","2017-2018","4");
INSERT INTO student_sem_tbl VALUES("6","6","2017-2018","4");
INSERT INTO student_sem_tbl VALUES("18","1","2018-2019","3");
INSERT INTO student_sem_tbl VALUES("19","2","2018-2019","3");
INSERT INTO student_sem_tbl VALUES("20","3","2018-2019","3");
INSERT INTO student_sem_tbl VALUES("21","4","2018-2019","5");
INSERT INTO student_sem_tbl VALUES("22","5","2018-2019","5");
INSERT INTO student_sem_tbl VALUES("23","6","2018-2019","5");



DROP TABLE student_tbl;

CREATE TABLE `student_tbl` (
  `studid` int(11) NOT NULL AUTO_INCREMENT,
  `rollno` int(11) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `admissionyear` varchar(4) NOT NULL,
  `enrollid` varchar(20) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `approve` varchar(3) DEFAULT NULL,
  `isdetend` int(11) NOT NULL,
  `isleave` int(11) NOT NULL,
  `photo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`studid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO student_tbl VALUES("1","1701","Basheri ","Tufel","","","2017","E17113180130001","","","","0","0","");
INSERT INTO student_tbl VALUES("2","1702","Bhura","Yamina","","","2017","E17113180130002","","","","0","0","");
INSERT INTO student_tbl VALUES("3","1703","Bapu","Husain","","","2017","E17113180130003","","","","0","0","");
INSERT INTO student_tbl VALUES("4","1601","Bapu","Halima","","","2016","E16113180110001","","","","0","0","");
INSERT INTO student_tbl VALUES("5","1602","Bapu","kulsum","","","2016","E16113180110002","","","","0","0","");
INSERT INTO student_tbl VALUES("6","1603","Bapu","Safwan","","","2016","E16113180110003","","","","0","0","");



DROP TABLE subject_tbl;

CREATE TABLE `subject_tbl` (
  `subid` int(11) NOT NULL AUTO_INCREMENT,
  `scode` int(11) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `sem` int(11) NOT NULL,
  `fid` int(11) DEFAULT NULL,
  PRIMARY KEY (`subid`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

INSERT INTO subject_tbl VALUES("1","101","CS","1","");
INSERT INTO subject_tbl VALUES("2","102","Mathematics","1","");
INSERT INTO subject_tbl VALUES("3","103","IC","1","");
INSERT INTO subject_tbl VALUES("4","104","CPPM","1","");
INSERT INTO subject_tbl VALUES("5","105","OAT","1","");
INSERT INTO subject_tbl VALUES("6","106","Practical","1","");
INSERT INTO subject_tbl VALUES("7","201","Accounts","2","7");
INSERT INTO subject_tbl VALUES("8","202","OB","2","4");
INSERT INTO subject_tbl VALUES("9","203","OS","2","7");
INSERT INTO subject_tbl VALUES("10","204","Advanced C","2","4");
INSERT INTO subject_tbl VALUES("11","205","DBMS","2","");
INSERT INTO subject_tbl VALUES("12","206","Practical","2","");
INSERT INTO subject_tbl VALUES("13","301","Satatistics","3","4");
INSERT INTO subject_tbl VALUES("14","302","SE-1","3","");
INSERT INTO subject_tbl VALUES("15","303","RDBMS","3","8");
INSERT INTO subject_tbl VALUES("16","304","DS","3","");
INSERT INTO subject_tbl VALUES("17","305","OOPS","3","");
INSERT INTO subject_tbl VALUES("18","306","Practical","3","");
INSERT INTO subject_tbl VALUES("19","401","IS","4","2");
INSERT INTO subject_tbl VALUES("20","402","SE-2","4","3");
INSERT INTO subject_tbl VALUES("21","403","Java","4","4");
INSERT INTO subject_tbl VALUES("22","404",".NET","4","3");
INSERT INTO subject_tbl VALUES("23","405","Web Designing","4","5");
INSERT INTO subject_tbl VALUES("24","406","Practical","4","");
INSERT INTO subject_tbl VALUES("25","501","PHP","5","");
INSERT INTO subject_tbl VALUES("26","502","Unix","5","");
INSERT INTO subject_tbl VALUES("27","503","Network Technology","5","");
INSERT INTO subject_tbl VALUES("28","504","OS-2","5","");
INSERT INTO subject_tbl VALUES("29","505","ASP.NET","5","");
INSERT INTO subject_tbl VALUES("30","506","Practical","5","");
INSERT INTO subject_tbl VALUES("31","601","CG","6","");
INSERT INTO subject_tbl VALUES("32","602","E-Commerce","6","");
INSERT INTO subject_tbl VALUES("33","603","Project","6","");
INSERT INTO subject_tbl VALUES("34","604","Seminar","6","");



DROP TABLE year_tbl;

CREATE TABLE `year_tbl` (
  `yid` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(10) NOT NULL,
  PRIMARY KEY (`yid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO year_tbl VALUES("1","2017-2018");
INSERT INTO year_tbl VALUES("6","2018-2019");



