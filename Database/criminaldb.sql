-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2022 at 01:23 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `criminaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE `authentication` (
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authentication`
--

INSERT INTO `authentication` (`username`, `password`) VALUES
('admin', 'admin1234'),
('ddd', 'ddd'),
('hebal', 'hebal1234'),
('hmt', 'hmt1234'),
('peenya', 'peenya1234');

-- --------------------------------------------------------

--
-- Table structure for table `criminal`
--

CREATE TABLE `criminal` (
  `name` varchar(15) NOT NULL,
  `criminalid` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `height` float NOT NULL,
  `gender` varchar(10) NOT NULL,
  `crimetype` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `stationid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `criminal`
--

INSERT INTO `criminal` (`name`, `criminalid`, `dob`, `height`, `gender`, `crimetype`, `address`, `photo`, `stationid`) VALUES
('Dushyanth V', '112233', '2021-07-23', 5.5, 'Male', 'Murder', 'N0 12 2ND Main Peenya Bengaluru 560058', 'a.jpg', '111333'),
('Ashwath S', '223344', '2021-07-23', 5.6, 'Male', 'Theft', 'Bengaluru', 'b.jpg', '111333');

-- --------------------------------------------------------

--
-- Table structure for table `fir`
--

CREATE TABLE `fir` (
  `firno` int(10) NOT NULL,
  `stationid` varchar(10) NOT NULL,
  `victimname` varchar(15) NOT NULL,
  `informername` varchar(15) NOT NULL,
  `crimeplace` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `crimetype` varchar(10) NOT NULL,
  `criminalname` varchar(15) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fir`
--

INSERT INTO `fir` (`firno`, `stationid`, `victimname`, `informername`, `crimeplace`, `date`, `time`, `crimetype`, `criminalname`, `description`) VALUES
(777777, '111333', 'Ashwath S', 'Dushyanth V', 'Peenya', '2021-07-13', '12:30:00', 'Theft', 'Gagan B', 'The adskscb jksabds samcnjn ascnn amcnj\r\nasncjn xasNBc Bcn cbjnc c,bcjkb.'),
(888888, '111333', 'Sam', 'Ramesh', 'Peenya', '2021-07-16', '23:10:00', 'Murder', 'Krish', 'Peenya murder case.');

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE `station` (
  `stationid` varchar(10) NOT NULL,
  `stationname` varchar(30) NOT NULL,
  `stationtype` varchar(25) NOT NULL,
  `username` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`stationid`, `stationname`, `stationtype`, `username`) VALUES
('111333', 'Peenya', 'Police', 'peenya'),
('333444', 'HMT', 'Trafficpolice', 'hmt'),
('555666', 'Admin', 'Admin', 'admin'),
('888999', 'Hebal', 'Trafficpolice', 'hebal');

-- --------------------------------------------------------

--
-- Table structure for table `trafficcase`
--

CREATE TABLE `trafficcase` (
  `caseno` int(10) NOT NULL,
  `vehicleno` varchar(15) NOT NULL,
  `name` varchar(20) NOT NULL,
  `vehicletype` varchar(15) NOT NULL,
  `casetype` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `stationid` varchar(10) NOT NULL,
  `fine` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trafficcase`
--

INSERT INTO `trafficcase` (`caseno`, `vehicleno`, `name`, `vehicletype`, `casetype`, `date`, `time`, `stationid`, `fine`) VALUES
(111111, 'KA 01 AS 3344', 'Ashwath S', 'Bike', 'Helmet', '2021-07-02', '09:00:00', '333444', 'Not Paid'),
(222222, 'KA 01 DS 6711', 'Dushyanth V', 'Car', 'Seatbelt', '2021-07-13', '14:30:00', '333444', 'Notpaid');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authentication`
--
ALTER TABLE `authentication`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `criminal`
--
ALTER TABLE `criminal`
  ADD PRIMARY KEY (`criminalid`),
  ADD KEY `stationid` (`stationid`);

--
-- Indexes for table `fir`
--
ALTER TABLE `fir`
  ADD PRIMARY KEY (`firno`),
  ADD KEY `stationid` (`stationid`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`stationid`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `trafficcase`
--
ALTER TABLE `trafficcase`
  ADD PRIMARY KEY (`caseno`),
  ADD KEY `stationid` (`stationid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `criminal`
--
ALTER TABLE `criminal`
  ADD CONSTRAINT `criminal_ibfk_1` FOREIGN KEY (`stationid`) REFERENCES `station` (`stationid`);

--
-- Constraints for table `fir`
--
ALTER TABLE `fir`
  ADD CONSTRAINT `fir_ibfk_1` FOREIGN KEY (`stationid`) REFERENCES `station` (`stationid`);

--
-- Constraints for table `station`
--
ALTER TABLE `station`
  ADD CONSTRAINT `station_ibfk_1` FOREIGN KEY (`username`) REFERENCES `authentication` (`username`);

--
-- Constraints for table `trafficcase`
--
ALTER TABLE `trafficcase`
  ADD CONSTRAINT `trafficcase_ibfk_1` FOREIGN KEY (`stationid`) REFERENCES `station` (`stationid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
