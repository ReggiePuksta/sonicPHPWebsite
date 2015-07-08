-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 22, 2014 at 01:27 PM
-- Server version: 5.5.31-0+wheezy1
-- PHP Version: 5.5.1-1~dotdeb.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sonic_festival`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `OrderNumber` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  UNIQUE KEY `OrderNumber` (`OrderNumber`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`OrderNumber`, `name`) VALUES
(1, 'bkla'),
(2, 'hahah');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `eventId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(150) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `location` char(150) NOT NULL,
  `detail` text,
  PRIMARY KEY (`eventId`),
  KEY `title` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventId`, `title`, `date`, `time`, `location`, `detail`) VALUES
(1, 'Listening Cities Presentations Session 1', '2014-03-21', '11:30:00', 'University of Salford', NULL),
(2, 'Listening Cities Presentation 2', '2014-03-21', '14:00:00', 'University of Salford', NULL),
(3, 'Listening Cities Performance at the DockBar: Part1', '2014-03-21', '15:30:00', 'DockBar, MediaCityUK Piazza, Salford, M50 2EQ', NULL),
(4, 'Listening Cities Performance at the DockBar: Part 2', '2014-03-21', '17:00:00', 'DockBar, MediaCityUK Piazza, Salford, M50 2EQ', NULL),
(5, 'Carter Tutti: Harmonic Coaction supported by Holly Herndon', '2014-03-21', '19:30:00', 'DockBar, MediaCityUK Piazza, Salford, M50 2EQ', NULL),
(6, 'Carter Tutti: Afterparty', '2014-03-21', '22:00:00', 'DockBar, MediaCityUK Piazza, Salford, M50 2EQ', NULL),
(7, 'Listening Cities Presentation 3', '2014-03-22', '10:00:00', 'University of Salford', NULL),
(8, 'SCAW Album Launch', '2014-03-22', '13:00:00', '', NULL),
(9, 'Listening Cities Concerts', '2014-02-22', '15:30:00', 'DockBar, MediaCityUK Piazza, Salford, M50 2EQ', 'Programme:\n\nIn-Somnia by Riccardo Catagnola (Tempo Reale, Italy) 7’\nThumbs by David Berezan (University of Manchester) 12’\nfragments are what the yew tree saw by John Lowndes (University of Salford) 8’\n‘7412’ by Manoli Moriaty (University of Salford) 8’\nPromenade by Damiano Meacci (Tempo Reale, Italy) 8’\n\nInterval - 15 minutes\n\nA programme of works from the GMVL Studios Lyons France\nFive extracts from “Compositions ornithologiques” Bernard Fort (17’)\nUne nuit by Mathieu Valette (9’)\nReflets by Nils Potet (10’)\nTwo pieces from “L’illusion Acoustique” Marc Favre (20’)'),
(10, 'Loscil and Roberto Fabbricciani', '2014-03-22', '19:30:00', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `orderID` int(11) NOT NULL AUTO_INCREMENT,
  `customerID` int(11) NOT NULL,
  `eventid` int(11) NOT NULL,
  `dateorder` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`orderID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `customerID`, `eventid`, `dateorder`) VALUES
(33, 76, 1, '2014-02-21 14:11:38'),
(34, 76, 3, '2014-02-21 14:11:38'),
(35, 76, 7, '2014-02-21 14:11:38');

-- --------------------------------------------------------

--
-- Table structure for table `ordersplit`
--

CREATE TABLE IF NOT EXISTS `ordersplit` (
  `orderid` tinyint(4) NOT NULL,
  `eventid` tinyint(4) NOT NULL,
  KEY `orderid` (`orderid`,`eventid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordersplit`
--

INSERT INTO `ordersplit` (`orderid`, `eventid`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `customerid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `regdate` varchar(200) NOT NULL,
  `CpassReqDate` varchar(200) NOT NULL,
  PRIMARY KEY (`customerid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=79 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`customerid`, `username`, `password`, `firstname`, `lastname`, `email`, `regdate`, `CpassReqDate`) VALUES
(7, 'yo', 'hoho', '', '', '', '', ''),
(8, 'Reggie', 'ab6b84f75e5ea30ba5c381302944ace6c0b6ed1e', 'Reggie', 'Puksta', 'pasda@gmail.com', '', ''),
(12, 'yo', '09eac806635b37de93ae6f168a783e0fd24f0daf', 'Reggie', 'Puksta', '', '', ''),
(14, 'Dave', 'bd73d35759d75cc215150d1bbc94f1b1078bee01', 'Dave', 'Eus', '', '', ''),
(15, 'Chrissy.Scarrio', 'a9fd364f3f5d5d7c306fba2ffd5eac31c68f72a0', 'Chrissy', 'Scarrio', 'chris.scarr@outlook.com', '', ''),
(24, 'fuckumr', 'f10e2821bbbea527ea02200352313bc059445190', '\\///dwqwd', '///zqw23464758*^&^', '', '', ''),
(67, 'asd', 'f10e2821bbbea527ea02200352313bc059445190', 'asd', 'as', '', '', ''),
(68, 'asd', 'f10e2821bbbea527ea02200352313bc059445190', 'asd', 'as', '', '', ''),
(69, 'as', 'df211ccdd94a63e0bcb9e6ae427a249484a49d60', 'asss', 'sss', '', '', ''),
(70, 'as', 'df211ccdd94a63e0bcb9e6ae427a249484a49d60', 'asss', 'sss', '', '', ''),
(71, 'Reggie', '9a86ebba6ee02886bac2e9149d9e5286ac068522', 'asss', 'aaaa', 'pgaso@gmail.com', '', ''),
(72, 'qqwaw', 'c8a9d4cbf2846f6a9738551601048dda89f2bcfe', 'qqq', 'aaa', 'pgaso@gmail.com', '', ''),
(73, '1222', 'fea7f657f56a2a448da7d4b535ee5e279caf3d9a', '333', '3333', '', '', ''),
(74, '1233', '13b4a0439cfee968077c531ae673030383867462', 'qwd', 'asda', '', '', ''),
(75, 'qwaas', '9c910d5e61ffa9e77a1da33c8426b57f35682e97', 'asda', 'adccc', 'Pga@gmail.com', '', ''),
(76, 'NoWay', '05aef7e977a5460dc3c127912fe1567fcce1c4c4', 'hoho', 'hoho', 'pgaso@gmail.com', '', ''),
(77, 'reggie', '568dd2bcf84fec0ae1ebc98a12b8149032fbdf70', 'as', 'asa', 'pgaso@gmail.com', '', ''),
(78, 'Regi5', '62574fe6fcce32906e1f666b5b26808969549b7f', 'Regimantas', 'Puksta', 'pgaso4@gmail.com', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
