-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2025 at 04:34 PM
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
-- Database: `ecorent`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminactivities`
--

CREATE TABLE `adminactivities` (
  `adminActivityID` int(4) NOT NULL,
  `adminID` int(4) NOT NULL,
  `targetItemID` int(4) NOT NULL,
  `targetUserID` int(4) NOT NULL,
  `adminActivityType` varchar(20) NOT NULL,
  `adminActivityDetails` varchar(50) NOT NULL,
  `adminActivityDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `adminID` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `accountCreationDate` date NOT NULL DEFAULT current_timestamp(),
  `accountUpdatedDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(4) NOT NULL,
  `categoryName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contentmanagements`
--

CREATE TABLE `contentmanagements` (
  `contentID` int(4) NOT NULL,
  `adminID` int(4) NOT NULL,
  `contentType` varchar(20) NOT NULL,
  `contentTitle` varchar(20) NOT NULL,
  `contentDetails` varchar(50) NOT NULL DEFAULT current_timestamp(),
  `contentCreationDate` date NOT NULL DEFAULT current_timestamp(),
  `contentUpdatedDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemID` int(4) NOT NULL,
  `categoryID` int(4) NOT NULL,
  `itemName` varchar(50) NOT NULL,
  `description` varchar(300) NOT NULL,
  `itemSpecifications` varchar(1000) NOT NULL,
  `location` varchar(50) NOT NULL,
  `itemCondition` varchar(30) NOT NULL,
  `pricePerDay` decimal(10,0) NOT NULL,
  `pricePerWeek` decimal(10,0) NOT NULL,
  `securityDeposit` decimal(4,0) NOT NULL,
  `listingDate` date NOT NULL DEFAULT current_timestamp(),
  `listingUpdatedDate` date NOT NULL DEFAULT current_timestamp(),
  `isFeatured` varchar(3) NOT NULL,
  `isDeleted` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `paymentID` int(4) NOT NULL,
  `rentalID` int(4) NOT NULL,
  `paymentMethod` varchar(20) NOT NULL,
  `totalAmount` decimal(10,0) NOT NULL,
  `paymentStatus` varchar(20) NOT NULL,
  `paymentDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `preferences`
--

CREATE TABLE `preferences` (
  `preferenceID` int(4) NOT NULL,
  `userID` int(4) NOT NULL,
  `categoryID` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `rentalID` int(4) NOT NULL,
  `renterID` int(4) NOT NULL,
  `itemID` int(4) NOT NULL,
  `reservationDate` date NOT NULL DEFAULT current_timestamp(),
  `startRentalDate` date NOT NULL DEFAULT current_timestamp(),
  `endRentalDate` date NOT NULL DEFAULT current_timestamp(),
  `rentalPeriod` varchar(10) NOT NULL,
  `rateType` varchar(20) NOT NULL,
  `shippingMode` varchar(20) NOT NULL,
  `isDepositPaid` varchar(5) NOT NULL,
  `totalPrice` decimal(10,0) NOT NULL,
  `rentalStatus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(4) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `contactNumber` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `accountCreationDate` date NOT NULL DEFAULT current_timestamp(),
  `accountUpdatedDate` date NOT NULL DEFAULT current_timestamp(),
  `profilePicture` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `websitemetrics`
--

CREATE TABLE `websitemetrics` (
  `websiteMetricID` int(4) NOT NULL,
  `adminID` int(4) NOT NULL,
  `metricType` varchar(20) NOT NULL,
  `totalUsers` int(5) NOT NULL,
  `totalRentals` int(5) NOT NULL,
  `websiteVisits` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminactivities`
--
ALTER TABLE `adminactivities`
  ADD PRIMARY KEY (`adminActivityID`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `contentmanagements`
--
ALTER TABLE `contentmanagements`
  ADD PRIMARY KEY (`contentID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemID`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `preferences`
--
ALTER TABLE `preferences`
  ADD PRIMARY KEY (`preferenceID`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`rentalID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `websitemetrics`
--
ALTER TABLE `websitemetrics`
  ADD PRIMARY KEY (`websiteMetricID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminactivities`
--
ALTER TABLE `adminactivities`
  MODIFY `adminActivityID` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contentmanagements`
--
ALTER TABLE `contentmanagements`
  MODIFY `contentID` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `itemID` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `paymentID` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `preferences`
--
ALTER TABLE `preferences`
  MODIFY `preferenceID` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `rentalID` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `websitemetrics`
--
ALTER TABLE `websitemetrics`
  MODIFY `websiteMetricID` int(4) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
