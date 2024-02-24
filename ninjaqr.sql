-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2024 at 06:14 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ninjaqr`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(22) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(22) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `regtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `username`, `password`, `regtime`) VALUES
(1, 'Ram Prajapati', 'ram@gmail.com', 'ram', 'ram', '2024-01-06 13:29:05'),
(2, 'sonam', 'sonam@gmail.com', 'sonu', 'sonu', '2024-01-10 07:43:44');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `username`, `password`) VALUES
(20, 'Mahajan ', 'mahajan@gmil.com', 'Mahajan ', 'maha'),
(21, 'Jatin Parmarjjjjj', 'jatin@gmail.comjjjj', 'Jatin Parmarjjjjj', 'jjjj'),
(22, 'Preksha Mehta', 'preksha12@gmail.com', 'preksha12', 'preksha12'),
(24, 'Ramdyal', 'kingk986991@gmail.com', 'ram', '123'),
(25, 'Ashok Prajapati', 'kingk9869991@gmail.com', 'ashok', '123'),
(26, 'Jatin Parmar', 'jatin@gmail.com', 'jatin', 'jatin'),
(27, 'Preksha Mehta', 'preksha@gmail.com', 'preksha', 'preksha'),
(28, 'Ujjawal Shukla', 'Ujjawal@gmail.com', 'Ujjawal', 'Ujjawal'),
(29, 'Ramdyal Prajapati', 'kingk9869991@gmail.com', 'ram', '123'),
(30, 'Ashok Prajapati', 'kingk9869991@gmail.com', 'ashok', '123'),
(31, 'Jatin Parmar', 'jatin@gmail.com', 'jatin', 'jatin'),
(32, 'Preksha Mehta', 'preksha@gmail.com', 'preksha', 'preksha'),
(33, 'Ujjawal Shukla', 'Ujjawal@gmail.com', 'Ujjawal', 'Ujjawal'),
(34, 'Ramdyal Prajapati', 'kingk9869991@gmail.com', 'ram', '123'),
(35, 'Ashok Prajapati', 'kingk9869991@gmail.com', 'ashok', '123'),
(36, 'Jatin Parmar', 'jatin@gmail.com', 'jatin', 'jatin'),
(37, 'Preksha Mehta', 'preksha@gmail.com', 'preksha', 'preksha'),
(38, 'Ujjawal Shukla', 'Ujjawal@gmail.com', 'Ujjawal', 'Ujjawal'),
(39, 'Paan Singh Tomar', 'Paan@gmail.com', 'Paan Singh Tomar', 'paan'),
(40, 'Maan Singh', 'Maan@gmail.com', 'Maan Singh', 'maan22'),
(44, 'sonam ', 'upadhyaysonam@gmail.com', 'sonu', 'aa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
