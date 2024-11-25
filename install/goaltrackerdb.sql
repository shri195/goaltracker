-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 25, 2024 at 08:30 AM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `goals`
--

INSERT INTO `goals` (`id`, `project`, `name`, `sprintReleaseName`, `smStartDate`, `smEndDate`, `scaStatus`, `codeReview`, `utsRatio`, `utcCount`, `codeCoverage`, `dmInjection`, `dmDefects`, `dmDER`, `dmRegressionDefects`, `dmReopenDefects`, `bvtSanityRatio`, `performanceLoadingTime`, `defaultSecurityCount`, `functionalTestCoverage`, `functionalTestCaseCount`, `functionTestRatio`, `sprintSuccessRatio`, `sprintVelocity`, `dmdhNotes`, `qnNotes`, `createdAt`, `modifiedAt`, `goalStatus`, `isLatest`, `modifiedBy`, `createdBy`, `goaETA`) VALUES
(1, 1, 'Sprint 22', 'Sprint 22', '2024-11-06 00:00:00', '2024-11-19 00:00:00', 1, '1', 99, '1', 90, '0', '0', 0, '0', '0', 100, 0, 0, 96, '1', 95, 99, '99', 'Ok', 'Ok', '2024-11-25 02:55:58', '2024-11-25 02:57:36', 3, 1, 2, 3, '2024-11-25 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `account`, `deliveryUnit`, `deliveryManager`, `projectManager`, `remark`, `status`, `createdAt`, `createdBy`, `modifiedAt`, `modifiedBy`) VALUES
(1, 'Careerminds', 3, 'DU2', '3', '5', 'Ok', 1, '2024-11-25 02:51:52', 1, NULL, NULL),
(2, 'OpenSesame', 3, 'DU1', '4', '6', 'Ok', 1, '2024-11-25 02:53:18', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roleName` varchar(55) DEFAULT NULL,
  `shortName` varchar(55) NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `createdBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `roleName`, `shortName`, `createdAt`, `createdBy`) VALUES
(1, 'Admin', 'admin', '2024-11-25 00:00:00', NULL),
(2, 'Quality Nexus', 'QN', '2024-11-25 00:00:00', NULL),
(3, 'Delivery Manager', 'DM', '2024-11-25 00:00:00', NULL),
(4, 'Project Manager', 'PM', '2024-11-25 00:00:00', NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `username`, `email`, `password`, `role`, `createdAt`, `updatedAt`) VALUES
(1, 'Admin', 'User', 'admin', 'admin.user@yopmail.com', 'admin', 1, '2024-11-25 08:14:44', '2024-11-25 08:14:44'),
(2, 'Rashmi', 'Kulkarni', 'rashmi.kulkarni', 'rashmi.kulkarni@harbingergroup.com', 'Test@1234', 2, '2024-11-25 02:48:17', '2024-11-25 08:18:17'),
(3, 'Dhara', 'Masani', 'dhara.masani', 'dhara.masani@harbingergroup.com', 'Test@1234', 3, '2024-11-25 02:49:04', '2024-11-25 08:19:04'),
(4, 'Naina', 'Gandhe', 'naina.gandhe', 'naina.gandhe@harbingergroup.com', 'Test@1234', 3, '2024-11-25 02:50:00', '2024-11-25 08:20:00'),
(5, 'Anita', 'Lad', 'anita.lad', 'anita.lad@harbingergroup.com', 'Test@1234', 4, '2024-11-25 02:50:30', '2024-11-25 08:20:30'),
(6, 'Vivek', 'Shiradhonkar', 'viveks', 'viveks@harbingergroup.com', 'Test@1234', 4, '2024-11-25 02:51:03', '2024-11-25 08:21:03');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
