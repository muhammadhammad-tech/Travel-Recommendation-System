-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2021 at 08:43 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trip`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteAccommodationById` (IN `accommodationID` INT(11))  MODIFIES SQL DATA
delete FROM accommodation WHERE accommodation.accommodationID = accommodationID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteAgentByID` (IN `agentID` INT(11))  MODIFIES SQL DATA
DELETE from agent WHERE agent.agentID = agentID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteBookingByID` (IN `bookingID` INT(11))  MODIFIES SQL DATA
DELETE from booking WHERE booking.bookingID = bookingID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteCustomerByID` (IN `customerID` INT(11))  MODIFIES SQL DATA
DELETE FROM customer WHERE customer.customerID = customerID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteDepartureByID` (IN `dID` INT(11))  MODIFIES SQL DATA
delete FROM departure WHERE departure.departureID = dID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteDestinationByID` (IN `destinationID` INT(11))  MODIFIES SQL DATA
delete FROM destination WHERE destination.destinationID = destinationID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteEntertainmentByID` (IN `entertainmentID` INT(11))  MODIFIES SQL DATA
delete FROM entertainment WHERE entertainment.entertainmentID = entertainmentID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteFoodByName` (IN `foodName` VARCHAR(30))  MODIFIES SQL DATA
delete FROM food WHERE food.foodName = foodName$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deletePackageByID` (IN `packageID` INT(11))  MODIFIES SQL DATA
DELETE from package WHERE package.packageID = packageID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteTransportByID` (IN `transportID` INT(11))  MODIFIES SQL DATA
delete FROM transport WHERE transport.transportID = transportID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAccommodationById` (IN `accommodationID` INT(11))  READS SQL DATA
SELECT * FROM accommodation WHERE accommodation.accommodationID = accommodationID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAgentByID` (IN `agentID` INT(11))  READS SQL DATA
SELECT * from  agent WHERE agent.agentID = agentID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getBookingByID` (IN `bookingID` INT(11))  READS SQL DATA
SELECT * from booking WHERE booking.bookingID = bookingID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getCustomerByID` (IN `customerID` INT(11))  READS SQL DATA
SELECT * FROM customer WHERE customer.customerID = customerID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getDepartureByID` (IN `dID` INT(11))  READS SQL DATA
SELECT * FROM departure WHERE departure.departureID = dID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getDestinationByID` (IN `destinationID` INT(11))  READS SQL DATA
SELECT * FROM destination WHERE destination.destinationID = destinationID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getEntertainmentByID` (IN `entertainmentID` INT(11))  READS SQL DATA
SELECT * FROM entertainment WHERE entertainment.entertainmentID = entertainmentID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getFoodByName` (IN `foodName` VARCHAR(30))  READS SQL DATA
SELECT * FROM food WHERE food.foodName = foodName$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getPackageByID` (IN `packageID` INT(11))  READS SQL DATA
SELECT * from package WHERE package.packageID = packageID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getTransportByID` (IN `transportID` INT(11))  READS SQL DATA
SELECT * FROM transport WHERE transport.transportID = transportID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertAccommodation` (IN `ID` INT(11), `Name` VARCHAR(30), `Food` VARCHAR(30))  MODIFIES SQL DATA
INSERT INTO accommodation(accommodationID,accommodationName,foodName) VALUES (ID, Name, Food)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertAgent` (IN `ID` INT(11), IN `name` VARCHAR(30), IN `number` VARCHAR(30))  MODIFIES SQL DATA
INSERT INTO agent (agentID,agentName,phoneNo) VALUES (ID,Name,Number)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertBooking` (IN `ID` INT(11), IN `aID` INT(11), IN `aName` VARCHAR(30), IN `dID` INT(11))  MODIFIES SQL DATA
INSERT INTO booking(bookingID,agentID,agentName,departureID) VALUES (ID,aID,aName,dID)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertCustomer` (IN `ID` INT(11), `Name` VARCHAR(30), `Number` INT(30))  MODIFIES SQL DATA
INSERT INTO customer(customerID,customerName,customerNo) VALUES (ID,Name,Number)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertDeparture` (IN `dID` INT(11), IN `pID` INT(11))  MODIFIES SQL DATA
INSERT INTO departure(departureID,packageID) VALUES (dID,pID)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertDestination` (IN `ID` INT(11), `Name` VARCHAR(30), `aID` INT(11), `pID` INT(11), `cID` INT(11))  MODIFIES SQL DATA
INSERT INTO destination(destinationID,destinationName,accommodationID,packageID,customerID) VALUES (ID,Name,aID,pID,cID)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertEntertainment` (IN `ID` INT(11), `Name` VARCHAR(30), `aID` INT(11))  MODIFIES SQL DATA
INSERT INTO entertainment(entertainmentID,entertainmentName,accommodationID) VALUES (ID,Name,aID)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertFood` (IN `Name` VARCHAR(30), `Price` INT(11))  MODIFIES SQL DATA
INSERT INTO food(foodName,foodPrice) VALUES (Name, Price)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertPackage` (IN `ID` INT(11), IN `Price` INT(11), IN `Name` VARCHAR(30), IN `tID` INT(11))  MODIFIES SQL DATA
INSERT INTO package (packageID,packagePrice,packageName,transportID) VALUES (ID,Price,Name,tID)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertTransport` (IN `ID` INT(11), IN `Name` VARCHAR(30))  MODIFIES SQL DATA
INSERT INTO transport(transportID,transportName) VALUES (ID,Name)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `showAllAccommodations` ()  READS SQL DATA
SELECT * FROM accommodation$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `showAllAgent` ()  READS SQL DATA
SELECT * from agent$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `showAllBooking` ()  READS SQL DATA
SELECT * from booking$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `showAllCustomers` ()  READS SQL DATA
SELECT * from customer$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `showAllDepartures` ()  READS SQL DATA
SELECT * FROM departure$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `showAllDestinations` ()  READS SQL DATA
SELECT * FROM destination$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `showAllEntertainments` ()  READS SQL DATA
SELECT * FROM entertainment$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `showAllFoods` ()  READS SQL DATA
SELECT * FROM food$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `showAllPackage` ()  READS SQL DATA
SELECT * from package$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `showAllTransports` ()  READS SQL DATA
SELECT * FROM transport$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateAccommodation` (IN `ID` INT(11), IN `Name` VARCHAR(30), IN `Food` VARCHAR(30))  MODIFIES SQL DATA
UPDATE accommodation SET accommodationName = Name, foodName =Food WHERE accommodationID = ID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateAgent` (IN `ID` INT(11), IN `Name` VARCHAR(30), IN `Number` VARCHAR(30))  MODIFIES SQL DATA
UPDATE agent SET agentName  = Name, phoneNo = Number WHERE agentID = ID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateBooking` (IN `ID` INT(11), IN `aID` INT(11), IN `aN` VARCHAR(30), IN `dID` INT(11))  MODIFIES SQL DATA
UPDATE booking SET agentID = aID,agentName=aN, departureID = dID WHERE bookingID = ID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateCustomer` (IN `ID` INT(11), `Name` VARCHAR(30), `Number` INT(30))  MODIFIES SQL DATA
UPDATE customer SET customerName = Name, customerNo = Number  WHERE customerID = ID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateDeparture` (IN `ID` INT(11), IN `pID` INT(11))  MODIFIES SQL DATA
UPDATE departure SET packageID=pID WHERE departureID = ID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateDestination` (IN `ID` INT(11), `Name` VARCHAR(30), `aID` INT(11), `pID` INT(11), `cID` INT(11))  MODIFIES SQL DATA
UPDATE destination SET destinationName= Name,accommodationID=aID,packageID=pID,customerID=cID WHERE destinationID = ID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateEntertainment` (IN `ID` INT(11), `Name` VARCHAR(30), `aID` INT(11))  MODIFIES SQL DATA
UPDATE entertainment SET entertainmentName = Name,accommodationID=aID WHERE entertainmentID = ID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateFood` (IN `Name` VARCHAR(30), `Price` INT(11))  MODIFIES SQL DATA
UPDATE food SET foodPrice = Price WHERE foodName = Name$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updatePackage` (IN `ID` INT(11), IN `Price` INT(11), IN `Name` VARCHAR(30), IN `tID` INT(11))  MODIFIES SQL DATA
UPDATE package SET packagePrice = Price,packageName = Name ,transportID = tID WHERE packageID = ID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateTransport` (IN `ID` INT(11), `Name` VARCHAR(30))  MODIFIES SQL DATA
UPDATE transport SET transportName = Name WHERE transportID = ID$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `accommodation`
--

CREATE TABLE `accommodation` (
  `accommodationID` int(11) NOT NULL,
  `accommodationName` varchar(30) NOT NULL,
  `foodName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accommodation`
--

INSERT INTO `accommodation` (`accommodationID`, `accommodationName`, `foodName`) VALUES
(1, 'Lahore', 'Biryani'),
(2, 'Munal', 'pasta'),
(3, 'PC', 'Pasta');

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `agentID` int(11) NOT NULL,
  `agentName` varchar(30) NOT NULL,
  `phoneNo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`agentID`, `agentName`, `phoneNo`) VALUES
(1, 'Ahmed Saeed', '03055079428'),
(2, 'Muhammad Hammad', '03211406491'),
(3, 'Taha Fasial', '03055079421'),
(4, 'Ahmed Saeed', '03055079428'),
(5, 'Kinza Rashid', '03211406492'),
(6, 'Rashid Aleem Usmani', '03216340182'),
(7, 'Junaid', '03055079433'),
(8, 'Irsam', '03211406492');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingID` int(11) NOT NULL,
  `agentID` int(11) NOT NULL,
  `agentName` varchar(30) NOT NULL,
  `departureID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingID`, `agentID`, `agentName`, `departureID`) VALUES
(2, 2, 'Muhammad Hammad', 2),
(3, 8, 'Irsam', 3);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL,
  `customerName` varchar(30) NOT NULL,
  `customerNo` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `customerName`, `customerNo`) VALUES
(2, 'ahmed', 321634019),
(4, 'Irsam', 321634018),
(5, 'Absar', 321535968),
(6, 'Ayesha', 234567890),
(8, 'Hammad', 34539689);

-- --------------------------------------------------------

--
-- Table structure for table `departure`
--

CREATE TABLE `departure` (
  `departureID` int(11) NOT NULL,
  `packageID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departure`
--

INSERT INTO `departure` (`departureID`, `packageID`) VALUES
(2, 2),
(3, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

CREATE TABLE `destination` (
  `destinationID` int(11) NOT NULL,
  `destinationName` varchar(30) NOT NULL,
  `accommodationID` int(11) NOT NULL,
  `packageID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `entertainment`
--

CREATE TABLE `entertainment` (
  `entertainmentID` int(11) NOT NULL,
  `entertainmentName` varchar(30) NOT NULL,
  `accommodationID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entertainment`
--

INSERT INTO `entertainment` (`entertainmentID`, `entertainmentName`, `accommodationID`) VALUES
(302, 'Gaming Arena ', 2);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `foodPrice` int(11) NOT NULL,
  `foodName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`foodPrice`, `foodName`) VALUES
(250, 'biryani'),
(660, 'pasta');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `packageID` int(11) NOT NULL,
  `packagePrice` int(11) NOT NULL,
  `packageName` varchar(30) NOT NULL,
  `transportID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`packageID`, `packagePrice`, `packageName`, `transportID`) VALUES
(2, 10000000, 'VIP', 2),
(3, 7000000, 'Ultra Vip', 5),
(4, 100002, 'Twitter Town', 4);

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

CREATE TABLE `transport` (
  `transportID` int(11) NOT NULL,
  `transportName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transport`
--

INSERT INTO `transport` (`transportID`, `transportName`) VALUES
(1, 'Daewoo Gold'),
(2, 'PIA'),
(3, 'Bilal Travels'),
(4, 'Fasial Movers GOLD'),
(5, 'Daewoo silver+');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accommodation`
--
ALTER TABLE `accommodation`
  ADD PRIMARY KEY (`accommodationID`),
  ADD KEY `foodName` (`foodName`);

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`agentID`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingID`),
  ADD KEY `agentID` (`agentID`),
  ADD KEY `departureID` (`departureID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `departure`
--
ALTER TABLE `departure`
  ADD PRIMARY KEY (`departureID`),
  ADD KEY `packageID` (`packageID`);

--
-- Indexes for table `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`destinationID`),
  ADD KEY `accommodationID` (`accommodationID`),
  ADD KEY `packageID` (`packageID`),
  ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `entertainment`
--
ALTER TABLE `entertainment`
  ADD PRIMARY KEY (`entertainmentID`),
  ADD KEY `accommodationID` (`accommodationID`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`foodName`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`packageID`),
  ADD KEY `transportID` (`transportID`);

--
-- Indexes for table `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`transportID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accommodation`
--
ALTER TABLE `accommodation`
  MODIFY `accommodationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `destination`
--
ALTER TABLE `destination`
  MODIFY `destinationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `entertainment`
--
ALTER TABLE `entertainment`
  MODIFY `entertainmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accommodation`
--
ALTER TABLE `accommodation`
  ADD CONSTRAINT `accommodation_ibfk_1` FOREIGN KEY (`foodName`) REFERENCES `food` (`foodName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`agentID`) REFERENCES `agent` (`agentID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`departureID`) REFERENCES `departure` (`departureID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `departure`
--
ALTER TABLE `departure`
  ADD CONSTRAINT `departure_ibfk_1` FOREIGN KEY (`packageID`) REFERENCES `package` (`packageID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `destination`
--
ALTER TABLE `destination`
  ADD CONSTRAINT `destination_ibfk_1` FOREIGN KEY (`accommodationID`) REFERENCES `accommodation` (`accommodationID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `destination_ibfk_2` FOREIGN KEY (`packageID`) REFERENCES `package` (`packageID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `destination_ibfk_3` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `entertainment`
--
ALTER TABLE `entertainment`
  ADD CONSTRAINT `entertainment_ibfk_1` FOREIGN KEY (`accommodationID`) REFERENCES `accommodation` (`accommodationID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `package`
--
ALTER TABLE `package`
  ADD CONSTRAINT `package_ibfk_1` FOREIGN KEY (`transportID`) REFERENCES `transport` (`transportID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
