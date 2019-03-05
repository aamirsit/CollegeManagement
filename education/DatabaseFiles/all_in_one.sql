-- phpMyAdmin SQL Dump
-- version 2.10.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Jan 11, 2011 at 08:51 PM
-- Server version: 5.0.45
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `all_in_one`
-- 
CREATE DATABASE `all_in_one` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `all_in_one`;

-- --------------------------------------------------------

-- 
-- Table structure for table `stud`
-- 

CREATE TABLE `stud` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `sem` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- 
-- Dumping data for table `stud`
-- 

INSERT INTO `stud` (`id`, `name`, `sem`) VALUES 
(0, '1223', '1223'),
(7, 'asasas', 'dfdf'),
(8, 'juned', 'Ansari'),
(9, 'juned1', 'Ansari1'),
(11, 'MscIT', 'Ansari1');

-- --------------------------------------------------------

-- 
-- Table structure for table `sysadmin`
-- 

CREATE TABLE `sysadmin` (
  `username` varchar(255) NOT NULL default '',
  `password` varchar(255) NOT NULL default ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `sysadmin`
-- 

INSERT INTO `sysadmin` (`username`, `password`) VALUES 
('admin', 'admin'),
('pacerit', '35350');
