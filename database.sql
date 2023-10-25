-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 23, 2023 at 05:41 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hbwebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_cred`
--

DROP TABLE IF EXISTS `admin_cred`;
CREATE TABLE IF NOT EXISTS `admin_cred` (
  `sr_no` int NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(150) NOT NULL,
  `admin_pass` varchar(150) NOT NULL,
  PRIMARY KEY (`sr_no`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin_cred`
--

INSERT INTO `admin_cred` (`sr_no`, `admin_name`, `admin_pass`) VALUES
(1, 'admin1', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

DROP TABLE IF EXISTS `carousel`;
CREATE TABLE IF NOT EXISTS `carousel` (
  `sr_no` int NOT NULL AUTO_INCREMENT,
  `image_name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`sr_no`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Triggers `carousel`
--
DROP TRIGGER IF EXISTS `replace_image_path`;
DELIMITER $$
CREATE TRIGGER `replace_image_path` BEFORE INSERT ON `carousel` FOR EACH ROW BEGIN
    SET NEW.image_name = REPLACE(NEW.image_name, 'C:/wamp64/www/cea-hbw/assets/images/carousel/', '');
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

DROP TABLE IF EXISTS `contact_details`;
CREATE TABLE IF NOT EXISTS `contact_details` (
  `sr_no` int NOT NULL AUTO_INCREMENT,
  `address` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `gmap` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `pn1` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `pn2` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `fb` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `insta` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tw` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `iframe` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`sr_no`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

DROP TABLE IF EXISTS `facilities`;
CREATE TABLE IF NOT EXISTS `facilities` (
  `sr_no` int NOT NULL AUTO_INCREMENT,
  `icon` varchar(150) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  PRIMARY KEY (`sr_no`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Triggers `facilities`
--
DROP TRIGGER IF EXISTS `RemoveSubstringTrigger_Facilities`;
DELIMITER $$
CREATE TRIGGER `RemoveSubstringTrigger_Facilities` BEFORE INSERT ON `facilities` FOR EACH ROW BEGIN
    SET NEW.icon = REPLACE(NEW.icon, 'C:/wamp64/www/cea-hbw/assets/images/facilities/', '');
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

DROP TABLE IF EXISTS `features`;
CREATE TABLE IF NOT EXISTS `features` (
  `sr_no` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`sr_no`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `sr_no` int NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `area` int NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL,
  `adult` int NOT NULL,
  `children` int NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`sr_no`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room_facilities`
--

DROP TABLE IF EXISTS `room_facilities`;
CREATE TABLE IF NOT EXISTS `room_facilities` (
  `sr_no` int NOT NULL AUTO_INCREMENT,
  `room_id` int NOT NULL,
  `facilities_id` int NOT NULL,
  PRIMARY KEY (`sr_no`),
  KEY `facilities id` (`facilities_id`),
  KEY `room id` (`room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room_features`
--

DROP TABLE IF EXISTS `room_features`;
CREATE TABLE IF NOT EXISTS `room_features` (
  `sr_no` int NOT NULL AUTO_INCREMENT,
  `room_id` int NOT NULL,
  `features_id` int NOT NULL,
  PRIMARY KEY (`sr_no`),
  KEY `room_id` (`room_id`),
  KEY `room_id_2` (`room_id`,`features_id`),
  KEY `features id` (`features_id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room_images`
--

DROP TABLE IF EXISTS `room_images`;
CREATE TABLE IF NOT EXISTS `room_images` (
  `sr_no` int NOT NULL AUTO_INCREMENT,
  `room_id` int NOT NULL,
  `picture` varchar(150) NOT NULL,
  `thumb` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`sr_no`),
  KEY `room_id` (`room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Triggers `room_images`
--
DROP TRIGGER IF EXISTS `remove_substring_room_images`;
DELIMITER $$
CREATE TRIGGER `remove_substring_room_images` BEFORE INSERT ON `room_images` FOR EACH ROW BEGIN
  SET NEW.picture = REPLACE(NEW.picture, 'C:/wamp64/www/cea-hbw/assets/images/rooms/', '');
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `sr_no` int NOT NULL AUTO_INCREMENT,
  `site_title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `site_about` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `shutdown` tinyint(1) NOT NULL,
  PRIMARY KEY (`sr_no`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_details`
--

DROP TABLE IF EXISTS `team_details`;
CREATE TABLE IF NOT EXISTS `team_details` (
  `sr_no` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `picture` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`sr_no`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Triggers `team_details`
--
DROP TRIGGER IF EXISTS `RemoveSubstringTrigger`;
DELIMITER $$
CREATE TRIGGER `RemoveSubstringTrigger` BEFORE INSERT ON `team_details` FOR EACH ROW BEGIN
    SET NEW.picture = REPLACE(NEW.picture, 'C:/wamp64/www/cea-hbw/assets/images/about/', '');
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_queries`
--

DROP TABLE IF EXISTS `user_queries`;
CREATE TABLE IF NOT EXISTS `user_queries` (
  `sr_no` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` date DEFAULT NULL,
  `seen` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`sr_no`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Triggers `user_queries`
--
DROP TRIGGER IF EXISTS `set_current_date`;
DELIMITER $$
CREATE TRIGGER `set_current_date` BEFORE INSERT ON `user_queries` FOR EACH ROW BEGIN
    SET NEW.date = CURDATE();
END
$$
DELIMITER ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `room_facilities`
--
ALTER TABLE `room_facilities`
  ADD CONSTRAINT `facilities id` FOREIGN KEY (`facilities_id`) REFERENCES `facilities` (`sr_no`) ON DELETE RESTRICT,
  ADD CONSTRAINT `room id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`sr_no`) ON DELETE RESTRICT;

--
-- Constraints for table `room_features`
--
ALTER TABLE `room_features`
  ADD CONSTRAINT `features id` FOREIGN KEY (`features_id`) REFERENCES `features` (`sr_no`) ON DELETE RESTRICT,
  ADD CONSTRAINT `rm id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`sr_no`) ON DELETE RESTRICT;

--
-- Constraints for table `room_images`
--
ALTER TABLE `room_images`
  ADD CONSTRAINT `room_images_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`sr_no`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
