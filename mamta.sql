-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2023 at 07:55 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mamta`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `Id` int(11) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `ParentId` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`Id`, `CreatedDate`, `Name`, `ParentId`) VALUES
(1, '2023-05-25 10:34:20', 'Abhjeet', NULL),
(2, '2023-05-25 10:34:20', 'Sanel', NULL),
(3, '2023-05-25 10:34:20', 'Kapil', NULL),
(4, '2023-05-25 10:34:20', 'Adam', NULL),
(5, '2023-05-25 10:34:20', 'Testuser1', NULL),
(6, '2023-05-25 10:34:20', 'Albrito', 1),
(7, '2023-05-25 10:34:20', 'Sid', 1),
(8, '2023-05-25 10:34:20', 'Vasim Kudle', 1),
(9, '2023-05-25 10:34:20', 'Mohit', 2),
(10, '2023-05-25 10:34:20', 'Testuser2', 5),
(11, '2023-05-25 10:34:20', 'Bala', 6),
(12, '2023-05-25 10:34:20', 'Sadashiv', 6),
(13, '2023-05-25 10:34:20', 'Raghven', 7),
(14, '2023-05-25 10:34:20', 'Manjiri', 7),
(15, '2023-05-25 10:34:20', 'Testuser3', 10),
(16, '2023-05-25 10:34:20', 'Arvind', 13),
(17, '2023-05-25 10:34:20', 'David', 16),
(18, '2023-05-25 10:34:20', 'Anup', 16),
(19, '2023-05-25 10:34:20', 'Sarvesh', 17),
(20, '2023-05-25 10:34:20', 'Dhreej', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `ParentId` (`ParentId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`ParentId`) REFERENCES `members` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
