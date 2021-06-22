-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/

-- Database: `CAPPUCINI CSDL`

CREATE DATABASE CAPPUCINO;
USE CAPPUCINO;

-- ---

-- Table structure for table `Admin`

CREATE TABLE IF NOT EXISTS `Admin` (
  `idAdmin` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL COLLATE utf8_unicode_ci,
  `password` VARCHAR(50) NOT NULL COLLATE utf8_unicode_ci,
  `email` VARCHAR(50) NOT NULL COLLATE utf8_unicode_ci,
  PRIMARY KEY (`idAdmin`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ---

-- Table structure for table `User`

CREATE TABLE IF NOT EXISTS `User` (
  `idUser` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL COLLATE utf8_unicode_ci,
  `password` VARCHAR(50) NOT NULL COLLATE utf8_unicode_ci,
  `fullName` VARCHAR(50) NOT NULL COLLATE utf8_unicode_ci,
  `gender` TinyInt NOT NULL,
  `phone` INT(11) NOT NULL,
  `address` VARCHAR(80) NOT NULL COLLATE utf8_unicode_ci,
  `email` VARCHAR(50) NOT NULL COLLATE utf8_unicode_ci,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ---

-- Table structure for table `Receipt`

CREATE TABLE IF NOT EXISTS `Receipt` (
  `idReceipt` INT(11) NOT NULL AUTO_INCREMENT,
  `idUser` INT(11) NOT NULL,
  `receiptDate` DATETIME NOT NULL,
  `payment` TinyInt NOT NULL,
  `note` TEXT COLLATE utf8_unicode_ci,
  `idPromotion` INT(11) NOT NULL,
  `status` TinyInt NOT NULL,
  `total` DECIMAL(10,2) NOT NULL,
  `IsWeeklyBook` BOOLEAN NOT NULL,
  `idDetailWeeklyBook` INT(11) NOT NULL,
  PRIMARY KEY (`idReceipt`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ---

-- Table structure for table `Detail_Receipt`

CREATE TABLE IF NOT EXISTS `Detail_Receipt` (
  `idDetailReceipt` INT(11) NOT NULL AUTO_INCREMENT,
  `idDrink` INT(11) NOT NULL,
  `idReceipt` INT(11) NOT NULL,
  `amount` INT(11) NOT NULL,
  `sugar` INT(11),
  `ice` INT(11),
  `size` TinyInt NOT NULL,
  `drinkNote` TEXT COLLATE utf8_unicode_ci,
  `price` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`idDetailReceipt`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ---

-- Table structure for table `Detail_Topping`

CREATE TABLE IF NOT EXISTS `Detail_Topping` (
  `idDetailTopping` INT(11) NOT NULL AUTO_INCREMENT,
  `idTopping` INT(11) NOT NULL,
  `idDetailReceipt` INT(11) NOT NULL,
  PRIMARY KEY (`idDetailTopping`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --

-- Table structure for table `Menu`

CREATE TABLE IF NOT EXISTS `Menu` (
  `idDrink` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL COLLATE utf8_unicode_ci,
  `category` VARCHAR(50) NOT NULL COLLATE utf8_unicode_ci,
  `picture` VARCHAR(100) NOT NULL COLLATE utf8_unicode_ci,
  `price` DECIMAL(10,2) NOT NULL,
  `description` TEXT NOT NULL COLLATE utf8_unicode_ci,
  PRIMARY KEY (`idDrink`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --- 

-- Table structure for table `Topping`

CREATE TABLE IF NOT EXISTS `Topping` (
  `idTopping` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL COLLATE utf8_unicode_ci,
  `price` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`idTopping`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --- 

-- Table structure for table `Promotion`

CREATE TABLE IF NOT EXISTS `Promotion` (
  `idPromotion` INT(11) NOT NULL AUTO_INCREMENT,
  `promotionType` BOOLEAN NOT NULL,
  `percentPormo` INT,
  `moneyPromo` DECIMAL(10,2),
  `moneyLimit` DECIMAL(10,2),
  `expireDay` DATETIME NOT NULL,
  PRIMARY KEY (`idPromotion`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --- 

-- Table structure for table `Detail_WeeklyBook`

CREATE TABLE IF NOT EXISTS `Detail_WeeklyBook` (
  `idDetailWeeklyBook` INT(11) NOT NULL AUTO_INCREMENT,
  `startDay` DATE NOT NULL,
  `finishDay` DATE NOT NULL,
  `deliveryTime` TIME NOT NULL,
  `mon` BOOLEAN NOT NULL,
  `tue` BOOLEAN NOT NULL,
  `wed` BOOLEAN NOT NULL,
  `thu` BOOLEAN NOT NULL,
  `fri` BOOLEAN NOT NULL,
  `sat` BOOLEAN NOT NULL,
  `sun` BOOLEAN NOT NULL,
  PRIMARY KEY (`idDetailWeeklyBook`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Constraints for table `Receipt`
--
ALTER TABLE `Receipt`
ADD CONSTRAINT `FK_Receipt_User` FOREIGN KEY (`idUser`) REFERENCES `User` (`idUser`);

ALTER TABLE `Receipt`
ADD CONSTRAINT `FK_Receipt_Promotion` FOREIGN KEY (`idPromotion`) REFERENCES `Promotion` (`idPromotion`);

ALTER TABLE `Receipt`
ADD CONSTRAINT `FK_Receipt_DetailWeeklyBook` FOREIGN KEY (`idDetailWeeklyBook`) REFERENCES `Detail_WeeklyBook` (`idDetailWeeklyBook`);

--
-- Constraints for table `Detail_Receipt`
--
ALTER TABLE `Detail_Receipt`
ADD CONSTRAINT `FK_Detail_Receipt_Menu` FOREIGN KEY (`idDrink`) REFERENCES `Menu` (`idDrink`);

ALTER TABLE `Detail_Receipt`
ADD CONSTRAINT `FK_Detail_Receipt_Receipt` FOREIGN KEY (`idReceipt`) REFERENCES `Receipt` (`idReceipt`);

--
-- Constraints for table `Detail_Topping`
--
ALTER TABLE `Detail_Topping`
ADD CONSTRAINT `FK_Detail_Topping_Topping` FOREIGN KEY (`idTopping`) REFERENCES `Topping` (`idTopping`);

ALTER TABLE `Detail_Topping`
ADD CONSTRAINT `FK_Detail_Topping_Detail_Receipt` FOREIGN KEY (`idDetailReceipt`) REFERENCES `Detail_Receipt` (`idDetailReceipt`);
