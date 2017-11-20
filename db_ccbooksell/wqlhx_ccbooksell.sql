-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2017 at 01:10 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wqlhx_ccbooksell`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblbook`
--

CREATE TABLE `tblbook` (
  `book_ID` int(11) NOT NULL,
  `seller_ID` int(11) DEFAULT NULL,
  `book_Name` varchar(45) NOT NULL,
  `book_ISBN` varchar(45) DEFAULT NULL,
  `book_Category_ID` int(11) NOT NULL,
  `book_Price` decimal(10,0) NOT NULL DEFAULT '0',
  `date_Post` datetime NOT NULL,
  `book_Sold` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblbook`
--

INSERT INTO `tblbook` (`book_ID`, `seller_ID`, `book_Name`, `book_ISBN`, `book_Category_ID`, `book_Price`, `date_Post`, `book_Sold`) VALUES
(1, 1, 'Allan Wexler: Absurd Thinking-Between Art', '3037785160', 1, '50', '2017-11-07 00:00:00', 0),
(2, 1, 'Churchill The Life: An Authorized Pictorial', '1770856323', 2, '29', '2017-10-08 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `category_ID` int(11) NOT NULL,
  `category_Name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`category_ID`, `category_Name`) VALUES
(1, 'Art & Photography'),
(2, 'Biographies & Memoirs'),
(3, 'Childrens BookS');

-- --------------------------------------------------------

--
-- Table structure for table `tblseller`
--

CREATE TABLE `tblseller` (
  `seller_ID` int(11) NOT NULL,
  `seller_Password` varchar(45) NOT NULL,
  `seller_Name` varchar(45) NOT NULL,
  `seller_Phone_Number` varchar(10) DEFAULT NULL,
  `seller_Email_Address` varchar(45) NOT NULL,
  `hash` varchar(32) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblseller`
--

INSERT INTO `tblseller` (`seller_ID`, `seller_Password`, `seller_Name`, `seller_Phone_Number`, `seller_Email_Address`, `hash`) VALUES
(1, 'wangqiao', 'Kevin', '5197217729', 'wangqiao921105@gmail.com', ''),
(2, 'lihanxiang', 'Hanxiang', NULL, 'hanxiangli97@gmail.com', ''),
(3, '$2y$10$fXFuVp88z2dPUDFj.wuPr.lojG3rAtMEIXVID7', 'uuu', NULL, 'uuu@gmail.com', ''),
(4, '$2y$10$HotF4Mlku4jY26lsO0hDRegEafnmpfdI2NX.4o', '', NULL, '', ''),
(20, '$2y$10$Q5OK1Br0iD5LXeTVFZwB.enqehkoNus5xmWM8O', 'dwsadaw', NULL, 'dqwadssa@gmail.com', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblbook`
--
ALTER TABLE `tblbook`
  ADD PRIMARY KEY (`book_ID`),
  ADD KEY `seller_ID_idx` (`seller_ID`),
  ADD KEY `book_Category_ID_idx` (`book_Category_ID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`category_ID`),
  ADD UNIQUE KEY `category_Name_UNIQUE` (`category_Name`);

--
-- Indexes for table `tblseller`
--
ALTER TABLE `tblseller`
  ADD PRIMARY KEY (`seller_ID`),
  ADD UNIQUE KEY `seller_Name_UNIQUE` (`seller_Name`),
  ADD UNIQUE KEY `seller_Email_Address_UNIQUE` (`seller_Email_Address`),
  ADD UNIQUE KEY `seller_Phone_Number_UNIQUE` (`seller_Phone_Number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblbook`
--
ALTER TABLE `tblbook`
  MODIFY `book_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `category_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblseller`
--
ALTER TABLE `tblseller`
  MODIFY `seller_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblbook`
--
ALTER TABLE `tblbook`
  ADD CONSTRAINT `book_Category_ID` FOREIGN KEY (`book_Category_ID`) REFERENCES `tblcategory` (`category_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `seller_ID` FOREIGN KEY (`seller_ID`) REFERENCES `tblseller` (`seller_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
