-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 13, 2024 at 05:55 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sany`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `category_name`) VALUES
(1, 'Excavators'),
(2, 'Cranes'),
(3, 'Piling Machinery'),
(4, 'Mining Machinery'),
(5, 'Road Machinery'),
(6, 'Port Machinery'),
(7, 'Wind Machinery ');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `prod_id` int NOT NULL AUTO_INCREMENT,
  `category_id` int DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `category_id`, `product_name`, `thumbnail`) VALUES
(1, 2, 'Mini Excavators', 'uploads/6641a9d1958a4_crane.png'),
(2, 5, 'Crawler Cranes', 'uploads/6641499724963_2.png'),
(3, 3, 'Piling Rigs', 'uploads/663d051dcce16_1.png'),
(4, 4, 'Underground Mining', 'uploads/663d05a9163fc_1.png'),
(5, 5, 'Motor Graders', 'uploads/663d0657a822d_1.png'),
(6, 6, 'Empty Container Handler', 'uploads/663d06ce6472b_1.png'),
(7, 7, 'Telehandlers', 'uploads/663d070ed6045_1.png'),
(8, 1, 'Small Excavators', 'uploads/664126b5a0c92_samll.png'),
(9, 2, 'All-terrain Cranes', 'uploads/6641274183b1c_istockphoto-157380217-612x612.jpg'),
(10, 2, 'Crawler-Cranes', 'uploads/664127e60497d_crawler-cranes.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Director'),
(2, 'CEO'),
(3, 'Maneger'),
(4, 'Admin'),
(5, 'Author'),
(6, 'Editor'),
(7, 'Contributer');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `role_id` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `role_id`, `photo`, `message`) VALUES
(5, 'Mr. Ramu Ravuri', '2', 'uploads/66413d5ef27bc_avatar-11.png', 'We recently purchased more than 100 numbers of equipment from SANY which includes excavators, motor graders and transit mixers to be specifically deployed on the road project. We feel it is a pleasure to be associated with SANY India. We have noticed that performance parameters of SANY equipment in respect of fuel economy, reliability and productivity surpass that of other similar equipment available in market. We do not hesitate to recommend the product and services offered by Sany and we wish SANY all the best in all its future endeavors.'),
(8, '1Mr. Pritam Mhatre', '3', 'uploads/6641560b0d2e3_avatar-8.png', 'We are working in Road, Quarry and General Construction space since last 38 years. We have a fleet\r\nof 100+ excavators, Motor Graders, Piling Rigs, Tippers and Concrete machinery.\r\nOur First Sany Excavator was purchased in the year 2014 and today we have a fleet of 50+ Sany\r\nMachines including Excavators, Motor Graders, and Piling Rigs etc. SANY machines are built with\r\nlatest technology which helps us in faster operation at work site with lower fuel consumption.\r\nSANY Service has been always outstanding and the major attraction why we prefer SA'),
(10, 'Bhanu Pratap', '2', 'uploads/6641586025d2c_avatar-8.png', 'We recently purchased more than 100 numbers of equipment from SANY which includes excavators, motor graders and transit mixers to be specifically deployed on the road project. We feel it is a pleasure to be associated with SANY India. We have noticed that performance parameters of SANY equipment in respect of fuel economy, reliability and productivity surpass that of other similar equipment available in market. We do not hesitate to recommend the product and services offered by Sany and we wish SANY all the best in all its future endeavors.'),
(13, 'Demo Demo', '3', 'uploads/66419f8b663cd_avatar-19.png', 'Urging people to vote in large numbers, Prime Minister Narendra Modi said it is everyone’s duty to strengthen India’s democracy. With Assembly polls also being held in Andhra Pradesh and Odisha alongside the Lok Sabha elections across the country, Mr. Modi appealed to voters to turn up at polling booths in record numbers.Urging people to vote in large numbers, Prime Minister Narendra Modi said it is everyone’s duty to strengthen India’s democracy. With Assembly polls also being held in Andhra Pradesh and Odisha alongside the Lok Sabha elect');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
