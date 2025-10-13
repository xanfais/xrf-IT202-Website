-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: sql1.njit.edu
-- Generation Time: Oct 12, 2025 at 11:56 PM
-- Server version: 8.0.17
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `xrf`
--

-- --------------------------------------------------------

--
-- Table structure for table `EarringManagers`
--

CREATE TABLE IF NOT EXISTS `EarringManagers` (
`EarringManagerID` int(11) NOT NULL,
  `emailAddress` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `pronouns` varchar(60) NOT NULL,
  `firstName` varchar(60) NOT NULL,
  `lastName` varchar(60) NOT NULL,
  `DateTimeCreated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `DateTimeUpdated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `EarringManagers`
--

INSERT INTO `EarringManagers` (`EarringManagerID`, `emailAddress`, `password`, `pronouns`, `firstName`, `lastName`, `DateTimeCreated`, `DateTimeUpdated`) VALUES
(1, 'hudson@earringshop.com', '1ed444ffc55da0e3e52064134d2fe423d170fdbae8dffca67b27f62869e8366e', 'He/Him', 'Hudson', 'Brown', '2025-10-04 02:57:49', '2025-10-04 02:57:49'),
(2, 'darla@earringshop.com', '6231fa146f6cdbaffa746fc35ca8f43a39cdf0f95b2399f688b7a0b674e45335', 'She/Her', 'Darla', 'Thompson', '2025-10-04 03:02:03', '2025-10-04 03:02:03'),
(3, 'michael@earringshop.com', '27ffd126ebf26572322b7c74c96c4ff52284f7267da3b7a1a9159312163ffa96', 'He/Him', 'Michael', 'Johnson', '2025-10-04 03:03:11', '2025-10-04 03:03:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `EarringManagers`
--
ALTER TABLE `EarringManagers`
 ADD PRIMARY KEY (`EarringManagerID`), ADD UNIQUE KEY `emailAddress` (`emailAddress`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `EarringManagers`
--
ALTER TABLE `EarringManagers`
MODIFY `EarringManagerID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
