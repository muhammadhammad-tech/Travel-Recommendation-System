-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2021 at 08:45 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tour&travel`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteAccommodationByID` (IN `accommodationID` INT(25))  MODIFIES SQL DATA
delete FROM accommodation WHERE accommodation.accommodationID = accommodationID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteAgentByID` (IN `agentID` INT(25))  MODIFIES SQL DATA
DELETE from agent WHERE agent.agentID = agentID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteBookingByID` (IN `bookingID` INT(25))  MODIFIES SQL DATA
DELETE from booking WHERE booking.bookingID = bookingID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteCustomerByID` (IN `customerID` INT(25))  MODIFIES SQL DATA
delete FROM customer WHERE customer.customerID = customerID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteDepartureByID` (IN `depatureID` INT(25))  MODIFIES SQL DATA
delete FROM departure WHERE departure.departureID = departureID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteDestinationByID` (IN `destinationID` INT(25))  MODIFIES SQL DATA
delete FROM destination WHERE destination.destinationID = destinationID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteEntertainmentByID` (IN `entertainmentID` INT(25))  MODIFIES SQL DATA
delete FROM entertainment WHERE entertainment.entertainmentID = entertainmentID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteFoodByID` (IN `foodID` INT(25))  MODIFIES SQL DATA
delete FROM food WHERE food.foodID = foodID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deletePackageByID` (IN `packageID` INT(25))  MODIFIES SQL DATA
DELETE from package WHERE package.packageID = packageID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteTransportByID` (IN `transportID` INT(25))  MODIFIES SQL DATA
delete FROM trnasport WHERE transport.transportID = transportID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAccommodationByID` (IN `accommodationID` INT(25))  READS SQL DATA
SELECT * FROM accommodation WHERE accommodation.accommodationID = accommodationID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAgentByID` (IN `agentID` INT(25))  READS SQL DATA
SELECT * from agent WHERE agent.agentID = agentID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getBookingByID` (IN `bookingID` INT(25))  READS SQL DATA
SELECT * from booking WHERE booking.bookingID = bookingID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getCustomerByID` (IN `customerID` INT(25))  READS SQL DATA
SELECT * FROM customer WHERE customer.customerID = customerID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getDepartureByID` (IN `destinationID` INT(25))  READS SQL DATA
SELECT * FROM departure WHERE departure.departureID = departureID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getDestinationByID` (IN `destinationID` INT(25))  READS SQL DATA
SELECT * FROM destination WHERE destination.destinationID = destinationID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getEntertainmentByID` (IN `entertainmentID` INT(25))  READS SQL DATA
SELECT * FROM entertainment WHERE entertainment.entertainmentID=entertainmentID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getFoodByID` (IN `foodID` INT(25))  READS SQL DATA
SELECT * FROM food WHERE food.foodID = foodID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getPackageByID` (IN `packageID` INT(25))  READS SQL DATA
SELECT * from package WHERE package.packageID = packageID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getTransportByID` (IN `transportID` INT(25))  READS SQL DATA
SELECT * FROM transport WHERE transport.transportID = transportID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertAccommodation` (IN `ID` INT(25), IN `Name` VARCHAR(30), IN `FoodID` INT(25))  MODIFIES SQL DATA
INSERT INTO accommodation(accommodationID,accommodationName,foodID) VALUES (ID, Name, FoodID)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertAgent` (IN `ID` INT(25), `Name` VARCHAR(30), `Number` INT(25))  MODIFIES SQL DATA
INSERT INTO agent (agentID,agentName,agentPhoneNumber) VALUES (ID,Name,Number)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertBooking` (IN `ID` INT(25), IN `aID` INT(25), IN `dID` INT(25))  MODIFIES SQL DATA
INSERT INTO booking(bookingID,agentID,departureID) VALUES (ID,aID,dID)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertCustomer` (IN `ID` INT(25), IN `Name` VARCHAR(30), IN `Number` VARCHAR(30))  MODIFIES SQL DATA
INSERT INTO customer(customerID,customerName,customerNumber) VALUES (ID, Name, Number)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertDeparture` (IN `ID` INT(25), IN `Date` DATE, IN `pID` INT(25))  MODIFIES SQL DATA
INSERT INTO departure(departureID,departureDate,packageID) VALUES (ID,Date,pID)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertDestination` (IN `ID` INT(25), IN `Name` VARCHAR(30), IN `aID` INT(25), IN `pID` INT(25), IN `cID` INT(25))  MODIFIES SQL DATA
INSERT INTO destination(destinationID,destinationName,accommodationID,packageID,customerID) VALUES (ID,Name,aID,pID,cID)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertEntertainment` (IN `ID` INT(25), IN `Name` VARCHAR(30), IN `aID` INT(25))  MODIFIES SQL DATA
INSERT INTO entertainment(entertainmentID,entertainmentName,accommodationID) VALUES (ID,Name,aID)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertFood` (IN `foodID` INT(25), IN `foodName` VARCHAR(30), IN `foodPrice` INT(25))  MODIFIES SQL DATA
INSERT INTO food(foodID,foodName,foodPrice) VALUES (foodID,foodName, foodPrice)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertPackage` (IN `ID` INT(25), IN `Price` INT(25), IN `tID` INT(25), IN `Name` VARCHAR(30))  MODIFIES SQL DATA
INSERT INTO package (packageID,packageName,packagePrice,transportID) VALUES (ID,Name,Price,tID)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertTranport` (IN `ID` INT(25), IN `Name` VARCHAR(30))  MODIFIES SQL DATA
INSERT INTO transport(transportID,transportName) VALUES (ID,Name)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `showAllAccommodations` ()  READS SQL DATA
SELECT * FROM accommodation$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `showAllAgent` ()  READS SQL DATA
SELECT * from agent$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `showAllBooking` ()  READS SQL DATA
SELECT * from booking$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `showAllCustomers` ()  READS SQL DATA
SELECT * FROM customer$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `showAllDepatures` ()  READS SQL DATA
SELECT * FROM depature$$

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

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateAccommodation` (IN `ID` INT(25), IN `Name` VARCHAR(30), IN `Food` INT(25))  MODIFIES SQL DATA
UPDATE accommodation SET accommodationName = Name, foodID =FoodID WHERE accommodationID = ID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateAgent` (IN `ID` INT(11), `Name` VARCHAR(30), `Number` INT(30))  MODIFIES SQL DATA
UPDATE agent SET agentName = Name, agentPhoneNumber = Number WHERE agentID = ID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateBooking` (IN `ID` INT(25), IN `aID` INT(25), IN `dID` INT(25))  MODIFIES SQL DATA
UPDATE booking SET agentID = aID,departureID = dID WHERE bookingID = ID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateCustomer` (IN `ID` INT(25), IN `Name` VARCHAR(30), IN `Number` VARCHAR(30))  MODIFIES SQL DATA
UPDATE customer SET customerName = Name, customerNumber =Number WHERE customerID = ID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateDeparture` (IN `ID` INT(25), IN `Date` DATE, IN `pID` INT(25))  MODIFIES SQL DATA
UPDATE departure SET departureDate= Date,packageID=pID WHERE departureID = ID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateDestination` (IN `ID` INT(25), `Name` VARCHAR(30), `aID` INT(25), `pID` INT(25), `cID` INT(25))  MODIFIES SQL DATA
UPDATE destination SET destinationName= Name,accommodationID=aID,packageID=pID,customerID=cID WHERE destinationID = ID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateEntertainment` (IN `ID` INT(25), IN `Name` VARCHAR(30), IN `aID` INT(25))  UPDATE entertainment SET entertainmentName = Name,accommodationID = aID WHERE entertainmentID = ID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateFood` (IN `ID` INT(25), IN `Name` VARCHAR(30), IN `Price` INT(25))  MODIFIES SQL DATA
UPDATE food SET foodName = Name, foodPrice=Price WHERE foodID = ID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updatePackage` (IN `ID` INT(25), IN `Price` INT(25), IN `tID` INT(25), IN `Name` VARCHAR(30))  MODIFIES SQL DATA
UPDATE package SET packagePrice = Price, transportID = tID,packageName=name WHERE packageID = ID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateTransport` (IN `ID` INT(25), IN `Name` VARCHAR(30))  MODIFIES SQL DATA
UPDATE transport SET transportName = Name WHERE transportID = ID$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `accommodation`
--

CREATE TABLE `accommodation` (
  `accommodationID` int(25) NOT NULL,
  `accommodationName` varchar(30) NOT NULL,
  `foodID` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accommodation`
--

INSERT INTO `accommodation` (`accommodationID`, `accommodationName`, `foodID`) VALUES
(1, 'Haveli', 5),
(3, 'PC', 1),
(9, 'Serena', 5);

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `agentID` int(25) NOT NULL,
  `agentName` varchar(30) NOT NULL,
  `agentPhoneNumber` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`agentID`, `agentName`, `agentPhoneNumber`) VALUES
(202, 'Nabeel Sabir', 652554052);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingID` int(25) NOT NULL,
  `agentID` int(25) NOT NULL,
  `departureID` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(25) NOT NULL,
  `customerName` varchar(30) NOT NULL,
  `customerNumber` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `customerName`, `customerNumber`) VALUES
(3, 'Hammad Rashid', '03216340182'),
(4, 'Shoaib', '03457376346'),
(5, 'Walid', '03216340182'),
(6, 'Sarwar', '03027823915'),
(10, 'muhmmad Rasheed', '03216340182'),
(11, 'Hamza', '03216340182'),
(12, 'zeeshan', '111111111');

-- --------------------------------------------------------

--
-- Table structure for table `departure`
--

CREATE TABLE `departure` (
  `departureID` int(25) NOT NULL,
  `departureDate` date NOT NULL,
  `packageID` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departure`
--

INSERT INTO `departure` (`departureID`, `departureDate`, `packageID`) VALUES
(401, '2021-05-26', 2);

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

CREATE TABLE `destination` (
  `destinationID` int(25) NOT NULL,
  `destinationName` varchar(30) NOT NULL,
  `accommodationID` int(25) NOT NULL,
  `packageID` int(25) NOT NULL,
  `customerID` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `destination`
--

INSERT INTO `destination` (`destinationID`, `destinationName`, `accommodationID`, `packageID`, `customerID`) VALUES
(1, 'Lahore', 1, 2, 5),
(2, 'Murree', 9, 1, 10),
(3, 'Karachi', 9, 1, 10),
(4, 'Dubai', 9, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `entertainment`
--

CREATE TABLE `entertainment` (
  `entertainmentID` int(25) NOT NULL,
  `entertainmentName` varchar(30) NOT NULL,
  `accommodationID` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entertainment`
--

INSERT INTO `entertainment` (`entertainmentID`, `entertainmentName`, `accommodationID`) VALUES
(102, 'GYM77', 9),
(310, 'Suicide8', 9),
(311, 'Bunjee Jumping', 9),
(314, 'Bunjee Jumping', 1),
(316, 'Bunjee Jumping', 9);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `foodID` int(25) NOT NULL,
  `foodName` varchar(30) NOT NULL,
  `foodPrice` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`foodID`, `foodName`, `foodPrice`) VALUES
(1, 'Lava Cake', 660),
(4, 'Burger', 300),
(5, 'Alfredo Pasta', 690),
(8, 'Tower Burger', 300);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `packageID` int(25) NOT NULL,
  `packageName` varchar(30) NOT NULL,
  `packagePrice` int(25) NOT NULL,
  `transportID` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`packageID`, `packageName`, `packagePrice`, `transportID`) VALUES
(1, 'Standard Package', 10000, 101),
(2, 'VIP Package', 20000, 103);

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

CREATE TABLE `transport` (
  `transportID` int(25) NOT NULL,
  `transportName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transport`
--

INSERT INTO `transport` (`transportID`, `transportName`) VALUES
(101, 'DAEWOO Standard'),
(102, 'DAEWOO Luxury'),
(103, 'DAEWOO Super Luxury');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accommodation`
--
ALTER TABLE `accommodation`
  ADD PRIMARY KEY (`accommodationID`),
  ADD KEY `foodID` (`foodID`);

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
  ADD KEY `booking_ibfk_2` (`departureID`);

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
  ADD KEY `customerID` (`customerID`),
  ADD KEY `packageID` (`packageID`),
  ADD KEY `accommodationID` (`accommodationID`);

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
  ADD PRIMARY KEY (`foodID`);

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
  MODIFY `accommodationID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `agentID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `departure`
--
ALTER TABLE `departure`
  MODIFY `departureID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=403;

--
-- AUTO_INCREMENT for table `destination`
--
ALTER TABLE `destination`
  MODIFY `destinationID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `entertainment`
--
ALTER TABLE `entertainment`
  MODIFY `entertainmentID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=317;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `foodID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=741225;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `packageID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transport`
--
ALTER TABLE `transport`
  MODIFY `transportID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accommodation`
--
ALTER TABLE `accommodation`
  ADD CONSTRAINT `accommodation_ibfk_1` FOREIGN KEY (`foodID`) REFERENCES `food` (`foodID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `destination_ibfk_2` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `destination_ibfk_3` FOREIGN KEY (`packageID`) REFERENCES `package` (`packageID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `destination_ibfk_4` FOREIGN KEY (`accommodationID`) REFERENCES `accommodation` (`accommodationID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `entertainment`
--
ALTER TABLE `entertainment`
  ADD CONSTRAINT `entertainment_ibfk_1` FOREIGN KEY (`accommodationID`) REFERENCES `accommodation` (`accommodationID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `entertainment_ibfk_2` FOREIGN KEY (`accommodationID`) REFERENCES `accommodation` (`accommodationID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `package`
--
ALTER TABLE `package`
  ADD CONSTRAINT `package_ibfk_1` FOREIGN KEY (`transportID`) REFERENCES `transport` (`transportID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
