DROP DATABASE IF EXISTS shop;
CREATE DATABASE shop;
USE shop;

CREATE TABLE `PostalCode`(
    PostalCodeID varchar(20) NOT NULL PRIMARY KEY,
    City varchar(255)NOT NULL
);
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
    Upward BOOLEAN null
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

CREATE TABLE `OrderDetails`(
  productID INT NOT NULL,
  OrderID INT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Quantity INT NOT NULL,
  UserID INT NOT NULL,
  OrderDate DATE NULL,
  FOREIGN KEY (UserID) REFERENCES `costumer` (UserID),
  FOREIGN KEY (productID) REFERENCES `product` (productID),
  FOREIGN KEY (OrderID) REFERENCES `Order` (OrderID)
);

CREATE TABLE Text(
  textID INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  textcontent VARCHAR(5000)NULL ,
  textname VARCHAR(50)NOT NULL,

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
WeeksDay VARCHAR NULL,
OpeningTime TIME NULL,
ClosingTime TIME NULL
);
INSERT INTO `openinghours` (`DailyID`, `MonOpen`, `TuesOpen`, `WedOpen`, `ThursOpen`, `FriOpen`, `SatOpen`, `SunOpen`, `MonClose`, `TueClose`, `WedClose`, `ThursClose`, `FriClose`, `SatClose`, `SunClose`)
 VALUES (NULL, '8:00', '8:00', '8.00', '8:00', '8.00', '10:30', '10:30', '17:30', '17:30', '17:30', '17.30', '17:30', '17.30', '18.00');