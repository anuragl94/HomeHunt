-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 20, 2015 at 01:42 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `homehunt`
--
CREATE DATABASE IF NOT EXISTS `homehunt` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `homehunt`;

-- --------------------------------------------------------

--
-- Table structure for table `buyertenant`
--

CREATE TABLE IF NOT EXISTS `buyertenant` (
  `User_ID` int(11) NOT NULL,
  `MinBudget` int(11) NOT NULL,
  `MaxBudget` int(11) NOT NULL,
  `Rooms` int(1) NOT NULL,
  `Area` varchar(30) NOT NULL,
  `City` varchar(30) NOT NULL,
  `Role` varchar(30) NOT NULL COMMENT 'Buyer or tenant?',
  PRIMARY KEY (`User_ID`,`Rooms`,`Area`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyertenant`
--

INSERT INTO `buyertenant` (`User_ID`, `MinBudget`, `MaxBudget`, `Rooms`, `Area`, `City`, `Role`) VALUES
(1, 10000, 20000, 2, 'Hebbal', 'Bangalore', 'tenant');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE IF NOT EXISTS `property` (
  `PropertyID` int(11) NOT NULL AUTO_INCREMENT,
  `Area` varchar(30) NOT NULL,
  `City` varchar(30) NOT NULL,
  `NoOfRooms` int(1) NOT NULL,
  `QuotedPrice` int(11) NOT NULL,
  `PropertyName` varchar(30) NOT NULL,
  `Zipcode` int(11) NOT NULL,
  `HouseNo` varchar(30) NOT NULL,
  `StreetNo` varchar(30) NOT NULL,
  `Image` varchar(30) NOT NULL,
  `PropertyUpFor` varchar(30) NOT NULL,
  PRIMARY KEY (`PropertyID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`PropertyID`, `Area`, `City`, `NoOfRooms`, `QuotedPrice`, `PropertyName`, `Zipcode`, `HouseNo`, `StreetNo`, `Image`, `PropertyUpFor`) VALUES
(1, 'Banashankari', 'Bangalore', 3, 140000, 'Hola homes', 560085, 'NB602', '100 ft ring road', 'inurface.png', 'Rent');

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire`
--

CREATE TABLE IF NOT EXISTS `questionnaire` (
  `Questionnaire_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Area` varchar(30) NOT NULL,
  `NoOfRoomies` int(1) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Language` varchar(30) NOT NULL,
  `Vegetarian` tinyint(1) NOT NULL,
  `HaveAFlat` tinyint(1) NOT NULL,
  PRIMARY KEY (`Questionnaire_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `questionnaire`
--

INSERT INTO `questionnaire` (`Questionnaire_ID`, `Area`, `NoOfRoomies`, `Gender`, `Language`, `Vegetarian`, `HaveAFlat`) VALUES
(1, 'Hebbal', 3, 'Male', 'English', 0, 0),
(2, 'Hebbal', 3, 'Female', 'English', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `roomieseeker`
--

CREATE TABLE IF NOT EXISTS `roomieseeker` (
  `User_ID` int(11) NOT NULL,
  `Questionnaire_ID` int(11) NOT NULL,
  PRIMARY KEY (`User_ID`,`Questionnaire_ID`),
  KEY `Questionnaire_ID` (`Questionnaire_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roomieseeker`
--

INSERT INTO `roomieseeker` (`User_ID`, `Questionnaire_ID`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sellorlessor`
--

CREATE TABLE IF NOT EXISTS `sellorlessor` (
  `User_ID` int(11) NOT NULL,
  `PropertyID` int(11) NOT NULL,
  PRIMARY KEY (`User_ID`,`PropertyID`),
  KEY `PropertyID` (`PropertyID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `User_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Gender` varchar(6) NOT NULL,
  `DOB` date NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `Mail` varchar(30) NOT NULL,
  `Contact` bigint(20) NOT NULL,
  `City` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  PRIMARY KEY (`User_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `Gender`, `DOB`, `FirstName`, `LastName`, `Mail`, `Contact`, `City`, `Password`) VALUES
(1, 'Male', '1994-08-10', 'Anurag', 'L', 'mailer@admin.com', 93849, 'Bangalore', 'pass'),
(2, 'Female', '2000-07-16', 'Arpita', 'Sairam', 'mail@iamilliterate.in', 923525, 'Bangalore', 'qwerty');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buyertenant`
--
ALTER TABLE `buyertenant`
  ADD CONSTRAINT `buyertenant_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`);

--
-- Constraints for table `roomieseeker`
--
ALTER TABLE `roomieseeker`
  ADD CONSTRAINT `roomieseeker_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`),
  ADD CONSTRAINT `roomieseeker_ibfk_2` FOREIGN KEY (`Questionnaire_ID`) REFERENCES `questionnaire` (`Questionnaire_ID`);

--
-- Constraints for table `sellorlessor`
--
ALTER TABLE `sellorlessor`
  ADD CONSTRAINT `sellorlessor_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`),
  ADD CONSTRAINT `sellorlessor_ibfk_2` FOREIGN KEY (`PropertyID`) REFERENCES `property` (`PropertyID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
