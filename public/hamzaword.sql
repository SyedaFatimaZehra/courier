-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2024 at 04:12 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hamzaword`
--

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `username`, `password`, `email`, `created_at`) VALUES
(1, 'asad', '$2y$10$4kYjS9vS8v9t.wt1u3BSueZmWQfoy7P1EKcfZFIMbMr8LpwiG5e6W', 'asad@gmail.com', '2024-09-07 16:19:05'),
(0, 'hamza', '$2y$10$OtY7ZlfVGcAyfRFBu72MKOy37fA6A8S7nEx2OXkXNICW4zk5TsTfa', 'hamzaaqib0144@gmail.com', '2024-09-21 14:10:02');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `couriers`
--

CREATE TABLE `couriers` (
  `id` int(11) NOT NULL,
  `tracking_number` varchar(100) DEFAULT NULL,
  `sender` varchar(100) DEFAULT NULL,
  `receiver` varchar(100) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ohio`
--

CREATE TABLE `ohio` (
  `id` int(11) NOT NULL,
  `username` varchar(200) DEFAULT NULL,
  `PASSWORD` varchar(200) DEFAULT NULL,
  `firstname` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phonenumber` varchar(200) DEFAULT NULL,
  `v_token` varchar(500) DEFAULT NULL,
  `verification` int(11) DEFAULT NULL,
  `resettoken` varchar(500) DEFAULT NULL,
  `resettokenexpire` varchar(100) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `agentrole` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ohio`
--

INSERT INTO `ohio` (`id`, `username`, `PASSWORD`, `firstname`, `email`, `phonenumber`, `v_token`, `verification`, `resettoken`, `resettokenexpire`, `role`, `agentrole`) VALUES
(4, 'admin1', 'admin', 'admin', 'admin@gmail.com', 'admin', '', 1, '', NULL, 1, 0),
(7, 'ozan', '12345', 'Ozan', 'ozaneffendi018@gmail.com', '123344', '5c4f3e7ea32a3fb5e4a08b17b0af3d53', 1, '', '', 0, 1),
(8, 'Hamza', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_package`
--

CREATE TABLE `order_package` (
  `id` int(11) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `recipient` varchar(255) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `status` enum('Paid','Unpaid','Delivered','Not Delivered','Approved') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `v_token` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_package`
--

INSERT INTO `order_package` (`id`, `package_name`, `sender`, `recipient`, `origin`, `destination`, `status`, `created_at`, `v_token`) VALUES
(1, 'Test', 'ozaneffendi018@gmail.com', 'Hamza', 'KHI', 'lahore', 'Paid', '2024-09-10 12:53:24', 'ba60f83fcd701ccbdcd367b360bb77ea'),
(2, 'Test', 'ozaneffendi018@gmail.com', 'Ozan', 'Hi', 'Bye', 'Paid', '2024-09-11 16:37:17', 'fb78f2937889bb805fe8315a50c9773e'),
(3, 'Test', 'ozaneffendi018@gmail.com', 'Ozan', 'Hi', 'Bye', 'Unpaid', '2024-09-11 16:39:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user1`
--

CREATE TABLE `user1` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `courier` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `send` varchar(200) NOT NULL,
  `sendercity` varchar(255) NOT NULL,
  `senderaddress` varchar(255) NOT NULL,
  `sendercourier` varchar(255) NOT NULL,
  `sendercountr` varchar(255) NOT NULL,
  `orderstatus` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user1`
--

INSERT INTO `user1` (`id`, `name`, `city`, `address`, `courier`, `country`, `send`, `sendercity`, `senderaddress`, `sendercourier`, `sendercountr`, `orderstatus`, `email`) VALUES
(6, 'Ozan', 'Karachi ', 'Com3', 'TCS', 'Pak', 'Hamza', 'Karachi', 'Com5', 'TCS', 'Pak', 'Paid', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ohio`
--
ALTER TABLE `ohio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_package`
--
ALTER TABLE `order_package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user1`
--
ALTER TABLE `user1`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ohio`
--
ALTER TABLE `ohio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_package`
--
ALTER TABLE `order_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user1`
--
ALTER TABLE `user1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
