-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2018 at 12:48 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_details`
--

CREATE TABLE `book_details` (
  `name` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `amount` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_details`
--

INSERT INTO `book_details` (`name`, `price`, `quantity`, `amount`) VALUES
('Maths', 'kumbojhkar', '10', '50'),
('Physics', 'H c Verma', '8', '58'),
('C', 'Kanetkar', '16', '90'),
('Database', 'Stallings', '40', '64'),
('CPP', 'Balaguruswamy', '31', '100'),
('Chemistry', 'Irodov', '24', '160'),
('Biology', 'Jain', '10', '38');

-- --------------------------------------------------------

--
-- Table structure for table `confidence`
--

CREATE TABLE `confidence` (
  `conf` double NOT NULL,
  `state` varchar(10) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `confidence`
--

INSERT INTO `confidence` (`conf`, `state`, `count`) VALUES
(30.5, 'Alabama', 1),
(29.9, 'Alabama', 2),
(30, 'Alabama', 3),
(29.9, 'Alabama', 4),
(30.2, 'Alabama', 5),
(31, 'Alabama', 6),
(23.7, 'Alabama', 7),
(12.6, 'Alabama', 8),
(30.7, 'Alabama', 9),
(31.6, 'Alabama', 10),
(34.5, 'Alabama', 11),
(33.4, 'Alabama', 12),
(24.9, 'Alabama', 13),
(34.4, 'Alabama', 14),
(31.3, 'Alabama', 15),
(31.1, 'Alabama', 16),
(28, 'Alabama', 17),
(29.7, 'Alabama', 18),
(25.4, 'Alabama', 19),
(20.7, 'Alabama', 20),
(28, 'Alabama', 21),
(36.9, 'Alabama', 22),
(17.5, 'Alabama', 23),
(18.4, 'Alabama', 24),
(14.4, 'Alabama', 25),
(33.1, 'Alabama', 26),
(36.5, 'Alabama', 27),
(28.7, 'Alabama', 28),
(29.2, 'Alabama', 29),
(31.4, 'Alabama', 30),
(32.1, 'Alabama', 31),
(33.8, 'Alabama', 32),
(21.6, 'Alabama', 33),
(27.4, 'Alabama', 34),
(29.4, 'Alabama', 35),
(32.5, 'Alabama', 36),
(35.7, 'Alabama', 37),
(36.6, 'Alabama', 38),
(24.4, 'Alabama', 39),
(28.5, 'Alabama', 40),
(31.1, 'Alabama', 41),
(32.2, 'Alabama', 42),
(31.7, 'Alabama', 43),
(34.7, 'Alabama', 44),
(31.9, 'Alabama', 45),
(34.5, 'Alabama', 46),
(27.2, 'Alabama', 47),
(21.5, 'Alabama', 48),
(18, 'Alabama', 49),
(14.9, 'Alabama', 50);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `age` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`username`, `password`, `age`, `city`) VALUES
('Rahul', '125480', '20', 'Thane'),
('Hardik', '456423', '16', 'Vidyavihar'),
('Pooja', '456205', '20', 'Ghatkopar'),
('Parth', '464015', '22', 'Thane'),
('Khushbu', '710425', '19', 'Mulund'),
('Dhruvi', '672146', '19', 'Thane'),
('Ajay', '923042', '18', 'Bhandup');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `confidence`
--
ALTER TABLE `confidence`
  ADD PRIMARY KEY (`count`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `confidence`
--
ALTER TABLE `confidence`
  MODIFY `count` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
