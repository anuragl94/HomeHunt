-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2015 at 04:39 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `homehunt`
--

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE IF NOT EXISTS `property` (
`PropertyID` int(11) NOT NULL,
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
  `User_ID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`PropertyID`, `Area`, `City`, `NoOfRooms`, `QuotedPrice`, `PropertyName`, `Zipcode`, `HouseNo`, `StreetNo`, `Image`, `PropertyUpFor`, `User_ID`) VALUES
(1, 'Banashankari', 'Bangalore', 3, 140000, 'Hola Homes', 560085, 'NB602', '100', '', 'Rent', 10),
(2, 'Hebbal', 'Bangalore', 2, 15000, 'Magan Silverhill', 560024, '219', '80', '', 'Rent', 11),
(3, 'Hebbal', 'Bangalore', 2, 1700000, 'Sterling Terraces', 560024, '24', '204', '', 'Sale', 9),
(4, 'Hebbal', 'Bangalore', 3, 3000000, 'Magan', 560024, '204', '6', '', 'Sale', 7);

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire`
--

CREATE TABLE IF NOT EXISTS `questionnaire` (
`Questionnaire_ID` int(11) NOT NULL,
  `Area` varchar(30) NOT NULL,
  `City` varchar(30) NOT NULL,
  `Language` varchar(30) NOT NULL,
  `Vegetarian` tinyint(1) NOT NULL,
  `NoOfRoomies` int(11) NOT NULL,
  `Gender` varchar(30) NOT NULL,
  `HaveAFlat` tinyint(1) NOT NULL,
  `User_ID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionnaire`
--

INSERT INTO `questionnaire` (`Questionnaire_ID`, `Area`, `City`, `Language`, `Vegetarian`, `NoOfRoomies`, `Gender`, `HaveAFlat`, `User_ID`) VALUES
(1, 'Hebbal', 'Bangalore', 'English', 0, 3, 'Male', 0, 1),
(2, 'Hebbal', 'Bangalore', 'English', 1, 3, 'Female', 1, 2),
(3, 'Hebbal', 'Bangalore', 'English', 0, 4, 'Male', 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`User_ID` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `DOB` date NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `Mail` varchar(30) NOT NULL,
  `Contact` bigint(20) NOT NULL,
  `City` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `username`, `Gender`, `DOB`, `FirstName`, `LastName`, `Mail`, `Contact`, `City`, `Password`) VALUES
(1, 'anurag', 'Male', '1994-08-10', 'Anurag', 'L', 'mailer@admin.com', 9384900000, 'Bangalore', 'pass'),
(2, 'asai', 'Female', '2000-07-16', 'Arpita', 'Sairam', 'mail@iamilliterate.in', 9235250000, 'Bangalore', 'qwerty'),
(3, 'anjana', 'Female', '1992-10-20', 'Anjana', 'Menon', 'anj4494@gmail.com', 8499303033, 'Bangalore', 'qwertyQ1'),
(4, 'njhanji', 'Male', '1990-04-08', 'Nikhil', 'Jhanji', 'nikhiljhanji19@gmail.com', 9993432339, 'Bangalore', 'qwertyQ1'),
(5, 'deepthi', 'Female', '1994-01-11', 'Deepti', 'Pandey', 'deepti@gmail.com', 8320030326, 'Bangalore', 'qwertyQ1'),
(6, 'ankitha', 'Female', '1990-04-05', 'Ankitha', 'Sriram', 'ankithasri22@gmail.com', 8399830939, 'Bangalore', 'qwertyQ1'),
(7, 'amber', 'Male', '1985-04-06', 'Amber', 'Chugh', 'amber@gmail.com', 9932147137, 'Bangalore', 'qwertyQ11'),
(8, 'nishanth', 'Male', '1995-04-05', 'Nishanth', 'Prabhu', 'nishanth@gmail.com', 8992300201, 'Bangalore', 'qwertyQ123'),
(9, 'anupama', 'Female', '1994-04-05', 'Anupama', 'Dhareshwar', 'anupamad@gmail.com', 9839038321, 'Bangalore', 'qwertyQ12'),
(10, 'aishini', 'Female', '1985-04-01', 'Aishini', 'Sinha', 'aishsinha@gmail.com', 8999000982, 'Bangalore', 'qwertyQ1'),
(11, 'shivam', 'Male', '1995-04-06', 'Shivam', 'Agarwal', 'shivamsid@gmail.com', 8909008002, 'Bangalore', 'qwertyQ123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `property`
--
ALTER TABLE `property`
 ADD PRIMARY KEY (`PropertyID`,`User_ID`), ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `questionnaire`
--
ALTER TABLE `questionnaire`
 ADD PRIMARY KEY (`Questionnaire_ID`,`User_ID`), ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`User_ID`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
MODIFY `PropertyID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `questionnaire`
--
ALTER TABLE `questionnaire`
MODIFY `Questionnaire_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `property`
--
ALTER TABLE `property`
ADD CONSTRAINT `property_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`);

--
-- Constraints for table `questionnaire`
--
ALTER TABLE `questionnaire`
ADD CONSTRAINT `questionnaire_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
