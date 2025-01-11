-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2025 at 05:01 PM
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

--
-- Dumping data for table `adminactivities`
--

INSERT INTO `adminactivities` (`adminActivityID`, `adminID`, `targetItemID`, `targetUserID`, `adminActivityType`, `adminActivityDetails`, `adminActivityDate`) VALUES
(1, 1, 1, 1, 'manageItem', 'restockItem', '2025-01-09'),
(2, 2, 6, 2, 'manageItem', 'addItem', '2025-01-09'),
(3, 3, 14, 3, 'manageItem', 'salesReport', '2025-01-09'),
(4, 4, 20, 4, 'manageItem', 'itemFeedbackReport', '2025-01-09'),
(5, 5, 23, 5, 'manageItem', 'removeItem', '2025-01-09');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `adminID` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(20) NOT NULL,
  `accountCreationDate` date NOT NULL DEFAULT current_timestamp(),
  `accountUpdatedDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adminID`, `email`, `password`, `accountCreationDate`, `accountUpdatedDate`) VALUES
(1, 'alan.smithee@gmail.com', 'alan123', '2025-01-09', '2025-01-09'),
(2, 'ian.anderson@gmail.com', 'ian123', '2025-01-09', '2025-01-09'),
(3, 'oscar.johnson@gmail.com', 'oscar123', '2025-01-09', '2025-01-09'),
(4, 'william.johnson@gmail.com', 'william123', '2025-01-09', '2025-01-09'),
(5, 'harry.jones@gmail.com', 'harry123', '2025-01-09', '2025-01-09');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(4) NOT NULL,
  `categoryName` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`) VALUES
(1, 'Electronics and Gadgets'),
(2, 'Transportation'),
(3, 'Clothing'),
(4, 'Sports & Outdoor'),
(5, 'Event Supplies\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `contentmanagements`
--

CREATE TABLE `contentmanagements` (
  `contentID` int(4) NOT NULL,
  `adminID` int(4) NOT NULL,
  `contentType` varchar(20) NOT NULL,
  `contentTitle` varchar(64) NOT NULL,
  `contentDetails` varchar(128) NOT NULL DEFAULT current_timestamp(),
  `contentCreationDate` date NOT NULL DEFAULT current_timestamp(),
  `contentUpdatedDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contentmanagements`
--

INSERT INTO `contentmanagements` (`contentID`, `adminID`, `contentType`, `contentTitle`, `contentDetails`, `contentCreationDate`, `contentUpdatedDate`) VALUES
(1, 2, 'promotion', '10% Cashback Guarantee!', 'Get 10% of your money back when you rent these items!', '2025-01-09', '2025-01-09'),
(2, 5, 'promotion', 'Welcome To EcoRent!', 'Free starting ₱100 for the first 100 Registered Users!', '2025-01-09', '2025-01-09');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemID` int(4) NOT NULL,
  `categoryID` int(4) NOT NULL,
  `itemName` varchar(50) NOT NULL,
  `itemType` varchar(64) NOT NULL,
  `gasEmissionSaved` decimal(10,3) NOT NULL,
  `pricePerDay` decimal(10,3) DEFAULT NULL,
  `itemCondition` varchar(30) NOT NULL,
  `itemSpecifications` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `location` varchar(50) NOT NULL,
  `pricePerHour` decimal(10,3) DEFAULT NULL,
  `pricePerWeek` decimal(10,3) DEFAULT NULL,
  `securityDeposit` decimal(4,3) DEFAULT NULL,
  `listingDate` date NOT NULL DEFAULT current_timestamp(),
  `listingUpdatedDate` date NOT NULL DEFAULT current_timestamp(),
  `isFeatured` varchar(3) NOT NULL,
  `isDeleted` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemID`, `categoryID`, `itemName`, `itemType`, `gasEmissionSaved`, `pricePerDay`, `itemCondition`, `itemSpecifications`, `description`, `location`, `pricePerHour`, `pricePerWeek`, `securityDeposit`, `listingDate`, `listingUpdatedDate`, `isFeatured`, `isDeleted`) VALUES
(1, 1, 'Canon EOS Rebel T7', 'DSLR', 2.500, 500.000, 'Excellent', '24.1 MP CMOS sensor, built-in WiFi, EF-S 18-55mm lens, Full HD video recording, 3-inch LCD screen', 'A reliable and beginner-friendly DSLR camera perfect for capturing high-quality photos and videos.', '1120 N State St, Chicago, IL 60610', NULL, NULL, NULL, '2025-01-10', '2025-01-10', 'Yes', 'No'),
(2, 1, 'Nikon D3500', 'DSLR', 2.600, 450.000, 'Good', '24.2 MP DX-format sensor, SnapBridge connectivity, 5 fps continuous shooting, 1080p Full HD video, 3-inch LCD screen', 'Lightweight and easy to use, this DSLR is great for both beginners and casual photography enthusiasts.', '2234 W Fullerton Ave, Chicago, IL 60647', NULL, NULL, NULL, '2025-01-10', '2025-01-10', 'Yes', 'No'),
(3, 1, 'Fujifilm Instax Mini 12', 'Instant Camera', 1.500, 250.000, 'Excellent', 'Automatic exposure adjustment, close-up mode, built-in flash, film compatibility (Instax Mini), compact design', 'A fun and stylish instant camera that makes capturing and printing memories effortless.', '3556 N Clark St, Chicago, IL 60657', NULL, NULL, NULL, '2025-01-10', '2025-01-10', 'Yes', 'No'),
(4, 1, 'Apple iPad Pro 12.9', 'Tablet', 2.500, 700.000, 'Excellent', '2.9-inch Liquid Retina XDR display, Apple M2 chip, 128GB storage, WiFi + Cellular, Face ID security\r\n', 'A powerful tablet for creatives and professionals, offering unmatched performance and a stunning display.', '1801 S Wabash Ave, Chicago, IL 60616', NULL, NULL, NULL, '2025-01-10', '2025-01-10', 'Yes', 'No'),
(5, 1, 'Samsung Galaxy Tab S8+', 'Tablet', 2.300, 600.000, 'Good', '12.4-inch AMOLED display, Snapdragon 8 Gen 1 processor, 256GB storage, S Pen included, 8GB RAM', 'A versatile tablet with vibrant visuals, ideal for entertainment, work, and creative tasks.', '5233 N Broadway St, Chicago, IL 60640', NULL, NULL, NULL, '2025-01-10', '2025-01-10', 'Yes', 'No'),
(6, 1, 'Dell XPS 13', 'Ultrabook', 3.800, 1200.000, 'Excellent', 'Intel Core i7 12th Gen, 16GB RAM, 512GB SSD, 13.4-inch InfinityEdge display, Windows 11', 'A sleek and lightweight laptop designed for productivity and portability, perfect for professionals on the go.', '1501 W Madison St, Chicago, IL 60607', NULL, NULL, NULL, '2025-01-10', '2025-01-10', 'Yes', 'No'),
(7, 1, 'MacBook Pro 16-inch (2023)', 'Work Laptop', 4.200, 1500.000, 'Excellent', 'Apple M2 Max chip, 32GB RAM, 1TB SSD, Liquid Retina XDR display, 21-hour battery life', 'A powerhouse laptop for heavy-duty tasks, offering exceptional performance and premium build quality.', '4725 S Ashland Ave, Chicago, IL 60609', NULL, NULL, NULL, '2025-01-10', '2025-01-10', 'Yes', 'No'),
(8, 2, 'Brompton Folding Bike', 'Bike with Basket', 3.000, 350.000, 'Excellent', 'Lightweight, 6-speed, compact fold, aluminum alloy frame, 16-inch wheels', 'A versatile and space-saving bike perfect for urban commutes. Its folding design makes it easy to store and transport.', '3543 W Montrose Ave, Chicago, IL 60618', NULL, NULL, NULL, '2025-01-10', '2025-01-10', 'Yes', 'No'),
(9, 2, 'Giant Talon 29 3', 'Mountain Bike', 4.500, 500.000, 'Good', 'Aluminum frame, hydraulic disc brakes, 29-inch tires, Shimano drivetrain, front suspension fork', 'Designed for off-road adventures, this mountain bike combines durability with smooth handling.', '2100 W North Ave, Chicago, IL 60622', NULL, NULL, NULL, '2025-01-10', '2025-01-10', 'Yes', 'No'),
(10, 2, 'Razor E300 Electric Scooter', 'Scooter', 3.800, 400.000, 'Excellent', '24V battery, 24 km/h max speed, up to 40 min runtime, 10-inch pneumatic tires, twist-grip throttle', 'An eco-friendly and fun way to get around town, offering a smooth and reliable ride.', '3600 W 26th St, Chicago, IL 60623', NULL, NULL, NULL, '2025-01-10', '2025-01-10', 'Yes', 'No'),
(11, 2, 'Mongoose Legion L80', 'BMX', 3.200, 450.000, 'Good', '20-inch tires, hi-ten steel frame, freestyle geometry, sealed bearings, 360° rotor', 'Built for tricks and stunts, this BMX bike is ideal for freestyle enthusiasts and urban riders.', '5701 N Milwaukee Ave, Chicago, IL 60646', NULL, NULL, NULL, '2025-01-10', '2025-01-10', 'Yes', 'No'),
(12, 2, 'Electra Townie 7D', 'Bike with Basket', 3.500, 300.000, 'Excellent', '7-speed, ergonomic design, rear rack, step-through frame, puncture-resistant tires', 'A stylish and comfortable bike for leisurely rides and quick errands around the neighborhood.', '3420 W 95th St, Evergreen Park, IL 60805', NULL, NULL, NULL, '2025-01-10', '2025-01-10', 'Yes', 'No'),
(13, 3, 'Hugo Boss Formal Suit', 'Men’s Suit', 1.500, 700.000, 'Excellent', 'Slim fit, wool blend, navy color, two-button closure, notched lapels', 'A sophisticated and timeless choice for formal occasions and business meetings.', '7201 W 79th St, Bridgeview, IL 60455', NULL, NULL, NULL, '2025-01-10', '2025-01-10', 'Yes', 'No'),
(14, 3, 'Vera Wang Event Gown', 'Gown', 1.800, 1200.000, 'Excellent', 'Silk fabric, sequin details, A-line silhouette, adjustable straps, hidden zipper', 'A stunning gown that exudes elegance, perfect for weddings, galas, and other special events', '17200 Oak Park Ave, Tinley Park, IL 60477', NULL, NULL, NULL, '2025-01-10', '2025-01-10', 'Yes', 'No'),
(15, 3, 'Filipiniana Modern Terno', 'Filipiniana', 1.200, 600.000, 'Good', 'Organza, butterfly sleeves, embroidered patterns, full-length skirt, fitted bodice', 'A modern take on traditional Filipino attire, blending heritage with contemporary style', '9200 S Western Ave, Chicago, IL 60620', NULL, NULL, NULL, '2025-01-10', '2025-01-10', 'Yes', 'No'),
(16, 3, 'Custom Barong Tagalog', 'Barong Tagalog', 1.300, 500.000, 'Excellent', 'Piña fiber, hand-woven, traditional design, embroidered details, button-down closure', 'A classic Barong Tagalog that showcases Filipino craftsmanship, perfect for formal and cultural events.', '19801 La Grange Rd, Mokena, IL 60448', NULL, NULL, NULL, '2025-01-10', '2025-01-10', 'Yes', 'No'),
(17, 3, 'Ralph Lauren Evening Suit', 'Men’s Suit', 1.600, 750.000, 'Excellent', 'Classic fit, black wool, notch lapel, double vent, fully lined', 'An elegant evening suit that provides a polished and refined look for formal gatherings.', '18900 Wolf Rd, Mokena, IL 60448', NULL, NULL, NULL, '2025-01-10', '2025-01-10', 'Yes', 'No'),
(18, 4, 'Coleman Sundome Tent', 'Camping Tent', 2.000, 400.000, 'Excellent', '4-person, weatherproof, easy setup', 'Ideal for family camping trips, this tent is quick to set up and provides excellent protection from the elements.', '21430 Wolf Rd, Mokena, IL 60448', NULL, NULL, NULL, '2025-01-10', '2025-01-10', 'Yes', 'No'),
(19, 4, 'Osprey Aether 65', 'Hiking Backpack', 1.800, 350.000, 'Excellent', '65L capacity, adjustable fit, hydration-compatible', 'Perfect for long hikes, this backpack offers ample storage, comfort, and hydration compatibility for your adventures.', '18300 Governors Hwy, Homewood, IL 60430', NULL, NULL, NULL, '2025-01-10', '2025-01-10', 'Yes', 'No'),
(20, 4, 'Decathlon Quechua MH100', 'Camping Tent', 2.300, 300.000, 'Good', '2-person, lightweight, UV protection', 'A lightweight and compact tent, perfect for short camping trips with UV protection and easy setup.', '16715 Oak Park Ave, Tinley Park, IL 60477', NULL, NULL, NULL, '2025-01-10', '2025-01-10', 'Yes', 'No'),
(21, 4, 'CamelBak MULE Pro', 'Hiking Backpack', 1.500, 250.000, 'Good', '20L capacity, insulated water reservoir, breathable straps', 'A compact and functional hiking backpack with built-in hydration, ideal for day hikes or biking.', '14900 S Cicero Ave, Oak Forest, IL 60452', NULL, NULL, NULL, '2025-01-10', '2025-01-10', 'Yes', 'No'),
(22, 4, 'Black Diamond Stormline', 'Rain Jacket', 1.200, 200.000, 'Excellent', 'Waterproof, lightweight, stretch fabric', 'Stay dry in the toughest weather conditions with this lightweight, waterproof jacket designed for outdoor enthusiasts.', '13945 S Cicero Ave, Crestwood, IL 60445', NULL, NULL, NULL, '2025-01-10', '2025-01-10', 'Yes', 'No'),
(23, 5, 'Karaoke Machine', 'Audio Equipment', 0.800, 500.000, 'Excellent', 'Wireless microphones, Bluetooth connectivity, 12-hour battery life', 'This karaoke machine is perfect for any event looking to add some fun and entertainment. It comes with wireless microphones for ease of movement and features Bluetooth connectivity, allowing you to easily play your favorite tracks. The machine has a long battery life, making it ideal for parties or gatherings that go on for hours. It also includes built-in speakers for clear sound quality, ensuring everyone can enjoy the karaoke experience.', '11500 Ridgeland Ave, Worth, IL 60482', NULL, NULL, NULL, '2025-01-10', '2025-01-10', 'Yes', 'No'),
(24, 5, 'Tables and Chairs (Set of 6)', 'Furniture', 1.000, 0.000, 'Good', 'Foldable, durable metal frame, cushioned seats', 'This set of 6 tables and chairs is designed for versatility and comfort. The foldable design makes it easy to transport and set up, while the durable metal frame ensures stability for guests. The cushioned seats add comfort for long hours of sitting, making it ideal for both casual and formal events. Whether you\'re hosting a small gathering or a larger event, this furniture set is the perfect choice for seating your guests.', '9335 S Cicero Ave, Oak Lawn, IL 60453', NULL, NULL, NULL, '2025-01-10', '2025-01-10', 'Yes', 'No'),
(25, 5, 'Party Decor Kit', 'Party Supplies', 0.500, 400.000, 'Excellent', 'Balloons, streamers, fairy lights, banners, and tablecloths', 'Transform your venue into a festive wonderland with this all-in-one party decor kit. The kit includes vibrant balloons, colorful streamers, fairy lights for ambiance, cheerful banners, and matching tablecloths to complete the look. Perfect for birthdays, weddings, or any special occasion, this decor kit will add a touch of celebration and fun to your event. It’s a quick and easy way to set the mood and make your event unforgettable.', '5545 W 79th St, Burbank, IL 60459', NULL, NULL, NULL, '2025-01-10', '2025-01-10', 'Yes', 'No'),
(26, 5, 'Pop-Up Canopy Tent', 'Outdoor Shelter', 1.200, 600.000, 'Excellent', '10x10 ft, waterproof, UV-resistant, easy setup', 'This pop-up canopy tent offers reliable shelter for your outdoor events, whether you\'re hosting a wedding, outdoor market, or family gathering. Measuring 10x10 ft, it provides ample space for guests and supplies. The waterproof and UV-resistant materials ensure that you and your guests are protected from the elements, while the easy setup design allows for quick assembly and disassembly. It’s perfect for both sunny days and rainy weather, keeping your event going smoothly no matter the conditions.', '8901 S Ridgeland Ave, Chicago Ridge, IL 60415', NULL, NULL, NULL, '2025-01-10', '2025-01-10', 'Yes', 'No');

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

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`paymentID`, `rentalID`, `paymentMethod`, `totalAmount`, `paymentStatus`, `paymentDate`) VALUES
(1, 1, 'GCash', 3500, 'completed', '2025-01-10'),
(2, 2, 'cash-on-meet', 1350, 'pending', '2025-01-10');

-- --------------------------------------------------------

--
-- Table structure for table `preferences`
--

CREATE TABLE `preferences` (
  `preferenceID` int(4) NOT NULL,
  `userID` int(4) NOT NULL,
  `categoryID` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `preferences`
--

INSERT INTO `preferences` (`preferenceID`, `userID`, `categoryID`) VALUES
(1, 4, 1),
(2, 2, 1);

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

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`rentalID`, `renterID`, `itemID`, `reservationDate`, `startRentalDate`, `endRentalDate`, `rentalPeriod`, `rateType`, `shippingMode`, `isDepositPaid`, `totalPrice`, `rentalStatus`) VALUES
(1, 4, 1, '2025-01-09', '2025-01-09', '2025-01-09', '7 days', 'per day', 'meetup', 'true', 490, 'approved'),
(2, 2, 2, '2025-01-09', '2025-01-09', '2025-01-09', '3 days', 'per hour', 'cash-on-pickup', 'false', 189, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(4) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(15) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `contactNumber` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `accountCreationDate` date NOT NULL DEFAULT current_timestamp(),
  `accountUpdatedDate` date NOT NULL DEFAULT current_timestamp(),
  `profilePicture` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `firstName`, `lastName`, `email`, `password`, `status`, `gender`, `contactNumber`, `address`, `accountCreationDate`, `accountUpdatedDate`, `profilePicture`) VALUES
(1, 'Alan', 'Smithee', 'alan.smithee@gmail.com', 'alan123', 'Active', 'Male', '+63-912-345-678', '1234 Maple Street, Springfield, IL 62701', '2025-01-09', '2025-01-09', 'alan.jpg'),
(2, 'Ian', 'Anderson', 'ian.anderson@gmail.com', 'ian123', 'Inactive', 'Male', '+63-921-234-567', '5678 Oak Avenue, Los Angeles, CA 90001', '2025-01-09', '2025-01-09', 'ian.jpg'),
(3, 'Oscar', 'Johnson', 'oscar.johnson@gmail.com', 'oscar123', 'Inactive', 'Male', '+63-928-123-456', '4321 Pine Road, Miami, FL 33101', '2025-01-09', '2025-01-09', 'oscar.jpg'),
(4, 'William', 'Johnson', 'william.johnson@gmail.com', 'william123', 'Active', 'Male', '+63-937-876-543', '8765 Birch Lane, Dallas, TX 75201', '2025-01-09', '2025-01-09', 'william.jpg'),
(5, 'Harry', 'Jones', 'harry.jones@gmail.com', 'harry123', 'Active', 'Male', '+63-915-678-123', '2345 Elm Drive, Chicago, IL 60601', '2025-01-09', '2025-01-09', 'harry.jpg');

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
-- Dumping data for table `websitemetrics`
--

INSERT INTO `websitemetrics` (`websiteMetricID`, `adminID`, `metricType`, `totalUsers`, `totalRentals`, `websiteVisits`) VALUES
(1, 3, 'none', 0, 0, 0);

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
  MODIFY `adminActivityID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contentmanagements`
--
ALTER TABLE `contentmanagements`
  MODIFY `contentID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `itemID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `paymentID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `preferences`
--
ALTER TABLE `preferences`
  MODIFY `preferenceID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `rentalID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `websitemetrics`
--
ALTER TABLE `websitemetrics`
  MODIFY `websiteMetricID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
