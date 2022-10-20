-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Aug 21, 2022 at 11:32 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminform`
--

CREATE TABLE `adminform` (
  `id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cocurricular`
--

CREATE TABLE `cocurricular` (
  `eventid` int(11) NOT NULL,
  `cno` varchar(30) NOT NULL,
  `event_name` varchar(30) NOT NULL,
  `event_type` varchar(20) DEFAULT NULL,
  `organizer` varchar(30) NOT NULL,
  `event_location` text NOT NULL,
  `event_level` varchar(20) NOT NULL,
  `event_date` date NOT NULL,
  `participation_status` varchar(20) DEFAULT NULL,
  `proof` longblob DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `topic` varchar(50) DEFAULT NULL,
  `patent_name` varchar(50) DEFAULT NULL,
  `patent_id` bigint(20) DEFAULT NULL,
  `patent_type` varchar(20) DEFAULT NULL,
  `state` varchar(30) NOT NULL,
  `college` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cocurricular`
--

INSERT INTO `cocurricular` (`eventid`, `cno`, `event_name`, `event_type`, `organizer`, `event_location`, `event_level`, `event_date`, `participation_status`, `proof`, `amount`, `topic`, `patent_name`, `patent_id`, `patent_type`, `state`, `college`) VALUES
(100011, 'C22019221368', 'Catalyst', 'Scholarship', 'Cummins', 'Pune', 'National', '2022-08-19', 'First runners up(sil', '', 0, '', '', 0, '', '', ''),
(100012, 'C22019221368', 'Catalyst', 'Scholarship', 'Cummins', 'Pune', 'National', '2022-08-19', 'First runners up(sil', '', 0, '', '', 0, '', '', ''),
(100013, 'C22019221368', 'Catalyst', 'Scholarship', 'Cummins', 'Pune', 'National', '2022-08-19', 'First runners up(sil', '', 0, '', '', 0, '', '', ''),
(100014, 'C22019221368', 'kjll;', 'coding and quiz comp', 'Cummins', 'pune', 'State', '2022-08-17', 'First runners up(sil', NULL, 0, '', '', 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `extracurricular`
--

CREATE TABLE `extracurricular` (
  `event_id` bigint(20) NOT NULL,
  `cno` varchar(30) NOT NULL,
  `event_name` varchar(50) NOT NULL,
  `event_type` varchar(50) NOT NULL,
  `organizer` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `participation_status` varchar(50) NOT NULL,
  `certificate` longblob NOT NULL,
  `state` varchar(30) NOT NULL,
  `college` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `extracurricular`
--

INSERT INTO `extracurricular` (`event_id`, `cno`, `event_name`, `event_type`, `organizer`, `location`, `level`, `date`, `participation_status`, `certificate`, `state`, `college`) VALUES
(1242, 'C22019221368', 'Cricket', 'sports', 'Cummins', 'Pune', 'National', '2022-08-17', 'First runners up(silver)', '', 'Within State(Maharashtra)', 'College');

-- --------------------------------------------------------

--
-- Table structure for table `studentform`
--

CREATE TABLE `studentform` (
  `cno` varchar(30) NOT NULL,
  `fname` varchar(10) NOT NULL,
  `mname` varchar(10) NOT NULL,
  `lname` varchar(10) NOT NULL,
  `year` int(11) NOT NULL,
  `contactno` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentform`
--

INSERT INTO `studentform` (`cno`, `fname`, `mname`, `lname`, `year`, `contactno`, `email`, `password`) VALUES
('C22019221368', 'Tejal', 'Parshuram', 'Khedekar', 4, '9309870357', 'tejal.khedekar@cumminscollege.', 'Tejalkhedekar@12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminform`
--
ALTER TABLE `adminform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cocurricular`
--
ALTER TABLE `cocurricular`
  ADD PRIMARY KEY (`eventid`);

--
-- Indexes for table `extracurricular`
--
ALTER TABLE `extracurricular`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `studentform`
--
ALTER TABLE `studentform`
  ADD PRIMARY KEY (`cno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminform`
--
ALTER TABLE `adminform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cocurricular`
--
ALTER TABLE `cocurricular`
  MODIFY `eventid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100015;

--
-- AUTO_INCREMENT for table `extracurricular`
--
ALTER TABLE `extracurricular`
  MODIFY `event_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1243;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
