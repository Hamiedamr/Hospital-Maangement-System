-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2019 at 09:29 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `departmentstb`
--

CREATE TABLE `departmentstb` (
  `department_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departmentstb`
--

INSERT INTO `departmentstb` (`department_name`) VALUES
('Cardiology'),
('Cardiovascular Surgery'),
('Dentist'),
('Dermatology'),
('Endocrinology'),
('Gastroenterology'),
('Gynecology'),
('Hematology'),
('Hepatology'),
('Immunology'),
('Neurology'),
('psychiatrist');

-- --------------------------------------------------------

--
-- Table structure for table `doctorstb`
--

CREATE TABLE `doctorstb` (
  `id` int(11) NOT NULL,
  `doctorname` varchar(200) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `department` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorstb`
--

INSERT INTO `doctorstb` (`id`, `doctorname`, `appointment_id`, `contact`, `department`) VALUES
(1, 'Hamied', 1, '+201142080321', NULL),
(2, 'Amr', 2, '+201222721015', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_appointmentstb`
--

CREATE TABLE `doctor_appointmentstb` (
  `id` int(11) NOT NULL,
  `appointment` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_appointmentstb`
--

INSERT INTO `doctor_appointmentstb` (`id`, `appointment`) VALUES
(1, 'Wednesday 6pm to 8pm'),
(2, 'Wednesday 4pm 6pm');

-- --------------------------------------------------------

--
-- Table structure for table `logintb`
--

CREATE TABLE `logintb` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logintb`
--

INSERT INTO `logintb` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `patientstb`
--

CREATE TABLE `patientstb` (
  `id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `doctor_department` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patientstb`
--

INSERT INTO `patientstb` (`id`, `first_name`, `last_name`, `email`, `contact`, `appointment_id`, `doctor_department`) VALUES
(4, 'hamied', 'amr', 'hamed@gmail.com', '01142080321', 1, 'Cardiology');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departmentstb`
--
ALTER TABLE `departmentstb`
  ADD PRIMARY KEY (`department_name`);

--
-- Indexes for table `doctorstb`
--
ALTER TABLE `doctorstb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointment_id_2` (`appointment_id`),
  ADD KEY `department` (`department`);

--
-- Indexes for table `doctor_appointmentstb`
--
ALTER TABLE `doctor_appointmentstb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logintb`
--
ALTER TABLE `logintb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patientstb`
--
ALTER TABLE `patientstb`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contact` (`contact`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `appointment_id` (`appointment_id`),
  ADD KEY `doctor_department` (`doctor_department`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctorstb`
--
ALTER TABLE `doctorstb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctor_appointmentstb`
--
ALTER TABLE `doctor_appointmentstb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `logintb`
--
ALTER TABLE `logintb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patientstb`
--
ALTER TABLE `patientstb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctorstb`
--
ALTER TABLE `doctorstb`
  ADD CONSTRAINT `doctorstb_ibfk_1` FOREIGN KEY (`appointment_id`) REFERENCES `doctor_appointmentstb` (`id`),
  ADD CONSTRAINT `doctorstb_ibfk_2` FOREIGN KEY (`department`) REFERENCES `departmentstb` (`department_name`);

--
-- Constraints for table `patientstb`
--
ALTER TABLE `patientstb`
  ADD CONSTRAINT `patientstb_ibfk_1` FOREIGN KEY (`appointment_id`) REFERENCES `doctor_appointmentstb` (`id`),
  ADD CONSTRAINT `patientstb_ibfk_2` FOREIGN KEY (`doctor_department`) REFERENCES `departmentstb` (`department_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
