-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 23, 2022 at 07:26 AM
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
(25, 'Naveen', 'Dutta', 'n.dutta', 'naveen@sales.com', '08656820939', 'Malow ALi', 'Jorhat', 'India', 'admin.png', 1, 'sales123');

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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `invnum`, `ordid`, `generatedate`, `ordertotal`, `prodid`, `invordstatus`) VALUES
(7, 'INVOICE-1655958166439', 82, '2022-06-23', 11946, 12, 0),
(6, 'INVOICE-1655956787813', 81, '2022-06-23', 11941, 12, 0),
(8, 'INVOICE-1655959338499', 83, '2022-06-23', 11944, 12, 0),
(9, 'INVOICE-1655968516624', 85, '2022-06-23', 10945, 12, 0),
(10, 'INVOICE-1655968705593', 84, '2022-06-23', 10134, 12, 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `invoice`, `cfname`, `clname`, `cphone`, `cemail`, `caddress`, `caddresssecond`, `ccity`, `cregion`, `czip`, `ccountry`, `ord_date`, `ord_time`, `goldpriceatm`, `pid`, `pcost`, `pgst`, `pgstpercent`, `psubtotal`, `ordstatus`) VALUES
(85, 'INVOICE-1655968516624', 'pranay', 'kalita', '08638820939', 'pranaykalita2@gmail.com', 'Tarajan Puj mandir', 'oppositre pukhuri', 'Jorhat', 'India', 785001, 'India', '2022-06-23', '12:51:00', 5067, 12, 10134, 811, 8, 10945, 0),
(84, 'INVOICE-1655968705593', 'pranay', 'kalita', '08638820939', 'pranaykalita2@gmail.com', 'Tarajan Puj mandir', 'oppositre pukhuri', 'Jorhat', 'India', 785001, 'India', '2022-06-23', '12:50:00', 5067, 12, 10134, 0, 0, 10134, 0),
(83, 'INVOICE-1655959338499', 'pranay', 'kalita', '08638820939', 'pranaykalita2@gmail.com', 'Tarajan Puj mandir', 'oppositre pukhuri', 'Jorhat', 'India', 785001, 'India', '2022-06-23', '10:16:00', 5061, 12, 10122, 1822, 18, 11944, 0),
(82, 'INVOICE-1655958166439', 'pranay', 'kalita', '08638820939', 'pranaykalita2@gmail.com', 'Tarajan Puj mandir', 'oppositre pukhuri', 'Jorhat', 'India', 785001, 'India', '2022-06-23', '09:54:00', 5062, 12, 10123, 1822, 18, 11946, 0),
(81, 'INVOICE-1655956787813', 'pranay', 'kalita', '08638820939', 'pranaykalita2@gmail.com', 'Tarajan Puj mandir', 'oppositre pukhuri', 'Jorhat', 'India', 785001, 'India', '2022-06-23', '09:30:00', 5060, 12, 10119, 1822, 18, 11941, 1);

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
(12, 'platinium breslate', 94, '2cm', 8098.18, 'STYLING :Casual Wear\r\nCrafted in the brilliance of platinum, this bracelet is the perfect companion to all your outfits!', 2, 'download.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
