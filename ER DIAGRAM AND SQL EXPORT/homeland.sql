-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2024 at 09:18 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homeland`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `adminname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mypassword` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `adminname`, `email`, `mypassword`, `created_at`) VALUES
(1, 'Parth Jangle', 'atplparth@gmail.com', '$2y$10$qdVt8gwZxXihlnlYFT8.XOuMxSw4VWO4qT4fx3EedsVpmgcOnMHES', '2024-04-17 06:01:14'),
(2, 'jsk', 'onlyforparthcoding@gmail.com', '$2y$10$eDL3s9zwFz6cAtyS1gRsAuE6YFrYEAkYtb6vpGSSnSqzaQ8OVS5OK', '2024-04-17 08:48:59');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`) VALUES
(1, 'Flat', '2024-04-15 03:59:42'),
(6, 'Land', '2024-04-17 13:11:41');

-- --------------------------------------------------------

--
-- Table structure for table `favs`
--

CREATE TABLE `favs` (
  `id` int(10) NOT NULL,
  `prop_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favs`
--

INSERT INTO `favs` (`id`, `prop_id`, `user_id`, `created_at`) VALUES
(7, 3, 1, '2024-04-16 20:14:24'),
(8, 2, 1, '2024-04-16 20:14:37'),
(9, 3, 4, '2024-04-18 03:25:40'),
(10, 3, 5, '2024-04-18 06:48:14');

-- --------------------------------------------------------

--
-- Table structure for table `props`
--

CREATE TABLE `props` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `price` varchar(10) NOT NULL,
  `image` varchar(200) NOT NULL,
  `beds` int(10) NOT NULL,
  `bath` int(20) NOT NULL,
  `sqft` varchar(30) NOT NULL,
  `home_type` varchar(200) NOT NULL,
  `year_built` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `price_sqft` int(30) NOT NULL,
  `description` text NOT NULL,
  `admin_name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `props`
--

INSERT INTO `props` (`id`, `name`, `location`, `price`, `image`, `beds`, `bath`, `sqft`, `home_type`, `year_built`, `type`, `price_sqft`, `description`, `admin_name`, `created_at`) VALUES
(1, 'M-404 Sumruddh Greens', 'Sumruddh Greens,\nOpp Madhav International School,\nVastral Road,\nAhmedabad 382418,\nGujarat,India.', '₹ 7000000', 'img_6.jpg', 3, 3, '200', 'Flat', '2010', 'Sale', 30000, 'Good Place.\r\nSilent Atmosphere.\r\nGood Development.\r\nEverything is available nearby.', 'Jangle Parth', '2024-04-13 18:39:12'),
(2, 'Ashtavinayaka Technocrafts Pvt Ltd', 'Undrel Gam,\r\nAhmedabad 388216,\r\nGujarat,India.', '₹ 30000000', 'img_8.jpg', 30, 30, '220000', 'Land-Property', '2018', 'lease', 300000, 'Ashtavinayaka technocrafts is Inviting Bussiness Owners to Setup Thier Plant in Our Area.', 'Parth Jangle', '2024-04-14 10:55:28'),
(3, 'Vedant Archade', 'Opp PDEU Gandhinagar Gujarat', '₹ 15000000', 'img_1.jpg', 3, 3, '5000', 'Flat', '2024', 'Sale', 3000, 'Good Location\r\nNear Gift City\r\nOpp PDEU College\r\nGreenery', 'Parth Jangle', '2024-04-16 16:12:14');

-- --------------------------------------------------------

--
-- Table structure for table `related_images`
--

CREATE TABLE `related_images` (
  `id` int(10) NOT NULL,
  `image` varchar(200) NOT NULL,
  `prop_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `related_images`
--

INSERT INTO `related_images` (`id`, `image`, `prop_id`, `created_at`) VALUES
(1, 'img_1.jpg', 1, '2024-04-16 06:37:01'),
(2, 'img_3.jpg', 1, '2024-04-16 06:41:21'),
(3, 'img_5.jpg', 2, '2024-04-16 06:37:01'),
(4, 'img_4.jpg', 2, '2024-04-16 06:47:19'),
(7, 'img_7.jpg', 3, '2024-04-16 19:10:38'),
(8, 'img_8.jpg', 3, '2024-04-16 19:10:52');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` int(40) NOT NULL,
  `user_id` int(10) NOT NULL,
  `prop_id` int(10) NOT NULL,
  `author` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `name`, `email`, `phone`, `user_id`, `prop_id`, `author`, `created_at`) VALUES
(1, 'Jangle Parth', 'atplparth@gmail.com', 2147483647, 1, 2, 'Parth Jangle', '2024-04-16 18:55:57'),
(2, 'Jangle Parth', 'atplparth@gmail.com', 2147483647, 1, 3, 'Parth Jangle', '2024-04-16 19:38:37'),
(4, 'Jangle Parth', 'atplparth@gmail.com', 2147483647, 4, 2, 'Parth Jangle', '2024-04-18 03:26:29'),
(5, 'rhythm', 'rhythm@gmail.com', 2147483647, 5, 1, 'Jangle Parth', '2024-04-18 06:50:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mypassword` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `mypassword`, `created_at`) VALUES
(1, 'Jangle Parth', 'atplparth@gmail.com', '$2y$10$qdVt8gwZxXihlnlYFT8.XOuMxSw4VWO4qT4fx3EedsVpmgcOnMHES', '2024-04-13 12:48:51'),
(2, 'parth', 'atplparth@gmail.com', '$2y$10$J7b4S4g12/i8YqnXy/xpeed2HZWbFMgswM2iOgvgsMiy98SuZxuai', '2024-04-17 16:52:21'),
(3, 'parth', 'atplparth@gmail.com', '$2y$10$OO5SLMwrpLoq/78nYGUwaO48Pe8ClqCCLxTHrPAn14EoIAxPnkXRa', '2024-04-17 17:03:23'),
(4, 'mann', 'mannmera@gmail.com', '$2y$10$7JI2SjhYiqcfA3rGDXC6gOEEsUcFTCiDsiEfz.sh0foOjHlsD0V.C', '2024-04-18 03:25:22'),
(5, 'rhythm', 'rhythm@gmail.com', '$2y$10$4Yvga7FIeU457ry8we1mmevJy4YHRn5LE9tnFPMAS0LFdJdVL3huG', '2024-04-18 06:47:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favs`
--
ALTER TABLE `favs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `props`
--
ALTER TABLE `props`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `related_images`
--
ALTER TABLE `related_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `favs`
--
ALTER TABLE `favs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `props`
--
ALTER TABLE `props`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `related_images`
--
ALTER TABLE `related_images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
