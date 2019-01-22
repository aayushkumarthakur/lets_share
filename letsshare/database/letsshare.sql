-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2019 at 02:39 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `letsshare`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `datetime` varchar(100) DEFAULT NULL,
  `feedback` longtext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `organisation`
--

CREATE TABLE `organisation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nameorg` varchar(200) NOT NULL,
  `estd` int(4) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `address` varchar(500) NOT NULL,
  `pincode` int(6) NOT NULL,
  `head` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `data` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `profilepic` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organisation`
--

INSERT INTO `organisation` (`id`, `nameorg`, `estd`, `contact`, `address`, `pincode`, `head`, `email`, `password`, `data`, `username`, `profilepic`) VALUES
(8, '', 0, '0', '', 0, '', '', '89fsdgf8sdfgg8232hh1231bjb3d231', '', '', 'profilepics/av1.png');

-- --------------------------------------------------------

--
-- Table structure for table `registertable`
--

CREATE TABLE `registertable` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(600) NOT NULL,
  `fname` varchar(60) DEFAULT NULL,
  `lname` varchar(60) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `contact` varchar(30) DEFAULT NULL,
  `topic` varchar(100) DEFAULT NULL,
  `profilepic` varchar(200) DEFAULT NULL,
  `data` longtext,
  `followtable` varchar(500) NOT NULL,
  `username` mediumtext,
  `address` longtext,
  `qualification` longtext,
  `type` varchar(80) DEFAULT NULL,
  `class` varchar(10) DEFAULT NULL,
  `fburl` varchar(500) NOT NULL,
  `twurl` varchar(500) NOT NULL,
  `gpurl` varchar(500) NOT NULL,
  `insturl` varchar(500) NOT NULL,
  `lnkdurl` varchar(500) NOT NULL,
  `yturl` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registertable`
--

INSERT INTO `registertable` (`id`, `email`, `password`, `fname`, `lname`, `name`, `contact`, `topic`, `profilepic`, `data`, `followtable`, `username`, `address`, `qualification`, `type`, `class`, `fburl`, `twurl`, `gpurl`, `insturl`, `lnkdurl`, `yturl`) VALUES
(103, '', '89fsdgf8sdfgg8232hh1231bjb3d231', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organisation`
--
ALTER TABLE `organisation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `registertable`
--
ALTER TABLE `registertable`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `organisation`
--
ALTER TABLE `organisation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `registertable`
--
ALTER TABLE `registertable`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
