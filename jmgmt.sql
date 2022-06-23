-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 23, 2022 at 01:15 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jmgmt`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `role` int NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `lname`, `username`, `email`, `phone`, `address`, `city`, `state`, `img`, `role`, `password`) VALUES
(24, 'Sumeet', 'Bharali', 's.bharali', 'sumeet@admin.com', '12345685', 'Barua chariali', 'Jorhat', 'Assam', 'admin.png', 0, 'admin123'),
(25, 'Naveen', 'Dutta', 'n.dutta', 'naveen@sales.com', '0865682093', 'Malow ALi2', 'Jorhat', 'India', 'admin.png', 1, 'sales123');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` int NOT NULL,
  `position` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `fname`, `lname`, `phone`, `email`, `address`, `city`, `state`, `zip`, `position`, `img`) VALUES
(18, 'Naveen', 'Dutta', '7852694856', 'navinemp@gmail.com', 'Barua Chariali', 'Jorhat', 'India', 785001, 'manager', 'admin.png');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int NOT NULL AUTO_INCREMENT,
  `invnum` varchar(255) NOT NULL,
  `ordid` int NOT NULL,
  `generatedate` date NOT NULL,
  `ordertotal` float NOT NULL,
  `prodid` int NOT NULL,
  `invordstatus` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `invoice` varchar(255) NOT NULL,
  `cfname` varchar(255) NOT NULL,
  `clname` varchar(255) NOT NULL,
  `cphone` varchar(13) NOT NULL,
  `cemail` varchar(255) NOT NULL,
  `caddress` varchar(255) NOT NULL,
  `caddresssecond` varchar(255) NOT NULL,
  `ccity` varchar(255) NOT NULL,
  `cregion` varchar(255) NOT NULL,
  `czip` int DEFAULT NULL,
  `ccountry` varchar(255) NOT NULL,
  `ord_date` date NOT NULL,
  `ord_time` time NOT NULL,
  `goldpriceatm` int NOT NULL,
  `pid` int NOT NULL,
  `pcost` int NOT NULL,
  `pgst` int NOT NULL,
  `pgstpercent` int NOT NULL,
  `psubtotal` int NOT NULL,
  `ordstatus` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=90 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `qty` int NOT NULL,
  `size` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `description` longtext NOT NULL,
  `weight` int NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `qty`, `size`, `price`, `description`, `weight`, `img`) VALUES
(12, 'platinium breslate', 90, '2cm', 8098.18, 'STYLING :Casual Wear\r\nCrafted in the brilliance of platinum, this bracelet is the perfect companion to all your outfits!', 2, 'download.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
