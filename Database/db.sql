-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 23, 2017 at 06:04 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbtest`
--

-- --------------------------------------------------------

--
-- Table structure for table `can_edit`
--

CREATE TABLE IF NOT EXISTS `can_edit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` int(11) NOT NULL,
  `sender_name` varchar(30) NOT NULL,
  `reciver` int(11) NOT NULL,
  `reciver_name` varchar(30) NOT NULL,
  `file_id` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `can_edit`
--


-- --------------------------------------------------------

--
-- Table structure for table `can_view`
--

CREATE TABLE IF NOT EXISTS `can_view` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` int(11) NOT NULL,
  `sender_name` varchar(30) NOT NULL,
  `reciver` int(11) NOT NULL,
  `reciver_name` varchar(30) NOT NULL,
  `file_id` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `can_view`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_directory`
--

CREATE TABLE IF NOT EXISTS `tbl_directory` (
  `dir_id` int(11) NOT NULL AUTO_INCREMENT,
  `dir_userId` int(11) NOT NULL,
  `dir_name` varchar(255) NOT NULL,
  `dir_status` int(11) NOT NULL,
  `dir_created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dir_type` varchar(255) NOT NULL,
  `dir_size` varchar(255) NOT NULL,
  PRIMARY KEY (`dir_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_directory`
--

INSERT INTO `tbl_directory` (`dir_id`, `dir_userId`, `dir_name`, `dir_status`, `dir_created_date`, `dir_type`, `dir_size`) VALUES
(1, 1, 'test_1', 1, '2017-10-23 16:10:54', 'root', ''),
(2, 1, 'test', 1, '2017-10-23 16:19:38', '', ''),
(3, 1, 'testone', 1, '2017-10-23 16:24:54', '', ''),
(4, 1, 'Suneel', 1, '2017-10-23 19:02:12', '', '1'),
(6, 1, 'asfs sdfsd', 1, '2017-10-23 19:58:31', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_uploads`
--

CREATE TABLE IF NOT EXISTS `tbl_uploads` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `file` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL,
  `size` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `file_status` int(11) NOT NULL,
  `file_dir_id` varchar(255) NOT NULL,
  `f_current_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tbl_uploads`
--

INSERT INTO `tbl_uploads` (`id`, `file`, `type`, `size`, `userId`, `file_status`, `file_dir_id`, `f_current_time`) VALUES
(1, '52116-1507828802alfa3.gif', 'image/gif', 29, 1, 1, '2', '2017-10-23 16:28:10'),
(2, '80211-1814434250ccc_banner1.jpg', 'image/jpeg', 74, 1, 1, '2', '2017-10-23 16:28:25'),
(3, '67528-15016768791491712544sss1.jpg', 'image/jpeg', 9, 1, 1, '3', '2017-10-23 16:28:38'),
(4, '19064-awt.png', 'image/png', 97, 1, 1, '3', '2017-10-23 16:28:49'),
(5, '52116-1507828802alfa3.gif', 'image/gif', 29, 1, 1, '3', '2017-10-23 16:28:10'),
(6, '80211-1814434250ccc_banner1.jpg', 'image/jpeg', 74, 1, 1, '3', '2017-10-23 16:28:25'),
(21, '74498-img-20171005-wa0000.jpg', 'image/jpeg', 202, 1, 1, '4', '2017-10-23 19:20:32'),
(20, '14360-img-20171005-wa0000.jpg', 'image/jpeg', 202, 1, 1, '4', '2017-10-23 19:20:26'),
(19, '45186-img-20171005-wa0000.jpg', 'image/jpeg', 202, 1, 1, '4', '2017-10-23 19:20:21'),
(18, '96544-img-20171005-wa0000.jpg', 'image/jpeg', 202, 1, 1, '4', '2017-10-23 19:20:10'),
(17, '46763-img-20171005-wa0000.jpg', 'image/jpeg', 202, 1, 1, '4', '2017-10-23 19:20:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `userFoldername` varchar(255) NOT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `userEmail` (`userEmail`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`, `userFoldername`) VALUES
(1, 'test', 'test@gmail.com', '8622f0f69c91819119a8acf60a248d7b36fdb7ccf857ba8f85cf7f2767ff8265', 'test_1');
