-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2023 at 11:56 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rent`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `ID` int(100) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`ID`, `Name`, `Password`) VALUES
(1, 'Admin', 'Admin123');

-- --------------------------------------------------------

--
-- Table structure for table `booked`
--

CREATE TABLE `booked` (
  `ID` int(100) NOT NULL,
  `car_id` int(100) NOT NULL,
  `car_name` varchar(200) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `payment_amount` varchar(200) NOT NULL,
  `time_period` varchar(100) NOT NULL,
  `Status` varchar(100) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carinfo`
--

CREATE TABLE `carinfo` (
  `ID` int(20) NOT NULL,
  `car_model` varchar(100) NOT NULL,
  `car_price` int(100) NOT NULL,
  `car_date` varchar(30) NOT NULL,
  `imglink` varchar(300) NOT NULL,
  `Description` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carinfo`
--

INSERT INTO `carinfo` (`ID`, `car_model`, `car_price`, `car_date`, `imglink`, `Description`) VALUES
(1, 'Hyundai ace 4', 300, '2020', './img/car1.jpg', 'Very good car man'),
(2, 'Hyundai brace', 200, '2020', './img/car3.jpg', 'nice car'),
(25, 'Car 3', 200, '2012', './img/car5.jpg', 'good car'),
(26, 'Car 4', 400, '2021', './img/car4.jpg', 'good car');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `ID` int(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`ID`, `Username`, `Email`, `Password`, `Phone`) VALUES
(33, 'prakash12', 'basulamichane1000@gmail.com', 'prakash123', '9816762727'),
(35, 'Reewaz', 'reewazaryal1212@gmail.com', 'reewaz123', '9918298212');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `booked`
--
ALTER TABLE `booked`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `carinfo`
--
ALTER TABLE `carinfo`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booked`
--
ALTER TABLE `booked`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `carinfo`
--
ALTER TABLE `carinfo`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
