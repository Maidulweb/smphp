-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2020 at 02:48 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_student`
--

CREATE TABLE `add_student` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_roll` varchar(255) NOT NULL,
  `student_photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_student`
--

INSERT INTO `add_student` (`id`, `student_name`, `student_roll`, `student_photo`) VALUES
(1, 'Maidul Islam', '123', ''),
(2, 'Maidul Islam', '1234', ''),
(3, 'Maidul Islam', '12345', '12345.png'),
(4, 'Maidul Islam', '123456', '123456.jpg'),
(5, 'Maidul Islam', '1239', '1239.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `photo`, `status`) VALUES
(1, 'Maidul', 'maidul', 'maidul@gmail.com', '123456', '123456', 'inactive'),
(2, 'Maidul', 'Maidulweb', 'maidul2vatia@gmail.com', '12345678', 'Maidulweb.png', ''),
(3, 'Maidul', 'Maidulweb2', 'maidul2vatia2@gmail.com', '1234', 'Maidulweb2.png', 'inactive'),
(4, 'Maidul', 'Maidulweb23', 'maidul2vatia23@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Maidulweb23.png', 'inactive'),
(5, 'Maidul', 'Maidulweb23g', 'maidul2vatia23g@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Maidulweb23g.jpg', 'inactive'),
(6, 'Maidul', 'Maidulweb23gl', 'maidul2vatila23g@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Maidulweb23gl.jpg', 'inactive'),
(7, 'Maidul', 'new', 'maidulweb@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'new.png', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_student`
--
ALTER TABLE `add_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_student`
--
ALTER TABLE `add_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
