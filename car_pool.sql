-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2016 at 07:46 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_pool`
--

-- --------------------------------------------------------

--
-- Table structure for table `carpoolmembers`
--

CREATE TABLE `carpoolmembers` (
  `memberid` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `phoneNumber` varchar(15) DEFAULT NULL,
  `latitude` decimal(10,7) DEFAULT NULL,
  `longitude` decimal(10,7) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carpoolmembers`
--

INSERT INTO `carpoolmembers` (`memberid`, `firstname`, `lastname`, `email`, `password`, `phoneNumber`, `latitude`, `longitude`, `status`) VALUES
(1, 'mk', 'fie', 'makafui.fie@ashesi.edu.gh', '5d41402abc4b2a76b971', '344555', NULL, NULL, NULL),
(2, 'mak', 'fi', 'mak.fie', '5d41402abc4b2a76b971', '777774', NULL, NULL, NULL),
(3, 'mk', 'fie', 'makafui.fie@hjj.com', '5d41402abc4b2a76b971', '344555', NULL, NULL, NULL),
(4, 'mk', 'fie', 'mk.fie@hjj.com', '5d41402abc4b2a76b971', '344555', NULL, NULL, NULL),
(5, 'mk', 'fie', 'mk.fie@hjj.gh', '5d41402abc4b2a76b971', '344555', NULL, NULL, NULL),
(6, 'fie', 'mak', 'mak@fie.com', 'hello', '7777', NULL, NULL, NULL),
(7, 'mnn', 'kn', 'knmnkm@', '6f96cfdfe5ccc627cadf', '98', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `joinpool`
--

CREATE TABLE `joinpool` (
  `joinPoolID` int(11) NOT NULL,
  `poolOwner` int(11) DEFAULT NULL,
  `memberID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pool`
--

CREATE TABLE `pool` (
  `poolID` int(11) NOT NULL,
  `poolOwner` int(11) DEFAULT NULL,
  `amount` decimal(6,2) DEFAULT NULL,
  `numberNeeded` int(11) DEFAULT NULL,
  `poolTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `enablejoin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carpoolmembers`
--
ALTER TABLE `carpoolmembers`
  ADD PRIMARY KEY (`memberid`);

--
-- Indexes for table `joinpool`
--
ALTER TABLE `joinpool`
  ADD PRIMARY KEY (`joinPoolID`),
  ADD KEY `poolOwner` (`poolOwner`),
  ADD KEY `memberID` (`memberID`);

--
-- Indexes for table `pool`
--
ALTER TABLE `pool`
  ADD PRIMARY KEY (`poolID`),
  ADD KEY `poolOwner` (`poolOwner`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carpoolmembers`
--
ALTER TABLE `carpoolmembers`
  MODIFY `memberid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `joinpool`
--
ALTER TABLE `joinpool`
  MODIFY `joinPoolID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pool`
--
ALTER TABLE `pool`
  MODIFY `poolID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `joinpool`
--
ALTER TABLE `joinpool`
  ADD CONSTRAINT `joinpool_ibfk_1` FOREIGN KEY (`poolOwner`) REFERENCES `carpoolmembers` (`memberid`),
  ADD CONSTRAINT `joinpool_ibfk_2` FOREIGN KEY (`memberID`) REFERENCES `carpoolmembers` (`memberid`);

--
-- Constraints for table `pool`
--
ALTER TABLE `pool`
  ADD CONSTRAINT `pool_ibfk_1` FOREIGN KEY (`poolOwner`) REFERENCES `carpoolmembers` (`memberid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
