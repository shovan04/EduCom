-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2022 at 05:47 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(225) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `status` smallint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `uname`, `pass`, `status`) VALUES
(1, 'Shovan04', '$2y$10$SHP.Qoq.p.G4JrAtdeSEi.8qQApAs1A23x97S9PIEhgMi7B3QAkxO', 1);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `dt` datetime(6) NOT NULL,
  `week` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `name`, `uname`, `dt`, `week`) VALUES
(1, 'Shovan Mondal', 'edu_14470_com', '2022-03-10 11:40:49.000000', '10');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `vfkey` varchar(255) NOT NULL,
  `status` smallint(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `uname`, `email`, `phone`, `vfkey`, `status`) VALUES
(1, 'Shovan Mondal', 'edu_14470_com', 'shovanm50@gmail.com', '9679970826', '4MlpBUF0jyZ2RoXTnLkNaJaQOYI1fSVvq8KsPguxcDdEibwCmerGW97A65tH3h', 1),
(3, 'Sayan Biswas', 'edu_14502_com', 'sayanbabu8@gmail.com', '9339932483', 'tIgfclm3EFwaL04aPYenSXZ1qks7A6hJxMUDr25uWVKNHyTvoGBRpbjC8diQ9O', 1),
(4, 'Raktim Biswas', 'edu_99824_com', 'raktimb361@gmail.com', '7865902915', 'l2EjXd3UKpfOq1k4AZ0IbVwWTyaRunQoFN8icSga9GBmhDH5rsPtJCLvexY76M', 1),
(5, 'Shubhajit Halder', 'edu_84358_com', 'shubhajith85@gmail.com', '7364979406', 'paEcwUfRtTvbYoie0qM5DP2sxIC1LgZa4uXr83GF6BJkmhlynAQ9KNSjOHW7dV', 1),
(6, 'Avirup Mukherjee', 'edu_76631_com', 'avirupmukherjee019@gmail.com', '6295317859', 'wJPaKbQcgHiO1M3CUvxyI5o4XYTrltnNaue0hRfAmEZ9VpG62qFW8LBks7jDSd', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uname` (`uname`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
