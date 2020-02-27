-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 26, 2020 at 10:55 PM
-- Server version: 10.1.29-MariaDB-6
-- PHP Version: 7.2.28-3+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
CREATE DATABASE IF NOT EXISTS cafe;
use cafe;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(64) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Soft drinks'),
(2, 'Hard drinks'),
(3, 'Hot drinks'),
(4, 'Juice'),
(5, 'afsmf'),
(6, 'newCATT'),
(7, 'tesssskkkkkmmsd');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(64) NOT NULL,
  `status` enum('out-for-delivery','processing','done') NOT NULL,
  `user_id` int(64) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `notes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `status`, `user_id`, `date`, `notes`) VALUES
(2, 'out-for-delivery', 2, '2020-02-18 15:41:00', NULL),
(14, 'processing', 1, '2020-02-24 15:55:15', ''),
(15, 'processing', 1, '2020-02-24 15:55:17', ''),
(16, 'processing', 1, '2020-02-24 16:52:50', ''),
(17, 'processing', 1, '2020-02-25 11:43:52', ''),
(18, 'processing', 2, '2020-02-25 14:58:13', ''),
(19, 'processing', 2, '2020-02-25 15:02:55', ''),
(20, 'processing', 2, '2020-02-25 15:03:31', ''),
(21, 'processing', 2, '2020-02-25 15:04:31', ''),
(22, 'processing', 1, '2020-02-26 19:08:20', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `order_id` int(64) NOT NULL,
  `product_id` int(64) NOT NULL,
  `quantity` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`order_id`, `product_id`, `quantity`) VALUES
(2, 2, 8),
(2, 3, 7),
(14, 1, 1),
(14, 2, 5),
(15, 2, 1),
(16, 1, 1),
(17, 1, 1),
(17, 2, 1),
(17, 3, 1),
(18, 1, 111),
(18, 2, 53),
(18, 3, 18),
(19, 1, 1),
(19, 2, 1),
(20, 1, 1),
(20, 2, 1),
(20, 3, 1),
(21, 1, 1),
(21, 2, 1),
(21, 3, 1),
(22, 1, 1),
(22, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(64) NOT NULL,
  `cat_id` int(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `isAvailable` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `name`, `price`, `pic`, `isAvailable`) VALUES
(1, 3, 'MINT', '3.55', 'assets/images/tea.jpg', 1),
(2, 1, 'sdkvnsvk', '10.92', '../assets/images/product__1582711558.jpg', 0),
(3, 4, 'lemon', '15.99', 'assets/images/lemon.png', 1),
(4, 2, 'test', '14.85', '../assets/images/product_test_1582664843.jpg', 1),
(5, 5, 'efef', '4.87', '../assets/images/product_efef_1582664953.jpg', 1),
(6, 3, 'nopro', '41.05', '../assets/images/product_nopro_1582710254.jpg', 1),
(7, 6, 'iojioj', '77.55', '../assets/images/product_iojioj_1582710362.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `ext` varchar(64) NOT NULL,
  `room` varchar(64) NOT NULL,
  `pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `isAdmin`, `ext`, `room`, `pic`) VALUES
(1, 'ahmed', 'ahmed@mail.com', '123456', 0, '1416', 'cloud', 'images/users/ahmed.png'),
(2, 'admin', 'admin@mail.com', '123456', 1, '145', 'main', 'images/users/admin.png'),
(3, 'knsvd', 'test@test.com', '1234567_', 0, '2', '4', '../assets/images/knsvd.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD CONSTRAINT `orders_products_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
