-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2020 at 10:35 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(25) NOT NULL,
  `amount` int(11) NOT NULL,
  `action` varchar(70) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `status`, `amount`, `action`, `user_id`) VALUES
(1, '2020-11-16 12:15:36', 'Done', 5, '', 1),
(2, '2020-11-17 08:50:09', 'processing', 20, 'cancel', 3),
(3, '2020-11-17 08:51:11', 'outfordelivery', 40, '', 5),
(4, '2020-11-17 08:52:24', 'Done', 25, '', 5),
(7, '2020-11-18 20:38:58', 'Done', 55, '', 3),
(8, '2020-11-18 20:38:58', 'Done', 40, '', 6),
(9, '2020-11-18 20:39:53', 'Done', 10, '', 5),
(10, '2020-11-18 20:39:53', 'Done', 95, '', 4),
(76, '2020-11-22 14:28:11', 'Done', 90, '', 4),
(654, '2020-11-22 14:29:09', 'Done', 150, '', 5),
(6978, '2020-11-22 14:28:41', 'processing', 800, 'cancell', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`order_id`, `product_id`) VALUES
(1, 1),
(2, 2),
(2, 1),
(2, 1),
(3, 2),
(3, 2),
(3, 2),
(3, 3),
(3, 3),
(4, 2),
(4, 2),
(4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `price` varchar(20) NOT NULL,
  `category` varchar(30) NOT NULL,
  `product_profile` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `price`, `category`, `product_profile`) VALUES
(1, 'tea', '5 LE', 'Hot Drinks', NULL),
(2, 'cofee', '10 LE', 'Hot Drinks', NULL),
(3, 'cola', '5 LE', 'cold Drinks', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `room_number` int(11) NOT NULL,
  `EXT` varchar(15) DEFAULT NULL,
  `profile_picture` varchar(30) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `room_number`, `EXT`, `profile_picture`, `is_admin`) VALUES
(1, 'omar pero', 'omar@cafee.com', 'Omar123@#', 112, '0123456', 'admin.png', 0),
(3, 'Elsayed Elbeshry', 'elsayed@cafee.com', 'Elsayed123@#', 113, '76t574', 'admin.png', 0),
(4, 'Reem Mousa', 'reem@cafee.com', 'Reem123@#', 114, '64653', 'user1.png', 0),
(5, 'Elene Malak', 'elene@cafee.com', 'Elene123@#', 112, '651654685', 'user2.png', 0),
(6, 'Sherif Sameh', 'sherif@example.com', 'sh12345', 8798, '859798', 'user.png', 0),
(1225, 'moh', 'moh@test.com', 'pero', 87656, 'hdg56', 'admin.png', 1),
(98789849, 'omarpero', 'm.naguib2611@gmail.com', '98fc7b34760face5e268bff318180e05861a970f', 45, '529815', 'admin.png', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6979;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98789850;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD CONSTRAINT `orders_products_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `orders_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
