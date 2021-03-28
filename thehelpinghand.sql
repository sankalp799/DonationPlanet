-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 28, 2021 at 01:23 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thehelpinghand`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `name` text NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `pass`) VALUES
('admin@helpinghand.com', 'Yashasavi Mishra', '$2y$10$roziPxsa8xc8XcKRkvxb5.kRJehBoLa0LBidc2xB/FciqzWKUK8/K');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `categoryName` varchar(60) NOT NULL,
  `icon` text NOT NULL,
  `total` bigint NOT NULL DEFAULT '0',
  PRIMARY KEY (`categoryName`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryName`, `icon`, `total`) VALUES
('Books', 'fas fa-book category-icon', 6),
('Art And Culture', 'fab fa-artstation category-icon', 0),
('Kitchenware', 'fas fa-sink category-icon', 0),
('Clothes', 'fas fa-tshirt category-icon', 2),
('Animals And Humane', 'fas fa-paw category-icon', 2),
('Disaster Relief', 'fas fa-house-damage category-icon', 0);

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

DROP TABLE IF EXISTS `donation`;
CREATE TABLE IF NOT EXISTS `donation` (
  `id` varchar(30) NOT NULL,
  `donatorID` varchar(30) NOT NULL,
  `donationName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `category` varchar(50) NOT NULL,
  `quantity` bigint NOT NULL,
  `description` text NOT NULL,
  `donatedOn` text NOT NULL,
  `upLoadedOn` date NOT NULL,
  `applicants` int NOT NULL DEFAULT '0',
  `verify` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`id`, `donatorID`, `donationName`, `category`, `quantity`, `description`, `donatedOn`, `upLoadedOn`, `applicants`, `verify`) VALUES
('D-79999676076', 'DON-7999967607', 'education', 'Books', 12, 'notebooks', '', '0000-00-00', 0, b'0'),
('D-79999676077', 'DON-7999967607', 'education', 'Books', 6, 'sfzdxgfchvjbnm', '', '0000-00-00', 0, b'0'),
('D-79999676078', 'DON-7999967607', 'education', 'Books', 120, 'NOTEBOOKS', '', '0000-00-00', 0, b'0'),
('D-98765432101', 'DON-9876543210', 'Clothes', 'Books', 23, 'tops and pajamas ', '', '0000-00-00', 0, b'0'),
('D-98765432102', 'DON-9876543210', 'Wearing', 'Books', 40, 'pajamas', '', '0000-00-00', 0, b'0'),
('D-98765432103', 'DON-9876543210', 'Wearing', 'Clothes', 120, 'Pajamas', '', '0000-00-00', 0, b'0'),
('D-79999676079', 'DON-7999967607', 'Wearing', 'Clothes', 120, 'Old Clothes like - Crop Top, Pajamas, etc. ', 'Thursday 18th of March 2021', '0000-00-00', 0, b'0'),
('D-799996760710', 'DON-7999967607', 'Education', 'Books', 120, 'S Chand and RD Sharma Books for 11th and 12th Standard all editions with 40 Blank Note Books.', 'Thursday 18th of March 2021', '0000-00-00', 0, b'0'),
('D-799996760711', 'DON-7999967607', 'Saurabh Mishra', 'Animals And Humane', 1, 'cat', 'Friday 19th of March 2021', '0000-00-00', 0, b'0'),
('D-799996760712', 'DON-7999967607', 'Dog', 'Animals And Humane', 2, 'Brown Pomeranian Puppy', 'Tuesday 23rd of March 2021', '0000-00-00', 0, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `donationimg`
--

DROP TABLE IF EXISTS `donationimg`;
CREATE TABLE IF NOT EXISTS `donationimg` (
  `id` varchar(30) NOT NULL,
  `imageName` text NOT NULL,
  `imageTmp` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `donationimg`
--

INSERT INTO `donationimg` (`id`, `imageName`, `imageTmp`) VALUES
('D-79999676076', 'babu.jpeg', '../uploads/donation_photos/DON-7999967607/D-79999676076/babu.jpeg'),
('D-79999676076', 'Capture_test.PNG', '../uploads/donation_photos/DON-7999967607/D-79999676076/Capture_test.PNG'),
('D-79999676076', 'confirm.PNG', '../uploads/donation_photos/DON-7999967607/D-79999676076/confirm.PNG'),
('D-79999676077', 'babu.jpeg', '../uploads/donation_photos/DON-7999967607/babu.jpeg'),
('D-79999676077', 'Capture_test.PNG', '../uploads/donation_photos/DON-7999967607/Capture_test.PNG'),
('D-79999676077', 'confirm.PNG', '../uploads/donation_photos/DON-7999967607/confirm.PNG'),
('D-79999676078', 'babu.jpeg', '../uploads/donation_photos/DON-7999967607/D-79999676078/babu.jpeg'),
('D-79999676078', 'Capture_test.PNG', '../uploads/donation_photos/DON-7999967607/D-79999676078/Capture_test.PNG'),
('D-79999676078', 'confirm.PNG', '../uploads/donation_photos/DON-7999967607/D-79999676078/confirm.PNG'),
('D-98765432101', 'Capture_test.PNG', '../uploads/donation_photos/DON-9876543210/D-98765432101/Capture_test.PNG'),
('D-98765432101', 'confirm.PNG', '../uploads/donation_photos/DON-9876543210/D-98765432101/confirm.PNG'),
('D-98765432102', 'helpinghandindex3.PNG', '../uploads/donation_photos/DON-9876543210/D-98765432102/helpinghandindex3.PNG'),
('D-98765432102', 'images.png', '../uploads/donation_photos/DON-9876543210/D-98765432102/images.png'),
('D-98765432103', 'helpinghandindex3.PNG', '../uploads/donation_photos/DON-9876543210/D-98765432103/helpinghandindex3.PNG'),
('D-98765432103', 'images.png', '../uploads/donation_photos/DON-9876543210/D-98765432103/images.png'),
('D-79999676079', 'babu.jpeg', '../uploads/donation_photos/DON-7999967607/D-79999676079/babu.jpeg'),
('D-79999676079', 'Capture_test.PNG', '../uploads/donation_photos/DON-7999967607/D-79999676079/Capture_test.PNG'),
('D-79999676079', 'confirm.PNG', '../uploads/donation_photos/DON-7999967607/D-79999676079/confirm.PNG'),
('D-799996760710', 'babu.jpeg', '../uploads/donation_photos/DON-7999967607/D-799996760710/babu.jpeg'),
('D-799996760710', 'Capture_test.PNG', '../uploads/donation_photos/DON-7999967607/D-799996760710/Capture_test.PNG'),
('D-799996760710', 'confirm.PNG', '../uploads/donation_photos/DON-7999967607/D-799996760710/confirm.PNG'),
('D-799996760711', 'babu.jpeg', '../uploads/donation_photos/DON-7999967607/D-799996760711/babu.jpeg'),
('D-799996760711', 'Capture_test.PNG', '../uploads/donation_photos/DON-7999967607/D-799996760711/Capture_test.PNG'),
('D-799996760711', 'confirm.PNG', '../uploads/donation_photos/DON-7999967607/D-799996760711/confirm.PNG'),
('D-799996760712', '48918-Dark-brown-Pomeranian-puppy-white-background.jpg', '../uploads/donation_photos/DON-7999967607/D-799996760712/48918-Dark-brown-Pomeranian-puppy-white-background.jpg'),
('D-799996760712', 'pomeranian-names-MG-long.jpg', '../uploads/donation_photos/DON-7999967607/D-799996760712/pomeranian-names-MG-long.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `donatorcred`
--

DROP TABLE IF EXISTS `donatorcred`;
CREATE TABLE IF NOT EXISTS `donatorcred` (
  `id` varchar(16) NOT NULL,
  `username` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pass` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `contact` bigint NOT NULL,
  `address` varchar(150) NOT NULL,
  `city` varchar(40) NOT NULL,
  `state` varchar(40) NOT NULL,
  `pinCode` int NOT NULL,
  `directory` text NOT NULL,
  `donations` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `contact` (`contact`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `donatorcred`
--

INSERT INTO `donatorcred` (`id`, `username`, `pass`, `dob`, `email`, `contact`, `address`, `city`, `state`, `pinCode`, `directory`, `donations`) VALUES
('DON-9876543210', 'Saurabh Mishra', '$2y$10$pK/E/p/Ke/xSMir9wOvJW.EiH2egNxNnHg5YrW7asO6zPp/dXIjcO', '2000-03-31', 'saurabhmishra@gmail.com', 9876543210, 'asdfadsfafdsadsf', 'adsfasfdasdfaf', 'adsfafasdfdafdsaf', 482001, '../uploads/donation_photos/DON-9876543210', 3),
('DON-7999967607', 'Sankalp', '$2y$10$pvokq0Gdo6mHV./8hkvvqu8DwBacu9eP2VrMPd1Ym6a8Va39rU3yq', '2000-03-20', 'sankalpprithyani@gmail.com', 7999967607, 'asdfadsfafdsadsf', 'adsfasfdasdfaf', 'Gujarat', 482001, '../uploads/donation_photos/DON-7999967607', 12);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE IF NOT EXISTS `faq` (
  `question` varchar(255) NOT NULL,
  `response` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`question`, `response`) VALUES
('What does Helping hand do?', 'We are acting as bridge between Donators and Recievers.It is just a platform and nothing much.\r\n                        We are acting as bridge between Donators and Recievers.It is just a platform and nothing much.\r\n                        We are acting as bridge between Donators and Recievers.It is\r\n                        just a platform and nothing much. We are acting as bridge We are acting as bridge between\r\n                        Donators and Recievers.It is just a platform and nothing much. We are acting as bridge between\r\n                        Donators and Recievers.It is just a platform\r\n                        and nothing much. We are acting as bridge between Donators and Recievers. We are acting as\r\n                        bridge between Donators and Recievers.It is just a platform and nothing much. We are acting as\r\n                        bridge between Donators and Recievers.It\r\n                        is just a platform and nothing much. We are acting as bridge between Donators and Recievers.It\r\n                        is just a platform and nothing much. We are acting as bridge We are acting as bridge between\r\n                        Donators and Recievers.It is just a platform\r\n                        and nothing much. We are acting as bridge between Donators and Recievers.It is just a platform\r\n                        and nothing much. We are acting as bridge between Donators and Recievers. We are acting as\r\n                        bridge between Donators and Recievers.It\r\n                        is just a platform and nothing much. We are acting as bridge between Donators and Recievers.It\r\n                        is just a platform and nothing much. We are acting as bridge between Donators and Recievers.It\r\n                        is just a platform and nothing much.\r\n                        We are acting as bridge We are acting as bridge between Donators and Recievers.It is just a\r\n                        platform and nothing much. We are acting as bridge between Donators and Recievers.It is just a\r\n                        platform and nothing much. We are acting\r\n                        as bridge between Donators and Recievers. We are acting as bridge between Donators and\r\n                        Recievers.It is just a platform and nothing much. We are acting as bridge between Donators and\r\n                        Recievers.It is just a platform and nothing much.');

-- --------------------------------------------------------

--
-- Table structure for table `ngocred`
--

DROP TABLE IF EXISTS `ngocred`;
CREATE TABLE IF NOT EXISTS `ngocred` (
  `id` varchar(20) NOT NULL,
  `orgName` varchar(50) NOT NULL,
  `startUpDate` date NOT NULL,
  `email` varchar(150) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `contact` bigint NOT NULL,
  `address` varchar(150) NOT NULL,
  `city` varchar(40) NOT NULL,
  `state` varchar(40) NOT NULL,
  `pinCode` int NOT NULL,
  `registratedOn` date NOT NULL,
  `verify` bit(1) DEFAULT b'0',
  `licenseName` text NOT NULL,
  `licensePath` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `contact` (`contact`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ngocred`
--

INSERT INTO `ngocred` (`id`, `orgName`, `startUpDate`, `email`, `pass`, `contact`, `address`, `city`, `state`, `pinCode`, `registratedOn`, `verify`, `licenseName`, `licensePath`) VALUES
('SWG-7999967607', 'Name', '2000-03-02', 'Sankalp@gmail.com', '$2y$10$R1psc/z0iyH/WP2uHyWvFOkIiMEzPtju9LCr7iE2v1gyJfDHpLpsy', 7999967607, 'parul university, waghodia', 'Vadodara', 'Gujarat', 356002, '0000-00-00', b'1', 'Sankalp.jpeg', '../uploads/ngo_doc/Sankalp.jpeg'),
('SWG-9425151183', 'Yash', '2001-03-02', 'nagar@gmail.com', '$2y$10$q/8LiM/ZidQ1mHKItV7w4.L.SvMArtRU1AACzdpeGqOz.lLFD8meW', 9425151183, '785', 'JBP', 'MP', 482001, '0000-00-00', b'1', 'nagar.jpeg', '../uploads/ngo_doc/nagar.jpeg'),
('SWG-9484812448', 'DreamComeTrue', '2000-10-20', 'yashi33256@gmail.com', '$2y$10$Mz3VOowhjPhk5agnpjJ..uXexLr10WvEEGSFy0cZvTUOxL2GZCHIy', 9484812448, 'SSV School', 'Vadodara', 'Gujarat', 482001, '0000-00-00', b'0', 'yashi33256.jpeg', '../uploads/ngo_doc/yashi33256.jpeg'),
('SWG-7996769907', 'JayMangal', '2000-02-20', 'mishrasaurabha1@gmail.com', '$2y$10$a6m2yVGsby.mD4AzZ0L/KeZmfJ2al8u0Uq5pYgNF.kYLTmkIDuMQ.', 7996769907, '40, Jay Mangal', 'Vadodara', 'Gujarat', 482006, '0000-00-00', b'0', 'mishrasaurabha1.jpeg', '../uploads/ngo_doc/mishrasaurabha1.jpeg'),
('SWG-7999967680', 'Benifactors', '2000-03-23', 'leagueshadow01@gmail.com', '$2y$10$N5wjPoN3ELnal9A5/WBbC.dTVSVttZO.uV2pKXv42rTR.FiGWTRZG', 7999967680, 'uma char rasta', 'vadodara', 'gujarat', 482001, '0000-00-00', b'0', 'leagueshadow01.png', '../uploads/ngo_doc/leagueshadow01.png'),
('SWG-8979878887', 'Name', '1995-11-05', 'san@gmail.com', '$2y$10$Y8dmvVSmyvNXZ8PIWsYE2ux0Gxivr9qXy//ggchBQmv0wvR0Nwc46', 8979878887, 'asdfadsfafdsadsf', 'adsfasfdasdfaf', 'adsfafasdfdafdsaf', 482001, '0000-00-00', b'0', 'san.png', '../uploads/ngo_doc/san.png'),
('SWG-6776770909', 'PetCare', '1998-09-20', 'info.computer@gmail.com', '$2y$10$3MG.QfdovtVPgw.VSLjdx.KpYojI0DLRM6OscIYlWWt.iHXw9Pr0O', 6776770909, 'queen mary school', 'Bhopal', 'Madhya Pradesh', 453002, '0000-00-00', b'0', 'info.computer.jpg', '../uploads/ngo_doc/info.computer.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
