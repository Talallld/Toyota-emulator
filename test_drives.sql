-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2025 at 01:04 PM
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
-- Database: `webproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `test_drives`
--

CREATE TABLE `test_drives` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `car` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `time` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test_drives`
--

INSERT INTO `test_drives` (`id`, `full_name`, `phone`, `email`, `car`, `city`, `time`, `date`, `notes`) VALUES
(4, 'rakan', '055-9284-895', 'rakan@gmail.com', 'Supra', 'الدمام', 'المساء', '2025-11-27', ''),
(5, 'ali', '055-9386-645', 'ali@gmail.com', 'Land Cruiser', 'الدمام', 'الصباح', '2025-11-25', ''),
(6, 'osama', '055-9274-835', 'osama@gmail.com', 'Camry', 'الرياض', 'الظهر', '2025-11-23', ''),
(7, 'Ali', '055-4345-835', 'ali@gmail.com', 'Crown', 'المدينة المنورة', 'المساء', '2025-11-30', ''),
(8, 'mohammed', '055-4568-368', 'mohammed@gmail.com', 'gr86', 'الطائف', 'الصباح', '2025-12-24', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `test_drives`
--
ALTER TABLE `test_drives`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `test_drives`
--
ALTER TABLE `test_drives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
