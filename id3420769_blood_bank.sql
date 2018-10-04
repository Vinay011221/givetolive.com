-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2018 at 03:52 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id3420769_blood_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

CREATE TABLE `donors` (
  `did` int(50) NOT NULL,
  `dname` varchar(50) NOT NULL,
  `demail` varchar(50) NOT NULL,
  `dcontact` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dage` int(50) NOT NULL,
  `dBrgp` varchar(20) NOT NULL,
  `bloodAmount` int(11) NOT NULL,
  `DateOfDonation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donors`
--

INSERT INTO `donors` (`did`, `dname`, `demail`, `dcontact`, `city`, `address`, `gender`, `dage`, `dBrgp`, `bloodAmount`, `DateOfDonation`) VALUES
(12, 'Raj Mahtre', 'rajmahtre@gmail.com', '9162784646', 'mumbai', 'Dadar, Mumbai', 'Male', 20, 'AB+', 200, '2018-04-22 08:11:15'),
(13, 'Sunit Shirke', 'sunitshirke87@gmail.com', '9869457348', 'mumbai', 'Ghatkopar, Mumbai', 'Male', 21, 'AB-', 250, '2018-04-22 08:11:15'),
(14, 'Kalpita ', 'kalpita@gmail.com', '9863780542', 'mumbai', 'Chembur, Mumbai', 'Female', 25, 'A+', 256, '2018-04-22 08:05:02'),
(15, 'Venkatesh', 'venky121@gmail.com', '9769435675', 'thane', 'kopri, Thane', 'Male', 21, 'A-', 200, '2018-04-22 08:11:15'),
(16, 'Vimal', 'vimal21@gmail.com', '987463834', 'thane', 'Gorbunder, Thane', 'Male', 23, 'B-', 250, '2018-04-22 08:06:59'),
(17, 'Nitin Mungekar', 'nitin@gmail.com', '9875404567', 'thane', 'Kalwa, Thane', 'Male', 22, 'O+', 200, '2018-04-22 08:12:52'),
(18, 'Gaytri Patil', 'gaytri@gmail.com', '9678457635', 'thane', 'Kopri, Thane', 'Female', 23, 'O-', 230, '2018-04-22 08:15:27'),
(19, 'Sahil Patil', 'Sahil121@gmail.com', '9835272945', 'mumbai', 'Kurla, Mumbai', 'Male', 22, 'O+', 220, '2018-04-22 08:19:13'),
(21, 'Ajay ', 'ajay42@gmail.com', '9876457689', 'pune', 'deur, pune', 'Male', 25, 'A-', 223, '2018-04-22 08:25:47'),
(22, 'Meena ', 'mina@gmail.com', '9878756789', 'pune', 'Shivgaon, Pune', 'Female', 23, 'B-', 22, '2018-04-22 08:27:21');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `hid` int(11) NOT NULL,
  `agentName` varchar(50) NOT NULL,
  `agentEmail` varchar(50) NOT NULL,
  `Hcontact` varchar(50) NOT NULL,
  `agentPass` int(10) NOT NULL,
  `hname` varchar(50) NOT NULL,
  `hadd` text NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`hid`, `agentName`, `agentEmail`, `Hcontact`, `agentPass`, `hname`, `hadd`, `city`) VALUES
(1, 'Sahil', 'sahil@gmail.com', '9234758936', 123, 'Fortis', 'vikroli,mumbai', 'mumbai'),
(4, 'Reshma', 'reshma121@gmail.com', '9234758936', 143, 'Vithoba Hospital', 'Vikroli, Mumbai', 'mumbai'),
(5, 'Shekhar Shetty', 'shekhar111@gmail.com', '987985674', 111, 'Currae', 'Ground Floor, Highstreet cum Highland Corporate Centre, Near Big Bazar, Kapurbavadi Junction Thane', 'thane'),
(6, 'Bhavik Panchal', 'bhavik666@gmail.com', '8767898765', 666, 'Wockhardt Super Speciality Hospital Mira Road ', 'The Umrao IMSR, Near Railway Station, Mira Road (E), Dist. Thane ', 'thane'),
(7, 'Nisha ', 'nisha121@gmail.com', '9594258178', 121, 'Sahyadri Hospital', 'Plot No. 30 C, Erandwane Deccan Gymkhana,Pune', 'pune'),
(8, 'Nikita Gaonkar', 'nikitagaonkar@gmail.com', '9875647345', 21, 'Indira Hospital', '2nd Floor, Anand Emerald, Sakore Nagar, New VIP Airport Road, Near Symbiosis College, Viman Nagar Viman Nagar, Pune', 'pune');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `aid` int(10) NOT NULL,
  `aname` varchar(50) NOT NULL,
  `aemail` varchar(50) NOT NULL,
  `apass` varchar(20) NOT NULL,
  `branch` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`aid`, `aname`, `aemail`, `apass`, `branch`) VALUES
(1, 'Admin', 'admin121@gmail.com', '123', 'all'),
(2, 'Simran', 'simran121@gmail.com', 'simran121', 'pune'),
(3, 'Vinay', 'vinay121@gmail.com', 'vinay121', 'mumbai'),
(4, 'Sakshi', 'sakshi121@gmail.com', 'sakshi121', 'thane');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `PersonID` int(11) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`PersonID`, `LastName`, `FirstName`, `Address`, `City`) VALUES
(1, 'tomar', 'vinay', 'dfdfs', 'mumbai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donors`
--
ALTER TABLE `donors`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`hid`),
  ADD UNIQUE KEY `hid` (`hid`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`aid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donors`
--
ALTER TABLE `donors`
  MODIFY `did` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `hid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `aid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
