-- phpMyAdmin SQL Dump
-- version 2.11.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 28, 2014 at 09:19 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cellworks`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessdesc`
--

CREATE TABLE IF NOT EXISTS `accessdesc` (
  `ImagePath` varchar(255) NOT NULL,
  `Brand` varchar(100) NOT NULL,
  `Model` varchar(100) NOT NULL,
  `Processor` varchar(100) NOT NULL,
  `OS` varchar(100) NOT NULL,
  `RAM` varchar(100) NOT NULL,
  `Internalm` varchar(100) NOT NULL,
  `Discre` varchar(100) NOT NULL,
  `Respix` varchar(100) NOT NULL,
  `Battcap` varchar(100) NOT NULL,
  `OtherFeat` varchar(500) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Price` double NOT NULL,
  `AccssCode` varchar(100) NOT NULL,
  `Type` varchar(50) NOT NULL default 'Mobile',
  `sDay` varchar(25) NOT NULL,
  PRIMARY KEY  (`AccssCode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accessdesc`
--


-- --------------------------------------------------------

--
-- Table structure for table `bestbuy`
--

CREATE TABLE IF NOT EXISTS `bestbuy` (
  `ID` int(11) NOT NULL,
  `Code` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bestbuy`
--

INSERT INTO `bestbuy` (`ID`, `Code`) VALUES
(1, 'NL525B'),
(2, 'BZ10B'),
(3, 'HTCODB'),
(4, 'MCTB');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `Brands` varchar(200) NOT NULL,
  PRIMARY KEY  (`Brands`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`Brands`) VALUES
('Apple'),
('Blackberry'),
('Cherrymobile'),
('Google'),
('HTC'),
('Motorola'),
('Myphone'),
('New Brand'),
('Nokia'),
('O+'),
('Samsung'),
('Sony'),
('Starmobile'),
('Torque');

-- --------------------------------------------------------

--
-- Table structure for table `categ`
--

CREATE TABLE IF NOT EXISTS `categ` (
  `CatID` int(11) NOT NULL auto_increment,
  `CatName` varchar(50) NOT NULL,
  PRIMARY KEY  (`CatID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `categ`
--

INSERT INTO `categ` (`CatID`, `CatName`) VALUES
(1, 'Mobile'),
(2, 'Tablet'),
(3, 'Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `hotphone`
--

CREATE TABLE IF NOT EXISTS `hotphone` (
  `ID` int(11) NOT NULL,
  `Code` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotphone`
--

INSERT INTO `hotphone` (`ID`, `Code`) VALUES
(1, 'AI5SG'),
(2, 'NL1320B'),
(3, 'SXMDSB'),
(4, 'SXZUB');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `ProdID` int(11) NOT NULL auto_increment,
  `MobCode` varchar(50) NOT NULL,
  `SuppID` int(11) NOT NULL,
  `PQty` int(11) NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY  (`ProdID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`ProdID`, `MobCode`, `SuppID`, `PQty`, `Date`) VALUES
(1, 'GN5B', 5, 0, '2014-08-31'),
(2, 'NL525B', 2, 9, '2014-08-31'),
(3, 'AI5SG', 3, 0, '2014-08-31'),
(4, 'AIAW16G', 3, 5, '2014-08-31');

-- --------------------------------------------------------

--
-- Table structure for table `itempurchased`
--

CREATE TABLE IF NOT EXISTS `itempurchased` (
  `ReffNum` varchar(100) NOT NULL,
  `MobCode` varchar(200) NOT NULL,
  `Price` double NOT NULL,
  `cUser` varchar(25) NOT NULL,
  `DatePurch` date NOT NULL,
  `Status` varchar(10) NOT NULL,
  PRIMARY KEY  (`ReffNum`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itempurchased`
--


-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `ID` int(11) NOT NULL auto_increment,
  `username` varchar(15) default NULL,
  `password` varchar(20) default NULL,
  `LastName` varchar(50) default NULL,
  `FirstName` varchar(25) NOT NULL,
  `Mi` varchar(2) NOT NULL,
  `Gender` varchar(25) NOT NULL,
  `Address` varchar(50) default NULL,
  `Contact` varchar(20) character set utf8 default NULL,
  `Email` varchar(25) default NULL,
  `last_loggedin` varchar(100) NOT NULL default 'never',
  `user_level` enum('1','2','3','4','5') NOT NULL default '1',
  `forgot` varchar(100) default NULL,
  `status` enum('live','suspended','pending') NOT NULL default 'live',
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `username`, `password`, `LastName`, `FirstName`, `Mi`, `Gender`, `Address`, `Contact`, `Email`, `last_loggedin`, `user_level`, `forgot`, `status`) VALUES
(1, 'admin', '12345', 'Cellworks', 'Entertainment', 'D', 'Male', 'Ormoc City', '09482086635', 'Cellworks@yahoo.com', '28/10/14 5:05:34', '5', NULL, 'live'),
(3, 'b3b0y', 'beboythe1', 'Marapoc', 'Beboy', 'Y.', 'Male', 'lilia Ave. Cogon Ormoc City', '09482086635', 'coy_mrp@yahoo.com.ph', '28/10/14 7:12:08', '1', NULL, 'live'),
(4, 'sheila1234', 'beboythe1', 'mancera', 'sheila grace', 'G', '', 'Malbasag ormoc city', '', 'Shoo@yahooo.com', '17/03/14 14:17:04', '1', NULL, 'live');

-- --------------------------------------------------------

--
-- Table structure for table `mobiledesc`
--

CREATE TABLE IF NOT EXISTS `mobiledesc` (
  `MobID` int(11) NOT NULL auto_increment,
  `ImagePath` varchar(255) NOT NULL,
  `Brand` varchar(100) NOT NULL,
  `Model` varchar(100) NOT NULL,
  `Processor` varchar(100) NOT NULL,
  `OS` varchar(100) NOT NULL,
  `RAM` varchar(100) NOT NULL,
  `Internalm` varchar(100) NOT NULL,
  `Discre` varchar(100) NOT NULL,
  `Respix` varchar(100) NOT NULL,
  `Battcap` varchar(100) NOT NULL,
  `OtherFeat` varchar(500) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Price` double NOT NULL,
  `MobCode` varchar(100) NOT NULL,
  `Type` varchar(50) NOT NULL default 'Mobile',
  `sDay` varchar(25) NOT NULL,
  `supID` int(11) NOT NULL,
  PRIMARY KEY  (`MobID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `mobiledesc`
--

INSERT INTO `mobiledesc` (`MobID`, `ImagePath`, `Brand`, `Model`, `Processor`, `OS`, `RAM`, `Internalm`, `Discre`, `Respix`, `Battcap`, `OtherFeat`, `Description`, `Price`, `MobCode`, `Type`, `sDay`, `supID`) VALUES
(1, 'Images/Cellphones/Nokia/Nokia Lumia 525, black.jpg', 'Nokia', 'Nokia Lumia 525, black', '1 GHz Qualcomm Snapdragon S4, Dual Core', 'Windows Phone 8', '1 GB RAM', '8 GB (microSD, upto 64 GB)', '4 Inches', 'WVGA, 480 x 800 Pixels', ' 1430 mAh "Talk time,16 hrs (2G) 10 hrs (3G)" "Standby Time(336 hrs (2G), 336 hrs (3G)"', 'Micro SIM, Touch Screen, 5 Megapixel, GPRS , 3G,  Wifi , Supports MP3, USB Connectivity', 'Wi-Fi Enabled Expandable Storage Capacity of 64 GB 4-inch LCD Touchscreen 5 MP Primary Camera Windows Phone 8 OS 1 GHz Qualcomm Snapdragon S4 Dual Core Processor HD Recording', 10000, 'NL525B', 'Mobile', '2-3 Days', 2),
(15, 'Images/Cellphones/Sony/Sony Xperia Z Tablet, black.jpg', 'Sony', 'Sony Xperia Z Tablet, black', '', '', '', '', '', '', '', '', '', 24000, 'SXZTB', 'Tablet', '3', 2),
(16, 'Images/Cellphones/Samsung/Samsung Tab3 Neo T111, black.jpg', 'Samsung', 'Samsung Tab3 Neo T111, black', '', '', '', '', '', '', '', '', '', 10000, 'ST3NT11B', 'Tablet', '3', 3),
(17, 'Images/Cellphones/Apple/Apple iPad Air WiFi 16GB, grey.jpg', 'Apple', 'Apple iPad Air WiFi 16GB, grey', '', '', '', '', '', '', '', '', '', 21000, 'AIAW16G', 'Tablet', '3', 5),
(3, 'Images/Cellphones/HTC/HTC One (Dual Sim) black.jpg', 'HTC', 'HTC One (Dual Sim) black', '', '', '', '', '', '', '', '', '', 5000, 'HTCODB', 'Mobile', '0', 7),
(4, 'Images/Cellphones/HTC/Micromax Canvas Turbo, blue.jpg', 'HTC', 'Micromax Canvas Turbo, blue', '', '', '', '', '', '', '', '', '', 4500, 'MCTB', 'Mobile', '0', 2),
(5, 'Images/Cellphones/Google/Google Nexus 5, black, 32 gb.jpg', 'Google', 'Google Nexus 5, black, 32 gb', '', '', '', '', '', '', '', '', '', 5000, 'GN5B', 'Mobile', '0', 3),
(6, 'Images/Cellphones/Samsung/Samsung Galaxy 2.jpg', 'Samsung', 'Samsung Galaxy 2', '', '', '', '', '', '', '', '', '', 9800, 'SG2', 'Mobile', '0', 5),
(7, 'Images/Cellphones/Samsung/Samsung Galaxy Grand Neo I9060, black.jpg', 'Samsung', 'Samsung Galaxy Grand Neo I9060, black', '', '', '', '', '', '', '', '', '', 8700, 'SGG9060B', 'Mobile', '0', 2),
(8, 'Images/Cellphones/Samsung/Samsung Galaxy Note 3 Neo, white.jpg', 'Samsung', 'Samsung Galaxy Note 3 Neo, white', '1.7 GHz Dual Core A15 + 1.3 GHz Quad Core A7', 'Android  ( 4.3 Jelly Bean )', '2 GB', '16 GB (11 GB User Accessable)   Up to 64 GB using MicroSD', '5.5 inch (13.95 cm)', '1280 x 720 Pixels', 'Li-ion   3100 mAh', '', '', 25000, 'SGN3NW', 'Mobile', '0', 3),
(9, 'Images/Cellphones/Apple/Apple iPhone 5S, gold, 16gb.jpg', 'Apple', 'Apple iPhone 5S, gold, 16gb', '', '', '', '', '', '', '', '', '', 8000, 'AI5SG', 'Mobile', '0', 5),
(10, 'Images/Cellphones/Nokia/Nokia Lumia 1320, black.jpg', 'Nokia', 'Nokia Lumia 1320, black', '', '', '', '', '', '', '', '', '', 8000, 'NL1320B', 'Mobile', '0', 5),
(11, 'Images/Cellphones/Sony/Sony Xperia M DS, black.jpg', 'Sony', 'Sony Xperia M DS, black', '', '', '', '', '', '', '', '', '', 8500, 'SXMDSB', 'Mobile', '0', 7),
(12, 'Images/Cellphones/Sony/Sony Xperia Z Ultra, black.jpg', 'Sony', 'Sony Xperia Z Ultra, black', '', '', '', '', '', '', '', '', '', 7000, 'SXZUB', 'Mobile', '0', 2),
(13, 'Images/Cellphones/Samsung/Samsung Galaxy S4 Mini I9192, black.jpg', 'Samsung', 'Samsung Galaxy S4 Mini I9192, black', '', '', '', '', '', '', '', '', '', 9800, 'SGS4MB', 'Mobile', '0', 2),
(14, 'Images/Cellphones/Samsung/Samsung Galaxy Note 3 Neo, green.jpg', 'Samsung', 'Samsung Galaxy Note 3 Neo, green', '', '', '', '', '', '', '', '', '', 12400, 'SGN3NG', 'Mobile', '0', 2),
(19, 'Images/Cellphones/New Brand/Sony Xperia Z Ultra, black.jpg', 'New Brand', 'New Phone', '', '', '', '', '', '', '', '', '', 1, 'nn', 'Mobile', '1', 0),
(20, 'Images/Cellphones/New Brand/Sony Xperia Z Ultra, black.jpg', 'New Brand', 's', '', '', '', '', '', '', '', '', '', 1, 'd', 'Mobile', '2', 5),
(21, 'Images/Cellphones/New Brand/Sony Xperia Z Ultra, black.jpg', 'New Brand', 'Bagong Brand', '', '', '', '', '', '', '', '', '', 0, 'bb', 'Mobile', '1', 7);

-- --------------------------------------------------------

--
-- Table structure for table `newrel`
--

CREATE TABLE IF NOT EXISTS `newrel` (
  `ID` int(11) NOT NULL,
  `Code` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newrel`
--

INSERT INTO `newrel` (`ID`, `Code`) VALUES
(1, 'GN5B'),
(2, 'SG2'),
(3, 'SGG9060B'),
(4, 'SGN3NW');

-- --------------------------------------------------------

--
-- Table structure for table `phon_imei`
--

CREATE TABLE IF NOT EXISTS `phon_imei` (
  `MobCode` varchar(100) NOT NULL,
  `IMEI` varchar(250) NOT NULL,
  `status` enum('Available','Reserve','Sold') NOT NULL default 'Available',
  PRIMARY KEY  (`IMEI`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phon_imei`
--

INSERT INTO `phon_imei` (`MobCode`, `IMEI`, `status`) VALUES
('NL525B', '0123456789', 'Sold'),
('BZ10B', '98745135', 'Available'),
('SGN3NW', '651484132651', 'Available'),
('NL525B', '164163654', 'Reserve'),
('NL525B', '78942167217', 'Available'),
('BZ10B', '1524896135791', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `purorder`
--

CREATE TABLE IF NOT EXISTS `purorder` (
  `OrderNo` int(11) NOT NULL auto_increment,
  `Reference` varchar(50) NOT NULL,
  `SuppID` varchar(50) NOT NULL,
  `MobCode` varchar(50) NOT NULL,
  `MQty` int(11) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `OrdeDate` date NOT NULL,
  PRIMARY KEY  (`OrderNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `purorder`
--

INSERT INTO `purorder` (`OrderNo`, `Reference`, `SuppID`, `MobCode`, `MQty`, `Status`, `OrdeDate`) VALUES
(1, '487488', '2', 'NL525B', 10, 'Pending', '2014-07-31'),
(2, '1320', '3', 'AIAW16G', 5, 'Pending', '2014-08-31'),
(4, '3615335992', '3', 'AIAW16G', 2, 'Pending', '2014-10-28'),
(5, '3615335992', '3', 'AI5SG', 2, 'Pending', '2014-10-28');

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE IF NOT EXISTS `shoppingcart` (
  `sID` int(11) NOT NULL auto_increment,
  `UserName` varchar(25) NOT NULL,
  `MobCode` varchar(100) NOT NULL,
  `Qty` int(11) NOT NULL,
  `Total` double NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY  (`sID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `shoppingcart`
--


-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `ID` int(11) NOT NULL,
  `ImagePath` varchar(100) NOT NULL,
  `Code` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`ID`, `ImagePath`, `Code`) VALUES
(1, 'Images/Cellphones/Slide/Atom.jpg', 'Atom Mobile'),
(2, 'Images/Cellphones/Slide/low.jpg', 'Lowest Prices'),
(3, 'Images/Cellphones/Slide/slide.jpg', '5 % off'),
(4, 'Images/Cellphones/Slide/sony.jpg', 'Sony Xperia M');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `supID` int(20) NOT NULL auto_increment,
  `supName` varchar(25) NOT NULL,
  `ownlName` varchar(25) NOT NULL,
  `ownfName` varchar(25) NOT NULL,
  `ownMI` varchar(5) NOT NULL,
  `supAddress` varchar(30) NOT NULL,
  `supContact` bigint(11) NOT NULL,
  `supEmail` varchar(25) NOT NULL,
  PRIMARY KEY  (`supID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supID`, `supName`, `ownlName`, `ownfName`, `ownMI`, `supAddress`, `supContact`, `supEmail`) VALUES
(2, 'Leo', 'Beboy', 'Marapoc', 'Y', 'Lilia Ave. Cogon Ormoc City', 9482086635, 'coy_mrp@yahoo.com.ph'),
(3, 'Steve Jobs', 'Beboy', 'Marapoc', 'Y', 'Lilia Ave. Cogon Ormoc City', 9482086635, 't@yahoo.com'),
(5, 'Beboy', 'Marapoc', 'Leo', 'Y', 'Cogon Ormoc City', 1234567890, 'coy_mrp@rocketmail.com'),
(7, 'new supplier', 'leo', 'marapoc', 'y', 'new address', 12345678, 'amelialabra@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `tabletdesc`
--

CREATE TABLE IF NOT EXISTS `tabletdesc` (
  `ImagePath` varchar(255) NOT NULL,
  `Brand` varchar(100) NOT NULL,
  `Model` varchar(100) NOT NULL,
  `Processor` varchar(100) NOT NULL,
  `OS` varchar(100) NOT NULL,
  `RAM` varchar(100) NOT NULL,
  `Internalm` varchar(100) NOT NULL,
  `Discre` varchar(100) NOT NULL,
  `Respix` varchar(100) NOT NULL,
  `Battcap` varchar(100) NOT NULL,
  `OtherFeat` varchar(500) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Price` double NOT NULL,
  `MobCode` varchar(100) NOT NULL,
  `Type` varchar(50) NOT NULL default 'Mobile',
  PRIMARY KEY  (`MobCode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabletdesc`
--

INSERT INTO `tabletdesc` (`ImagePath`, `Brand`, `Model`, `Processor`, `OS`, `RAM`, `Internalm`, `Discre`, `Respix`, `Battcap`, `OtherFeat`, `Description`, `Price`, `MobCode`, `Type`) VALUES
('Images/Cellphones/Apple/Apple iPad Air WiFi 16GB, grey.jpg', 'Apple', 'Apple iPad Air WiFi 16GB, grey', '', '', '', '', '', '', '', '', '', 10000, 'AIAW16G', 'Tablet'),
('Images/Cellphones/Samsung/Samsung Tab3 Neo T111, black.jpg', 'Samsung', 'Samsung Tab3 Neo T111, black', '', '', '', '', '', '', '', '', '', 1000, 'ST3NT11B', 'Tablet'),
('Images/Cellphones/Sony/Sony Xperia Z Tablet, black.jpg', 'Sony', 'Sony Xperia Z Tablet, black', '', '', '', '', '', '', '', '', '', 25000, 'SXZTB', 'Tablet');
