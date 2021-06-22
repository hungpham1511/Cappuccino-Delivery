-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/

-- Database: `CAPPUCINI CSDL`

CREATE DATABASE CAPPUCINO;
USE CAPPUCINO;

-- ---

-- Table structure for table `admin`

CREATE TABLE IF NOT EXISTS `admin` (
  `idAdmin` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL COLLATE utf8_unicode_ci,
  `password` VARCHAR(50) NOT NULL COLLATE utf8_unicode_ci,
  `email` VARCHAR(50) NOT NULL COLLATE utf8_unicode_ci,
  PRIMARY KEY (`idAdmin`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ---

-- Table structure for table `user`

CREATE TABLE IF NOT EXISTS `users` (
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

-- Table structure for table `receipt`

CREATE TABLE IF NOT EXISTS `receipt` (
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

-- Table structure for table `detail_receipt`

CREATE TABLE IF NOT EXISTS `detail_receipt` (
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

-- Table structure for table `detail_topping`

CREATE TABLE IF NOT EXISTS `detail_topping` (
  `idDetailTopping` INT(11) NOT NULL AUTO_INCREMENT,
  `idTopping` INT(11) NOT NULL,
  `idDetailReceipt` INT(11) NOT NULL,
  PRIMARY KEY (`idDetailTopping`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --

-- Table structure for table `menu`

CREATE TABLE IF NOT EXISTS `menu` (
  `idDrink` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL COLLATE utf8_unicode_ci,
  `category` VARCHAR(50) NOT NULL COLLATE utf8_unicode_ci,
  `picture` VARCHAR(100) NOT NULL COLLATE utf8_unicode_ci,
  `price` DECIMAL(10,2) NOT NULL,
  `description` TEXT NOT NULL COLLATE utf8_unicode_ci,
  PRIMARY KEY (`idDrink`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --- 

-- Table structure for table `topping`

CREATE TABLE IF NOT EXISTS `topping` (
  `idTopping` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL COLLATE utf8_unicode_ci,
  `price` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`idTopping`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --- 

-- Table structure for table `promotion`

CREATE TABLE IF NOT EXISTS `promotion` (
  `idPromotion` INT(11) NOT NULL AUTO_INCREMENT,
  `promotionType` BOOLEAN NOT NULL,
  `percentPromo` INT,
  `moneyPromo` DECIMAL(10,2),
  `moneyLimit` DECIMAL(10,2),
  `expireDay` DATETIME NOT NULL,
  PRIMARY KEY (`idPromotion`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --- 

-- Table structure for table `detail_weekly_book`

CREATE TABLE IF NOT EXISTS `detail_weekly_book` (
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
-- Constraints for table `receipt`
--
ALTER TABLE `receipt`
ADD CONSTRAINT `FK_Receipt_User` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);

ALTER TABLE `receipt`
ADD CONSTRAINT `FK_Receipt_Promotion` FOREIGN KEY (`idPromotion`) REFERENCES `promotion` (`idPromotion`);

ALTER TABLE `receipt`
ADD CONSTRAINT `FK_Receipt_DetailWeeklyBook` FOREIGN KEY (`idDetailWeeklyBook`) REFERENCES `detail_weekly_book` (`idDetailWeeklyBook`);

--
-- Constraints for table `detail_receipt`
--
ALTER TABLE `detail_receipt`
ADD CONSTRAINT `FK_Detail_Receipt_Menu` FOREIGN KEY (`idDrink`) REFERENCES `menu` (`idDrink`);

ALTER TABLE `detail_receipt`
ADD CONSTRAINT `FK_Detail_Receipt_Receipt` FOREIGN KEY (`idReceipt`) REFERENCES `receipt` (`idReceipt`);

--
-- Constraints for table `detail_topping`
--
ALTER TABLE `detail_topping`
ADD CONSTRAINT `FK_Detail_Topping_Topping` FOREIGN KEY (`idTopping`) REFERENCES `topping` (`idTopping`);

ALTER TABLE `detail_topping`
ADD CONSTRAINT `FK_Detail_Topping_Detail_Receipt` FOREIGN KEY (`idDetailReceipt`) REFERENCES `detail_receipt` (`idDetailReceipt`);
