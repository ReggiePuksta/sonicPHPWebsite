-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 30, 2014 at 01:02 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sonic_fusion`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `eventId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(150) NOT NULL,
  `date` date NOT NULL,
  `starttime` time NOT NULL,
  `endtime` time NOT NULL,
  `location` char(150) NOT NULL,
  `detail` text CHARACTER SET utf8 COLLATE utf8_bin,
  PRIMARY KEY (`eventId`),
  KEY `title` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventId`, `title`, `date`, `starttime`, `endtime`, `location`, `detail`) VALUES
(1, 'Listening Cities Presentations Session 1', '2014-04-21', '10:00:00', '14:00:00', 'University of Salford', NULL),
(2, 'Listening Cities Presentation 2', '2014-04-21', '14:00:00', '20:30:00', 'University of Salford', NULL),
(3, 'Listening Cities Performance at the DockBar: Part1', '2014-04-21', '15:30:00', '17:00:00', 'DockBar, MediaCityUK Piazza, Salford, M50 2EQ', NULL),
(4, 'Listening Cities Performance at the DockBar: Part 2', '2014-04-21', '17:00:00', '19:30:00', 'DockBar, MediaCityUK Piazza, Salford, M50 2EQ', NULL),
(5, 'Carter Tutti: Harmonic Coaction supported by Holly Herndon', '2014-04-21', '18:30:00', '20:00:00', 'DockBar, MediaCityUK Piazza, Salford, M50 2EQ', NULL),
(6, 'Carter Tutti: Afterparty', '2014-04-22', '20:00:00', '22:00:00', 'DockBar, MediaCityUK Piazza, Salford, M50 2EQ', NULL),
(7, 'Listening Cities Presentation 3', '2014-04-22', '15:00:00', '20:00:00', 'University of Salford', NULL),
(8, 'SCAW Album Launch', '2014-04-22', '13:00:00', '15:00:00', '', NULL),
(9, 'Listening Cities Concerts', '2014-04-22', '15:30:00', '20:00:00', 'DockBar, MediaCityUK Piazza, Salford, M50 2EQ', 'Programme:\n\nIn-Somnia by Riccardo Catagnola (Tempo Reale, Italy) 7\nThumbs by David Berezan (University of Manchester) 12\nfragments are what the yew tree saw by John Lowndes (University of Salford) 8\n7412 by Manoli Moriaty (University of Salford) 8\nPromenade by Damiano Meacci (Tempo Reale, Italy) 8\n\nInterval - 15 minutes\n\nA programme of works from the GMVL Studios Lyons France\nFive extracts from ?Compositions ornithologiques? Bernard Fort (17)\nUne nuit by Mathieu Valette (9)\nReflets by Nils Potet (10)\nTwo pieces from ?L?illusion Acoustique? Marc Favre (20?)'),
(10, 'Loscil and Roberto Fabbricciani', '2014-04-23', '19:30:00', '21:00:00', '', NULL),
(11, 'Super boom next level sounds', '2014-04-23', '19:00:00', '21:00:00', 'Media City', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
