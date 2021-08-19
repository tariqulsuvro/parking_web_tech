-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2020 at 01:17 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parkori`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(4) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(55) NOT NULL,
  `mobile_no` int(15) NOT NULL,
  `nid` int(60) NOT NULL,
  `reff` int(4) NOT NULL,
  `approval` varchar(20) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `mobile_no`, `nid`, `reff`, `approval`) VALUES
(149, 'aftahi', '$2y$10$lRd244nPG0NgG1M/7Zew9.MeTC4lXfyXt07e803pvLtfi6E8p030y', 'aftahi@gmail.com', 1797341164, 789632145, 1110, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `cost_info`
--

CREATE TABLE `cost_info` (
  `cost_id` int(10) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `parker_id` int(11) NOT NULL,
  `parker_name` varchar(255) NOT NULL,
  `starting_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ending_time` datetime NOT NULL,
  `cost` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cost_info`
--

INSERT INTO `cost_info` (`cost_id`, `owner_name`, `parker_id`, `parker_name`, `starting_time`, `ending_time`, `cost`) VALUES
(23, 'toky', 3, 'rahat10', '2020-05-23 10:05:36', '2020-05-23 12:47:59', 0),
(24, 'toky', 4, 'pushpo', '2020-05-23 10:06:05', '2020-05-23 01:08:17', 0),
(25, 'asif', 4, 'pushpo', '2020-05-23 10:34:56', '2020-05-23 01:08:17', 0),
(26, 'azwad', 4, 'pushpo', '2020-05-23 10:35:16', '2020-05-23 01:08:17', 0),
(27, 'aftahi rahat', 5, 'tithi', '2020-05-23 10:35:45', '2020-05-23 01:13:23', 495),
(28, 'toky', 5, 'tithi', '2020-05-23 10:36:12', '2020-05-23 01:13:23', 495),
(29, 'aftahi rahat', 6, 'farhana anwar', '2020-05-23 10:49:29', '2020-05-23 12:28:43', 0),
(30, 'azwad', 6, 'farhana anwar', '2020-05-23 10:49:34', '2020-05-23 12:28:43', 0),
(31, 'asif', 6, 'farhana anwar', '2020-05-23 10:49:42', '2020-05-23 12:28:43', 0);

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `id` int(6) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `nid` int(60) NOT NULL,
  `address` varchar(255) NOT NULL,
  `parking_area` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `space` int(90) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'deactive',
  `approval` varchar(20) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`id`, `username`, `password`, `email`, `mobile_no`, `nid`, `address`, `parking_area`, `division`, `space`, `status`, `approval`) VALUES
(20, 'aftahi rahat', '$2y$10$M18jiXGsxIv0m4.wa7.vze7QoqkQKk9B8gFFf98QvimsvYz.OS4sm', 'aftahirahat@gmail.com', '1521439210', 123603698, '411, Shahinbag, Tejgaon, Dhaka', 'Tejgaon', 'dhaka', 5, 'deactive', 'yes'),
(23, 'asif', '$2y$10$qkrU1e9Kw6fJ5dbiAlsjSOAq777Y3wU3KTwiq9fCx3Oo1jxswK.Hy', 'asif@gmail.com', '2147483647', 2147483647, 'Falcon Tower, Shahinbagh, Tejgaon, Dhaka', 'Tejgaon', 'Dhaka', 6, 'deactive', 'no'),
(24, 'azwad', '$2y$10$NG54RcIQoaKOZy2evySvLOCCKhemVfXb0jYKZC60ydQ5oCbcO6vhC', 'azwad@gmail.com', '0152146983', 2147483647, 'Tejkunipara, Dhaka', 'Tejgaon', 'Chittagong', 5, 'active', 'yes'),
(25, 'toky', '$2y$10$.eFo9QR4eY.YOmdy.nqX0.dT4v5I9paYKtKHPjyb/LVc.7wws92OS', 'toky@gmail.com', '01521105236', 123601458, 'Matikata, ECB, Dhaka Cantonment, Dhaka', 'Cantonment', 'Dhaka', 3, 'deactive', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `parker`
--

CREATE TABLE `parker` (
  `id` int(6) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(70) NOT NULL,
  `mobile_no` int(15) NOT NULL,
  `nid` int(60) NOT NULL,
  `approval` varchar(20) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parker`
--

INSERT INTO `parker` (`id`, `username`, `password`, `email`, `mobile_no`, `nid`, `approval`) VALUES
(2, 'toni', '$2y$10$nr5gOefxq6YDbRozgJwKGesveGCn9nGV6NrSHwRW7GUUvU9mFz.Vu', 't@c.c', 6969, 420420, 'yes'),
(3, 'rahat10', '$2y$10$yp5tnqtS3ahRA0S4ktN1e.Nsz7ys/IfdhWYRoolNsrABUfU9nwU9i', 'rahat@gmail.com', 178963214, 2147483647, 'yes'),
(4, 'pushpo', '$2y$10$o6uRkvztHTi.yuQxVeqSGunDVafyOG0h4UNyo/6MIwKQo6IyPbuUK', 'pushpo@gmail.com', 12369874, 2147483647, 'yes'),
(5, 'tithi', '$2y$10$TWProj/IsX2ucjziKgdgVu4GscrUUgvPNlpwqxli1g5q/7.kkjHoe', 'tithi@gmail.com', 123772376, 2147483647, 'yes'),
(6, 'farhana anwar', '$2y$10$8l7eito2/GLW6/JiofoG2.q4q4VhdJB0wFW8.s38qVd5DatxFzuZ.', 'farhanaanwar@yahoo.com', 1236987, 459632147, 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cost_info`
--
ALTER TABLE `cost_info`
  ADD PRIMARY KEY (`cost_id`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`username`,`space`);

--
-- Indexes for table `parker`
--
ALTER TABLE `parker`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `cost_info`
--
ALTER TABLE `cost_info`
  MODIFY `cost_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `parker`
--
ALTER TABLE `parker`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
