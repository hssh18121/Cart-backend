-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 08, 2023 at 09:36 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carts_info`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `last_updated` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `cart_id`, `created_at`, `last_updated`) VALUES
(0, 0, 0, '2023-01-09', '2023-01-09'),
(1, 1, 1, '2023-01-08', '2023-01-08'),
(2, 2, 2, '2023-01-08', '2023-01-08'),
(3, 3, 3, '2023-01-08', '2023-01-08'),
(9, 9, 9, '2023-01-09', '2023-01-09'),
(10, 10, 10, '2023-01-09', '2023-01-09');

-- --------------------------------------------------------

--
-- Table structure for table `carts_details`
--

CREATE TABLE `carts_details` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `last_updated` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carts_details`
--

INSERT INTO `carts_details` (`cart_id`, `product_id`, `quantity`, `created_at`, `last_updated`) VALUES
(1, 1, 100, '2023-01-08', '2023-01-08'),
(1, 2, 1, '2023-01-08', '2023-01-08'),
(1, 3, 2, '2023-01-08', '2023-01-08'),
(1, 4, 4, '2023-01-08', '2023-01-08'),
(2, 1, 1, '2023-01-08', '2023-01-08'),
(2, 2, 1, '2023-01-08', '2023-01-08'),
(2, 3, 1, '2023-01-08', '2023-01-08'),
(2, 4, 1, '2023-01-08', '2023-01-08'),
(2, 5, 1, '2023-01-08', '2023-01-08'),
(2, 9, 5, '2023-01-08', '2023-01-08'),
(3, 1, 1, '2023-01-08', '2023-01-08'),
(10, 5, 1, '2023-01-09', '2023-01-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
