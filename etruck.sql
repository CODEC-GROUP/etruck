-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 09, 2023 at 05:04 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etruck`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `crt_date` text NOT NULL,
  `upd_date` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `phone_number` text NOT NULL,
  `password` text NOT NULL,
  `city` text NOT NULL,
  `qwater` text NOT NULL,
  `frequency` text NOT NULL,
  `crt_date` text NOT NULL,
  `upd_date` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `plastic`
--

DROP TABLE IF EXISTS `plastic`;
CREATE TABLE IF NOT EXISTS `plastic` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` varchar(255) NOT NULL,
  `poster` int NOT NULL,
  `poster_id` varchar(255) NOT NULL,
  `truck_id` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `will` text NOT NULL,
  `loaction` text NOT NULL,
  `status` text NOT NULL,
  `crt_date` text NOT NULL,
  `upd_date` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `truckman`
--

DROP TABLE IF EXISTS `truckman`;
CREATE TABLE IF NOT EXISTS `truckman` (
  `id` int NOT NULL,
  `name` text NOT NULL,
  `phone_number` text NOT NULL,
  `password` text NOT NULL,
  `city` text NOT NULL,
  `qwater` text NOT NULL,
  `gender` text NOT NULL,
  `frequency` text NOT NULL,
  `crt_date` text NOT NULL,
  `upd_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `phone_number` text NOT NULL,
  `password` text NOT NULL,
  `city` text NOT NULL,
  `qwater` text NOT NULL,
  `gender` text NOT NULL,
  `frequency` text NOT NULL,
  `crt_date` text NOT NULL,
  `upd_date` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `phone_number`, `password`, `city`, `qwater`, `gender`, `frequency`, `crt_date`, `upd_date`) VALUES
(1, 'eta cyril', '651898704', '1234', 'Douala', 'pk17', 'male', '2\r\n', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
