-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jun 05, 2020 at 11:14 AM
-- Server version: 5.7.28
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forte`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

DROP TABLE IF EXISTS `adminlogin`;
CREATE TABLE IF NOT EXISTS `adminlogin` (
  `AdminId` bigint(20) NOT NULL,
  `AdminName` varchar(100) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `isNull` tinyint(1) NOT NULL,
  PRIMARY KEY (`AdminId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`AdminId`, `AdminName`, `Password`, `isActive`, `isNull`) VALUES
(1, 'admin', 'admin123', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categorymaster`
--

DROP TABLE IF EXISTS `categorymaster`;
CREATE TABLE IF NOT EXISTS `categorymaster` (
  `CategoryMasterId` bigint(20) NOT NULL,
  `CategoryMasterName` varchar(200) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `isUpdatedBy` int(11) NOT NULL,
  `isCreatedBy` int(11) NOT NULL,
  `isUpdatedOn` int(11) NOT NULL,
  `isCreatedOn` int(11) NOT NULL,
  PRIMARY KEY (`CategoryMasterId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorymaster`
--

INSERT INTO `categorymaster` (`CategoryMasterId`, `CategoryMasterName`, `isActive`, `isUpdatedBy`, `isCreatedBy`, `isUpdatedOn`, `isCreatedOn`) VALUES
(1, 'Fine Arts', 1, 1, 1, 20200229, 20200229),
(2, 'Literature', 1, 2, 2, 20200324, 20200324),
(3, 'Cinematography', 1, 1, 1, 20200409, 20200409);

-- --------------------------------------------------------

--
-- Table structure for table `competitionmaster`
--

DROP TABLE IF EXISTS `competitionmaster`;
CREATE TABLE IF NOT EXISTS `competitionmaster` (
  `CompetitionMasterId` bigint(20) NOT NULL AUTO_INCREMENT,
  `EventId` bigint(20) NOT NULL,
  `StudentId` bigint(20) NOT NULL,
  `UploadFilePath` varchar(200) NOT NULL,
  `UploadDate` date NOT NULL,
  `isCreatedBy` bigint(20) NOT NULL,
  `isUpdatedBy` bigint(20) NOT NULL,
  PRIMARY KEY (`CompetitionMasterId`),
  KEY `EventId` (`EventId`),
  KEY `StudentId` (`StudentId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `EmailId` varchar(100) NOT NULL,
  `College` varchar(5) NOT NULL,
  `Query` varchar(500) NOT NULL,
  `Reply` int(2) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`Id`, `Name`, `EmailId`, `College`, `Query`, `Reply`) VALUES
(1, 'Jay Parekh', 'jsparekh128@gmail.com', 'MBIT', 'When will be my account verified?', 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `EventId` bigint(20) NOT NULL,
  `EventName` varchar(200) NOT NULL,
  `EventStartDate` date NOT NULL,
  `EventEndDate` date NOT NULL,
  `CategoryMasterId` bigint(20) NOT NULL,
  `SubCategoryMasterId` bigint(20) NOT NULL,
  `FileType` int(2) NOT NULL,
  `NumberOfFiles` int(2) NOT NULL,
  `EventDescription` varchar(500) DEFAULT NULL,
  `OrganizationId` bigint(20) NOT NULL,
  `isWinner` int(2) DEFAULT NULL,
  `isUpdatedBy` int(11) NOT NULL,
  `isCreatedBy` int(11) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `isNull` tinyint(1) NOT NULL,
  PRIMARY KEY (`EventId`),
  KEY `CategoryMasterId` (`CategoryMasterId`),
  KEY `SubCategoryMasterId` (`SubCategoryMasterId`),
  KEY `OrganizationId` (`OrganizationId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`EventId`, `EventName`, `EventStartDate`, `EventEndDate`, `CategoryMasterId`, `SubCategoryMasterId`, `FileType`, `NumberOfFiles`, `EventDescription`, `OrganizationId`, `isWinner`, `isUpdatedBy`, `isCreatedBy`, `isActive`, `isNull`) VALUES
(1, 'Art Competition', '2020-04-01', '2020-04-06', 1, 1, 1, 3, 'This event is for caricature competition. Upload your best picture!', 1, 1, 1, 1, 1, 0),
(2, 'Drawing Competition', '2020-04-03', '2020-04-06', 1, 1, 2, 1, 'Upload your mini drawing video of caricature.!', 1, 1, 1, 1, 1, 0),
(3, 'Doodle', '2020-04-09', '2020-04-16', 1, 1, 1, 2, 'Best Doodling Competition Ever!', 1, 1, 1, 1, 1, 0),
(4, 'Short FIlms', '2020-04-12', '2020-04-16', 3, 2, 2, 1, 'Oh! This is best event!', 1, 1, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `organizationdetail`
--

DROP TABLE IF EXISTS `organizationdetail`;
CREATE TABLE IF NOT EXISTS `organizationdetail` (
  `OrganizationId` bigint(20) NOT NULL,
  `OrganizationName` varchar(200) NOT NULL,
  `Address` varchar(300) NOT NULL,
  `OrganizationImage` varchar(300) DEFAULT NULL,
  `City` varchar(20) DEFAULT NULL,
  `MobileNo` varchar(10) DEFAULT NULL,
  `EmailId` varchar(300) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `isNull` tinyint(1) NOT NULL,
  `isCreatedBy` int(11) NOT NULL,
  `isUpdatedBy` int(11) NOT NULL,
  PRIMARY KEY (`OrganizationId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organizationdetail`
--

INSERT INTO `organizationdetail` (`OrganizationId`, `OrganizationName`, `Address`, `OrganizationImage`, `City`, `MobileNo`, `EmailId`, `Password`, `isActive`, `isNull`, `isCreatedBy`, `isUpdatedBy`) VALUES
(1, 'Smile Foundation', 'A-653,Saurabh Park Society, B/H Samta Society, Laxmipura, Subhanpura', 'ProfileImages/IMG_20181121_172411_875.jpg', 'Vadodara', '9586972992', 'jsparekh128@gmail.com', 'WFMrc3VUSkQzdDF1aDZDOU5PdkNmdz09', 1, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `org_events`
--

DROP TABLE IF EXISTS `org_events`;
CREATE TABLE IF NOT EXISTS `org_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `org_events`
--

INSERT INTO `org_events` (`id`, `title`, `start`, `end`) VALUES
(14, 'Music', '2020-04-05 00:00:00', '2020-04-09 00:00:00'),
(12, 'Meeting', '2020-04-01 00:00:00', '2020-04-04 00:00:00'),
(13, 'Dance Event', '2020-04-04 00:00:00', '2020-04-08 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `participationmaster`
--

DROP TABLE IF EXISTS `participationmaster`;
CREATE TABLE IF NOT EXISTS `participationmaster` (
  `ParticipationMasterId` bigint(20) NOT NULL AUTO_INCREMENT,
  `EventId` bigint(20) NOT NULL,
  `ParticipationDate` date NOT NULL,
  `StudentId` bigint(20) NOT NULL,
  PRIMARY KEY (`ParticipationMasterId`),
  KEY `EventId` (`EventId`),
  KEY `StudentId` (`StudentId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studentdetail`
--

DROP TABLE IF EXISTS `studentdetail`;
CREATE TABLE IF NOT EXISTS `studentdetail` (
  `StudentId` bigint(20) NOT NULL,
  `StudentName` varchar(50) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Address` varchar(300) NOT NULL,
  `Age` int(11) NOT NULL,
  `EmailId` varchar(300) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `StartYear` year(4) DEFAULT NULL,
  `EndYear` year(4) DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL,
  `isCreatedBy` int(11) NOT NULL,
  `isUpdatedBy` int(11) NOT NULL,
  `isNull` tinyint(1) NOT NULL,
  `UserId` varchar(50) NOT NULL,
  `Bio` varchar(1000) DEFAULT NULL,
  `ProfileImage` varchar(300) DEFAULT NULL,
  `VerificationFile` varchar(300) DEFAULT NULL,
  `Token` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`StudentId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentdetail`
--

INSERT INTO `studentdetail` (`StudentId`, `StudentName`, `Gender`, `Address`, `Age`, `EmailId`, `Password`, `StartYear`, `EndYear`, `isActive`, `isCreatedBy`, `isUpdatedBy`, `isNull`, `UserId`, `Bio`, `ProfileImage`, `VerificationFile`, `Token`) VALUES
(1, 'Ria Chawda', 'female', 'VADODARA	', 22, 'jsparekh128@gmail.com', 'WFMrc3VUSkQzdDF1aDZDOU5PdkNmdz09', 2018, 2022, 1, 1, 1, 0, 'jsparekh128', 'I love dance, music, food, art, paint                  ', 'ProfileImages/IMG_20180917_091733.jpg', 'VerificationUploads/1482943.jpg', '3238333135');

-- --------------------------------------------------------

--
-- Table structure for table `subcategorymaster`
--

DROP TABLE IF EXISTS `subcategorymaster`;
CREATE TABLE IF NOT EXISTS `subcategorymaster` (
  `SubCategoryMasterId` bigint(20) NOT NULL,
  `SubCategoryMasterName` varchar(200) NOT NULL,
  `CategoryMasterId` bigint(20) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `isNull` tinyint(1) NOT NULL,
  `isCreatedBy` int(11) NOT NULL,
  `isUpdatedBy` int(11) NOT NULL,
  PRIMARY KEY (`SubCategoryMasterId`),
  KEY `CategoryMasterId` (`CategoryMasterId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategorymaster`
--

INSERT INTO `subcategorymaster` (`SubCategoryMasterId`, `SubCategoryMasterName`, `CategoryMasterId`, `isActive`, `isNull`, `isCreatedBy`, `isUpdatedBy`) VALUES
(1, 'Caricature', 1, 1, 0, 1, 1),
(2, 'Videography', 3, 1, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

DROP TABLE IF EXISTS `tbl_events`;
CREATE TABLE IF NOT EXISTS `tbl_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_events`
--

INSERT INTO `tbl_events` (`id`, `title`, `start`, `end`) VALUES
(13, 'Meeting', '2020-04-10 00:00:00', '2020-04-11 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `uploadmaster`
--

DROP TABLE IF EXISTS `uploadmaster`;
CREATE TABLE IF NOT EXISTS `uploadmaster` (
  `UploadMasterId` bigint(20) NOT NULL AUTO_INCREMENT,
  `StudentId` bigint(20) NOT NULL,
  `CategoryMasterId` bigint(20) NOT NULL,
  `SubCategoryMasterId` bigint(20) NOT NULL,
  `UploadPath` varchar(500) NOT NULL,
  `UploadDate` date NOT NULL,
  `UploadTime` time NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `isNull` tinyint(1) NOT NULL,
  `isUpdatedBy` int(11) NOT NULL,
  `isCreatedBy` int(11) NOT NULL,
  `UploadFileType` int(2) DEFAULT NULL,
  PRIMARY KEY (`UploadMasterId`),
  KEY `StudentId` (`StudentId`),
  KEY `CategoryMasterId` (`CategoryMasterId`),
  KEY `SubCategoryMasterId` (`SubCategoryMasterId`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `winnermaster`
--

DROP TABLE IF EXISTS `winnermaster`;
CREATE TABLE IF NOT EXISTS `winnermaster` (
  `WinnerMasterId` bigint(20) NOT NULL AUTO_INCREMENT,
  `EventId` bigint(20) NOT NULL,
  `StudentId` bigint(20) NOT NULL,
  PRIMARY KEY (`WinnerMasterId`),
  KEY `EventId` (`EventId`),
  KEY `StudentId` (`StudentId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `competitionmaster`
--
ALTER TABLE `competitionmaster`
  ADD CONSTRAINT `competitionmaster_ibfk_1` FOREIGN KEY (`EventId`) REFERENCES `events` (`EventId`),
  ADD CONSTRAINT `competitionmaster_ibfk_2` FOREIGN KEY (`StudentId`) REFERENCES `studentdetail` (`StudentId`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`CategoryMasterId`) REFERENCES `categorymaster` (`CategoryMasterId`),
  ADD CONSTRAINT `events_ibfk_3` FOREIGN KEY (`SubCategoryMasterId`) REFERENCES `subcategorymaster` (`SubCategoryMasterId`),
  ADD CONSTRAINT `events_ibfk_4` FOREIGN KEY (`OrganizationId`) REFERENCES `organizationdetail` (`OrganizationId`);

--
-- Constraints for table `participationmaster`
--
ALTER TABLE `participationmaster`
  ADD CONSTRAINT `participationmaster_ibfk_1` FOREIGN KEY (`EventId`) REFERENCES `events` (`EventId`),
  ADD CONSTRAINT `participationmaster_ibfk_3` FOREIGN KEY (`StudentId`) REFERENCES `studentdetail` (`StudentId`);

--
-- Constraints for table `subcategorymaster`
--
ALTER TABLE `subcategorymaster`
  ADD CONSTRAINT `subcategorymaster_ibfk_1` FOREIGN KEY (`CategoryMasterId`) REFERENCES `categorymaster` (`CategoryMasterId`);

--
-- Constraints for table `uploadmaster`
--
ALTER TABLE `uploadmaster`
  ADD CONSTRAINT `uploadmaster_ibfk_1` FOREIGN KEY (`StudentId`) REFERENCES `studentdetail` (`StudentId`),
  ADD CONSTRAINT `uploadmaster_ibfk_2` FOREIGN KEY (`CategoryMasterId`) REFERENCES `categorymaster` (`CategoryMasterId`),
  ADD CONSTRAINT `uploadmaster_ibfk_3` FOREIGN KEY (`SubCategoryMasterId`) REFERENCES `subcategorymaster` (`SubCategoryMasterId`);

--
-- Constraints for table `winnermaster`
--
ALTER TABLE `winnermaster`
  ADD CONSTRAINT `winnermaster_ibfk_1` FOREIGN KEY (`EventId`) REFERENCES `events` (`EventId`),
  ADD CONSTRAINT `winnermaster_ibfk_2` FOREIGN KEY (`StudentId`) REFERENCES `studentdetail` (`StudentId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
