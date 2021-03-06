DROP DATABASE IF EXISTS shop;
CREATE DATABASE shop;
USE shop;


CREATE TABLE `Category`(
  CategoryID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  CategoryName VARCHAR(255) UNIQUE ,
  Description VARCHAR(255)
);

CREATE TABLE `product`(
    productID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    productName varchar(255),
    CategoryName varchar(255),
    Price int NOT NULL,
    Image VARCHAR(50) NOT NULL,
    Stock INT NOT NULL,
    OnSale BOOLEAN NULL ,
  FOREIGN KEY (CategoryName) REFERENCES `Category` (CategoryName)

);


CREATE TABLE `costumer`(
    UserID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FullName varchar(20) NULL,
    Gender varchar(10) NULL,
    Email varchar(255) NOT NULL UNIQUE ,
    Password VARCHAR(255) NOT NULL ,
    Tel int(20) NULL,
    Adress varchar(255) NULL,
  Picture VARCHAR(3000) NULL

);

CREATE TABLE  `orderedproduct` (
  `OrderID` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  `UserID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Quntity` int(11) NOT NULL,
  `subTotalPrice` int(11) NOT NULL,
  `OrderDate`     DATE DEFAULT NULL,
  FOREIGN KEY (UserID) REFERENCES `costumer` (UserID),
  FOREIGN KEY (productID) REFERENCES `product` (productID)
);


CREATE TABLE CompanyInformation (
  CompanyID INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  CompanyName VARCHAR(255) NOT NULL,
  CompanyAdress VARCHAR(355)NULL,
  CompanyDescription VARCHAR(1500)NULL ,
  CompanyEmail VARCHAR (50)NULL ,
  CompanyTel INT (50)NULL

);

CREATE TABLE OpeningHours (
OpeningID INT NOT NULL AUTO_INCREMENT PRIMARY key,
WeeksDay VARCHAR(50) NULL,
OpeningTime TIME NULL,
ClosingTime TIME NULL

);

