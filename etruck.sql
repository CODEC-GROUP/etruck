-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2023 at 02:42 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 8.0.19

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

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `crt_date` text NOT NULL,
  `upd_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `phone_number` text NOT NULL,
  `password` text NOT NULL,
  `c_password` text NOT NULL,
  `city` text NOT NULL,
  `qwater` text NOT NULL,
  `frequency` text NOT NULL,
  `crt_date` text NOT NULL,
  `upd_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `household`
--

CREATE TABLE `household` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `phone_number` text NOT NULL,
  `password` text NOT NULL,
  `c_password` text NOT NULL,
  `city` text NOT NULL,
  `qwater` text NOT NULL,
  `gender` text NOT NULL,
  `frequency` text NOT NULL,
  `crt_date` text NOT NULL,
  `upd_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `household`
--

INSERT INTO `household` (`id`, `name`, `phone_number`, `password`, `c_password`, `city`, `qwater`, `gender`, `frequency`, `crt_date`, `upd_date`) VALUES
(1, 'eta cyril', '651898704', '1234', '1234', 'Douala', 'pk17', 'male', '2\r\n', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `truckman`
--

CREATE TABLE `truckman` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `phone_number` text NOT NULL,
  `password` text NOT NULL,
  `c_password` text NOT NULL,
  `city` text NOT NULL,
  `qwater` text NOT NULL,
  `gender` text NOT NULL,
  `frequency` text NOT NULL,
  `crt_date` text NOT NULL,
  `upd_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `household`
--
ALTER TABLE `household`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `household`
--
ALTER TABLE `household`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
