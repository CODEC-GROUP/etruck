-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2023 at 04:05 PM
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
-- Table structure for table `plastic`
--

CREATE TABLE `plastic` (
  `id` int(11) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `poster` int(11) NOT NULL,
  `poster_id` varchar(255) NOT NULL,
  `truck_id` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `will` text NOT NULL,
  `loaction` text NOT NULL,
  `status` text NOT NULL,
  `crt_date` text NOT NULL,
  `upd_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `plastic`
--
ALTER TABLE `plastic`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `plastic`
--
ALTER TABLE `plastic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
