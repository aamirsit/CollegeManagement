DROP TABLE attendence_tbl;

CREATE TABLE `attendence_tbl` (
  `attid` int(11) NOT NULL AUTO_INCREMENT,
  `studid` text NOT NULL,
  `attenddate` date NOT NULL,
  `fid` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  PRIMARY KEY (`attid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO attendence_tbl VALUES("1","","2018-04-19","3","2");
INSERT INTO attendence_tbl VALUES("2","2,","2018-04-20","3","2");
INSERT INTO attendence_tbl VALUES("3","","2018-04-20","1","3");
INSERT INTO attendence_tbl VALUES("4","24,30,","2018-04-20","4","6");
INSERT INTO attendence_tbl VALUES("5","","2018-04-19","4","6");
INSERT INTO attendence_tbl VALUES("6","25,","2018-04-18","4","6");
INSERT INTO attendence_tbl VALUES("7","24,","2018-04-17","4","6");
INSERT INTO attendence_tbl VALUES("8","24,","2018-04-16","4","6");



DROP TABLE dummy;

CREATE TABLE `dummy` (
  `did` int(11) NOT NULL AUTO_INCREMENT,
  `smid` int(11) NOT NULL,
  `rollno` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `marks` int(11) NOT NULL,
  `per` int(11) NOT NULL,
  PRIMARY KEY (`did`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO dummy VALUES("1","1","1701","Basheri  Tufel","157","63");
INSERT INTO dummy VALUES("2","2","1702","Bhura Yamina","166","66");
INSERT INTO dummy VALUES("3","24","1705","Hira Fahim","162","65");
INSERT INTO dummy VALUES("4","25","1706","Kazi  Aadil","126","50");
INSERT INTO dummy VALUES("5","28","1709","Patel Ateka","164","66");
INSERT INTO dummy VALUES("6","29","1710","Patel Faizurrehman","166","66");
INSERT INTO dummy VALUES("7","30","1711","Patel Khalisha","185","74");



DROP TABLE event_tbl;

CREATE TABLE `event_tbl` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `edate` date NOT NULL,
  `photo` text NOT NULL,
  `description` text NOT NULL,
  `enabled` varchar(1) NOT NULL,
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO event_tbl VALUES("1","Farewell","2018-04-20","20181804130418_IMG_3494.JPG,20181804130418_IMG_3702.JPG,20184904053049_IMG_3338.JPG,20184904053049_IMG_3537.JPG,20184904053049_IMG_3550.JPG,","A well organized <b><u>farewell party</u></b> was arranged for the <b><u>TY Batch 2015</u></b> where everyone enjoyed a lot.<br><b>Gifts</b> are gifted to all <b>TY students</b> and also had <b>lunch</b> after party . They are also provided <b>black forest icecream</b> after lunch.&nbsp;<br>And there was also a cake cutting with all the student of <b>IQRA BCA COLLEGE.<br></b>Students enjoyed very much and may be this type of arrangement was not done before in IQRA COLLEGE.<b><br></b>","Y");
INSERT INTO event_tbl VALUES("2","Documentation Signing","2018-04-21","20182604112126_exam.png,20182604112126_project header.png,","TY project and seminar documentation signing was done on 21st of April 2018","Y");
INSERT INTO event_tbl VALUES("3","Sports Week","2018-02-05","20185204114452_Cristiano_Ronaldo_wallpaper_28.jpg,20185204114452_Cristiano_Ronaldo_wallpaper_17.jpg,20185204114452_Cristiano_Ronaldo_wallpaper_14.jpg,","Sports week was arranged for BCA students at IQRA BCA COLLEGE on 5th of February 2018.<br>Students enjoyed very much in this week and have memories for this days","Y");



DROP TABLE exam_result_tbl;

CREATE TABLE `exam_result_tbl` (
  `erid` int(11) NOT NULL AUTO_INCREMENT,
  `smid` int(11) NOT NULL,
  `exid` int(11) NOT NULL,
  `subid` int(11) NOT NULL,
  `marks` int(11) NOT NULL,
  PRIMARY KEY (`erid`)
) ENGINE=InnoDB AUTO_INCREMENT=171 DEFAULT CHARSET=latin1;

INSERT INTO exam_result_tbl VALUES("1","1","1","11","30");
INSERT INTO exam_result_tbl VALUES("2","2","1","11","33");
INSERT INTO exam_result_tbl VALUES("3","3","1","11","16");
INSERT INTO exam_result_tbl VALUES("4","24","1","11","33");
INSERT INTO exam_result_tbl VALUES("5","25","1","11","30");
INSERT INTO exam_result_tbl VALUES("6","26","1","11","29");
INSERT INTO exam_result_tbl VALUES("7","27","1","11","20");
INSERT INTO exam_result_tbl VALUES("8","28","1","11","35");
INSERT INTO exam_result_tbl VALUES("9","29","1","11","32");
INSERT INTO exam_result_tbl VALUES("10","30","1","11","38");
INSERT INTO exam_result_tbl VALUES("11","1","1","8","32");
INSERT INTO exam_result_tbl VALUES("12","2","1","8","33");
INSERT INTO exam_result_tbl VALUES("13","3","1","8","35");
INSERT INTO exam_result_tbl VALUES("14","24","1","8","26");
INSERT INTO exam_result_tbl VALUES("15","25","1","8","24");
INSERT INTO exam_result_tbl VALUES("16","26","1","8","28");
INSERT INTO exam_result_tbl VALUES("17","27","1","8","14");
INSERT INTO exam_result_tbl VALUES("18","28","1","8","25");
INSERT INTO exam_result_tbl VALUES("19","29","1","8","35");
INSERT INTO exam_result_tbl VALUES("20","30","1","8","35");
INSERT INTO exam_result_tbl VALUES("21","1","1","7","35");
INSERT INTO exam_result_tbl VALUES("22","2","1","7","32");
INSERT INTO exam_result_tbl VALUES("23","3","1","7","33");
INSERT INTO exam_result_tbl VALUES("24","24","1","7","36");
INSERT INTO exam_result_tbl VALUES("25","25","1","7","25");
INSERT INTO exam_result_tbl VALUES("26","26","1","7","28");
INSERT INTO exam_result_tbl VALUES("27","27","1","7","30");
INSERT INTO exam_result_tbl VALUES("28","28","1","7","35");
INSERT INTO exam_result_tbl VALUES("29","29","1","7","32");
INSERT INTO exam_result_tbl VALUES("30","30","1","7","38");
INSERT INTO exam_result_tbl VALUES("31","1","1","9","25");
INSERT INTO exam_result_tbl VALUES("32","2","1","9","35");
INSERT INTO exam_result_tbl VALUES("33","3","1","9","35");
INSERT INTO exam_result_tbl VALUES("34","24","1","9","33");
INSERT INTO exam_result_tbl VALUES("35","25","1","9","22");
INSERT INTO exam_result_tbl VALUES("36","26","1","9","15");
INSERT INTO exam_result_tbl VALUES("37","27","1","9","36");
INSERT INTO exam_result_tbl VALUES("38","28","1","9","35");
INSERT INTO exam_result_tbl VALUES("39","29","1","9","34");
INSERT INTO exam_result_tbl VALUES("40","30","1","9","36");
INSERT INTO exam_result_tbl VALUES("41","1","1","10","35");
INSERT INTO exam_result_tbl VALUES("42","2","1","10","33");
INSERT INTO exam_result_tbl VALUES("43","3","1","10","32");
INSERT INTO exam_result_tbl VALUES("44","24","1","10","34");
INSERT INTO exam_result_tbl VALUES("45","25","1","10","25");
INSERT INTO exam_result_tbl VALUES("46","26","1","10","12");
INSERT INTO exam_result_tbl VALUES("47","27","1","10","26");
INSERT INTO exam_result_tbl VALUES("48","28","1","10","34");
INSERT INTO exam_result_tbl VALUES("49","29","1","10","33");
INSERT INTO exam_result_tbl VALUES("50","30","1","10","38");
INSERT INTO exam_result_tbl VALUES("51","1","2","11","15");
INSERT INTO exam_result_tbl VALUES("52","2","2","11","13");
INSERT INTO exam_result_tbl VALUES("53","3","2","11","14");
INSERT INTO exam_result_tbl VALUES("54","24","2","11","16");
INSERT INTO exam_result_tbl VALUES("55","25","2","11","12");
INSERT INTO exam_result_tbl VALUES("56","26","2","11","6");
INSERT INTO exam_result_tbl VALUES("57","27","2","11","11");
INSERT INTO exam_result_tbl VALUES("58","28","2","11","14");
INSERT INTO exam_result_tbl VALUES("59","29","2","11","13");
INSERT INTO exam_result_tbl VALUES("60","30","2","11","18");
INSERT INTO exam_result_tbl VALUES("61","1","4","11","4");
INSERT INTO exam_result_tbl VALUES("62","2","4","11","4");
INSERT INTO exam_result_tbl VALUES("63","3","4","11","4");
INSERT INTO exam_result_tbl VALUES("64","24","4","11","4");
INSERT INTO exam_result_tbl VALUES("65","25","4","11","3");
INSERT INTO exam_result_tbl VALUES("66","26","4","11","3");
INSERT INTO exam_result_tbl VALUES("67","27","4","11","3");
INSERT INTO exam_result_tbl VALUES("68","28","4","11","4");
INSERT INTO exam_result_tbl VALUES("69","29","4","11","4");
INSERT INTO exam_result_tbl VALUES("70","30","4","11","5");
INSERT INTO exam_result_tbl VALUES("71","1","2","8","12");
INSERT INTO exam_result_tbl VALUES("72","2","2","8","13");
INSERT INTO exam_result_tbl VALUES("73","3","2","8","14");
INSERT INTO exam_result_tbl VALUES("74","24","2","8","12");
INSERT INTO exam_result_tbl VALUES("75","25","2","8","11");
INSERT INTO exam_result_tbl VALUES("76","26","2","8","10");
INSERT INTO exam_result_tbl VALUES("77","27","2","8","9");
INSERT INTO exam_result_tbl VALUES("78","28","2","8","15");
INSERT INTO exam_result_tbl VALUES("79","29","2","8","13");
INSERT INTO exam_result_tbl VALUES("80","30","2","8","16");
INSERT INTO exam_result_tbl VALUES("81","1","4","8","3");
INSERT INTO exam_result_tbl VALUES("82","2","4","8","3");
INSERT INTO exam_result_tbl VALUES("83","3","4","8","4");
INSERT INTO exam_result_tbl VALUES("84","24","4","8","3");
INSERT INTO exam_result_tbl VALUES("85","25","4","8","4");
INSERT INTO exam_result_tbl VALUES("86","26","4","8","4");
INSERT INTO exam_result_tbl VALUES("87","27","4","8","3");
INSERT INTO exam_result_tbl VALUES("88","28","4","8","4");
INSERT INTO exam_result_tbl VALUES("89","29","4","8","4");
INSERT INTO exam_result_tbl VALUES("90","30","4","8","5");
INSERT INTO exam_result_tbl VALUES("91","1","2","10","15");
INSERT INTO exam_result_tbl VALUES("92","2","2","10","13");
INSERT INTO exam_result_tbl VALUES("93","3","2","10","11");
INSERT INTO exam_result_tbl VALUES("94","24","2","10","16");
INSERT INTO exam_result_tbl VALUES("95","25","2","10","12");
INSERT INTO exam_result_tbl VALUES("96","26","2","10","6");
INSERT INTO exam_result_tbl VALUES("97","27","2","10","12");
INSERT INTO exam_result_tbl VALUES("98","28","2","10","13");
INSERT INTO exam_result_tbl VALUES("99","29","2","10","14");
INSERT INTO exam_result_tbl VALUES("100","30","2","10","17");
INSERT INTO exam_result_tbl VALUES("101","1","4","10","3");
INSERT INTO exam_result_tbl VALUES("102","2","4","10","3");
INSERT INTO exam_result_tbl VALUES("103","3","4","10","4");
INSERT INTO exam_result_tbl VALUES("104","24","4","10","3");
INSERT INTO exam_result_tbl VALUES("105","25","4","10","3");
INSERT INTO exam_result_tbl VALUES("106","26","4","10","3");
INSERT INTO exam_result_tbl VALUES("107","27","4","10","3");
INSERT INTO exam_result_tbl VALUES("108","28","4","10","4");
INSERT INTO exam_result_tbl VALUES("109","29","4","10","4");
INSERT INTO exam_result_tbl VALUES("110","30","4","10","5");
INSERT INTO exam_result_tbl VALUES("111","1","2","7","12");
INSERT INTO exam_result_tbl VALUES("112","2","2","7","12");
INSERT INTO exam_result_tbl VALUES("113","3","2","7","13");
INSERT INTO exam_result_tbl VALUES("114","24","2","7","14");
INSERT INTO exam_result_tbl VALUES("115","25","2","7","11");
INSERT INTO exam_result_tbl VALUES("116","26","2","7","13");
INSERT INTO exam_result_tbl VALUES("117","27","2","7","12");
INSERT INTO exam_result_tbl VALUES("118","28","2","7","16");
INSERT INTO exam_result_tbl VALUES("119","29","2","7","15");
INSERT INTO exam_result_tbl VALUES("120","30","2","7","19");
INSERT INTO exam_result_tbl VALUES("121","1","4","7","4");
INSERT INTO exam_result_tbl VALUES("122","2","4","7","4");
INSERT INTO exam_result_tbl VALUES("123","3","4","7","4");
INSERT INTO exam_result_tbl VALUES("124","24","4","7","4");
INSERT INTO exam_result_tbl VALUES("125","25","4","7","3");
INSERT INTO exam_result_tbl VALUES("126","26","4","7","4");
INSERT INTO exam_result_tbl VALUES("127","27","4","7","3");
INSERT INTO exam_result_tbl VALUES("128","28","4","7","4");
INSERT INTO exam_result_tbl VALUES("129","29","4","7","4");
INSERT INTO exam_result_tbl VALUES("130","30","4","7","5");
INSERT INTO exam_result_tbl VALUES("131","1","2","9","12");
INSERT INTO exam_result_tbl VALUES("132","2","2","9","15");
INSERT INTO exam_result_tbl VALUES("133","3","2","9","11");
INSERT INTO exam_result_tbl VALUES("134","24","2","9","13");
INSERT INTO exam_result_tbl VALUES("135","25","2","9","14");
INSERT INTO exam_result_tbl VALUES("136","26","2","9","15");
INSERT INTO exam_result_tbl VALUES("137","27","2","9","12");
INSERT INTO exam_result_tbl VALUES("138","28","2","9","15");
INSERT INTO exam_result_tbl VALUES("139","29","2","9","16");
INSERT INTO exam_result_tbl VALUES("140","30","2","9","18");
INSERT INTO exam_result_tbl VALUES("141","1","4","9","4");
INSERT INTO exam_result_tbl VALUES("142","2","4","9","4");
INSERT INTO exam_result_tbl VALUES("143","3","4","9","3");
INSERT INTO exam_result_tbl VALUES("144","24","4","9","4");
INSERT INTO exam_result_tbl VALUES("145","25","4","9","3");
INSERT INTO exam_result_tbl VALUES("146","26","4","9","3");
INSERT INTO exam_result_tbl VALUES("147","27","4","9","3");
INSERT INTO exam_result_tbl VALUES("148","28","4","9","4");
INSERT INTO exam_result_tbl VALUES("149","29","4","9","4");
INSERT INTO exam_result_tbl VALUES("150","30","4","9","5");
INSERT INTO exam_result_tbl VALUES("151","1","5","12","55");
INSERT INTO exam_result_tbl VALUES("152","2","5","12","54");
INSERT INTO exam_result_tbl VALUES("153","3","5","12","50");
INSERT INTO exam_result_tbl VALUES("154","24","5","12","53");
INSERT INTO exam_result_tbl VALUES("155","25","5","12","52");
INSERT INTO exam_result_tbl VALUES("156","26","5","12","51");
INSERT INTO exam_result_tbl VALUES("157","27","5","12","45");
INSERT INTO exam_result_tbl VALUES("158","28","5","12","56");
INSERT INTO exam_result_tbl VALUES("159","29","5","12","56");
INSERT INTO exam_result_tbl VALUES("160","30","5","12","58");
INSERT INTO exam_result_tbl VALUES("161","4","1","21","45");
INSERT INTO exam_result_tbl VALUES("162","5","1","21","45");
INSERT INTO exam_result_tbl VALUES("163","6","1","21","35");
INSERT INTO exam_result_tbl VALUES("164","31","1","21","32");
INSERT INTO exam_result_tbl VALUES("165","32","1","21","32");
INSERT INTO exam_result_tbl VALUES("166","33","1","21","33");
INSERT INTO exam_result_tbl VALUES("167","34","1","21","45");
INSERT INTO exam_result_tbl VALUES("168","35","1","21","39");
INSERT INTO exam_result_tbl VALUES("169","36","1","21","44");
INSERT INTO exam_result_tbl VALUES("170","37","1","21","12");



DROP TABLE exam_tbl;

CREATE TABLE `exam_tbl` (
  `exid` int(11) NOT NULL AUTO_INCREMENT,
  `exname` varchar(15) NOT NULL,
  `marks` int(11) NOT NULL,
  PRIMARY KEY (`exid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO exam_tbl VALUES("1","Internal","50");
INSERT INTO exam_tbl VALUES("2","Unit Test 1","20");
INSERT INTO exam_tbl VALUES("3","Unit test 2","20");
INSERT INTO exam_tbl VALUES("4","Performance","5");
INSERT INTO exam_tbl VALUES("5","Practical","60");
INSERT INTO exam_tbl VALUES("6","Unit Test 3","20");



DROP TABLE faculty_sem_tbl;

CREATE TABLE `faculty_sem_tbl` (
  `fsid` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(10) NOT NULL,
  `sem` int(11) DEFAULT NULL,
  `fid` int(11) NOT NULL,
  PRIMARY KEY (`fsid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO faculty_sem_tbl VALUES("7","2017-2018","6","4");
INSERT INTO faculty_sem_tbl VALUES("8","2017-2018","4","5");
INSERT INTO faculty_sem_tbl VALUES("9","2017-2018","2","8");



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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO gd_topic_tbl VALUES("1","8","New","2018-12-29 01:03:06");



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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO mail_from_tbl VALUES("1","1","internal 30 report","Internal 30 report of sem 2&nbsp;","20180420192839_Internal 30 (1).xls","2018-04-20 07:28:39","0","0");
INSERT INTO mail_from_tbl VALUES("2","1","Signing the Documents","On behalf of your sign Mr. Mehul Chauhan Sir has signed in your documents","20180423221750_project header.png","2018-04-23 10:17:50","0","0");
INSERT INTO mail_from_tbl VALUES("3","5","Regarding signed","Thanks you sir for doing behalf sign ","","2018-04-23 10:47:01","0","0");
INSERT INTO mail_from_tbl VALUES("4","5","Regarding signed","Thank you sir for doing sign in documents on behalf of me","","2018-04-23 10:53:43","0","0");
INSERT INTO mail_from_tbl VALUES("5","1","This this","For this and this","20180424092459_Bootstrap.docx","2018-04-24 09:24:59","1","0");



DROP TABLE mail_to_tbl;

CREATE TABLE `mail_to_tbl` (
  `mtid` int(11) NOT NULL AUTO_INCREMENT,
  `mfid` int(11) NOT NULL,
  `mailto` int(11) NOT NULL,
  `isread` int(11) NOT NULL,
  `isdelete` int(11) NOT NULL,
  PRIMARY KEY (`mtid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO mail_to_tbl VALUES("1","1","8","1","0");
INSERT INTO mail_to_tbl VALUES("2","2","5","1","0");
INSERT INTO mail_to_tbl VALUES("3","3","1","1","0");
INSERT INTO mail_to_tbl VALUES("4","4","6","1","0");



DROP TABLE migrations;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE news_tbl;

CREATE TABLE `news_tbl` (
  `nid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `ndate` date NOT NULL,
  `ntime` time NOT NULL,
  `photo` text NOT NULL,
  `description` text NOT NULL,
  `enabled` varchar(1) NOT NULL,
  PRIMARY KEY (`nid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO news_tbl VALUES("1","Farewell Party Batch 2015","2018-04-20","09:00:00","20182804110828_IMG_3550.JPG,20182804110828_IMG_3495.JPG,","A Farewell party is arranged for the TY students of IQRA BCA COLLEGE batch 2015 on march 5th 2018","Y");
INSERT INTO news_tbl VALUES("2","TY Final Submission","2018-04-29","09:00:00","20183704073037_project header.png,","<b>TY final year project submission </b>is on 24-04-2018 at 9:00 AM onwards.<br>All the students of TY are requested to be on time on this day.<br><b>By. Prof. Divyesh Jadav&nbsp;</b>","Y");
INSERT INTO news_tbl VALUES("3","TY Project Submission","2018-04-29","09:00:00","20180504114705_project header.png,","The best wishes to all the students of TY Batch 2015 for their exam which will be on 24th of april 2018.<br>By. Principal Mr. Divyesh Jadav.","Y");



DROP TABLE student_sem_tbl;

CREATE TABLE `student_sem_tbl` (
  `smid` int(11) NOT NULL AUTO_INCREMENT,
  `studid` int(11) NOT NULL,
  `year` varchar(15) NOT NULL,
  `sem` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`smid`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

INSERT INTO student_sem_tbl VALUES("1","1","2017-2018","2");
INSERT INTO student_sem_tbl VALUES("2","2","2017-2018","2");
INSERT INTO student_sem_tbl VALUES("3","3","2017-2018","2");
INSERT INTO student_sem_tbl VALUES("4","4","2017-2018","4");
INSERT INTO student_sem_tbl VALUES("5","5","2017-2018","4");
INSERT INTO student_sem_tbl VALUES("6","6","2017-2018","4");
INSERT INTO student_sem_tbl VALUES("24","7","2017-2018","2");
INSERT INTO student_sem_tbl VALUES("25","8","2017-2018","2");
INSERT INTO student_sem_tbl VALUES("26","9","2017-2018","2");
INSERT INTO student_sem_tbl VALUES("27","10","2017-2018","2");
INSERT INTO student_sem_tbl VALUES("28","11","2017-2018","2");
INSERT INTO student_sem_tbl VALUES("29","12","2017-2018","2");
INSERT INTO student_sem_tbl VALUES("30","13","2017-2018","2");
INSERT INTO student_sem_tbl VALUES("31","14","2017-2018","4");
INSERT INTO student_sem_tbl VALUES("32","15","2017-2018","4");
INSERT INTO student_sem_tbl VALUES("33","16","2017-2018","4");
INSERT INTO student_sem_tbl VALUES("34","17","2017-2018","4");
INSERT INTO student_sem_tbl VALUES("35","18","2017-2018","4");
INSERT INTO student_sem_tbl VALUES("36","19","2017-2018","4");
INSERT INTO student_sem_tbl VALUES("37","20","2017-2018","4");
INSERT INTO student_sem_tbl VALUES("38","21","2017-2018","6");
INSERT INTO student_sem_tbl VALUES("39","22","2017-2018","6");
INSERT INTO student_sem_tbl VALUES("40","23","2017-2018","6");
INSERT INTO student_sem_tbl VALUES("41","24","2017-2018","6");
INSERT INTO student_sem_tbl VALUES("42","25","2017-2018","6");
INSERT INTO student_sem_tbl VALUES("43","26","2017-2018","6");
INSERT INTO student_sem_tbl VALUES("44","27","2017-2018","6");
INSERT INTO student_sem_tbl VALUES("45","28","2017-2018","6");
INSERT INTO student_sem_tbl VALUES("46","29","2017-2018","6");
INSERT INTO student_sem_tbl VALUES("47","30","2017-2018","6");



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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

INSERT INTO student_tbl VALUES("1","1701","Basheree","Tufel","Male","1997-03-10","2017","E17113180130001","asitponiya97@gmail.com","tufel123","Y","0","0","1524455244_0cc9be3117488a530ccefb1d78cd3c7e.jpg");
INSERT INTO student_tbl VALUES("2","1702","Bhura","Yamina","","","2017","E17113180130002","","","","0","0","");
INSERT INTO student_tbl VALUES("3","1703","Bapu","Husain","","","2017","E17113180130003","","","","0","0","");
INSERT INTO student_tbl VALUES("4","1601","Bapu","Halima","","","2016","E16113180110001","","","","0","0","");
INSERT INTO student_tbl VALUES("5","1602","Bapu","kulsum","","","2016","E16113180110002","","","","0","0","");
INSERT INTO student_tbl VALUES("6","1603","Bapu","Safwan","","","2016","E16113180110003","","","","0","0","");
INSERT INTO student_tbl VALUES("7","1705","Hira","Fahim","Male","2001-01-01","2017","E17113180130005","fahim@gmail.com","fahim123","Y","0","0","1524934206_55631912.jpg");
INSERT INTO student_tbl VALUES("8","1706","Kazi ","Aadil","","","2017","E17113180130006","","","","0","0","");
INSERT INTO student_tbl VALUES("9","1707","Langiya","Muhammad","Male","2000-03-01","2017","E17113180130007","langiya@gmail.com","langiya123","Y","0","0","1524290692_3 (4).jpg");
INSERT INTO student_tbl VALUES("10","1708","Natha","Asif","","","2017","E17113180130008","","","","0","0","");
INSERT INTO student_tbl VALUES("11","1709","Patel","Ateka","","","2017","E17113180130009","","","","0","0","");
INSERT INTO student_tbl VALUES("12","1710","Patel","Faizurrehman","","","2017","E17113180130010","","","","0","0","");
INSERT INTO student_tbl VALUES("13","1711","Patel","Khalisha","","","2017","E17113180130011","","","","0","0","");
INSERT INTO student_tbl VALUES("14","1604","Chavan","Aadil","","","2016","E16113180110004","","","","0","0","");
INSERT INTO student_tbl VALUES("15","1605","Dadabhai","Tarannum","","","2016","E16113180110005","","","","0","0","");
INSERT INTO student_tbl VALUES("16","1606","Damodar","Alfaj","","","2016","E16113180110006","","","","0","0","");
INSERT INTO student_tbl VALUES("17","1607","Dudhwala","Raeesa","Male","2000-02-02","2016","E16113180110007","raeesa@gmail.com","raeesa123","Y","0","0","1524934079_54033405.jpg");
INSERT INTO student_tbl VALUES("18","1608","Dudhwala","Rafia","","","2016","E16113180110008","","","","0","0","");
INSERT INTO student_tbl VALUES("19","1609","Malek","Avesh","","","2016","E16113180110009","","","","0","0","");
INSERT INTO student_tbl VALUES("20","1610","Gangat","Sikandar","","","2016","E16113180110010","","","","0","0","");
INSERT INTO student_tbl VALUES("21","1501","Aamir","Achhodi","","","2015","E15070318370001","","","","0","0","");
INSERT INTO student_tbl VALUES("22","1502","Akib","Dahya","","","2015","E15070318370002","","","","0","0","");
INSERT INTO student_tbl VALUES("23","1505","Faiza","Desai","","","2015","E15070318370005","","","","0","0","");
INSERT INTO student_tbl VALUES("24","1506","Diwan","Afrin","","","2015","E15070318370006","","","","0","0","");
INSERT INTO student_tbl VALUES("25","1509","Ghata","Shahin","","","2015","E15070318370009","","","","0","0","");
INSERT INTO student_tbl VALUES("26","1510","Jangariya","Shabnam","","","2015","E15070318370010","","","","0","0","");
INSERT INTO student_tbl VALUES("27","1511","Patel","Fatima","","","2015","E15070318370011","","","","0","0","");
INSERT INTO student_tbl VALUES("28","1513","Koribhai","Farhan","","","2015","E15070318370013","","","","0","0","");
INSERT INTO student_tbl VALUES("29","1516","Matadar","Mubassir","","","2015","E15070318370016","","","","0","0","");
INSERT INTO student_tbl VALUES("30","1517","Tagari","Ismail","","","2015","E15070318370017","","","","0","0","");



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
INSERT INTO subject_tbl VALUES("8","202","OB","2","8");
INSERT INTO subject_tbl VALUES("9","203","OS","2","7");
INSERT INTO subject_tbl VALUES("10","204","Advanced C","2","4");
INSERT INTO subject_tbl VALUES("11","205","DBMS","2","8");
INSERT INTO subject_tbl VALUES("12","206","Practical","2","");
INSERT INTO subject_tbl VALUES("13","301","Satatistics","3","");
INSERT INTO subject_tbl VALUES("14","302","SE-1","3","");
INSERT INTO subject_tbl VALUES("15","303","RDBMS","3","");
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



DROP TABLE users;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




DROP TABLE year_tbl;

CREATE TABLE `year_tbl` (
  `yid` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(10) NOT NULL,
  PRIMARY KEY (`yid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO year_tbl VALUES("1","2017-2018");



