-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 25, 2020 at 01:50 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `391project`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `booking_id` int(6) NOT NULL AUTO_INCREMENT,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `user_id` int(10) NOT NULL,
  `listing_id` int(10) NOT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `check_in`, `check_out`, `user_id`, `listing_id`) VALUES
(1, '2020-03-27', '2020-03-28', 2, 11),
(2, '2020-03-28', '2020-03-29', 2, 11);

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

DROP TABLE IF EXISTS `guest`;
CREATE TABLE IF NOT EXISTS `guest` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(85) NOT NULL,
  `pass` varchar(2000) NOT NULL,
  `name` varchar(45) NOT NULL,
  `country` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`id`, `email`, `pass`, `name`, `country`, `state`, `address`, `phone`) VALUES
(2, 'guest2@guest2.com', '$2y$10$4/Q55ALSEyQIiRiBmaRjnucsmWKrX9Vxn8tWLm2o6lAsvRGj.ctcm', 'Guest two', 'Bangladesh', 'Dhaka', 'Mohakhali 63/4', '017552050'),
(3, 'guest3@guest3.com', '$2y$10$uvZJQvjLL/Y45QWiVYqrP.si7kr5HkjvwM2nL3Osu/OspzZqS5bYC', 'Guest three', 'Bangladesh', 'Dhaka', 'street 66', '011513813813');

-- --------------------------------------------------------

--
-- Table structure for table `host`
--

DROP TABLE IF EXISTS `host`;
CREATE TABLE IF NOT EXISTS `host` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(85) NOT NULL,
  `pass` varchar(2000) NOT NULL,
  `name` varchar(45) NOT NULL,
  `country` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `host`
--

INSERT INTO `host` (`id`, `email`, `pass`, `name`, `country`, `state`, `address`, `phone`) VALUES
(1, 'host1@host1.com', '$2y$10$z4nSVCvgX2nT9hxl.LJSBuZDfQO0VViblGRrkPmDZeygvUZpPNBdO', 'Host One', 'Bangladesh', 'Dhaka', 'Banani 1552', '01321456987'),
(2, 'host2@host2.com', '$2y$10$NZAmttVk/BuQCtmynhqwcOAOjlHJaHEgnDwFGfvYj4/8ucIHR65Ci', 'Host two', 'Bangladesh', 'Rajshahi', 'street 12/1A', '0122554411223');

-- --------------------------------------------------------

--
-- Table structure for table `listing`
--

DROP TABLE IF EXISTS `listing`;
CREATE TABLE IF NOT EXISTS `listing` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `host_id` int(10) NOT NULL,
  `name` varchar(25) NOT NULL,
  `bedrooms` int(4) NOT NULL,
  `washrooms` int(4) NOT NULL,
  `guests` int(4) NOT NULL,
  `entire_house` int(1) NOT NULL,
  `has_pool` int(1) NOT NULL,
  `has_gym` int(1) NOT NULL,
  `country` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `hostName` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listing`
--

INSERT INTO `listing` (`id`, `host_id`, `name`, `bedrooms`, `washrooms`, `guests`, `entire_house`, `has_pool`, `has_gym`, `country`, `state`, `address`, `price`, `hostName`) VALUES
(11, 1, 'Place one', 2, 1, 4, 1, 0, 0, 'Bangladesh', ' Dhaka', 'uttara 153', 20.66, 'Host one'),
(12, 1, 'Good place', 3, 2, 3, 1, 0, 0, 'Bangladesh', 'Chittagong', '552, street', 32.15, 'Host one');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
