-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 15, 2015 at 12:45 PM
-- Server version: 5.6.12
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_spoonity`
--
-- CREATE DATABASE IF NOT EXISTS `db_spoonity` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
-- USE `db_spoonity`;

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE IF NOT EXISTS `userdata` (
  `userid` int(9) NOT NULL,
  `user_email` varchar(254) NOT NULL,
  `user_name` varchar(254) NOT NULL,
  `user_pword` varchar(254) NOT NULL,
  UNIQUE KEY `userid_2` (`userid`),
  UNIQUE KEY `user_email` (`user_email`),
  KEY `userid` (`userid`),
  KEY `userid_3` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
