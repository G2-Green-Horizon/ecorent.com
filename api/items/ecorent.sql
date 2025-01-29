-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2025 at 12:54 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `attachmentID` int(100) NOT NULL,
  `itemID` int(100) NOT NULL,
  `fileName` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`attachmentID`, `itemID`, `fileName`) VALUES
(1, 1, 'eg1.jpg'),
(2, 2, 'eg2.2.jpeg'),
(3, 3, 'eg3.jpg'),
(4, 4, 'eg4.jpg'),
(5, 5, 'eg5.jpg'),
(6, 6, 'e6.jpg'),
(7, 7, 'e7.jpg'),
(8, 8, 't1.jpg'),
(9, 9, 't2.jpg'),
(10, 10, 't3.jpg'),
(11, 11, 't4.jpg'),
(12, 12, 't5.jpg'),
(13, 13, 'c1.jpg'),
(14, 14, 'c2.jpg'),
(15, 15, 'c3.jpg'),
(16, 16, 'c4.jpg'),
(17, 17, 'c5.jpeg'),
(18, 18, 's1.jpg'),
(19, 19, 's2.jpg'),
(20, 20, 's3.jpg'),
(21, 21, 's4.jpg'),
(22, 22, 's5.jpg'),
(23, 23, 'p1.jpg'),
(24, 24, 'p2.jpg'),
(25, 25, 'p3.jpg'),
(26, 26, 'p4.jpg'),
(27, 27, '2025Jan21031036000000-waterbottle.JPG'),
(28, 28, '2025Jan21031751000000-basketball.JPG');

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
(5, 'Event Supplies');

-- --------------------------------------------------------

--
-- Table structure for table `conditions`
--

CREATE TABLE `conditions` (
  `conditionID` int(4) NOT NULL,
  `conditionName` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `conditions`
--

INSERT INTO `conditions` (`conditionID`, `conditionName`) VALUES
(1, 'Excellent'),
(2, 'Good'),
(3, 'Okay'),
(4, 'Bad');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemID` int(4) NOT NULL,
  `categoryID` int(4) NOT NULL,
  `conditionID` int(4) NOT NULL,
  `itemName` varchar(50) NOT NULL,
  `itemType` varchar(64) NOT NULL,
  `gasEmissionSaved` decimal(10,2) NOT NULL,
  `pricePerDay` decimal(10,2) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `itemSpecifications` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `location` varchar(50) NOT NULL,
  `listingDate` date NOT NULL DEFAULT current_timestamp(),
  `listingUpdatedDate` date NOT NULL DEFAULT current_timestamp(),
  `isDeleted` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemID`, `categoryID`, `conditionID`, `itemName`, `itemType`, `gasEmissionSaved`, `pricePerDay`, `stock`, `itemSpecifications`, `description`, `location`, `listingDate`, `listingUpdatedDate`, `isDeleted`) VALUES
(1, 1, 1, 'Canon EOS Rebel', 'DSLR', 2.50, 500.00, 8, '24.1 MP CMOS sensor, built-in WiFi, EF-S 18-55mm lens, Full HD video recording, 3-inch LCD screen', 'A reliable and beginner-friendly DSLR camera perfect for capturing high-quality photos and videos.', 'Brgy.San Antonio, Sto.Tomas, Batangas', '2025-01-10', '2025-01-27', 'No'),
(2, 1, 2, 'Nikon D3500', 'DSLR', 2.60, 450.00, 26, '24.2 MP DX-format sensor, SnapBridge connectivity, 5 fps continuous shooting, 1080p Full HD video, 3-inch LCD screen', 'Lightweight and easy to use, this DSLR is great for both beginners and casual photography enthusiasts.', 'Brgy.San Antonio, Sto.Tomas, Batangas', '2025-01-10', '2025-01-21', 'No'),
(3, 1, 3, 'Fujifilm Instax Mini 13', 'Instant Camera', 1.50, 250.00, 25, 'Automatic exposure adjustment, close-up mode, built-in flash, film compatibility (Instax Mini), compact design', 'A fun and stylish instant camera that makes capturing and printing memories effortless.', 'Brgy.San Antonio, Sto.Tomas, Batangas', '2025-01-10', '2025-01-21', 'No'),
(4, 1, 4, 'Apple iPad Pro 12.9', 'Tablet', 2.50, 700.00, 26, '2.9-inch Liquid Retina XDR display, Apple M2 chip, 128GB storage, WiFi + Cellular, Face ID security\r\n', 'A powerful tablet for creatives and professionals, offering unmatched performance and a stunning display.', 'Brgy.San Antonio, Sto.Tomas, Batangas', '2025-01-10', '2025-01-10', 'No'),
(5, 1, 1, 'Samsung Galaxy Tab S8+', 'Tablet', 2.30, 650.00, 26, '12.4-inch AMOLED display, Snapdragon 8 Gen 1 processor, 256GB storage, S Pen included, 8GB RAM', 'A versatile tablet with vibrant visuals, ideal for entertainment, work, and creative tasks.', 'Brgy.San Antonio, Sto.Tomas, Batangas', '2025-01-10', '2025-01-21', 'No'),
(6, 1, 3, 'Dell XPS 13', 'Ultrabook', 3.80, 1200.00, 26, 'Intel Core i7 12th Gen, 16GB RAM, 512GB SSD, 13.4-inch InfinityEdge display, Windows 11', 'A sleek and lightweight laptop designed for productivity and portability, perfect for professionals on the go.', 'Brgy.San Antonio, Sto.Tomas, Batangas', '2025-01-10', '2025-01-10', 'No'),
(7, 1, 1, 'MacBook Pro 16-inch (2023)', 'Work Laptop', 4.20, 1500.00, 25, 'Apple M2 Max chip, 32GB RAM, 1TB SSD, Liquid Retina XDR display, 21-hour battery life', 'A powerhouse laptop for heavy-duty tasks, offering exceptional performance and premium build quality.', 'Brgy.San Antonio, Sto.Tomas, Batangas', '2025-01-10', '2025-01-10', 'No'),
(8, 2, 2, 'Brompton Folding Bike', 'Bike with Basket', 3.00, 350.00, 26, 'Lightweight, 6-speed, compact fold, aluminum alloy frame, 16-inch wheels', 'A versatile and space-saving bike perfect for urban commutes. Its folding design makes it easy to store and transport.', 'Brgy.San Antonio, Sto.Tomas, Batangas', '2025-01-10', '2025-01-10', 'No'),
(9, 2, 3, 'Giant Talon 29 2', 'Mountain Bike', 4.50, 500.00, 1, 'Aluminum frame, hydraulic disc brakes, 29-inch tires, Shimano drivetrain, front suspension fork', 'Designed for off-road adventures, this mountain bike combines durability with smooth handling.', 'Brgy.San Antonio, Sto.Tomas, Batangas', '2025-01-10', '2025-01-21', 'No'),
(10, 2, 4, 'Razor E300 Electric Scooter', 'Scooter', 3.80, 400.00, 26, '24V battery, 24 km/h max speed, up to 40 min runtime, 10-inch pneumatic tires, twist-grip throttle', 'An eco-friendly and fun way to get around town, offering a smooth and reliable ride.', 'Brgy.San Antonio, Sto.Tomas, Batangas', '2025-01-10', '2025-01-10', 'No'),
(11, 2, 1, 'Mongoose Legion L80', 'BMX', 3.20, 450.00, 26, '20-inch tires, hi-ten steel frame, freestyle geometry, sealed bearings, 360° rotor', 'Built for tricks and stunts, this BMX bike is ideal for freestyle enthusiasts and urban riders.', 'Brgy.San Antonio, Sto.Tomas, Batangas', '2025-01-10', '2025-01-23', 'No'),
(12, 2, 1, 'Electra Townie 7D', 'Bike with Basket', 3.50, 300.00, 26, '7-speed, ergonomic design, rear rack, step-through frame, puncture-resistant tires', 'A stylish and comfortable bike for leisurely rides and quick errands around the neighborhood.', 'Brgy.San Antonio, Sto.Tomas, Batangas', '2025-01-10', '2025-01-23', 'No'),
(13, 3, 1, 'Hugo Boss Formal Suit', 'Men’s Suit', 1.50, 700.00, 26, 'Slim fit, wool blend, navy color, two-button closure, notched lapels', 'A sophisticated and timeless choice for formal occasions and business meetings.', 'Brgy.San Antonio, Sto.Tomas, Batangas', '2025-01-10', '2025-01-23', 'No'),
(14, 3, 1, 'Vera Wang Event Gown', 'Gown', 1.80, 1200.00, 26, 'Silk fabric, sequin details, A-line silhouette, adjustable straps, hidden zipper', 'A stunning gown that exudes elegance, perfect for weddings, galas, and other special events', 'Brgy.San Antonio, Sto.Tomas, Batangas', '2025-01-10', '2025-01-23', 'No'),
(15, 3, 1, 'Filipiniana Modern Terno', 'Filipiniana', 1.20, 600.00, 26, 'Organza, butterfly sleeves, embroidered patterns, full-length skirt, fitted bodice', 'A modern take on traditional Filipino attire, blending heritage with contemporary style', 'Brgy.San Antonio, Sto.Tomas, Batangas', '2025-01-10', '2025-01-23', 'No'),
(16, 3, 1, 'Custom Barong Tagalog', 'Barong Tagalog', 1.30, 500.00, 26, 'Piña fiber, hand-woven, traditional design, embroidered details, button-down closure', 'A classic Barong Tagalog that showcases Filipino craftsmanship, perfect for formal and cultural events.', 'Brgy.San Antonio, Sto.Tomas, Batangas', '2025-01-10', '2025-01-23', 'No'),
(17, 3, 1, 'Ralph Lauren Evening Suit', 'Men’s Suit', 1.60, 750.00, 26, 'Classic fit, black wool, notch lapel, double vent, fully lined', 'An elegant evening suit that provides a polished and refined look for formal gatherings.', 'Brgy.San Antonio, Sto.Tomas, Batangas', '2025-01-10', '2025-01-23', 'No'),
(18, 4, 1, 'Coleman Sundome Tent', 'Camping Tent', 2.00, 400.00, 26, '4-person, weatherproof, easy setup', 'Ideal for family camping trips, this tent is quick to set up and provides excellent protection from the elements.', 'Brgy.San Antonio, Sto.Tomas, Batangas', '2025-01-10', '2025-01-23', 'No'),
(19, 4, 1, 'Osprey Aether 65', 'Hiking Backpack', 1.80, 350.00, 26, '65L capacity, adjustable fit, hydration-compatible', 'Perfect for long hikes, this backpack offers ample storage, comfort, and hydration compatibility for your adventures.', 'Brgy.San Antonio, Sto.Tomas, Batangas', '2025-01-10', '2025-01-23', 'No'),
(20, 4, 1, 'Decathlon Quechua MH100', 'Camping Tent', 2.30, 300.00, 26, '2-person, lightweight, UV protection', 'A lightweight and compact tent, perfect for short camping trips with UV protection and easy setup.', 'Brgy.San Antonio, Sto.Tomas, Batangas', '2025-01-10', '2025-01-23', 'No'),
(21, 4, 1, 'CamelBak MULE Pro', 'Hiking Backpack', 1.50, 250.00, 26, '20L capacity, insulated water reservoir, breathable straps', 'A compact and functional hiking backpack with built-in hydration, ideal for day hikes or biking.', 'Brgy.San Antonio, Sto.Tomas, Batangas', '2025-01-10', '2025-01-23', 'No'),
(22, 4, 1, 'Black Diamond Stormline', 'Rain Jacket', 1.20, 200.00, 26, 'Waterproof, lightweight, stretch fabric', 'Stay dry in the toughest weather conditions with this lightweight, waterproof jacket designed for outdoor enthusiasts.', 'Brgy.San Antonio, Sto.Tomas, Batangas', '2025-01-10', '2025-01-23', 'No'),
(23, 5, 1, 'Karaoke Machine', 'Audio Equipment', 0.80, 500.00, 26, 'Wireless microphones, Bluetooth connectivity, 12-hour battery life', 'This karaoke machine is perfect for any event looking to add some fun and entertainment. It comes with wireless microphones for ease of movement and features Bluetooth connectivity, allowing you to easily play your favorite tracks. The machine has a long battery life, making it ideal for parties or gatherings that go on for hours. It also includes built-in speakers for clear sound quality, ensuring everyone can enjoy the karaoke experience.', 'Brgy.San Antonio, Sto.Tomas, Batangas', '2025-01-10', '2025-01-23', 'No'),
(24, 5, 1, 'Tables and Chairs (Set of 6)', 'Furniture', 1.00, 100.00, 26, 'Foldable, durable metal frame, cushioned seats', 'This set of 6 tables and chairs is designed for versatility and comfort. The foldable design makes it easy to transport and set up, while the durable metal frame ensures stability for guests. The cushioned seats add comfort for long hours of sitting, making it ideal for both casual and formal events. Whether you\'re hosting a small gathering or a larger event, this furniture set is the perfect choice for seating your guests.', 'Brgy.San Antonio, Sto.Tomas, Batangas', '2025-01-10', '2025-01-23', 'No'),
(25, 5, 1, 'Party Decor Kit', 'Party Supplies', 0.50, 400.00, 25, 'Balloons, streamers, fairy lights, banners, and tablecloths', 'Transform your venue into a festive wonderland with this all-in-one party decor kit. The kit includes vibrant balloons, colorful streamers, fairy lights for ambiance, cheerful banners, and matching tablecloths to complete the look. Perfect for birthdays, weddings, or any special occasion, this decor kit will add a touch of celebration and fun to your event. It’s a quick and easy way to set the mood and make your event unforgettable.', 'Brgy.San Antonio, Sto.Tomas, Batangas', '2025-01-10', '2025-01-23', 'No'),
(26, 5, 1, 'Pop-Up Canopy Tent', 'Outdoor Shelter', 1.20, 600.00, 26, '10x10 ft, waterproof, UV-resistant, easy setup', 'This pop-up canopy tent offers reliable shelter for your outdoor events, whether you\'re hosting a wedding, outdoor market, or family gathering. Measuring 10x10 ft, it provides ample space for guests and supplies. The waterproof and UV-resistant materials ensure that you and your guests are protected from the elements, while the easy setup design allows for quick assembly and disassembly. It’s perfect for both sunny days and rainy weather, keeping your event going smoothly no matter the conditions.', 'Brgy.San Antonio, Sto.Tomas, Batangas', '2025-01-10', '2025-01-23', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `preferences`
--

CREATE TABLE `preferences` (
  `preferenceID` int(4) NOT NULL,
  `userID` int(4) NOT NULL,
  `categoryID` int(4) NOT NULL,
  `isDeleted` varchar(3) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `preferences`
--

INSERT INTO `preferences` (`preferenceID`, `userID`, `categoryID`, `isDeleted`) VALUES
(31, 26, 5, 'No'),
(32, 26, 1, 'No'),
(33, 27, 1, 'No'),
(34, 27, 1, 'No'),
(35, 27, 2, 'No'),
(36, 27, 4, 'No'),
(37, 27, 3, 'No'),
(38, 27, 5, 'No'),
(39, 27, 5, 'No'),
(40, 27, 1, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `rentalID` int(4) NOT NULL,
  `renterID` int(4) NOT NULL,
  `itemID` int(4) NOT NULL,
  `reservationDate` date NOT NULL DEFAULT current_timestamp(),
  `message` varchar(1024) DEFAULT NULL,
  `securityDeposit` int(10) NOT NULL,
  `startRentalDate` date NOT NULL DEFAULT current_timestamp(),
  `endRentalDate` date NOT NULL DEFAULT current_timestamp(),
  `rentalPeriod` int(10) NOT NULL,
  `rateType` varchar(20) NOT NULL,
  `shippingMode` varchar(20) NOT NULL,
  `isDepositPaid` varchar(5) NOT NULL,
  `totalPrice` decimal(10,2) NOT NULL,
  `rentalStatus` varchar(20) NOT NULL,
  `itemQuantity` int(100) DEFAULT NULL,
  `totalCO2Saved` decimal(11,2) NOT NULL,
  `isDeleted` varchar(3) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`rentalID`, `renterID`, `itemID`, `reservationDate`, `message`, `securityDeposit`, `startRentalDate`, `endRentalDate`, `rentalPeriod`, `rateType`, `shippingMode`, `isDepositPaid`, `totalPrice`, `rentalStatus`, `itemQuantity`, `totalCO2Saved`, `isDeleted`) VALUES
(29, 27, 9, '2025-01-26', '', 235, '2025-01-29', '2025-02-09', 11, 'per day', 'pickup', 'false', 5000.00, 'extended', 1, 4.50, 'No'),
(30, 23, 5, '2025-01-26', '', 6721, '2025-01-30', '2025-01-31', 1, 'per day', 'pickup', 'false', 21021.00, 'cancelled', 22, 50.60, 'No'),
(31, 23, 1, '2025-01-27', '', 235, '2025-01-31', '2025-02-01', 1, 'per day', 'pickup', 'false', 735.00, 'cancelled', 1, 2.50, 'No'),
(33, 23, 19, '2025-01-27', 'dsdsds', 165, '2025-01-28', '2025-01-29', 1, 'per day', 'pickup', 'false', 514.50, 'cancelled', 1, 1.80, 'No'),
(35, 26, 7, '2025-01-27', '', 705, '2025-01-29', '2025-01-31', 2, 'per day', 'pickup', 'false', 1500.00, 'extended', 1, 4.20, 'No'),
(36, 26, 25, '2025-01-27', '', 188, '2025-01-28', '2025-01-30', 2, 'per day', 'pickup', 'false', 400.00, 'extended', 1, 0.50, 'No'),
(37, 27, 3, '2025-01-27', '', 118, '2025-01-29', '2025-01-30', 1, 'per day', 'pickup', 'false', 0.00, 'onrent', 1, 1.50, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `saveditems`
--

CREATE TABLE `saveditems` (
  `savedID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `quantity` int(4) NOT NULL,
  `added_date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) NOT NULL DEFAULT 'Active',
  `rentalPeriod` int(11) NOT NULL DEFAULT 0,
  `isDeleted` varchar(3) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saveditems`
--

INSERT INTO `saveditems` (`savedID`, `userID`, `itemID`, `quantity`, `added_date`, `status`, `rentalPeriod`, `isDeleted`) VALUES
(1, 23, 5, 1, '2025-01-27', 'removed', 1, 'No'),
(2, 23, 19, 25, '2025-01-27', 'added', 2, 'No'),
(3, 26, 14, 1, '2025-01-27', 'added', 1, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(4) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(15) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(1024) NOT NULL,
  `status` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `contactNumber` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `accountCreationDate` date NOT NULL DEFAULT current_timestamp(),
  `accountUpdatedDate` date NOT NULL DEFAULT current_timestamp(),
  `profilePicture` varchar(256) DEFAULT 'user-default-profile.png',
  `role` varchar(100) DEFAULT 'user',
  `isDeleted` varchar(3) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `firstName`, `lastName`, `email`, `password`, `status`, `gender`, `contactNumber`, `address`, `accountCreationDate`, `accountUpdatedDate`, `profilePicture`, `role`, `isDeleted`) VALUES
(22, '', '', 'ecorent@gmail.com', 'ecorent123', '', '', '', '', '2025-01-18', '2025-01-18', '', 'admin', 'No'),
(27, 'Jane', 'Smith', 'jane@gmail.com', '$2y$10$WFfRjpq9kmV23UksuJTRhuS6CxjsPamamZNUpzXCjrcU/T4LmFBCC', '', '', '', '', '2025-01-26', '2025-01-26', 'p1.jpg2025Jan26230818000000.jpg', 'user', 'No');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`attachmentID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `conditions`
--
ALTER TABLE `conditions`
  ADD PRIMARY KEY (`conditionID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemID`);

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
-- Indexes for table `saveditems`
--
ALTER TABLE `saveditems`
  ADD PRIMARY KEY (`savedID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `attachmentID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `conditions`
--
ALTER TABLE `conditions`
  MODIFY `conditionID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `itemID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `preferences`
--
ALTER TABLE `preferences`
  MODIFY `preferenceID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `rentalID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `saveditems`
--
ALTER TABLE `saveditems`
  MODIFY `savedID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
