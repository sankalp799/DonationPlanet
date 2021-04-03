-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 03, 2021 at 08:23 PM
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
('admin@helpinghand.com', 'Yashasavi Mishra', '$2y$10$roziPxsa8xc8XcKRkvxb5.kRJehBoLa0LBidc2xB/FciqzWKUK8/K'),
('admin2@helpinghand.com', 'Sankalp Prihtyani', '$2y$10$I4shNZR.P.PQsaMG6M6x8eyYAZTo7U4xbsfWg8oYUtpfxtofNGXn2');

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
('Books', 'fas fa-book category-icon', 0),
('Art And Culture', 'fab fa-artstation category-icon', 1),
('Kitchenware', 'fas fa-sink category-icon', 1),
('Clothes', 'fas fa-tshirt category-icon', 0),
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
('D-84846684871', 'DON-8484668487', 'Taps', 'Kitchenware', 54, 'Copper Taps', 'Tuesday 30th of March 2021', '0000-00-00', 0, b'0'),
('D-94251551412', 'DON-9425155141', 'Taps & Sink', 'Kitchenware', 457, 'Copper Taps with Sink', 'Saturday 3rd of April 2021', '0000-00-00', 0, b'0'),
('D-799996760711', 'DON-7999967607', 'Saurabh Mishra', 'Animals And Humane', 1, 'cat', 'Friday 19th of March 2021', '0000-00-00', 0, b'0'),
('D-799996760712', 'DON-7999967607', 'Dog', 'Animals And Humane', 2, 'Brown Pomeranian Puppy', 'Tuesday 23rd of March 2021', '0000-00-00', 0, b'1'),
('D-799996760713', 'DON-7999967607', 'Crafting Item', 'Art And Culture', 78, 'Crafting Tools', 'Sunday 28th of March 2021', '0000-00-00', 0, b'1'),
('D-94251551411', 'DON-9425155141', 'Pet', 'Animals And Humane', 4, '4 Chow Chow Dogs', 'Sunday 28th of March 2021', '0000-00-00', 0, b'1');

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
('D-84846684871', 'file_23144_chow-chow-460x290.jpg', '../uploads/donation_photos/DON-8484668487/D-84846684871/file_23144_chow-chow-460x290.jpg'),
('D-84846684871', '3-fullbody.jpg', '../uploads/donation_photos/DON-8484668487/D-84846684871/3-fullbody.jpg'),
('D-94251551412', 'images.png', '../uploads/donation_photos/DON-9425155141/images.png'),
('D-94251551412', 'babu.jpeg', '../uploads/donation_photos/DON-9425155141/babu.jpeg'),
('D-94251551412', 'anti.JPG', '../uploads/donation_photos/DON-9425155141/anti.JPG'),
('D-799996760711', 'babu.jpeg', '../uploads/donation_photos/DON-7999967607/D-799996760711/babu.jpeg'),
('D-799996760711', 'Capture_test.PNG', '../uploads/donation_photos/DON-7999967607/D-799996760711/Capture_test.PNG'),
('D-799996760711', 'confirm.PNG', '../uploads/donation_photos/DON-7999967607/D-799996760711/confirm.PNG'),
('D-799996760712', '48918-Dark-brown-Pomeranian-puppy-white-background.jpg', '../uploads/donation_photos/DON-7999967607/D-799996760712/48918-Dark-brown-Pomeranian-puppy-white-background.jpg'),
('D-799996760712', 'pomeranian-names-MG-long.jpg', '../uploads/donation_photos/DON-7999967607/D-799996760712/pomeranian-names-MG-long.jpg'),
('D-799996760713', 'images.jpg', '../uploads/donation_photos/DON-7999967607/D-799996760713/images.jpg'),
('D-799996760713', 'images.png', '../uploads/donation_photos/DON-7999967607/D-799996760713/images.png'),
('D-94251551411', 'file_23144_chow-chow-460x290.jpg', '../uploads/donation_photos/DON-9425155141/D-94251551411/file_23144_chow-chow-460x290.jpg'),
('D-94251551411', '3-fullbody.jpg', '../uploads/donation_photos/DON-9425155141/D-94251551411/3-fullbody.jpg');

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
  `emailVerified` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `contact` (`contact`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `donatorcred`
--

INSERT INTO `donatorcred` (`id`, `username`, `pass`, `dob`, `email`, `contact`, `address`, `city`, `state`, `pinCode`, `directory`, `donations`, `emailVerified`) VALUES
('DON-9876543210', 'Saurabh Mishra', '$2y$10$pK/E/p/Ke/xSMir9wOvJW.EiH2egNxNnHg5YrW7asO6zPp/dXIjcO', '2000-03-31', 'saurabhmishra@gmail.com', 9876543210, 'asdfadsfafdsadsf', 'adsfasfdasdfaf', 'adsfafasdfdafdsaf', 482001, '../uploads/donation_photos/DON-9876543210', 3, b'0'),
('DON-7999967607', 'Sankalp', '$2y$10$xZQ/BjaoB6xFZkgzSSyENuOR83TQ75eU5xgJbp/1PNoWRch5ZM0Yq', '2000-03-20', 'sankalpprithyani@gmail.com', 7999967607, 'asdfadsfafdsadsf', 'adsfasfdasdfaf', 'Gujarat', 482001, '../uploads/donation_photos/DON-7999967607', 13, b'1'),
('DON-9425155141', 'Akshay Prithyani', '$2y$10$tuU7yjW0XRVA5l1Jrzmd3ed7kGvJ1Uo70c5qf58gALKvAnrk9z7Xy', '1995-12-31', '190510101125@paruluniversity.ac.in', 9425155141, '785, Hari Om Vihar, Napier Town', 'Jabalpur', 'Madhya Pradesh', 482001, '../uploads/donation_photos/DON-9425155141', 2, b'1'),
('DON-8484668487', 'Priya Patel', '$2y$10$aY/3KkQ25hOBdN7uj2Uc/.jP/JNcALT9mQRSNnGPpEE0ifB1NYYQ2', '1991-02-02', 'priya.patel42089@paruluniversity.ac.in', 8484668487, 'PICA, Parul University, Post Limda, Waghodia', 'Vadodara', 'Gujarat', 358001, '../uploads/donation_photos/DON-8484668487', 1, b'0'),
('DON-7888878899', 'Shanky', '$2y$10$Ji5gtl1UQnBHM/pXAVdNU.LuVh8HQbPEQE/qSkGTff7giDG6AGnS.', '1990-03-23', 'shanky@gmail.com', 7888878899, 'asdf', 'asdf', 'asdf', 123345, '../uploads/donation_photos/DON-7888878899', 0, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE IF NOT EXISTS `faq` (
  `question` varchar(255) NOT NULL,
  `response` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `emailVerified` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `contact` (`contact`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ngocred`
--

INSERT INTO `ngocred` (`id`, `orgName`, `startUpDate`, `email`, `pass`, `contact`, `address`, `city`, `state`, `pinCode`, `registratedOn`, `verify`, `licenseName`, `licensePath`, `emailVerified`) VALUES
('SWG-7999967607', 'Name', '2000-03-02', 'Sankalp@gmail.com', '$2y$10$R1psc/z0iyH/WP2uHyWvFOkIiMEzPtju9LCr7iE2v1gyJfDHpLpsy', 7999967607, 'parul university, waghodia', 'Vadodara', 'Gujarat', 356002, '0000-00-00', b'0', 'Sankalp.jpeg', '../uploads/ngo_doc/Sankalp.jpeg', b'0'),
('SWG-9425151183', 'Yash', '2001-03-02', 'nagar@gmail.com', '$2y$10$q/8LiM/ZidQ1mHKItV7w4.L.SvMArtRU1AACzdpeGqOz.lLFD8meW', 9425151183, '785', 'JBP', 'MP', 482001, '0000-00-00', b'0', 'nagar.jpeg', '../uploads/ngo_doc/nagar.jpeg', b'0'),
('SWG-9484812448', 'DreamComeTrue', '2000-10-20', 'yashi33256@gmail.com', '$2y$10$Mz3VOowhjPhk5agnpjJ..uXexLr10WvEEGSFy0cZvTUOxL2GZCHIy', 9484812448, 'SSV School', 'Vadodara', 'Gujarat', 482001, '0000-00-00', b'0', 'yashi33256.jpeg', '../uploads/ngo_doc/yashi33256.jpeg', b'0'),
('SWG-7996769907', 'JayMangal', '2000-02-20', 'mishrasaurabha1@gmail.com', '$2y$10$a6m2yVGsby.mD4AzZ0L/KeZmfJ2al8u0Uq5pYgNF.kYLTmkIDuMQ.', 7996769907, '40, Jay Mangal', 'Vadodara', 'Gujarat', 482006, '0000-00-00', b'1', 'mishrasaurabha1.jpeg', '../uploads/ngo_doc/mishrasaurabha1.jpeg', b'0'),
('SWG-7999967680', 'Benifactors', '2000-03-23', 'leagueshadow01@gmail.com', '$2y$10$N5wjPoN3ELnal9A5/WBbC.dTVSVttZO.uV2pKXv42rTR.FiGWTRZG', 7999967680, 'uma char rasta', 'vadodara', 'gujarat', 482001, '0000-00-00', b'1', 'leagueshadow01.png', '../uploads/ngo_doc/leagueshadow01.png', b'0'),
('SWG-8979878887', 'Name', '1995-11-05', 'san@gmail.com', '$2y$10$Y8dmvVSmyvNXZ8PIWsYE2ux0Gxivr9qXy//ggchBQmv0wvR0Nwc46', 8979878887, 'asdfadsfafdsadsf', 'adsfasfdasdfaf', 'adsfafasdfdafdsaf', 482001, '0000-00-00', b'0', 'san.png', '../uploads/ngo_doc/san.png', b'0'),
('SWG-6776770909', 'PetCare', '1998-09-20', 'info.computer@gmail.com', '$2y$10$3MG.QfdovtVPgw.VSLjdx.KpYojI0DLRM6OscIYlWWt.iHXw9Pr0O', 6776770909, 'queen mary school', 'Bhopal', 'Madhya Pradesh', 453002, '0000-00-00', b'1', 'info.computer.jpg', '../uploads/ngo_doc/info.computer.jpg', b'0'),
('SWG-8989812448', 'Bhopal Pet Zone', '1998-01-26', 'info.computermind1905@gmail.com', '$2y$10$q5WMY8Oy/kKzwqswl3LPu.y4Kum8cdvDJ5/A5LM3oquLsqKKu3Cd2', 8989812448, 'queen marry school', 'Bhopal', 'Madhya Pradesh', 453002, '0000-00-00', b'1', 'pd9581.png', '../uploads/ngo_doc/pd9581.png', b'1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
