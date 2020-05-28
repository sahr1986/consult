-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2019 at 02:31 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `consult`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `contactID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `contact_fullname` varchar(100) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `contact_subject` varchar(100) NOT NULL,
  `contact_message` varchar(1000) NOT NULL,
  PRIMARY KEY (`contactID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE IF NOT EXISTS `request` (
  `userEmail` varchar(50) DEFAULT NULL,
  `address` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `requestID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`requestID`),
  KEY `userEmail` (`userEmail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`userEmail`, `address`, `phone_number`, `description`, `requestID`) VALUES
('andrew@gmail.com', 'andrew', 'aaff', 'andrep', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userFullname` varchar(50) NOT NULL,
  `userEmail` varchar(50) NOT NULL,
  `userPassword` char(40) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `userEmail` (`userEmail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userFullname`, `userEmail`, `userPassword`, `date_added`) VALUES
(1, 'Andrew', 'andrew@gmail.com', 'ede97ea39ebf0d551507a7967f59c2e2d3046cf0', '2019-02-06 21:19:15'),
(2, 'sahr nayka', 'nyaka@gmail.com', '71f22a8092530841ed33dfe0fd5ca006c067b9a0', '2019-02-08 23:27:53');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `Request_ibfk_1` FOREIGN KEY (`userEmail`) REFERENCES `users` (`userEmail`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
