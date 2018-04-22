-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2018 at 12:45 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `config_control`
--

CREATE TABLE `config_control` (
  `id` int(11) NOT NULL,
  `wasp_id` varchar(50) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '0' COMMENT '1:ON | 0: OFF',
  `duration` float DEFAULT '0',
  `time_current` datetime DEFAULT NULL,
  `time_expired` datetime DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `config_control`
--

INSERT INTO `config_control` (`id`, `wasp_id`, `name`, `status`, `duration`, `time_current`, `time_expired`, `timestamp`) VALUES
(13, '506437057C10542F', 'DEN', 1, 1, '2018-04-22 17:43:00', '2018-04-22 17:44:00', '2018-04-22 10:45:11'),
(14, '506437057C10542F', 'OXY_DAY', 1, 0, '2018-04-22 17:43:00', '0000-00-00 00:00:00', '2018-04-22 10:43:00'),
(15, '506437057C10542F', 'QUAT', 0, 0, '2018-04-22 17:43:00', '0000-00-00 00:00:00', '2018-04-22 10:43:00'),
(16, '506437057C10542F', 'OXY_NHUYEN', 0, 0, '2018-04-22 17:43:00', '0000-00-00 00:00:00', '2018-04-22 10:43:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `config_control`
--
ALTER TABLE `config_control`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `config_control`
--
ALTER TABLE `config_control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
