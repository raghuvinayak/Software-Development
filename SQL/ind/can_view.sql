-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2017 at 01:40 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtest`
--

-- --------------------------------------------------------

--
-- Table structure for table `can_view`
--

CREATE TABLE `can_view` (
  `id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `sender_name` varchar(30) NOT NULL,
  `reciver` int(11) NOT NULL,
  `reciver_name` varchar(30) NOT NULL,
  `file_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `can_view`
--

INSERT INTO `can_view` (`id`, `sender`, `sender_name`, `reciver`, `reciver_name`, `file_id`) VALUES
(1, 1, 'chaitanya', 2, 'sai', '93033-resume-(1).pdf'),
(2, 1, 'chaitanya', 2, 'sai', '93033-resume-(1).pdf'),
(3, 2, 'sai', 1, 'chaitanya', '32173-resume.pdf'),
(4, 2, 'sai', 1, 'chaitanya', '32173-resume.pdf'),
(5, 1, 'chaitanya', 2, 'sai', '93033-resume-(1).pdf'),
(6, 1, 'chaitanya', 4, 'sri', '41074-pdfjoiner.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `can_view`
--
ALTER TABLE `can_view`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `can_view`
--
ALTER TABLE `can_view`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
