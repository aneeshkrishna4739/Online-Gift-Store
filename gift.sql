-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 17, 2019 at 07:02 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gift`
--

-- --------------------------------------------------------

--
-- Table structure for table `anni`
--

DROP TABLE IF EXISTS `anni`;
CREATE TABLE IF NOT EXISTS `anni` (
  `giftid` int(11) NOT NULL AUTO_INCREMENT,
  `giftname` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `img` varchar(1000) NOT NULL,
  PRIMARY KEY (`giftid`)
) ENGINE=MyISAM AUTO_INCREMENT=10015 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anni`
--

INSERT INTO `anni` (`giftid`, `giftname`, `description`, `price`, `discount`, `img`) VALUES
(10001, 'Happy Anniversary', 'A Lovely Gift Card for Couples', 150, 0, 'images/10001.jpg'),
(10002, 'Beautiful Wife', 'A Card for Your Wife', 125, 0, 'images/10002.jpg'),
(10003, 'rose', 'for all the rose lovers', 100, 0, 'images/10003.jpg'),
(10004, 'mom and dad', 'gift to your lovely parents', 200, 0, 'images/10004.jpg'),
(10005, 'my love', 'a romantic letter to your love', 100, 0, 'images/10006.jpg'),
(10006, 'happy anniversary', 'wish your partner with this lovely gift', 100, 0, 'images/10007.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bday`
--

DROP TABLE IF EXISTS `bday`;
CREATE TABLE IF NOT EXISTS `bday` (
  `giftid` int(11) NOT NULL AUTO_INCREMENT,
  `giftname` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `img` varchar(1000) NOT NULL,
  PRIMARY KEY (`giftid`)
) ENGINE=MyISAM AUTO_INCREMENT=20015 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bday`
--

INSERT INTO `bday` (`giftid`, `giftname`, `description`, `price`, `discount`, `img`) VALUES
(20001, 'joy', 'enjoy this joyous occasion', 100, 0, 'images/20001.jpg'),
(20002, 'coolest gift', '', 125, 0, 'images/20002.jpg'),
(20003, 'envelope', '', 200, 0, 'images/20003.jpg'),
(20004, 'mother love', '', 175, 0, 'images/20004.jpg'),
(20005, 'bloomy birthday', '', 200, 0, 'images/20005.jpg'),
(20006, 'friendship', 'gift this to your best friend on his/her birthday', 225, 0, 'images/20006.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bouquets`
--

DROP TABLE IF EXISTS `bouquets`;
CREATE TABLE IF NOT EXISTS `bouquets` (
  `giftid` int(11) NOT NULL AUTO_INCREMENT,
  `giftname` varchar(50) NOT NULL,
  `desciption` varchar(1000) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `img` varchar(1000) NOT NULL,
  PRIMARY KEY (`giftid`)
) ENGINE=MyISAM AUTO_INCREMENT=40007 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bouquets`
--

INSERT INTO `bouquets` (`giftid`, `giftname`, `desciption`, `price`, `discount`, `img`) VALUES
(40001, 'colorful roses', '', 400, 0, 'images/40001.jpg'),
(40002, 'pink rose', '', 410, 0, 'images/40002.jpg'),
(40003, 'red velvet', '', 450, 0, 'images/40003.jpg'),
(40004, 'rosy love', '', 500, 0, 'images/40004.jpg'),
(40005, 'lovely vase', '', 600, 0, 'images/40005.jpg'),
(40006, 'special bouquet', '', 650, 0, 'images/40006.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `giftid` int(11) DEFAULT NULL,
  `giftname` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `category` varchar(20) DEFAULT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ord`
--

DROP TABLE IF EXISTS `ord`;
CREATE TABLE IF NOT EXISTS `ord` (
  `ord_id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `giftid` int(11) NOT NULL,
  `giftname` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `mode` varchar(50) NOT NULL,
  PRIMARY KEY (`ord_id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rakhi`
--

DROP TABLE IF EXISTS `rakhi`;
CREATE TABLE IF NOT EXISTS `rakhi` (
  `giftid` int(11) NOT NULL AUTO_INCREMENT,
  `giftname` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `img` varchar(1000) NOT NULL,
  PRIMARY KEY (`giftid`)
) ENGINE=MyISAM AUTO_INCREMENT=30009 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rakhi`
--

INSERT INTO `rakhi` (`giftid`, `giftname`, `description`, `price`, `discount`, `img`) VALUES
(30001, 'traditional style', '', 50, 0, 'images/30001.jpg'),
(30002, 'casual', '', 50, 0, 'images/30002.jpg'),
(30003, 'golden droplet', '', 100, 0, 'images/30003.jpg'),
(30004, 'indian', '', 100, 0, 'images/30004.jpg'),
(30005, 'sibling love', '', 300, 0, 'images/30005.jpg'),
(30006, 'diamond', '', 365, 0, 'images/30006.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
CREATE TABLE IF NOT EXISTS `register` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(1000) NOT NULL,
  PRIMARY KEY (`userid`,`email`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`userid`, `username`, `phone`, `email`, `password`) VALUES
(4, 'gayatri', '23874287', 'g@gmail.com', '47bce5c74f589f4867dbd57e9ca9f808'),
(2, 'Aneeshkrishna', '07026856059', 'aneeshkrishna39@gmail.com', '202cb962ac59075b964b07152d234b70'),
(3, 'Aneeshkrishna', '07026856059', 'aneeshkrishna9@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(5, 'diana', '1234', 'd@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(8, 'aksh', '87646346', 'aksh@gmail.com', 'f685454f94f2c480df9512a3ae907596'),
(9, 'Aneesh Krishna', '07026856059', 'aneeshkrishna473@gmail.com', 'df5c41a61d88c6296b7b4004b5a8915e'),
(11, 'yogesh', '3456789', 'y@gmail.com', '34fb382763a18c3674530a8b110abde3'),
(12, 'vijay', '12345678', 'v@gmail.com', '25f9e794323b453885f5181f1b624d0b'),
(13, 'bhanu', '123', 'b@gmail.com', '3bae3e0533be12dbaab717f8acb02a56');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
