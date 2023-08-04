-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 04, 2023 at 03:48 PM
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
-- Database: `work_reporting`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

DROP TABLE IF EXISTS `user_table`;
CREATE TABLE IF NOT EXISTS `user_table` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `user_des` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `user_scale` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `user_res` text COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `user_pass` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_role` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`id`, `fullname`, `user_des`, `user_scale`, `user_res`, `user_id`, `user_pass`, `user_role`) VALUES
(8, 'Rhishi', 'Web developer ', 'BPS-09', 'make & develop website.', 'admin', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 0),
(9, 'Rhishi', 'Web developer', 'BPS-13', 'design\r\ndevelopment ', 'moderator', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1);

-- --------------------------------------------------------

--
-- Table structure for table `work_tbl`
--

DROP TABLE IF EXISTS `work_tbl`;
CREATE TABLE IF NOT EXISTS `work_tbl` (
  `emp_id` int NOT NULL,
  `work_desc` text COLLATE utf8mb4_general_ci NOT NULL,
  `work_date` date NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `work_tbl`
--

INSERT INTO `work_tbl` (`emp_id`, `work_desc`, `work_date`) VALUES
(2, 'Work submited successfull', '2023-02-14'),
(5, 'i also submited', '2023-02-14'),
(7, 'Hi i am rony', '2023-02-15');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
