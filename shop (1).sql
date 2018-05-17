DROP DATABASE IF EXISTS shop;
CREATE DATABASE shop;
USE shop;


DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `CategoryID` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `CategoryName` varchar(255) DEFAULT NULL UNIQUE KEY,
  `Description` varchar(255) DEFAULT NULL,
)

--
-- Data dump for tabellen `category`
--

INSERT INTO `category` (`CategoryName`, `Description`) VALUES
( 'Holly', 'ItÂ´s relative with a religious celebration. '),
( 'Business', 'The duck introduces a job. '),
( 'Artist', 'The duck is a famous person. '),
( 'Sport', 'He is fan of a sport or  an athlete.'),
( 'Hero', 'This duck is very strong and incredible.'),
( 'Game', 'It is a funy duck '),
( 'Famus', 'People know who this duck is');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `companyinformation`
--

DROP TABLE IF EXISTS `companyinformation`;
CREATE TABLE IF NOT EXISTS `companyinformation` (
  `CompanyID` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `CompanyName` varchar(255) NOT NULL,
  `CompanyAdress` varchar(355) DEFAULT NULL,
  `CompanyDescription` varchar(1500) NOT NULL,
  `CompanyEmail` varchar(50) NOT NULL,
  `CompanyTel` int(50) NOT NULL,

)

--
-- Data dump for tabellen `companyinformation`
--

INSERT INTO `companyinformation` ( `CompanyName`, `CompanyAdress`, `CompanyDescription`, `CompanyEmail`, `CompanyTel`) VALUES
( 'Esbjerg-Duckshop', 'Esbjerg, Humlevej 10', 'We have rubber ducks for professions, sports, happy moments and many many moreâ€¦', 'Info@duckshop.dk', 52735242);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `costumer`
--

DROP TABLE IF EXISTS `costumer`;
CREATE TABLE IF NOT EXISTS `costumer` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `FullName` varchar(20) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Email` varchar(255) NOT NULL UNIQUE KEY,
  `Password` varchar(255) NOT NULL,
  `Tel` int(20) DEFAULT NULL,
  `Adress` varchar(255) DEFAULT NULL,
  `Picture` varchar(3000) DEFAULT NULL,
)
--
-- Data dump for tabellen `costumer`
--

INSERT INTO `costumer` ( `FullName`, `Gender`, `Email`, `Password`, `Tel`, `Adress`, `Picture`) VALUES
( 'Shirin Vazirian 11', 'Female', 'shirin1268@gmail.com ', '$2y$15$L2c7d9sp5TzLhTofqoKdkeV6FU9d725vDMuEypbJjB0pO/GexXW/q', 52735242, 'fyrrelunden 2346', 'Karierremesse (180)SH.jpg'),
( 'Behdin Bagheri', 'M', 'behdin2010@gmail.com', '$2y$15$ea6NX8rvK6Bjm3toaUkkJ.eyZM/LqjMt6gdgDiDZpbVMOyV.NAsYi', 50393639, 'Fyrrelunden 62', 'Rubinduck.jpg'),
( 'Ati', NULL, 'Ati@gmail.com', '$2y$15$D7tzpSATAM8P2FLR7angKuERgDzQtuwEbjIsifL1cGrxpsd4PMl5.', NULL, NULL, NULL),
( 'Arash Bagheri', 'm', 'dr_arash_bagheri@yahoo.com', '$2y$15$zD4cCUQMuxmSqJya8xrU5etCKwNQs.0qSXeW/rH5rUjl8YOmLbta6', 50376302, 'Tehran-Iran', '123.jpg');

-- --------------------------------------------------------
--
-- Struktur-dump for tabellen `openinghours`
--

DROP TABLE IF EXISTS `openinghours`;
CREATE TABLE IF NOT EXISTS `openinghours` (
  `DailyID` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
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
)
--
-- Data dump for tabellen `openinghours`
--

INSERT INTO `openinghours` ( `MonOpen`, `TuesOpen`, `WedOpen`, `ThursOpen`, `FriOpen`, `SatOpen`, `SunOpen`, `MonClose`, `TueClose`, `WedClose`, `ThursClose`, `FriClose`, `SatClose`, `SunClose`) VALUES
( '08:30:00', '08:30:00', '08:30:00', '08:30:00', '08:30:00', '09:30:00', '09:30:00', '17:30:00', '17:30:00', '17:30:00', '17:30:00', '15:30:00', '14:30:00', '14:30:00');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `orderedproduct`
--
DROP TABLE IF EXISTS `orderedproduct`;
CREATE TABLE IF NOT EXISTS `orderedproduct` (
  `OrderID` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `UserID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `subTotalPrice` int(11) NOT NULL,
  `OrderDate` date NOT NULL,
   FOREIGN KEY (UserID) REFERENCES `costumer` (UserID),
  FOREIGN KEY (productID) REFERENCES `product` (productID)
)

--
-- Data dump for tabellen `orderedproduct`
--

INSERT INTO `orderedproduct` ( `UserID`, `ProductID`, `Quantity`, `subTotalPrice`, `OrderDate`) VALUES
( 2, 46, 3, 360, '2018-05-11'),
( 2, 63, 1, 125, '2018-05-11'),
( 2, 62, 1, 120, '2018-05-16'),
( 2, 50, 1, 100, '2018-05-14'),
( 2, 50, 1, 100, '2018-05-16'),
(2, 62, 1, 120, '2018-05-16'),
( 2, 52, 2, 300, '2018-05-16');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `productID` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `productName` varchar(255) DEFAULT NULL,
  `CategoryName` varchar(255) DEFAULT NULL,
  `Price` int(11) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Stock` int(11) NOT NULL,
  `OnSale` tinyint(1) DEFAULT NULL,
   FOREIGN KEY (CategoryName) REFERENCES `Category` (CategoryName)

)

--
-- Data dump for tabellen `product`
--

INSERT INTO `product` ( `productName`, `CategoryName`, `Price`, `Image`, `Stock`, `OnSale`) VALUES
('Pumkinduck', 'game', 100, '5ad4afbc81153_Pumkinduck.jpg', 27, 1),
('Readingduck', 'game', 100, '5ad5a05740ed0_Readingduck.jpg', 33, NULL),
( 'Rubinduck', 'Hero', 120, '5ae622cb17a10_Rubinduck.jpg', 70, 1),
( 'Professor', 'Business', 120, '5acddf70359bd_Proffesorduck.jpg', 14, NULL),
( 'Police', 'Business', 125, '5acddf33f19d1_Policeduck.jpg', 17, NULL),
( 'CapitanJack', 'Artist', 135, '5acddf1ea609d_pirateduck.jpg', 15, 0),
( 'Liverpoolfan', 'Sport', 110, '5acddefe4998a_Liverpoolduck.jpg', 15, 0),
( 'Henryduck', 'Famus', 110, '5acddeddb532d_Henryduck.jpg', 20, 0),
( 'Hendrix', 'Artist', 125, '5acddeb3c8cae_Hendrixduck.JPG', 16, 0),
( 'Gladiator', 'Hero', 140, '5acdde97bb373_Gladiatorduck.jpg', 18, 0),
( 'TenisorDuck', 'Sport', 110, '5acdde53c5781_Fitnessduck.jpg', 22, 1),
( 'Doctorduck', 'Business', 120, '5acdde376938a_Doctorduck.jpg', 20, 0),
( 'DavidBovie', 'Artist', 124, '5acdde026903b_david-bowieduck.jpg', 15, 0),
( 'Cowboy', 'Famus', 116, '5acdddc3671ac_Cowboyduck-Recovered.jpg', 18, 0),
( 'Chrismasduck', 'Holly', 110, '5acddda104eee_Chrismasduck.jpg', 17, 1),
( 'Wifuduck', 'game', 150, '5ae6022b58ea1_Weifuduck.jpg', 45, 0),
( 'Batduck', 'Hero', 130, '5acddd83d01e5_Batduck.jpg', 14, 0),
( 'Sportyduck', 'Sport', 125, '5af14d8ea3259_sportyduck.jpg', 46, NULL);

-- --------------------------------------------------------

