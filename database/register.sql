-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2020 at 06:44 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `u_id` int(12) NOT NULL,
  `first-name` varchar(100) DEFAULT NULL,
  `last-name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `education` varchar(100) NOT NULL,
  `edu_level` varchar(100) NOT NULL,
  `industry` varchar(100) NOT NULL,
  `exp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`u_id`, `first-name`, `last-name`, `email`, `phone`, `education`, `edu_level`, `industry`, `exp`) VALUES
(1, 'aaaaaa', 'sdssf', 'ovindushamal@gmail.com', '12345', 'Information Technology', 'Under Graduate', 'QA Automation', '2'),
(2, 'Harshana', 'wije', 'harshawije99@gmail.com', '0768945668', 'Software engineering', 'Under Graduate', 'Others', '1'),
(3, 'Harshana', 'sdssf', 'harshawije99@gmail.com', '0768945668', 'Information Technology', 'Under Graduate', 'QA Automation', '2'),
(4, 'Harshana', 'Wijesinghe', 'jayawije66@gmail.com', '0768945884', 'Information Technology', 'Under Graduate', 'Database administration', '4'),
(5, 'Jayantha', 'Wijesinghe', 'jayantha@gmail.com', '0768945668', 'Computer Science', 'Under Graduate', 'QA Automation', '4'),
(6, '', 'Wijesinghe', 'abc@123.com', '0768945668', 'Information Technology', 'Post Graduate', 'Software engineering', '1'),
(7, '', 'Amaraweera', 'samuel@gmail.com', '0768945668', 'Information Technology', 'Post Graduate', 'Software engineering', '1'),
(8, 'Jayantha', 'Darmadasa', 'darma@gmail.com', '0768945668', 'Software engineering', 'Post Graduate', 'Software engineering', '1'),
(9, 'Pasan', 'Wickramasinghe', 'pasan@yahoo.com', '0768945668', 'Information Technology', 'Post Graduate', 'Software engineering', '1'),
(11, 'Nelaka', 'Wickramasinghe', 'nelakarazor@hotmail.com', '0768945668', 'Software engineering', 'Post Graduate', 'Software engineering', '1'),
(13, 'Pasan', 'Jayaweera', 'pasan@g.com', '0768945668', 'Software engineering', 'Post Graduate', 'Software engineering', '1'),
(15, 'Navanjana', 'Wickramasinghe', 'navanava@gmail.com', '0768945668', 'Software engineering', 'Post Graduate', 'Software engineering', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `u_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
