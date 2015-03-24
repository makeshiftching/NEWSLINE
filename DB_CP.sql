-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 04, 2014 at 02:02 PM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `DB_CP`
--

-- --------------------------------------------------------

--
-- Table structure for table `Clients`
--

CREATE TABLE `Clients` (
  `user_id` int(11) NOT NULL COMMENT 'Primary Key of Clients',
  `send_addr` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Client''s Address',
  `credit_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Client''s Credit Card Number',
  `ccv` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Card Code Verification',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Clients`
--

INSERT INTO `Clients` (`user_id`, `send_addr`, `credit_id`, `ccv`) VALUES
(1, '48/55 Laddarom Village Sukhapiban5 Rd.,Tharaeng,Bangkhen 10220', '12345678', '1234'),
(4, 'Room 712 ,24 Karat Building, Ngamvongvan 64, Chatuchak, Bangkhen,BKK ,10220', '987654321', '1234'),
(5, 'Room 123, Grandnewdee Building, Ngamvongvan 60, Chatuchak, BKK,10340', '345678910', '1234'),
(6, '500 West 11th Street, Lawrence Kansas 66045', '35678436', '6789');

-- --------------------------------------------------------

--
-- Table structure for table `Items`
--

CREATE TABLE `Items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key of Items',
  `user_id` int(11) NOT NULL COMMENT 'The seller who owned this item',
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Item''s Name',
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Item''s Description',
  `amount` int(11) NOT NULL COMMENT 'Number of Amount Available',
  `price_per_unit` int(11) NOT NULL COMMENT 'Price/Unit',
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Item''s Category',
  `img_src` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Name of this item''s image',
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `Items`
--

INSERT INTO `Items` (`item_id`, `user_id`, `item_name`, `description`, `amount`, `price_per_unit`, `category`, `img_src`) VALUES
(1, 3, 'Algorithm Book', 'about Algorithm', 7, 300, '1', '1_1.jpeg'),
(2, 3, 'Machine Learning Book', 'about ML', 11, 150, '1', '1_2.jpeg'),
(3, 3, 'Cocktail party dress-Black', 'Black Satin, 50s Retro Style', 19, 1500, '2', '2_3.jpg'),
(4, 7, 'Black Prom Evening Dress', 'Black Retro Vintage 50s', 22, 1000, '2', '2_4.jpg'),
(10, 7, 'Blue Prom Dress', 'Blue satin london-style satin dress with hearts', 30, 399, '2', '2_5.jpg'),
(11, 8, 'Television Repair Canterbury Kent', 'LCD Plasma, by Sharp', 49, 23999, '3', '3_6.jpg'),
(12, 7, 'Ipod nano 8GB', 'Pinkish cover with earpods and leather case', 2, 5399, '3', '3_7.jpg'),
(13, 8, 'Digital camera-CASIO', 'EXILIM 8.1 Megapixels Digital Camera', 6, 12000, '3', '3_8.jpg'),
(14, 8, 'Mahoggany Shelf', 'Sphere mahoggany shelf, XO style', 1, 4700, '4', '4_9.jpg'),
(15, 3, 'Polkadot Vase', 'Red Polkadot Vase (white-dotted)', 2, 699, '4', '4_10.jpg'),
(16, 3, 'White Dress', 'White Short Dress with Flowers', 5, 1300, '2', '3_11.jpg'),
(17, 3, 'Database Book', 'Database by Thomas Connolly, 3rd Edition', 7, 890, '1', '1_12.jpg'),
(18, 3, 'White Lamp', 'White Lamp Vintage Style, Made In UK', 3, 890, '4', '4_13.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key of Orders',
  `user_id` int(11) NOT NULL COMMENT 'User id which this order belongs to',
  `item_id` int(11) NOT NULL COMMENT 'This item is included in this order',
  `amount` int(11) NOT NULL COMMENT 'Amount of this item',
  `timestamp` date NOT NULL COMMENT 'The time when this order was created',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `Orders`
--

INSERT INTO `Orders` (`order_id`, `user_id`, `item_id`, `amount`, `timestamp`) VALUES
(17, 1, 1, 1, '2014-03-03'),
(18, 1, 3, 1, '2014-03-03'),
(19, 1, 1, 1, '2014-03-04'),
(20, 5, 12, 1, '2014-03-04'),
(21, 5, 15, 1, '2014-03-04'),
(22, 6, 17, 1, '2014-03-04'),
(23, 6, 13, 1, '2014-03-04'),
(24, 1, 1, 1, '2014-03-04');

-- --------------------------------------------------------

--
-- Table structure for table `Sellers`
--

CREATE TABLE `Sellers` (
  `user_id` int(11) NOT NULL COMMENT 'Primary Key of Sellers',
  `contact_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Seller''s Contact Number',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Sellers`
--

INSERT INTO `Sellers` (`user_id`, `contact_no`) VALUES
(3, '0897090050'),
(7, '0898157519'),
(8, '0871235789');

-- --------------------------------------------------------

--
-- Table structure for table `Sending`
--

CREATE TABLE `Sending` (
  `send_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key of Sending',
  `send_status` int(11) NOT NULL DEFAULT '1' COMMENT '1:Packaging,2:Shipping,3:@PostOffice,4:Arrived',
  `date` datetime NOT NULL COMMENT 'Date of Last Modified',
  PRIMARY KEY (`send_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `Sending`
--

INSERT INTO `Sending` (`send_id`, `send_status`, `date`) VALUES
(17, 4, '2014-03-04 08:20:26'),
(18, 2, '2014-03-04 08:31:04'),
(19, 1, '2014-03-04 17:47:50'),
(20, 1, '2014-03-04 18:45:56'),
(21, 1, '2014-03-04 18:46:08'),
(22, 1, '2014-03-04 18:46:27'),
(23, 1, '2014-03-04 18:46:41'),
(24, 1, '2014-03-04 19:13:45');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key of User',
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'User''s Username',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Username''s Password',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'User''s Email',
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'User''s Full Name',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`user_id`, `username`, `password`, `email`, `full_name`) VALUES
(1, 'ching', '4ca260e5e232a2fe84f5b41b6c3d83d208704cf8', 'global.wipada@gmail.com', 'Wipada Wannasiwaporn'),
(3, 'makeshift', '4ca260e5e232a2fe84f5b41b6c3d83d208704cf8', 'makeshift_ching@hotmail.com', 'Wipada Wannasiwaporn'),
(4, 'haxxpop', 'b384746ba730b0aeb184e98f8ccc32700712212c', 'haxx.pop@gmail.com', 'Suphanat Chunhapanya'),
(5, 'Nutchu', '04da6a39946ab6a2f59e4eb2bce982950384aaf2', 'nutsumiya@gmail.com', 'Nut Ruanpech'),
(6, 'Jbravo', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'johnnyb123@gmail.com', 'Johnny Bravo'),
(7, 'pop', 'b384746ba730b0aeb184e98f8ccc32700712212c', 'haxx.pop2@gmail.com', 'Suphanat Chunhapanya'),
(8, 'Jeab', '42ca0cc193078133503814e93081c0dd15174570', 'jeab@gmail.com', 'Thunyamon Chidkreur');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Clients`
--
ALTER TABLE `Clients`
  ADD CONSTRAINT `Clients_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`);

--
-- Constraints for table `Sellers`
--
ALTER TABLE `Sellers`
  ADD CONSTRAINT `Sellers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`);

--
-- Constraints for table `Sending`
--
ALTER TABLE `Sending`
  ADD CONSTRAINT `Sending_ibfk_2` FOREIGN KEY (`send_id`) REFERENCES `Orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
