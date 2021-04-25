-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 25, 2021 at 12:24 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo1`
--

-- --------------------------------------------------------

--
-- Table structure for table `order_session`
--

CREATE TABLE `order_session` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `session` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_session`
--

INSERT INTO `order_session` (`id`, `p_id`, `quantity`, `session`) VALUES
(19, 9, 1, '78ljg2kdraqmv0hbfj95pn9s7f'),
(20, 1, 1, '78ljg2kdraqmv0hbfj95pn9s7f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_session`
--
ALTER TABLE `order_session`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_session`
--
ALTER TABLE `order_session`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
