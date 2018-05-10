-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1:3306
-- Genereringstid: 10. 05 2018 kl. 10:33:54
-- Serverversion: 5.7.19
-- PHP-version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `CategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`CategoryID`),
  UNIQUE KEY `CategoryName` (`CategoryName`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `category`
--

INSERT INTO `category` (`CategoryID`, `CategoryName`, `Description`) VALUES
(6, 'Holly', 'ItÂ´s relative with a religious celebration '),
(7, 'Business', 'The duck introduces a job '),
(8, 'Artist', 'The duck is a famous person '),
(9, 'Sport', 'He is fan of a sport or  an athlete.'),
(10, 'Hero', 'jfieuhioheroij'),
(11, 'game', 'dfgrht'),
(12, 'Famus', 'fhyjgjhkhj');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `companyinformation`
--

DROP TABLE IF EXISTS `companyinformation`;
CREATE TABLE IF NOT EXISTS `companyinformation` (
  `CompanyID` int(11) NOT NULL AUTO_INCREMENT,
  `CompanyName` varchar(255) NOT NULL,
  `CompanyAdress` varchar(355) DEFAULT NULL,
  `CompanyDescription` varchar(1500) NOT NULL,
  `CompanyEmail` varchar(50) NOT NULL,
  `CompanyTel` int(50) NOT NULL,
  PRIMARY KEY (`CompanyID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `companyinformation`
--

INSERT INTO `companyinformation` (`CompanyID`, `CompanyName`, `CompanyAdress`, `CompanyDescription`, `CompanyEmail`, `CompanyTel`) VALUES
(1, 'Esbjerg-Duckshop', 'Esbjerg, Humlevej 10', 'We have rubber ducks for professions, sports, happy moments and many many moreâ€¦', 'Info@duckshop.dk', 52735242);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `costumer`
--

DROP TABLE IF EXISTS `costumer`;
CREATE TABLE IF NOT EXISTS `costumer` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `FullName` varchar(20) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Tel` int(20) DEFAULT NULL,
  `Adress` varchar(255) DEFAULT NULL,
  `Picture` varchar(3000) DEFAULT NULL,
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `costumer`
--

INSERT INTO `costumer` (`UserID`, `FullName`, `Gender`, `Email`, `Password`, `Tel`, `Adress`, `Picture`) VALUES
(2, 'Shirin Vazirian 11', 'Female', 'shirin1268@gmail.com ', '$2y$15$L2c7d9sp5TzLhTofqoKdkeV6FU9d725vDMuEypbJjB0pO/GexXW/q', 52735242, 'fyrrelunden 2346', 'Karierremesse (180)SH.jpg'),
(3, 'Behdin Bagheri  ', 'M', 'behdin2010@gmail.com', '$2y$15$ea6NX8rvK6Bjm3toaUkkJ.eyZM/LqjMt6gdgDiDZpbVMOyV.NAsYi', 50393639, 'Fyrrelunden 62', 'Rubinduck.jpg'),
(4, 'Ati', NULL, 'Ati@gmail.com', '$2y$15$D7tzpSATAM8P2FLR7angKuERgDzQtuwEbjIsifL1cGrxpsd4PMl5.', NULL, NULL, NULL),
(5, 'Arash Bagheri       ', 'm', 'dr_arash_bagheri@yahoo.com', '$2y$15$zD4cCUQMuxmSqJya8xrU5etCKwNQs.0qSXeW/rH5rUjl8YOmLbta6', 50376302, 'Tehran-Iran', '123.jpg');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `openinghours`
--

DROP TABLE IF EXISTS `openinghours`;
CREATE TABLE IF NOT EXISTS `openinghours` (
  `DailyID` int(11) NOT NULL AUTO_INCREMENT,
  `MonOpen` time DEFAULT NULL,
  `TuesOpen` time DEFAULT NULL,
  `WedOpen` time DEFAULT NULL,
  `ThursOpen` time DEFAULT NULL,
  `FriOpen` time DEFAULT NULL,
  `SatOpen` time DEFAULT NULL,
  `SunOpen` time DEFAULT NULL,
  `MonClose` time DEFAULT NULL,
  `TueClose` time DEFAULT NULL,
  `WedClose` time DEFAULT NULL,
  `ThursClose` time DEFAULT NULL,
  `FriClose` time DEFAULT NULL,
  `SatClose` time DEFAULT NULL,
  `SunClose` time DEFAULT NULL,
  PRIMARY KEY (`DailyID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `openinghours`
--

INSERT INTO `openinghours` (`DailyID`, `MonOpen`, `TuesOpen`, `WedOpen`, `ThursOpen`, `FriOpen`, `SatOpen`, `SunOpen`, `MonClose`, `TueClose`, `WedClose`, `ThursClose`, `FriClose`, `SatClose`, `SunClose`) VALUES
(1, '08:30:00', '08:30:00', '08:30:00', '08:30:00', '08:30:00', '09:30:00', '09:30:00', '17:30:00', '17:30:00', '17:30:00', '17:30:00', '15:30:00', '14:30:00', '14:30:00');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `orderdetails`
--

DROP TABLE IF EXISTS `orderdetails`;
CREATE TABLE IF NOT EXISTS `orderdetails` (
  `productID` int(11) NOT NULL,
  `OrderID` int(20) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `UserID` int(50) NOT NULL,
  `OrderDate` date DEFAULT NULL,
  PRIMARY KEY (`OrderID`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `postalcode`
--

DROP TABLE IF EXISTS `postalcode`;
CREATE TABLE IF NOT EXISTS `postalcode` (
  `PostalCodeID` varchar(20) NOT NULL,
  `City` varchar(255) NOT NULL,
  PRIMARY KEY (`PostalCodeID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `productID` int(11) NOT NULL AUTO_INCREMENT,
  `productName` varchar(255) DEFAULT NULL,
  `CategoryName` varchar(255) DEFAULT NULL,
  `Price` int(11) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Stock` int(11) NOT NULL,
  `OnSale` tinyint(1) DEFAULT NULL,
  `Upward` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`productID`),
  KEY `CategoryName` (`CategoryName`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `product`
--

INSERT INTO `product` (`productID`, `productName`, `CategoryName`, `Price`, `Image`, `Stock`, `OnSale`, `Upward`) VALUES
(49, 'Pumkinduck', 'game', 100, '5ad4afbc81153_Pumkinduck.jpg', 27, 1, 0),
(50, 'Readingduck', 'game', 100, '5ad5a05740ed0_Readingduck.jpg', 33, NULL, 0),
(62, 'Rubinduck', 'Hero', 120, '5ae622cb17a10_Rubinduck.jpg', 70, 1, 0),
(46, 'Professor', 'Business', 120, '5acddf70359bd_Proffesorduck.jpg', 14, NULL, 0),
(45, 'Police', 'Business', 125, '5acddf33f19d1_Policeduck.jpg', 17, NULL, 0),
(44, 'CapitanJack', 'Artist', 135, '5acddf1ea609d_pirateduck.jpg', 15, 0, 0),
(43, 'Liverpoolfan', 'Sport', 110, '5acddefe4998a_Liverpoolduck.jpg', 15, 0, 0),
(42, 'Henryduck', 'Famus', 110, '5acddeddb532d_Henryduck.jpg', 20, 0, 0),
(41, 'Hendrix', 'Artist', 125, '5acddeb3c8cae_Hendrixduck.JPG', 16, 0, 0),
(40, 'Gladiator', 'Hero', 140, '5acdde97bb373_Gladiatorduck.jpg', 18, 0, 0),
(39, 'TenisorDuck', 'Sport', 110, '5acdde53c5781_Fitnessduck.jpg', 22, 1, 0),
(38, 'Doctorduck', 'Business', 120, '5acdde376938a_Doctorduck.jpg', 20, 0, 0),
(37, 'DavidBovie', 'Artist', 124, '5acdde026903b_david-bowieduck.jpg', 15, 0, 0),
(36, 'Cowboy', 'Famus', 116, '5acdddc3671ac_Cowboyduck-Recovered.jpg', 18, 0, 0),
(35, 'Chrismasduck', 'Holly', 110, '5acddda104eee_Chrismasduck.jpg', 17, 1, 0),
(52, 'Wifuduck', 'game', 150, '5ae6022b58ea1_Weifuduck.jpg', 45, 0, 0),
(34, 'Batduck', 'Hero', 130, '5acddd83d01e5_Batduck.jpg', 14, 0, 0),
(63, 'Sportyduck', 'Sport', 125, '5af14d8ea3259_sportyduck.jpg', 46, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `text`
--

DROP TABLE IF EXISTS `text`;
CREATE TABLE IF NOT EXISTS `text` (
  `textID` int(11) NOT NULL AUTO_INCREMENT,
  `textcontent` varchar(5000) DEFAULT NULL,
  `textname` varchar(50) NOT NULL,
  PRIMARY KEY (`textID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
