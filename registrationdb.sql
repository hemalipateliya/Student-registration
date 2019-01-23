-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2017 at 01:43 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registrationdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `sid` int(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `slot_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `name`, `lname`, `sid`, `email`, `slot_id`) VALUES
(17, 'Yesha Mistry', 'Mistry', 1234551121, 'hemali.pateliya@gmai', 1),
(18, 'pragya', 'verma', 23456, 'pragya.v@gmail.com', 1),
(19, 'hemali', 'pateliya', 3456, 'hemali.pateliya@gmai', 1),
(20, 'poojitha', 'patel', 123456, 'poojitha.c@gmail.com', 1),
(21, 'mishri', 'parikh', 12456, 'mishriparikh@gmail.c', 1),
(22, 'shruti', 'mehta', 456789, 'shrumehta@gmail.com', 1),
(23, 'pranav', 'patel', 67890, 'pranav123@gmail.com', 1),
(24, 'aakash', 'dixit', 45678, 'aakash.234@gmail.com', 1),
(26, 'shree', 'mishra', 12345, 'shree.patel@gmail.co', 2),
(29, 'pooji', 'soni', 87634, 'pooji456@gmail.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `time_slot`
--

CREATE TABLE `time_slot` (
  `id` int(11) NOT NULL,
  `slot_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_slot`
--

INSERT INTO `time_slot` (`id`, `slot_name`) VALUES
(1, 'Monday 15:00-17:00'),
(2, 'Tuesday 14:00-16:00'),
(3, 'Thusday 11;00-13:00'),
(4, 'Friday 10:00-12:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_slot`
--
ALTER TABLE `time_slot`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `time_slot`
--
ALTER TABLE `time_slot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
