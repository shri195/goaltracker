-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 02, 2024 at 01:14 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goaltrackerdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `createdBy` int(11) DEFAULT NULL,
  `modifiedAt` timestamp NULL DEFAULT NULL,
  `modifiedBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `status`, `createdAt`, `createdBy`, `modifiedAt`, `modifiedBy`) VALUES
(1, 'Fixed Bid', 1, '2024-10-29 05:33:04', 1, NULL, NULL),
(2, 'Staffing', 1, '2024-10-29 05:33:13', 1, NULL, NULL),
(3, 'T&amp;M', 1, '2024-10-29 05:33:25', 1, '2024-11-02 07:21:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_fullname` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_phone` varchar(255) NOT NULL,
  `admin_address` varchar(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_fullname`, `admin_email`, `admin_phone`, `admin_address`, `admin_username`, `admin_password`) VALUES
(1, 'Admin User', 'admin1@yopmail.com', '9999199991', 'Pune', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'QN User', 'qnuser1@yopmail.com', '9999199991', 'Pune', 'qnuser', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'DM User', 'dmuser1@yopmail.com', '9999199991', 'Pune', 'dmuser', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `goals`
--

DROP TABLE IF EXISTS `goals`;
CREATE TABLE IF NOT EXISTS `goals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project` int(11) NOT NULL,
  `name` text NOT NULL,
  `sprintReleaseName` varchar(255) NOT NULL,
  `smStartDate` datetime DEFAULT NULL,
  `smEndDate` datetime DEFAULT NULL,
  `scaStatus` int(11) NOT NULL DEFAULT '1',
  `codeReview` text,
  `utsRatio` int(11) DEFAULT NULL,
  `utcCount` varchar(255) DEFAULT NULL,
  `codeCoverage` int(11) NOT NULL,
  `dmInjection` varchar(255) DEFAULT NULL,
  `dmDefects` varchar(255) DEFAULT NULL,
  `dmDER` int(11) NOT NULL,
  `dmRegressionDefects` varchar(255) NOT NULL,
  `dmReopenDefects` varchar(255) NOT NULL,
  `bvtSanityRatio` int(11) NOT NULL,
  `performanceLoadingTime` int(11) NOT NULL,
  `defaultSecurityCount` int(11) NOT NULL,
  `functionalTestCoverage` int(11) DEFAULT NULL,
  `functionalTestCaseCount` varchar(255) DEFAULT NULL,
  `functionTestRatio` int(11) NOT NULL,
  `sprintSuccessRatio` int(11) NOT NULL,
  `sprintVelocity` text NOT NULL,
  `dmdhNotes` text NOT NULL,
  `qnNotes` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modifiedAt` timestamp NULL DEFAULT NULL,
  `goalStatus` int(11) NOT NULL,
  `isLatest` int(11) NOT NULL,
  `modifiedBy` int(11) DEFAULT NULL,
  `createdBy` int(11) DEFAULT NULL,
  `goaETA` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `goals`
--

INSERT INTO `goals` (`id`, `project`, `name`, `sprintReleaseName`, `smStartDate`, `smEndDate`, `scaStatus`, `codeReview`, `utsRatio`, `utcCount`, `codeCoverage`, `dmInjection`, `dmDefects`, `dmDER`, `dmRegressionDefects`, `dmReopenDefects`, `bvtSanityRatio`, `performanceLoadingTime`, `defaultSecurityCount`, `functionalTestCoverage`, `functionalTestCaseCount`, `functionTestRatio`, `sprintSuccessRatio`, `sprintVelocity`, `dmdhNotes`, `qnNotes`, `createdAt`, `modifiedAt`, `goalStatus`, `isLatest`, `modifiedBy`, `createdBy`, `goaETA`) VALUES
(1, 1, 'Sprint1', 'Sprint1', '2024-11-02 00:00:00', '2024-11-12 00:00:00', 1, '', 98, '', 90, '', '', 1, '0', '0', 100, 0, 0, 98, '', 98, 98, '2', 'Ok', 'Good', '2024-11-02 06:23:35', '2024-11-02 07:30:29', 4, 1, 1, 1, '2024-11-02 00:00:00'),
(2, 1, 'Sprint2', 'Sprint2', '2024-10-10 00:00:00', '2024-10-20 00:00:00', 1, '', 99, '', 99, '', '', 2, '0', '0', 100, 0, 0, 99, '', 99, 99, '4', 'Good', 'Average', '2024-11-02 07:29:21', NULL, 1, 1, NULL, 1, '2024-11-02 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `account` int(11) NOT NULL,
  `deliveryUnit` varchar(255) NOT NULL,
  `deliveryManager` varchar(255) NOT NULL,
  `projectManager` varchar(255) NOT NULL,
  `remark` text,
  `status` int(11) NOT NULL,
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `createdBy` int(11) DEFAULT NULL,
  `modifiedAt` timestamp NULL DEFAULT NULL,
  `modifiedBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `account`, `deliveryUnit`, `deliveryManager`, `projectManager`, `remark`, `status`, `createdAt`, `createdBy`, `modifiedAt`, `modifiedBy`) VALUES
(1, 'Careerminds', 3, 'Delivery Unit 1', 'Dhara Masani', 'Anita Lad', 'Ok', 1, '2024-10-29 05:34:39', 1, NULL, NULL),
(2, 'OpenSesame', 3, 'Delivery Unit 2', 'Naina Gandhe', 'Vivek Shiradhonkar', 'Ok', 1, '2024-10-29 05:36:04', 1, NULL, NULL),
(3, 'KLD', 3, 'Delivery Unit 1', 'Swapnil Pandhare', 'Parthajeet Chakraborty', 'Ok', 1, '2024-10-29 05:37:08', 1, NULL, NULL),
(5, 'Caron', 3, 'Content', 'Sagar Prasade', 'Pradeep Panwar', 'Ok', 1, '2024-10-29 05:38:46', 1, '2024-11-02 06:45:53', 1),
(6, 'LearnAc', 3, 'Delivery Unit 2', 'Dipti Mane', 'Tanmay Deshmukh', 'Ok', 0, '2024-10-29 05:39:31', 1, '2024-10-29 05:39:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `site_id` int(11) NOT NULL AUTO_INCREMENT,
  `site_name` varchar(255) NOT NULL,
  `site_logo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`site_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`site_id`, `site_name`, `site_logo`) VALUES
(1, 'Goal Tracker', '1730186890harbinger-logo.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
