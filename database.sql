-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 05, 2019 at 09:15 PM
-- Server version: 5.7.17-log
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `getlicensefast`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `booking_number` varchar(10) NOT NULL,
  `course` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `postal` varchar(10) NOT NULL,
  `lessonDate` varchar(15) NOT NULL,
  `transmission` varchar(10) NOT NULL,
  `theoryTest` varchar(20) DEFAULT NULL,
  `practicalTest` varchar(20) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_status` varchar(25) NOT NULL DEFAULT 'pending',
  `instructor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `booking_number`, `course`, `name`, `email`, `phone`, `postal`, `lessonDate`, `transmission`, `theoryTest`, `practicalTest`, `date`, `payment_status`, `instructor`) VALUES
(25, 'GAF-767373', '5', 'Nick', 'nick@mail.com', '123123', '123', '2019-08-14', 'manual', 'on', 'on', '2019-08-05 23:04:00', 'pending on instructor', NULL),
(26, 'GAF-410215', '1', 'testing', 'testing@gmail.com', '123123', '1232', '2019-10-10', 'automatic', 'Theory', 'practical', '2019-08-06 00:02:28', 'pending on instructor', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `automatic_price` varchar(5) NOT NULL,
  `manual_price` varchar(5) NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `type`, `name`, `description`, `automatic_price`, `manual_price`, `note`) VALUES
(1, '5 Hours', '5 Hours Driving Course', 'Ideal Candidate is very experienced (approximately 35+ hours of driving done so far) Confident with driving independently. ', '180', '165', 'Typically takes: 1-2 days. '),
(2, '10 Hours', '10 Hours Driving Course', 'Ideal Candidate is very experienced (approximately 30+ hours of driving done so far) Confident with driving independently. ', '325', '290', 'Typically takes: 2-3 days.'),
(3, '15 Hours', '15 Hours Driving Course', 'Ideal Candidate: Very experienced (approximately 30+ hours of driving done so far). Confident with driving independently. ', '440', '400', 'Typically takes: 2-4 days'),
(4, '20 Hours', '20 Hours Driving Course', 'Ideal Candidate: Very experienced (approximately 30+ hours of driving done so far). Having difficulty with a few key things. ', '570', '500', 'Typically takes: 3-6 days.'),
(5, '25 Hours', '25 Hours Driving Course', 'Ideal Candidate: half experienced (approximately 20+ hours of driving done so far). Needs assistance. ', '685', '620', 'Typically takes: 1-3 weeks.'),
(6, '30 Hours', '30 Hours Driving Course', 'Ideal Candidate: half experienced (approximately 18+ hours of driving done so far). Needs assistance. ', '830', '740', 'Typically takes: 1-5 weeks. '),
(7, '35 Hours', '35 Hours Driving Course', 'Ideal Candidate: half experienced (approximately 15+ hours of driving done so far). Needs assistance. ', '960', '860', 'Typically takes: 1-6 weeks. '),
(8, '40 Hours', '40 Hours Driving Course', 'Ideal Candidate: half experienced (approximately 5+ hours of driving done so far). Needs assistance. ', '1080', '980', 'Typically takes: 2-8 weeks. '),
(9, '48 Hours', '48 Hours Driving Course', 'Ideal Candidate: Beginner driver with zero experience.(approximately 0-5 hours of driving done so far). ', '1160', '1275', 'Typically takes: 3-12 weeks.'),
(10, 'Assessment Course', 'Assessment Course', 'If you don\'t know which course will help you? Just take our assessment course which is designed by our experienced drivers to help you better. ', '35', '35', 'Typically takes: 1-2 Hours.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
