-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2025 at 09:10 AM
-- Server version: 8.0.40
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `organdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `DONATION_ID` int NOT NULL,
  `DONOR_ID` int DEFAULT NULL,
  `REQUEST_ID` int DEFAULT NULL,
  `DONATION_DATE` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `organ_requests`
--

CREATE TABLE `organ_requests` (
  `REQUEST_ID` int NOT NULL,
  `ID` int DEFAULT NULL,
  `ORGAN_TYPE` varchar(50) NOT NULL,
  `BLOOD_GROUPn` varchar(5) NOT NULL,
  `QUANTITY` int NOT NULL,
  `REQUEST_TYPE` varchar(50) DEFAULT NULL,
  `ADD_RESSn` varchar(255) DEFAULT NULL,
  `REQUEST_TIME` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `ID` int NOT NULL,
  `FIRST_NAME` varchar(100) NOT NULL,
  `LAST_NAME` varchar(100) NOT NULL,
  `AGE` int NOT NULL,
  `BLOOD_GROUPr` varchar(10) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PASS_WORD` varchar(255) NOT NULL,
  `phoneR` varchar(15) DEFAULT NULL,
  `ADD_RESSr` text,
  `ZIP_CODE` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`ID`, `FIRST_NAME`, `LAST_NAME`, `AGE`, `BLOOD_GROUPr`, `Gender`, `EMAIL`, `PASS_WORD`, `phoneR`, `ADD_RESSr`, `ZIP_CODE`) VALUES
(1, 'riya', 'prajapati', 21, 'O+', 'Female', 'abcd123@gmail.com', 'abcd', '1234567890', 'abcd', 0),
(2, 'raj', 'prajapati', 18, 'AB-', 'Male', 'abcd1234@gmail.com', 'asdf', '8796547089', 'qwertyui', 100000),
(3, 'riya', 'patil', 6, 'A-', 'Female', 'pqrs@gmail.com', 'raj', '1234567890', 'borivali', 300908),
(4, 'samir', 'shaikh', 23, 'A+', 'Male', 'rs163@gmail.com', 'samir', '1234512345', 'daman', 890009),
(5, 'Yashvi', 'Patel', 21, 'A+', 'Female', 'yashvi123@gmail.com', '@abcd', '8976453246', 'borivali', 890009);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`DONATION_ID`),
  ADD KEY `DONOR_ID` (`DONOR_ID`),
  ADD KEY `REQUEST_ID` (`REQUEST_ID`);

--
-- Indexes for table `organ_requests`
--
ALTER TABLE `organ_requests`
  ADD PRIMARY KEY (`REQUEST_ID`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `DONATION_ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organ_requests`
--
ALTER TABLE `organ_requests`
  MODIFY `REQUEST_ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `donations_ibfk_1` FOREIGN KEY (`DONOR_ID`) REFERENCES `registration` (`ID`),
  ADD CONSTRAINT `donations_ibfk_2` FOREIGN KEY (`REQUEST_ID`) REFERENCES `organ_requests` (`REQUEST_ID`);

--
-- Constraints for table `organ_requests`
--
ALTER TABLE `organ_requests`
  ADD CONSTRAINT `organ_requests_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `registration` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
